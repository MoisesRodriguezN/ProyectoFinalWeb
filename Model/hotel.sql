-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-12-2018 a las 16:25:22
-- Versión del servidor: 10.1.37-MariaDB
-- Versión de PHP: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

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
(21, '43654746E', 'test4', 'test3', 'test2'),
(22, '26400975F', 'María', 'Mercedes', 'Montañez'),
(23, '77889912Y', 'Mariana', 'Velena', 'Lorez'),
(24, '45treg', 'gfhbhg', 'gfhgg', 'gfhg'),
(25, '11112234U', 'Manuela', 'Picardo', 'Nardo'),
(26, '99967755B', 'Moisés', 'Rodríguez', 'Sánchez');

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `habitacion`
--

INSERT INTO `habitacion` (`codHabitacion`, `tipo`, `capacidad`, `planta`, `tarifa`) VALUES
(1, 'Individual', 1, 1, 50),
(2, 'Individual', 1, 1, 50),
(3, 'Individual', 1, 1, 50),
(4, 'Individual', 1, 1, 50),
(5, 'Individual', 1, 1, 50),
(6, 'Individual', 1, 1, 50),
(7, 'Individual', 2, 1, 70),
(8, 'Individual', 2, 1, 70),
(9, 'Individual', 2, 1, 70),
(10, 'Individual', 2, 1, 70),
(11, 'Individual', 2, 2, 100),
(12, 'Individual', 2, 2, 100),
(13, 'Individual', 2, 2, 100),
(14, 'Individual', 2, 2, 100),
(15, 'Doble', 3, 2, 150),
(16, 'Doble', 3, 2, 150),
(17, 'Doble', 3, 2, 150),
(18, 'Doble', 3, 2, 150),
(19, 'Doble', 3, 2, 150),
(20, 'Doble', 4, 2, 180),
(21, 'Doble', 4, 3, 220),
(22, 'Doble', 4, 3, 220),
(23, 'Doble', 2, 2, 80),
(24, 'Doble', 2, 2, 80),
(25, 'Doble', 2, 2, 80),
(26, 'Test', 1, 2, 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagen`
--

CREATE TABLE `imagen` (
  `codImagen` tinytext COLLATE utf8_bin NOT NULL,
  `ruta` tinytext COLLATE utf8_bin NOT NULL,
  `nombre` tinytext COLLATE utf8_bin NOT NULL,
  `estado` tinytext COLLATE utf8_bin
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `imagen`
--

INSERT INTO `imagen` (`codImagen`, `ruta`, `nombre`, `estado`) VALUES
('logoHotel', '../../View/img/uploads/logoHotelHeader.jpg', 'logoHotelHeader.jpg', NULL),
('img1Galeria', '../../View/img/uploads/img1Galeria.jpg', 'img1Galeria.jpg', NULL),
('img2Galeria', '../../View/img/uploads/img2Galeria.jpg', 'img2Galeria.jpg', NULL),
('img3Galeria', '../../View/img/uploads/img3Galeria.jpg', 'img3Galeria.jpg', NULL),
('img4Galeria', '../../View/img/uploads/img4Galeria.jpg', 'img4Galeria.jpg', NULL),
('img5Galeria', '../../View/img/uploads/img5Galeria.jpg', 'img5Galeria.jpg', NULL),
('imgLoginGenForm', '../../View/img/uploads/imgLoginGenForm.jpg', 'imgLoginGenForm.jpg', NULL),
('imgCabeceraGenForm', '../../View/img/uploads/imgCabeceraGenForm.jpg', 'imgCabeceraGenForm.jpg', NULL),
('facebook', 'https://www.facebook.com/', '', 'habilitado'),
('googlePlus', 'https://plus.google.com', '', 'habilitado'),
('instagram', 'https://www.instagram.com/?hl=es', '', 'habilitado'),
('twitter', 'https://twitter.com/', '', 'habilitado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `login`
--

CREATE TABLE `login` (
  `usuario` varchar(25) COLLATE utf8_bin NOT NULL,
  `clave` varchar(25) COLLATE utf8_bin NOT NULL,
  `rol` varchar(25) COLLATE utf8_bin NOT NULL,
  `codCliente` int(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `login`
--

INSERT INTO `login` (`usuario`, `clave`, `rol`, `codCliente`) VALUES
('alicia', 'ali', 'usuario', NULL),
('emilia', 'simon', 'usuario', NULL),
('fernando', 'fernando', 'usuario', NULL),
('mSanchez', '123456', 'usuario', 26),
('manuela', 'manuela2', 'usuario', 25),
('moi2', 'moi222', 'usuario', 14),
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `reserva`
--

INSERT INTO `reserva` (`codHabitacion`, `codCliente`, `fechaEntrada`, `fechaSalida`) VALUES
(1, 2, '2017-04-01', '2017-04-22'),
(1, 2, '2017-04-10', '2017-04-26'),
(1, 7, '2017-04-15', '2017-04-16'),
(1, 11, '2017-04-18', '2017-04-20'),
(1, 14, '2017-05-22', '2017-05-24'),
(6, 25, '2017-06-10', '2017-06-12'),
(7, 14, '2017-05-17', '2017-05-31'),
(7, 25, '2017-06-10', '2017-06-12'),
(8, 7, '2017-04-19', '2017-04-20'),
(8, 25, '2017-06-08', '2017-06-10'),
(9, 14, '2017-05-13', '2017-05-20'),
(9, 14, '2017-05-17', '2017-05-18'),
(9, 25, '2017-06-08', '2017-06-10'),
(10, 25, '2017-06-10', '2017-06-12'),
(12, 14, '2017-05-17', '2017-05-18'),
(12, 21, '2017-04-02', '2017-04-30'),
(12, 25, '2017-06-08', '2017-06-10'),
(12, 26, '2017-05-25', '2017-05-26'),
(13, 14, '2017-05-17', '2017-05-19'),
(13, 25, '2017-06-08', '2017-06-10'),
(14, 14, '2017-05-18', '2017-05-19'),
(17, 11, '2017-04-14', '2017-04-15'),
(24, 14, '2017-05-21', '2017-05-25'),
(25, 14, '2017-05-07', '2017-05-14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `texto`
--

CREATE TABLE `texto` (
  `servicios` text COLLATE utf8_spanish_ci NOT NULL,
  `comedor` text COLLATE utf8_spanish_ci NOT NULL,
  `habIndividual` text COLLATE utf8_spanish_ci NOT NULL,
  `habDoble` text COLLATE utf8_spanish_ci NOT NULL,
  `nombreHotel` tinytext COLLATE utf8_spanish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `texto`
--

INSERT INTO `texto` (`servicios`, `comedor`, `habIndividual`, `habDoble`, `nombreHotel`) VALUES
('<p><img style=\"float: left; margin: 0px 10px;\" src=\"/View/img/uploads/restaurante11.jpg\" width=\"233\" height=\"233\" />Descubre los innumerables detalles que nos diferencian de otros hoteles de lujo de Barcelona. Degusta la alta cocina del Restaurante Barcelonas y tonif&iacute;cate con los tratamientos de belleza de nuestro Spa by L\'Occitane. Organiza tus eventos especiales en nuestras modernas salas de reuni&oacute;n con la ayuda de nuestros expertos profesionales.</p>\r\n<p>Probando. ajax compatible.</p>', '<p><img style=\"float: left; margin: 0px 10px;\" src=\"/View/img/uploads/comedor21.jpg\" width=\"233\" height=\"155\" />El comedor, con magn&iacute;ficas vistas, ofrece cocina nacional e internacional&nbsp; y una amplia variedad de especialidades canarias que podr&aacute;s degustar una vez por semana. El hotel dispone de cafeter&iacute;a, restaurante buffet de oferta variada, cocina en vivo y dos bares, uno interior y otro en la piscina. Se requiere pantal&oacute;n largo para cenar en el restaurante.</p>', '<p><img style=\"float: left; margin: 0px 10px;\" src=\"/View/img/uploads/tipoHab13.jpg\" width=\"223\" height=\"167\" />Habitaciones individuales, ideales para viajes de negocios o de relax. Dispone de todo lo necesario para descansar despu&eacute;s de un d&iacute;a intenso. Capacidad m&aacute;xima: una persona. Descubra estas habitaciones modernas y funcionales, ideales para viajes de negocios o de relax. Puede elegir si quiere un dormitorio con vistas a la Rambla de Santa Cruz o bien si lo prefiere con vistas interiores para una mayor tranquilidad. Dispone de todas las comodidades para pasar una estancia inolvidable.</p>', '<p><img style=\"float: left; margin: 0px 10px;\" src=\"/View/img/uploads/tipoHab24.jpg\" width=\"223\" height=\"167\" />Disfrute de estas maravillosas habitaciones completamente equipadas de 20m2 con todo lo necesario para que su estancia sea perfecta. Todas ellas est&aacute;n totalmente insonorizadas para que pueda disponer del m&aacute;ximo confort y descanso. Adem&aacute;s, puede solicitar habitaciones comunicadas si lo desea. Disfrute de la magn&iacute;fica luz de Santa Cruz en nuestras confortables habitaciones de 20m2 decoradas con un estilo moderno y minimalista. Desde su balc&oacute;n o terraza, podr&aacute; contemplar la Rambla principal o la uni&oacute;n de la ciudad con el mar.</p>', 'Hotel Fuente Alegre');

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
  MODIFY `codCliente` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `habitacion`
--
ALTER TABLE `habitacion`
  MODIFY `codHabitacion` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
