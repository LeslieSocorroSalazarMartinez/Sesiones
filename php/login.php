<?php 
    session_start();

    $correo = $_POST['correo'];
    $pass = $_POST['pass'];


    if(isset($_POST) & !empty($_POST)){
        include("../php/conecta.phtml");
        $con = conecta();

        $pass = sha1($_POST['pass']);
        $sql = "SELECT * FROM usuarios Where correo = '$correo' AND constrasena = '$pass'";
        $resultado = mysqli_query($con, $sql);
        $count = mysqli_num_rows($resultado);
        while($row = $resultado ->fetch_array()){
            $rol= $row['id_rol'];
            $nombre = $row['nombre_usr'];
            $apellido = $row['apellido'];
            $correo = $row['correo'];
            $pass = $row['constrasena'];
            $id = $row['id_usr'];
        }
        if($count == 1){
            $_SESSION['sesion'] = true;
            $_SESSION['usuario'] = $nombre;
            $_SESSION['rol'] = $rol;
            $_SESSION['id'] = $id;

            switch($_SESSION['rol']){
                case 1:
                    header('location: ../administrador.php');
                break;

                case 2:
                    header('location: ../inicio.php');
                break;
                
                default:
            }
            
            
        }else{
            print "<script>alert('El usuario o contraseña son incorrectos');window.history.go(-1);</script>";
        }
    }
    
?>