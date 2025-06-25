<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión - HotelYA Premium</title>
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

        /* HEADER AJUSTADO */
        .header {
            background-color: var(--black);
            padding: 2.5rem 1.5rem 1.5rem;
            text-align: center;
            box-shadow: var(--shadow-deep);
            position: relative;
            z-index: 10;
            border-bottom: 1px solid rgba(212, 175, 55, 0.2);
        }

        .header__title-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
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
        .header__title::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 0;
            width: 100%;
            height: 2px;
            background: linear-gradient(90deg, transparent, var(--gold), transparent);
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

        /* EL RESTO DEL CSS PERMANECE IGUAL */
        .login-container {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 3rem 2rem;
            position: relative;
        }

        .login-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(30, 30, 30, 0.9);
            z-index: 0;
        }

        .login-form {
            width: 100%;
            max-width: 480px;
            padding: 3.5rem;
            background-color: rgba(61, 61, 61, 0.85);
            border-radius: var(--radius);
            box-shadow: var(--shadow-deep);
            position: relative;
            z-index: 1;
            border: 1px solid rgba(212, 175, 55, 0.3);
            backdrop-filter: blur(8px);
            transform-style: preserve-3d;
            perspective: 1000px;
        }

        .login-form::before {
            content: '';
            position: absolute;
            top: -2px;
            left: -2px;
            right: -2px;
            bottom: -2px;
            background: linear-gradient(45deg, var(--gold), var(--gold-dark), var(--gold));
            z-index: -1;
            border-radius: var(--radius);
            opacity: 0.2;
            transform: translateZ(-10px);
        }

        .login-form__title {
            text-align: center;
            margin-bottom: 3rem;
            font-family: 'Playfair Display', serif;
            font-size: 2rem;
            font-weight: 600;
            color: var(--gold);
            position: relative;
            text-shadow: var(--shadow-text);
            letter-spacing: 1px;
        }

        .login-form__title::after {
            content: '';
            position: absolute;
            bottom: -15px;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 3px;
            background: var(--gold);
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
        }

        .form-group {
            margin-bottom: 2rem;
        }

        .form-label {
            display: block;
            margin-bottom: 0.8rem;
            font-size: 0.9rem;
            font-weight: 400;
            color: var(--gold-light);
            letter-spacing: 0.8px;
            text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.2);
        }

        .form-input {
            width: 100%;
            padding: 1.1rem 1.2rem;
            border: 1px solid var(--gray-medium);
            border-radius: var(--radius);
            font-size: 1rem;
            transition: var(--transition);
            background-color: rgba(240, 240, 240, 0.95);
            color: var(--gray-dark);
            box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.1);
        }

        .form-input:focus {
            outline: none;
            border-color: var(--gold);
            background-color: var(--white);
            box-shadow: 0 0 0 3px rgba(212, 175, 55, 0.2), inset 0 1px 3px rgba(0, 0, 0, 0.1);
            transform: translateY(-2px);
        }

        .form-input::placeholder {
            color: var(--gray-medium);
            opacity: 0.8;
            font-weight: 300;
        }

        .btn {
            width: 100%;
            padding: 1.1rem;
            border: none;
            border-radius: var(--radius);
            font-size: 1rem;
            font-weight: 500;
            cursor: pointer;
            transition: var(--transition);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.8rem;
            letter-spacing: 0.8px;
            position: relative;
            overflow: hidden;
        }

        .btn--primary {
            background-color: var(--gold);
            color: var(--black);
            font-weight: 600;
            text-shadow: 0 1px 1px rgba(255, 255, 255, 0.3);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
        }

        .btn--primary:hover {
            background-color: var(--gold-light);
            transform: translateY(-3px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.25);
        }

        .btn--primary::after {
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

        .btn--primary:hover::after {
            animation: shine 1.5s infinite;
        }

        .btn--secondary {
            background-color: transparent;
            color: var(--gold-light);
            border: 1px solid var(--gold);
            margin-top: 1.2rem;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .btn--secondary:hover {
            background-color: rgba(212, 175, 55, 0.1);
            color: var(--gold);
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
        }

        .error-message {
            color: var(--white);
            background-color: var(--error);
            padding: 1.1rem;
            border-radius: var(--radius);
            margin: 2rem 0;
            text-align: center;
            font-size: 0.9rem;
            font-weight: 500;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        }

        .form-footer {
            text-align: center;
            margin-top: 2.5rem;
            font-size: 0.85rem;
            color: var(--gold);
            text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.2);
        }

        .form-footer a::after {
            content: '';
            position: absolute;
            bottom: -3px;
            left: 0;
            width: 0;
            height: 1px;
            background: var(--gold);
            transition: var(--transition);
        }

        .form-footer a:hover::after {
            width: 100%;
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

        @media (max-width: 768px) {
            .header__title {
                font-size: 2rem;
            }
            
            .header__subtitle {
                font-size: 0.8rem;
                letter-spacing: 3px;
            }
            
            .login-form {
                padding: 3rem 2rem;
                max-width: 420px;
            }
            
            .login-form__title {
                font-size: 1.8rem;
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
                padding: 2rem 1rem 1rem;
            }
            
            .header__title {
                font-size: 1.8rem;
            }
            
            .header__subtitle {
                font-size: 0.7rem;
                letter-spacing: 2px;
                margin-top: 0.3rem;
            }
            
            .login-form {
                padding: 2.5rem 1.5rem;
            }
            
            .login-form__title {
                font-size: 1.5rem;
                margin-bottom: 2.5rem;
            }
            
            .form-group {
                margin-bottom: 1.5rem;
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
    </header>

    <div class="login-container">
        <form class="login-form" method="POST" action="login.php">
            <h2 class="login-form__title">Acceso Exclusivo</h2>
            
            <div class="form-group">
                <label for="email" class="form-label">Correo Electrónico</label>
                <input type="email" id="email" name="email" class="form-input" placeholder="su.correo@ejemplo.com" required>
            </div>
            
            <div class="form-group">
                <label for="contrasenia" class="form-label">Contraseña</label>
                <input type="password" id="contrasenia" name="contrasenia" class="form-input" placeholder="••••••••" required>
            </div>
            
            <button type="submit" class="btn btn--primary">Ingresar</button>
            <button type="button" class="btn btn--secondary" onclick="window.location.href='signup.php'">Registrarse</button>

            <?php if (!empty($mensaje_error)) : ?>
                <div class="error-message"><?= $mensaje_error ?></div>
            <?php endif; ?>
        </form>
    </div>
    
    <footer class="footer">
        <div class="footer__content">
            <img src="./imagenes/icono.jpg" alt="icono" class="footer__logo" />
            <p class="footer__text">&copy;2025 All Rights Reserved - by Marcos Grasset & Nicolás Ojeda.</p>
        </div>
    </footer>
</body>
</html>