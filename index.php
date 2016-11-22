<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Inicio - Hotel Fuente Alegre</title>
        <style>
            @font-face {
              font-family: 'Francois One';
              src: url(fuentes/FrancoisOne.ttf);
            }
            
            @font-face {
              font-family: 'GreatVibes-Regular';
              src: url(fuentes/daniel.ttf);
            }
     
            body{
              margin: 0;
              background-color: #ecce86;
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
            
            .flex-item:hover, .seleccionado{
              background: linear-gradient(Chocolate , Peru );
              box-shadow: -8px -8px 6px 0px rgba(0,0,0,0.68);
            }
            
            .flex-item p{
              width:100%; 
              -webkit-align-self: center;
              -ms-flex-item-align: center;
              align-self: center; 
              margin-left: 6px;
              font-size: 1rem; 
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
            
            .contenedor{
              width: 90%;
            }
            
            .contenedorTexto{
              text-align: center;
              margin-left: 14%;
              margin-bottom: 1%;
            }
            
            .texto3D{
              text-shadow: 1px 1px 0px rgb(230,230,230),
              2px 2px 0px rgb(200,200,200),
              3px 3px 0px rgb(180,180,180),
              4px 4px 0px rgb(160,160,160),
              /*Añadimos*/ 5px 5px 0px rgb(0,0,0), 8px 8px 20px rgb(0,0,0); 
              font-size: 46px;
            }
            
            .contenedorCarusel{
              text-align: center;
              width: 80%;
              height: 400px;
              margin: 0 auto;
              margin-left: 16%;
              position: relative;
             
            }
            
            .img1Carousel{
              text-align: center;
              width: 100%;
              height: 400px;
              margin: 0 auto;
              position: relative;
              background:url('img/hotel1.jpg') no-repeat;
              background-size: 100% auto;
              transition: opacity 1s ease-out;
            }
            .imagenCarousel{
              width: 60%;
              height: auto;
            }
            
            .footerCarousel{
              width:100%;
              background-color: rgba(205, 133, 63, 0.7);
              position: absolute;
              bottom: 0px;
              text-align: center;
            }
            
            .bienvenidacarouselDiv{
                width:40%;
                display: inline;
            }
            
            .BienvenidoCarousel{
              font-family: 'GreatVibes-Regular', sans-serif;
              font-size: 3em;
              color:white;
            }
            
            #galeriaAnimada > img { 
              width: 100%;
              height: 100%;
              position: absolute;
              top: 0px;
              left: 0px;
              color: transparent;
              opacity: 0;
              z-index: 0;
              -webkit-backface-visibility: hidden; /* Chrome, Safari, Opera */
              backface-visibility: hidden;
              -webkit-animation: animacionGaleria 30s linear infinite 0s;
              -moz-animation: animacionGaleria 30s linear infinite 0s;
              -o-animation: animacionGaleria 30s linear infinite 0s;
              -ms-animation: animacionGaleria 30s linear infinite 0s;
              animation: animacionGaleria 30s linear infinite 0s; 
           }

           #galeriaAnimada > img:nth-child(2)  { 
              -webkit-animation-delay: 6s;
              -moz-animation-delay: 6s;
              -o-animation-delay: 6s;
              -ms-animation-delay: 6s;
              animation-delay: 6s; 
           }
           #galeriaAnimada > img:nth-child(3) { 
              -webkit-animation-delay: 12s;
              -moz-animation-delay: 12s;
              -o-animation-delay: 12s;
              -ms-animation-delay: 12s;
              animation-delay: 12s; 
           }
           #galeriaAnimada > img:nth-child(4) { 
              -webkit-animation-delay: 18s;
              -moz-animation-delay: 18s;
              -o-animation-delay: 18s;
              -ms-animation-delay: 18s;
              animation-delay: 18s; 
           }
           #galeriaAnimada > img:nth-child(5) { 
              -webkit-animation-delay: 24s;
              -moz-animation-delay: 24s;
              -o-animation-delay: 24s;
              -ms-animation-delay: 24s;
              animation-delay: 24s; 
           }

          @-webkit-keyframes animacionGaleria { 
              0% { opacity: 0;}
              8% { opacity: 1;}
              22% { opacity: 1; }
              35% { opacity: 0; }
              100% { opacity: 0; }
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
        
        <div class="contenedor">
            <div class="contenedorTexto">
                <span class="texto3D">Hotel Fuente Alegre</span>
            </div>
            <div class="contenedorCarusel">
                <div id="galeriaAnimada">
                  <img src = "img/hotel1.jpg" alt = "Imagen hotel habitacion">
                  <img src = "img/hotel2.jpg" alt = "Piscina">
                  <img src = "img/hotel3.jpg" alt = "Habitacion superior">
                  <img src = "img/hotel4.jpg" alt = "Pasillos">
                  <img src = "img/hotel5.jpg" alt = "Salon">
                </div>
                <div class="footerCarousel">
                  <div class="bienvenidacarouselDiv">
                    <span class="BienvenidoCarousel">Bienvenidos a Nuestro Hotel</span> 
                  </div>
                </div>
            </div>
        </div>
    </body>
</html>
