<link rel="stylesheet" href="../styles.css">

<?php

require_once("../../config/conexion_bd.php");
$con = ConexionBD::obtenerInstancia()->obtenerConexion();

if ($con != NULL) {

    // Si se envió el formulario por POST
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        if (isset($_POST['id'], $_POST['cod'], $_POST['por'])) {
            $id = $_POST['id'];
            $codigo = $_POST['cod'];
            $porcentaje = floatval($_POST['por']);

            $consulta = "UPDATE descuento SET codigo_descuento = '$codigo', porcentaje = $porcentaje WHERE id_descuento = $id";
            $respuesta = mysqli_query($con, $consulta);

            if ($respuesta) {
                header("Location: adminDescuento.php");
                exit();
            } else {
                echo "Error al modificar: " . mysqli_error($con);
            }
        } else {
            echo "Faltan datos para modificar.";
        }

    // Si venís desde adminDescuento.php para editar
    } elseif (isset($_GET['id'])) {
        $id = $_GET['id'];

        $consulta = "SELECT * FROM descuento WHERE id_descuento = $id";
        $resultado = mysqli_query($con, $consulta);

        if ($fila = mysqli_fetch_assoc($resultado)) {
?>

            <h1>Modificar Descuento</h1>

            <form action="modificar.php" method="post">
                <input type="hidden" name="id" value="<?php echo $fila['id_descuento']; ?>">

                <div>
                    <label for="cod">Código de descuento:</label>
                    <input id="cod" name="cod" type="text" value="<?php echo $fila['codigo_descuento']; ?>">
                </div>

                <div>
                    <label for="por">Porcentaje:</label>
                    <input id="por" name="por" type="number" step="0.01" value="<?php echo $fila['porcentaje']; ?>">
                </div>

                <div>
                    <input type="submit" value="Guardar cambios">
                </div>
            </form>

<?php
        } else {
            echo "Descuento no encontrado.";
        }
    } else {
        echo "ID de descuento no proporcionado.";
    }
} else {
    echo "Error en la conexión a la base de datos.";
}