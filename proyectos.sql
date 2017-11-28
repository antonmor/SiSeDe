-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-06-2017 a las 23:39:35
-- Versión del servidor: 10.1.13-MariaDB
-- Versión de PHP: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tcabd`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyectos`
--

CREATE TABLE `proyectos` (
  `id_proy` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `folder` varchar(50) NOT NULL,
  `expediente` int(11) NOT NULL,
  `usuario` int(11) NOT NULL,
  `estado` int(11) NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `comentarios` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='En esta tabla se almacena la información de los proyectos';

--
-- Volcado de datos para la tabla `proyectos`
--

INSERT INTO `proyectos` (`id_proy`, `nombre`, `folder`, `expediente`, `usuario`, `estado`, `fecha_creacion`, `comentarios`) VALUES
(4, '113062017.tca', 'Proyectos/Redactados/', 1, 7, 3, '2017-06-13 17:11:01', 'fhjhfyyxtdxfcghjlkjtrbez dxhf'),
(5, '314062017.tca', 'Proyectos/Redactados/', 3, 7, 3, '2017-06-14 16:49:53', NULL),
(6, '315062017.tca', 'Proyectos/Redactados/', 3, 7, 2, '2017-06-15 14:06:38', 'Nomo+´lklnm, '),
(7, '615062017.tca', 'Proyectos/Redactados/', 6, 7, 4, '2017-06-15 14:08:27', 'asdasdasdasdadasdas'),
(8, '215062017.tca', 'Proyectos/Redactados/', 2, 8, 3, '2017-06-15 14:22:51', 'Revisa bien tu documento'),
(9, '115062017.tca', 'Proyectos/Redactados/', 1, 7, 4, '2017-06-15 17:20:53', NULL),
(10, '615062017.tca', 'Proyectos/Redactados/', 6, 7, 4, '2017-06-15 17:22:58', 'asdasdasdasdadasdas'),
(11, '315062017.tca', 'Proyectos/Redactados/', 3, 7, 2, '2017-06-15 18:30:58', 'Nomo+´lklnm, '),
(12, '118062017.tca', 'Proyectos/Redactados/', 1, 7, 4, '2017-06-18 18:55:52', 'REVISAR DETALLES DE REDACCIÓN');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `proyectos`
--
ALTER TABLE `proyectos`
  ADD PRIMARY KEY (`id_proy`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `proyectos`
--
ALTER TABLE `proyectos`
  MODIFY `id_proy` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
