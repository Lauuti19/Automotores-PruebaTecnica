<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Todo Marcas | Junín</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="shortcut icon" href="./public/favicon.ico" type="image/x-icon">
    <style>
        .carousel-img {
        height: 600px;
        object-fit: cover;
        filter: brightness(60%);
        }
   
        .img-destacado {
  height: 320px;
  object-fit: cover;
}

    </style>

</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid px-5 py-3">

            <a class="navbar-brand" href="#">
                <img src="./public/logo.png" alt="Logo Todo Marcas" height="50">
            </a>

            <button class="navbar-toggler" type="button" 
                    data-bs-toggle="collapse" 
                    data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link active" href="#">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Catálogo</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contacto</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled">Ingresar</a>
                </li>
                </ul>
            </div>

            </div>
        </nav>
        </header>

        <div id="carouselAutos" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-inner">

                <div class="carousel-item active position-relative">
                <img src="./public/honda-civic.jpg" 
                    class="d-block w-100 carousel-img" 
                    style="filter: brightness(60%);"
                    alt="Honda Civic">

                <div class="carousel-caption d-flex flex-column justify-content-center h-100">
                    <h2 class="display-2 fw-bold">Honda Civic</h2>
                </div>
                </div>

                <div class="carousel-item position-relative">
                <img src="./public/toyota-hilux.jpg" 
                    class="d-block w-100 carousel-img" 
                    style="filter: brightness(60%);"
                    alt="Toyota Hilux">

                <div class="carousel-caption d-flex flex-column justify-content-center h-100">
                    <h2 class="display-2 fw-bold">Toyota Hilux</h2>
                </div>
                </div>

                <div class="carousel-item position-relative">
                <img src="./public/jeep-renegade.avif" 
                    class="d-block w-100 carousel-img" 
                    style="filter: brightness(60%);"
                    alt="Jeep Renegade">

                <div class="carousel-caption d-flex flex-column justify-content-center h-100">
                    <h2 class="display-2 fw-bold">Jeep Renegade</h2>
                </div>
                </div>

            </div>
            </div>


         <section class="container py-5 text-center">
            <h2 class="mb-4">¿Por qué elegirnos?</h2>
            <div class="row">
                <div class="col-md-4">
                <h5>Amplia variedad</h5>
                <p>Tenemos autos nuevos y usados certificados.</p>
                </div>
                <div class="col-md-4">
                <h5>Financiación</h5>
                <p>Planes flexibles adaptados a tu presupuesto.</p>
                </div>
                <div class="col-md-4">
                <h5>Atención personalizada</h5>
                <p>Te acompañamos en todo el proceso.</p>
                </div>
            </div>
        </section>

        <section class="container py-5">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-4 mb-lg-0">
                <div id="carouselDestacados" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="card shadow-sm border-0">
                        <img src="./imgs/chevrolet-cruze-blanco.avif" 
                            class="card-img-top img-destacado" 
                            alt="">
                        <div class="card-body text-center">
                            <h5 class="card-title">Chevrolet Cruze</h5>
                            <p class="card-text">$23.000.000</p>
                        </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="card shadow-sm border-0">
                        <img src="./imgs/toyota-hilux-negra.png" 
                            class="card-img-top img-destacado" 
                            alt="">
                        <div class="card-body text-center">
                            <h5 class="card-title">Toyota Hilux</h5>
                            <p class="card-text">$35.000.000</p>
                        </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="card shadow-sm border-0">
                        <img src="./imgs/chevrolet-cruze-blanco.avif" 
                            class="card-img-top img-destacado" 
                            alt="">
                        <div class="card-body text-center">
                            <h5 class="card-title">Peugeot 208</h5>
                            <p class="card-text">$21.500.000</p>
                        </div>
                        </div>
                    </div>
                    </div>
                    <button class="carousel-control-prev" type="button"
                            data-bs-target="#carouselDestacados"
                            data-bs-slide="prev">
                    <span class="carousel-control-prev-icon bg-dark rounded-circle p-3"></span>
                    </button>
                    <button class="carousel-control-next" type="button"
                            data-bs-target="#carouselDestacados"
                            data-bs-slide="next">
                    <span class="carousel-control-next-icon bg-dark rounded-circle p-3"></span>
                    </button>
                </div>
                </div>
                <div class="col-lg-6">
                <h2 class="mb-3">Vehículos Destacados</h2>
                <p class="lead">
                    Descubrí nuestras mejores oportunidades seleccionadas.
                    Vehículos revisados, listos para entrega inmediata
                    y con opciones de financiación.
                </p>
                <ul class="list-unstyled mt-4">
                    <li>• Entrega inmediata</li>
                    <li>• Financiación disponible</li>
                    <li>• Garantía asegurada</li>
                </ul>
                <a href="#" class="btn btn-dark mt-3">
                    Ver catálogo completo
                </a>
                </div>
            </div>
        </section>

        <section class="bg-dark text-light pt-5 pb-4">
            <div class="container">
                <div class="row">
                <div class="col-lg-6 mb-4">
                    <h2 class="mb-3">Contáctanos</h2>
                    <p class="text-secondary">
                    ¿Tienes preguntas o quieres programar una prueba de manejo?
                    Déjanos tu mensaje y te responderemos a la brevedad.
                    </p>

                    <form>
                    <div class="mb-3">
                        <input type="text" class="form-control" placeholder="Nombre completo" required>
                    </div>

                    <div class="mb-3">
                        <input type="email" class="form-control" placeholder="Correo electrónico" required>
                    </div>

                    <div class="mb-3">
                        <textarea class="form-control" rows="4" placeholder="Mensaje" required></textarea>
                    </div>

                    <button type="submit" class="btn btn-light w-100">
                        Enviar mensaje
                    </button>
                    </form>
                </div>

                <div class="col-lg-6">
                    <h4 class="mb-3">Información de contacto</h4>

                    <p><strong>⚐ Dirección:</strong> Av. San Martín 123, Junín</p>
                    <p><strong>✆ Teléfono:</strong> +54 9 236 123 4567</p>
                    <p><strong>✉︎ Email:</strong> info@todomarcas.com</p>

                    <hr class="border-secondary">

                    <h5 class="mt-4">Horarios</h5>
                    <p class="mb-1">Lunes a Viernes: 9:00 - 18:00</p>
                    <p>Sábados: 9:00 - 13:00</p>

                    <div class="mt-4">
                    <a href="#" class="text-light me-3">Facebook</a>
                    <a href="#" class="text-light me-3">Instagram</a>
                    <a href="#" class="text-light">WhatsApp</a>
                    </div>
                </div>

                </div>

                <div class="text-center mt-5 pt-4 border-top border-secondary">
                <p class="mb-0 text-secondary">
                    © 2026 Todo Marcas | Todos los derechos reservados
                </p>
                </div>

            </div>
        </section>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>

        <!-- Scrollable modal
            <div class="modal-dialog modal-dialog-scrollable">
            ...
            </div>
             -->
</body>
</html>