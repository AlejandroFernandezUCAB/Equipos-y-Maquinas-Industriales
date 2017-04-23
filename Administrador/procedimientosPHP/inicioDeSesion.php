<?php
	session_start();
	include '../pages/conexion.php';
	if (isset($_POST['usuario'])){
		$usuario=$_POST['usuario'];
	}
	if (isset($_POST['password'])){
		$contrasena=$_POST['password'];
	}
	$query="SELECT COUNT(*) conexion FROM usuario where U_Nombre='".$usuario."' AND U_Contrasena='".$contrasena."' AND U_Rol=2";

	$result = $mysqli -> query($query);
	while($f = $result->fetch_array(MYSQLI_ASSOC)){
		$conexion=$f['conexion'];		
	}

	if ($conexion==1){
		$_SESSION['usuario']=$usuario;
		header('Location:../pages/index.php');
	}else{
		header('Location:../pages/login.php?error=1');
	}
?>