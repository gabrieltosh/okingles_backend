<?php

namespace App\Http\Controllers\DataRegister;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Week;
use App\Days;
use Response;
use App\BranchOffice;
class WeekController extends Controller
{
    public function handleStoreWeek(Request $request){
        $week=Week::create($request->all());
        $days=$this->handleCreateDays($week->id,$request);
        foreach ($days as $key => $value) {
            Days::create([
                'name'=>$value["name"],
                'day_date'=>$value["day_date"],
                'week_id'=>$value["week_id"],
                'status'=>0
            ]);
        }
    }
    public function handleCreateDays($week_id,$request){
        $date = strtotime($request->start);
        $inicio0 = strtotime('sunday this week -1 week', $date);
        $inicio=date('Y-m-d', $inicio0);
        $semana=date('W',strtotime($request->start));
        $items=array();
        for($i=1;$i<=6;$i++){
            switch (date("w", strtotime("$inicio +$i day"))){
                case 0: 
                    $dia='Domingo';
                break;
                case 1: 
                    $dia= "Lunes"; 
                break;
                case 2: 
                    $dia= "Martes"; 
                break;
                case 3: 
                    $dia= "Miercoles"; 
                break;
                case 4: 
                    $dia= "Jueves"; 
                break;
                case 5: 
                    $dia= "Viernes"; 
                break;
                case 6: 
                    $dia= "Sabado"; 
                break;
            }
            array_push($items,['day_date'=>date("Y-m-d", strtotime("$inicio +$i day")),'name'=>$dia,'week_id'=>$week_id]);
        }
        return $items;
    }
    public function handleGetWeeks($id){
        return Response::json(Week::where('branch_office_id',$id)->orderBy('id','desc')->get());
    }
    public function handleUpdateWeek(Request $request){
        Week::findOrFail($request->id)->fill($request->all())->save();
    }
    public function handleDeleteWeek($id){
        Days::where('week_id',$id)->delete();
        Week::findOrFail($id)->delete();
    }
    public function handleGetBranchOffice(){
        return Response::json(BranchOffice::orderBy('id','desc')->get());
    }
}
