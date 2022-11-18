<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use function Symfony\Component\String\b;

class AdminController extends Controller
{
    public function AdminLogin()
    {
        return view('login');
    }

    public function postloginAdmin(Request $request)
    {
        $remember = $request->has('remember_me') ? true : false;
        if (auth()->attempt([
            'email' => $request->email,
            'password' => $request->password
        ], $remember)){
            return redirect() ->to('home');
        }
    }
}
