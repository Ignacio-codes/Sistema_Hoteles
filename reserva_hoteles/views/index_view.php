<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio | HotelYA Premium</title>
    <link rel="stylesheet" href="./styles/styles.css">
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

        /* HEADER */
        .header {
            background-color: var(--black);
            padding: 2.5rem 1.5rem 1.5rem;
            text-align: center;
            box-shadow: var(--shadow-deep);
            position: relative;
            z-index: 10;
            border-bottom: 1px solid rgba(212, 175, 55, 0.2);
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
        }

        .header__title-container {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            justify-content: center;
            text-align: left;
            margin-left: 2rem;
        }

        .header__title {
            font-family: 'Playfair Display', serif;
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--gold);
            letter-spacing: 1.5px;
            text-shadow: var(--shadow-text);
            margin-bottom: 0;
            line-height: 1.2;
        }

        .header__subtitle {
            font-family: 'Montserrat', sans-serif;
            font-size: 0.9rem;
            color: var(--gold-light);
            letter-spacing: 4px;
            text-transform: uppercase;
            margin-top: 0.5rem;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.5);
            font-weight: 300;
        }

        /* MAIN CONTENT */
        .main-content {
            flex: 1;
            padding: 3rem 2rem;
            position: relative;
            z-index: 1;
        }

        .main-content::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(30, 30, 30, 0.9);
            z-index: -1;
        }

        .welcome-text {
            text-align: center;
            margin-bottom: 3rem;
            font-size: 1.2rem;
            color: var(--gold-light);
            letter-spacing: 0.5px;
            line-height: 1.6;
        }

        /* HOTEL CARDS */
        .hoteles-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 30px;
            padding: 20px;
            max-width: 1400px;
            margin: 0 auto;
        }

        .hotel-card {
            width: 300px;
            background-color: rgba(61, 61, 61, 0.85);
            border-radius: var(--radius);
            overflow: hidden;
            box-shadow: var(--shadow-deep);
            transition: var(--transition);
            border: 1px solid rgba(212, 175, 55, 0.3);
            backdrop-filter: blur(8px);
        }

        .hotel-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.4);
            border-color: var(--gold);
        }

        .hotel-img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-bottom: 1px solid rgba(212, 175, 55, 0.3);
        }

        .hotel-info {
            padding: 1.5rem;
        }

        .hotel-name {
            font-family: 'Playfair Display', serif;
            font-size: 1.5rem;
            color: var(--gold);
            margin-bottom: 0.5rem;
            font-weight: 600;
        }

        .hotel-location {
            font-size: 0.9rem;
            color: var(--gray-light);
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .hotel-stars {
            color: var(--gold);
            font-size: 1.2rem;
            margin-bottom: 1.5rem;
            letter-spacing: 2px;
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
            width: 100%;
        }

        .btn-info {
            background-color: var(--gold);
            color: var(--black);
            font-weight: 600;
        }

        .btn-info:hover {
            background-color: var(--gold-light);
            transform: translateY(-3px);
        }

        .btn-logout {
            background-color: transparent;
            color: var(--gold-light);
            border: 1px solid var(--gold);
            padding: 0.8rem 1.5rem;
            margin-left: auto;
            margin-right: 2rem;
        }

        .btn-logout:hover {
            background-color: rgba(212, 175, 55, 0.1);
            color: var(--gold);
        }

        /* FOOTER */
        .footer {
            background-color: var(--black);
            padding: 1.5rem;
            text-align: center;
            box-shadow: var(--shadow-deep);
            position: relative;
            z-index: 10;
            border-top: 1px solid rgba(212, 175, 55, 0.2);
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
        }

        .footer__content {
            display: flex;
            align-items: center;
            gap: 15px;
            margin: 0 auto;
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

        /* DECORATIVE ELEMENTS */
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
            .header {
                flex-direction: column;
                padding: 2rem 1rem;
            }
            
            .header__title-container {
                align-items: center;
                text-align: center;
                margin-left: 0;
                margin-bottom: 1rem;
            }
            
            .header__title {
                font-size: 2rem;
            }
            
            .header__subtitle {
                font-size: 0.8rem;
                letter-spacing: 3px;
            }
            
            .btn-logout {
                margin: 1rem auto 0;
            }
            
            .hotel-card {
                width: 280px;
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
            .header {
                padding: 1.5rem 1rem;
            }
            
            .header__title {
                font-size: 1.8rem;
            }
            
            .header__subtitle {
                font-size: 0.7rem;
                letter-spacing: 2px;
            }
            
            .main-content {
                padding: 2rem 1rem;
            }
            
            .hotel-card {
                width: 100%;
                max-width: 300px;
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

    <header class="header">
        <div class="header__title-container">
            <h1 class="header__title">HotelYA Premium</h1>
            <p class="header__subtitle">SISTEMA DE RESERVAS</p>
        </div>
        
        <form method="post" action="logout.php" class="logout-form">
            <button type="submit" class="btn btn-logout">Cerrar Sesión</button>
        </form>
    </header>

    <main class="main-content">
        <p class="welcome-text">Encuentra el hotel ideal para tu próxima estadía.</p>
        
        <div class="hoteles-container">
            <?php foreach ($hoteles as $fila): ?>
                <div class="hotel-card">
                    <img src="imagenes/<?= htmlspecialchars($fila['imagen']) ?>" alt="Imagen del hotel" class="hotel-img">
                    <div class="hotel-info">
                        <h2 class="hotel-name"><?= $fila['nombre'] ?></h2>
                        <p class="hotel-location">📍 <?= $fila['ubicacion'] ?></p>
                        <p class="hotel-stars"><?= str_repeat("★", $fila['estrellas']) ?></p>
                        <button class="btn btn-info" onclick="location.href='hotel_detalle.php?id=<?= $fila['id_hotel'] ?>'">Más Información</button>
                    </div>
                </div>
            <?php endforeach; ?>
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