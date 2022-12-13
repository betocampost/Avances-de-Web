 <?php
    require_once 'php/conexion.php';
    $conexion=conexion();
    $sql="SELECT mes,cantidad_vendida from ventas2";
    $result=mysqli_query($conexion,$sql);
    $valoresY=array();
    $valoresX=array();

    while ($ver=mysqli_fetch_row($result)){
        $valoresY[]=$ver[1];
        $valoresX[]=$ver[0];
    }
    
    $datosX=json_encode($valoresX);
    $datosY=json_encode($valoresY);
?>
<div id="graficaLineal"></div>

<script type="text/javascript">
    function crearCadenaLineal(json){
        var parsed = JSON.parse(json);
        var arr = [];
        for(var x in parsed){
            arr.push(parsed[x]);
        }
        return arr;
    }
</script>

<script type="text/javascript">
    
    datosX = crearCadenaLineal('<?php echo $datosX ?>');
    datosY = crearCadenaLineal('<?php echo $datosY ?>');
    
    var trace1 = {
        x: datosX,
        y: datosY,
        type: 'scatter',
        line: {
            color: 'blue',
            width: 1
        },
        marker: {
            color: '#F08080',
            size: 10
        }
    }
     var layout = {
  title: 'Ventas de pastel de cumpleaños',
  font:{
    family: 'Raleway, sans-serif'
  },

  xaxis: {
    tickangle: -35,
      title:'Mes'
  },
  yaxis: {
    title: 'Cantidad vendida',
    gridwidth: 2
  },
  bargap :0.05
};


    var data = [trace1];

    Plotly.newPlot('graficaLineal', data, layout);
</script>
 <?php
    require_once 'php/conexion.php';
    $conexion=conexion();
    $sql="SELECT idprod,existencias from productos";
    $result=mysqli_query($conexion,$sql);
    $valoresY=array();
    $valoresX=array();

    while ($ver=mysqli_fetch_row($result)){
        $valoresY[]=$ver[1];
        $valoresX[]=$ver[0];
    }
    
    $datosX=json_encode($valoresX);
    $datosY=json_encode($valoresY);
?>
<div id="graficaLineal"></div>

<script type="text/javascript">
    function crearCadenaLineal(json){
        var parsed = JSON.parse(json);
        var arr = [];
        for(var x in parsed){
            arr.push(parsed[x]);
        }
        return arr;
    }
</script>

<script type="text/javascript">
    
    datosX = crearCadenaLineal('<?php echo $datosX ?>');
    datosY = crearCadenaLineal('<?php echo $datosY ?>');
    
    var trace1 = {
        x: datosX,
        y: datosY,
        type: 'scatter',
        line: {
            color: 'blue',
            width: 1
        },
        marker: {
            color: '#F08080',
            size: 10
        }
    }
     var layout = {
  title: 'Rangos de precio',
  font:{
    family: 'Raleway, sans-serif'
  },

  xaxis: {
    tickangle: -35,
      title:'Mes'
  },
  yaxis: {
    title: 'Cantidad vendida',
    gridwidth: 2
  },
  bargap :0.05
};


    var data = [trace1];

    Plotly.newPlot('graficaLineal', data, layout);
</script>