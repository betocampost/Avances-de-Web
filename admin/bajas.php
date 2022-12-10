<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Bajas</title>

    <link rel="stylesheet" href="estilos2.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">



</head>


<body>

   
    <?php 
    require_once("menu.html");
    $servidor='localhost';
    $cuenta='root';
    $password='';
    $bd='proyectofinal';

  
     $conexion = new mysqli($servidor,$cuenta,$password,$bd);

     if($conexion->connect_errno){
        die('Error en la conexion');
     }else{
   
        if(isset($_POST['submit'])){
        
            $eliminar = $_POST['eliminar'];

         
            $sql = "DELETE FROM productos WHERE idprod='$eliminar' ";
            $conexion->query($sql);
            if($conexion->affected_rows >= 1){
                echo '<br> Registro borrado <br>';
            }//fin
        
        }
     }

     

     $sql = 'select * from productos';
     $resultado = $conexion -> query($sql);

     if($resultado -> num_rows){
        ?>
    <div style="display:flex;justify-content:center;padding-top:50px;" class="arriba">

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method='post'>
            <legend>Eliminar Productos</legend>
            <br>
            <select name="eliminar" class="browser-default custom-select">
                <?php
            while($fila = $resultado -> fetch_assoc()){
                echo '<option value="'.$fila["idprod"].'">'.$fila["nombre"].'</option>';
                
            }
            ?>

            </select>
            <br><br>
            <button type="submit" value="submit" name="submit">Eliminar</button>
        </form>
        </div>
   
    <?php
     }else{
        echo "No hay datos";
     }
    ?>

     <div class="abajo">
     
      <div class="estiloformulario">
    <table class="table table-striped" class=" card text-white bg-success mb-3" style="max-width: 65rem;" border="1">
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
            <td><?php echo $mostrar['precio'] ?></td>
            <td><?php echo $mostrar['sabor'] ?></td>
            <td><img src="<?php echo $mostrar['imagen'] ?>" alt="" width="120"></td>

        </tr>
        <?php
            }
            ?>

    </table>

    

    </div>
    </div>


</body>

</html>
