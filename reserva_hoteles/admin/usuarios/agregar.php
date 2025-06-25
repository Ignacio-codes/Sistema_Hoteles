<?php

require_once("../../config/conexion_bd.php");
$con = ConexionBD::obtenerInstancia()->obtenerConexion();

if ($con != NULL) {

    if (
        isset($_POST['nombre']) &&
        isset($_POST['apellido']) &&
        isset($_POST['email']) &&
        isset($_POST['contrasenia']) &&
        isset($_POST['telefono']) &&
        isset($_POST['rol'])
    ) {
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $email = $_POST['email'];
        $contrasenia = $_POST['contrasenia'];
        $telefono = $_POST['telefono'];
        $rol = $_POST['rol']; // 'cliente' o 'empleado'

        // Insertar en usuario
        $consulta_usuario = "INSERT INTO usuario(nombre, apellido, email, contrasenia, telefono) 
                            VALUES ('$nombre', '$apellido', '$email', '$contrasenia', '$telefono')";
        $resultado_usuario = mysqli_query($con, $consulta_usuario);

        if ($resultado_usuario) {
            // Obtener el ID del nuevo usuario
            $id_usuario = mysqli_insert_id($con);

            if ($rol == "cliente") {
                // Insertar en cliente con descuento por defecto (puedes ajustarlo)
                $consulta_cliente = "INSERT INTO cliente(id_usuario, descuento) VALUES ($id_usuario, 0)";
                mysqli_query($con, $consulta_cliente);
            } elseif ($rol == "empleado") {
                // Insertar en empleado
                $consulta_empleado = "INSERT INTO empleado(id_usuario) VALUES ($id_usuario)";
                mysqli_query($con, $consulta_empleado);
            }

            header("Location: adminUsuario.php");
            exit();
        } else {
            echo "Error al insertar usuario: " . mysqli_error($con);
        }
    } else {
        echo "Faltan datos en el formulario.";
    }
} else {
    echo "Error en la conexión a la base de datos.";
}
