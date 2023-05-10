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
        $token = Session::get('token');

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

        $images = $request->file('images');
        $multipart = [];
        if ($images != null) {
            foreach ($images as $image) {
                $multipart[] = [
                    'name' => 'images[]',
                    'contents' => fopen($image->getPathname(), 'r'), 
                    'filename' => $image->getClientOriginalName() 
                ];
            }
        }

        $postResponse = $httpPost->post('/api/v1/posts', [
            'multipart' => array_merge($multipart, [
                [
                    'name' => 'jsonData',
                    'contents' => json_encode($data)
                ]
            ])
        ]);
        
        $postResult = json_decode((string) $postResponse->getBody(), true);
        return back();
    }

    public function editPost(Request $request, $post) {
        $token = Session::get('token');

        $httpPost = new Client([
            'base_uri' => 'http://localhost:8001/api/v1/posts',
            'headers' => [
                'Accept' => 'application/json',
                'Authorization' => 'Bearer ' . $token,
            ],
        ]);

        $data = [
            'postId' => $post,
            'review' => $request->input('review'),
            'locationRating' => $request->input('locationRating'),
            'securityRating' => $request->input('securityRating'),
            'internetRating' => $request->input('internetRating'),
            'bathroomRating' => $request->input('bathroomRating'),
        ]; 

        $postResponse = $httpPost->patch('/api/v1/posts/' . $post, [
            'json' => $data
        ]);

        $postResult = json_decode((string) $postResponse->getBody(), true);       

        return back();
    }

    public function deletePost(Request $request, $post) {
        $token = Session::get('token');

        $httpPost = new Client([
            'base_uri' => 'http://localhost:8001/api/v1/posts',
            'headers' => [
                'Accept' => 'application/json',
                'Authorization' => 'Bearer ' . $token,
            ],
        ]);

        $postResponse = $httpPost->delete('/api/v1/posts/' . $post);

        $postResult = json_decode((string) $postResponse->getBody(), true);       
    
        return back();
    }
}
