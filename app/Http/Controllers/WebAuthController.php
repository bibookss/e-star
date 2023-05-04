<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class WebAuthController extends Controller {
    public function login(Request $request) {
        $http = new Client([
            'base_uri' => 'http://localhost:8001/api/auth/',
            'headers' => [
                'Accept' => 'application/json',
            ],
        ]);

        $credentials = [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ];

        $response = $http->post('login', [
            'form_params' => [
                'email' => $credentials['email'],
                'password' => $credentials['password'],
            ]
        ]);

        $result = json_decode((string) $response->getBody(), true);        
        
        if ($result['status'] == 204) {
            if (Auth::attempt($credentials)) {
                $token = $result['token'];
                Session::put('token', $token);
            }
        }
        return back();
    }

    public function logout(Request $request) {
        if (Auth::check()) {
            $token = Session::get('token');

            $http = new Client([
                'base_uri' => 'http://localhost:8001/api/auth/',
                'headers' => [
                    'Accept' => 'application/json',
                    'Authorization' => 'Bearer ' . $token,
                ]
            ]);

            $response = $http->post('logout');

            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
        }
        
        $currentUrl = url()->previous();

        if (strpos($currentUrl, 'profile') !== false) {
            return redirect('/');
        }
        return back();
    }

    public function register(Request $request) {
        $http = new Client([
            'base_uri' => 'http://localhost:8001/api/auth/',
            'headers' => [
                'Accept' => 'application/json',
            ],
        ]);

        $credentials = [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ];

        $response = $http->post('register', [
            'form_params' => [
                'email' => $credentials['email'],
                'password' => $credentials['password'],
            ]
        ]);

        $result = json_decode((string) $response->getBody(), true);
        if ($result['status'] == 201) {
            if (Auth::attempt($credentials)) {
                if (Auth::attempt($credentials)) {
                    $token = $result['token'];
                    Session::put('token', $token);
                }
            }
        }
        return back();
    }
}