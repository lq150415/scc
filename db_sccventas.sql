-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-05-2016 a las 02:29:42
-- Versión del servidor: 5.6.14
-- Versión de PHP: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `db_sccventas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulos`
--

CREATE TABLE IF NOT EXISTS `articulos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `TIT_ART` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `PRE_ART` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `ID_CAT` int(10) unsigned NOT NULL,
  `ID_USU` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `articulos_id_cat_foreign` (`ID_CAT`),
  KEY `articulos_id_usu_foreign` (`ID_USU`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE IF NOT EXISTS `categorias` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `NOM_CAT` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `DES_CAT` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `ID_USU` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `categorias_id_usu_foreign` (`ID_USU`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=22 ;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `NOM_CAT`, `DES_CAT`, `ID_USU`, `created_at`, `updated_at`) VALUES
(15, 'Predicas', 'Predicas', 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(16, 'Desde lo alto', 'Desde lo alto', 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(17, 'Mujer Unica', 'Mujer Unica', 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(18, 'Hombria al maximo', 'Hombria al maximo', 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(19, 'Generacion de fuego', 'Generacion de fuego', 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(20, 'Haciendo Discipulos', 'Haciendo Discipulos', 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(21, 'Conciertos', 'Conciertos', 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE IF NOT EXISTS `clientes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `NOM_CLI` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `APA_CLI` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `AMA_CLI` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `TEL_CLI` int(11) NOT NULL,
  `DIR_CLI` text COLLATE utf8_unicode_ci NOT NULL,
  `EMA_CLI` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=18 ;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `NOM_CLI`, `APA_CLI`, `AMA_CLI`, `TEL_CLI`, `DIR_CLI`, `EMA_CLI`, `created_at`, `updated_at`) VALUES
(1, 'Erick', 'Moscoso', 'Zamora', 76207622, 'LA PAZ', 'erick.moscoso.zamora@hotmail.com', '2016-04-11 10:38:48', '2016-04-11 10:38:48'),
(2, 'Libreria', 'Zamar', ' ', 2317178, 'LA PAZ', ' ', '2016-04-11 10:38:48', '2016-04-11 10:38:48'),
(3, 'Flora', 'Llimona', ' ', 2203760, 'LA PAZ', ' ', '2016-04-11 10:38:48', '2016-04-11 10:38:48'),
(4, 'Marcelo', 'Mamani', 'Diaz', 71933510, 'LA PAZ', 'marce.mamani365@gmail.com', '2016-04-11 10:38:48', '2016-04-11 10:38:48'),
(10, 'Luis', 'Quisbert', 'Quispe', 60522919, 'Z/ Los Andes C/ Balboa #2665', 'lq150415@gmail.com', '2016-04-21 00:28:01', '2016-04-21 00:28:01'),
(11, 'Juan', 'Perez', 'Ferreira', 71243324, 'Z 16 de Julio ', 'juan@gmail.com', '2016-04-21 00:30:47', '2016-04-21 00:30:47'),
(12, 'Pedro', 'Paredes', 'Cruz', 71234545, 'Z/ Rio Seco C/12', 'pedro@gmail.com', '2016-04-21 00:32:13', '2016-04-21 00:32:13'),
(13, 'Pablo', 'Aramayo ', 'Castillo', 68429102, 'Z/Los Pinos C/ 45', 'pablo@gmail.com', '2016-04-21 00:46:30', '2016-04-21 00:46:30'),
(14, 'Pablo', 'Aramayo ', 'Castillo', 68429102, 'Z/Los Pinos C/ 45', 'pablo@gmail.com', '2016-04-21 00:47:01', '2016-04-21 00:47:01'),
(15, 'Juan', 'Perez', 'Velasco', 7725981, 'Z/ jp C/pepe #500', 'jp@gmail.com', '2016-04-26 21:22:41', '2016-04-26 21:22:41'),
(16, 'tdhgfhfd', 'gdgfdsg', 'gfdgfds', 35426, 'igjrwhtrsobjlrsjoif', 'luis@gmail.com', '2016-05-05 00:38:15', '2016-05-05 00:38:15'),
(17, 'Faustino', 'Mayta', 'Mamani', 66587987, 'c/ gumercindo AV. estrecha nro quien sabe', 'famama@gmail', '2016-05-05 22:41:27', '2016-05-05 22:41:27');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empaquetados`
--

CREATE TABLE IF NOT EXISTS `empaquetados` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ID_PAQ` int(10) unsigned NOT NULL,
  `ID_ART` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `empaquetados_id_paq_foreign` (`ID_PAQ`),
  KEY `empaquetados_id_art_foreign` (`ID_ART`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2016_04_11_062046_algunas_tablas', 2),
('2016_04_11_090320_mas_tablas', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paquetes`
--

CREATE TABLE IF NOT EXISTS `paquetes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `NOM_PAQ` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `DES_PAQ` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `ID_USU` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `paquetes_id_usu_foreign` (`ID_USU`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `NOM_USU` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `APA_USU` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `AMA_USU` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `NIC_USU` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `NIV_USU` int(11) NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_nic_usu_unique` (`NIC_USU`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `NOM_USU`, `APA_USU`, `AMA_USU`, `NIC_USU`, `NIV_USU`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(3, 'Luis Felipe', 'Quisbert', 'Quispe', '7074342', 0, '$2y$10$.fCLTZnDbzAvspFj8xB0Teamumg8hpezwXqxLHB93cdu7CzjmnXtS', 'AImgWuOGG0Df5455L6wVHvik87VxpeXh3bzxiJwTyZfVS5z81OHSZ35tAS0s', '2016-04-01 23:51:23', '2016-04-20 23:35:25'),
(4, 'Wilson', 'Yujra', 'G', '9959333', 0, '$2y$10$cdQZEoW0CV3yQ1bziC4/1OJxRATcd2tK0w3NPEkiK1qxdv.QQAAZW', 'omrdOz4H5ztbLEh4RZQsI42sj3wzn7fyXWmfrlf5EH9XG6mBaQMsfXaLmPZg', '2016-04-01 23:51:23', '2016-04-05 23:51:44');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `articulos`
--
ALTER TABLE `articulos`
  ADD CONSTRAINT `articulos_id_cat_foreign` FOREIGN KEY (`ID_CAT`) REFERENCES `categorias` (`id`),
  ADD CONSTRAINT `articulos_id_usu_foreign` FOREIGN KEY (`ID_USU`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD CONSTRAINT `categorias_id_usu_foreign` FOREIGN KEY (`ID_USU`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `empaquetados`
--
ALTER TABLE `empaquetados`
  ADD CONSTRAINT `empaquetados_id_art_foreign` FOREIGN KEY (`ID_ART`) REFERENCES `articulos` (`id`),
  ADD CONSTRAINT `empaquetados_id_paq_foreign` FOREIGN KEY (`ID_PAQ`) REFERENCES `paquetes` (`id`);

--
-- Filtros para la tabla `paquetes`
--
ALTER TABLE `paquetes`
  ADD CONSTRAINT `paquetes_id_usu_foreign` FOREIGN KEY (`ID_USU`) REFERENCES `users` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
