<?php 

    require 'database.php';
    $db = new Database();
    $conn = $db->conectar();

    session_start();
    $_SESSION['id_transaccion'];

    //echo $_SESSION['id_transaccion'];

    $id_transaccion = $_SESSION['id_transaccion'];

    $sql = $conn->prepare("SELECT count(id_venta) FROM ventas WHERE id_transaccion=? AND estado=?");
    $sql->execute([$id_transaccion,'COMPLETED']);
    if($sql->fetchColumn() > 0){

      $sql = $conn->prepare("SELECT id_venta,fecha,correo,total_venta FROM ventas WHERE id_transaccion=? AND estado=?");
      $sql->execute([$id_transaccion, 'COMPLETED']);
      $row = $sql->fetch(PDO::FETCH_ASSOC);

      $idVenta = $row['id_venta'];
      $total = $row['total_venta'];
      $fecha = $row['fecha'];

      $sqlDet = $conn->prepare("SELECT nombre, precio, cantidad FROM detalle_venta WHERE id_venta=?");
      $sqlDet->execute([$idVenta]);
    }

    error_reporting(0);
    include 'plantilla.php';

    $pdf = new PDF();
    $pdf->AddPage();

    
    
    $pdf->SetFillColor(232,232,232);
    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(20,6,'Cantidad',1,0,'C',1);
    $pdf->Cell(120,6,'Producto',1,0,'C',1);
    $pdf->Cell(40,6,'Importe',1,1,'C',1);
    $pdf->Ln(1);
    $pdf->SetFont('Arial','U',12);
    while($row_det = $sqlDet->fetch(PDO::FETCH_ASSOC)){ 

        $pdf->Cell(20,6,$row_det['cantidad'],0,0,'C',0);
        $pdf->Cell(120,6,$row_det['nombre'],0,0,'C',0);
        $pdf->Cell(40,6,'$ '.number_format($row_det['precio'],2,'.',','),0,1,'C',0);

    }


    $pdf->Output();


?>