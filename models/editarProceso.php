<?php 
	//print_r($_POST);
	if (!isset($_POST['oculto'])) {
		header('Location: ../index.php');
	}

	include '../controller/conexion.php';
	$id2 = $_POST['id2'];
	$departamento2 = $_POST['dep2'];
	$responsable2 = $_POST['resp2'];
	$usuario2 = $_POST['user2'];
	
	$sentencia = $bd->prepare("UPDATE departamento SET departamento = ?, responsable = ?, usuario = ?  WHERE id_departamento = ?;");
	$resultado = $sentencia->execute([$departamento2,$responsable2,$usuario2, $id2]);

	if ($resultado === TRUE) {
		header('Location: ../index.php');
	}else{
		echo "Error";
	}
?>