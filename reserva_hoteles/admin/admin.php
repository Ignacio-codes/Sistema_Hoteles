<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Panel de Administración</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        .logout-container {
            text-align: center;
            margin-top: 40px;
        }

        .logout-form {
            background: none;
            border: none;
            padding: 0;
            margin: 0;
            box-shadow: none;
            display: inline-block;
        }

        .btn-logout {
            background-color: #e53935;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-weight: bold;
            font-size: 16px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
            transition: background-color 0.3s ease;
        }

        .btn-logout:hover {
            background-color: #c62828;
        }
    </style>
</head>

<body>

    <h1>Panel de Administración</h1>
    <h2>Seleccione la sección que desea administrar</h2>

    <div class="panel-links">
        <a href="usuarios/adminUsuario.php">Usuarios</a>
        <a href="hotel/adminHotel.php">Hoteles</a>
        <a href="habitaciones/adminHabitacion.php">Habitaciones</a>
        <a href="reservas/adminReserva.php">Reservas</a>
        <a href="pagos/adminPago.php">Pagos</a>
        <a href="descuentos/adminDescuento.php">Descuentos</a>
    </div>

    <div class="logout-container">
        <form method="post" action="../logout.php" class="logout-form">
            <button type="submit" class="btn-logout">Cerrar Sesión</button>
        </form>
    </div>

</body>
</html>