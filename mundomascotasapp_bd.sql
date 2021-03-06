-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-02-2018 a las 01:15:01
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
-- Estructura de tabla para la tabla `administradores`
--

CREATE TABLE `administradores` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombres` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `administradores`
--

INSERT INTO `administradores` (`id`, `nombres`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Angelica Cardona', 'angelica@admin.com', '$2y$10$oI8oOpnyZnQxYMsvKAE8IO885idSJ0sJDHxCgSa8EcmLeDzj7P472', '2018-01-31 03:01:18', '2018-01-31 03:01:18');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alimentacion`
--

CREATE TABLE `alimentacion` (
  `id` int(10) UNSIGNED NOT NULL,
  `tipo_alimento` varchar(13) COLLATE utf8_unicode_ci NOT NULL,
  `marca` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `ultima_compra` date NOT NULL,
  `frecuencia_compra` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `fecha_notificacion` date NOT NULL,
  `cantidad_compra` varchar(13) COLLATE utf8_unicode_ci NOT NULL,
  `id_user` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `citas`
--

CREATE TABLE `citas` (
  `id` int(10) UNSIGNED NOT NULL,
  `motivo` varchar(62) COLLATE utf8_unicode_ci NOT NULL,
  `fecha_sintomas` date NOT NULL,
  `fecha_cita` date NOT NULL,
  `hora_cita` time NOT NULL,
  `estado` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `id_mascota` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mascotas`
--

CREATE TABLE `mascotas` (
  `id` int(10) UNSIGNED NOT NULL,
  `tipo_mascota` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `nombre_mascota` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `sexo_mascota` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `foto_mascota` varchar(99) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'default-pet.jpg',
  `fecha_nacimiento_mascota` date NOT NULL,
  `raza` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `color` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `peso` varchar(17) COLLATE utf8_unicode_ci NOT NULL,
  `tamano` varchar(7) COLLATE utf8_unicode_ci NOT NULL,
  `esterilizado` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `id_usuario` int(10) UNSIGNED NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `peluqueria`
--

CREATE TABLE `peluqueria` (
  `id` int(10) UNSIGNED NOT NULL,
  `servicio` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `especificacion_corte` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `fecha_peluqueria` date NOT NULL,
  `hora_peluqueria` time NOT NULL,
  `precio` int(5) UNSIGNED DEFAULT NULL,
  `estado` varchar(8) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Nuevo',
  `id_mascota` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfilvacunacion`
--

CREATE TABLE `perfilvacunacion` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_mascota` int(10) UNSIGNED NOT NULL,
  `id_vacuna` int(10) UNSIGNED NOT NULL,
  `fecha_aplicacion` date NOT NULL,
  `fecha_notificacion_vacuna` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
  `created_at` date DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
(8, 'Vacuna Anual', 'anual', 'anualF.jpg'),
(9, 'Rabia', 'quince', 'rabia.jpg');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administradores`
--
ALTER TABLE `administradores`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `administradores_email_unique` (`email`);

--
-- Indices de la tabla `alimentacion`
--
ALTER TABLE `alimentacion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `alimentacion_id_user_foreign` (`id_user`);

--
-- Indices de la tabla `citas`
--
ALTER TABLE `citas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `citas_id_mascota_foreign` (`id_mascota`);

--
-- Indices de la tabla `mascotas`
--
ALTER TABLE `mascotas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mascotas_id_usuario_foreign` (`id_usuario`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `peluqueria`
--
ALTER TABLE `peluqueria`
  ADD PRIMARY KEY (`id`),
  ADD KEY `peluqueria_id_mascota_foreign` (`id_mascota`);

--
-- Indices de la tabla `perfilvacunacion`
--
ALTER TABLE `perfilvacunacion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `perfilvacunacion_id_mascota_foreign` (`id_mascota`),
  ADD KEY `perfilvacunacion_id_vacuna_foreign` (`id_vacuna`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_numero_documento_unique` (`numero_documento`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indices de la tabla `vacunas`
--
ALTER TABLE `vacunas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administradores`
--
ALTER TABLE `administradores`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `alimentacion`
--
ALTER TABLE `alimentacion`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `citas`
--
ALTER TABLE `citas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `mascotas`
--
ALTER TABLE `mascotas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `peluqueria`
--
ALTER TABLE `peluqueria`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `perfilvacunacion`
--
ALTER TABLE `perfilvacunacion`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `vacunas`
--
ALTER TABLE `vacunas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alimentacion`
--
ALTER TABLE `alimentacion`
  ADD CONSTRAINT `alimentacion_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `citas`
--
ALTER TABLE `citas`
  ADD CONSTRAINT `citas_id_mascota_foreign` FOREIGN KEY (`id_mascota`) REFERENCES `mascotas` (`id`);

--
-- Filtros para la tabla `mascotas`
--
ALTER TABLE `mascotas`
  ADD CONSTRAINT `mascotas_id_usuario_foreign` FOREIGN KEY (`id_usuario`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `peluqueria`
--
ALTER TABLE `peluqueria`
  ADD CONSTRAINT `peluqueria_id_mascota_foreign` FOREIGN KEY (`id_mascota`) REFERENCES `mascotas` (`id`);

--
-- Filtros para la tabla `perfilvacunacion`
--
ALTER TABLE `perfilvacunacion`
  ADD CONSTRAINT `perfilvacunacion_id_mascota_foreign` FOREIGN KEY (`id_mascota`) REFERENCES `mascotas` (`id`),
  ADD CONSTRAINT `perfilvacunacion_id_vacuna_foreign` FOREIGN KEY (`id_vacuna`) REFERENCES `vacunas` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
