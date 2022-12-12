<?php
    function conexion(){
    $servidor='localhost';
    $cuenta='root';
    $password='';
    $bd='proyectofinal';
     
    //conexion a la base de datos
    $objconexion = new mysqli($servidor,$cuenta,$password,$bd);

    if ($objconexion->connect_errno){
         die('Error en la conexion');
    }else{
        return $objconexion;
    }

    }
conexion();
  
?>