<?php

/**
 * Para llamar a un método, primero se debe instanciar la clase, es decir, crear un objeto de la clase en php sería  $nombreObjeto = new nombreClase(argumentos del constructor)
 * 
 *Para llamar a un método es: , $nombreObjeto->nombreMetodo(argumentos)
 */
       class ControlEmpleados
    {
        var $objEmpleados;
    
        function __construct($objEmpleados)
        {
            $this->objEmpleados = $objEmpleados   }
            // _construct( $idEmpleado, $nombre, $foto, $hojaVida, $telefono, $email, $direccion, $x, $y, $fkEmple_Jefe,$fkArea){
    
        function guardar()
        {
            $cod=$this->objEmpleados->getIdEmpleado();
            $nom=$this->objEmpleados->getNombre();
            $fot=$this->objEmpleados->getFoto();
            $hoV=$this->objEmpleados->getHojaVida();
            $tel=$this->objEmpleados->getTelefono();
            $ema=$this->objEmpleados->getEmail();
            $dir=$this->objEmpleados->getDireccion();
            $x=$this->objEmpleados->getX();
            $y=$this->objEmpleados->getY();
            $fkEm=$this->objEmpleados->getFkEmple_Jefe();
            $fkA=$this->objEmpleados->getFkArea();

            $objControlConexion = new ControlConexion();
            $objControlConexion->abrirBd("localhost","root","","bdmesa_ayuda");

            $comandoSql = "insert into Empleados values('"cod."','"nom."','"fot."','"hoV."','"tel."','"ema."','"dir"','"x."','"y."','"fkEm"','"fkA"')";

            //$comandoSql = "insert into clientes values('".$cod."','".$nom."','".$tel."','".$ema."',".$cre.")";

            $objControlConexion->ejecutarComandoSql($comandoSql);

            $objControlConexion->cerrarBd();
    
        }

        function Consultar()
        {
            $cod=$this->objEmpleados->getIdEmpleado();
            $objControlConexion = new ControlConexion();
            $objControlConexion->abrirBd("localhost","root","","bdmesa_ayuda");

            $comandoSql = "select * from empleado where codigo = '".$cod."'";

            $rs = $objControlConexion->ejecutarSelect($comandoSql);
            $registro = $rs->fetch_array(MYSQLI_BOTH); //Asigna los datos a la variable registro.
            
            $nom = $registro ["NOMBRE"];
            $fkEm = $registro ["FKEMPLE"];
            $cod= $registro ["IDEMPLEADO"];
            $nom= $registro ["NOMBRE"];
            $fot= $registro ["FOTO"];
            $hoV= $registro ["HOJAVIDA"];
            $tel= $registro ["TELEFONO"];
            $ema= $registro ["EMAIL"];
            $dir= $registro ["DIRECCION"];
            $x $registro ["X"];
            $y= $registro ["Y"];
            $fkEm= $registro ["FKEMPLE"];
            $fkA= $registro ["FKAREA"];

            $this->objEmpleados->setNombre($nom);
            $this->objEmpleados->setFkEmple($fkEm);
            $this->objEmpleados->setIdEmpleado(cod);
            $this->objEmpleados->setNombre(nom);
            $this->objEmpleados->setFoto(fot);
            $this->objEmpleados->setHojaVida(hoV);
            $this->objEmpleados->setTelefono(tel);
            $this->objEmpleados->setEmail(ema);
            $this->objEmpleados->setDireccion(dir);
            $this->objEmpleados->setX(x);
            $this->objEmpleados->setY(y);
            $this->objEmpleados->setFkEmple_Jefe(fkEm);
            $this->objEmpleados->setFkArea(fkA);

            $objControlConexion->cerrarBd();
            return $this->objEmpleados;
        }

        function Modificar()
        {
            $cod=$this->objEmpleados->getIdEmpleado();
            $nom=$this->objEmpleados->getNombre();
            $fot=$this->objEmpleados->getFoto();
            $hoV=$this->objEmpleados->getHojaVida();
            $tel=$this->objEmpleados->getTelefono();
            $ema=$this->objEmpleados->getEmail();
            $dir=$this->objEmpleados->getDireccion();
            $x=$this->objEmpleados->getX();
            $y=$this->objEmpleados->getY();
            $fkEm=$this->objEmpleados->getFkEmple_Jefe();
            $fkA=$this->objEmpleados->getFkArea();
            

            $objControlConexion = new ControlConexion();
            $objControlConexion->abrirBd("localhost","root","","bdmesa_ayuda");

            $comandoSql = "update area set nombre = '".$nom."',fkEmple = '".$fkEm."' where codigo = '".$cod."'";

            
            $objControlConexion->ejecutarComandoSql($comandoSql);

            $objControlConexion->cerrarBd();
    
        }

        function Borrar()
        {
            $cod=$this->objEmpleados->idEmpleado();
            
            $objControlConexion = new ControlConexion();
            $objControlConexion->abrirBd("localhost","root","","bdmesa_ayuda");

            $comandoSql = "delete from empleados where codigo= '".$cod."' ";

            
            $objControlConexion->ejecutarComandoSql($comandoSql);

            $objControlConexion->cerrarBd();
    
        }
    }

    
?>