

  <!-- Modal -->
  <div class="modal fade" id="modal_eliminar_municipio" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-danger btn_eliminar_municipio">Eliminar</button>
        </div>
      </div>
    </div>
  </div>

  <script>
      $('body').on('click','.btn_eliminar_municipio',function() {
        $.post(
            "{{ route('municipio.destroy') }}",
            $('#eliminar_municipio').serialize()
        ).done(function(data) {
            console.log(data);
            if(data.status == 200){
                alertas(data.msg, 'success')
                let row = $(`#id_municipio`).val();
                $(`[data-row="${row}"]`).remove();
            }else{
                alertas(data.msg, 'error')
            }
        })
      })



      function tabla(data) {
        var carguetabla = ''
        $.each(data['tabla'], function (key, val) {
            carguetabla += `<tr>
                    <td class="aling_btn_options">
                        <button type="button" class="btn update_parameterization">
                            <i class="fas fa-edit"></i>
                        </button>
                        <button data-municipio_id="${val.id}" type="button" class="btn delete_parameterization btn_modal_eliminar">
                            <i class="fas fa-trash"></i>
                        </button>
                    </td>
                    <td>${val.nombre}</td>
                    <td>${val.created_at}</td>
                </tr>`
        })
        $('#tmunicipios').append(carguetabla)
      }
  </script>
