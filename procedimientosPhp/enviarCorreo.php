<?php
	$mensaje="Nombre: ".$_POST['nombre']."\r\nCorreo: ".$_POST['correo']."\r\nTelefono: ".$_POST['telefono']."\r\nAsunto: ".$_POST['asunto']."\r\nMensaje:\r\n".$_POST['mensaje'];
	mail('contacto@equiposymaquinasindustriales.com.ve',$_POST['asunto'],$mensaje);
	mail('pedro.paff@hotmail.com',$_POST['asunto'],$mensaje);
	header("Location:../contacto.php?confirmado=1");
?>