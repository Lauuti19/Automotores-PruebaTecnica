<?php

header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = str_replace('/backend', '', $uri);
$method = $_SERVER['REQUEST_METHOD'];

$routes = [
    'GET' => [
        '/catalogo' => 'catalogo.php',
        '/ventas'   => 'ventas.php',
    ]
];

if (isset($routes[$method][$uri])) {
    require __DIR__ . '/routes/' . $routes[$method][$uri];
} else {
    http_response_code(404);
    echo json_encode([
        "error" => "Ruta no encontrada",
        "path"  => $uri
    ]);
}
