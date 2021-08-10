<?require_once('include/conn.php');
conectarse();
$codigo = $_GET['codigo']; 

$cons = 'update curriculums set estado = 2 where codigo = '.$codigo;
mysqli_query($conn, $cons) or die(mysqli_error($conn));

header ('location: listado_curriculums.php');
?>