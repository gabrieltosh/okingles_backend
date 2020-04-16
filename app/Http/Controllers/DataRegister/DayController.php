<?php

namespace App\Http\Controllers\DataRegister;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Week;
use Response;
use App\Days;
class DayController extends Controller
{
    public function handleGetDays($id){
        return Response::json(Week::where('id',$id)->with('days')->first());
    }
    public function handleChangeStatus($id){
        if(Days::findOrFail($id)->status){
            Days::findOrFail($id)->fill(['status'=>0])->save();
        }else{
            Days::findOrFail($id)->fill(['status'=>1])->save();
        }
    }
}

