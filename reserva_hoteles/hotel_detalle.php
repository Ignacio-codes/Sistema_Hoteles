<?php
require_once 'controllers/HotelController.php';

if (isset($_GET['id'])) {
    $id_hotel = intval($_GET['id']);
    $controlador = new HotelController();
    $datos = $controlador->mostrarDetalle($id_hotel); // ahora devuelve un array con hotel y facilidades

    if ($datos && isset($datos['hotel'])) {
        $hotel = $datos['hotel'];
        $facilidades = $datos['facilidades']; // facilidades estará disponible en la vista
        require 'views/hotel_detalle_view.php';
    } else {
        echo "<p>Hotel no encontrado.</p>";
    }
} else {
    echo "<p>ID de hotel no proporcionado.</p>";
}
