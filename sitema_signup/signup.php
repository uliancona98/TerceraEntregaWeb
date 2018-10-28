<?php
include ("../funciones/funciones_comprobacion.php");

session_start();
$errores = array();
if($_SERVER['REQUEST_METHOD'] == "POST"){
    //Obtenemos los datos de interes
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $contrasena = $_POST['contrasena'];

    //Comprobaciones antes de enviarselo a la base de datos.
    if(strlen($nombre) < 6){
        $errores['nombre'] = "El nombre debe de ser de almenos 6 carácteres.";
    }
    if(!comprobarEmail($correo)){
        $errores['correo'] = "El correo debe tener un formato.";
    }
    if(!comprobarContrasena($contrasena)){
        $errores['contrasena'] = "La contraseña debe ser mínimo 6 carácteres y máximo 20";
    }else{
        $contrasena_cifrada = password_hash($contrasena,PASSWORD_DEFAULT);
    }
    if($contrasena != $_POST['repetir_contrasena']){
        $errores['repetir_contrasena'] = "Las contraseñas no coinciden.";
    } 
    //Si todo está correcto, enviarlo a la base de datos
    if(empty($errores)){
        include("../funciones/base_de_datos/agregar_usuario.php");
        if(agregar($nombre, $correo, $contrasena_cifrada)){
            echo "agregado con exito a la bd";
        }else{
            errores['correoExists'] = "El correo ya se encuentra registrado."
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Registrarse</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
</head>
<body>
    <!--FORMULARIO-->
    <form method="post" action="">
            <h2>Formulario de registro</h2>
            <p>Nombre: <input type="text" name="nombre" value=<?=isset($_SESSION['nombre'])?$_SESSION['nombre']:""; ?>></p>
            <?=isError($errores,'nombre'); ?>
            <p>Correo: <input type="text" name="correo" value=<?=isset($_SESSION['correo'])?$_SESSION['correo']:"example@example.com"; ?>></p>
            <?=isError($errores,'correo'); ?>
            <?=isError($errores,'correoExists'); ?>
            <p>Contraseña: <input type="password" name="contrasena"></p>
            <?=isError($errores,'contrasena'); ?>
            <p>Repetir contraseña: <input type="password" name="repetir_contrasena"></p>
            <?=isError($errores, 'repetir_contrasena'); ?>
            <p><input type="submit" value="Enviar"> <a href="../index.html"><input type="button" value="Cancelar"></a> </p>
    </form>
</body>
</html>