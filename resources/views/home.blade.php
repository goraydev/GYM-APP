<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>{{ env('APP_NAME') }}</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('/libs/fontawesome/css/all.min.css') }} " rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('/libs/sbadmin/css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('/libs/datatables/dataTables.bootstrap4.min.css') }}">

    @stack('styles')
    <link type="text/css" rel="stylesheet" href="/css/styleweb.css">
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
                                <a href="#"><img src="/img/iconoweb.png" alt="">&nbsp;&nbsp;PACHAS - DP</a>
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
        <hr>
    </header>
    <div class="container">
        <div id="header">
            <div class="row">

                <div class="col-md-12">
                    <div class="header-search">
                        <form>
                            <h2 class="text-center" style="color: #FFF; padding-top: 15px;">Ingresar sus Datos</h2>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="row justify-content-center">
            <div class="col-3"></div>
            <div class="col-md-6 col-sm-6" style="border: 2px solid #999999;
            border-radius: 25px; padding: 20px">

                <div class="col-md-12 py-3 text-center">
                    <div class="h7 small text-muted ml-3">{{ $convocatoria->titulo }}</div>
                </div>
                <div class="col-md-12 pt-4">
                    <form action="{{ route('index.postular', $convocatoria->id) }}" role="form" method="POST"
                        enctype="multipart/form-data" id="createProductFrm">
                        {{ csrf_field() }}
                        <div class="row form-group">
                            <div class="col-lg-6 form-group">
                                <div>
                                    <label for="dni" class="form-fields">dni</label>
                                    <label class="mandatory-field">*</label>
                                    <input type="text"
                                        class="form-control {{ $errors->has('dni') ? 'is-invalid' : '' }}" name="dni"
                                        id="dni" value="{{ old('dni') }}">
                                    @if ($errors->has('dni'))
                                        <span class="text-danger">{{ $errors->first('dni') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-6 form-group">
                                <div>
                                    <label for="nombres" class="form-fields">Nombres</label>
                                    <label class="mandatory-field">*</label>
                                    <input type="text"
                                        class="form-control {{ $errors->has('nombres') ? 'is-invalid' : '' }}"
                                        name="nombres" id="nombres" value="{{ old('nombres') }}">
                                    @if ($errors->has('nombres'))
                                        <span class="text-danger">{{ $errors->first('nombres') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-lg-6 form-group">
                                <div>
                                    <label for="apellidos" class="form-fields">Apellidos</label>
                                    <label class="mandatory-field">*</label>
                                    <input type="text"
                                        class="form-control {{ $errors->has('apellidos') ? 'is-invalid' : '' }}"
                                        name="apellidos" id="apellidos" value="{{ old('apellidos') }}">
                                    @if ($errors->has('apellidos'))
                                        <span class="text-danger">{{ $errors->first('apellidos') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-6 form-group">
                                <div>
                                    <label for="correo" class="form-fields">Correo electronico</label>
                                    <label class="mandatory-field">*</label>
                                    <input type="text"
                                        class="form-control {{ $errors->has('correo') ? 'is-invalid' : '' }}"
                                        name="correo" id="correo" value="{{ old('correo') }}">
                                    @if ($errors->has('correo'))
                                        <span class="text-danger">{{ $errors->first('correo') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-lg-12 form-group">
                                <div>
                                    <label for="archivo" class="form-fields">Curriculum Vitae</label>
                                    <label class="mandatory-field">*</label>
                                    <input type="file"
                                        class="form-control {{ $errors->has('archivo') ? 'is-invalid' : '' }}"
                                        name="archivo" id="archivo" value="{{ old('archivo') }}">
                                    @if ($errors->has('archivo'))
                                        <span class="text-danger">{{ $errors->first('archivo') }}</span>
                                    @endif
                                </div>
                            </div>

                        </div>


                        <div class="buttons-form-submit d-flex justify-content-center">
                            <a href="/" class="btn btn-danger mr-1" data-dismiss="modal"><i class="fas fa-reply"></i> Volver</a>&nbsp;&nbsp;&nbsp;
                            <button type="submit" href="#" class="btn btn-success">
                                <i class="fas fa-save"> Registrarse</i>
                                
                            </button>
                        </div>

                    </form>
                </div>
            </div>
            <div class="col-3"></div>
        </div>
<hr>
        <footer id="footer">
            <!-- bottom footer -->
            <div id="bottom-footer" class="section">
                <div class="container">
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
                </div>
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


    <script src="{{ asset('/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- Custom scripts for all pages-->
    <script src="{{ asset('/libs/sbadmin/js/sb-admin-2.min.js') }}"></script>

</body>

</html>
