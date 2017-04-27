<?php
	session_start();
	
	//Del tipo de Natural
	if(isset ($_SESSION['usuario']))
	{
		$usuario= $_SESSION['usuario'];
		$queryBusqueda="(SELECT C_Id FROM usuario,cliente WHERE U_Nombre LIKE '".$usuario."' AND U_Id=C_Usuario)";
	}else{
		header('Location:registro2.php?error=3');
	}

	if(isset ($_POST['cedula']))
	{
		$cedulaN=utf8_decode($_POST['cedula']);
	}else{
		header('Location:registro2.php?error=4');
	}
	if(isset ($_POST['rifNatural']))
	{
		$rifN=utf8_decode($_POST['rifNatural']);
	}else{
		$rifN=null;
	}

	if(isset ($_POST['primerNombre']))
	{
		$primerNombreN=utf8_decode($_POST['primerNombre']);
		$tipoCliente="Natural";
	}else{
		header('Location:registro2.php?error=5');
	}

	if(isset ($_POST['segundoNombre']))
	{
		$segundoNombreN=utf8_decode($_POST['segundoNombre']);
	}else{
		$segundoNombreN=null;
	}
	if(isset ($_POST['primerApellido']))
	{
		$primerApellidoN=utf8_decode($_POST['primerApellido']);	
	}else{
		header('Location:registro2.php?error=6');
	}
	if(isset ($_POST['segundoApellido']))
	{
		$segundoApellidoN=utf8_decode($_POST['segundoApellido']);
	}
	if(isset ($_POST['correoNatural']))
	{
		$correoN=utf8_decode($_POST['correoNatural']);
	}else{
		header('Location:registro2.php?error=1');
	}
	if(isset ($_POST['codigoNatural']))
	{
		$cTelefonoN=utf8_decode($_POST['codigoNatural']);
	}
	if(isset ($_POST['areaNatural']))
	{
		$aTelefonoN=utf8_decode($_POST['areaNatural']);
	}
	if(isset ($_POST['telefonoNatural']))
	{
		$TelefonoN=utf8_decode($_POST['telefonoNatural']);
	}
	if(isset ($_POST['paisNatural']))
	{
		$paisN=utf8_decode($_POST['paisNatural']);
	}else{
		header('Location:registro2.php?error=2');
	}
	//$queryNatural="INSERT INTO cliente (C_FechaDeRegistro,C_Correo,C_Tipo,C_Lugar,C_Usuario,C_Rif,CN_Cedula,CN_Nombre1,CN_Nombre2,CN_Apellido1,CN_Apellido2) VALUES ((SELECT CURDATE()),'".$correoN."','Natural',".$paisN.",(SELECT U_Id from usuario where U_Nombre LIKE '".$usuario."'),'".$rifN."',".$cedulaN.",'".$primerNombreN."','".$segundoNombreN."','".$primerApellidoN."','".$segundoApellidoN."')";
	//$queryTelefonoNatural="INSERT INTO telefono (T_Codigo,T_Area,T_numero,T_Cliente) VALUES (".$cTelefonoN.",".$aTelefonoN.",".$TelefonoN.",".$queryBusqueda.")";
	//Del tipo Juridico
	if(isset ($_POST['rifJuridico']))
	{
		$rifJ=utf8_decode($_POST['rifJuridico']);
		$tipoCliente="Juridico";
	}
	if(isset ($_POST['comercial']))
	{
		$comercialJ=utf8_decode($_POST['comercial']);
	}
	if(isset ($_POST['razon']))
	{
		$razonJ=utf8_decode($_POST['razon']);
	}
	if(isset ($_POST['paginaweb']))
	{
		$paginaWebJ=utf8_decode($_POST['paginaweb']);
	}
	else{
		$paginaWebJ=NULL;
	}
	if(isset ($_POST['correoJ']))
	{
		$correoJ=utf8_decode($_POST['correoJ']);
	}
	if(isset ($_POST['codigoJuridico']))
	{
		$codigoJ=utf8_decode($_POST['codigoJuridico']);
	}
	if(isset ($_POST['areaJuridico']))
	{
		$areaJ=utf8_decode($_POST['areaJuridico']);
	}
	if(isset ($_POST['telefonoJuridico']))
	{
		$telefonoJ=utf8_decode($_POST['telefonoJuridico']);
	}
	if(isset ($_POST['paisJuridico']))
	{
		$paisJ=utf8_decode($_POST['paisJuridico']);
	}
	if(isset($_GET['id'])){
		if($_GET['id']==0){
			$tipoCliente=="Natural";
		}else{
			$tipoCliente=="Juridico";
		}
	}
	//Conexion bdd
	$mysqli = new mysqli("144.217.70.84", "equiposy","maquinas_industriales2017","equiposy_mercadopesado");

	if($tipoCliente=="Natural"){
		if(!isset($correoN))
		{ 
		    header('Location:registro2.php?error=1');
		}elseif (!isset($usuario)){
			header('Location:registro2.php?error=2');
		}elseif (!isset($paisN)){
			header('Location:registro2.php?error=3');
		}elseif(!isset($cedulaN)) {
			header('Location:registro2.php?error=4');
		}elseif (!isset($primerNombreN)){
			header('Location:registro2.php?error=5');
		}elseif (!isset($primerApellidoN)){
			header('Location:registro2.php?error=6');
		}else{
				$queryNatural="INSERT INTO cliente (C_FechaDeRegistro,C_Correo,C_Tipo,C_Lugar,C_Usuario,C_Rif,CN_Cedula,CN_Nombre1,CN_Nombre2,CN_Apellido1,CN_Apellido2) VALUES ((SELECT CURDATE()),'".$correoN."','Natural',".$paisN.",(SELECT U_Id from usuario where U_Nombre LIKE '".$usuario."'),'".$rifN."',".$cedulaN.",'".$primerNombreN."','".$segundoNombreN."','".$primerApellidoN."','".$segundoApellidoN."')";
				$queryTelefonoNatural="INSERT INTO telefono (T_Codigo,T_Area,T_numero,T_Cliente) VALUES (".$cTelefonoN.",".$aTelefonoN.",".$TelefonoN.",".$queryBusqueda.")";
			if (mysqli_connect_errno()) 
			{
   				 printf("Conexión fallida: %s\n", mysqli_connect_error());
 				   exit();
			}
			if ($mysqli->query($queryNatural) === TRUE) 
			{
				  if ($mysqli->query($queryTelefonoNatural) === TRUE) {
					    header('Location: ../perfil.php');
					} else {
					    echo "Error: " . $queryTelefonoNatural . "<br>" . $mysqli->error;
					}
				} else 
				{
    				echo "Error: " . $queryNatural . "<br>" . $mysqli->error;
				}
		}
	}else{

		if (!isset($comercialJ)){
			header('Location:registro2.php?error=7');
		}elseif (!isset($razonJ)){
			header('Location:registro2.php?error=8');
		}elseif (!isset($correoJ)) {
			header('Location:registro2.php?error=9');
		}elseif (!isset($paisJ)) {
			header('Location:registro2.php?error=10');
		}elseif (!isset($rifJ)) {
			header('Location:registro2.php?error=11');
		}else{
				$queryJuridico="INSERT INTO cliente(C_FechaDeRegistro,C_Correo,C_Tipo,C_Lugar,C_Usuario,C_Rif,CJ_NombreComercial,CJ_RazonComercial,CJ_PaginaWeb) VALUES ((SELECT CURDATE()),'".$correoJ."','Juridico',".$paisJ.",(SELECT U_Id from usuario where U_Nombre LIKE '".$usuario."'),'".$rifJ."','".$comercialJ."','".$razonJ."','".$paginaWebJ."')";
				$queryJuridicoTelefono="INSERT INTO telefono (T_Codigo,T_Area,T_numero,T_Cliente) VALUES (".$codigoJ.",".$areaJ.",".$telefonoJ.",".$queryBusqueda.")";
			if (mysqli_connect_errno()) 
			{
   				 printf("Conexión fallida: %s\n", mysqli_connect_error());
 				   exit();
			}
			if ($mysqli->query($queryJuridico) === TRUE) 
			{
  				 if ($mysqli->query($queryJuridicoTelefono) === TRUE) {
					    header('Location: ../perfil.php');
					} else {
					    echo "Error: " . $queryJuridicoTelefono . "<br>" . $mysqli->error;
					}
				} else 
				{
    				echo "Error: " . $queryJuridico . "<br>" . $mysqli->error;
				}
		}
		
	}

	


?>