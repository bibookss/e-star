<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show($id)
    {
        $client = new Client([
            'base_uri' => 'http://localhost:8001/api/v1/',
        ]);

        $response = $client->get('users/'.$id.'?includePosts=true');
        $user = json_decode($response->getBody()->getContents(), true);
        return view('profile', compact('user'));
    }

    public function create() 
    {
        return view('');
    }
}
