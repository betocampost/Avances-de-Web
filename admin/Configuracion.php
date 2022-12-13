<?php
//DB details
$dbHost = 'localhost';
$dbUsername = 'id19998999_root';
$dbPassword = 'qz]!WL]RhS90I+CJ';
$dbName  = 'id19998999_proyectofinal';


//Create connection and select DB
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

if ($db->connect_error) {
    die("No hay Conexion con la base de datos: " . $db->connect_error);
}
