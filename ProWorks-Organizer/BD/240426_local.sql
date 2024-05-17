-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 26-04-2024 a las 10:52:04
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
  `idDept` int NOT NULL AUTO_INCREMENT,
  `nombreDept` varchar(255) COLLATE utf8mb3_spanish_ci NOT NULL,
  `nivelPrivDept` int NOT NULL,
  `ordenApartDept` int NOT NULL,
  PRIMARY KEY (`idDept`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;

--
-- Volcado de datos para la tabla `departamento`
--

INSERT INTO `departamento` (`idDept`, `nombreDept`, `nivelPrivDept`, `ordenApartDept`) VALUES
(5, 'Nombre1', 1, 1),
(6, 'Nombre2', 2, 2),
(7, 'Nombre3', 3, 3),
(8, 'Nombre4', 4, 4),
(9, 'dsa', 5, 1);

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
  `nombreMaquina` varchar(255) COLLATE utf8mb3_spanish_ci NOT NULL,
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
(6, 'Nombre1', 'Material1'),
(7, 'Nombre2', 'Material2'),
(8, 'Nombre3', 'Material3'),
(9, 'Nombre4', 'Material4');

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
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;

--
-- Volcado de datos para la tabla `registro_pausa_tarea`
--

INSERT INTO `registro_pausa_tarea` (`idPausa`, `idTareaPausa`, `idTrabajadorPausa`, `inicioPausa`, `finPausa`) VALUES
(7, 1, 1, '2024-04-02 00:00:00', '2024-04-03 00:00:00'),
(8, 2, 2, '2024-04-01 09:25:10', '2024-04-02 07:30:10'),
(9, 3, 3, '2024-03-02 09:25:10', '2024-03-03 07:30:10'),
(10, 2, 2, '2024-04-03 00:00:00', '2024-04-05 00:00:00'),
(11, 2, 2, '2024-04-04 00:00:00', '2024-04-06 00:00:00'),
(12, 2, 2, '2024-04-03 00:00:00', '2024-04-06 00:00:00');

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
  `nombre_Tarea` varchar(255) COLLATE utf8mb3_spanish_ci NOT NULL,
  `cadena_Tarea` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `unidadesArchivo_Tarea` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci DEFAULT NULL,
  `unidadesTotales_Tarea` varchar(45) COLLATE utf8mb3_spanish_ci DEFAULT NULL,
  `idCliente_Tarea` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `concepto_Tarea` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci,
  `fechaCreacion_Tarea` datetime DEFAULT NULL,
  `fechaInicio_Tarea` datetime DEFAULT NULL,
  `fechaFin_Tarea` datetime DEFAULT NULL,
  `tiempoExtra_Tarea` int DEFAULT NULL,
  `observaciones_Tarea` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci,
  PRIMARY KEY (`idTarea`)
) ENGINE=MyISAM AUTO_INCREMENT=61 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;

--
-- Volcado de datos para la tabla `tarea`
--

INSERT INTO `tarea` (`idTarea`, `idTrabajo_Tarea`, `idPadre_Tarea`, `idDepartamento_Tarea`, `idCreador_Tarea`, `rutaArchivos_Tarea`, `nombre_Tarea`, `cadena_Tarea`, `unidadesArchivo_Tarea`, `unidadesTotales_Tarea`, `idCliente_Tarea`, `concepto_Tarea`, `fechaCreacion_Tarea`, `fechaInicio_Tarea`, `fechaFin_Tarea`, `tiempoExtra_Tarea`, `observaciones_Tarea`) VALUES
(3, 1, NULL, 1, 1, '', 'Nombre1', '33Cadena1', '22', NULL, 'Clientes1', 'Concepto1', '2024-04-02 09:25:00', '2024-04-02 09:25:00', '2024-04-03 07:30:00', 20, 'Observaciones1'),
(37, 1, 1, 1, 1, 'RutaArchivo1', 'Nombre1', '33Cadena1', '22', NULL, 'Clientes1', 'Concepto1', '2024-04-02 09:25:00', '2024-04-02 09:25:00', '2024-04-03 07:30:00', 20, 'Observaciones1'),
(38, 1, 1, 1, 1, 'RutaArchivo1', 'Nombre1', '33Cadena1', '22', NULL, 'Clientes1', 'Concepto1', '2024-04-02 09:25:00', '2024-04-02 09:25:00', '2024-04-03 07:30:00', 20, 'Observaciones1'),
(39, 2, 2, 2, 2, 'RutaArchivo2', 'Nombre2', '333Cadena2', '222', NULL, 'Clientes2', 'Concepto2', '2024-04-02 09:25:00', '2024-04-02 09:25:00', '2024-04-03 07:30:00', 22, 'Observaciones2'),
(40, 3, 3, 3, 3, 'RutaArchivo3', 'Nombre3', 'rtgrthr', '32Cadena3', '23', 'Clientes3', 'Concepto3', '2024-04-02 09:25:00', '2024-04-02 09:25:00', '2024-04-03 07:30:00', 23, 'Observaciones3'),
(41, 4, 4, 4, 4, 'RutaArchivo4', 'Nombre4', '34Cadena4', '24', NULL, 'Clientes4', 'Concepto4', '2024-04-02 09:25:00', '2024-04-02 09:25:00', '2024-04-03 07:30:00', 24, 'Observaciones4'),
(42, 5, 5, 5, 5, 'RutaArchivo5', 'Nombre5', '254444', NULL, '444444', 'Clientes5', 'Concepto5', '2024-04-02 09:25:00', '2024-04-02 09:25:00', '2024-04-03 07:30:00', 25, 'Observaciones5'),
(43, 2, 2, 2, 2, '2', '2', 'pppppppppppppppppppppppp', '222222', '222222', '2', '2', '2024-04-03 00:00:00', '2024-04-02 00:00:00', '2024-04-02 00:00:00', NULL, '2'),
(44, 3, 3, 3, 33, '3', '3', '33', '3', '3', '3', '3', '2024-04-04 00:00:00', '2024-04-03 00:00:00', '2024-04-03 00:00:00', 3, '3'),
(45, 6, 47, 6, 6, 'ArchivoM', '', 'CadenaM', '666666', '666666', 'ClienteM', 'ConceptoM', '2022-04-02 09:09:00', '2022-04-02 09:09:00', '2022-05-02 10:10:10', 14, 'ObservacionM'),
(46, 3, 49, 3, 3, 'RutaArchivo3', 'Nombre Prueba', '', '55', '5', '5', '5', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 5, '5'),
(47, 9, NULL, 9, 9, '9', '9', '9', '9', '9', '9', '9', '2024-04-18 00:00:00', '2024-04-18 00:00:00', '2024-04-18 00:00:00', 9, 'Lorem ipsum dolor sit amet consectetur adipiscing elit sed auctor, blandit senectus rutrum mollis litora massa ligula commodo, fermentum etiam vulputate varius montes vehicula malesuada ut. Nibh congue venenatis faucibus penatibus ridiculus quis scelerisque, torquent in litora nulla ornare duis, arcu odio aliquet sociosqu euismod nostra. Lectus sapien ultrices posuere iaculis senectus nostra nulla mauris consequat scelerisque lacus fames netus, venenatis odio tincidunt libero convallis interdum magnis euismod pretium luctus risus.  In metus potenti molestie nibh gravida praesent porta libero parturient elementum, quam ad posuere orci sagittis auctor tortor odio dis nam, nec nulla class accumsan massa dui etiam lobortis aliquam. Sed tincidunt senectus semper tempus nam curabitur leo congue ac morbi, maecenas consequat suscipit viverra elementum inceptos metus litora. Porta erat accumsan litora hac placerat quisque magna justo, sociis per fames arcu proin elementum auctor quis, congue risus netus diam parturient curabitur torquent. Nunc bibendum nibh rutrum egestas quam auctor inceptos vehicula cursus cum venenatis dictum molestie congue, parturient mollis duis vestibulum urna dignissim quis ridiculus diam litora suspendisse dapibus.Lorem ipsum dolor sit amet consectetur adipiscing elit sed auctor, blandit senectus rutrum mollis litora massa ligula commodo, fermentum etiam vulputate varius montes vehicula malesuada ut. Nibh congue venenatis faucibus penatibus ridiculus quis scelerisque, torquent in litora nulla ornare duis, arcu odio aliquet sociosqu euismod nostra. Lectus sapien ultrices posuere iaculis senectus nostra nulla mauris consequat scelerisque lacus fames netus, venenatis odio tincidunt libero convallis interdum magnis euismod pretium luctus risus.  In metus potenti molestie nibh gravida praesent porta libero parturient elementum, quam ad posuere orci sagittis auctor tortor odio dis nam, nec nulla class accumsan massa dui etiam lobortis aliquam. Sed tincidunt senectus semper tempus nam curabitur leo congue ac morbi, maecenas consequat suscipit viverra elementum inceptos metus litora. Porta erat accumsan litora hac placerat quisque magna justo, sociis per fames arcu proin elementum auctor quis, congue risus netus diam parturient curabitur torquent. Nunc bibendum nibh rutrum egestas quam auctor inceptos vehicula cursus cum venenatis dictum molestie congue, parturient mollis duis vestibulum urna dignissim quis ridiculus diam litora suspendisse dapibus.Lorem ipsum dolor sit amet consectetur adipiscing elit sed auctor, blandit senectus rutrum mollis litora massa ligula commodo, fermentum etiam vulputate varius montes vehicula malesuada ut. Nibh congue venenatis faucibus penatibus ridiculus quis scelerisque, torquent in litora nulla ornare duis, arcu odio aliquet sociosqu euismod nostra. Lectus sapien ultrices posuere iaculis senectus nostra nulla mauris consequat scelerisque lacus fames netus, venenatis odio tincidunt libero convallis interdum magnis euismod pretium luctus risus.  In metus potenti molestie nibh gravida praesent porta libero parturient elementum, quam ad posuere orci sagittis auctor tortor odio dis nam, nec nulla class accumsan massa dui etiam lobortis aliquam. Sed tincidunt senectus semper tempus nam curabitur leo congue ac morbi, maecenas consequat suscipit viverra elementum inceptos metus litora. Porta erat accumsan litora hac placerat quisque magna justo, sociis per fames arcu proin elementum auctor quis, congue risus netus diam parturient curabitur torquent. Nunc bibendum nibh rutrum egestas quam auctor inceptos vehicula cursus cum venenatis dictum molestie congue, parturient mollis duis vestibulum urna dignissim quis ridiculus diam litora suspendisse dapibus.Lorem ipsum dolor sit amet consectetur adipiscing elit sed auctor, blandit senectus rutrum mollis litora massa ligula commodo, fermentum etiam vulputate varius montes vehicula malesuada ut. Nibh congue venenatis faucibus penatibus ridiculus quis scelerisque, torquent in litora nulla ornare duis, arcu odio aliquet sociosqu euismod nostra. Lectus sapien ultrices posuere iaculis senectus nostra nulla mauris consequat scelerisque lacus fames netus, venenatis odio tincidunt libero convallis interdum magnis euismod pretium luctus risus.  In metus potenti molestie nibh gravida praesent porta libero parturient elementum, quam ad posuere orci sagittis auctor tortor odio dis nam, nec nulla class accumsan massa dui etiam lobortis aliquam. Sed tincidunt senectus semper tempus nam curabitur leo congue ac morbi, maecenas consequat suscipit viverra elementum inceptos metus litora. Porta erat accumsan litora hac placerat quisque magna justo, sociis per fames arcu proin elementum auctor quis, congue risus netus diam parturient curabitur torquent. Nunc bibendum nibh rutrum egestas quam auctor inceptos vehicula cursus cum venenatis dictum molestie congue, parturient mollis duis vestibulum urna dignissim quis ridiculus diam litora suspendisse dapibus.Lorem ipsum dolor sit amet consectetur adipiscing elit sed auctor, blandit senectus rutrum mollis litora massa ligula commodo, fermentum etiam vulputate varius montes vehicula malesuada ut. Nibh congue venenatis faucibus penatibus ridiculus quis scelerisque, torquent in litora nulla ornare duis, arcu odio aliquet sociosqu euismod nostra. Lectus sapien ultrices posuere iaculis senectus nostra nulla mauris consequat scelerisque lacus fames netus, venenatis odio tincidunt libero convallis interdum magnis euismod pretium luctus risus.  In metus potenti molestie nibh gravida praesent porta libero parturient elementum, quam ad posuere orci sagittis auctor tortor odio dis nam, nec nulla class accumsan massa dui etiam lobortis aliquam. Sed tincidunt senectus semper tempus nam curabitur leo congue ac morbi, maecenas consequat suscipit viverra elementum inceptos metus litora. Porta erat accumsan litora hac placerat quisque magna justo, sociis per fames arcu proin elementum auctor quis, congue risus netus diam parturient curabitur torquent. Nunc bibendum nibh rutrum egestas quam auctor inceptos vehicula cursus cum venenatis dictum molestie congue, parturient mollis duis vestibulum urna dignissim quis ridiculus diam litora suspendisse dapibus.'),
(49, 7, NULL, 7, 7, '7', '7', '7', '7', '7', '7', '7', '2024-04-18 00:00:00', '2024-04-18 00:00:00', '2024-04-18 00:00:00', 7, 'Algo'),
(50, 3, 54, 3, 3, 'RutaArchivo3', '', 's', '2', '2', 's', '2', '2024-04-19 00:00:00', '2024-04-19 00:00:00', '2024-04-19 00:00:00', 2, 's'),
(51, 2, NULL, 2, 2, '2', 'padre2', 'padre2', '2', '2', '2', 'padre2', '2024-04-19 00:00:00', '2024-04-19 00:00:00', '2024-04-19 00:00:00', 2, '2'),
(52, 3, 51, 3, 3, '3', 'hijo2', 'hijo2', '2', '2', '2', 'hijo2', '2024-04-19 00:00:00', '2024-04-19 00:00:00', '2024-04-19 00:00:00', 2, 'hijo2'),
(53, 4, 56, 4, 4, '4', '', '4', '4', '4', '4', 'este no es hijo', '2024-04-19 00:00:00', '2024-04-19 00:00:00', '2024-04-19 00:00:00', 4, 'este no es hijo'),
(54, 5, 51, 5, 5, '6', '', '6', '6', '6', '6', 'Este es hijo del padre 2', '2024-04-19 00:00:00', '2024-04-19 00:00:00', '2024-04-19 00:00:00', 5, 'Este es hijo del padre 2'),
(55, 3, NULL, 3, 3, 'RutaArchivo3', '', 'prueba', '1', '1', 'prueba', 'prueba', '2024-04-19 00:00:00', '2024-04-19 00:00:00', '2024-04-19 00:00:00', 1, 'prueba'),
(56, 66, NULL, 66, 66, 'ruta66', 'Prueba2', 'Prueba2', '66', '66', 'Prueba2', 'Prueba2', '2024-04-22 09:20:02', '2024-04-22 09:20:02', '2024-04-22 09:20:02', 66, 'Prueba2'),
(57, 3, 3, 3, 3, 'RutaArchivo3', '242424', 'Prueba240424', '240424', '240424', 'Prueba240424', 'Prueba240424', '2024-04-22 09:20:02', '2024-04-22 09:20:02', '2024-04-22 09:20:02', 240424, 'Prueba240424'),
(58, 3, 3, 3, 3, 'RutaArchivo3', '24242424', 'Prueba240424', '240424', '240424', 'Prueba240424', 'Prueba240424', '2024-04-24 00:00:00', '2024-04-24 00:00:00', '2024-04-24 00:00:00', 240424, 'Prueba240424'),
(59, 3, 3, 3, 3, 'RutaArchivo3', 'qqqqqqqq', '6', '6', '6', 'kkkk', 'kkkk', '2024-04-25 00:00:00', '2024-04-26 00:00:00', '2024-04-27 00:00:00', 55, 'kkkk'),
(60, 3, 3, 3, 3, 'RutaArchivo3', 'PruebaMMTM', 'PruebaMMTM', '33', '33', 'PruebaMMTM', 'PruebaMMTM', '2024-04-26 00:00:00', '2024-04-27 00:00:00', '2024-04-28 00:00:00', 33, 'PruebaMMTM');

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
  `observaciones` text COLLATE utf8mb3_spanish_ci NOT NULL,
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
  `comentario_TareMaqui` text COLLATE utf8mb3_spanish_ci,
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
(6, 1, 1, 20, 20.5, 'Comentario1'),
(7, 2, 2, 30, 29.5, 'Comentario2'),
(8, 3, 3, 23, 24, 'Comentario3'),
(9, 4, 4, 43, 43, 'Comentario4'),
(10, 22, 22, 22, 22, '2');

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
  `nombreTrabajador` varchar(90) COLLATE utf8mb3_spanish_ci DEFAULT NULL,
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
  `nombreTrabajo` varchar(255) COLLATE utf8mb3_spanish_ci DEFAULT NULL,
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
