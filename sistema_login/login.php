<?php
$errores = array();
if($_SERVER['REQUEST_METHOD'] == "POST"){
    $correo = $_POST['correo'];
    $contrasena = $_POST['contrasena'];
    include("../funciones/base_de_datos/comprobar_usuario.php");
    $datos = comprobar_ingreso();
    if(!empty($datos)){
        var_dump($datos);
    }else{
        echo "Verifica tu correo y contraseña";
    }
}
?>

<!DOCTYPE <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Iniciar Sesión</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
</head>
<body>
<form method="post" action="">
            <h1>Formulario inicio de sesion</h1>
            <p>Correo:<input type="text" name="correo"/></p>
            <?=isError($errores,'correo'); ?>
            <p>Contraseña:<input type="password" name="contrasena"></p>
            <?=isError($errores,'contrasena'); ?>
            <p><input type="submit" value="Iniciar Sesion"> <a href="../index.html"><input type="button" value="Cancelar"></a> </p>
        </form>
</body>
</html>