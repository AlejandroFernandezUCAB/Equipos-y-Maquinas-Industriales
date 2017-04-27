<?php
	//$mysqli = new mysqli("144.217.70.84", "equiposy","maquinas_industriales2017","equiposy_mercadopesado");
$mysqli = new mysqli("localhost", "root","","mercadopesado");
		if ($mysqli->connect_errno) {
    			echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
		}
?>