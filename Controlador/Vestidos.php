
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Sistema Web</title>
        <link href="css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
		<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
	
	
	
	
	
	
	</head>


	
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="index.html">Sistema Web</a><button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button
			><!-- Navbar Search-->
            <!--<form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
                <div class="input-group">
				<input class="form-control" type="text" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" />
				<div class="input-group-append">
				<button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
				</div>
                </div>
			</form>-->
            <!-- Navbar-->
            <ul class="navbar-nav ml-auto mr-0 mr-md-3 my-2 my-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="#">Configuración</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="logout.php">Salir</a>
					</div>
				</li>
			</ul>
		</nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <a class="nav-link" href="index.html"
							><div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Boutique</a
							>
							
							<?php if($tipo_usuario == 1) { ?>
								
								<div class="sb-sidenav-menu-heading">Interfaz</div>
								<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts"
								><div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
									Principal
									<div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div
									></a>
									<div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
										<nav class="sb-sidenav-menu-nested nav"><a class="nav-link" href="bienvenido.php">Vestidos</a>
									</div>
									<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages"
									><div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
										Paginas
										<div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div
										></a>
										<div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-parent="#sidenavAccordion">
											<nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
												<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth"
												>Autenticación
													<div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div
													></a>
													<div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">
														<nav class="sb-sidenav-menu-nested nav"><a class="nav-link" href="login.html">Iniciar sesión</a><a class="nav-link" href="register.html">Registro</a><a class="nav-link" href="password.html">Olvidé mi contraseña</a></nav>
													</div>
													
											</nav>
										</div>
										
							<?php } ?>
							
							<div class="sb-sidenav-menu-heading">Complementos</div>
							<a class="nav-link" href="tabla.php"
								><div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
									Tablas</a
								>
							</div>
					</div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Conectado como:</div>
                        Boutique Rose
					</div>
				</nav>
			</div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">    </h1>
                        



                        <head>
   
    
						<link rel="stylesheet" type="text/css" >
</head>
<body>
<?php
	
	class VestidosController {

		public function __construct(){
			require_once "Modelo/VestidosModelo.php";
		}
		
		public function index(){
			
			
			$vestidos = new Vestidos_model();
			$data["titulo"] = "Vestidos";
			$data["vestidos"] = $vestidos->get_vestidos();
			
			require_once "Vista/Vestidos/vestidos.php";	
		}
		
		public function nuevo(){
			
			$data["titulo"] = "Vestidos";
			require_once "Vista/Vestidos/NuevoVestidos.php";
		}
		
		public function guarda(){
			
		$procad=$_POST['procad'];
		$pronom=$_POST['pronom'];
		$promar=$_POST['promar'];
		$precio=$_POST['precio'];
		$estatus=$_POST['estatus'];
		$stock=$_POST['stock'];
                $color=$_POST['color'];
		$talla=$_POST['talla'];
       	
			
			$vestidos = new Vestidos_model();
			$vestidos->insertar($procad, $pronom, $promar, $precio, $estatus, $stock, $color, $talla);
			$data["titulo"] = "Vestidos";
			$this->index();
		}
		
		public function modificar($id){
			
			$vestidos = new Vestidos_model();
			
			$data["id"] = $id;
			$data["vestidos"] = $vestidos->get_vestido($id);
			$data["titulo"] = "Vestidos";
			require_once "vista/Vestidos/ModificaVestidos.php";
		}
		
		public function actualizar(){
	
                        $id = $_POST['id'];
                        $procad=$_POST['procad'];
		        $pronom=$_POST['pronom'];
		        $promar=$_POST['promar'];
		        $precio=$_POST['precio'];
		        $estatus=$_POST['estatus'];
		        $stock=$_POST['stock'];
       		        $color=$_POST['color'];
		        $talla=$_POST['talla'];


			$vestidos = new Vestidos_model();
			$vestidos->modificar($id, $procad, $pronom, $promar, $precio, $estatus, $stock, $color, $talla);
			$data["titulo"] = "Vestidos";
			$this->index();
		}
		
		public function eliminar($id){
			
			$vestidos = new Vestidos_model();
			$vestidos->eliminar($id);
			$data["titulo"] = "Vestidos";
			$this->index();
		}	
	}
?>
</body>



                        
</main>





               
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/datatables-demo.js"></script>

							</body>

							
	</html>