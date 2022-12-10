<?php
// Incluir archivo de configuración
require_once "config.php";
 
//Definir variables e inicializar con valores vacíos
$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";
$bloqueo="false";
 
// Procesamiento de los datos del formulario al enviarlo
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validar el nombre de usuario
    if(empty(trim($_POST["username"]))){
        $username_err = "Por favor ingrese un usuario.";
    } else{
        // Preparar una sentencia select
        $sql = "SELECT id FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Vincular variables a la sentencia preparada como parámetros
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Establecer parámetros
            $param_username = trim($_POST["username"]);
            
            // Intentar ejecutar la sentencia preparada
            if(mysqli_stmt_execute($stmt)){
                /* almacenar el resultado */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "Este usuario ya fue tomado.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Al parecer algo salió mal.";
            }
        }
         
        // Cerrar declaración
        mysqli_stmt_close($stmt);
    }
    
    // Validar contraseña
    if(empty(trim($_POST["password"]))){
        $password_err = "Por favor ingresa una contraseña.";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "La contraseña al menos debe tener 6 caracteres.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validar confirmar contraseña
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Confirma tu contraseña.";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "No coincide la contraseña.";
        }
    }
    
    // Comprobar los errores de entrada antes de la inserción en la base de datos
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){
        
        // Preparar una declaración de inserción
        $sql = "INSERT INTO users (nombre, username, correo, password, bloqueo) VALUES (?, ?, ?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            //Vincular variables a la sentencia preparada como parámetros
            mysqli_stmt_bind_param($stmt, "sssss", $_POST["nombre"], $param_username, $_POST["correo"], $param_password, $bloqueo);
            
            //Establecer parámetros
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Crea un hash de la contraseña
            
            // Intentar ejecutar la sentencia preparada
            if(mysqli_stmt_execute($stmt)){
                // Redirigir a la página de inicio de sesión
                header("location: index.php");
            } else{
                echo "Algo salió mal, por favor inténtalo de nuevo.";
            }
        }
         
        
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
    <title>Registro</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
   <script type="text/javascript" src="js/funcionamiento.js"></script>
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
        <h1 style="color:white">REGISTRATE</h1>
        <hr>
        <div class="form-group">
                <label style="color:white">Nombre</label>
                <input type="text" name="nombre" class="form-control" value="" style=" font-size:20px;">
                <span class="help-block"></span>
            </div>  
            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label style="color:white">Usuario</label>
                <p style="color:white;font-family: cursive;">Sugerencias: <span id="txtHint" style="color:white;font-family:cursive;"></span></p>
                <input type="text" name="username" class="form-control" value="<?php echo $username; ?>" onkeyup="showHint(this.value)" style=" font-size:20px;">
                <span class="help-block"><?php echo $username_err; ?></span>
            </div> 
            <div class="form-group">   
            <label style="color:white">Correo</label>
                <input type="text" name="correo" class="form-control" value="" style=" font-size:20px;">
                <span class="help-block"></span>
            </div>  
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label style="color:white" >Contraseña</label>
                <input type="password" name="password" class="form-control" value="<?php echo $password; ?>" style=" font-size:20px;" >
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                <label style="color:white">Confirmar Contraseña</label>
                <input type="password" name="confirm_password" class="form-control" value="<?php echo $confirm_password; ?>" style=" font-size:20px;">
                <span class="help-block"><?php echo $confirm_password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-outline-danger" value="Ingresar" style="width:300px;font-size:17px;font-family: 'Cap', cursive;">
                
            </div>
            <input type="reset" class="btn btn-outline-warning" value="Borrar" style="width:300px;font-size:17px;font-family: 'Cap', cursive;">
            <br><br>
            <p style="color:white">¿Ya tienes una cuenta? <a href="login.php" style="color:red">Ingresa aquí</a>.</p>
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