<div class="modal fade" id="modal_crear_tipoDocumento" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Nuevo tipo de Archivo</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="crear_tipoDocumento">
                    @csrf
                    <div class="mb-3">
                        <label for="nombre" class="col-form-label">Nombre del archivo</label>
                        <input type="text" class="form-control validar1" id="nombre" name="nombre">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary crear_tipoDocumento">Guardar</button>
            </div>
        </div>
    </div>
</div>

<script>
    $('body').on('click', '.crear_tipoDocumento', function() {
        if(obligatorio('validar1')){
            $.post(
                "{{ route('tipoDocumento.store') }}",
                $('#crear_tipoDocumento').serialize()
            ).done(function(data) {
                if (data.status == 200) {
                    setTimeout(function(){ $('#modal_crear_tipoDocumento').modal('hide');},500);
                    alertas(data.msg, 'success')
                    // aniadirATabla(data)

                    var table = $('#tablaDocumentos').DataTable();

                    let botones = `
                    <button data-tipodocumento_id_edit="${data.tipo_documento.id}" type="button" class="btn update_parameterization modal_editar_tipoDocumento">
                        <i class="fas fa-edit"></i>
                    </button>
                    <button data-tipodocumento_id="${data.tipo_documento.id}" type="button" class="btn delete_parameterization btn_modal_eliminar">
                        <i class="fas fa-trash"></i>
                    </button>
                    `;
                    let filaTabla = table.row.add( [
                        botones,
                        data.tipo_documento.nombre,
                        data.tipo_documento.created_at,
                    ] ).draw( );
                    $(`button[data-tipodocumento_id_edit="${data.tipo_documento.id}"]`).parent().parent().attr('data-row',data.tipo_documento.id);
                } else {
                    alertas(data.msg, 'error')
                }
            })
        }
    });
</script>
