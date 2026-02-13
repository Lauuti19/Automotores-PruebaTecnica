<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo Marcas - Ventas | Junín</title>
    
    <?php
    require_once __DIR__ . '/services/VentasService.php';
    
    $cliente = $_GET['cliente'] ?? null;
    $metodo_pago = $_GET['metodo_pago'] ?? null;
    $fecha_desde = $_GET['fecha_desde'] ?? null;
    $fecha_hasta = $_GET['fecha_hasta'] ?? null;
    
    $ventas = VentasService::filtrarVentas($cliente, $metodo_pago, $fecha_desde, $fecha_hasta);
    $metodos_pago = VentasService::obtenerMetodosPago();
    ?>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
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
        .table-ventas th {
            background-color: #f8f9fa;
        }
        .total-ventas {
            font-size: 1.5rem;
            font-weight: bold;
            color: #0d6efd;
        }
        .metodo-pago-badge {
            font-size: 0.85rem;
            padding: 0.5rem 0.75rem;
        }
        .filtro-fechas {
            display: flex;
            gap: 0.5rem;
            align-items: center;
        }
        .filtro-fechas .form-control {
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
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="./index.php">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./catalogo.php">Catálogo</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#contacto">Contacto</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="./ventas.php">Ventas</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main class="flex-grow-1 py-5">
        <div class="container">
            <div class="text-center mb-5">
                <h1 class="display-4 fw-bold text-dark">Historial de Ventas</h1>
                <p class="lead text-secondary">Consultá todas las operaciones realizadas</p>
            </div>
            <div class="bg-light p-4 rounded-3 shadow-sm mb-5">
                <form method="GET" action="" class="row g-3">
                    <div class="col-md-4">
                        <label class="form-label fw-semibold">
                            <i class="bi bi-person me-2"></i>Cliente
                        </label>
                        <input type="text" class="form-control" name="cliente" 
                               placeholder="Nombre del cliente" 
                               value="<?php echo htmlspecialchars($cliente ?? ''); ?>">
                    </div>
                    
                    <div class="col-md-4">
                        <label class="form-label fw-semibold">
                            <i class="bi bi-credit-card me-2"></i>Método de pago
                        </label>
                        <select class="form-select" name="metodo_pago">
                            <option value="">Todos los métodos</option>
                            <?php foreach ($metodos_pago as $metodo): ?>
                                <option value="<?php echo htmlspecialchars($metodo); ?>"
                                    <?php echo ($metodo_pago ?? '') == $metodo ? 'selected' : ''; ?>>
                                    <?php echo htmlspecialchars($metodo); ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    
                    <div class="col-md-4">
                        <label class="form-label fw-semibold">
                            <i class="bi bi-calendar-range me-2"></i>Rango de fechas
                        </label>
                        <div class="filtro-fechas">
                            <input type="date" class="form-control" name="fecha_desde" 
                                   value="<?php echo htmlspecialchars($fecha_desde ?? ''); ?>"
                                   placeholder="Desde">
                            <span class="text-muted fw-bold">—</span>
                            <input type="date" class="form-control" name="fecha_hasta" 
                                   value="<?php echo htmlspecialchars($fecha_hasta ?? ''); ?>"
                                   placeholder="Hasta">
                        </div>
                    </div>
                    
                    <div class="col-12">
                        <div class="d-flex gap-2 justify-content-end">
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-search me-2"></i>Filtrar
                            </button>
                            <a href="ventas.php" class="btn btn-outline-secondary">
                                <i class="bi bi-arrow-counterclockwise me-2"></i>Limpiar
                            </a>
                        </div>
                    </div>
                </form>
            </div>
            <div class="table-responsive bg-white rounded-3 shadow-sm">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th class="px-4">Operación</th>
                            <th>Cliente</th>
                            <th>Contacto</th>
                            <th>Vehículo</th>
                            <th>Método de pago</th>
                            <th>Fecha</th>
                            <th class="text-end pe-4">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($ventas)): ?>
                            <?php foreach ($ventas as $venta): ?>
                                <tr>
                                    <td class="px-4">
                                        <span class="fw-bold text-primary">
                                            #<?php echo str_pad($venta['id_operacion'], 6, '0', STR_PAD_LEFT); ?>
                                        </span>
                                    </td>
                                    <td>
                                        <div class="fw-semibold"><?php echo htmlspecialchars($venta['cliente']); ?></div>
                                    </td>
                                    <td>
                                        <div>
                                            <i class="bi bi-telephone me-1 text-muted small"></i>
                                            <?php echo htmlspecialchars($venta['telefono']); ?>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="fw-semibold">
                                            <?php echo htmlspecialchars($venta['marca'] . ' ' . $venta['modelo']); ?>
                                        </div>
                                        <small class="text-muted">
                                            <i class="bi bi-speedometer2 me-1"></i>
                                            <?php echo $venta['kilometros'] ? number_format($venta['kilometros'], 0, ',', '.') . ' km' : '0 km'; ?>
                                            •
                                            <i class="bi bi-palette me-1"></i>
                                            <?php echo htmlspecialchars($venta['color']); ?>
                                        </small>
                                    </td>
                                    <td>
                                        <?php
                                        $badgeClass = match(strtolower($venta['metodo_de_pago'])) {
                                            'efectivo' => 'bg-success',
                                            'transferencia' => 'bg-info',
                                            'tarjeta de crédito', 'tarjeta' => 'bg-warning text-dark',
                                            'financiacion' => 'bg-secondary',
                                            default => 'bg-secondary'
                                        };
                                        ?>
                                        <span class="badge <?php echo $badgeClass; ?> metodo-pago-badge">
                                            <i class="bi 
                                                <?php 
                                                echo match(strtolower($venta['metodo_de_pago'])) {
                                                    'efectivo' => 'bi-cash',
                                                    'transferencia' => 'bi-bank',
                                                    'tarjeta de crédito', 'tarjeta' => 'bi-credit-card',
                                                    'financiacion' => 'bi-building',
                                                    default => 'bi-receipt'
                                                };
                                                ?> me-2">
                                            </i>
                                            <?php echo htmlspecialchars($venta['metodo_de_pago']); ?>
                                        </span>
                                    </td>
                                    <td>
                                        <i class="bi bi-calendar3 me-2 text-muted"></i>
                                        <?php echo date('d/m/Y', strtotime($venta['fecha_venta'])); ?>
                                    </td>
                                    <td class="text-end pe-4">
                                        <span class="fw-bold text-primary h5 mb-0">
                                            $<?php echo number_format($venta['total'], 0, ',', '.'); ?>
                                        </span>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="7" class="text-center py-5">
                                    <i class="bi bi-receipt display-1 text-muted mb-3"></i>
                                    <h5 class="text-muted">No se encontraron ventas</h5>
                                    <p class="text-muted mb-0">Probá con otros filtros de búsqueda</p>
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                    <?php if (!empty($ventas)): ?>
                        <tfoot class="table-light fw-bold">
                            <tr>
                                <td colspan="6" class="text-end px-4">Total general:</td>
                                <td class="text-end pe-4 text-primary h5 mb-0">
                                    $<?php echo number_format(array_sum(array_column($ventas, 'total')), 0, ',', '.'); ?>
                                </td>
                            </tr>
                        </tfoot>
                    <?php endif; ?>
                </table>
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