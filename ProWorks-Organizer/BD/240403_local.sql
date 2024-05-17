-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 03-04-2024 a las 12:55:48
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;

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
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;

--
-- Volcado de datos para la tabla `maquina`
--

INSERT INTO `maquina` (`IdMaquina`, `Nombre`, `Marca`, `Modelo`, `IdDepartamento`) VALUES
(2, 'Nombre2', 'Marca2', 'Modelo2', 2),
(3, 'Nombre3', 'Marca3', 'Modelo3', 3),
(4, 'NombreM', 'MarcaM', 'ModeloM', 2),
(5, 'Nombre5', 'Marca5', 'Modelo5', 3);

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;

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
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;

--
-- Volcado de datos para la tabla `registro_pausa`
--

INSERT INTO `registro_pausa` (`IdPausa`, `IdTarea`, `InicioPausa`, `FinPausa`) VALUES
(1, 1, '2024-04-02 09:25:10', '2024-04-03 07:30:10'),
(2, 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tarea`
--

DROP TABLE IF EXISTS `tarea`;
CREATE TABLE IF NOT EXISTS `tarea` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `IdPadre` int NOT NULL,
  `IdDepartamento` int NOT NULL,
  `RutaArchivo` varchar(255) COLLATE utf8mb3_spanish_ci DEFAULT NULL,
  `Nombre` varchar(255) COLLATE utf8mb3_spanish_ci NOT NULL,
  `Unidades` int DEFAULT NULL,
  `Cadena` varchar(255) COLLATE utf8mb3_spanish_ci NOT NULL,
  `Clientes` varchar(255) COLLATE utf8mb3_spanish_ci NOT NULL,
  `Concepto` text COLLATE utf8mb3_spanish_ci,
  `FechaInicio` datetime NOT NULL,
  `FechaFin` datetime DEFAULT NULL,
  `TiempoExtra` int DEFAULT NULL,
  `Observaciones` text COLLATE utf8mb3_spanish_ci,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;

--
-- Volcado de datos para la tabla `tarea`
--

INSERT INTO `tarea` (`Id`, `IdPadre`, `IdDepartamento`, `RutaArchivo`, `Nombre`, `Unidades`, `Cadena`, `Clientes`, `Concepto`, `FechaInicio`, `FechaFin`, `TiempoExtra`, `Observaciones`) VALUES
(2, 2, 2, 'RutaArchivo2', 'Nombre2', 2, 'Cadena2', 'Clientes2', 'Concepto2', '2024-02-02 09:25:10', '2024-02-03 07:30:10', 2, 'Observaciones2'),
(3, 3, 3, 'RutaArchivo3', 'Nombre3', 3, 'Cadena3', 'Clientes3', 'Concepto3', '2024-03-02 09:25:10', '2024-03-03 07:30:10', 23, 'Observaciones3'),
(4, 6, 6, 'ArchivoM', 'NombreM', 6, 'CadenaM', 'ClienteM', 'ConceptoM', '2022-04-02 09:09:09', '2022-05-02 10:10:10', 14, 'ObservacionM'),
(5, 5, 5, 'RutaArchivo5', 'Nombre5', 5, 'Cadena5', 'Clientes5', 'Concepto5', '2024-04-02 09:25:10', '2024-04-03 07:30:10', 20, 'Observaciones5');

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
  `Comentario` text COLLATE utf8mb3_spanish_ci NOT NULL,
  PRIMARY KEY (`IdTareaMaterial`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;

--
-- Volcado de datos para la tabla `tarea_material`
--

INSERT INTO `tarea_material` (`IdTareaMaterial`, `IdTarea`, `IdMaterial`, `MaterialPrevisto`, `MaterialUtilizado`, `Comentario`) VALUES
(1, 0, 1, 20, 20.5, 'Comentario1'),
(2, 6, 6, 10, 10.5, 'ComentarioM'),
(3, 0, 3, 23, 24, 'Comentario3');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
