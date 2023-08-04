<!DOCTYPE html>
<html>

<head>
    <title>Reporte</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<style>

</style>

<body>

    <head>

        <div>
            <p class="font-weight-bold text-right">OGAD - UNASAM {{$titulo}}</p>
        </div>
        <div>
           
        </div>

    </head>
    <hr>
    
    <div>
        <table id="dt-products" class="table table-striped table-bordered dts">
            <thead>
                <tr>
                    <th class="text-center">#</th>
                    <th class="text-center">Responsable</th>
                    <th class="text-center">Celular</th>
                    <th class="text-center">F. Devolucion</th>
                    <th class="text-center">Equipo</th>
                    <th class="text-center">Area</th>
                    <th class="text-center">T. Operacion</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($operaciones as $key => $operacion)
                    <tr class="text-center">
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $operacion->responsable }}</td>
                        <td>{{ $operacion->celular }}</td>
                        <td>{{ $operacion->fecha_devolucion }}</td>
                        <td>{{ $operacion->Equipos->nombre }}</td>
                        <td>{{ $operacion->areas->nombre }}</td>
                        <td>{{ $operacion->toperaciones->nombre }}</td>
                                              
                    </tr>

                @endforeach
            </tbody>
        </table>

    </div>

    <hr>
   
</body>

</html>