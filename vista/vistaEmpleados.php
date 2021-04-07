
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>Vista Empleados</title>
	<!--ESTILOS-->
	<link rel="stylesheet" href="../public/css/bootstrap.css" />
	<link rel="stylesheet" href="../public/css/bootstrap-grid.min.css" />
	<link rel="stylesheet" href="../public/css/bootstrap-reboot.min.css" />
	<link rel="stylesheet" href="../public/css/styles.css" />
	<!--ESTILOS-->
	<!--SCRIPTS-->
	<script src="../public/js/jquery-3.5.1.min.js"></script>
	<script src="../public/js/bootstrap.min.js"></script>
	<script src="../public/js/bootstrap.bundle.min.js"></script>
	<!--SCRIPTS-->
</head>

<body>

<?php

	include '../modelo/Empleados.php';
	include '../control/ControlEmpleados.php';
	include '../control/ControlConexion.php';

	$ide = $_POST["txtIdEmpleado"];
	$nom = $_POST["txtNombre"];
	$tel = $_POST["txtTelefono"];
	$car = $_POST["txtCargo"];
	$ema = $_POST["txtEmail"];
	$fki = $_POST["txtFkIdArea"];
	$fke = $_POST["txtFkEmple"];
	$bot = $_POST["btn"];
	$mensaje = "Mensaje informativo";

	switch ($bot) {
		case 'guardar':
		$objEmpleados = new Empleados($ide, $nom, $tel, $car, $ema, $fki, $fke);
		$objControlEmpleados = new ControlEmpleados($objEmpleados);
		$objControlEmpleados->guardar();
		/*echo '<script type="text/javascript">
			    alert("El Empleado '.$objEmpleados->getNombre().' se registró correctamente");
			    window.location.href="clientes.html";
			    </script>';*/
		$mensaje = "El Empleado ".$objEmpleados->getNombre()." se registró correctamente.";
		break;

		case 'consultar':
		$objEmpleados = new Empleados($ide,"","","","","","");
		$objControlEmpleados = new ControlEmpleados($objEmpleados);
		$objEmpleados = $objControlEmpleados->consultar();
		$nom=$objEmpleados->getNombre();
		$tel=$objEmpleados->getTelefono();
		$car=$objEmpleados->getCargo();
		$ema=$objEmpleados->getEmail();
		$fki=$objEmpleados->getFkIdArea();
		$fke=$objEmpleados->getFkEmple();

		$mensaje = "<h4>Datos del cliente consultado son:</h4>
						<div class='container'>		
						<div class='row'>
								<ul class='list-group'>
									<li class='list-group-item'>Id Empleado</li>
									<li class='list-group-item'>Nombre</li>
									<li class='list-group-item'>Teléfono</li>
									<li class='list-group-item'>Cargo</li>
									<li class='list-group-item'>Email</li>
									<li class='list-group-item'>Fk Id Área</li>
									<li class='list-group-item'>Fk Emple</li>
								</ul>
								<ul class='list-group'>
									<li class='list-group-item'>".$ide."</li>
									<li class='list-group-item'>".$nom."</li>
									<li class='list-group-item'>".$tel."</li>
									<li class='list-group-item'>".$car."</li>
									<li class='list-group-item'>".$ema."</li>
									<li class='list-group-item'>".$fki."</li>
									<li class='list-group-item'>".$fke."</li>
								</ul>
						</div>
						</div>";
		//Consultar como Escribir estos datos en los cuadros de texto correspondientes--
		break;

		case 'modificar':
		$objEmpleados = new Empleados($ide, $nom, $tel, $car, $ema, $fki, $fke);
		$objControlEmpleados = new ControlEmpleados($objEmpleados);
		$objControlEmpleados->modificar();
				$mensaje = "<h4>Los nuevos datos del Empleado son:</h4>
								<div class='container'>		
								<div class='row'>
										<ul class='list-group'>
											<li class='list-group-item'>Id Empleado</li>
											<li class='list-group-item'>Nombre</li>
											<li class='list-group-item'>Teléfono</li>
											<li class='list-group-item'>Cargo</li>
											<li class='list-group-item'>Email</li>
											<li class='list-group-item'>Fk Id Área</li>
											<li class='list-group-item'>Fk Emple</li>
										</ul>
										<ul class='list-group'>
											<li class='list-group-item'>".$ide."</li>
											<li class='list-group-item'>".$nom."</li>
											<li class='list-group-item'>".$tel."</li>
											<li class='list-group-item'>".$car."</li>
											<li class='list-group-item'>".$ema."</li>
											<li class='list-group-item'>".$fki."</li>
											<li class='list-group-item'>".$fke."</li>
										</ul>
								</div>
								</div>";
		break;

		case 'borrar':
		$objEmpleados = new Empleados($ide,"","","","","","");
		$objControlEmpleados = new ControlEmpleados($objEmpleados);
		$objControlEmpleados->borrar();
		$mensaje = "<h4>Se eliminó el Empleado con id: ".$ide."";
		break;
		
		default:
			# code...
			break;
	}
	
	echo "<script type='text/javascript'>
		$(document).ready(function(){
		$('#ModalMensaje').modal('show');
		});
		</script>";
?>

<div class="modal fade" id="ModalMensaje" role="dialog">
        <div class="modal-dialog" role="document"> 
          <!-- Modal contenido-->
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Mensaje del sistema</h5>
              <button type="button" class="close" data-dismiss="modal" onclick="window.location.href='empleados.html';" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
            </div>
            <div class="modal-body">
              <div id="conte-modal">
              	<?php echo $mensaje ?>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" onclick="window.location.href='empleados.html';" data-dismiss="modal">Cerrar</button>
            </div>
          </div>
        </div>
      </div>
    </div>

</body>

</html>