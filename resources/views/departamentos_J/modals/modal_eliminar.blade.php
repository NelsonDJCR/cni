

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
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-danger btn_eliminar_departamento">Eliminar</button>
        </div>
      </div>
    </div>
  </div>

  <script>
      $('body').on('click','.btn_eliminar_departamento',function() {
        $.post(
            "{{ route('departamento.destroy') }}",
            $('#eliminar_departamento').serialize()
        ).done(function(data) {
            console.log(data);
            if(data.status == 200){
                alertas(data.msg, 'success')
                let row = $(`#id_departamento`).val();
                $(`[data-row="${row}"]`).remove();
                $('#departamento * ').remove()
                tabla(data)
            }else{
                // alert(data.msg)
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
