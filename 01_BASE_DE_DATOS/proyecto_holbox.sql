-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 30-10-2018 a las 10:41:42
-- Versión del servidor: 5.7.23
-- Versión de PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyecto_holbox`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventos`
--

DROP TABLE IF EXISTS `eventos`;
CREATE TABLE IF NOT EXISTS `eventos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `descripcion` text NOT NULL,
  `color` varchar(255) NOT NULL,
  `textColor` varchar(255) NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `eventos`
--

INSERT INTO `eventos` (`id`, `title`, `descripcion`, `color`, `textColor`, `start`, `end`) VALUES
(22, 'ENTREGA PROYECTO', 'SE ENTREGÓ UN POCO TARDE', '#ff1111', '#FFFFFF', '2018-10-30 04:30:00', '2018-10-30 04:30:00'),
(23, 'NO HAY CLASE', 'EVENTO', '#31a0c1', '#FFFFFF', '2018-11-01 04:30:00', '2018-11-01 04:30:00'),
(24, 'NO HAY CLASE', 'EVENTO', '#3abeda', '#FFFFFF', '2018-11-02 04:30:00', '2018-11-02 04:30:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `publicaciones`
--

DROP TABLE IF EXISTS `publicaciones`;
CREATE TABLE IF NOT EXISTS `publicaciones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `imagen` mediumblob NOT NULL,
  `comentario` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_usuario` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `restaurantes`
--

DROP TABLE IF EXISTS `restaurantes`;
CREATE TABLE IF NOT EXISTS `restaurantes` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) NOT NULL,
  `precio` varchar(15) NOT NULL,
  `horarioAbierto` varchar(15) NOT NULL,
  `telefono` varchar(15) NOT NULL,
  `direccion` varchar(55) NOT NULL,
  `tipo` varchar(25) NOT NULL,
  `horarioCerrado` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf32;

--
-- Volcado de datos para la tabla `restaurantes`
--

INSERT INTO `restaurantes` (`id`, `nombre`, `precio`, `horarioAbierto`, `telefono`, `direccion`, `tipo`, `horarioCerrado`) VALUES
(1, '\"Pizzería Edelín\"', 'Medio', '14:00', '88876555', 'Calle 2a x 45 y 58 en la esquina del parque', 'Restaurantes', '22:00'),
(2, 'Bar \"La lupita\"', 'Costoso', '18:00', '99934556', 'Calle 30 no.354 frente la playa, casa solor azul.', 'Bares', '23:00'),
(3, 'Bar \"El Paso\"', 'Economico', '18:00', '99933556', 'En la avenida principal', 'Bares', '23:00'),
(4, 'Antojitos \"Carlos\"', 'Medio', '14:00', '88876555', 'Calle 2a x 45 y 58 en la esquina del parque', 'Restaurantes', '22:00'),
(11, 'Pasteleria Los Hermanos', 'Costoso', '10:00', '23344545', 'Calle 45a x 45 esquina tiburón ballena', 'Postres', '18:00'),
(12, 'Bar Loco', 'Medio', '18:00', '32323434', 'Frente a la playa, alado del malecón', 'Bares', '03:00'),
(14, 'Bar Argg', 'Medio', '18:00', '32323434', 'Frente a la playa, alado de hotel Sirenas', 'Bares', '03:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id_usuario` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Llave primaria',
  `nombre` varchar(100) NOT NULL COMMENT 'Nombre completo usuario',
  `correo` varchar(100) NOT NULL COMMENT 'Correo electrónico de usuario',
  `contrasena` varchar(255) NOT NULL COMMENT 'Contraseña de usuario',
  `tipo_usuario` varchar(15) NOT NULL DEFAULT 'usuario' COMMENT 'Tipo de usuario',
  PRIMARY KEY (`id_usuario`),
  UNIQUE KEY `correo` (`correo`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre`, `correo`, `contrasena`, `tipo_usuario`) VALUES
(12, 'administrador', 'admin', '$2y$10$A/aib0eSn5YZmw7rVe38peUDTprQvWLC2RyRmLh1R.OjbMZDzWfqa', 'administrador');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
