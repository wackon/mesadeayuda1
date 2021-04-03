<?php

/**
 * Para llamar a un método, primero se debe instanciar la clase, es decir, crear un objeto de la clase en php sería  $nombreObjeto = new nombreClase(argumentos del constructor)
 * 
 *Para llamar a un método es: , $nombreObjeto->nombreMetodo(argumentos)
 */
       class ControlCargos
    {
        var $objCargos;
    
        function __construct($objCargos)
        {
            $this->objCargos = $objCargos;
        }
    
        function guardar()
        {
            $cod=$this->objCargos->getIdCargo();
            $nom=$this->objCargos->getNombre();
           

            $objControlConexion = new ControlConexion();
            $objControlConexion->abrirBd("localhost","root","","bdmesa_ayuda");

            $comandoSql = "insert into cargo values('"cod."','"nom."')";

            //$comandoSql = "insert into clientes values('".$cod."','".$nom."','".$tel."','".$ema."',".$cre.")";

            $objControlConexion->ejecutarComandoSql($comandoSql);

            $objControlConexion->cerrarBd();
    
        }

        function Consultar()
        {
            $cod=$this->objCargos->getIdCargo();
            $objControlConexion = new ControlConexion();
            $objControlConexion->abrirBd("localhost","root","","bdmesa_ayuda");

            $comandoSql = "select * from cargo where codigo = '".$cod."'";

            $rs = $objControlConexion->ejecutarSelect($comandoSql);
            $registro = $rs->fetch_array(MYSQLI_BOTH); //Asigna los datos a la variable registro.
            
            $nom = $registro ["NOMBRE"];
                       

            $this->objCargos->setNombre($nom);
                       

            $objControlConexion->cerrarBd();
            return $this->objCargos;
        }

        function Modificar()
        {
            $cod=$this->objCargos->getIdCargo();
            $nom=$this->objCargos->getNombre();
                        

            $objControlConexion = new ControlConexion();
            $objControlConexion->abrirBd("localhost","root","","bdmesa_ayuda");

            $comandoSql = "update cargo set nombre = '".$nom."' where codigo = '".$cod."'";

            
            $objControlConexion->ejecutarComandoSql($comandoSql);

            $objControlConexion->cerrarBd();
    
        }

        function Borrar()
        {
            $cod=$this->objCargos->getIdCargo();
            
            $objControlConexion = new ControlConexion();
            $objControlConexion->abrirBd("localhost","root","","bdmesa_ayuda");

            $comandoSql = "delete from cargo where codigo= '".$cod."' ";

            
            $objControlConexion->ejecutarComandoSql($comandoSql);

            $objControlConexion->cerrarBd();
    
        }
    }

    
?>