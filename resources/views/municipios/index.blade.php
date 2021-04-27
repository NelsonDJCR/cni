@extends('layouts.app')
@section('content')


    <!-- Inicio de título y crear documento -->
    <div class="row mt-5">
        <div class="col-1"></div>
        <div class="col-11">
            <span>Veedurías/Parametrización/Tipos de archivo</span>
        </div>
    </div>
    <div class="row mt-0">
        <div class="col-md-1 col-1"></div>
        <div class="col-md-10 col-10 title_parameterization">
            <div class="row">
                <div class="col-md-7 col-sm-8 col-12">
                    <h2>TIPOS DE ARCHIVO</h2>
                </div>
                <div class="col-1 d-none d-xl-inline"></div>
                <div class="col-md-3 col-sm-4 col-xl-3 col-12 mt-1">
                    <button type="button" class="btn btn-block new_document">Nuevo documento</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Final de título y crear documento -->


    <!-- Inicio de formulario de búsqueda -->
    <div class="row mt-5">
        <div class="col-sm-1"></div>
        <div class="col-sm-5 col-md-4 col-xl-3">
            <div class="form-group form_configure">
                <label for="name">Nombre</label>
                <input type="text" class="form-control" id="name">
            </div>
        </div>
        <div class="col-sm-3 col-md-3 mt-4 col-xl-2">
            <button class="btn btn-block search_parameterization">Buscar</button>
        </div>
        <div class="col-7 col-sm-4 col-md-5 col-xl-6"></div>
    </div>
    <!-- Final de formulario de búsqueda -->


    <!-- Inicio de tabla resposive -->
    <div class="row mt-5">
        <div class="col-10"></div>
        <div class="col-2">
            <span>Cantidad </span>
            <select>
                <option value="">10</option>
                <option value="">25</option>
                <option value="">50</option>
            </select>
        </div>
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

    <!-- Final de tabla responsive -->
@endsection
