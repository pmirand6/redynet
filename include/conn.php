<?ob_start ('ob_gzhandler'); // compresion del output buffer
session_cache_expire(600); // duraci�n de la sesi�n

session_start();

function Conectarse(){
	//TODO CAMBIAR STRING DE CONEXION
 	if (!($conn=mysqli_connect('database','root','jaPKRQpHJFmaXD4j'))){
		echo 'Error conectando a la base de datos.';
		exit();
	}
	if (!mysqli_select_db($conn, 'ftpias')){
		echo 'Error seleccionando la base de datos.';
		exit();
	}
	mysqli_set_charset($conn,"utf8");
	return $conn;
}
$conn=Conectarse();
?>
