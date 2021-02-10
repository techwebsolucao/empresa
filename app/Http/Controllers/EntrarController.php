<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

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

    public function login(Request $request){
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|'
        ]);

        if($validator->fails()){
            return response()->json(['status_code' => 400, 'mensagem' => 'Bad Request']);
        }

        $crede = request(['email', 'password']);
        if(!Auth::attempt($crede)){
            return response()->json(['status_code' => 500, 'mensagem' => 'Não autorizado']);
        }
    }
}
