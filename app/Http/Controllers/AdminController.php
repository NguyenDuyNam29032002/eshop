<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class AdminController extends Controller
{
    public function loginAdmin()
    {
        return view('login');
    }

    public function postLoginAdmin(Request $request)
    {
//        dd(bcrypt('1'));
        $remember = $request->has('remember_key') ? true : false;
        if (auth()->attempt([
            'email' => $request->email,
            'password' => $request->password
        ], $remember))
        {
            return redirect()->to('home');
        };
    }
}
