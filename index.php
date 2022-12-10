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
    <link href="css/styles.css" rel="stylesheet" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Hello, world!</title>

    
  </head>
  <body>
    <!-- Responsive navbar-->
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
  <!-- Header-->
  <header class="bg-dark text-white">
    <div class="container ">
        <div class="row justify-content-center">
            <div class="col-lg-5">
                <div class="text-center my-1">
                    <img src="img/SucreLogo.png" style="width:50%;">
                    <h3 class="display-5 fw-bolder mb-2">¡Los mejores postres caseros!</h3>
                    <p class="lead text-50 mb-3">Tenemos los ingredientes de la mayor calidad para que tú y tu familia disfruten de nuestras dulces delicias </p>
                    <div class="d-grid gap-4 d-sm-flex justify-content-sm-center mb-5">
                        <a class="btn btn-outline-light btn-lg px-4" href="#!">Haz tu pedido</a>
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
                  <div class="text-muted">Únete a nuestra comunidad y sé el primero en enterarte sobre nuestras ofertas y nuevas recetas</div>
                  <hr>
                  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post"  >
                    <div class="form-group">
                        <label for="inputEmail">SUSCRIBETE!</label>
                        
                        <input name ="email" type="email" class="form-control" placeholder="Introduce tu correo" />
                    </div>
                    <input type="submit" name= "submit" class="btn btn-primary" value="Suscribirse" >
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
   if (!empty($_POST['email'])){
    $email = $_POST['email'];
    $asunto = "Gracias por SUSCRIBIRTE!!";
    $mensajeCorreo = "Aqui esta ti descuento: 12345";
 
   
       mail($email, $asunto, $mensajeCorreo);
       
          
          echo '<script>  swal("CORREO ENVIADO, GRACIAS POR TU SUSCRIPCION", "Revisa la bandeja de tu correo electronico", "success")</script>';
         

   }
   

  ?>
 
  <!-- Testimonials section-->
  <section class="py-5 border-bottom">
    <div class="container px-5 my-5 px-5">
        <div class="text-center mb-5">
            <h2 class="fw-bolder">Los favoritos del Chef</h2>
            <p class="lead mb-0">Conoce los postres que más le gustan a nuestros clientes</p>
        </div>
        <div class="row gx-4 justify-content-center">
            <div class="col-lg-7">
                <!-- Testimonial 1-->
                <div class="card mb-4">
                    <div class="card-body p-3">
                        <div class="d-flex">
                            <div class="flex-shrink-0">
                                <img src="img/postre4.jpg" style="width:150px;">
                            </div>
                            <div class="text-center ms-4">
                                <h4>Pastelillos de frambuesa</h4>
                                <p class="lead ">Deliciosos bizcochos hechos con frambuesas de la mejor calidad</p>
                                <button type="button" class="btn btn-dark">¡Pruébalo!</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Testimonial 2-->
                <div class="card">
                    <div class="card-body p-3">
                        <div class="d-flex">
                            <div class="flex-shrink-0">
                                <img src="img/postre2.jpg" style="width:150px;">
                            </div>
                            <div class="text-center ms-4">
                                <h4>Pay de manzana</h4>
                                <p class="lead ">Delicada tarta de fruta elaborada con una masa recubierta de manzana</p>
                                <button type="button" class="btn btn-dark">¡Pruébalo!</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Pricing section-->
<section class="bg-light py-5 border-bottom">
    <div class="container px-5 my-5">
        <div class="text-center mb-5">
            <h2 class="fw-bolder">¡Tenemos cupones para ti!</h2>
            <p class="lead mb-0">Accede a tentadores descuentos que tenemos disponibles</p>
        </div>
        <div class="row gx-5 justify-content-center">
            <!-- Pricing card free-->
            <div class="col-lg-6 col-xl-4">
                <div class="card mb-5 mb-xl-0">
                    <div class="card-body p-5 ">
                        <div class="mb-3">
                            <span class="display-4 fw-bold">15%</span>
                            <span class="text-muted">de descuento</span>
                            <div class="small text-uppercase fw-bold text-muted">¡En tu primera compra!</div>
                        </div>
                        <div class="mb-3">
                            <div class="small text-muted">Si tu pedido es mayor a $100, ingresa el siguiente código para obtener un tentador descuento</div>
                        </div>
                        <div class="mb-4 text-center">
                            <button type="button" class="btn btn-secondary">primerpostre100</button>
                        </div>
                        <div class="d-grid"><a class="btn btn-outline-secondary" href="#!">¡Úsalo!</a></div>
                    </div>
                </div>
            </div>
            <!-- Pricing card enterprise-->
            <div class="col-lg-6 col-xl-4">
                <div class="card mb-5 mb-xl-0">
                    <div class="card-body p-5 ">
                        <div class="mb-3">
                            <span class="display-4 fw-bold">GRATIS</span>
                            <div class="small text-uppercase fw-bold text-muted">¡Te regalamos un postre!</div>
                        </div>
                        <div class="mb-3">
                            <div class="small text-muted">Si pides dos de los postres de nuestro menú, ¡el tercero va por nuestra cuenta!</div>
                        </div>
                        <div class="d-grid"><a class="btn btn-outline-secondary" href="#!">¡Úsalo!</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Carousel-->
<div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="img/carrusel1.jpg" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="img/carrusel2.jpg" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="img/carrusel3.jpg" class="d-block w-100" alt="...">
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
  
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
<script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script>
       $(document).ready(function(){
            $('#exampleModal').modal('show');
        }); 
    </script>
  </body>
</html>