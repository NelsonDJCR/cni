<div class="modal fade" id="modal_edit_municipio" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar municipio</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editar_municipio">
                    @csrf
                    <input id="id_municipio_edit" type="hidden" name="municipio_id" value="">
                    <div class="mb-3">
                        <label for="nombre_municipio" class="col-form-label">Nombre de municipio</label>
                        <input type="text" class="form-control validar" id="nombre_municipio_edit" name="nombre_edit">
                    </div>
                    <div class="mb-3">
                        <label for="message-text1" class="col-form-label">Departamento</label>
                        <select name="dep_id_edit" id="message-text1" class="form-select validar">
                            <option value="">Selecciona</option>
                            @foreach ($departamentos as $row)
                                <option value="{{ $row->id }}">{{ $row->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary editar_municipio">Guardar</button>
            </div>
        </div>
    </div>
</div>

<script>
    $('body').on('click', '.editar_municipio', function() {

        if(obligatorio('validar')){
            $.post(
                "{{ route('municipio.update') }}",
                $('#editar_municipio').serialize()
            ).done(function(data) {
                if(data.status == 200){
                    alertas(data.msg, 'success')
                    let val = data.municipio
                    let departamento = data.departamento
                    let row = $(`#id_municipio_edit`).val();
                    $(`[data-row="${row}"]`).html(`
                    <td class="aling_btn_options">
                            <button data-municipio_id_edit="${val.id}" type="button" class="btn update_parameterization modal_editar_municipio">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button data-municipio_id="${val.id}" type="button" class="btn delete_parameterization btn_modal_eliminar">
                                <i class="fas fa-trash"></i>
                            </button>
                        </td>
                        <td>${val.nombre}</td>
                        <td>${departamento.nombre}</td>
                        <td>${val.created_at}</td>
                    `);

                }else{
                    alertas(data.msg, 'error')
                }
            })
        }
    })

</script>
