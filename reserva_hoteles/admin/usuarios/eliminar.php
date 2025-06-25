<?php

require_once("../../config/conexion_bd.php");
$con = ConexionBD::obtenerInstancia()->obtenerConexion();

if ($con != NULL) {

    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        // Verificamos si el usuario está en la tabla cliente
        $consulta_cliente = "SELECT * FROM cliente WHERE id_usuario = $id";
        $resultado_cliente = mysqli_query($con, $consulta_cliente);

        if (mysqli_num_rows($resultado_cliente) > 0) {
            // Eliminar primero de cliente
            $eliminar_cliente = "DELETE FROM cliente WHERE id_usuario = $id";
            mysqli_query($con, $eliminar_cliente);
        } else {
            // Si no está en cliente, verificamos si está en empleado
            $consulta_empleado = "SELECT * FROM empleado WHERE id_usuario = $id";
            $resultado_empleado = mysqli_query($con, $consulta_empleado);

            if (mysqli_num_rows($resultado_empleado) > 0) {
                // Eliminar primero de empleado
                $eliminar_empleado = "DELETE FROM empleado WHERE id_usuario = $id";
                mysqli_query($con, $eliminar_empleado);
            }
        }

        // Finalmente, eliminar de usuario
        $consulta_usuario = "DELETE FROM usuario WHERE id_usuario = $id";
        $respuesta = mysqli_query($con, $consulta_usuario);

        if ($respuesta) {
            header("Location: adminUsuario.php");
            exit();
        } else {
            echo "Error al eliminar el usuario: " . mysqli_error($con);
        }
    } else {
        echo "ID no proporcionado.";
    }
} else {
    echo "Error en la conexión a la base de datos.";
}
