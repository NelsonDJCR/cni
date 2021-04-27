

  <!-- Modal -->
  <div class="modal fade" id="modal_eliminar_tipoDocumento" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tipos de documento</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          ¿Estás seguro de eliminar?
          Al hacerlo también eliminarás todos los documentos de este tipo
        </div>
        <form id="eliminar_tipoDocumento">
            @csrf
            <input id="id_tipoDocumento" type="hidden" name="tipoDocumento_id">
        </form>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-danger btn_eliminar_tipoDocumento">Eliminar</button>
        </div>
      </div>
    </div>
  </div>

  <script>
      $('body').on('click','.btn_eliminar_tipoDocumento',function() {
        $.post(
            "{{ route('tipoDocumento.destroy') }}",
            $('#eliminar_tipoDocumento').serialize()
        ).done(function(data) {
            console.log(data);
            if(data.status == 200){
                alertas(data.msg,'success')
                let row = $(`#id_tipoDocumento`).val();
                $(`[data-row="${row}"]`).remove();
            }else{
                alertas(data.msg, 'error')
            }
        })
      })
  </script>
