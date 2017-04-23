<?php
	session_start();
	if(isset($_SESSION['usuario'])){
		$usuario=$_SESSION['usuario'];
	}

	if(isset($_GET['tipo'])){
		$tipo=$_GET['tipo'];
	}

	if(isset($_GET['id'])){
		$id=$_GET['id'];
	}
//Inicio de funciones
		function cambioDeEstado($id){
			include '../conexion.php';
			$subquery="Select sum(mdp_cantidad) from medio_de_pago where mdp_venta=".$id."";
			$query="SELECT (V_Total-(".$subquery.")) total FROM venta where v_id=".$id."";
			echo $query;
			$result = $mysqli -> query($query);
			while($f = $result->fetch_array(MYSQLI_ASSOC)){
				$total=$f['total'];
				echo $total;
			}
			if($total<=0){
				$updateQuery="UPDATE Venta set V_Estatus='Por confirmar pago' where V_Id=".$id."";
				if ($mysqli->query($updateQuery) === TRUE) {
  					echo "Actualizado";
  					header("Location:../perfil.php?codigo=1");
				} else {
  		  			echo "Error: ". $queryDetalles . "<br>" . $mysqli->error;
				}
			}else{
				header("Location:../porPagar.php?codigo=1");
			}
		}

		function insertDeposito($id){
			include '../conexion.php';
			$banco=$_POST['bancoDeposito'];
			$cantidad=$_POST['cantidadDeposito'];
			$vouche=$_POST['voucheDeposito'];
			$fecha=$_POST['fechaDeposito'];
			$query="INSERT INTO medio_de_pago (MDP_Cantidad,MDP_Banco,MDPD_NumeroDeposito,MDPD_FechaDeposito,MDP_Tipo,MDP_Venta) VALUES(".$cantidad.",'".$banco."',".$vouche.",'".$fecha."','Deposito',".$id.")";
			if ($mysqli->query($query) === TRUE) {
    			cambioDeEstado($id);
    			$result=$mysqli->close();
			} else {
    			echo "Error: ". $queryDetalles . "<br>" . $mysqli->error;
    			$result=$mysqli->close();
			}

		}

		function insertTransferencia($id){
			include '../conexion.php';
			$banco=$_POST['bancoTransferencia'];
			$cantidad=$_POST['cantidadTransferencia'];
			$numeroTransferencia=$_POST['numeroTransferencia'];
			$fecha=$_POST['fechaTransferencia'];
			$query="INSERT INTO medio_de_pago (MDP_Cantidad,MDP_Banco,MDPT_NumeroDeTransferencia,MDPT_FechaDeTransferencia,MDP_Tipo,MDP_Venta) VALUES (".$cantidad.",'".$banco."',".$numeroTransferencia.",".$fecha.",'Transferencia',".$id.")";
			if ($mysqli->query($query) === TRUE) {    			
    			cambioDeEstado($id);
    			$result=$mysqli->close();
			} else {
    			echo "Error: ". $queryDetalles . "<br>" . $mysqli->error;
    			$result=$mysqli->close();
			}
		}
// fin de funciones
	if($tipo=="deposito"){
		insertDeposito($id);
	}elseif ($tipo="transfencia") {
		insertTransferencia($id);
	}
?>