-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-11-2020 a las 17:16:29
-- Versión del servidor: 10.4.6-MariaDB
-- Versión de PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_cursa`
--
CREATE DATABASE 'bd_cursa';
USE 'bd_cursa';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_categoria`
--

CREATE TABLE `tbl_categoria` (
  `id_categoria` int(9) NOT NULL,
  `nom_categoria` enum('Infantil (8-12)','Junior (13-17)','Senior (18-35)','Veterano (Mayor 35)','Discapacitado') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_categoria`
--

INSERT INTO `tbl_categoria` (`id_categoria`, `nom_categoria`) VALUES
(1, 'Infantil (8-12)'),
(2, 'Junior (13-17)'),
(3, 'Senior (18-35)'),
(4, 'Veterano (Mayor 35)'),
(5, 'Discapacitado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_inscripcion`
--

CREATE TABLE `tbl_inscripcion` (
  `ins_dorsal` int(3) NOT NULL,
  `fecha_ins` date NOT NULL,
  `pagadoSINO` enum('SI','NO') DEFAULT NULL,
  `precio_ins` decimal(3,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_inscripcion`
--

INSERT INTO `tbl_inscripcion` (`ins_dorsal`, `fecha_ins`, `pagadoSINO`, `precio_ins`) VALUES
(82, '2020-11-23', NULL, NULL),
(154, '2020-11-27', NULL, NULL),
(201, '2020-11-11', NULL, NULL),
(210, '2020-11-16', NULL, NULL),
(287, '2020-11-12', NULL, NULL),
(294, '2020-11-12', NULL, NULL),
(317, '2020-11-11', NULL, NULL),
(370, '2020-11-16', NULL, NULL),
(406, '2020-11-23', NULL, NULL),
(410, '2020-11-11', NULL, NULL),
(423, '2020-11-11', NULL, NULL),
(469, '2020-11-16', NULL, NULL),
(481, '2020-11-11', NULL, NULL),
(555, '2020-11-11', NULL, NULL),
(636, '2020-11-27', NULL, NULL),
(670, '2020-11-16', NULL, NULL),
(761, '2020-11-12', NULL, NULL),
(762, '2020-11-27', NULL, NULL),
(851, '2020-11-23', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_participante`
--

CREATE TABLE `tbl_participante` (
  `DNI_parti` char(9) NOT NULL,
  `nom_parti` varchar(30) NOT NULL,
  `apellido_parti` varchar(20) NOT NULL,
  `apellido2_parti` varchar(20) NOT NULL,
  `fecha_naix` date NOT NULL,
  `genero_parti` enum('Hombre','Mujer') NOT NULL,
  `email_parti` varchar(255) NOT NULL,
  `id_categoria` int(9) NOT NULL,
  `dorsal` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_participante`
--

INSERT INTO `tbl_participante` (`DNI_parti`, `nom_parti`, `apellido_parti`, `apellido2_parti`, `fecha_naix`, `genero_parti`, `email_parti`, `id_categoria`, `dorsal`) VALUES
('08482150A', 'Xabo', 'XABo', 'Xabo', '2010-03-27', 'Mujer', 'xavier@xavier.com', 1, 762),
('25869173S', 'camarero', 'camarero1', 'Sanchez', '2020-10-28', 'Hombre', 'carlos@carlos.com', 1, 82),
('51288755C', 'carlos', 'Mirabal', 'Salazar', '2020-10-28', 'Mujer', 'carlos@carlos.com', 2, 851),
('58312418N', 'David', 'Juan', 'Gordo', '1982-07-27', 'Mujer', 'david@gordo.com', 4, 636),
('58494110G', 'Alberto', 'Luis', 'Sanchez', '2020-10-29', 'Hombre', 'carlos@carlos.com', 1, 406);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbl_categoria`
--
ALTER TABLE `tbl_categoria`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `tbl_inscripcion`
--
ALTER TABLE `tbl_inscripcion`
  ADD PRIMARY KEY (`ins_dorsal`);

--
-- Indices de la tabla `tbl_participante`
--
ALTER TABLE `tbl_participante`
  ADD PRIMARY KEY (`DNI_parti`),
  ADD KEY `fk_participante_categoria` (`id_categoria`),
  ADD KEY `fk_participante_inscripcion` (`dorsal`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbl_categoria`
--
ALTER TABLE `tbl_categoria`
  MODIFY `id_categoria` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tbl_inscripcion`
--
ALTER TABLE `tbl_inscripcion`
  MODIFY `ins_dorsal` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=996;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tbl_participante`
--
ALTER TABLE `tbl_participante`
  ADD CONSTRAINT `fk_participante_categoria` FOREIGN KEY (`id_categoria`) REFERENCES `tbl_categoria` (`id_categoria`),
  ADD CONSTRAINT `fk_participante_inscripcion` FOREIGN KEY (`dorsal`) REFERENCES `tbl_inscripcion` (`ins_dorsal`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
