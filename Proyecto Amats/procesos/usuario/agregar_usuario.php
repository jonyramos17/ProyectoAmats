<?php
		require_once"../../conexion/conexion.php";
		require_once"crud_usuario.php";

       $obj=new crud();

		$datos=array(
		
		$_POST['nombreUsuario'],			
		
		$cifrado=md5($_POST['contrasenaUsuario']),
		
		$_POST['rolUsuario']

		);

   echo $obj->agregar($datos);





?>