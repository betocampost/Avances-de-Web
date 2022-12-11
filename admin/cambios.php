<?php
session_start();

$servidor = 'localhost';
$cuenta = 'root';
$password = '';
$bd = 'proyectofinal';

$_SESSION['idprod'] = '';
$_SESSION['nombre'] = '';
$_SESSION['categoria'] = '';
$_SESSION['descripccion'] = '';
$_SESSION['existencias'] = '';
$_SESSION['precio'] = '';
$_SESSION['sabor'] = '';


$conexion = new mysqli($servidor, $cuenta, $password, $bd);

if ($conexion->connect_errno) {
    die('Error en la conexion');
}

//completar <-------------------------------------------------------------------------------
if (isset($_POST['submit'])) {
    $modificar = $_POST['modificar'];
    $_SESSION['modificar2'] = $modificar;
    $sql2 = "SELECT * FROM productos WHERE idprod='$modificar'";
    $resultado = $conexion->query($sql2);
    while ($fila = $resultado->fetch_assoc()) {
        $_SESSION['idprod'] = $fila['idprod'];
        $_SESSION['nombre'] = $fila['nombre'];
        $_SESSION['categoria'] = $fila['categoria'];
        $_SESSION['descripccion'] = $fila['descripccion'];
        $_SESSION['existencias'] = $fila['existencias'];
        $_SESSION['precio'] = $fila['precio'];
        $_SESSION['sabor'] = $fila['sabor'];
 
    }
}

if (isset($_POST['mod'])) {
    $uno = $_POST['idprod2'];
    $dos = $_POST['nombre2'];
    $tres = $_POST['categoria2'];
    $cuatro = $_POST['descripccion2'];
    $cinco = $_POST['existencias2'];
    $seis = $_POST['precio2'];
    $siete = $_POST['sabor2'];
 
    $modificar1 = $_SESSION['modificar2'];

    $ne = "UPDATE productos SET idprod='$uno', nombre='$dos',categoria = '$tres', descripccion = '$cuatro',existencias = '$cinco', precio = '$seis',sabor='$siete' WHERE idprod='$modificar1'";
    $fin = $conexion->query($ne);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>HERNAN CORTES ARECHIGA</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="cambios.css">


</head>

<body>
    

    
  <?php require_once("menu.html"); ?>
    <div class="contenedor1">
        <div class="contenedor2">
            <div class="izquierdaAlta">

                <?php
            //continuamos con la consulta de datos a la tabla usuarios
            //vemos datos en un tabla de html
            $sql = 'select * from productos'; //hacemos cadena con la sentencia mysql que consulta todo el contenido de la tabla
            $resultado = $conexion->query($sql); //aplicamos sentencia
            
            if ($resultado->num_rows) { //si la consulta genera registros
            ?>


                <div class="izqAlta">
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method='post'>

                        <legend>Modificar Cuentas</legend>
                        <br>
                        <select class="custom-select" name='modificar'>

                            <?php
                $salida = '<table>';
                while ($fila = $resultado->fetch_assoc()) { //recorremos los registros obtenidos de la tabla
                    echo '<option value="' . $fila["idprod"] . '">' . $fila["nombre"] . '</option>';
                    //proceso de concatenacion de datos
                    
                    $salida .= '<tr>'; 
                    $salida .= '<td>' . $fila['idprod'] . '</td>';
                    $salida .= '<td>' . $fila['nombre'] . '</td>';
                    $salida .= '<td>' . $fila['categoria'] . '</td>';
                    $salida .= '<td>' . $fila['descripccion'] . '</td>';
                    $salida .= '<td>' . $fila['existencias'] . '</td>';
                    $salida .= '<td>' . $fila['precio'] . '</td>';
                    $salida .= '<td>' . $fila['sabor'] . '</td>';
               
                    $salida .= '</tr>';
                } //fin while   
                $salida .= '</table>';
                ?>
                        </select>
                        <br><br>
                        <button type="submit" value="submit" name="submit">Modificar</button>
                    </form>
                </div>
                <?php

            } else {
                echo "no hay datos";
            }

            ?>
            </div>
            <div class="izquierdaBaja">
                <?php echo $salida ?>
            </div>
        </div>
        <div class="derecha">

            <form class="estiloformulario" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method='post'>
                <ul class="wrapper">
                    <li class="form-row">
                        <label for="id">ID</label>
                        <input type="number" name="idprod2" id="idprod" value="<?php echo $_SESSION["idprod"]; ?>">
                    </li>
                    <li class="form-row">
                        <label for="nombre">NOMBRE</label>
                        <input type="text" id="nombre" name="nombre2" value="<?php echo $_SESSION["nombre"]; ?>">
                    </li>
                    <li class="form-row">
                        <label for="cuenta">CATEGORIA</label>
                        <input type="text" id="categoria" name="categoria2" value="<?php echo $_SESSION["categoria"]; ?>">
                    </li>
                    <li class="form-row">
                        <label for="contra">DESCRIPCION</label>
                        <input type="text" id="descripccion" name="descripccion2" value="<?php echo $_SESSION['descripccion']; ?>">
                    </li>
                    <li class="form-row">
                        <label for="contra">EXISTENCIAS</label>
                        <input type="text" id="existencias" name="existencias2" value="<?php echo $_SESSION['existencias']; ?>">
                    </li>
                    <li class="form-row">
                        <label for="contra">PRECIO</label>
                        <input type="text" id="precio" name="precio2" value="<?php echo $_SESSION['precio']; ?>">
                    </li>
                    <li class="form-row">
                        <label for="contra">SABOR</label>
                        <input type="text" id="sabor" name="sabor2" value="<?php echo $_SESSION['sabor']; ?>">
                    </li>

                    <li class="form-row">
                        <button type="submit" name="mod">Modificar</button>
                    </li>
                </ul>
            </form>
        </div>
    </div>
</body>

</html>
