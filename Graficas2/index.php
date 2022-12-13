<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
     <link rel="stylesheet" href="estilos.css" type="text/css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.css" />

  </head>
  <body>
  <?php require_once("../admin/menu.html"); ?>
    <div class="card">
    <div class="card-header">
    Ventas Pasteleria
  </div>
  <div class="card-body">
   <div class="row">
       <div class="col-lg-2">
           <a href="archivo2.php"><button  class="btn btn-primary" onclick="CargarDatosGraficoBar()">Ver grafica 1</button></a>
        
       <canvas id="myChart" width="400" height="400"></canvas>
   </div>
    
 
  </div>
</div>

   
  </body>
</html>