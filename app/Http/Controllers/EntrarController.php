<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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
            'password' => 'required'
        ]);

        if($validator->fails()){
            return response()->json(['status_code' => 400, 'mensagem' => 'Bad Request']);
        }

        $crede = request(['email', 'password']);
        if(!Auth::attempt($crede)){
            return response()->json(['status_code' => 500, 'mensagem' => 'Não autorizado']);
        }

        $user = User::where('email', $request->email)->first();
        $tokenResultado = $user->createToken('authToken')->plainTextToken;

        return response()->json(['status_code' => 200, 'token' => $tokenResultado]);
    }

    public function logoutApi(Request $request){
       $request->user()->currentAccessToken()->delete();

        return response()->json(['status_code' => 200, 'mensagem' => 'Deslogado.']);

    }
}
