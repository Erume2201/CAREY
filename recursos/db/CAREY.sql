-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-07-2023 a las 19:37:18
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `carey`
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
(1, 'JOHANN', '9331342789', 'Innvolve', 'Paraíso', 'Tabasco', 'Mexico'),
(2, 'Efre', '9334088776', 'Clanix23', 'Paraíso', 'Durango', 'Mexico'),
(4, 'jairo', '9371733950', 'VacaCoin', 'Cardenas', 'Tabasco', 'Mexico'),
(5, 'jonas', '9371036336', 'Clanix', 'cardenas', 'Chihuahua', 'Mexico'),
(8, 'julissa', '9335874123', 'jukkkj', 'Comalcalco', 'Nayarit', 'Mexico'),
(9, 'mariana', '1111111111', 'wew', 'sssssssssssf', 'Nayarit', 'Mexico'),
(10, 'yuliana', '9331182946', 'feefe', 'dsss', 'Morelos', 'Mexico');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `corte`
--

CREATE TABLE `corte` (
  `id_corte` int(11) NOT NULL,
  `desde` date DEFAULT NULL,
  `hasta` date DEFAULT NULL,
  `usuarios_id` int(11) DEFAULT NULL,
  `estatus_corte` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `corte`
--

INSERT INTO `corte` (`id_corte`, `desde`, `hasta`, `usuarios_id`, `estatus_corte`) VALUES
(4, '2023-07-10', '2023-07-16', 1, 'Activo');

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
(76, 'pagado', '2023-06-30', 10152, 2),
(77, 'Inicial', '2023-07-01', 0, 2),
(78, 'Inicial', '2023-07-01', 0, 4),
(79, 'Inicial', '2023-07-01', 0, 2),
(80, 'Inicial', '2023-07-01', 0, 4),
(81, 'pagado', '2023-07-01', 0, 1),
(82, 'pagado', '2023-07-02', 4495, 2),
(83, 'pagado', '2023-07-03', 0, 1),
(84, 'pagado', '2023-07-03', 0, 4),
(85, 'pagado', '2023-07-03', 0, 5),
(89, 'pagado', '2023-07-04', 0, 2),
(90, 'pagado', '2023-07-05', 0, 4),
(91, 'Inicial', '2023-07-05', 0, 1),
(92, 'pagado', '2023-07-05', 18000, 5),
(93, 'pagado', '2023-07-05', 9076, 5),
(94, 'pagado', '2023-07-05', 1798, 2),
(95, 'pagado', '2023-07-07', 0, 1),
(96, 'pagado', '2023-07-07', 15000, 2),
(97, 'pagado', '2023-07-07', 0, 1),
(98, 'pagado', '2023-07-07', 0, 2),
(99, 'pagado', '2023-07-07', 0, 1),
(100, 'pagado', '2023-07-07', 1000, 4),
(102, 'pagado', '2023-07-07', 2000, 5),
(103, 'pagado', '2023-07-07', 0, 2),
(104, 'pagado', '2023-07-07', 0, 5),
(105, 'pagado', '2023-07-07', 0, 8),
(106, 'pagado', '2023-07-07', 899, 8),
(107, 'pagado', '2023-07-07', 0, 9),
(108, 'pagado', '2023-07-07', 0, 9),
(109, 'pagado', '2023-07-07', 899, 10),
(110, 'pagado', '2023-07-10', 899, 1),
(111, 'pagado', '2023-07-10', 0, 1),
(112, 'pagado', '2023-07-10', 9000, 10),
(113, 'pagado', '2023-07-10', 500, 1),
(114, 'pendiente', '2023-07-10', 740, 1),
(115, 'pendiente', '2023-07-11', 1000, 1);

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
(19, '    cambia', 300, 500, 'Estodee de estar  bien programadokkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkk', 'DOCUMENTO '),
(25, '   Nuevo ', 298, 9000, 'Esto es un documento de prueba lo que significa que no podemos pasar más aya de los 100 carac', 'Documento '),
(27, 'Acta de Matrimonio', 105, 130, 'Esto es funcional\r\n', 'Documento'),
(34, 'Acta de nacimiento', 20, 120, 'Este es un documento oficial con sello digital. ', 'No se ');

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
(51, 2, 1798, 18, 43),
(52, 20, 17980, 18, 44),
(53, 30, 15000, 19, 45),
(54, 1, 500, 19, 46),
(55, 5, 2500, 19, 47),
(56, 2, 1000, 19, 48),
(57, 2, 1000, 19, 49),
(58, 4, 2000, 19, 50),
(59, 2, 18000, 25, 51),
(60, 2, 260, 27, 52),
(61, 2, 18000, 25, 53),
(62, 1, 899, 18, 54),
(63, 2, 1000, 19, 55),
(64, 1, 130, 27, 56),
(65, 1, 899, 18, 57),
(66, 1, 899, 18, 58),
(67, 1, 500, 19, 59),
(68, 1, 9000, 25, 60),
(69, 1, 500, 19, 61),
(70, 1, 500, 19, 62),
(71, 2, 240, 34, 62),
(72, 2, 1000, 19, 63);

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
  `estatus_usuarios` varchar(15) NOT NULL,
  `estado_usuario` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuarios`, `nombre_completo`, `nombre_usuario`, `telefono_usuario`, `correo`, `contrasena`, `rol_usuario`, `estatus_usuarios`, `estado_usuario`) VALUES
(1, 'Johann Hernandez Hernandez', 'Johann', '9331342789', 'hernandezjohann288@gmail.com', '5aa321eab75481b8daccfa31b9d1a32a', 'admin', 'activo', 'activo'),
(2, 'JOSE RUBEN FERNANDEZ GIL', 'JoseRuben', '9331185114', 'ruben@gmail.com', '009640d0d9087f1cb7afe85373c838a8', 'admin', 'activo', ''),
(3, 'Ricardo Arturo Garcia Garcia', 'Richard15', '9371005814', 'ricardo@gmail.com', '9e4080276e2bc3a3fd9b22846172251e', 'admin', 'activo', ''),
(4, 'Alberto', 'betoni', '5555555555', 'beto@gmail.com', '69ced770aef07f6d2dfee2299539e81b', 'admin', 'activo', ''),
(5, 'Julissa Jaqueline Rodriguez Flores', 'jaqFlor23', '9331580674', 'jaquelineFlores@gmail.com', '5763ef639e29fd1aa29e5f63f09422a2', 'admin', 'activo', ''),
(6, 'Jonas Custodio Ramirez', 'jonahcr', '9371036358', 'jonas@gmail.com', 'e75627fa5efce9e8a6cfe4f932b99c67', 'admin', 'activo', ''),
(7, 'Jairo Ediel Mendez Soberano', 'Ediel', '9371733950', 'jairo@gmail.com', '297535eceda63ef4882f1ee5010c5fc7', 'admin', 'activo', ''),
(8, 'jorge priego garcia', 'priegoG', '963215487', 'drogo@gmail.com', '145261b73b88eddc688ab73fc9394d10', 'admin', 'activo', ''),
(10, 'Arantza Lopez Barridos', 'Arantza', '9371654560', 'ara@gmail.com', 'dbc48ad8ac53015e93402896f2b6c2e2', 'admin', 'activo', ''),
(12, 'efren ruiz martinez', 'Erume', '9371036336', 'efren@gmail.com', '7f94206eca087d406efb46e8e55b14af', 'admin', 'activo', ''),
(13, 'Jose Adrian', 'JoseAdrian', '1234567897', 'adrian@gmail.com', '06ccc6ecd58f488f5a521d9ccd296956', 'admin', 'activo', '');

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
(43, 1798, '2023-07-05 19:03:12', '2023-07-05 19:03:12', 94, 1),
(44, 17980, '2023-07-07 11:59:21', '2023-07-07 11:59:21', 95, 4),
(45, 15000, '2023-07-07 11:59:46', '2023-07-07 11:59:46', 96, 4),
(46, 500, '2023-07-07 12:00:23', '2023-07-07 12:00:23', 97, 2),
(47, 2500, '2023-07-07 12:06:37', '2023-07-07 12:06:37', 98, 2),
(48, 1000, '2023-07-07 12:09:49', '2023-07-07 12:09:49', 99, 2),
(49, 1000, '2023-07-07 12:22:34', '2023-07-07 12:22:34', 100, 5),
(50, 2000, '2023-07-07 12:35:06', '2023-07-07 12:35:06', 102, 5),
(51, 18000, '2023-07-07 12:35:20', '2023-07-07 12:35:20', 103, 5),
(52, 260, '2023-07-07 12:36:31', '2023-07-07 12:36:31', 104, 5),
(53, 18000, '2023-07-07 12:38:00', '2023-07-07 12:38:00', 105, 5),
(54, 899, '2023-07-07 12:40:09', '2023-07-07 12:40:09', 106, 5),
(55, 1000, '2023-07-07 12:42:13', '2023-07-07 12:42:13', 107, 5),
(56, 130, '2023-07-07 12:42:26', '2023-07-07 12:42:26', 108, 5),
(57, 899, '2023-07-07 12:43:08', '2023-07-07 12:43:08', 109, 5),
(58, 899, '2023-07-10 11:16:02', '2023-07-10 11:16:02', 110, 8),
(59, 500, '2023-07-10 11:25:30', '2023-07-10 11:25:30', 111, 8),
(60, 9000, '2023-07-10 11:28:37', '2023-07-10 11:28:37', 112, 12),
(61, 500, '2023-07-10 11:31:25', '2023-07-10 11:31:25', 113, 3),
(62, 740, '2023-07-10 20:37:09', '2023-07-10 20:37:09', 114, 1),
(63, 1000, '2023-07-11 11:32:14', '2023-07-11 11:32:14', 115, 1);

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
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `corte`
--
ALTER TABLE `corte`
  MODIFY `id_corte` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `creditos`
--
ALTER TABLE `creditos`
  MODIFY `id_creditos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- AUTO_INCREMENT de la tabla `documentos`
--
ALTER TABLE `documentos`
  MODIFY `id_articulo_documetos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de la tabla `informacion_venta`
--
ALTER TABLE `informacion_venta`
  MODIFY `id_informacion_venta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

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
  MODIFY `id_usuarios` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id_ventas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

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
