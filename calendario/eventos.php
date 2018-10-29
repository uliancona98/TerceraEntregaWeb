<?php
//para la conexion de BD
header('Content-Type: application/json');

$pdo = new PDO("mysql:dbname = eventos; host=localhost", "root","");

//Seleccionar los eventos del calendario
$sentenciaSQL = $pdo->prepare("SELECT * FROM eventos");

$sentenciaSQL->execute();

$resultado = $sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);

echo json_decode($resultado);
?>