<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo Marcas - Catálogo | Junín</title>
    <?php
    require_once __DIR__ . '/services/CatalogoService.php';

    $filtros = $_GET ?? [];
    
    $vehiculos = CatalogoService::obtenerVehiculos($filtros);

    $marcas = CatalogoService::obtenerDatosParaFiltros('marcas');
    $modelos = CatalogoService::obtenerDatosParaFiltros('modelos');
    
    $tipos_combustible = ['Nafta', 'Diesel', 'Electrico', 'GNC', 'Hibrido'];
    ?>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="shortcut icon" href="./public/favicon.ico" type="image/x-icon">
    
    <style>
        html {
            scroll-behavior: smooth;
        }
        .footer-link {
            color: rgba(255,255,255,0.6);
            text-decoration: none;
            transition: color 0.2s;
        }
        .footer-link:hover {
            color: white;
        }
        .card-img-top {
            height: 200px;
            object-fit: cover;
        }
        .precio-input-group {
            display: flex;
            gap: 0.5rem;
            align-items: center;
        }
        .precio-input-group .form-control {
            flex: 1;
        }
    
        #contacto {
            scroll-margin-top: 20px;
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
                            <a class="nav-link" href="./index.php">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Catálogo</a>
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

    <main class="flex-grow-1 py-5">
        <div class="container">
            <div class="text-center mb-5">
                <h1 class="display-4 fw-bold text-dark">Catálogo de Autos</h1>
                <p class="lead text-secondary">Explorá nuestra amplia variedad de vehículos nuevos y usados certificados</p>
            </div>
            <div class="bg-light p-4 rounded-3 shadow-sm mb-5">
                <form method="GET" action="" class="row g-3">
                    <div class="col-md-3">
                        <label class="form-label fw-semibold">Marca</label>
                        <select class="form-select" name="marca">
                            <option value="">Todas las marcas</option>
                            <?php foreach ($marcas as $m): ?>
                                <option value="<?php echo htmlspecialchars($m['marca']); ?>"
                                    <?php echo ($filtros['marca'] ?? '') == $m['marca'] ? 'selected' : ''; ?>>
                                    <?php echo htmlspecialchars($m['marca']); ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    
                    <div class="col-md-3">
                        <label class="form-label fw-semibold">Modelo</label>
                        <select class="form-select" name="modelo">
                            <option value="">Todos los modelos</option>
                            <?php foreach ($modelos as $m): ?>
                                <option value="<?php echo htmlspecialchars($m['modelo']); ?>"
                                    <?php echo ($filtros['modelo'] ?? '') == $m['modelo'] ? 'selected' : ''; ?>>
                                    <?php echo htmlspecialchars($m['modelo']); ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    
                    <div class="col-md-3">
                        <label class="form-label fw-semibold">Combustible</label>
                        <select class="form-select" name="combustible">
                            <option value="">Todos los combustibles</option>
                            <?php foreach ($tipos_combustible as $tipo): ?>
                                <option value="<?php echo htmlspecialchars($tipo); ?>"
                                    <?php echo ($filtros['combustible'] ?? '') == $tipo ? 'selected' : ''; ?>>
                                    <?php echo htmlspecialchars($tipo); ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    
                    <div class="col-md-3">
                        <label class="form-label fw-semibold">Año</label>
                        <input type="number" 
                               class="form-control" 
                               name="anio" 
                               placeholder="Ej: 2023"
                               min="1900" 
                               max="2026" 
                               step="1"
                               value="<?php echo htmlspecialchars($filtros['anio'] ?? ''); ?>">
                    </div>

                    <div class="col-md-8">
                        <label class="form-label fw-semibold">Precio</label>
                        <div class="precio-input-group">
                            <input type="number" 
                                   class="form-control" 
                                   name="precio_desde" 
                                   placeholder="Desde $"
                                   min="0" 
                                   step="1000"
                                   value="<?php echo htmlspecialchars($filtros['precio_desde'] ?? ''); ?>">
                            <span class="text-muted fw-bold">—</span>
                            <input type="number" 
                                   class="form-control" 
                                   name="precio_hasta" 
                                   placeholder="Hasta $"
                                   min="0" 
                                   step="1000"
                                   value="<?php echo htmlspecialchars($filtros['precio_hasta'] ?? ''); ?>">
                        </div>
                    </div>
                    
                    <div class="col-md-4 d-flex align-items-end">
                        <div class="d-flex gap-2 w-100">
                            <button type="submit" class="btn btn-primary flex-grow-1">
                                <i class="bi bi-search me-2"></i>Filtrar
                            </button>
                            <a href="catalogo.php" class="btn btn-outline-secondary">
                                <i class="bi bi-arrow-counterclockwise"></i>
                            </a>
                        </div>
                    </div>
                </form>
            </div>

            <div class="d-flex justify-content-between align-items-center mb-4">
                <div class="text-muted">
                    <i class="bi bi-car-front me-2"></i>
                    <?php echo count($vehiculos); ?> vehículo(s) encontrados
                </div>
                <?php if (!empty($filtros)): ?>
                    <a href="catalogo.php" class="text-decoration-none small">
                        <i class="bi bi-x-circle me-1"></i>Limpiar filtros
                    </a>
                <?php endif; ?>
            </div>

            <div class="row g-4">
                <?php if (!empty($vehiculos)): ?>
                    <?php foreach ($vehiculos as $auto): ?>
                        <div class="col-sm-6 col-lg-4 col-xl-3">
                            <div class="card h-100 shadow-sm border-0 hover-shadow transition">
                                <div class="ratio ratio-16x9 bg-light">
                                    <img src="./public/imgs/<?php echo htmlspecialchars($auto['nombre_imagen']); ?>"
                                         class="object-fit-cover"
                                         alt="<?php echo htmlspecialchars($auto['marca'] . ' ' . $auto['modelo']); ?>">
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title text-truncate">
                                        <?php echo htmlspecialchars($auto['marca'] . ' ' . $auto['modelo']); ?>
                                    </h5>
                                    <div class="d-flex gap-2 mb-2 text-muted small">
                                        <span><i class="bi bi-calendar3 me-1"></i><?php echo $auto['anio']; ?></span>
                                        <span><i class="bi bi-speedometer2 me-1"></i><?php echo number_format($auto['kilometros'], 0, ',', '.'); ?> km</span>
                                        <span><i class="bi bi-fuel-pump me-1"></i><?php echo htmlspecialchars($auto['combustible']); ?></span>
                                    </div>
                                    <p class="fw-bold text-primary h5 mb-3">
                                        $<?php echo number_format($auto['precio'], 0, ',', '.'); ?>
                                    </p>
                                    <button class="btn btn-outline-primary w-100" 
                                            data-bs-toggle="modal" 
                                            data-bs-target="#detalleModal<?php echo $auto['id_vehiculo']; ?>">
                                        <i class="bi bi-eye me-2"></i>Ver detalles
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="modal fade" id="detalleModal<?php echo $auto['id_vehiculo']; ?>" 
                             tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-scrollable">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">
                                            <?php echo htmlspecialchars($auto['marca'] . ' ' . $auto['modelo'] . ' ' . $auto['anio']); ?>
                                        </h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <img src="./public/imgs/<?php echo htmlspecialchars($auto['nombre_imagen_modal'] ?? $auto['nombre_imagen']); ?>" 
                                                     class="img-fluid rounded mb-3" 
                                                     alt="<?php echo htmlspecialchars($auto['marca'] . ' ' . $auto['modelo']); ?>">
                                            </div>
                                            <div class="col-md-6">
                                                <h6 class="fw-bold border-bottom pb-2 mb-3">Información del vehículo</h6>
                                                <dl class="row">
                                                    <dt class="col-sm-5">Precio:</dt>
                                                    <dd class="col-sm-7 text-primary fw-bold">$<?php echo number_format($auto['precio'], 0, ',', '.'); ?></dd>
                                                    
                                                    <dt class="col-sm-5">Marca:</dt>
                                                    <dd class="col-sm-7"><?php echo htmlspecialchars($auto['marca']); ?></dd>
                                                    
                                                    <dt class="col-sm-5">Modelo:</dt>
                                                    <dd class="col-sm-7"><?php echo htmlspecialchars($auto['modelo']); ?></dd>
                                                    
                                                    <dt class="col-sm-5">Año:</dt>
                                                    <dd class="col-sm-7"><?php echo $auto['anio']; ?></dd>
                                                    
                                                    <dt class="col-sm-5">Kilómetros:</dt>
                                                    <dd class="col-sm-7"><?php echo number_format($auto['kilometros'], 0, ',', '.'); ?> km</dd>
                                                    
                                                    <dt class="col-sm-5">Combustible:</dt>
                                                    <dd class="col-sm-7"><?php echo htmlspecialchars($auto['combustible']); ?></dd>
                                                </dl>
                                            </div>
                                        </div>
                                        
                                        <div class="mt-4">
                                            <h6 class="fw-bold border-bottom pb-2 mb-3">Descripción</h6>
                                            <p class="text-muted">
                                                <?php echo isset($auto['descripcion']) && !empty($auto['descripcion']) 
                                                    ? nl2br(htmlspecialchars($auto['descripcion']))
                                                    : 'Vehículo en excelente estado, listo para entrega inmediata. Incluye garantía de 1 año y revisión técnica al día.'; ?>
                                            </p>
                                        </div>

                                        <div class="mt-4">
                                            <h6 class="fw-bold border-bottom pb-2 mb-3">Características</h6>
                                            <div class="row g-2">
                                                <?php
                                                $caracteristicas = [
                                                    'bi-snow' => 'Aire acondicionado',
                                                    'bi-arrows-collapse-vertical' => 'Dirección asistida',
                                                    'bi-shield-lock' => 'Cierre centralizado',
                                                    'bi-toggle-on' => 'Levanta cristales',
                                                    'bi-shield-check' => 'Airbags',
                                                    'bi-exclamation-triangle' => 'ABS'
                                                ];
                                                foreach ($caracteristicas as $icon => $text): ?>
                                                    <div class="col-sm-6">
                                                        <p class="mb-2"><i class="bi <?php echo $icon; ?> me-2 text-primary"></i><?php echo $text; ?></p>
                                                    </div>
                                                <?php endforeach; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                            <i class="bi bi-x-lg me-2"></i>Cerrar
                                        </button>
                                        <a href="./index.php" class="btn btn-primary">
                                            <i class="bi bi-envelope me-2"></i>Consultar
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="col-12">
                        <div class="text-center py-5 bg-light rounded-3">
                            <i class="bi bi-car-front display-1 text-muted mb-3"></i>
                            <h3 class="text-muted">No se encontraron vehículos</h3>
                            <p class="text-muted mb-4">Probá con otros filtros de búsqueda</p>
                            <a href="catalogo.php" class="btn btn-primary">
                                <i class="bi bi-arrow-counterclockwise me-2"></i>Ver todos los vehículos
                            </a>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </main>

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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>