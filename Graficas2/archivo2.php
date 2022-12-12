<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Graficos </title>
    
    <link rel="stylesheet" href="librerias/boostrap/css/bootstrap.css">
    <script src="librerias/jquery-3.6.1.min.js"></script>
    <script src="librerias/plotly-2.16.1.min.js"></script>
</head>
<body>
<?php require_once("../admin/menu.html"); ?>
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="panel panel-primary">
                    <div class="panel panel-heading">
                    Graficas Admin
                    </div>
                    <div class="panel panel-body">
                        <div class="row">
                            
                          <div class="col-sm-12">
                                <div id="cargaBarras"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>


<script>
    $(document).ready(function(){
      
       $('#cargaBarras').load('barras.php')
        $('#cargaLineal').load('lineal.php');
    })
</script>