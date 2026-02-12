┌────────────────────────────────────────────────────────────────────────┐
│                    AGENCIA VEHICULAR                                   │
├────────────────────────────────────────────────────────────────────────┤
│  Sistema de gestión de ventas y catálogo de vehículos                  │
└────────────────────────────────────────────────────────────────────────┘

────────────────────
Descripción General
────────────────────
Base de datos para gestión completa de una agencia vehicular que incluye:

    -Registro de ventas y transacciones
    
    -Catálogo de vehículos en stock
    
    -Información de clientes
    
    -Métodos de pago
    
    -Sistema de imágenes para vehículos


────────────────────
Stored Procedures
────────────────────

╔══════════════════════════════════════════════════════════════════════════╗
║                   FILTRO DE VENTAS ( sp_filtro_ventas )                  ║
╠══════════════════════════════════════════════════════════════════════════╣
║ Propósito: Consulta avanzada de ventas con múltiples filtros             ║
╚══════════════════════════════════════════════════════════════════════════╝
 -  Resultado:
┌────────────────────┬─────────────────────────────────────────────────────┐
│ Campo              │ Descripción                                         │
├────────────────────┼─────────────────────────────────────────────────────┤
│ id_operacion       │ ID único de la operación                            │
│ cliente            │ Nombre completo del cliente                         │
│ telefono           │ Teléfono de contacto                                │
│ marca              │ Marca del vehículo vendido                          │
│ modelo             │ Modelo del vehículo                                 │
│ color              │ Color del vehículo                                  │
│ kilometros         │ Kilometraje al momento de venta                     │
│ metodo_de_pago     │ Forma de pago utilizada                             │
│ fecha_venta        │ Fecha de la transacción                             │
│ total              │ Monto total de la venta                             │
└────────────────────┴─────────────────────────────────────────────────────┘
- Parametros
┌───────────────────┬──────────────┬─────────┬─────────────────────────────┐
│ Parámetro         │ Tipo         │ Req.    │ Descripción                 │
├───────────────────┼──────────────┼─────────┼─────────────────────────────┤
│ p_cliente         │ VARCHAR(100) │ NO      │ Búsqueda parcial por nombre │
│ p_metodo_pago     │ VARCHAR(100) │ NO      │ Método exacto de pago       │
│ p_fecha_desde     │ DATE         │ NO      │ Fecha inicial (>=)          │
│ p_fecha_hasta     │ DATE         │ NO      │ Fecha final (<=)            │
└───────────────────┴──────────────┴─────────┴─────────────────────────────┘
- Ejemplos de uso
    -- Solo cliente (búsqueda parcial)
    CALL sp_filtro_ventas('Henry', NULL, NULL, NULL);

    -- Cliente + método de pago específico
    CALL sp_filtro_ventas('Henry', 'Efectivo', NULL, NULL);

    -- Rango de fechas específico
    CALL sp_filtro_ventas(NULL, NULL, '2024-01-01', '2024-06-30');

    -- Todos los filtros combinados
    CALL sp_filtro_ventas('Henry', 'Efectivo', '2024-01-01', '2024-06-30');

    -- Ver todas las ventas
    CALL sp_filtro_ventas(NULL, NULL, NULL, NULL);





╔══════════════════════════════════════════════════════════════════════════╗
║               FILTRO DE CATÁLOGO  ( sp_filtro_catalogo )                 ║
╠══════════════════════════════════════════════════════════════════════════╣
║ Propósito: Búsqueda filtrada en catálogo de vehículos                    ║
╚══════════════════════════════════════════════════════════════════════════╝
 -  Resultado:
┌────────────────────┬─────────────────────────────────────────────────────┐
│ Campo              │ Descripción                                         │
├────────────────────┼─────────────────────────────────────────────────────┤
│ marca              │ Marca del vehículo                                  │
│ modelo             │ Modelo específico                                   │
│ nombre_imagen      │ Imagen principal (sin modal)                        │
│ anio               │ Año del modelo                                      │
└────────────────────┴─────────────────────────────────────────────────────┘
- Parametros:
┌──────────────────┬──────────────┬─────────┬──────────────────────────────┐
│ Parámetro        │ Tipo         │ Req.    │ Descripción                  │
├──────────────────┼──────────────┼─────────┼──────────────────────────────┤
│ p_anio           │ INT          │ NO      │ Año específico               │
│ p_marca          │ VARCHAR(100) │ NO      │ Marca exacta                 │
│ p_modelo         │ VARCHAR(100) │ NO      │ Modelo exacto                │
│ p_precio_desde   │ INT          │ NO      │ Precio mínimo                │
│ p_precio_hasta   │ INT          │ NO      │ Precio máximo                │
│ p_combustible    │ VARCHAR(100) │ NO      │ Tipo de combustible          │
└──────────────────┴──────────────┴─────────┴──────────────────────────────┘
 - Ejemplos de uso
    -- Vehículos de marca específica
    CALL sp_filtro_catalogo(NULL, 'Toyota', NULL, NULL, NULL, NULL);

    -- Por rango de precio
    CALL sp_filtro_catalogo(NULL, NULL, NULL, 10000, 30000, NULL);

    -- Año y combustible específicos
    CALL sp_filtro_catalogo(2023, NULL, NULL, NULL, NULL, 'Gasolina');

    -- Búsqueda completa
    CALL sp_filtro_catalogo(2023, 'Toyota', 'Corolla', 15000, 25000, 'Híbrido');