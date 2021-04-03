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
            $cod=$this->objAreas->getIdArea();
            $nom=$this->objAreas->getNombre();
            $fkEm=$this->objAreas->getFkEmple()

            $objControlConexion = new ControlConexion();
            $objControlConexion->abrirBd("localhost","root","","bdmesa_ayuda");

            $comandoSql = "insert into area values('"cod."','"nom."','"fkEm.")";

            //$comandoSql = "insert into clientes values('".$cod."','".$nom."','".$tel."','".$ema."',".$cre.")";

            $objControlConexion->ejecutarComandoSql($comandoSql);

            $objControlConexion->cerrarBd();
    
        }

        function Consultar()
        {
            $cod=$this->objAreas->getIdArea();
            $objControlConexion = new ControlConexion();
            $objControlConexion->abrirBd("localhost","root","","bdmesa_ayuda");

            $comandoSql = "select * from area where codigo = '".$cod."'";

            $rs = $objControlConexion->ejecutarSelect($comandoSql);
            $registro = $rs->fetch_array(MYSQLI_BOTH); //Asigna los datos a la variable registro.
            
            $nom = $registro ["NOMBRE"];
            $fkEm = $registro ["FKEMPLE"];
           

            $this->objAreas->setNombre($nom);
            $this->objAreas->setFkEmple($fkEm);
           

            $objControlConexion->cerrarBd();
            return $this->objAreas;
        }

        function Modificar()
        {
            $cod=$this->objAreas->getIdArea();
            $nom=$this->objAreas->getNombre();
            $fkEm=$this->objAreas->getFkEmple();
            

            $objControlConexion = new ControlConexion();
            $objControlConexion->abrirBd("localhost","root","","bdmesa_ayuda");

            $comandoSql = "update area set nombre = '".$nom."',fkEmple = '".$fkEm."' where codigo = '".$cod."'";

            
            $objControlConexion->ejecutarComandoSql($comandoSql);

            $objControlConexion->cerrarBd();
    
        }

        function Borrar()
        {
            $cod=$this->objAreas->getIdArea();
            
            $objControlConexion = new ControlConexion();
            $objControlConexion->abrirBd("localhost","root","","bdmesa_ayuda");

            $comandoSql = "delete from area where codigo= '".$cod."' ";

            
            $objControlConexion->ejecutarComandoSql($comandoSql);

            $objControlConexion->cerrarBd();
    
        }
    }

    
?>