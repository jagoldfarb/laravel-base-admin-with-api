<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\User;
use Validator;

class UserController extends ApiController
{
    public function profile()
    {
        $user = Auth::guard('api')->user();
        return $this->sendSuccessResponse(compact('user'));
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
            'password_confirmation' => 'required|same:password'
        ]);

        if($validator->fails()) {
            return $this->sendErrorResponse('Register failed!', 400, $validator->errors()->all());
        }

        $data = $request->all();
        $data['password'] = Hash::make($data['password']);
        $user = User::create($data);
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
}
