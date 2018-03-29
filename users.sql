-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-12-2017 a las 18:48:38
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
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `tipo_documento` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `numero_documento` double NOT NULL,
  `nombres` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `apellidos` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `barrio` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `direccion` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `telefono_fijo` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `telefono_movil` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `foto` varchar(99) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'default.jpg',
  `fecha_nacimiento` date NOT NULL,
  `genero` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `tipo_documento`, `numero_documento`, `nombres`, `apellidos`, `barrio`, `direccion`, `telefono_fijo`, `telefono_movil`, `foto`, `fecha_nacimiento`, `genero`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Cedula', 1061807769, 'Victor Manuel', 'Arenas', 'Chimi', 'Cra 2', '1123456', '3103195394', 'default.jpg', '2017-12-05', 'Masculino', 'victormalsx@gmail.com', '$2y$10$h4wxQ5LbmQdsyw6/lKa8H.VfMMgso01UoVAhr7fEDR1L0rz9rMeAS', 'eW8Qz2PfVqrX9s4doiulJ1Mmj47J1Xqg8kXj2zmNVlZwScf36IK6lAtf0H4n', '2017-12-14 09:46:39', '2017-12-14 09:46:39'),
(2, 'Cedula', 1144194315, 'Dayana', 'Murillo', 'A', 'Dras15', '1234', '3112546857', 'default.jpg', '2017-12-11', 'Femenino', 'cdm51@gmail.com', '$2y$10$UCBIBzcHFjgnNooirHnV5u8RU.gZo3md8kbvZ6rX6QEaFFsZm/cgm', 'bZqUKFL2Mmuy4r8cQxxMQRE5MJgyRlhuP49Mvm3AjVC1PWP3wkpk94nQVoRE', '2017-12-14 09:52:34', '2017-12-14 09:52:34');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_numero_documento_unique` (`numero_documento`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
