<link rel="stylesheet" href="../styles.css">

<?php

require_once("../../config/conexion_bd.php");
$con = ConexionBD::obtenerInstancia()->obtenerConexion();

if ($con != NULL) {

    // Si se envió el formulario por POST
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        if (isset($_POST['id'], $_POST['monto'], $_POST['fecha'], $_POST['tarjeta'])) {
            $id = $_POST['id'];
            $monto = $_POST['monto'];
            $fecha = $_POST['fecha'];
            $tarjeta = $_POST['tarjeta'];

            $consulta = "UPDATE pago SET monto = $monto, fecha_pago = '$fecha', tarjeta = '$tarjeta' WHERE id_pago = $id";
            $respuesta = mysqli_query($con, $consulta);

            if ($respuesta) {
                header("Location: adminPago.php");
                exit();
            } else {
                echo "Error al modificar: " . mysqli_error($con);
            }
        } else {
            echo "Faltan datos para modificar.";
        }
    } elseif (isset($_GET['id'])) {
        $id = $_GET['id'];

        $consulta = "SELECT * FROM pago WHERE id_pago = $id";
        $resultado = mysqli_query($con, $consulta);

        if ($fila = mysqli_fetch_assoc($resultado)) {
?>

            <h1>Modificar Pago</h1>

            <form action="modificar.php" method="post">
                <input type="hidden" name="id" value="<?php echo $fila['id_pago']; ?>">

                <div>
                    <label for="monto">Monto:</label>
                    <input id="monto" name="monto" type="number" step="0.01" value="<?php echo $fila['monto']; ?>">
                </div>

                <div>
                    <label for="fecha">Fecha de Pago:</label>
                    <input id="fecha" name="fecha" type="date" value="<?php echo $fila['fecha_pago']; ?>">
                </div>

                <div>
                    <label for="tarjeta">Tarjeta:</label>
                    <input id="tarjeta" name="tarjeta" type="text" value="<?php echo $fila['tarjeta']; ?>">
                </div>

                <div>
                    <input type="submit" value="Guardar cambios">
                </div>
            </form>

<?php
        } else {
            echo "Pago no encontrado.";
        }
    } else {
        echo "ID de pago no proporcionado.";
    }
} else {
    echo "Error en la conexión a la base de datos.";
}
