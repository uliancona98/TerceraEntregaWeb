<?php
	include("conexion.php");
        session_start();   
	$id = $_SESSION['id_usuario'];
	$nombre = $_SESSION['nombre'];
        $contrasena = $_SESSION['contrasenaNueva'];
                
	$query = "UPDATE usuarios SET nombre='$nombre', contrasena = '$contrasena' WHERE id='$id'";
        $resultado = $conexion->query($query);

        header("Location: informacion_perfil.php");


?>