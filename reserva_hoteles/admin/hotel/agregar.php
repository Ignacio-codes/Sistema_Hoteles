<?php

require_once("../../config/conexion_bd.php");
$con = ConexionBD::obtenerInstancia()->obtenerConexion();

if ($con != NULL) {
    if (
        isset($_POST['nom']) &&
        isset($_POST['cat']) &&
        isset($_POST['ubi']) &&
        isset($_POST['est']) &&
        isset($_FILES['img'])
    ) {
        $nombre = $_POST['nom'];
        $categoria = $_POST['cat'];
        $ubicacion = $_POST['ubi'];
        $estrellas = $_POST['est'];

        $imagen = "";
        if ($_FILES['img']['error'] === 0) {
            $nombreTemp = $_FILES['img']['tmp_name'];
            $nombreFinal = basename($_FILES['img']['name']);
            $destino = "../../imagenes/" . $nombreFinal;

            if (move_uploaded_file($nombreTemp, $destino)) {
                $imagen = $nombreFinal;
            } else {
                echo "Error al subir la imagen.";
                exit();
            }
        } else {
            echo "No se subió ninguna imagen.";
            exit();
        }

        $consulta = "INSERT INTO hotel(nombre, categoria, ubicacion, estrellas, imagen)
                    VALUES ('$nombre','$categoria','$ubicacion','$estrellas', '$imagen')";
        mysqli_query($con, $consulta);

        header("Location: adminHotel.php");
        exit();
    } else {
        echo "Faltan datos.";
    }
} else {
    echo "Error de conexión.";
}
