<?php

require_once __DIR__ . "/../config/database.php";

class VehiculosController {

    private $db;

    public function __construct() {
        $this->db = Database::connect();
    }

    public function index() {

        echo json_encode([
            "message" => "Listado de vehículos (pendiente modelo)"
        ]);
    }

    public function show($id) {

        echo json_encode([
            "message" => "Detalle del vehículo ID: " . $id
        ]);
    }
}
?>