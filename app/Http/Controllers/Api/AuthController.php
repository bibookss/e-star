<?php

namespace App\Http\Controllers\Api;

use queue;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Resources\V1\UserResource;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\V1\StoreUserRequest;
use App\Http\Requests\V1\UpdateUserRequest;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Response;

class AuthController extends Controller
{
    public function isAuthenticated()
    {
        return auth()->check();
    }

    public function createUser(StoreUserRequest $request)
    {
        try {
            $email = $request->email;
            $educationalDomains = ['edu', 'ac', 'school', 'college', 'university']; 
            $domain = substr(strrchr($email, "@"), 1);
            $isEducational = preg_match('/\b('.implode('|',$educationalDomains).')\b/i', $domain);

            $user = User::create([
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'is_verified_student' => $isEducational ? true : false,
            ]);



            return response()->json([
                'status' => 201,
                'message' => 'User Created Successfully',
                'token' => $user->createToken("API TOKEN")->plainTextToken
            ])->header('Access-Control-Allow-Origin', 'http://localhost:8000');

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

            if(Auth::attempt($request->only(['email', 'password']))){
                $user = Auth::user();
                // $success['token'] = $user->createToken('API Token')->accessToken;
                // $success['name'] = $user->name;

                return response()->json([
                    'status' => 204,
                    'message' => 'User Logged In Successfully',
                    'user' => $user->email,
                    'token' => $user->createToken("API TOKEN")->plainTextToken
                ])->header('Access-Control-Allow-Origin', 'http://localhost:8000');
            } else {
                return response()->json([
                    'status' => 401,
                    'message' => 'Email & Password does not match with our record.',
                ]);
            }
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

            Session::flush();
            Auth::logout(); 

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
