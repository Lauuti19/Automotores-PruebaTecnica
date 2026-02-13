<?php
class CatalogoService {

    private static $baseUrl = 'http://web/backend/catalogo';

    public static function obtenerVehiculos($params = []) {
        $url = self::$baseUrl;
        
        if (!empty($params)) {
            $url .= '?' . http_build_query($params);
        }

        $response = @file_get_contents($url);

        if ($response === false) {
            error_log("Error al obtener vehículos de: " . $url);
            return [];
        }

        return json_decode($response, true) ?? [];
    }

    public static function obtenerDatosParaFiltros($tipo) {
        $url = self::$baseUrl . '?tipo=' . urlencode($tipo);
        
        $response = @file_get_contents($url);

        if ($response === false) {
            error_log("Error al obtener datos para filtros: " . $tipo);
            return [];
        }

        return json_decode($response, true) ?? [];
    }
}