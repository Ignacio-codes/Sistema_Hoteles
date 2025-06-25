<?php
require_once("../../config/conexion_bd.php");
$con = ConexionBD::obtenerInstancia()->obtenerConexion();

if ($con != NULL) {
    echo "

    <a href=\"../admin.php\">
    <h1>Panel de Administración de Habitaciones</h1>
    </a>

    ";

    $consulta = "SELECT id_habitacion, id_hotel, id_tipo, numero, piso, capacidad, estado FROM habitacion";
    $respuesta = mysqli_query($con, $consulta);

    echo "
    <table border='1'>
        <caption>Listado de Habitaciones</caption>
        <tr>
            <th>ID Habitación</th>
            <th>ID Hotel</th>
            <th>ID Tipo</th>
            <th>Número</th>
            <th>Piso</th>
            <th>Capacidad</th>
            <th>Estado</th>
            <th>Modificar</th>
            <th>Eliminar</th>
        </tr>
    ";

    while ($fila = mysqli_fetch_array($respuesta)) {
        echo "
        <tr>
            <td>{$fila['id_habitacion']}</td>
            <td>{$fila['id_hotel']}</td>
            <td>{$fila['id_tipo']}</td>
            <td>{$fila['numero']}</td>
            <td>{$fila['piso']}</td>
            <td>{$fila['capacidad']}</td>
            <td>{$fila['estado']}</td>
            <td><a href='modificar.php?id={$fila['id_habitacion']}'>Modificar</a></td>
            <td><a href='eliminar.php?id={$fila['id_habitacion']}'>Eliminar</a></td>
        </tr>
        ";
    }

    echo "</table>";
} else {
    echo "Error en la conexión a la base de datos.";
}
?>

<head>
    <meta charset="UTF-8">
    <title>Panel - Habitaciones</title>
    <link rel="stylesheet" href="../styles.css">
</head>

<h3>Agregar Habitación</h3>

<form action="agregar.php" method="post">

    <div>
        <label for="hotel">Hotel:</label>
        <select name="hotel" id="hotel" required>
            <option value="">Seleccione un hotel</option>
            <option value="1">Hotel 1</option>
            <option value="2">Hotel 2</option>
            <option value="3">Hotel 3</option>
            <option value="4">Hotel 4</option>
            <option value="5">Hotel 5</option>
            <option value="6">Hotel 6</option>
            <option value="7">Hotel 7</option>
            <option value="8">Hotel 8</option>
            <option value="9">Hotel 9</option>
        </select>
    </div>

    <div>
        <label for="tipo">Tipo de Habitación:</label>
        <select name="tipo" id="tipo" required>
            <option value="">Seleccione un tipo</option>
            <option value="1">Normal</option>
            <option value="2">Suite</option>
            <option value="3">Grand Suite</option>
            <option value="4">Suite Ejecutiva</option>
        </select>
    </div>

    <div>
        <label for="num">Número:</label>
        <input id="num" name="num" type="text" required>
    </div>

    <div>
        <label for="pi">Piso:</label>
        <input id="pi" name="pi" type="text" required>
    </div>

    <div>
        <label for="cap">Capacidad:</label>
        <input id="cap" name="cap" type="text" required>
    </div>

    <div>
        <label for="esta">Estado:</label>
        <select name="esta" id="esta" required>
            <option value="">Seleccione estado</option>
            <option value="1">Disponible</option>
            <option value="0">No disponible</option>
        </select>
    </div>

    <div>
        <input type="submit" value="Enviar">
    </div>

</form>
