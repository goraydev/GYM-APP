@extends('layouts.admin')

@section('titulo')
    <span>Pre-inscripción</span>
    <ol class="breadcrumb" style="font-size: 14px; background: none">
        <li class="breadcrumb-item"><i class="fas fa-home"></i>&nbsp;<a href="/home">Inicio</a></li>
        <li class="breadcrumb-item"><a href="{{ route('preinscripciones.index') }}">index</a></li>
        <li class="breadcrumb-item active">editar pre-inscripcion</li>
    </ol>
@endsection
@section('contenido')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">

                    <div class="card">
                        <div class="card-header card-header-primary" style="text-align: center; color: black">
                            <h4 class="card-title">Actualizar Usuario</h4>
                        </div>
                        <form action="{{ route('preinscripcion.update', $id) }}" method="POST" class="form-horizontal">
                            <div class="modal-body">
                                @csrf

                                @method('put')
                                <h5 style="text-align: center; color: black">Datos Generales</h5>
                                <hr>
                                <div class="row">
                                    <div class="col-lg-2 form-group">
                                        <div>
                                            <label class="text-sm" for="tipocontrato_id">Dni *</label>
                                            <input id="dni" type="number" maxlength="8"
                                                class="form-control form-control-user @error('dni') is-invalid @enderror"
                                                name="dni" value="{{ $id->dni }}" required autocomplete="dni"
                                                autofocus>

                                            @error('dni')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-5 form-group">
                                        <div>
                                            <label class="text-sm" for="tipocontrato_id">Nombres: *</label>
                                            <input id="nombres" type="text"
                                                class="form-control form-control-user @error('nombres') is-invalid @enderror"
                                                name="nombres" value="{{ $id->nombres }}" required autocomplete="nombres"
                                                autofocus>

                                            @error('nombres')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-5 form-group">
                                        <div>
                                            <label class="text-sm" for="tipocontrato_id">Apellidos: *</label>
                                            <input id="apellidos" type="text"
                                                class="form-control form-control-user @error('apellidos') is-invalid @enderror"
                                                name="apellidos" value="{{ $id->apellidos }}" required
                                                autocomplete="apellidos" autofocus>

                                            @error('apellidos')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 form-group">
                                        <div>
                                            <label class="text-sm" for="tipocontrato_id">Fecha Nacimiento: *</label>
                                            <input id="f_nacimiento" type="date"
                                                class="form-control form-control-user @error('f_nacimiento') is-invalid @enderror"
                                                name="f_nacimiento" value="{{ $id->f_nacimiento }}" required
                                                autocomplete="f_nacimiento" autofocus>

                                            @error('f_nacimiento')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-1 form-group">
                                        <div>
                                            <label class="text-sm" for="tipocontrato_id">Edad: *</label>
                                            <input id="edad" type="number" maxlength="2" min="16"
                                                class="form-control form-control-user @error('edad') is-invalid @enderror"
                                                name="edad" value="{{ $id->edad }}" required autocomplete="edad"
                                                autofocus>

                                            @error('edad')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-2 form-group">
                                        <div>
                                            <label class="text-sm" for="genero_id">Genero: *</label>
                                            <select class="form-control" name="genero_id">
                                                <option value="">Seleecione</option>
                                                @foreach ($generos as $generos)
                                                    <option value="{{ $generos->id }}">{{ $generos->nombre }}</option>
                                                @endforeach
                                            </select>

                                            @error('genero')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-2 form-group">
                                        <div>
                                            <label class="text-sm" for="celular">Celular: *</label>
                                            <input id="celular" type="number" maxlength="9"
                                                class="form-control form-control-user @error('celular') is-invalid @enderror"
                                                name="celular" value="{{ $id->celular }}" required autocomplete="celular"
                                                autofocus>

                                            @error('celular')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-4 form-group">
                                        <div>
                                            <label class="text-sm" for="correo">Correo: *</label>
                                            <input id="correo" type="email"
                                                class="form-control form-control-user @error('correo') is-invalid @enderror"
                                                name="correo" value="{{ $id->correo }}" required
                                                autocomplete="correo" autofocus>

                                            @error('correo')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <h5 style="text-align: center; color: black">Lugar de Procendencia</h5>
                                <hr>
                                <div class="row">
                                    <div class="col-lg-2 form-group">
                                        <div>
                                            <label class="text-sm" for="tipocontrato_id">Departamento: *</label>
                                            <select id="departamento" class="form-control" name="departamento_id">
                                                <option value="">Seleccione</option>
                                                @foreach ($departamentos as $departamento)
                                                    <option value="{{ $departamento->id }}">{{ $departamento->nombre }}
                                                    </option>
                                                @endforeach
                                            </select>

                                            @error('dni')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-3 form-group">
                                        <div>
                                            <label class="text-sm" for="provincia_id">Provincia: *</label>
                                            <select id="provincia" class="form-control" name="provincia_id">
                                                <option value="0">Seleccionar Departamento</option>

                                            </select>

                                            @error('nombres')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-3 form-group">
                                        <div>
                                            <label class="text-sm" for="distrito_id">Distrito: *</label>
                                            <select id="distrito" class="form-control" name="distrito_id">
                                                <option value="0">Seleccionar Provincia</option>
                                            </select>

                                            @error('apellidos')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-4 form-group">
                                        <div>
                                            <label class="text-sm" for="direccion">Dirección: *</label>
                                            <input id="domicilio" type="text"
                                                class="form-control form-control-user @error('domicilio') is-invalid @enderror"
                                                name="domicilio" value="{{ $id->domicilio }}" required
                                                autocomplete="domicilio" autofocus>

                                            @error('domicilio')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <h5 style="text-align: center; color: black">Datos de la Universidad</h5>
                                <hr>
                                <div class="row">
                                    <div class="col-lg-2 form-group">
                                        <div>
                                            <label class="text-sm" for="semestre_id">Semestre: *</label>
                                            <select class="form-control" name="semestre_id">
                                                <option value="">Seleccione</option>
                                                @foreach ($semestres as $semestre)
                                                    <option value="{{ $semestre->id }}">{{ $semestre->semestre }}
                                                    </option>
                                                @endforeach
                                            </select>

                                            @error('dni')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-5 form-group">
                                        <div>
                                            <label class="text-sm" for="tipocontrato_id">Facultad: *</label>
                                            <select id="facultad" class="form-control" name="facultad_id">
                                                <option value="">Seleccione</option>
                                                @foreach ($facultades as $facultad)
                                                    <option value="{{ $facultad->id }}">{{ $facultad->nombre }}</option>
                                                @endforeach
                                            </select>

                                            @error('dni')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-5 form-group">
                                        <div>
                                            <label class="text-sm" for="tipocontrato_id">Escuela: *</label>
                                            <select id="escuela" class="form-control" name="escuela_id">

                                                <option value="0">Seleccionar Facultad</option>

                                            </select>

                                            @error('nombres')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                </div>
                                <hr>
                                <h5 style="text-align: center; color: black">Datos de Triaje</h5>
                                <hr>
                                <div class="row">
                                    <div class="col-lg-2 form-group">
                                        <div>
                                            <label class="text-sm" for="peso">Peso: *</label>
                                            <input id="peso" type="number" maxlength="2" min="20"
                                                class="form-control form-control-user @error('peso') is-invalid @enderror"
                                                name="peso" value="{{ $id->peso }}" required autocomplete="peso"
                                                autofocus>

                                            @error('peso')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-2 form-group">
                                        <div>
                                            <label class="text-sm" for="talla">Talla: *</label>
                                            <input id="talla" type="number" maxlength="3" min="120"
                                                class="form-control form-control-user @error('talla') is-invalid @enderror"
                                                name="talla" value="{{ $id->talla }}" required autocomplete="talla"
                                                autofocus>

                                            @error('talla')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-2 form-group">
                                        <div>
                                            <label class="text-sm" for="imc">IMC Calculado:</label>
                                            <input id="imc" type="text" maxlength="2" min="15" disabled
                                                class="form-control form-control-user @error('imc') is-invalid @enderror"
                                                name="imc" value="{{ $id->imc }}" autocomplete="imc" autofocus>

                                            @error('imc')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-3 form-group">
                                        <div>
                                            <label class="text-sm" for="gruposanguineo_id">Grupo Sanguineo: *</label>
                                            <select class="form-control" name="gruposanguineo_id">
                                                <option value="">Seleccione</option>
                                                @foreach ($gruposanguineos as $gsanguineo)
                                                    <option value="{{ $gsanguineo->id }}">{{ $gsanguineo->nombre }}
                                                    </option>
                                                @endforeach
                                            </select>

                                            @error('gruposanguineo_id')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-3 form-group">
                                        <div>
                                            <label class="text-sm" for="factorRh_id">Rh: *</label>
                                            <select class="form-control" name="factorRh_id">
                                                <option value="">Seleccione</option>
                                                @foreach ($factor_rhs as $factorRh_id)
                                                    <option value="{{ $factorRh_id->id }}">{{ $factorRh_id->nombre }}
                                                    </option>
                                                @endforeach
                                            </select>

                                            @error('factorRh_id')
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
                                        Actualizar
                                    </button>
                                </div>
                            </div>
                        </form>
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

        function guardarEnCache(clave, datos) {
            localStorage.setItem(clave, JSON.stringify(datos));
        }

        // Función para obtener los datos de la caché del localStorage
        function obtenerDeCache(clave) {
            const datos = localStorage.getItem(clave);
            return datos ? JSON.parse(datos) : null;
        }


        departamentos.addEventListener('change', async (e) => {
            // console.log(e.target.value)
            //fetch(`/./api/facultad/${e.target.value}/escuelas`)  
            let data = obtenerDeCache(`provincias_${e.target.value}`);

            if (!data) {
                const response = await fetch(`/./api/departamento/${e.target.value}/provincias`)

                data = await response.json();

                // Guardar los datos en la caché del localStorage con una clave única para este departamento
                guardarEnCache(`provincias_${e.target.value}`, data);
            }


            let options = ` <option value="0">Seleccionar provincia</option>`;

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

        function guardarEnCache(clave, datos) {
            localStorage.setItem(clave, JSON.stringify(datos));
        }

        // Función para obtener los datos de la caché del localStorage
        function obtenerDeCache(clave) {
            const datos = localStorage.getItem(clave);
            return datos ? JSON.parse(datos) : null;
        }

        lprovincias.addEventListener('change', async (e) => {
            // console.log(e.target.value)
            //fetch(`/./api/facultad/${e.target.value}/escuelas`)

            let data = obtenerDeCache(`distritos_${e.target.value}`);

            if (!data) {
                const response = await fetch(`/./api/provincia/${e.target.value}/distritos`)
                data = await response.json();

                // Guardar los datos en la caché del localStorage con una clave única para este departamento
                guardarEnCache(`distritos_${e.target.value}`, data);
            }


            let options = ` <option value="0">Seleccionar Distrito</option>`;

            data.forEach(element => {
                options = options + `<option value="${element.id}">${element.nombre}</option>`
            });
            distritos.innerHTML = options;

        })
    </script>
@endpush
