-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-07-2023 a las 02:01:01
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

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
-- Estructura de tabla para la tabla `tb_clientes`
--

CREATE TABLE `tb_clientes` (
  `id_cliente` int(5) NOT NULL,
  `tipo_doc` int(1) NOT NULL,
  `num_doc` int(11) NOT NULL,
  `nombres` varchar(30) NOT NULL,
  `apellidos` varchar(30) NOT NULL,
  `dir_casa` varchar(45) NOT NULL,
  `correo` varchar(80) NOT NULL,
  `telefono` varchar(11) NOT NULL,
  `fecha_nac` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_productos`
--

CREATE TABLE `tb_productos` (
  `codigo_prod` varchar(20) NOT NULL,
  `nombre` varchar(80) NOT NULL,
  `grupo_prod` varchar(20) NOT NULL,
  `tipo_prod` varchar(20) NOT NULL,
  `descripcion` varchar(500) NOT NULL,
  `valor_compra` double NOT NULL,
  `valor_venta` double NOT NULL,
  `porcentaje_comis` double NOT NULL,
  `valor_comi` double NOT NULL,
  `fecha` date NOT NULL,
  `nomarchivo` varchar(100) NOT NULL,
  `ubicfoto` varchar(100) NOT NULL,
  `cod_parner` varchar(40) NOT NULL,
  `pos` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_usuarios`
--

CREATE TABLE `tb_usuarios` (
  `id_usuario` double NOT NULL,
  `login_usuario` varchar(10) NOT NULL,
  `password_usuario` varchar(10) NOT NULL,
  `nombre_usuario` varchar(20) NOT NULL,
  `apellido_usuari` varchar(20) NOT NULL,
  `identificacion` varchar(15) NOT NULL,
  `id_tipodocumento` int(11) NOT NULL,
  `telefono` varchar(15) NOT NULL,
  `id_perfil` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tb_clientes`
--
ALTER TABLE `tb_clientes`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indices de la tabla `tb_usuarios`
--
ALTER TABLE `tb_usuarios`
  ADD PRIMARY KEY (`id_usuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
