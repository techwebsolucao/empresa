<?php

namespace App\Http\Controllers;

use App\Models\Produtos;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;

class ProdutosController extends Controller
{
    public function __construct()
    {
        Paginator::useBootstrap();
    }

    public function cadastrarProduto(){
        return view('sistema.Produto');
    }

    public function escreverProduto(Request $request){
        $dados = $request->all();

        try{
            Produtos::create([
                'codigo_produto' => $dados['codigo_produto'],
                'nome' => $dados['nome_produto'],
                'quantidade' => $dados['quantidade'],
                'data' => date('Y-m-d')
            ]);
        }catch (\Exception $e){
            return $e;
        }
        return redirect()->route('cadastrar_produto');
    }

    public function removerProduto(Request $request){
        $dados = $request->all();
    }

    public function listarProduto(){
        $coletarDadosProdutos = DB::table('produtos')->paginate(50);

        return view('sistema.listarProdutos', ['listarProdutosPaginator' => $coletarDadosProdutos]);
    }
}
