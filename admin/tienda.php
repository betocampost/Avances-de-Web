<?php

use function UI\quit;

$servidor = 'localhost';
$cuenta = 'root';
$password = '';
$bd = 'proyectofinal';

$conexion = new mysqli($servidor, $cuenta, $password, $bd);

$sql = 'select * from productos';
$resultado = $conexion->query($sql);
$numcar = 0;
?>

<head>

<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

<link rel="stylesheet" href="css/estilos.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>



<body>
<div class="container"> <br><br>

    <div class="row">


<?php
$numPro = 0;

?>
        <script> var array = [];</script>


<?php
while ($fila = $resultado->fetch_assoc()) {
    $imagen = $fila['imagen'];
    $producto = $fila['nombre'];
    $descripcion = $fila['descripccion'];
    $precio = $fila['precio'];
    $existencias = $fila['existencias'];
?>
        <script>
            array.push("<?php echo $producto ?>");

        </script>



<?php
$numPro = $numPro + 1;

} //fin while
?>
    
</body>
<!--FUNCION DE CONSOLA PARA SABER QUE SE ELIGIO-->
<script>
    console.log(array);    
    
    function agregar(id){
        var indice = parseInt(id);
        console.log(`Elegiste ${array[indice]}`);   
        $numcar = $numcar + 1;
         
    }
    
    
</script>

<?php
include 'Configuracion.php';

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <title>Carrito de Compras</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/estilosindex.css">
    <link href="css/styles.css" rel="stylesheet" />
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
    <link href="css/styles.css" rel="stylesheet" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Hello, world!</title>

    <style>
        .container {
            padding: 20px;
        }

        .cart-link {
            width: 100%;
            text-align: right;
            display: block;
            font-size: 22px;
        }
        
    </style>
</head>
</head>

<body style="width: 100%;">
    <!-- Responsive navbar-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark " >
      <div class="container px-5">
          <a class="navbar-brand" href="../index.php">
              <img src="../img/SucreNombre.png" style="width:28%;">
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                  <li class="nav-item"><a class="nav-link active" aria-current="page" href="../index.php">Inicio</a></li>
                  <li class="nav-item"><a class="nav-link" href="tienda.php">Tienda</a></li>
                  <li class="nav-item"><a class="nav-link" href="../acercaDe.php">Acerca de</a></li>
                  <li class="nav-item"><a class="nav-link" href="../ayuda.php">Ayuda</a></li>
                  <li class="nav-item"><a class="nav-link" href="../contacto.php">Contáctanos</a></li>
             
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
                            
                            <li><a class="dropdown-item " href="../reset-password.php">Cambia tu contraseña</a></li>
                            <li><a class="dropdown-item "href="../logout.php">Cierra la sesión</a></li>
                        </ul>
                    </li>

                 <?php }else{?>
                    <li class="nav-item"><a class="nav-link" href="../login.php">Iniciar Sesion</a></li>
                 <?php } ?>
                    
              </ul>
          </div>
      </div>
  </nav>

    <div class="container" style="width: 100%;">
        <div class="panel panel-default">
            <div class="panel-heading">
<!--SUBBARRA DE NAVEGACION DE LA TIENDA-->
                <ul class="nav nav-pills">
                    <li role="presentation" class="active"><a href="tienda.php">Inicio</a></li>
                    <li role="presentation"><a href="VerCarta.php">Carrito de Compras</a></li>
                    <li role="presentation"><a href="catpasteles.php">CATEGORIA PASTELES</a></li>
                    <li role="presentation"><a href="catpanques.php">CATEGORIA PANQUE</a></li>
                    <li role="presentation"><div class="shopping" >
        <!--ICONO DE FAVICON CARRITO DE COMPRAS, AQUI SE PONE LO DEL CONTADOR DE PRODUCTOS-->
        <div class="counter-container">
            <span id="counter"></span><a href="VerCarta.php">
            <i data-feather="shopping-bag"></i>3</a>
        </div>
    </div>
    <script src="main.js"></script>
    <script src="https://unpkg.com/feather-icons"></script>

    <script>
        feather.replace();
    </script></span></i></a></li>

            </ul>
            </div>
<!--TABLA DE PRODUCTOS DE LA TIENDA-->
            <div class="panel-body">
                <h1>Tienda de Productos</h1>
                <div id="products" class="row list-group">
                    <?php
                    //get rows query
                    $sql='SELECT * from productos';
                    $result = $conexion -> query($sql);
                    
                    while($mostrar=mysqli_fetch_array($result)){
                    ?>
                            <div class="item col-lg-4">
                                <div class="thumbnail">
                                    <div class="caption">
                                    <h4 class="imagen" class="hover"><img src="<?php echo $mostrar["imagen"] ?>" class="card-img-top" alt="..." width="150" height="250"></h4>
                                        <h4 class="list-group-item-heading"><?php echo $mostrar["nombre"]; ?></h4>
                                        <p class="list-group-item-text"><?php echo $mostrar["descripccion"]; ?></p>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <p class="lead"><?php echo '$' . $mostrar["precio"] . ' MX'; ?></p>
                                            </div>
                                            <div class="col-md-6">
     <!--BOTON DE ENVIO PARA EL CARRITO--> <a class="btn btn-success" id="btn_add" href="AccionCarta.php?action=addToCart&id=<?php echo $mostrar["idprod"];  ?>">Enviar al Carrito</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php }?>
                        
                </div>
            </div>
        </div>
    </div>
    <!--FOOTER-->
    <footer class="py-5 bg-dark text-white-50">
    <div class="container px-5">
        <div class="social d-flex justify-content-center ">
            <a class="mx-2" href="#!"><i class="fab fa-facebook-f"></i></a>
        </div>
        <br>
        <p class="m-0 text-center">Copyright &copy; Your Website 2022</p>
    </div>
</footer>
    <script src="script.js"></script>
</body>

</html>

