<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Validator;
use App\User;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenBlacklistedException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
class AuthController extends Controller
{

    public function HandleLogin(Request $request)
    {
        $credentials = $request->only('ci', 'password');
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
        try
        {
            if ($token = $this->HandleGuard()->refresh()) {
                return response()
                    ->json(['status' => 'successs'], 200)
                    ->header('Authorization', $token);
            }
        }catch(TokenExpiredException $e){
            return response()->json(['error' => 'refresh_token_error'], 401);
        } catch (JWTException $e) {
            return response()->json(['error' => 'refresh_token_error'], 401);
        }catch (TokenBlacklistedException $e) {
            return response()->json(['error' => 'refresh_token_error'], 401);
        }catch (TokenInvalidException $e) {
            return response()->json(['error' => 'refresh_token_error'], 401);
        }
    }
    private function HandleGuard()
    {
        return Auth::guard();
    }
}
