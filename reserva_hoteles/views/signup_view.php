<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrarse | HotelYA Premium</title>
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
            display: flex;
            justify-content: center;
            align-items: center;
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
        form {
            max-width: 500px;
            width: 100%;
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

        form h2 {
            font-family: 'Playfair Display', serif;
            color: var(--gold);
            text-align: center;
            margin-bottom: 2rem;
            font-size: 1.8rem;
            font-weight: 600;
            position: relative;
        }

        form h2::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 2px;
            background: var(--gold);
        }

        input {
            width: 100%;
            padding: 12px;
            background-color: rgba(30, 30, 30, 0.7);
            border: 1px solid rgba(212, 175, 55, 0.3);
            border-radius: var(--radius);
            margin-top: 1rem;
            margin-bottom: 0.5rem;
            color: var(--gray-light);
            font-family: 'Montserrat', sans-serif;
            transition: var(--transition);
        }

        input::placeholder {
            color: var(--gray-medium);
        }

        input:focus {
            outline: none;
            border-color: var(--gold);
            box-shadow: 0 0 0 2px rgba(212, 175, 55, 0.2);
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
            width: 100%;
            margin-top: 1.5rem;
        }

        .btn-submit {
            background-color: var(--gold);
            color: var(--black);
            font-weight: 600;
        }

        .btn-submit:hover {
            background-color: var(--gold-light);
            transform: translateY(-3px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.25);
        }

        /* Efecto shine para botones */
        .btn-submit::after {
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

        .btn-submit:hover::after {
            animation: shine 1.5s infinite;
        }

        .error {
            color: var(--gold-light);
            text-align: center;
            margin-top: 1.5rem;
            padding: 0.8rem;
            background-color: rgba(198, 40, 40, 0.2);
            border-radius: var(--radius);
            border-left: 3px solid var(--error);
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

        /* FOOTER (actualizado para coincidir con el primer código) */
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
            
            form {
                padding: 2rem 1.5rem;
                max-width: 450px;
            }

            /* Footer responsive */
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
            
            form {
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
        <h1>HotelYA Premium</h1>
        <div style="text-align: right; margin: 10px 20px;"></div>
    </header>

    <main>
        <form method="POST" action="signup.php">
            <h2>Crear Cuenta</h2>
            <input type="text" name="nombre" placeholder="Nombre" required>
            <input type="text" name="apellido" placeholder="Apellido" required>
            <input type="email" name="email" placeholder="Correo electrónico" required>
            <input type="password" name="contrasenia" placeholder="Contraseña (mínimo 4 caracteres)" required minlength="4">
            <input type="text" name="telefono" placeholder="Teléfono (10 dígitos)" required pattern="[0-9]{10}">

            <button type="submit" class="btn btn-submit">Registrarme</button>

            <?php if (!empty($mensaje_error)) : ?>
                <div class="error"><?= htmlspecialchars($mensaje_error) ?></div>
            <?php endif; ?>
        </form>
    </main>

    <!-- Footer actualizado para coincidir con el primer código -->
    <footer class="footer">
        <div class="footer__content">
            <img src="./imagenes/icono.jpg" alt="icono" class="footer__logo" />
            <p class="footer__text">&copy;2025 All Rights Reserved - by Marcos Grasset & Nicolás Ojeda.</p>
        </div>
    </footer>
</body>
</html>