@extends('layouts.admin')

@section('titulo')
    <span>Registrar Horario</span>
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
                            <h4 class="card-title"> Asignar Horario</h4>
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
                                        <p class="card-category">Dni:<br> {{ $preinscripciones->dni }}</p>
                                    </div>
                                    <div class="col-lg-4 form-group">
                                        <p class="card-category">Nombres: <br> {{ $preinscripciones->nombres }}</p>
                                    </div>
                                    <div class="col-lg-4 form-group">
                                        <p class="card-category">Apellidos:<br> {{ $preinscripciones->apellidos }}</p>
                                    </div>

                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('asignarcursos.store') }}" method="post"
                                        class="form-horizontal">
                                        @csrf
                                        <div class="row">
                                            <div class="col-lg-6 form-group">
                                                <div>
                                                    <input type="text" hidden name="inscripcion_id"
                                                        value="{{ $inscripciones->id }}">
                                                    <label class="text-sm" for="clase_id">Clases:
                                                        *</label>
                                                    <select class="form-control" name="clase_id">
                                                        <option value="">Seleecione</option>
                                                        @foreach ($clases as $clase)
                                                            <option value="{{ $clase->id }}">{{ $clase->nombre }}
                                                            </option>
                                                        @endforeach
                                                    </select>

                                                    @error('clase_id')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>

                                            </div>
                                            <div class="col-lg-6 form-group">
                                                <div>
                                                    {{-- <input type="text" hidden name="preinscripcion_id"
                                                        value="{{ $preinscripcion->id }}"> --}}
                                                    <label class="text-sm" for="horario_id">Hora:
                                                        *</label>
                                                    <select class="form-control" name="horario_id">
                                                        <option value="">Seleecione</option>
                                                        @foreach ($horarios as $horario)
                                                            <option value="{{ $horario->id }}">{{ $horario->horario }}
                                                            </option>
                                                        @endforeach
                                                    </select>

                                                    @error('horario_id')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>

                                            </div>

                                            <div class="col-lg-12 form-group">
                                                <hr>
                                                <h5 style="text-align: center; color: black">Días de la Semana</h5>
                                                <hr>
                                                <div class="form-check">
                                                    @foreach ($dias as $dia)
                                                        <input type="checkbox" id="dia_id" class="form-check-input"
                                                            name="dia_id" value="{{ $dia->id }}">
                                                        <label for="genderM"
                                                            class="form-check-label">{{ $dia->nombre }}</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                    @endforeach
                                                </div>
                                            </div>


                                        </div>
                                </div>
                                <div class="card-footer ml-auto mr-auto">
                                    <div class="buttons-form-submit d-flex justify-content-center">
                                        <a href="{{ route('inscripciones.index') }}" class="btn btn-danger mr-1">
                                            Cerrar</a>
                                        <a href="{{ route('inscripciones.index') }}" class="btn btn-warning mr-1">
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
                                                        <th scope="col">CLASES</th>
                                                        <th scope="col">DIA</th>
                                                        <th scope="col">HORARIO</th>
                                                        <th scope="col"></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($respuestas as $item)
                                                        <tr>
                                                            <th scope="row">{{ $item['id'] }}</th>
                                                            <td>{{ $item['clase'] }}</td>
                                                            <td>{{ $item['dia'] }}</td>
                                                            <td>{{ $item['horario'] }}</td>
                                                            <td>
                                                                <a href="{{ route('delete_item_clase', ['inscripcion_clase' => $item['id']]) }}"
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

@endpush
