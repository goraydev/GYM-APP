@extends('layouts.admin')

@section('titulo')
    <span>Reporte por dia</span>

@endsection

@section('contenido')
<div class="card">
    <div class="table-responsive">
        
        <div class="card-body">
                <div class="row">
                    <div class="col-12 col-md-4 text-center">
                        <span>Fecha de Consulta: <b> </b></span>
                        <div class="form-group">
                            <strong>{{\Carbon\Carbon::now()->format('d/m/Y')}}</strong>
                        </div>
                    </div>
                    <div class="col-12 col-md-4 text-center">
                        <span>Cantidad de registro: <b> </b></span>
                        <div class="form-group">
                            <strong>{{$operaciones->count()}}</strong>
                        </div>
                    </div>
                    <div class="col-12 col-md-4 text-center">
                        <div class="form-group">
                            <button class="btn btn-danger" type="button"><i class="fas fa-file-pdf"></i>
                               Imprimir Reporte
                              </button>
                        </div>
                    </div>
                    </div>
              
                <table id="dt-products" class="table table-striped table-bordered dts">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">Responsable</th>
                            <th class="text-center">Celular</th>
                            <th class="text-center">F. Prestamo</th>
                            <th class="text-center">F. Devolucion</th>
                            <th class="text-center">Equipo</th>
                            <th class="text-center">Area</th>
                            <th class="text-center">Estado</th>
                            <th class="text-center">T. Operacion</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($operaciones as $key => $operacion)
                            <tr class="text-center">
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $operacion->responsable }}</td>
                                <td>{{ $operacion->celular }}</td>
                                <td>{{ $operacion->fecha_prestamo }}</td>
                                <td>{{ $operacion->fecha_devolucion }}</td>
                                <td>{{ $operacion->Equipos->nombre }}</td>
                                <td>{{$operacion->areas->nombre}}</td>
                                <td>{{$operacion->estados->nombre}}</td>
                                <td>{{$operacion->toperaciones->nombre}}</td>
                              
                            </tr>

                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Modal -->


@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('libs/datatables/dataTables.bootstrap4.min.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('/libs/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('/libs/datatables/dataTables.bootstrap4.min.js') }}"></script>


    <script>
        function editmd(iditem) {
           $('#editModal'+iditem).modal('show');
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
