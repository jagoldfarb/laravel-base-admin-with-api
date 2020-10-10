<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;

class AuthController extends ApiController
{
    public function login(Request $request)
    {
        if(!Auth::attempt(['email' => $request['email'], 'password' => $request['password']])) {
            return $this->sendErrorResponse('Invalid credentials', 400);
        }
        $user = Auth::user();
        try {
            $token = $this->generateTokenResponse([
                'username' => $request['email'],
                'password' => $request['password'],
            ]);
            return $this->sendSuccessResponse(compact('user', 'token'));
        } catch(\GuzzleHttp\Exception\BadResponseException $e) {
            return $this->sendErrorResponse('Something went wrong on the server', $e->getCode());
        }
        
    }

    public function refreshToken(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'refreshToken' => 'required',
        ]);

        if($validator->fails()) {
            return $this->sendErrorResponse('Refresh token failed!', 400, $validator->errors()->all());
        }

        try {
            $grantType = 'refresh_token';
            $token = $this->generateTokenResponse(
                ['refresh_token' => $request['refreshToken']], 
                $grantType
            );
            return $this->sendSuccessResponse(compact('token'));
        } catch(\GuzzleHttp\Exception\BadResponseException $e) {
            return $this->sendErrorResponse('Something went wrong on the server', $e->getCode());
        }
        
    }

    public function logout()
    {
        $user = Auth::user();
        if($user) {
            $user->tokens->each(function ($token, $key) {
                $token->delete();
            });
            return $this->sendSuccessResponse(['message' => 'User logged out']);
        }
        return $this->sendErrorResponse('Unable to logout user', 401);
    }
}
