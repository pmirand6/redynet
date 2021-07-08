<?php

require_once('include/conn.php');
conectarse();



$codigo = $_GET["codigo"]; 

$cons = "Delete from administradores where codigo = $codigo";
mysql_query($cons,$conn) or die(mysql_error());

header ("location: listado_administradores.php");
?>

