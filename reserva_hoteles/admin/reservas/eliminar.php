<?php

require_once("../../config/conexion_bd.php");
$con = ConexionBD::obtenerInstancia()->obtenerConexion();

if ($con != NULL) {

    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $consulta = "DELETE FROM reserva WHERE id_reserva = $id";
        $respuesta = mysqli_query($con, $consulta);

        if ($respuesta) {
            header("Location: adminReserva.php");
            exit();
        } else {
            echo "Error al eliminar la reserva: " . mysqli_error($con);
        }
    } else {
        echo "ID no proporcionado.";
    }
} else {
    echo "Error en la conexión a la base de datos.";
}
