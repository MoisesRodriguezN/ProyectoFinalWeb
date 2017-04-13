-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-04-2017 a las 14:04:27
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `hotel`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `codCliente` int(10) NOT NULL,
  `DNI` varchar(9) COLLATE utf8_bin NOT NULL,
  `nombre` varchar(30) COLLATE utf8_bin NOT NULL,
  `apellido1` varchar(60) COLLATE utf8_bin NOT NULL,
  `apellido2` varchar(60) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`codCliente`, `DNI`, `nombre`, `apellido1`, `apellido2`) VALUES
(2, '83659921B', 'Fernando', 'Nadal', 'Ceballos'),
(3, '88365772C', 'Rosario', 'Mengual', 'Maroto'),
(5, '23456758T', 'Juan Luis', 'Trillo', 'Carretero'),
(7, '34546123Y', 'Aurora', 'Luna', 'Del valle'),
(8, '43654745E', 'Raul', 'Quintas', 'Valdes'),
(10, '34567657U', 'Aurora', 'Luna', 'Marquez'),
(11, '32478907t', 'grabiel', 'calle', 'machuca'),
(13, '14346657R', 'Susana', 'Cortijo', 'Marquez'),
(14, '94567854J', 'moises', 'rodriguez', 'naranjo'),
(21, '43654746E', 'test4', 'test3', 'test2'),
(22, '26400975F', 'María', 'Mercedes', 'Montañez'),
(28, '47562958R', 'Laura', 'Aviva', 'Llamas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `habitacion`
--

CREATE TABLE `habitacion` (
  `codHabitacion` int(10) NOT NULL,
  `tipo` varchar(16) COLLATE utf8_bin NOT NULL,
  `capacidad` int(11) NOT NULL,
  `planta` int(1) NOT NULL,
  `tarifa` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `habitacion`
--

INSERT INTO `habitacion` (`codHabitacion`, `tipo`, `capacidad`, `planta`, `tarifa`) VALUES
(0, 'individual', 2, 3, 260),
(1, 'Individual', 1, 1, 62),
(2, 'Individual', 1, 1, 60),
(3, 'Individual', 1, 1, 50),
(4, 'Individual', 1, 0, 50),
(5, 'Individual', 1, 1, 50),
(6, 'Superior', 2, 2, 90),
(7, 'Superior', 2, 2, 90),
(8, 'Superior', 2, 2, 110),
(9, 'Superior', 2, 2, 110),
(10, 'Superior', 2, 2, 80),
(11, 'Superior', 2, 2, 80),
(12, 'superior', 2, 2, 120),
(13, 'Superior', 2, 2, 120),
(14, 'Superior', 2, 2, 80),
(15, 'Superior', 2, 2, 80),
(16, 'Individual', 1, 1, 60),
(17, 'Individual', 1, 1, 60),
(18, 'Individual', 1, 1, 60),
(19, 'Individual', 1, 1, 60),
(20, 'Individual', 1, 1, 60),
(35, 'test3', 2, 1, 88),
(40, 'individual', 2, 3, 260);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `login`
--

CREATE TABLE `login` (
  `usuario` varchar(25) COLLATE utf8_bin NOT NULL,
  `clave` varchar(25) COLLATE utf8_bin NOT NULL,
  `rol` varchar(25) COLLATE utf8_bin NOT NULL,
  `codCliente` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `login`
--

INSERT INTO `login` (`usuario`, `clave`, `rol`, `codCliente`) VALUES
('admin', 'admin', 'administrador', NULL),
('alicia', 'ali', 'usuario', NULL),
('emilia', 'simon', 'usuario', NULL),
('fernando', 'fernando', 'usuario', NULL),
('moi2', 'moi2', 'usuario', 14),
('moises', 'moises', 'administrador', NULL),
('susana', 'susana2', 'usuario', 13),
('tefr4y', 'efnerg', 'usuario', NULL),
('test', 'test', 'usuario', NULL),
('test2', 'test2', 'usuario', NULL),
('usuario1', 'usuario1', 'usuario', NULL),
('victor', 'victor2', 'usuario', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reserva`
--

CREATE TABLE `reserva` (
  `codHabitacion` int(10) NOT NULL,
  `codCliente` int(10) NOT NULL,
  `fechaEntrada` date NOT NULL,
  `fechaSalida` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `reserva`
--

INSERT INTO `reserva` (`codHabitacion`, `codCliente`, `fechaEntrada`, `fechaSalida`) VALUES
(1, 3, '2016-12-06', '2016-12-08'),
(1, 14, '2016-01-02', '2016-01-04'),
(1, 14, '2016-11-15', '2016-11-11'),
(1, 14, '2016-12-08', '2016-12-09'),
(2, 13, '2016-03-06', '2016-03-10'),
(2, 14, '2016-01-01', '2016-01-07'),
(2, 14, '2016-02-02', '2016-02-05'),
(3, 13, '2016-01-01', '2016-01-02'),
(4, 14, '2016-01-10', '2016-01-10'),
(4, 14, '2016-02-07', '2016-02-16'),
(5, 13, '2016-12-08', '2016-12-09'),
(6, 7, '2016-11-24', '2016-11-25'),
(10, 5, '2016-11-23', '2016-11-26'),
(10, 14, '2016-01-01', '2016-01-03'),
(10, 14, '2016-01-31', '2016-02-02'),
(11, 8, '2016-11-30', '2016-12-04'),
(11, 14, '2016-01-02', '2016-01-10'),
(12, 5, '2016-12-06', '2016-12-11'),
(12, 13, '2016-01-01', '2016-01-03'),
(12, 14, '2016-12-06', '2016-12-09'),
(14, 8, '2016-11-20', '2016-11-26'),
(14, 10, '2016-12-06', '2016-12-08'),
(16, 14, '2016-11-28', '2016-12-02'),
(17, 13, '2016-01-02', '2016-01-04'),
(17, 14, '2016-12-06', '2016-12-08'),
(18, 14, '2016-12-08', '2016-12-09'),
(19, 13, '2016-12-06', '2016-12-08');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`codCliente`);

--
-- Indices de la tabla `habitacion`
--
ALTER TABLE `habitacion`
  ADD PRIMARY KEY (`codHabitacion`);

--
-- Indices de la tabla `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`usuario`),
  ADD KEY `codCliente` (`codCliente`);

--
-- Indices de la tabla `reserva`
--
ALTER TABLE `reserva`
  ADD PRIMARY KEY (`codHabitacion`,`codCliente`,`fechaEntrada`),
  ADD KEY `codCliente` (`codCliente`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `codCliente` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `login_ibfk_1` FOREIGN KEY (`codCliente`) REFERENCES `cliente` (`codCliente`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `reserva`
--
ALTER TABLE `reserva`
  ADD CONSTRAINT `reserva_ibfk_1` FOREIGN KEY (`codHabitacion`) REFERENCES `habitacion` (`codHabitacion`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reserva_ibfk_2` FOREIGN KEY (`codCliente`) REFERENCES `cliente` (`codCliente`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
