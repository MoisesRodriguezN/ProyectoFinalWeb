//Dialogo de edición
$(document).ready(function ($) {

    var idTexto;

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

    //Cambia de color el contenedor al poner el ratón encima
    $("#pag2Texto1").mouseover(function () {
        if ($('#admLog').text() === 'true') {
            $("#pag2Texto1").css("background-color", "lightgray");
        } else {
            $('#pag2Texto1').css('cursor', 'auto');
        }
    });

    $("#pag2Texto1").mouseout(function () {
        $("#pag2Texto1").css("background-color", "#ecce86");
    });

    $("#pag2Texto2").mouseover(function () {
        if ($('#admLog').text() === 'true') {
            $("#pag2Texto2").css("background-color", "lightgray");
        } else {
            $('#pag2Texto2').css('cursor', 'auto');
        }
    });

    $("#pag2Texto2").mouseout(function () {
        $("#pag2Texto2").css("background-color", "#ecce86");
    });
    //FIN Cambia de color el contenedor al poner el ratón encima

    $('.textoDescripciones').css('cursor', 'pointer');

    //Dialogo con el editor de texto
    $("#dialogoTexto1").dialog({
        autoOpen: false,
        resizable: true,
        closeOnEscape: true,
        modal: true,
        show: 'fade',
        hide: 'fade',
        width: 'auto',
        height: 'auto',
        buttons: {
            "Guardar": function () {
                $.post("../../Controller/administracion/editarServicio.php", {
                    idTextoEditar: $('#idTextoMod').text(),
                    servicios: tinymce.activeEditor.getContent() //Obtiene el contenido
                            // del texArea
                }, function (data, status) {
                    var response = $('<html />').html(data);

                    if ($('#idTextoMod').text() === "pag2Texto1") {
                        $("#pag2Texto1").html(response.find('#pag2Texto1 P'));
                    }

                    if ($('#idTextoMod').text() === "pag2Texto2") {
                        $("#pag2Texto2").html(response.find('#pag2Texto2 P'));
                    }
                    $("#dialogoCorrecto").dialog('open');
                    setTimeout(function () {
                        $("#dialogoCorrecto").dialog("close");
                    }, 3000);
                });//post	

                $(this).dialog("close");

            },
            "Cancelar": function () {
                $(this).dialog("close");
            }
        }
    });

    //Modifica el tamaño y posición del dialogo según el tamaño de la ventana
    $(window).resize(function () {
        $("#dialogoTexto1").dialog("option", "position", {my: "center", at: "center", of: window});
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

    //Dialogo con mensaje correcto
    $("#dialogoCorrecto").dialog({
        autoOpen: false,
        resizable: false,
        modal: true,
        width: 'auto'
    });

    //Peticiones ajax para la carga del texto clicado en el editor
    $(document).on("click", "#pag2Texto1, #pag2Texto2", function () {
        if ($('#admLog').text() === 'true') {
            idTexto = $(this).attr("id");
            $.ajax({
                data: {idTextoEdit: idTexto},
                url: '../../Controller/administracion/editarServicio.php',
                type: 'post',
                timeout: 0,
                success: function (response) {
                    $("#dialogoTexto1").html(response);
                    setTimeout(function () {
                        $("#dialogoTexto1").dialog("open");
                    }, 200);
                }
            });
        }
    });
});

