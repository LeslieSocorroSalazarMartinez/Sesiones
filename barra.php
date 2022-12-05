<?php
	
	session_start();
	
	if(!isset($_SESSION['id'])){
		header("Location: index.php");
	}
	
	$nombre = $_SESSION['nombre'];
	$tipo_usuario = $_SESSION['tipo_usuario'];
	
	
?>


<nav class="navbar navbar-default" role="navigation">
<div class="container">
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>




    <a class="navbar-brand" href="./Bienvenido.php"><b>Bienvenido</a></b>
  </div>

  <div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav">
      <li><a href="./principal.php">Registro de Vestidos</a></li>
   
    </ul>
  </div>
  
  </div>
</nav>

