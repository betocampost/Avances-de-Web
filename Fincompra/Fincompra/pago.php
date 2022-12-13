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

    <link rel="stylesheet" href="envio2.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Hello, world!</title>


  </head>
<body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark ">
      <div class="container px-5">
          <a class="navbar-brand" href="index.php">
              <img src="../img/SucreNombre.png" style="width:30%;">
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                  <li class="nav-item"><a class="nav-link active" aria-current="page" href="../index.php">Inicio</a></li>
                  <li class="nav-item"><a class="nav-link" href="../acercaDe.php">Acerca de</a></li>
                  <li class="nav-item"><a class="nav-link" href="../ayuda.php">Ayuda</a></li>
                  <li class="nav-item"><a class="nav-link" href="../contacto.php">Contáctanos</a></li>

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


 <div class='grid'>
         <div class='window'>
             <div class='order-info'>
                 <div class='order-info-content'>
                     <h2>Pago en OXXO</h2>
                     <div class='line'></div>
                  <img src="images/muestrapagooxxo.jpg" alt="" style="width:380px;">
                                <div style="height: 50px; margin-top: 12%;"><a href="../Correo/enviarcorreo.php"><button style="margin-left:1.5%; margin-top: 2.5%; background-color: #22b877; border-radius: 8px; border:none; width: 370px; height: 41px; color: white;" onclick="alert('Se ha enviado el correo, pronto lo recibiras!');">Enviar Recibo de pago por correo</button></a></div>

                  <a href="../recibo_oxxo/pdf/index.php"><button style="margin-left:1.5%; margin-top: 8%; background-color: #22b877; border-radius: 8px; border:none; width: 370px; height: 41px; color: white;">

                  Imprimir Comprobante</button></a>
                 </div>
             </div>
             <div class='credit-info'>
                 <div class='credit-info-content'>
                     <table class='half-input-table'>
                         <tr>
                             <td>Selecciona tu tarjeta: </td>
                             <td>
                                 <form action="">

                                     <select class='dropdown-btn' id='current-card' name="cards">
                                         <option value="Visa">VISA</option>
                                         <option value="mastercard">MASTERACRD</option>
                                         <option value="opel">American expresss</option>
                                         <option value="maestro">Maestro</option>
                                     </select>
                                     <br><br>

                                 </form>
                         </div>


                             </td>
                         </tr>
                     </table>
                     <img src='images/tarjetas.jpg' height='80' class='credit-card-image' id='credit-card-image' style="border-radius:10px;"></img>
                     Nombre del titular:
                     <input type="text" class='input-field' checked=""></input>
                     Numero de tarjeta:
                     <input name="" type="cel" class='input-field' checked=""></input>
                     <table class='half-input-table'>
                         <tr>
                             <td> Fecha expiracion:
                                 <input class='input-field' placeholder="MM/YY"></input>
                             </td>
                             <td>CVC:
                                 <input class='input-field'></input>
                             </td>
                         </tr>
                     </table>
                     <button class='pay-btn'>Continuar</button>



             </div>

</div>

</div>
</div>



             </body>

             </html>


