<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>Contacto</title>
        <!-- Favicon-->
        <link rel="apple-touch-icon" sizes="180x180" href="img/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="img/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="img/favicon-16x16.png">
        <link rel="manifest" href="img/site.webmanifest">
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
        <link rel="stylesheet" href="formulario/css/estilos.css">
        <link rel="stylesheet" href="formulario/css/font-awesome.css">
        <script src="js/jquery-3.2.1.js"></script>
        <script src="js/script.js"></script>
    </head>
    <body>
        <!-- Responsive navbar-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container px-5">
                <a class="navbar-brand" href="index.html">
                    <img src="img/SucreNombre.png" style="width:30%;">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="index.html">Inicio</a></li>
                        <li class="nav-item"><a class="nav-link" href="acercaDe.html">Acerca de</a></li>
                        <li class="nav-item"><a class="nav-link" href="ayuda.html">Ayuda</a></li>
                        <li class="nav-item"><a class="nav-link" href="contacto.php">Contáctanos</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <section class="form_wrap">
            <section class="cantact_info">
                <section class="info_title">
                    <img src="img/Sucre.png" style="width: 90%;">
                </section>
            </section>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" class="form_contact">
                <h2>Envíanos un mensaje</h2>
                <div class="user_info">
                    <label for="names">Nombre *</label>
                    <input type="text" id="names" name="nombre" required>
    
                    <label for="email">Correo electronico *</label>
                    <input type="text" id="email" name="correo" required>
    
                    <label for="mensaje">Mensaje *</label>
                    <textarea id="mensaje" name="mensaje" required></textarea> 
    
                    <input type="submit" name= "submit" value="ENVIAR" id="btnSend">
                </div>
            </form>
        </section>
        <?php
        if(isset($_POST['submit'])){
             // Llamando a los campos
            $nombre = $_POST['nombre'];
            $correo = $_POST['correo'];
            //$telefono = $_POST['telefono'];
            $mensaje = $_POST['mensaje'];
            // Datos para el correo
            $destinatario = "$correo";
            $asunto = "MENSAJE";
            $destinatario2 = "al232679@edu.uaa.mx";
            $asunto2 = "Bienvenido a nuestra web";
    
            $carta = "De: $nombre \n";
            $carta .= "Correo: $correo \n";  // .= Cocatenar al valor
            $carta .= "Mensaje: $mensaje";
    
            $respuesta = "$nombre, gracias por ponerte en contacto con nosotros, te responderemos a la brevedad \n";
    
            // Enviando Mensaje
            mail($destinatario2, $asunto, $carta);
            mail($destinatario,$asunto2,$respuesta);
    
            echo '<script>  swal("CORREO ENVIADO", "Revisa la bandeja de tu correo electronico", "success")</script>';
        }
        ?>
        <!-- Footer-->
        <footer class="py-5 bg-dark text-white-50">
            <div class="container px-5">
                <div class="social d-flex justify-content-center ">
                    <a class="mx-2" href="#!"><i class="fab fa-facebook-f"></i></a>
                </div>
                <br>
                <p class="m-0 text-center">Copyright &copy; Your Website 2022</p>
            </div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    </body>
</html>
