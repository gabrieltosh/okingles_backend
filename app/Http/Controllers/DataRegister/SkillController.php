<?php

namespace App\Http\Controllers\DataRegister;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Skill;
use Response;
class SkillController extends Controller
{
    public function handleGetSkills(){
        return Response::json(Skill::orderBy('id','desc')->get());
    }
    public function handleStoreSkill(Request $request){
        Skill::create($request->all());
    }
    public function handleUpdateSkill(Request $request){
        Skill::findOrFail($request->id)->fill($request->all())->save();
    }
    public function handleDeleteSkill($id){
        Skill::findOrFail($id)->delete();
    }
}
