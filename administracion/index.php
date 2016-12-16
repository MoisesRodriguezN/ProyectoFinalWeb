<?php
  session_start(); // Inicio de sesión
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8">
    <title>Administración Hotel - Clientes</title>
      <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
      <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" rel="stylesheet">
      <link rel="stylesheet" type="text/css" href="../css/main.css">
      <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
      <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
      <link rel="stylesheet" type="text/css" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
      <script>
        $(document).ready(function(){
          var codCliente;
          //Crea el diálogo con dos botones, Borrar y Cancelar. 
          //-----------Borrado--------------
          $( "#dialogoborrar" ).dialog({
            autoOpen: false,
            resizable: false,
            modal: true,
            buttons: {
              //BOTON DE BORRAR
              "Borrar": function() {			
                //Ajax con get
                $.post("eliminarCliente.php", {"codCliente":codCliente},function(data,status){
                  //alert("Funciona!"); //Manda codCliente y recibe un resultado y estado.
                  $("#cliente_" + codCliente).fadeOut(500);
                });//get			
                //Cerrar la ventana de dialogo				
                $(this).dialog("close");												
              },
              "Cancelar": function() {
                  //Cerrar la ventana de dialogo
                  $(this).dialog("close");
              }
            }//buttons
          });
          $(document).on("click",".btn-eliminar",function(){	
              codCliente = $(this).parents("tr").attr("data-codCliente");
              $( "#dialogoborrar" ).dialog("open");	
          });
          //-------------FIN Borrado---------------
          //-------------Modificación--------------
          $( "#dialogomodificar" ).dialog({
            autoOpen: false,
            resizable: false,
            modal: true,
            buttons: {
            "Guardar": function() {			
              $.post("modificarCliente.php", {
                codCliente : codCliente,
                dni : $("#inputDni").val() ,
                nombre: $("#inputNombre").val() ,
                apellido: $("#inputApellido").val() ,
                apellido2 : $("#inputApellido2").val()
              },function(data,status){				
                $("#listaClientes").html(data);
              });//get			

              $(this).dialog( "close" );												
                  },
            "Cancelar": function() {
                $(this).dialog( "close" );
            }
            }//buttons
          });

            //Boton Modificar	
          $(document).on("click",".btn-modificar",function(){
            codCliente = $(this).parents("tr").attr("data-codCliente");
            $("#inputCodCliente").val(codCliente);
            //Para que ponga el campo direccion con su valor
            $("#inputDni").val($.trim($(this).parent().siblings("td.dni").text()));

            $("#inputNombre").val($.trim($(this).parent().siblings("td.nombre").text()));
            
            $("#inputApellido").val($.trim($(this).parent().siblings("td.apellido").text()));
            
            $("#inputApellido2").val($.trim($(this).parent().siblings("td.apellido2").text()));

            $( "#dialogomodificar").dialog("open");

          });
          //------------FIN Modificación---------
          
          //---- NUEVO --------------
          //Boton de nuevo inmueble 
          //Crea nueva fila al final de la tabla
          //Con dos nuevos botones (guardarnuevo y cancelarnuevo)
          $("#nuevo").on("click",function(){	
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
          });
          
           //-------------Reservar--------------
          $( "#dialogoreservar" ).dialog({
            autoOpen: false,
            resizable: false,
            modal: true,
            buttons: {
            "Guardar": function() {			
              $.post("reservarHabitacion.php", {
                codCliente : codCliente,
                codHabitacion : $("#inputCodHabitacionReservar").val() ,
                fechaEntrada: $("#inputfechaEntradaReservar").val() ,
                fechaSalida: $("#inputFechaSalidaReservar").val() 
              },function(data,status){				
                //$("#listaClientes").html(data);
              });//get			

              $(this).dialog( "close" );												
                  },
            "Cancelar": function() {
                $(this).dialog( "close" );
            }
            }//buttons
          });

            //Boton Reservar	
          $(document).on("click",".btn-reservar",function(){
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
          
          $(document).on("click",".paginacion a",function(event){
            event.preventDefault();
            var numeroPagina = $(this).data("pagina");
            var orden = $("#tabladatos").data("orden");
            var tipoOrden = $("#tabladatos").data("tipo-orden");
            $.get("listaClientes.php", {
                  pagina : numeroPagina,
                  orden : orden,
                  tipoOrden: tipoOrden
                },function(data){
                  //Pinta de nuevo la tabla
                  $("#listaClientes").html(data);	
              });//post	
          });
          
        $(document).on("click",".btn-ordenar",function(){
          var orden = $('select[name=orden]').val();
          var tipoOrden = $('select[name=tipoOrden]').val();
          $.get("listaClientes.php", {
                  orden : orden,
                  tipoOrden: tipoOrden
                },function(data){
                  //Pinta de nuevo la tabla
                  $("#listaClientes").html(data);	
              });//post	
        });
          
        });
      </script>
    <style>
        #dialogoborrar{
          display: none;
        }
        
        #dialogomodificar{
          display: none;
        }
        
        #dialogoreservar{
          display: none;
        }
    </style> 
  </head>
  <body>
    <?php
    if ($_SESSION['logueadoAdmin']){
      
    ?>
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
              <li class="active"><a href="index.php">Clientes</a></li>
              <li><a href="adminHabitaciones.php">Habitaciones</a></li>
              <li><a href="reservas.php">Reservas</a></li>
              <!--<li><a href="#">Page 3</a></li>-->
            </ul>
            <ul class="nav navbar-nav navbar-right">
              <li><a href="index.php"><span class="glyphicon glyphicon-user"></span> <?= ucfirst($_SESSION['nombreAdmin'])?></a></li> 
              <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Cerrar sesión</a></li> 
            </ul> <!-- ucfirst() Pone en mayúscula la primera letra-->
          </div>
        </div>
      </nav>
        <div class="form-group">
          <form class="form-inline formularioFloatLeft" name="filtrar" action="index.php" method="GET">
            <div class="form-group">
              <label for="buscadorDni">DNI: </label>
              <input type="text" class="form-control" id="buscadorDni" name="dni" 
                    placeholder="Introduce un DNI">
            </div>
            <button type="submit" class="btn btn-default">Filtrar</button>
          </form>
            <button id="nuevo" class="btn btn-default">Nuevo</button>
        </div>
      <div id="listaClientes" class="table-responsive">
         <?php include "./listaClientes.php"?>
      </div>
      </div>
    </div>
    <?php
      }else{
    ?>
      <script>
        window.location.href = "/administracion/login.php";
      </script>
    <?php
      }
    ?>
    <div id="dialogoborrar" title="Eliminar Cliente">
      <p>¿Esta seguro que desea eliminar el cliente?</p>
    </div>
    
    <div id="dialogomodificar" title="Modificar Cliente">
         <?php include "./formModificarCliente.php"?>
    </div>
    
    <div id="dialogoreservar" title="Reservar Habitacion">
         <?php include "./formReservarHabitacion.php"?>
    </div> 
   
  </body>
</html>
