<?php
require_once("../../config/conexion_bd.php");
$con = ConexionBD::obtenerInstancia()->obtenerConexion();

if ($con != NULL) {
    if (isset($_GET['id'])) {
        $id = intval($_GET['id']); // Por seguridad

        // 1. Elimina facilidades del hotel
        $queryFacilidades = "DELETE FROM facilidades WHERE id_hotel = $id";
        mysqli_query($con, $queryFacilidades);

        // 2. Elimina habitaciones del hotel
        $queryHabitaciones = "DELETE FROM habitacion WHERE id_hotel = $id";
        mysqli_query($con, $queryHabitaciones);

        // 3. Elimina el hotel
        $queryHotel = "DELETE FROM hotel WHERE id_hotel = $id";
        $resultado = mysqli_query($con, $queryHotel);

        if ($resultado) {
            header("Location: adminHotel.php");
            exit();
        } else {
            echo "Error al eliminar el hotel: " . mysqli_error($con);
        }
    } else {
        echo "ID no proporcionado.";
    }
} else {
    echo "Error en la conexión a la base de datos.";
}
