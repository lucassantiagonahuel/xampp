-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-06-2020 a las 22:07:45
-- Versión del servidor: 8.0.19
-- Versión de PHP: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cadda`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auth_asign`
--

CREATE TABLE `auth_asign` (
  `id` int UNSIGNED NOT NULL,
  `rol_id` int NOT NULL,
  `user_id` int NOT NULL,
  `fecha` datetime NOT NULL,
  `active` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `auth_asign`
--

INSERT INTO `auth_asign` (`id`, `rol_id`, `user_id`, `fecha`, `active`) VALUES
(1, 1, 1, '2020-05-25 00:00:00', 1),
(2, 2, 1, '2020-05-25 00:00:00', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auth_paths`
--

CREATE TABLE `auth_paths` (
  `app` varchar(100) NOT NULL,
  `path` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `auth_paths`
--

INSERT INTO `auth_paths` (`app`, `path`) VALUES
('cadda', 'admin/rol'),
('cadda', 'admin/roles');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auth_roles`
--

CREATE TABLE `auth_roles` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `parent_id` int DEFAULT '0',
  `active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `auth_roles`
--

INSERT INTO `auth_roles` (`id`, `name`, `parent_id`, `active`) VALUES
(1, 'Rol 1', 0, 1),
(2, 'Rol 2', 0, 1),
(3, 'Sub rol de 1', 1, 1),
(4, 'Sub de sub1', 3, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cadda_equipos`
--

CREATE TABLE `cadda_equipos` (
  `id` int UNSIGNED NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `federacion_id` int UNSIGNED NOT NULL,
  `active` smallint NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cadda_equipos`
--

INSERT INTO `cadda_equipos` (`id`, `nombre`, `federacion_id`, `active`) VALUES
(1, 'Equipo 1 F 1', 1, 1),
(2, 'Equipo 1 F 2 editado', 1, 1),
(3, 'Prueba', 2, 0),
(4, 'Otro más con \'comillas\'', 2, 1),
(5, 'Los pumas gatos', 4, 1),
(6, 'kjkjkj', 2, 1),
(7, '', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cadda_federaciones`
--

CREATE TABLE `cadda_federaciones` (
  `id` int UNSIGNED NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `telefono` varchar(255) DEFAULT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `provincia_id` int DEFAULT NULL,
  `ciudad_id` int DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `web` varchar(255) DEFAULT NULL,
  `active` smallint NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cadda_federaciones`
--

INSERT INTO `cadda_federaciones` (`id`, `nombre`, `email`, `telefono`, `direccion`, `provincia_id`, `ciudad_id`, `logo`, `web`, `active`) VALUES
(1, 'Federación 1', 'launo@federaciones.com.ar', '541112348765', NULL, 1, 1, NULL, 'www.federacion1.com', 1),
(2, 'Federación 2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(3, 'Federación 3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(4, 'Federación de prueba', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `core_audith`
--

CREATE TABLE `core_audith` (
  `id` int UNSIGNED NOT NULL,
  `table` varchar(100) NOT NULL,
  `reg_id` int DEFAULT NULL,
  `old_value` varchar(255) DEFAULT NULL,
  `new_value` varchar(255) NOT NULL,
  `user_id` int DEFAULT NULL,
  `date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `core_audith`
--

INSERT INTO `core_audith` (`id`, `table`, `reg_id`, `old_value`, `new_value`, `user_id`, `date`) VALUES
(1, 'core_sessions', 7, '{\"5\":\"open\",\"status\":\"open\",\"6\":null,\"closed_at\":null}', '{\"5\":\"closed\",\"status\":\"closed\",\"6\":\"2020-05-29 14:45:08\",\"closed_at\":\"2020-05-29 14:45:08\"}', NULL, '2020-05-29 14:45:08'),
(2, 'core_sessions', 10, '{\"5\":\"open\",\"status\":\"open\",\"6\":null,\"closed_at\":null}', '{\"5\":\"closed\",\"status\":\"closed\",\"6\":\"2020-05-29 14:52:34\",\"closed_at\":\"2020-05-29 14:52:34\"}', NULL, '2020-05-29 14:52:34'),
(3, 'core_sessions', 15, '{\"5\":\"open\",\"status\":\"open\",\"6\":null,\"closed_at\":null}', '{\"5\":\"closed\",\"status\":\"closed\",\"6\":\"2020-06-08 22:02:48\",\"closed_at\":\"2020-06-08 22:02:48\"}', NULL, '2020-06-08 22:02:48'),
(4, 'cadda_equipos', 3, 'null', '{\"id\":\"3\",\"nombre\":\"Prueba\",\"federacion_id\":\"2\",\"active\":\"1\"}', NULL, '2020-06-13 17:17:28'),
(5, 'cadda_equipos', 4, 'null', '{\"id\":\"4\",\"nombre\":\"Otro m\\u00e1s con \'comillas\'\",\"federacion_id\":\"2\",\"active\":\"1\"}', NULL, '2020-06-13 17:39:36'),
(6, 'cadda_equipos', 3, '{\"active\":\"1\"}', '{\"active\":\"0\"}', NULL, '2020-06-13 17:40:48'),
(7, 'cadda_equipos', 5, 'null', '{\"id\":\"5\",\"nombre\":\"Los pumas\",\"federacion_id\":\"3\",\"active\":\"1\"}', NULL, '2020-06-13 17:41:04'),
(8, 'cadda_federaciones', 4, 'null', '{\"id\":\"4\",\"nombre\":\"Federaci\\u00f3n de prueba\",\"active\":\"1\"}', NULL, '2020-06-13 18:06:26'),
(9, 'cadda_federaciones', 3, '{\"active\":\"1\"}', '{\"active\":\"0\"}', NULL, '2020-06-13 18:06:31'),
(10, 'global_paises', 5, 'null', '{\"id\":\"5\",\"nombre\":\"Venezuela\",\"active\":\"1\"}', NULL, '2020-06-13 18:47:52'),
(11, 'global_paises', 5, '{\"active\":\"1\"}', '{\"active\":\"0\"}', NULL, '2020-06-13 18:48:01'),
(12, 'global_paises', 6, 'null', '{\"id\":\"6\",\"nombre\":\"Praga\",\"active\":\"1\"}', NULL, '2020-06-13 18:48:10'),
(13, 'global_paises', 6, '{\"active\":\"1\"}', '{\"active\":\"0\"}', NULL, '2020-06-13 18:48:15'),
(14, 'core_sessions', 18, '{\"status\":\"open\",\"closed_at\":null}', '{\"status\":\"closed\",\"closed_at\":\"2020-06-13 21:48:48\"}', NULL, '2020-06-13 21:48:48'),
(15, 'global_provincias', 3, 'null', '{\"id\":\"3\",\"pais_id\":\"1\",\"nombre\":\"Santa F\\u00e9\",\"active\":\"1\"}', NULL, '2020-06-13 22:20:23'),
(16, 'cadda_equipos', 6, 'null', '{\"id\":\"6\",\"nombre\":\"\",\"federacion_id\":\"1\",\"active\":\"1\"}', NULL, '2020-06-13 22:32:25'),
(17, 'cadda_equipos', 7, 'null', '{\"id\":\"7\",\"nombre\":\"\",\"federacion_id\":\"1\",\"active\":\"1\"}', NULL, '2020-06-13 22:32:32'),
(18, 'cadda_equipos', 2, '{\"nombre\":\"Equipo 1 F 2\",\"federacion_id\":\"2\"}', '{\"nombre\":\"Equipo 1 F 2 editado\",\"federacion_id\":\"1\"}', NULL, '2020-06-13 22:54:07'),
(19, 'cadda_equipos', 5, '{\"nombre\":\"Los pumas\",\"federacion_id\":\"3\"}', '{\"nombre\":\"Los pumas gatos\",\"federacion_id\":\"1\"}', NULL, '2020-06-13 22:54:18'),
(20, 'cadda_equipos', 5, '{\"federacion_id\":\"1\"}', '{\"federacion_id\":\"4\"}', NULL, '2020-06-13 22:54:26'),
(21, 'cadda_equipos', 6, '{\"nombre\":\"\",\"federacion_id\":\"1\"}', '{\"nombre\":\"kjkjkj\",\"federacion_id\":\"2\"}', NULL, '2020-06-14 21:40:47'),
(22, 'global_ciudades', 1, 'null', '{\"id\":\"1\",\"pais_id\":\"1\",\"provincia_id\":\"1\",\"nombre\":\"Gualeguaych\\u00fa\",\"codigo_postal\":\"2820\",\"active\":\"1\"}', NULL, '2020-06-18 13:09:22'),
(23, 'cadda_federaciones', 1, '{\"email\":null,\"telefono\":null,\"provincia_id\":null,\"ciudad_id\":null,\"web\":null}', '{\"email\":\"launo@federaciones.com.ar\",\"telefono\":\"541112348765\",\"provincia_id\":\"1\",\"ciudad_id\":\"1\",\"web\":\"www.federacion1.com\"}', NULL, '2020-06-18 13:14:59'),
(24, 'cadda_federaciones', 2, '{\"active\":\"1\"}', '{\"active\":\"0\"}', NULL, '2020-06-18 13:15:13'),
(25, 'cadda_federaciones', 4, '{\"active\":\"1\"}', '{\"active\":\"0\"}', NULL, '2020-06-18 13:15:15');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `core_sessions`
--

CREATE TABLE `core_sessions` (
  `id` int UNSIGNED NOT NULL,
  `user_id` int NOT NULL,
  `started_at` timestamp NOT NULL,
  `client_ip` varchar(100) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `status` enum('open','closed','expired','forced') NOT NULL DEFAULT 'open',
  `closed_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `core_sessions`
--

INSERT INTO `core_sessions` (`id`, `user_id`, `started_at`, `client_ip`, `user_agent`, `status`, `closed_at`) VALUES
(1, 1, '2020-05-25 18:43:08', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:76.0) Gecko/20100101 Firefox/76.0', 'open', NULL),
(4, 1, '2020-05-27 01:14:04', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:76.0) Gecko/20100101 Firefox/76.0', 'open', NULL),
(5, 1, '2020-05-29 17:34:46', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:76.0) Gecko/20100101 Firefox/76.0', 'closed', '2020-05-29 14:35:52'),
(6, 1, '2020-05-29 17:44:46', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:76.0) Gecko/20100101 Firefox/76.0', 'open', NULL),
(7, 1, '2020-05-29 17:44:52', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:76.0) Gecko/20100101 Firefox/76.0', 'closed', '2020-05-29 14:45:08'),
(8, 1, '2020-05-29 17:51:25', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:76.0) Gecko/20100101 Firefox/76.0', 'open', NULL),
(9, 1, '2020-05-29 17:52:02', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:76.0) Gecko/20100101 Firefox/76.0', 'open', NULL),
(10, 1, '2020-05-29 17:52:07', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:76.0) Gecko/20100101 Firefox/76.0', 'closed', '2020-05-29 14:52:34'),
(11, 1, '2020-05-29 18:15:15', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:76.0) Gecko/20100101 Firefox/76.0', 'open', NULL),
(12, 1, '2020-05-29 18:15:21', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:76.0) Gecko/20100101 Firefox/76.0', 'open', NULL),
(13, 1, '2020-06-04 23:59:56', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:76.0) Gecko/20100101 Firefox/76.0', 'open', NULL),
(14, 1, '2020-06-05 00:00:26', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:76.0) Gecko/20100101 Firefox/76.0', 'open', NULL),
(15, 1, '2020-06-09 00:31:18', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:76.0) Gecko/20100101 Firefox/76.0', 'closed', '2020-06-08 22:02:48'),
(16, 1, '2020-06-09 01:02:52', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:76.0) Gecko/20100101 Firefox/76.0', 'open', NULL),
(17, 1, '2020-06-11 19:27:35', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:77.0) Gecko/20100101 Firefox/77.0', 'open', NULL),
(18, 1, '2020-06-13 19:51:01', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:77.0) Gecko/20100101 Firefox/77.0', 'closed', '2020-06-13 21:48:48'),
(19, 1, '2020-06-14 00:48:51', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:77.0) Gecko/20100101 Firefox/77.0', 'open', NULL),
(20, 1, '2020-06-15 00:40:16', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:77.0) Gecko/20100101 Firefox/77.0', 'open', NULL),
(21, 1, '2020-06-18 00:21:44', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:77.0) Gecko/20100101 Firefox/77.0', 'open', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `core_users`
--

CREATE TABLE `core_users` (
  `id` int UNSIGNED NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(100) NOT NULL,
  `level` int DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `core_users`
--

INSERT INTO `core_users` (`id`, `username`, `email`, `password`, `level`, `created_at`, `active`) VALUES
(1, 'dario', 'dariomartinelli02@gmail.com', '4b6f72b7c413504add48c63817b5e808', 4, '2020-05-25 00:00:00', 1),
(2, 'admin', NULL, '21232f297a57a5a743894a0e4a801fc3', 4, '2020-06-18 10:38:55', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `global_ciudades`
--

CREATE TABLE `global_ciudades` (
  `id` int NOT NULL,
  `pais_id` int NOT NULL,
  `provincia_id` int NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `codigo_postal` int NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `global_ciudades`
--

INSERT INTO `global_ciudades` (`id`, `pais_id`, `provincia_id`, `nombre`, `codigo_postal`, `active`) VALUES
(1, 1, 1, 'Gualeguaychú', 2820, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `global_paises`
--

CREATE TABLE `global_paises` (
  `id` int UNSIGNED NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `active` smallint DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `global_paises`
--

INSERT INTO `global_paises` (`id`, `nombre`, `active`) VALUES
(1, 'Argentina', 1),
(2, 'Uruguay', 1),
(3, 'Chile', 1),
(4, 'Brazil', 1),
(5, 'Venezuela', 0),
(6, 'Praga', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `global_provincias`
--

CREATE TABLE `global_provincias` (
  `id` int UNSIGNED NOT NULL,
  `pais_id` varchar(100) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `active` smallint NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `global_provincias`
--

INSERT INTO `global_provincias` (`id`, `pais_id`, `nombre`, `active`) VALUES
(1, '1', 'Entre Ríos', 1),
(2, '1', 'Ciudad autónoma de Buenos Aires', 1),
(3, '1', 'Santa Fé', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `auth_asign`
--
ALTER TABLE `auth_asign`
  ADD PRIMARY KEY (`id`),
  ADD KEY `auth_asignacion_rol_id_IDX` (`rol_id`) USING BTREE,
  ADD KEY `auth_asignacion_user_id_IDX` (`user_id`) USING BTREE,
  ADD KEY `auth_asignacion_habilitado_IDX` (`active`) USING BTREE;

--
-- Indices de la tabla `auth_paths`
--
ALTER TABLE `auth_paths`
  ADD PRIMARY KEY (`app`,`path`),
  ADD KEY `auth_rutes_path_IDX` (`path`) USING BTREE;

--
-- Indices de la tabla `auth_roles`
--
ALTER TABLE `auth_roles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `auth_roles_nombre_IDX` (`name`) USING BTREE,
  ADD KEY `auth_roles_parent_id_IDX` (`parent_id`) USING BTREE,
  ADD KEY `auth_roles_habilitado_IDX` (`active`) USING BTREE;

--
-- Indices de la tabla `cadda_equipos`
--
ALTER TABLE `cadda_equipos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cadda_equipos_federacion_id_IDX` (`federacion_id`) USING BTREE,
  ADD KEY `cadda_equipos_active_IDX` (`active`) USING BTREE;

--
-- Indices de la tabla `cadda_federaciones`
--
ALTER TABLE `cadda_federaciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cadda_federaciones_active_IDX` (`active`) USING BTREE,
  ADD KEY `provincia_id` (`provincia_id`),
  ADD KEY `ciudad_id` (`ciudad_id`);

--
-- Indices de la tabla `core_audith`
--
ALTER TABLE `core_audith`
  ADD PRIMARY KEY (`id`),
  ADD KEY `audith_table_IDX` (`table`) USING BTREE,
  ADD KEY `audith_user_id_IDX` (`user_id`) USING BTREE,
  ADD KEY `audith_reg_id_IDX` (`reg_id`) USING BTREE;

--
-- Indices de la tabla `core_sessions`
--
ALTER TABLE `core_sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `core_sessions_user_id_IDX` (`user_id`) USING BTREE,
  ADD KEY `core_sessions_status_IDX` (`status`) USING BTREE;

--
-- Indices de la tabla `core_users`
--
ALTER TABLE `core_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `core_users_username_IDX` (`username`,`email`,`password`) USING BTREE,
  ADD KEY `core_users_active_IDX` (`active`) USING BTREE;

--
-- Indices de la tabla `global_ciudades`
--
ALTER TABLE `global_ciudades`
  ADD PRIMARY KEY (`id`),
  ADD KEY `active` (`active`),
  ADD KEY `pais_id` (`pais_id`),
  ADD KEY `provincia_id` (`provincia_id`);

--
-- Indices de la tabla `global_paises`
--
ALTER TABLE `global_paises`
  ADD PRIMARY KEY (`id`),
  ADD KEY `global_paises_activo_IDX` (`active`) USING BTREE;

--
-- Indices de la tabla `global_provincias`
--
ALTER TABLE `global_provincias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `global_provincias_active_IDX` (`active`) USING BTREE,
  ADD KEY `global_provincias_pais_id_IDX` (`pais_id`) USING BTREE;

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `auth_asign`
--
ALTER TABLE `auth_asign`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `auth_roles`
--
ALTER TABLE `auth_roles`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `cadda_equipos`
--
ALTER TABLE `cadda_equipos`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `cadda_federaciones`
--
ALTER TABLE `cadda_federaciones`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `core_audith`
--
ALTER TABLE `core_audith`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `core_sessions`
--
ALTER TABLE `core_sessions`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `core_users`
--
ALTER TABLE `core_users`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `global_ciudades`
--
ALTER TABLE `global_ciudades`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `global_paises`
--
ALTER TABLE `global_paises`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `global_provincias`
--
ALTER TABLE `global_provincias`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `global_provincias`
--
ALTER TABLE `global_provincias`
  ADD CONSTRAINT `global_provincias_FK` FOREIGN KEY (`id`) REFERENCES `global_paises` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
