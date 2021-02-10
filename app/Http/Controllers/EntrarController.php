<?php

namespace App\Http\Controllers;

use App\Models\Relatorio;
use App\Models\User;
use Database\Factories\RelatorioFactory;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Tests\Feature\BuscarRelatorio;

class EntrarController extends Controller
{
    public function __construct()
    {
        Paginator::useBootstrap();
    }

    public function index(){

        //Adicionar Produto Relatorio - Dia
        $buscarInformacoesProduto = DB::table('relatorios')
            ->where('opcao', '=', 'add')
            ->where('data', '=', date('Y-m-d'))
            ->paginate(15);

        //Baixar estoque Relatorio - Dia
        $buscarInformacoesBaixas = DB::table('relatorios')
            ->where('opcao', '=', 'remove')
            ->where('data', '=' , date('Y-m-d'))
            ->paginate(15);

        $produtosInformacao = DB::table('produtos')->get();
        $produtosInformacaoCountBaixas = DB::table('relatorios')->where('opcao','=', 'remove')->count();
        $produtosInformacaoCountAdicionado = DB::table('relatorios')->where('opcao','=', 'add')->count();

        return view('dashboard', [
            'relatorioProdutoDia' => $buscarInformacoesProduto,
            'relatorioBaixasDia' => $buscarInformacoesBaixas,
            'produtosInformacao' => $produtosInformacao,
            'countProdutosBaixas' => $produtosInformacaoCountBaixas,
            'countProdutosAdicionado' => $produtosInformacaoCountAdicionado,
        ]);
    }

    public function indexView(){
        return redirect()->route('login');
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
