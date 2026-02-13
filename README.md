# ComunidAuto – Prueba Técnica PHP

Aplicación web desarrollada en PHP que simula una agencia de autos, permitiendo visualizar vehículos, aplicar filtros y consultar detalles individuales.

El proyecto se encuentra completamente dockerizado, permitiendo levantar todo el entorno (backend, frontend y base de datos) con un solo comando.

---

# Arquitectura del Proyecto

El sistema está compuesto por:

- Frontend – Interfaz visual para listado, filtros y detalle de vehículos.
- Backend (API en PHP) – Lógica de negocio y acceso a base de datos.
- Base de datos MySQL – Persistencia de información.
- phpMyAdmin – Visualización y gestión de base de datos.
- Docker + Docker Compose – Orquestación del entorno completo.

---

# Tecnologías Utilizadas

- PHP  
- MySQL  
- Bootstrap 5  
- HTML5 / CSS3  
- Docker  
- Docker Compose  
- phpMyAdmin  

---


# Funcionalidades implementadas

Listado de vehículos:

Cada vehículo muestra:
- Marca
- Modelo
- Año
- Precio
- Imagen
Los datos se obtienen desde MySQL mediante consultas al backend

---
# Decisiones Técnicas

- Se utilizó PHP aproximado al nivel solicitado en la prueba.
- Se implementó Docker para garantizar portabilidad y evitar problemas de entorno.
- Se separó frontend y backend para mantener una arquitectura más clara.
- Bootstrap 5 fue utilizado para lograr una interfaz moderna y responsiva.
- La base de datos fue modelada respetando principios de normalización básica.
- Se utilizaron procedimientos almacenados para centralizar la lógica SQL.

---

# Levantar el Proyecto

## Requisitos

- Docker  
- Docker Compose  

## Ejecutar el entorno completo

Desde la raíz del proyecto:

```bash
docker-compose up --build


URLs:

- Frontend: http://localhost:8000/frontend/

- Backend: http://localhost:8000/backend/
## Ejemplo de uso:
    http://localhost:8000/backend/catalogo
    {
    "id_vehiculo": 16,
    "marca": "Chevrolet",
    "modelo": "Onix",
    "nombre_imagen": "chevrolet-onix-blanco.avif",
    "nombre_imagen_modal": "chevrolet-onix-modal.avif",
    "anio": 2023,
    "precio": "16500000.00",
    "kilometros": 9000,
    "color": "Blanco",
    "combustible": "Nafta"
  }
- PhpMyAdmin: http://localhost:8080/
    #Base de datos: AgenciaVehiculos

