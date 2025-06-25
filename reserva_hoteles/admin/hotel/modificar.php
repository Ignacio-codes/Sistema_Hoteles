<link rel="stylesheet" href="../styles.css">

<?php

require_once("../../config/conexion_bd.php");
$con = ConexionBD::obtenerInstancia()->obtenerConexion();

if ($con != NULL) {

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        if (
            isset($_POST['id'], $_POST['nom'], $_POST['cat'], $_POST['ubi'], $_POST['est'])
        ) {
            $id = $_POST['id'];
            $nombre = $_POST['nom'];
            $categoria = $_POST['cat'];
            $ubicacion = $_POST['ubi'];
            $estrellas = $_POST['est'];

            // Obtener imagen actual
            $consultaImg = "SELECT imagen FROM hotel WHERE id_hotel = $id";
            $resultadoImg = mysqli_query($con, $consultaImg);
            $filaImg = mysqli_fetch_assoc($resultadoImg);
            $imagen = $filaImg['imagen'];

            // Procesar nueva imagen si se sube
            if (isset($_FILES['img']) && $_FILES['img']['error'] === 0) {
                $nombreTemp = $_FILES['img']['tmp_name'];
                $nombreFinal = basename($_FILES['img']['name']);
                $destino = "../../imagenes/" . $nombreFinal;

                if (move_uploaded_file($nombreTemp, $destino)) {
                    $imagen = $nombreFinal;
                } else {
                    echo "Error al subir la imagen.";
                    exit();
                }
            }

            $consulta = "UPDATE hotel SET nombre = '$nombre', categoria = '$categoria', ubicacion = '$ubicacion', estrellas = $estrellas, imagen = '$imagen' WHERE id_hotel = $id";
            $respuesta = mysqli_query($con, $consulta);

            if ($respuesta) {
                header("Location: adminHotel.php");
                exit();
            } else {
                echo "Error al modificar: " . mysqli_error($con);
            }
        } else {
            echo "Faltan datos.";
        }
    } elseif (isset($_GET['id'])) {
        $id = $_GET['id'];

        $consulta = "SELECT * FROM hotel WHERE id_hotel = $id";
        $resultado = mysqli_query($con, $consulta);

        if ($fila = mysqli_fetch_assoc($resultado)) {
?>

            <h1>Modificar Hotel</h1>

            <form action="modificar.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo $fila['id_hotel']; ?>">

                <div>
                    <label for="nom">Nombre:</label>
                    <input id="nom" name="nom" type="text" value="<?php echo $fila['nombre']; ?>">
                </div>

                <div>
                    <label for="cat">Categoría:</label>
                    <input id="cat" name="cat" type="text" value="<?php echo $fila['categoria']; ?>">
                </div>

                <div>
                    <label for="ubi">Ubicación:</label>
                    <input id="ubi" name="ubi" type="text" value="<?php echo $fila['ubicacion']; ?>">
                </div>

                <div>
                    <label for="est">Estrellas:</label>
                    <input id="est" name="est" type="number" value="<?php echo $fila['estrellas']; ?>" min="1" max="5">
                </div>

                <div>
                    <label for="img">Cambiar imagen:</label>
                    <input id="img" name="img" type="file" accept="image/*">
                    <p>Imagen actual: <?php echo $fila['imagen']; ?></p>
                </div>

                <div>
                    <input type="submit" value="Guardar cambios">
                </div>
            </form>

<?php
        } else {
            echo "Hotel no encontrado.";
        }
    } else {
        echo "ID de hotel no proporcionado.";
    }
} else {
    echo "Error de conexión.";
}

?>