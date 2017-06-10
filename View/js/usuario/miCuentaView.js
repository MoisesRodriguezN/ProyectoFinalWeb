$(document).ready(function () {
    var usuario;
    var dni2;

    //-----------------Modificacion datos usuario-------------------------
    $("#formModificar").validate({
        rules: {
            DNI: {required: true, minlength: 9, maxlength: 9},
            nombre: {required: true},
            apellido1: {required: true},
            apellido2: {required: true}
        },
        messages: {
            DNI: "Debe introducir un dni Válido.",
            nombre: "Debe introducir un Nombre.",
            apellido1: "Debe introducir un apellido.",
            apellido2: "Debe introducir un apellido.",
        }
    });

    $("#dialogoNuevoCliente").dialog({
        autoOpen: false,
        resizable: false,
        minWidth: 200,
        modal: true,
        buttons: {
            "Guardar": function () {
                if ($('#formModificar').valid()) {
                    $.post("actualizaDatosUsuario.php", {
                        nombre: $("#inputNombre").val(),
                        apellido1: $("#inputApellido").val(),
                        apellido2: $("#inputApellido2").val(),
                        DNI: $("#inputDni").val(),
                        dni2: dni2,
                        usuario: usuario
                    }, function (data, status) {
                        $("#datosUsuario").html(data);
                    });//get			

                    $(this).dialog("close");
                }
            },
            "Cancelar": function () {
                $(this).dialog("close");
            }
        }//buttons
    });

    //Boton Nuevo Cliente	
    $(document).on("click", "#cambiarDatos", function () {
        $("#dialogoNuevoCliente").dialog("open");
        $("#inputNombre").val($.trim($(this).parent().siblings("td.nombre").text()));
        $("#inputApellido").val($.trim($(this).parent().siblings("td.apellido").text()));
        $("#inputApellido2").val($.trim($(this).parent().siblings("td.apellido2").text()));
        $("#inputDni").val($.trim($(this).parent().siblings("td.dni").text()));
        usuario = $(this).parent().siblings("td.usuario").text().trim();
        dni2 = $(this).parent().siblings("td.dni").text().trim();

    });

    //-----------------FIN modificación datos usuario---------------------
    //-----------------Modificacion clave usuario-------------------------
    $("#formModificarClave").validate({
        rules: {
            clave: {required: true, minlength: 6, maxlength: 20},
            claveComprueba: {
                equalTo: "#inputClave"
            }
        },
        messages: {
            clave: "Mínimo 6 carácteres",
            claveComprueba: "Las claves deben ser iguales"
        }
    });

    $("#dialogoNuevaClave").dialog({
        autoOpen: false,
        resizable: false,
        minWidth: 200,
        modal: true,
        buttons: {
            "Guardar": function () {
                if ($('#formModificarClave').valid()) {
                    $.post("actualizaClaveUsuario.php", {
                        usuario: usuario,
                        clave: $("#inputClave").val()
                    }, function (data, status) {
                        $("#datosUsuario").html(data);
                    });//get			

                    $(this).dialog("close");
                }
            },
            "Cancelar": function () {
                $(this).dialog("close");
            }
        }//buttons
    });

    //Boton Cambiar Clave	
    $(document).on("click", "#cambiarClave", function () {
        $("#dialogoNuevaClave").dialog("open");
        usuario = $(this).parent().siblings("td.usuario").text().trim();
    });
    //-----------------FIN Modificacion clave usuario---------------------
});

