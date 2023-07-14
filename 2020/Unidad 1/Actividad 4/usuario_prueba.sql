-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-04-2021 a las 15:28:02
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_almacen`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_prueba`
--

CREATE TABLE `usuario_prueba` (
  `Codigo_u` double NOT NULL,
  `nombre_u` varchar(50) NOT NULL,
  `apellido_u` varchar(80) NOT NULL,
  `correo` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario_prueba`
--

INSERT INTO `usuario_prueba` (`Codigo_u`, `nombre_u`, `apellido_u`, `correo`) VALUES
(1, 'JAVIER', 'RESTREPO', 'j_restrepo74@hotmail.com'),
(2, 'JAVIER', 'RESTREPO', 'j_restrepo74@hotmail.com'),
(3, 'RAFAEL RICARDO', 'ROJAS RUA', 'j_restrepo74@hotmail.com'),
(4, 'JAVIER', 'RESTREPO', 'j_restrepo74@hotmail.com'),
(5, 'JAVIER', 'RESTREPO', 'j_restrepo74@hotmail.com'),
(6, 'RAFAEL RICARDO', 'RESTREPO', 'j_restrepo74@hotmail.com');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `usuario_prueba`
--
ALTER TABLE `usuario_prueba`
  ADD PRIMARY KEY (`Codigo_u`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `usuario_prueba`
--
ALTER TABLE `usuario_prueba`
  MODIFY `Codigo_u` double NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
