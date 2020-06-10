<?php
include_once"../../conexion/conexion.php";
$conexion=conectar();

    $id_producto = $_POST['id'];

    $sql=" DELETE FROM productos 
                    WHERE id_producto = '$id_producto'
        ";

    echo $result=mysqli_query($conexion, $sql);


?>