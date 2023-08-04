@extends('layouts.admin')

@section('titulo')
    <span>Inscribir al usuario</span>
    <ol class="breadcrumb" style="font-size: 14px; background: none">
        <li class="breadcrumb-item"><i class="fas fa-home"></i>&nbsp;<a href="/home">Inicio</a></li>
        <li class="breadcrumb-item"><a href="{{ route('inscripciones.index') }}">index</a></li>
        <li class="breadcrumb-item active">Inscripciones</li>
    </ol>
@endsection
@section('contenido')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">

                    <div class="card">
                        <div class="card-header card-header-primary" style="text-align: center; color: black">
                            <h4 class="card-title"> Registro de Inscripcion de <span>{{ $user->nombres }}</span></h4>

                        </div>

                        <form action="{{ route('inscripciones.store') }}" method="post" class="form-horizontal">
                            <div class="modal-body">
                                @csrf
                                <h5 class="mt-2 mb-2 mx-auto text-center">Registro de pago</h5>
                                <hr>
                                <div class="row">
                                    <div class="col">
                                        <input type="text" hidden name="userId" value="{{ $user->id }}">
                                        <label class="text-sm" for="direccion">N° Recibo: *</label>
                                        <input id="n_recibo" type="text"
                                            class="form-control form-control-user @error('n_recibo') is-invalid @enderror"
                                            name="n_recibo" value="{{ old('n_recibo') }}" required autocomplete="n_recibo"
                                            autofocus>

                                        @error('n_recibo')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-lg">

                                        <label class="text-sm" for="monto">Monto: *</label>
                                        <input id="monto" type="number"
                                            class="form-control form-control-user @error('monto') is-invalid @enderror"
                                            name="monto" value="{{ old('monto') }}" required autocomplete="monto"
                                            autofocus>

                                        @error('monto')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                </div>
                                <hr>
                                <h5 class="mt-2 mb-2 mx-auto text-center">Registro de horario</h5>
                                <hr>
                                <div class="row">
                                    @foreach ($dias as $index => $dia)
                                        <div class="col-lg-3 form-group">
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" name="dia_id[]"
                                                    id="dia_id_{{ $index }}" hidden
                                                    aria-label="Text input with dropdown button"
                                                    value="{{ $dia->id }}">
                                                <input type="text" class="form-control"
                                                    aria-label="Text input with dropdown button"
                                                    value="{{ $dia->nombre }}" disabled>
                                                <select class="custom-select" id="turno" name="turno[]">
                                                    <option value="" selected>Seleccione turno</option>
                                                    @foreach ($horarios as $horario)
                                                        <option value="{{ $horario->id }}">{{ $horario->inicio }} -
                                                            {{ $horario->fin }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>

                                <hr>
                            </div>

                            <div class="card-footer ml-auto mr-auto">
                                <div class="buttons-form-submit d-flex justify-content-center">
                                    <a href="{{ route('preinscripciones.index') }}" class="btn btn-danger mr-1">
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
