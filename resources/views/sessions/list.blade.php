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

                    <a href="{{ url('/new-sesion') }}" class="btn btn-warning text-white w-100 mt-2 ">Nueva sesión</a
                        href="{{ url('/list-cabildos') }}">
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
                @foreach ($cabildos as $i)
                    <tr>
                        <td class="aling_btn_options">
                            <a href="/edit-sesion/{{ $i->id }}" type="button" class="btn update_parameterization">
                                <i class="fas fa-edit"></i>
                            </a>
                            <button data-id="{{ $i->id }}" type="button"
                                class="btn download_parameterization download_btn">
                                <i class="fas fa-download"></i>
                            </button>
                            <button data-id="{{ $i->id }}" type="button"
                                class="btn delete_parameterization delete_btn">
                                <i class="fas fa-trash"></i>
                            </button>
                        </td>
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
    @include('modals.download')
    <script>
        $(".download_btn").click(function() {
            var id = $(this).data('id')
            $.post('/view-documents', {
                _token: "{{ csrf_token() }}",
                id: id
            }).done(function(e) {
                console.log(e);
                $("#box_files *").remove()
                $("#modal_download").modal('show')
                $.each(e['data'], function(key, val) {
                    $("#box_files").append(`<div class="row">
                                    <div class="col-11">
                                        <input type="text" value="${val.nombre}" disabled class="form-control mb-3" />
                                    </div>
                                    <div class="aling_btn_options col-1">
                                        <a href="${val.nombre}" download="x.pdf" type="button" class="btn download_parameterization">
                                            <i class="fas fa-download"></i>
                                        </a>
                                    </div>
                                </div>`)
                })
            });
        });
        $(".delete_btn").click(function() {
            var record = $(this)
            var id = $(this).data('id')

            Swal.fire({
                icon: 'question',
                title: '¿Eliminar registro?',
                text: "Esta acción no se puede revertir",
                showCancelButton: true,
                confirmButtonText: `Eliminar`,
            }).then((result) => {
                if (result.isConfirmed) {
                    $.post('/delete-session', {
                        _token: "{{ csrf_token() }}",
                        id: id
                    }).done(function(e) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Perfecto',
                            text: 'El documento ha sido eliminado',
                        });
                        record.parent().parent().remove();
                    });
                }
            })


        });

    </script>
@endsection
