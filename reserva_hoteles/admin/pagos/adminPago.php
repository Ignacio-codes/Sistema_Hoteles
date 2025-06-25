<?php
require_once("../../config/conexion_bd.php");
$con = ConexionBD::obtenerInstancia()->obtenerConexion();

if ($con != NULL) {
    echo "

    <a href=\"../admin.php\">
    <h1>Panel de Administración de Pagos</h1>
    </a>

    ";

    $consulta = "SELECT id_pago, monto, fecha_pago, tarjeta FROM pago";
    $respuesta = mysqli_query($con, $consulta);

    echo "
    <table border='1'>
        <caption>Listado de Pagos</caption>
        <tr>
            <th>ID Pago</th>
            <th>Monto</th>
            <th>Fecha de Pago</th>
            <th>Tarjeta</th>
            <th>Modificar</th>
            <th>Eliminar</th>
        </tr>
    ";

    while ($fila = mysqli_fetch_array($respuesta)) {
        echo "
        <tr>
            <td>{$fila['id_pago']}</td>
            <td>{$fila['monto']}</td>
            <td>{$fila['fecha_pago']}</td>
            <td>{$fila['tarjeta']}</td>
            <td><a href='modificar.php?id={$fila['id_pago']}'>Modificar</a></td>
            <td><a href='eliminar.php?id={$fila['id_pago']}'>Eliminar</a></td>
        </tr>
        ";
    }

    echo "</table>";
}

?>

<head>
    <meta charset="UTF-8">
    <title>Panel - Pagos</title>
    <link rel="stylesheet" href="../styles.css">
</head>

<h3>Agregar Pago</h3>

<form action="agregar.php" method="post">

    <div>
        <label for="monto">Monto:</label>
        <input id="monto" name="monto" type="number" step="0.01">
    </div>

    <div>
        <label for="fecha">Fecha de Pago:</label>
        <input id="fecha" name="fecha" type="date">
    </div>

    <div>
        <label for="tarjeta">Tarjeta:</label>
        <input id="tarjeta" name="tarjeta" type="text">
    </div>

    <div>
        <input type="submit" value="Enviar">
    </div>

</form>