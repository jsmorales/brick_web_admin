-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 17-11-2015 a las 05:32:48
-- Versión del servidor: 5.5.46-0ubuntu0.14.04.2
-- Versión de PHP: 5.5.9-1ubuntu4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `brick`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clase`
--

CREATE TABLE IF NOT EXISTS `clase` (
  `pkID` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(20) NOT NULL,
  `fkID_tipo` int(11) DEFAULT NULL,
  PRIMARY KEY (`pkID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

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
  `fkID_tipo` int(11) NOT NULL,
  KEY `fkID_clase` (`fkID_clase`,`fkID_tipo`),
  KEY `fkID_tipo` (`fkID_tipo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE IF NOT EXISTS `cliente` (
  `pkID` int(11) NOT NULL AUTO_INCREMENT,
  `num_cc` int(11) NOT NULL,
  `nom_cliente` varchar(50) NOT NULL,
  `ape_cliente` varchar(50) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `direccion` varchar(50) NOT NULL,
  `email` varchar(20) NOT NULL,
  PRIMARY KEY (`pkID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`pkID`, `num_cc`, `nom_cliente`, `ape_cliente`, `telefono`, `direccion`, `email`) VALUES
(1, 53091662, 'Angela', 'Galindo', '3144694264', 'cra 45 67', 'bianggela@gmail.com'),
(3, 24534123, 'Marleny', 'Rodríguez', '313275096', 'cra 20 este n 32-08', 'r_marleny@gmail.com'),
(5, 12342345, 'Ricardo', 'Umbarila', '3124567323', 'cra 34 sur kennedy', 'rumbarila@gmail.com'),
(6, 52056889, 'Heriberto', 'Morales', '3132587845', 'cra 56 este soacha', 'heri_@gmail.com'),
(7, 1056897451, 'Juan', 'Pabon', '3157894512', 'cra 45 - 23---111', 'juanpabon@gmail.com'),
(8, 4567890, 'Pepito', 'perez', '2134567890', '34567890', 'hsadfk@gmail.com'),
(9, 345672345, 'Nelson', 'Galindo', '3152345678', 'cra 46', 'nelson@gmail.com'),
(10, 23456783, 'Aritzali', 'Monroy', '3123451234', 'cra 45 este', 'maria@gmail.com'),
(11, 1024513567, 'Sebastian', 'Morales', '3132785624', 'cra 20 este 32 08', 'jhellmetal2000@gmail'),
(12, 5984489, 'Nelson', 'Galindo', '3165060163', 'Carrera 7ma', 'nel@ff.com.co'),
(14, 28892995, 'Maria', 'Monroy', '3154342187', 'clle 12 ', 'mm@ddd.com.co');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contenidos`
--

CREATE TABLE IF NOT EXISTS `contenidos` (
  `pkID` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(60) DEFAULT NULL,
  `contenido` text,
  PRIMARY KEY (`pkID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

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
  `pkID` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` datetime NOT NULL,
  `valor_total` int(11) NOT NULL,
  `fkID_cliente` int(11) DEFAULT NULL,
  `fkID_usuario` int(11) NOT NULL,
  PRIMARY KEY (`pkID`),
  KEY `fkID_cliente` (`fkID_cliente`,`fkID_usuario`),
  KEY `fkID_cliente_2` (`fkID_cliente`),
  KEY `fkID_usuario` (`fkID_usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=42 ;

--
-- Volcado de datos para la tabla `cotizacion`
--

INSERT INTO `cotizacion` (`pkID`, `fecha`, `valor_total`, `fkID_cliente`, `fkID_usuario`) VALUES
(1, '2015-11-11 21:09:57', 191600, 1, 1),
(2, '2015-11-12 20:19:31', 130000, 3, 1),
(3, '2015-11-12 21:07:35', 310000, 5, 2),
(4, '2015-11-12 23:35:50', 4274800, 6, 1),
(5, '2015-11-12 23:37:49', 0, 1, 1),
(6, '2015-11-13 21:08:47', 191600, 7, 1),
(7, '2015-11-14 07:58:10', 1688800, 5, 3),
(8, '2015-11-14 09:01:55', 1401600, 7, 3),
(9, '2015-11-14 09:44:46', 476400, 5, 1),
(10, '2015-11-26 00:00:00', 9700576, 1, 3),
(11, '2015-11-15 13:44:41', 2147483647, 8, 1),
(12, '2015-11-15 14:03:13', 2147483647, 1, 3),
(32, '2015-11-15 14:30:15', 2147483647, 1, 1),
(33, '2015-11-15 14:33:55', 1160400, 6, 1),
(34, '2015-11-15 00:00:00', 1160400, 1, 1),
(37, '2015-11-15 20:57:16', 242765760, 14, 9),
(38, '2015-11-15 21:38:03', 79600, 5, 5),
(39, '2015-11-15 22:32:30', 96000, 10, 5),
(40, '2015-11-15 22:37:02', 130000, 11, 6),
(41, '2015-11-15 22:41:22', 94000, 10, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cotizacion_material`
--

CREATE TABLE IF NOT EXISTS `cotizacion_material` (
  `pkID` int(11) NOT NULL AUTO_INCREMENT,
  `fkID_cotizacion` int(11) NOT NULL,
  `fkID_material` int(11) NOT NULL,
  `cantidad_material` int(11) NOT NULL,
  `costo_material` int(11) NOT NULL,
  PRIMARY KEY (`pkID`),
  KEY `fkID_cotizacion` (`fkID_cotizacion`,`fkID_material`),
  KEY `fkID_material` (`fkID_material`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=39 ;

--
-- Volcado de datos para la tabla `cotizacion_material`
--

INSERT INTO `cotizacion_material` (`pkID`, `fkID_cotizacion`, `fkID_material`, `cantidad_material`, `costo_material`) VALUES
(1, 1, 2, 53, 169600),
(2, 1, 14, 1, 22000),
(3, 2, 1, 43, 86000),
(4, 2, 14, 2, 44000),
(5, 3, 1, 122, 244000),
(6, 3, 14, 3, 66000),
(7, 4, 2, 1219, 3900800),
(8, 4, 14, 17, 374000),
(9, 6, 2, 53, 169600),
(10, 6, 14, 1, 22000),
(11, 7, 2, 459, 1468800),
(12, 7, 14, 10, 220000),
(13, 8, 2, 383, 1225600),
(14, 8, 14, 8, 176000),
(15, 9, 2, 287, 344400),
(16, 9, 14, 6, 132000),
(17, 10, 8, 3996, 9414576),
(18, 10, 14, 13, 286000),
(19, 11, 3, 2147483647, 2147483647),
(20, 11, 14, 2147483647, 2147483647),
(21, 12, 1, 2147483647, 2147483647),
(22, 12, 14, 2147483647, 3),
(23, 32, 9, 338200278, 2147483647),
(24, 32, 14, 4350101, 2147483647),
(25, 33, 2, 692, 830400),
(26, 33, 14, 15, 330000),
(27, 34, 2, 692, 830400),
(28, 34, 14, 15, 330000),
(29, 37, 8, 99960, 235505760),
(30, 37, 14, 330, 7260000),
(31, 38, 2, 48, 57600),
(32, 38, 14, 1, 22000),
(33, 39, 1, 37, 74000),
(34, 39, 14, 1, 22000),
(35, 40, 1, 43, 86000),
(36, 40, 14, 2, 44000),
(37, 41, 1, 36, 72000),
(38, 41, 14, 1, 22000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos_generales`
--

CREATE TABLE IF NOT EXISTS `datos_generales` (
  `pkID` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(50) NOT NULL,
  `direccion` varchar(50) NOT NULL,
  `slogan` varchar(50) NOT NULL,
  `telefono` varchar(80) NOT NULL,
  `ubicacion` varchar(50) NOT NULL,
  `correo` varchar(80) NOT NULL,
  `copy` varchar(50) NOT NULL,
  PRIMARY KEY (`pkID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

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
  `pkID` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(200) NOT NULL,
  `precio` int(11) NOT NULL,
  `marca` varchar(200) NOT NULL,
  `imagen` varchar(100) DEFAULT NULL,
  `fkID_clase` int(11) DEFAULT NULL,
  `fkID_tipo` int(11) DEFAULT NULL,
  PRIMARY KEY (`pkID`),
  KEY `fkID_clase` (`fkID_clase`,`fkID_tipo`),
  KEY `fkID_tipo` (`fkID_tipo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Volcado de datos para la tabla `material`
--

INSERT INTO `material` (`pkID`, `nombre`, `precio`, `marca`, `imagen`, `fkID_clase`, `fkID_tipo`) VALUES
(1, 'Bloque naranja hueco', 2000, 'Santafé_1', 'Perforado5.jpg', 1, NULL),
(2, 'Ladrillo Común', 1200, 'Ladrillo-S.A.D', 'ladrillos.gif', 1, NULL),
(3, 'Bloque Macizo', 2300, 'Santa Fé', 'vga_hueco12x18x25.jpg.png', 1, NULL),
(4, 'Ladrillo 4', 2450, 'Ladrillos Fr.', 'ladrillos.gif', NULL, NULL),
(8, 'Adornado 1', 2356, 'Santa fe', 'lperfnovisto.jpg', 1, NULL),
(9, 'Hueco redondo', 1250, 'Ladrillos New Wave', 'hueco doble.jpg', 1, NULL),
(12, 'Ladrillo 1', 1500, 'Santa Fe soacha', 'ladrillo04.jpg', 1, NULL),
(13, 'Ladrillo Torneado ', 15000, 'Ladrillos el REY', '20140406_173608_1.jpg', NULL, NULL),
(14, 'Cemento Argos General', 22000, 'Argos', 'm20110519053907.jpg', 2, NULL),
(21, 'Lad_xzf001', 2000, 'Ladrillera Felipe', 'ladrillo-gran-formato-rasillon-30x15x4-6140097z0-00000067.jpg', 1, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `material_propiedad`
--

CREATE TABLE IF NOT EXISTS `material_propiedad` (
  `pkID` int(11) NOT NULL AUTO_INCREMENT,
  `fkID_material` int(11) NOT NULL,
  `fkID_propiedad` int(11) NOT NULL,
  `valor` varchar(200) NOT NULL,
  `fkID_uMedida` int(11) NOT NULL,
  PRIMARY KEY (`pkID`),
  KEY `fkID_material` (`fkID_material`),
  KEY `fkID_propiedad` (`fkID_propiedad`),
  KEY `fkID_uMedida` (`fkID_uMedida`),
  KEY `fkID_material_2` (`fkID_material`),
  KEY `fkID_propiedad_2` (`fkID_propiedad`),
  KEY `fkID_uMedida_2` (`fkID_uMedida`),
  KEY `fkID_material_3` (`fkID_material`,`fkID_propiedad`,`fkID_uMedida`),
  KEY `fkID_material_4` (`fkID_material`),
  KEY `fkID_material_5` (`fkID_material`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=52 ;

--
-- Volcado de datos para la tabla `material_propiedad`
--

INSERT INTO `material_propiedad` (`pkID`, `fkID_material`, `fkID_propiedad`, `valor`, `fkID_uMedida`) VALUES
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
(50, 2, 3, '12', 1),
(51, 1, 3, '12', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `propiedad`
--

CREATE TABLE IF NOT EXISTS `propiedad` (
  `pkID` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  PRIMARY KEY (`pkID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

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
  `pkID` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(20) NOT NULL,
  PRIMARY KEY (`pkID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_usuario`
--

CREATE TABLE IF NOT EXISTS `tipo_usuario` (
  `pkID` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  PRIMARY KEY (`pkID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `tipo_usuario`
--

INSERT INTO `tipo_usuario` (`pkID`, `nombre`) VALUES
(1, 'Administrador'),
(2, 'Empleado'),
(3, 'Cliente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `pkID` int(11) NOT NULL AUTO_INCREMENT,
  `alias` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `nombres` varchar(50) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `numero_cc` int(11) NOT NULL,
  `fkID_tipo` int(11) DEFAULT NULL,
  PRIMARY KEY (`pkID`),
  KEY `fkID_tipo` (`fkID_tipo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`pkID`, `alias`, `pass`, `nombres`, `apellidos`, `numero_cc`, `fkID_tipo`) VALUES
(1, 'jsmorales', '8cb2237d0679ca88db6464eac60da96345513964', 'Johan', 'Morales', 1024524163, 1),
(2, 'ventas', '8cb2237d0679ca88db6464eac60da96345513964', 'Juan', 'Gonzales', 79643776, 2),
(3, 's_rodriguez', '8cb2237d0679ca88db6464eac60da96345513964', 'Sebastián', 'Rodríguez', 1023523124, 3),
(4, 'n_galindo', '8cb2237d0679ca88db6464eac60da96345513964', 'Nelson', 'Galindo', 345672345, 3),
(5, 'a_monroy', '8cb2237d0679ca88db6464eac60da96345513964', 'Aritzali', 'Monroy', 23456783, 3),
(6, 's_morales', '8cb2237d0679ca88db6464eac60da96345513964', 'Sebastian', 'Morales', 1024513567, 3),
(7, 'Nelson Galindo', 'd70abe27d7415dffc4ea095b377cb7f8d1ee5c67', 'Nelson', 'Galindo', 5984489, 3),
(9, 'Maria Monroy', 'e7eb59e909cbdf4bb4e92bbf0a99ea35de17d662', 'Maria', 'Monroy', 28892995, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `u_medida`
--

CREATE TABLE IF NOT EXISTS `u_medida` (
  `pkID` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `abreviatura` varchar(20) NOT NULL,
  PRIMARY KEY (`pkID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `u_medida`
--

INSERT INTO `u_medida` (`pkID`, `nombre`, `abreviatura`) VALUES
(1, 'centímetro', 'cm'),
(2, 'metro', 'm'),
(3, 'Kilogramo', 'Kg');

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
