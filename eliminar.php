<?php include_once './template/header.php' ?>
<?php include_once './template/footer.php' ?>


<?php

if (!isset($_GET['codigo'])){
    header ('Location: index.php?mensaje=Error');
    exit();
}

include './model/conexion.php';
$codigo = $_GET['codigo'];


$sentencia = $bd -> prepare("DELETE FROM persona WHERE codigo =?;");
$resultado = $sentencia -> execute([$codigo]);

if ($resultado === TRUE) { 
    header('Location: index.php?mensaje=Eliminado');
} else { 
    header('Location: index.php?mensaje=Error');
}

?>