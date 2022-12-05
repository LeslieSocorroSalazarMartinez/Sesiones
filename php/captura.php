<?php 

require 'config.php';
require 'database.php';

$db = new Database();
$con = $db->conectar();

$json = file_get_contents('php://input');
$datos = json_decode($json, true);
//echo '<pre>';
//print_r($datos);
//echo '</pre>';

if(is_array($datos)){

    $id_transaccion = $datos['detalles']['id'];
    $total = $datos['detalles']['purchase_units'][0]['amount']['value'];
    $status = $datos['detalles']['status'];
    $fecha = $datos['detalles']['update_time'];
    $fecha_nueva = date('Y-m-d H:i:s', strtotime($fecha));
    $correo = $datos['detalles']['payer']['email_address'];
    $id_cliente = $datos['detalles']['payer']['payer_id'];

    $sql = $con->prepare("INSERT INTO ventas (id_transaccion,fecha,estado,correo,id_cliente, total_venta) VALUES (?,?,?,?,?,?)");
    $sql->execute([$id_transaccion,$fecha_nueva,$status,$correo,$id_cliente,$total]);
    $id = $con->lastInsertId();

    if($id > 0){

        $productos = isset($_SESSION['carrito']['productos']) ? $_SESSION['carrito']['productos'] : null;

        if($productos != null){

            foreach($productos as $clave => $cantidad){

                $sql = $con->prepare("SELECT id_prod, nombre_prod, precio FROM productos Where id_prod=? AND stock>=1");
                $sql->execute([$clave]);
                $row_prod = $sql->fetch(PDO::FETCH_ASSOC);

                $precio = $row_prod['precio'];
                //$nombre = $row_prod['nombre_prod'];
            
                $sql_insert = $con -> prepare("INSERT INTO detalle_venta (id_venta,id_prod,nombre,precio,cantidad) VALUES (?,?,?,?,?)");
                $sql_insert->execute([$id,$clave,$row_prod['nombre_prod'],$precio,$cantidad]);


            }

        }unset($_SESSION['carrito']);   
    }
}

?>