@extends('layouts.admin')

@section('titulo')
    <span>Medida de progreso</span>
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
                            <th class="text-center">Peso Actual</th>
                            <th class="text-center">Talla</th>
                            <th class="text-center">IMC Actual</th>
                            <th class="text-center">Genero</th>
                            <th class="text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($alumnospre_inscritos as $key => $alumno)
                            @if ($alumno->activo == '1')
                                <tr>
                                    <td>
                                        {{ $key + 1 }}
                                    </td>
                                    <td>
                                        {{ $alumno->dni }}
                                    </td>
                                    <td>
                                        {{ $alumno->nombres }}
                                    </td>
                                    <td>{{ $alumno->apellidos }}</td>
                                    <td>{{ $alumno->peso }}</td>
                                    <td>{{ $alumno->talla }}</td>
                                    <td>{{ $alumno->imc }}</td>
                                    <td>
                                        {{ $alumno->generos->nombre }}
                                    </td>
                                    <td>
                                        <div class="btn-group mb-3 container mx-auto" role="group"
                                            aria-label="Basic example">
                                            <a href="{{ url('reporte_progreso/alumno', $alumno->id) }}">
                                                <button type="button" class="btn btn-dark btn-sm mr-1"
                                                    title="Ver inscripcion">
                                                    <i class="fa fa-solid fa-eye"></i>
                                                </button>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>

                </table>
            </div>
        </div>
        <div>

        </div>
    </div>
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('libs/datatables/dataTables.bootstrap4.min.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('/libs/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('/libs/datatables/dataTables.bootstrap4.min.js') }}"></script>
@endpush
