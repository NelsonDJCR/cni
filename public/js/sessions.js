$("#box_file").click(function() {
    $("#modal_file").modal('show')
});
var file = `<div class="row">
              <div class="col-11">
                  <input name="file[]" type="file" class="form-control mb-3" />
              </div>
              <div class="col-1">
                  <button class="btn-delete-file btn delete_file "><i class="far fa-trash-alt"></i></button>
              </div>
          </div>`;
$("#add_file").click(function() {
  $("#box_files").append(file)
});
$('body').on('click', '.delete_file', function() {
  $(this).parent().parent().remove();
});
$("#box_file").click(function() {
    $("#modal_file_edit").modal('show')
});
$("#send_session").click(function() {
    let dataForm = new FormData(document.getElementById('form_session'));
    $.ajax({
        type: 'POST',
        url: '/saveSesion',
        dataType: "json",
        data: dataForm,
        cache: false,
        contentType: false,
        processData: false,
        success: function(data) {
            if (data.code == 200) {
                Swal.fire({
                    icon: 'success',
                    title: 'Perfecto',
                    text: 'Los datos han sido guardados exitosamente',
                }).then(function() {
                    window.location = '/list-cabildos';
                });
            } else {
                Swal.fire({
                    icon: 'error',
                    title: data.msg,
                    text: 'Ingrese de forma correcta todos los campos'
                });
            }
        }
    })
});
