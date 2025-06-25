<?php

require_once("../../config/conexion_bd.php");
$con = ConexionBD::obtenerInstancia()->obtenerConexion();

if ($con != NULL) {

    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $consulta = "DELETE FROM pago WHERE id_pago = $id";
        $respuesta = mysqli_query($con, $consulta);

        if ($respuesta) {
            header("Location: adminPago.php");
            exit();
        } else {
            echo "Error al eliminar el pago: " . mysqli_error($con);
        }
    } else {
        echo "ID no proporcionado.";
    }
} else {
    echo "Error en la conexión a la base de datos.";
}
