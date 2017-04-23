<?php
	if(isset($_POST['buscador'])){
		$buscador=trim($_POST['buscador']);
	}

	if(isset($buscador)){
		//
		header("Location: ../busquedaProductos.php?producto=".$buscador."");
	}else{
		header("Location: ../busquedaProductos.php");
	}
?>