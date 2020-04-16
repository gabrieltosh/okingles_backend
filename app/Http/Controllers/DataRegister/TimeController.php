<?php

namespace App\Http\Controllers\DataRegister;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Time;
use Response;
class TimeController extends Controller
{
    public function handleStoreTime(Request $request){
        Time::create($request->all());
    }
    public function handleDeleteTime($id){
        Time::findOrFail($id)->delete();
    }
    public function handleGetTime(){
        return Response::json(Time::all());
    }
    public function handleUpdateTime(Request $request){
        Time::findOrFail($request->id)->fill($request->all())->save();
    }
}
