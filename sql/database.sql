CREATE DATABASE IF NOT EXISTS `AgenciaVehiculos` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `AgenciaVehiculos`;

CREATE TABLE IF NOT EXISTS `Clientes` (
  `id_cliente` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(255) NOT NULL,
  `telefono` VARCHAR(50) NOT NULL,
  `email` VARCHAR(255) NOT NULL UNIQUE,
  `ciudad` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id_cliente`)
) ENGINE=InnoDB DEFAULT CHARACTER SET utf8mb4
COLLATE utf8mb4_0900_ai_ci;

CREATE TABLE IF NOT EXISTS `Marcas` (
  `id_marca` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id_marca`)
) ENGINE=InnoDB DEFAULT CHARACTER SET utf8mb4
COLLATE utf8mb4_0900_ai_ci;

CREATE TABLE IF NOT EXISTS `Modelos` (
  `id_modelo` INT NOT NULL AUTO_INCREMENT,
  `id_marca` INT NOT NULL,
  `nombre` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id_modelo`),
  FOREIGN KEY (`id_marca`) REFERENCES `Marcas`(`id_marca`)
) ENGINE=InnoDB DEFAULT CHARACTER SET utf8mb4
COLLATE utf8mb4_0900_ai_ci;

CREATE TABLE IF NOT EXISTS `Metodos_de_pago` (
  `id_metodo_pago` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id_metodo_pago`)
) ENGINE=InnoDB DEFAULT CHARACTER SET utf8mb4
COLLATE utf8mb4_0900_ai_ci;

CREATE TABLE IF NOT EXISTS `Tipos_combustible` (
  `id_combustible` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`id_combustible`)
) ENGINE=InnoDB DEFAULT CHARACTER SET utf8mb4
COLLATE utf8mb4_0900_ai_ci;


CREATE TABLE IF NOT EXISTS `Vehiculos_stock` (
  `id_vehiculo` INT NOT NULL AUTO_INCREMENT,
  `id_modelo` INT NOT NULL,
  `id_combustible` INT NOT NULL,
  `anio` INT NOT NULL,
  `color` VARCHAR(255) NOT NULL,
  `precio` DECIMAL(10,2) NOT NULL,
  `kilometros` INT UNSIGNED NOT NULL,
  `disponible` TINYINT UNSIGNED NOT NULL DEFAULT 1,
  PRIMARY KEY (`id_vehiculo`),
  FOREIGN KEY (`id_modelo`) REFERENCES `Modelos`(`id_modelo`)
  ON DELETE RESTRICT,
  FOREIGN KEY (`id_combustible`) REFERENCES `Tipos_combustible`(`id_combustible`)
) ENGINE=InnoDB DEFAULT CHARACTER SET utf8mb4
COLLATE utf8mb4_0900_ai_ci;

CREATE TABLE IF NOT EXISTS `Registro_ventas` (
  `id_operacion` INT NOT NULL AUTO_INCREMENT,
  `id_cliente` INT NOT NULL,
  `id_vehiculo` INT NOT NULL,
  `id_metodo_pago` INT NOT NULL,
  `fecha_venta` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `total` DECIMAL(10,2) NOT NULL,
  PRIMARY KEY (`id_operacion`),
  FOREIGN KEY (`id_cliente`) REFERENCES `Clientes`(`id_cliente`),
  FOREIGN KEY (`id_vehiculo`) REFERENCES `Vehiculos_stock`(`id_vehiculo`),
  FOREIGN KEY (`id_metodo_pago`) REFERENCES `Metodos_de_pago`(`id_metodo_pago`)
) ENGINE=InnoDB DEFAULT CHARACTER SET utf8mb4
COLLATE utf8mb4_0900_ai_ci;

CREATE TABLE IF NOT EXISTS `Imagenes_vehiculos` (
  `id_imagen` INT NOT NULL AUTO_INCREMENT,
  `id_vehiculo` INT NOT NULL ,
  `nombre_imagen` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id_imagen`),
  FOREIGN KEY (`id_vehiculo`) REFERENCES `Vehiculos_stock`(`id_vehiculo`)
) ENGINE=InnoDB DEFAULT CHARACTER SET utf8mb4
COLLATE utf8mb4_0900_ai_ci;



  INSERT INTO Marcas (nombre) VALUES
  ('Toyota'),
  ('Volkswagen'),
  ('Ford'),
  ('Chevrolet'),
  ('Peugeot'),
  ('Renault'),
  ('Honda'),
  ('Nissan'),
  ('Fiat'),
  ('Jeep');

  INSERT INTO Modelos (id_marca, nombre) VALUES
  (1, 'Corolla'),
  (1, 'Hilux'),
  (2, 'Golf'),
  (2, 'Amarok'),
  (3, 'Focus'),
  (3, 'Ranger'),
  (4, 'Cruze'),
  (4, 'Onix'),
  (5, '208'),
  (5, '2008'),
  (6, 'Sandero'),
  (6, 'Duster'),
  (7, 'Civic'),
  (7, 'HR-V'),
  (8, 'Sentra'),
  (8, 'Frontier'),
  (9, 'Cronos'),
  (9, 'Toro'),
  (10, 'Renegade'),
  (10, 'Compass');

  INSERT INTO Clientes (nombre, telefono, email, ciudad) VALUES
  ('Henry Ford', '2364556677', 'henry.ford@mail.com', 'Junín'),
  ('Enzo Ferrari', '2364551122', 'enzo.ferrari@mail.com', 'Chacabuco'),
  ('Ferruccio Lamborghini', '2364998877', 'ferruccio.lamborghini@mail.com', 'Lincoln'),
  ('Louis Renault', '2364778899', 'louis.renault@mail.com', 'Pergamino'),
  ('Ettore Bugatti ', '2364887766', 'ettore.bugatti@mail.com', 'Rojas'),
  ('Ferdinand Porsche', '2364559988', 'ferdinand.porsche@mail.com', 'Junín'),
  ('Karl Benz', '2364665544', 'karl.benz@mail.com', 'Los Toldos'),
  ('Walter Owen Bentley', '2364773322', 'walter.bentley@mail.com', 'Chivilcoy'),
  ('Kiichiro Toyoda', '2364992211', 'kiichiro.toyoda@mail.com', 'Bragado'),
  ('Alfieri Maserati', '2364554433', 'alfieri.maserati@mail.com', 'Junín');

  INSERT INTO Metodos_de_pago (nombre) VALUES
  ('Efectivo'),
  ('Transferencia'),
  ('Tarjeta de crédito'),
  ('Financiación');
  
  INSERT INTO Tipos_combustible (nombre) VALUES
  ('Nafta'),
  ('Diesel'),
  ('Híbrido'),
  ('Eléctrico'),
  ('GNC');

  INSERT INTO Vehiculos_stock (id_modelo, id_combustible, anio, color, precio, kilometros) VALUES
    -- Toyota
    (1, 1, 2020, 'Blanco', 18500000, 42000),
    (1, 1, 2022, 'Gris',   21000000, 18000),
    (2, 2, 2019, 'Negro',  25500000, 65000),
    (2, 2, 2023, 'Blanco', 34500000, 8000),

    -- Volkswagen
    (3, 1, 2018, 'Rojo',   15500000, 78000),
    (3, 1, 2021, 'Blanco', 19500000, 35000),
    (4, 2, 2020, 'Gris',   28500000, 42000),
    (4, 2, 2022, 'Negro',  35500000, 15000),

    -- Ford
    (5, 1, 2019, 'Azul',   14500000, 82000),
    (5, 1, 2021, 'Gris',   17500000, 36000),
    (6, 2, 2020, 'Blanco', 29500000, 48000),
    (6, 2, 2023, 'Negro',  37000000, 6000),

    -- Chevrolet
    (7, 1, 2021, 'Blanco', 19000000, 30000),
    (7, 1, 2022, 'Negro',  21500000, 19000),
    (8, 1, 2020, 'Rojo',   13500000, 55000),
    (8, 1, 2023, 'Blanco', 16500000, 9000),

    -- Peugeot
    (9, 1, 2022, 'Azul',   17000000, 14000),
    (9, 1, 2023, 'Rojo',   18500000, 6000),
    (10,1, 2021, 'Gris',   22500000, 32000),
    (10,1, 2022, 'Blanco', 24500000, 18000),

    -- Renault
    (11,1, 2019, 'Gris',   12500000, 70000),
    (11,1, 2021, 'Blanco', 14500000, 38000),
    (12,2, 2020, 'Negro',  21500000, 52000),
    (12,2, 2022, 'Gris',   25500000, 21000),

    -- Honda
    (13,1, 2021, 'Blanco', 26500000, 28000),
    (13,1, 2023, 'Negro',  31000000, 9000),
    (14,1, 2022, 'Gris',   29500000, 16000),

    -- Nissan
    (15,1, 2020, 'Azul',   17500000, 48000),
    (16,2, 2021, 'Blanco', 30500000, 35000),

    -- Jeep
    (19,1, 2022, 'Blanco', 27500000, 18000),
    (20,1, 2023, 'Negro',  32500000, 7000);



  INSERT INTO Registro_ventas 
  (id_cliente, id_vehiculo, id_metodo_pago, fecha_venta, total) VALUES

  (1, 1, 1, '2023-01-15 10:30:00', 18500000),
  (2, 4, 4, '2024-02-10 15:45:00', 34500000),
  (3, 7, 2, '2024-03-05 12:20:00', 28500000),
  (4, 9, 3, '2024-03-28 18:10:00', 14500000),
  (5, 12, 4, '2024-04-12 11:00:00', 37000000),

  (6, 15, 1, '2024-05-03 09:40:00', 13500000),
  (7, 18, 2, '2024-05-22 16:25:00', 18500000),
  (8, 20, 3, '2024-06-10 14:50:00', 24500000),
  (9, 22, 1, '2024-06-30 10:15:00', 14500000),
  (10, 24, 4, '2024-07-18 17:35:00', 25500000),

  (1, 26, 2, '2025-08-09 13:10:00', 26500000),
  (2, 27, 3, '2025-08-27 19:00:00', 31000000),
  (3, 29, 1, '2025-09-14 11:45:00', 17500000),
  (4, 30, 4, '2025-10-02 16:30:00', 30500000),
  (5, 6, 2, '2025-10-21 10:00:00', 19500000);

  UPDATE Vehiculos_stock
  SET disponible = 0
  WHERE id_vehiculo IN 
  (1, 4, 7, 9, 12, 15, 18, 20, 22, 24, 26, 27, 29, 30, 6);

INSERT INTO Imagenes_vehiculos
  (id_vehiculo, nombre_imagen) VALUES
  (2, 'toyota-corolla-gris.png'),
  (3, 'toyota-hilux-negra.png'),
  (5, 'volkswagen-golf-rojo.jpg'),
  (8, 'volkswagen-amarok-negra.png'),
  (10, 'ford-focus-gris.jpg'),
  (11, 'ford-ranger-blanca.png'),
  (13, 'chevrolet-cruze-blanco.avif'),
  (14, 'chevrolet-cruze-negro.avif'),
  (16, 'chevrolet-onix-blanco.avif'),
  (17, 'peugeot-208-azul.jpg'),
  (19, 'peugeot-2008-gris.jpg'),
  (21, 'renault-sandero-gris.jpg'),
  (23, 'renault-duster-negro.jpg'),
  (25, 'honda-civic-blanco.jpg'),
  (28, 'nissan-sentra-azul.webp'),
  (31, 'jeep-compass-negra.jpg');

INSERT INTO Imagenes_vehiculos
  (id_vehiculo, nombre_imagen) VALUES
  (2, 'toyota-corolla-modal.png'),
  (3, 'toyota-hilux-modal.png'),
  (5, 'volkswagen-golf-modal.jpg'),
  (8, 'volkswagen-amarok-modal.png'),
  (10, 'ford-focus-modal.jpg'),
  (11, 'ford-ranger-modal.png'),
  (13, 'chevrolet-cruze-blanco-modal.avif'),
  (14, 'chevrolet-cruze-negro-modal.avif'),
  (16, 'chevrolet-onix-modal.avif'),
  (17, 'peugeot-208-modal.jpg'),
  (19, 'peugeot-2008-modal.jpg'),
  (21, 'renault-sandero-modal.jpg'),
  (23, 'renault-duster-modal.jpg'),
  (25, 'honda-civic-modal.jpg'),
  (28, 'nissan-sentra-modal.webp'),
  (31, 'jeep-compass-modal.jpg');

DELIMITER $$

CREATE PROCEDURE sp_filtro_ventas (
  IN p_cliente VARCHAR(100),
  IN p_metodo_pago VARCHAR(100),
  IN p_fecha_desde DATE,
  IN p_fecha_hasta DATE
)
BEGIN

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
    (p_cliente IS NULL OR p_cliente = '' OR C.nombre LIKE CONCAT('%', p_cliente, '%'))
    AND
    (p_metodo_pago IS NULL OR p_metodo_pago = '' OR Me.nombre = p_metodo_pago)
    AND
    (p_fecha_desde IS NULL OR R.fecha_venta >= p_fecha_desde)
    AND
    (p_fecha_hasta IS NULL OR R.fecha_venta <= p_fecha_hasta)
  ORDER BY R.fecha_venta DESC;

END $$

DELIMITER ;

DELIMITER $$

CREATE PROCEDURE sp_filtro_catalogo (
  IN p_anio INT,
  IN p_marca VARCHAR(100),
  IN p_modelo VARCHAR(100),
  IN p_precio_desde INT,
  IN p_precio_hasta INT,
  IN p_combustible VARCHAR(100)
)
BEGIN

  SELECT
    V.id_vehiculo
    Ma.nombre AS marca, 
    Mo.nombre AS modelo, 
    (
      SELECT ImgModal.nombre_imagen
      FROM Imagenes_vehiculos ImgModal
      WHERE ImgModal.id_vehiculo = V.id_vehiculo 
      AND ImgModal.nombre_imagen NOT LIKE '%modal%'
    ) 
    AS nombre_imagen,
    V.anio
  FROM Vehiculos_stock V
  JOIN Modelos Mo ON V.id_modelo = Mo.id_modelo
  JOIN Marcas Ma ON Mo.id_marca = Ma.id_marca
  WHERE
    V.disponible = 1
    AND (p_anio IS NULL OR p_anio = '' OR V.anio = p_anio)
    AND (p_marca IS NULL OR p_marca = '' OR Ma.nombre = p_marca)
    AND (p_modelo IS NULL OR p_modelo = '' OR Mo.nombre = p_modelo)
    AND (p_precio_desde IS NULL OR V.precio >= p_precio_desde)
    AND (p_precio_hasta IS NULL OR V.precio <= p_precio_hasta)
    AND (p_combustible IS NULL OR p_combustible = '' OR V.id_combustible = (SELECT id_combustible FROM Tipos_combustible WHERE nombre = p_combustible))
  ORDER BY V.anio DESC;

END $$

DELIMITER ;

DELIMITER $$

CREATE PROCEDURE sp_vehiculo_seleccionado (
  IN p_id_vehiculo INT
)
BEGIN
  SELECT
    Ma.nombre AS marca, 
    Mo.nombre AS modelo, 
    (
      SELECT ImgModal.nombre_imagen
      FROM Imagenes_vehiculos ImgModal
      WHERE ImgModal.id_vehiculo = V.id_vehiculo 
      AND ImgModal.nombre_imagen LIKE '%modal%'
    ) 
    AS nombre_imagen,
    V.precio,
    V.color,
    V.kilometros,
    Tc.nombre AS combustible,
    V.anio
  FROM Vehiculos_stock V
  JOIN Modelos Mo ON V.id_modelo = Mo.id_modelo
  JOIN Marcas Ma ON Mo.id_marca = Ma.id_marca
  JOIN Tipos_combustible Tc ON V.id_combustible = Tc.id_combustible
  WHERE
    V.disponible = 1
    AND V.id_vehiculo = p_id_vehiculo;
END $$

DELIMITER ;

