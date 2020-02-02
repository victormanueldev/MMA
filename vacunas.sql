-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 31-01-2018 a las 04:27:19
-- Versión del servidor: 5.7.18-log
-- Versión de PHP: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mundomascotasapp_bd`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vacunas`
--
--
-- Volcado de datos para la tabla `vacunas`
--

INSERT INTO `vacunas` (`nombre_vacuna`, `frecuencia_aplicacion`, `etiqueta`) VALUES
('Puppy', 'quincenal', 'puppy.jpg'),
('Quintuple', 'quincenal', 'quintuple.jpg'),
('Séxtuple', 'quincenal', 'sextuple.jpg'),
('KC', 'quincenal', 'kc.jpg'),
('Triple Viral', 'quincenal', 'tvf.jpg'),
('Leucemia', 'quincenal', 'leucogen.jpg'),
('Vacuna Anual', 'anual', 'anualP.jpg'),
('Vacuna Anual', 'anual', 'anualF.jpg');

--


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
