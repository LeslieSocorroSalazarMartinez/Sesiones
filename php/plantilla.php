<?php

    require '../fpdf/fpdf.php';
    session_start();


    class PDF extends FPDF{
        
        function Header(){
            $this->Image('../imagenes/logo1.png',5,5,40);
            $this->SetFont('Arial','B',20);
            $this->Cell(40);
            $this->Cell(120,10,'Reporte de Compra',0,0,'C');
            $this->Ln(10);
            $this->SetFont('Arial','B',11);
            $this->Cell(85,10,'Folio: ',0,0,'R');
            $this->SetFont('Arial','I',11);
            $this->Cell(60,10,$_SESSION['id_transaccion'],0,0);
            $this->Ln(7);
            $this->SetFont('Arial','B',11);
            $this->Cell(85,10,'Fecha: ',0,0,'R');
            $this->SetFont('Arial','I',11);
            $this->Cell(60,10,$_SESSION['fecha_venta'],0,0);
            $this->Ln(7);
            $this->SetFont('Arial','B',11);
            $this->Cell(85,10,'Total: ',0,0,'R');
            $this->SetFont('Arial','B',11);
            $this->Cell(60,10,'$ '. number_format($_SESSION['total_venta'],2,'.',','),0,0,'C');
            $this->Ln(25);
        }

        function Footer(){
            $this->SetY(-35);
            $this->SetFont('Arial','B',10);
            $this->Cell(190,10,'Casa del Rebozo. Espacio del Universo Artesanal Potosino',0,0,'C');
            $this->Ln(5);
            $this->SetFont('Arial','',10);
            $this->Cell(190,10,'Santa Maria del Rio,S.L.P,Mexico',0,0,'C');
            $this->Ln(5);
            $this->SetFont('Arial','',9);
            $this->Cell(95,10,' Martes-Viernes: 11:00 a 16:00 ',0,0,'R');
            $this->Cell(95,10,' Sabado-Domingo: 11:00 a 17:00 ',0,0,'L');
            $this->Ln(5);
            $this->SetFont('Arial','B',8);
            $this->Cell(190,10,'C. Pascual M. Hernandez Segura 90, Centro, 79560 Santa Maria del Rio, S.L.P.',0,0,'C');
            $this->Ln(5);
            $this->SetFont('Arial','',9);
            $this->Cell(190,10,' Tel: 458 488 2682 ',0,0,'C');
        }

    }
?>