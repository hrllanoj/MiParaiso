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
                <a href="index.php" class="nav-item nav-link active">Inicio</a>
                <a href="about.php" class="nav-item nav-link">Sobre Nosotros</a>
                <a href="contact.php" class="nav-item nav-link">Contáctenos</a>
                <a href="login.php" class="nav-item nav-link">Iniciar Sesión</a>
                
                <!--<div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                    <div class="dropdown-menu bg-light m-0">
                        <a href="gallery.html" class="dropdown-item">Gallery</a>
                        <a href="feature.html" class="dropdown-item">Features</a>
                        <a href="team.html" class="dropdown-item">Our Team</a>
                        <a href="testimonial.html" class="dropdown-item">Testimonial</a>
                        <a href="404.html" class="dropdown-item">404 Page</a>
                    </div>
                </div>-->
            </div>
            <div class="border-start ps-4 d-none d-lg-block">
                <button type="button" class="btn btn-sm p-0"><i class="fa fa-search"></i></button>
            </div>
        </div>
    </nav>
    <!-- Navbar End -->


    <!-- Carousel Start -->
    <div class="container-fluid px-0 mb-5">
        <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="img/carousel-1.jpg" alt="Image">
                    <div class="carousel-caption">
                        <div class="container">
                            <div class="row justify-content-start">
                                <div class="col-lg-8 text-start">
                                    <p class="fs-4 text-white">Bienvenido a Finca Mi Paraíso</p>
                                    <h1 class="display-1 text-white mb-5 animated slideInRight">La Finca con el Mejor Ganado</h1>
                                    <a href="about.php" class="btn btn-secondary rounded-pill py-3 px-5 animated slideInRight">Más Información</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="w-100" src="img/carousel-2.jpg" alt="Image">
                    <div class="carousel-caption">
                        <div class="container">
                            <div class="row justify-content-end">
                                <div class="col-lg-8 text-end">
                                    <p class="fs-4 text-white">Ganado del Alta Calidad</p>
                                    <h1 class="display-1 text-white mb-5 animated slideInRight">Compramos y Vendemos lo Mejor</h1>
                                    <a href="contact.php" class="btn btn-secondary rounded-pill py-3 px-5 animated slideInLeft">Más Información</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#header-carousel"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <!-- Carousel End -->


    <!-- About Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5 align-items-end">
                <div class="col-lg-6">
                    <div class="row g-2">
                        <div class="col-6 position-relative wow fadeIn" data-wow-delay="0.7s">
                            <div class="about-experience bg-secondary rounded">
                                <h1 class="display-1 mb-0">25</h1>
                                <small class="fs-5 fw-bold">Años de Experiencia</small>
                            </div>
                        </div>
                        <div class="col-6 wow fadeIn" data-wow-delay="0.1s">
                            <img class="img-fluid rounded" src="img/service-1.jpg">
                        </div>
                        <div class="col-6 wow fadeIn" data-wow-delay="0.3s">
                            <img class="img-fluid rounded" src="img/service-2.jpg">
                        </div>
                        <div class="col-6 wow fadeIn" data-wow-delay="0.5s">
                            <img class="img-fluid rounded" src="img/service-3.jpg">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                    <p class="section-title bg-white text-start text-primary pe-3">Nosotros</p>
                    <h1 class="mb-4">Conozca nuestra finca y nuestra historia</h1>
                    <p class="mb-4">Fundada con amor y perseverancia, la Finca - Mi Paraíso ha cultivado una pasión por el ganado que se ha transmitido a lo largo de generaciones, somos un legado que continuamos forjando día a día con arduo trabajo y amor por lo que hacemos. </p>
                    <p class="mb-4">Nuestra finca es un lugar donde la tradición se encuentra con la innovación. Mantenemos las enseñanzas de nuestros ancestros en el manejo del ganado, pero también incorporamos las últimas tecnologías y avances científicos para asegurarnos de que nuestros animales alcancen su máximo potencial genético. Esto se refleja en la excelencia de nuestros productos, ya sea que estés buscando ganado para carne, leche o cría. </p>
                    
                    <a class="btn btn-secondary rounded-pill py-3 px-5" href="about.php">Más información</a>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


    <!-- Features Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <p class="section-title bg-white text-start text-primary pe-3">Por qué nosotros!</p>
                    <h1 class="mb-4">Razones por las que la gente nos elige!</h1>
                    <p class="mb-4">Nuestras prácticas están arraigadas en el respeto por la naturaleza, la sostenibilidad y el bienestar animal. Cada animal en nuestra finca es tratado con el máximo cuidado, proporcionándoles un entorno enriquecedor y natural que promueve su salud y felicidad. Creemos que este enfoque no solo es ético, sino que también se traduce en un ganado de la más alta calidad.</p>
                </div>
                <div class="col-lg-6">
                    <div class="rounded overflow-hidden">
                        <div class="row g-0">
                            <div class="col-sm-6 wow fadeIn" data-wow-delay="0.1s">
                                <div class="text-center bg-primary py-5 px-4">
                                    <img class="img-fluid mb-4" src="img/experience.png" alt="">
                                    <h1 class="display-6 text-white" data-toggle="counter-up">25</h1>
                                    <span class="fs-5 fw-semi-bold text-secondary">Años de experiencia</span>
                                </div>
                            </div>
                            <div class="col-sm-6 wow fadeIn" data-wow-delay="0.3s">
                                <div class="text-center bg-secondary py-5 px-4">
                                    <img class="img-fluid mb-4" src="img/award.png" alt="">
                                    <h1 class="display-6" data-toggle="counter-up">15</h1>
                                    <span class="fs-5 fw-semi-bold text-primary">Reconocimientos</span>
                                </div>
                            </div>
                            <div class="col-sm-6 wow fadeIn" data-wow-delay="0.5s">
                                <div class="text-center bg-secondary py-5 px-4">
                                    <img class="img-fluid mb-4" src="img/animal.png" alt="">
                                    <h1 class="display-6" data-toggle="counter-up">2648</h1>
                                    <span class="fs-5 fw-semi-bold text-primary">Animales durante 25 años</span>
                                </div>
                            </div>
                            <div class="col-sm-6 wow fadeIn" data-wow-delay="0.7s">
                                <div class="text-center bg-primary py-5 px-4">
                                    <img class="img-fluid mb-4" src="img/client.png" alt="">
                                    <h1 class="display-6 text-white" data-toggle="counter-up">106</h1>
                                    <span class="fs-5 fw-semi-bold text-secondary">Clientes Fieles</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Features End -->


    <!-- Banner Start -->
    <div class="container-fluid banner my-5 py-5" data-parallax="scroll" data-image-src="img/banner.jpg">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.3s">
                    <div class="row g-4 align-items-center">
                        <div class="col-sm-4">
                            <img class="img-fluid rounded" src="img/banner-1.jpg" alt="">
                        </div>
                        <div class="col-sm-8">
                            <h2 class="text-white mb-3">Excelencia Ganadera</h2>
                            <p class="text-white mb-4">Nuestro compromiso inquebrantable con la cría selectiva y el cuidado integral ha cimentado nuestra reputación como proveedores de ejemplares ganaderos excepcionales, respaldados por generaciones de conocimiento y pasión.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                    <div class="row g-4 align-items-center">
                        <div class="col-sm-4">
                            <img class="img-fluid rounded" src="img/banner-2.jpg" alt="">
                        </div>
                        <div class="col-sm-8">
                            <h2 class="text-white mb-3">Calidad Certificada</h2>
                            <p class="text-white mb-4">Nuestra combinación única de tradición, innovación y un enfoque centrado en el bienestar animal garantiza que encontrarás en nuestra finca las soluciones ganaderas que superarán tus expectativas.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Banner End -->


    <!-- Service Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row gy-5 gx-4">
                <div class="col-lg-4 col-md-6 pt-5 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item d-flex h-100">
                        <div class="service-img">
                            <img class="img-fluid" src="img/service-1.jpg" alt="">
                        </div>
                        <div class="service-text p-5 pt-0">
                            <div class="service-icon">
                                <img class="img-fluid rounded-circle" src="img/service-1.jpg" alt="">
                            </div>
                            <h5 class="mb-3">Selección de Alta Calidad</h4>
                            <p class="mb-4">Cada uno de nuestros ejemplares es seleccionado meticulosamente y criado con el máximo cuidado, asegurando que solo el ganado de la más alta calidad forme parte de nuestro legado. Tu búsqueda de excelencia ganadera encuentra su hogar en nuestras tierras.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 pt-5 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="service-item d-flex h-100">
                        <div class="service-img">
                            <img class="img-fluid" src="img/service-2.jpg" alt="">
                        </div>
                        <div class="service-text p-5 pt-0">
                            <div class="service-icon">
                                <img class="img-fluid rounded-circle" src="img/service-2.jpg" alt="">
                            </div>
                            <h5 class="mb-3">Longevidad y Legado</h5>
                            <p class="mb-4">Nuestra finca ha resistido la prueba del tiempo y ha prosperado a lo largo de generaciones. La longevidad de Finca - Mi Paraíso es un testimonio de nuestro compromiso duradero con la cría responsable y el respeto por los animales.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 pt-5 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="service-item d-flex h-100">
                        <div class="service-img">
                            <img class="img-fluid" src="img/service-3.jpg" alt="">
                        </div>
                        <div class="service-text p-5 pt-0">
                            <div class="service-icon">
                                <img class="img-fluid rounded-circle" src="img/service-3.jpg" alt="">
                            </div>
                            <h5 class="mb-3">Experiencia que Cuenta</h5>
                            <p class="mb-4">Nuestro equipo está compuesto por expertos apasionados que entienden las complejidades de la cría y selección de ganado de calidad.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Service End -->


    <!-- Gallery Start -->
    <div class="container-xxl py-5 px-0">
        <div class="row g-0">
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="row g-0">
                    <div class="col-12">
                        <a class="d-block" href="img/gallery-5.jpg" data-lightbox="gallery">
                            <img class="img-fluid" src="img/gallery-5.jpg" alt="">
                        </a>
                    </div>
                    <div class="col-12">
                        <a class="d-block" href="img/gallery-1.jpg" data-lightbox="gallery">
                            <img class="img-fluid" src="img/gallery-1.jpg" alt="">
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                <div class="row g-0">
                    <div class="col-12">
                        <a class="d-block" href="img/gallery-2.jpg" data-lightbox="gallery">
                            <img class="img-fluid" src="img/gallery-2.jpg" alt="">
                        </a>
                    </div>
                    <div class="col-12">
                        <a class="d-block" href="img/gallery-6.jpg" data-lightbox="gallery">
                            <img class="img-fluid" src="img/gallery-6.jpg" alt="">
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                <div class="row g-0">
                    <div class="col-12">
                        <a class="d-block" href="img/gallery-7.jpg" data-lightbox="gallery">
                            <img class="img-fluid" src="img/gallery-7.jpg" alt="">
                        </a>
                    </div>
                    <div class="col-12">
                        <a class="d-block" href="img/gallery-3.jpg" data-lightbox="gallery">
                            <img class="img-fluid" src="img/gallery-3.jpg" alt="">
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.7s">
                <div class="row g-0">
                    <div class="col-12">
                        <a class="d-block" href="img/gallery-4.jpg" data-lightbox="gallery">
                            <img class="img-fluid" src="img/gallery-4.jpg" alt="">
                        </a>
                    </div>
                    <div class="col-12">
                        <a class="d-block" href="img/gallery-8.jpg" data-lightbox="gallery">
                            <img class="img-fluid" src="img/gallery-8.jpg" alt="">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Gallery End -->

    <!-- Testimonial Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <p class="section-title bg-white text-center text-primary px-3">Testimonios</p>
                <h1 class="mb-5">Qué dicen nuestros clientes?</h1>
            </div>
            <div class="row g-5 align-items-center">
                <div class="col-lg-5 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="testimonial-img">
                        <img class="img-fluid animated pulse infinite" src="img/testimonial-1.jpg" alt="">
                        <img class="img-fluid animated pulse infinite" src="img/testimonial-2.jpg" alt="">
                        <img class="img-fluid animated pulse infinite" src="img/testimonial-3.jpg" alt="">
                        <img class="img-fluid animated pulse infinite" src="img/testimonial-4.jpg" alt="">
                    </div>
                </div>
                <div class="col-lg-7 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="owl-carousel testimonial-carousel">
                        <div class="testimonial-item">
                            <img class="img-fluid mb-3" src="img/testimonial-1.jpg" alt="">
                            <p class="fs-5">Cuando empecé en el mundo de la ganadería, me sentía abrumada por la cantidad de opciones. Sin embargo, Finca - Mi Paraíso no solo me ofreció el mejor ganado, sino también el conocimiento y la asesoría que necesitaba para tomar decisiones informadas. Sus animales son de una calidad excepcional, y su equipo siempre está dispuesto a responder mis preguntas.</p>
                            <h5>María González</h5>
                            <span class="text-primary">Ganadera Novata</span>
                        </div>
                        <div class="testimonial-item">
                            <img class="img-fluid mb-3" src="img/testimonial-2.jpg" alt="">
                            <p class="fs-5">Como inversionista, siempre busco oportunidades que combinen calidad y seguridad. Finca - Mi Paraíso superó mis expectativas. La genética de su ganado es impresionante, y su enfoque en el bienestar animal garantiza la salud y productividad a largo plazo. Mi inversión aquí ha sido acertada, y recomiendo su expertise a cualquiera que busque resultados sólidos en la ganadería.</p>
                            <h5>Javier Rodríguez</h5>
                            <span class="text-primary">Inversionista Gandadero</span>
                        </div>
                        <div class="testimonial-item">
                            <img class="img-fluid mb-3" src="img/testimonial-3.jpg" alt="">
                            <p class="fs-5">Llevo años en la cría de ganado, y puedo decir que Finca - Mi Paraíso es un verdadero tesoro para la industria. Sus animales reflejan una calidad genética inigualable, y su compromiso con prácticas éticas es evidente en cada detalle. Además, su equipo comprende las necesidades de los criadores y ofrece soluciones a medida.</p>
                            <h5>Ana Martinez</h5>
                            <span class="text-primary">Criadora Experimentada</span>
                        </div>
                        <div class="testimonial-item">
                            <img class="img-fluid mb-3" src="img/testimonial-4.jpg" alt="">
                            <p class="fs-5">Como amante de la carne de calidad, encontrar Finca - Mi Paraíso fue un hallazgo increíble. Su ganado no solo es robusto y saludable, sino que también produce carne de sabor excepcional. Saber que los animales son criados en condiciones respetuosas y cuidadosas agrega un valor extra a mi elección. Si buscas carne de alta calidad y valores éticos, esta finca es el lugar adecuado.</p>
                            <h5>Carlos Lopez</h5>
                            <span class="text-primary">Amante de la Carne de Calidad</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonial End -->


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