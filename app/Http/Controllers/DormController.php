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

        // Get pagination parameters from the request
        $perPage = $request->input('perPage', 10) ? $request->input('perPage', 10) : 10;
        $page = $request->input('page', 1) ? $request->input('page', 1) : 1;

        $response = $client->get('dorms?includeImages=true&' . 'perPage=' . $perPage * $page );
        $dorms = json_decode($response->getBody()->getContents(), true);      

        usort($dorms['data'], function($a, $b) {
            return $b['overallRating'] <=> $a['overallRating'];
        });
            
        return view ('dorms', [
            'dorms' => $dorms,
            'perPage' => $perPage,
            'page' => $page
        ]);
    }

    public function search(Request $request)
    {
        $client = new Client([
            'base_uri' => 'http://localhost:8001/api/v1/search',
        ]);

        // Get pagination parameters from the request
        $perPage = $request->input('perPage', 12);
        $page = $request->input('page', 1);

        $queryString = $request->input('q');

        $response = $client->get('?address[LIKE]='.$queryString.'&includeImages=true&perPage=' . $perPage * $page);
        $dorms = json_decode($response->getBody()->getContents(), true);      

        return view ('dorms', [
            'dorms' => $dorms,
            'perPage' => $perPage,
            'page' => $page,
            'request' => $request->all(),
        ]);
    }

    public function filter(Request $request) 
    {
        $ratingType = $request->input('ratingType');
        $ratingValue = $request->input('ratingValue');
        $queryString = $ratingType.'Rating[gte]='.$ratingValue;

        // Get pagination parameters from the request
        $perPage = $request->input('perPage', 12);
        $page = $request->input('page', 1);


        $client = new Client([
            'base_uri' => 'http://localhost:8001/api/v1/search/',
            'headers' => [
                'Accept' => 'application/json',
            ],
        ]);

        $response = $client->get('filter?'.$queryString . '&includeImages=true&perPage=' . $perPage * $page);
        $dorms = json_decode($response->getBody()->getContents(), true);  
        
        return view ('dorms', [
            'dorms' => $dorms,
            'perPage' => $perPage,
            'page' => $page,
            'request' => $request->all(),
        ]);    }

    public function addDorm(Request $request) {
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
            'street' => $request->input('street')
        ];

        // Search for loation if it exists, create otherwise
        $address = '?barangay[eq]='. $data['barangay'] . '&city[eq]=' .$data['city']
                    . '&street[eq]=' . $data['street'];


        $locationResponse = $httpLocation->get($address);
        $locationResult = json_decode((string) $locationResponse->getBody(), true);        
        
        if (empty($locationResult['data'])) {
            // Create location
            $locationResponse = $httpLocation->post('/api/v1/locations', [
                'json' => [
                    'barangay' => $data['barangay'],
                    'city' => $data['city'],
                    'street' => $data['street']
                ]
            ]);

            $locationResult = json_decode((string) $locationResponse->getBody(), true);        
            $id = $locationResult['data']['locationId'];
        } else {
            $id = $locationResult['data'][0]['locationId'];
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
                'locationId' => $id
            ]
        ]);

        $result = json_decode((string) $response->getBody(), true);        

        return redirect('http://localhost:8000/dorms/'.$result['data']['dormId']);
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
        $response = $client->get('dorms/'.$id.'?includePosts=true&includeImages=true');
        $dorm = json_decode($response->getBody()->getContents(), true);      

        if ($dorm['status'] == 500) {
            return redirect('http://localhost:8000/dorms');
        }

        return view ('dorm', compact('dorm')); 
    }

    public function edit(Dorms $dorms)
    {
    }

    public function destroy(Dorms $dorms)
    {
    }
}
