@extends('layouts.admin')

@section('titulo')
    <span>Asistencias registradas</span>
    <ol class="breadcrumb" style="font-size: 14px; background: none">
        <li class="breadcrumb-item"><i class="fas fa-home"></i>&nbsp;<a href="/home">Inicio</a></li>
        <li class="breadcrumb-item"><a href="{{ route('asistencias.index') }}">index</a></li>
        <li class="breadcrumb-item active">asistencia de alumno</li>
    </ol>
@endsection
@section('contenido')
    <div class="content">
        <div class="container-fluid">
            <div class="row mb-5">
                <div class="col-md-12">

                    <div class="card">
                        <div class="card-header card-header-primary" style="text-align: center; color: black">
                            <h4 class="card-title">Alumno Inscrito</h4>
                        </div>

                        <div class="d-flex justify-content-around">
                            <img src="{{ asset('/img/user.png') }}" style="width: 10%, object-fit:cover">
                            <div class="col-lg-8 form-group">
                                <div class="row text-center" style="padding: 10px">
                                    <div class="col-lg-12 form-group ">
                                    </div>
                                    <div class="col-lg-4 form-group">
                                        <p class="card-category">DNI:<br>{{ $datosalumno->dni }} </p>
                                    </div>
                                    <div class="col-lg-4 form-group">
                                        <p class="card-category">Nombres: <br>{{ $datosalumno->nombres }} </p>
                                    </div>
                                    <div class="col-lg-4 form-group">
                                        <p class="card-category">Apellidos:<br>{{ $datosalumno->apellidos }}</p>
                                    </div>
                                </div>
                                <div class="row text-center" style="padding: 10px">
                                    <div class="col-lg-4 form-group">
                                        <p class="card-category">Peso:<br>{{ $datosalumno->peso }} </p>
                                    </div>
                                    <div class="col-lg-4 form-group">
                                        <p class="card-category">Talla: <br>{{ $datosalumno->talla }} </p>
                                    </div>
                                    <div class="col-lg-4 form-group">
                                        <p class="card-category">IMC:<br>{{ $datosalumno->imc }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <h5 class="mt-4 mb-4 mx-auto text-center">Asistencias registradas</h5>
                            <div class="table-responsive">

                                <div class="card-body">
                                    <table id="dt-products" class="table table-striped table-bordered dts">
                                        <thead>
                                            <tr>
                                                <th class="text-center">#</th>
                                                <th class="text-center">Tipo</th>
                                                <th class="text-center">Fecha y hora</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($asistencias as $key => $asistencia)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>
                                                        @foreach ($controles as $control)
                                                            @if ($control->id == $asistencia->control_id)
                                                                <span>{{ $control->nombre }}</span>
                                                            @endif
                                                        @endforeach
                                                    </td>
                                                    <td>
                                                        {{ $asistencia->created_at }}
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>

                                    </table>
                                </div>
                            </div>
                            <div>

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
