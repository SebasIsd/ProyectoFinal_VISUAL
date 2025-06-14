<?php
class MvcController {
    public function template() {
        include "views/template.php";
    }
public function enlacesPaginasController() {
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    if (isset($_GET['action'])) {
        $enlacesController = $_GET['action'];
    } else {
        $enlacesController = "inicio";
    }

    // Verificar autenticación para servicios
    if ($enlacesController == 'servicios') {
        if (!isset($_SESSION['user_id'])) {
            header("Location: index.php?action=login");
            exit();
        }
    }

    $respuesta = EnlacesPaginas::enlacesPaginasModel($enlacesController);
    include $respuesta;
}
}