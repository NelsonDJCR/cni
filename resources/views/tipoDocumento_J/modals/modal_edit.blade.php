<div class="modal fade" id="modal_edit_tipoDocumento" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar tipo de documento</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editar_tipoDocumento">
                    @csrf
                    <input id="id_tipoDocumento_edit" class="validar" type="hidden" name="tipoDocumento_id" value="">
                    <div class="mb-3">
                        <label for="nombre_tipoDocumento_edit" class="col-form-label">Nombre de documento</label>
                        <input type="text" class="form-control validar" id="nombre_tipoDocumento_edit"
                            name="nombre_edit">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary editar_tipoDocumento">Guardar</button>
            </div>
        </div>
    </div>
</div>

<script>
    $('body').on('click', '.editar_tipoDocumento', function() {
        if (obligatorio('validar')) {
            $.post(
                "{{ route('tipoDocumento.update') }}",
                $('#editar_tipoDocumento').serialize()
            ).done(function(data) {
                if (data.status == 200) {
                    alertas(data.msg, 'success')
                    let val = data.tipo_documento
                    let row = $(`#id_tipoDocumento_edit`).val()
                    var table = $('#tablaDocumentos').DataTable();
                    table.row(`[data-row="${row}"]`).remove().draw(false);
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
    })

</script>
