<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Validator;
use App\User;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
class AuthController extends Controller
{

    public function HandleLogin(Request $request)
    {
        $credentials = $request->only('email', 'password');
        try {
            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'invalid_credentials'], 400);
            }
        } catch (JWTException $e) {
            return response()->json(['error' => 'could_not_create_token'], 500);
        }

        return response()->json(compact('token'))->header('Authorization', $token);
    }

    public function HandleLogout()
    {
        $this->HandleGuard()->logout();
        return response()->json([
            'status' => 'success',
            'msg' => 'Logged out Successfully.'
        ], 200);
    }

    public function HandleRefresh()
    {
        if ($token = $this->HandleGuard()->refresh()) {
            return response()
                ->json(['status' => 'successs'], 200)
                ->header('Authorization', $token);
        }

        return response()->json(['error' => 'refresh_token_error'], 401);

        // try{
        //     if($token = JWTAuth::getToken()){
        //       JWTAuth::checkOrFail();
        //     }
        //   }
        //   catch(TokenExpiredException $e){
        //     JWTAuth::setToken(JWTAuth::refresh());
        //   }
        //   return response()
        //           ->json(['status' => 'successs'], 200)
        //           ->header('Authorization', JWTAuth::getToken()->get());
    }
    // public function refresh()
    // {
    //     return $this->respondWithToken($this->guard()->refresh());
    // }

    // /**
    //     * Get the token array structure.
    //     *
    //     * @param  string $token
    //     *
    //     * @return \Illuminate\Http\JsonResponse
    //     */
    // protected function respondWithToken($token)
    // {
    //     return response()->json([
    //         'access_token' => $token,
    //         'token_type' => 'bearer',
    //         'expires_in' => $this->guard()->factory()->getTTL() * 60
    //     ]);
    // }
    private function HandleGuard()
    {
        return Auth::guard();
    }
}
