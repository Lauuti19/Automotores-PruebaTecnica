<?php

class Database {

    private static $host = "mysql";
    private static $db_name = "comunidauto";
    private static $username = "comuniduser";
    private static $password = "comunidpass";

    public static function connect() {

        try {
            $pdo = new PDO(
                "mysql:host=" . self::$host . ";dbname=" . self::$db_name . ";charset=utf8mb4",
                self::$username,
                self::$password,
                [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
                ]
            );

            return $pdo;

        } catch (PDOException $e) {
            http_response_code(500);
            echo json_encode([
                "success" => false,
                "error" => "Error de conexión a la base de datos"
            ]);
            exit;
        }
    }
}
?>