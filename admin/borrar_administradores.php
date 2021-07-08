<?php

require_once('include/conn.php');
conectarse();



$codigo = $_GET["codigo"]; 

$cons = "Delete from administradores where codigo = $codigo";
mysqli_query($conn, $cons) or die(mysqli_error($conn));

header ("location: listado_administradores.php");
?>

