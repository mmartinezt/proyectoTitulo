-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-07-2016 a las 06:40:34
-- Versión del servidor: 10.1.13-MariaDB
-- Versión de PHP: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sfs`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria_producto`
--

CREATE TABLE `categoria_producto` (
  `id_categoria_producto` int(11) NOT NULL,
  `nombre` varchar(500) NOT NULL,
  `descripcion` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categoria_producto`
--

INSERT INTO `categoria_producto` (`id_categoria_producto`, `nombre`, `descripcion`) VALUES
(1, 'camaras', 'camaras de seguridad'),
(2, 'nueva', 'utilizando ventana emergente'),
(3, 'nueva ', 'utilizando ventana emergente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id_cliente` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `rut_empresa` varchar(30) NOT NULL,
  `nombres` varchar(200) NOT NULL,
  `apellidos` varchar(200) NOT NULL,
  `rut_cliente` varchar(20) NOT NULL,
  `comuna` varchar(50) NOT NULL,
  `ciudad` varchar(50) NOT NULL,
  `calle` varchar(100) NOT NULL,
  `numero` int(6) NOT NULL,
  `codigo_postal` int(20) NOT NULL,
  `telefono` varchar(50) NOT NULL,
  `celular` varchar(50) NOT NULL,
  `descripcion` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `id_usuario`, `rut_empresa`, `nombres`, `apellidos`, `rut_cliente`, `comuna`, `ciudad`, `calle`, `numero`, `codigo_postal`, `telefono`, `celular`, `descripcion`) VALUES
(11, 0, '', 'Miguel Ángel', 'Martínez Troncoso', '17.457.641-6', 'Chillán', '234', 'El Roble', 224, 234, '234', '2245050', '234');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente_servicio_ejecucion`
--

CREATE TABLE `cliente_servicio_ejecucion` (
  `id_cliente_ejecucion` int(11) NOT NULL,
  `id_cliente_peticion` int(11) NOT NULL,
  `id_empleado` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `observacion` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente_servicio_peticion`
--

CREATE TABLE `cliente_servicio_peticion` (
  `id_cliente_servicio_peticion` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_cotizacion` int(11) NOT NULL,
  `fecha` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentario_cotizacion`
--

CREATE TABLE `comentario_cotizacion` (
  `id_comentario_cotizacion` int(11) NOT NULL,
  `id_cotizacion` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `pregunta` varchar(500) NOT NULL,
  `respuesta` varchar(500) NOT NULL,
  `fecha` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cotizacion`
--

CREATE TABLE `cotizacion` (
  `id_cotizacion` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `comentario` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cotizacion`
--

INSERT INTO `cotizacion` (`id_cotizacion`, `fecha`, `id_cliente`, `comentario`) VALUES
(7, '2016-06-30 12:54:21', 11, 'Incluida instalación se productos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cotizacion_producto`
--

CREATE TABLE `cotizacion_producto` (
  `id_cotizacion_producto` int(11) NOT NULL,
  `id_cotizacion` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cotizacion_producto`
--

INSERT INTO `cotizacion_producto` (`id_cotizacion_producto`, `id_cotizacion`, `id_producto`) VALUES
(5, 7, 1),
(6, 7, 2),
(7, 7, 3),
(8, 7, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cotizacion_servicio`
--

CREATE TABLE `cotizacion_servicio` (
  `id_cotizacion_servicio` int(11) NOT NULL,
  `id_cotizacion` int(11) NOT NULL,
  `id_servicio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cotizacion_servicio`
--

INSERT INTO `cotizacion_servicio` (`id_cotizacion_servicio`, `id_cotizacion`, `id_servicio`) VALUES
(2, 7, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE `empleado` (
  `numero_empleado` int(11) NOT NULL,
  `rut_empleado` varchar(30) NOT NULL,
  `id_tipo_empleado` int(11) NOT NULL,
  `nombres` varchar(200) NOT NULL,
  `apellido_paterno` varchar(100) NOT NULL,
  `apellido_materno` varchar(100) NOT NULL,
  `direccion` varchar(400) NOT NULL,
  `correo_electronico` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`numero_empleado`, `rut_empleado`, `id_tipo_empleado`, `nombres`, `apellido_paterno`, `apellido_materno`, `direccion`, `correo_electronico`) VALUES
(4, '12', 4, '44', '44', '44', '44', '44'),
(5, '123', 123, '123', '123', '123', '123', '123');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

CREATE TABLE `empresa` (
  `rut_empresa` int(30) NOT NULL,
  `nombre_empresa` varchar(500) NOT NULL,
  `nombre_fantasia` varchar(500) NOT NULL,
  `giro_empresa` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marca_producto`
--

CREATE TABLE `marca_producto` (
  `id_marca_producto` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` varchar(500) NOT NULL,
  `procedencia` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `marca_producto`
--

INSERT INTO `marca_producto` (`id_marca_producto`, `nombre`, `descripcion`, `procedencia`) VALUES
(1, 'Lumibox', 'marca de Prueba', 'China'),
(2, 'nueva123', 'nueva123 descripcion', 'China'),
(3, 'marca 4', 'marca probando nuevo modal', 'chile');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1463009611),
('m130524_201442_init', 1463009617);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `oferta`
--

CREATE TABLE `oferta` (
  `id_oferta` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `valor_oferta` int(10) NOT NULL,
  `descuento_porcentaje` int(5) NOT NULL,
  `descripcion` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `oferta`
--

INSERT INTO `oferta` (`id_oferta`, `id_producto`, `valor_oferta`, `descuento_porcentaje`, `descripcion`) VALUES
(1, 1, 10590, 20, 'oferta por producto obsoleto');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pack`
--

CREATE TABLE `pack` (
  `id_pack` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` varchar(500) NOT NULL,
  `path_imagen` varchar(200) NOT NULL,
  `precio` int(10) NOT NULL,
  `estado` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pack`
--

INSERT INTO `pack` (`id_pack`, `nombre`, `descripcion`, `path_imagen`, `precio`, `estado`) VALUES
(28, 'pack A', 'descripcion', 'WIN_20160515_16_20_49_Pro.jpg', 100, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pack_producto`
--

CREATE TABLE `pack_producto` (
  `id_pack_producto` int(11) NOT NULL,
  `id_pack` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pack_producto`
--

INSERT INTO `pack_producto` (`id_pack_producto`, `id_pack`, `id_producto`) VALUES
(6, 28, 1),
(7, 28, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id_prodcto` int(11) NOT NULL,
  `id_categoria_producto` int(11) NOT NULL,
  `id_subcategoria_producto` int(11) NOT NULL,
  `nombre_producto` varchar(500) NOT NULL,
  `id_marca_producto` varchar(100) NOT NULL,
  `descripcion` varchar(500) NOT NULL,
  `stock` int(5) NOT NULL,
  `path_imagen` varchar(200) NOT NULL,
  `precio_compra` int(10) NOT NULL,
  `precio_venta` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id_prodcto`, `id_categoria_producto`, `id_subcategoria_producto`, `nombre_producto`, `id_marca_producto`, `descripcion`, `stock`, `path_imagen`, `precio_compra`, `precio_venta`) VALUES
(1, 1, 1, 'camara domo interior cc345', '2', '', 10, '1.jpg', 12000, 18000),
(2, 1, 1, 'producto de prueba', '1', '', 3, '2.jpg', 300, 500),
(3, 1, 1, 'prueba3', '1', 'descripcion ', 1, '3.jpg', 123, 1234),
(4, 1, 2, 'producto prueba', '1', 'descripcion ', 12, 'producto.jpg', 12000, 20000),
(5, 1, 1, 'Domo CCD 1/3', '1', 'Domo CCD 1/3 700 TVL 3.6mm, IR 20m, Con Audio', 30, 'RLLb7umhsWbLzWu_m4G7318FETOat8QH.gif', 9990, 19990),
(6, 1, 2, 'Domo Sony 1/3 1000', '1', 'Domo Sony 1/3 1000 TVL IR 20m, 3.6mm, OSD, IP66 Blanca', 24, 'PdNnn2_e84EteL84-G8rTvwiPxu2w9ce.jpg', 13990, 24990),
(7, 1, 1, 'Cámara CMOS 600TVL Varifocal IP66', '1', 'Cámara CMOS 600TVL Varifocal IP66', 40, '_hUUa8aAuvyAqGvJ89Kl__BhBHQlsWjE.jpg', 13990, 26990),
(8, 1, 2, 'Camara HDCVI 1MP Exterior IR50m', '1', 'Camara HDCVI 1MP Exterior IR50m, IP66, 12mm, Smart IR, C/Bracket', 43, 'CHvneFnia3RazXxQsiVKNGxh4RpAWSSr.jpg', 27990, 35990);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicio`
--

CREATE TABLE `servicio` (
  `id_servicio` int(11) NOT NULL,
  `nombre` varchar(500) NOT NULL,
  `descripcion` varchar(500) NOT NULL,
  `valor` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `servicio`
--

INSERT INTO `servicio` (`id_servicio`, `nombre`, `descripcion`, `valor`) VALUES
(1, 'Instalación 4 cámaras (máximo 20 metros cable)', 'instalación de 4 cámaras de interior o exterior a un máximo de 20 metros de destancia al servidor', 50000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subcategoria_producto`
--

CREATE TABLE `subcategoria_producto` (
  `id_subcategoria_producto` int(11) NOT NULL,
  `id_categoria_producto` int(11) NOT NULL,
  `nombre` varchar(500) NOT NULL,
  `descripcion` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `subcategoria_producto`
--

INSERT INTO `subcategoria_producto` (`id_subcategoria_producto`, `id_categoria_producto`, `nombre`, `descripcion`) VALUES
(1, 1, 'Domo interior', 'no resistente a la interperie'),
(2, 1, 'camaras Bullet', 'Cámaras exterior e interior'),
(3, 1, 'prueba ', 'con ventana emergente'),
(4, 1, 'nueva', 'con ventana emergente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_empleado`
--

CREATE TABLE `tipo_empleado` (
  `id_tipo_empleado` int(11) NOT NULL,
  `nombre_tipo_empleado` varchar(100) NOT NULL,
  `descripcion` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo_empleado`
--

INSERT INTO `tipo_empleado` (`id_tipo_empleado`, `nombre_tipo_empleado`, `descripcion`) VALUES
(1, 'tecnico', 'mantencion'),
(2, 'tecnico', 'capacitacion');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`) VALUES
(1, 'miguel', 'viP1XEp8RIK-NgdPz2zcT7Baw59MyMRR', '$2y$13$wIJxHblzv/heTw8kbymLye2qpsMPwHgpEeYCtXbUxYQJk3CmdVujW', NULL, 'mmartinezt7@gmail.com', 10, 1463009705, 1463009705),
(2, 'administrador', 'KXOT3EAfidLZOBsByGCBKlG0Bn6jX_zd', '$2y$13$j3UfJLcy4./Ox/8Eb0NbO.laSWLb9Oyvm3eACk09ntQaiz0KpiW2i', NULL, 'mimarti@alumnos.ubiobio.cl', 10, 1467064409, 1467064409);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria_producto`
--
ALTER TABLE `categoria_producto`
  ADD PRIMARY KEY (`id_categoria_producto`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indices de la tabla `cliente_servicio_ejecucion`
--
ALTER TABLE `cliente_servicio_ejecucion`
  ADD PRIMARY KEY (`id_cliente_ejecucion`);

--
-- Indices de la tabla `cliente_servicio_peticion`
--
ALTER TABLE `cliente_servicio_peticion`
  ADD PRIMARY KEY (`id_cliente_servicio_peticion`);

--
-- Indices de la tabla `comentario_cotizacion`
--
ALTER TABLE `comentario_cotizacion`
  ADD PRIMARY KEY (`id_comentario_cotizacion`);

--
-- Indices de la tabla `cotizacion`
--
ALTER TABLE `cotizacion`
  ADD PRIMARY KEY (`id_cotizacion`);

--
-- Indices de la tabla `cotizacion_producto`
--
ALTER TABLE `cotizacion_producto`
  ADD PRIMARY KEY (`id_cotizacion_producto`);

--
-- Indices de la tabla `cotizacion_servicio`
--
ALTER TABLE `cotizacion_servicio`
  ADD PRIMARY KEY (`id_cotizacion_servicio`);

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`numero_empleado`);

--
-- Indices de la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`rut_empresa`);

--
-- Indices de la tabla `marca_producto`
--
ALTER TABLE `marca_producto`
  ADD PRIMARY KEY (`id_marca_producto`);

--
-- Indices de la tabla `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indices de la tabla `oferta`
--
ALTER TABLE `oferta`
  ADD PRIMARY KEY (`id_oferta`);

--
-- Indices de la tabla `pack`
--
ALTER TABLE `pack`
  ADD PRIMARY KEY (`id_pack`);

--
-- Indices de la tabla `pack_producto`
--
ALTER TABLE `pack_producto`
  ADD PRIMARY KEY (`id_pack_producto`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id_prodcto`);

--
-- Indices de la tabla `servicio`
--
ALTER TABLE `servicio`
  ADD PRIMARY KEY (`id_servicio`);

--
-- Indices de la tabla `subcategoria_producto`
--
ALTER TABLE `subcategoria_producto`
  ADD PRIMARY KEY (`id_subcategoria_producto`);

--
-- Indices de la tabla `tipo_empleado`
--
ALTER TABLE `tipo_empleado`
  ADD PRIMARY KEY (`id_tipo_empleado`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria_producto`
--
ALTER TABLE `categoria_producto`
  MODIFY `id_categoria_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `cliente_servicio_ejecucion`
--
ALTER TABLE `cliente_servicio_ejecucion`
  MODIFY `id_cliente_ejecucion` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `cliente_servicio_peticion`
--
ALTER TABLE `cliente_servicio_peticion`
  MODIFY `id_cliente_servicio_peticion` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `comentario_cotizacion`
--
ALTER TABLE `comentario_cotizacion`
  MODIFY `id_comentario_cotizacion` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `cotizacion`
--
ALTER TABLE `cotizacion`
  MODIFY `id_cotizacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `cotizacion_producto`
--
ALTER TABLE `cotizacion_producto`
  MODIFY `id_cotizacion_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `cotizacion_servicio`
--
ALTER TABLE `cotizacion_servicio`
  MODIFY `id_cotizacion_servicio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `empleado`
--
ALTER TABLE `empleado`
  MODIFY `numero_empleado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `marca_producto`
--
ALTER TABLE `marca_producto`
  MODIFY `id_marca_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `oferta`
--
ALTER TABLE `oferta`
  MODIFY `id_oferta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `pack`
--
ALTER TABLE `pack`
  MODIFY `id_pack` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT de la tabla `pack_producto`
--
ALTER TABLE `pack_producto`
  MODIFY `id_pack_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id_prodcto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `servicio`
--
ALTER TABLE `servicio`
  MODIFY `id_servicio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `subcategoria_producto`
--
ALTER TABLE `subcategoria_producto`
  MODIFY `id_subcategoria_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `tipo_empleado`
--
ALTER TABLE `tipo_empleado`
  MODIFY `id_tipo_empleado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
