@extends('layouts.app')
@section('content')
    <div class="container mt-5">
        <label for="" class="p-2">Cabildos/Informes de cabildos</label>
        <div class="row p-2 text-center border shadow">
            <div class="row">
                {{-- <div class="col-10"> --}}
                <h1 class="text-blue "> <b>INFORME DE CABILDOS</b> </h1>
                {{-- </div> --}}
                {{-- <div class="col-2">
                <button class="btn btn-warning text-white">Nueva sesión</button>
            </div> --}}
            </div>


        </div>
        <div class="row mt-5">
            <div class="mb-3 col-3">
                <label for="" class="form-label"><b>Tema</b></label>
                <input type="text" class="form-control" id="">
            </div>
            <div class="mb-3 col-3">
                <label for="" class="form-label"><b>Departamento</b></label>
                <input type="text" class="form-control" id="">
            </div>
            <div class="mb-3 col-3">
                <label for="" class="form-label"><b>Municipio</b></label>
                <input type="text" class="form-control" id="">
            </div>
            <div class="mb-3 col-3">
                <label for="" class="form-label"><b>Fecha</b></label>
                <input type="text" class="form-control" id="">
            </div>
        </div>
    </div>
    <div class="row mt-2 ">
        <button class="btn-general btn ">Buscar</button>
    </div>

    <div class="container table-responsive mt-5">
        <table class="table table-bordered">
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
    </div>
    <div class="row mt-2 ">
        <button class="btn-general btn "><i class="fas fa-download"></i>&nbsp; &nbsp;Descargar informe</button>
    </div>
@endsection
