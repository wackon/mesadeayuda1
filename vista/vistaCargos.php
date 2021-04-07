
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>Vista Areas</title>
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

	include '../modelo/Cargos.php';
	include '../control/ControlCargos.php';
	include '../control/ControlConexion.php';

	$idc = $_POST["txtIdCargo"];
	$nom = $_POST["txtNombreCargo"];
	
	$bot = $_POST["btn"];
	$mensaje = "Mensaje informativo";

	switch ($bot) {
		case 'guardar':
		$objCargos = new Cargos($idc, $nom);
		$objCargos->setIdCargo($idc);	
		$objCargos->setNombre($nom);
		$objControlCargos = new ControlCargos($objCargos);

		try{
		$idr = $objControlCargos->ConsultarId();
		$nomr = $objControlCargos->ConsultarNom();
			
		}catch(Exception $e){
			$mensaje = "No se pudo guardar el cargo: ".$e->getMessage();
		}

		if(strcmp($idr, $idc) == 0){
			$mensaje = "Ya se encuentra registrada un Cargo con el id que ingresó, id: ".$idc;	
		}else if(strcmp($nomr, $nom) == 0){
			$mensaje = "Ya se encuentra registrada un Cargo con el nombre que ingresó, id: ".$nom;	
		
		}else if (strlen(trim($idc)) != 0 && strlen(trim($nom)) !=0){
			try{
				$idcrea = $objControlCargos->guardar();
				$mensaje = "El Cargo con id: ".$idc." se registró correctamente.";
			}catch(Exception $e){
				$mensaje = "No se pudo guardar el Cargo: ".$e->getMessage();
			}
			
		}

		break;

		case 'consultar':

			
			$objCargos = new Cargos($idc, "");
			$objControlCargos = new ControlCargos($objCargos);
			$objCargos = $objControlCargos->consultar();
			$nom=$objCargos->getNombre();
		

			$mensaje = "<h4>Datos del Cargo consultado es:</h4>
				<div class='container'>		
				<div class='row'>
						<ul class='list-group'>
							<li class='list-group-item'>Id Área</li>
							<li class='list-group-item'>Nombre Área</li>
						</ul>
						<ul class='list-group'>
						<li class='list-group-item'>".$idc."</li>
						<li class='list-group-item'>".$nom."</li>
						</ul>
				</div>
				</div>";
				//Consultar como Escribir estos datos en los cuadros de texto correspondientes--
				break;
			
		case 'modificar':
			$objCargos = new Cargos($idc, "");
			$objControlCargos = new ControlCargos($objCargos);
			$objControlCargos->modificar();
				$mensaje = "<h4>Los nuevos datos del Área son:</h4>
			<div class='container'>		
			<div class='row'>
					<ul class='list-group'>
						<li class='list-group-item'>Id Área</li>
						<li class='list-group-item'>Nombre Área</li>
						<li class='list-group-item'>FkRmple</li>
					</ul>
					<ul class='list-group'>
						<li class='list-group-item'>".$idc."</li>
						<li class='list-group-item'>".$nom."</li>
					</ul>
			</div>
			</div>";
		break;

		case 'borrar':
				$objCargos = new Cargos($idc,"");
				$objControlCargos = new ControlCargos($objCargos);
				$objControlCargos->borrar();
				$mensaje = "<h4>Se eliminó el cargo con id: ".$idc."";
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
              <button type="button" class="close" data-dismiss="modal" onclick="window.location.href='areas.html';" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
            </div>
            <div class="modal-body">
              <div id="conte-modal">
              	<?php echo $mensaje ?>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" onclick="window.location.href='areas.html';" data-dismiss="modal">Cerrar</button>
            </div>
          </div>
        </div>
      </div>
    </div>

</body>

</html>