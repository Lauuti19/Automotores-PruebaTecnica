<?php
require_once __DIR__ . '/../config/database.php';

class vehiculoController {

    public static function filtro() {

        $conexion = conectarDB();

        $id_vehiculo = isset($_GET['id_vehiculo']) 
            ? (int) $_GET['id_vehiculo'] 
            : null;

        if (!$id_vehiculo) {
            http_response_code(400);
            echo json_encode(["error" => "id_vehiculo es requerido"]);

            return;
        }

        $stmt = $conexion->prepare("CALL sp_vehiculo_seleccionado(?)");

        $stmt->bind_param("i", $id_vehiculo);

        $stmt->execute();

        $result = $stmt->get_result();

        $data = $result->fetch_assoc(); // solo un vehículo

        header('Content-Type: application/json');
        echo json_encode($data);

        $stmt->close();
        $conexion->close();
    }
}
