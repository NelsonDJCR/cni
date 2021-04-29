<div class="modal fade" id="modal_crear_municipio" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Nuevo municipio</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="crear_municipio">
                    @csrf
                    <div class="mb-3">
                        <label for="nombre" class="col-form-label">Nombre de municipio</label>
                        <input type="text" class="form-control validar1" id="nombre" name="nombre">
                    </div>
                    <div class="mb-3">
                        <label for="seleccionar_crear" class="col-form-label">Departamento </label>
                        <select name="dep_id" id="seleccionar_crear" class="form-select validar1">
                            <option value="" selected>Selecciona</option>
                            @foreach ($departamentos as $row)
                                <option value="{{ $row->id }}">{{ $row->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary crear_municipio">Guardar</button>
            </div>
        </div>
    </div>
</div>

<script>
    $('body').on('click', '.crear_municipio', function() {

        if(obligatorio('validar1')){
            $.post(
                "{{ route('municipío.store') }}",
                $('#crear_municipio').serialize()
            ).done(function(data) {
                if (data.status == 200) {
                    setTimeout(function(){ $('#modal_crear_municipio').modal('hide');},500);
                    alertas(data.msg, 'success')
                    var table = $('#tablamunicipios').DataTable();
                    let botones = `
                    <button data-municipio_id_edit="${data.municipios.id}" type="button" class="btn update_parameterization modal_editar_municipio">
                        <i class="fas fa-edit"></i>
                    </button>
                    <button data-municipio_id="${data.municipios.id}" type="button" class="btn delete_parameterization btn_modal_eliminar">
                        <i class="fas fa-trash"></i>
                    </button>`;

                    let filaTabla = table.row.add([
                        botones,
                        data.municipios.nombre,
                        data.departamento.nombre,
                        data.municipios.created_at,

                    ]).draw();
                } else {
                    alertas(data.msg, 'success')
                }
            })
        }
    })

</script>
