<div class="modal fade" id="modal_edit_departamento" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar municipio</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editar_departamento">
                    @csrf
                    <input id="id_departamento_edit" type="hidden" class="validar" name="departamento_id" value="">
                    <div class="mb-3">
                        <label for="nombre_departamento" class="col-form-label">Nombre de departamento</label>
                        <input type="text" class="form-control validar" id="nombre_departamento_edit" name="nombre_edit">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary editar_departamento">Guardar</button>
            </div>
        </div>
    </div>
</div>

<script>
    $('body').on('click', '.editar_departamento', function() {
        if(obligatorio('validar')){
            $.post(
                "{{ route('departamento.update') }}",
                $('#editar_departamento').serialize()
            ).done(function(data) {
                alertas(data.msg, 'success')
                    let val = data.departamento
                    let row = $(`#departamento_id_edit`).val()
                    var table = $('#tabladepartamentos').DataTable();
                    table.row(`[data-row="${row}"]`).remove().draw(false);
                    let botones = `
                    <button data-tipodocumento_id_edit="${data.departamento.id}" type="button" class="btn update_parameterization modal_editar_tipoDocumento">
                        <i class="fas fa-edit"></i>
                    </button>
                    <button data-tipodocumento_id="${data.departamento.id}" type="button" class="btn delete_parameterization btn_modal_eliminar">
                        <i class="fas fa-trash"></i>
                    </button>
                    `;

                    let filaTabla = table.row.add( [
                        botones,
                        data.departamento.nombre,
                        data.departamento.created_at,

                    ] ).draw( );

                    $(`button[data-tipodocumento_id_edit="${data.departamento.id}"]`).parent().parent().attr('data-row',data.departamento.id);
            })
        }
    })

</script>
