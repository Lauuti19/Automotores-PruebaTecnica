
-- Todas las ventas realizadas por un mismo cliente.
    SELECT
    R.id_operacion,
    C.nombre AS cliente,
    C.telefono,
    Ma.nombre AS marca,
    Mo.nombre AS modelo,
    V.color,
    V.kilometros,
    Me.nombre AS metodo_de_pago,
    R.fecha_venta,
    R.total
  FROM Registro_ventas R
  JOIN Clientes C ON R.id_cliente = C.id_cliente
  JOIN Vehiculos_stock V ON R.id_vehiculo = V.id_vehiculo
  JOIN Metodos_de_pago Me ON R.id_metodo_pago = Me.id_metodo_pago
  JOIN Modelos Mo ON V.id_modelo = Mo.id_modelo
  JOIN Marcas Ma ON Mo.id_marca = Ma.id_marca
  WHERE
    C.nombre LIKE '%Henry%'
  ORDER BY R.fecha_venta DESC;



-- Todos los vehículos con año mayor a 2020.
  SELECT
    V.id_vehiculo,
    Ma.nombre AS marca, 
    Mo.nombre AS modelo, 
    V.anio,
    V.precio,
    V.kilometros,
    V.color,
    Tc.nombre as combustible
  FROM Vehiculos_stock V
  JOIN Modelos Mo ON V.id_modelo = Mo.id_modelo
  JOIN Marcas Ma ON Mo.id_marca = Ma.id_marca
  JOIN Tipos_combustible Tc ON V.id_combustible = Tc.id_combustible
  WHERE
    V.disponible = 1
    AND V.anio > 2020
  ORDER BY V.anio DESC;



-- Todas las ventas que tengan como forma de pago “Efectivo”.
    SELECT
    R.id_operacion,
    C.nombre AS cliente,
    C.telefono,
    Ma.nombre AS marca,
    Mo.nombre AS modelo,
    V.color,
    V.kilometros,
    Me.nombre AS metodo_de_pago,
    R.fecha_venta,
    R.total
  FROM Registro_ventas R
  JOIN Clientes C ON R.id_cliente = C.id_cliente
  JOIN Vehiculos_stock V ON R.id_vehiculo = V.id_vehiculo
  JOIN Metodos_de_pago Me ON R.id_metodo_pago = Me.id_metodo_pago
  JOIN Modelos Mo ON V.id_modelo = Mo.id_modelo
  JOIN Marcas Ma ON Mo.id_marca = Ma.id_marca
  WHERE
    Me.nombre LIKE '%Efectivo%'
  ORDER BY R.fecha_venta DESC;

