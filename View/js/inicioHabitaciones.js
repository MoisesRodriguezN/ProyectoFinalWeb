$(document).ready(function () {
    var codHabitacion;

    //Crea el diálogo con dos botones, Borrar y Cancelar. 
    //-----------Borrado------------------------------------------------------
    $("#dialogoborrar").dialog({
        autoOpen: false,
        resizable: false,
        modal: true,
        buttons: {
            //BOTON DE BORRAR
            "Borrar": function () {
                //Ajax con post
                $.post("borrarHabitacion.php", {"codHabitacion": codHabitacion}, function (data, status) {
                    $("#habitacion_" + codHabitacion).fadeOut(500);
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
        $("#dialogoborrar").dialog("open");
    });
    //-------------FIN Borrado------------------------------------------------

    //-------------Modificación-----------------------------------------------
    $("#formModificar").validate({
        rules: {
            codHabitacion: {required: true, number: true},
            tipo: {required: true},
            capacidad: {required: true},
            planta: {required: true},
            tarifa: {required: true}
        },
        messages: {
            codHabitacion: "Debe introducir el código numérico de la habitacion.",
            tipo: "Debe introducir un tipo.",
            capacidad: "Debe introducir una capacidad.",
            planta: "Debe introducir una planta.",
            tarifa: "Debe introducir una tarifa.",
        }
    });

    $("#dialogomodificar").dialog({
        autoOpen: false,
        resizable: false,
        modal: true,
        buttons: {
            "Guardar": function () {
                var orden2 = $('select[name=orden]').val();
                var tipoOrden2 = $('select[name=tipoOrden]').val();
                if ($('#formModificar').valid()) {
                    $.post("modificarHabitacion.php", {
                        codHabitacion: codHabitacion,
                        tipo: $("#inputTipo").val(),
                        capacidad: $("#inputCapacidad").val(),
                        planta: $("#inputPlanta").val(),
                        tarifa: $("#inputTarifa").val(),
                        pagina: $("#inputPag").val(),
                        orden: orden2,
                        tipoOrden: tipoOrden2 //ASC DESC
                    }, function (data, status) {
                        $("#listaHabitaciones").html(data);
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
        $("#inputCodHabitacion").val(codHabitacion);

        $("#inputTipo").val($.trim($(this).parent().siblings("td.tipo").text()));

        $("#inputCapacidad").val($.trim($(this).parent().siblings("td.capacidad").text()));

        $("#inputPlanta").val($.trim($(this).parent().siblings("td.planta").text()));

        $("#inputTarifa").val($.trim($(this).parent().siblings("td.tarifa").text()));

        $("#inputPag").val(numeroPagina2);

        $("#dialogomodificar").dialog("open");

    });
    //------------FIN Modificación--------------------------------------------

    //------------------- NUEVO ----------------------------------------------
    /*$(document).on("click","#nuevo",function(){		
     $.post("formNuevaHabitacion.php",function(data){
     //Añade a la tabla de datos una nueva fila
     $("#tabladatos").append(data);
     //Ocultamos boton de nuevo
     //Para evitar añadir mas de uno 
     //a la vez
     $("#nuevo").hide();			
     });//post	
     });			
     
     //Boton de cancelar nuevo
     $(document).on("click","#cancelarnuevo",function(){		
     //Elimina la nueva fila creada
     $("#filanueva").remove();
     //vuelve a mostrar el botón de nuevo (+)
     $("#nuevo").show();
     
     });			
     
     //Boton de guardar nuevo
     $(document).on("click","#guardarnuevo",function(){	
     $.post("altaHabitacion.php", {
     codHabitacion : $("#codHabitacionNuevo").val() ,
     tipo: $("#tipoNuevo").val() ,
     capacidad: $("#capacidadNuevo").val() ,
     planta : $("#plantaNuevo").val() ,
     tarifa : $("#tarifaNuevo").val()
     },function(data){
     //Pinta de nuevo la tabla
     $("#listaHabitaciones").html(data);
     //Vuelve a mostrar el boton de nuevo
     $("#nuevo").show();		
     });//post	
     });*/
    //-------------------------FIN Nuevo--------------------------------------

    //------------------------- Nuevo Cliente-----------------------------
    $("#formNuevaHabitacion").validate({
        rules: {
            codHabitacion: {required: true, number: true},
            tipo: {required: true},
            capacidad: {required: true},
            planta: {required: true},
            tarifa: {required: true}
        },
        messages: {
            codHabitacion: "Debe introducir el código numérico de la habitacion.",
            tipo: "Debe introducir un tipo.",
            capacidad: "Debe introducir una capacidad.",
            planta: "Debe introducir una planta.",
            tarifa: "Debe introducir una tarifa.",
        }
    });

    $("#dialogoNuevaHabitacion").dialog({
        autoOpen: false,
        resizable: false,
        minWidth: 450,
        modal: true,
        buttons: {
            "Guardar": function () {
                if ($('#formNuevaHabitacion').valid()) {
                    $.post("altaHabitacion.php", {
                        codHabitacion: $("#codHabitacionNuevo").val(),
                        tipo: $("#tipoNuevo").val(),
                        capacidad: $("#capacidadNuevo").val(),
                        planta: $("#plantaNuevo").val(),
                        tarifa: $("#tarifaNuevo").val()
                    }, function (data, status) {
                        $("#listaHabitaciones").html(data);
                    });//get			

                    $(this).dialog("close");
                    $("#nuevo").show();
                }
            },
            "Cancelar": function () {
                $(this).dialog("close");
                $("#nuevo").show();
            }
        }//buttons
    });

    //Boton Nueva Habitacion
    $(document).on("click", "#nuevo", function () {
        $("#nuevo").hide();
        $("#dialogoNuevaHabitacion").dialog("open");

    });
    //-----------------------FIN Nuevo Cliente----------------------------
    //-------------------------Paginación-------------------------------------
    $(document).on("click", ".paginacion a", function (event) {
        event.preventDefault();
        var numeroPagina = $(this).data("pagina");
        var orden = $("#tabladatos").data("orden");
        var tipoOrden = $("#tabladatos").data("tipo-orden");
        $.get("ObtieneListaHabitaciones.php", {
            pagina: numeroPagina,
            orden: orden,
            tipoOrden: tipoOrden
        }, function (data) {
            //Pinta de nuevo la tabla
            $("#listaHabitaciones").html(data);
        });//get
    });
    //-------------------------FIN Paginación---------------------------------
    //-------------------------Ordenar----------------------------------------
    $(document).on("click", ".btn-ordenar", function () {
        var orden = $('select[name=orden]').val();
        var tipoOrden = $('select[name=tipoOrden]').val();
        $.get("ObtieneListaHabitaciones.php", {
            orden: orden,
            tipoOrden: tipoOrden
        }, function (data) {
            //Pinta de nuevo la tabla
            $("#listaHabitaciones").html(data);
        });//get
    });
    //-------------------------Fin Ordenar------------------------------------
});