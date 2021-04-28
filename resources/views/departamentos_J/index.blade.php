@extends('layouts.app')
@section('content')

    <!-- Inicio de título y crear documento -->

    <div class="container mt-5">
        <label for="" class="p-2">Veedurías/Parametrización/Departamentos</label>
        <div class="row p-2 text-center border shadow">
            <div class="row">
                <div class="col-12 col-md-12 col-lg-10 col-xl-9 p-2">
                    <h1 class="text-blue "> <b>DEPARTAMENTOS</b> </h1>
                </div>
                <div class='col-12 col-md-12 col-lg-2 col-xl-3 p-2'>
                    <button type="button"
                        class="btn btn-warning text-white mt-2 new_document modal_crear_departamento">Nuevo
                        departamento</button>
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
                <form id="buscar_departamento">
                    @csrf
                    <label for="name">Nombre</label>
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
        <table class="table table-bordered table_es" id="tabladepartamentos">
            <thead>
                <th>Opciones</th>
                <th>Nombre</th>
                <th>Fecha registro</th>
            </thead>
            <tbody id="tdepartamento">
                @foreach ($departamentos as $row)
                    <tr>
                        <td class="aling_btn_options">
                            <button data-departamento_id_edit="{{ $row->id }}" type="button"
                                class="btn update_parameterization modal_editar_departamento">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button data-departamento_id="{{ $row->id }}" type="button"
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

    @include('departamentos_J.modals.modal_eliminar')
    @include('departamentos_J.modals.modal_crear')
    @include('departamentos_J.modals.modal_edit')

    <!-- Final de tabla responsive -->


    <script>
        $('body').on('click', '.btn_modal_eliminar', function() {
            $.post(
                "{{ route('modal_eliminar_departamento') }}", {
                    _token: "{{ csrf_token() }}",
                    id: $(this).data('departamento_id')
                }
            ).done(function(data) {
                $('#id_departamento').val(data.id)
                $('#modal_eliminar_departamento').modal('show')
            })
        })

        $('body').on('click', '.modal_crear_departamento', function() {
            $('#modal_crear_departamento').modal('show')
        })

        $('body').on('click', '.modal_editar_departamento', function() {
            $.post(
                "{{ route('departamento.edit') }}", {
                    _token: "{{ csrf_token() }}",
                    id: $(this).data('departamento_id_edit')
                }
            ).done(function(data) {
                console.log(data);
                let departamento = data.departamento
                $('#nombre_departamento_edit').val(departamento.nombre)
                $('#id_departamento_edit').val(departamento.id)
                $('#modal_edit_departamento').modal('show')
            })
        })

        $('body').on('click', '.filtrar', function() {
            $.post(
                "{{ route('buscar_departamento') }}",
                $('#buscar_departamento').serialize()
            ).done(function(data) {
                console.log(data);
                $('#tdepartamento * ').remove()
                tabla(data)
            })
        })

        $('body').on('click', '.btn_eliminar_departamento', function() {
            $.post(
                "{{ route('departamento.destroy') }}",
                $('#eliminar_departamento').serialize()
            ).done(function(data) {
                console.log(data);
                if (data.status == 200) {
                    alertas(data.msg, 'success')
                    tabla(data)
                } else {
                    alertas(data.msg, 'error')
                }
            })
        })

        function tabla(data) {
            var table = $('#tabladepartamentos').DataTable();
            $('#tabladepartamentos').DataTable().clear().draw();
            $.each(data.departamento, function(key, val) {
                let botones = `
                        <button data-departamento_id_edit="${val.id}" type="button" class="btn update_parameterization modal_editar_tipoDocumento">
                            <i class="fas fa-edit"></i>
                        </button>
                        <button data-departamento_id="${val.id}" type="button" class="btn delete_parameterization btn_modal_eliminar" seleccion="0" >
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

    </script>
@endsection
