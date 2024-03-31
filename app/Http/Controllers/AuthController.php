<?php

namespace App\Http\Controllers;

use App\Events\UserRegister;
use App\Models\User;
use Inertia\Inertia;
use App\Mail\UserMail;
use App\Rules\NameOrEmail;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    //Register
    public function RegisterPage()
    {
        return Inertia::render("auth/register");
    }

    public function Register(Request $request)
    {
        $data = $request->validate([
            'user_name' => ['required','string',],
            'email' => ['required','email'],
            'password' => ['required','min:8','regex:/[A-Z]/','regex:/[a-z]/','regex:/[0-9]/','regex:/[!@#$%^&*]/','confirmed']
        ]);

        $user = User::create($data);

        User::where("email",$data['email'])->update(['remember_token' => Str::random(40)]);
        $token = User::where("email",$data['email'])->first()->remember_token;
        Mail::to($request->email)->send(new UserMail($token));
        event(new UserRegister($user->user_name));
        
        return redirect('/auth/loginpage');
    }
    
    // Login
    
    public function LoginPage()
    {
        return Inertia::render('auth/login');
    }

    // login 

    public function Login(Request $request)
    {
        $data = $request->validate([
            'user_input' => ['required', new NameOrEmail ],
            'password' => ['required','min:8','max:16']
        ]);
        $user = User::orwhere("user_name",$request->user_input)->orwhere('email',$request->user_input)->first();
        if($user && Hash::check($request->password,$user->password))
        {
            Auth::login($user);
            $token = JWTAuth::fromUser($user);
            User::where('id',Auth::user()->id)->update(['jwt_token' => $token]);
            return redirect('/redirect');
        }else{
            return back()->withErrors(['status'=> 'Your crediential are incorrect.']);
        }
    }

    // logout 
    public function Logout()
    {
        Auth::logout();

        return redirect('/auth/loginpage');
    }
    // redirectt
    public function redirect()
    {
        if(Auth::user()->role === 'user'){
            return redirect('/user/home');
        }
        return redirect('/admin/home');
    }


    // forgetpassword
    public function forgetpassword()
    {
        return Inertia::render('auth/forget-password');
    }   

    //post function 
    public function Fp(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email|'
        ]);

        if($user =  User::where('email',$request->email)->first())
        {
            $token = $user->jwt_token ?? $user->remember_token;
            Mail::to($request->email)->send(new UserMail($token));
            return redirect('auth/forget-password/token/' . $user->id);
        }else{
            return back()->withErrors(['message' => 'Try again , no eamil found.']);
        }
    }

    // token receiver page 
    public function token($id)
    {
        return Inertia::render('auth/forget-password-token',["id"=> $id]);
    }

    // check the matched token 
    public function check_token(Request $request)
    {
              $data = $request->validate([
            'token' => 'required|string|max:7000',
            'id' =>  'required|numeric|exists:users,id'
        ]);
        $user = User::where('id', $request->id)->where('jwt_token', $request->token)->orwhere('remember_token',$request->token)->first();
        if($user)
        {
            return redirect('auth/forget-password/change-password/' . $user->id);
        }else{
            return back()->withErrors(['message' => 'Token is invalid to proceed']);
        }

    }

    // chwcge passwoed pagee 
    public function changepage($id)
    {
        return Inertia::render('auth/forget-password-change',["id"=> $id]);
    }

    // change the password in action 
    public function changePass(Request $request)
    {
        $data = $request->validate([
            'password' => ['required', 'min:8','max:16', 'regex:/[A-Z]/', 'regex:/[a-z]/', 'regex:/[0-9]/', 'regex:/[!@#$%^&*]/',],
            'id' =>  'required|numeric|exists:users,id',
        ]);

        User::where('id', $request->id)->update(['password' => Hash::make($request->password)]);
        return redirect('/');
    }
}
