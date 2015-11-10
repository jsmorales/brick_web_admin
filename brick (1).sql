-- phpMyAdmin SQL Dump
-- version 4.4.13.1deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 10-11-2015 a las 17:09:39
-- Versión del servidor: 5.6.27-0ubuntu1
-- Versión de PHP: 5.6.11-1ubuntu3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `brick`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clase`
--

CREATE TABLE IF NOT EXISTS `clase` (
  `pkID` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `fkID_tipo` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `clase`
--

INSERT INTO `clase` (`pkID`, `nombre`, `fkID_tipo`) VALUES
(1, 'Ladrillo', 0),
(2, 'Cemento', 0),
(5, 'No aplica', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clase_tipo`
--

CREATE TABLE IF NOT EXISTS `clase_tipo` (
  `fkID_clase` int(11) NOT NULL,
  `fkID_tipo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE IF NOT EXISTS `cliente` (
  `pkID` int(11) NOT NULL,
  `num_cc` int(11) NOT NULL,
  `nombres` varchar(50) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `direccion` varchar(50) NOT NULL,
  `email` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`pkID`, `num_cc`, `nombres`, `apellidos`, `telefono`, `direccion`, `email`) VALUES
(1, 53091662, 'Angela', 'Galindo', '3144694264', 'cra 45 67', 'bianggela@gmail.com'),
(3, 24534123, 'Marleny', 'Rodríguez', '313275096', 'cra 20 este n 32-08', 'r_marleny@gmail.com'),
(5, 12342345, 'Ricardo', 'Umbarila', '3124567323', 'cra 34 sur kennedy', 'rumbarila@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contenidos`
--

CREATE TABLE IF NOT EXISTS `contenidos` (
  `pkID` int(11) NOT NULL,
  `nombre` varchar(60) DEFAULT NULL,
  `contenido` text
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `contenidos`
--

INSERT INTO `contenidos` (`pkID`, `nombre`, `contenido`) VALUES
(1, 'Acerca De', 'The boxes used in this template are nested inbetween a normal Bootstrap row and the start of your column layout. The boxes will be full-width boxes, so if you want to make them smaller then you will need to customize.\r\n\r\nA huge thanks to Death to the Stock Photo for allowing us to use the beautiful photos that make this template really come to life. When using this template, make sure your photos are decent. Also make sure that the file size on your photos is kept to a minumum to keep load times to a minimum.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc placerat diam quis nisl vestibulum dignissim. In hac habitasse platea dictumst. Interdum et malesuada fames ac ante ipsum primis in faucibus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.'),
(2, 'Misión', 'Vender materiales de construcción de la mejor calidad a precios justos para sus clientes, obteniendo utilidades que soporten el mantenimiento del establecimiento por medio de una política de calidad y confianza con nuestros clientes además de la implementación de tecnologías de la información que permitan agilizar, administrar y tomar decisiones frente al negocio.'),
(3, 'Visión', 'Ser en 5 años una de las empresas en materia de ferretería mejor posicionadas en el barrio Cobec de Soacha, con la apertura de dos locales más por medio de la adaptación de metodologías de negocio ágiles y de bajo costo que sean aplicables a pequeñas empresas.'),
(4, 'mapa', '<iframe width="100%" height="400" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.com/maps/d/embed?mid=zna2BGYbpzno.knGr_fplnOTc" width="640" height="480"></iframe>');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cotizacion`
--

CREATE TABLE IF NOT EXISTS `cotizacion` (
  `pkID` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `valor_total` int(11) NOT NULL,
  `fkID_cliente` int(11) NOT NULL,
  `fkID_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cotizacion_material`
--

CREATE TABLE IF NOT EXISTS `cotizacion_material` (
  `fkID_cotizacion` int(11) NOT NULL,
  `fkID_material` int(11) NOT NULL,
  `cantidad_material` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos_generales`
--

CREATE TABLE IF NOT EXISTS `datos_generales` (
  `pkID` int(11) NOT NULL,
  `titulo` varchar(50) NOT NULL,
  `direccion` varchar(50) NOT NULL,
  `slogan` varchar(50) NOT NULL,
  `telefono` varchar(80) NOT NULL,
  `ubicacion` varchar(50) NOT NULL,
  `correo` varchar(80) NOT NULL,
  `copy` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `datos_generales`
--

INSERT INTO `datos_generales` (`pkID`, `titulo`, `direccion`, `slogan`, `telefono`, `ubicacion`, `correo`, `copy`) VALUES
(1, 'La Súper 7', 'TRANSVERSAL 7 NO. 6-39', 'DEPÓSITO Y FERRETERÍA', '726 28 59', 'BARRIO COBEC, SOACHA', 'lasuper7@gmail.com', 'Creado con la tecnología de © BRICK 2015');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `material`
--

CREATE TABLE IF NOT EXISTS `material` (
  `pkID` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `precio` int(11) NOT NULL,
  `marca` varchar(200) NOT NULL,
  `imagen` varchar(100) DEFAULT NULL,
  `fkID_clase` int(11) DEFAULT NULL,
  `fkID_tipo` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `material`
--

INSERT INTO `material` (`pkID`, `nombre`, `precio`, `marca`, `imagen`, `fkID_clase`, `fkID_tipo`) VALUES
(1, 'Bloque naranja hueco', 2000, 'Santafé_1', 'Perforado5.jpg', 1, NULL),
(2, 'Ladrillo Común', 3200, 'Ladrillo-S.A.D', 'ladrillos.gif', 1, NULL),
(3, 'Bloque Macizo', 2300, '', 'vga_hueco12x18x25.jpg.png', 1, NULL),
(4, 'Ladrillo 4', 2450, 'Ladrillos Fr.', 'ladrillos.gif', NULL, NULL),
(8, 'Ladrillo de prueba', 2356, 'Santa fe', 'lperfnovisto.jpg', 1, NULL),
(9, '111', 1233, 'asdfa', 'hueco doble.jpg', 1, NULL),
(12, 'Ladrillo hp pavilion', 1500, 'Santa prueba', 'ladrillo04.jpg', 1, NULL),
(13, 'Ladrillo Torneado ', 15000, 'Ladrillos el REY', '20140406_173608_1.jpg', NULL, NULL),
(14, 'Cemento Argos General', 22000, 'Argos', 'm20110519053907.jpg', 2, NULL),
(21, 'Lad_prueba', 2000, 'San Material', 'ladrillo-gran-formato-rasillon-30x15x4-6140097z0-00000067.jpg', 1, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `material_propiedad`
--

CREATE TABLE IF NOT EXISTS `material_propiedad` (
  `pkID` int(11) NOT NULL,
  `fkID_material` int(11) NOT NULL,
  `fkID_propiedad` int(11) NOT NULL,
  `valor` varchar(200) NOT NULL,
  `fkID_uMedida` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `material_propiedad`
--

INSERT INTO `material_propiedad` (`pkID`, `fkID_material`, `fkID_propiedad`, `valor`, `fkID_uMedida`) VALUES
(5, 1, 3, '5.4', 1),
(6, 4, 1, '3.5', 1),
(7, 4, 2, '1.3', 1),
(8, 4, 3, '5.6', 1),
(13, 5, 1, '3.5', 1),
(14, 5, 2, '4.2', 1),
(15, 5, 3, '6.3', 1),
(16, 6, 1, '1.5', 1),
(17, 7, 1, '2.5', 1),
(18, 7, 2, '2.8', 1),
(19, 7, 3, '6.8', 1),
(20, 8, 1, '3.5', 1),
(21, 8, 2, '4.5', 1),
(22, 8, 3, '6.2', 1),
(23, 9, 1, '3.6', 1),
(24, 9, 2, '7.32', 1),
(25, 9, 3, '8.21', 1),
(26, 12, 1, '4.5', 1),
(27, 12, 2, '1.56', 1),
(28, 12, 3, '8.49', 1),
(33, 13, 2, '678', 1),
(34, 13, 3, '678', 1),
(35, 13, 1, '4,90', 1),
(36, 14, 4, '40', 3),
(37, 1, 1, '33', 1),
(38, 1, 2, '23', 1),
(41, 3, 2, '20', 1),
(43, 3, 1, '40', 1),
(44, 3, 3, '10', 1),
(48, 2, 1, '23', 1),
(49, 2, 2, '7', 1),
(50, 2, 3, '12', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `propiedad`
--

CREATE TABLE IF NOT EXISTS `propiedad` (
  `pkID` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `propiedad`
--

INSERT INTO `propiedad` (`pkID`, `nombre`) VALUES
(1, 'ancho'),
(2, 'alto'),
(3, 'largo'),
(4, 'peso');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo`
--

CREATE TABLE IF NOT EXISTS `tipo` (
  `pkID` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_usuario`
--

CREATE TABLE IF NOT EXISTS `tipo_usuario` (
  `pkID` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo_usuario`
--

INSERT INTO `tipo_usuario` (`pkID`, `nombre`) VALUES
(1, 'Administrador'),
(2, 'Empleado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `pkID` int(11) NOT NULL,
  `alias` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `nombres` varchar(50) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `numero_cc` int(11) NOT NULL,
  `fkID_tipo` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`pkID`, `alias`, `pass`, `nombres`, `apellidos`, `numero_cc`, `fkID_tipo`) VALUES
(1, 'jsmorales', '8cb2237d0679ca88db6464eac60da96345513964', 'Johan', 'Morales', 1024524163, 1),
(2, 'ventas', '8cb2237d0679ca88db6464eac60da96345513964', 'Juan', 'Gonzales', 79643776, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `u_medida`
--

CREATE TABLE IF NOT EXISTS `u_medida` (
  `pkID` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `abreviatura` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `u_medida`
--

INSERT INTO `u_medida` (`pkID`, `nombre`, `abreviatura`) VALUES
(1, 'centímetro', 'cm'),
(2, 'metro', 'm'),
(3, 'Kilogramo', 'Kg');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clase`
--
ALTER TABLE `clase`
  ADD PRIMARY KEY (`pkID`);

--
-- Indices de la tabla `clase_tipo`
--
ALTER TABLE `clase_tipo`
  ADD KEY `fkID_clase` (`fkID_clase`,`fkID_tipo`),
  ADD KEY `fkID_tipo` (`fkID_tipo`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`pkID`);

--
-- Indices de la tabla `contenidos`
--
ALTER TABLE `contenidos`
  ADD PRIMARY KEY (`pkID`);

--
-- Indices de la tabla `cotizacion`
--
ALTER TABLE `cotizacion`
  ADD PRIMARY KEY (`pkID`),
  ADD KEY `fkID_cliente` (`fkID_cliente`,`fkID_usuario`),
  ADD KEY `fkID_cliente_2` (`fkID_cliente`),
  ADD KEY `fkID_usuario` (`fkID_usuario`);

--
-- Indices de la tabla `cotizacion_material`
--
ALTER TABLE `cotizacion_material`
  ADD KEY `fkID_cotizacion` (`fkID_cotizacion`,`fkID_material`),
  ADD KEY `fkID_material` (`fkID_material`);

--
-- Indices de la tabla `datos_generales`
--
ALTER TABLE `datos_generales`
  ADD PRIMARY KEY (`pkID`);

--
-- Indices de la tabla `material`
--
ALTER TABLE `material`
  ADD PRIMARY KEY (`pkID`),
  ADD KEY `fkID_clase` (`fkID_clase`,`fkID_tipo`),
  ADD KEY `fkID_tipo` (`fkID_tipo`);

--
-- Indices de la tabla `material_propiedad`
--
ALTER TABLE `material_propiedad`
  ADD PRIMARY KEY (`pkID`),
  ADD KEY `fkID_material` (`fkID_material`),
  ADD KEY `fkID_propiedad` (`fkID_propiedad`),
  ADD KEY `fkID_uMedida` (`fkID_uMedida`),
  ADD KEY `fkID_material_2` (`fkID_material`),
  ADD KEY `fkID_propiedad_2` (`fkID_propiedad`),
  ADD KEY `fkID_uMedida_2` (`fkID_uMedida`),
  ADD KEY `fkID_material_3` (`fkID_material`,`fkID_propiedad`,`fkID_uMedida`),
  ADD KEY `fkID_material_4` (`fkID_material`),
  ADD KEY `fkID_material_5` (`fkID_material`);

--
-- Indices de la tabla `propiedad`
--
ALTER TABLE `propiedad`
  ADD PRIMARY KEY (`pkID`);

--
-- Indices de la tabla `tipo`
--
ALTER TABLE `tipo`
  ADD PRIMARY KEY (`pkID`);

--
-- Indices de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  ADD PRIMARY KEY (`pkID`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`pkID`),
  ADD KEY `fkID_tipo` (`fkID_tipo`);

--
-- Indices de la tabla `u_medida`
--
ALTER TABLE `u_medida`
  ADD PRIMARY KEY (`pkID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clase`
--
ALTER TABLE `clase`
  MODIFY `pkID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `pkID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `contenidos`
--
ALTER TABLE `contenidos`
  MODIFY `pkID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `cotizacion`
--
ALTER TABLE `cotizacion`
  MODIFY `pkID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `datos_generales`
--
ALTER TABLE `datos_generales`
  MODIFY `pkID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `material`
--
ALTER TABLE `material`
  MODIFY `pkID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT de la tabla `material_propiedad`
--
ALTER TABLE `material_propiedad`
  MODIFY `pkID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=51;
--
-- AUTO_INCREMENT de la tabla `propiedad`
--
ALTER TABLE `propiedad`
  MODIFY `pkID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `tipo`
--
ALTER TABLE `tipo`
  MODIFY `pkID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  MODIFY `pkID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `pkID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `u_medida`
--
ALTER TABLE `u_medida`
  MODIFY `pkID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `clase_tipo`
--
ALTER TABLE `clase_tipo`
  ADD CONSTRAINT `clase_tipo_ibfk_1` FOREIGN KEY (`fkID_clase`) REFERENCES `clase` (`pkID`),
  ADD CONSTRAINT `clase_tipo_ibfk_2` FOREIGN KEY (`fkID_tipo`) REFERENCES `tipo` (`pkID`);

--
-- Filtros para la tabla `cotizacion`
--
ALTER TABLE `cotizacion`
  ADD CONSTRAINT `cotizacion_ibfk_1` FOREIGN KEY (`fkID_usuario`) REFERENCES `usuarios` (`pkID`),
  ADD CONSTRAINT `cotizacion_ibfk_2` FOREIGN KEY (`fkID_cliente`) REFERENCES `cliente` (`pkID`);

--
-- Filtros para la tabla `cotizacion_material`
--
ALTER TABLE `cotizacion_material`
  ADD CONSTRAINT `cotizacion_material_ibfk_1` FOREIGN KEY (`fkID_material`) REFERENCES `material` (`pkID`),
  ADD CONSTRAINT `cotizacion_material_ibfk_2` FOREIGN KEY (`fkID_cotizacion`) REFERENCES `cotizacion` (`pkID`);

--
-- Filtros para la tabla `material`
--
ALTER TABLE `material`
  ADD CONSTRAINT `material_ibfk_1` FOREIGN KEY (`fkID_tipo`) REFERENCES `tipo` (`pkID`),
  ADD CONSTRAINT `material_ibfk_2` FOREIGN KEY (`fkID_clase`) REFERENCES `clase` (`pkID`);

--
-- Filtros para la tabla `material_propiedad`
--
ALTER TABLE `material_propiedad`
  ADD CONSTRAINT `material_propiedad_ibfk_1` FOREIGN KEY (`fkID_propiedad`) REFERENCES `propiedad` (`pkID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `material_propiedad_ibfk_2` FOREIGN KEY (`fkID_uMedida`) REFERENCES `u_medida` (`pkID`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`fkID_tipo`) REFERENCES `tipo_usuario` (`pkID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
