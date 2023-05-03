<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class WebAuthController extends Controller {
    public function login(Request $request) {
        $http = new Client();

        $email = $request->email;
        $password = $request->password;

        $response = $http->post('http://localhost:8001/api/auth/login', [
            'headers' => [
                'Accept' => 'application/json',
                'Authorization' => 'Bearer ' . session()->get('token')
            ],
            'query' => [
                'email' => $email,
                'password' => $password
            ]
        ]);

        $result = json_decode((string) $response->getBody(), true);
        $credentials = [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ];

        \Log::debug($result['token']);

        if ($result['status'] == 204) {
            if (Auth::attempt($credentials)) {
                \Log::debug('User authenticated successfull dotp after g 204');
                $token = $result['token'];
                return response()->json([
                    'status' => 200,
                    'message' => 'User authenticated successfully',
                    'user' => Auth::user()->email,
                    'token' => $token
                ]);
            }
        }
    }

    public function logout(Request $request) {
        if (Auth::check()) {

            $http = new Client();

            \Log::debug(Auth::user()->email);
            \Log::debug($request->bearerToken());
            \Log::debug($request->headers->all());


            $response = $http->post('http://localhost:8001/api/auth/logout', [
                'headers' => [
                    'Accept' => 'application/json',
                    'Authorization' => 'Bearer ' . $request->bearerToken()
                ]
            ]);


            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return response()->json([
                'status' => 200,
                'message' => 'User logged out successfully'
            ]);
        }
    }
}