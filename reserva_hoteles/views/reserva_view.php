<?php
$id_hotel = $_GET['id_hotel'];
?>
<!DOCTYPE html>
<html lang='es'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Reserva de Hotel | HotelYA Premium</title>
    <link rel='stylesheet' href='./styles/styles.css'>
    <link rel="icon" href="./imagenes/icono.jpg" />
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Montserrat:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>
        :root {
            --gold: #D4AF37;
            --gold-light: #F4E5C2;
            --gold-dark: #B38B2D;
            --black: #0A0A0A;
            --gray-dark: #1E1E1E;
            --gray-medium: #3D3D3D;
            --gray-light: #E0E0E0;
            --gray-soft: #F0F0F0;
            --white: #FFFFFF;
            --error: #C62828;
            --radius: 8px;
            --shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
            --shadow-text: 2px 2px 4px rgba(0, 0, 0, 0.3);
            --shadow-deep: 0 15px 30px rgba(0, 0, 0, 0.3);
            --transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Montserrat', sans-serif;
            background: 
                linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)),
                url('https://images.unsplash.com/photo-1566073771259-6a8506099945?ixlib=rb-4.0.3&auto=format&fit=crop&w=1950&q=80') no-repeat center center fixed;
            background-size: cover;
            color: var(--gray-light);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* Header Premium */
        header {
            background-color: var(--black);
            padding: 2rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: var(--shadow-deep);
            border-bottom: 1px solid rgba(212, 175, 55, 0.2);
        }

        header h1 {
            font-family: 'Playfair Display', serif;
            font-size: 1.8rem;
            font-weight: 600;
            color: var(--gold);
            letter-spacing: 1px;
            text-shadow: var(--shadow-text);
        }

        /* Main Content */
        main {
            padding: 3rem 1rem;
            position: relative;
            flex: 1;
        }

        main::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(30, 30, 30, 0.9);
            z-index: 0;
        }

        /* Form Container */
        .form-reserva {
            max-width: 600px;
            margin: 0 auto;
            padding: 2.5rem;
            background-color: rgba(61, 61, 61, 0.85);
            border-radius: var(--radius);
            box-shadow: var(--shadow-deep);
            position: relative;
            z-index: 1;
            border: 1px solid rgba(212, 175, 55, 0.3);
            backdrop-filter: blur(8px);
        }

        .form-reserva label {
            display: block;
            margin-top: 15px;
            margin-bottom: 8px;
            font-weight: 500;
            color: var(--gold-light);
        }

        .form-reserva select,
        .form-reserva input {
            width: 100%;
            padding: 12px;
            background-color: rgba(30, 30, 30, 0.7);
            border: 1px solid rgba(212, 175, 55, 0.3);
            border-radius: var(--radius);
            margin-bottom: 15px;
            color: var(--gray-light);
            font-family: 'Montserrat', sans-serif;
            transition: var(--transition);
        }

        .form-reserva select:focus,
        .form-reserva input:focus {
            outline: none;
            border-color: var(--gold);
            box-shadow: 0 0 0 2px rgba(212, 175, 55, 0.2);
        }

        .tipos-container {
            max-width: 800px;
            margin: 40px auto 20px;
            padding: 2rem;
            background-color: rgba(61, 61, 61, 0.85);
            border-radius: var(--radius);
            box-shadow: var(--shadow-deep);
            position: relative;
            z-index: 1;
            border: 1px solid rgba(212, 175, 55, 0.3);
            backdrop-filter: blur(8px);
        }

        .tipos-container h2 {
            font-family: 'Playfair Display', serif;
            color: var(--gold);
            margin-bottom: 1.5rem;
            font-size: 1.5rem;
            font-weight: 600;
            position: relative;
        }

        .tipos-container h2::after {
            content: '';
            position: absolute;
            bottom: -8px;
            left: 0;
            width: 60px;
            height: 2px;
            background: var(--gold);
        }

        .tipo-habitacion {
            margin-bottom: 2rem;
            padding-bottom: 1.5rem;
            border-bottom: 1px dashed rgba(212, 175, 55, 0.2);
        }

        .tipo-habitacion h3 {
            font-family: 'Playfair Display', serif;
            color: var(--gold);
            margin: 1rem 0;
            font-size: 1.2rem;
        }

        .tipo-habitacion p {
            margin: 0.5rem 0;
            line-height: 1.6;
        }

        .tipo-habitacion strong {
            color: var(--gold-light);
            font-weight: 500;
        }

        .boton-volver {
            text-align: center;
            margin: 30px 0;
        }

        /* Botones Premium */
        .btn {
            padding: 0.8rem 1.5rem;
            border: none;
            border-radius: var(--radius);
            font-size: 0.9rem;
            font-weight: 500;
            cursor: pointer;
            transition: var(--transition);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            letter-spacing: 0.8px;
            position: relative;
            overflow: hidden;
        }

        .btn-reservar {
            background-color: var(--gold);
            color: var(--black);
            font-weight: 600;
            margin-top: 1.5rem;
            width: 100%;
        }

        .btn-reservar:hover {
            background-color: var(--gold-light);
            transform: translateY(-3px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.25);
        }

        .btn-volver {
            background-color: transparent;
            color: var(--gold-light);
            border: 1px solid var(--gold);
            padding: 0.8rem 1.5rem;
            text-decoration: none;
            font-weight: 500;
        }

        .btn-volver:hover {
            background-color: rgba(212, 175, 55, 0.1);
            color: var(--gold);
        }

        .btn-logout {
            background-color: transparent;
            color: var(--gold-light);
            border: 1px solid var(--gold);
            padding: 0.6rem 1.2rem;
            border-radius: var(--radius);
            font-weight: 500;
            cursor: pointer;
            transition: var(--transition);
            font-family: 'Montserrat', sans-serif;
            letter-spacing: 0.8px;
        }

        .btn-logout:hover {
            background-color: rgba(212, 175, 55, 0.1);
            color: var(--gold);
        }

        /* FOOTER ESTILO HEADER */
        .footer {
            background-color: var(--black);
            padding: 1.5rem;
            text-align: center;
            box-shadow: var(--shadow-deep);
            position: relative;
            z-index: 10;
            border-top: 1px solid rgba(212, 175, 55, 0.2);
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .footer__content {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .footer__logo {
            width: 34px;
            height: 35px;
            object-fit: contain;
        }

        .footer__text {
            font-family: 'Montserrat', sans-serif;
            font-size: 0.9rem;
            color: var(--gold-light);
            letter-spacing: 0.5px;
        }

        /* Efecto shine para botones */
        .btn-reservar::after {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: linear-gradient(
                to bottom right,
                rgba(255, 255, 255, 0.3),
                rgba(255, 255, 255, 0.1),
                transparent
            );
            transform: rotate(30deg);
        }

        .btn-reservar:hover::after {
            animation: shine 1.5s infinite;
        }

        /* Decoraciones */
        .decorative-elements {
            position: absolute;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: 0;
            overflow: hidden;
        }

        .decorative-element {
            position: absolute;
            opacity: 0.08;
            font-size: 8rem;
            color: var(--gold);
            z-index: 0;
        }

        .element-1 {
            top: 15%;
            left: 5%;
            transform: rotate(-15deg);
        }

        .element-2 {
            bottom: 10%;
            right: 5%;
            transform: rotate(15deg);
        }

        @keyframes shine {
            to {
                left: 150%;
                top: 150%;
            }
        }

        /* Responsive */
        @media (max-width: 768px) {
            header {
                flex-direction: column;
                padding: 1.5rem;
                text-align: center;
                gap: 1rem;
            }
            
            .form-reserva, .tipos-container {
                padding: 2rem 1.5rem;
                max-width: 500px;
            }
            
            .footer {
                flex-direction: column;
                gap: 1rem;
                padding: 1.5rem 1rem;
            }
            
            .footer__content {
                flex-direction: column;
                gap: 0.5rem;
            }
        }

        @media (max-width: 480px) {
            header h1 {
                font-size: 1.5rem;
            }
            
            .form-reserva, .tipos-container {
                padding: 1.5rem;
            }
            
            .decorative-element {
                font-size: 6rem;
            }
            
            .footer__text {
                font-size: 0.8rem;
            }
        }
    </style>
</head>

<body>
    <div class="decorative-elements">
        <div class="decorative-element element-1">✧</div>
        <div class="decorative-element element-2">✧</div>
    </div>

    <header>
        <h1>Reserva - <?= htmlspecialchars($hotel['nombre']) ?></h1>
        <form method="post" action="logout.php" class="logout-form">
            <button type="submit" class="btn btn-logout">Cerrar Sesión</button>
        </form>
    </header>

    <main>
        <form action='procesar_reserva.php' method='post' class='form-reserva'>
            <input type='hidden' name='id_hotel' value='<?= $id_hotel ?>'>

            <label for='nombre_cliente'>Nombre completo</label>
            <input type='text' id='nombre_cliente' name='nombre_cliente' required>

            <label for='fecha_llegada'>Fecha de llegada</label>
            <input type='date' id='fecha_llegada' name='fecha_llegada' required>

            <label for='fecha_partida'>Fecha de partida</label>
            <input type='date' id='fecha_partida' name='fecha_partida' required>

            <label for='tarjeta'>Tarjeta de crédito</label>
            <select id='tarjeta' name='tarjeta' required>
                <option value=''>Seleccione una tarjeta</option>
                <option value='Visa'>Visa</option>
                <option value='Mastercard'>Mastercard</option>
                <option value='American Express'>American Express</option>
            </select>

            <label for='id_habitacion'>Selecciona una habitación disponible</label>

            <?php if (mysqli_num_rows($habitaciones) > 0): ?>
                <select name='id_habitacion' id='id_habitacion' required>
                    <option value=''>Seleccione una habitación</option>
                    <?php while ($hab = mysqli_fetch_assoc($habitaciones)) :
                        $info = "Hab. #{$hab['numero']} - Piso {$hab['piso']} - {$hab['tipo']} ({$hab['capacidad']} pers.) - \${$hab['precio']}";
                        echo "<option value='{$hab['id_habitacion']}'>".htmlspecialchars($info)."</option>";
                    endwhile; ?>
                </select>
            <?php else: ?>
                <p style="color: var(--gold-light); text-align: center; padding: 1rem; background-color: rgba(198, 40, 40, 0.2); border-radius: var(--radius);">
                    No hay habitaciones disponibles en este hotel actualmente.
                </p>
            <?php endif; ?>

            <button type='submit' class='btn btn-reservar'>Confirmar Reserva</button>
        </form>

        <?php
        mysqli_data_seek($habitaciones, 0);
        $tipos_mostrados = [];
        ?>

        <div class='tipos-container'>
            <h2>Tipos de habitación disponibles</h2>
            <?php while ($hab = mysqli_fetch_assoc($habitaciones)) :
                if (!in_array($hab['tipo'], $tipos_mostrados)) :
                    echo "
                    <div class='tipo-habitacion'>
                        <h3>".htmlspecialchars($hab['tipo'])."</h3>
                        <p><strong>Precio:</strong> \$".htmlspecialchars($hab['precio'])."</p>
                        <p><strong>Descripción:</strong> ".htmlspecialchars($hab['descripcion'])."</p>
                    </div>";
                    $tipos_mostrados[] = $hab['tipo'];
                endif;
            endwhile; ?>
        </div>

        <div class='boton-volver'>
            <a href='hotel_detalle.php?id=<?= $id_hotel ?>' class='btn btn-volver'>← Volver a detalles</a>
        </div>
    </main>
    
    <footer class="footer">
        <div class="footer__content">
            <img src="./imagenes/icono.jpg" alt="icono" class="footer__logo" />
            <p class="footer__text">&copy;2025 All Rights Reserved - by Marcos Grasset & Nicolás Ojeda.</p>
        </div>
    </footer>
</body>
</html>