<?php

require_once("../../config/conexion_bd.php");
$con = ConexionBD::obtenerInstancia()->obtenerConexion();

if ($con != NULL) {

    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $consulta = "DELETE FROM descuento WHERE id_descuento = $id";
        $respuesta = mysqli_query($con, $consulta);

        if ($respuesta) {
            header("Location: adminDescuento.php");
            exit();
        } else {
            echo "Error al eliminar el descuento: " . mysqli_error($con);
        }
    } else {
        echo "ID no proporcionado.";
    }
} else {
    echo "Error en la conexión a la base de datos.";
}
