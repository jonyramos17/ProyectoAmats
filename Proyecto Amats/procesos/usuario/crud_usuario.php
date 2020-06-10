<?php
	include_once"../../conexion/conexion.php";
	$conexion=conectar();
	//es mandada a llamar para agregar usuario
	
		class crud{
			public function agregar($datos){
				
				$conexion=conectar();


				$sql="INSERT into usuario (nombre_usuario,password_usuario,fk_id_rol) 
							values ('$datos[0]','$datos[1]','$datos[2]')";

				

				return mysqli_query($conexion,$sql);
			}

			public function actualizar($datos){
				$conexion=conectar();

				$sql="UPDATE usuario SET nombre_usuario = '$datos[0]',
											password_usuario = '$datos[1]' ,
											fk_id_rol = '$datos[2]' 
									WHERE id_usuario = '$datos[3]' ";

				return mysqli_query($conexion, $sql);

			}

		}

?>