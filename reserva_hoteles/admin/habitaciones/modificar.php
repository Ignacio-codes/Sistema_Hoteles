<link rel="stylesheet" href="../styles.css">

<?php
require_once("../../config/conexion_bd.php");
$con = ConexionBD::obtenerInstancia()->obtenerConexion();

if ($con != NULL) {

    // Si se envió el formulario por POST (guardar cambios)
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        if (
            isset($_POST['id']) &&
            isset($_POST['num']) &&
            isset($_POST['pi']) &&
            isset($_POST['cap']) &&
            isset($_POST['esta']) &&
            isset($_POST['hotel']) &&
            isset($_POST['tipo'])
        ) {
            $id = $_POST['id'];
            $numero = $_POST['num'];
            $piso = $_POST['pi'];
            $capacidad = $_POST['cap'];
            $estado = $_POST['esta'];
            $id_hotel = $_POST['hotel'];
            $id_tipo = $_POST['tipo'];

            $consulta = "UPDATE habitacion SET
                id_hotel = '$id_hotel',
                id_tipo = '$id_tipo',
                numero = '$numero',
                piso = '$piso',
                capacidad = '$capacidad',
                estado = '$estado'
                WHERE id_habitacion = $id";

            $respuesta = mysqli_query($con, $consulta);

            if ($respuesta) {
                header("Location: adminHabitacion.php");
                exit();
            } else {
                echo "Error al modificar: " . mysqli_error($con);
            }
        } else {
            echo "Faltan datos para modificar.";
        }

    // Si venís desde adminHabitacion.php para editar (mostrar formulario)
    } elseif (isset($_GET['id'])) {
        $id = $_GET['id'];

        $consulta = "SELECT * FROM habitacion WHERE id_habitacion = $id";
        $resultado = mysqli_query($con, $consulta);

        if ($fila = mysqli_fetch_assoc($resultado)) {
?>

<h1>Modificar Habitación</h1>

<form action="modificar.php" method="post">
    <input type="hidden" name="id" value="<?php echo $fila['id_habitacion']; ?>">

    <div>
        <label for="hotel">Hotel:</label>
        <select name="hotel" id="hotel" required>
            <?php
            // Obtener lista de hoteles para el select
            $consulta_hoteles = "SELECT id_hotel, nombre FROM hotel ORDER BY nombre";
            $res_hoteles = mysqli_query($con, $consulta_hoteles);

            while ($hotel = mysqli_fetch_assoc($res_hoteles)) {
                $selected = ($hotel['id_hotel'] == $fila['id_hotel']) ? "selected" : "";
                echo "<option value='{$hotel['id_hotel']}' $selected>{$hotel['nombre']}</option>";
            }
            ?>
        </select>
    </div>

    <div>
        <label for="tipo">Tipo de Habitación:</label>
        <select name="tipo" id="tipo" required>
            <?php
            // Obtener lista de tipos de habitación para el select
            $consulta_tipos = "SELECT id_tipo, tipo FROM tipo_habitacion ORDER BY id_tipo";
            $res_tipos = mysqli_query($con, $consulta_tipos);

            while ($tipo = mysqli_fetch_assoc($res_tipos)) {
                $selected = ($tipo['id_tipo'] == $fila['id_tipo']) ? "selected" : "";
                echo "<option value='{$tipo['id_tipo']}' $selected>{$tipo['tipo']}</option>";
            }
            ?>
        </select>
    </div>

    <div>
        <label for="num">Número:</label>
        <input id="num" name="num" type="text" value="<?php echo $fila['numero']; ?>" required>
    </div>

    <div>
        <label for="pi">Piso:</label>
        <input id="pi" name="pi" type="text" value="<?php echo $fila['piso']; ?>" required>
    </div>

    <div>
        <label for="cap">Capacidad:</label>
        <input id="cap" name="cap" type="text" value="<?php echo $fila['capacidad']; ?>" required>
    </div>

    <div>
        <label for="esta">Estado:</label>
        <select name="esta" id="esta" required>
            <option value="1" <?php if($fila['estado']==1) echo "selected"; ?>>Disponible</option>
            <option value="0" <?php if($fila['estado']==0) echo "selected"; ?>>No disponible</option>
        </select>
    </div>

    <div>
        <input type="submit" value="Guardar cambios">
    </div>
</form>

<?php
        } else {
            echo "Habitación no encontrada.";
        }
    } else {
        echo "ID de habitación no proporcionado.";
    }
} else {
    echo "Error en la conexión a la base de datos.";
}
?>