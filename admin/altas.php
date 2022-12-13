<?php
///////////////////
///////////////////
///////////////////
//NO TOCAR NADA DE AQUI
///////////////////
///////////////////
///////////////////
///////////////////
$servidor = 'localhost';
$categoria = 'id19998999_root';
$password = 'qz]!WL]RhS90I+CJ';
$bd = 'id19998999_proyectofinal';

//conexion a la base de datos
$conexion = new mysqli($servidor, $categoria, $password, $bd);

if ($conexion->connect_errno) {
    die('Error en la conexion');
} else {
    //conexion exitosa

    /*revisar si traemos datos a insertar en la bd  dependiendo
    de que el boton de enviar del formulario se le dio clic*/

    if (isset($_POST['submit']) || !empty($_POST['idprod'])) {
        //obtenemos datos del formulario
        $id = $_POST['idprod'];
        $nom = $_POST['nombre'];
        $categoria = $_POST['categoria'];
        $descripcion = $_POST['descripcion'];
        $existencia = $_POST['existen'];
        $precio = (isset($_POST['precio']) == TRUE) ? $_POST['precio'] : '';
        $sabor = $_POST['sabor'];
        $imagen = '' ;
        if(isset($_FILES["imagen"])){
            $file = $_FILES['imagen'];
            $nombre = $_FILES['imagen']['name'];
            $tipo = $file["type"];
            $ruta_provisional = $_FILES['imagen']['tmp_name'];
            $size = $file["size"];
            
            $carpeta = "imagenes/";
            if($tipo != 'image/jpg' && $tipo !='image/JPG' && $tipo != 'image/jpeg' && $tipo != 'image/png' && 'image/gif'){
                echo "El archivo no es una imagen";
            }else{
                $src = $carpeta.$nombre;
                move_uploaded_file($ruta_provisional,$src);
                $imagen ="imagenes/".$nombre;
            }
        }  
    
        


        //hacemos cadena con la sentencia mysql para insertar datos
        $sql = "INSERT INTO productos (idprod, nombre, categoria, descripccion,existencias,precio,sabor,imagen) VALUES('$id','$nom','$categoria','$descripcion','$existencia','$precio','$sabor','$imagen')";
        $conexion->query($sql); //aplicamos sentencia que inserta datos en la tabla usuarios de la base de datos
        if ($conexion->affected_rows >= 1) { //revisamos que se inserto un registro
            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>REIGSTRO INSERTADO</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
        } //fin

        //continaumos con la consulta de datos a la tabla usuarios
        //vemos datos en un tabla de html
        $sql = 'select * from productos'; //hacemos cadena con la sentencia mysql que consulta todo el contenido de la tabla
        $resultado = $conexion->query($sql); //aplicamos sentencia
    
        /*if ($resultado->num_rows) { //si la consulta genera registros
            echo '<div style="margin-left: 20px;">';
            echo '<table class="table table-hover" style="width:50%;">';

            echo '<tr>';
            echo '<th>id</th>';
            echo '<th>nombre</th>';
            echo '<th>categoria</th>';
            echo '<th>descripcion</th>';
            echo '<th>existencia</th>';
            echo '<th>Precio</th>';
            echo '<th>Sabor</th>';
            echo '<th>Imagen</th>';
            echo '</tr>';
            while ($fila = $resultado->fetch_assoc()) { //recorremos los registros obtenidos de la tabla
                echo '<tr>';
                echo '<td>' . $fila['idprod'] . '</td>';
                echo '<td>' . $fila['nombre'] . '</td>';
                echo '<td>' . $fila['categoria'] . '</td>';
                echo '<td>' . $fila['descripccion'] . '</td>';
                echo '<td>' . $fila['existencias'] . '</td>';
                echo '<td>' .'$'.$fila['precio'] . '</td>';
                echo '<td>' . $fila['sabor'] . '</td>';
                echo '<td>' . $fila['imagen'] . '</td>';
                echo '</tr>';
            }
            echo '</table">';
            echo '</div>';
        } else {
            echo "no hay datos";
        }*/

    } //fin 



}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="estilosa.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>ALTAS</title>
    <style>
        td,
        th {
            padding: 10px;

        }
    </style>
</head>

<body>

<?php require_once("menu.html");?>

   
   <div class="derecha">
    <div class="estiloformulario">
    <div class="container">
        <div class="row">
            <div class="col-4">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method='post' enctype="multipart/form-data">
                <form action="upload.php" method='post'>
                    <h2>ALTAS</h2>
                    <div class="form-group">
                        <label for="idprod">ID PRODUCTO</label>
                        <input type="number" name="idprod" class="form-control" id="idprod" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" name="nombre" id="nombre" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="categoria">Categoria</label>
                        <input type="text" id="categoria" name="categoria" class="form-control" placeholder=" ">
                    </div>
                    <div class="form-group">
                        <label for="descripcion">Descripcion</label>
                        <input name="descripcion" type="text" class="form-control" id="descripcion" placeholder="">
                    </div>

                    <div class="form-group">
                        <label for="existen">Existencias</label>
                        <input name="existen" type="text" class="form-control" id="existen" placeholder="">
                    </div>

                    <div class="form-group">
                        <label for="precio">Precio</label>
                        <input name="precio" type="text" class="form-control" id="precio" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="sabor">sabor</label>
                        <input name="sabor" type="text" class="form-control" id="sabor" placeholder="">
                    </div>
                    <div class="form-group">
                    <h6>Imagen</h6>
                   <input type="file" name="imagen" id="imagen" required>
                   <br>
                    <input type="submit" name="guardar" value="GUARDAR">
                    </div>
                    
                </form>
            </div> <!-- fin col -->
        </div> <!-- fin row -->
    </div> 
    </div>
    </div><!-- fin container -->
    <br><br>
</body>

</html>