<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{

    public function login()
    {
        return view (view:"auth.login");
    }

    public function index()
    {
        return view (view:"welcome");
    }

    function LoginPost(Request $request) {

        $request->validate([
            "email" => "required|email",
            "password" => "required",
        ]);

        // Get the credentials
        $credentials = $request->only(['email', 'password']);

        // Attempt to log the user in
        if (Auth::attempt($credentials)) {
            return redirect()->intended(route('home'));
        }

      
        return redirect()->back()->with("error", "Login failed");
    }

function logout()
{
    Auth::logout();
    return redirect(route("login"));
}

    function creates(){
        return view (view:"auth.register");
    }

    function registerPost(Request $request){
        $request->validate([
            "fullname" => "required",
            "email" => "required|unique:users,email",
            "password" => [
                'required',
                'min:8',
                'regex:/[a-z]/',
                'regex:/[A-Z]/',
                'regex:/[0-9]/',
                'regex:/[@$!%*#?&]/',
            ],
        ]);

        $user = new User();
        $user->name = $request->fullname;
        $user->email = $request->email;
        $user->password = Hash::make(value:$request->password);
        if($user->save()){
            Auth::login($user); // Use Auth::login() to log in the newly registered user
            return redirect(route(name:"home"));
        }
        return redirect()->back()->with("error", "Failed to create account");
    }
}

