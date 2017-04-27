<?php
	session_start();
//iNICIO DE LAS FUNCIONES
	function buscarId(){
		include 'conexion.php';
		if(isset($_SESSION['usuario'])){
			$usuario=$_SESSION['usuario'];
			$queryUsuario="select C_Id from cliente, usuario where (select U_Id from usuario where U_Nombre LIKE '".$usuario."')=C_Usuario";
			$resultado = $mysqli->query($queryUsuario);		
				while($far = $resultado->fetch_array(MYSQLI_ASSOC)){
					$idC=$far['C_Id'];
				}

			return $idC;
		}
	}
	function insertVenta(){
		include 'conexion.php';
		$queryVenta= "INSERT INTO venta(V_FechaVenta,V_Estatus,V_Total,V_FechaEntrega,V_Cliente) VALUES ((SELECT CURDATE()),'Por Pagar',222,NULL,".buscarId().")";
		if ($mysqli->query($queryVenta) === TRUE) {
    		echo "New record created successfully";
			} else {
    			echo "Error: ". $sql . "<br>" . $mysqli->error;
			}
		return  $mysqli->insert_id;
		}
	function insertDetallesVenta($idVenta,$items){
		include 'conexion.php';
		for($i=0;$i<count($items);$i++){
		$queryDetalles="INSERT INTO detalle_venta values(".$idVenta.",".$items[$i].")";
			if ($mysqli->query($queryDetalles) === TRUE) {
    		echo "Creado Satisfactoriamente";
			} else {
    			echo "Error: ". $queryDetalles . "<br>" . $mysqli->error;
			}
		}
	}
// Fin de la funcion
	if(isset($_SESSION['carrito'])){
		include 'conexion.php';
		$productos=$_SESSION['carrito'];
		$ultimo=insertVenta();
		for($i=0;$i<count($productos);$i++){
				$limite=$productos[$i]['Cantidad'];
				$query="select DM_Id FROM detalle_maquinaria where (DM_estado LIKE '".$productos[$i]['Estado']."') AND (DM_Id NOT IN(Select DV_DetalleMaquinaria from detalle_venta )) LIMIT 0,".$limite."";		
				$result = $mysqli -> query($query);		
				$j=0;
				while($f = $result->fetch_array(MYSQLI_ASSOC)){ 
					$matriz[$j]=$f['DM_Id'];
					$j++;
				}
				insertDetallesVenta($ultimo,$matriz);
		}
		$_SESSION['carrito']=null;
		header('Location:../../porPagar.php');
	}
?>