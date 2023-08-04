@extends('layouts.admin')

@section('contenido')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title text-center">Detalle de Operacion</h4>

                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <p class="card-category">Recponsable: {{ $operaciones->responsable }}</p>
                                    </div>
                                </div>
                                <div class="col-12 col-md-3 ">
                                    <div class="form-group">
                                        <p class="card-category">Celular: {{ $operaciones->celular }}</p>
                                    </div>
                                </div>
                                <div class="col-12 col-md-3">
                                    <div class="form-group">
                                        <p class="card-category">Fecha: {{ $operaciones->fecha_prestamo }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-md-3">
                                    <div class="form-group">
                                        <p class="card-category">Equipo: {{ $operaciones->Equipos->nombre }}</p>
                                    </div>
                                </div>
                                <div class="col-12 col-md-3 ">
                                    <div class="form-group">
                                        <p class="card-category">Area: {{ $operaciones->areas->nombre }}</p>
                                    </div>
                                </div>
                                <div class="col-12 col-md-3">
                                    <div class="form-group">
                                        <p class="card-category">Estado: {{ $operaciones->estados->nombre }}</p>
                                    </div>
                                </div>
                                <div class="col-12 col-md-3">
                                    <div class="form-group">
                                        <p class="card-category">Tipo de Operacion: {{ $operaciones->toperaciones->nombre }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-center">
                                <div class="button-container">
                                    <a href="{{ route('operaciones.index') }}" class="btn btn-sm btn-success mr-3">
                                        Volver </a>
                                </div>
                            </div>
                        </div>
                   

                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('libs/datatables/dataTables.bootstrap4.min.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('/libs/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('/libs/datatables/dataTables.bootstrap4.min.js') }}"></script>


    <script>
        function editmd(iditem) {
            $('#editModal' + iditem).modal('show');
            console.log('presionado');
        }
    </script>

    @if (!$errors->isEmpty())
        @if ($errors->has('post'))
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
@endpush
