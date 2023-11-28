<?php
$dbhost = "localhost";  // host del MySQL (generalmente localhost)
$dbusuario = "root"; // aqui debes ingresar el nombre de usuario
// para acceder a la base
$dbpassword = ""; // password de acceso para el usuario de la
// linea anterior
$db = "travelling"; // Seleccionamos la base con la cual trabajar

$conn = new mysqli($dbhost, $dbusuario, $dbpassword, $db);
if ($conn -> connect_errno) {
    die("Problemas con la conexion".$conn->connect_error);
} else {
 //echo "Conectado correctamente";
}

?>