@extends('layouts.app')
@section('content')
    

    <div class="container mt-5">
        <label for="" class="p-2">Cabildos/Listado de cabildos/Editar sesión</label>
        <div class="row p-2 text-center border shadow">
            <h1 class="text-blue"> <b>EDITAR SESIÓN</b> </h1>
        </div>
        <div class="row">


            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 mt-5">

                <div class="row ">
                    <div class="mb-3 ">
                        <label for="" class="form-label">Tema</label>
                        <input type="email" class="form-control" id="" aria-describedby="emailHelp">
                    </div>

                </div>
                <div class="row">
                    <div class="mb-3 ">
                        <label for="" class="form-label">Descripción</label>
                        <textarea class="form-control" placeholder="" id="" style="height: 150px"></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="mb-3 ">
                        <label for="" class="form-label">Departamento</label>
                        <select class="form-select" aria-label="Default select example">
                            <option selected></option>
                            <option value="1">One</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="mb-3 ">
                        <label for="" class="form-label">Municipio</label>
                        <select class="form-select" aria-label="Default select example">
                            <option selected></option>
                            <option value="1">One</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="mb-3 ">
                      
                        <div class="input-group">
                            <span class="span">
                              <i class="fas fa-calendar-alt" aria-hidden="true"></i>
                            </span>
                            <input type="date" class="form-control" placeholder="Username" />
                          </div>
                    </div>
                </div>
            </div>


            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 mt-5">
                <div class="row ">
                    <label for="" class="form-label">Tipo de archivo</label>
                    <select class="form-select" aria-label="Default select example">
                        <option selected></option>
                        <option value="1">One</option>
                    </select>
                </div>


                <div class="row mt-5">
                    <div class="form-group files border" id="box_file">
                        <div class="row mt-5">
                            <img class="img_file mx-auto d-block" src="{{ asset('img/icons/file.svg') }}" alt="">
                        </div>
                        <div class="row mt-1 mb-5">
                            <p class="text_file text-center">Arrastra tus archivos .pdf .png .jpg</p>
                        </div>
                    </div>
                    <input id="file" type="file" class="form-control d-none">
                </div>
                <div class="row mt-5 ">
                    <button class="btn-general btn ">Editar sesión</button>
                </div>
            </div>
        </div>
    </div>





@endsection







