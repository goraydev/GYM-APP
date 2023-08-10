@extends('layouts.admin')

@section('titulo', 'Panel de administración')

@section('contenido')
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Categorias</div>
                            <a href="" class="text-xs font-weight-bold text-primary text-uppercase mb-1"
                                style="font-size: 25px"> Categorias</a>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Marcas</div>
                            <a href="" class="text-xs font-weight-bold text-success text-uppercase mb-1"
                                style="font-size: 25px"> Marcas</a>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Areas
                            </div>
                            <a href="" class="text-xs font-weight-bold text-info text-uppercase mb-1 "
                                style="font-size: 25px"> Areas</a>
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
                                Equipos</div>
                            <a href="" class="text-xs font-weight-bold text-warning text-uppercase mb-1"
                                style="font-size: 25px"> Equipos</a>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
        </div>
        <!-- Donut Chart -->
        <div class="col-xl-4 col-lg-5">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Total de Estudiantes por género</h6>
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
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
