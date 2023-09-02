<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>{{ env('APP_NAME') }}</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('libs/fontawesome/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href=" {{ asset('libs/sbadmin/css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">



</head>

<body class="bg-gradient-primary bg-asistenciaqr">

    <div class="container card-glass">

        <!-- Outer Row -->
        <div class="row justify-content-center">
            <div class="col-xl-12">

                <div class="o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0 card-glass-body">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-1">REGISTRO DE ASISTENCIA AL</h1>
                                        <h1 class="h4 text-gray-900 mb-4">GIMNASIO UNASAM</h1>
                                    </div>


                                    <form class="form-asistencia" method="POST"
                                        action="{{ route('asistenciaqr.store') }}">
                                        @csrf

                                        <div class="form-group row">

                                            <div class="col-md-12">
                                                <input id="dni" type="number" maxlength="8"
                                                    class="form-control form-control-user @error('dni') is-invalid @enderror"
                                                    name="dni_user" value="{{ old('dni') }}" required
                                                    autocomplete="DNI" autofocus placeholder="Ingresar DNI...">

                                                @error('dni')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror

                                            </div>
                                        </div>

                                        <div class="form-group row my-4 d-flex justify-content-center">
                                            <div class="form-check form-check-inline">
                                                <input
                                                    class="form-check-input @error('control_id') is-invalid @enderror"
                                                    type="radio" name="control_id" id="inlineRadio1" value="1"
                                                    required>
                                                <label class="form-check-label" for="inlineRadio1">Entrada</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input
                                                    class="form-check-input @error('control_id') is-invalid @enderror"
                                                    type="radio" name="control_id" id="inlineRadio2" value="2"
                                                    required>
                                                <label class="form-check-label" for="inlineRadio2">Salida</label>
                                            </div>
                                            @error('control_id')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>



                                        <div class="form-group row mb-0">
                                            <div class="col-md-12 offset-md-12">
                                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                                    {{ __('Registrar') }}
                                                </button>

                                            </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    @include('sweetalert::alert')

</body>

</html>
