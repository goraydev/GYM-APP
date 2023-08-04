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

</head>

<body class="bg-gradient-primary" style="background-image: url('img/fondo.png')">

    <div class="container">

                    <!-- Nested Row within Card Body -->
            <div class="row justify-content-center">

                <div class="col-xl-6 col-lg-6 col-md-6">
                    <div class="card o-hidden border-0 shadow-lg my-5">
                        <div class="card-body p-0">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Crear Cuenta</h1>
                                </div>
                                <form class="user" method="POST" action="{{ route('register') }}">
                                    @csrf

                                    <div class="form-group row">
                                        <div class="col-md-12">
                                            <input id="name" type="text"
                                                class="form-control form-control-user @error('name') is-invalid @enderror"
                                                name="name" value="{{ old('name') }}" required autocomplete="name"
                                                autofocus placeholder="Nombres">

                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">

                                        <div class="col-md-12">
                                            <input id="email" type="email"
                                                class="form-control form-control-user @error('email') is-invalid @enderror"
                                                name="email" value="{{ old('email') }}" required autocomplete="email"
                                                placeholder="Ingresar Email">

                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <input id="password" type="password"
                                                class="form-control form-control-user @error('password') is-invalid @enderror"
                                                name="password" required autocomplete="new-password"
                                                placeholder="Ingresar contraseña">

                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <input id="password-confirm" type="password"
                                                class="form-control form-control-user" name="password_confirmation"
                                                required autocomplete="new-password" placeholder="Confirmar contraseña">
                                        </div>
                                    </div>
                                    <hr>

                                    <div class="form-group row mb-0">
                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-primary btn-user btn-block">
                                                {{ __('Registrar Cuenta') }}
                                            </button>
                                        </div>
                                    </div>
                                </form>
                                <hr>
                                <div class="text-center">
                                    <a class="small" href="{{ route('password.request') }}">¿Has olvidado tu
                                        contraseña?</a>
                                </div>
                                <div class="text-center">
                                    <a class="small" href="{{ route('login') }}">¿Ya tienes una cuenta? ¡Acceso!</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <script src="{{ asset('libs/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('libs/sbadmin/js/sb-admin-2.min.js') }}"></script>

</body>

</html>
