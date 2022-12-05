<?php

    session_start();

    include("conecta.phtml");
    $con= conecta();

        $evento = $_POST['evento'];
        $fecha = $_POST['fecha'];
        $nombre = $_POST['nombre'];
        $num_personas = $_POST['personas'];

    if(isset($_SESSION['sesion'])){
        if($_SESSION['rol']==2){//si existe una sesion y esta pertenece al rol 2(Usuarios), entonces resliza o siguiente

            //Checar que la fecha elegida no este reservada
            $sql = "SELECT * FROM reservaciones WHERE fecha_reservada='$fecha' AND tipo='renta'";
            $resultado = mysqli_query($con,$sql);
            $contador = mysqli_num_rows($resultado);//contar las filas que cumplen con la condicion de la sentencia sql

            if($contador == 1){//si la fecha ya esta reservada y el tipo es renta, entonces
                print "<script>alert('La Fecha ya se encuentra reservada');window.history.go(-1);</script>";

            }else{
                $id_usr = $_SESSION['id'];
                $insertar="insert into reservaciones values(default,'renta',NOW(),'$id_usr','$nombre','$num_personas','$evento','$fecha',null,null)";
                $resultadoIncersion = mysqli_query($con, $insertar);
                if($resultadoIncersion){
                   echo "<script>alert('La Renta ha sido registrada con exito');window.history.go(-1);</script>";

                   //creación del archivo pdf con la informacion de la renta

                }
                

            }
        }else{
            echo "<script>alert('El administrador no puede hacer reservaciones');window.location='../administrador.php';</script>"; 
        }

    }else{
        echo "<script>alert('Para hacer una reservacion necesita estar registrado como usuario');window.location='../inicioSesion.php';</script>";
    }

?>



