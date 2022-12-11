<?php

$conexion=mysqli_connect('localhost','root','','proyectofinal');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>MENU</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="css/estilosindex.css">

</head>





<body>

    <?php require_once("menu.html"); ?>
<table class="table table-striped table-dark">
  <thead class="thead-dark">
    <tr>
      <th scope="col">ID PRODUCTO</th>
      <th scope="col">NOMBRE</th>
      <th scope="col">CATEGORIA</th>
      <th scope="col">DESCRIPCION</th>
      <th scope="col">EXISTENCIAS</th>
      <th scope="col">PRECIO</th>
      <th scope="col">SABOR</th>
      <th scope="col">IMAGEN</th>
    </tr>
  </thead>
  <tbody>
  <?php
               $sql='SELECT * from productos WHERE categoria="pasteles"';
                $result1 = $conexion -> query($sql);
                while($mostrar=mysqli_fetch_array($result1)){
                    
                
                
                ?>


        <tr>
            <td><?php echo $mostrar['idprod'] ?></td>
            <td><?php echo $mostrar['nombre'] ?></td>
            <td><?php echo $mostrar['categoria'] ?></td>
            <td><?php echo $mostrar['descripccion'] ?></td>
            <td><?php echo $mostrar['existencias'] ?></td>
            <td><?php echo '$'.$mostrar['precio'] ?></td>
            <td><?php echo $mostrar['sabor'] ?></td>
            <td class="imagen" class="hover"><img src="<?php echo $mostrar['imagen'] ?>" alt="" width="120"></td>

        </tr>
        <?php
            }
            ?>
  </tbody>
</table>

<table class="table table-striped table-dark">
  <thead class="thead-dark">
    <tr>
      <th scope="col">ID PRODUCTO</th>
      <th scope="col">NOMBRE</th>
      <th scope="col">CATEGORIA</th>
      <th scope="col">DESCRIPCION</th>
      <th scope="col">EXISTENCIAS</th>
      <th scope="col">PRECIO</th>
      <th scope="col">SABOR</th>
      <th scope="col">IMAGEN</th>
    </tr>
  </thead>
  <tbody>
  <?php
               $sql='SELECT * from productos WHERE categoria="panque"';
                $result1 = $conexion -> query($sql);
                while($mostrar=mysqli_fetch_array($result1)){
                    
                
                
                ?>


        <tr>
            <td><?php echo $mostrar['idprod'] ?></td>
            <td><?php echo $mostrar['nombre'] ?></td>
            <td><?php echo $mostrar['categoria'] ?></td>
            <td><?php echo $mostrar['descripccion'] ?></td>
            <td><?php echo $mostrar['existencias'] ?></td>
            <td><?php echo '$'.$mostrar['precio'] ?></td>
            <td><?php echo $mostrar['sabor'] ?></td>
            <td class="imagen" class="hover"><img src="<?php echo $mostrar['imagen'] ?>" alt="" width="120"></td>

        </tr>
        <?php
            }
            ?>
  </tbody>
</table>





</body>

</html>
