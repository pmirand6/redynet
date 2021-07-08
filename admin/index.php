<?require_once('include/conn.php');
conectarse();

$mal = 0;
$cerrar = 'f';

if(isset($_GET['cerrar']))$cerrar = $_GET['cerrar'];
if($cerrar=='t') {
	session_destroy();
}

if(isset($_POST['usuario']))$usuario = $_POST['usuario'];
if(isset($_POST['clave']))$clave = $_POST['clave'];

if(isset($_POST['aceptar'])){
	$sqllog = "select codigo, permiso from administradores where usuario = '$usuario' and clave = '$clave' and estado = 1";
	$rlog = mysqli_query($conn, $sqllog);
	if($rslog = mysqli_fetch_array($rlog)){
        $_SESSION['backcode'] = 'backcode';
        $_SESSION['backperm'] = 'backperm';
		$_SESSION['backcode'] = $rslog['codigo'];
		$_SESSION['backperm'] = $rslog['permiso'];
		header('location: home.php');
	}
	else {
		$mal='1';
	}
}?>
<HTML>
<HEAD>
	<?php require_once('include/estilos.php'); ?>
	<meta http-equiv='Content-Type' content='text/html; charset=iso-8859-1'>
	<title>Redynet IAS | Control Panel</title>
</HEAD>
<BODY bgcolor='#F5F5F5' leftmargin='0' topmargin='0' marginwidth='0' marginheight='0'>
<table width='700'  height='300' border='0' cellpadding='0' cellspacing='0'>
	<tr>
		<td valign='top' height='99'></td>
	</tr>
	<tr>
		<td height='100%' valign='top' background='images/fondo_cuerpo.gif'>
			<form name='form1' action='index.php?a=1' method='post'>
			<br><br>
			<table width='300' border=0 align=center cellpadding='2' cellspacing='1' bgcolor='#FFFFFF'>
			<tr bgcolor='#DCE4E9'>
				<td height='35' colspan='5' align='center'><font class ='login'><b>Login</b></font></td>
			</tr>
			<tr bgcolor='EEF2F4'>
				<td align='left' bgcolor='#EFF3F7'><font class ='login'><b>Usuario:</b></font></td>
				<td><input class='input' type='text' name='usuario'></td>
			</tr>
			<tr bgcolor='EEF2F4'>
				<td bgcolor='#EFF3F7'><font class ='login'><b>Clave:</b></font></td>
				<td><input class='input' type='password' name='clave'></td>
			</tr>
			<tr bgcolor='EEF2F4'>
				<td colspan='2' align='center' bgcolor='#EFF3F7'><input type='submit' name='aceptar' value='Aceptar' class='input'></td>
			</tr>
			</tr>
			</table>
			<?if($mal=='1') {?>
				<p align='center'><b>Nombre de usuario o clave incorrecta</b></p>
			<?}?>
			</form>
		</td>
	</tr>
</table>
</BODY>
</HTML>