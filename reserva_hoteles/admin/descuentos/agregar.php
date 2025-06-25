<?php

require_once("../../config/conexion_bd.php");
$con = ConexionBD::obtenerInstancia()->obtenerConexion();

if ($con != NULL) {

    if (isset($_POST['cod']) && isset($_POST['por'])) {
        $codigo = $_POST['cod'];
        $porcentaje = $_POST['por'];

        // Asegura que el porcentaje sea tratado como número decimal
        $porcentaje = floatval($porcentaje);

        $consulta = "INSERT INTO descuento(codigo_descuento, porcentaje) VALUES ('$codigo', $porcentaje)";
        $respuesta = mysqli_query($con, $consulta);

        if ($respuesta) {
            header("Location: adminDescuento.php");
            exit();
        } else {
            echo "Error al agregar el descuento: " . mysqli_error($con);
        }
    } else {
        echo "Faltan datos.";
    }

} else {
    echo "Error en la conexión a la base de datos.";
}
