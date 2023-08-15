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
                        <a href="{{ route('exportpreins') }}" class="btn btn-success mb-2">
                            Exportar data <i class="far fa-file-excel"></i>
                        </a>
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
                                    <a href="{{ url('preinscripcion/criterio', [$pre->id]) }}"> <img
                                            title="Evaluación de Criterios" src="img/evaluacion.png" alt=""
                                            style="width: 50%"></a>
                                </td>
                                <td>

                                    <div class="btn-group mb-3" role="group" aria-label="Basic example">
                                        @if ($pre->activo == '1')
                                            <a href="{{ url('preinscripcion/altabaja', [$pre->activo, $pre->id]) }}">
                                                <button type="button" class="btn btn-warning btn-sm mr-1"
                                                    title="desactivar el estado de pre"><i
                                                        class="fa fa-arrow-circle-down"></i>
                                                </button>
                                            </a>
                                        @else
                                            <a href="{{ url('preinscripcion/altabaja', [$pre->activo, $pre->id]) }}">
                                                <button type="button" class="btn btn-dark btn-sm mr-1"
                                                    title="activar el estado de pre"><i class="fa fa-arrow-circle-up"></i>
                                                </button>
                                            </a>
                                        @endif
                                        <a href="{{ url('preinscripcion/editar', $pre->id) }}">
                                            <button type="button" class="btn btn-success btn-sm" title="Editar pre">
                                                <i class="fa fa-edit"></i>
                                            </button>
                                        </a>

                                        <form action="{{ route('preinscripcion.destroy', $pre->id) }}" method="POST"
                                            class="eliminar_pre">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger btn-sm ml-1" title="Eliminar pre"
                                                id="eliminar_pre_button">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $('.eliminar_pre').submit(function(e) {
            e.preventDefault();
            Swal.fire({
                title: '¿Estás seguro?',
                text: "No será posible revertir esta acción",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sí, eliminar'
            }).then((result) => {
                if (result.isConfirmed) {

                    this.submit();

                }
            })
        })
    </script>
@endpush
