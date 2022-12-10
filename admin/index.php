<?php

$conexion=mysqli_connect('localhost','root','','proyectofinal');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>MENU</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="estilos.css"/>

</head>





<body>
       
<?php require_once("menu.html"); ?>
       <br>
       
      <table class="table table-striped" class=" card text-white bg-success mb-3" border="1" >
                <tr>
                  <td><h5>IdProd</h5></td>
                   <td><h5>Nombre</h5></td>
                   <td><h5>Categoria</h5></td>
                   <td><h5>Descripccion</h5></td>
                   <td><h5>Existencia</h5></td>
                   <td><h5>Precio</h5></td>
                   <td><h5>Sabor</h5></td>
                   <td><h5>Imagen</h5></td>

                </tr>
                
                <?php
                $sql='SELECT * from productos';
                $result = $conexion -> query($sql);
                
                while($mostrar=mysqli_fetch_array($result)){
                    
                
                
                ?>
                
                
                <tr>
                    <td><?php echo $mostrar['idprod'] ?></td>
                    <td><?php echo $mostrar['nombre'] ?></td>
                    <td><?php echo $mostrar['categoria'] ?></td>
                    <td><?php echo $mostrar['descripccion'] ?></td>
                    <td><?php echo $mostrar['existencias'] ?></td>
                    <td><?php echo '$'.$mostrar['precio'] ?></td>
                    <td><?php echo $mostrar['sabor'] ?></td>
                    <td><img src="<?php echo $mostrar['imagen'] ?>" alt="" width="120"></td>

                </tr>
            <?php
            }
            ?>
            
        </table>
 
   
   
    
</body>
</html>