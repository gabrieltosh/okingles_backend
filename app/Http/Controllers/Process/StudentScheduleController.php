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
}
