$(document).ready(function () {
    var nombreHotel;
    $(".fichero").on("change", function () {
        var formData = new FormData($(this).parent()[0]);
        var idVuelque = $(this).parent().attr('id');
        console.log(idVuelque);
        var ruta = "subidaImgAjax.php";
        $.ajax({
            url: ruta,
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function (datos)
            {
                console.log(idVuelque);
                $("#respuesta" + idVuelque + " img").attr("src", datos + "?cachebuster=" + new Date().getTime());
            }
        });
    });

    //Dialogo con mensaje cargando
    $("#dialogoCargando").dialog({
        autoOpen: false,
        resizable: false,
        modal: true,
        show: 'fade',
        hide: 'fade',
        width: 'auto'
    });
    //Muestra un dialogo al comenzar una petición ajax
    $(document).ajaxStart(function () {
        $("#dialogoCargando").dialog("open");
        $('body').css('cursor', 'wait');
    });

    //Muestra un dialogo al Finalizar una petición ajax
    $(document).ajaxStop(function () {
        $("#dialogoCargando").dialog("close");
        $('body').css('cursor', 'auto');
    });

    //Para la primera opción del select
    var seleccionado2 = $('select[name=redesSociales]').val();
    var estado2 = $("#" + seleccionado2).text();
    if (estado2 === "habilitado") {
        $('#estadoCheck').prop('checked', true);
        console.log("Facebook Habilitado");
    }

    if (estado2 === "deshabilitado") {
        $('#estadoCheck').prop('checked', false);
        console.log("Facebook DESHabilitado")
    }
    $(document).on('change', '#redesSocialesSelect', function () {
        var seleccionado = $('select[name=redesSociales]').val();
        var estado = $("#" + seleccionado).text();
        console.log("Opción..." + estado);
        if (estado === "habilitado") {
            $('#estadoCheck').prop('checked', true);
        }

        if (estado === "deshabilitado") {
            $('#estadoCheck').prop('checked', false);
        }
    });

    $(document).on('change', '#estadoCheck', function () {
        var continuar = true;
        var seleccionado = $('select[name=redesSociales]').val();
        var estado = $("#" + seleccionado).text();
        if (estado === "habilitado") {
            estado = 'deshabilitado';
            continuar = false;
            console.log("se va a des");
            console.log(estado);
            $.post("modEstadoRedesSociales.php", {
                seleccionado: seleccionado,
                estado: estado
            }, function (data, status) {
                var response = $('<html />').html(data);
                //                                    response.find('#pag2Texto2 P')
                $(".estados").html(response.find('.estados'));
            });
        }

        console.log('test ' + continuar);
        if (estado === "deshabilitado" && continuar === true) {
            estado = 'habilitado';
            console.log("se va a hab");
            console.log(estado);
            $.post("modEstadoRedesSociales.php", {
                seleccionado: seleccionado,
                estado: estado
            }, function (data, status) {
                var response = $('<html />').html(data);
                //                                    response.find('#pag2Texto2 P')
                console.log(response.find('.estados'));
                $(".estados").html(response.find('.estados'));
            });
        }
    });

    $("#dialogoCorrecto").dialog({
        autoOpen: false,
        resizable: false,
        modal: true,
        width: 'auto'
    });

    $("#dialogoCorrecto2").dialog({
        autoOpen: false,
        resizable: false,
        modal: true,
        width: 'auto'
    });

    $("#dialogoCorrecto3").dialog({
        autoOpen: false,
        resizable: false,
        modal: true,
        width: 'auto'
    });

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
                    $.post("actualizaClaveAdmin.php", {
                        usuario: $("#nombreAdmin").text().trim(),
                        clave: $("#inputClave").val()
                    }, function (data, status) {
                        $("#dialogoCorrecto").dialog('open');
                        setTimeout(function () {
                            $("#dialogoCorrecto").dialog("close");
                            setTimeout("location.href = 'login.php';", 500);
                        }, 4000);
                    });//get			

                    $(this).dialog("close");
                }
            },
            "Cancelar": function () {
                $(this).dialog("close");
            }
        }
    });

    //Boton Cambiar Clave	
    $(document).on("click", "#cambiarClave", function () {
        $("#dialogoNuevaClave").dialog("open");
    });


    $("#dialogoNuevoNombre").dialog({
        autoOpen: false,
        resizable: false,
        minWidth: 200,
        modal: true,
        buttons: {
            "Guardar": function () {
                $.post("actualizaNombreHotel.php", {
                    nombre: $("#inputNombre").val()
                }, function (data, status) {
                    var response = $('<html />').html(data);
                    $("#nombreHotel").html(response.find('#nuevoNombre'));
                    $("#dialogoCorrecto3").dialog('open');
                    setTimeout(function () {
                        $("#dialogoCorrecto3").dialog("close");
                    }, 1500);
                });//get			

                $(this).dialog("close");

            },
            "Cancelar": function () {
                $(this).dialog("close");
            }
        }
    });

    //Boton Cambiar Nombre	
    $(document).on("click", "#editNombreHotel", function () {
        $("#dialogoNuevoNombre").dialog("open");
        $("#inputNombre").val($("#nombreHotel").text());
    });


    $("#dialogoNuevaUrlSocial").dialog({
        autoOpen: false,
        resizable: false,
        minWidth: 200,
        modal: true,
        buttons: {
            "Guardar": function () {
                $.post("actualizaUrlSocial.php", {
                    url: $("#inputUrl").val(),
                    id: $('select[name=redesSociales]').val()
                }, function (data, status) {
                    $("#dialogoCorrecto3").dialog('open');
                    setTimeout(function () {
                        $("#dialogoCorrecto3").dialog("close");
                    }, 1500);
                });

                $(this).dialog("close");
            },
            "Cancelar": function () {
                $(this).dialog("close");
            }
        }
    });

    //Boton Cambiar Nombre	
    $(document).on("click", "#editSocial", function () {
        $("#dialogoNuevaUrlSocial").dialog("open");
    });
});
