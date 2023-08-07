@extends('layouts.admin')

@section('titulo')
    <span>Inscripción</span>
    <ol class="breadcrumb" style="font-size: 14px; background: none">
        <li class="breadcrumb-item"><i class="fas fa-home"></i>&nbsp;<a href="/home">Inicio</a></li>
        <li class="breadcrumb-item"><a href="{{ route('inscripciones.index') }}">index</a></li>
        <li class="breadcrumb-item active">Ver Inscripción</li>
    </ol>
@endsection
@section('contenido')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">

                    <div class="card">
                        <div class="card-header card-header-primary" style="text-align: center; color: black">
                            <h4 class="card-title">Alumno Inscrito</h4>
                        </div>
                        <div class="row">

                        </div>
                        <div class="row">
                            <div class="col-lg-6 form-group">
                                <div class="row text-center" style="padding: 10px">
                                    <div class="col-lg-12 form-group ">
                                        <img src="{{ asset('/img/user.png') }}" style="width: 30%">
                                    </div>
                                    <div class="col-lg-4 form-group">
                                        <p class="card-category">DNI:<br>{{ $preinscrito->dni }} </p>
                                    </div>
                                    <div class="col-lg-4 form-group">
                                        <p class="card-category">Nombres: <br>{{ $preinscrito->nombres }} </p>
                                    </div>
                                    <div class="col-lg-4 form-group">
                                        <p class="card-category">Apellidos:<br>{{ $preinscrito->apellidos }}</p>
                                    </div>
                                </div>
                                <div class="row text-center" style="padding: 10px">
                                    <div class="col-lg-4 form-group">
                                        <p class="card-category">Peso:<br>{{ $preinscrito->peso }} </p>
                                    </div>
                                    <div class="col-lg-4 form-group">
                                        <p class="card-category">Talla: <br>{{ $preinscrito->talla }} </p>
                                    </div>
                                    <div class="col-lg-4 form-group">
                                        <p class="card-category">IMC:<br>{{ $preinscrito->imc }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-5 form-group">
                                <h5 class="text-center my-4">Horario escogido</h5>
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">Día</th>
                                            <th scope="col">Turno</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($dia_turno as $key => $escogidos)
                                            <tr>

                                                <td>
                                                    @foreach ($dias as $dia)
                                                        @if ($dia->id == $escogidos->dia_id)
                                                            <span>{{ $dia->nombre }}</span>
                                                        @endif
                                                    @endforeach
                                                </td>
                                                <td>
                                                    @foreach ($horarios as $horario)
                                                        @if ($horario->id == $escogidos->turno_id)
                                                            <span>{{ $horario->inicio }} - {{ $horario->fin }}</span>
                                                        @endif
                                                    @endforeach
                                                </td>

                                            </tr>
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
