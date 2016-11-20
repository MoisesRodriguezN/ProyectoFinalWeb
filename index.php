<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Inicio - Hotel Fuente Alegre</title>
        <link href="fuentes/FrancoisOne.ttf" rel="stylesheet">
        <style>
            body{
              margin: 0;
            }
            .cabecera{
              width: 100%;
              height: 115px;
              background:url('img/marronHeader.jpg') no-repeat;
              background-size: 100% auto;
            }
            
            .logoCabecera{
              width: 10%;
              height: auto;
              margin-left: 4%;
              margin-top: 0.4%;
              background: linear-gradient(to bottom right, Chocolate , BurlyWood );
              box-shadow: 4px 4px 5px 0px rgba(0,0,0,0.75);
              float:left;
            }
            
            .imgLogoResponsive{
              width: 100%;
              height: auto;
            }
            
            .flex-container{
              height: 70px;
              padding:5px;
              margin: auto;
              display:-webkit-flex; 
              display: -ms-flexbox; 
              display: flex;
              align-items: flex-end;
            }
            
            .flex-item{
              display: inherit;
              width: 14%;
              height:auto;
              
              margin:5px;
              margin-top: 4%;
              margin-bottom: -20px;
              border-radius: 4px;
            }
            
            .flex-item:hover{
              background: linear-gradient(Chocolate , Peru );
              box-shadow: -8px -8px 6px 0px rgba(0,0,0,0.68);
            }
            
            .seleccionado{
              background: linear-gradient(Chocolate , Peru );
              box-shadow: -8px -8px 6px 0px rgba(0,0,0,0.68);
            }
            .flex-item p{
              width:100%; 
              -webkit-align-self: center;
              -ms-flex-item-align: center;
              align-self: center; 
              margin-left: 6px;
              font-size: 0.8rem; 
              font-family: 'Francois One', sans-serif;
              color: antiquewhite;
              
            }
            
            .flex-item p::first-line{
              font-size: 1rem; 
            }

            .flex-container.space-between{
              -webkit-justify-content: space-between;
              -ms-flex-pack: justify;
              justify-content: space-between;
            } 
            
            a:link{
              text-decoration: none;
            }
        </style>
    </head>
    <body>
        <div class="cabecera">
            <div class="logoCabecera">
                <img src="img/logoHotelHeader.png" class="imgLogoResponsive"> 
            </div>
            <div class="flex-container space-between">
              <a href="index.php" class="flex-item seleccionado"><p>INICIO <br>Bienvenidos</p></a>
              <div class="flex-item"><p>SERVICIOS <br>¿Que ofrecemos?</p></div>
              <div class="flex-item"><p>HABITACIONES <br>Tu comodidad</p></div>
              <div class="flex-item"><p>RESERVAS <br>Reserva Ahora!</p></div>
              <div class="flex-item"><p>MI CUENTA <br>Tus reservas</p></div>
              <div class="flex-item"><p>CONTACTO <br>Escribenos!</p></div>
            </div>
        </div>

    </body>
</html>
