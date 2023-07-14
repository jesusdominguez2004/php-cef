-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-05-2021 a las 20:09:28
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
  `tipo_doc` varchar(20) DEFAULT NULL,
  `num_doc` int(11) DEFAULT NULL,
  `nombre_c` varchar(30) DEFAULT NULL,
  `apellido_c` varchar(30) DEFAULT NULL,
  `dir_casa` varchar(45) DEFAULT NULL,
  `correo_c` varchar(80) DEFAULT NULL,
  `telefono_c` varchar(11) DEFAULT NULL,
  `fecha_nac` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tb_clientes`
--

INSERT INTO `tb_clientes` (`id_cliente`, `tipo_doc`, `num_doc`, `nombre_c`, `apellido_c`, `dir_casa`, `correo_c`, `telefono_c`, `fecha_nac`) VALUES
(1, 'Cédula', 22712446, 'Elvia Cristina', 'Charris Rúa', 'Calle 2 No 7-42', 'elviacharrisrua@gmail.com', '3004037270', '1983-10-02'),
(2, 'Tarjeta de identidad', 1045483543, 'Santiago Andrés', 'Domínguez Charris', 'Calle 2 No 7-42', 'santiagodominguez2003@gmail.com', '3014474321', '2010-12-10'),
(3, 'Cédula', 107235, 'Pedro', 'Caballero', 'Calle 14 No 7-45', 'pedrocaballero@gmail.com', '32032', '1998-05-07'),
(4, 'Cédula', 1470, 'Samuel', 'Fontalvo', 'Calle 17 No 16-12', 'samuelfontalvo@gmail.com', '3005342230', '1970-05-04');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_producto`
--

CREATE TABLE `tb_producto` (
  `codigo_prod` int(3) NOT NULL,
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tb_producto`
--

INSERT INTO `tb_producto` (`codigo_prod`, `nombre`, `grupo_prod`, `tipo_prod`, `descripcion`, `valor_compra`, `valor_venta`, `porcentaje_comis`, `valor_comi`, `fecha`, `nomarchivo`, `ubicfoto`, `cod_parner`, `pos`) VALUES
(1, 'Vasos de plástico', 'Desechables', 'Desechables', '25 Unidades', 1500, 2000, 50, 1000, '2021-04-23', 'N/A', 'refresco.png', 'A7B4C1', 1),
(2, 'Servilletas', 'Desechables', 'Desechables', 'Paquete de 50 unidades', 2500, 3000, 10, 300, '2021-04-14', 'N/A', 'servilletas.jpg', 'A1B2C3', 2),
(3, 'Cucharas', 'Desechables', 'Desechables', '25 Unidades de plástico', 3000, 3500, 25, 8500, '2021-04-20', 'N/A', 'cuchara madera.jpg', 'A4B7C9', 2),
(4, 'Tenedores', 'Desechables', 'Herramientas', '25 Unidades de plástico', 2000, 2500, 10, 250, '2021-04-23', 'N/A', 'tenedor metal.png', 'A3B2C2', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_usuario`
--

CREATE TABLE `tb_usuario` (
  `id_usuario` double NOT NULL,
  `login_usuario` varchar(20) DEFAULT NULL,
  `password_usuario` varchar(10) NOT NULL,
  `nombre_usuario` varchar(20) NOT NULL,
  `apellido_usuario` varchar(20) NOT NULL,
  `identificacion` varchar(15) NOT NULL,
  `tipo_doc` varchar(20) NOT NULL,
  `telefono_u` varchar(15) NOT NULL,
  `id_perfil` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tb_usuario`
--

INSERT INTO `tb_usuario` (`id_usuario`, `login_usuario`, `password_usuario`, `nombre_usuario`, `apellido_usuario`, `identificacion`, `tipo_doc`, `telefono_u`, `id_perfil`) VALUES
(1, 'Deiner_DB', '1979', 'Deiner de Jesús', 'Domínguez Bolaño', '8498220', 'Cédula', '3016108858', 'Administrador'),
(2, 'Jesús_DC', '2004', 'Jesús Alberto', 'Domínguez Charris', '1044602481', 'Tarjeta de identidad', '3045344430', 'Administrador'),
(3, 'Elvia_Cris', '1983', 'Elvia Cristina', 'Charris Rúa', '22712446', 'Cédula', '3004037270', 'Cliente'),
(4, 'Santy', '2010', 'Santiago Andrés', 'Domínguez Charris', '1045483543', 'Tarjeta de identidad', '3014474321', 'Cliente'),
(5, 'Javier_RT', 'formar', 'Javier Antonio', 'Restrepo Tovar', '44570', 'Cédula', '3016', 'Administrador');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tb_clientes`
--
ALTER TABLE `tb_clientes`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indices de la tabla `tb_producto`
--
ALTER TABLE `tb_producto`
  ADD PRIMARY KEY (`codigo_prod`);

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
  MODIFY `id_cliente` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tb_producto`
--
ALTER TABLE `tb_producto`
  MODIFY `codigo_prod` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tb_usuario`
--
ALTER TABLE `tb_usuario`
  MODIFY `id_usuario` double NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
