<?php  
	if (!isset($_GET['id'])) {
		exit();
	}

	$codigo = $_GET['id'];
	include '../controller/conexion.php';
	$sentencia = $bd->prepare("DELETE FROM departamento WHERE id_departamento = ?;");
	$resultado = $sentencia->execute([$codigo]);

	if ($resultado === TRUE) {
		header('Location: ../vista/Principal.php');
	}else{
		echo "Error";
	}

?>