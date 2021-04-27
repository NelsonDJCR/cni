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

$(document).ready(function() {
    $('.table_es').DataTable( {
        "language": {
            "lengthMenu": "Mostar _MENU_ resultados por página",
            "zeroRecords": "Ningun resultado encontrado",
            "info": "Página _PAGE_ de _PAGES_",
            "infoEmpty": "No hay registros disponibles",
            "infoFiltered": "(filtrado de _MAX_ registro(s))",
            "sSearch": "Buscar: ",
            "paginate": {
                "first": "Primero",
                "last": "Ultimo",
                "next": "Siguiente",
                "previous": "Anterior"
            }
        }
    } );
} );


$("body").on("keypress", ".numberFormat", function (tecla) {
    // Solo permite numeros
    if ((tecla.charCode > 0 && tecla.charCode < 48) || tecla.charCode > 57)
        return false;
});

$("body").on("blur", ".emailValidateForm", function () {
    var regex = /[\w-\.]{2,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}/;

    if (regex.test($(this).val().trim())) {
        // alertas('Correo validado',"success");
    } else {
        // alertas("Correo no valido","error")
    }
});

function format_date(date) {
    date_part = date.split('-')
    date_format = new Date(date_part[0], date_part[1], date_part[2])
    date_format = date_format.toLocaleDateString("es-ES");
    return date_format;
}

function obligatorio(clase) {
    var i = 0;
    $("." + clase).each(function (key, val) {
        if ($(this).val() == "" || $(this).val() == null) {
            $(this).addClass("obligado");
            i++;
        } else {
            $(this).removeClass("obligado");
        }
    });
    if (i == 0) return true;
    else {
        alertas('Complete todos los campos', 'warning');
    }
}

function alertas(titulo, icono, text = null, html = null, accion = null, parameters = null) {
    switch (icono) {
        case "warning":
        case "success":
        case "error":
        case "danger":
            datos = {
                icon: icono,
                title: titulo,
            };

            if (text != null) {
                datos["text"] = text;
            }
            if (html != null) {
                datos["html"] = html;
            }
            Swal.fire(datos);

            break;
        case "confirm":
            Swal.fire({
                title: titulo,
                text: text,
                icon: "question",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Si",
                denyButtonText: "No",
            }).then((result) => {
                if (result.isConfirmed == true) {
                    if (accion != null) {
                        forward_static_call(accion, parameters);
                    } else {
                        confirmar();
                    }
                }
            });

            break;
    }

    function forward_static_call(cb, parameters = null) {
        var func;
        if (typeof cb == "string") {
            if (typeof this[cb] == "function") {
                func = this[cb];
            } else {
                func = new Function(null, "return " + cb)();
            }
        } else if (Object.prototype.toString.call(cb) === "[object Array]") {
            func = eval(cb[0] + "['" + cb[1] + "']");
        }

        if (typeof func != "function") {
            throw new Error(func + " is not a valid function");
        }

        return func.apply(null, Array.prototype.slice.call(arguments, 1));
    }
}
