<?php

require_once __DIR__ . "/../controllers/VehiculosController.php";

$method = $_SERVER['REQUEST_METHOD'];
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Quitar /Backend si hace falta
$uri = str_replace("/Backend", "", $uri);

$segments = explode("/", trim($uri, "/"));

if ($segments[0] === "vehiculos") {

    $controller = new VehiculosController();

    if ($method === "GET" && count($segments) === 1) {
        $controller->index();
        return;
    }

    if ($method === "GET" && count($segments) === 2) {
        $controller->show($segments[1]);
        return;
    }
}

http_response_code(404);
echo json_encode([
    "success" => false,
    "error" => "Ruta no encontrada"
]);
?>