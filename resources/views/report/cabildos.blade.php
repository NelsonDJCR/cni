<?php
header('Pragma: public');
header('Expires: 0');
$filename = 'ReporteCabildos.xls';
header('Content-type: application/x-msdownload');
header("Content-Disposition: attachment; filename=$filename");
header('Pragma: no-cache');
header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>
<body>
    <table>
        <thead>
            <th>Tema</th>
            <th>Descripción</th>
            <th>Departamento</th>
            <th>Municipio</th>
            <th>Fecha</th>
        </thead>
        <tbody>
            @foreach ($cabildos as $i)
                <tr>
                    <td>{{ $i->nombre_tema }}</td>
                    <td>{{ $i->description }}</td>
                    <td>{{ $i->departamento->nombre }}</td>
                    <td>{{ $i->municipio->nombre }}</td>
                    <td>{{ $i->fecha_realizacion }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
