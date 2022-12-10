<?php
// Inicia sesion
session_start();
 
// Comprobar si el usuario está conectado, de lo contrario redirigir a la página de inicio de sesión
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.php");
    exit;
}
 
// Incluir archivo de configuración
require_once "config.php";
 
// Definir variables e inicializar con valores vacíos
$new_password = $confirm_password = "";
$new_password_err = $confirm_password_err = "";
 
// Procesamiento de los datos del formulario al enviarlo
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validar nueva contrasena
    if(empty(trim($_POST["new_password"]))){
        $new_password_err = "Por favor, introduzca la nueva contraseña.";     
    } elseif(strlen(trim($_POST["new_password"])) < 6){
        $new_password_err = "La contraseña al menos debe tener 6 caracteres.";
    } else{
        $new_password = trim($_POST["new_password"]);
    }
    
    // Validar confirmar contraseña
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Por favor confirme la contraseña.";
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($new_password_err) && ($new_password != $confirm_password)){
            $confirm_password_err = "Las contraseñas no coinciden.";
        }
    }
        
    // Comprobar los errores de entrada antes de actualizar la base de datos
    if(empty($new_password_err) && empty($confirm_password_err)){
        // Preparar una declaración de actualización
        $sql = "UPDATE users SET password = ? WHERE id = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Vincular variables a la sentencia preparada como parámetros
            mysqli_stmt_bind_param($stmt, "si", $param_password, $param_id);
            
            // Establecer parámetros
            $param_password = password_hash($new_password, PASSWORD_DEFAULT);
            $param_id = $_SESSION["id"];
            
            // Intentar ejecutar la sentencia preparada
            if(mysqli_stmt_execute($stmt)){
                // La contraseña se ha actualizado correctamente. Destruir la sesión, y redirigir a la página de inicio de sesión
                session_destroy();
                header("location: index.php");
                exit();
            } else{
                echo "Algo salió mal, por favor vuelva a intentarlo.";
            }
        }
        
        // Cerrar declaración
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($link);
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cambia tu contraseña acá</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <style type="text/css">
             @font-face {
          font-family: 'Cap';
         src: url('Capp.ttf');
     }
        body{ font: 14px sans-serif; }
        body{
           background-color:ligth-gray;
}
        .wrapper{ 
        	width:50%;
            height:50%;
	margin:auto;
	max-width:525px;
	min-height:670px;
	position:relative;
	background-color:black;
	box-shadow:0 12px 15px 0 rgba(0,0,0,.24),0 17px 50px 0 rgba(0,0,0,.19);
        
        }

.container2 {
     display: flex;
     justify-content: center;
     align-items: center;
}
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark ">
      <div class="container px-5">
          <a class="navbar-brand" href="index.php">
              <img src="img/SucreNombre.png" style="width:20%;">
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
              <li class="nav-item"><a class="nav-link active" aria-current="page" href="#">SUCRE</a></li>
              </ul>
          </div>
      </div>
  </nav>




  <div class="wrapper container2">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post"> 
        <h1 style="color:white">CAMBIA TU CONTRASEÑA</h1>
        <hr>
            <div class="form-group <?php echo (!empty($new_password_err)) ? 'has-error' : ''; ?>">
                <label  style="color:white">Nueva contraseña</label>
                <input type="password" name="new_password" class="form-control" value="<?php echo $new_password; ?>" style=" font-size:20px;">
                <span class="help-block"><?php echo $new_password_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                <label  style="color:white">Confirmar contraseña</label>
                <input type="password" name="confirm_password" class="form-control" style=" font-size:20px;">
                <span class="help-block"><?php echo $confirm_password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-outline-warning" value="Cambiar" style="width:320px;font-size:17px;font-family: 'Cap', cursive;">
                
            </div>
            <a class="btn btn-link" href="index.php" style="color:red;font-size:20px;font-family:cursive;">Cancelar</a>
        </form>
    </div>    


    <footer class="py-5 bg-dark text-white-50">
    <div class="container px-5">
        <div class="social d-flex justify-content-center ">
            <a class="mx-2" href="#!"><i class="fab fa-facebook-f"></i></a>
        </div>
        <br>
        <p class="m-0 text-center">Copyright &copy; Your Website 2022</p>
    </div>
</footer>
</body>
</html>