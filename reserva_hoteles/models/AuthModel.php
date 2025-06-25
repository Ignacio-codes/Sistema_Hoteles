<?php
require_once 'config/conexion_bd.php';

class AuthModel
{
    public function verificarCredenciales($email, $contrasenia)
    {
        $con = ConexionBD::obtenerInstancia()->obtenerConexion();

        if ($con !== NULL) {
            $email = mysqli_real_escape_string($con, $email);
            $contrasenia = mysqli_real_escape_string($con, $contrasenia);
            $query = "SELECT id_usuario, nombre FROM usuario WHERE email = '$email' AND contrasenia = '$contrasenia'";
            $resultado = mysqli_query($con, $query);

            if (mysqli_num_rows($resultado) === 1) {
                return mysqli_fetch_assoc($resultado);
            }
        }

        return false;
    }

    public function registrarUsuario($nombre, $apellido, $email, $contrasenia, $telefono)
    {
        $con = ConexionBD::obtenerInstancia()->obtenerConexion();
        if (!$con) return "Error al conectar con la base de datos.";

        $verificar = "SELECT * FROM usuario WHERE email = '$email'";
        $resultado = mysqli_query($con, $verificar);

        if (mysqli_num_rows($resultado) > 0) {
            return "El email ya está registrado.";
        }

        $query = "INSERT INTO usuario (nombre, apellido, email, contrasenia, telefono)
                VALUES ('$nombre', '$apellido', '$email', '$contrasenia', '$telefono')";

        if (mysqli_query($con, $query)) {
            return true;
        } else {
            return "Error al registrar. Intente nuevamente.";
        }
    }
}
