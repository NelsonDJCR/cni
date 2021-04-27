@extends('layouts.app')
@section('content')


    <!-- Inicio de título y crear documento -->
    <div class="row mt-5">
        <div class="col-1"></div>
        <div class="col-11">
            <span>Veedurías/Parametrización/Municipios</span>
        </div>
    </div>
    <div class="row mt-0">
        <div class="col-md-1 col-1"></div>
        <div class="col-md-10 col-10 title_parameterization">
            <div class="row">
                <div class="col-md-7 col-sm-8 col-12">
                    <h2>Municipios</h2>
                </div>
                <div class="col-1 d-none d-xl-inline"></div>
                <div class="col-md-3 col-sm-4 col-xl-3 col-12 mt-1">
                    <button type="button" class="btn btn-block new_document modal_crear_municipio">Nuevo municipio</button>
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
                <th>Departamento</th>
                <th>Fecha registro</th>
            </thead>
            <tbody id="tmunicipios">
                @foreach ($municipios as $row)
                <tr>
                    <td class="aling_btn_options">
                        <button data-municipio_id_edit="{{ $row->id }}" type="button" class="btn update_parameterization modal_editar_municipio">
                            <i class="fas fa-edit"></i>
                        </button>
                        <button data-municipio_id="{{ $row->id }}" type="button" class="btn delete_parameterization btn_modal_eliminar">
                            <i class="fas fa-trash"></i>
                        </button>
                    </td>
                    <td>{{ $row->nombre }}</td>
                    <td>{{ $row->dep_nombre }}</td>
                    <td>{{ $row->created_at }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    @include('municipios_J.modals.modal_eliminar')
    @include('municipios_J.modals.modal_crear')
    @include('municipios_J.modals.modal_edit')

    <!-- Final de tabla responsive -->


    <script>
        $('body').on('click','.btn_modal_eliminar',function() {
            $.post(
                "{{ route('modal_eliminar_municipio') }}",{
                    _token: "{{ csrf_token() }}",
                    id: $(this).data('municipio_id')
                }
            ).done(function(data) {
                $('#id_municipio').val(data.id)
                $('#modal_eliminar_municipio').modal('show')
            })
        })

        $('body').on('click','.modal_crear_municipio',function() {
            $('#modal_crear_municipio').modal('show')
        })

        $('body').on('click','.modal_editar_municipio',function () {
            $.post(
                "{{ route('municipio.edit') }}",{
                    _token: "{{ csrf_token() }}",
                    id: $(this).data('municipio_id_edit')
                }
            ).done(function(data) {
                let municipio = data.municipio
                $('#nombre_municipio_edit').val(municipio.nombre)
                $('#id_municipio_edit').val(municipio.id)
                $('#modal_edit_municipio').modal('show')
            })
        })
    </script>
@endsection
