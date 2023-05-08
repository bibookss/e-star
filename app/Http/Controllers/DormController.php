<?php

namespace App\Http\Controllers;

use App\Models\Dorms;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;

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
            'headers' => [
                'Accept' => 'application/json',
            ],
        ]);
        $response = $client->get('filter?'.$queryString);
        $dorms = json_decode($response->getBody()->getContents(), true);      

        return view ('dorms', compact('dorms'));
    }

    public function addDorm(Request $request) {
        \Log::debug("Controller ka na!");
        $token = Session::get('token');

        $httpLocation = new Client([
            'base_uri' => 'http://localhost:8001/api/v1/locations',
            'headers' => [
                'Accept' => 'application/json',
                'Authorization' => 'Bearer ' . $token,
            ],
        ]);

        $data = [
            'name' => $request->input('name'),
            'barangay' => $request->input('barangay'),
            'city' => $request->input('city'),
            'street' => $request->input('city')
        ];

        \Log::debug("Token: ". $token);

        \Log::debug($data);

        // Search for loation if it exists, create otherwise
        $address = '?barangay[eq]='. $data['barangay'] . '&city[eq]=' .$data['city']
                    . '&street[eq]=' . $data['street'];

        \Log::debug("Query String: " . $address);

        $locationResponse = $httpLocation->get($address);

        $locationResult = json_decode((string) $locationResponse->getBody(), true);        

        if (empty($locationResult['data'])) {
            \Log::debug("Walang location, gagawa pa lang!");
            // Create location
            $locationResponse = $httpLocation->post('/api/v1/locations', [
                'json' => [
                    'barangay' => $data['barangay'],
                    'city' => $data['city'],
                    'street' => $data['street']
                ]
            ]);

            $locationResult = json_decode((string) $locationResponse->getBody(), true);        
        } 

        $httpDorm = new Client([
            'base_uri' => 'http://localhost:8001/api/v1/dorms',
            'headers' => [
                'Accept' => 'application/json',
                'Authorization' => 'Bearer ' . $token,
            ],
        ]);

        $response = $httpDorm->post('/api/v1/dorms', [
            'json' => [
                'name' => $data['name'],
                'locationId' => $locationResult['data'][0]['locationId']
            ]
        ]);

        $result = json_decode((string) $response->getBody(), true);        

        // change to dorm
        return back();
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
