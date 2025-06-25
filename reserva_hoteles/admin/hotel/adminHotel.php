<?php
require_once("../../config/conexion_bd.php");
$con = ConexionBD::obtenerInstancia()->obtenerConexion();

if ($con != NULL) {
    echo "

    <a href=\"../admin.php\">
    <h1>Panel de Administración de Hoteles</h1>
    </a>

    ";

    $consulta = "SELECT id_hotel, nombre, categoria, ubicacion, estrellas, imagen FROM hotel";
    $respuesta = mysqli_query($con, $consulta);

    echo "
    <table border='1'>
        <caption>Listado de Hoteles</caption>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Categoría</th>
            <th>Ubicación</th>
            <th>Estrellas</th>
            <th>Imagen</th>
            <th>Modificar</th>
            <th>Eliminar</th>
        </tr>
    ";

    while ($fila = mysqli_fetch_array($respuesta)) {
        echo "
        <tr>
            <td>{$fila['id_hotel']}</td>
            <td>{$fila['nombre']}</td>
            <td>{$fila['categoria']}</td>
            <td>{$fila['ubicacion']}</td>
            <td>{$fila['estrellas']}</td>
            <td><img src='../../imagenes/{$fila['imagen']}' alt='Imagen Hotel' style='width: 100px;'></td>
            <td><a href='modificar.php?id={$fila['id_hotel']}'>Modificar</a></td>
            <td><a href='eliminar.php?id={$fila['id_hotel']}'>Eliminar</a></td>
        </tr>
        ";
    }

    echo "</table>";
}

?>

<head>
    <meta charset="UTF-8">
    <title>Panel - Hoteles</title>
    <link rel="stylesheet" href="../styles.css">
</head>

<h3>Agregar hotel</h3>

<form action="agregar.php" method="post" enctype="multipart/form-data">

    <div>
        <label for="nom">Nombre:</label>
        <input id="nom" name="nom" type="text">
    </div>

    <div>
        <label for="cat">Categoría:</label>
        <input id="cat" name="cat" type="text">
    </div>

    <div>
        <label for="ubi">Ubicación:</label>
        <input id="ubi" name="ubi" type="text">
    </div>

    <div>
        <label for="est">Estrellas:</label>
        <input id="est" name="est" type="number" min="1" max="5">
    </div>

    <div>
        <label for="img">Imagen:</label>
        <input id="img" name="img" type="file" accept="image/*" required>
    </div>


    <div>
        <input type="submit" value="Enviar">
    </div>

</form>