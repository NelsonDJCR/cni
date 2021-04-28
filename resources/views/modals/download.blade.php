<div class="modal fade " id="modal_download" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Listado de documentos</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row mb-2">
                    <div class="col-12">
                        <label class="form-label">Edita tus documentos aquí</label>
                    </div>
                </div>
                <div class="col-12" id="box_files">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-bs-dismiss="modal">Aceptar</button>
            </div>
        </div>
    </div>
</div>
<script>
    $(".delete_file_edit").click(function() {
        var id = $(this).data('id');
        var file = $(this);
        Swal.fire({
            icon: 'question',
            title: '¿Eliminar documento?',
            text: "Esta acción no se puede revertir",
            showCancelButton: true,
            confirmButtonText: `Eliminar`,
        }).then((result) => {
            if (result.isConfirmed) {
                $.post('/edit-sesion-document', {
                    _token: "{{ csrf_token() }}",
                    id: id
                }).done(function(e) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Perfecto',
                        text: 'El documento ha sido eliminado',
                    });
                    file.parent().parent().remove();
                });
            } else if (result.isDenied) {
                Swal.fire('Changes are not saved', '', 'info')
            }
        })
    });

</script>
