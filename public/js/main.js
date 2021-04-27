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