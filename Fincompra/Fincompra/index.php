<?php session_start(); ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Sucré</title>
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
    
   <script type="text/javascript" src="js/funcionamiento.js"></script>
   <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- Favicon-->
    <link rel="apple-touch-icon" sizes="180x180" href="img/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="img/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="img/favicon-16x16.png">
    <link rel="manifest" href="img/site.webmanifest"><!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="estilos.css" rel="stylesheet" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Hello, world!</title>

    
  </head>
<body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark ">
      <div class="container px-5">
          <a class="navbar-brand" href="index.php">
              <img src="img/SucreNombre.png" style="width:30%;">
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                  <li class="nav-item"><a class="nav-link active" aria-current="page" href="index.php">Inicio</a></li>
                  <li class="nav-item"><a class="nav-link" href="acercaDe.php">Acerca de</a></li>
                  <li class="nav-item"><a class="nav-link" href="ayuda.php">Ayuda</a></li>
                  <li class="nav-item"><a class="nav-link" href="contacto.php">Contáctanos</a></li>
             
                    <?php 
                    // Comprobar si el usuario ya ha iniciado la sesión
                  if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){ ?>
                  
                   <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle btn btn-outline-warning" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false" style="color:white; font-size:20px;">
                            <span class="fa fa-user-circle"></span>
                            <?php echo htmlspecialchars($_SESSION["username"]); /*style="color:white; background-color:#e9bd15"*/?>
                        </a>
                        <ul class="dropdown-menu">
                            
                            <li><a class="dropdown-item " href="reset-password.php">Cambia tu contraseña</a></li>
                            <li><a class="dropdown-item "href="logout.php">Cierra la sesión</a></li>
                        </ul>
                    </li>

                 <?php }else{?>
                    <li class="nav-item"><a class="nav-link" href="login.php">Iniciar Sesion</a></li>
                 <?php } ?>
                    
              </ul>
          </div>
      </div>
  </nav>
       <?php 
                    // Comprobar si el usuario ya ha iniciado la sesión
                  if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){ ?>
     <form class="form" action="ppp.php" method="POST">
      
        <table class="tabla2">
          <th id="tit" colspan="">Datos de envio</th>
          <tr>
           
          </tr>
          <tr>
            <td >
              <label for="fname">Ubicacion</label><br />
    
              <input type="text" name="ubicacion" maxlength="20" placeholder="Mexico" required="">
             
               <br />

            </td>
          </tr>
          
          <tr>
              <td colspan="">
              <label for="">Nombre:</label><br />
             <input type="text" name="nombre" maxlength="50" placeholder="Andrea" required="">
             
             
              </td>
              <tr>
              <td colspan="">
                  <label for="">Apellido:</label><br />
             <input type="text" name="apellido" maxlength="50" placeholder="Candelario" required="">
              </td>
              </tr>
          </tr>
          <tr>
            <td colspan="">
              <label for="cel">Numero de celular:</label><br />
              <input id="cel" name="celular" type="tel" placeholder="000 0000 000" required="">
            </td>
          </tr>
          <tr>
             <td colspan="">
              <label for="">Email:</label><br />
             <input type=email name="email" maxlength="25" placeholder="andrea@outlook.com" required="">
             </td>
          </tr>
          <tr>
             <td colspan="">
                  <label for="">Direccion:</label><br />
             <input type="text" name="direccion" maxlength="50" required="">
              </td>
          </tr>
          
          <tr>
             <td colspan="">
                  <label for="">Referencias:</label><br />
             <input type="text" name="referencias" maxlength="50" placeholder="Departamento, tienda cercana, etc." required="">
              </td>
          </tr>
          <tr>
            <td colspan="">
              <label for="">Codigo Postal:</label><br />
              <input type=cel name="codigopostal" maxlength="5"placeholder="00000" required="">
            </td>
          </tr>
          <tr>
              <td>
                 <label for="">Tipo de envio:</label><br />
                  <select class='dropdown-btn' id='current-card' name="tipoenvio">
                                         <option name="envio" value="estandar">Estandar ($0 MX)</option>
                                         <option name="envio" value="express">Express ($100 MX)</option>
                                        
                                     </select>
              </td>
          </tr>
          
          
            <th colspan="">
             <div class="form-group-boton-enviar">
                                    <button
                                    name="submit" type="submit" class="" value=Pagar>Pagar</button>
                                </div>
             
            </th>
         
        </table>
    
    </form>
    <?php }else{ header("Location: ../login.php"); }  ?>
    
</body>
</html>






