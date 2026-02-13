<?php
require_once __DIR__ . '/../config/database.php';


class CatalogoController {

    public static function filtro() {

        $conexion = conectarDB();

        // Parámetros GET
        $anio = $_GET['anio'] ?? null;
        $marca = $_GET['marca'] ?? null;
        $modelo = $_GET['modelo'] ?? null;
        $precio_desde = $_GET['precio_desde'] ?? null;
        $precio_hasta = $_GET['precio_hasta'] ?? null;
        $combustible = $_GET['combustible'] ?? null;

        $stmt = $conexion->prepare("CALL sp_filtro_catalogo(?, ?, ?, ?, ?, ?)");

        $stmt->bind_param(
            "isssis",
            $anio,
            $marca,
            $modelo,
            $precio_desde,
            $precio_hasta,
            $combustible
        );

        $stmt->execute();

        $result = $stmt->get_result();

        $data = [];

        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        header('Content-Type: application/json');
        echo json_encode($data);

        $stmt->close();
        $conexion->close();
    }
}
