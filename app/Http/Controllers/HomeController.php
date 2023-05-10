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
        $response = $client->get('dorms?includeImages=true');
        $dorms = json_decode($response->getBody()->getContents(), true);
        
        return view('home', compact('dorms'));
    }
}
