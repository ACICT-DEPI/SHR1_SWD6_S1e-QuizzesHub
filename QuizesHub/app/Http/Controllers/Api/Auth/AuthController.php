<?php

namespace App\Http\Controllers\Api\Auth;

use App\Helpers\ApiHelper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Admin\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'fname' => 'required|string',
            'lname' => 'required|string',
            'username' => 'required|string|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8',
            'gender' => 'required|in:M,F',
            'university_id' => 'required|integer|exists:universities,id',
            'faculty_id' => 'required|integer|exists:faculties,id',
            'major_id' => 'required|integer|exists:majors,id',
            'level_id' => 'required|integer|exists:levels,id',
        ]);

        if ($validator->fails()) {
            return ApiHelper::getResponse(422, 'Validation error', $validator->errors());
        }

        $user = User::create([
            'fname' => $request->fname,
            'lname' => $request->lname,
            'username' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'gender' => $request->gender,
            'university_id' => $request->university_id,
            'faculty_id' => $request->faculty_id,
            'major_id' => $request->major_id,
            'level_id' => $request->level_id,
        ]);
        $token = $user->createToken('api_token');
        $data['user'] = $user;
        $data['token'] = $token->plainTextToken;
        if ($user) {
            return ApiHelper::getResponse(201, 'User registered successfully', $data);
        } else {
            return ApiHelper::getResponse(500, 'Internal server error');
        }
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        if ($validator->fails()) {
            return ApiHelper::getResponse(422, 'Validation error', $validator->errors());
        }

        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();
            $token = $user->createToken('api_token');
            $data['user'] = $user;
            $data['token'] = $token->plainTextToken;
            return ApiHelper::getResponse(200, 'User logged in successfully', $data);
        } else {
            return ApiHelper::getResponse(200, 'not valid email or password');
        }


    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return ApiHelper::getResponse(200, 'Logged out successfully');
    }

}
