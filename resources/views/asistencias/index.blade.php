@extends('layouts.admin')

@section('titulo')
    <span>Asistencia</span>
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
                                    <td>
                                        {{ $alumno->generos->nombre }}
                                    </td>
                                    <td>
                                        <div class="btn-group mb-2 container mx-auto" role="group"
                                            aria-label="Basic example">

                                            <form action="{{ route('asistencias.store') }}" method="post"
                                                class="registrar_asistencia">
                                                @csrf
                                                <input type="number" name="user_id" id="user"
                                                    value="{{ $alumno->id }}" hidden>
                                                <button type="submit" class="btn btn-primary" title="Registrar asistencia">
                                                    <i class="fas fa-list-ul"></i>
                                                </button>
                                            </form>

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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $('.registrar_asistencia').submit(async function(e) {
            e.preventDefault();

            const inputOptions = new Promise((resolve) => {
                setTimeout(() => {
                    resolve({
                        '1': 'Entrada',
                        '2': 'Salida',
                    })
                }, 100)
            })

            const {
                value: color
            } = await Swal.fire({
                title: 'Registrar asistencia',
                input: 'radio',
                inputOptions: inputOptions,
                inputValidator: (value) => {
                    if (!value) {
                        return 'Necesitar realizar una elección'
                    }

                    const inputHidden = document.createElement('input');
                    inputHidden.type = 'number';
                    inputHidden.name = 'control_id';
                    inputHidden.value = value;

                    // Agregar el input oculto al formulario
                    this[0].appendChild(inputHidden);
                    this.submit();
                }
            })

        })
    </script>
@endpush
