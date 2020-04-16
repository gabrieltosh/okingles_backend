<?php

namespace App\Http\Controllers\DataRegister;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Response;
use App\Module;
class ModuleController extends Controller
{
    public function handleGetModule(){
        return Response::json(Module::orderBy('id','desc')->with('sub_module')->get());
    }
    public function handleStoreModule(Request $request){
        Module::create($request->all());
    } 
    public function handleUpdateModule(Request $request){
        Module::findOrFail($request->id)->fill($request->all())->save();
    }
    public function handleDeleteModule($id){
        Module::findOrFail($id)->delete();
    }
    public function handleGetSelect(){
        return Response::json(Module::select('id','name')->orderBy('id','desc')->get());
    }
    public function handleSetModule($id){
        return Response::json(Module::select('id','name')->orderBy('id','deSPOTsc')->get());
    }
}
