<?php
require_once 'models/HotelModel.php';

class HotelController
{
    public function mostrarHoteles()
    {
        $modelo = new HotelModel();
        $hoteles = $modelo->obtenerTodosLosHoteles();
        require 'views/index_view.php';
    }

    public function mostrarDetalle($id_hotel)
    {
        $modelo = new HotelModel();
        $hotel = $modelo->obtenerPorId($id_hotel);
        $facilidades = $modelo->obtenerFacilidadesPorHotel($id_hotel); // ✅ nueva línea

        return [
            'hotel' => $hotel,
            'facilidades' => $facilidades
        ];
    }
}
