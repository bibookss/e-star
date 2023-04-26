<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Dorm;
use App\Models\Post;
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

    public function createPost(StorePostRequest $request)
    {
        try {
            $user = auth()->user();
            $dorm = Dorm::findOrFail($request->dormId);

            $newPost = new Post([
                'dorm_id' => $dorm->id,
                'review' => $request->review,
                'location_rating' => $request->locationRating,
                'security_rating' => $request->securityRating,
                'internet_rating' => $request->internetRating,
                'bathroom_rating' => $request->bathroomRating,
            ]);

            $user->posts()->save($newPost);
            $dorm->posts()->save($newPost);

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
