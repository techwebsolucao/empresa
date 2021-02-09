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
            abort(500);
        }
        return redirect()->route('cadastrar_produto');
    }

    public function removerProduto(Request $request){
        $dados = $request->all();
        Produtos::destroy($dados['id']);
    }

    public function listarProduto(){
        $coletarDadosProdutos = DB::table('produtos')->paginate(50);
        return view('sistema.listarProdutos', ['listarProdutosPaginator' => $coletarDadosProdutos]);
    }

    public function editarProduto($id){
        $coletarDadosProdutoEditar = DB::table('produtos')->where('id', '=', $id)->get();
        $coletarDadosProdutoEditarCount = DB::table('produtos')->where('id', '=', $id)->count();

        return view('sistema.Produto', ['produtosEditar' => $coletarDadosProdutoEditar, 'countProduto' => $coletarDadosProdutoEditarCount]);
    }

    public function editarProdutoEscrever(Request $request){
        $dados = $request->all();
        DB::table('produtos')->where('id', '=', $dados['id'])
            ->update(['nome' => $dados['nome_produto'], 'quantidade' => $dados['quantidade']]);
        return redirect()->route('listar_produtos');
    }

    public function baixarProdutos(){
        $coletarDadosProdutos = DB::table('produtos')->get();
        return view('sistema.baixaProdutos', ['produtos' => $coletarDadosProdutos]);
    }

    public function baixarProdutosEscrever(Request $request){
        $dados = $request->all();
        $coletar = DB::table('produtos')->whereIn('id', $dados['produtos'])->where('quantidade', '>', $dados['quantidade'])->get();

        foreach($coletar as $tabela){
            DB::table('produtos')
                ->where('id', '=', $tabela->id)
                ->update(['quantidade' => $tabela->quantidade -= $dados['quantidade']]);
        }

        return redirect()->route('');
    }
}
