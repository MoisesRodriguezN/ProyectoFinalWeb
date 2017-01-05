<?php
session_start(); // Inicio de sesión
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Administración Hotel - Reservas</title>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="../css/main.css">
        <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.15.0/jquery.validate.js"></script>
        <link rel="stylesheet" type="text/css" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <style>
            #dialogoborrar{
                display: none;
            }

            #dialogomodificar{
                display: none;
            }

        </style> 
        <script>
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
                          $.post("eliminarReserva.php", {
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
               codCliente: { required: true, number: true},
               DNI: { required: true, minlength: 9, maxlength:9},
               nombre: { required:true},
               apellido1: { required: true},
               apellido2: { required: true},
               fechaEntrada: { required: true},
               fechaSalida: { required: true}
               },
               messages: {
               codCliente: "Debe introducir el código numérico del cliente.",
               DNI: "Debe introducir un dni Válido.",
               nombre : "Debe introducir un Nombre.",
               apellido1 : "Debe introducir un apellido.",
               apellido2 : "Debe introducir un apellido.",
               fechaEntrada : "Debe introducir una fecha de Entrada.",
               fechaSalida : "Debe introducir una fecha de Salida."
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
                          if ($('#formReservar').valid()){
                            $.post("modificarReserva.php", {
                                codHabitacion: codHabitacion,
                                codCliente: codCliente,
                                fechaEntrada: $("#inputfechaEntrada").val(),
                                fechaEntradaHidden: fechaEntrada,
                                fechaSalida: $("#inputFechaSalida2").val(),
                                apellido2: $("#inputApellido2").val(),
                                        pagina : $("#inputPag").val(),
                                        orden : orden2,
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
              $(document).on("click",".paginacion a",function(event){
                event.preventDefault();
                var numeroPagina = $(this).data("pagina");
                var orden = $("#tabladatos").data("orden");
                var tipoOrden = $("#tabladatos").data("tipo-orden");
                $.get("listaReservas.php", {
                      pagina : numeroPagina,
                      orden : orden,
                      tipoOrden: tipoOrden
                    },function(data){
                      //Pinta de nuevo la tabla
                      $("#listaReservas").html(data);	
                  });//post	
              });
             //-----------------FIN paginación----------------------------------
             
             //-----------------Ordenar-----------------------------------------
             $(document).on("click",".btn-ordenar",function(){
              var orden = $('select[name=orden]').val();
              var tipoOrden = $('select[name=tipoOrden]').val();
              $.get("listaReservas.php", {
                      orden : orden,
                      tipoOrden: tipoOrden
                    },function(data){
                      //Pinta de nuevo la tabla
                      $("#listaReservas").html(data);	
              });//post	
        });
             //-----------------FIN Ordenar-------------------------------------

          });
        </script>

    </head>
    <body>

        <div class="container">
            <nav class="navbar navbar-inverse">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="index.php">Administración Hotel</a>
                    </div>
                    <div class="collapse navbar-collapse" id="myNavbar">
                        <ul class="nav navbar-nav">
                            <li><a href="index.php">Clientes</a></li>
                            <li><a href="adminHabitaciones.php">Habitaciones</a></li>
                            <li class="active"><a href="reservas.php">Reservas</a></li>
                            <!-- <li><a href="#">Page 3</a></li>-->
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="index.php"><span class="glyphicon glyphicon-user"></span> <?= ucfirst($_SESSION['nombreAdmin']) ?></a></li>
                            <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Cerrar sesión</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
            <div class="centrado">
                <div id="listaReservas" class="table-responsive">
                    <?php include "./listaReservas.php" ?>
                </div>
            </div>
        </div>
        <div id="dialogoborrar" title="Eliminar Reserva">
            <p>¿Esta seguro que desea eliminar la resreva?</p>
        </div>

        <div id="dialogomodificar" title="Modificar Reserva">
            <?php include "./formModificarReserva.php" ?>
        </div>
    </body>
</html>
