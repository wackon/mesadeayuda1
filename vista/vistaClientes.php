<?php

include '../modelo/Clientes.php';
include '../control/ControlClientes.php';
include '../control/ControlConexion.php';

    $cod = $_POST["txtCodigo"];
    $nom = $_POST["txtNombre"];
    $tel = $_POST["txtTelefono"];
    $ema = $_POST["txtEmail"];
    $cre = $_POST["txtCredito"];

    $bot = $_POST["btn"];

    switch ($bot){

        case guardar':
           
            $ojClientes = new Clientes($cod,$nom,$tel, $ema, $crea);
            $objControlClientes = new ControlClientes($objClientes);
            objControlClientes->guardar();

        break;

        case 'consultar':

            $ojClientes = new Clientes($cod,"","", "", 0);
            $objControlClientes = new ControlClientes($objClientes);
            $objClientes = objControlClientes->consultar();
            $nom = $bjClientes->getNombre();
            $tel = $objClientes->getTelefono();
            $ema = $objClientes->getEmail();
            $cre = $objClientes->getCredito();

            echo "codigo =".$cod." nombre =".$nom." Telefono =".$tel." Email =".$ema."Credito =".$cre;

            //consultar como Escribir estos datos en los cuadros de texto correspondientes.

        break;

        case 'Modificar':

            $ojClientes = new Clientes($cod,$nom,$tel, $ema, $crea);
            $objControlClientes = new ControlClientes($objClientes);
            objControlClientes->modificar();

        break;

        case 'Borrar':

            $ojClientes = new Clientes($cod,"","", "", 0);
            $objControlClientes = new ControlClientes($objClientes);
            objControlClientes->borrar();

        break;

    }

    }

?>