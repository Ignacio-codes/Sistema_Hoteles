<?php

require_once("../../config/conexion_bd.php");
$con = ConexionBD::obtenerInstancia()->obtenerConexion();

if ($con != NULL) {

    if (isset($_POST['monto']) && isset($_POST['fecha']) && isset($_POST['tarjeta'])) {
        $monto = $_POST['monto'];
        $fecha = $_POST['fecha'];
        $tarjeta = $_POST['tarjeta'];

        $consulta = "INSERT INTO pago(monto, fecha_pago, tarjeta) VALUES ($monto, '$fecha', '$tarjeta')";
        $respuesta = mysqli_query($con, $consulta);

        if ($respuesta) {
            header("Location: adminPago.php");
            exit();
        } else {
            echo "Error al agregar el pago: " . mysqli_error($con);
        }
    } else {
        echo "Faltan datos para agregar el pago.";
    }
} else {
    echo "Error en la conexión a la base de datos.";
}
