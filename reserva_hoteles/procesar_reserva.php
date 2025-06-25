<?php
require_once("config/conexion_bd.php");
$con = ConexionBD::obtenerInstancia()->obtenerConexion();

session_start();
$_SESSION["id_usuario"] = 1;

// ------------------------
// PATRÓN STRATEGY
// ------------------------

interface EstrategiaDescuento {
    public function aplicar(float $precioBase): float;
}

class DescuentoPorcentaje implements EstrategiaDescuento {
    private float $porcentaje;
    public function __construct(float $porcentaje) {
        $this->porcentaje = $porcentaje;
    }
    public function aplicar(float $precioBase): float {
        return $precioBase * (1 - $this->porcentaje);
    }
}

class SinDescuento implements EstrategiaDescuento {
    public function aplicar(float $precioBase): float {
        return $precioBase;
    }
}

class CalculadoraPrecio {
    private EstrategiaDescuento $estrategia;
    public function __construct(EstrategiaDescuento $estrategia) {
        $this->estrategia = $estrategia;
    }
    public function calcular(float $precioBase): float {
        return $this->estrategia->aplicar($precioBase);
    }
}

// ------------------------

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_hotel = intval($_POST["id_hotel"]);
    $id_habitacion = intval($_POST["id_habitacion"]);
    $fecha_llegada = $_POST["fecha_llegada"];
    $fecha_partida = $_POST["fecha_partida"];
    $nombre_cliente = trim($_POST["nombre_cliente"]);
    $tarjeta = $_POST["tarjeta"] ?? '';
    $id_usuario = $_SESSION["id_usuario"];

    if (!$id_habitacion || !$fecha_llegada || !$fecha_partida || !$nombre_cliente || !$id_usuario || !$tarjeta) {
        die("Faltan datos obligatorios.");
    }

    if ($con != NULL) {
        $clienteQuery = "SELECT id_cliente, descuento AS id_descuento FROM cliente WHERE id_usuario = $id_usuario";
        $clienteRes = mysqli_query($con, $clienteQuery);
        $cliente = mysqli_fetch_assoc($clienteRes);

        $id_cliente = $cliente["id_cliente"];
        $id_descuento = $cliente["id_descuento"];

        $descuentoQuery = "SELECT porcentaje FROM descuento WHERE id_descuento = $id_descuento";
        $descRes = mysqli_query($con, $descuentoQuery);
        $porcentaje = mysqli_fetch_assoc($descRes)["porcentaje"];

        $precioQuery = "
            SELECT th.precio
            FROM habitacion h
            JOIN tipo_habitacion th ON h.id_tipo = th.id_tipo
            WHERE h.id_habitacion = $id_habitacion
        ";
        $precioRes = mysqli_query($con, $precioQuery);
        $precio_noche = mysqli_fetch_assoc($precioRes)["precio"];

        $noches = (strtotime($fecha_partida) - strtotime($fecha_llegada)) / (60 * 60 * 24);
        $precio_base = $precio_noche * $noches;

        $estrategia = ($porcentaje > 0)
            ? new DescuentoPorcentaje($porcentaje)
            : new SinDescuento();

        $calculadora = new CalculadoraPrecio($estrategia);
        $precio_total = $calculadora->calcular($precio_base);

        // 1. Insertar reserva
        $query = "
            INSERT INTO reserva (
                id_cliente,
                id_habitacion,
                id_descuento,
                fecha_reserva,
                fecha_llegada,
                fecha_partida,
                precio_total
            ) VALUES (
                $id_cliente,
                $id_habitacion,
                $id_descuento,
                CURDATE(),
                '$fecha_llegada',
                '$fecha_partida',
                $precio_total
            )
        ";
        $resultado = mysqli_query($con, $query);

        if ($resultado) {
            // 2. Insertar pago
            $pagoQuery = "
                INSERT INTO pago (
                    monto,
                    fecha_pago,
                    tarjeta
                ) VALUES (
                    $precio_total,
                    CURDATE(),
                    '$tarjeta'
                )
            ";
            mysqli_query($con, $pagoQuery);

            // 3. Marcar habitación como no disponible
            mysqli_query($con, "UPDATE habitacion SET estado = 0 WHERE id_habitacion = $id_habitacion");
?>
<!DOCTYPE html>
<html lang='es'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Reserva Confirmada | HotelYA Premium</title>
    <link rel='stylesheet' href='./styles/styles.css'>
    <link rel='icon' href='./imagenes/icono.jpg' />
    <link href='https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Montserrat:wght@300;400;500;600&display=swap' rel='stylesheet'>
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

        main {
            padding: 3rem 1rem;
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: calc(100vh - 120px);
            text-align: center;
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

        .confirmation-container {
            max-width: 600px;
            width: 100%;
            padding: 2.5rem;
            background-color: rgba(61, 61, 61, 0.85);
            border-radius: var(--radius);
            box-shadow: var(--shadow-deep);
            position: relative;
            z-index: 1;
            border: 1px solid rgba(212, 175, 55, 0.3);
            backdrop-filter: blur(8px);
        }

        .confirmation-container h1 {
            font-family: 'Playfair Display', serif;
            color: var(--gold);
            margin-bottom: 1.5rem;
            font-size: 2rem;
            font-weight: 600;
            position: relative;
        }

        .confirmation-container h1::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 100px;
            height: 2px;
            background: var(--gold);
        }

        .confirmation-container p {
            margin: 1rem 0;
            font-size: 1.1rem;
            line-height: 1.6;
        }

        .confirmation-container strong {
            color: var(--gold-light);
            font-weight: 500;
        }

        .price-highlight {
            font-size: 1.5rem;
            color: var(--gold);
            font-weight: 600;
            margin: 1.5rem 0;
            display: inline-block;
            padding: 0.5rem 1.5rem;
            background-color: rgba(212, 175, 55, 0.1);
            border-radius: var(--radius);
            border: 1px dashed var(--gold);
        }

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
            text-decoration: none;
            margin-top: 1.5rem;
        }

        .btn-volver {
            background-color: transparent;
            color: var(--gold-light);
            border: 1px solid var(--gold);
        }

        .btn-volver:hover {
            background-color: rgba(212, 175, 55, 0.1);
            color: var(--gold);
        }

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

        @media (max-width: 768px) {
            header {
                flex-direction: column;
                padding: 1.5rem;
                text-align: center;
                gap: 1rem;
            }
            
            .confirmation-container {
                padding: 2rem 1.5rem;
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
            
            .confirmation-container {
                padding: 1.5rem;
            }
            
            .confirmation-container h1 {
                font-size: 1.5rem;
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
    <div class='decorative-elements'>
        <div class='decorative-element element-1'>✧</div>
        <div class='decorative-element element-2'>✧</div>
    </div>

    <header>
        <h1>HotelYA Premium</h1>
    </header>

    <main>
        <div class='confirmation-container'>
            <h1>¡Reserva confirmada!</h1>
            <p>Gracias <strong><?= htmlspecialchars($nombre_cliente) ?></strong> por elegir HotelYA Premium.</p>
            <p>Tu reserva ha sido registrada con éxito y estamos preparando todo para tu llegada.</p>
            <div class='price-highlight'>
                Total: <strong>$<?= number_format($precio_total, 2) ?></strong>
            </div>
            <p>Recibirás un correo electrónico con todos los detalles de tu reserva.</p>
            <a href='index.php' class='btn btn-volver'>← Volver al inicio</a>
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
<?php
        } else {
            echo "<p>Error al registrar la reserva: " . mysqli_error($con) . "</p>";
        }
    } else {
        echo "<p>Error de conexión con la base de datos.</p>";
    }
} else {
    echo "<p>Acceso no permitido.</p>";
}