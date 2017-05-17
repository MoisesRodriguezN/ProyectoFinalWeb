
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

CREATE TABLE `cliente` (
  `codCliente` int(10) NOT NULL,
  `DNI` varchar(9) COLLATE utf8_bin NOT NULL,
  `nombre` varchar(30) COLLATE utf8_bin NOT NULL,
  `apellido1` varchar(60) COLLATE utf8_bin NOT NULL,
  `apellido2` varchar(60) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

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
(23, '77889912Y', 'Mariana', 'Velena', 'Lorez'),
(24, '45treg', 'gfhbhg', 'gfhgg', 'gfhg'),
(25, '11112234U', 'Manuela', 'Picardo', 'Nardo');


CREATE TABLE `habitacion` (
  `codHabitacion` int(10) NOT NULL,
  `tipo` varchar(16) COLLATE utf8_bin NOT NULL,
  `capacidad` int(11) NOT NULL,
  `planta` int(1) NOT NULL,
  `tarifa` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;


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

CREATE TABLE `login` (
  `usuario` varchar(25) COLLATE utf8_bin NOT NULL,
  `clave` varchar(25) COLLATE utf8_bin NOT NULL,
  `rol` varchar(25) COLLATE utf8_bin NOT NULL,
  `codCliente` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;


INSERT INTO `login` (`usuario`, `clave`, `rol`, `codCliente`) VALUES
('admin', 'admin', 'administrador', NULL),
('alicia', 'ali', 'usuario', NULL),
('emilia', 'simon', 'usuario', NULL),
('fernando', 'fernando', 'usuario', NULL),
('manuela', 'manuela2', 'usuario', 25),
('moi2', 'moi222', 'usuario', 14),
('moises', 'moises', 'administrador', NULL),
('susana', 'susana2', 'usuario', 13),
('tefr4y', 'efnerg', 'usuario', NULL),
('test', 'test', 'usuario', NULL),
('test2', 'test2', 'usuario', NULL),
('usuario1', 'usuario1', 'usuario', NULL),
('victor', 'victor2', 'usuario', NULL);


CREATE TABLE `reserva` (
  `codHabitacion` int(10) NOT NULL,
  `codCliente` int(10) NOT NULL,
  `fechaEntrada` date NOT NULL,
  `fechaSalida` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;


INSERT INTO `reserva` (`codHabitacion`, `codCliente`, `fechaEntrada`, `fechaSalida`) VALUES
(1, 2, '2017-04-01', '2017-04-22'),
(1, 2, '2017-04-10', '2017-04-26'),
(1, 7, '2017-04-15', '2017-04-16'),
(1, 11, '2017-04-18', '2017-04-20'),
(8, 7, '2017-04-19', '2017-04-20'),
(9, 14, '2017-05-13', '2017-05-20'),
(12, 21, '2017-04-02', '2017-04-30'),
(17, 11, '2017-04-14', '2017-04-15'),
(25, 14, '2017-05-07', '2017-05-14');

ALTER TABLE `cliente`
  ADD PRIMARY KEY (`codCliente`);


ALTER TABLE `habitacion`
  ADD PRIMARY KEY (`codHabitacion`);


ALTER TABLE `login`
  ADD PRIMARY KEY (`usuario`),
  ADD KEY `codCliente` (`codCliente`);

ALTER TABLE `reserva`
  ADD PRIMARY KEY (`codHabitacion`,`codCliente`,`fechaEntrada`),
  ADD KEY `codCliente` (`codCliente`);


ALTER TABLE `cliente`
  MODIFY `codCliente` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

ALTER TABLE `habitacion`
  MODIFY `codHabitacion` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;



ALTER TABLE `login`
  ADD CONSTRAINT `login_ibfk_1` FOREIGN KEY (`codCliente`) REFERENCES `cliente` (`codCliente`) ON DELETE CASCADE ON UPDATE CASCADE;


ALTER TABLE `reserva`
  ADD CONSTRAINT `reserva_ibfk_2` FOREIGN KEY (`codCliente`) REFERENCES `cliente` (`codCliente`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reserva_ibfk_3` FOREIGN KEY (`codHabitacion`) REFERENCES `habitacion` (`codHabitacion`) ON DELETE CASCADE ON UPDATE CASCADE;

