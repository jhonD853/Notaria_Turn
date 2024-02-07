-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 07-02-2024 a las 18:13:49
-- Versión del servidor: 8.2.0
-- Versión de PHP: 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `turn`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horas_disponibles`
--

DROP TABLE IF EXISTS `horas_disponibles`;
CREATE TABLE IF NOT EXISTS `horas_disponibles` (
  `id` int NOT NULL AUTO_INCREMENT,
  `hora` time NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `hora` (`hora`)
) ENGINE=MyISAM AUTO_INCREMENT=54 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `horas_disponibles`
--

INSERT INTO `horas_disponibles` (`id`, `hora`) VALUES
(1, '08:00:00'),
(2, '08:10:00'),
(3, '08:20:00'),
(4, '08:30:00'),
(5, '08:40:00'),
(6, '08:50:00'),
(7, '09:00:00'),
(8, '09:10:00'),
(9, '09:20:00'),
(10, '09:30:00'),
(11, '09:40:00'),
(12, '09:50:00'),
(13, '10:00:00'),
(14, '10:10:00'),
(15, '10:20:00'),
(16, '10:30:00'),
(17, '10:40:00'),
(18, '10:50:00'),
(19, '11:00:00'),
(20, '11:10:00'),
(21, '11:20:00'),
(22, '11:30:00'),
(23, '11:40:00'),
(24, '11:50:00'),
(25, '12:00:00'),
(26, '12:10:00'),
(27, '12:20:00'),
(28, '12:30:00'),
(29, '12:40:00'),
(30, '12:50:00'),
(31, '13:00:00'),
(32, '13:10:00'),
(33, '13:20:00'),
(34, '13:30:00'),
(35, '13:40:00'),
(36, '13:50:00'),
(37, '14:00:00'),
(38, '14:10:00'),
(39, '14:20:00'),
(40, '14:30:00'),
(41, '14:40:00'),
(42, '14:50:00'),
(43, '15:00:00'),
(44, '15:10:00'),
(45, '15:20:00'),
(46, '15:30:00'),
(47, '15:40:00'),
(48, '15:50:00'),
(49, '16:00:00'),
(50, '16:10:00'),
(51, '16:20:00'),
(52, '16:30:00'),
(53, '16:40:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `turnos`
--

DROP TABLE IF EXISTS `turnos`;
CREATE TABLE IF NOT EXISTS `turnos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre_cliente` varchar(100) NOT NULL,
  `fecha_turno` date NOT NULL,
  `orden` int NOT NULL,
  `turno` varchar(10) DEFAULT NULL,
  `id_hora_disponible` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_turnos_hora_disponible` (`id_hora_disponible`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
