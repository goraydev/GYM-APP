@extends('layouts.admin')

@section('titulo')
    <span>Criterios</span>
    <ol class="breadcrumb" style="font-size: 14px; background: none">
        <li class="breadcrumb-item"><i class="fas fa-home"></i>&nbsp;<a href="/home">Inicio</a></li>
        <li class="breadcrumb-item"><a href="{{ route('preinscripciones.index') }}">index</a></li>
        <li class="breadcrumb-item active">Criterios</li>
    </ol>
@endsection
@section('contenido')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">

                    <div class="card">
                        <div class="card-header card-header-primary" style="text-align: center; color: black">
                            <h4 class="card-title"> Citerios Mayores y Menores</h4>
                        </div>
                        <div class="row">

                        </div>
                        <div class="row">
                            <div class="col-lg-6 form-group">
                                <div class="row text-center" style="padding: 10px">
                                    <div class="col-lg-12 form-group ">
                                        <img src="{{asset('/img/user.png')}}" style="width: 30%">
                                    </div>
                                    <div class="col-lg-4 form-group">
                                        <p class="card-category">Dni:<br> {{ $preinscripcion->dni }}</p>
                                    </div>
                                    <div class="col-lg-4 form-group">
                                        <p class="card-category">Nombres: <br> {{ $preinscripcion->nombres }}</p>
                                    </div>
                                    <div class="col-lg-4 form-group">
                                        <p class="card-category">Apellidos:<br> {{ $preinscripcion->apellidos }}</p>
                                      </div>
                                </div>
                                
                                @include('criterios.create')
                               
                               
                            </div>
                            <div class="col-lg-6 form-group">
                                @include('criterios.index')
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('libs/datatables/dataTables.bootstrap4.min.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('/libs/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('/libs/datatables/dataTables.bootstrap4.min.js') }}"></script>

@endpush
