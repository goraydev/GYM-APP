@extends('layouts.admin')

@section('titulo')
    <span>Operacion</span>

    <a href="" class="btn btn-danger btn-circle" data-toggle="modal" data-target="#createMdl">
        <i class="fas fa-plus"></i>
    </a>
@endsection

@section('contenido')
    @include('operaciones.modals.create')


    <div class="card">
        <div class="table-responsive">

            <div class="card-body">
                <table id="dt-products" class="table table-striped table-bordered dts">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">Responsable</th>
                            <th class="text-center">Celular</th>
                            <th class="text-center">F. Devolucion</th>
                            <th class="text-center">Equipo</th>
                            <th class="text-center">Area</th>
                            <th class="text-center">T. Operacion</th>
                            <th class="text-center">Estado</th>
                            <th class="text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($operaciones as $key => $operacion)
                            <tr class="text-center">
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $operacion->responsable }}</td>
                                <td>{{ $operacion->celular }}</td>
                                <td>{{ $operacion->fecha_devolucion }}</td>
                                <td>{{ $operacion->Equipos->nombre }}</td>
                                <td>{{ $operacion->areas->nombre }}</td>

                                <td>{{ $operacion->toperaciones->nombre }}</td>
                                <td style="width: 10%" class="text-center text-sm">
                                    @if ($operacion->activo == '1')
                                        <span class="badge badge-success">activo</span>
                                    @else
                                        <span class="badge badge-danger">inactivo</span>
                                    @endif
                                </td>
                                <td>

                                    @if ($operacion->activo == '1')
                                        <a href="{{ url('Operacion/altabaja', [$operacion->activo, $operacion->id]) }}"><button
                                                type="button" class="btn btn-warning btn-sm"
                                                title="desactivar el estado de operacion"><i
                                                    class="fa fa-arrow-circle-down"></i></button></a>
                                    @else
                                        <a href="{{ url('Operacion/altabaja', [$operacion->activo, $operacion->id]) }}"><button
                                                type="button" class="btn btn-dark btn-sm"
                                                title="activar el estado de operacion"><i
                                                    class="fa fa-arrow-circle-up"></i></button></a>
                                    @endif
                                    <a href="{{ url('Operacion/imprimir', $operacion->id) }}"
                                        class="btn btn-dark  btn-sm"><i class="fas fa-file-pdf"></i></a>

                                    <a href="{{ route('operaciones.show', $operacion->id) }}" class="btn btn-info  btn-sm">
                                        <i class="fas fa-eye"></i></a>

                                    <button type="button" class="btn btn-success btn-sm" data-toggle="modal"
                                        title="Editar operacion" onclick="editmd({{ $operacion->id }})">
                                        <i class="fa fa-edit"></i>
                                    </button>

                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                        data-target="#deleteModal{{ $operacion->id }}" title="eliminar operacion">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </td>
                            </tr>

                            @include('operaciones.modals.update')
                            @include('operaciones.modals.delete')
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
        @endif

        @if ($errors->has('put'))
            <script>
                $(function() {
                    $('#editMdl').modal('show');
                });
            </script>
        @endif
    @endif
    @if (Session::has('buscar'))
        <script>
            $(function() {
                $('#createMdl').modal('show');
            });
        </script>
    @endif
@endpush
