<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    require('fpdf.php');

    ini_set('date.timezone', 'America/Mexico_City');
    $time1 = date('l jS \de F Y', time());

    $nombre = "Carrito";
    $apellido = "Compra";
    $curso = "Recibo de Pago";


    $cliente = $_SESSION["username"];
    $pdf = new FPDF('L', 'cm', 'Letter');
    $pdf->AddPage();
    $pdf->Image('MarcoV2.png', 0, 0, 28, 21.54);
    $pdf->Image('logoV1.png', 11, 6, 5, 5);
    $pdf->SetY(3);
    $pdf->SetFont('Arial', 'B', 24);
    $pdf->SetTitle("Comprobante de Pago " . $cliente . ".pdf", true);
    $pdf->SetDrawColor(0, 0, 0);
    $pdf->SetFontSize(30);
    $pdf->Cell(0, 0, 'Recibo de pago OXXO', 0, 1, 'C');
    $pdf->SetFontSize(20);
    $pdf->Cell(0, 2, 'Cuenta con 48 Horas Habiles para pagar', 0, 1, 'C');



/*
    METER AQUI LA LISTA DE PRODUCTOS PARA MOSTRARLAS EN EL RECIBO

*/



    $pdf->SetFontSize(20);
    $pdf->Cell(0, 2, '"Total a pagar:"' . ' ' , 0, 1, 'C');

    $total = $_SESSION["total"];
    $pdf->Cell(0, 2, "$ ". $total . ' MXN', 0, 1, 'C');

    $pdf->SetFont('Arial', '', 15);
    #$pdf->Cell(0, 2, 'Por haber realizado el curso "' . $curso . '" en una duracion de ' . $duracion . " semanas", 0, 1, 'C');
    $pdf->Cell(0, 2, 'Fecha de compra: ' . $time1, 0, 1, 'C');
    $pdf->SetLeftMargin(2);
    $pdf->SetRightMargin(2);
    $pdf->SetFont('Arial', 'B', 15);
    $pdf->Cell(0, 1,  "Sucre ", 0, 0.5, 'R');
    $pdf->Cell(24, 1, "Pasteleria ", 0, 0.5, 'R');
    $pdf->Cell(16, 0,  "Escanee este codigo en caja!", 0, 0.5, 'R');
    $pdf->Image('codigobarra.png', 9, 14, 10, 4);
    $pdf->Ln();
    $pdf->SetFont('Arial', '', 15);
    $pdf->Image('logooxxo.png', 23, 12.5, 3);
    $pdf->Cell(5.5, 4.5, "Nombre del Cliente", 0, 0.5, 'R');
    $pdf->Cell(0, -2,  $cliente, 0, 1, 'L');



    $pdf->Output();
}
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Sucré</title>
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.10.2.min.js"></script>

    <script type="text/javascript" src="js/funcionamiento.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- Favicon-->
    <link rel="apple-touch-icon" sizes="180x180" href="img/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../img/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../img/favicon-16x16.png">
    <link rel="manifest" href="img/site.webmanifest"><!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Hello, world!</title>


</head>

<body>
    <!-- Responsive navbar-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark ">
        <div class="container px-5">
            <a class="navbar-brand" href="index.php">
                <img src="../img/SucreNombre.png" style="width:30%;">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="index.php">Inicio</a></li>
                    <li class="nav-item"><a class="nav-link" href="../../admin/tienda.php">Tienda</a></li>
                    <li class="nav-item"><a class="nav-link" href="../../acercaDe.php">Acerca de</a></li>
                    <li class="nav-item"><a class="nav-link" href="../../ayuda.php">Ayuda</a></li>
                    <li class="nav-item"><a class="nav-link" href="../../contacto.php">Contáctanos</a></li>

                    <?php
                    // Comprobar si el usuario ya ha iniciado la sesión
                    if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) { ?>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle btn btn-outline-warning" href="#" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false" style="color:white; font-size:20px;">
                            <span class="fa fa-user-circle"></span>
                            <?php echo htmlspecialchars($_SESSION["username"]); /*style="color:white; background-color:#e9bd15"*/?>
                        </a>
                        <ul class="dropdown-menu">

                            <li><a class="dropdown-item " href="reset-password.php">Cambia tu contraseña</a></li>
                            <li><a class="dropdown-item " href="logout.php">Cierra la sesión</a></li>
                        </ul>
                    </li>

                    <?php } else { ?>
                    <li class="nav-item"><a class="nav-link" href="login.php">Iniciar Sesion</a></li>
                    <?php } ?>

                </ul>
            </div>
        </div>
    </nav>
    <!-- Header-->
    <header class="bg-dark text-white">
        <div class="container ">
            <div class="row justify-content-center">
                <div class="col-lg-5">
                    <div class="text-center my-1">
                        <img src="../img/SucreLogo.png" style="width:50%;">
                        <h3 class="display-5 fw-bolder mb-2">Obtenga aqui su recibo para pagar en OXXO</h3>
                        <p class="lead text-50 mb-3">Por procedimiento necesitamos su autorizacion para mostrar su nombre de usuario y total a pagar </p>
                        <div class="d-grid gap-4 d-sm-flex justify-content-sm-center mb-5">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <div class="mb-3">
                        <span class="text-muted fw-bold small text-uppercase">¡Suscríbete y disfruta!</span>
                        <br>
                        <span class="display-6 fw-bold">10% de descuento</span>
                        <div class="text-muted">Únete a nuestra comunidad y sé el primero en enterarte sobre nuestras
                            ofertas y nuevas recetas</div>
                        <hr>
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                            <div class="form-group">
                                <label for="inputEmail">SUSCRIBETE!</label>

                                <input name="email" type="email" class="form-control"
                                    placeholder="Introduce tu correo" />
                            </div>
                            <input type="submit" name="submit" class="btn btn-primary" value="Suscribirse">
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Ahora no</button>


            </div>
        </div>
    </div>
    </div>

    <?php
  if (!empty($_POST['email'])) {
      $email = $_POST['email'];
      $asunto = "Gracias por SUSCRIBIRTE!!";
      $mensajeCorreo = "Aqui esta ti descuento: 12345";


      mail($email, $asunto, $mensajeCorreo);


      echo '<script>  swal("CORREO ENVIADO, GRACIAS POR TU SUSCRIPCION", "Revisa la bandeja de tu correo electronico", "success")</script>';


  }


  ?>
    <h1 style="text-align:center;">Generar Formulario</h1>
    <form action=" <?= $_SERVER["PHP_SELF"] ?>" method="POST">

        <button type="submit" value="Crear PDF" style="margin-left:47%;">Crear PDF</button>
    </form>
</body>


</html>