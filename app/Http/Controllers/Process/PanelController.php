<?php

namespace App\Http\Controllers\Process;

use Illuminate\Http\Request;
use App\Module;
use App\Http\Controllers\Controller;
use Response;
use App\User;
use App\Profile;
use App\ProfileModule;
use DB;
use App\Schedule;
use Carbon\Carbon;
class PanelController extends Controller
{
    public function HandleGetModules($id){
        $modules_id=ProfileModule::select('module_id')->where('profile_id',$id)->get();
        return Response::json(Module::whereIn('id',$modules_id)->with('module')->get());
    }
    public function prueba(){
        $schedule = Carbon::parse('2020-04-14 15:30');
        $now = Carbon::now();

        echo $schedule->toDateTimeString();                   // 2012-09-05 23:26:11
        echo $now->toDateTimeString();                  // 2012-09-05 20:26:11

        var_dump($schedule->equalTo($now));                // bool(false)
        // equalTo is also available on CarbonInterval and CarbonPeriod
        var_dump($schedule->notEqualTo($now));             // bool(true)
        // notEqualTo is also available on CarbonInterval and CarbonPeriod
        var_dump($schedule->greaterThan($now));            // bool(false)
        // greaterThan is also available on CarbonInterval
        var_dump($schedule->greaterThanOrEqualTo($now));   // bool(false)
        // greaterThanOrEqualTo is also available on CarbonInterval
        var_dump($schedule->lessThan($now));               // bool(true)
        // lessThan is also available on CarbonInterval
        var_dump($schedule->lessThanOrEqualTo($now));      // bool(true)
        // lessThanOrEqualTo is also available on CarbonInterval
    }
}
