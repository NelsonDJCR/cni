<!-- Modal -->
<div class="modal fade" id="modal_eliminar_municipio" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">CNE</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                ¿Estás seguro de eliminar este municipio?
            </div>
            <form id="eliminar_municipio">
                @csrf
                <input id="id_municipio" type="hidden" name="municipio_id">
            </form>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                <button type="button" class="btn btn-danger btn_eliminar_municipio">Si</button>
            </div>
        </div>
    </div>
</div>
