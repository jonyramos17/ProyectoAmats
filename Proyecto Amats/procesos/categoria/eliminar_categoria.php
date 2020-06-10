<?php
include_once"../../conexion/conexion.php";
$conexion=conectar();

    $id_categoria = $_POST['id'];

    $sql=" DELETE FROM categorias 
                    WHERE id_categoria = '$id_categoria'
        ";

    echo $result=mysqli_query($conexion, $sql);


?>