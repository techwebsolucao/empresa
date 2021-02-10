<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Site demonstração para uma empresa">
    <meta name="author" content="Eduardo Parcianello de Avila">

    <title>Empresa - Dashboard | Cadastrar Produto</title>

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

                <!-- Content Row -->
                <div class="row col-10">
                    @if(empty($countProduto))
                    <form action="{{route('escrever_produto')}}" method="post">
                        <div class="card p-3">
                            <div class="col-sm">
                                @csrf
                                <p class="m-1">Nome do produto:</p>
                                <input class="form-control" required="required" type="text" name="nome_produto">

                                <p class="m-1">Quantidade:</p>
                                <input class="form-control" required="required" type="text" name="quantidade">

                                <p class="m-1">Codigo do produto</p>
                                <input class="form-control" required="required" type="text" name="codigo_produto">

                                <button type="submit" class="btn btn-sm btn-success mt-3">Cadastrar Produto</button>
                            </div>
                        </div>
                    </form>
                    @else
                        <form action="{{route('editar_produto_escrever')}}" method="post">
                            <div class="card p-3">
                                <div class="col-sm">
                                    @csrf
                                    @foreach($produtosEditar as $produtos)
                                        <input hidden name="id" value="{{$produtos->id}}">

                                    <p class="m-1">Nome do produto:</p>
                                    <input class="form-control" required="required" value="{{$produtos->nome}}" type="text" name="nome_produto">

                                    <p class="m-1">Quantidade:</p>
                                    <input class="form-control" required="required" value="{{$produtos->quantidade}}" type="text" name="quantidade">

                                    @endforeach
                                    <button type="submit" class="btn btn-sm btn-primary mt-3">Editar Produto</button>
                                </div>
                            </div>
                        </form>
                        @endif
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

<!-- Page level plugins -->


</body>

</html>
