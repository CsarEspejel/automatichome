-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-03-2020 a las 21:33:45
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `automatichome`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dispositivo`
--

CREATE TABLE `dispositivo` (
  `dispositivo_id` int(11) NOT NULL,
  `inmueble_id` int(11) DEFAULT NULL,
  `clave_dispositivo` varchar(11) COLLATE utf8_bin DEFAULT NULL,
  `descripcion` varchar(100) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `dispositivo`
--

INSERT INTO `dispositivo` (`dispositivo_id`, `inmueble_id`, `clave_dispositivo`, `descripcion`) VALUES
(5, 4, '0010101CL01', 'Control de la cueva del mufas'),
(7, 8, '0050505CL05', 'Control de las luciernagas'),
(8, 9, '0060606CL06', 'Control de la cocina'),
(9, 16, '0030303CL03', 'Luces bien chidas krnal'),
(11, 17, '0090909CL09', 'El del patio');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inmueble`
--

CREATE TABLE `inmueble` (
  `inmueble_id` int(11) NOT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  `calle_numero` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `descripcion` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `colonia` varchar(30) COLLATE utf8_bin DEFAULT NULL,
  `estado` varchar(30) COLLATE utf8_bin DEFAULT NULL,
  `codigo_postal` varchar(30) COLLATE utf8_bin DEFAULT NULL,
  `fecha_alta` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `inmueble`
--

INSERT INTO `inmueble` (`inmueble_id`, `usuario_id`, `calle_numero`, `descripcion`, `colonia`, `estado`, `codigo_postal`, `fecha_alta`) VALUES
(1, 37, 'En la esquina', 'Papas ', 'Estado', 'México', '3056', '2020-02-22'),
(3, 43, 'El ranchito', 'Carnita asada bro', 'Del norte', 'Monterrey', '65468', '2020-03-05'),
(4, 23, 'Todo donde pega la luz', 'Donde no hay luz es malo', 'La selva', 'Disney', '98764', '2020-03-05'),
(7, 45, 'En la esquina', 'Papas ', 'Estado', 'Doritos', '3056', '2020-03-10'),
(8, 42, 'En el fango', 'Le gustan grandes, le gustan gordas', 'La selva', 'Madagascar', '74156', '2020-03-10'),
(9, 32, 'Su casa 256', 'Otra casa bien vrgas siono', 'No lo se bro', 'Mexico', '48952', '2020-03-15'),
(13, 28, 'Una montaña', 'Chale', 'No se carnal', 'Grindolandia', '651887', '2020-03-16'),
(15, 46, 'lkjdkl', 'lkd', 'jdlk', 'jd', 'kldj', '2020-03-16'),
(16, 31, 'Chale carnal', 'Una casa mas mamalona', 'Virgenes', 'Neza', '57300s', '2020-03-19'),
(17, 43, 'numero 23', 'alsidjalsijdlasdj', 'Bien lejos', 'Mexico', '65326s', '2020-03-20');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `invitado`
--

CREATE TABLE `invitado` (
  `invitado_id` int(11) NOT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  `username` varchar(30) COLLATE utf8_bin DEFAULT NULL,
  `password` varchar(40) COLLATE utf8_bin DEFAULT NULL,
  `nombre` varchar(30) COLLATE utf8_bin DEFAULT NULL,
  `apellido_p` varchar(30) COLLATE utf8_bin DEFAULT NULL,
  `apellido_m` varchar(30) COLLATE utf8_bin DEFAULT NULL,
  `fecha_alta` date DEFAULT NULL,
  `fecha_baja` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `invitado`
--

INSERT INTO `invitado` (`invitado_id`, `usuario_id`, `username`, `password`, `nombre`, `apellido_p`, `apellido_m`, `fecha_alta`, `fecha_baja`) VALUES
(1, 1, 'Ari', 'passwo', 'Arianna', 'Morales', 'Duran', '2020-02-22', '2020-02-29');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `invitadodispositivo`
--

CREATE TABLE `invitadodispositivo` (
  `invitadoDispositivo_id` int(11) NOT NULL,
  `invitado_id` int(11) DEFAULT NULL,
  `dispositivo_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `invitadodispositivo`
--

INSERT INTO `invitadodispositivo` (`invitadoDispositivo_id`, `invitado_id`, `dispositivo_id`) VALUES
(1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `usuario_id` int(11) NOT NULL,
  `username` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(40) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `nombre` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `apellido_p` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `apellido_m` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `fecha_alta` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`usuario_id`, `username`, `password`, `nombre`, `apellido_p`, `apellido_m`, `fecha_alta`) VALUES
(23, 'elmufas', 'mufas', 'Mufasa', 'Rey', 'Leon', '2020-03-02'),
(28, 'salkdja', 'tonio', 'Irons', 'Manss', 'Ojalata', '2020-03-02'),
(31, 'csaer', 'csaer', 'Cesar', 'Espejel', 'x2', '2020-03-02'),
(32, 'dante', 'pass', 'Dante', 'Lopez', 'Arellanes', '2020-03-03'),
(42, 'motomoto', 'hipos', 'MotoMoto', 'Rolas', 'Diass', '2020-03-05'),
(43, 'joshido', 'chido', 'Joshs', 'Lopez', 'Gutierritos', '2020-03-05'),
(46, 'yeims', 'yeims', 'Yeimi', 'Espejel', 'Gutierritos', '2020-03-14');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `dispositivo`
--
ALTER TABLE `dispositivo`
  ADD PRIMARY KEY (`dispositivo_id`);

--
-- Indices de la tabla `inmueble`
--
ALTER TABLE `inmueble`
  ADD PRIMARY KEY (`inmueble_id`);

--
-- Indices de la tabla `invitado`
--
ALTER TABLE `invitado`
  ADD PRIMARY KEY (`invitado_id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`usuario_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `dispositivo`
--
ALTER TABLE `dispositivo`
  MODIFY `dispositivo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `inmueble`
--
ALTER TABLE `inmueble`
  MODIFY `inmueble_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `invitado`
--
ALTER TABLE `invitado`
  MODIFY `invitado_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `usuario_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
