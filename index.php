<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NTI Principal</title>
    <link rel="icon" href="assets/img/icono.png">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/encabezado.css">
    <link rel="stylesheet" href="assets/css/footer.css">
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <!-- iconos fontawesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <!-- google fonts -->
    <!-- <link href="https://fonts.googleapis.com/css2?family=Caprasimo&display=swap" rel="stylesheet"> -->
</head>

<body>
    <header id="header">
        <!-- <a class="header-link" href="#">NTI</a> -->
        <a href="index.php">
            <div class="div-img-header"><img src="assets/img/icono.png" alt="icono-header"></div>
        </a>
        <nav id="nav-bar">
            <a class="nav-link" href="#">Inicio</a>
            <a class="nav-link link-login" href="login.php">Iniciar Sesión</a>
        </nav>
    </header>

    <div id="carouselExampleFade" class="carousel slide carousel-fade">
        <div class="carousel-inner">
            <div class="carousel-item active d-item">
                <img src="assets/img/img1.jpg" class="d-block w-100 d-img" alt="imagen1">
                <div class="carousel-caption top-0 mt-4 mb-4">
                    <h5 class="mt-lg-5  text-uppercase fw-bold">Notebooks de última generación</h5>
                    <br>
                    <h1 class="fw-bolder text-capitalize">Tu socio en productividad</h1>
                </div>
                <div class="carousel-caption mt-1">
                    <a href=""><button class="btn btn-light px-5 py-3 fs-5">Ver</button></a>
                </div>
            </div>
            <div class="carousel-item d-item">
                <img src="assets/img/img2.jpg" class="d-block w-100 d-img" alt="imagen2">
                <div class="carousel-caption top-0 mt-4 mb-4">
                    <h5 class="mt-lg-5  text-uppercase fw-bold">Explora la creatividad sin limites</h5>
                    <br>
                    <h1 class="fw-bolder text-capitalize">Notebooks de vanguardia para tu inspiración</h1>
                </div>
                <div class="carousel-caption mt-1">
                    <a href=""><button class="btn btn-light px-5 py-3 fs-5">Ver</button></a>
                </div>
            </div>
            <div class="carousel-item d-item">
                <img src="assets/img/img3.jpg" class="d-block w-100 d-img" alt="imagen3">
                <div class="carousel-caption top-0 mt-4 mb-4">
                    <h5 class="mt-lg-5  text-uppercase fw-bold">Notebooks de alto rendimiento</h5>
                    <br>
                    <h1 class="fw-bolder text-capitalize">¡Eleva tu experiencia!</h1>
                </div>
                <div class="carousel-caption mt-1">
                    <a href=""><button class="btn btn-light px-5 py-3 fs-5">Ver</button></a>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <section id="sct-welcome">
        <div class="container">
            <div class="item">
                <h2 class="div-text-welcome">¡Bienvenido al destino definitivo para tus necesidades tecnológicas!</h2>
                <p class="div-p-welcome">Descubre nuestra increíble gama de notebooks diseñados para potenciar tu productividad y elevar tu experiencia digital.
                    Desde potentes procesadores hasta impresionantes pantallas, tenemos el equipo perfecto para cada tarea y estilo de vida.
                    Explora nuestra selección y encuentra el compañero perfecto que se adapte a tus ambiciones. ¡Tu próximo nivel de
                    rendimiento comienza aquí!</p>
                <div class="div-btn">
                    <a href="" class="link-publicaciones"><button class="btn btn-dark px-5 py-2 btn-lg boton-icon">Ver Publicaciones <i class="fas fa-chevron-right icon"></i></button></a>
                </div>
            </div>
            <div class="item">
                <img src="assets/img/img4.jpg" alt="imagen1">
            </div>
        </div>
    </section>

    <section id="sct-link-formulario">
        <div class="container">
            <div class="elemento">
                <div class="div-ele">
                    <h2 class="div-h2-form">Suscribite o ingresá a tu cuenta</h2>
                </div>
                <div class="div-ele">
                    <a href="registro.php" class="link-button-form link-register"><button class="btn btn-light px-5 py-3 btn-lg boton-icon">Registrarse <i class="fas fa-chevron-right icon"></i></button></a>
                    <a href="login.php" class="link-button-form link-login"><button class="btn btn-outline-info px-5 py-3 btn-lg boton-icon">Iniciar Sesión <i class="fas fa-chevron-right icon"></i></button></a>
                </div>
            </div>
        </div>
    </section>

    <footer>
        <div class="footer-container">
            <div class="item">
                <span class="location-span">Buenos Aires, Argentina</span>
                <br>
                <a href="https://www.instagram.com" class="social-icon"><i class="fab fa-instagram"></i> Instagram</a>
                <a href="https://www.x.com" class="social-icon"><i class="fab fa-twitter"></i> Twitter</a>
                <br>
                <a href="https://www.facebook.com" class="social-icon"><i class="fab fa-facebook"></i> Facebook</a>
                <a href="https://www.youtube.com" class="social-icon"><i class="fab fa-youtube"></i> Youtube</a>
            </div>
            <div class="item">
                <span class="privacidad-span">Esta página respeta tu privacidad y se compromete a proteger la información personal que compartes con nosotros. Consulta nuestra política de privacidad para obtener más detalles sobre cómo manejamos y utilizamos tus datos.</span>
            </div>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>

</html>