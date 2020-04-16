<?php

namespace App\Http\Controllers\DataRegister;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Lesson;
use Response;
class LessonController extends Controller
{
    public function handleStoreLesson(Request $request){
        Lesson::create($request->all());
    }
    public function handleUpdateLesson(Request $request){
        Lesson::findOrFail($request->id)->fill($request->all())->save();
    }
    public function handleDeleteLesson($id){
        Lesson::findOrFail($id)->delete();
    }
    public function handleGetLesson(){
        return Response::json(Lesson::get());
    }
}
