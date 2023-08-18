@extends('layouts.admin')

@section('titulo')
    <span>Perfil de usuario</span>
    <ol class="breadcrumb" style="font-size: 14px; background: none">
        <li class="breadcrumb-item"><i class="fas fa-home"></i>&nbsp;<a href="/home">Inicio</a></li>
        <li class="breadcrumb-item active">perfil de usuario</li>
    </ol>
@endsection
@section('contenido')
    <div class="content">
        <div class="container-fluid">
            <div class="row mb-5">
                <div class="col-md-12">

                    <div class="card">
                        <div class="card-header card-header-primary" style="text-align: center; color: black">
                            <h4 class="card-title">Usuario</h4>
                        </div>
                        <div class="row">


                            <div class="col-xl-2 col-lg-5">
                                <img src="{{ asset('/img/user.png') }}" style="width: 10%, object-fit:cover">
                            </div>
                            <div class="col-xl-8 form-group">
                                <div class="row text-center" style="padding: 10px">

                                    <div class="col-lg-4 form-group">
                                        <p class="card-category">{{ auth()->user()->name }}</p>
                                    </div>

                                </div>

                            </div>
                            <div class="col-xl-8 col-lg-5 form-group mx-auto">
                                <hr>
                                <h5 class="text-center my-4">Actualización de datos</h5>
                                <div class="col-lg-12 form-group">
                                    <form action="{{ route('perfil.update', auth()->user()->id) }}" method="post">
                                        @csrf
                                        @method('put')
                                        <div class="col mb-3">
                                            <label class="text-sm" for="peso">Nuevo nombre:</label>
                                            <input id="nameuser" type="text"
                                                class="form-control form-control-user @error('nameuser') is-invalid @enderror"
                                                name="nameuser_nuevo" value="">
                                            @error('nameuser')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col">
                                            <label class="text-sm" for="peso">Nueva contraseña: </label>
                                            <input id="passworduser" type="password"
                                                class="form-control form-control-user @error('passworduser') is-invalid @enderror"
                                                name="passworduser_nuevo" value="">
                                            @error('passworduser')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>


                                        <div class="card-footer mx-auto my-2">
                                            <div class="buttons-form-submit d-flex justify-content-center">
                                                <a href="{{ route('home') }}" class="btn btn-danger mr-1">
                                                    Cerrar</a>
                                                <a href="{{ route('home') }}" class="btn btn-warning mr-1">
                                                    Cancelar</a>
                                                <button type="submit" href="#" class="btn btn-primary">
                                                    Guardar
                                                </button>
                                            </div>
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
@endsection
