<?php 
    include '../modelo/Clientes.php';
    include '../control/ControlClientes.php';
    include '../control/ControlConexion.php';

    echo "Jorge Alvarez"."<br>";
    $objClientes = new Clientes("2","paco","411","p@",1000000);
    $objControlClientes = new ControlClientes($objClientes);
    $objControlClientes->guardar();
    
?>