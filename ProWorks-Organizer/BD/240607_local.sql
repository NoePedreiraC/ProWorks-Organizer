-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 06-06-2024 a las 19:18:03
-- Versión del servidor: 8.0.31
-- Versión de PHP: 8.2.18

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
  `idDept` int NOT NULL AUTO_INCREMENT,
  `nombreDept` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `nivelPrivDept` int NOT NULL,
  `ordenApartDept` int NOT NULL,
  PRIMARY KEY (`idDept`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;

--
-- Volcado de datos para la tabla `departamento`
--

INSERT INTO `departamento` (`idDept`, `nombreDept`, `nivelPrivDept`, `ordenApartDept`) VALUES
(5, 'Nombre1', 1, 1),
(6, 'Nombre2', 2, 3),
(7, 'Nombre3', 3, 4),
(8, 'Nombre4', 4, 6),
(9, 'dsa', 5, 2),
(10, '', 5, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamento_trabajador`
--

DROP TABLE IF EXISTS `departamento_trabajador`;
CREATE TABLE IF NOT EXISTS `departamento_trabajador` (
  `idDepaTraba` int NOT NULL AUTO_INCREMENT,
  `idDepartamento_DepaTraba` int NOT NULL,
  `idTrabajador_DepaTraba` int NOT NULL,
  PRIMARY KEY (`idDepaTraba`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;

--
-- Volcado de datos para la tabla `departamento_trabajador`
--

INSERT INTO `departamento_trabajador` (`idDepaTraba`, `idDepartamento_DepaTraba`, `idTrabajador_DepaTraba`) VALUES
(2, 1, 1),
(4, 4, 4),
(5, 2, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `maquina`
--

DROP TABLE IF EXISTS `maquina`;
CREATE TABLE IF NOT EXISTS `maquina` (
  `idMaquina` int NOT NULL AUTO_INCREMENT,
  `idDepartamentoMaquina` int DEFAULT NULL,
  `nombreMaquina` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `marcaMaquina` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `modeloMaquina` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  PRIMARY KEY (`idMaquina`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;

--
-- Volcado de datos para la tabla `maquina`
--

INSERT INTO `maquina` (`idMaquina`, `idDepartamentoMaquina`, `nombreMaquina`, `marcaMaquina`, `modeloMaquina`) VALUES
(10, 1, 'Nombre1', 'Marca1', 'Modelo1'),
(11, 2, 'NombreM', 'MarcaM', 'ModeloM'),
(12, 3, 'Nombre3', 'Marca3', 'Modelo3'),
(13, 4, 'Nombre4', 'Marca4', 'Modelo4'),
(14, 3, 'Nombre5', 'Marca5', 'Modelo5'),
(15, 3, 'maquina1', 'MIMAKI ', 'CJV150-75'),
(16, 2, 'a', 'a', 'a'),
(17, 1, 'Maquina2', 'VEVOR ', 'CA 85-264V');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `material`
--

DROP TABLE IF EXISTS `material`;
CREATE TABLE IF NOT EXISTS `material` (
  `idMaterial` int NOT NULL AUTO_INCREMENT,
  `nombreMaterial` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `tipoMaterial` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  PRIMARY KEY (`idMaterial`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;

--
-- Volcado de datos para la tabla `material`
--

INSERT INTO `material` (`idMaterial`, `nombreMaterial`, `tipoMaterial`) VALUES
(6, 'NombreMateria1', 'Material1'),
(7, 'NombreMateria2', 'Material2'),
(8, 'NombreMateria3', 'Material3'),
(9, 'NombreMateria4', 'Material4');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro_pausa_tarea`
--

DROP TABLE IF EXISTS `registro_pausa_tarea`;
CREATE TABLE IF NOT EXISTS `registro_pausa_tarea` (
  `idPausa` int NOT NULL AUTO_INCREMENT,
  `idTareaPausa` int NOT NULL,
  `idTrabajadorPausa` int NOT NULL,
  `inicioPausa` datetime NOT NULL,
  `finPausa` datetime DEFAULT NULL,
  PRIMARY KEY (`idPausa`)
) ENGINE=MyISAM AUTO_INCREMENT=210 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;

--
-- Volcado de datos para la tabla `registro_pausa_tarea`
--

INSERT INTO `registro_pausa_tarea` (`idPausa`, `idTareaPausa`, `idTrabajadorPausa`, `inicioPausa`, `finPausa`) VALUES
(7, 1, 1, '2024-04-02 00:00:00', '2024-04-03 00:00:00'),
(8, 2, 2, '2024-04-01 09:25:10', '2024-04-02 07:30:10'),
(10, 2, 2, '2024-04-03 00:00:00', '2024-04-05 00:00:00'),
(11, 2, 2, '2024-04-04 00:00:00', '2024-04-06 00:00:00'),
(208, 55, 1, '2024-06-06 07:32:32', '2024-06-06 07:32:46'),
(50, 3, 1, '2024-05-29 14:30:00', '2024-05-30 07:30:00'),
(106, 3, 1, '2024-05-28 09:00:00', '2024-05-28 09:30:00'),
(111, 3, 1, '2024-05-27 12:00:00', '2024-05-27 13:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tarea`
--

DROP TABLE IF EXISTS `tarea`;
CREATE TABLE IF NOT EXISTS `tarea` (
  `idTarea` int NOT NULL AUTO_INCREMENT,
  `idTrabajo_Tarea` int NOT NULL,
  `idPadre_Tarea` int DEFAULT NULL,
  `idDepartamento_Tarea` int NOT NULL,
  `idCreador_Tarea` int NOT NULL,
  `rutaArchivos_Tarea` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `nombre_Tarea` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `cadena_Tarea` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `unidadesArchivo_Tarea` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci DEFAULT NULL,
  `unidadesTotales_Tarea` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci DEFAULT NULL,
  `idCliente_Tarea` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `concepto_Tarea` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci,
  `fechaCreacion_Tarea` datetime DEFAULT NULL,
  `fechaInicio_Tarea` datetime DEFAULT NULL,
  `fechaFin_Tarea` datetime DEFAULT NULL,
  `tiempoExtra_Tarea` int DEFAULT NULL,
  `observaciones_Tarea` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci,
  PRIMARY KEY (`idTarea`)
) ENGINE=MyISAM AUTO_INCREMENT=105 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;

--
-- Volcado de datos para la tabla `tarea`
--

INSERT INTO `tarea` (`idTarea`, `idTrabajo_Tarea`, `idPadre_Tarea`, `idDepartamento_Tarea`, `idCreador_Tarea`, `rutaArchivos_Tarea`, `nombre_Tarea`, `cadena_Tarea`, `unidadesArchivo_Tarea`, `unidadesTotales_Tarea`, `idCliente_Tarea`, `concepto_Tarea`, `fechaCreacion_Tarea`, `fechaInicio_Tarea`, `fechaFin_Tarea`, `tiempoExtra_Tarea`, `observaciones_Tarea`) VALUES
(5, 0, NULL, 3, 3, 'Url de informacion de la tarea', 'Tarea 5', 'Información de la tarea', '22', '22', 'Información de la tarea', 'prueba', '2024-06-03 10:04:39', '2024-06-03 10:04:39', '2024-06-03 10:04:50', 10, 'Información de la tarea'),
(6, 0, NULL, 3, 3, 'Url de informacion de la tarea', 'Tarea 6', 'Información de la tarea', '33', '33', 'Información de la tarea', 'PruebaMMTM', '2024-05-27 07:00:00', NULL, NULL, NULL, 'Información de la tarea'),
(44, 0, 5, 3, 3, 'Url de informacion de la tarea', 'Tarea 44', 'Información de la tarea', '20', '25', 'Información de la tarea', '5', '2024-05-27 07:00:00', NULL, NULL, NULL, 'Información de la tarea'),
(45, 6, 6, 6, 6, 'Url de informacion de la tarea', 'Tarea 45', 'Información de la tarea', '40', '40', 'Información de la tarea', 'ConceptoM', '2022-04-02 09:09:00', NULL, NULL, NULL, 'Información de la tarea'),
(46, 3, 5, 3, 3, 'Url de informacion de la tarea', 'Tarea 46', 'Información de la tarea', '30', '30', 'Información de la tarea', '5', '2024-05-27 07:00:00', NULL, NULL, NULL, 'Información de la tarea'),
(49, 0, 6, 6, 6, 'Url de informacion de la tarea', 'Tarea 49', 'Información de la tarea', '50', '50', 'Información de la tarea', 'ConceptoM', '2022-04-02 09:09:00', NULL, NULL, NULL, 'Información de la tarea'),
(55, 0, 3, 3, 3, 'Url de informacion de la tarea', 'Tarea 55', 'Información de la tarea', '55', '55', 'Información de la tarea', 'PruebaMMTM', '2024-06-06 07:00:00', '2024-06-06 07:31:16', '2024-06-06 07:50:00', NULL, 'Información de la tarea'),
(3, 0, NULL, 3, 3, 'Url de informacion de la tarea', 'Tarea 3', 'Información de la tarea', '44', '44', 'Información de la tarea', 'PruebaMMTM', '2024-05-27 07:00:00', '2024-05-27 07:00:00', '2024-05-31 09:00:00', NULL, 'Información de la tarea'),
(58, 3, 3, 3, 3, 'Url de informacion de la tarea', 'Tarea  58', 'Información de la tarea', '66', '66', 'Información de la tarea', 'Prueba240424', '2024-06-06 07:31:16', NULL, NULL, NULL, 'Información de la tarea'),
(60, 3, 3, 3, 3, 'Url de informacion de la tarea', 'Tarea 60', 'Información de la tarea', '77', '77', 'Información de la tarea', 'PruebaMMTM', '2024-05-27 07:00:00', NULL, NULL, NULL, 'Información de la tarea'),
(62, 3, 3, 3, 3, 'Url de informacion de la tarea', 'Tarea 62', 'Información de la tarea', '88', '90', 'Información de la tarea', 'prueba', '2024-06-06 07:31:16', NULL, NULL, NULL, 'Información de la tarea'),
(103, 3, 3, 3, 3, 'Url de informacion de la tarea', 'Tarea 100', 'Información de la tarea', '99', '99', 'Información de la tarea', 'Prueba 100', '2024-06-03 00:00:00', NULL, NULL, NULL, 'Información de la tarea'),
(104, 3, 3, 3, 3, 'Url de informacion de la tarea', 'Tarea 101', 'Información de la tarea', '10', '11', 'Información de la tarea', 'Prueba101', '2024-06-03 00:00:00', '2024-06-04 00:00:00', '2024-06-05 00:00:00', 10, 'Información de la tarea');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tarea_agrupada`
--

DROP TABLE IF EXISTS `tarea_agrupada`;
CREATE TABLE IF NOT EXISTS `tarea_agrupada` (
  `idGrupo` int NOT NULL AUTO_INCREMENT,
  `idTarea` int NOT NULL,
  `idTrabajador` int NOT NULL,
  `tiempoTotal` float NOT NULL,
  `observaciones` text CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  PRIMARY KEY (`idGrupo`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;

--
-- Volcado de datos para la tabla `tarea_agrupada`
--

INSERT INTO `tarea_agrupada` (`idGrupo`, `idTarea`, `idTrabajador`, `tiempoTotal`, `observaciones`) VALUES
(1, 1, 1, 22, 'Obsdervaciones1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tarea_maquina`
--

DROP TABLE IF EXISTS `tarea_maquina`;
CREATE TABLE IF NOT EXISTS `tarea_maquina` (
  `idTareMaqui` int NOT NULL AUTO_INCREMENT,
  `idTarea_TareMaqui` int NOT NULL,
  `idMaquina_tareMaqui` int NOT NULL,
  `comentario_TareMaqui` text CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci,
  PRIMARY KEY (`idTareMaqui`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;

--
-- Volcado de datos para la tabla `tarea_maquina`
--

INSERT INTO `tarea_maquina` (`idTareMaqui`, `idTarea_TareMaqui`, `idMaquina_tareMaqui`, `comentario_TareMaqui`) VALUES
(1, 1, 1, 'Comentario1'),
(2, 6, 6, 'ComentarioM'),
(3, 3, 3, 'Comentario3'),
(4, 4, 4, 'Comentario4');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tarea_material`
--

DROP TABLE IF EXISTS `tarea_material`;
CREATE TABLE IF NOT EXISTS `tarea_material` (
  `idTareMate` int NOT NULL AUTO_INCREMENT,
  `idTarea_TareMate` int NOT NULL,
  `idMaterial_TareMate` int NOT NULL,
  `materialPrevisto_TareMate` float DEFAULT NULL,
  `materialUtilizado_TareMate` float DEFAULT NULL,
  `comentario_TareMate` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci,
  PRIMARY KEY (`idTareMate`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;

--
-- Volcado de datos para la tabla `tarea_material`
--

INSERT INTO `tarea_material` (`idTareMate`, `idTarea_TareMate`, `idMaterial_TareMate`, `materialPrevisto_TareMate`, `materialUtilizado_TareMate`, `comentario_TareMate`) VALUES
(6, 1, 6, 20, 20.5, 'Comentario1'),
(7, 2, 8, 30, 29.5, 'Comentario2'),
(8, 3, 7, 23, 24, 'Comentario3'),
(9, 44, 7, 43, 43, 'Comentario4'),
(10, 46, 9, 22, 22, '2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tarea_trabajador`
--

DROP TABLE IF EXISTS `tarea_trabajador`;
CREATE TABLE IF NOT EXISTS `tarea_trabajador` (
  `IdTareaTraba` int NOT NULL AUTO_INCREMENT,
  `idTarea_TareaTraba` int NOT NULL,
  `idTrabajador_TareaTraba` int NOT NULL,
  `inicioTareaTrabajador` datetime NOT NULL,
  `finTareaTrabajador` datetime NOT NULL,
  `tiempoExtra` int NOT NULL,
  PRIMARY KEY (`IdTareaTraba`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;

--
-- Volcado de datos para la tabla `tarea_trabajador`
--

INSERT INTO `tarea_trabajador` (`IdTareaTraba`, `idTarea_TareaTraba`, `idTrabajador_TareaTraba`, `inicioTareaTrabajador`, `finTareaTrabajador`, `tiempoExtra`) VALUES
(2, 1, 1, '2022-04-02 09:00:00', '2022-04-02 17:00:00', 0),
(3, 2, 2, '2022-04-02 10:10:00', '2022-04-02 10:20:00', 5),
(4, 4, 4, '2022-04-02 11:11:00', '2022-04-02 11:30:00', 15);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trabajador`
--

DROP TABLE IF EXISTS `trabajador`;
CREATE TABLE IF NOT EXISTS `trabajador` (
  `idTrabajador` int NOT NULL AUTO_INCREMENT,
  `nombreTrabajador` varchar(90) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`idTrabajador`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;

--
-- Volcado de datos para la tabla `trabajador`
--

INSERT INTO `trabajador` (`idTrabajador`, `nombreTrabajador`) VALUES
(1, 'Trabajador1'),
(2, 'TrabajadorM'),
(3, 'Trabajador3'),
(4, 'Trabajador4');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trabajo`
--

DROP TABLE IF EXISTS `trabajo`;
CREATE TABLE IF NOT EXISTS `trabajo` (
  `idTrabajo` int NOT NULL AUTO_INCREMENT,
  `nombreTrabajo` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`idTrabajo`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;

--
-- Volcado de datos para la tabla `trabajo`
--

INSERT INTO `trabajo` (`idTrabajo`, `nombreTrabajo`) VALUES
(1, 'Trabajo1'),
(2, 'TrabajadorM'),
(3, 'Trabajo3'),
(5, 'Trabajo2'),
(6, 'Trabajo4');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
