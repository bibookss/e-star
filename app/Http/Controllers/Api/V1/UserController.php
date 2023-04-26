<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\User;
use Illuminate\Http\Request;
use App\Filters\V1\UsersFilter;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\UserResource;
use App\Http\Resources\V1\UserCollection;
use App\Http\Requests\V1\UpdateUserRequest;

class UserController extends Controller
{
    public function getAllUsers()
    {
        try {
            $filter = new UsersFilter();
            $filterItems = $filter->transform(request());

            $includePosts = request()->query('includePosts');

            $users = User::where($filterItems);

            if ($includePosts === 'true') {
                $users = User::with('posts')->where($filterItems);
            }

            return response()->json([
                'status' => 200,
                'message' => 'Successfully retrieved users.',
                'data' => new UserCollection($users->get())
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 500,
                'message' => 'Something went wrong.',
                'data' => $e->getMessage()
            ]);
        }
    }

    public function getUser($id)
    {
        try {
            $user = User::findOrFail($id);

            $includePosts = request()->query('includePosts');
            if ($includePosts === 'true') {
                $user->loadMissing('posts');
            }

            $data = new UserResource($user);

            return response()->json([
                'status' => 200,
                'message' => 'Successfully retrieved user.',
                'data' => $data
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
