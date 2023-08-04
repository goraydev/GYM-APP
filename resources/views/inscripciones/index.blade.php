@extends('layouts.admin')

@section('titulo')
    <span>Incripcion</span>

    <a href="{{ route('inscripciones.create') }}" class="btn btn-success btn-rectangle">
        <i class="fas fa-plus"></i>
    </a>
@endsection

@section('contenido')
    {{-- @include('marcas.modals.create') --}}

    <div class="row">

    </div>
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
                            <th class="text-center">N° Recibo</th>
                            <th class="text-center">Pago</th>
                            <th class="text-center">Inscribir</th>

                            <th class="text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($inscripciones as $key => $inscripcion)
                            <tr class="text-center">
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $inscripcion->dni }}</td>
                                <td>{{ $inscripcion->nombres }}</td>
                                <td>{{ $inscripcion->apellidos }}</td>
                                <td>{{ $inscripcion->n_recibo }}</td>
                                <td style="width: 10%" class="text-center text-sm">
                                    @if ($inscripcion->estado == '1')
                                        <span class="badge badge-success">Con pago</span>
                                    @else
                                        <span class="badge badge-danger">Sin Pago</span>
                                    @endif
                                </td>
                                <td style="width: 5px">

                                    @if ($inscripcion->estado == '1')
                                        <span class="badge badge-success"> Ya Esta Inscrito</span>
                                    @else
                                        <span><a href="{{ url('inscripciones/create', [$inscripcion->id]) }}"> <img
                                                    title="Inscribir Usuario" src="img/inscripcion.png" alt=""
                                                    style="width: 40%"></a> </span>
                                    @endif

                                </td>

                                <td>

                                    @if ($inscripcion->activo == '1')
                                        <a
                                            href="{{ url('inscripcion/altabaja', [$inscripcion->activo, $inscripcion->id]) }}"><button
                                                type="button" class="btn btn-warning btn-sm"
                                                title="desactivar el estado de inscripcion"><i
                                                    class="fa fa-arrow-circle-down"></i></button></a>
                                    @else
                                        <a
                                            href="{{ url('inscripcion/altabaja', [$inscripcion->activo, $inscripcion->id]) }}"><button
                                                type="button" class="btn btn-dark btn-sm"
                                                title="activar el estado de inscripcion"><i
                                                    class="fa fa-arrow-circle-up"></i></button></a>
                                    @endif
                                    <button type="button" class="btn btn-success btn-sm" data-toggle="modal"
                                        data-target="#editModal{{ $inscripcion->id }}" title="Editar inscripcion">
                                        <i class="fa fa-edit"></i>
                                    </button>
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                        data-target="#deleteModal{{ $inscripcion->id }}" title="eliminar inscripcion">
                                        <i class="fa fa-trash"></i>
                                    </button>
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
    <!-- Modal -->
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('libs/datatables/dataTables.bootstrap4.min.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('/libs/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('/libs/datatables/dataTables.bootstrap4.min.js') }}"></script>
@endpush
