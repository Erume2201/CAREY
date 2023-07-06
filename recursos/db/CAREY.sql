-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 06-07-2023 a las 03:25:31
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `CAREY`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id_cliente` int(11) NOT NULL,
  `nombre_cliente` varchar(40) NOT NULL,
  `telefono_cliente` varchar(13) NOT NULL,
  `nombre_negocio` varchar(45) NOT NULL,
  `municipio` varchar(60) NOT NULL,
  `estado` varchar(60) NOT NULL,
  `pais` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `nombre_cliente`, `telefono_cliente`, `nombre_negocio`, `municipio`, `estado`, `pais`) VALUES
(1, 'JOHANN', '9331342789', 'Clanix', 'Paraíso', 'Nayarit', 'Mexico'),
(2, 'Efre', '9334088776', 'Clanix23', 'Paraíso', 'Durango', 'Mexico'),
(4, 'jairo', '9977552626', 'VacaCoin', 'Cardenas', 'Tabasco', 'Mexico'),
(5, 'jonas', '9371036336', 'Clanix', 'cardenas', 'Chihuahua', 'Mexico');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `corte`
--

CREATE TABLE `corte` (
  `id_corte` int(11) NOT NULL,
  `desde` date DEFAULT NULL,
  `hasta` date DEFAULT NULL,
  `usuarios_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `corte`
--

INSERT INTO `corte` (`id_corte`, `desde`, `hasta`, `usuarios_id`) VALUES
(1, '2023-07-03', '2023-07-09', 1),
(2, '2023-06-29', '2023-07-05', 1),
(3, '2023-07-03', '2023-07-09', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `creditos`
--

CREATE TABLE `creditos` (
  `id_creditos` int(11) NOT NULL,
  `estatus` varchar(15) NOT NULL,
  `fecha` date NOT NULL,
  `total` float NOT NULL,
  `cliente_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `creditos`
--

INSERT INTO `creditos` (`id_creditos`, `estatus`, `fecha`, `total`, `cliente_id`) VALUES
(75, 'pagado', '2023-06-30', 22000, 1),
(76, 'pendiente', '2023-06-30', 10152, 2),
(77, 'Inicial', '2023-07-01', 0, 2),
(78, 'Inicial', '2023-07-01', 0, 4),
(79, 'Inicial', '2023-07-01', 0, 2),
(80, 'Inicial', '2023-07-01', 0, 4),
(81, 'pagado', '2023-07-01', 0, 1),
(82, 'pendiente', '2023-07-02', 4495, 2),
(83, 'pagado', '2023-07-03', 0, 1),
(84, 'Inicial', '2023-07-03', 0, 4),
(85, 'pagado', '2023-07-03', 0, 5),
(89, 'pagado', '2023-07-04', 0, 2),
(90, 'Inicial', '2023-07-05', 0, 4),
(91, 'Inicial', '2023-07-05', 0, 1),
(92, 'pagado', '2023-07-05', 18000, 5),
(93, 'pagado', '2023-07-05', 9076, 5),
(94, 'pendiente', '2023-07-05', 1798, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `documentos`
--

CREATE TABLE `documentos` (
  `id_articulo_documetos` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `precio_costo` float NOT NULL,
  `precio_venta` float NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `tipo` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `documentos`
--

INSERT INTO `documentos` (`id_articulo_documetos`, `nombre`, `precio_costo`, `precio_venta`, `descripcion`, `tipo`) VALUES
(18, 'Legacion matrimonio', 78, 899, 'sertyuytrertyu', 'Documento'),
(19, '   cambia', 300, 500, 'Estodee de estar  bien programado', 'DOCUMENTO '),
(25, '   Nuevo ', 298, 9000, 'Esto es un documento de prueba lo que significa que no podemos pasar más aya de los 100 carac', 'Documento '),
(27, ' Legacion matrimonio', 55, 76, 'Esto es funcional\r\n', 'Documento');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `informacion_venta`
--

CREATE TABLE `informacion_venta` (
  `id_informacion_venta` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `sub_total` float NOT NULL,
  `documentos_id` int(11) NOT NULL,
  `ventas_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `informacion_venta`
--

INSERT INTO `informacion_venta` (`id_informacion_venta`, `cantidad`, `sub_total`, `documentos_id`, `ventas_id`) VALUES
(25, 4, 20000, 25, 27),
(26, 4, 2000, 19, 27),
(27, 2, 10000, 25, 28),
(28, 2, 152, 27, 28),
(29, 2, 1000, 19, 29),
(30, 2, 152, 27, 29),
(31, 10, 50000, 25, 30),
(32, 2, 10000, 25, 31),
(33, 2, 1798, 18, 32),
(34, 1, 5000, 25, 32),
(35, 3, 1500, 19, 32),
(36, 1, 899, 18, 33),
(37, 1, 500, 19, 33),
(38, 3, 15000, 25, 33),
(39, 5, 4495, 18, 34),
(40, 1, 809.1, 18, 35),
(41, 1, 899, 18, 36),
(42, 1, 5000, 25, 36),
(43, 1, 500, 19, 36),
(44, 10, 8990, 18, 37),
(45, 4, 36000, 25, 38),
(46, 10, 5000, 19, 39),
(47, 11, 5500, 19, 40),
(48, 2, 18000, 25, 41),
(49, 1, 9000, 25, 42),
(50, 1, 76, 27, 42),
(51, 2, 1798, 18, 43);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `informes`
--

CREATE TABLE `informes` (
  `id_informes` int(11) NOT NULL,
  `precio_final` float NOT NULL,
  `ganancia_semanal` float NOT NULL,
  `fecha_inicio` datetime NOT NULL,
  `fecha_final` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `informes`
--

INSERT INTO `informes` (`id_informes`, `precio_final`, `ganancia_semanal`, `fecha_inicio`, `fecha_final`) VALUES
(3, 16198.1, 2000, '2023-07-03 00:00:00', '2023-07-09 00:00:00'),
(4, 16198.1, 2000, '2023-07-03 00:00:00', '2023-07-09 00:00:00'),
(5, 89774.1, 79799.1, '2023-07-03 00:00:00', '2023-07-09 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `informes_detalles`
--

CREATE TABLE `informes_detalles` (
  `id_informes_detalles` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `total` float NOT NULL,
  `informe_id` int(11) NOT NULL,
  `documentos_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `informes_detalles`
--

INSERT INTO `informes_detalles` (`id_informes_detalles`, `cantidad`, `total`, `informe_id`, `documentos_id`) VALUES
(1, 12, 10698.1, 3, 18),
(2, 1, 500, 3, 19),
(3, 1, 5000, 3, 25),
(4, 12, 10698.1, 4, 18),
(5, 1, 78, 4, 19),
(6, 1, 500, 4, 25),
(7, 12, 10698.1, 5, 18),
(8, 22, 11000, 5, 19),
(9, 8, 68000, 5, 25),
(10, 1, 76, 5, 27);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuarios` int(11) NOT NULL,
  `nombre_completo` varchar(50) NOT NULL,
  `nombre_usuario` varchar(30) NOT NULL,
  `telefono_usuario` varchar(10) NOT NULL,
  `correo` varchar(35) NOT NULL,
  `contrasena` varchar(32) NOT NULL,
  `rol_usuario` varchar(10) NOT NULL,
  `estatus_usuarios` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuarios`, `nombre_completo`, `nombre_usuario`, `telefono_usuario`, `correo`, `contrasena`, `rol_usuario`, `estatus_usuarios`) VALUES
(1, 'Johann Hernandez Hernandez', 'Johann', '9331342789', 'hernandezjohann288@gmail.com', '5aa321eab75481b8daccfa31b9d1a32a', 'Admin', 'activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id_ventas` int(11) NOT NULL,
  `total_venta` float NOT NULL,
  `hora` datetime NOT NULL,
  `fecha` datetime NOT NULL,
  `credito_id` int(11) NOT NULL,
  `usuarios_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id_ventas`, `total_venta`, `hora`, `fecha`, `credito_id`, `usuarios_id`) VALUES
(27, 22000, '2023-06-30 19:09:48', '2023-06-30 19:09:48', 75, 1),
(28, 10152, '2023-06-30 19:19:39', '2023-06-30 19:19:39', 76, 1),
(29, 1152, '2023-07-01 18:53:02', '2023-07-01 18:53:02', 77, 1),
(30, 50000, '2023-07-01 18:55:44', '2023-07-01 18:55:44', 78, 1),
(31, 10000, '2023-07-01 19:03:00', '2023-07-01 19:03:00', 79, 1),
(32, 8298, '2023-07-01 19:04:45', '2023-07-01 19:04:45', 80, 1),
(33, 16399, '2023-07-01 19:05:23', '2023-07-01 19:05:23', 81, 1),
(34, 4495, '2023-07-02 17:59:46', '2023-07-02 17:59:46', 82, 1),
(35, 809.1, '2023-07-03 09:27:56', '2023-07-03 09:27:56', 83, 1),
(36, 6399, '2023-07-03 10:04:33', '2023-07-03 10:04:33', 84, 1),
(37, 8990, '2023-07-03 12:39:07', '2023-07-03 12:39:07', 85, 1),
(38, 36000, '2023-07-04 21:28:18', '2023-07-04 21:28:18', 89, 1),
(39, 5000, '2023-07-05 10:38:50', '2023-07-05 10:38:50', 90, 1),
(40, 5500, '2023-07-05 10:42:41', '2023-07-05 10:42:41', 91, 1),
(41, 18000, '2023-07-05 10:42:57', '2023-07-05 10:42:57', 92, 1),
(42, 9076, '2023-07-05 10:43:15', '2023-07-05 10:43:15', 93, 1),
(43, 1798, '2023-07-05 19:03:12', '2023-07-05 19:03:12', 94, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indices de la tabla `corte`
--
ALTER TABLE `corte`
  ADD PRIMARY KEY (`id_corte`),
  ADD KEY `usuarios_id` (`usuarios_id`);

--
-- Indices de la tabla `creditos`
--
ALTER TABLE `creditos`
  ADD PRIMARY KEY (`id_creditos`),
  ADD KEY `cliente_id` (`cliente_id`);

--
-- Indices de la tabla `documentos`
--
ALTER TABLE `documentos`
  ADD PRIMARY KEY (`id_articulo_documetos`);

--
-- Indices de la tabla `informacion_venta`
--
ALTER TABLE `informacion_venta`
  ADD PRIMARY KEY (`id_informacion_venta`),
  ADD KEY `ventas_id` (`ventas_id`),
  ADD KEY `documentos_id` (`documentos_id`);

--
-- Indices de la tabla `informes`
--
ALTER TABLE `informes`
  ADD PRIMARY KEY (`id_informes`);

--
-- Indices de la tabla `informes_detalles`
--
ALTER TABLE `informes_detalles`
  ADD PRIMARY KEY (`id_informes_detalles`),
  ADD KEY `informe_id` (`informe_id`),
  ADD KEY `documentos_id` (`documentos_id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuarios`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id_ventas`),
  ADD KEY `usuarios_id` (`usuarios_id`),
  ADD KEY `credito_id` (`credito_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `corte`
--
ALTER TABLE `corte`
  MODIFY `id_corte` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `creditos`
--
ALTER TABLE `creditos`
  MODIFY `id_creditos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT de la tabla `documentos`
--
ALTER TABLE `documentos`
  MODIFY `id_articulo_documetos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `informacion_venta`
--
ALTER TABLE `informacion_venta`
  MODIFY `id_informacion_venta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT de la tabla `informes`
--
ALTER TABLE `informes`
  MODIFY `id_informes` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `informes_detalles`
--
ALTER TABLE `informes_detalles`
  MODIFY `id_informes_detalles` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuarios` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id_ventas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `corte`
--
ALTER TABLE `corte`
  ADD CONSTRAINT `corte_ibfk_1` FOREIGN KEY (`usuarios_id`) REFERENCES `usuarios` (`id_usuarios`);

--
-- Filtros para la tabla `creditos`
--
ALTER TABLE `creditos`
  ADD CONSTRAINT `creditos_ibfk_1` FOREIGN KEY (`cliente_id`) REFERENCES `cliente` (`id_cliente`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `informacion_venta`
--
ALTER TABLE `informacion_venta`
  ADD CONSTRAINT `informacion_venta_ibfk_1` FOREIGN KEY (`ventas_id`) REFERENCES `ventas` (`id_ventas`) ON UPDATE CASCADE,
  ADD CONSTRAINT `informacion_venta_ibfk_2` FOREIGN KEY (`documentos_id`) REFERENCES `documentos` (`id_articulo_documetos`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `informes_detalles`
--
ALTER TABLE `informes_detalles`
  ADD CONSTRAINT `informes_detalles_ibfk_1` FOREIGN KEY (`informe_id`) REFERENCES `informes` (`id_informes`) ON UPDATE CASCADE,
  ADD CONSTRAINT `informes_detalles_ibfk_2` FOREIGN KEY (`documentos_id`) REFERENCES `documentos` (`id_articulo_documetos`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `ventas_ibfk_1` FOREIGN KEY (`usuarios_id`) REFERENCES `usuarios` (`id_usuarios`) ON UPDATE CASCADE,
  ADD CONSTRAINT `ventas_ibfk_2` FOREIGN KEY (`credito_id`) REFERENCES `creditos` (`id_creditos`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
