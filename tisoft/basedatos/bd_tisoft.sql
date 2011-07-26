-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 19-11-2010 a las 17:05:50
-- Versión del servidor: 5.1.36
-- Versión de PHP: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Base de datos: `bd_tisoft`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE IF NOT EXISTS `clientes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_doc` text,
  `num_doc` text,
  `nombre` text,
  `apellido` text,
  `correo` text,
  `estrato` text,
  `genero` text,
  `direccion` text,
  `barrio` text,
  `municipio` text,
  `telefono` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Volcar la base de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `tipo_doc`, `num_doc`, `nombre`, `apellido`, `correo`, `estrato`, `genero`, `direccion`, `barrio`, `municipio`, `telefono`) VALUES
(1, 'C.C', '1129531275', 'lenin', 'garizabalo', 'igunublue@gmail.com', '1', 'M', 'cra41#2b454', 'villanueva', 'barranquilla ', '3519428'),
(2, 'C.C', '1045693633', 'rafael', 'carrasquilla', 'recarrasquilla@misena.edu.co', '2', 'M', 'cra8a#45-44', 'laalboraya', 'barranquilla ', '3002288929'),
(3, 'C.C', '1129520126', 'richard', 'sanchez', 'rs_am@hotmail.com', '2', 'M', 'cll 78 #23c-38', 'los robles', 'soledad', '3633532'),
(4, 'C.C', '1045657432', 'peter', 'parker', 'No@no.com', '0', 'X', 'new york', 'los edificios', 'No', '5555555'),
(5, 'C.C', '1140836053', 'augusto', 'celin', 'amcelin@misena.edu.co', '2', 'M', 'cra17 #17-56', 'las nieves', 'No', '3751407'),
(6, 'C.C', '123456', 'Yeraldin', 'Charris Rua', 'No@no.com', '0', 'X', 'fghj5498765', 'hgh', 'No', '1212345'),
(7, 'C.C', '1047879341', 'YERALDIN ', 'CHARRIS', 'ycharris8@gmail.com', '1', 'F', 'Calle 2 #6120', 'La aurora', 'Palmar de Varel', '234512234');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalles_equipos`
--

CREATE TABLE IF NOT EXISTS `detalles_equipos` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `id_servicio` text NOT NULL,
  `tipo` text,
  `marca` text,
  `serial` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Volcar la base de datos para la tabla `detalles_equipos`
--

INSERT INTO `detalles_equipos` (`id`, `id_servicio`, `tipo`, `marca`, `serial`) VALUES
(1, '1', 'Pc-1', 'Albatron', '0001'),
(2, '2', 'Impresora-2', 'AOC', '0002'),
(3, '2', 'Impresora-3', 'HP/Compaq', '0003'),
(4, '2', 'Impresora-4', 'IBM/Lenovo', '0004'),
(5, '2', 'Pc-1', 'HP/Compaq', '0005'),
(6, '2', 'Pc-2', 'Biostar', '0006'),
(7, '4', 'Portatiles-1', 'Acer', '1233445'),
(8, '5', 'Pc-1', 'AOC', ''),
(9, '5', 'Pc-2', 'Alienware', ''),
(10, '5', 'Portatiles-1', 'Gateway', ''),
(11, '5', 'Portatiles-2', 'HP/Compaq', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios`
--

CREATE TABLE IF NOT EXISTS `servicios` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `num_doc` text,
  `nombre_usu` text,
  `cant_equipo` text,
  `fecha` text,
  `empresa` text,
  `valor` text,
  `especificaciones` text,
  `servicio_real` text,
  `observaciones` text,
  `garantia` text,
  `name_tec` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcar la base de datos para la tabla `servicios`
--

INSERT INTO `servicios` (`id`, `num_doc`, `nombre_usu`, `cant_equipo`, `fecha`, `empresa`, `valor`, `especificaciones`, `servicio_real`, `observaciones`, `garantia`, `name_tec`) VALUES
(1, '1129531275', NULL, '2', '10/11/2010', 'no', '10000', NULL, 'ninguno', 'no', '24 horas', 'lenin garizabalo'),
(2, '1129531275', NULL, '7', '10/11/2010', 'NO', '10000', NULL, 'NO SE', 'NO', '24 horas', 'lenin garizabalo'),
(3, '1140836053', NULL, '3', '10/11/2010', 'cas', '100000', NULL, 'nada', 'no', '24 horas', 'lenin garizabalo'),
(4, '1140836053', NULL, '2', '10/11/2010', 'casa', '120000', NULL, 'nada', 'no', '24 horas', 'lenin garizabalo'),
(5, '1047879341', NULL, '5', '24/11/2010', 'sENA', '', NULL, '', '', '24 horas', 'lenin garizabalo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` text,
  `apellido` text,
  `login` text,
  `password` text,
  `tipo` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcar la base de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellido`, `login`, `password`, `tipo`) VALUES
(1, 'lenin', 'garizabalo', 'lenin', '1234', 'Administrador'),
(2, 'yeraldin', 'charris', 'yera', '1234', 'Administrador');
