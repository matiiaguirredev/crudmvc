<?php include_once './template/header.php' ?>
<?php include_once './template/footer.php' ?>

<?php

    print_r($_POST);

    if (!isset($_POST['codigo'])){
        header('location: index.php?mensaje=Error');
    }

    include './model/conexion.php';

    $codigo = $_POST['codigo'];
    $nombre = $_POST['txtNombre'];
    $edad = $_POST['txtEdad'];
    $signo = $_POST['txtSigno'];

    $sentencia = $bd->prepare("UPDATE persona SET nombre = ?, edad = ?, signo = ? WHERE codigo = ?; ");
    $resultado = $sentencia->execute([$nombre, $edad, $signo, $codigo]);

    if ($resultado === TRUE) {
        header('location: index.php?mensaje=Editado');
    } else {
        header('location: index.php?mensaje=Error');
        exit();

    }



?>