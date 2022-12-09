<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>Acerca De</title>
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
        <link rel="stylesheet" href='css/estilos.css'>
    </head>
    <body>
        <!-- Responsive navbar-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
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
        <!-- About section one-->
        <section class="py-5 bg-light" id="scroll-target">
            <div class="container px-5 my-5">
                <div class="row gx-5 align-items-center">
                    <div class="col-lg-6"><img class="img-fluid rounded mb-5 mb-lg-0" src="img/postre1.jpg" alt="..." /></div>
                    <div class="col-lg-6">
                        <h2 class="fw-bolder">Visión</h2>
                        <p class="lead fw-normal text-muted mb-0">Nuestro propósito es ser una empresa líder en el negocio de panadería y repostería, ofreciendo lo mejor que tenemos para nuestros clientes. 
                            Queremos destacarnos por la calidad y sabor de nuestros productos, atención y servicio al cliente.<br><br>Deseamos brindar la mejor calidad, honestidad y responsabilidad junto con trabajadores eficaces y talentosos.
                            Utilizando los más altos estándares de calidad y tecnología de vanguardia en nuestros procesos productivo
                        </p>
                    </div>
                </div>
            </div>
        </section>
        <!-- About section two-->
        <section class="py-5">
            <div class="container px-5 my-5">
                <div class="row gx-5 align-items-center">
                    <div class="col-lg-6 order-first order-lg-last"><img class="img-fluid rounded mb-5 mb-lg-0" src="img/postre3.jpg" alt="..." /></div>
                    <div class="col-lg-6">
                        <h2 class="fw-bolder">Misión</h2>
                        <p class="lead ">Somos una empresa cuya misión es elaborar productos de panadería, repostería, cafetería y refrigerios de la más alta calidad, utilizando lo mejores ingredientes y buena técnica; innovando en sabores y recetas, todo a un precio accesible.
                            <br><br>
                            Con el propósito de entregar a nuestros clientes, una experiencia inolvidable de sabor, en nuestras recetas gourmet, queremos establecer un liderazgo con la colaboración y creatividad de nuestro talento humano.
                        </p>
                    </div>
                </div>
            </div>
        </section>
        <!-- About section one-->
        <section class="py-5 bg-light" id="scroll-target">
            <div class="container px-5 my-5">
                <div class="row gx-5 align-items-center">
                    <div class="col-lg-6"><img class="img-fluid rounded mb-5 mb-lg-0" src="img/postre5.jpg" alt="..." /></div>
                    <div class="col-lg-6">
                        <h2 class="fw-bolder">Objetivos</h2><ul class="list-unstyled mb-4 lead ">
                            <li class="mb-2">
                                <i class="bi bi-check text-primary"></i>
                                Brindar una variedad de productos en pasteles que agraden el paladar de los clientes.
                            </li>
                            <li class="mb-2">
                                <i class="bi bi-check text-primary"></i>
                                Ofrecer economía en los productos para que estén al alcance de los consumidores. 
                            </li>
                            <li class="mb-2">
                                <i class="bi bi-check text-primary"></i>
                                Llevar a práctica los conocimientos adquiridos en el área de mercado.
                            </li>
                            <li class="mb-2">
                                <i class="bi bi-check text-primary"></i>
                                Que el producto sea conocido y que llegue a venderse en los grandes mercados.
                            </li>
                            <li class="mb-2">
                                <i class="bi bi-check text-primary"></i>
                                Producir producto de alta calidad, exquisito sabor y menor costo con el propósito de establecernos en el mercado.
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
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
