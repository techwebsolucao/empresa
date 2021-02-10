<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Site demonstração para uma empresa">
    <meta name="author" content="Eduardo Parcianello de Avila">

    <title>Empresa - Dashboard | Dar baixa</title>

    <!-- Custom fonts for this template-->
    <link href="{{asset('dashboardTemplate/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('dashboardTemplate/css/sb-admin-2.min.css')}}" rel="stylesheet">
    <link href="{{asset('dashboardTemplate/bootstrap/css/bootstrap-select.css')}}" rel="stylesheet">

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

                <div class="card p-3 mb-4" style="max-height:400px; overflow-x: auto; ">

                    <table class="table table-hover table-sm table-striped m-0 " >
                        <thead class="bg bg-primary text-white">
                        <tr>
                            <th scope="col">Codigo do produto</th>
                            <th scope="col">Nome produto</th>
                            <th scope="col">Quantidade em estoque</th>
                        </thead>
                        <tbody>

                        @foreach($produtos as $produto)
                            <tr>
                                <th scope="row">{{$produto->codigo_produto}}</th>
                                <td>{{$produto->nome}}</td>
                                <td>{{$produto->quantidade}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

                    <form action="{{route('baixar_produtos_escrever')}}" method="post">
                        @csrf
                        <div class="row card p-2 m-auto">

                            <div class="col-1">
                                <label>Quantidade:</label>
                                <input class="form-control" name="quantidade" placeholder="Quantidade" type="text">
                            </div>
                            <div class="col-sm mt-2">
                                <select class="selectpicker" data-size="5" name="produtos[]" multiple>
                                    @foreach($produtos as $tabela)
                                        <option value="{{$tabela->id}}">{{$tabela->nome}} - Codigo:{{$tabela->codigo_produto}}  Quantidade:{{$tabela->quantidade}}</option>
                                    @endforeach
                                </select>
                                <button type="submit" class="col-1 btn btn-sm btn-success">Enviar</button>

                            </div>
                        </div>
                    </form>

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
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
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
<script src="{{asset('dashboardTemplate/bootstrap/js/bootstrap-select.js')}}"></script>
<script src="{{asset('dashboardTemplate/bootstrap/i18n/defaults-pt_BR.js')}}"></script>

<!-- Page level plugins -->


</body>

</html>
