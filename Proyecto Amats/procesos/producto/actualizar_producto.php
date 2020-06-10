<?php
		include_once"../../conexion/conexion.php";
		require_once"crud_producto.php";

       $obj=new crud();

		$datos=array(
        $_POST['nombre_productoU'],			
		
        $_POST['categoria_productoU'],
        
		$_POST['descripcion_productoU'],			
		
		$_POST['cantidad_productoU'],
		
		$_POST['precio_productoU'],

		$_POST['idProducto']

		);

   echo $obj->actualizar($datos);


?>