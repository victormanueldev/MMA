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

CREATE TABLE `vacunas` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre_vacuna` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `frecuencia_aplicacion` varchar(9) COLLATE utf8_unicode_ci DEFAULT NULL,
  `etiqueta` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `vacunas`
--

INSERT INTO `vacunas` (`id`, `nombre_vacuna`, `frecuencia_aplicacion`, `etiqueta`) VALUES
(1, 'Puppy', 'quincenal', 'puppy.jpg'),
(2, 'Quintuple', 'quincenal', 'quintuple.jpg'),
(3, 'Séxtuple', 'quincenal', 'sextuple.jpg'),
(4, 'KC', 'quincenal', 'kc.jpg'),
(5, 'Triple Viral', 'quincenal', 'tvf.jpg'),
(6, 'Leucemia', 'quincenal', 'leucogen.jpg'),
(7, 'Vacuna Anual', 'anual', 'anualP.jpg'),
(8, 'Vacuna Anual', 'anual', 'anualF.jpg');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `vacunas`
--
ALTER TABLE `vacunas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `vacunas`
--
ALTER TABLE `vacunas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
