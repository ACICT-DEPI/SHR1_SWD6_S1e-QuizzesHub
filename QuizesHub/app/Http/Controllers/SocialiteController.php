<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\Admin\User;
use Illuminate\Support\Facades\Auth;
use Exception;
use Illuminate\Support\Str;

class SocialiteController extends Controller
{
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback($provider)
    {
        try{
            $user = Socialite::driver($provider)->user();

            $user = User::firstOrCreate(
                ['email' => $user->getEmail()],
                [
                    'fname' => explode(' ', $user->getName())[0],
                    'lname' => explode(' ', $user->getName())[1] ?? '',
                    'username' => explode('@', $user->getEmail())[0],
                    'provider_id' => $user->getId(),
                    'provider' => $provider,
                    'password' => bcrypt($user->getEmail().Str::random(10))
                ]
            );

            Auth::login($user, true);

            return redirect()->to('/');
        } catch (Exception $e) {
            return redirect()->to('/register');
            // dd($e->getMessage());
        }

    }
}
