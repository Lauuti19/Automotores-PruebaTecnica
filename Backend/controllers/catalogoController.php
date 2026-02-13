<?php
require_once __DIR__ . '/../config/database.php';


class CatalogoController {

    public static function filtro() {

        $conexion = conectarDB();

        $anio = $_GET['anio'] ?? null;
        $marca = $_GET['marca'] ?? null;
        $modelo = $_GET['modelo'] ?? null;
        $precio_desde = $_GET['precio_desde'] ?? null;
        $precio_hasta = $_GET['precio_hasta'] ?? null;
        $combustible = $_GET['combustible'] ?? null;

        $anio = ($anio === '') ? null : $anio;
        $precio_desde = ($precio_desde === '') ? null : $precio_desde;
        $precio_hasta = ($precio_hasta === '') ? null : $precio_hasta;

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

    public static function datosParaFiltros() {
        $conexion = conectarDB();

        $parametro = $_GET['tipo'] ?? ''; 

        if (empty($parametro)) {
            echo json_encode(['error' => 'Parámetro tipo requerido']);
            return;
        }

        $stmt = $conexion->prepare("CALL sp_datos_para_filtros(?)");

        $stmt->bind_param(
            "s",
            $parametro
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
