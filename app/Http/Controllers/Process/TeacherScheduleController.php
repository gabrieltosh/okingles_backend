<?php

namespace App\Http\Controllers\Process;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Response;
use DB;
use Carbon\Carbon;
use App\Schedule;
use App\AssignmentStudent;
use App\Skill;
use App\DetailLesson;
class TeacherScheduleController extends Controller
{
    public function handleGetDays($id){
        $user=User::where('id',$id)->with('branch_office')->first();
        if($user->type=='Docente')
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
        return Response::json(
            Schedule::where('teacher_id',$request->teacher_id)
                    ->where('day_id',$request->day_id)
                    ->with('day','classroom','time','teacher','lesson')
                    ->get()
        );
    }
    public function handleGetStudents($schedule_id){
        return Response::json(
            AssignmentStudent::where('schedule_id',$schedule_id)->with('student','student.branch_office','schedule','skill')->get()
        );
    }
    public function handleGetStudentAbsent($assignment_student_id){
        AssignmentStudent::findOrFail($assignment_student_id)
                            ->fill(['absent'=>1])
                            ->save();
    }
    public function handleStoreSkill(Request $request){
        AssignmentStudent::findOrFail($request->assignment_student_id)
                            ->fill([
                                    'skills_id'=>$request->skills_id,
                                    'percentage'=>$request->percentage,
                                    'detail_lesson_id'=>$request->detail_lesson_id
                                ])
                            ->save();
    }
    public function handleGetSkills(){
        return Response::json(Skill::all());
    }
    public function handleGetStudent($student_id){
        return Response::json(
            AssignmentStudent::where('student_id',$student_id)
                            ->with('student','lesson','student.branch_office','schedule','skill','schedule.day','schedule.time','schedule.teacher','schedule.lesson')
                            ->orderBy('id','desc')
                            ->get()
        );
    }
    public function handleGetDetailLesson($lesson_id){
        return Response::json(
            DetailLesson::where('lesson_id',$lesson_id)->get()
        );
    }
}
