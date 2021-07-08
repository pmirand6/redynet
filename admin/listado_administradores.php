<?
require_once('include/conn.php');
require_once('include/seguridad.php');


$where_clause = " WHERE 1=1 ";

$cons = "SELECT a.* FROM administradores a $where_clause";
$r1 = mysqli_query($conn, $cons);
$r2 = mysqli_query($conn, $cons);
?>

<html>
<head>
    <title>Redynet IAS | Control Panel</title>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
    <link rel="stylesheet" href="include/estilos.css" type="text/css">
    <SCRIPT LANGUAGE=JAVASCRIPT>
        function verify() {
            msg = "�Est� seguro que desea eliminar?.\n";
            return confirm(msg);
        }
    </SCRIPT>
</head>
<body bgcolor="#FFFFFF" leftmargin="0" topmargin="0" text="#000000" link="#000000" vlink="#666666" alink="#999999"
      marginwidth="0" marginheight="0">

<table width="750" border="0" cellspacing="0" cellpadding="0" height="300">
    <tr>
        <td width="140" valign="top" background="images/fondo_cuerpo.gif">
            <?php require_once('include/naveg.php'); ?>
        </td>
        <td align="center" valign="top" width="20" background="images/fondo_cuerpo.gif"></td>
        <td valign="top" width="560" background="images/fondo_cuerpo.gif">

            <span class=titulo>Listado de Administradores</span><br><br>

            <table width="560" border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td valign="center">
                        <a href="modificar_administradores.php"><img src="images/bot_alta.gif" border="0"
                                                                     vspace="3"></a>
                    </td>
                </tr>
            </table>

            <table width="560" border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td valign="bottom" bgcolor="#FFFFFF"><img src="images/tit_listados.gif" width="560" height="19">
                    </td>
                </tr>
            </table>
            <?php if ($rs = mysqli_fetch_array($r1)) { ?>
                <table width="560" border="0" cellspacing="0" cellpadding="1">
                    <tr>
                        <td bgcolor="#999999">
                            <table width="558" border="0" cellspacing="0" cellpadding="0">
                                <tr>

                                    <td width="180" background="images/fondo_tabl.gif" class="textolistado">
                                        <span class="textolistado"><b><font
                                                        color="#999999">&nbsp;Apellido</font></b></span></td>
                                    <td width="1" bgcolor="#999999"><img src="images/1x1.gif" width="1" height="1"></td>

                                    <td width="180" background="images/fondo_tabl.gif" class="textolistado">
                                        <span class="textolistado"><b><font
                                                        color="#999999">&nbsp;Nombre</font></b></span></td>
                                    <td width="1" bgcolor="#999999"><img src="images/1x1.gif" width="1" height="1"></td>

                                    <td width="70" background="images/fondo_tabl.gif" class="textolistado">
                                        <span class="textolistado"><b><font
                                                        color="#999999">&nbsp;Estado</font></b></span></td>
                                    <td width="1" bgcolor="#999999"><img src="images/1x1.gif" width="1" height="1"></td>

                                    <td width="51" background="images/fondo_tabl_borrar.gif"><img
                                                src="images/tit_borrar.gif" width="51" height="17"></td>

                                </tr>
                                <?
                                $pijama = 1;


                                while ($rs = mysqli_fetch_array($r2)) {
                                    $pijama = $pijama * (-1)
                                    ?>
                                    <tr height="20">

                                        <td style="padding: 5px" class="textolistado" height="20"
                                            bgcolor="<?php if ($pijama < 1) { ?>#ffffff<?php } else { ?>#f7f7f7<?php } ?>">
                                            <a href="modificar_administradores.php?codigo=<?php echo $rs["codigo"] ?>&"
                                               class="textolistado"><?php echo $rs["apellido"] ?>
                                            </a></td>
                                        <td width="1" bgcolor="#999999" height="20"></td>

                                        <td style="padding: 5px" class="textolistado" height="20"
                                            bgcolor="<?php if ($pijama < 1) { ?>#ffffff<?php } else { ?>#f7f7f7<?php } ?>">
                                            <a href="modificar_administradores.php?codigo=<?php echo $rs["codigo"] ?>&"
                                               class="textolistado"><?php echo $rs["nombre"] ?>
                                            </a></td>
                                        <td width="1" bgcolor="#999999" height="20"></td>

                                        <td style="padding: 5px" class="textolistado" height="20"
                                            bgcolor="<?php if ($pijama < 1) { ?>#ffffff<?php } else { ?>#f7f7f7<?php } ?>">
                                            <a href="set_administradores_activo.php?codigo=<?php echo $rs["codigo"] ?>&activo=<?php echo $rs["estado"] ?>"
                                               class="textolistado"><?php if ($rs["estado"] == 0) {
                                                    echo "Invisible";
                                                } else {
                                                    echo "Activo";
                                                } ?>
                                            </a></td>
                                        <td width="1" bgcolor="#999999" height="20"></td>

                                        <td width="51" align="center" height="20"
                                            bgcolor="<?php if ($pijama < 0) { ?>#ffffff<?php } else { ?>#f7f7f7<?php } ?>">
                                            <a href="borrar_administradores.php?codigo=<?php echo $rs["codigo"] ?>"
                                               onclick="return verify();"><img src="images/ico_borrar.gif" width="12"
                                                                               height="12" border="0"></a></td>

                                    </tr>
                                <?php } ?>
                            </table>
                        </td>
                    </tr>
                </table>
            <?php } else { ?>

                <table width="560" border="0" cellspacing="1" cellpadding="0">
                    <tr>
                        <td align="center" height="50"><FONT class="path">No hay elementos</FONT></td>
                    </tr>
                </table>

            <?php } ?>

            <br>


        </td>
    </tr>
</table>


<!--#include file="include/footer.htm" -->

<!-- #Include file="include/conn_close.asp" -->

