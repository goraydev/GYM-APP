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
                                <a href="#"><img src="img/logounasam.png" alt="">&nbsp;&nbsp;PACHAS - DP</a>
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
                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Natus itaque similique praesentium et
                    ipsam numquam molestias dicta suscipit consectetur, tempore eaque laudantium, aliquid doloribus quo
                    cumque nihil saepe, error fugiat?
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
                                            <th>Dependencia</th>
                                            <th>Fecha Inscripción</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Tiger Nixon</td>
                                            <td>System Architect</td>
                                            <td>Edinburgh</td>
                                            <td class="text-center">
                                                <a href="verbase" class="btn btn-danger btn-sm" title="Ver Base">
                                                    <i class="fa fa-file-pdf"></i>
                                                </a>
                                                <button type="button" class="btn btn-success btn-sm" data-toggle="modal"
                                                    data-target="#postularModal" title="Postular">
                                                    <i class="fa fa-user-edit"></i>
                                                </button>
                                            </td>
                                        </tr>
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

            <!-- bottom footer -->
            <div id="bottom-footer" class="section">

                <!-- row -->
                <div class="row">
                    <div class="col-md-12 text-center">

                        <span class="copyright">
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            <script>
                                document.write(new Date().getFullYear());
                            </script> Derechos Reservados | pachasdp, 2021
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        </span>


                    </div>
                </div>
                <!-- /row -->

                <!-- /container -->
            </div>
            <!-- /bottom footer -->
        </footer>
    </div>
    <!-- /FOOTER -->

    <!-- jQuery Plugins -->
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


    <!-- Modal -->
    <!-- Modal -->
    <div class="modal animated zoomIn" id="postularModal" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-inspinia text-primary" id="exampleModalLabel">Nueva Plaza</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('pconvocatorias.store') }}" role="form" method="POST"
                        enctype="multipart/form-data" id="createProductFrm">
                        {{ csrf_field() }}

                        <div class="row form-group">

                            <div class="col-lg-12">
                                <label for="titulo" class="form-fields">Titulo</label>
                                <label class="mandatory-field">*</label>
                                <input type="text"
                                    class="form-control {{ $errors->has('titulo') ? 'is-invalid' : '' }}"
                                    name="titulo" id="titulo" value="{{ old('titulo') }}">
                                @if ($errors->has('titulo'))
                                    <span class="text-danger">{{ $errors->first('titulo') }}</span>
                                @endif
                            </div>
                            {{-- <div class="col-lg-12">
                            <label class="text-sm" for="convocatoria_id">Convocatoria</label>
                            <label class="mandatory-field">*</label>
                            <select class="form-control" name="convocatoria_id" id="select_conv">

                            </select>
                        </div> --}}
                        </div>

                        <div class="row form-group">
                            <div class="col-lg-6">
                                <label class="text-sm" for="tipocontrato_id">Tipo de contrato</label>
                                <label class="mandatory-field">*</label>
                                <select
                                    class="form-control {{ $errors->has('tipocontrato_id') ? 'is-invalid' : '' }}"
                                    name="tipocontrato_id">
                                    <option value="1" default>CAS</option>
                                    <option value="2">LOCACION</option>
                                </select>
                                @if ($errors->has('tipocontrato_id'))
                                    <span class="text-danger">{{ $errors->first('tipocontrato_id') }}</span>
                                @endif
                            </div>
                            <div class="col-lg-6">

                                <label for="fecha_apertura" class="form-fields">Fecha de apertura</label>
                                <label class="mandatory-field">*</label>

                                <input type="datetime-local"
                                    class="form-control {{ $errors->has('fecha_apertura') ? 'is-invalid' : '' }}"
                                    name="fecha_apertura" id="fecha_apertura" value="{{ old('fecha_apertura') }}">
                                @if ($errors->has('fecha_apertura'))
                                    <span class="text-danger">{{ $errors->first('fecha_apertura') }}</span>
                                @endif
                            </div>
                            {{-- <div class="col-lg-6">
                            <label class="text-sm" for="etapa_id">Etapa</label>
                            <label class="mandatory-field">*</label>
                            <select class="form-control" name="etapa_id">
                                <option selected>Seleccione...</option>
                                @foreach ($etapas as $etapa)
                                <option value="{{$etapa->id}}">{{$etapa->nombre}}</option>
                                @endforeach
                            </select>
                    </div> --}}
                        </div>
                        <div class="row form-group">


                            <div class="col-lg-6">

                                <label for="fecha_evaluacion" class="form-fields">Fecha de evaluacion</label>
                                <label class="mandatory-field">*</label>

                                <input type="datetime-local"
                                    class="form-control {{ $errors->has('fecha_evaluacion') ? 'is-invalid' : '' }}"
                                    name="fecha_evaluacion" id="fecha_evaluacion"
                                    value="{{ old('fecha_evaluacion') }}">
                                @if ($errors->has('fecha_evaluacion'))
                                    <span class="text-danger">{{ $errors->first('fecha_evaluacion') }}</span>
                                @endif
                            </div>
                            <div class="col-lg-6">
                                <label for="fecha_finaliza" class="form-fields">Fecha de finalizacion</label>
                                <label class="mandatory-field">*</label>
                                <input type="datetime-local"
                                    class="form-control {{ $errors->has('fecha_finaliza') ? 'is-invalid' : '' }}"
                                    name="fecha_finaliza" id="fecha_finaliza" value="{{ old('fecha_finaliza') }}">
                                @if ($errors->has('fecha_finaliza'))
                                    <span class="text-danger">{{ $errors->first('fecha_finaliza') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="row form-group">

                            {{-- <div class="col-lg-6">
                            <label for="base" class="form-fields">Documento</label>
                            <label class="mandatory-field">*</label>
                            <input type="file" accept=".DOCX,.docx,.PDF,.pdf"
                                class="form-control {{ $errors->has('base') ? 'is-invalid' : '' }}" name="base"
                                id="base" value="{{ old('base') }}">
                            @if ($errors->has('base'))
                                <span class="text-danger">{{ $errors->first('base') }}</span>
                            @endif
                        </div> --}}

                        </div>


                        <div class="buttons-form-submit d-flex justify-content-end">
                            <button type="button" class="btn btn-secondary mr-1" data-dismiss="modal">Cerrar</button>
                            <button type="submit" href="#" class="btn btn-primary">
                                Guardar
                                <i class="fas fa-spinner fa-spin d-none"></i>
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>


</body>

</html>
