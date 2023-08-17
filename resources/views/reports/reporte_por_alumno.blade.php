@extends('layouts.admin')

@section('titulo')
    <span>Progreso de alumno</span>
    <ol class="breadcrumb" style="font-size: 14px; background: none">
        <li class="breadcrumb-item"><i class="fas fa-home"></i>&nbsp;<a href="/home">Inicio</a></li>
        <li class="breadcrumb-item"><a href="{{ route('reporte_progreso') }}">index</a></li>
        <li class="breadcrumb-item active">progreso de alumno</li>
    </ol>
@endsection
@section('contenido')
    <div class="content">
        <div class="container-fluid">
            <div class="row mb-5">
                <div class="col-md-12">

                    <div class="card">
                        <div class="card-header card-header-primary" style="text-align: center; color: black">
                            <h4 class="card-title">Alumno Inscrito</h4>
                        </div>

                        <div class="row">
                            <div class="col-xl-4 col-lg-5">
                                <img src="{{ asset('/img/user.png') }}" style="width: 10%, object-fit:cover">
                            </div>
                            <div class="col-xl-8 form-group">
                                <div class="row text-center" style="padding: 10px">
                                    <div class="col-lg-12 form-group ">
                                    </div>
                                    <div class="col-lg-4 form-group">
                                        <p class="card-category">DNI:<br>{{ $datosalumno->dni }} </p>
                                    </div>
                                    <div class="col-lg-4 form-group">
                                        <p class="card-category">Nombres: <br>{{ $datosalumno->nombres }} </p>
                                    </div>
                                    <div class="col-lg-4 form-group">
                                        <p class="card-category">Apellidos:<br>{{ $datosalumno->apellidos }}</p>
                                    </div>
                                </div>
                                <div class="row text-center" style="padding: 10px">
                                    <div class="col-lg-4 form-group">
                                        <p class="card-category">Peso:<br>{{ $datosalumno->peso }} </p>
                                    </div>
                                    <div class="col-lg-4 form-group">
                                        <p class="card-category">Talla: <br>{{ $datosalumno->talla }} </p>
                                    </div>
                                    <div class="col-lg-4 form-group">
                                        <p class="card-category">IMC:<br>{{ $datosalumno->imc }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">

                            <div class="col-xl-8 col-lg-7 ml-2">

                                <!-- Area Chart -->
                                <div class="card mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-primary">Medida de progreso del peso</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="chart-area">
                                            <canvas id="myAreaChart"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-2 col-lg-5 form-group mx-auto">
                                <h5 class="text-center my-4">Registro de peso</h5>
                                <div class="col-lg-12 form-group">
                                    <form action="{{ route('registrar_peso') }}" method="post">
                                        @csrf
                                        <input type="number" name="user_id" id="user" value="{{ $datosalumno->id }}"
                                            hidden>
                                        <label class="text-sm" for="peso">Nuevo Peso:</label>
                                        <input id="peso" type="number" maxlength="2" min="20"
                                            class="form-control form-control-user @error('peso') is-invalid @enderror"
                                            name="peso_nuevo" value="" required autocomplete="peso">

                                        @error('peso')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <div class="card-footer mx-auto my-2">
                                            <div class="buttons-form-submit d-flex justify-content-center">
                                                <a href="{{ route('reporte_progreso') }}" class="btn btn-danger mr-1">
                                                    Cerrar</a>
                                                <a href="{{ route('reporte_progreso') }}" class="btn btn-warning mr-1">
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
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            const idAlumno = document.querySelector("#user");
            let valueid = idAlumno.value;

            const graficaProgreso = async () => {

                let fechas = [],
                    datapesos = [];
                const response = await fetch(`/./api/reporte_alumno/${valueid}`);
                const data = await response.json();
                fechas = data.map(d =>
                    new Intl.DateTimeFormat('es-ES', {
                        dateStyle: 'short',
                        timeStyle: "short"
                    }).format(new Date(d.created_at))
                );
                datapesos = data.map(d => d.peso);


                //historial de pesos
                const ctx = document.getElementById('myAreaChart');
                const labels = fechas;

                new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: labels,
                        datasets: [{
                            label: 'Peso',
                            data: datapesos,
                            fill: true,
                            backgroundColor: 'rgba(75, 192, 192, 0.2)',
                            borderColor: 'rgb(75, 192, 192)',
                            tension: 0
                        }]
                    }
                });

            }
            graficaProgreso();
        </script>
    @endpush
