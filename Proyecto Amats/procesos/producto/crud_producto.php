<?php
	include_once"../../conexion/conexion.php";
	$conexion=conectar();
	//es mandada a llamar para agregar producto
	
		class crud{
			public function actualizar($datos){
				$conexion=conectar();

                $sql="UPDATE productos SET nombre_producto = '$datos[0]',
                                            fk_id_categoria = '$datos[1]',
                                            descripcion = '$datos[2]',
                                            cantidad_producto = '$datos[3]',
                                            precio_producto = '$datos[4]'
                                    WHERE id_producto = '$datos[5]'
                ";

                return mysqli_query($conexion, $sql);

			}

		}

?>