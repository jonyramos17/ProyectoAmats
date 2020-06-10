<?php
include_once"../../conexion/conexion.php";
$conexion=conectar();

    $id_usuario = $_POST['id'];

    $sql=" DELETE FROM usuario 
                    WHERE id_usuario = '$id_usuario'
        ";

    echo $result=mysqli_query($conexion, $sql);


?>