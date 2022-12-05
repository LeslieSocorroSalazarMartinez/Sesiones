<?php
    
    define("CLIENT_ID","AVBSCkduIT6zuJVIRktHHKCwlu54dNR1wNbO_K9pEjhhdMjd9-EwAxB8UL6AcVI7RQffKTQ9qQA0wgPY");
    define("CURRENCY","MXN");
    define("MONEDA","$");




    //session_start();

    $num_cart = 0;
    if(isset($_SESSION['carrito']['productos'])){
        $num_cart = count($_SESSION['carrito']['productos']);
    }
?>