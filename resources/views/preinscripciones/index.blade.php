@extends('layouts.admin')

@section('titulo')
    <span>Pre Inscripción</span>

    <a href="{{ route('preinscripciones.create') }}" class="btn btn-success btn-rectangle">
        <i class="fas fa-plus"></i>
    </a>
@endsection

@section('contenido')
    {{-- @include('marcas.modals.create') --}}


    <div class="card">
        <div class="table-responsive">

            <div class="card-body">
                <table id="dt-products" class="table table-striped table-bordered dts">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">Dni</th>
                            <th class="text-center">Nombres</th>
                            <th class="text-center">Apellidos</th>
                            <th class="text-center">Genero</th>
                            <th class="text-center">Estado</th>
                            <th class="text-center">Examinar</th>
                            <th class="text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($preinscripcion as $key => $pre)
                            <tr class="text-center">
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $pre->dni }}</td>
                                <td>{{ $pre->nombres }}</td>
                                <td>{{ $pre->apellidos }}</td>
                                <td>{{ $pre->generos->nombre }}</td>
                                <td style="width: 10%" class="text-center text-sm">
                                    @if ($pre->activo == '1')
                                        <span class="badge badge-success">activo</span>
                                    @else
                                        <span class="badge badge-danger">inactivo</span>
                                    @endif
                                </td>
                                <td style="width: 5px">
                                    <a href="{{ url('Preinscripcion/criterio', [$pre->id]) }}"> <img
                                            title="Evaluación de Criterios" src="img/evaluacion.png" alt=""
                                            style="width: 50%"></a>
                                </td>
                                <td>

                                    @if ($pre->activo == '1')
                                        <a href="{{ url('pre/altabaja', [$pre->activo, $pre->id]) }}"><button type="button"
                                                class="btn btn-warning btn-sm" title="desactivar el estado de pre"><i
                                                    class="fa fa-arrow-circle-down"></i></button></a>
                                    @else
                                        <a href="{{ url('pre/altabaja', [$pre->activo, $pre->id]) }}"><button type="button"
                                                class="btn btn-dark btn-sm" title="activar el estado de pre"><i
                                                    class="fa fa-arrow-circle-up"></i></button></a>
                                    @endif
                                    <a href="{{ url('Preinscripcion/editar', $pre->id) }}">
                                        <button type="button" class="btn btn-success btn-sm" title="Editar pre">
                                            <i class="fa fa-edit"></i>
                                        </button>
                                    </a>
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                        data-target="#deleteModal{{ $pre->id }}" title="eliminar pre">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </td>
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
@endpush
