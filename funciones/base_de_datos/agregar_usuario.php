<?php
require ("../config/Conexion.php");

function agregar($nombre, $correo, $contrasena){
    $con = new Conexion();
    $conexion = $con->get_conexion();

    $nombre = mysqli_real_escape_string($conexion,$nombre);
    $correo = mysqli_real_escape_string($conexion,$correo);
    $contrasena = mysqli_real_escape_string($conexion,$correo);
    
    $sentencia = "INSERT INTO USUARIOS (nombre, correo, contrasena) VALUES('$nombre','$correo','$contrasena')";
    $conexion->query($sentencia);
    $affected_rows = $conexion->affected_rows;
    $con->close_conexion();
    if($affected_rows > 0){
        return true;
    }
    return false;
}

?>