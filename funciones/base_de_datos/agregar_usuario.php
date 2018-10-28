<?php
require ("../config/Conexion.php");

function agregar(){
    $con = new Conexion();
    $conexion = $con->get_conexion($nombre, $correo, $contrasena);

    $sentencia = "INSERT INTO USUARIOS (nombre, correo, contrasena) VALUES('$nombre','$correo','$contrasena')";
    $resultado = $conexion->query($sentencia);
}

?>