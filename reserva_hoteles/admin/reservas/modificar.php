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
                $_POST['cli'],
                $_POST['hab'],
                $_POST['des'],
                $_POST['fres'],
                $_POST['flleg'],
                $_POST['fpart'],
                $_POST['precio']
            )
        ) {
            $id = $_POST['id'];
            $id_cliente = $_POST['cli'];
            $id_habitacion = $_POST['hab'];
            $id_descuento = $_POST['des'];
            $fecha_reserva = $_POST['fres'];
            $fecha_llegada = $_POST['flleg'];
            $fecha_partida = $_POST['fpart'];
            $precio_total = $_POST['precio'];

            $consulta = "UPDATE reserva 
                        SET id_cliente = $id_cliente,
                            id_habitacion = $id_habitacion,
                            id_descuento = $id_descuento,
                            fecha_reserva = '$fecha_reserva',
                            fecha_llegada = '$fecha_llegada',
                            fecha_partida = '$fecha_partida',
                            precio_total = $precio_total
                        WHERE id_reserva = $id";

            $respuesta = mysqli_query($con, $consulta);

            if ($respuesta) {
                header("Location: adminReserva.php");
                exit();
            } else {
                echo "Error al modificar la reserva: " . mysqli_error($con);
            }
        } else {
            echo "Faltan datos para modificar.";
        }

        // Si venís desde adminReserva.php para editar
    } elseif (isset($_GET['id'])) {

        $id = $_GET['id'];

        $consulta = "SELECT * FROM reserva WHERE id_reserva = $id";
        $resultado = mysqli_query($con, $consulta);

        if ($fila = mysqli_fetch_assoc($resultado)) {
?>

            <h1>Modificar Reserva</h1>

            <form action="modificar.php" method="post">
                <input type="hidden" name="id" value="<?php echo $fila['id_reserva']; ?>">

                <div>
                    <label for="cli">ID Cliente:</label>
                    <input id="cli" name="cli" type="number" value="<?php echo $fila['id_cliente']; ?>">
                </div>

                <div>
                    <label for="hab">ID Habitación:</label>
                    <input id="hab" name="hab" type="number" value="<?php echo $fila['id_habitacion']; ?>">
                </div>

                <div>
                    <label for="des">ID Descuento:</label>
                    <input id="des" name="des" type="number" value="<?php echo $fila['id_descuento']; ?>">
                </div>

                <div>
                    <label for="fres">Fecha Reserva:</label>
                    <input id="fres" name="fres" type="date" value="<?php echo $fila['fecha_reserva']; ?>">
                </div>

                <div>
                    <label for="flleg">Fecha Llegada:</label>
                    <input id="flleg" name="flleg" type="date" value="<?php echo $fila['fecha_llegada']; ?>">
                </div>

                <div>
                    <label for="fpart">Fecha Partida:</label>
                    <input id="fpart" name="fpart" type="date" value="<?php echo $fila['fecha_partida']; ?>">
                </div>

                <div>
                    <label for="precio">Precio Total:</label>
                    <input id="precio" name="precio" type="number" step="0.01" value="<?php echo $fila['precio_total']; ?>">
                </div>

                <div>
                    <input type="submit" value="Guardar cambios">
                </div>
            </form>

<?php
        } else {
            echo "Reserva no encontrada.";
        }
    } else {
        echo "ID de reserva no proporcionado.";
    }
} else {
    echo "Error en la conexión a la base de datos.";
}
