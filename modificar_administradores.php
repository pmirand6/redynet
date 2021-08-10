<?php
require_once('include/conn.php');
require_once('include/seguridad.php');
require_once('include/combo.php');
conectarse();

?>
<html>
<head> 
<title>Redynet IAS | Control Panel</title>
<link rel="stylesheet" href="include/estilos.css" type="text/css">
<SCRIPT LANGUAGE=JAVASCRIPT>
function verify(){
    msg = "�Est� seguro que desea eliminar?.\n";
    return confirm(msg);    
}
</SCRIPT>


<script language="JavaScript">

var upload_form_delete = null;

function validar(){  //validacion del formulario 
	var d = document.formulario 
	var	error = "" 
	if (d.apellido.value=="") 
		{error+="\n* Apellido debe ser completado"};
	if (d.nombre.value=="") 
		{error+="\n* Nombre debe ser completado"};
	if (d.usuario.value=="") 
		{error+="\n* Usuario debe ser completado"};
	if (d.clave.value=="") 
		{error+="\n* Clave debe ser completado"};
	if (d.email.value=="") 
		{error+="\n* E-mail debe ser completado"};

	if (error!=""){ 
	 alert("El formulario est� incompleto o contiene errores:\t\t\t\n"+error); 
	}else{ 
	 d.submit(); 
	}; 
} 
</script>



<?php require_once('include/estilos.php'); ?>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body bgcolor="#FFFFFF" leftmargin="0" topmargin="0" text="#000000" link="#000000" vlink="#666666" alink="#999999" marginwidth="0" marginheight="0">




<table width="750" border="0" cellspacing="0" cellpadding="0" height="300">
<tr> 
<td width="140" valign="top" background="images/fondo_cuerpo.gif"> 
<?php require_once('include/naveg.php'); ?>
</td>
<td align="center" valign="top" width="20" background="images/fondo_cuerpo.gif">&nbsp;</td>
<td align="left" valign="top" width="560" background="images/fondo_cuerpo.gif"> 






<span class=titulo>Alta / Modificacion de Administradores</span><br>


<?php
$codigo = 0;
$nombre = "";
$apellido = "";
$usuario = "";
$clave = "";
$email = "";
$activo = 1;

if(isset($_GET["codigo"]))$codigo = $_GET["codigo"];

if ($codigo != 0) {
	$cons = "SELECT * FROM administradores WHERE codigo = $codigo";
	$r = mysqli_query($conn, $cons);
	
	if($rs = mysqli_fetch_array($r)){
	
		$apellido = $rs["apellido"]; 
		$nombre = $rs["nombre"]; 
		$usuario = $rs["usuario"]; 
		$clave = $rs["clave"]; 
		$email = $rs["email"]; 
		$activo = $rs["estado"];
	}
}
?>

<form action="grabar_administradores.php?codigo=<?php echo $codigo?>" method="POST" name="formulario" id="formulario" >



<TABLE WIDTH="560" CELLPADDING="2" CELLSPACING="1" BORDER="0" BGCOLOR="#999999">




<tr> 
<td width="25%" bgcolor="#F5FCFF" class="itemformulario">Apellido:</td>
<td width="75%" bgcolor="#EFEFEF"> 
<input type="TEXT" name="apellido" value="<?php echo $apellido; ?>" size="50" maxlength="50">
</td>
</tr>

<tr> 
<td width="25%" bgcolor="#F5FCFF" class="itemformulario">Nombre:</td>
<td width="75%" bgcolor="#EFEFEF"> 
<input type="TEXT" name="nombre" value="<?php echo $nombre; ?>" size="50" maxlength="50">
</td>
</tr>

<tr> 
<td width="25%" bgcolor="#F5FCFF" class="itemformulario">Usuario:</td>
<td width="75%" bgcolor="#EFEFEF"> 
<input type="TEXT" name="usuario" value="<?php echo $usuario; ?>" size="50" maxlength="50">
</td>
</tr>

<tr> 
<td width="25%" bgcolor="#F5FCFF" class="itemformulario">Clave:</td>
<td width="75%" bgcolor="#EFEFEF"> 
<input type="TEXT" name="clave" value="<?php echo $clave; ?>" size="50" maxlength="50">
</td>
</tr>

<tr> 
<td width="25%" bgcolor="#F5FCFF" class="itemformulario">E-Mail:</td>
<td width="75%" bgcolor="#EFEFEF"> 
<input type="TEXT" name="email" value="<?php echo $email; ?>" size="50" maxlength="50">
</td>
</tr>

<tr> 
<td width="25%" bgcolor="#F5FCFF" class="itemformulario">Estado:</td>
<td width="75%" bgcolor="#EFEFEF"> 
<?php comboc("activo", "Invisible,Activo", $conn, "", $activo) ?>
</td>
</tr>







<tr bgcolor="EEF2F4" align="center" valign="middle"> 
<td colspan="2" height="41" width="558">


<a href="javascript:validar()"><img src="images/bot_grabar.gif" width="63" height="18" border="0"></a>


 
</td>
</tr>
</table>
<br>
� 


</form>

</TD>
</TR>
</TABLE>

<br>
