<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class PostController extends Controller
{
    public function createPost(Request $request, $dorm)
    {
        \Log::debug('POST CONTROLLER KA');

        $token = Session::get('token');

        \Log::debug($token);

        // $dorm = $request->route('dorm');

        \Log::debug($dorm);

        $httpPost = new Client([
            'base_uri' => 'http://localhost:8001/api/v1/posts',
            'headers' => [
                'Accept' => 'application/json',
                'Authorization' => 'Bearer ' . $token,
            ],
        ]);

        $data = [
            'dormId' => $dorm,
            'review' => $request->input('review'),
            'locationRating' => $request->input('locationRating'),
            'securityRating' => $request->input('securityRating'),
            'internetRating' => $request->input('internetRating'),
            'bathroomRating' => $request->input('bathroomRating'),
        ];

        \Log::debug($data);

        $postResponse = $httpPost->post('/api/v1/posts', [
            'json' => $data
        ]);

        $postResult = json_decode((string) $postResponse->getBody(), true);        

        return back();
    }
}
