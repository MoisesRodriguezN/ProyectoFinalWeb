$(document).ready(function () {
    var codCliente;
    //Crea el diálogo con dos botones, Borrar y Cancelar. 
    //-----------Borrado--------------
    $("#dialogoborrar").dialog({
        autoOpen: false,
        resizable: false,
        modal: true,
        buttons: {
            //BOTON DE BORRAR
            "Borrar": function () {
                //Ajax con post
                $.post("../../Controller/administracion/borrarCliente.php", {"codCliente": codCliente}, function (data, status) {
                    //alert("Funciona!"); //Manda codCliente y recibe un resultado y estado.
                    $("#cliente_" + codCliente).fadeOut(500);
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
        codCliente = $(this).parents("tr").attr("data-codCliente");
        $("#dialogoborrar").dialog("open");
    });
    //-------------FIN Borrado---------------
    //-------------Modificación--------------
    $("#formModificar").validate({
        rules: {
            codCliente: {required: true, number: true},
            DNI: {required: true, minlength: 9, maxlength: 9},
            nombre: {required: true},
            apellido1: {required: true},
            apellido2: {required: true}
        },
        messages: {
            codCliente: "Debe introducir el código numérico del cliente.",
            DNI: "Debe introducir un dni Válido.",
            nombre: "Debe introducir un Nombre.",
            apellido1: "Debe introducir un apellido.",
            apellido2: "Debe introducir un apellido."
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
                    $.post("../../Controller/administracion/modificarCliente.php", {
                        codCliente: codCliente,
                        dni: $("#inputDni").val(),
                        nombre: $("#inputNombre").val(),
                        apellido: $("#inputApellido").val(),
                        apellido2: $("#inputApellido2").val(),
                        pagina: $("#inputPag").val(),
                        orden: orden2,
                        tipoOrden: tipoOrden2 //ASC DESC
                    }, function (data, status) {
                        $("#listaClientes").html(data);
                    });//post	

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
        codCliente = $(this).parents("tr").attr("data-codCliente");
        $("#inputCodCliente").val(codCliente);
        //Para que ponga el campo direccion con su valor
        $("#inputDni").val($.trim($(this).parent().siblings("td.dni").text()));

        $("#inputNombre").val($.trim($(this).parent().siblings("td.nombre").text()));

        $("#inputApellido").val($.trim($(this).parent().siblings("td.apellido").text()));

        $("#inputApellido2").val($.trim($(this).parent().siblings("td.apellido2").text()));

        $("#inputPag").val(numeroPagina2);

        $("#dialogomodificar").dialog("open");

    });
    //------------FIN Modificación---------

    //---- NUEVO --------------
    //Boton de nuevo inmueble 
    //Crea nueva fila al final de la tabla
    //Con dos nuevos botones (guardarnuevo y cancelarnuevo)
    /* $("#nuevo").on("click",function(){	
     $.post("formNuevoCliente.php",function(data){
     //Añade a la tabla de datos una nueva fila
     $("#tabladatos").append(data);
     //Ocultamos boton de nuevo inmueble
     //Para evitar añadir mas de uno 
     //a la vez
     $("#nuevo").hide();			
     });//get	
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
     $.post("altaCliente.php", {
     dni : $("#dniNuevo").val() ,
     nombre: $("#nombreNuevo").val() ,
     apellido1: $("#apellido1Nuevo").val() ,
     apellido2 : $("#apellido2Nuevo").val() ,
     usuario : $("#usuarioNuevo").val() ,
     clave : $("#claveNueva").val() 
     },function(data){
     //Pinta de nuevo la tabla
     $("#listaClientes").html(data);
     //Vuelve a mostrar el boton de nuevo
     $("#nuevo").show();		
     });//post	
     });*/
    //------------------------- Nuevo Cliente-----------------------------
    $("#formNuevoCliente").validate({
        rules: {
            DNI: {required: true, minlength: 9, maxlength: 9},
            nombre: {required: true},
            apellido1: {required: true},
            apellido2: {required: true},
            nombreUsuario: {required: true},
            clave: {required: true}
        },
        messages: {
            DNI: "Debe introducir un dni Válido.",
            nombre: "Debe introducir un Nombre.",
            apellido1: "Debe introducir un apellido.",
            apellido2: "Debe introducir un apellido.",
            nombreUsuario: "Debe introducir el código numérico del cliente.",
            clave: "Debe introducir el código numérico del cliente."
        }
    });
    $("#dialogoNuevoCliente").dialog({
        autoOpen: false,
        resizable: false,
        minWidth: 450,
        modal: true,
        close: function () {
            $("#nuevo").show();
        },
        buttons: {
            "Guardar": function () {
                if ($('#formNuevoCliente').valid()) {
                    $.post("../../Controller/administracion/altaCliente.php", {
                        dni: $("#dniNuevo").val(),
                        nombre: $("#nombreNuevo").val(),
                        apellido1: $("#apellido1Nuevo").val(),
                        apellido2: $("#apellido2Nuevo").val(),
                        usuario: $("#usuarioNuevo").val(),
                        clave: $("#claveNueva").val()
                    }, function (data, status) {
                        $("#listaClientes").html(data);
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

    //Boton Nuevo Cliente	
    $(document).on("click", "#nuevo", function () {
        $("#nuevo").hide();
        $("#dialogoNuevoCliente").dialog("open");

    });
    //-----------------------FIN Nuevo Cliente----------------------------
    //-------------Reservar--------------
    $("#dialogoreservar").dialog({
        autoOpen: false,
        resizable: false,
        minWidth: 450,
        modal: true,
        buttons: {
            "Guardar": function () {
                $.post("reservarHabitacion.php", {
                    codCliente: codCliente,
                    codHabitacion: $("#inputCodHabitacionReservar").val(),
                    fechaEntrada: $("#inputfechaEntradaReservar").val(),
                    fechaSalida: $("#inputFechaSalidaReservar").val()
                }, function (data, status) {
                    //$("#listaClientes").html(data);
                });//post	

                $(this).dialog("close");
            },
            "Cancelar": function () {
                $(this).dialog("close");
            }
        }//buttons
    });

    //Boton Reservar	
    $(document).on("click", ".btn-reservar", function () {
        codCliente = $(this).parents("tr").attr("data-codCliente");
        $("#inputCodClienteReservar").val(codCliente);
        //Para que ponga el campo direccion con su valor
        $("#inputDniReservar").val($.trim($(this).parent().siblings("td.dni").text()));

        $("#inputNombreReservar").val($.trim($(this).parent().siblings("td.nombre").text()));

        $("#inputApellidoReservar").val($.trim($(this).parent().siblings("td.apellido").text()));

        $("#inputApellido2Reservar").val($.trim($(this).parent().siblings("td.apellido2").text()));

        $("#dialogoreservar").dialog("open");

    });
    //------------FIN Reserva---------
    
    //------------Buscador DNI------------
    $("#buscadorDni").keyup(function (e) {
        var consulta = $("#buscadorDni").val();
        $.get("../../Controller/administracion/obtieneListaClientes.php", {
            dni: consulta,
            //orden : orden,
            //tipoOrden: tipoOrden
        }, function (data) {
            //Pinta de nuevo la tabla
            $("#listaClientes").html(data);
        });//post	
    });
    //--------------FIN Buscador DNI------
    $(document).on("click", ".paginacion a", function (event) {
        event.preventDefault();
        var numeroPagina = $(this).data("pagina");
        var orden = $("#tabladatos").data("orden");
        var tipoOrden = $("#tabladatos").data("tipo-orden");
        $.get("../../Controller/administracion/obtieneListaClientes.php", {
            pagina: numeroPagina,
            orden: orden,
            tipoOrden: tipoOrden
        }, function (data) {
            //Pinta de nuevo la tabla
            $("#listaClientes").html(data);
        });//post	
    });

    $(document).on("click", ".btn-ordenar", function () {
        var orden = $('select[name=orden]').val();
        var tipoOrden = $('select[name=tipoOrden]').val();
        $.get("../../Controller/administracion/obtieneListaClientes.php", {
            orden: orden,
            tipoOrden: tipoOrden
        }, function (data) {
            //Pinta de nuevo la tabla
            $("#listaClientes").html(data);
        });//post	
    });
});