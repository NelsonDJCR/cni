

  <!-- Modal -->
  <div class="modal fade" id="modal_eliminar_departamento" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Departamentos</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          ¿Estás seguro de eliminar?
          Al hacerlo también eliminarás todos los municipos de este departamento
        </div>
        <form id="eliminar_departamento">
            @csrf
            <input id="id_departamento" type="hidden" name="departamento_id">
        </form>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
          <button type="button" class="btn btn-danger btn_eliminar_departamento">Si</button>
        </div>
      </div>
    </div>
  </div>

