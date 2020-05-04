<?php

namespace App\Http\Controllers\DataRegister;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Time;
use App\Days;
use App\Classroom;
use Response;
use App\Schedule;
use App\User;
use App\AssignmentStudent;
use DB;
class ScheduleController extends Controller
{
    public function handleGetClassroom(){
        return Response::json(Classroom::orderBy('id','desc')->get());
    }
    public function handlePostTime(Request $request){
        return Response::json(Schedule::where('day_id',$request->day_id)->where('classroom_id',$request->classroom_id)->with('time','lesson','teacher','classroom')->orderBy('id','asc')->get());
    }
    public function handleStoreSchedule(Request $request){
        foreach ($request->time_id as $key => $time) {
            Schedule::create([
                'day_id'=>$request->day_id,
                'classroom_id'=>$request->classroom_id,
                'time_id'=>$time,
            ]);
        }
    }
    public function handleGetTimes(Request $request){
        $data=array();
        $times = Schedule::select('time_id')->where('day_id',$request->day_id)->where('classroom_id',$request->classroom_id)->get();
        foreach ($times as $key => $value) {
            array_push($data,$value->time_id);
        }
        return Response::json(Time::whereNotIn('id',$data)->orderBy('id','asc')->get());
    }
    public function handleDeleteSchedule($id){
        Schedule::findOrFail($id)->delete();
    }
    public function handleGetTeacher(Request $request){
        return Response::json(User::select('id','name','lastname')->where('branch_office_id',$request->branch_office_id)->where('status',1)->where('type','Docente')->get());
    }
    public function handleUpdateSchedule(Request $request){
        Schedule::findOrFail($request->id)->fill([
            'teacher_id'=>$request->teacher_id,
            'number_student'=>$request->number_student,
        ])->save();
    }
    public function handleGetStudents($schedule_id){
        return Response::json(AssignmentStudent::where('schedule_id',$schedule_id)->with('student')->get());
    }
    public function handleSchedule($schedule_id){
        return Response::json(Schedule::where('id',$schedule_id)->with('day','classroom','time','teacher','lesson')->first());
    }
    public function handleUpdateLesson(Request $request){
        Schedule::findOrFail($request->schedule_id)->fill(['lesson_id'=>$request->lesson_id])->save();
    }
    public function handleRemoveStudent($id){
        AssignmentStudent::findOrFail($id)->delete();
    }
    public function handleGetSelectStudents($branch_office_id){
        return Response::json(User::where('status',1)->where('type','Estudiante')->where('branch_office_id',$branch_office_id)->get());
    }
    public function handleStoreStudent(Request $request){
        $valid=DB::table('schedules')
            ->select('schedules.id')
            ->join('assignment_students', 'assignment_students.schedule_id', '=', 'schedules.id')
            ->where('schedules.time_id',$request->time_id)
            ->where('schedules.day_id',$request->day_id)
            ->where('assignment_students.student_id',$request->student_id)
            ->count();
        $numer_assignament=AssignmentStudent::where('schedule_id',$request->schedule_id)->count();
        $schedule=Schedule::where('id',$request->schedule_id)->first();
        if($valid>0)
        {
            return 0;
        }else{
            if($numer_assignament+1<=$schedule->number_student){
                AssignmentStudent::create(
                    [
                        'schedule_id'=>$request->schedule_id,
                        'student_id'=>$request->student_id
                    ]
                );
                return 1;
            }else{
                return 2;
            }
          
        }
    }
}
