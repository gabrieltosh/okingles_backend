<?php

namespace App\Http\Controllers\Process;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Days;
use Carbon\Carbon;
use App\User;
use Response;
use App\Schedule;
use DB;
use App\Lesson;
use App\AssignmentStudent;
use Arr;
class StudentScheduleController extends Controller
{
    public function handleGetDays($id){
        $user=User::where('id',$id)->with('branch_office')->first();
        if($user->type=='Estudiante')
        {
            return Response::json(
                DB::table('days')
                ->select('days.*')
                ->join('weeks', 'weeks.id', '=', 'days.week_id')
                ->join('branch_offices', 'branch_offices.id', '=', 'weeks.branch_office_id')
                ->where('days.status',1)
                ->where('branch_offices.id',$user->branch_office_id)
                ->whereDate('days.day_date','>=',Carbon::now())
                ->orderBy('days.day_date','asc')
                ->get());
        }else{
            return Response::json('Usuario no valido');
        }
    }
    public function handleGetSchedule(Request $request){
        $schedules = Schedule::where('day_id',$request->day_id)
                    ->whereNotNull('teacher_id')
                    ->with('day','classroom','time','teacher','lesson')
                    ->orderBy('id','asc')
                    ->get();

        $assignment=DB::table('assignment_students')
                    ->select('schedules.id')
                    ->join('schedules', 'schedules.id', '=', 'assignment_students.schedule_id')
                    ->where('assignment_students.student_id',$request->student_id)
                    ->get();

        foreach ($schedules as $key => $schedule) {
            foreach ($assignment as $key => $value) {
                if($schedule->id == $value->id){
                    $schedule->setAttribute('used',1);
                }else{
                    if(!isset($schedule->used)){
                        $schedule->setAttribute('used',0);
                    }
                }
            }
        }
        return Response::json($schedules);

    }
    public function handleGetLessons(){
        return Response::json(Lesson::orderBy('id','asc')->get());
    }
    public function handleStoreAssignment(Request $request){
        $errors=0;
        $schedule=Schedule::where('id',$request->schedule_id)->first();
        $numer_assignament=AssignmentStudent::where('schedule_id',$request->schedule_id)->count();
        if(is_null($request->lesson_id))
        {
            if($numer_assignament+1<=$schedule->number_student){
                AssignmentStudent::create(
                    [
                        'schedule_id'=>$request->schedule_id,
                        'student_id'=>$request->student_id
                    ]
                );
            }else{
                $errors++;
                return Response::json($errors);
            }
        }else{
            if(is_null($schedule->lesson_id))
            {
                Schedule::findOrFail($request->schedule_id)->fill(['lesson_id'=>$request->lesson_id])->save();
                if($numer_assignament+1<=$schedule->number_student){
                    AssignmentStudent::create(
                        [
                            'schedule_id'=>$request->schedule_id,
                            'student_id'=>$request->student_id
                        ]
                    );
                }else{
                    $errors++;
                    return Response::json($errors);
                }
            }else{
                $errors++;
                $errors++;
                return Response::json($errors);
            }
        }
    }
    public function handleGetAssignmentToDay(Request $request){
        $assignment=DB::table('assignment_students')
                       ->select(DB::raw('null as valid'),DB::raw('schedules.id as schedule_id'), DB::raw('days.day_date as date'),DB::raw('days.name as day'),DB::raw('classrooms.name as classroom'),DB::raw('CONCAT(users.name," ",users.lastname) as name'),DB::raw('times.start as start'),DB::raw('times.end as end'),DB::raw('times.start as start'),DB::raw('lessons.name as lesson'))
                       ->join('schedules', 'schedules.id', '=', 'assignment_students.schedule_id')
                       ->join('days', 'days.id', '=', 'schedules.day_id')
                       ->join('classrooms', 'classrooms.id', '=', 'schedules.classroom_id')
                       ->join('times', 'times.id', '=', 'schedules.time_id')
                       ->join('users', 'users.id', '=', 'schedules.teacher_id')
                       ->join('lessons', 'lessons.id', '=', 'schedules.lesson_id')
                       ->where('assignment_students.student_id',$request->student_id)
                       ->whereDate('days.day_date','>=', Carbon::now())
                       ->get();

        $count=DB::table('assignment_students')
                        ->select(DB::raw('count(schedules.id) as count'))
                        ->join('schedules', 'schedules.id', '=', 'assignment_students.schedule_id')
                        ->join('days', 'days.id', '=', 'schedules.day_id')
                        ->where('assignment_students.student_id',$request->student_id)
                        ->whereDate('days.day_date','>=', Carbon::now())
                        ->get();
        $less=0;
        foreach ($assignment as $key => $value) {
            $datetime=Carbon::parse($value->date.' '.$value->start);
            $now = Carbon::now();
            if($now->lessThanOrEqualTo($datetime)){
                $value->valid=1;
            }else{
                $value->valid=0;
                $less++;
            }
        }

        $data=array(
            "assignment" => $assignment,
            "count" => (int)$count[0]->count - $less,
        );
        return Response::json($data);
    }
    public function handleGetAssignmentHistory(Request $request){
        $data = AssignmentStudent::where('student_id',$request->student_id)
                            ->with('student','skill','lesson','schedule.day','schedule.classroom','schedule.time','schedule.teacher','schedule.lesson')
                            ->skip($request->skip)
                            ->take(10)
                            ->orderBy('id','desc')
                            ->get();
        $next = AssignmentStudent::where('student_id',$request->student_id)
                            ->skip($request->skip+10)
                            ->take(10)
                            ->orderBy('id','desc')
                            ->get();
        $count=0;
        foreach ($next as $key => $value) {
            $count++;
        }
        if($count>0){
            $status='show';
        }else{
            $status='hide';
        }
        return Response::json(array(
            "status" => $status,
            "data" => $data,
        ));
    }
}
