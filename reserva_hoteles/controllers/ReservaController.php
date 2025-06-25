<?php
require_once 'models/ReservaModel.php';

class ReservaController
{
    public function mostrarFormularioReserva()
    {
        if (!isset($_GET['id_hotel'])) {
            echo "<p>No se especificó ningún hotel para reservar.</p>";
            return;
        }

        $id_hotel = intval($_GET['id_hotel']);
        $modelo = new ReservaModel();

        $hotel = $modelo->obtenerNombreHotel($id_hotel);
        $habitaciones = $modelo->obtenerHabitacionesDisponibles($id_hotel);

        if (!$hotel) {
            echo "<p>Hotel no encontrado.</p>";
            return;
        }

        // Tipos de tarjeta para mostrar en el <select>
        $tarjetas = ["Visa", "Mastercard", "American Express"];

        // Pasamos las variables necesarias a la vista
        require 'views/reserva_view.php';
    }
}
