<?php

/**
 * Para llamar a un método, primero se debe instanciar la clase, es decir, crear un objeto de la clase en php sería  $nombreObjeto = new nombreClase(argumentos del constructor)
 * 
 *Para llamar a un método es: , $nombreObjeto->nombreMetodo(argumentos)
 */
       class ControlAreas
    {
        var $objAreas;
    
        function __construct($objAreas)
        {
            $this->objAreas = $objAreas;
        }
    
        function guardar()
        {
            $ida=$this->objAreas->getIdArea();
            $nom=$this->objAreas->getNombre();
            $fkEm=$this->objAreas->getFkEmple();

            $objControlConexion = new ControlConexion();
            $objControlConexion->abrirBd("localhost","root","","mesa_ayuda");

            $comandoSql = "insert into area values('".$ida."','".$nom."','".$fkEm."')";

            //$comandoSql = "insert into clientes values('".$ida."','".$nom."','".$tel."','".$ema."',".$cre.")";

            $objControlConexion->ejecutarComandoSql($comandoSql);

            $objControlConexion->cerrarBd();
            return $ida;
        }

        function Consultar()
        {
            $ida=$this->objAreas->getIdArea();
            $objControlConexion = new ControlConexion();
            $objControlConexion->abrirBd("localhost","root","","bdmesa_ayuda");

            $comandoSql = "select * from area where codigo = '".$ida."'";

            $rs = $objControlConexion->ejecutarSelect($comandoSql);
            $registro = $rs->fetch_array(MYSQLI_BOTH); //Asigna los datos a la variable registro.
            
            $nom = $registro ["NOMBRE"];
            $fkEm = $registro ["FKEMPLE"];
           

            $this->objAreas->setNombre($nom);
            $this->objAreas->setFkEmple($fkEm);
           

            $objControlConexion->cerrarBd();
            return $this->objAreas;
        }

        function ConsultarId()
        {
            $ida=$this->objAreas->getIdArea();
            $objControlConexion = new ControlConexion();
            $objControlConexion->abrirBd("localhost","root","","mesa_ayuda");

            $comandoSql = "select * from area where idarea = '".$ida."'";

            $rs = $objControlConexion->ejecutarSelect($comandoSql);
            $registro = $rs->fetch_array(MYSQLI_BOTH); //Asigna los datos a la variable registro.
            
            $ida = $registro ["IDAREA"];

            $objControlConexion->cerrarBd();
            return $ida;
        }

        function Modificar()
        {
            $ida=$this->objAreas->getIdArea();
            $nom=$this->objAreas->getNombre();
            $fkEm=$this->objAreas->getFkEmple();
            

            $objControlConexion = new ControlConexion();
            $objControlConexion->abrirBd("localhost","root","","bdmesa_ayuda");

            $comandoSql = "update area set nombre = '".$nom."',fkEmple = '".$fkEm."' where codigo = '".$ida."'";

            
            $objControlConexion->ejecutarComandoSql($comandoSql);

            $objControlConexion->cerrarBd();
    
        }

        function Borrar()
        {
            $ida=$this->objAreas->getIdArea();
            
            $objControlConexion = new ControlConexion();
            $objControlConexion->abrirBd("localhost","root","","bdmesa_ayuda");

            $comandoSql = "delete from area where codigo= '".$ida."' ";

            
            $objControlConexion->ejecutarComandoSql($comandoSql);

            $objControlConexion->cerrarBd();
    
        }
    }

    
?>