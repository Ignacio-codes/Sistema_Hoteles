<link rel="stylesheet" href="../styles.css">

<?php

require_once("../../config/conexion_bd.php");
$con = ConexionBD::obtenerInstancia()->obtenerConexion();

if ($con != NULL) {

    // Si se envió el formulario por POST
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        if (
            isset(
                $_POST['id'],
                $_POST['nombre'],
                $_POST['apellido'],
                $_POST['email'],
                $_POST['contrasenia'],
                $_POST['telefono']
            )
        ) {
            $id = $_POST['id'];
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $email = $_POST['email'];
            $contrasenia = $_POST['contrasenia'];
            $telefono = $_POST['telefono'];

            $consulta = "UPDATE usuario 
                        SET nombre = '$nombre',
                            apellido = '$apellido',
                            email = '$email',
                            contrasenia = '$contrasenia',
                            telefono = '$telefono'
                        WHERE id_usuario = $id";

            $respuesta = mysqli_query($con, $consulta);

            if ($respuesta) {
                header("Location: adminUsuario.php");
                exit();
            } else {
                echo "Error al modificar: " . mysqli_error($con);
            }
        } else {
            echo "Faltan datos para modificar.";
        }
    } elseif (isset($_GET['id'])) {
        $id = $_GET['id'];

        $consulta = "SELECT * FROM usuario WHERE id_usuario = $id";
        $resultado = mysqli_query($con, $consulta);

        if ($fila = mysqli_fetch_assoc($resultado)) {
?>

            <h1>Modificar Usuario</h1>

            <form action="modificar.php" method="post">
                <input type="hidden" name="id" value="<?php echo $fila['id_usuario']; ?>">

                <div>
                    <label for="nombre">Nombre:</label>
                    <input id="nombre" name="nombre" type="text" value="<?php echo $fila['nombre']; ?>">
                </div>

                <div>
                    <label for="apellido">Apellido:</label>
                    <input id="apellido" name="apellido" type="text" value="<?php echo $fila['apellido']; ?>">
                </div>

                <div>
                    <label for="email">Email:</label>
                    <input id="email" name="email" type="email" value="<?php echo $fila['email']; ?>">
                </div>

                <div>
                    <label for="contrasenia">Contraseña:</label>
                    <input id="contrasenia" name="contrasenia" type="text" value="<?php echo $fila['contrasenia']; ?>">
                </div>

                <div>
                    <label for="telefono">Teléfono:</label>
                    <input id="telefono" name="telefono" type="text" value="<?php echo $fila['telefono']; ?>">
                </div>

                <div>
                    <input type="submit" value="Guardar cambios">
                </div>
            </form>

<?php
        } else {
            echo "Usuario no encontrado.";
        }
    } else {
        echo "ID de usuario no proporcionado.";
    }
} else {
    echo "Error en la conexión a la base de datos.";
}
