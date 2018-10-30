<?php
    include("conexion.php");
    $id = $_POST['variable'];
    
    /*echo "<script type='text/javascript'>
            alert('$id.aaa.$nuevo');
    </script>";*/   
    
    $query = "DELETE from publicaciones WHERE id=$id";
    $resultado = $conexion->query($query);

    if($resultado){
        echo "Si se elimino";
        header("Location: mostrar_perfil.php");
    }else{
        echo "No se elimino"; 
        header("Location: mostrar_perfil.php");
    }
    mysqli_close($conexion);

?>
