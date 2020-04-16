<?php

namespace App\Http\Controllers\DataRegister;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\BranchOffice;
use Response;
use App\Http\Requests\BranchOfficeRequest;
use Crypt;
class BranchOfficeController extends Controller
{
    public function HandleGetBranchOffice(){
        return Response::json(BranchOffice::orderBy('id','desc')->get());
    }
    public function HandleCreateBranchOffice(BranchOfficeRequest $request){
        BranchOffice::create($request->all());
    }
    public function HandleUpdateBranchOffice(Request $request){
        BranchOffice::findOrFail($request->id)->fill($request->all())->save();
    }
    public function HandleDeleteBranchOffice($id){
        BranchOffice::findOrFail($id)->delete();
    }
    public function HandleCrypt(Request $request){
        if($request->status==0)
        {
            return Response::json(Crypt::encrypt($request->data));
        }else{
            return Response::json(Crypt::decrypt($request->data));
        }
    }

}
