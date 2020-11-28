<?php

namespace App\Http\Controllers\DataRegister;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Material;
use Response;
use App\MaterialFile;
use App\MaterialLink;
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
        $name=uniqid('file_').str_replace(' ', '', $request->file->getClientOriginalName());
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
        return Response::json(MaterialFile::where('material_id',$request->material_id)->get());
    }
    public function handleGetLinks(Request $request){
        return Response::json(MaterialLink::where('material_id',$request->material_id)->get());
    }
    public function handleDeleteFile(Request $request){
        Storage::disk('local')->delete('materials/'.$request->location);
        MaterialFile::findOrFail($request->id)->delete();
    }
    public function handleDeleteLink(Request $request){
        MaterialLink::findOrFail($request->id)->delete();
    }
    public function handleStoreLink(Request $request){
        MaterialLink::create([
            'title'=>$request->title,
            'link'=>$request->link,
            'material_id'=>$request->material_id
        ]);
    }
    public function handleDeleteMaterial(Request $request){
        Material::findOrFail($request->id)->delete();
    }
}
