<?php
	session_start();
    $destino="contacto@equiposymaquinasindustriales.com.ve";
	if (isset($_SESSION['usuario'])) {
		$usuario=$_SESSION['usuario'];
	}

    if(isset($_GET['id'])){
        $id=$_GET['id'];
    }

    if (isset($_GET['estado'])) {
        $estado=$_GET['estado'];
    }
    //Busco el nombre del producto con su id
    include 'conexion.php';
    $query="SELECT M_Nombre FROM maquinaria where M_Id=".$id."";
    $resultado = $mysqli -> query($query);
        while($f = $resultado->fetch_array(MYSQLI_ASSOC)){
            $nombreMaquinaria=$f['M_Nombre'];
        }
    $mysqli->close();
    //Fin de busqueda
    //Construccion del mensaje a enviar
    $mensaje="El usuario pidió información acerca de la maquinaria:".$nombreMaquinaria." en su estado:".$estado;
    if(isset($usuario)){
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
            $contenido="Nombre: ".$nombre."\nCorreo: ".$correo."\nTelefono: ".$telefono."\nMensaje: ".$mensaje;
            mail($destino,"Presupuesto",$contenido);
            //Devuelve a la pagina anterior
            header("Location:../detalleProducto.php?id=".$_GET['id']."&correo=enviado");
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
            $contenido="Nombre comercial: ".$nombreComercial."Razon Comercial".$razonComercial."\nCorreo: ".$correo."\nTelefono: ".$telefono."\nMensaje: ".$mensaje;
            mail($destino,"Presupuesto",$contenido);
            //Devuelve a la pagina anterior
            header("Location:../detalleProducto.php?id=".$_GET['id']."&correo=enviado");
        }   	
    }else{
        header("Location:../detalleProducto.php?id=".$_GET['id']."&login=error");
    }
?>