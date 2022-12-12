<?php

use function UI\quit;

$servidor = 'localhost';
$cuenta = 'root';
$password = '';
$bd = 'proyectofinal';

$conexion = new mysqli($servidor, $cuenta, $password, $bd);

$sql = 'select * from productos';
$resultado = $conexion->query($sql);

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

<script>
    console.log(array);    
    
    function agregar(id){
        var indice = parseInt(id);
        console.log(`Elegiste ${array[indice]}`);       
         
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

<body>
    <!-- Responsive navbar-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark " >
      <div class="container px-5">
          <a class="navbar-brand" href="../index.php">
              <img src="../img/SucreNombre.png" style="width:25%;">
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

                <ul class="nav nav-pills">
                    <li role="presentation"><a href="tienda.php">Inicio</a></li>
                    <li role="presentation"><a href="VerCarta.php">Carrito de Compras</a></li>
                    <li role="presentation"><a href="catpasteles.php">CATEGORIA PASTELES</a></li>
                    <li role="presentation" class="active"><a href="catpanques.php">CATEGORIA PANQUES</a></li>

            </ul>
            </div>

            <div class="panel-body">
                <h1>Tienda de Productos</h1>
                
                <div id="products" class="row list-group">
                    <?php
                    //get rows query
                    $sql='SELECT * from productos where categoria="panque"';
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
                                                <a class="btn btn-success" href="AccionCarta.php?action=addToCart&id=<?php echo $mostrar["idprod"]; ?>" onclick="agregar(this.id)">Enviar al Carrito</a>
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

