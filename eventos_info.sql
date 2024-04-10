-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-04-2024 a las 07:35:04
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
-- Base de datos: `ruquitos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventos_info`
--

CREATE TABLE `eventos_info` (
  `codigo_evento` int(50) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `descripcion` varchar(50) NOT NULL,
  `fecha` varchar(50) NOT NULL,
  `costo_foto` int(50) NOT NULL,
  `imagen` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `eventos_info`
--

INSERT INTO `eventos_info` (`codigo_evento`, `nombre`, `descripcion`, `fecha`, `costo_foto`, `imagen`) VALUES
(22, 'www', 'w', 'ww', 0, ''),
(23, 'www', 'w', 'ww', 0, ''),
(24, 'www', 'w', 'ww', 0, ''),
(25, 'www', 'w', 'ww', 0, ''),
(26, '3333', 'rrrrr', 'ewww', 322, 'dia_2.jpg'),
(27, 'Madness', 'Fiesta de Gran Magnitud', '04/02/2004', 150, 'dia_4.jpg'),
(29, 'fffff', 'eeeee', 'eee', 152, 'WhatsApp Image 2024-04-03 at 10.49.57 PM.jpeg');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `eventos_info`
--
ALTER TABLE `eventos_info`
  ADD PRIMARY KEY (`codigo_evento`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `eventos_info`
--
ALTER TABLE `eventos_info`
  MODIFY `codigo_evento` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
