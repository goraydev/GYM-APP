@extends('layouts.admin')

@section('titulo')
    <span>Criterios</span>
    <ol class="breadcrumb" style="font-size: 14px; background: none">
        <li class="breadcrumb-item"><i class="fas fa-home"></i>&nbsp;<a href="/home">Inicio</a></li>
        <li class="breadcrumb-item"><a href="{{ route('preinscripciones.index') }}">index</a></li>
        <li class="breadcrumb-item active">Criterios</li>
    </ol>
@endsection
@section('contenido')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">

                    <div class="card">
                        <div class="card-header card-header-primary" style="text-align: center; color: black">
                            <h4 class="card-title"> Citerios Mayores y Menores</h4>
                        </div>
                        <div class="row">

                        </div>
                        <div class="row">
                            <div class="col-lg-6 form-group">
                                <div class="row text-center" style="padding: 10px">
                                    <div class="col-lg-12 form-group ">
                                        <img src="{{ asset('/img/user.png') }}" style="width: 30%">
                                    </div>
                                    <div class="col-lg-4 form-group">
                                        <p class="card-category">Dni:<br> {{ $preinscripcion->dni }}</p>
                                    </div>
                                    <div class="col-lg-4 form-group">
                                        <p class="card-category">Nombres: <br> {{ $preinscripcion->nombres }}</p>
                                    </div>
                                    <div class="col-lg-4 form-group">
                                        <p class="card-category">Apellidos:<br> {{ $preinscripcion->apellidos }}</p>
                                    </div>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('precriterios.store') }}" method="post" class="form-horizontal">
                                        @csrf
                                        <div class="row">
                                            <div class="col-lg-12 form-group">
                                                <div>
                                                    <input type="text" hidden name="preinscripcion_id"
                                                        value="{{ $preinscripcion->id }}">
                                                    <label class="text-sm" for="gruposanguineo_id">Criterios:
                                                        *</label>
                                                    <select class="form-control" name="criterio_id">
                                                        <option value="">Seleecione</option>
                                                        @foreach ($criterios as $criterio)
                                                            <option value="{{ $criterio->id }}">{{ $criterio->nombre }}
                                                            </option>
                                                        @endforeach
                                                    </select>

                                                    @error('criterio_id')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <hr>
                                                <h5 style="text-align: center; color: black">Opciones</h5>
                                                <hr>

                                                <div class="form-check text-center">
                                                    @foreach ($opciones as $opcion)
                                                        <input type="radio" id="opcion_id" class="form-check-input"
                                                            name="opcion_id" value="{{ $opcion->id }}">
                                                        <label for="genderM"
                                                            class="form-check-label">{{ $opcion->nombre }}</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                    @endforeach
                                                </div>
                                            </div>
                                            <div class="col-lg-12 form-group">
                                                <div>
                                                    <label class="text-sm" for="comentario">comentario:
                                                        *</label>
                                                    <textarea type="text" class="form-control {{ $errors->has('comentario') ? 'is-invalid' : '' }}" name="comentario"
                                                        id="comentario" value="{{ old('comentario') }}"></textarea>

                                                    @error('comentario')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                </div>
                                <div class="card-footer ml-auto mr-auto">
                                    <div class="buttons-form-submit d-flex justify-content-center">
                                        <a href="{{ route('preinscripciones.index') }}" class="btn btn-danger mr-1">
                                            Cerrar</a>
                                        <a href="{{ route('preinscripciones.index') }}" class="btn btn-warning mr-1">
                                            Cancelar</a>
                                        <button type="submit" href="#" class="btn btn-primary">
                                            Guardar
                                        </button>
                                    </div>
                                </div>
                                </form>
                            </div>
                            <div class="col-lg-6 form-group">
                                <div class="card">
                                    <div class="table-responsive">

                                        <div class="card-body">
                                            <table class="table">
                                                <thead class="thead-dark">
                                                    <tr>
                                                        <th scope="col">#</th>
                                                        <th scope="col">CRITERIO</th>
                                                        <th scope="col">OPCION</th>
                                                        <th scope="col">COMENTARIO</th>
                                                        <th scope="col"></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($respuestas as $item)
                                                        <tr>
                                                            <th scope="row">{{ $item['id'] }}</th>
                                                            <td>{{ $item['criterio'] }}</td>
                                                            <td>{{ $item['opcion'] }}</td>
                                                            <td>{{ $item['comentario'] }}</td>
                                                            <td>
                                                                <a href="{{ route('delete_item_percriterio', ['persona_criterio' => $item['id']]) }}"
                                                                    class="btn btn-danger mr-1 sm">
                                                                    <i class="fas fa-trash"></i>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>

                                        </div>
                                    </div>
                                </div>
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

    <script>
        const falcultades = document.getElementById('facultad')
        const escuelas = document.getElementById('escuela')

        falcultades.addEventListener('change', async (e) => {
            // console.log(e.target.value)
            //fetch(`/./api/facultad/${e.target.value}/escuelas`)
            const response = await fetch(`/./api/facultad/${e.target.value}/escuelas`)

            const data = await response.json();

            console.log(data);

            let options = ``;

            data.forEach(element => {
                options = options + `<option value="${element.id}">${element.nombre}</option>`
            });
            escuelas.innerHTML = options;
            // escuelas.innerHTML = options;

        })
    </script>

    <script>
        const departamentos = document.getElementById('departamento')
        const provincias = document.getElementById('provincia')

        departamentos.addEventListener('change', async (e) => {
            // console.log(e.target.value)
            //fetch(`/./api/facultad/${e.target.value}/escuelas`)
            const response = await fetch(`/./api/departamento/${e.target.value}/provincias`)

            const data = await response.json();

            console.log(data);

            let options = ``;

            data.forEach(element => {
                options = options + `<option value="${element.id}">${element.nombre}</option>`
            });
            provincias.innerHTML = options;
            // escuelas.innerHTML = options;

        })
    </script>

    <script>
        const lprovincias = document.getElementById('provincia')
        const distritos = document.getElementById('distrito')

        lprovincias.addEventListener('change', async (e) => {
            // console.log(e.target.value)
            //fetch(`/./api/facultad/${e.target.value}/escuelas`)
            const response = await fetch(`/./api/provincia/${e.target.value}/distritos`)

            const data = await response.json();

            console.log(data);

            let options = ``;

            data.forEach(element => {
                options = options + `<option value="${element.id}">${element.nombre}</option>`
            });
            distritos.innerHTML = options;
            // escuelas.innerHTML = options;

        })
    </script>
@endpush
