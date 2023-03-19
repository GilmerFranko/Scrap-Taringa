-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-08-2021 a las 19:29:19
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `scraptaringa`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `content_scrapped`
--

CREATE TABLE `content_scrapped` (
  `id` int(11) NOT NULL,
  `title` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Titulo del Post',
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Contenido',
  `link` varchar(512) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Link del Post',
  `added` tinyint(1) DEFAULT '0' COMMENT 'Determina si ya se añadio el Post 0. No 1. Si',
  `date` int(11) DEFAULT NULL COMMENT 'Fecha de creacion'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `members_posts`
--

CREATE TABLE `members_posts` (
  `id` int(11) NOT NULL,
  `member` int(11) NOT NULL,
  `title` varchar(512) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Titulo del Post',
  `content` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Contenido Del Post',
  `type` tinyint(2) NOT NULL DEFAULT '1' COMMENT 'Tipo de Post 1. Original 2.S',
  `tags` varchar(254) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `private` tinyint(2) NOT NULL DEFAULT '1' COMMENT 'Privacidad del post 1. Publico 2. Privado',
  `time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Publicaciones de Usuarios';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `robots_ta`
--

CREATE TABLE `robots_ta` (
  `id` int(11) NOT NULL,
  `index_id` tinyint(1) NOT NULL COMMENT '# de story',
  `status` tinyint(4) NOT NULL COMMENT 'Cargado 1 / Sin Cargar 0',
  `last_load` int(11) NOT NULL COMMENT 'Fecha de la ultima vez que se cargo el archivo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `robots_ta`
--

INSERT INTO `robots_ta` (`id`, `index_id`, `status`, `last_load`) VALUES
(3, 1, 0, 0),
(4, 2, 0, 0),
(5, 3, 0, 0),
(6, 4, 0, 0),
(7, 5, 0, 0),
(8, 6, 0, 0),
(9, 7, 0, 0),
(10, 8, 0, 0),
(11, 9, 0, 0),
(12, 10, 0, 0),
(13, 11, 0, 0),
(14, 12, 0, 0),
(15, 13, 0, 0),
(16, 14, 0, 0),
(17, 15, 0, 0),
(18, 16, 0, 0),
(19, 17, 0, 0),
(20, 18, 0, 0),
(21, 19, 0, 0),
(22, 20, 0, 0),
(23, 21, 0, 0),
(24, 22, 0, 0),
(25, 23, 0, 0),
(26, 24, 0, 0),
(27, 25, 0, 0),
(28, 26, 0, 0),
(29, 27, 0, 0),
(30, 28, 0, 0),
(31, 29, 0, 0),
(32, 30, 0, 0),
(33, 31, 0, 0),
(34, 32, 0, 0),
(35, 33, 0, 0),
(36, 34, 0, 0),
(37, 35, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `site_configuration`
--

CREATE TABLE `site_configuration` (
  `id` int(11) NOT NULL,
  `script_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar_min_size` float UNSIGNED NOT NULL,
  `avatar_max_size` float UNSIGNED NOT NULL,
  `avatar_min_x` int(4) NOT NULL,
  `avatar_max_x` int(8) NOT NULL,
  `avatar_min_y` int(4) NOT NULL,
  `avatar_max_y` int(8) NOT NULL,
  `ad_300x250` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `shouts_video_max_size` tinyint(3) UNSIGNED NOT NULL COMMENT 'Tamaño máximo de vídeo',
  `shouts_max_char` mediumint(8) UNSIGNED NOT NULL COMMENT 'Caracteres máximos',
  `shouts_earnings_downloads` smallint(5) UNSIGNED NOT NULL DEFAULT '100' COMMENT 'Cantidad de pago por cada 100 fotos en centésimas',
  `shouts_price_photo` smallint(5) UNSIGNED NOT NULL COMMENT 'Precio de la descarga de imágenes en shouts',
  `shouts_percent_day` tinyint(3) UNSIGNED NOT NULL COMMENT 'Porcentaje de shouts diarios',
  `shouts_percent_night` smallint(5) UNSIGNED NOT NULL COMMENT 'Porcentaje de shouts durante la noche',
  `coins_per_click` tinyint(3) UNSIGNED NOT NULL COMMENT 'Créditos que se otorgan por cada clic',
  `verotel_signature` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Firma de Verotel',
  `verotel_shop_id` mediumint(8) UNSIGNED NOT NULL COMMENT 'ID de la tienda en Verotel',
  `cookie_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `cookie_time` smallint(5) NOT NULL,
  `reg_group` int(11) NOT NULL DEFAULT '3',
  `reg_validate` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `check_clon` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1' COMMENT 'Comprobar si es clon durante registro',
  `maintenance` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL,
  `debug_mode` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL,
  `save_user` mediumint(8) NOT NULL,
  `save_ip` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `save_date` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `site_configuration`
--

INSERT INTO `site_configuration` (`id`, `script_name`, `avatar_min_size`, `avatar_max_size`, `avatar_min_x`, `avatar_max_x`, `avatar_min_y`, `avatar_max_y`, `ad_300x250`, `shouts_video_max_size`, `shouts_max_char`, `shouts_earnings_downloads`, `shouts_price_photo`, `shouts_percent_day`, `shouts_percent_night`, `coins_per_click`, `verotel_signature`, `verotel_shop_id`, `cookie_name`, `cookie_time`, `reg_group`, `reg_validate`, `check_clon`, `maintenance`, `debug_mode`, `save_user`, `save_ip`, `save_date`) VALUES
(217, 'NaturalWorld', 0, 3, 200, 5000, 200, 5000, '', 15, 255, 100, 50, 75, 40, 5, 'b2z8eS6uAaB3y3a6FRhHKKB2wxdcgx', 114913, 'session', 360, 3, '0', '0', '0', '0', 2, '::1', 1626035609);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `content_scrapped`
--
ALTER TABLE `content_scrapped`
  ADD PRIMARY KEY (`id`),
  ADD KEY `link` (`link`(250)) USING BTREE;

--
-- Indices de la tabla `members_posts`
--
ALTER TABLE `members_posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tags` (`tags`(191)),
  ADD KEY `title` (`title`(191));

--
-- Indices de la tabla `robots_ta`
--
ALTER TABLE `robots_ta`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `site_configuration`
--
ALTER TABLE `site_configuration`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `content_scrapped`
--
ALTER TABLE `content_scrapped`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `members_posts`
--
ALTER TABLE `members_posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `robots_ta`
--
ALTER TABLE `robots_ta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT de la tabla `site_configuration`
--
ALTER TABLE `site_configuration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=218;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
