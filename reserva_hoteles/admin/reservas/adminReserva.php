<?php
require_once("../../config/conexion_bd.php");
$con = ConexionBD::obtenerInstancia()->obtenerConexion();

if ($con != NULL) {
    echo "

    <a href=\"../admin.php\">
    <h1>Panel de Administración de Reservas</h1>
    </a>

    ";

    $consulta = "SELECT * FROM reserva";
    $respuesta = mysqli_query($con, $consulta);

    echo "
    <table border='1'>
        <caption>Listado de Reservas</caption>
        <tr>
            <th>ID Reserva</th>
            <th>ID Cliente</th>
            <th>ID Habitación</th>
            <th>ID Descuento</th>
            <th>Fecha Reserva</th>
            <th>Fecha Llegada</th>
            <th>Fecha Partida</th>
            <th>Precio Total</th>
            <th>Modificar</th>
            <th>Eliminar</th>
        </tr>
    ";

    while ($fila = mysqli_fetch_array($respuesta)) {
        echo "
        <tr>
            <td>{$fila['id_reserva']}</td>
            <td>{$fila['id_cliente']}</td>
            <td>{$fila['id_habitacion']}</td>
            <td>{$fila['id_descuento']}</td>
            <td>{$fila['fecha_reserva']}</td>
            <td>{$fila['fecha_llegada']}</td>
            <td>{$fila['fecha_partida']}</td>
            <td>{$fila['precio_total']}</td>
            <td><a href='modificar.php?id={$fila['id_reserva']}'>Modificar</a></td>
            <td><a href='eliminar.php?id={$fila['id_reserva']}'>Eliminar</a></td>
        </tr>
        ";
    }

    echo "</table>";
}

?>

<head>
    <meta charset="UTF-8">
    <title>Panel - Reservas</title>
    <link rel="stylesheet" href="../styles.css">
</head>

<h3>Agregar Reserva</h3>

<form action="agregar.php" method="post">

    <div>
        <label for="cliente">ID Cliente:</label>
        <input id="cliente" name="cliente" type="number">
    </div>

    <div>
        <label for="habitacion">ID Habitación:</label>
        <input id="habitacion" name="habitacion" type="number">
    </div>

    <div>
        <label for="descuento">ID Descuento:</label>
        <input id="descuento" name="descuento" type="number">
    </div>

    <div>
        <label for="fecha_reserva">Fecha de Reserva:</label>
        <input id="fecha_reserva" name="fecha_reserva" type="date">
    </div>

    <div>
        <label for="fecha_llegada">Fecha de Llegada:</label>
        <input id="fecha_llegada" name="fecha_llegada" type="date">
    </div>

    <div>
        <label for="fecha_partida">Fecha de Partida:</label>
        <input id="fecha_partida" name="fecha_partida" type="date">
    </div>

    <div>
        <label for="precio_total">Precio Total:</label>
        <input id="precio_total" name="precio_total" type="number" step="0.01">
    </div>

    <!-- Datos de pago -->
    <div>
        <label for="tarjeta">Tarjeta:</label>
        <input id="tarjeta" name="tarjeta" type="text">
    </div>

    <div>
        <input type="submit" value="Enviar">
    </div>

</form>