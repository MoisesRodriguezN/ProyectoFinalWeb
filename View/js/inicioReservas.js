$(document).ready(function () {
    var codHabitacion;
    var codCliente;
    var fechaEntrada;
    var codReserva;
    //-----------Borrado--------------
    $("#dialogoborrar").dialog({
        autoOpen: false,
        resizable: false,
        modal: true,
        buttons: {
            //BOTON DE BORRAR
            "Borrar": function () {
                //Ajax con post
                $.post("borrarReserva.php", {
                    codHabitacion: codHabitacion,
                    codCliente: codCliente,
                    fechaEntrada: fechaEntrada
                }, function (data, status) {
                    //alert("Funciona!"); //Manda codCliente y recibe un resultado y estado.
                    $("#" + codReserva).fadeOut(500);
                });//post			
                //Cerrar la ventana de dialogo				
                $(this).dialog("close");
            },
            "Cancelar": function () {
                //Cerrar la ventana de dialogo
                $(this).dialog("close");
            }
        }//buttons
    });
    $(document).on("click", ".btn-eliminar", function () {
        codHabitacion = $(this).parents("tr").attr("data-codHabitacion");
        codCliente = $(this).parents("tr").attr("data-codCliente");
        fechaEntrada = $(this).parents("tr").attr("data-fechaEntrada");
        codReserva = $(this).parents("tr").attr("id");

        $("#dialogoborrar").dialog("open");
    });


    //-------------FIN Borrado---------------

    //-------------Modificación--------------
    $("#formReservar").validate({
        rules: {
            codCliente: {required: true, number: true},
            DNI: {required: true, minlength: 9, maxlength: 9},
            nombre: {required: true},
            apellido1: {required: true},
            apellido2: {required: true},
            fechaEntrada: {required: true},
            fechaSalida: {required: true}
        },
        messages: {
            codCliente: "Debe introducir el código numérico del cliente.",
            DNI: "Debe introducir un dni Válido.",
            nombre: "Debe introducir un Nombre.",
            apellido1: "Debe introducir un apellido.",
            apellido2: "Debe introducir un apellido.",
            fechaEntrada: "Debe introducir una fecha de Entrada.",
            fechaSalida: "Debe introducir una fecha de Salida."
        }
    });

    $("#dialogomodificar").dialog({
        autoOpen: false,
        resizable: false,
        minWidth: 450,
        modal: true,
        buttons: {
            "Guardar": function () {
                var orden2 = $('select[name=orden]').val();
                var tipoOrden2 = $('select[name=tipoOrden]').val();
                if ($('#formReservar').valid()) {
                    $.post("modificarReserva.php", {
                        codHabitacion: codHabitacion,
                        codCliente: codCliente,
                        fechaEntrada: $("#inputfechaEntrada").val(),
                        fechaEntradaHidden: fechaEntrada,
                        fechaSalida: $("#inputFechaSalida2").val(),
                        apellido2: $("#inputApellido2").val(),
                        pagina: $("#inputPag").val(),
                        orden: orden2,
                        tipoOrden: tipoOrden2 //ASC DESC
                    }, function (data, status) {
                        $("#listaReservas").html(data);
                    });//get	

                    $(this).dialog("close");
                }

            },
            "Cancelar": function () {
                $(this).dialog("close");
            }
        }//buttons
    });

    //Boton Modificar	
    $(document).on("click", ".btn-modificar", function () {
        var numeroPagina2 = $("spam.pagActual").text();
        codHabitacion = $(this).parents("tr").attr("data-codHabitacion");

        codCliente = $(this).parents("tr").attr("data-codCliente");

        fechaEntrada = $(this).parents("tr").attr("data-fechaEntrada");

        $("#inputCodCliente").val(codCliente);
        //Para que ponga el campo codCliente con su valor
        $("#inputCodHabitacion").val(codHabitacion);

        $("#inputfechaEntrada").val(fechaEntrada);

        $("#inputDni").val($.trim($(this).parent().siblings("td.dni").text()));

        $("#inputNombre").val($.trim($(this).parent().siblings("td.nombre").text()));

        $("#inputApellido").val($.trim($(this).parent().siblings("td.apellido1").text()));

        $("#inputApellido2").val($.trim($(this).parent().siblings("td.apellido2").text()));

        $("#inputFechaSalida2").val($.trim($(this).parent().siblings("td.fechaSalida").text()));

        $("#inputPag").val(numeroPagina2);

        $("#dialogomodificar").dialog("open");

    });
    //------------FIN Modificación---------

    //----------------Paginación--------------------------------------
    $(document).on("click", ".paginacion a", function (event) {
        event.preventDefault();
        var numeroPagina = $(this).data("pagina");
        var orden = $("#tabladatos").data("orden");
        var tipoOrden = $("#tabladatos").data("tipo-orden");
        $.get("obtieneListaReservas.php", {
            pagina: numeroPagina,
            orden: orden,
            tipoOrden: tipoOrden
        }, function (data) {
            //Pinta de nuevo la tabla
            $("#listaReservas").html(data);
        });//post	
    });
    //-----------------FIN paginación----------------------------------

    //-----------------Ordenar-----------------------------------------
    $(document).on("click", ".btn-ordenar", function () {
        var orden = $('select[name=orden]').val();
        var tipoOrden = $('select[name=tipoOrden]').val();
        $.get("obtieneListaReservas.php", {
            orden: orden,
            tipoOrden: tipoOrden
        }, function (data) {
            //Pinta de nuevo la tabla
            $("#listaReservas").html(data);
        });//post	
    });
    //-----------------FIN Ordenar-------------------------------------

});

