<?

function QueOtros($fcurriculum, $fherramienta, $fidioma, $fconn)
{
    $fdev = "";
    if ($fherramienta > 0) $sqlqn = "select otros from niveles_x_herramienta where curriculum = $fcurriculum and herramienta = $fherramienta";
    if ($fidioma > 0) $sqlqn = "select otros from niveles_x_idioma where curriculum = $fcurriculum and idioma = $fidioma";
    $rqn = mysqli_query($fconn, $sqlqn);
    if ($rsqn = mysqli_fetch_array($rqn)) {
        $fdev = $rsqn["otros"];
    }
    return ($fdev);
}

function QueNivel($fcurriculum, $fherramienta, $fidioma, $fconn)
{
    $fdev = 0;
    if ($fherramienta > 0) $sqlqn = "select nivel from niveles_x_herramienta where curriculum = $fcurriculum and herramienta = $fherramienta";
    if ($fidioma > 0) $sqlqn = "select nivel from niveles_x_idioma where curriculum = $fcurriculum and idioma = $fidioma";
    $rqn = mysqli_query($fconn, $sqlqn);
    if ($rsqn = mysqli_fetch_array($rqn)) {
        $fdev = $rsqn["nivel"];
    }
    return ($fdev);
}

//Traigo todos los idiomas
$sqls = "select codigo, nombre from idiomas i where i.estado = 1 order by i.orden";
mysqli_set_charset($conn,"utf8");
$rs = mysqli_query($conn, $sqls);
$pos = 0;
while ($rss = mysqli_fetch_array($rs)) {
    $veci[$pos][0] = $rss["codigo"];
    $veci[$pos][1] = $rss["nombre"];
    $pos++;
}

//Traigo todos las herramientas
$sqls = "select codigo, nombre from herramientas h where h.estado = 1 order by h.orden";
$rs = mysqli_query($conn, $sqls);
$pos = 0;
while ($rss = mysqli_fetch_array($rs)) {
    $vech[$pos][0] = $rss["codigo"];
    $vech[$pos][1] = $rss["nombre"];
    $pos++;
}

//Traigo todos las niveles
$sqls = "select codigo, nombre from niveles n where n.estado = 1 order by n.orden";
$rs = mysqli_query($conn, $sqls);
$pos = 0;
while ($rss = mysqli_fetch_array($rs)) {
    $vecn[$pos][0] = $rss["codigo"];
    $vecn[$pos][1] = $rss["nombre"];
    $pos++;
}


function GetRama($fcategoria, $fconn)
{
    $fvec[0] = $fcategoria;
    $fvece[0] = 0;
    $fposvec = 0;
    $fposvecadd = 0;
    while ($fvece[$fposvec] == 0 && ($fposvec <= (count($fvece) - 1))) {
        $sqlgr = "select * from clasificados_categorias where estado = 1 and padre = " . $fvec[$fposvec];
        $rgr = mysqli_query($fconn, $sqlgr);
        while ($rsgr = mysqli_fetch_array($rgr)) {
            $fposvecadd++;
            $fvec[$fposvecadd] = $rsgr["codigo"];
            $fvece[$fposvecadd] = 0;
        }
        $fvece[$fposvec] = 1;
        $fposvec++;
    }

    $fcant = CuantosAnuncios($fvec[0], $fconn);
    for ($j = 1; $j < (count($fvec)); $j++) {
        $fcant = $fcant + CuantosAnuncios($fvec[$j], $fconn);
    }
    return ($fcant);
}


function CuantosAnuncios($fcategoria, $fconn)
{
    $fcantanuncios = 0;
    $fsqca = "select count(*) as cantidad from clasificados_anuncios where estado = 1 and categoria = $fcategoria";
    $rca = mysqli_query($fconn, $fsqca);
    if ($rsca = mysqli_fetch_array($rca)) {
        $fcantanuncios = $rsca["cantidad"];
    }
    return ($fcantanuncios);
}


function FirstCategory($fcontenido, $fconn)
{
    $fpadre = $fcontenido;
    $fcodigo = 0;
    $cond = "f";
    while ($cond == "f") {
        $sqlur = "select codigo, padre from categorias where codigo = $fpadre";
        $rur = mysqli_query($fconn, $sqlur);
        if ($rsur = mysqli_fetch_array($rur)) {
            $fcodigo = $rsur["codigo"];
            $fpadre = $rsur["padre"];
        } else {
            $cond = "t";
        }
    }
    return ($fcodigo);
}

function ultimarama($fcategoria, $fconn)
{
    $sqlur = "select * from categorias where padre = $fcategoria";
    $rur = mysqli_query($fconn, $sqlur);
    if ($rsur = mysqli_fetch_array($rur)) {
        return (false);
    } else {
        return (true);
    }
}

//Graba en log
function GrabarLog($funcsql, $fusuario, $fconn)
{
    $ftiposql = 0;
    //Levanta el tipo de SQL
    $auxfuncsql = strtolower($funcsql);
    if (substr_count($auxfuncsql, "insert") > 0) $ftiposql = 1;
    if (substr_count($auxfuncsql, "update") > 0) $ftiposql = 2;
    if (substr_count($auxfuncsql, "delete") > 0) $ftiposql = 3;
    if (substr_count($auxfuncsql, "select") > 0) $ftiposql = 4;
    $cons = "insert into logs (tipo,fecha,sql,usuario,host) values ($ftiposql,now(), '" . str_replace("'", "|", $funcsql) . "',$fusuario,'" . $_SERVER["REMOTE_ADDR"] . "')";
    mysqli_query($fconn, $cons) or die(mysqli_error($fconn));
}

function MostrarHTML($fhtml, $fconn)
{
    //Levanta la cantidad de imagenes [-imagen16-]
    $vcantimg = substr_count(strtolower($fhtml), '[-imagen');
    //Levanta la cantidad de archivos [-archivo5-]
    $vcantfile = substr_count(strtolower($fhtml), '[-archivo');
    //Recorre todas las imagenes
    for ($j = 0; $j < $vcantimg; $j++) {
        $posi = strpos($fhtml, "[-imagen");
        $posf = strpos($fhtml, "-]");
        $codint = substr($fhtml, $posi + 8, $posf - $posi - 8);
        //Trae el url de la imagen
        $sqlimg = "select ruta from allimg where codigo = $codint";
        $rimg = mysqli_query($fconn, $sqlimg);
        if ($rsimg = mysqli_fetch_array($rimg)) {
            $imgcambio = $rsimg["ruta"];
        }
        if ($imgcambio != "") {
            $fhtml = str_replace("[-imagen" . $codint . "-]", "<img border='0' src='uploads/allimg/$imgcambio'>", $fhtml);
        } else {
            $fhtml = str_replace("[-imagen" . $codint . "-]", "", $fhtml);
        }
    }
    //Recorre todos los archivos
    for ($j = 0; $j < $vcantfile; $j++) {
        $posi = strpos($fhtml, "[-archivo");
        $posf = strpos($fhtml, "-]");
        $codint = substr($fhtml, $posi + 9, $posf - $posi - 9);
        //Trae el url de la imagen
        $sqlfile = "select nombre, ruta from allimg where codigo = $codint";
        $rfile = mysqli_query($fconn, $sqlfile);
        if ($rsfile = mysqli_fetch_array($rfile)) {
            $filecambio = $rsfile["ruta"];
            $fnombrelink = $rsfile["nombre"];
        }
        if ($filecambio != "") {
            $fhtml = str_replace("[-archivo" . $codint . "-]", "<a href='uploads/allimg/$filecambio' target='_blank'>$fnombrelink</a>", $fhtml);
        } else {
            $fhtml = str_replace("[-archivo" . $codint . "-]", "", $fhtml);
        }
    }
    return ($fhtml);
}


//Desencripta datos
function DesEncriptarDatos($data)
{
    $key = "encriptarelcolicontjal";
    $newkeyx = "";
    $newkey = "";
    $key = md5($key);
    $x = 0;
    for ($i = 0; $i < strlen($data); $i++) {
        if ($x == strlen($key)) $x = 0;
        $newkey .= substr($key, $x, 1);
        $x++;
    }
    for ($i = 0; $i < strlen($data); $i++) {
        if (ord(substr($data, $i, 1)) < ord(substr($newkey, $i, 1))) {
            $newkeyx .= chr((ord(substr($data, $i, 1)) + 256) - ord(substr($newkey, $i, 1)));
        } else {
            $newkeyx .= chr(ord(substr($data, $i, 1)) - ord(substr($newkey, $i, 1)));
        }
    }
    return base64_decode($newkeyx);
}

function EncriptarDatos($data)
{
    $key = "encriptarelcolicontjal";
    $newkey = "";
    $newkeyx = "";
    $key = md5($key);
    $data = base64_encode($data);
    $x = 0;
    for ($i = 0; $i < strlen($data); $i++) {
        if ($x == strlen($key)) $x = 0;
        $newkey .= substr($key, $x, 1);
        $x++;
    }
    for ($i = 0; $i < strlen($data); $i++) {
        $newkeyx .= chr(ord(substr($data, $i, 1)) + (ord(substr($newkey, $i, 1))) % 256);
    }
    return $newkeyx;
}

function getcodigounico($fconn)
{
    $festa = 0;
    $facceptedChars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $fmax = 25;

    do {
        $fcode1 = null;
        //Genera la cadena
        for ($fi = 0; $fi < 20; $fi++) {
            $fcode1 .= $facceptedChars[mt_rand(0, $fmax)];
        }

        //Se fija que no este en la base
        $fsql = "select * from unicos where valor = '" . $fcode1 . "'";
        $frcont = mysqli_query($fconn, $fsql);
		if ($frscont = mysqli_fetch_array($frcont)) {
            $festa = 0;
        } else {
            $festa = 1;
        }
	
	} while ($festa < 1);

    $fsql = "Insert into unicos (valor) values ('" . $fcode1 . "')";
    mysqli_query($fconn, $fsql);

    return ($fcode1);
}


function SendMailSeguro($femailf, $femailfn, $femailt, $ftitle, $fcontenido, $fsmtpserver, $fsmtpuser, $fsmtppassword)
{
    require_once("smtp.class.inc");
    $mail = new SMTP($fsmtpserver, $fsmtpuser, $fsmtppassword);
    $header = $mail->make_header($femailf, $femailt, $ftitle, 3, "", "");
    $header .= "Reply-To: " . $femailf . " \r\n";
    $header .= "Content-Type: text/plain; charset=\"iso-8859-1\" \r\n";
    $header .= "Content-Transfer-Encoding: 8bit \r\n";
    $header .= "MIME-Version: 1.0 \r\n";
    $error = $mail->smtp_send($femailf, $femailt, $header, $fcontenido, "", "");
}


function MostrarBanner($fruta, $falto, $fancho)
{
    $prefijobanner = "uploads/banners/";
    $fret = "";
    $ftipobanner = 1;
    if (substr_count($fruta, ".swf") > 0) $ftipobanner = 2;
    //Si es imagen
    if ($ftipobanner == 1) {
        $fret = "<img src='" . $prefijobanner . $fruta . "' border='0'";
        if ($falto != 0 && $falto != "") $fret .= " height='" . $falto . "' ";
        if ($fancho != 0 && $fancho != "") $fret .= " width='" . $fancho . "' ";
        $fret .= " />";
    }
    //Si es swf
    if ($ftipobanner == 2) {
        $fret = "<object classid='clsid:d27cdb6e-ae6d-11cf-96b8-444553540000' codebase='http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,0,0'";
        if ($falto != 0 && $falto != "") $fret .= " height='" . $falto . "' ";
        if ($fancho != 0 && $fancho != "") $fret .= " width='" . $fancho . "' ";
        $fret .= "id='bannerlocal' align='middle'>";
        $fret .= "<param name='allowScriptAccess' value='sameDomain' />
		<param name='movie' value='" . $prefijobanner . $fruta . "' />
		<param name='quality' value='high' />
		<embed src='" . $prefijobanner . $fruta . "' quality='high' name='bannerlocal'";
        if ($falto != 0 && $falto != "") $fret .= " height='" . $falto . "' ";
        if ($fancho != 0 && $fancho != "") $fret .= " width='" . $fancho . "' ";
        $fret .= " align='middle' allowScriptAccess='sameDomain' type='application/x-shockwave-flash' pluginspage='http://www.macromedia.com/go/getflashplayer'/>
		</object>";
    }
    return ($fret);
}

?>
