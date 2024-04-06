<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GitHubController extends Controller
{
    //redirect
    public function redirect()
    {
        return Socialite::driver('github')->redirect();
    }

    // login 
    public function login()
    {
        $github_user = Socialite::driver("github")->stateless()->user();
        $user = User::where("google_id",$github_user->getId())->first();
        if(!$user)
        {
            $new_user = User::create([
                'user_name' => $github_user->name,
                'google_id' => $github_user->id,
                'second_email' => $github_user->email,
                'avatar' => $github_user->avatar,
                'jwt_token' => $github_user->token,
            ]);
            Auth::login($new_user);
            return redirect('/redirect');
        }
        Auth::login($user);
        return redirect('/redirect');
    }
}
