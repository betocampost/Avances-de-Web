
   <?php
    require_once 'php/conexion.php';
    $conexion=conexion();
    $sql="SELECT nombre,existencias from productos";
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
<div id="graficaBarras"></div>
<script type="text/javascript">
    function crearCadenaBarras(json){
        var parsed = JSON.parse(json);
        var arr = [];
        for(var x in parsed){
            arr.push(parsed[x]);
        }
        return arr;
    }
</script>


<script type="text/javascript">
    
    datosX = crearCadenaBarras('<?php echo $datosX ?>');
    datosY = crearCadenaBarras('<?php echo $datosY ?>');
    
    var data = [
  {
    x: datosX,
    y: datosY,
    type: 'bar',
      marker: {
          color: '#F08080'
      }
  }
];
    var layout = {
  title: 'Productos en existencia',
  font:{
    family: 'Raleway, sans-serif'
  },

  xaxis: {
    tickangle: -30,
      title:'Producto'
  },
  yaxis: {
    title: 'Cantidad en existencia',
    gridwidth: 2
  },
  bargap :0.05
};

Plotly.newPlot('graficaBarras', data, layout);
</script>
<?php
    require_once 'php/conexion.php';
    $conexion=conexion();
    $sql="SELECT nombre,precio from productos";
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
  title: 'Rango de precios',
  font:{
    family: 'Raleway, sans-serif'
  },

  xaxis: {
    tickangle: -30,
      title:'Producto'
  },
  yaxis: {
    title: 'Precio',
    gridwidth: 2
  },
  bargap :0.05
};


    var data = [trace1];

    Plotly.newPlot('graficaLineal', data, layout);
</script>