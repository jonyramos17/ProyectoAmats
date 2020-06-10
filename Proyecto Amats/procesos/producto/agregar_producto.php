<?php

include_once"../../conexion/conexion.php";
$conexion = conectar();

    $nombre_productos=$_POST['nombre_producto'];    
    $categoria_productos=$_POST['categoria_producto'];
    $descripcion_productos=$_POST['descripcion_producto'];
    $cantidad_producto=$_POST['cantidad_producto'];
    $precio_producto=$_POST['precio_producto'];

    $sql="INSERT INTO productos (fk_id_categoria,nombre_producto,descripcion,cantidad_producto,precio_producto)
                    VALUES('$categoria_productos','$nombre_productos','$descripcion_productos','$cantidad_producto','$precio_producto')
                ";

    echo mysqli_query($conexion,$sql);

?>