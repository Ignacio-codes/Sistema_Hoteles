<?php
require_once 'models/AuthModel.php';


class AuthController
{
    public function iniciarSesion()
    {
        session_start();
        $mensaje_error = "";

        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $email = trim($_POST["email"]);
            $contrasenia = trim($_POST["contrasenia"]);

            $modelo = new AuthModel();
            $usuario = $modelo->verificarCredenciales($email, $contrasenia);

            if ($usuario) {
                $_SESSION["id_usuario"] = $usuario["id_usuario"];
                $_SESSION["nombre"] = $usuario["nombre"];

                if ($usuario["id_usuario"] <= 6) {
                    header("Location: admin/admin.php");
                } else {
                    header("Location: index.php");
                }
                exit();
            } else {
                $mensaje_error = "Correo o contraseña incorrectos.";
            }
        }

        require 'views/login_view.php';
    }

    public function registrar()
    {
        $mensaje_error = "";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nombre = trim($_POST["nombre"]);
            $apellido = trim($_POST["apellido"]);
            $email = trim($_POST["email"]);
            $contrasenia = trim($_POST["contrasenia"]);
            $telefono = trim($_POST["telefono"]);

            // Validaciones
            if (empty($nombre) || empty($apellido) || empty($email) || empty($contrasenia) || empty($telefono)) {
                $mensaje_error = "Por favor, complete todos los campos.";
            } elseif (!preg_match("/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/u", $nombre)) {
                $mensaje_error = "El nombre solo puede contener letras.";
            } elseif (!preg_match("/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/u", $apellido)) {
                $mensaje_error = "El apellido solo puede contener letras.";
            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $mensaje_error = "Ingrese un email válido.";
            } elseif (strlen($contrasenia) < 4) {
                $mensaje_error = "La contraseña debe tener al menos 4 caracteres.";
            } elseif (!preg_match('/^[0-9]{10}$/', $telefono)) {
                $mensaje_error = "El teléfono debe tener exactamente 10 dígitos numéricos.";
            } else {
                $modelo = new AuthModel();
                $resultado = $modelo->registrarUsuario($nombre, $apellido, $email, $contrasenia, $telefono);

                if ($resultado === true) {
                    header("Location: login.php");
                    exit();
                } else {
                    $mensaje_error = $resultado;
                }
            }
        }

        require 'views/signup_view.php';
    }
}
