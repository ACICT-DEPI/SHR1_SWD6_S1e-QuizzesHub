<?php

namespace App\Http\Controllers\Api\Admin;

use App\Helpers\ApiHelper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\User;
use App\Http\Resources\UserResource;
use App\Http\Requests\Admin\UserRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::get();
        if(count($users) > 0){
            $users = UserResource::collection($users);
            return ApiHelper::getResponse(200, 'Users found', $users);
        }else{
            return ApiHelper::getResponse(200, 'Users not found');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        $data = $request->validated();
        $user = User::create($data);
        if($user){
            $user = new UserResource($user);
            return ApiHelper::getResponse(201, 'User created', $user);
        }else{
            return ApiHelper::getResponse(200, 'User not created');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::find($id);
        if($user){
            $user= new UserResource($user);
            return ApiHelper::getResponse(200, 'User found', $user);
        }else{
            return ApiHelper::getResponse(200, 'User not found');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, string $id)
    {
        // dd($request->validated());
        $data = $request->validated();
        $user = User::find($id);
        if($user){
            // $user = $user->update($data);
            $user->update([
                'fname' => $request->fname,
                'lname' => $request->lname,
                'username' => $request->username,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'image_path' => $request->image_path,
                'phone' => $request->phone,
                'gender' => $request->gender,
                'university_id' => $request->university_id,
                'faculty_id' => $request->faculty_id,
                'major_id' => $request->major_id,
                'level_id' => $request->level_id,
            ]);
            if($user){
                $user = new UserResource($user);
                return ApiHelper::getResponse(201, 'User Updated', $user);
            }
        }
        else{
            return ApiHelper::getResponse(200, 'User not Updated');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);
        if($user){
            $user = $user->delete();
            if($user){
                return ApiHelper::getResponse(200, 'User deleted');
            }
        }else{
            return ApiHelper::getResponse(200, 'User not deleted');
        }
    }
}
