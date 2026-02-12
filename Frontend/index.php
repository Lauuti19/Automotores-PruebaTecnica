<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Todo Marcas | Junín</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="shortcut icon" href="./public/favicon.ico" type="image/x-icon">

</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid px-5 py-3">
            <img src="./public/logo.png" alt="Logo Todo Marcas" class="img-fluid w-25" >
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Inicio</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="#">Catalogo</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="#">Contacto</a>
                </li>
                <li class="nav-item">
                <a class="nav-link disabled" aria-disabled="true">Ingresar</a>
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
                    <h2 class="display-2 fw-bold text-end">Honda Civic</h2>
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


         <section>
            <h2>¿Por qué elegirnos?</h2>
            <ul>
                <li>Amplia variedad de vehículos</li>
                <li>Financiación disponible</li>
                <li>Atención personalizada</li>
            </ul>
        </section>
        <section>
            <h2>Nuestros Vehículos Destacados</h2>
            <h4 class="fs-6">Ver catálogo completo</h4>
                <img src="./imgs/chevrolet-cruze-blanco.avif" class="rounded float-start img-thumbnail" alt="...">
                <img src="./imgs/toyota-hilux-negra.png" class="rounded float-end img-thumbnail" alt="...">
        </section>
        <section>
                <h2>Contáctanos</h2>
                <p>¿Tienes preguntas o quieres programar una prueba de manejo? Contáctanos hoy mismo.</p>
                <form action="#" method="post">
                    <input type="text" name="name" placeholder="Nombre" required>
                    <input type="email" name="email" placeholder="Correo electrónico" required>
                    <textarea name="message" placeholder="Informacion complementaria" required></textarea>
                    <button type="submit">Enviar</button>
                </form>
        </section>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
        <style>
        .carousel-img {
        height: 600px;
        object-fit: cover;
        filter: brightness(60%);
        }
        </style>
        <!-- Scrollable modal
            <div class="modal-dialog modal-dialog-scrollable">
            ...
            </div>
             -->
</body>
</html>