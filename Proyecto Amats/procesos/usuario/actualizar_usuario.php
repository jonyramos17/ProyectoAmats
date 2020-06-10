<?php
		include_once"../../conexion/conexion.php";
		require_once"crud_usuario.php";

       $obj=new crud();

		$datos=array(
		
		$_POST['nombreUsuarioU'],			
		
		$_POST['contrasenaUsuarioU'],
		
		$_POST['rolUsuarioU'],

		$_POST['idUsuario']

		);

   echo $obj->actualizar($datos);


?>