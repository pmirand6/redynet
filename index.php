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
	$sqllog = "select codigo, concat(apellido, ' ',nombre) as datos from curriculums where usuario = '$usuario' and clave = '$clave' and estado = 1";
	$rlog = mysql_query($sqllog, $conn);
	if($rslog = mysql_fetch_array($rlog)){ 
		session_register('usrcode');
		session_register('usrname');
		$_SESSION['usrcode'] = $rslog['codigo'];
		$_SESSION['usrname'] = $rslog['datos'];
		header('location: ingresarcv.php');
	}
	else {
		$mal='1';
	}
}?>
<HTML>
<HEAD>
	<meta http-equiv='Content-Type' content='text/html; charset=iso-8859-1'>
	<title>Redynet IAS</title>
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
			<p align='center'><b><a href="ingresarcv.php">Desea ingresar su curriculum como un usuario nuevo</a></b></p>
			<?if($mal=='1') {?>
				<p align='center'><b>Nombre de usuario o clave incorrecta</b></p>
			<?}?>
			</form>
		</td>
	</tr>
</table>
</BODY>
</HTML>