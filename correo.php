<?php
	session_start();
	//Para motivos de prueba
		$_SESSION['usuario']="12345";
		
	//fin
	if (isset($_SESSION['usuario'])) {
		$usuario=$_SESSION['usuario'];
	}
	include 'conexion.php';
	$query="SELECT C_Tipo FROM cliente WHERE (Select U_Id from usuario where U_Nombre LIKE '".$usuario."')=C_Usuario";
	$resultado = $mysqli -> query($query);
        while($f = $resultado->fetch_array(MYSQLI_ASSOC)){
        	$tipo=$f['C_Tipo'];
        }
    $mysqli->close();
    echo $tipo;
    if($tipo=="Natural"){
    	include'conexion.php';
    	$query="SELECT CONCAT(CN_Nombre1,' ',CN_Nombre2,' ',CN_Apellido1,' ',CN_Apellido2) Nombre,C_Correo Correo,CONCAT('+',T_Codigo,T_Area,T_Numero) Telefono FROM cliente, telefono WHERE (Select U_Id from usuario where U_Nombre LIKE '".$usuario."')=C_Usuario AND C_Id=T_Cliente";
    	$resultado= $mysqli ->query($query);
    	while($f = $resultado->fetch_array(MYSQLI_ASSOC)){
        	$nombre=$f['Nombre'];
        	$correo=$f['Correo'];
        	$telefono=$f['Telefono'];
        }
        $mysqli->close();
    }else{
    	include'conexion.php';
    	$query="SELECT CJ_NombreComercial nombreComercial,CJ_RazonComercial razonComercial,C_Correo Correo,CONCAT('+',T_Codigo,T_Area,T_Numero) Telefono FROM cliente, telefono WHERE (Select U_Id from usuario where U_Nombre LIKE '".$usuario."')=C_Usuario AND C_Id=T_Cliente";
    	$resultado= $mysqli ->query($query);
    	while($f = $resultado->fetch_array(MYSQLI_ASSOC)){
        	$nombreComercial=$f['nombreComercial'];
        	$razonComercial=$f['razonComercial'];
        	$correo=$f['Correo'];
        	$telefono=$f['Telefono'];
        }
        $mysqli->close();
    }
	$destino="correopresupuesto@equiposymaquinasindustriales.com.ve";
	$nombre="Pedro Fernández";
	$correo="pedro.paff@hotmail.com";
	$telefono="0414-279-2806";
	$mensaje="HOLA MUNDO!";
	$contenido="Nombre: ".$nombre."\nCorreo: ".$destino."\nTelefono: ".$telefono."\nMensaje: ".$mensaje;
	//mail($destino,"Presupuesto",$contenido);
?>