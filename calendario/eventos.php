<?php
//para la conexion de BD
header('Content-Type: application/json');

require("../config/Conexion.php");

$con = new Conexion();
$conexion = $con->get_conexion();

$accion = (isset($_GET['accion']))?$_GET['accion']:'leer';

switch($accion){
    case 'agregar':
        $title = $_POST["title"];
        $descripcion = $_POST['descripcion'];
        $color = $_POST['color'];
        $textColor = $_POST['textColor'];
        $start = $_POST['start'];
        $end = $_POST['end'];
        $sentencia = "INSERT INTO EVENTOS(title, descripcion, color, textColor, start, end) VALUES($title, $descripcion, $color,$textColor,$start,$end)";
        $conexion->query($sentencia);
        $respuesta = $conexion->affected_rows;
        $con->close_conexion();
        echo json_encode($respuesta);
        //instruccion de agregar
        break;
    case 'eliminar':
        //instrucciones para eliminar
        break;
    case 'modificar':
        //instrucciones para modificar
        break;
    default:
        $sentencia = "SELECT * FROM EVENTOS";
        $sentenciaSQL = $conexion->query($sentencia);
        $resultado = $sentenciaSQL->fetch_all(MYSQLI_ASSOC);
        $con->close_conexion();
        echo json_encode($resultado);
        break;
}


?>