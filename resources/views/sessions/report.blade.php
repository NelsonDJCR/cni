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
                <label for="" class="form-label">Tema</label>
                <input type="text" class="form-control" id="">
            </div>
            <div class="mb-3 col-3">
                <label for="" class="form-label">Departamento</label>
                <input type="text" class="form-control" id="">
            </div>
            <div class="mb-3 col-3">
                <label for="" class="form-label">Municipio</label>
                <input type="text" class="form-control" id="">
            </div>
            <div class="mb-3 col-3">
                <label for="" class="form-label">Fecha</label>
                <input type="text" class="form-control" id="">
            </div>
        </div>
    </div>
    <div class="row mt-2 ">
        <button class="btn-general btn ">Crear sesión</button>
    </div>

    <div class="container table-responsive mt-1">
        <table class="table table-bordered">
            <thead>
                <th>Opciones</th>
                <th>Nombre</th>
                <th>Fecha registro</th>
            </thead>
            <tbody>
                <tr>
                    <td class="aling_btn_options">
                        <button type="button" class="btn update_parameterization">
                            <i class="fas fa-trash"></i>
                        </button>
                        <button type="button" class="btn delete_parameterization">
                            <i class="fas fa-edit"></i>
                        </button>
                    </td>
                    <td>Municipio de ejemplo</td>
                    <td>01-02-2021</td>
                </tr>
                <tr class="table-light">
                    <td class="aling_btn_options">
                        <button type="button" class="btn update_parameterization">
                            <i class="fas fa-trash"></i>
                        </button>
                        <button type="button" class="btn delete_parameterization">
                            <i class="fas fa-edit"></i>
                        </button>
                    </td>
                    <td>Municipio de ejemplo</td>
                    <td>01-02-2021</td>
                </tr>
                <tr>
                    <td class="aling_btn_options">
                        <button type="button" class="btn update_parameterization">
                            <i class="fas fa-trash"></i>
                        </button>
                        <button type="button" class="btn delete_parameterization">
                            <i class="fas fa-edit"></i>
                        </button>
                    </td>
                    <td>Municipio de ejemplo</td>
                    <td>01-02-2021</td>
                </tr>
                <tr class="table-light">
                    <td class="aling_btn_options">
                        <button type="button" class="btn update_parameterization">
                            <i class="fas fa-trash"></i>
                        </button>
                        <button type="button" class="btn delete_parameterization">
                            <i class="fas fa-edit"></i>
                        </button>
                    </td>
                    <td>Municipio de ejemplo</td>
                    <td>01-02-2021</td>
                </tr>
                <tr>
                    <td class="aling_btn_options">
                        <button type="button" class="btn update_parameterization">
                            <i class="fab fa-500px"></i>
                            <i class="fas fa-trash"></i>
                        </button>
                        <button type="button" class="btn delete_parameterization">
                            <i class="fas fa-edit"></i>
                        </button>
                    </td>
                    <td>Municipio de ejemplo</td>
                    <td>01-02-2021</td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
