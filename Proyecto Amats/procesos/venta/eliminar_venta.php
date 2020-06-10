<?php
include_once"../../conexion/conexion.php";
require_once"crud_venta.php";
		$obj=new crud();

$id_venta = $_POST['id'];


echo $obj->eliminar($id_venta);
    
?>