<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function generateTokenResponse($data, $grantType = 'password') {
        $params = [
            'client_id' => config('services.passport.client_id'),
            'client_secret' => config('services.passport.client_secret'),
            'grant_type' => $grantType,
            'scope' => ''
        ];
        $params = array_merge($params, $data);
        $client = new \GuzzleHttp\Client();
        $response = $client->post(config('services.passport.login_endpoint'), [
            'form_params' => $params,
        ]);
       return json_decode((string) $response->getBody(), true);
    }

    public function sendSuccessResponse($data, $code = 200) {
        $response = ['success' => true];
        $response = array_merge($response, $data);
        return response()->json($response, $code);
    }

    public function sendErrorResponse($message, $code = 404, $errors = []) {
        $response = [
            'success' => false,
            'message' => $message,
            'errors' => $errors
        ];
        return response()->json($response, $code);
    }
}
