<?php

if (!isset($_POST['oculto'])) {
    exit();
}

include '../Controller/conexion.php';
$nombre = $_POST['nombredep'];
$responsable = $_POST['responsable'];
$user = $_POST['usuario'];

$sentencia = $bd->prepare("INSERT INTO departamento(departamento,responsable,usuario) VALUES (?,?,?);");
$resultado = $sentencia->execute([$nombre, $responsable, $user]);

if ($resultado == TRUE) {
    //echo "Insertado correctamente";
    header('Location: ../vista/Principal.php');
} else {
    echo "Error";
}
?>