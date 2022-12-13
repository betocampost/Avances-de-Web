<?php

function eliminarIntentos($idUsuario){
    $bd = obtenerBaseDeDatos();
    $sentencia = $bd->prepare("DELETE FROM intentos_users WHERE id_user = ?");
    $sentencia->execute([$idUsuario]);
    echo "Eliminar intentos";
}


function obtenerConteoIntentosFallidos($idUsuario){
    $bd = obtenerBaseDeDatos();
    $sentencia = $bd->prepare("SELECT count(*) FROM intentos_users WHERE id_user = ?");
    $sentencia->execute([$idUsuario]);
    $conteo = $sentencia->fetchColumn();
    return $conteo;
    /*
    $sentencia = $bd->query("SELECT COUNT(*) AS conteo FROM intentos_users WHERE id_user = ?");
    $registro = $sentencia->fetchObject();
    $conteo = $registro->conteo;
    return $conteo;
    
    
    $conteo = $bd->query("SELECT count(*) FROM intentos_users")->fetchColumn();
    echo $conteo;
    return $conteo;
    */
    
}

function agregarIntentoFallido($idUsuario){
    $bd = obtenerBaseDeDatos();
    $sentencia = $bd->prepare("INSERT INTO intentos_users(id_user) VALUES (?)");
    $sentencia->execute([$idUsuario]);
}

function bloquearCuenta($idUsuario){
    $bd = obtenerBaseDeDatos();
    $sentencia = $bd->prepare("UPDATE users SET bloqueo = 'true' WHERE id = ?");
    $sentencia->execute([$idUsuario]);
}



function obtenerBaseDeDatos(){
    $password = obtenerVariableDelEntorno("MYSQL_PASSWORD");
    $user = obtenerVariableDelEntorno("MYSQL_USER");
    $dbName = obtenerVariableDelEntorno("MYSQL_DATABASE_NAME");
    $database = new PDO('mysql:host=localhost;dbname=' . $dbName, $user, $password);
    $database->query("set names utf8;");
    $database->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);
    $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $database->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
    return $database;
}

function obtenerVariableDelEntorno($clave){
    if (defined("_ENV_CACHE")) {
        $vars = _ENV_CACHE;
    } else {
        $archivo = "env.php";
        if (!file_exists($archivo)) {
            throw new Exception("El archivo de las variables de entorno ($archivo) no existe. Favor de crearlo");
        }
        $vars = parse_ini_file($archivo);
        define("_ENV_CACHE", $vars);
    }
    if (isset($vars[$clave])) {
        return $vars[$clave];
    } else {
        throw new Exception("La clave especificada (" . $clave . ") no existe en el archivo de las variables de entorno");
    }
}