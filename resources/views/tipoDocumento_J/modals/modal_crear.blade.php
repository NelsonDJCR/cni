<div class="modal fade" id="modal_crear_tipoDocumento" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Nuevo tipo de documento</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="crear_tipoDocumento">
                    @csrf
                    <div class="mb-3">
                        <label for="nombre" class="col-form-label">Nombre del documento</label>
                        <input type="text" class="form-control" id="nombre" name="nombre">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary crear_tipoDocumento">Guardar</button>
            </div>
        </div>
    </div>
</div>

<script>
    $('body').on('click', '.crear_tipoDocumento', function() {
        $.post(
            "{{ route('tipoDocumento.store') }}",
            $('#crear_tipoDocumento').serialize()
        ).done(function(data) {
            if (data.status == 200) {
                console.log(data);
                aniadirATabla(data)
            } else {
                alert(data.msg)
            }
        })
    })

    function aniadirATabla(data) {
        var carguetabla = ''
        let val = data['tabla']
        let departamento = data['departamento']
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
                    <td>${departamento.nombre}</td>
                    <td>${val.created_at}</td>
                </tr>`
        $('#tmunicipios').append(carguetabla)
    }

</script>