<?php  
	session_start();
	if (!isset($_GET['id'])) {
		header('Location: ../vista/Principal.php');
	}

	


	if (!isset($_SESSION['nombre'])) {
		header('Location: ../vista/Principal.php');
	}elseif(isset($_SESSION['nombre'])){
		include '../controller/conexion.php';
		$id = $_GET['id'];

		$sentencia = $bd->prepare("SELECT * FROM departamento WHERE id_departamento = ?;");
		$sentencia->execute([$id]);
		$persona = $sentencia->fetch(PDO::FETCH_OBJ);
		//print_r($persona);
	}else{
		echo "Error en el sistema";
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Editar Departamento</title>
	<meta charset="utf-8">
	<link href="../vista/css/bootstrap.min.css" rel="stylesheet" >
	<link rel="stylesheet" href="../vista/css/editar.css">
</head>
<body>
<!----------------------Inputs------------------------------------------------------------------------------->
<div class="div_contenedor">
    <div class="div_centrado">
		<div class="modal-header">
			<h1>Editar Departamento:</h1>
		</div>
	
		<form method="POST" action="editarProceso.php">
			<div class="mb-3">
                <label for="recipient-name" class="col-form-label">Nombre de departamento:</label>
        		<input type="text" name="dep2" class="form-control" value="<?php echo $persona->departamento; ?>" required>
            </div>
            <div class="mb-3">
                <label for="recipient-name" class="col-form-label">Responsable:</label>
            	<input type="text" name="resp2" class="form-control" value="<?php echo $persona->responsable; ?>" required>
            </div>
            <div class="mb-3">
                <label for="recipient-name" class="col-form-label">Usuario:</label>
                <input type="email" name="user2" class="form-control" value="<?php echo $persona->usuario; ?>" required>
            </div>
			<div class="modal-footer">
				<input type="hidden" name="oculto">
				<input type="hidden" name="id2" value="<?php echo $persona->id_departamento; ?>">

				<button type="button" class="btn btn-secondary" onclick=" location.href='../vista/Principal.php'">Cancelar</button>
				<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Guardar</button>

				<!--modal-->
				<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="alert">
							
									<!-- alerta ----------------------------------------------------------------------------------------------------------------------------------------------------------------- -->
									<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
									<symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
										<path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
									</symbol>
									<symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
										<path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
									</symbol>
									<symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
										<path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
									</symbol>
									</svg>
									<div class="alert alert-danger d-flex align-items-center alert" role="alert">
									<svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
									<div>
										Cuidado !.. Estas apunto de realizar cambios <br/>
										Deseas guardar los cambios realizados? 
									</div>
									
									</div>
									<!-- ----------------------------------------------------------------------------------------------------------------------------------------------------------------- -->
								<!--<h5 class="modal-title" id="exampleModalLabel">Cuidado! </h5>-->
							</div>
							<div class="modal-footer">
								<button class="btn btn-primary" type="submit" data-bs-toggle="modal" data-bs-target="#exampleModal">Guardar cambios </button>
							</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!--fin modal-->
			</div>
		</form>
<!--------------------Fin inputs----------------------------------------------------------------------------------->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>