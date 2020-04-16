<?php

namespace App\Http\Controllers\DataRegister;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Classroom;
use Response;
class ClassroomController extends Controller
{
    public function handleStoreClassroom(Request $request){
        Classroom::create($request->all());
    }
    public function handleDeleteClassroom($id){
        Classroom::findOrFail($id)->delete();
    }
    public function handleUpdateClassroom(Request $request){
        Classroom::findOrFail($request->id)->fill($request->all())->save();
    }
    public function handleGetClassroom(){
        return Response::json(Classroom::with('branch_office')->get());
    }
}
