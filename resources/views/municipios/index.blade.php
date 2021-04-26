@extends('layouts.app')
@section('content')
    <div class="mt-5 row">
        <div class="col-md-1"></div>
        <div class="col-md-10 title_parameterization">
            <div class="row">
                <div class="col-md-8">
                    <h1>TIPOS DE ARCHIVO</h1>
                </div>
                <div class="col-1 d-none d-lg-inline"></div>
                <div class="col-md-4 col-xl-3 mt-2">
                    <button class="btn btn-block d-inline">Nuevo documento</button>
                </div>
            </div>
        </div>
        <div class="col-1">
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-sm-1"></div>
        <div class="col-sm-3">
            <div class="form-group">
                <label for="name">Nombre</label>
                <input type="email" class="form-control" id="name">
            </div>
        </div>
        <div class="col-sm-2 mt-4">
            <button class="btn btn-block search_parameterization">Buscar</button>
        </div>
        <div class="col-7"></div>
    </div>

    <div class="container table-responsive">
        <table class="mt-5 table table-bordered">
            <thead>
                <th>Opciones</th>
                <th>Nombre</th>
                <th>Fecha registro</th>
            </thead>
            <tbody>
                <tr>
                    <td>Opciones de ejemplo</td>
                    <td>Nombre de ejemplo</td>
                    <td>Fecha de ejemplo</td>
                </tr>
                <tr class="table-light">
                    <td>Opciones de ejemplo</td>
                    <td>Nombre de ejemplo</td>
                    <td>Fecha de ejemplo</td>
                </tr>
                <tr>
                    <td>Opciones de ejemplo</td>
                    <td>Nombre de ejemplo</td>
                    <td>Fecha de ejemplo</td>
                </tr>
                <tr class="table-light">
                    <td>Opciones de ejemplo</td>
                    <td>Nombre de ejemplo</td>
                    <td>Fecha de ejemplo</td>
                </tr>
                <tr>
                    <td>Opciones de ejemplo</td>
                    <td>Nombre de ejemplo</td>
                    <td>Fecha de ejemplo</td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
