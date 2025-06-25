-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-06-2025 a las 23:24:16
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sistema_hoteles`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id_cliente` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `descuento` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `id_usuario`, `descuento`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 3),
(4, 4, 1),
(5, 5, 5),
(6, 6, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `descuento`
--

CREATE TABLE `descuento` (
  `id_descuento` int(11) NOT NULL,
  `codigo_descuento` varchar(20) DEFAULT NULL,
  `porcentaje` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `descuento`
--

INSERT INTO `descuento` (`id_descuento`, `codigo_descuento`, `porcentaje`) VALUES
(1, 'BIENVENIDO10', 0.1),
(2, 'VERANO15', 0.15),
(3, 'FIESTAS20', 0.2),
(4, 'VIP25', 0.25),
(5, 'ULTIMO30', 0.3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE `empleado` (
  `id_empleado` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`id_empleado`, `id_usuario`) VALUES
(1, 7),
(2, 8),
(3, 9),
(4, 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facilidades`
--

CREATE TABLE `facilidades` (
  `id_facilidad` int(11) NOT NULL,
  `id_hotel` int(11) NOT NULL,
  `pileta` varchar(50) NOT NULL,
  `restaurante` varchar(50) NOT NULL,
  `spa` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `facilidades`
--

INSERT INTO `facilidades` (`id_facilidad`, `id_hotel`, `pileta`, `restaurante`, `spa`) VALUES
(1, 1, 'si', 'si', 'si'),
(2, 2, 'si', 'si', 'no'),
(3, 3, 'si', 'no', 'no'),
(4, 4, 'si', 'si', 'si'),
(5, 5, 'no', 'si', 'si'),
(6, 6, 'si', 'si', 'no'),
(7, 7, 'si', 'si', 'si'),
(8, 8, 'si', 'si', 'si'),
(9, 9, 'no', 'no', 'no');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `habitacion`
--

CREATE TABLE `habitacion` (
  `id_habitacion` int(11) NOT NULL,
  `id_hotel` int(11) NOT NULL,
  `id_tipo` int(11) NOT NULL,
  `numero` int(11) NOT NULL,
  `piso` int(11) NOT NULL,
  `capacidad` int(11) NOT NULL,
  `estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `habitacion`
--

INSERT INTO `habitacion` (`id_habitacion`, `id_hotel`, `id_tipo`, `numero`, `piso`, `capacidad`, `estado`) VALUES
(1, 1, 1, 101, 1, 2, 1),
(2, 1, 2, 402, 4, 3, 0),
(3, 1, 4, 201, 8, 4, 1),
(4, 2, 1, 301, 3, 2, 1),
(5, 2, 3, 602, 6, 4, 1),
(6, 2, 4, 201, 2, 2, 0),
(7, 3, 2, 501, 5, 3, 0),
(8, 3, 3, 702, 7, 4, 0),
(9, 3, 1, 201, 2, 2, 1),
(10, 4, 4, 901, 9, 2, 0),
(11, 4, 3, 602, 6, 4, 1),
(12, 4, 2, 401, 4, 3, 0),
(13, 5, 1, 101, 1, 2, 1),
(14, 5, 2, 602, 6, 3, 1),
(15, 5, 4, 901, 9, 2, 1),
(16, 6, 3, 701, 7, 4, 0),
(17, 6, 1, 202, 2, 2, 0),
(18, 6, 2, 501, 5, 3, 1),
(19, 7, 1, 301, 3, 2, 1),
(20, 7, 4, 802, 8, 2, 0),
(21, 7, 3, 601, 6, 4, 1),
(22, 8, 2, 201, 2, 3, 1),
(23, 8, 1, 302, 3, 2, 1),
(24, 8, 4, 901, 9, 2, 0),
(25, 9, 1, 101, 1, 2, 1),
(26, 9, 2, 102, 1, 3, 0),
(27, 9, 1, 201, 2, 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hotel`
--

CREATE TABLE `hotel` (
  `id_hotel` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `categoria` varchar(30) NOT NULL,
  `ubicacion` varchar(50) NOT NULL,
  `estrellas` int(11) NOT NULL,
  `imagen` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `hotel`
--

INSERT INTO `hotel` (`id_hotel`, `nombre`, `categoria`, `ubicacion`, `estrellas`, `imagen`) VALUES
(1, 'Hotel Imperial', 'Lujo', 'Nueva York', 5, 'imperial.png'),
(2, 'Hotel Metropolitano', 'Gama media', 'Nueva York', 4, 'metropolitano.jpg'),
(3, 'Hotel Alquimia', 'Económico', 'Nueva York', 2, 'alquimia.jpg'),
(4, 'Hotel Bahía Dorada', 'Lujo', 'Miami', 5, 'bahiadorada.jpg'),
(5, 'Hotel Sereno', 'Gama media', 'Miami', 3, 'sereno.png'),
(6, 'Hotel La Playa', 'Económico', 'Miami', 2, 'laplaya.jpg'),
(7, 'Hotel Golden Valley', 'Lujo', 'Los Ángeles', 5, 'golden.jpg'),
(8, 'Hotel Pacífico', 'Gama media', 'Los Ángeles', 4, 'pacifico.jpg'),
(9, 'Hotel Minimal', 'Económico', 'Los Ángeles', 1, 'minimal.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pago`
--

CREATE TABLE `pago` (
  `id_pago` int(11) NOT NULL,
  `monto` double NOT NULL,
  `fecha_pago` date NOT NULL,
  `tarjeta` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reserva`
--

CREATE TABLE `reserva` (
  `id_reserva` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_habitacion` int(11) NOT NULL,
  `id_descuento` int(11) NOT NULL,
  `fecha_reserva` date NOT NULL,
  `fecha_llegada` date NOT NULL,
  `fecha_partida` date NOT NULL,
  `precio_total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_habitacion`
--

CREATE TABLE `tipo_habitacion` (
  `id_tipo` int(11) NOT NULL,
  `tipo` varchar(50) NOT NULL,
  `descripcion` varchar(200) DEFAULT NULL,
  `precio` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipo_habitacion`
--

INSERT INTO `tipo_habitacion` (`id_tipo`, `tipo`, `descripcion`, `precio`) VALUES
(1, 'Normal', 'Habitación estándar con comodidades básicas', 5000),
(2, 'Suite', 'Habitación con sala de estar y comodidades mejoradas', 9000),
(3, 'Grand Suite', 'Suite amplia con áreas adicionales y lujo superior', 14000),
(4, 'Suite Ejecutiva', 'Suite de lujo pensada para ejecutivos, con espacios de trabajo', 18000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `apellido` varchar(20) NOT NULL,
  `email` varchar(40) NOT NULL,
  `contrasenia` varchar(40) NOT NULL,
  `telefono` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nombre`, `apellido`, `email`, `contrasenia`, `telefono`) VALUES
(1, 'Ana', 'Gómez', 'ana.gomez@example.com', 'ana123', '1150000001'),
(2, 'Juan', 'Pérez', 'juan.perez@example.com', 'juan123', '1150000002'),
(3, 'Lucía', 'Martínez', 'lucia.martinez@example.com', 'lucia123', '1150000003'),
(4, 'Carlos', 'Fernández', 'carlos.fernandez@example.com', 'carlos123', '1150000004'),
(5, 'María', 'López', 'maria.lopez@example.com', 'maria123', '1150000005'),
(6, 'Diego', 'Rodríguez', 'diego.rodriguez@example.com', 'diego123', '1150000006'),
(7, 'Sofía', 'Ramírez', 'sofia.ramirez@example.com', 'sofia123', '1150000007'),
(8, 'Lucas', 'Sánchez', 'lucas.sanchez@example.com', 'lucas123', '1150000008'),
(9, 'Valentina', 'Torres', 'valentina.torres@example.com', 'valen123', '1150000009'),
(10, 'Matías', 'Gutiérrez', 'matias.gutierrez@example.com', 'matias123', '1150000010'),
(19, 'Franco', 'Paz', 'franco.paz@example.com', '1234', '1234567891');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_cliente`),
  ADD KEY `test` (`id_usuario`);

--
-- Indices de la tabla `descuento`
--
ALTER TABLE `descuento`
  ADD PRIMARY KEY (`id_descuento`);

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`id_empleado`),
  ADD KEY `test1` (`id_usuario`);

--
-- Indices de la tabla `facilidades`
--
ALTER TABLE `facilidades`
  ADD PRIMARY KEY (`id_facilidad`),
  ADD KEY `id_hotel` (`id_hotel`);

--
-- Indices de la tabla `habitacion`
--
ALTER TABLE `habitacion`
  ADD PRIMARY KEY (`id_habitacion`),
  ADD KEY `id_hotel` (`id_hotel`),
  ADD KEY `fk_habitacion_tipo` (`id_tipo`);

--
-- Indices de la tabla `hotel`
--
ALTER TABLE `hotel`
  ADD PRIMARY KEY (`id_hotel`);

--
-- Indices de la tabla `pago`
--
ALTER TABLE `pago`
  ADD PRIMARY KEY (`id_pago`);

--
-- Indices de la tabla `reserva`
--
ALTER TABLE `reserva`
  ADD PRIMARY KEY (`id_reserva`),
  ADD KEY `id_cliente` (`id_cliente`),
  ADD KEY `id_habitacion` (`id_habitacion`),
  ADD KEY `id_descuento` (`id_descuento`);

--
-- Indices de la tabla `tipo_habitacion`
--
ALTER TABLE `tipo_habitacion`
  ADD PRIMARY KEY (`id_tipo`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `descuento`
--
ALTER TABLE `descuento`
  MODIFY `id_descuento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `empleado`
--
ALTER TABLE `empleado`
  MODIFY `id_empleado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `facilidades`
--
ALTER TABLE `facilidades`
  MODIFY `id_facilidad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `habitacion`
--
ALTER TABLE `habitacion`
  MODIFY `id_habitacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de la tabla `hotel`
--
ALTER TABLE `hotel`
  MODIFY `id_hotel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `pago`
--
ALTER TABLE `pago`
  MODIFY `id_pago` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `reserva`
--
ALTER TABLE `reserva`
  MODIFY `id_reserva` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `tipo_habitacion`
--
ALTER TABLE `tipo_habitacion`
  MODIFY `id_tipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `test` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);

--
-- Filtros para la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD CONSTRAINT `test1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);

--
-- Filtros para la tabla `facilidades`
--
ALTER TABLE `facilidades`
  ADD CONSTRAINT `facilidades_ibfk_1` FOREIGN KEY (`id_hotel`) REFERENCES `hotel` (`id_hotel`);

--
-- Filtros para la tabla `habitacion`
--
ALTER TABLE `habitacion`
  ADD CONSTRAINT `fk_habitacion_tipo` FOREIGN KEY (`id_tipo`) REFERENCES `tipo_habitacion` (`id_tipo`),
  ADD CONSTRAINT `habitacion_ibfk_1` FOREIGN KEY (`id_hotel`) REFERENCES `hotel` (`id_hotel`),
  ADD CONSTRAINT `habitacion_ibfk_2` FOREIGN KEY (`id_tipo`) REFERENCES `tipo_habitacion` (`id_tipo`);

--
-- Filtros para la tabla `reserva`
--
ALTER TABLE `reserva`
  ADD CONSTRAINT `reserva_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`) ON UPDATE CASCADE,
  ADD CONSTRAINT `reserva_ibfk_2` FOREIGN KEY (`id_habitacion`) REFERENCES `habitacion` (`id_habitacion`) ON UPDATE CASCADE,
  ADD CONSTRAINT `reserva_ibfk_3` FOREIGN KEY (`id_descuento`) REFERENCES `descuento` (`id_descuento`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
