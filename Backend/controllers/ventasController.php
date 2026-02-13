<?php
require_once __DIR__ . '/../config/database.php';


class ventasController {

    public static function filtro() {

        $conexion = conectarDB();

        $cliente = $_GET['cliente'] ?? null;
        $metodo_pago = $_GET['metodo_pago'] ?? null;
        $fecha_desde = $_GET['fecha_desde'] ?? null;
        $fecha_hasta = $_GET['fecha_hasta'] ?? null;

        $stmt = $conexion->prepare("CALL sp_filtro_ventas(?, ?, ?, ?)");

        $stmt->bind_param(
            "ssss",
            $cliente,
            $metodo_pago,
            $fecha_desde,
            $fecha_hasta
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
