-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-03-2021 a las 01:22:48
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
-- Base de datos: `almacen`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_clientes`
--

CREATE TABLE `tb_clientes` (
  `id_cliente` int(5) NOT NULL,
  `tipo_doc` int(1) NOT NULL,
  `num_doc` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apellido` varchar(30) NOT NULL,
  `dir_casa` varchar(45) NOT NULL,
  `correo` varchar(80) NOT NULL,
  `telefono` varchar(11) NOT NULL,
  `fecha_nac` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tb_clientes`
--

INSERT INTO `tb_clientes` (`id_cliente`, `tipo_doc`, `num_doc`, `nombre`, `apellido`, `dir_casa`, `correo`, `telefono`, `fecha_nac`) VALUES
(1, 0, 1044602481, 'Jesús Alberto', 'Domínguez Charris', 'Calle 2 #7-42', 'jesusdominguez2004@gmail.com', '3045344430', '2004-04-07'),
(2, 0, 1044602481, 'Jesús Alberto', 'Domínguez Charris', 'Calle 2 #7-42', 'jesusdominguez2004@gmail.com', '3045344430', '2004-04-07'),
(3, 1, 84982020, 'Deiner de Jesús', 'Domínguez Bolaño', 'Calle 2 #7-42', 'deiner_db@hotmail.com', '3016108858', '1979-06-01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_producto`
--

CREATE TABLE `tb_producto` (
  `codigo_prod` varchar(20) DEFAULT NULL,
  `nombre` varchar(80) DEFAULT NULL,
  `grupo_prod` varchar(20) DEFAULT NULL,
  `tipo_prod` varchar(20) DEFAULT NULL,
  `descripcion` varchar(500) DEFAULT NULL,
  `valor_compra` double DEFAULT NULL,
  `valor_venta` double DEFAULT NULL,
  `porcentaje_comis` double DEFAULT NULL,
  `valor_comi` double DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `nomarchivo` varchar(100) DEFAULT NULL,
  `ubicfoto` varchar(100) DEFAULT NULL,
  `cod_parner` varchar(40) DEFAULT NULL,
  `pos` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_usuario`
--

CREATE TABLE `tb_usuario` (
  `id_usuario` double NOT NULL,
  `login_usuario` varchar(10) DEFAULT NULL,
  `password_usuario` varchar(10) DEFAULT NULL,
  `nombre_usuario` varchar(20) DEFAULT NULL,
  `apellido_usuario` varchar(20) DEFAULT NULL,
  `identificacion` varchar(15) DEFAULT NULL,
  `id_tipodocumento` int(11) DEFAULT NULL,
  `telefono` varchar(15) DEFAULT NULL,
  `id_perfil` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tb_clientes`
--
ALTER TABLE `tb_clientes`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indices de la tabla `tb_usuario`
--
ALTER TABLE `tb_usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tb_clientes`
--
ALTER TABLE `tb_clientes`
  MODIFY `id_cliente` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
