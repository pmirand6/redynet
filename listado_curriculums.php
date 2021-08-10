<? require_once('include/conn.php');
require_once('include/combo.php');
require_once('include/funciones.php');

conectarse();

$bus_ter_completo = 0;
$bus_esp_completo = 0;

$bus_provincia = "";
if (isset($_POST["bus_provincia"])) $bus_provincia = $_POST["bus_provincia"];

$bus_edadd = 0;
if (isset($_POST["bus_edadd"])) $bus_edadd = $_POST["bus_edadd"];
$bus_edadh = 0;
if (isset($_POST["bus_edadh"])) $bus_edadh = $_POST["bus_edadh"];


$bus_localidad = "";
if (isset($_POST["bus_localidad"])) $bus_localidad = $_POST["bus_localidad"];

$bus_estado_civil = "";
if (isset($_POST["bus_estado_civil"])) $bus_estado_civil = $_POST["bus_estado_civil"];


$bus_sexo = "";
if (isset($_POST["bus_sexo"])) $bus_sexo = $_POST["bus_sexo"];

$bus_movilidad = 0;
if (isset($_POST["bus_movilidad"])) $bus_movilidad = $_POST["bus_movilidad"];


$bus_tipo_contrato = 0;
if (isset($_POST["bus_tipo_contrato"])) $bus_tipo_contrato = $_POST["bus_tipo_contrato"];

$bus_cuilcuit = 0;
if (isset($_POST["bus_cuilcuit"])) $bus_cuilcuit = $_POST["bus_cuilcuit"];


$bus_celular = 0;
if (isset($_POST["bus_celular"])) $bus_celular = $_POST["bus_celular"];

$bus_especializaciones = 0;
if (isset($_POST["bus_especializaciones"])) $bus_especializaciones = $_POST["bus_especializaciones"];
$bus_esp_completo = 0;
if (isset($_POST["bus_esp_completo"])) $bus_esp_completo = $_POST["bus_esp_completo"];


$bus_terciarios = 0;
if (isset($_POST["bus_terciarios"])) $bus_terciarios = $_POST["bus_terciarios"];
$bus_ter_completo = 0;
if (isset($_POST["bus_ter_completo"])) $bus_ter_completo = $_POST["bus_ter_completo"];


$bus_disponivilidad_viajar = 0;
if (isset($_POST["bus_disponivilidad_viajar"])) $bus_disponivilidad_viajar = $_POST["bus_disponivilidad_viajar"];

$bus_antecedentes_x_curriculum = 0;
if (isset($_POST["bus_antecedentes_x_curriculum"])) $bus_antecedentes_x_curriculum = $_POST["bus_antecedentes_x_curriculum"];

$where_clause = "";
$inner_clause = "";

if ($bus_provincia != "") {
    $where_clause .= " and c.provincia like '%" . $bus_provincia . "%' ";
}
if ($bus_edadd != "") {
    $where_clause .= " and c.edad >= $bus_edadd ";
}
if ($bus_edadh != "") {
    $where_clause .= " and c.edad <= $bus_edadh ";
}


if ($bus_localidad != "") {
    $where_clause .= " and c.localidad like '%" . $bus_localidad . "%' ";
}

if ($bus_estado_civil != "") {
    $where_clause .= " and c.estado_civil like '%" . $bus_estado_civil . "%' ";
}


if ($bus_sexo != "0") {
    $where_clause .= " and c.sexo = '" . $bus_sexo . "' ";
}
if ($bus_disponivilidad_viajar != "0") {
    $where_clause .= " and c.disponivilidad_viajar = '" . $bus_disponivilidad_viajar . "' ";
}


if ($bus_movilidad != "0") {
    $where_clause .= " and c.movilidad = '" . $bus_movilidad . "' ";
}


if ($bus_antecedentes_x_curriculum == 1) {
    $inner_clause .= " inner join antecedentes_x_curriculum ac on ac.curriculum = c.codigo ";
}


if ($bus_tipo_contrato != "0") {
    $where_clause .= " and c.tipo_contrato = '" . $bus_tipo_contrato . "' ";
}

if ($bus_cuilcuit != "0") {
    $where_clause .= " and c.cuilcuit = '" . $bus_cuilcuit . "' ";
}


if ($bus_celular == "1") {
    $where_clause .= " and c.celular != '' ";
}
if ($bus_celular == "2") {
    $where_clause .= " and c.celular = '' ";
}
//Si tiene que tener nivel
if ($bus_especializaciones == "1") {
    $inner_clause .= " inner join especializaciones_x_curriculum ec on ec.curriculum = c.codigo ";
    if ($bus_esp_completo > 0) $where_clause .= " and ec.esp_completo = '$bus_esp_completo' ";
}


//Si tiene que tener nivel
if ($bus_terciarios == "1") {
    $inner_clause .= " inner join terciarios_x_curriculum tc on tc.curriculum = c.codigo ";
    if ($bus_ter_completo > 0) $where_clause .= " and tc.ter_completo = '$bus_ter_completo' ";

}

if (isset($_POST["bus_idiomas"])) {
    $inner_clause .= " inner join niveles_x_idioma ni on ni.curriculum = c.codigo ";
    $where_clause .= " and ( 1<>1 ";
    foreach ($_POST["bus_idiomas"] as $value) {
        $where_clause .= " or ni.idioma = '" . $value . "' ";
    }
    $where_clause .= " ) ";
}

if (isset($_POST["bus_herramientas"])) {
    $inner_clause .= " inner join niveles_x_herramienta nh on nh.curriculum = c.codigo ";
    $where_clause .= " and ( 1<>1 ";
    foreach ($_POST["bus_herramientas"] as $value) {
        $where_clause .= " or nh.herramienta = '" . $value . "' ";
    }
    $where_clause .= " ) ";
}


$cons = 'SELECT distinct c.* FROM curriculums c ' . $inner_clause . ' where c.estado < 2 ' . $where_clause;
$r1 = mysqli_query($conn, $cons);
$r2 = mysqli_query($conn, $cons);

?>

<html>
<head>
    <title>Redynet IAS | Control Panel</title>
    <meta http-equiv='Content-Type' content='text/html; charset=iso-8859-1'>
    <link rel='stylesheet' href='include/estilos.css' type='text/css'>
    <SCRIPT LANGUAGE='JAVASCRIPT'>
        function verify() {
            msg = '�Est� seguro que desea eliminar?.';
            return confirm(msg);
        }
    </SCRIPT>
</head>
<body bgcolor='#FFFFFF' leftmargin='0' topmargin=0' text='#000000' link='#000000' vlink='#666666' alink='#999999'
      marginwidth='0' marginheight='0'>
<table width='750' border='0' cellspacing='0' cellpadding='0' height='300'>
    <tr>
        <td width='140' valign='top' background='images/fondo_cuerpo.gif'>
            <? require_once('include/naveg.php'); ?>
        </td>
        <td align='center' valign='top' width='20' background='images/fondo_cuerpo.gif'></td>
        <td valign='top' width='560' background='images/fondo_cuerpo.gif'>
            <span class='titulo'>Listado de curriculums</span><br><br>


            <table width="560" border="0" cellspacing="0" cellpadding="1">
                <tr>
                    <td>


                        <form action="listado_curriculums.php" method="POST" name="frm_buscar">
                            <input type="hidden" name="exportar" value="0">
                            <TABLE WIDTH="560" CELLPADDING="2" CELLSPACING="1" BORDER="0" BGCOLOR="#999999">
                                <tr>
                                    <td width="25%" bgcolor="#F5FCFF" class="itemformulario">Localidad:</td>
                                    <td width="75%" bgcolor="#EFEFEF">
                                        <input type="text" name="bus_localidad" value="<? echo $bus_localidad ?>"
                                               size="40">
                                    </td>
                                </tr>
                                <tr>
                                    <td width="25%" bgcolor="#F5FCFF" class="itemformulario">Provincia:</td>
                                    <td width="75%" bgcolor="#EFEFEF">
                                        <input type="text" name="bus_provincia" value="<? echo $bus_provincia ?>"
                                               size="40">
                                    </td>
                                </tr>
                                <tr>
                                    <td width="25%" bgcolor="#F5FCFF" class="itemformulario">Sexo:</td>
                                    <td width="75%" bgcolor="#EFEFEF">
                                        <?php comboc('bus_sexo', '--Sexo--,Masculino,Femenino', $conn, '', $bus_sexo) ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="25%" bgcolor="#F5FCFF" class="itemformulario">Edad:</td>
                                    <td width="75%" bgcolor="#EFEFEF">
                                        Desde: <select name="bus_edadd">
                                            <option value="">--Desde--</option>
                                            <? for ($j = 10; $j < 90; $j++) { ?>
                                                <option value="<?= $j ?>"><?= $j ?></option>
                                            <? } ?>
                                        </select>
                                        &nbsp;&nbsp;&nbsp;&nbsp;
                                        Hasta: <select name="bus_edadh">
                                            <option value="">--Hasta--</option>
                                            <? for ($j = 10; $j < 90; $j++) { ?>
                                                <option value="<?= $j ?>"><?= $j ?></option>
                                            <? } ?>
                                        </select>
                                    </td>
                                </tr>


                                <tr>
                                    <td width="25%" bgcolor="#F5FCFF" class="itemformulario">Idioma:</td>
                                    <td width="75%" bgcolor="#EFEFEF" class="itemformulario">
                                        <? for ($j = 0; $j < count($veci); $j++) { ?>
                                            <input type="checkbox" name="bus_idiomas[]"
                                                   value="<?= $veci[$j][0] ?>"><?= $veci[$j][1]; ?>
                                            &nbsp;&nbsp;&nbsp;
                                        <? } ?>
                                    </td>
                                </tr>


                                <tr>
                                    <td width="25%" bgcolor="#F5FCFF" class="itemformulario">Herramientas:</td>
                                    <td width="75%" bgcolor="#EFEFEF" class="itemformulario">
                                        <? for ($j = 0; $j < count($vech); $j++) { ?>
                                            <input type="checkbox" name="bus_herramientas[]"
                                                   value="<?= $vech[$j][0] ?>"><?= $vech[$j][1]; ?>
                                            &nbsp;&nbsp;&nbsp;
                                        <? } ?>
                                    </td>
                                </tr>


                                <tr>
                                    <td width="25%" bgcolor="#F5FCFF" class="itemformulario">Tipo Contrato:</td>
                                    <td width="75%" bgcolor="#EFEFEF">
                                        <?php comboc('bus_tipo_contrato', '--Opciones--,Monotributista,Relacion de dependencia', $conn, '', $bus_tipo_contrato) ?>
                                    </td>
                                </tr>


                                <tr>
                                    <td width="25%" bgcolor="#F5FCFF" class="itemformulario">Tipo Contrato:</td>
                                    <td width="75%" bgcolor="#EFEFEF">
                                        <?php comboc('bus_cuilcuit', '--Opciones--,Cuit,Cuil', $conn, '', $bus_cuilcuit) ?>
                                    </td>
                                </tr>


                                <tr>
                                    <td width="25%" bgcolor="#F5FCFF" class="itemformulario">Estado Civil:</td>
                                    <td width="75%" bgcolor="#EFEFEF">
                                        <input type='TEXT' name='bus_estado_civil'
                                               value='<?php echo $bus_estado_civil; ?>' size='50' maxlength='45'>
                                    </td>
                                </tr>


                                <tr>
                                    <td width="25%" bgcolor="#F5FCFF" class="itemformulario">Posee movilidad propia:
                                    </td>
                                    <td width="75%" bgcolor="#EFEFEF">
                                        <?php comboc('bus_movilidad', '--Movilidad--,Si,No', $conn, '', $bus_movilidad) ?>
                                    </td>
                                </tr>


                                <tr>
                                    <td width="25%" bgcolor="#F5FCFF" class="itemformulario">Tiene que tener celular:
                                    </td>
                                    <td width="75%" bgcolor="#EFEFEF">
                                        <?php comboc('bus_celular', '--Celular--,Si,No', $conn, '', $bus_celular) ?>
                                    </td>
                                </tr>

                                <tr>
                                    <td width="25%" bgcolor="#F5FCFF" class="itemformulario">Tiene Nivel de estudios /
                                        Estado:
                                    </td>
                                    <td width="75%" bgcolor="#EFEFEF">
                                        <?php comboc('bus_especializaciones', '--Nivel de estudios--,Si', $conn, '', $bus_especializaciones) ?>
                                        /
                                        <?php comboc('bus_esp_completo', '--Opciones--,Cursando,Finalizado', $conn, '', $bus_esp_completo) ?>

                                    </td>
                                </tr>

                                <tr>
                                    <td width="25%" bgcolor="#F5FCFF" class="itemformulario">Tiene Terciario o
                                        Universitario / Estados:
                                    </td>
                                    <td width="75%" bgcolor="#EFEFEF">
                                        <?php comboc('bus_terciarios', '--Terciario o Universitario--,Si', $conn, '', $bus_terciarios) ?>
                                        /
                                        <?php comboc('bus_ter_completo', '--Opciones--,Cursando,Finalizado', $conn, '', $bus_ter_completo) ?>


                                    </td>
                                </tr>

                                <tr>
                                    <td width="25%" bgcolor="#F5FCFF" class="itemformulario">Tiene Disponibilidad para
                                        viajar:
                                    </td>
                                    <td width="75%" bgcolor="#EFEFEF">
                                        <?php comboc('bus_disponivilidad_viajar', '--Disponibilidad Viajar--,Si,No', $conn, '', $bus_disponivilidad_viajar) ?>
                                    </td>
                                </tr>

                                <tr>
                                    <td width="25%" bgcolor="#F5FCFF" class="itemformulario">Antecedentes Laborales:
                                    </td>
                                    <td width="75%" bgcolor="#EFEFEF">
                                        <?php comboc('bus_antecedentes_x_curriculum', '--Antecedentes Laborales--,Si', $conn, '', $bus_antecedentes_x_curriculum) ?>
                                    </td>
                                </tr>

                                <tr bgcolor="EEF2F4" align="center" valign="middle">
                                    <td colspan="2" height="41" width="558" class="itemformulario">
                                        <a href="#" onclick="document.frm_buscar.submit()">Buscar</a>
                                        &nbsp;&nbsp;&nbsp;
                                        <a href="#"
                                           onclick="document.frm_buscar.exportar.value='1';document.frm_buscar.submit()">Exportar</a>
                                    </td>
                                </tr>

                        </form>

                    </td>
                </tr>
            </table>
            <br>
        </td>
    </tr>
</table>


<table width='560' border='0' cellspacing='0' cellpadding='0'>
    <tr>
        <td valign='center'>
            <a href='modificar_curriculums.php'><img src='images/bot_alta.gif' border='0' vspace='3'></a>
        </td>
    </tr>
</table>
<table width='560' border='0' cellspacing='0' cellpadding='0'>
    <tr>
        <td valign='bottom' bgcolor='#FFFFFF'><img src='images/tit_listados.gif' width='560' height='19'></td>
    </tr>
</table>
<? if ($rs = mysqli_fetch_array($r1)) { ?>
    <table width='560' border='0' cellspacing='0' cellpadding='1'>
        <tr>
            <td bgcolor='#999999'>
                <table width='558' border='0' cellspacing='0' cellpadding='0'>
                    <tr>
                        <td width='180' background='images/fondo_tabl.gif' class='textolistado'>
                            <span class='textolistado'><b><font color='#999999'>&nbsp;codigo</font></b></span>
                        </td>
                        <td width='1' bgcolor='#999999'>
                            <img src='images/1x1.gif' width='1' height='1'>
                        </td>
                        <td width='180' background='images/fondo_tabl.gif' class='textolistado'>
                            <span class='textolistado'><b><font color='#999999'>&nbsp;apellido</font></b></span>
                        </td>
                        <td width='1' bgcolor='#999999'>
                            <img src='images/1x1.gif' width='1' height='1'>
                        </td>
                        <td width='180' background='images/fondo_tabl.gif' class='textolistado'>
                            <span class='textolistado'><b><font color='#999999'>&nbsp;nombre</font></b></span>
                        </td>
                        <td width='1' bgcolor='#999999'>
                            <img src='images/1x1.gif' width='1' height='1'>
                        </td>
                        <td width='180' background='images/fondo_tabl.gif' class='textolistado'>
                            <span class='textolistado'><b><font color='#999999'>&nbsp;edad</font></b></span>
                        </td>
                        <td width='1' bgcolor='#999999'>
                            <img src='images/1x1.gif' width='1' height='1'>
                        </td>
                        <td width='180' background='images/fondo_tabl.gif' class='textolistado'>
                            <span class='textolistado'><b><font color='#999999'>&nbsp;estado</font></b></span>
                        </td>
                        <td width='1' bgcolor='#999999'>
                            <img src='images/1x1.gif' width='1' height='1'>
                        </td>
                        <td width='180' background='images/fondo_tabl.gif' class='textolistado'>
                            <span class='textolistado'><b><font color='#999999'>&nbsp;usuario</font></b></span>
                        </td>
                        <td width='1' bgcolor='#999999'>
                            <img src='images/1x1.gif' width='1' height='1'>
                        </td>
                        <td width='51' background='images/fondo_tabl_borrar.gif'>
                            <img src='images/tit_borrar.gif' width='51' height='17'>
                        </td>
                    </tr>
                    <? $pijama = 1;
                    while ($rs = mysqli_fetch_array($r2)) {
                        $pijama = $pijama * (-1) ?>
                        <tr height='20'>
                            <td style='padding: 5px' class='textolistado' height='20' bgcolor='<? if ($pijama < 1) {
                                ?>#ffffff<? } else {
                                ?>#f7f7f7<? } ?>'>
                                <a href='modificar_curriculums.php?codigo=<? echo strtolower($rs['codigo']) ?>'
                                   class='textolistado'><? echo $rs['codigo'] ?></a>
                            </td>
                            <td width='1' bgcolor='#999999' height='20'></td>
                            <td style='padding: 5px' class='textolistado' height='20' bgcolor='<? if ($pijama < 1) {
                                ?>#ffffff<? } else {
                                ?>#f7f7f7<? } ?>'>
                                <a href='modificar_curriculums.php?codigo=<? echo strtolower($rs['codigo']) ?>'
                                   class='textolistado'><? echo $rs['apellido'] ?></a>
                            </td>
                            <td width='1' bgcolor='#999999' height='20'></td>
                            <td style='padding: 5px' class='textolistado' height='20' bgcolor='<? if ($pijama < 1) {
                                ?>#ffffff<? } else {
                                ?>#f7f7f7<? } ?>'>
                                <a href='modificar_curriculums.php?codigo=<? echo strtolower($rs['codigo']) ?>'
                                   class='textolistado'><? echo $rs['nombre'] ?></a>
                            </td>
                            <td width='1' bgcolor='#999999' height='20'></td>
                            <td style='padding: 5px' class='textolistado' height='20' bgcolor='<? if ($pijama < 1) {
                                ?>#ffffff<? } else {
                                ?>#f7f7f7<? } ?>'>
                                <a href='modificar_curriculums.php?codigo=<? echo strtolower($rs['codigo']) ?>'
                                   class='textolistado'><? echo $rs['edad'] ?></a>
                            </td>
                            <td width='1' bgcolor='#999999' height='20'></td>
                            <td style='padding: 5px' class='textolistado' height='20' bgcolor='<? if ($pijama < 1) {
                                ?>#ffffff<? } else {
                                ?>#f7f7f7<? } ?>'>
                                <a href='set_curriculums_activo.php?codigo=<? echo strtolower($rs['codigo']) ?>&activo=<?php echo $rs['estado'] ?>'
                                   class='textolistado'><? if ($rs['estado'] == 0) {
                                        echo 'Invisible';
                                    } else {
                                        echo 'Activo';
                                    } ?></a>
                            </td>
                            <td width='1' bgcolor='#999999' height='20'></td>
                            <td style='padding: 5px' class='textolistado' height='20' bgcolor='<? if ($pijama < 1) {
                                ?>#ffffff<? } else {
                                ?>#f7f7f7<? } ?>'>
                                <a href='modificar_curriculums.php?codigo=<? echo strtolower($rs['codigo']) ?>'
                                   class='textolistado'><? echo $rs['usuario'] ?></a>
                            </td>
                            <td width='1' bgcolor='#999999' height='20'></td>
                            <td width='51' align='center' height='20' bgcolor='<? if ($pijama < 0) {
                                ?>#ffffff<? } else {
                                ?>#f7f7f7<? } ?>'>
                                <a href='borrar_curriculums.php?codigo=<? echo $rs['codigo'] ?>'
                                   onclick='return verify();'><img src='images/ico_borrar.gif' width='12' height='12'
                                                                   border='0'></a>
                            </td>
                        </tr>
                    <? } ?>
                </table>
            </td>
        </tr>
    </table>
<? } else { ?>
    <table width='560' border='0' cellspacing='1' cellpadding='0'>
        <tr>
            <td align='center' height='50'><FONT class='path'>No hay elementos</FONT></td>
        </tr>
    </table>
<? } ?>
<br>
</td>
</tr>
</table>
</body>
</html>