<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use App\Models\Admin\User;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function register()
    {
        return view('auth.register');
    }

    public function handleRegister(Request $request)
    {
        // return $request->all();
        $data= $request->validate([
            'fname' => 'required',
            'lname' => 'required',
            'username' => 'required|unique:users,username',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
            'gender' => 'required|in:M,F',
        ]);
        // $password = Hash::make($request->password);
        // $data['password'] = $password;
        // $user = User::create($data);

        // $user = User::create([
        //     'fname' => $request->fname,
        //     'lname' => $request->lname,
        //     'username' => $request->username,
        //     'email' => $request->email,
        //     'password' => bcrypt($request->password),
        //     'gender' => $request->gender,
        // ]);

        // Auth::login($user);
        return redirect()->route('admin.home');
    }
}
