<?php
header('Pragma: public');
header('Expires: 0');
$filename = 'nombreArchivoQueDescarga.xls';
header('Content-type: application/x-msdownload');
header("Content-Disposition: attachment; filename=$filename");
header('Pragma: no-cache');
header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
?>



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
                <td>{{ $i->dep_id }}</td>
                <td>{{ $i->mun_id }}</td>
                <td>{{ $i->fecha_realizacion }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
