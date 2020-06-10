<?php
		require_once"../../conexion/conexion.php";
		require_once"crud_categoria.php";

      	$obj=new crud();

		$datos=array(
		
		$_POST['nombreCategoriaU'],	
		$_POST['idCategoria']		

		);

   echo $obj->actualizar($datos);

  

?>