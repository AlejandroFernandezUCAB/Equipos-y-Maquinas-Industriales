<?php
session_start();
$registroNombre= utf8_decode($_POST['nombreUsuario']);
$registroContrasena= utf8_decode($_POST['contrasena']);
$registroConfirmar= utf8_decode($_POST['confirmarContrasena']);
include '../conexion.php';
$query ="SELECT U_Id FROM usuario WHERE U_Nombre LIKE '".$registroNombre."'";
$queryInsert ="INSERT INTO usuario (U_Nombre,U_Contrasena,U_Rol) VALUES('".$registroNombre."','".$registroContrasena."',1)";
$row_cnt=0;
if($registroContrasena==$registroConfirmar){

if (mysqli_connect_errno()) {
    printf("Conexión fallida: %s\n", mysqli_connect_error());
    exit();
}

if ($result = $mysqli->query($query)) {
    $row_cnt = $result->num_rows;
    printf("Result set has %d rows.\n", $row_cnt);
    $result->close();
}
echo $row_cnt;
if ($row_cnt>0)
{
   header('Location: ../registro.php?error=2');
} else {

if ($mysqli->query($queryInsert) === TRUE) {
    $_SESSION['usuario']=$registroNombre;
    echo "entre";
   header('Location: ../registro2.php');
} else {
    echo "Error: " . $queryInsert . "<br>" . $mysqli->error;
}
}
/* cerrar la conexión */
$mysqli->close();
}else
{
	header('Location:../registro.php?error=1');
}
?>
