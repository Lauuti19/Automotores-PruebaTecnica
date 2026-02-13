<?php
require_once(__DIR__ . '/../controllers/CatalogoController.php');

if (isset($_GET['tipo'])) {
    CatalogoController::datosParaFiltros();
} else {
    CatalogoController::filtro();
}