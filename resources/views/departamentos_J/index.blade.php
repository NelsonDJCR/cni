@extends('layouts.app')
@section('content')


    <!-- Inicio de título y crear documento -->
    <div class="row mt-5">
        <div class="col-1"></div>
        <div class="col-11">
            <span>Veedurías/Parametrización/Departamentos</span>
        </div>
    </div>
    <div class="row mt-0">
        <div class="col-md-1 col-1"></div>
        <div class="col-md-10 col-10 title_parameterization">
            <div class="row">
                <div class="col-md-7 col-sm-8 col-12">
                    <h2>Departamentos</h2>
                </div>
                <div class="col-1 d-none d-xl-inline"></div>
                <div class="col-md-3 col-sm-4 col-xl-3 col-12 mt-1">
                    <button type="button" class="btn btn-block new_document modal_crear_municipio">Nuevo departamento</button>
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
        <table class="table table-bordered table_es">
            <thead>
                <th>Opciones</th>
                <th>Nombre</th>
                <th>Fecha registro</th>
            </thead>
            <tbody id="tdepartamento">
                @foreach ($departamentos as $row)
                <tr data-row="{{$row->id}}">
                    <td class="aling_btn_options">
                        <button data-departamento_id_edit="{{ $row->id }}" type="button" class="btn update_parameterization modal_editar_departamento">
                            <i class="fas fa-edit"></i>
                        </button>
                        <button data-departamento_id="{{ $row->id }}" type="button" class="btn delete_parameterization btn_modal_eliminar">
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
        $('body').on('click','.btn_modal_eliminar',function() {
            $.post(
                "{{ route('modal_eliminar_departamento') }}",{
                    _token: "{{ csrf_token() }}",
                    id: $(this).data('departamento_id')
                }
            ).done(function(data) {
                $('#id_departamento').val(data.id)
                $('#modal_eliminar_departamento').modal('show')
            })
        })

        $('body').on('click','.modal_crear_municipio',function() {
            $('#modal_crear_departamento').modal('show')
        })

        $('body').on('click','.modal_editar_departamento',function () {
            $.post(
                "{{ route('departamento.edit') }}",{
                    _token: "{{ csrf_token() }}",
                    id: $(this).data('departamento_id_edit')
                }
            ).done(function(data) {
                let departamento = data.departamento
                $('#nombre_departamento_edit').val(departamento.nombre)
                $('#id_departamento_edit').val(departamento.id)
                $('#modal_edit_departamento').modal('show')
            })
        })

        $('body').on('click','.filtrar',function() {
            // alert('llego')
            $.post(
                "{{ route('buscar_departamento') }}",
                $('#buscar_departamento').serialize()
            ).done(function(data) {
                console.log(data);
                $('#tdepartamento * ').remove()
                tabla(data)
            })
        })

        function tabla(data) {
            var carguetabla = ''
            $.each(data['departamento'], function(key, val) {
                carguetabla += `<tr data-row="${val.id}">
                    <td class="aling_btn_options">
                        <button data-departamento_id_edit="${val.id}" type="button" class="btn update_parameterization modal_editar_departamento">
                            <i class="fas fa-edit"></i>
                        </button>
                        <button data-departamento_id="${val.id}" type="button" class="btn delete_parameterization btn_modal_eliminar">
                            <i class="fas fa-trash"></i>
                        </button>
                    </td>
                    <td>${val.nombre}</td>
                    <td>${val.created_at}</td>
                </tr>`;
            })
            $('#tdepartamento').append(carguetabla)
        }
    </script>
@endsection
