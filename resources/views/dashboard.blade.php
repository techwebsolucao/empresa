@php
    use Illuminate\Support\Facades\DB;
    $coletarDadosQuantidade = DB::table('produtos')->where('quantidade', '<', '100')->paginate(6);
    $coletarDadosQuantidadeCount = DB::table('produtos')->where('quantidade', '<', '100')->count();
@endphp

<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Site demonstração para uma empresa">
    <meta name="author" content="Eduardo Parcianello de Avila">

    <title>Empresa - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="{{asset('dashboardTemplate/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('dashboardTemplate/css/sb-admin-2.min.css')}}" rel="stylesheet">

</head>

<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    @include('sistema.partes.sidebar')
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            @include('sistema.partes.navbar')
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                    <a href="{{route('cadastrar_produto')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                            class="fas fa-download fa-sm text-white-50"></i> Cadastrar produto</a>
                </div>

                <!-- Content Row -->
                <div class="row">

                    <!-- Pending Requests Card Example -->
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-warning shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                            Estoque abaixo de 100</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{$coletarDadosQuantidadeCount}}</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-cart-plus fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-warning shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                            Baixas Total</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{$countProdutosBaixas}}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-warning shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                            Produtos Total</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{$countProdutosAdicionado}}</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <style>

                </style>
                <div class="row card p-3">
                    <h5 class="ml-2 text-dark">Baixas do dia - @php echo date('Y-m-d') @endphp</h5>
                    {{ $relatorioBaixasDia->links() }}
                    <div class="col-12" style="max-height:400px; overflow-x: auto; ">
                        <table class="table table-hover table-sm table-striped m-0 mb-4">
                            <thead class="bg bg-primary text-white">
                            <tr>
                                <th scope="col">Autor</th>
                                <th scope="col">Descrição</th>
                                <th scope="col">Quantidade</th>
                                <th scope="col">Produtos</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($relatorioBaixasDia as $tabela)
                            <tr>
                                <th>{{$tabela->nome}}</th>
                                <td>{{$tabela->descricao}}</td>
                                <td>{{$tabela->quantidade}}</td>
                                <td>@php
                                    $pegarDadosConvertido = json_decode($tabela->id_produto);
                                    foreach($pegarDadosConvertido as $tabela2){
                                        foreach($produtosInformacao as $tabela3){
                                            if($tabela2 == $tabela3->id){
                                                echo '<a href='.route('editar_produto', ['id' => $tabela3->id]).'>'.$tabela3->nome . '(-'.$tabela->quantidade.') </a>';
                                            }
                                        }
                                    }
                                @endphp</td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                    <h5 class="ml-2 text-dark">Produtos do dia - @php echo date('Y-m-d') @endphp</h5>
                    {{ $relatorioProdutoDia->links() }}
                    <div class="col-12" style="max-height:400px; overflow-x: auto; ">
                        <table class="table table-hover table-sm table-striped m-0">
                            <thead class="bg bg-primary text-white">
                            <tr>
                                <th scope="col">Autor</th>
                                <th scope="col">Descrição</th>
                                <th scope="col">Quantidade</th>
                                <th scope="col">Produto</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($relatorioProdutoDia as $tabela)
                            <tr>
                                <th>{{$tabela->nome}}</th>
                                <td>{{$tabela->descricao}}</td>
                                <td>{{$tabela->quantidade}}</td>
                               @foreach($produtosInformacao as $tabela2)
                                   @if($tabela2->id == $tabela->id_produto)
                                        <td><a href="{{route('editar_produto', ['id' => $tabela->id_produto])}}">{{$tabela2->nome}}</a></td>
                                    @endif
                                @endforeach
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright &copy; Your Website 2020</span>
                </div>
            </div>
        </footer>
        <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Modal -->


<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Você quer realmente sair ?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                <a class="btn btn-primary" href="{{route('logout')}}">Sair</a>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="{{asset('dashboardTemplate/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('dashboardTemplate/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<!-- Core plugin JavaScript-->
<script src="{{asset('dashboardTemplate/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

<!-- Custom scripts for all pages-->
<script src="{{asset('dashboardTemplate/js/sb-admin-2.min.js')}}"></script>


</body>

</html>
