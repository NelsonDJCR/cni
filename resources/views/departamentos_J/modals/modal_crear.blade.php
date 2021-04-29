<div class="modal fade" id="modal_crear_departamento" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Nuevo departamento</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="crear_departamento">
                    @csrf
                    <div class="mb-3">
                        <label for="nombre" class="col-form-label">Nombre de departamento</label>
                        <input type="text" class="form-control validar1" id="nombre" name="nombre">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary crear_departamento">Guardar</button>
            </div>
        </div>
    </div>
</div>

<script>
    $('body').on('click', '.crear_departamento', function() {
        if (obligatorio('validar1')) {
            $.post(
                "{{ route('departamento.store') }}",
                $('#crear_departamento').serialize()
            ).done(function(data) {
                if (data.status == 200) {
                    console.log(data);
                    setTimeout(function(){ $('#modal_crear_departamento').modal('hide');},500);
                    alertas(data.msg, 'success')

                    var table = $('#tabladepartamentos').DataTable();

                    let botones = `
                    <button data-departamento_id_edit="${data.departamento.id}" type="button" class="btn update_parameterization modal_editar_departamento">
                        <i class="fas fa-edit"></i>
                    </button>
                    <button data-departamento_id="${data.departamento.id}" type="button" class="btn delete_parameterization btn_modal_eliminar">
                        <i class="fas fa-trash"></i>
                    </button>
                    `;

                    let filaTabla = table.row.add([
                        botones,
                        data.departamento.nombre,
                        data.departamento.created_at,

                    ]).draw();
                    // $('#modal_crear_departamento').hide()

                } else {
                    alertas(data.msg, 'error')
                }
            })
        }
    })

</script>
