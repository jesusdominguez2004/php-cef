-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-04-2021 a las 20:35:04
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `prueba`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_prueba`
--

CREATE TABLE `usuario_prueba` (
  `Codigo_u` int(3) NOT NULL,
  `nombre_u` varchar(30) NOT NULL,
  `apellido_u` varchar(30) NOT NULL,
  `correo` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario_prueba`
--

INSERT INTO `usuario_prueba` (`Codigo_u`, `nombre_u`, `apellido_u`, `correo`) VALUES
(1, 'Deiner de Jesús', 'Domínguez Bolaño', 'deiner_db@hotmail.com'),
(2, 'Elvia Cristina', 'Charris Rúa', 'elviacharrisrua@gmail.com'),
(3, 'Jesús Alberto', 'Domínguez Charris', 'jesusdominguez2004@gmail.com'),
(4, 'Santiago Andrés', 'Domínguez Charris', 'santiagoandresdominguez@gmail.com');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `usuario_prueba`
--
ALTER TABLE `usuario_prueba`
  ADD PRIMARY KEY (`Codigo_u`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
