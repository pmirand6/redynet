<?
require_once('include/conn.php');
require_once('include/seguridad.php');
require_once('include/combo.php');
require_once('include/funciones.php');

conectarse();




$apellido='';
$nombre='';
$tipo_doc='';
$documento='';
$sexo=0;
$nacionalidad='';
$cuilcuit=0;
$ccnumero='';
$fecha_nac='';
$lugar_nac='';
$edad=0;
$estado_civil='';
$calle='';
$numero='';
$piso='';
$depto='';
$localidad='';
$provincia='';
$cp='';
$email='';
$telefono='';
$celular='';
$marca='';
$modelo='';
$ano='';
$estado=0;
$usuario='';
$clave='';
$nombre_conyugue='';
$nombre_madre='';
$nombre_padre='';
$fallecida_madre=0;
$fallecido_padre=0;
$movilidad=0;
$disponivilidad_viajar = 0;
$sec_completo=0;
$sec_titulo='';
$tipo_contrato = 0;
$codigo = 0;
if(isset($_GET['codigo']))$codigo = $_GET['codigo'];

if ($codigo != 0) {
	$cons = 'select * from curriculums where codigo = '.$codigo;
	$r = mysql_query($cons, $conn);
	if($rs = mysql_fetch_array($r)){
		$apellido=$rs['apellido'];
		$nombre=$rs['nombre'];
		$tipo_doc=$rs['tipo_doc'];
		$documento=$rs['documento'];
		$sexo=$rs['sexo'];
		$nacionalidad=$rs['nacionalidad'];
		$cuilcuit=$rs['cuilcuit'];
		$ccnumero=$rs['ccnumero'];
		$fecha_nac=$rs['fecha_nac'];
		$lugar_nac=$rs['lugar_nac'];
		$edad=$rs['edad'];
		$estado_civil=$rs['estado_civil'];
		$calle=$rs['calle'];
		$numero=$rs['numero'];
		$piso=$rs['piso'];
		$depto=$rs['depto'];
		$localidad=$rs['localidad'];
		$provincia=$rs['provincia'];
		$cp=$rs['cp'];
		$email=$rs['email'];
		$telefono=$rs['telefono'];
		$celular=$rs['celular'];
		$marca=$rs['marca'];
		$modelo=$rs['modelo'];
		$ano=$rs['ano'];
		$estado=$rs['estado'];
		$usuario=$rs['usuario'];
		$clave=$rs['clave'];
		$nombre_conyugue=$rs['nombre_conyugue'];
		$nombre_madre=$rs['nombre_madre'];
		$nombre_padre=$rs['nombre_padre'];
		$fallecida_madre=$rs['fallecida_madre'];
		$fallecido_padre=$rs['fallecido_padre'];
		$movilidad=$rs['movilidad'];
		$disponivilidad_viajar=$rs['disponivilidad_viajar'];
		$tipo_contrato=$rs['tipo_contrato'];

		$sec_completo=$rs['sec_completo'];
		$sec_titulo=$rs['sec_titulo'];
	}
}
?>

<html>
<head> 
	<title>Redynet IAS | Control Panel</title>

<link rel='stylesheet' href='include/estilos.css' type='text/css'>
<script language='JavaScript'>
function verify(){
    msg = '¿Está seguro que desea eliminar?.';
    return confirm(msg);    
}

var upload_form_delete = null;

function validar(){  //validacion del formulario 
	var d = document.frm_curriculums
	var	error = ''
	if (d.apellido.value=='') 
			{error+='* Apellido debe ser completado\n'};
			if (d.nombre.value=='') 
			{error+='* Nombre debe ser completado\n'};
			if (d.tipo_doc.value=='') 
			{error+='* Tipo de documento debe ser completado\n'};
			if (d.documento.value=='') 
			{error+='* Documento debe ser completado\n'};
			if (d.sexo.value=='') 
			{error+='* Sexo debe ser completado\n'};
			if (d.nacionalidad.value=='') 
			{error+='* Nacionalidad debe ser completado\n'};
			if (d.fecha_nac.value=='') 
			{error+='* Fecha de nacimiento debe ser completado\n'};
			if (d.lugar_nac.value=='') 
			{error+='* Lugar de nacimiento debe ser completado\n'};
			if (d.edad.value==''){
				error+='* Edad debe ser completado\n';
			}else{
				if (isNaN(d.edad.value))
				{error+='* Edad debe ser numerico\n';}
			};
			if (d.estado_civil.value=='') 
			{error+='* Estado civil debe ser completado\n'};
			if (d.usuario.value=='') 
			{error+='* Usuario debe ser completado\n'};
			if (d.clave.value=='') 
			{error+='* Clave debe ser completado\n'};
			if (error!=''){ 
	 alert('El formulario está incompleto o contiene errores:\n\n'+error); 
	}else{ 
	 d.submit(); 
	}; 
} 

</script>

<?require_once('include/estilos.php');?>
<meta http-equiv='Content-Type' content='text/html; charset=iso-8859-1'>
</head>

<body bgcolor='#FFFFFF' leftmargin='0' topmargin='0' text='#000000' link='#000000' vlink='#666666' alink='#999999' marginwidth='0' marginheight='0'>

<table width='750' border='0' cellspacing='0' cellpadding='0' height='300'>
<tr> 
<td width='140' valign='top' background='images/fondo_cuerpo.gif'> 
<?php require_once('include/naveg.php'); ?>
</td>
<td align='center' valign='top' width='20' background='images/fondo_cuerpo.gif'>&nbsp;</td>
<td align='left' valign='top' width='560' background='images/fondo_cuerpo.gif'> 

<span class=titulo>Alta / Modificacion de curriculums</span><br>

<TABLE WIDTH='560' CELLPADDING='2' CELLSPACING='1' BORDER='0' BGCOLOR='#999999'>
<form enctype='multipart/form-data' action='grabar_curriculums.php?codigo=<?echo $codigo?>' method='POST' name='frm_curriculums' id='frm_curriculums'><tr> 
					<td width='25%' bgcolor='#F5FCFF' class='itemformulario'>
						Apellido:
					</td>
					<td width='75%' bgcolor='#EFEFEF'> 
						<input type='TEXT' name='apellido' value='<?php echo $apellido; ?>' size='50' maxlength='45'>
					</td>
				</tr><tr> 
					<td width='25%' bgcolor='#F5FCFF' class='itemformulario'>
						Nombre:
					</td>
					<td width='75%' bgcolor='#EFEFEF'> 
						<input type='TEXT' name='nombre' value='<?php echo $nombre; ?>' size='50' maxlength='45'>
					</td>
				</tr><tr> 
					<td width='25%' bgcolor='#F5FCFF' class='itemformulario'>
						Tipo documento:
					</td>
					<td width='75%' bgcolor='#EFEFEF'> 
						<input type='TEXT' name='tipo_doc' value='<?php echo $tipo_doc; ?>' size='50' maxlength='45'>
					</td>
				</tr><tr> 
					<td width='25%' bgcolor='#F5FCFF' class='itemformulario'>
						Nº Documento:
					</td>
					<td width='75%' bgcolor='#EFEFEF'> 
						<input type='TEXT' name='documento' value='<?php echo $documento; ?>' size='50' maxlength='45'>
					</td>
				</tr><tr> 
					<td width='25%' bgcolor='#F5FCFF' class='itemformulario'>
						Sexo:
					</td>
					<td width='75%' bgcolor='#EFEFEF'> 
						<?php comboc('sexo','--Sexo--,Masculino,Femenino',$conn,'',$sexo)?>
					</td>
				</tr><tr> 
					<td width='25%' bgcolor='#F5FCFF' class='itemformulario'>
						Nacionalidad:
					</td>
					<td width='75%' bgcolor='#EFEFEF'> 
						<input type='TEXT' name='nacionalidad' value='<?php echo $nacionalidad; ?>' size='50' maxlength='45'>
					</td>
				</tr>
				
				<tr> 
					<td width='25%' bgcolor='#F5FCFF' class='itemformulario'>
						Tipo Contrato:
					</td>
					<td width='75%' bgcolor='#EFEFEF'> 
						<?php comboc('tipo_contrato','--Opciones--,Monotributista,Relacion de dependencia',$conn,'',$tipo_contrato)?>
					</td>
				</tr>					
				<tr> 
					<td width='25%' bgcolor='#F5FCFF' class='itemformulario'>
						Cuit / Cuil:
					</td>
					<td width='75%' bgcolor='#EFEFEF'> 
						<?php comboc('cuilcuit','--Opciones--,Cuit,Cuil',$conn,'',$cuilcuit)?>
					</td>
				</tr><tr> 
					<td width='25%' bgcolor='#F5FCFF' class='itemformulario'>
						Numero de Cuit / Cuil:
					</td>
					<td width='75%' bgcolor='#EFEFEF'> 
						<input type='TEXT' name='ccnumero' value='<?php echo $ccnumero; ?>' size='50' maxlength='45'>
					</td>
				</tr><tr> 
					<td width='25%' bgcolor='#F5FCFF' class='itemformulario'>
						Fecha Nacimiento:
					</td>
					<td width='75%' bgcolor='#EFEFEF'> 
						<input value='<?echo $fecha_nac?>' name='fecha_nac' type='text' class='cajas' onFocus='this.style.backgroundColor=#B7DDD9' onBlur='this.style.backgroundColor=#ffffff' maxlength='10' size='12'></td>
				</tr><tr> 
					<td width='25%' bgcolor='#F5FCFF' class='itemformulario'>
						Lugar de Nacimiento:
					</td>
					<td width='75%' bgcolor='#EFEFEF'> 
						<input type='TEXT' name='lugar_nac' value='<?php echo $lugar_nac; ?>' size='50' maxlength='45'>
					</td>
				</tr><tr> 
					<td width='25%' bgcolor='#F5FCFF' class='itemformulario'>
						Edad:
					</td>
					<td width='75%' bgcolor='#EFEFEF'> 
						<input type='TEXT' name='edad' value='<?php echo $edad; ?>' size='50' maxlength='10'>
					</td>
				</tr><tr> 
					<td width='25%' bgcolor='#F5FCFF' class='itemformulario'>
						Estado Civil:
					</td>
					<td width='75%' bgcolor='#EFEFEF'> 
						<input type='TEXT' name='estado_civil' value='<?php echo $estado_civil; ?>' size='50' maxlength='45'>
					</td>
				</tr>
				<tr> 
					<td width='25%' bgcolor='#F5FCFF' class='itemformulario'>
						Email:
					</td>
					<td width='75%' bgcolor='#EFEFEF'> 
						<input type='TEXT' name='email' value='<?php echo $email; ?>' size='50' maxlength='45'>
					</td>
				</tr><tr> 
					<td width='25%' bgcolor='#F5FCFF' class='itemformulario'>
						Telefono:
					</td>
					<td width='75%' bgcolor='#EFEFEF'> 
						<input type='TEXT' name='telefono' value='<?php echo $telefono; ?>' size='50' maxlength='45'>
					</td>
				</tr><tr> 
					<td width='25%' bgcolor='#F5FCFF' class='itemformulario'>
						Celular:
					</td>
					<td width='75%' bgcolor='#EFEFEF'> 
						<input type='TEXT' name='celular' value='<?php echo $celular; ?>' size='50' maxlength='45'>
					</td>
				</tr>
				<tr> 
					<td width='25%' bgcolor='#F5FCFF' class='itemformulario'>
						Usuario:
					</td>
					<td width='75%' bgcolor='#EFEFEF'> 
						<input type='TEXT' name='usuario' value='<?php echo $usuario; ?>' size='50' maxlength='45'>
					</td>
				</tr><tr> 
					<td width='25%' bgcolor='#F5FCFF' class='itemformulario'>
						Clave:
					</td>
					<td width='75%' bgcolor='#EFEFEF'> 
						<input type='TEXT' name='clave' value='<?php echo $clave; ?>' size='50' maxlength='45'>
					</td>
				</tr>				
				<tr> 
					<td colspan='2' align='center' bgcolor='#F5FCFF' class='itemformulario'>Domicilio</td>
				</tr>
				
				<tr> 
					<td width='25%' bgcolor='#F5FCFF' class='itemformulario'>
						Calle:
					</td>
					<td width='75%' bgcolor='#EFEFEF'> 
						<input type='TEXT' name='calle' value='<?php echo $calle; ?>' size='50' maxlength='45'>
					</td>
				</tr><tr> 
					<td width='25%' bgcolor='#F5FCFF' class='itemformulario'>
						Numero:
					</td>
					<td width='75%' bgcolor='#EFEFEF'> 
						<input type='TEXT' name='numero' value='<?php echo $numero; ?>' size='50' maxlength='45'>
					</td>
				</tr><tr> 
					<td width='25%' bgcolor='#F5FCFF' class='itemformulario'>
						Piso:
					</td>
					<td width='75%' bgcolor='#EFEFEF'> 
						<input type='TEXT' name='piso' value='<?php echo $piso; ?>' size='50' maxlength='45'>
					</td>
				</tr><tr> 
					<td width='25%' bgcolor='#F5FCFF' class='itemformulario'>
						Dpto:
					</td>
					<td width='75%' bgcolor='#EFEFEF'> 
						<input type='TEXT' name='depto' value='<?php echo $depto; ?>' size='50' maxlength='45'>
					</td>
				</tr><tr> 
					<td width='25%' bgcolor='#F5FCFF' class='itemformulario'>
						Localidad:
					</td>
					<td width='75%' bgcolor='#EFEFEF'> 
						<input type='TEXT' name='localidad' value='<?php echo $localidad; ?>' size='50' maxlength='45'>
					</td>
				</tr><tr> 
					<td width='25%' bgcolor='#F5FCFF' class='itemformulario'>
						Provincia:
					</td>
					<td width='75%' bgcolor='#EFEFEF'> 
						<input type='TEXT' name='provincia' value='<?php echo $provincia; ?>' size='50' maxlength='45'>
					</td>
				</tr><tr> 
					<td width='25%' bgcolor='#F5FCFF' class='itemformulario'>
						CP:
					</td>
					<td width='75%' bgcolor='#EFEFEF'> 
						<input type='TEXT' name='cp' value='<?php echo $cp; ?>' size='50' maxlength='45'>
					</td>
				</tr>

				<tr> 
					<td colspan='2' align='center' bgcolor='#F5FCFF' class='itemformulario'>
						MOVILIDAD:
					</td>
				</tr>
				<tr> 
					<td width='25%' bgcolor='#F5FCFF' class='itemformulario'>
						Disponibilidad Viajar:
					</td>
					<td width='75%' bgcolor='#EFEFEF'> 
						<?php comboc('disponivilidad_viajar','--Disponibilidad Viajar--,Si,No',$conn,'',$disponivilidad_viajar)?>
					</td>
				</tr>


				<tr> 
					<td width='25%' bgcolor='#F5FCFF' class='itemformulario'>
						Posee movilidad propia:
					</td>
					<td width='75%' bgcolor='#EFEFEF'> 
						<?php comboc('movilidad','--Movilidad--,Si,No',$conn,'',$movilidad)?>
					</td>
				</tr>
				<tr> 
					<td width='25%' bgcolor='#F5FCFF' class='itemformulario'>
						Marca:
					</td>
					<td width='75%' bgcolor='#EFEFEF'> 
						<input type='TEXT' name='marca' value='<?php echo $marca; ?>' size='50' maxlength='45'>
					</td>
				</tr><tr> 
					<td width='25%' bgcolor='#F5FCFF' class='itemformulario'>
						Modelo:
					</td>
					<td width='75%' bgcolor='#EFEFEF'> 
						<input type='TEXT' name='modelo' value='<?php echo $modelo; ?>' size='50' maxlength='45'>
					</td>
				</tr><tr> 
					<td width='25%' bgcolor='#F5FCFF' class='itemformulario'>
						Año:
					</td>
					<td width='75%' bgcolor='#EFEFEF'> 
						<input type='TEXT' name='ano' value='<?php echo $ano; ?>' size='50' maxlength='45'>
					</td>
				</tr>
				
				<tr> 
					<td colspan='2' align='center' bgcolor='#F5FCFF' class='itemformulario'>
						FAMILIARES:
					</td>
				</tr>
				<tr> 
					<td width='25%' bgcolor='#F5FCFF' class='itemformulario'>
						Nombre Conyugue:
					</td>
					<td width='75%' bgcolor='#EFEFEF'> 
						<input type='TEXT' name='nombre_conyugue' value='<?php echo $nombre_conyugue; ?>' size='50' maxlength='100'>
					</td>
				</tr><tr> 
					<td width='25%' bgcolor='#F5FCFF' class='itemformulario'>
						Nombre Madre:
					</td>
					<td width='75%' bgcolor='#EFEFEF'> 
						<input type='TEXT' name='nombre_madre' value='<?php echo $nombre_madre; ?>' size='50' maxlength='100'>
					</td>
				</tr><tr> 
					<td width='25%' bgcolor='#F5FCFF' class='itemformulario'>
						Estado Madre:
					</td>
					<td width='75%' bgcolor='#EFEFEF'> 
						<?php comboc('fallecida_madre','--Opciones--,Con vida,Fallecida',$conn,'',$fallecida_madre)?>
					</td>
				</tr><tr> 
					<td width='25%' bgcolor='#F5FCFF' class='itemformulario'>
						Nombre Padre:
					</td>
					<td width='75%' bgcolor='#EFEFEF'> 
						<input type='TEXT' name='nombre_padre' value='<?php echo $nombre_padre; ?>' size='50' maxlength='100'>
					</td>
				</tr><tr> 
					<td width='25%' bgcolor='#F5FCFF' class='itemformulario'>
						Estado Padre:
					</td>
					<td width='75%' bgcolor='#EFEFEF'> 
						<?php comboc('fallecido_padre','--Opciones--,Con vida,Fallecido',$conn,'',$fallecido_padre)?>
					</td>
				</tr>
				
				
				<tr> 
					<td colspan='2' align='center' bgcolor='#F5FCFF' class='itemformulario'>
						ESTUDIOS SECUNDARIOS:
					</td>
				</tr>
				
				<tr> 
					<td width='25%' bgcolor='#F5FCFF' class='itemformulario'>
						Secundario Completo:
					</td>
					<td width='75%' bgcolor='#EFEFEF'> 
						<?php comboc('sec_completo','--Opciones--,No,Si',$conn,'',$sec_completo)?>
					</td>
				</tr><tr> 
					<td width='25%' bgcolor='#F5FCFF' class='itemformulario'>
						Titulo secundario:
					</td>
					<td width='75%' bgcolor='#EFEFEF'> 
						<textarea name='sec_titulo' cols='47' rows='4'><?echo $sec_titulo?></textarea>
					</td>
				</tr>
				<tr> 
					<td width='25%' bgcolor='#F5FCFF' class='itemformulario'>
						Estado:
					</td>
					<td width='75%' bgcolor='#EFEFEF'> 
						<?php comboc('estado','Invisible,Activo',$conn,'',$estado)?>
					</td>
				</tr>				
				</table>
				<br><br>


				<TABLE WIDTH='560' CELLPADDING='2' CELLSPACING='1' BORDER='0' BGCOLOR='#999999'>
				<tr> 
					<td colspan='<?=count($vecn)+1?>' align='center' bgcolor='#F5FCFF' class='itemformulario'>
						Idiomas:
					</td>
				</tr>
					<tr>
						<td bgcolor='#F5FCFF' class='itemformulario'><b>Dominio</b></td>
						<?for($j=0;$j<count($vecn);$j++){?>
						<td bgcolor='#F5FCFF' class='itemformulario'><b><?=$vecn[$j][1]?></b></td>
						<?}?>
					</tr>
					<?for($j=0;$j<count($veci);$j++){
						$vnivel = QueNivel($codigo, 0, $veci[$j][0], $conn);?>
					<tr>
						<td bgcolor='#F5FCFF' class='itemformulario'><b><?=$veci[$j][1]?></b>
						<?if($veci[$j][1]=="Otros"){?><input type="text" name="idiomaotros" value="<?=QueOtros($codigo, 0, $veci[$j][0], $conn)?>" size="20"><?}?>
						</td>
						<?for($k=0;$k<count($vecn);$k++){?>
						<td bgcolor='#F5FCFF' class='itemformulario'>
						<input type="radio" <?if($vnivel==$vecn[$k][0])echo "checked"?> name="idioma<?=$veci[$j][0]?>" value="<?=$vecn[$k][0]?>">
						</td>
						<?}?>
					</tr>
					<?}?>
				</table>
				<br><br>

				<TABLE WIDTH='560' CELLPADDING='2' CELLSPACING='1' BORDER='0' BGCOLOR='#999999'>
				<tr> 
					<td colspan='<?=count($vecn)+1?>' align='center' bgcolor='#F5FCFF' class='itemformulario'>
						Computación:
					</td>
				</tr>
					<tr>
						<td bgcolor='#F5FCFF' class='itemformulario'><b>Manejo</b></td>
						<?for($j=0;$j<count($vecn);$j++){?>
						<td bgcolor='#F5FCFF' class='itemformulario'><b><?=$vecn[$j][1]?></b></td>
						<?}?>
					</tr>
					<?for($j=0;$j<count($vech);$j++){
						$vnivel = QueNivel($codigo, $vech[$j][0], 0, $conn);?>
					<tr>
						<td bgcolor='#F5FCFF' class='itemformulario'><b><?=$vech[$j][1]?></b>
						<?if($vech[$j][1]=="Otros"){?><input type="text" name="herramientaotros" value="<?=QueOtros($codigo, $vech[$j][0], 0, $conn)?>" size="20"><?}?>
						</td>
						<?for($k=0;$k<count($vecn);$k++){?>
						<td bgcolor='#F5FCFF' class='itemformulario'>
						<input type="radio" <?if($vnivel==$vecn[$k][0])echo "checked"?> name="herramienta<?=$vech[$j][0]?>" value="<?=$vecn[$k][0]?>">
						</td>
						<?}?>
					</tr>
					<?}?>
				</table>
				<br><br>

				<TABLE WIDTH='560' CELLPADDING='2' CELLSPACING='1' BORDER='0' BGCOLOR='#999999'>

				<?$j = 0;
				$cons = 'select * from terciarios_x_curriculum where curriculum = '.$codigo;
				$r = mysql_query($cons, $conn);
				while(($rs = mysql_fetch_array($r)) || $j<2){
					if($rs){
						$tcestado=$rs['tcestado'];
						$titulo=$rs['titulo'];
						$inicio=$rs['inicio'];
						$final=$rs['final'];
						$institucion=$rs['institucion'];
						$donde=$rs['donde'];
						$matricula=$rs['matricula'];
						$lugar_mat=$rs['lugar_mat'];
						$localidad_ejer=$rs['localidad_ejer'];
						$fecha_desde=$rs['fecha_desde'];
						$fecha_hasta=$rs['fecha_hasta'];
						$ejerce_profesion=$rs['ejerce_profesion'];
						$numero_matricula=$rs['numero_matricula'];
						$ter_completo=$rs['ter_completo'];

					} else {
						$tcestado = '';
						$titulo='';
						$inicio='';
						$final='';
						$institucion='';
						$donde='';
						$matricula=0;
						$lugar_mat='';
						$localidad_ejer='';
						$fecha_desde='';
						$fecha_hasta='';
						$numero_matricula='';
						$ejerce_profesion=0;
						$ter_completo = 0;
					}?>
				<tr> 
					<td colspan='2' align='center' bgcolor='#F5FCFF' class='itemformulario'>
						TERCIARIO O UNIVERSITARIO (<?=$j+1?>):
					</td>
				</tr>
				<tr> 
					<td width='25%' bgcolor='#F5FCFF' class='itemformulario'>
						Estado:
					</td>
					<td width='75%' bgcolor='#EFEFEF'> 
						<!--<input type='TEXT' name='tcestado<?//=$j?>' value='<?//php echo $tcestado; ?>' size='50' maxlength='45'>-->
						<?php comboc('ter_completo'.$j,'--Opciones--,Cursando,Finalizado',$conn,'',$ter_completo)?>

					</td>
				</tr><tr> 
					<td width='25%' bgcolor='#F5FCFF' class='itemformulario'>
						Titulo:
					</td>
					<td width='75%' bgcolor='#EFEFEF'> 
						<input type='TEXT' name='titulo<?=$j?>' value='<?php echo $titulo; ?>' size='50' maxlength='100'>
					</td>
				</tr><tr> 
					<td width='25%' bgcolor='#F5FCFF' class='itemformulario'>
						Año y Mes de Inicio:
					</td>
					<td width='75%' bgcolor='#EFEFEF'> 
						<input type='TEXT' name='inicio<?=$j?>' value='<?php echo $inicio; ?>' size='50' maxlength='45'>
					</td>
				</tr><tr> 
					<td width='25%' bgcolor='#F5FCFF' class='itemformulario'>
						Año y Mes de Fin:
					</td>
					<td width='75%' bgcolor='#EFEFEF'> 
						<input type='TEXT' name='final<?=$j?>' value='<?php echo $final; ?>' size='50' maxlength='45'>
					</td>
				</tr><tr> 
					<td width='25%' bgcolor='#F5FCFF' class='itemformulario'>
						Institución o Universidad de estudio:
					</td>
					<td width='75%' bgcolor='#EFEFEF'> 
						<input type='TEXT' name='institucion<?=$j?>' value='<?php echo $institucion; ?>' size='50' maxlength='45'>
					</td>
				</tr><tr> 
					<td width='25%' bgcolor='#F5FCFF' class='itemformulario'>
						Ejerce Profesion:
					</td>
					<td width='75%' bgcolor='#EFEFEF'> 
						<?php comboc('ejerce_profesion'.$j,'--Opciones--,No,Independiente,En relacion de dependencia',$conn,'',$ejerce_profesion)?>
					</td>
				</tr>
				
				<tr> 
					<td width='25%' bgcolor='#F5FCFF' class='itemformulario'>
						Donde:
					</td>
					<td width='75%' bgcolor='#EFEFEF'> 
						<input type='TEXT' name='donde<?=$j?>' value='<?php echo $donde; ?>' size='50' maxlength='100'>
					</td>
				</tr><tr> 
					<td width='25%' bgcolor='#F5FCFF' class='itemformulario'>
						Fecha Desde:
					</td>
					<td width='75%' bgcolor='#EFEFEF'> 
						<input type='TEXT' name='fecha_desde<?=$j?>' value='<?php echo $fecha_desde; ?>' size='50' maxlength='50'>
					</td>
				</tr><tr> 
					<td width='25%' bgcolor='#F5FCFF' class='itemformulario'>
						Fecha Hasta:
					</td>
					<td width='75%' bgcolor='#EFEFEF'> 
						<input type='TEXT' name='fecha_hasta<?=$j?>' value='<?php echo $fecha_hasta; ?>' size='50' maxlength='50'>
					</td>
				</tr>
				<tr> 
					<td width='25%' bgcolor='#F5FCFF' class='itemformulario'>
						Posee Matricula:
					</td>
					<td width='75%' bgcolor='#EFEFEF'> 
						<?php comboc('matricula'.$j,'--Opciones--,No,Si',$conn,'',$matricula)?>
					</td>
				</tr><tr> 
					<td width='25%' bgcolor='#F5FCFF' class='itemformulario'>
						Nº de Matricula - Otorgada por:
					</td>
					<td width='75%' bgcolor='#EFEFEF'> 
						<input type='TEXT' name='numero_matricula<?=$j?>' value='<?php echo $numero_matricula; ?>' size='50' maxlength='50'>
					</td>
				</tr>
				<tr> 
					<td width='25%' bgcolor='#F5FCFF' class='itemformulario'>
						Lugar de Matriculación:
					</td>
					<td width='75%' bgcolor='#EFEFEF'> 
						<input type='TEXT' name='lugar_mat<?=$j?>' value='<?php echo $lugar_mat; ?>' size='50' maxlength='100'>
					</td>
				</tr><tr> 
					<td width='25%' bgcolor='#F5FCFF' class='itemformulario'>
						Localidad donde puede ejercer de acuerdo a su matricula:
					</td>
					<td width='75%' bgcolor='#EFEFEF'> 
						<input type='TEXT' name='localidad_ejer<?=$j?>' value='<?php echo $localidad_ejer; ?>' size='50' maxlength='100'>
					</td>
				</tr>

				<?$j++;
				}?>
				</table>
				<br><br>


			





				<TABLE WIDTH='560' CELLPADDING='2' CELLSPACING='1' BORDER='0' BGCOLOR='#999999'>

				<?$j = 0;
				$cons = 'select * from especializaciones_x_curriculum where curriculum = '.$codigo;
				$r = mysql_query($cons, $conn);
				while(($rs = mysql_fetch_array($r)) || $j<2){
					if($rs){
						$ecestado=$rs['ecestado'];
						$ectitulo=$rs['titulo'];
						$ecinicio=$rs['inicio'];
						$ecfinal=$rs['final'];
						$ecinstitucion=$rs['institucion'];
						$esp_completo=$rs['esp_completo'];
					} else {
						$ecestado='';
						$ectitulo='';
						$ecinicio='';
						$ecfinal='';
						$ecinstitucion='';
						$esp_completo = 0;
					}?>
				<tr> 
					<td colspan='2' align='center' bgcolor='#F5FCFF' class='itemformulario'>
						NIVEL DE ESTUDIO MASTER / POSGRADO / ESPECIALIZACIONES (<?=$j+1?>):
					</td>
				</tr>
				<tr> 
					<td width='25%' bgcolor='#F5FCFF' class='itemformulario'>
						Estado:
					</td>
					<td width='75%' bgcolor='#EFEFEF'> 
						<!--<input type='TEXT' name='ecestado<?//=$j?>' value='<?//php echo $ecestado; ?>' size='50' maxlength='45'>-->
						<?php comboc('esp_completo'.$j,'--Opciones--,Cursando,Finalizado',$conn,'',$esp_completo)?>

					</td>
				</tr><tr> 
					<td width='25%' bgcolor='#F5FCFF' class='itemformulario'>
						Titulo:
					</td>
					<td width='75%' bgcolor='#EFEFEF'> 
						<input type='TEXT' name='ectitulo<?=$j?>' value='<?php echo $ectitulo; ?>' size='50' maxlength='100'>
					</td>
				</tr><tr> 
					<td width='25%' bgcolor='#F5FCFF' class='itemformulario'>
						Año de inicio Carrera:
					</td>
					<td width='75%' bgcolor='#EFEFEF'> 
						<input type='TEXT' name='ecinicio<?=$j?>' value='<?php echo $ecinicio; ?>' size='50' maxlength='45'>
					</td>
				</tr><tr> 
					<td width='25%' bgcolor='#F5FCFF' class='itemformulario'>
						Año final:
					</td>
					<td width='75%' bgcolor='#EFEFEF'> 
						<input type='TEXT' name='ecfinal<?=$j?>' value='<?php echo $ecfinal; ?>' size='50' maxlength='45'>
					</td>
				</tr><tr> 
					<td width='25%' bgcolor='#F5FCFF' class='itemformulario'>
						Institución o Universidad de estudio:
					</td>
					<td width='75%' bgcolor='#EFEFEF'> 
						<input type='TEXT' name='ecinstitucion<?=$j?>' value='<?php echo $ecinstitucion; ?>' size='50' maxlength='45'>
					</td>
				</tr>
				
				<?$j++;
				}?>
				</table>
				<br><br>



				
				<TABLE WIDTH='560' CELLPADDING='2' CELLSPACING='1' BORDER='0' BGCOLOR='#999999'>

				<?$j = 0;
				$cons = 'select * from antecedentes_x_curriculum where curriculum = '.$codigo;
				$r = mysql_query($cons, $conn);
				while(($rs = mysql_fetch_array($r)) || $j<5){
					if($rs){
						$curriculum=$rs['curriculum'];
						$empresa=$rs['empresa'];
						$ocupacion=$rs['ocupacion'];
						$domicilio=$rs['domicilio'];
						$ultima_area=$rs['ultima_area'];
						$ingreso=$rs['ingreso'];
						$egreso=$rs['egreso'];
						$puesto=$rs['puesto'];
						$causa_egreso=$rs['causa_egreso'];
						$personal_cargo=$rs['personal_cargo'];
						$tareas=$rs['tareas'];
					} else {
						$empresa='';
						$ocupacion='';
						$domicilio='';
						$ultima_area='';
						$ingreso='';
						$egreso='';
						$puesto='';
						$causa_egreso='';
						$personal_cargo='';
						$tareas='';
					}?>
				<tr> 
					<td colspan='2' align='center' bgcolor='#F5FCFF' class='itemformulario'>
						ANTECEDENTES LABORALES (<?=$j+1?>):
					</td>
				</tr>
				<tr> 
					<td width='25%' bgcolor='#F5FCFF' class='itemformulario'>
						Empresa:
					</td>
					<td width='75%' bgcolor='#EFEFEF'> 
						<input type='TEXT' name='empresa<?=$j?>' value='<?php echo $empresa; ?>' size='50' maxlength='45'>
					</td>
				</tr><tr> 
					<td width='25%' bgcolor='#F5FCFF' class='itemformulario'>
						Ocupacion:
					</td>
					<td width='75%' bgcolor='#EFEFEF'> 
						<textarea name='ocupacion<?=$j?>' cols='47' rows='4'><?echo $ocupacion?></textarea>
					</td>
				</tr><tr> 
					<td width='25%' bgcolor='#F5FCFF' class='itemformulario'>
						Domicilio:
					</td>
					<td width='75%' bgcolor='#EFEFEF'> 
						<input type='TEXT' name='domicilio<?=$j?>' value='<?php echo $domicilio; ?>' size='50' maxlength='100'>
					</td>
				</tr><tr> 
					<td width='25%' bgcolor='#F5FCFF' class='itemformulario'>
						Ultima Area:
					</td>
					<td width='75%' bgcolor='#EFEFEF'> 
						<input type='TEXT' name='ultima_area<?=$j?>' value='<?php echo $ultima_area; ?>' size='50' maxlength='45'>
					</td>
				</tr><tr> 
					<td width='25%' bgcolor='#F5FCFF' class='itemformulario'>
						Mes y Año de ingreso:
					</td>
					<td width='75%' bgcolor='#EFEFEF'> 
						<input type='TEXT' name='ingreso<?=$j?>' value='<?php echo $ingreso; ?>' size='50' maxlength='45'>
					</td>
				</tr><tr> 
					<td width='25%' bgcolor='#F5FCFF' class='itemformulario'>
						Mes y Año de egreso:
					</td>
					<td width='75%' bgcolor='#EFEFEF'> 
						<input type='TEXT' name='egreso<?=$j?>' value='<?php echo $egreso; ?>' size='50' maxlength='45'>
					</td>
				</tr><tr> 
					<td width='25%' bgcolor='#F5FCFF' class='itemformulario'>
						Puesto:
					</td>
					<td width='75%' bgcolor='#EFEFEF'> 
						<input type='TEXT' name='puesto<?=$j?>' value='<?php echo $puesto; ?>' size='50' maxlength='100'>
					</td>
				</tr><tr> 
					<td width='25%' bgcolor='#F5FCFF' class='itemformulario'>
						Causa del egreso:
					</td>
					<td width='75%' bgcolor='#EFEFEF'> 
						<textarea name='causa_egreso<?=$j?>' cols='47' rows='4'><?echo $causa_egreso?></textarea>
					</td>
				</tr><tr> 
					<td width='25%' bgcolor='#F5FCFF' class='itemformulario'>
						Personal a Cargo:
					</td>
					<td width='75%' bgcolor='#EFEFEF'> 
						<input type='TEXT' name='personal_cargo<?=$j?>' value='<?php echo $personal_cargo; ?>' size='50' maxlength='100'>
					</td>
				</tr><tr> 
					<td width='25%' bgcolor='#F5FCFF' class='itemformulario'>
						Tareas realizadas:
					</td>
					<td width='75%' bgcolor='#EFEFEF'> 
						<textarea name='tareas<?=$j?>' cols='47' rows='4'><?echo $tareas?></textarea>
					</td>
				</tr>
				<?$j++;
				}?>
				</table>
				<br><br>















			<TABLE WIDTH='560' CELLPADDING='2' CELLSPACING='1' BORDER='0' BGCOLOR='#999999'>
				<tr bgcolor='EEF2F4' align='center' valign='middle'> 
			<td colspan='2' height='41' width='558'>
				<a href='javascript:validar()'><img src='images/bot_grabar.gif' width='63' height='18' border='0'></a>
			</td>
		</tr>
</form>
</table>
<br>
</TD>
</TR>
</TABLE>
</body>
</html>