<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EntrarController extends Controller
{
    public function index(){
        return view('dashboard');
    }

    public function logout(){
        if(Auth::check()){
            Auth::logout();
            return redirect()->route('login');
        }
        return redirect()->route('login');
    }
}
