<?php
	session_start();
	$mysqli = new mysqli("localhost", "root",null,"mercadopesado");
	if(isset ($_POST['usuario']))
	{
		$usuario=utf8_decode($_POST['usuario']);
	}else{
		$usuario=null;
		//header('Location:../inicioSesion.php?error=1');
	}

	if(isset ($_POST['contrasenas']))
	{
		$contrasena=utf8_decode($_POST['contrasenas']);
	}else{
		$contrasena=null;
		//header('Location:../inicioSesion.php?error=2');
	}

	if(isset ($usuario))
	{
		header('Location:../inicioSesion.php?error=1');
	}elseif(isset($contrasena)){
		header('Location:../inicioSesion.php?error=2');
	}

	$query="SELECT * FROM usuario WHERE U_Nombre LIKE '".$usuario."' AND U_Contrasena LIKE '".$contrasena."' ";

	if (mysqli_connect_errno()) {
    	printf("Conexión fallida: %s\n", mysqli_connect_error());
    	exit();
	}

	if ($result = $mysqli->query($query)) {
	
	    /* determinar el número de filas del resultado */
	    $row_cnt = $result->num_rows;
	
	    printf("Result set has %d rows.\n", $row_cnt);
	
	    /* cerrar el resultset */
	    $result->close();
	}

	if($row_cnt==0){
		header('Location:../inicioSesion.php?error=3');
	}else{
		$_SESSION['usuario']=$usuario;
		header('Location:../perfil.php');
	}
?>