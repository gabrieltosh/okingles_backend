<?php

namespace App\Http\Controllers\DataRegister;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Profile;
use Response;
use App\BranchOffice;
use JWTAuth;
class UserController extends Controller
{
    public function HandleRegisterUser(Request $data){
        User::create([
            'name'=>$data->name, 
            'lastname'=>$data->lastname,
            'email'=>$data->email, 
            'email_verified_at'=>0,
            'status'=>1,
            'ci'=>$data->ci,
            'occupation'=>$data->occupation,
            'birthdate'=>$data->birthdate,
            'due_date'=>$data->due_date,
            'address'=>$data->address,
            'type'=>$data->type,
            'phone'=>$data->phone,
            'invoice'=>$data->invoice,
            'registter'=>$data->registter,
            'image'=>$data->image,
            'branch_office_id'=>$data->branch_office_id,
            'profile_id'=>$data->profile_id,
            'password'=>'123456',
        ]);
        return response()->json(['status' => 'success'], 200);
    }
    public function HandleUploadImage(Request $request){
        $name=uniqid('img_') . $request->file->getClientOriginalName();
        $request->file->storeAs('uploads',  $name);
        return Response::json($name);
    }
    public function HandleGetUser(Request $request){
       try {
            if (! $userFind = JWTAuth::parseToken()->authenticate()) {
                return response()->json(['user_not_found'], 404);
            }
            } catch (Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {

                    return response()->json(['token_expired'], $e->getStatusCode());
            } catch (Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {

                    return response()->json(['token_invalid'], $e->getStatusCode());
            } catch (Tymon\JWTAuth\Exceptions\JWTException $e) {

                    return response()->json(['token_absent'], $e->getStatusCode());
            }
            $user=User::where('id',$userFind->id)->with('branch_office','profile')->first();
            return response()->json(['data'=>compact('user')]);
    }
    public function HandleGetProfiles(){
        return Response::json(Profile::select('name','id')->orderBy('id','desc')->get());
    }
    public function HandleGetBranchOffice(){
        return Response::json(BranchOffice::select('name','id')->orderBy('id','desc')->get());
    }
    public function HandleGetUsers($type){
        switch ($type) {
            case 'admins':
                return Response::json(User::where('type','Administrativo')->with('profile','branch_office')->get());
                break;
            case 'teachers':
                return Response::json(User::where('type','Docente')->with('profile','branch_office')->get());
                break;
            case 'students':
                return Response::json(User::where('type','Estudiante')->with('profile','branch_office')->get());
                break;
        }
    }
    public function HandleChangeStatus($id){
        $user=User::findOrFail($id);
        if($user->status)
        {
            $user->fill(['status'=>0])->save();
        }else{
            $user->fill(['status'=>1])->save();
        }
    }
    public function HandleDeleteUser($id){
        User::findOrFail($id)->delete();
    }
    public function HandleUpdateUser(Request $data){
        if(is_null($data->image)){
            User::findOrFail($data->id)->fill([
                'name'=>$data->name, 
                'lastname'=>$data->lastname,
                'email'=>$data->email, 
                'ci'=>$data->ci,
                'occupation'=>$data->occupation,
                'birthdate'=>$data->birthdate,
                'due_date'=>$data->due_date,
                'type'=>$data->type,
                'address'=>$data->address,
                'phone'=>$data->phone,
                'invoice'=>$data->invoice,
                'registter'=>$data->registter,
                'branch_office_id'=>$data->branch_office_id,
                'profile_id'=>$data->profile_id
            ])->save();
        }else{
            User::findOrFail($data->id)->fill([
                'name'=>$data->name, 
                'lastname'=>$data->lastname,
                'email'=>$data->email, 
                'ci'=>$data->ci,
                'type'=>$data->type,
                'occupation'=>$data->occupation,
                'birthdate'=>$data->birthdate,
                'due_date'=>$data->due_date,
                'address'=>$data->address,
                'phone'=>$data->phone,
                'invoice'=>$data->invoice,
                'registter'=>$data->registter,
                'image'=>$data->image,
                'branch_office_id'=>$data->branch_office_id,
                'profile_id'=>$data->profile_id,
                'password'=>$data->password,
            ])->save();
        }
    }
}
