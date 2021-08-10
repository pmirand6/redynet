<? require_once('include/conn.php');
require_once('include/funciones.php');

$codigo = $_GET['codigo'];
if (isset($_POST['apellido'])) $apellido = $_POST['apellido'];
if (isset($_POST['nombre'])) $nombre = $_POST['nombre'];
if (isset($_POST['tipo_doc'])) $tipo_doc = $_POST['tipo_doc'];
if (isset($_POST['documento'])) $documento = $_POST['documento'];
if (isset($_POST['sexo'])) $sexo = $_POST['sexo'];
if (isset($_POST['nacionalidad'])) $nacionalidad = $_POST['nacionalidad'];
if (isset($_POST['cuilcuit'])) $cuilcuit = $_POST['cuilcuit'];
if (isset($_POST['ccnumero'])) $ccnumero = $_POST['ccnumero'];
if (isset($_POST['fecha_nac'])) $fecha_nac = $_POST['fecha_nac'];
if (isset($_POST['lugar_nac'])) $lugar_nac = $_POST['lugar_nac'];
if (isset($_POST['edad'])) $edad = $_POST['edad'];
if (isset($_POST['estado_civil'])) $estado_civil = $_POST['estado_civil'];
if (isset($_POST['calle'])) $calle = $_POST['calle'];
if (isset($_POST['numero'])) $numero = $_POST['numero'];
if (isset($_POST['piso'])) $piso = $_POST['piso'];
if (isset($_POST['depto'])) $depto = $_POST['depto'];
if (isset($_POST['localidad'])) $localidad = $_POST['localidad'];
if (isset($_POST['provincia'])) $provincia = $_POST['provincia'];
if (isset($_POST['cp'])) $cp = $_POST['cp'];
if (isset($_POST['email'])) $email = $_POST['email'];
if (isset($_POST['telefono'])) $telefono = $_POST['telefono'];
if (isset($_POST['celular'])) $celular = $_POST['celular'];
if (isset($_POST['marca'])) $marca = $_POST['marca'];
if (isset($_POST['modelo'])) $modelo = $_POST['modelo'];
if (isset($_POST['ano'])) $ano = $_POST['ano'];
if (isset($_POST['estado'])) $estado = $_POST['estado'];
if (isset($_POST['usuario'])) $usuario = $_POST['usuario'];
if (isset($_POST['clave'])) $clave = $_POST['clave'];
if (isset($_POST['nombre_conyugue'])) $nombre_conyugue = $_POST['nombre_conyugue'];
if (isset($_POST['nombre_madre'])) $nombre_madre = $_POST['nombre_madre'];
if (isset($_POST['nombre_padre'])) $nombre_padre = $_POST['nombre_padre'];
if (isset($_POST['fallecida_madre'])) $fallecida_madre = $_POST['fallecida_madre'];
if (isset($_POST['fallecido_padre'])) $fallecido_padre = $_POST['fallecido_padre'];
if (isset($_POST['movilidad'])) $movilidad = $_POST['movilidad'];
if (isset($_POST['disponivilidad_viajar'])) $disponivilidad_viajar = $_POST['disponivilidad_viajar'];
if (isset($_POST['sec_completo'])) $sec_completo = $_POST['sec_completo'];
if (isset($_POST['sec_titulo'])) $sec_titulo = $_POST['sec_titulo'];
if (isset($_POST['tipo_contrato'])) $tipo_contrato = $_POST['tipo_contrato'];

if ($codigo <> 0) {
    $cons = "update curriculums set  apellido = '$apellido',  nombre = '$nombre', tipo_contrato = '$tipo_contrato', tipo_doc = '$tipo_doc',  documento = '$documento',  sexo = '$sexo',  nacionalidad = '$nacionalidad',  cuilcuit = '$cuilcuit',  ccnumero = '$ccnumero',  fecha_nac = '$fecha_nac',  lugar_nac = '$lugar_nac',  edad = '$edad',  estado_civil = '$estado_civil',  calle = '$calle',  numero = '$numero',  piso = '$piso',  depto = '$depto',  localidad = '$localidad',  provincia = '$provincia',  cp = '$cp',  email = '$email',  telefono = '$telefono',  celular = '$celular',  marca = '$marca',  modelo = '$modelo',  ano = '$ano',  estado = '$estado',  usuario = '$usuario',  clave = '$clave',  nombre_conyugue = '$nombre_conyugue',  nombre_madre = '$nombre_madre',  nombre_padre = '$nombre_padre',  fallecida_madre = '$fallecida_madre',  fallecido_padre = '$fallecido_padre',  movilidad = '$movilidad',  disponivilidad_viajar = '$disponivilidad_viajar', sec_completo = '$sec_completo',  sec_titulo = '$sec_titulo' where codigo =" . $codigo;
    mysqli_query($conn, $cons) or die(mysqli_error($conn));
} else {
    $cons = "insert into curriculums ( apellido,  nombre,  tipo_contrato, tipo_doc,  documento,  sexo,  nacionalidad,  cuilcuit,  ccnumero,  fecha_nac,  lugar_nac,  edad,  estado_civil,  calle,  numero,  piso,  depto,  localidad,  provincia,  cp,  email,  telefono,  celular,  marca,  modelo,  ano,  estado,  usuario,  clave,  nombre_conyugue,  nombre_madre,  nombre_padre,  fallecida_madre,  fallecido_padre,  movilidad,  disponivilidad_viajar, sec_completo,  sec_titulo ) values (  '$apellido',  '$nombre', '$tipo_contrato',  '$tipo_doc',  '$documento',  '$sexo',  '$nacionalidad',  '$cuilcuit',  '$ccnumero',  '$fecha_nac',  '$lugar_nac',  '$edad',  '$estado_civil',  '$calle',  '$numero',  '$piso',  '$depto',  '$localidad',  '$provincia',  '$cp',  '$email',  '$telefono',  '$celular',  '$marca',  '$modelo',  '$ano',  '$estado',  '$usuario',  '$clave',  '$nombre_conyugue',  '$nombre_madre',  '$nombre_padre',  '$fallecida_madre',  '$fallecido_padre',  '$movilidad',  '$disponivilidad_viajar', '$sec_completo',  '$sec_titulo' )";
    mysqli_query($conn, $cons) or die(mysqli_error($conn));
    $codigo = mysqli_insert_id($conn);
}


//Antecedentes
$cons = "delete from antecedentes_x_curriculum where curriculum = $codigo";
mysqli_query($conn, $cons) or die(mysqli_error($conn));

for ($j = 0; $j < 5; $j++) {
    if (isset($_POST['empresa' . $j])) $empresa = $_POST['empresa' . $j];
    if (isset($_POST['ocupacion' . $j])) $ocupacion = $_POST['ocupacion' . $j];
    if (isset($_POST['domicilio' . $j])) $domicilio = $_POST['domicilio' . $j];
    if (isset($_POST['ultima_area' . $j])) $ultima_area = $_POST['ultima_area' . $j];
    if (isset($_POST['ingreso' . $j])) $ingreso = $_POST['ingreso' . $j];
    if (isset($_POST['egreso' . $j])) $egreso = $_POST['egreso' . $j];
    if (isset($_POST['puesto' . $j])) $puesto = $_POST['puesto' . $j];
    if (isset($_POST['causa_egreso' . $j])) $causa_egreso = $_POST['causa_egreso' . $j];
    if (isset($_POST['personal_cargo' . $j])) $personal_cargo = $_POST['personal_cargo' . $j];
    if (isset($_POST['tareas' . $j])) $tareas = $_POST['tareas' . $j];
    if ($empresa != "" || $ocupacion != "" || $tareas != "") {
        $cons = "insert into antecedentes_x_curriculum ( curriculum,  empresa,  ocupacion,  domicilio,  ultima_area,  ingreso,  egreso,  puesto,  causa_egreso,  personal_cargo,  tareas ) values (  '$codigo',  '$empresa',  '$ocupacion',  '$domicilio',  '$ultima_area',  '$ingreso',  '$egreso',  '$puesto',  '$causa_egreso',  '$personal_cargo',  '$tareas' )";
        mysqli_query($conn, $cons) or die(mysqli_error($conn));
    }
}

//Idiomas
$cons = "delete from niveles_x_idioma where curriculum = $codigo";
mysqli_query($conn, $cons) or die(mysqli_error($conn));

for ($j = 0; $j < count($veci); $j++) {
    $nivel = 0;
    $otros = "";
    if (isset($_POST['idioma' . $veci[$j][0]])) $nivel = $_POST['idioma' . $veci[$j][0]];
    if ($veci[$j][1] == "Otros") {
        $otros = $_POST["idiomaotros"];
    }
    if ($nivel > 0) {
        $cons = "insert into niveles_x_idioma ( curriculum,  nivel, idioma, otros) values (  '$codigo',  '$nivel',  '" . $veci[$j][0] . "',  '$otros' )";
        mysqli_query($conn, $cons) or die(mysqli_error($conn));
    }
}


//Idiomas
$cons = "delete from niveles_x_herramienta where curriculum = $codigo";
mysqli_query($conn, $cons) or die(mysqli_error($conn));

for ($j = 0; $j < count($vech); $j++) {
    $nivel = 0;
    $otros = "";
    if (isset($_POST['herramienta' . $vech[$j][0]])) $nivel = $_POST['herramienta' . $vech[$j][0]];
    if ($vech[$j][1] == "Otros") {
        $otros = $_POST["herramientaotros"];
    }
    if ($nivel > 0) {
        $cons = "insert into niveles_x_herramienta ( curriculum,  nivel, herramienta, otros) values (  '$codigo',  '$nivel',  '" . $vech[$j][0] . "',  '$otros' )";
        mysqli_query($conn, $cons) or die(mysqli_error($conn));
    }
}


//Terciarios
$cons = "delete from terciarios_x_curriculum where curriculum = $codigo";
mysqli_query($conn, $cons) or die(mysqli_error($conn));

for ($j = 0; $j < 2; $j++) {
    //if(isset($_POST['tcestado'.$j]))$tcestado=$_POST['tcestado'.$j];
    if (isset($_POST['ter_completo' . $j])) $ter_completo = $_POST['ter_completo' . $j];
    if (isset($_POST['titulo' . $j])) $titulo = $_POST['titulo' . $j];
    if (isset($_POST['inicio' . $j])) $inicio = $_POST['inicio' . $j];
    if (isset($_POST['final' . $j])) $final = $_POST['final' . $j];
    if (isset($_POST['institucion' . $j])) $institucion = $_POST['institucion' . $j];
    if (isset($_POST['donde' . $j])) $donde = $_POST['donde' . $j];
    if (isset($_POST['matricula' . $j])) $matricula = $_POST['matricula' . $j];
    if (isset($_POST['lugar_mat' . $j])) $lugar_mat = $_POST['lugar_mat' . $j];
    if (isset($_POST['localidad_ejer' . $j])) $localidad_ejer = $_POST['localidad_ejer' . $j];
    if (isset($_POST['fecha_desde' . $j])) $fecha_desde = $_POST['fecha_desde' . $j];
    if (isset($_POST['fecha_hasta' . $j])) $fecha_hasta = $_POST['fecha_hasta' . $j];
    if (isset($_POST['ejerce_profesion' . $j])) $ejerce_profesion = $_POST['ejerce_profesion' . $j];
    if (isset($_POST['numero_matricula' . $j])) $numero_matricula = $_POST['numero_matricula' . $j];
    if ($titulo != "" || $inicio != "" || $institucion != "") {
        $cons = "insert into terciarios_x_curriculum ( curriculum,  ter_completo,  titulo,  inicio,  final,  institucion,  donde,  matricula,  numero_matricula, lugar_mat,  localidad_ejer,  fecha_desde,  fecha_hasta,  ejerce_profesion ) values (  '$codigo',  '$ter_completo',  '$titulo',  '$inicio',  '$final',  '$institucion',  '$donde',  '$matricula', '$numero_matricula',  '$lugar_mat',  '$localidad_ejer',  '$fecha_desde',  '$fecha_hasta',  '$ejerce_profesion' )";
        mysqli_query($conn, $cons) or die(mysqli_error($conn));
    }
}

//Posgrado
$cons = "delete from especializaciones_x_curriculum where curriculum = $codigo";
mysqli_query($conn, $cons) or die(mysqli_error($conn));

for ($j = 0; $j < 2; $j++) {
    //if(isset($_POST['ecestado'.$j]))$ecestado=$_POST['ecestado'.$j];
    if (isset($_POST['esp_completo' . $j])) $esp_completo = $_POST['esp_completo' . $j];
    if (isset($_POST['ectitulo' . $j])) $ectitulo = $_POST['ectitulo' . $j];
    if (isset($_POST['ecinicio' . $j])) $ecinicio = $_POST['ecinicio' . $j];
    if (isset($_POST['ecfinal' . $j])) $ecfinal = $_POST['ecfinal' . $j];
    if (isset($_POST['ecinstitucion' . $j])) $ecinstitucion = $_POST['ecinstitucion' . $j];
    if ($ectitulo != "" || $ecinstitucion != "") {
        $cons = "insert into especializaciones_x_curriculum ( curriculum,  esp_completo,  titulo,  inicio,  final,  institucion ) values (  '$codigo',  '$esp_completo',  '$ectitulo',  '$ecinicio',  '$ecfinal',  '$ecinstitucion' )";
        mysqli_query($conn, $cons) or die(mysqli_error($conn));
    }
}
header('location: listado_curriculums.php');
?>