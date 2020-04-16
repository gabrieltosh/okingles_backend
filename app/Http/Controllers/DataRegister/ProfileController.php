<?php

namespace App\Http\Controllers\DataRegister;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Profile;
use Response;
use App\ProfileModule;
use DB;
class ProfileController extends Controller
{
    public function HandleStoreProfile(Request $request){
        Profile::create($request->all());
    }
    public function HandleGetProfiles(){
        return Response::json(Profile::orderBy('id','desc')->get());
    }
    public function HandleDeleteProfile($id){
        Profile::findOrFail($id)->delete();
    }
    public function HandleUpdateProfile(Request $request){
        Profile::findOrFail($request->id)->fill($request->all())->save();
    }
    public function HandleGetProfileModule($id){
        return Response::json(DB::select('SELECT * FROM ok.modulesAssigned T1 WHERE  T1.profile_id='.$id));
    }   
    public function HandleGetNotProfileModule($id){
        return Response::json(DB::select('CALL modulesNotAssigned('.$id.')'));
    }
    public function HandlStoreProfileModule(Request $request){
        ProfileModule::create($request->all());
    }
    public function HandleDeleteProfileModule($id){
        ProfileModule::findOrFail($id)->delete();
    }
}
