<?php
require_once("../../config/conexion_bd.php");
$con = ConexionBD::obtenerInstancia()->obtenerConexion();

if ($con != NULL) {
    echo "
    
    <a href=\"../admin.php\">
    <h1>Panel de Administración de Usuarios</h1>
    </a>
    
    ";

    $consulta = "SELECT * FROM usuario";
    $respuesta = mysqli_query($con, $consulta);

    echo "
    <table border='1'>
        <caption>Listado de Usuarios</caption>
        <tr>
            <th>ID Usuario</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Email</th>
            <th>Contraseña</th>
            <th>Teléfono</th>
            <th>Rol</th>
            <th>Modificar</th>
            <th>Eliminar</th>
        </tr>
    ";

    while ($fila = mysqli_fetch_array($respuesta)) {
        $rol = ($fila['id_usuario'] <= 6) ? 'Empleado' : 'Cliente';

        echo "
        <tr>
            <td>{$fila['id_usuario']}</td>
            <td>{$fila['nombre']}</td>
            <td>{$fila['apellido']}</td>
            <td>{$fila['email']}</td>
            <td>{$fila['contrasenia']}</td>
            <td>{$fila['telefono']}</td>
            <td>$rol</td>
            <td><a href='modificar.php?id={$fila['id_usuario']}'>Modificar</a></td>
            <td><a href='eliminar.php?id={$fila['id_usuario']}'>Eliminar</a></td>
        </tr>
        ";
    }

    echo "</table>";
}
?>

<head>
    <meta charset="UTF-8">
    <title>Panel - Usuarios</title>
    <link rel="stylesheet" href="../styles.css">
</head>

<h3>Agregar Usuario</h3>

<form action="agregar.php" method="post">
    <div>
        <label for="nombre">Nombre:</label>
        <input id="nombre" name="nombre" type="text" required>
    </div>
    <div>
        <label for="apellido">Apellido:</label>
        <input id="apellido" name="apellido" type="text" required>
    </div>
    <div>
        <label for="email">Email:</label>
        <input id="email" name="email" type="email" required>
    </div>
    <div>
        <label for="contrasenia">Contraseña:</label>
        <input id="contrasenia" name="contrasenia" type="text" required>
    </div>
    <div>
        <label for="telefono">Teléfono:</label>
        <input id="telefono" name="telefono" type="text" required>
    </div>
    <div>
        <label for="rol">Rol:</label>
        <select name="rol" id="rol" required>
            <option value="cliente">Cliente</option>
            <option value="empleado">Empleado</option>
        </select>
    </div>
    <div>
        <input type="submit" value="Enviar">
    </div>
</form>