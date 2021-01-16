<?php

namespace App\Http\Controllers\Process;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Task;
use Response;
class TaskController extends Controller
{
    public function handleUploadFile(Request $request){
        $name=uniqid('task_').str_replace(' ', '', $request->file->getClientOriginalName());
        $request->file->storeAs('tasks',  $name);
        return response()->json(array(
            'file_name'=>$name
        ));
    }
    public function handleStoreFile(Request $request){
        Task::create([
            'description'=>$request->description,
            'file_name'=>$request->file_name,
            'user_id'=>$request->user_id,
            'schedule_id'=>$request->schedule_id,
        ]);
    }
    public function handleGetTasks(Request $request){
        return Response::json(Task::where('user_id',$request->student_id)->where('schedule_id',$request->schedule_id)->get());
    }
}
