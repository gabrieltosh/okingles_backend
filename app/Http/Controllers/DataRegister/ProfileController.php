<?php

namespace App\Http\Controllers\DataRegister;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Profile;
use Response;
use App\ProfileModule;
use DB;
use App\Module;
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
        return Response::json(
            DB::table('profile_modules')
                ->select('profile_modules.id','profile_modules.profile_id','modules.name','profile_modules.create','profile_modules.edit','profile_modules.delete')
                ->join('modules', 'modules.id', '=', 'profile_modules.module_id')
                ->where('profile_modules.profile_id',$id)
                ->get()
        );
    }   
    public function HandleGetNotProfileModule($id){
        $module=ProfileModule::select('module_id')->where('profile_id',$id)->get();
        return Response::json(
            Module::whereNotIn('id',$module)->get()
        );
    }
    public function HandlStoreProfileModule(Request $request){
        ProfileModule::create($request->all());
    }
    public function HandleDeleteProfileModule($id){
        ProfileModule::findOrFail($id)->delete();
    }
}
