<?php 
require_once('include/conn.php');
conectarse();



$codigo = $_GET["codigo"]; 
$activo = $_GET["activo"];

$pasara = 0;

if($activo==0)$pasara = 1;

$cons = "update administradores set estado = $pasara where codigo = $codigo";
mysqli_query($conn, $cons) or die(mysqli_error($conn));

header ("location: listado_administradores.php?");

?>

