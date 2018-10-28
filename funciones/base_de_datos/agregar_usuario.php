<?php
require ("../config/Conexion.php");

function agregar($nombre, $correo, $contrasena){
    $con = new Conexion();
    $conexion = $con->get_conexion();

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