<?php

require_once("../../config/conexion_bd.php");
$con = ConexionBD::obtenerInstancia()->obtenerConexion();

if ($con != NULL) {

    if (
        isset($_POST['cliente']) &&
        isset($_POST['habitacion']) &&
        isset($_POST['descuento']) &&
        isset($_POST['fecha_reserva']) &&
        isset($_POST['fecha_llegada']) &&
        isset($_POST['fecha_partida']) &&
        isset($_POST['precio_total']) &&
        isset($_POST['tarjeta'])
    ) {
        $cliente = $_POST['cliente'];
        $habitacion = $_POST['habitacion'];
        $descuento = $_POST['descuento'];
        $fecha_reserva = $_POST['fecha_reserva'];
        $fecha_llegada = $_POST['fecha_llegada'];
        $fecha_partida = $_POST['fecha_partida'];
        $precio_total = $_POST['precio_total'];
        $tarjeta = $_POST['tarjeta'];

        // 1. Insertar el pago
        $consultaPago = "INSERT INTO pago(monto, fecha_pago, tarjeta) 
                         VALUES ('$precio_total', CURDATE(), '$tarjeta')";
        $respuestaPago = mysqli_query($con, $consultaPago);

        if ($respuestaPago) {
            $id_pago = mysqli_insert_id($con); // obtener ID del nuevo pago

            // 2. Insertar la reserva con el ID del pago
            $consultaReserva = "INSERT INTO reserva(
                                    id_cliente, 
                                    id_habitacion, 
                                    id_descuento, 
                                    fecha_reserva, 
                                    fecha_llegada, 
                                    fecha_partida, 
                                    precio_total
                                ) VALUES (
                                    '$cliente', 
                                    '$habitacion', 
                                    '$descuento', 
                                    '$fecha_reserva', 
                                    '$fecha_llegada', 
                                    '$fecha_partida', 
                                    '$precio_total'
                                )";

            $respuestaReserva = mysqli_query($con, $consultaReserva);

            if ($respuestaReserva) {
                header("Location: adminReserva.php");
                exit();
            } else {
                echo "Error al registrar la reserva: " . mysqli_error($con);
            }
        } else {
            echo "Error al registrar el pago: " . mysqli_error($con);
        }
    } else {
        echo "Faltan datos.";
    }

} else {
    echo "Error en la conexión a la base de datos.";
}
