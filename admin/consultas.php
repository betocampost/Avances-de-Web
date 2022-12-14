<?php
require_once("menu.html");
use function UI\quit;

$servidor = 'localhost';
$cuenta = 'id19998999_root';
$password = 'qz]!WL]RhS90I+CJ';
$bd = 'id19998999_proyectofinal';

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
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading">

                <ul class="nav nav-pills">
                    <li role="presentation" class="active"><a href="index.php">Inicio</a></li>
                    <li role="presentation"><a href="VerCarta.php">Carrito de Compras</a></li>
                 </ul>
            </div>

            <div class="panel-body">
                <h1>Tienda de Productos</h1>
                <a href="VerCarta.php" class="cart-link" title="Ver Carta"><i class="glyphicon glyphicon-shopping-cart"></i></a>
                <div id="products" class="row list-group">
                    <?php
                    //get rows query
                    $query = $db->query("SELECT * FROM productos ORDER BY idprod DESC LIMIT 10");
                    if ($query->num_rows > 0) {
                        while ($row = $query->fetch_assoc()) {
                    ?>
                            <div class="item col-lg-4">
                                <div class="thumbnail">
                                    <div class="caption">
                                    <h4 class="list-group-item-heading"><img src="<?php echo $imagen ?>" class="card-img-top" alt="..." width="250" height="250"></h4>
                                        <h4 class="list-group-item-heading"><?php echo $row["nombre"]; ?></h4>
                                        <p class="list-group-item-text"><?php echo $row["descripccion"]; ?></p>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <p class="lead"><?php echo '$' . $row["precio"] . ' MX'; ?></p>
                                            </div>
                                            <div class="col-md-6">
                                                <a class="btn btn-success" href="AccionCarta.php?action=addToCart&id=<?php echo $row["idprod"]; ?>">Enviar al Carrito</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php }
                    } else { ?>
                        <p>Producto(s) no existe.....</p>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
