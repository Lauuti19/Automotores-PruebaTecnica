<?php
class VentasService {

    private static $baseUrl = 'http://web/backend/ventas';

    public static function filtrarVentas($cliente = null, $metodo_pago = null, $fecha_desde = null, $fecha_hasta = null) {

        $params = [];
        
        if (!empty($cliente)) {
            $params['cliente'] = $cliente;
        }
        if (!empty($metodo_pago)) {
            $params['metodo_pago'] = $metodo_pago;
        }
        if (!empty($fecha_desde)) {
            $params['fecha_desde'] = $fecha_desde;
        }
        if (!empty($fecha_hasta)) {
            $params['fecha_hasta'] = $fecha_hasta;
        }

        $url = self::$baseUrl;
        
        if (!empty($params)) {
            $url .= '?' . http_build_query($params);
        }

        $response = @file_get_contents($url);

        if ($response === false) {
            return [];
        }

        return json_decode($response, true) ?? [];
    }

    public static function obtenerMetodosPago() {
        
        $url = self::$baseUrl . '/metodos-pago';
        
        $response = @file_get_contents($url);

        if ($response === false) {
            return [];
        }

        return json_decode($response, true) ?? [];
    }
}
?>