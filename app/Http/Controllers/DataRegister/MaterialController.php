<?php

namespace App\Http\Controllers\DataRegister;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Material;
use Response;
use App\MaterialFile;
use Storage;
class MaterialController extends Controller
{
    public function handleGetMaterials(){
         return Response::json(
            Material::all()
        );
    }
    public function handleStoreMaterial(Request $request){
        Material::create($request->all());
    }
    public function handleUploadImage(Request $request){
        $name=uniqid('file_') . $request->file->getClientOriginalName();
        $request->file->storeAs('materials',  $name);
        $type = pathinfo($request->file->getClientOriginalName(), PATHINFO_EXTENSION);
        return response()->json(array(
            'location'=>$name,
            'type'=>$type
        ));
    }
    public function handleStoreFile(Request $request){
        MaterialFile::create([
            'name'=>$request->name,
            'location'=>$request->location,
            'type'=>$request->type,
            'material_id'=>$request->material_id
        ]);
    }
    public function handleGetFiles(Request $request){
        return MaterialFile::where('material_id',$request->material_id)->get();
    }
    public function handleDeleteFile(Request $request){
        Storage::disk('local')->delete('materials/'.$request->location);
        MaterialFile::findOrFail($request->id)->delete();
    }
}
