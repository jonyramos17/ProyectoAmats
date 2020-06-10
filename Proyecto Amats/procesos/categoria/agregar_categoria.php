<?php
		require_once"crud_categoria.php";

      	$obj=new crud();

		$datos=array(
		
		$_POST['nombreCategoria'],			
	

		);

   echo $obj->agregar($datos);

  

?>