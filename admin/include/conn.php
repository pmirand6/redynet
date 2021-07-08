<?ob_start ('ob_gzhandler'); // compresion del output buffer
session_cache_expire(600); // duración de la sesión

session_start();

function Conectarse(){
 	if (!($conn=mysql_connect('localhost','ftpias','jaPKRQpHJFmaXD4j'))){
		echo 'Error conectando a la base de datos.';
		exit();
	}
	if (!mysql_select_db('ftpias',$conn)){
		echo 'Error seleccionando la base de datos.';
		exit();
	}
	return $conn;
}
$conn=Conectarse();
?>
