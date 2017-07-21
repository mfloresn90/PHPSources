-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 09-09-2014 a las 20:11:46
-- Versión del servidor: 5.6.16
-- Versión de PHP: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `diagrama_ansis`
--
CREATE DATABASE IF NOT EXISTS `diagrama_ansis` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `diagrama_ansis`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lista_alumnos`
--

CREATE TABLE IF NOT EXISTS `lista_alumnos` (
  `n_de_lista` int(11) NOT NULL DEFAULT '0',
  `nombre` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`n_de_lista`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `lista_alumnos`
--

INSERT INTO `lista_alumnos` (`n_de_lista`, `nombre`) VALUES
(1, 'Castañeda Bautista Raquel'),
(2, 'Castañeda Jimenez Jorge Arturo'),
(3, 'Castellanos Leon Ricardo'),
(4, 'Cesar Medina Eloy'),
(5, 'Chavez Vazquez Alberto'),
(6, 'Cortes Barranco Yered Ebelin'),
(7, 'Felix Aguilar Alejandro'),
(8, 'Flores Huerta Ruben'),
(9, 'Flores Nicolas Mauricio'),
(10, 'Garacia Martinez Mario Daniel'),
(11, 'Garibay Leyva Evelin'),
(12, 'Gomez Gonzalez Gerardo'),
(13, 'Gonzalez Garcia Jose Luis'),
(14, 'Hernandez Martines Abdiel'),
(15, 'Hernandez Reyes Jorge Luis'),
(16, 'Huerta Hernandez Edgar'),
(17, 'Lopez Rios Jaime'),
(18, 'Martinez Juarez Agustin'),
(19, 'Martinez Moreno Jose Eduardo'),
(20, 'Medina Romero Jose Manuel'),
(21, 'Palacios Ramirez Ulises Ricardo'),
(22, 'Ramirez Gonzalez Daniel'),
(23, 'Ramirez Olvera Michael'),
(24, 'Ramirez Reyes Eduardo'),
(25, 'Raya Mandujano Orlan Eduardo'),
(26, 'Reyes Campos Ernesto'),
(27, 'Reyes Herver Jesus'),
(28, 'Reyes Silva Juan Francisco'),
(29, 'Rodriguez Rodriguez Lizbeth'),
(30, 'Sanchez Palomo Jaqueline'),
(31, 'Santiago Lopez Heriberto'),
(32, 'Valerio Bobadilla Mario Antonio');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seleccionados`
--

CREATE TABLE IF NOT EXISTS `seleccionados` (
  `n_de_lista` int(11) NOT NULL DEFAULT '0',
  `nombre` varchar(60) NOT NULL,
  PRIMARY KEY (`n_de_lista`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `seleccionados`
--

INSERT INTO `seleccionados` (`n_de_lista`, `nombre`) VALUES
(9, 'Flores Nicolas Mauricio'),
(11, 'Garibay Leyva Evelin');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
