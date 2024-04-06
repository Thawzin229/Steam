<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    //redirect
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    // login 
    public function login()
    {
        $google_user = Socialite::driver("google")->stateless()->user();
        $user = User::where("google_id",$google_user->getId())->first();
        if(!$user)
        {
            $new_user = User::create([
                'user_name' => $google_user->getName(),
                'google_id' => $google_user->getId(),
                'email' => $google_user->getEmail(),
                'avatar' => $google_user->avatar,
                'jwt_token' => $google_user->token,
            ]);
            Auth::login($new_user);
            return redirect('/redirect');
        }
        Auth::login($user);
        return redirect('/redirect');
    }
}
