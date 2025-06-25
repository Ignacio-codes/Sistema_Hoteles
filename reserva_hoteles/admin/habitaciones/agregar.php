<?php

require_once("../../config/conexion_bd.php");
$con = ConexionBD::obtenerInstancia()->obtenerConexion();

if ($con != NULL) {

    if (
        isset($_POST['num']) &&
        isset($_POST['pi']) &&
        isset($_POST['cap']) &&
        isset($_POST['esta']) &&
        isset($_POST['hotel']) &&
        isset($_POST['tipo'])
    ) {
        $numero = $_POST['num'];
        $piso = $_POST['pi'];
        $capacidad = $_POST['cap'];
        $estado = $_POST['esta'];
        $id_hotel = $_POST['hotel'];
        $id_tipo = $_POST['tipo'];

        $consulta = "INSERT INTO habitacion (id_hotel, id_tipo, numero, piso, capacidad, estado)
                    VALUES ('$id_hotel', '$id_tipo', '$numero', '$piso', '$capacidad', '$estado')";

        $respuesta = mysqli_query($con, $consulta);

        if ($respuesta) {
            header("Location: adminHabitacion.php");
            exit();
        } else {
            echo "Error al insertar la habitación: " . mysqli_error($con);
        }
    } else {
        echo "Faltan datos del formulario.";
    }

} else {
    echo "Algo salió mal con la conexión.";
}
