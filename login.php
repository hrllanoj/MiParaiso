<?php
session_start();

$server = 'localhost';
$username = 'root';
$password = '';
$database = 'finca - mi paraiso';

try {
  $conn = new PDO("mysql:host=$server;dbname=$database;", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
  die('Connection Failed: ' . $e->getMessage());
}

if (isset($_GET['cerrar_sesion'])) {
  session_unset();
  session_destroy();
}

if (isset($_SESSION['user_id'])) {
  switch ($_SESSION['user_id']) {
    case 1:
      header('Location: ./ADMIN/index.php');
      exit();
      break;

    case 2:
      header('Location: ./ADMIN/index.php');
      exit();
      break;

    default:
      break;
  }
}

if (!empty($_POST['user']) && !empty($_POST['password'])) {
  $records = $conn->prepare('SELECT id, nombre, user, telefono, password, foto, rol_id FROM users WHERE user = :user');
  $records->bindParam(':user', $_POST['user']);
  $records->execute();
  $results = $records->fetch(PDO::FETCH_ASSOC);

  $message = '';

  if ($results && password_verify($_POST['password'], $results['password'])) {
    $rol = $results['rol_id'];
    $_SESSION['user_id'] = $results['rol_id'];
    $_SESSION['user_name'] = $results['nombre'];
    $_SESSION['user_foto'] = $results['foto'];

    switch ($rol) {
      case 1:
        header('Location: ./ADMIN/index.php');
        exit();
        break;

      case 2:
        header('Location: ./ADMIN/index.php');
        exit();
        break;

      default:
        break;
    }
  } else {
    session_destroy();
    $error = "Nombre de usuario o contraseña incorrecto";
    header("Location: login.php?error=" . $error);
    exit();
  }
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Finca - Mi Paraíso</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville:wght@700&family=Open+Sans:wght@400;500;600&display=swap" rel="stylesheet">   

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" role="status" style="width: 3rem; height: 3rem;"></div>
    </div>
    <!-- Spinner End -->


    <!-- Topbar Start -->
    <div class="container-fluid bg-dark px-0">
        <div class="row g-0 d-none d-lg-flex">
            <div class="col-lg-6 ps-5 text-start">
                <div class="h-100 d-inline-flex align-items-center text-light">
                    <span>Siguenos:</span>
                    <a class="btn btn-link text-light" href="https://www.facebook.com/"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-link text-light" href="https://twitter.com/?lang=es"><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-link text-light" href="https://co.linkedin.com/"><i class="fab fa-linkedin-in"></i></a>
                    <a class="btn btn-link text-light" href="https://www.instagram.com/fincamiparaisohn/?hl=es-la"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
            <div class="col-lg-6 text-end">
                <div class="h-100 bg-secondary d-inline-flex align-items-center text-dark py-2 px-4">
                    <span class="me-2 fw-semi-bold"><i class="fa fa-phone-alt me-2"></i>Llámanos :</span>
                    <span>+57 321 356 6642</span>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top px-4 px-lg-5">
        <a href="index.html" class="navbar-brand d-flex align-items-center">
            <!--Brand--><a class="brand" href="index.php"><img class="brand-logo" src="img/logo.jpeg" alt="" width="400" height="111"/></a>
        <button type="button" class="navbar-toggler me-0" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="index.php" class="nav-item nav-link">Inicio</a>
                <a href="about.php" class="nav-item nav-link">Sobre Nosotros</a>
                <a href="contact.php" class="nav-item nav-link">Contáctenos</a>
                <a href="login.php" class="nav-item nav-link active">Iniciar Sesión</a>
            </div>
            <div class="border-start ps-4 d-none d-lg-block">
                <button type="button" class="btn btn-sm p-0"><i class="fa fa-search"></i></button>
            </div>
        </div>
    </nav>
    <!-- Navbar End -->


    <!-- Product Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <p class="section-title bg-white text-center text-primary px-3">Iniciar Sesión</p>
            </div>
            <div class="row gy-5 gx-4">
                <div class="col-lg-4 col-md-6 pt-5 wow fadeInUp"> <!-- Esto es para que qede centrado-->
                </div>
                <div class="col-lg-4 col-md-6 pt-5 wow fadeInUp" data-wow-delay="0.3s">
                        <form action="login.php" method="POST">
                            <div class="service-text p-5 pt-0">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="user" placeholder="Usuario" required>
                                    <label for="user">Escriba su usuario</label><h2></h2>
                                </div>
                                <div class="form-floating">
                                    <input name="password" type="password" id="password" placeholder="Ingrese la contraseña" class="form-control" required>
                                    <label for="password">Escriba su contraseña</label> <p></p>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-secondary rounded-pill py-3 px-5">Iniciar Sesión</button>
                                </div>
                            </div>
                        </form>
                    </div>
                <div class="col-lg-4 col-md-6 pt-5 wow fadeInUp"> <!-- Esto es para que qede centrado-->
                </div>
            </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Product End -->


   <!-- Footer Start -->
   <div class="container-fluid bg-dark footer mt-5 py-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-white mb-4">Nuestro contacto</h5>
                    <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>Fresno - Tolima</p>
                    <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+57 321 356 6642</p>
                    <p class="mb-2"><i class="fa fa-envelope me-3"></i>miparaisofinca@gmail.com</p> <!-- Miparaiso23 -->
                    <div class="d-flex pt-3">
                        <a class="btn btn-square btn-secondary rounded-circle me-2" href="https://www.facebook.com/"><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-square btn-secondary rounded-circle me-2" href="https://twitter.com/?lang=es"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-square btn-secondary rounded-circle me-2" href="https://www.youtube.com/"><i class="fab fa-youtube"></i></a>
                        <a class="btn btn-square btn-secondary rounded-circle me-2" href="https://www.instagram.com/fincamiparaisohn/?hl=es-la"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-white mb-4">Links Rápidos</h5>
                    <a class="btn btn-link" href="index.php">Inicio</a>
                    <a class="btn btn-link" href="about.php">Sobre Nosotros</a>
                    <a class="btn btn-link" href="contact.php">Contáctenos</a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-white mb-4">Horas de Trabajo</h5>
                    <p class="mb-1">Lunes - Viernes</p>
                    <h6 class="text-light">08:00 am - 05:00 pm</h6>
                    <p class="mb-1">Sábado</p>
                    <h6 class="text-light">08:00 am - 12:00 pm</h6>
                    <p class="mb-1">Domingos</p>
                    <h6 class="text-light">Cerrado</h6>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-white mb-4">Boletín informativo</h5>
                    <p>Suscríbete para recibir detalles exclusivos</p>
                    <div class="position-relative w-100">
                        <input class="form-control bg-transparent w-100 py-3 ps-4 pe-5" type="text" placeholder="Your email">
                        <button type="button" class="btn btn-secondary py-2 position-absolute top-0 end-0 mt-2 me-2">Regístrese</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Copyright Start -->
    <div class="container-fluid bg-secondary text-body copyright py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                    &copy; <a class="fw-semi-bold" href="#">Finca Mi Paraíso</a> - 2023 Todos los derechos reservados.
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                    Diseñado por: <a class="fw-semi-bold" href="">Eva Maria Garcia Largo - Wendy Dayana Arcila Garcia - Laura Isabella Patiño Muñoz</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Copyright End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/parallax/parallax.min.js"></script>
    <script src="lib/lightbox/js/lightbox.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>