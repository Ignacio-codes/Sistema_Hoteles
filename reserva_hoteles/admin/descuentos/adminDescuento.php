<?php
require_once("../../config/conexion_bd.php");
$con = ConexionBD::obtenerInstancia()->obtenerConexion();

if ($con != NULL) {
    echo "

    <a href=\"../admin.php\">
    <h1>Panel de Administración de Descuentos</h1>
    </a>

    ";

    $consulta = "SELECT id_descuento, codigo_descuento, porcentaje FROM descuento";
    $respuesta = mysqli_query($con, $consulta);

    echo "
    <table border='1'>
        <caption>Listado de Descuentos</caption>
        <tr>
            <th>ID descuento</th>
            <th>Código de descuento</th>
            <th>Porcentaje</th>
            <th>Modificar</th>
            <th>Eliminar</th>
        </tr>
    ";

    while ($fila = mysqli_fetch_array($respuesta)) {
        echo "
        <tr>
            <td>{$fila['id_descuento']}</td>
            <td>{$fila['codigo_descuento']}</td>
            <td>{$fila['porcentaje']}</td>
            <td><a href='modificar.php?id={$fila['id_descuento']}'>Modificar</a></td>
            <td><a href='eliminar.php?id={$fila['id_descuento']}'>Eliminar</a></td>
        </tr>
        ";
    }

    echo "</table>";
}

?>

<head>
    <meta charset="UTF-8">
    <title>Panel - Descuentos</title>
    <link rel="stylesheet" href="../styles.css">
</head>

<h3>Agregar Descuento</h3>

<form action="agregar.php" method="post">

    <div>
        <label for="cod">Código de descuento:</label>
        <input id="cod" name="cod" type="text">
    </div>

    <div>
        <label for="por">Porcentaje:</label>
        <input id="por" name="por" type="number" step="0.01">
    </div>

    <div>
        <input type="submit" value="Enviar">
    </div>

</form>