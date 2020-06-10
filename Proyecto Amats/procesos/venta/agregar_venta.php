<?php
		// session_start();
		// $usuario = $_SESSION['usuario'];
		require_once"../../conexion/conexion.php";
		require_once"crud_venta.php";
		$obj=new crud();
		
		$datos = array(
			$_POST['nombreCliente'],
			$_POST['fechaVenta'],
			$_POST['eleccionProducto'],
			$_POST['elec_cantidadProducto']
		);


		
		
		$sql="SELECT cantidad_producto 
			from productos
			where id_producto='$datos[2]'
	";

	$resultado=mysqli_query($conexion,$sql);

	$cantidad_producto=mysqli_fetch_row($resultado)[0];


	if(!isset($datos[0]) || strlen(trim($datos[0])) == 0){
		echo "2";
	}
	else if(!isset($datos[3]) || strlen(trim($datos[3])) == 0){
		echo "2";
	}
	else if($cantidad_producto<$datos[3]){
		echo "3";
		//No hara nada porque no hay producto suficiente para realizar dicha venta
	}
	else if($cantidad_producto>=$datos[3]){
		echo $obj->agregar($datos);
	}else{
		
	}

?>