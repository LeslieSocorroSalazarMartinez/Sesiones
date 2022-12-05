<?php

session_start();

$nombre=$_POST['nombre'];
$apellido=$_POST['apellido'];
$correo=$_POST['correo'];
$pass=sha1($_POST['pass']);

include("../php/conecta.phtml");
$con=conecta();

$sql = "select *from usuarios where correo = '$correo'";
$resultados = mysqli_query($con,$sql);
$count = mysqli_num_rows($resultados);

if($count == 1){
    print "<script>alert('El correo electronico ya esta asociado a una cuenta');window.history.go(-1);</script>";
}
else{
    $insertar="insert into usuarios values(default, '$correo','$nombre','$apellido', '$pass', 2)";

    mysqli_query($con,$insertar);
	print "<script>alert('Usuario registrado con exito');window.location='../inicioSesion.php'</script>"; 
    

}


?>