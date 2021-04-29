@extends('layouts.app')
@section('content')

    <!-- Inicio de título y crear documento -->

    <div class="container mt-5">
        <label for="" class="p-2">Veedurías/Parametrización/Tipos de archivo</label>
        <div class="row p-2 text-center border shadow">
            <div class="row">
                <div class="col-12 col-md-12 col-lg-10 col-xl-9 p-2">
                    <h1 class="text-blue "> <b>TIPOS DE ARCHIVO</b> </h1>
                </div>
                <div class='col-12 col-md-12 col-lg-2 col-xl-3 p-2'>
                    <button type="button"
                        class="btn btn-warning text-white mt-2 new_document modal_crear_tipoDocumento">Nuevo
                        documento</button>
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
                <form id="buscar_t_doc">
                    @csrf
                    <input type="text" class="form-control" id="name" name="nombre_buscar">
                </form>
            </div>
        </div>
        <div class="col-sm-3 col-md-3 mt-4 col-xl-2">
            <button class="btn btn-block search_parameterization filtrar">Buscar</button>
        </div>
        <div class="col-7 col-sm-4 col-md-5 col-xl-6"></div>
    </div>
    <!-- Final de formulario de búsqueda -->


    <!-- Inicio de tabla resposive -->
    <div class="row mt-5">
        <div class="col-10"></div>
        <div class="col-2"></div>
    </div>
    <div class="container table-responsive mt-1">
        <table class="table table-bordered table_es" id="tablaDocumentos">
            <thead>
                <th>Opciones</th>
                <th>Nombre</th>
                <th>Fecha registro</th>
            </thead>
            <tbody id="ttipoDocumento">
                @foreach ($tipoDocumento as $row)
                    <tr>
                        <td>
                            <button data-tipodocumento_id_edit="{{ $row->id }}" type="button"
                                class="btn update_parameterization modal_editar_tipoDocumento">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button data-tipodocumento_id="{{ $row->id }}" type="button"
                                class="btn delete_parameterization btn_modal_eliminar">
                                <i class="fas fa-trash"></i>
                            </button>
                        </td>
                        <td>{{ $row->nombre }}</td>
                        <td>{{ $row->created_at }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    @include('tipoDocumento_J.modals.modal_crear')
    @include('tipoDocumento_J.modals.modal_eliminar')
    @include('tipoDocumento_J.modals.modal_edit')

    <!-- Final de tabla responsive -->


    <script>
        $('body').on('click', '.btn_modal_eliminar', function() {

            $.post(
                "{{ route('modal_eliminar_tipoDocumento') }}", {
                    _token: "{{ csrf_token() }}",
                    id: $(this).data('tipodocumento_id')
                }
            ).done(function(data) {
                $('#id_tipoDocumento').val(data.id)
                $('#modal_eliminar_tipoDocumento').modal('show')
            })
        })

        $('body').on('click', '.modal_crear_tipoDocumento', function() {
            $('#nombre').val('')
            $('#modal_crear_tipoDocumento').modal('show')
        })

        $('body').on('click', '.modal_editar_tipoDocumento', function() {
            $.post(
                "{{ route('tipoDocumento.edit') }}", {
                    _token: "{{ csrf_token() }}",
                    id: $(this).data('tipodocumento_id_edit')
                }
            ).done(function(data) {
                let tipoDocumento = data.tipoDocumento
                $('#nombre_tipoDocumento_edit').val(tipoDocumento.nombre)
                $('#id_tipoDocumento_edit').val(tipoDocumento.id)
                $('#modal_edit_tipoDocumento').modal('show')
            })
        })

        $('body').on('click', '.filtrar', function() {
            $.post(
                "{{ route('buscar_tipoDocumento') }}",
                $('#buscar_t_doc').serialize()
            ).done(function(data) {
                $('#ttipoDocumento * ').remove()
                tabla(data)
                console.log(data.tipoDocumento);
            })
        })


        function tabla(data) {
            var table = $('#tablaDocumentos').DataTable();
            $('#tablaDocumentos').DataTable().clear().draw();
            $.each(data.tipoDocumento, function(key, val) {
                let botones = `
                            <button data-tipodocumento_id_edit="${val.id}" type="button" class="btn update_parameterization modal_editar_tipoDocumento">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button data-tipodocumento_id="${val.id}" type="button" class="btn delete_parameterization btn_modal_eliminar" seleccion="0" >
                                <i class="fas fa-trash"></i>
                            </button>
                            `;

                table.row.add([
                    botones,
                    val.nombre,
                    val.created_at,
                ]).draw();
            })
        }

        $('body').on('click', '.btn_eliminar_tipoDocumento', function() {

            $.post(
                "{{ route('tipoDocumento.destroy') }}",
                $('#eliminar_tipoDocumento').serialize()
            ).done(function(data) {
                if (data.status == 200) {
                    setTimeout(function(){ $('#modal_eliminar_tipoDocumento').modal('hide');},500);
                    alertas(data.msg, 'success')
                    tabla(data)
                } else {
                    alertas(data.msg, 'error')
                }
            })
        })

    </script>
@endsection
