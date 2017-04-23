<?php
	session_start();
	$mysqli = new mysqli("144.217.70.84", "cliente","maquinas_industriales2017","equiposy_mercadopesado");
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
		header('Location:../index.php?error=1');
	}elseif(isset($contrasena)){
		header('Location:../index.php?error=2');
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
		header('Location:../index.php?error=1');
	}else{
		$_SESSION['usuario']=$usuario;
		header('Location:../perfil.php');
	}
?>