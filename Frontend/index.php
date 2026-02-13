<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo Marcas - Concesionario Oficial | Junín</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
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
        
        .carousel-destacados .carousel-control-prev-icon,
        .carousel-destacados .carousel-control-next-icon {
            background-color: rgba(0,0,0,0.5);
            border-radius: 50%;
            padding: 1.5rem;
            background-size: 50%;
        }
        
        .feature-icon {
            font-size: 2.5rem;
            color: #0d6efd;
            margin-bottom: 1rem;
        }
        
        .footer-link {
            color: rgba(255,255,255,0.6);
            text-decoration: none;
            transition: color 0.2s;
        }
        
        .footer-link:hover {
            color: white;
        }
        
        .carousel-caption {
            bottom: 50%;
            transform: translateY(50%);
            text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
        }
        html {
            scroll-behavior: smooth;
        }
    </style>
</head>
<body class="d-flex flex-column min-vh-100">
    <header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="./index.php">
                    <img src="./public/logo.png" alt="Logo Todo Marcas" height="40">
                </a>
                <button class="navbar-toggler" type="button" 
                        data-bs-toggle="collapse" 
                        data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="./index.php">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./catalogo.php">Catálogo</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#contacto">Contacto</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./ventas.php">Ventas</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main class="flex-grow-1">
        <div id="carouselAutos" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselAutos" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Honda Civic"></button>
                <button type="button" data-bs-target="#carouselAutos" data-bs-slide-to="1" aria-label="Toyota Hilux"></button>
                <button type="button" data-bs-target="#carouselAutos" data-bs-slide-to="2" aria-label="Jeep Renegade"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="./public/honda-civic.jpg" 
                         class="d-block w-100 carousel-img" 
                         alt="Honda Civic">
                    <div class="carousel-caption d-none d-md-block">
                        <h2 class="display-2 fw-bold">Honda Civic</h2>
                        <p class="lead">Elegancia y rendimiento en cada viaje</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="./public/toyota-hilux.jpg" 
                         class="d-block w-100 carousel-img" 
                         alt="Toyota Hilux">
                    <div class="carousel-caption d-none d-md-block">
                        <h2 class="display-2 fw-bold">Toyota Hilux</h2>
                        <p class="lead">La fuerza que necesitás para cualquier desafío</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="./public/jeep-renegade.avif" 
                         class="d-block w-100 carousel-img" 
                         alt="Jeep Renegade">
                    <div class="carousel-caption d-none d-md-block">
                        <h2 class="display-2 fw-bold">Jeep Renegade</h2>
                        <p class="lead">Aventura y estilo en un solo vehículo</p>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselAutos" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Anterior</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselAutos" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Siguiente</span>
            </button>
        </div>

        <section class="container py-5 text-center">
            <h2 class="display-5 fw-bold mb-5">¿Por qué elegirnos?</h2>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="p-4">
                        <i class="bi bi-car-front feature-icon"></i>
                        <h5 class="fw-bold mb-3">Amplia variedad</h5>
                        <p class="text-secondary mb-0">Tenemos autos nuevos y usados certificados para todos los gustos.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="p-4">
                        <i class="bi bi-cash-coin feature-icon"></i>
                        <h5 class="fw-bold mb-3">Financiación</h5>
                        <p class="text-secondary mb-0">Planes flexibles adaptados a tu presupuesto y necesidades.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="p-4">
                        <i class="bi bi-person-hearts feature-icon"></i>
                        <h5 class="fw-bold mb-3">Atención personalizada</h5>
                        <p class="text-secondary mb-0">Te acompañamos en todo el proceso de compra.</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="container py-5">
            <div class="row align-items-center g-5">
                <div class="col-lg-6">
                    <div id="carouselDestacados" class="carousel slide carousel-destacados" data-bs-ride="carousel">
                        <div class="carousel-inner rounded-3 shadow">
                            <div class="carousel-item active">
                                <div class="card border-0">
                                    <img src="./imgs/chevrolet-cruze-blanco.avif" 
                                         class="card-img-top img-destacado" 
                                         alt="Chevrolet Cruze">
                                    <div class="card-body text-center py-4">
                                        <h5 class="card-title fw-bold">Chevrolet Cruze</h5>
                                        <p class="card-text text-primary h4">$23.000.000</p>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="card border-0">
                                    <img src="./imgs/toyota-hilux-negra.png" 
                                         class="card-img-top img-destacado" 
                                         alt="Toyota Hilux">
                                    <div class="card-body text-center py-4">
                                        <h5 class="card-title fw-bold">Toyota Hilux</h5>
                                        <p class="card-text text-primary h4">$35.000.000</p>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="card border-0">
                                    <img src="./imgs/peugeot-208.avif" 
                                         class="card-img-top img-destacado" 
                                         alt="Peugeot 208">
                                    <div class="card-body text-center py-4">
                                        <h5 class="card-title fw-bold">Peugeot 208</h5>
                                        <p class="card-text text-primary h4">$21.500.000</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselDestacados" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Anterior</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselDestacados" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Siguiente</span>
                        </button>
                    </div>
                </div>
                
                <div class="col-lg-6">
                    <h2 class="display-5 fw-bold mb-4">Vehículos Destacados</h2>
                    <p class="lead text-secondary mb-4">
                        Descubrí nuestras mejores oportunidades seleccionadas especialmente para vos. 
                        Vehículos revisados, listos para entrega inmediata y con opciones de financiación.
                    </p>
                    <ul class="list-unstyled mb-4">
                        <li class="mb-2"><i class="bi bi-check-circle-fill text-primary me-2"></i>Entrega inmediata</li>
                        <li class="mb-2"><i class="bi bi-check-circle-fill text-primary me-2"></i>Financiación disponible</li>
                        <li class="mb-2"><i class="bi bi-check-circle-fill text-primary me-2"></i>Garantía asegurada</li>
                    </ul>
                    <a href="catalogo.php" class="btn btn-primary btn-lg">
                        <i class="bi bi-grid-3x3-gap-fill me-2"></i>Ver catálogo completo
                    </a>
                </div>
            </div>
        </section>

        <section id="contacto" class="bg-dark text-light py-5 mt-5">
            <div class="container">
                <div class="row g-4">
                    <div class="col-lg-6">
                        <h2 class="display-5 fw-bold mb-3">Contáctanos</h2>
                        <p class="text-secondary lead mb-4">
                            ¿Tienes preguntas o quieres programar una prueba de manejo?
                            Déjanos tu mensaje y te responderemos a la brevedad.
                        </p>
                        <form>
                            <div class="mb-3">
                                <label class="form-label text-secondary">Nombre completo</label>
                                <input type="text" class="form-control form-control-lg" placeholder="Ej: Juan Pérez" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label text-secondary">Correo electrónico</label>
                                <input type="email" class="form-control form-control-lg" placeholder="ejemplo@correo.com" required>
                            </div>
                            <div class="mb-4">
                                <label class="form-label text-secondary">Mensaje</label>
                                <textarea class="form-control form-control-lg" rows="4" placeholder="¿En qué podemos ayudarte?" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-light btn-lg w-100">
                                <i class="bi bi-send me-2"></i>Enviar mensaje
                            </button>
                        </form>
                    </div>

                    <div class="col-lg-6">
                        <h4 class="fw-bold mb-4">Información de contacto</h4>
                        
                        <div class="mb-4">
                            <div class="d-flex mb-3">
                                <i class="bi bi-geo-alt-fill text-primary me-3 fs-4"></i>
                                <div>
                                    <h6 class="fw-bold mb-1">Dirección</h6>
                                    <p class="text-secondary mb-0">Av. San Martín 123, Junín</p>
                                </div>
                            </div>
                            
                            <div class="d-flex mb-3">
                                <i class="bi bi-telephone-fill text-primary me-3 fs-4"></i>
                                <div>
                                    <h6 class="fw-bold mb-1">Teléfono</h6>
                                    <p class="text-secondary mb-0">+54 9 236 123 4567</p>
                                </div>
                            </div>
                            
                            <div class="d-flex mb-3">
                                <i class="bi bi-envelope-fill text-primary me-3 fs-4"></i>
                                <div>
                                    <h6 class="fw-bold mb-1">Email</h6>
                                    <p class="text-secondary mb-0">info@todomarcas.com</p>
                                </div>
                            </div>
                        </div>

                        <hr class="border-secondary my-4">

                        <h5 class="fw-bold mb-3">Horarios</h5>
                        <p class="mb-2"><i class="bi bi-calendar-check me-2 text-primary"></i>Lunes a Viernes: 9:00 - 18:00</p>
                        <p class="mb-4"><i class="bi bi-calendar-check me-2 text-primary"></i>Sábados: 9:00 - 13:00</p>

                        <div class="d-flex gap-3 mt-4">
                            <a href="#" class="footer-link" title="Facebook">
                                <i class="bi bi-facebook fs-4"></i>
                            </a>
                            <a href="#" class="footer-link" title="Instagram">
                                <i class="bi bi-instagram fs-4"></i>
                            </a>
                            <a href="#" class="footer-link" title="WhatsApp">
                                <i class="bi bi-whatsapp fs-4"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="text-center mt-5 pt-4 border-top border-secondary">
                    <p class="mb-0 text-secondary small">
                        © 2026 Todo Marcas | Todos los derechos reservados
                    </p>
                </div>
            </div>
        </section>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>