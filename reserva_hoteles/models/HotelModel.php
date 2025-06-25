<?php
require_once 'config/conexion_bd.php';

class HotelModel
{
    public function obtenerTodosLosHoteles()
    {
        $con = ConexionBD::obtenerInstancia()->obtenerConexion();
        $query = "SELECT id_hotel, nombre, categoria, ubicacion, estrellas, imagen FROM hotel";
        $resultado = mysqli_query($con, $query);

        $hoteles = [];
        while ($fila = mysqli_fetch_assoc($resultado)) {
            $hoteles[] = $fila;
        }

        return $hoteles;
    }

    public function obtenerPorId($id)
    {
        $con = ConexionBD::obtenerInstancia()->obtenerConexion();
        if (!$con) return false;

        $consulta = "SELECT * FROM hotel WHERE id_hotel = $id";
        $resultado = mysqli_query($con, $consulta);

        return mysqli_fetch_assoc($resultado);
    }

    public function obtenerFacilidadesPorHotel($id_hotel)
    {
        $con = ConexionBD::obtenerInstancia()->obtenerConexion();
        $query = "SELECT pileta, restaurante, spa FROM facilidades WHERE id_hotel = $id_hotel";
        $resultado = mysqli_query($con, $query);

        return mysqli_fetch_assoc($resultado);
    }
}
