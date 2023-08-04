<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>{{ env('APP_NAME') }}</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('libs/fontawesome/css/all.min.css') }} " rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('libs/sbadmin/css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('libs/datatables/dataTables.bootstrap4.min.css') }}">

    @stack('styles')
    <link type="text/css" rel="stylesheet" href="css/styleweb.css" />
</head>

<body id="page-top">
    <!-- HEADER -->
    <header>
        <!-- TOP HEADER -->
        <div id="top-header">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-4" style="text-align: center;">
                        <ul class="header-links pull-right">
                            <li
                                style="font-size: 14px; font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;">
                                <a href="#"><img src="img/iconoweb.png" alt="">&nbsp;&nbsp;PACHAS - DP</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-8" style="text-align: center;">
                        <ul class="header-links pull-right">
                            <li><a href="#"><i class="fa fa-phone"></i>923061507</a></li>
                            <li><a href="#"><i class="fa fa-globe"></i> www.pachasdp.edu.pe</a></li>
                            <li><a href="#"><i class="fas fa-map-marker-alt"></i>Jr. Progreso 118, Independencia,
                                    Huaraz</a></li>
                            <li><a href="#"><i class="fab fa-facebook"></i>Facebook</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

    </header>

    <div class="container">
        <div id="header">
            <div class="row">

                <div class="col-md-12">
                    <div class="header-search">
                        <form>
                            <h2 class="text-center" style="color: #FFF; padding-top: 20px;">Convocatorias</h2>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="container">
        <hr>
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-3">
                <div class="bien">
                    <h2>Bienvenidos</h2>
                </div>
                <div class="descripción">
                    Esta página es informativa, para cada puesto se brinda los enlaces a las fuentes originales. Cada semana revisamos las bolsas de trabajo de las empresas y actualizamos nuestros contenidos. Aclaramos que nosotros no realizamos la selección de personal. 
                </div>
                <hr>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-9">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold" style="color: #03749B">Lista de Convocatorias</h6>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="dt-products" class="table table-striped table-bordered dts">
                                    <thead>
                                        <tr>
                                            <th>Titulo</th>
                                            <th>Tipo</th>
                                            <th>Etapa</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($convocatorias as $convocatoria)
                                            <tr>
                                                <td>{{ $convocatoria->titulo }}</td>
                                                <td>{{ $convocatoria->tipo }}</td>
                                                <td>{{ $convocatoria->getEtapa() }}</td>
                                                <td class="text-center">
                                                    <button type="button" class="btn btn-info btn-sm"
                                                        data-toggle="modal" data-target="#postular{{ $convocatoria->id }}"
                                                        title="Más Información">
                                                        <i class="fa fa-file-pdf"></i>
                                                    </button>
                                                                                                             
                                                        @if ($convocatoria->getEtapa() == 'ABIERTO')
                                                            <a href="{{ route('index.indexpostular', $convocatoria->id) }}"
                                                                class="btn btn-success btn-sm">
                                                                <i class="fa fa-user-edit"></i>
                                                            </a>
                                                            @else

                                                        @endif
                                                </td>

                                            </tr>
                                            @include('postular')
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- FOOTER -->
    <div class="container">
        <footer id="footer">
            <div id="bottom-footer" class="section">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <span class="copyright">
                            <script>
                                document.write(new Date().getFullYear());
                            </script> Derechos Reservados | pachasdp, 2021
                        </span>
                    </div>
                </div>
            </div>
        </footer>
    </div>

    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>


    <script src="{{ asset('libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- Custom scripts for all pages-->
    <script src="{{ asset('libs/sbadmin/js/sb-admin-2.min.js') }}"></script>
    <script src="{{ asset('/libs/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('/libs/datatables/dataTables.bootstrap4.min.js') }}"></script>
    @stack('scripts')
    <script src="{{ asset('js/main.js') }}"></script>

    @include('sweetalert::alert');

    @if (!$errors->isEmpty())
        @if ($errors->has('postular'))
            <script>
                $(function() {
                    $("{{ $errors->first('postular') }}").modal('show');
                });
            </script>
        @elseif ($errors->has('post'))
            <script>
                $(function() {
                    $('#createMdl').modal('show');
                });
            </script>
        @else
            <script>
                $(function() {
                    $('#editMdl').modal('show');
                });
            </script>
        @endif
    @endif



    </div>


</body>

</html>
