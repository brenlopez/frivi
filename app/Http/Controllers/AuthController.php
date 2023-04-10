<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
// use Illuminate\Http\Request;
// use App\Http\Request;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }
}
