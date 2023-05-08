<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    

    public function show(Request $request)
    {
        if (Auth::check()) {
            $id = Auth::user()->id;
            $token = Session::get('token');            
            $client = new Client([
                'base_uri' => 'http://localhost:8001/api/v1/',
                'headers' => [
                    'Authorization' => 'Bearer ' . $token,
                    'Accept' => 'application/json',
                ],
            ]);

            $response = $client->get('users/'.$id.'?includePosts=true');
            $data = json_decode((string) $response->getBody(), true);        

            return view('profile')->with('data', $data['data']);
        } 

        return redirect('/');
    }
}
