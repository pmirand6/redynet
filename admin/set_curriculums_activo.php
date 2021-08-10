<?require_once('include/conn.php');
require_once('include/funciones.php');
//conectarse();

$codigo = $_GET['codigo'];
$activo = $_GET['activo'];

$pasara = 0;

if($activo==0)$pasara = 1;

$cons = "update curriculums set estado = $pasara where codigo = $codigo";
mysqli_query($conn, $cons) or die(mysqli_error($conn));

header ('location: listado_curriculums.php');
?>