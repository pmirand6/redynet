<?require_once('include/conn.php');
require_once('include/funciones.php');
//conectarse();

$codigo = $_GET['codigo'];
$activo = $_GET['activo'];

$pasara = 0;

if($activo==0)$pasara = 1;

$cons = "update curriculums set estado = $pasara where codigo = $codigo";
mysql_query($cons,$conn) or die(mysql_error());

header ('location: listado_curriculums.php');
?>