<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;

class RelatorioController extends Controller
{
    public function __construct()
    {
        Paginator::useBootstrap();
    }

    public function buscarBaixa(Request $request){
        $dados = $request->all();
        $relatorio = DB::table('relatorios')
           ->where('opcao', '=', $dados['opcao'])
           ->where('data', '=', $dados['data'])
           ->get();
        $relatorioCount = DB::table('relatorios')
            ->where('opcao', '=', $dados['opcao'])
            ->where('data', '=', $dados['data'])
            ->count();

        return view('sistema.relatorioVi', ['relatorio' => $relatorio, 'relatorioCount' => $relatorioCount]);
    }
}
