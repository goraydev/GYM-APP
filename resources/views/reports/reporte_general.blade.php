@extends('layouts.admin')

@section('titulo')
    <span>Reporte general</span>
@endsection

@section('contenido')
    <div class="row">
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Total de asistencias (mes)</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalAsistencias }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Earnings (Annual) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Total de monto recaudado (mes)</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalMontoRecaudado }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-cash-register fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Tasks Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Pre Inscritos (mes)
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalPreinscritos }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Inscritos (mes) </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalInscritos }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <!-- Bar Chart -->
        <div class="col-xl-8 col-lg-7">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Total de Estudiantes por Facultad</h6>
                </div>
                <div class="card-body">
                    <div class="chart-bar">
                        <canvas id="myChartfac"></canvas>
                    </div>
                </div>
            </div>
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Total de Estudiantes por Escuela</h6>
                </div>
                <div class="card-body">
                    <div class="chart-bar">
                        <canvas id="myChartesc"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <!-- Donut Chart -->
        <div class="col-xl-4 col-lg-5">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Total de Estudiantes por Género</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-pie pt-4">
                        <canvas id="myChartgenero"></canvas>
                    </div>
                </div>
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
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const graficaEscuelas = async () => {
            let escuelas = [],
                dataalumnos = [];
            try {
                const response = await fetch(`/./api/alumnos_escuela`);
                const respesc = await response.json();
                escuelas = respesc.map(esc => esc.escuela);
                dataalumnos = respesc.map(ele => ele.cantidad_alumnos);
                //por escuelas
                const ctx = document.getElementById('myChartesc');
                const labels = escuelas;
                new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: labels,
                        datasets: [{
                            label: '# de Estudiantes',
                            data: dataalumnos,
                            backgroundColor: [
                                'rgba(133, 77, 14,0.2)',
                                'rgba(132, 204, 22,0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(201, 203, 207, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(220, 38, 38, 0.2)',
                                'rgba(249, 115, 22,0.2)',
                                'rgba(99, 102, 241,0.2)',
                                'rgba(192, 38, 211,0.2)',
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(255, 159, 64, 0.2)',
                                'rgba(255, 205, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(201, 203, 207, 0.2)',
                                'rgba(163, 230, 53,0.2)',
                                'rgba(45, 212, 191,0.2)',
                                'rgba(133, 77, 14,0.2)',
                                'rgba(132, 204, 22,0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(201, 203, 207, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(220, 38, 38, 0.2)',
                                'rgba(249, 115, 22,0.2)',
                                'rgba(99, 102, 241,0.2)',
                                'rgba(192, 38, 211,0.2)',
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(255, 159, 64, 0.2)',
                                'rgba(255, 205, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(201, 203, 207, 0.2)',
                                'rgba(163, 230, 53,0.2)',
                                'rgba(45, 212, 191,0.2)',
                            ],
                            borderColor: [
                                'rgb(133, 77, 14)',
                                'rgb(132, 204, 22)',
                                'rgb(153, 102, 255)',
                                'rgb(201, 203, 207)',
                                'rgb(75, 192, 192)',
                                'rgb(220, 38, 38)',
                                'rgb(249 115 22)',
                                'rgb(99, 102, 241)',
                                'rgb(192, 38, 211)',
                                'rgb(255, 99, 132)',
                                'rgb(255, 159, 64)',
                                'rgb(255, 205, 86)',
                                'rgb(75, 192, 192)',
                                'rgb(54, 162, 235)',
                                'rgb(153, 102, 255)',
                                'rgb(201, 203, 207)',
                                'rgb(163, 230, 53)',
                                'rgb(45, 212, 191)',
                                'rgb(133, 77, 14)',
                                'rgb(132, 204, 22)',
                                'rgb(153, 102, 255)',
                                'rgb(201, 203, 207)',
                                'rgb(75, 192, 192)',
                                'rgb(220, 38, 38)',
                                'rgb(249 115 22)',
                                'rgb(99, 102, 241)',
                                'rgb(192, 38, 211)',
                                'rgb(255, 99, 132)',
                                'rgb(255, 159, 64)',
                                'rgb(255, 205, 86)',
                                'rgb(75, 192, 192)',
                                'rgb(54, 162, 235)',
                                'rgb(153, 102, 255)',
                                'rgb(201, 203, 207)',
                                'rgb(163, 230, 53)',
                                'rgb(45, 212, 191)',
                            ],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
            } catch (error) {
                console.error(error)
            }
        }
        graficaEscuelas();
    </script>
    <script>
        const graficaFacultades = async () => {

            let abrevFacultades = [],
                dataalumnos = [];
            try {
                const response = await fetch(`/./api/alumnos_facultad`);
                const respFac = await response.json();
                abrevFacultades = respFac.map(fac => fac.facultad);
                dataalumnos = respFac.map(ele => ele.cantidad_alumnos);


                //por facultades
                const ctx = document.getElementById('myChartfac');
                const labels = abrevFacultades;

                new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: labels,
                        datasets: [{
                            label: '# de Estudiantes',
                            data: dataalumnos,
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(255, 159, 64, 0.2)',
                                'rgba(255, 205, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(201, 203, 207, 0.2)',
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(255, 159, 64, 0.2)',
                                'rgba(255, 205, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',

                            ],
                            borderColor: [
                                'rgb(255, 99, 132)',
                                'rgb(255, 159, 64)',
                                'rgb(255, 205, 86)',
                                'rgb(75, 192, 192)',
                                'rgb(54, 162, 235)',
                                'rgb(153, 102, 255)',
                                'rgb(201, 203, 207)',
                                'rgb(255, 99, 132)',
                                'rgb(255, 159, 64)',
                                'rgb(255, 205, 86)',
                                'rgb(75, 192, 192)',
                            ],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
            } catch (error) {
                console.error(error)
            }
        }
        graficaFacultades();
    </script>

    <script>
        //por genero
        const graficaGenero = async () => {

            let dataalumnos = [];
            try {
                const response = await fetch(`/./api/alumnos_genero`);
                const respFac = await response.json();
                dataalumnos = respFac.map(ele => ele.cantidad_alumnos);

                const ctx2 = document.getElementById('myChartgenero');
                const labels2 = ['MASCULINO', 'FEMENINO'];

                new Chart(ctx2, {
                    type: 'pie',
                    data: {
                        labels: labels2,
                        datasets: [{
                            label: '# por género',
                            data: dataalumnos,
                            backgroundColor: [
                                'rgb(54, 162, 235)',
                                'rgb(255, 99, 132)',

                            ],
                            hoverOffset: 4,

                        }]
                    }
                });
            } catch (error) {
                console.error(error)
            }
        }

        graficaGenero();
    </script>
@endpush
