<?php

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'id19998999_root');
define('DB_PASSWORD', 'qz]!WL]RhS90I+CJ');
define('DB_NAME', 'id19998999_proyectofinal');
 
/* Intento de conexión a la base de datos MySQL*/
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// Comprobar la conexión
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>