<?php

function conectarDB() {
    $conexion = mysqli_connect(
        "mysql",
        "comuniduser",
        "comunidpass",
        "AgenciaVehiculos"
    );

    if (!$conexion) {
        http_response_code(500);
        die(json_encode([
            "error" => "Error de conexión",
            "detalle" => mysqli_connect_error()
        ]));
    }

    return $conexion;
}
