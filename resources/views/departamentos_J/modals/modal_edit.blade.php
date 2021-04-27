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
                    <input id="id_departamento_edit" type="hidden" name="departamento_id" value="">
                    <div class="mb-3">
                        <label for="nombre_departamento" class="col-form-label">Nombre de departamento</label>
                        <input type="text" class="form-control" id="nombre_departamento_edit" name="nombre_edit">
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
        $.post(
            "{{ route('departamento.update') }}",
            $('#editar_departamento').serialize()
        ).done(function(data) {
            alertas(data.msg, 'success')
            let val = data.departamento
            let row = $(`#id_departamento_edit`).val();
                $(`[data-row="${row}"]`).html(`
                <td class="aling_btn_options">
                        <button data-municipio_id_edit="${val.id}" type="button" class="btn update_parameterization modal_editar_municipio">
                            <i class="fas fa-edit"></i>
                        </button>
                        <button data-municipio_id="${val.id}" type="button" class="btn delete_parameterization btn_modal_eliminar">
                            <i class="fas fa-trash"></i>
                        </button>
                    </td>
                    <td>${val.nombre}</td>
                    <td>${val.created_at}</td>
                `);
        })
    })

</script>
