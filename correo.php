<html>
<head>
    <title>Correo</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
</head>
<body>
    <?php $band=1 ?>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" style="width:10%;">
 <div class="form-group ">
                <label>Usuario</label>
                <input type="text" name="username" class="form-control" value="">
                <span class="help-block"></span>
            </div>  
            
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Enviar">
            </div>
</form>



</body>
</html>
 

<?php
    
    function randomText($length){
    $key="";
    $pattern = "1234567890abcdefghijklmnopqrstuvwxyz";
    for($i=0;$i<$length;$i++){
        $key .= $pattern[rand(0,35)];
    }
    return $key;
    }
    


    if(empty($_POST["username"])){
        echo  '<div class="alert alert-info">';
        echo 'Ingresa tu usuario';
           echo '<br><br>';
       
    }else if(!(empty($_POST["username"]))){
        $bd = obtenerBaseDeDatos();
    $sentencia = $bd->prepare("SELECT correo FROM users WHERE username = ?");
    $sentencia->execute([$_POST["username"]]);
    $conteo = $sentencia->fetch(PDO::FETCH_ASSOC);
   
   if(empty($conteo)){
    echo  '<div class="alert alert-info">';
            echo 'No existe el usuario';
            echo '</div>';

   }else{
    $verify = verificarbloq($_POST["username"]);
    if($verify == "true"){
        echo  '<div class="alert alert-info">';
        echo 'USUARIO BLOQUEADO';
       echo '</div>';
       $correo =  implode(" ",$conteo);
       $receptor="$correo";
       $contraNueva = randomText(8);
       //echo $receptor;
        echo $contraNueva;
        $param_password = password_hash($contraNueva, PASSWORD_DEFAULT);
        CambiarPass($_POST["username"],$param_password);
       
       $asunto="Recupera tu contraseña";
       $cuerpo="TU NUEVA CONTRASEÑA ES VUELVE A INCIAR SESION Y CAMBIALA".$contraNueva; //--------------
       mail($receptor,$asunto,$cuerpo);
       //echo $_POST["username"];
     echo  '<div class="alert alert-info">';
               echo 'REVISA TU CORREO ELECTRONICO CON LA NUEVA CONTRASEÑA, Inicia Sesion con la nueva contraseña y Cambiala';
               echo '<br><br>';
               echo 'SOLO TIENES 1 INTENTO';
              echo '</div>';
              
                  
   
            desbloquearCuenta($_POST["username"]);
           $bd2 = obtenerBaseDeDatos();
          $sente = $bd2->prepare("SELECT id FROM users WHERE username = ?");
          $sente->execute([ $_POST["username"]]);
          $array = $sente->fetch(PDO::FETCH_ASSOC);
          $id = implode(" ",$array);
          
          eliminarIntentos($id);
                echo '<a class="btn btn-success" href="index.php" role="button">Login</a>';


    }else{
        echo  '<div class="alert alert-info">';
        echo 'El usuario NO esta bloqueado';
       echo '</div>';
       

     }
               
   }    
             
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
    function desbloquearCuenta($nomUsuario){
        $bd = obtenerBaseDeDatos();
        $sentencia = $bd->prepare("UPDATE users SET bloqueo = 'false' WHERE username = ?");
        $sentencia->execute([$nomUsuario]);
    }
    function eliminarIntentos($idUsuario){
        $bd = obtenerBaseDeDatos();
        $sentencia = $bd->prepare("DELETE FROM intentos_users WHERE id_user = ? ORDER BY id_user DESC
        LIMIT 2");
        $sentencia->execute([$idUsuario]);
       // echo "Eliminar intentos";
    }
    function CambiarPass($nomUsuario,$nueva){
        $bd = obtenerBaseDeDatos();
        $sentencia = $bd->prepare("UPDATE users SET password = ? WHERE username = ?");
        $sentencia->execute([$nueva,$nomUsuario]);
    }
    function verificarbloq($nomUsuario){
        $bd2 = obtenerBaseDeDatos();
        $sente = $bd2->prepare("SELECT bloqueo FROM users WHERE username = ?");
        $sente->execute([ $nomUsuario]);
        $array = $sente->fetch(PDO::FETCH_ASSOC);
        $bloqueo = implode(" ",$array);

        return $bloqueo;
    }
    
    
?>