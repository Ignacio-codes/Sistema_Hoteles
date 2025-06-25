<?php
require_once 'config/conexion_bd.php';

class ReservaModel
{
    public function obtenerNombreHotel($id_hotel)
    {
        $con = ConexionBD::obtenerInstancia()->obtenerConexion();
        $query = "SELECT nombre FROM hotel WHERE id_hotel = $id_hotel";
        $resultado = mysqli_query($con, $query);

        return mysqli_fetch_assoc($resultado);
    }

    public function obtenerHabitacionesDisponibles($id_hotel)
    {
        $con = ConexionBD::obtenerInstancia()->obtenerConexion();
        $query = "
            SELECT h.id_habitacion, h.numero, h.piso, h.capacidad, th.tipo, th.descripcion, th.precio
            FROM habitacion h
            JOIN tipo_habitacion th ON h.id_tipo = th.id_tipo
            WHERE h.id_hotel = $id_hotel AND h.estado = 1
        ";

        return mysqli_query($con, $query);
    }

    public function registrarPago($monto, $tarjeta)
    {
        $con = ConexionBD::obtenerInstancia()->obtenerConexion();
        $fecha = date('Y-m-d'); // fecha de hoy
        $query = "INSERT INTO pago (monto, fecha_pago, tarjeta) VALUES ('$monto', '$fecha', '$tarjeta')";

        if (mysqli_query($con, $query)) {
            return mysqli_insert_id($con); // devuelve id_pago generado
        } else {
            return false;
        }
    }
}
