<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Resources\V1\UserResource;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\V1\StoreUserRequest;
use App\Http\Requests\V1\UpdateUserRequest;

class AuthController extends Controller
{
    public function createUser(StoreUserRequest $request)
    {
        try {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'is_verified_student' => false
            ]);

            return response()->json([
                'status' => 201,
                'message' => 'User Created Successfully',
                'token' => $user->createToken("API TOKEN")->plainTextToken
            ]);

        } catch (\Throwable $th) {
            return response()->json([
                'status' => 500,
                'message' => $th->getMessage()
            ]);
        }
    }

    public function loginUser(Request $request)
    {
        try {
            $validateUser = Validator::make($request->all(), 
            [
                'email' => 'required|email',
                'password' => 'required'
            ]);

            if($validateUser->fails()){
                return response()->json([
                    'status' => 401,
                    'message' => 'validation error',
                    'errors' => $validateUser->errors()
                ]);
            }

            if(!Auth::attempt($request->only(['email', 'password']))){
                return response()->json([
                    'status' => 401,
                    'message' => 'Email & Password does not match with our record.',
                ]);
            }

            $user = User::where('email', $request->email)->first();

            return response()->json([
                'status' => 204,
                'message' => 'User Logged In Successfully',
                'token' => $user->createToken("API TOKEN")->plainTextToken
            ]);

        } catch (\Throwable $th) {
            return response()->json([
                'status' => 500,
                'message' => $th->getMessage()
            ]);
        }
    }

    public function logoutUser(Request $request)
    {
        try {
            auth()->user()->tokens()->delete();

            return response()->json([
                'status' => 204,
                'message' => 'User Logged Out Successfully',
            ]);

        } catch (\Throwable $th) {
            return response()->json([
                'status' => 500,
                'message' => $th->getMessage()
            ]);
        }
    }

    public function updateUser(UpdateUserRequest $request)
    {
        try {
            $user = auth()->user();
            $user->update([
                'name' => $request->name ?? $user->name,
                'email' => $request->email ?? $user->email,
            ]);

            return response()->json([
                'status' => 201,
                'message' => 'Successfully updated user.',
                'data' => new UserResource($user)
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 500,
                'message' => 'Something went wrong.',
                'data' => $e->getMessage()
            ]);
        }
    }

    public function changePassword(Request $request)
    {
        try {
            $user = auth()->user();

            $validateUser = Validator::make($request->all(), 
            [
                'currentPassword' => 'required',
                'newPassword' => 'required'
            ]);

            if (Hash::check($request->currentPassword, $user->password)) { 
                $user->update([
                    'password' => Hash::make($request->newPassword)
                ]);
    
                return response()->json([
                    'status' => 201,
                    'message' => 'Successfully updated user.',
                    'data' => new UserResource($user)
                ]);
            } else {
                return response()->json([
                    'status' => 401,
                    'message' => 'Current password does not match with our record.',
                ]);
            }

        } catch (\Exception $e) {
            return response()->json([
                'status' => 500,
                'message' => 'Something went wrong.',
                'data' => $e->getMessage()
            ]);
        }
    }

    public function deleteUser()
    {
        try {
            $user = auth()->user();
            $user->delete();

            return response()->json([
                'status' => 204,
                'message' => 'Successfully deleted user.',
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
