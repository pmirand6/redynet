<?php
if(!isset($_SESSION["backperm"]))header("Location: index.php");

//Se fija si tiene un nivel de seguridad
function Seguridad_Chequear($pNivel) {
	$pAux = false;
	if (($_SESSION["backperm"] & $pNivel)== $pNivel) $pAux = true;
	return($pAux);
}

//Se fija si tiene un nivel de seguridad si no lo tiene redirecciona
function Seguridad_Redirigir($pNivel, $pRedirect){
	if(!Seguridad_Chequear($pNivel)){
		header ("location: ".$pRedirect);
	}
}
?>