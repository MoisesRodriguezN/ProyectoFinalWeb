$(document).ready(function () {
    $("#claveUser").focusin(function () {
        $("#nombreUser").fadeOut(300, function () {
            $("#claveUserComprueba").fadeIn(200);
        });
    }); //Oculta nombre usuario y muestra un campo para comprobar la clave

    $(".camposRegistroUsusarios").dblclick(function () {
        $("#claveUserComprueba").fadeOut(300, function () {
            $("#nombreUser").fadeIn(200);
        });
    }); //Oculta el campo de comprobar la clave y muestra el de usuario

    //Validación del formulario.
    $("#formRegistroUsusarios").validate({
        rules: {
            clave: {required: true, minlength: 6, maxlength: 20},
            claveComprueba: {
                equalTo: "#claveUser"
            },
            dni: {required: true, minlength: 9, maxlength: 9},
            nombre: {required: true},
            apellido1: {required: true},
            apellido2: {required: true},
            usuario: {required: true}
        },
        messages: {
            clave: "Clave de 6 carácteres mínimo",
            dni: "Introduce un DNI válido",
            nombre: "Introduce un nombre",
            apellido1: "El campo está requerido",
            apellido2: "El campo está requerido",
            usuario: "El campo está requerido",
            claveComprueba: "Introduce la misma clave"
        },

        errorPlacement: function (error, element) {
            error.insertBefore(element);
        } //Inserta los mensajes de error por encima de cada campo.
    });
});