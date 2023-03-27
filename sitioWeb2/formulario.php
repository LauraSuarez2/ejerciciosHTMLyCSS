<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8"><meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
    <link rel="icon" href="https://www.gijon.es/favicon.png">
    <link rel="stylesheet" href="./estilos/estiloGijon.css">
</head>

<body>
  <h1>Resultado del Formulario</h1>
  <hr>
  <br>
  <p><strong>Datos introducidos por el usuario:</strong></p>
  <br>

<?php
function recoge($var, $m = "")
{
    $tmp = is_array($m) ? [] : "";
    if (isset($_REQUEST[$var])) {
        if (!is_array($_REQUEST[$var]) && !is_array($m)) {
            $tmp = trim(htmlspecialchars($_REQUEST[$var]));
        } elseif (is_array($_REQUEST[$var]) && is_array($m)) {
            $tmp = $_REQUEST[$var];
            array_walk_recursive($tmp, function (&$valor) {
                $valor = trim(htmlspecialchars($valor));
            });
        }
    }
    return $tmp;
}

$nombre      = recoge("nombre");
$correo      = recoge("correo");
$edad        = recoge("edad");
$opcion      = recoge("opcion");
$punt        = recoge("punt");
$comentario  = recoge("comentario");
$fecha       = recoge("fecha");
$nuevaFecha = date("d/m/Y", strtotime($fecha));

$nombreOk      = false;
$correoOk      = false;
$edadOk        = false;
$opcionOk      = false;
$puntOk        = false;


if ($nombre == "") {
    print "  <p><strong>No ha escrito su nombre.</strong></p>\n";
    print "\n";
} else {
    $nombreOk = true;
}

if ($correo == "") {
    print "  <p><strong>No ha escrito su correo electrónico.</strong></p>\n";
    print "\n";
} else {
    $correoOk = true;
}

if ($edad == "...") {
    print "  <p><strong>No ha indicado su edad.</strong></p>\n";
    print "\n";
} elseif ($edad < 0 || $edad >= 150) {
    print "  <p><strong>Por favor, indique su edad válida (>= a 0 años).</strong></p>\n";
    print "\n";
} else {
    $edadOk = true;
}

if ($opcion == "") {
    print "  <p><strong>No ha indicado si reside en Asturias.</strong></p>\n";
    print "\n";
} elseif ($opcion != "si" && $opcion != "no") {
    print "  <p><strong>Por favor, indiqure si reside en Asturias o no.</strong></p>\n";
    print "\n";
} else {
    $opcionOk = true;
}

if ($punt != "uno" && $punt != "dos" && $punt != "tres" && $punt != "cuatro" && $punt != "cinco") {
    print "  <p><strong>Por favor, indique su puntuacón de Gijón.</strong></p>\n";
    print "\n";
} else {
    $puntOk = true;
}

if ($nombreOk && $edadOk && $correoOk){
    print "<p>- Su nombre es <strong>$nombre</strong>.</p>\n";
    print "<p>- Usted tiene <strong>$edad</strong> años.</p>\n";
    print "<p>- Su correo electrónico es: <strong><em>$correo</em></strong> .</p>\n";
}
if ($opcionOk){
    if ($opcion == "si") {
        print "  <p>- Usted <strong>reside</strong> en Asturias.</p>\n";
    } else {
        print "  <p>- Usted <strong>no reside</strong> en Asturias.</p>\n";
    }
}

if ($puntOk){
    if ($punt == "uno") {
        print "<p>- Usted a puntuado Gijón con un <strong>uno</strong>.</p>\n";
    } elseif ($punt == "dos") {
        print "<p>- Usted a puntuado Gijón con un <strong>dos</strong>.</p>\n";
    }elseif ($punt == "tres") {
        print "<p>- Usted a puntuado Gijón con un <strong>tres</strong>.</p>\n";
    }elseif ($punt == "cuatro") {
        print "<p>- Usted a puntuado Gijón con un <strong>cuatro</strong>.</p>\n";
    } else{
        print "<p>- Usted a puntuado Gijón con un <strong>cinco</strong>.</p>\n";
    }
}

if ($comentario != ""){
    print "<p>- Usted ha escrito este comentario:  <strong>\"$comentario\"</strong> .</p>";
}

if ($fecha != ""){
    print "<p>- Usted ha realizado este formulario el día:  <strong>$nuevaFecha</strong> .</p>";
}


?>

<p></p><br><br>
  <p><a href="index.html">Volver al formulario.</a></p>

  <footer>
        <hr>
        <address>Autor: Laura Suárez Suárez</address>
    </footer>
    
</body>
</html>


