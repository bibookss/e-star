<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Dorm;
use App\Models\Post;
use App\Models\Image;
use Illuminate\Http\Request;
use App\Filters\V1\PostsFilter;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\PostResource;
use App\Http\Resources\V1\PostCollection;
use App\Http\Requests\V1\StorePostRequest;
use App\Http\Requests\V1\UpdatePostRequest;

class PostController extends Controller
{
    public function getAllPosts(Request $request)
    {
        try {
            $filter = new PostsFilter();
            $filterItems = $filter->transform($request);

            $posts = Post::where($filterItems);

            return response()->json([
                'status' => 200,
                'message' => 'Successfully retrieved posts.',
                'data' => new PostCollection($posts->get())
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 500,
                'message' => 'Something went wrong.',
                'data' => $e->getMessage()
            ]);
        }
    }

    public function createPost(Request $request)
    {
        try {
            \Log::debug("CREAT POST");
            \Log::debug($request->all());
            
            $data = json_decode($request->jsonData); // convert JSON string to an object            \Log::debug($jsonData);
            
            $user = auth()->user();
            $dorm = Dorm::findOrFail($data->dormId);
            \Log::debug("before post");
            \Log::debug($dorm);
            $newPost = new Post([
                'dorm_id' => $dorm->id,
                'review' => $data->review,
                'location_rating' => $data->locationRating,
                'security_rating' => $data->securityRating,
                'internet_rating' => $data->internetRating,
                'bathroom_rating' => $data->bathroomRating
            ]);
            \Log::debug($newPost);

            $user->posts()->save($newPost);
            $dorm->posts()->save($newPost);

            \Log::debug("afer post");
            $images = $request->images;
            \Log::debug($images);
            foreach ($images as $image) {
                \Log::debug("IMAGE");
                \Log::debug($image);

                $path = $image->store('public/uploads');
                $filename = basename($path);

                $newImage = Image::create([
                    'name' => $image->getClientOriginalName(),
                    'path' => $path,
                    'dorm_id' => $dorm->id,
                    'user_id' => $user->id
                ]);
                
                \Log::debug($newImage);

                $user->images()->save($newImage);
                $dorm->images()->save($newImage);
    
                $imagePaths[] = $newImage->path;
            }

            return response()->json([
                'status' => 201,
                'message' => 'Successfully created post.',
                'data' => new PostResource($newPost)
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'status' => 500,
                'message' => 'Something went wrong.',
                'data' => $e->getMessage()
            ]);
        }
    }

    public function getPost($id)
    {
        try {
            $post = Post::findOrFail($id);

            return response()->json([
                'status' => 200,
                'message' => 'Successfully retrieved post.',
                'data' => new PostResource($post)
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 500,
                'message' => 'Something went wrong.',
                'data' => $e->getMessage()
            ]);
        }
    }

    public function updatePost(UpdatePostRequest $request, $id)
    {
        try {
            $user = auth()->user();
            $post = Post::findOrFail($id);

            if ($user->id !== $post->user_id) {
                return response()->json([
                    'status' => 403,
                    'message' => 'You are not authorized to update this post.'
                ]);
            }

            $post->update([
                'review' => $request->review ?? $post->review,
                'location_rating' => $request->locationRating ?? $post->location_rating,
                'security_rating' => $request->securityRating ?? $post->security_rating,
                'internet_rating' => $request->internetRating ?? $post->internet_rating,
                'bathroom_rating' => $request->bathroomRating ?? $post->bathroom_rating,
            ]);

            return response()->json([
                'status' => 200,
                'message' => 'Successfully updated post.',
                'data' => new PostResource($post)
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 500,
                'message' => 'Something went wrong.',
                'data' => $e->getMessage()
            ]);
        }
    }

    public function deletePost($id)
    {
        try {
            $user = auth()->user();
            $post = Post::findOrFail($id);

            if ($user->id != $post->user_id) {
                return response()->json([
                    'status' => 403,
                    'message' => 'You are not authorized to delete this post.'
                ]);
            }

            $post->delete();
            return response()->json([
                'status' => 204, 
                'message' => 'Post deleted successfully.'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 500,
                'message' => 'Something went wrong.',
                'data' => $e->getMessage()
            ]);
        }
    }
}
