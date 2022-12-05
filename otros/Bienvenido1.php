<?php	
require_once "Modelo/conexion.php";	
   session_start();

    if(isset($_SESSION['sesion'])){
        echo "<script>window.history.go(-1);</script>";
    }
?>






<html>
    <head>
   
    <title>Vestidos</title>
    <link rel="stylesheet" type="text/css" href="estilo.css">
</head>
<body>
     <h1>Vestidos</h1>

     <nav>
        <ul>
            <li><a href="./principal.php">Los más vendidos</a></li>
            <li><a href="">Ultimas noticias</a></li>
            <li><a href="">Contacto</a></li>
            <li><a href="./principal.php">Registro de Vestidos</a></li>
        </ul>
     </nav>

<style>
	.carousel-inner > .item > img,
	.carousel-inner > .item > a > img {
	    width:15%;
        height:15%;
	    margin: auto;
}
</style>

</head>
		
<body>


<div class="jumbotron">
		<div class="container text-center">
	
		</div>
	</div>

<script src= "bootstrap/js/jquery.js"></script>
<script src= "bootstrap/js/bootstrap.js"></script>


    <meta charset = "UTF-8">
        <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="bootstrap/css/hoja.css">





<div id="myCarousel" class="carousel slide" data-ride="carousel">
     <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
      <li data-target="#myCarousel" data-slide-to="3"></li>
    </ol>

    <div class="carousel-inner" role="listbox">

      <div class="item active">
        <img src="imagenes/vestido1.jpg" width="460" height="250">
        <div class="carousel-caption">
          <h3> </h3>
         </div>
      </div>

      <div class="item">
        <img src="imagenes/vestido2.jpg"  width="460" height="250">
        <div class="carousel-caption">
          <h3> </h3>
        </div>
      </div>
    
      <div class="item">
        <img src="imagenes/vestido3.jpg"  width="460" height="250">
        <div class="carousel-caption">
          <h3> </h3>
        </div>
      </div>

      <div class="item">
        <img src="imagenes/vestido4.jpg"  width="360" height="250">
        <div class="carousel-caption">
          <h3> </h3>
        </div>
      </div>
  
    </div>


    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>


<div class="contenido">
        <div class="articulos">
            <div class="secciones">
                <div>
                    <h2>Vestido corte imperio</h2><br><br>
                    <p> Vestido largo para mujer, cuello en V, vestido de noche formal de gasa, con bolsillos.  </p>
                 </div>
                 <div><img src="../CRUDMVC/img/imagena.jpg"></div>
             </div>
             <div class="secciones">
                <div>
                    <h2>Vestido corte sirena</h2><br><br>
                    <p> Vestido largo para mujer, con hombros descubiertos, de manga corta, vestido de noche.
                  
                    </p>
                 </div>
                 <div><img src="../CRUDMVC/img/vestidob.jpg"></div>
             </div>
        </div>
        <div class="menu-secundario">
            <a href="">Vestidos de noche</a>
            <a href="">Vestidos de novia</a>
            <a href="">Vestidos de gala</a>
            <a href="">Vestidos cortos</a>
            <a href="">Vestidos para coctel</a>
     </div></div>
     <footer>
        <p>
            Aviso legal.    Política de cookies.    Política de privacidad.
           
           <div>Derechos reservados. 2022 - Leslie Salazar</div> </p>
    </footer>

</div>
    </body>
</html>