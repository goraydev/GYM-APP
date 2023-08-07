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
                                    <div class="btn-group mb-3" role="group" aria-label="Basic example">
                                        <a href="{{ url('inscripcion/editar', $inscripcion->id) }}">
                                            <button type="button" class="btn btn-success btn-sm mr-1"
                                                title="Editar inscripcion">
                                                <i class="fa fa-edit"></i>
                                            </button>
                                        </a>
                                        <form action="{{ route('inscripcion.destroy', $inscripcion->id) }}" method="POST"
                                            class="eliminar_inscripcion">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger btn-sm ml-1"
                                                title="Eliminar inscripción" id="eliminar_inscri_button">
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $('.eliminar_inscripcion').submit(function(e) {
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
