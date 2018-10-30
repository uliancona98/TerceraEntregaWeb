<?php
    require('config.php');
    $conexion = new mysqli(DB_HOST, DB_USUARIO, DB_CONTRA, DB_NOMBRE);
    if(!$conexion){
        echo "Conexion no exitosa";
    }
?>