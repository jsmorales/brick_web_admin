-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 25-10-2015 a las 22:04:24
-- Versión del servidor: 5.5.44-0ubuntu0.14.04.1
-- Versión de PHP: 5.5.9-1ubuntu4.13

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
  PRIMARY KEY (`pkID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Volcado de datos para la tabla `material`
--

INSERT INTO `material` (`pkID`, `nombre`, `precio`, `marca`, `imagen`, `fkID_clase`, `fkID_tipo`) VALUES
(1, 'Bloque naranja hueco', 2550, 'Santafé_1', 'hueco doble.jpg', NULL, NULL),
(2, 'Ladrillo Común', 3200, 'Ladrillo-S.A.D', 'ladrillos.gif', NULL, NULL),
(3, 'Bloque Macizo', 2300, '', 'vga_hueco12x18x25.jpg.png', NULL, NULL),
(4, 'Ladrillo 4', 2450, 'Ladrillos Fr.', 'ladrillos.gif', NULL, NULL),
(8, 'Ladrillo de prueba', 2356, 'Santa fe', 'lperfnovisto.jpg', NULL, NULL),
(9, '111', 1233, 'asdfa', 'hueco doble.jpg', NULL, NULL),
(10, 'Ladrillo naranja seco', 3520, 'Los Ladrilleros', 'vga_hueco12x18x25.jpg.png', NULL, NULL),
(11, '232323', 123123, 'sdfasdf', 'hueco doble grueso.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `material_propiedad`
--

CREATE TABLE IF NOT EXISTS `material_propiedad` (
  `pkID` int(11) NOT NULL AUTO_INCREMENT,
  `fkID_material` int(11) DEFAULT NULL,
  `fkID_propiedad` int(11) NOT NULL,
  `valor` varchar(200) NOT NULL,
  `fkID_uMedida` int(11) NOT NULL,
  PRIMARY KEY (`pkID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Volcado de datos para la tabla `material_propiedad`
--

INSERT INTO `material_propiedad` (`pkID`, `fkID_material`, `fkID_propiedad`, `valor`, `fkID_uMedida`) VALUES
(2, 1, 2, '3.6', 1),
(4, 3, 1, '2.9', 1),
(5, 1, 3, '5.4', 1),
(6, 4, 1, '3.5', 1),
(7, 4, 2, '1.3', 1),
(8, 4, 3, '5.6', 1),
(9, 3, 2, '4.3', 1),
(10, 3, 3, '3.25', 1),
(11, 1, 1, '2.4', 1),
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
(25, 9, 3, '8.21', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `propiedad`
--

CREATE TABLE IF NOT EXISTS `propiedad` (
  `pkID` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  PRIMARY KEY (`pkID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `propiedad`
--

INSERT INTO `propiedad` (`pkID`, `nombre`) VALUES
(1, 'ancho'),
(2, 'alto'),
(3, 'largo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_usuario`
--

CREATE TABLE IF NOT EXISTS `tipo_usuario` (
  `pkID` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  PRIMARY KEY (`pkID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

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
  `pkID` int(11) NOT NULL AUTO_INCREMENT,
  `alias` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `nombres` varchar(50) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `numero_cc` int(11) NOT NULL,
  `fkID_tipo` int(11) DEFAULT NULL,
  PRIMARY KEY (`pkID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`pkID`, `alias`, `pass`, `nombres`, `apellidos`, `numero_cc`, `fkID_tipo`) VALUES
(1, 'jsmorales', '8cb2237d0679ca88db6464eac60da96345513964', 'Johan', 'Morales', 1024524163, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `u_medida`
--

CREATE TABLE IF NOT EXISTS `u_medida` (
  `pkID` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `abreviatura` varchar(20) NOT NULL,
  PRIMARY KEY (`pkID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `u_medida`
--

INSERT INTO `u_medida` (`pkID`, `nombre`, `abreviatura`) VALUES
(1, 'centímetro', 'cm'),
(2, 'metro', 'm');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
