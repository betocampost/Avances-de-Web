<?php

# El número de intentos máximos
define("MAXIMOS_INTENTOS", 3);

// Iniciar la sesión
session_start();
 
// Comprobar si el usuario ya ha iniciado la sesión, en caso afirmativo, redirigirlo a la página de bienvenida
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
  header("location: index.php");
  exit;
}
 
// Incluir archivo de configuración
require_once "config.php";
include_once "funciones.php"; //-------------------------------------------------

// Definir variables e inicializar con valores vacíos
$username = $password = "";
$username_err = $password_err = $captcha_err ="";
 
// Procesamiento de los datos del formulario al enviarlo
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $copia = $_POST["txtcopia"];
    $captcha = $_POST["captcha"];
 
    // Comprobar si el nombre de usuario está vacío
    if(empty(trim($_POST["username"]))){
        $username_err = "Por favor ingrese su usuario.";
    } else{
        $username = trim($_POST["username"]);
    }
    // Comprobar si la contraseña está vacía
    if(empty(trim($_POST["password"]))){
        $password_err = "Por favor ingrese su contraseña.";
    } else{
        $password = trim($_POST["password"]);
    }
    if($copia == $captcha){
    // Validar las credenciales
    if(empty($username_err) && empty($password_err)){
        // Preparar una sentencia select
        $sql = "SELECT id, username, password FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Vincular variables a la sentencia preparada como parámetros
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Establecer parámetros
            $param_username = $username;
            
            // Intentar ejecutar la sentencia preparada
            if(mysqli_stmt_execute($stmt)){
                // Resultado del almacenamiento
                mysqli_stmt_store_result($stmt);
                
                // Compruebe si el nombre de usuario existe, si es así, verifique la contraseña
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Vincular las variables de resultado
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        $conteoIntentosFallidos = obtenerConteoIntentosFallidos($id); //------------------------
                        if ($conteoIntentosFallidos >= MAXIMOS_INTENTOS) {
                            header("Location: login.php?mensaje=Límite de intentos alcanzado");
                            bloquearCuenta($id);
                        }else{
                            if(password_verify($password, $hashed_password)){ //desencripta la contasena
                                # Todo correcto. Borramos todos los intentos, pues ya hizo uno exitoso
                                eliminarIntentos($id);
                                // La contraseña es correcta y se inicia una nueva sesión
                                session_start();
                                if(!empty($_POST["remember"])) {
                                    setcookie("username", $_POST["username"], time() + 3600);
                                    setcookie("password", $_POST["password"], time() + 3600);
                                }else{
                                    setcookie("username","");
                                    setcookie("password","");
                                }
                                //Almacenar datos en variables de sesión
                                $_SESSION["loggedin"] = true;
                                $_SESSION["id"] = $id;
                                $_SESSION["username"] = $username;                            
                                
                                // Redirigir al usuario a la página de bienvenida
                                header("location: index.php");

                            }else{
                                // Mostrar un mensaje de error si la contraseña no es válida
                                # Agregamos un intento fallido
                                agregarIntentoFallido($id); 
                                $password_err = "La contraseña que has ingresado no es válida. ";
                            }
                        }
                    }
                } else{
                    // Mostrar un mensaje de error si el nombre de usuario no existe
                    $username_err = "No existe cuenta registrada con ese nombre de usuario.";
                }
            } else{
                echo "Algo salió mal, por favor vuelve a intentarlo.";
            }
        }
        
        // Cerrar declaración
        mysqli_stmt_close($stmt);
    }
}else{
    $captcha_err ="El codigo Ingresado no coincide";
}
    
    // Close connection
    mysqli_close($link);
}


    
    
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" href="css/estilos2.css">
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


        .captcha{
            font-family: 'Cap', cursive;
            font-size:50px;
           
         
            -ms-transform: skew(-40deg, 0deg);
    -webkit-transform: skew(-40deg, 0deg);
    transform: skew(-40deg, 0deg);
   

   background: url(bo.jpg) ;  
    
    width: 200px;
   color:black;
    
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
        <h1 style="color:white">INICIA SESION</h1>
        <hr>
            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label style="color:white">Usuario</label>
                <input type="text" name="username" class="form-control" value="<?php if(isset($_COOKIE["username"])) { echo $_COOKIE["username"]; }?>" style=" font-size:20px;">
                <span class="help-block"><?php echo $username_err; ?></span>
            </div>    
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label style="color:white">Contraseña</label>
                <input type="password" name="password" class="form-control" value="<?php if(isset($_COOKIE["password"])) { echo $_COOKIE["password"]; } ?>" style=" font-size:20px;">
                <span class="help-block"><?php echo $password_err;?></span>
            </div>
            
            <div class="form-group <?php echo (!empty($captcha_err)) ? 'has-error' : ''; ?>">
            <label style="color:white">Capturar Captcha</label><br>
            <input type="text" name="txtcopia" id="txtcopia" size="10" class="form-control" style=" font-size:20px;">
            <span class="help-block"><?php echo $captcha_err;?></span>
            <br>
            <input type="text" name="captcha" id="captcha" value="<?php echo codigo_captcha(); ?>" class="captcha"  size="4" readonly >
           
            </div>  

            
            <br>
            
            <?php
            # si hay un mensaje, mostrarlo
            if (isset($_GET["mensaje"])) { ?>
                <div class="alert alert-info">
                    <?php echo $_GET["mensaje"] ?>
                    <br><br>
                    <a class="btn btn-success" href="correo.php" role="button" style="color:white">Contraseña por Correo</a>

                </div>
            <?php } ?>
            <table>
             <tr>
                <td colspan="2"><input type="checkbox" name="remember" style="color:white;width:50px" /></td>
                
                <td><p style="color:white"> Recordar usuario y password</p></td>
             </tr>

            </table>
            <br>
            <div class="form-group">
                <input type="submit" class="btn btn-outline-danger" value="Ingresar" style="width:250px;font-size:17px;font-family: 'Cap', cursive;">
            </div>
            <p style="color:white">¿No tienes una cuenta? <a href="register.php" style="color:red">Regístrate ahora</a>.</p>
        </form>
        </div>
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


    <?php

function codigo_captcha(){

        $k="";
        $paramentros="1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $maximo=strlen($paramentros)-1;

        for($i=0; $i<5; $i++){

            $k.=$paramentros[mt_rand(0,$maximo)];

        }

        return $k;

}

?>
</body>
</html>