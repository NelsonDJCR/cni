@extends('layouts.app')
@section('content')
    <div class="container mt-5">
        <label for="" class="p-2">Cabildos/Listado de cabildos </label>
        <div class="row p-2 text-center border shadow">
            <div class="row">
                <div class="col-12 col-md-12 col-lg-10 col-xl-10 p-2">
                    <h1 class="text-blue "> <b>LISTADO DE CABILDOS</b> </h1>
                </div>
                <div class='col-12 col-md-12 col-lg-2 col-xl-2 p-2'>
                    
                    <a href="{{ url('/new-sesion') }}" class="btn btn-warning text-white w-100 mt-2 ">Nueva sesión</a href="{{ url('/list-cabildos') }}">
                </div>
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
                <label for="" class="form-label"><b>Fecha</b></label>
                <input type="date" class="form-control" id="">
            </div>
            <div class="row mt-2 col-3">
                <button class="btn-general btn w-80 ">Buscar</button>
            </div>
        </div>
    </div>


    <div class="container table-responsive mt-5">
        <table class="table table-bordered">
            <thead>
                <th>Opciones</th>
                <th>Tema</th>
                <th>Descripción</th>
                <th>Departamento</th>
                <th>Municipio</th>
                <th>Fecha</th>
            </thead>
            <tbody>
                <tr>
                    <td class="aling_btn_options">
                        <button type="button" class="btn update_parameterization">
                            <i class="fas fa-edit"></i>
                        </button>
                        <button type="button" class="btn download_parameterization">
                            <i class="fas fa-download"></i>
                        </button>
                        <button type="button" class="btn delete_parameterization">
                            <i class="fas fa-trash"></i>
                        </button>
                    </td>
                    <td>x</td>
                    <td>x</td>
                    <td>x</td>
                    <td>x</td>
                    <td>x</td>
                </tr>

            </tbody>
        </table>
    </div>

@endsection
