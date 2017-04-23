<?php
	session_start();
	function carritoNuevo() {
		if (isset($_GET['estado'])) {
			if(isset($_GET['id'])){
				$arreglo[]=array('Id'=>$_GET['id'],'Estado'=>$_GET['estado'],'Cantidad'=>1,'Precio'=>null,'Nombre'=>null);
				$_SESSION['carrito']=$arreglo;
				echo "<script type=\"text/javascript\">alert(\"Ud agrego satisfactoriamente el producto\");</script>";
				header("Location:../detalleProducto.php?id=".$_GET['id']."&agregado=1");
			}
		}		
	}
//Fin Funcion
	function carritoViejo(){
		if (isset($_GET['estado'])) {
			if(isset($_GET['id'])){
				$arreglo=$_SESSION['carrito'];
				$encontro=false;
				$numero=0;
				for($i=0;$i<count($arreglo);$i++){
					if ($arreglo[$i]['Id']==$_GET['id'] && $arreglo[$i]['Estado']==$_GET['estado']){
						$encontro=true;
						$numero=$i;
					}
				}
				if($encontro==true){
					$arreglo[$numero]['Cantidad']=$arreglo[$numero]['Cantidad']+1;
					$_SESSION['carrito']=$arreglo;
				}else{
					$datosNuevos = array('Id' =>$_GET['id'],'Estado'=>$_GET['estado'],'Cantidad'=>1,'Precio'=>null,'Nombre'=>null);
					array_push($arreglo,$datosNuevos);
					$_SESSION['carrito']=$arreglo;
				}
			}
		}	
		echo "<script type=\"text/javascript\">alert(\"Ud agrego satisfactoriamente el producto\");</script>";
		header("Location:../detalleProducto.php?id=".$_GET['id']."&agregado=1");
	}

//Fin de declaración de funciones
if(isset($_SESSION['usuario'])){
	if (isset($_SESSION['carrito'])){
		carritoViejo();
			$arreglo=$_SESSION['carrito'];
		for($i=0;$i<count($arreglo);$i++){
				echo $arreglo[$i]['Id'];
				echo $arreglo[$i]['Estado'];
				echo $arreglo[$i]['Cantidad'];
		}
	}else{
		carritoNuevo();
	}
}else{	
	echo "<script type=\"text/javascript\">alert(\"Ud debe iniciar sesion primero\");</script>";
	header("Location:../detalleProducto.php?id=".$_GET['id']."&error=1");
}
		
	
?>