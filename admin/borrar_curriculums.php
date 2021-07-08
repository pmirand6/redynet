<?require_once('include/conn.php');
conectarse();
$codigo = $_GET['codigo']; 

$cons = 'update curriculums set estado = 2 where codigo = '.$codigo;
mysql_query($cons,$conn) or die(mysql_error());

header ('location: listado_curriculums.php');
?>