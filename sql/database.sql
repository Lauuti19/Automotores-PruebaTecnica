CREATE DATABASE IF NOT EXISTS `AgenciaVehiculos` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `AgenciaVehiculos`;

CREATE TABLE IF NOT EXISTS `Clientes` (
  `id_cliente` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(255) NOT NULL,
  `telefono` VARCHAR(50) NOT NULL,
  `email` VARCHAR(255) NOT NULL UNIQUE,
  `ciudad` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id_cliente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE IF NOT EXISTS `Marcas` (
  `id_marca` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id_marca`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE IF NOT EXISTS `Modelos` (
  `id_modelo` INT NOT NULL AUTO_INCREMENT,
  `id_marca` INT NOT NULL,
  `nombre` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id_modelo`),
  FOREIGN KEY (`id_marca`) REFERENCES `Marcas`(`id_marca`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE IF NOT EXISTS `Metodos_de_pago` (
  `id_metodo_pago` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id_metodo_pago`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE IF NOT EXISTS `Vehiculos_stock` (
  `id_vehiculo` INT NOT NULL AUTO_INCREMENT,
  `id_modelo` INT NOT NULL,
  `anio` INT NOT NULL,
  `color` VARCHAR(255) NOT NULL,
  `precio` DECIMAL(10,2) NOT NULL,
  `kilometros` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`id_vehiculo`),
  FOREIGN KEY (`id_modelo`) REFERENCES `Modelos`(`id_modelo`)
  ON DELETE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE IF NOT EXISTS `Imagenes_vehiculos` (
  `id_imagen` INT NOT NULL AUTO_INCREMENT,
  `id_vehiculo` INT NOT NULL ,
  `nombre_imagen` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id_imagen`),
  FOREIGN KEY (`id_vehiculo`) REFERENCES `Vehiculos_stock`(`id_vehiculo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

