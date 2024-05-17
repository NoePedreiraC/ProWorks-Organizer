/*
PASAR DEPARTAMENTO, TRABAJADORES y TRABAJOS CON CAMPOS EJEMPLO.
*/

-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 12-04-2024 a las 12:05:47
-- Versión del servidor: 8.2.0
-- Versión de PHP: 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `local`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamento`
--

DROP TABLE IF EXISTS `departamento`;
CREATE TABLE IF NOT EXISTS `departamento` (
  `IdDept` int NOT NULL AUTO_INCREMENT,
  `NombreDept` varchar(255) COLLATE utf8mb3_spanish_ci NOT NULL,
  `NivelPrivDept` int NOT NULL,
  `OrdenApartDept` int NOT NULL,
  PRIMARY KEY (`IdDept`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;

--
-- Volcado de datos para la tabla `departamento`
--

INSERT INTO `departamento` (`IdDept`, `NombreDept`, `NivelPrivDept`, `OrdenApartDept`) VALUES
(1, 'Nombre1', 1, 1),
(2, 'NombreM', 9, 9),
(3, 'Nombre3', 3, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `maquina`
--

DROP TABLE IF EXISTS `maquina`;
CREATE TABLE IF NOT EXISTS `maquina` (
  `IdMaquina` int NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(255) COLLATE utf8mb3_spanish_ci NOT NULL,
  `Marca` varchar(255) COLLATE utf8mb3_spanish_ci NOT NULL,
  `Modelo` varchar(255) COLLATE utf8mb3_spanish_ci DEFAULT NULL,
  `IdDepartamento` int DEFAULT NULL,
  PRIMARY KEY (`IdMaquina`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;

--
-- Volcado de datos para la tabla `maquina`
--

INSERT INTO `maquina` (`IdMaquina`, `Nombre`, `Marca`, `Modelo`, `IdDepartamento`) VALUES
(6, 'ds', 'ds', 'ds', 3),
(2, 'Nombre2', 'Marca2', 'Modelo2', 2),
(3, 'Nombre3', 'Marca3', 'Modelo3', 3),
(4, 'NombreM', 'MarcaM', 'ModeloM', 2),
(5, 'Nombre5', 'Marca5', 'Modelo5', 3),
(7, 'a', 'a', NULL, NULL),
(8, 'ew', 'ew', NULL, NULL),
(9, '22', '22', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `material`
--

DROP TABLE IF EXISTS `material`;
CREATE TABLE IF NOT EXISTS `material` (
  `IdMaterial` int NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(255) COLLATE utf8mb3_spanish_ci NOT NULL,
  `TipoMaterial` varchar(255) COLLATE utf8mb3_spanish_ci NOT NULL,
  PRIMARY KEY (`IdMaterial`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;

--
-- Volcado de datos para la tabla `material`
--

INSERT INTO `material` (`IdMaterial`, `Nombre`, `TipoMaterial`) VALUES
(1, 'Nombre1', 'Material1'),
(2, 'NombreM', 'MaterialM'),
(3, 'Nombre3', 'Material3'),
(5, 'geg', 'dgdg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro_pausa`
--

DROP TABLE IF EXISTS `registro_pausa`;
CREATE TABLE IF NOT EXISTS `registro_pausa` (
  `IdPausa` int NOT NULL AUTO_INCREMENT,
  `IdTarea` int NOT NULL,
  `InicioPausa` datetime NOT NULL,
  `FinPausa` datetime DEFAULT NULL,
  PRIMARY KEY (`IdPausa`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;

--
-- Volcado de datos para la tabla `registro_pausa`
--

INSERT INTO `registro_pausa` (`IdPausa`, `IdTarea`, `InicioPausa`, `FinPausa`) VALUES
(1, 1, '2024-04-02 09:25:10', '2024-04-03 07:30:10'),
(2, 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 2, '2008-11-11 13:23:00', '2008-11-11 13:23:00'),
(5, 3, '2024-04-09 00:00:00', '2024-04-18 00:00:00'),
(6, 33, '2024-04-04 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tarea`
--

DROP TABLE IF EXISTS `tarea`;
CREATE TABLE IF NOT EXISTS `tarea` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `IdTrabajo` int NOT NULL,
  `IdPadre` int DEFAULT NULL,
  `IdDepartamento` int NOT NULL,
  `RutaArchivo` varchar(255) COLLATE utf8mb3_spanish_ci DEFAULT NULL,
  `Nombre` varchar(255) COLLATE utf8mb3_spanish_ci NOT NULL,
  `Unidades` int NOT NULL,
  `Cadena` varchar(255) COLLATE utf8mb3_spanish_ci NOT NULL,
  `Clientes` varchar(255) COLLATE utf8mb3_spanish_ci NOT NULL,
  `Concepto` text COLLATE utf8mb3_spanish_ci,
  `FechaCreacion` datetime DEFAULT NULL,
  `FechaInicio` datetime DEFAULT NULL,
  `FechaFin` datetime DEFAULT NULL,
  `TiempoExtra` int DEFAULT NULL,
  `Observaciones` text COLLATE utf8mb3_spanish_ci,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;

--
-- Volcado de datos para la tabla `tarea`
--

INSERT INTO `tarea` (`Id`, `IdTrabajo`, `IdPadre`, `IdDepartamento`, `RutaArchivo`, `Nombre`, `Unidades`, `Cadena`, `Clientes`, `Concepto`, `FechaCreacion`, `FechaInicio`, `FechaFin`, `TiempoExtra`, `Observaciones`) VALUES
(18, 0, 4, 4, 'werw', 'rwer', 43, 'rwer', 'wrew', 'wrwr', '2024-04-02 00:00:00', '2024-04-05 00:00:00', '2024-04-17 00:00:00', 33, 'ewrwerer'),
(17, 0, 2, 2, 'qwe', 'weqe', 33, 'qweq', 'eqwq', 'eqweq', '2024-04-03 00:00:00', '2024-04-05 00:00:00', '2024-04-18 00:00:00', 23, 'qweqw'),
(16, 0, 5, 5, 'RutaArchivo5', 'Nombre5', 5, 'Cadena5', 'Clientes5', 'Concepto5', '2024-04-02 09:25:00', '2024-04-02 09:25:00', '2024-04-03 07:30:00', 20, 'Observaciones5'),
(15, 0, 4, 4, 'RutaArchivo4', 'Nombre4', 4, 'Cadena4', 'Clientes4', 'Concepto4', '2024-04-02 09:25:00', '2024-04-02 09:25:00', '2024-04-03 07:30:00', 40, 'Observaciones4'),
(14, 0, 3, 3, 'RutaArchivo3', 'Nombre3', 3, 'Cadena3', 'Clientes3', 'Concepto3', '2024-03-02 09:25:00', '2024-03-02 09:25:00', '2024-03-03 07:30:00', 23, 'Observaciones3'),
(12, 0, 1, 1, 'RutaArchivo1', 'Nombre1', 1, 'Cadena1', 'Clientes1', 'Concepto1', '2024-04-02 09:25:00', '2024-04-02 09:25:00', '2024-04-03 07:30:00', 20, 'Observaciones1'),
(13, 0, 2, 2, 'RutaArchivo2', 'Nombre2', 2, 'Cadena2', 'Clientes2', 'Concepto2', '2024-02-02 09:25:00', '2024-02-02 09:25:00', '2024-02-03 07:30:00', 2, 'Observaciones2'),
(19, 0, 33, 33, '33', '33', 33, '33', '33', '33', NULL, NULL, NULL, 33, '33'),
(20, 0, 11, 11, '11', '11', 11, '11', '11', '11', '2024-04-10 00:00:00', '2024-04-11 00:00:00', '2024-04-12 00:00:00', 11, '11'),
(21, 0, 22, 22, '22', '22', 22, '22', '22', '22', NULL, NULL, NULL, 22, '22'),
(22, 1, 1, 1, '1', '1', 1, '1', '1', '1', NULL, NULL, NULL, 1, '1'),
(23, 3, 3, 3, '3', '55', 55, '55', '55', '55', NULL, NULL, NULL, NULL, '55'),
(24, 3, 3, 3, '3', '99', 99, '99', '99', '99', '2024-04-10 00:00:00', '2024-04-11 00:00:00', '2024-04-12 00:00:00', 99, '99'),
(25, 3, 3, 3, '3', '00', 0, '00', '00', '00', NULL, NULL, NULL, 0, '00'),
(26, 3, 3, 3, '3', '00', 0, '00', '00', '00', NULL, NULL, NULL, 0, '00'),
(27, 3, 3, 3, '3', 'ee', 21, '21', '21', '12', NULL, NULL, NULL, 12, '12'),
(28, 3, 3, 3, '3', 'ee', 3, 'rwerr', 'rwerr', 'rwerr', NULL, NULL, NULL, 23, 'rwerr'),
(30, 3, 3, 3, '3', 'Pepe', 33, 'ee', 'ee', 'ee', '2024-04-11 00:00:00', '2024-04-12 00:00:00', '2024-04-15 00:00:00', 30, 'eee'),
(32, 3, 3, 3, '3', 'ee', 33, 'rewre', 'rewrwr', 'rewrer', '2024-04-15 00:00:00', '2024-04-16 00:00:00', '2024-04-17 00:00:00', 34, 'sdfsf'),
(34, 3, 3, 3, 'RutaArchivo3', 'ee', 22, 'ds', 'ds', 'ds', NULL, NULL, NULL, 33, 'vv');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tareatrabajadores`
--

DROP TABLE IF EXISTS `tarea_trabajadores`;
CREATE TABLE IF NOT EXISTS `tarea_trabajadores` (
  `IdTarea` int DEFAULT NULL,
  `IdTrabajador` int DEFAULT NULL,
  `InicioTareaTrabajador` datetime NOT NULL,
  `FinTareaTrabajador` datetime NOT NULL,
  `TiempoExtra` int NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;

--
-- Volcado de datos para la tabla `tareatrabajadores`
--

INSERT INTO `tarea_trabajadores` (`IdTarea`, `IdTrabajador`, `InicioTareaTrabajador`, `FinTareaTrabajador`, `TiempoExtra`) VALUES
(1, 1, '2022-04-02 09:00:00', '2022-04-02 17:00:00', 0),
(2, 2, '2022-04-02 10:10:00', '2022-04-02 10:20:00', 5),
(3, 3, '2022-04-02 11:11:00', '2022-04-02 11:30:00', 15);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tarea_material`
--

DROP TABLE IF EXISTS `tarea_material`;
CREATE TABLE IF NOT EXISTS `tarea_material` (
  `IdTareaMaterial` int NOT NULL AUTO_INCREMENT,
  `IdTarea` int NOT NULL,
  `IdMaterial` int NOT NULL,
  `MaterialPrevisto` float DEFAULT NULL,
  `MaterialUtilizado` float DEFAULT NULL,
  `Comentario` text CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci,
  PRIMARY KEY (`IdTareaMaterial`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;

--
-- Volcado de datos para la tabla `tarea_material`
--

INSERT INTO `tarea_material` (`IdTareaMaterial`, `IdTarea`, `IdMaterial`, `MaterialPrevisto`, `MaterialUtilizado`, `Comentario`) VALUES
(1, 0, 1, 20, 20.5, 'Comentario1'),
(2, 6, 6, 10, 10.5, 'ComentarioM'),
(3, 0, 3, 23, 24, 'Comentario3'),
(5, 33, 33, NULL, NULL, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
