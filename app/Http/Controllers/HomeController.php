<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    public function index()
    {
        $client = new Client([
            'base_uri' => 'http://localhost:8001/api/v1/',
        ]);
        $response = $client->get('dorms');
        $dorms = json_decode($response->getBody()->getContents(), true);

        if (Auth::check()) {
            $user = Auth::user();
            \Log::debug('User authenticated successfull homey');
        } else {
            \Log::debug('User not authenticated sa home');
        }
        
        return view('home', compact('dorms'));
    }
}
