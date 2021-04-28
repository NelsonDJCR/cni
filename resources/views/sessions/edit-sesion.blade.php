@extends('layouts.app')
@section('content')
    <div class="container mt-5">
        <label for="" class="p-2">Cabildos/Listado de cabildos/Editar sesión</label>
        <div class="row p-2 text-center border shadow">
            <h1 class="text-blue"> <b>EDITAR SESIÓN</b> </h1>
        </div>
        <form action="" id="form_edit_session">
            @csrf
            @include('modals.edit-file')
            <input type="hidden" value="{{ $data->id }}" name="id_record">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 mt-5">

                    <div class="row ">
                        <div class="mb-3 ">
                            <label for="" class="form-label"><b>Tema</b></label>
                            <input type="text" class="form-control" name="nombre_tema" id=""
                                value="{{ $data->nombre_tema }}" aria-describedby="emailHelp">
                        </div>

                    </div>
                    <div class="row">
                        <div class="mb-3 ">
                            <label for="" class="form-label"><b>Descripción</b></label>
                            <textarea class="form-control" placeholder="" id="" name="description"
                                style="height: 150px">{{ $data->description }}</textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 ">
                            <label for="" class="form-label"><b>Departamento</b></label>
                            <select class="form-select" aria-label="Default select example" name="dep_id">
                                @foreach ($departament as $i)
                                    <option value="{{ $i->id }}" {{ $data->dep_id == $i->id ? 'selected' : '' }}>
                                        {{ $i->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 ">
                            <label for="" class="form-label"><b>Municipio</b></label>
                            <select class="form-select" aria-label="Default select example" name="mun_id">
                                @foreach ($municipios as $i)
                                    <option value="{{ $i->id }}" {{ $data->mun_id == $i->id ? 'selected' : '' }}>
                                        {{ $i->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 ">

                            <label for="" class="form-label"><b>Fecha de agendamiento</b> </label>
                            <div class="input-group">
                                <span class="span">
                                    <i class="fas fa-calendar-alt" aria-hidden="true"></i>
                                </span>
                                <input type="date" class="form-control" value="{{ $data->fecha_realizacion }}"
                                    name="fecha_realizacion" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 mt-5">
                    <div class="row ">
                        <label for="" class="form-label"><b>Tipo de documento</b> </label>
                        <select class="form-select" aria-label="Default select example" name="type_file">
                            @foreach ($type_file as $i)
                                <option value="{{ $i->id }}" {{ $type_document->id == $i->id ? 'selected' : '' }}>
                                    {{ $i->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="row mt-3">
                        <label for="" class="form-label"><b>Radicado CNE</b></label>
                        <input type="text" class="form-control" value="{{ $data->radicado_CNE }}" id=""
                            name="radicado_CNE">
                    </div>
                    <div class="row mt-5">
                        <div class="form-group files border" role="button" id="box_file">
                            <div class="row mt-5">
                                <img class="img_file mx-auto d-block" src="{{ asset('img/icons/file.svg') }}" alt="">
                            </div>
                            <div class="row mt-1 mb-5">
                                <p class="text_file text-center">Edita tus documentos aquí</p>
                            </div>
                        </div>
                        <input id="file" type="file" class="form-control d-none">
                    </div>
                    <div class="row mt-5 ">
                        <button class="btn-general btn " id="send_edit_session">Editar sesión</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <script src="{{ asset('js/sessions.js') }}"></script>
    <script>
        $("#send_edit_session").click(function() {
            let dataForm = new FormData(document.getElementById('form_edit_session'));
            $.ajax({
                type: 'POST',
                url: '/editSesion',
                dataType: "json",
                data: dataForm,
                cache: false,
                contentType: false,
                processData: false,
                success: function(data) {
                    if (data.code == 200) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Perfecto',
                            text: 'Los datos han sido guardados exitosamente',
                        }).then(function() {
                            window.location = '/list-cabildos';
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: data.msg,
                            text: 'Ingrese de forma correcta todos los campos'
                        });
                    }
                }
            })
            return false;
        });

    </script>
@endsection
