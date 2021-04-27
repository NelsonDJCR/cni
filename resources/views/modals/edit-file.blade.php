<div class="modal fade " id="modal_file_edit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Editar documentos</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row mb-2">
                    <div class="col-11">
                        <label class="form-label">Edita tus documentos aquí</label>
                    </div>
                    <div class="col-1">
                        <button class="btn-more btn" id="add_file" type="button"><i class="fas fa-plus"></i></button>
                    </div>
                </div>
                <div class="col-12" id="box_files">
                    @foreach ($documents as $i)
                        <div class="row">
                            <div class="col-11">
                                <input type="text" value="{{ $i->nombre }}" disabled class="form-control mb-3" />
                            </div>
                            <div class="col-1">
                                <button type="button" data-id="{{ $i->id }}" class="btn-delete-file btn delete_file_edit record{{ $i->id }}"><i class="far fa-trash-alt"></i></button>
                            </div>
                        </div>
                    @endforeach
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
            title: '¿Eliminar documento?',
            text: "Esta acción no se puede revertir",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Eliminar',
            cancelmButtonText: 'Cancelar'
        }).then((result) => {
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
        })




    });

</script>
