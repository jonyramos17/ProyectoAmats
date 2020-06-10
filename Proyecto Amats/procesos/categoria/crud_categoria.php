<?php
		require_once"../../conexion/conexion.php";

	
		class crud 
		{
			public function agregar($datos){
				
				$conexion=conectar();


				$sql="INSERT into categorias (nombre_categoria) values ('$datos[0]')";

				

				return mysqli_query($conexion,$sql);
			}

			public function actualizar($datos){
				$conexion=conectar();

				$sql="UPDATE categorias SET nombre_categoria = '$datos[0]'
									WHERE id_categoria = '$datos[1]' ";

				return mysqli_query($conexion, $sql);

			}
		
		}

?>
