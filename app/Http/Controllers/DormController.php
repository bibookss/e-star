<?php

namespace App\Http\Controllers;

use App\Models\Dorms;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

class DormController extends Controller
{
    public function index(Request $request)
    {
        // $queryString = http_build_query($request->all());
        $client = new Client([
            'base_uri' => 'http://localhost:8001/api/v1/',
        ]);
        $response = $client->get('dorms');
        $dorms = json_decode($response->getBody()->getContents(), true);      

        return view ('dorms', compact('dorms'));
    }

    public function search(Request $request)
    {
        $queryString = $request->address;
        $client = new Client([
            'base_uri' => 'http://localhost:8001/api/v1/search',
        ]);

        $response = $client->get('?address[LIKE]='.$queryString);
        $dorms = json_decode($response->getBody()->getContents(), true);      

        return view ('dorms', compact('dorms'));
    }

    public function filter(Request $request) 
    {
        $queryString = http_build_query($request->all());
        $client = new Client([
            'base_uri' => 'http://localhost:8001/api/v1/',
        ]);
        $response = $client->get('filter?'.$queryString);
        $dorms = json_decode($response->getBody()->getContents(), true);      

        return view ('dorms', compact('dorms'));
    }

    public function create()
    {
        return view ('createDorm');
    }

    public function show($id)
    {
        $client = new Client([
            'base_uri' => 'http://localhost:8001/api/v1/',
        ]);
        $response = $client->get('dorms/'.$id.'?includePosts=true');
        $dorm = json_decode($response->getBody()->getContents(), true);      

        return view ('dorm', compact('dorm')); 
    }

    public function edit(Dorms $dorms)
    {
    }

    public function destroy(Dorms $dorms)
    {
    }
}
