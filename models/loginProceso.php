<?php 
	session_start();
	include_once '../controller/conexion.php';
	$usuario = $_POST['correo_usuario'];
	$contrasena = $_POST['pass_usuario'];
	$sentencia = $bd->prepare('select * from t_usuario where 
								nombre_usu = ? and password_usu = ?;');
	$sentencia->execute([$usuario, $contrasena]);
	$datos = $sentencia->fetch(PDO::FETCH_OBJ);
	//print_r($datos);

	if ($datos === FALSE) {
		header('Location: ../index.php');
	}elseif($sentencia->rowCount() == 1){
		$_SESSION['nombre'] = $datos->nombre_usu;
		header('Location: ../vista/Principal.php');
	}
?>