<?php
require_once('include/conn.php');
require_once('include/seguridad.php');

conectarse();
Seguridad_Redirigir(1,"login.php");

$codigo = $_GET["codigo"]; 
$apellido = $_POST["apellido"]; 
$nombre = $_POST["nombre"]; 
$usuario = $_POST["usuario"]; 
$clave = $_POST["clave"]; 
$estado = $_POST["activo"];

if ($codigo<>0){
	$cons = "Update administradores set nombre = '$nombre', apellido = '$apellido', usuario = '$usuario', clave = '$clave', estado = $estado where codigo = $codigo";
}
else{
	$cons = "Insert into administradores (apellido, nombre, usuario, clave, estado) values ('$apellido','$nombre','$usuario','$clave',$estado)";
}
mysql_query($cons,$conn) or die(mysql_error());

header ("location: listado_administradores.php?");
?>
