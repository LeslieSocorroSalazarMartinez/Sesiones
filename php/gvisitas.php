<?php

    session_start();

    include("conecta.phtml");
    $con= conecta();

        $motivo = $_POST['motivo'];
        $hora = $_POST['hora'];
        $fecha = $_POST['fecha'];
        $nombre = $_POST['nombre'];
        $num_personas = $_POST['personas'];

    if(isset($_SESSION['sesion'])){
        if($_SESSION['rol']==2){//si existe una sesion y esta pertenece al rol 2(Usuarios), entonces resliza o siguiente

            $sql = "SELECT * FROM reservaciones WHERE fecha_reservada='$fecha' AND hora ='$hora'";
            $resultado = mysqli_query($con,$sql);
            $contador = mysqli_num_rows($resultado);//contar las filas que cumplen con la condicion de la sentencia sql

            if($contador == 1){//si el horario ya esta reservado mostrar alerta que lo haga saber
                print "<script>alert('La hora ya se encuentra reservada');window.history.go(-1);</script>";

            }else{
                $id_usr = $_SESSION['id'];
                $insertar="insert into reservaciones values(default,'visita',NOW(),'$id_usr','$nombre','$num_personas',null,'$fecha','$hora','$motivo')";
                $resultadoIncersion = mysqli_query($con, $insertar);
                if($resultadoIncersion){
                    echo "<script>alert('La visita ha sido registrada con exito');window.history.go(-1);</script>";
                }
                

            }

        }else{
            echo "<script>alert('El administrador no puede hacer reservaciones');window.location='../administrador.php';</script>";
        }


    }else{
        echo "<script>alert('Para hacer una reservacion necesita estar registrado como usuario');window.location='../inicioSesion.php';</script>";
    }
        


    




?>