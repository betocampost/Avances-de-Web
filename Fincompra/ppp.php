<?php session_start(); 

$servidor = 'localhost';
$cuenta = 'root';
$password = '';
$bd = 'proyectofinal';

$conexion = new mysqli($servidor, $cuenta, $password, $bd);

eliminarCarrito();
echo 'GRACIAS';

?>

<?php

function eliminarCarrito(){
    $bd = obtenerBaseDeDatos();
    $sentencia = $bd->prepare("DELETE FROM carrito ");
    $sentencia->execute();
    
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
        $archivo = "env2.php";
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



?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Sucré</title>
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.10.2.min.js"></script>

   <script type="text/javascript" src="js/funcionamiento.js"></script>
   <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- Favicon-->
    <link rel="apple-touch-icon" sizes="180x180" href="img/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="img/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="img/favicon-16x16.png">
    <link rel="manifest" href="img/site.webmanifest"><!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="estilos.css" rel="stylesheet" />
    <script src="scriptcupon.js"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Hello, world!</title>


  </head>
<body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark ">
      <div class="container px-5">
          <a class="navbar-brand" href="index.php">
              <img src="img/SucreNombre.png" style="width:30%;">
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                  <li class="nav-item"><a class="nav-link active" aria-current="page" href="index.php">Inicio</a></li>
                  <li class="nav-item"><a class="nav-link" href="acercaDe.php">Acerca de</a></li>
                  <li class="nav-item"><a class="nav-link" href="ayuda.php">Ayuda</a></li>
                  <li class="nav-item"><a class="nav-link" href="contacto.php">Contáctanos</a></li>

                    <?php
                    // Comprobar si el usuario ya ha iniciado la sesión
                  if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){ ?>

                   <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle btn btn-outline-warning" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false" style="color:white; font-size:20px;">
                            <span class="fa fa-user-circle"></span>
                            <?php echo htmlspecialchars($_SESSION["username"]); /*style="color:white; background-color:#e9bd15"*/?>
                        </a>
                        <ul class="dropdown-menu">

                            <li><a class="dropdown-item " href="reset-password.php">Cambia tu contraseña</a></li>
                            <li><a class="dropdown-item "href="logout.php">Cierra la sesión</a></li>
                        </ul>
                    </li>

                 <?php }else{?>
                    <li class="nav-item"><a class="nav-link" href="login.php">Iniciar Sesion</a></li>
                 <?php } ?>

              </ul>
          </div>
      </div>
  </nav>

     <?php
    $total = $_SESSION["total"];
function filtrado($datos){
$datos = trim($datos);
$datos = stripslashes($datos);
$datos = htmlspecialchars($datos);

return $datos;
}

if(isset($_POST["submit"]) && $_SERVER["REQUEST_METHOD"] == "POST"){
    $ubicacion = filtrado($_POST["ubicacion"]);
    $nombre = filtrado($_POST["nombre"]);
    $apellido = filtrado($_POST["apellido"]);
    $celular = filtrado($_POST["celular"]);

    // Utilizamos implode para pasar el array a string
    //$idiomas = filtrado(implode(", ", $_POST["idiomas"]));
    $email = filtrado($_POST["email"]);
    $direccion = filtrado($_POST["direccion"]);
    $referencias = filtrado($_POST["referencias"]);
    $codigopostal = filtrado($_POST["codigopostal"]);
    $tipoenvio = filtrado($_POST["tipoenvio"]);
    
   
    
} ?>
    <?php if(isset($_POST["submit"])): ?>
 <div class="grid">
       <div>


                   <form class="form" action="pago.php" method="post">
                      <div class="card">
                       <h5 class="card-header">Seleccione tipo de envio</h5>
                       <div class="card-body">
                       <div>
                         <input type="radio" id="gratis" name="costoenvio" value="Estandar">
                         <label for="Estandar">Envio Estandar</label>
                         <p>$MXN0.00 (Los pedidos realizados en estos momentos, serán recibidos antes del Jueves, Dic 22 - Domingo, Dic 25.)</p>
                         <input type="radio" id="costo" name="costoenvio" value="Expreess">
                         <label for="Express">Envio Express</label>
                         <p>$MXN460.00 (Los pedidos realizados en estos momentos, serán recibidos antes del Martes, Dic 20 - Jueves, Dic 22.</p>
                         </div>
                         <br>
                         <div>
                        <h5 >Seleccione tipo de pago</h5>
                        <hr>
                         <a href="#"><input type="button" id="tarj" name="tipopago" value="tarjeta"></a>
                         <label for="Estandar">Tarjeta credito/debito</label><br>
                         <img src="images/tarj.jpg" id="img" alt=""><br>

                         <a href=""><input type="button" id="oxxo" name="tipopago" value="oxxo"></a>
                         <label for="Express">OXXO</label>
                         <img id="img2" src="images/oxxo.jpg" alt="">
                                 </div>
                </div>
                <div class="form-group-boton-enviar">
                                    <button
                                    name="submit" type="submit" class="" value=continuar>Continuar</button>
                                </div>
                </div>
           </form>
                 </div>




    <div class="card">
        <h3 class="card-header">Datos de envio</h3>
          <div class="card-body">
            <p class="card-text">Ubicacion : <?php isset($ubicacion) ? print $ubicacion : ""; ?> <br></p>
            <p class="card-text">Nombre : <?php isset($nombre) ? print $nombre : ""; ?> <br></p>
            <p class="card-text">Apellido : <?php isset($apellido) ? print $apellido : ""; ?> <br></p>
            <p class="card-text">Celular : <?php isset($celular) ? print $celular : ""; ?> <br></p>
            <p class="card-text">Email : <?php isset($email) ? print $email : ""; ?> <br></p>
            <p class="card-text">Direccion : <?php isset($direccion) ? print $direccion : "";?> <br></p>
            <p class="card-text">Total : <?php isset($total) ? print $total : "";?> <br></p>
            <p class="card-text"> Referencias : <?php isset($referencias) ? print $referencias : ""; ?> <br></p>
             <p class="card-text"> Envio : <?php isset($tipoenvio) ? print $tipoenvio : ""; ?> <br></p>
            <p class="card-text">Codigo Postal : <?php isset($codigopostal) ? print $codigopostal : ""; ?> <br>
            <?php endif; ?></p>
    <a href="#" class="btn btn-primary">Modificar datos</a>
          </div>
          <div>
               <div>
                   <div class="center">
        <div class="coupon_cont-center">

            <div class="coupon_cont">

                <div class="copiar_coupon">
                    <div class="txt_cont"><h2>Precio Actual</h2></div>
                    <div class="price_cont"> <h3 id="number1"><?php isset($total) ? print $total : "";?> </h3> <h3>$</h3> </div>

                    <div class="action_cont">
                        <input id="input1" type="text" value="54ldqwer23">
                        <button id="btn1" onclick="copyCoupon()">copiar cupon</button>
                    </div>
                </div>

                <div class="canjear_coupon">
                    <div class="txt_cont"><h2>Cupon de descuento:</h2></div>
                    <div class="price_cont" id="discount">
                        <h3 style="font-size: 15px; width: 300px;">
                        Canjea tu cupon
                        </h3>
                    </div>

                    <div class="action_cont">
                        <input id="input2" type="text" placeholder="pergar codigo">
                        <button id="btn2" onclick="canjearCoupon()">canjear cupon</button>
                    </div>
                </div>
            </div>

        </div>
    </div>
           </div>
          </div>
          <div>
              <h3>Detalles de compra </h3>
              <p>Subtotal: </p>
              <p>Gastos de envio: </p>
              <p>Iva:</p>
              <p>Total: </p>
          </div>

        </div>
    </div>

</body>
</html>



















