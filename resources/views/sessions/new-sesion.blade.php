@extends('layouts.app')
@section('content')
    @php
    // echo '<pre>'; die(print_r($type_file));
    @endphp
    <div class="container mt-5">
        <label for="" class="p-2">Cabildos/Listado de cabildos/Nueva sesión </label>
        <div class="row p-2 text-center border shadow">
            <div class="row">
                <h1 class="text-blue "> <b>NUEVA SESIÓN</b> </h1>
            </div>

        </div>


        <form enctype="multipart/form-data" id="form_session" method="POST">
            @include('modals.file')
            @csrf
            <div class="row">
                <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 mt-5">
                    <div class="row ">
                        <div class="mb-3 ">
                            <label for="" class="form-label"><b>Tema</b></label>
                            <input type="text" class="form-control" id="" name="theme">
                        </div>

                    </div>
                    <div class="row">
                        <div class="mb-3 ">
                            <label for="" class="form-label"><b>Descripción</b></label>
                            <textarea class="form-control" placeholder="" id="" name="description"
                                style="height: 150px"></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 ">
                            <label for="" class="form-label"><b>Departamento</b></label>
                            <select class="form-select" name="department">
                                <option selected disabled></option>
                                @foreach ($departament as $i)
                                    <option value="{{ $i->id }}">{{ $i->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 ">
                            <label for="" class="form-label"><b>Municipio</b></label>
                            <select class="form-select" name="municipality">
                                <option selected disabled></option>
                                @foreach ($municipios as $i)
                                    <option value="{{ $i->id }}">{{ $i->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 ">
                            <label for="" class="form-label"><b>Fecha de agendamiento</b> </label>
                            <div class="input-group">
                                <span class="span">
                                    <i class="fas fa-calendar-alt icon-date" aria-hidden="true"></i>
                                </span>
                                <input id="date" type="date" name="date" class="form-control" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 mt-5">
                    <div class="row ">
                        <label for="" class="form-label"><b>Tipo de documento </b></label>
                        <select class="form-select" name="type_file">
                            <option value="0" selected disabled></option>
                            @foreach ($type_file as $i)
                                <option value="{{ $i->id }}">{{ $i->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="row mt-3">
                        <label for="" class="form-label"><b>Radicado CNE</b></label>
                        <input type="text" class="form-control" id="" name="cne">
                    </div>
                    <div class="row mt-5">
                        <div class="form-group files border" role="button" id="box_file">
                            <div class="row mt-5">
                                <img class="img_file mx-auto d-block" src="{{ asset('img/icons/file.svg') }}" alt="">
                            </div>
                            <div class="row mt-1 mb-5 ">
                                <p class="text_file text-center">Igresa aquí tus documentos  .pdf .png .jpg</p>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-5">
                        <button type="button" class="btn-general btn" id="send_session">Crear sesión</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <script src="{{ asset('js/sessions.js') }}"></script>
@endsection
