<nav>
            <div class="nav-bar">
                <div class="logo">
                    <img src="imagenes/logo.png">
                </div>
                <div class="icon-menu">
                    <img src="imagenes/iconos/menu.png">
                </div>
                <div class="elementos">
                    <ul>
                        <li><a href="inicio.php">Inicio</a></li>
                        <li><a href="conocenos.php">Conocenos</a></li>
                        <li><a href="reservacion.php">Reservaciones</a></li>
                        <li><a href="tienda.php">Tienda</a></li>
                    </ul>
  
                </div>
                <div class="dentro">
                    <ul>
                        <li class="usr"><img src="imagenes/iconos/user.svg"><?php echo " ".$_SESSION['usuario'];?></li>
                        <li><a href="php/cerrar-sesion.php"><img src="imagenes/iconos/exit.svg"></a></li>
                        
                    </ul>
                </div>
            </div>    
</nav>