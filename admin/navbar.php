<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<link href="css/styles.css" rel="stylesheet" />

<nav class="navbar navbar-expand-lg navbar-dark bg-dark ">
    <div class="container px-5">
        <a class="navbar-brand" href="index.php">
            <img src="img/SucreNombre.png" style="width:30%;">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link active" aria-current="page" href="index.php">Inicio</a></li>
                <li class="nav-item"><a class="nav-link" href="admin/tienda.php">Tienda</a></li>
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