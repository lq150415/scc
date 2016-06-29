-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-06-2016 a las 22:05:34
-- Versión del servidor: 5.6.14
-- Versión de PHP: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `db_sccventas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `archivo`
--

CREATE TABLE IF NOT EXISTS `archivo` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `titulo` text,
  `descripcion` text,
  `activo` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='Es el tipo de archivo' AUTO_INCREMENT=26 ;

--
-- Volcado de datos para la tabla `archivo`
--

INSERT INTO `archivo` (`id`, `titulo`, `descripcion`, `activo`) VALUES
(1, 'Avance', NULL, 1),
(2, 'Concierto Español', NULL, 1),
(3, 'Concierto Ingles', NULL, 1),
(4, 'Concierto Subtitulado', NULL, 1),
(5, 'Documental', '', 1),
(6, 'Enseñanza', NULL, 1),
(7, 'Entrevista', NULL, 1),
(8, 'Especial', NULL, 1),
(9, 'Identificaciones', NULL, 1),
(10, 'Infantil', NULL, 1),
(11, 'Microprograma Español', NULL, 1),
(12, 'Microprograma Subtitulada', NULL, 1),
(13, 'Musical Español', NULL, 1),
(14, 'Musical Ingles', NULL, 1),
(15, 'Musical Subtitulada', NULL, 1),
(16, 'Pelicula Español', NULL, 1),
(17, 'Pelicula Ingles', NULL, 1),
(18, 'Pelicula Subtitulada', NULL, 1),
(19, 'Predica Doblada', NULL, 1),
(20, 'Predica Español', NULL, 1),
(21, 'Programa local', NULL, 1),
(22, 'Promocionales', NULL, 1),
(23, 'Publicidad', NULL, 1),
(24, 'Revista', NULL, 1),
(25, 'Testimonio', NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulos`
--

CREATE TABLE IF NOT EXISTS `articulos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `TIT_ART` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `PRE_ART` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `ID_CAT` int(10) unsigned NOT NULL,
  `ID_USU` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `articulos_id_cat_foreign` (`ID_CAT`),
  KEY `articulos_id_usu_foreign` (`ID_USU`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE IF NOT EXISTS `categorias` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `NOM_CAT` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `DES_CAT` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `ID_USU` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `categorias_id_usu_foreign` (`ID_USU`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=25 ;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `NOM_CAT`, `DES_CAT`, `ID_USU`, `created_at`, `updated_at`) VALUES
(15, 'Predicas', 'Predicas', 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(16, 'Desde lo alto', 'Desde lo alto', 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(17, 'Mujer Unica', 'Mujer Unica', 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(18, 'Hombria al maximo', 'Hombria al maximo', 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(20, 'Haciendo Discipulos', 'Haciendo Discipulos', 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(21, 'Conciertos', 'Descripcion', 3, '0000-00-00 00:00:00', '2016-06-03 22:28:52'),
(24, 'Generacion de fuego', 'Generacion de fuego', 3, '2016-06-04 03:00:51', '2016-06-04 03:00:51');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE IF NOT EXISTS `clientes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `NOM_CLI` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `APA_CLI` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `AMA_CLI` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `TEL_CLI` int(11) NOT NULL,
  `DIR_CLI` text COLLATE utf8_unicode_ci NOT NULL,
  `EMA_CLI` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=20 ;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `NOM_CLI`, `APA_CLI`, `AMA_CLI`, `TEL_CLI`, `DIR_CLI`, `EMA_CLI`, `created_at`, `updated_at`) VALUES
(1, 'Erick', 'Moscoso', 'Zamora', 76207622, 'LA PAZ', 'erick.moscoso.zamora@hotmail.com', '2016-04-11 10:38:48', '2016-04-11 10:38:48'),
(2, 'Libreria', 'Zamar', ' ', 2317178, 'LA PAZ', ' ', '2016-04-11 10:38:48', '2016-04-11 10:38:48'),
(3, 'Flora', 'Llimona', ' ', 2203760, 'LA PAZ', ' ', '2016-04-11 10:38:48', '2016-04-11 10:38:48'),
(4, 'Marcelo', 'Mamani', 'Diaz', 71933510, 'LA PAZ', 'marce.mamani365@gmail.com', '2016-04-11 10:38:48', '2016-04-11 10:38:48'),
(10, 'Luis', 'Quisbert', 'Quispe', 60522919, 'Z/ Los Andes C/ Balboa #2665', 'lq150415@gmail.com', '2016-04-21 00:28:01', '2016-04-21 00:28:01'),
(11, 'Juan', 'Perez', 'Ferreira', 71243324, 'Z 16 de Julio ', 'juan@gmail.com', '2016-04-21 00:30:47', '2016-04-21 00:30:47'),
(12, 'Pedro', 'Paredes', 'Cruz', 71234545, 'Z/ Rio Seco C/12', 'pedro@gmail.com', '2016-04-21 00:32:13', '2016-04-21 00:32:13'),
(13, 'Pablo', 'Aramayo ', 'Castillo', 68429102, 'Z/Los Pinos C/ 45', 'pablo@gmail.com', '2016-04-21 00:46:30', '2016-04-21 00:46:30'),
(14, 'Pablo', 'Aramayo ', 'Castillo', 68429102, 'Z/Los Pinos C/ 45', 'pablo@gmail.com', '2016-04-21 00:47:01', '2016-04-21 00:47:01'),
(15, 'Juan', 'Perez', 'Velasco', 7725981, 'Z/ jp C/pepe #500', 'jp@gmail.com', '2016-04-26 21:22:41', '2016-04-26 21:22:41'),
(16, 'tdhgfhfd', 'gdgfdsg', 'gfdgfds', 35426, 'igjrwhtrsobjlrsjoif', 'luis@gmail.com', '2016-05-05 00:38:15', '2016-05-05 00:38:15'),
(17, 'Faustino', 'Mayta', 'Mamani', 66587987, 'c/ gumercindo AV. estrecha nro quien sabe', 'famama@gmail', '2016-05-05 22:41:27', '2016-05-05 22:41:27'),
(18, 'Thania', 'Huanca', 'Collo', 69765808, '', 'minato.tj@gmail.com', '2016-06-03 22:48:46', '2016-06-03 22:48:46'),
(19, 'Wilson', 'Yucra', 'Gutierrez', 76599015, '', 'wilsonyucra@gmail.com', '2016-06-04 02:48:25', '2016-06-04 02:48:25');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empaquetados`
--

CREATE TABLE IF NOT EXISTS `empaquetados` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ID_PAQ` int(10) unsigned NOT NULL,
  `ID_ART` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `empaquetados_id_paq_foreign` (`ID_PAQ`),
  KEY `empaquetados_id_art_foreign` (`ID_ART`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genero`
--

CREATE TABLE IF NOT EXISTS `genero` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `titulo` text,
  `activo` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

--
-- Volcado de datos para la tabla `genero`
--

INSERT INTO `genero` (`id`, `titulo`, `activo`) VALUES
(1, 'Enseñanza Serie', 1),
(2, 'Musical Alabanza y Adoracion', 1),
(3, 'Musical Clasico', 1),
(4, 'Musical Contemporaneo', 1),
(5, 'Musical Juvenil', 1),
(6, 'Concierto Alabanza y Adoracion', 1),
(7, 'Concierto Clasico', 1),
(8, 'Concierto Contemporaneo', 1),
(9, 'Concierto Juvenil', 1),
(10, 'Infantil Serie Dibujo Animado', 1),
(11, 'Infantil Serie Niños', 1),
(12, 'Infantil Programa Niños', 1),
(13, 'Infantil Dibujo Animado', 1),
(14, 'Película Drama', 1),
(15, 'Película Historica', 1),
(16, 'Película Acción', 1),
(17, 'Película Comedia', 1),
(18, 'Película Familiar', 1),
(19, 'Película Clasica', 1),
(20, 'Predica Juvenil', 1),
(21, 'Prédica Adultos', 1),
(22, 'Prédica Niños', 1),
(23, 'Concierto SCC', 1),
(24, 'Publicidad Propaganda', 1),
(25, 'Publicidad Comercial', 1),
(26, 'Avance General', 1),
(27, 'Avance Especifico', 1),
(28, 'Publicidad Gubernamental', 1),
(29, 'Avances Campañas', 1),
(30, 'Identificaciones Out', 1),
(31, 'Identificaciones In', 1),
(32, 'Publicidad Ekklesia', 1),
(33, 'Musical Infantil', 1),
(34, 'Película Infantil', 1),
(35, 'Película Documental', 1),
(36, 'Programa Juvenil', 1),
(37, 'Programa Infantil', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `material`
--

CREATE TABLE IF NOT EXISTS `material` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `ID_USU` int(11) DEFAULT NULL,
  `COD_MAT` varchar(15) DEFAULT NULL,
  `TIT_MAT` text,
  `SUB_MAT` text,
  `ANP_MAT` int(11) DEFAULT NULL,
  `DUR_MAT` time DEFAULT NULL,
  `DIR_MAT` text,
  `PAI_MAT` varchar(45) DEFAULT NULL,
  `GUI_MAT` varchar(45) DEFAULT NULL,
  `ID_GEN` int(11) DEFAULT NULL,
  `EST_MAT` varchar(100) DEFAULT NULL,
  `RES_MAT` varchar(20) DEFAULT NULL,
  `COM_MAT` text,
  `POR_MAT` varchar(45) DEFAULT NULL,
  `ID_UBI` int(11) DEFAULT NULL,
  `DES_UBI` text,
  `ACT_MAT` int(11) DEFAULT NULL,
  `NRO_PRO` int(11) DEFAULT NULL,
  `ID_PRO` int(11) DEFAULT NULL,
  `ID_ARC` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=110 ;

--
-- Volcado de datos para la tabla `material`
--

INSERT INTO `material` (`id`, `ID_USU`, `COD_MAT`, `TIT_MAT`, `SUB_MAT`, `ANP_MAT`, `DUR_MAT`, `DIR_MAT`, `PAI_MAT`, `GUI_MAT`, `ID_GEN`, `EST_MAT`, `RES_MAT`, `COM_MAT`, `POR_MAT`, `ID_UBI`, `DES_UBI`, `ACT_MAT`, `NRO_PRO`, `ID_PRO`, `ID_ARC`) VALUES
(1, 1, 'IE-1', 'AUTO B GOOD (O)', 'PONGAMONOS EN CAMINO', 2012, '01:00:00', '', '', '', 10, '', '1', '6 CAPITULOS QUE HACEN UN TOTAL DE TIEMPO UNA HORA', 'X', 2, 'BLOQUE-4', 1, 0, 5, 17),
(2, 1, 'IE-2', 'AUTO B GOOD (O)', 'PONGAMONOS EN CAMINO', 0, '01:00:00', '', '', '', 10, '', '1', '6 CAPITULOS QUE HACEN UN TOTAL DE TIEMPO UNA HORA', 'X', 2, 'BLOQUE-4', 1, 0, 5, 17),
(3, 1, 'IE-3', 'AUTO B GOOD (O)', 'RASGOS DE LA FE', 2014, '02:14:00', '', '', '', 10, '', '1', 'LECCION ACERCA DE LA SABIDURIA, EL PERDON, LA SINCERIDAD Y MUCHO MAS. 10 EMOCIONANTES EPISODIOS', 'X', 2, 'BLOQUE-4', 1, 0, 5, 17),
(4, 1, 'IE-4', 'AUTO B GOOD (O)', 'LOS FRUTOS DEL ESPIRITU', 2014, '02:10:00', '', '', '', 10, '', '1', 'LECCIONES ACERCA DEL GOZO, LA LEALTAD, LA BONDA Y MUCHO MAS. 10 EMOCIONANTES EPISODIOS', 'X', 2, 'BLOQUE-4', 1, 0, 5, 17),
(5, 1, 'IE-5', 'AUTO B GOOD (O)', 'SABIDURIA DE LO ALTO', 0, '02:09:00', '', '', '', 10, '', '1', 'LECCIONES ACERCA DE LA CORTESIA, LA JUSTICIA, LAAUTOESTIMA Y MUCHO MAS. 10 EMOCIONANTES EPISODIOS', 'X', 2, 'BLOQUE-4', 1, 0, 5, 17),
(6, 1, 'IE-6', 'AUTO B GOOD (O)', 'DANDOLE LOS NEUMATICOS SE UNEN A LA CALLE', 2009, '01:00:00', '', '', '', 10, '', '1', 'TOLERANCIA, CONCIDERACION, UNIDAD, PATRIOTISMO, CIUDADNIA Y LEALTAD. 6 EPISODIOS', 'X', 2, 'BLOQUE-4', 1, 0, 5, 17),
(7, 1, 'PE-1', 'BEN HUR (O)', 'BEN HUR', 2005, '01:20:00', '', '', '', 34, '', '1', 'Durante el siglo primero antes de Cristo, Ben Hur es un joven príncipe hebreo que es esclavizado por los romanos. Después de un trágico accidente y de forma heroica regresa con su familia y se enamora perdidamente de una hermosa esclava lo que se hace un conflicto con sus amigos. Estos dramáticos eventos se desarrollan en el marco de la vida y muerte de cristo constituyendo una obra imposible de olvidar y que cautivara a personas de todas las edades y en todas las épocas.', 'X', 2, 'BLOQUE-1', 1, 0, 5, 11),
(8, 1, 'ME-1', 'EL NUEVO MUNDO DE BIPER (O)', 'VOL. 1', 2012, '00:55:00', '', '', '', 33, '', '1', 'Un mundo donde podrás encontrar aventuras música y diversión junto a Biper ', 'X', 2, 'BLOQUE-3', 1, 0, 5, 80),
(9, 1, 'IE-0007', 'CHIQUISAURIOS (O)', 'CUENTOS DEL ABUELITO', 2009, '00:33:00', '', '', '', 13, '', '1', 'La popular colección de "Cuentos de la abuelita" ', 'X', 2, 'BLOQUE-4', 1, 0, 5, 17),
(10, 1, 'IE-8', 'EL DESVAN DEL TIO IVAN (O)', 'MAGNIFICO UNIVERSO Y POR TODO EL MUNDO', 2009, '00:50:00', '', '', '', 11, '', '1', 'Con estos episodios de EL DESVAN DEL TIO IVAN los chicos aprenden una emocionante gira didáctica por el mundo. descubre así junto al tío Ivan, Ojitos y Conejin Palabrin maravillas del medio ambiente, no solo en nuestro planta, sino en el espacio sideral.', 'X', 2, 'BLOQUE-4', 1, 0, 5, 17),
(11, 1, 'IE-9', 'EL DESVAN DEL TIO IVAN (O)', 'EL VIAJE INCREIBLE Y MI MEJOR AMIGO', 2007, '00:56:00', '', '', '', 11, '', '1', 'Apasionante recorrido por la biblia de la mano del tío Iván y sus amiguitos', 'X', 2, 'BLOQUE-4', 1, 0, 5, 17),
(12, 1, 'IE-10', 'EL DESVAN DEL TIO IVAN (O)', 'UN DIA EN EL CAMPO Y UNA SONRISA', 2009, '00:56:00', '', '', '', 11, '', '1', 'Aventuras llenas de sorpresas en el desván del tío Iván. ', 'X', 2, 'BLOQUE-4', 1, 0, 5, 17),
(13, 1, 'IE-10', 'EL DESVAN DEL TIO IVAN (O)', 'EL JARDIN Y VAMOS DE CAMPING', 0, '00:50:00', '', '', '', 11, '', '1', 'Una animadísima aventura educativa. llena de dinámica, canciones, actividades y muñecos que divierten y enseñan a la vez. ', 'X', 2, 'BLOQUE-4', 1, 0, 5, 17),
(14, 1, 'PS-1', 'BE STILL (O)', 'AND KNOW THAT I AM GOD', 2006, '01:33:00', '', '', '', 35, '', '1', 'BE STILL is an extraordinary film that demonstrates how contemplative, or "listening", prayer can be a vital way to find peace vin the mist of a frenzied, fast-paced, moder world.', 'X', 2, 'BLOQUE-1', 1, 0, 5, 104),
(15, 1, 'PE-2', 'TIME CHANGER (O)', 'THE MAKING OF TIME CHANGER', 2002, '00:53:00', '', '', '', 18, '', '1', 'THE YEAR IS 1890AND BIBLE PROFESSOR RUSSELL CARLISLE (D. DAVID MORIN) HAS WRITTEN A NEW MANUSCRIPT ENTITLED "THE CHANGING TIMES" HIS BOOK IS ABOUT TO RECEIVE A UNANIMOUS ENDORSEMENT FRON THE BOARD MEMBERS OF THE GRACE BIBLE SEMINARY UNTIL HIS COLLEAGUE DR. NORRIS ANDERSON (GAVIN MACLEOD) RAISES AND OBJETION.', 'X', 2, 'BLOQUE 1', 1, 0, 5, 11),
(16, 1, 'PE-3', 'BEHIND THE SUN (O)', 'A YOUNG MAN''S CHOICE. A FATHER''S PAIN.', 1995, '00:56:00', '', '', '', 14, '', '1', 'Behind the sun followsthe story of Samir Majan, a young man born and raised a Muslim in the Middle East who attended college in America.', 'X', 2, 'BLOQUE-1', 1, 0, 5, 11),
(17, 1, 'PE-4', 'LA SUBASTA DE UN ALMA (O)', '', 1989, '01:55:00', '', '', '', 14, '', '1', 'La subasta de un alma, es una presentación del ministerio mizpa; grabado en los estudios de La Cadena Del Milagro, Cumuy, Puerto Rico, Ministerio Cristo viene 1989', 'X', 2, 'BLOQUE-1', 1, 0, 5, 11),
(18, 1, '01/15', 'EN LA SELVA', '1ERA Y 2DA MEDIA HORA', 2015, '00:58:17', '', 'BOLIVIA', '', 36, '', '1', '1ERA. MEDIA HORA: FABRICA DE CONFESIONES¿ES MALO CONSULTAR HOROSCOPOS?\r\n2DA. MEDIA HORA: INVITADO: BANDA NOIS, HABLAN ACERCA DE COMO INICIÓ BANDA Y PRESENTAN SUS CANCIONES.', 'X', 2, 'ESTANTE 1 - FILA 5', 1, 0, 4, 152),
(19, 1, '02/15', 'EN LA SELVA', '1ERA Y 2DA MEDIA HORA ', 2015, '00:59:17', '', 'BOLIVIA', '', 36, '', '1', '1ERA MEDIA HORA: LECTURA: CARISMA VS, CARÁCTER ¿CUÁL ES MÁS IMPORTANTE? POR: RICK WARREN\r\n2DA MEDIA HORA: INVITADO: NO HAY, SÓLO SE PRESENTARON VIDEO CLIPS', 'X', 2, 'ESTANTE 1 - FILA 5', 1, 0, 4, 152),
(20, 1, '03/15', 'EN LA SELVA', '2DA MEDIA HORA', 2015, '00:28:16', '', 'BOLIVIA', '', 36, '', '1', '2DA MEDIA HORA: INVITADO A DISTANCIA: COMUNICADOR - PATO PETERS\r\nPRESENTACIÓN SOBRE LA HISTORIA DE PETERS, CUENTA SOBRE SU EXPERIENCIA LABORAL (MÚSICA).', 'X', 2, 'ESTANTE 1 - FILA 5', 1, 0, 4, 152),
(21, 1, '04/15', 'EN LA SELVA', '1ERA Y 2DA MEDIA HORA ', 2015, '00:58:29', '', 'BOLIVIA', '', 36, '', '1', '1ERA MEDIA HORA: LECTURA: UNA VEZ GAY, ¿SIEMPRE GAY? NO NECESARIAMENTE POR: LEE GRADY.\r\n2DA MEDIA HORA: INVITADO 1: ISABEL FLORES, REPRESENTANTE ESCUELA DE PADRES. CONTENIDO: PUBLICIDAD PARA LA INSCRIPCIÓN.\r\nINVITADO 2: MAURICIO TOLEDO, ACTOR. \r\nCONTENIDO: TOLEDO CUENTA SOBRE SU EXPERIENCIA LABORAL.', 'X', 2, 'ESTANTE 1 - FILA 5', 1, 0, 4, 152),
(22, 1, '05/15', 'EN LA SELVA', '1ERA Y 2DA MEDIA HORA ', 2015, '00:56:15', '', 'BOLIVIA', '', 36, '', '1', '1ERA MEDIA HORA: NO HAY, SÓLO SE PRESENTARON VIDEO-CLIPS.\r\n2DA MEDIA HORA: INVITADO 1: MIGUEL PACO (BATERISTA)   CONTENIDO: EXPLICA SOBRE DE CÓMO COMENZÓ Y  SU MÚSICA A NIVEL NACIONAL, EXPLICA SU ÚLTIMA MÚSICA PARA MÁS ADELANTEY PRESENTÓ SU MÚSICA SITUACIÓN FT. AJAYU "MI TIERRA".\r\nINVITADO 2: GRUPO - BANDA LAGARTOS  CONTENIDO: CUENTA SOBRE CUÁNTO TIEMPO SE LLEVARON SU GRUPO, EXPLICA EL PROCESO DE SU BANDA Y PRESENTARON EL VIDEO CLIPS "SOLO SEXO".', 'X', 2, 'ESTANTE 1 - FILA 5', 1, 0, 4, 152),
(23, 1, '06/15', 'EN LA SELVA', '1ERA Y 2DA MEDIA HORA ', 2015, '00:59:00', '', 'BOLIVIA', '', 36, '', '1', '1ERA MEDIA HORA: FABRICA DE CONSESIONES: ¿QUÉ OPINA DIOS DEL RACISMO? \r\n2DA MEDIA HORA: INVITADO: RAFAEL CAMBRONERO - CANTAUTOR    CONTENIDO: PRESENTACIÓN SOBRE SU BIOGRAFÍA, CUENTA SU HISTORIA DE VIDA, TAMBIÉN EXPLICA SOBRE LA IGLESIA Y LA MÚSICA, Y PRESENTÓ LA MÚSICA "VIVO PARA TÍ".', 'X', 2, 'ESTANTE 1 - FILA 5', 1, 0, 4, 152),
(24, 1, '07/15', 'EN LA SELVA', '1ERA Y 2DA MEDIA HORA ', 2015, '00:59:12', '', 'BOLIVIA', '', 0, '', '1', '1ERA MEDIA HORA: LECTURA: LA VERDADERA INTERSECIÓN POR: OMAYRA FONT.\r\n2DA MEDIA HORA: INVITADO: GRUPO MINISTERIO ASAF.  CONTENIDO: PRESENTACIÓN DE LA BANDA "MINISTERIO ASAF", CUENTA SOBRE DE CÓMO SE HA FORMADO EL GRUPO, PRESENTARON LA MÚSICA: "EL MAESTRO" Y "LA PESADILLA", Y AL FINAL SE PRESENTARON UNA PEQUEÑA MUESTRA DEL VIDEO CLIPS.', 'X', 2, 'ESTANTE 1 - FILA 5', 1, 0, 4, 152),
(25, 1, '08/15', 'EN LA SELVA', '1ERA Y 2DA MEDIA HORA', 2015, '00:59:29', '', 'BOLIVIA', '', 0, '', '1', '1ERA MEDIA HORA: FABRICA DE CONSESIONES: ¿CÓMO AYUDAR A QUE DOS PERSONAS SE RECONCILIEN?  \r\n2DA MEDIA HORA: INVITADO: REBECCA VÁSQUEZ LAMARTÍN - CANTANTE     CONTENIDO: PRESENTACIÓN DE SU EXPERIENCIA LABORAL, CUENTA SU HISTORIA, EXPLICA DE CÓMO EMPEZÓ A TRABAJAR, PRESENTÓ LA MÚSICA "REINA SENHOR". EXPLICA DE CÓMO EMPEZÓ A PRODUCIR SU MÚSICA, Y POR ÚLTIMO SE PRESENTÓ UN VIDEO CLIP "ELE ME CHAMA".\r\n', 'X', 2, 'ESTANTE 1 - FILA 5', 1, 0, 4, 152),
(26, 1, '09/15', 'EN LA SELVA', '2DA MEDIA HORA', 2015, '00:12:44', '', 'BOLIVIA', '', 36, '', '1', '2DA MEDIA HORA: INVITADO: YURI MIJAIL - MÚSICO CANTAUTOR    CONTENIDO: SE PRESENTARON LA BIOGRAFÍA DE MIJAIL, CUENTA SOBRE SU EXPERIENCIA LABORAL, CUENTA SOBRE SU TRABAJO DE AVANCE PARA LA PRÓXIMA PRESENTACIÓN DE SU MÚSICA.\r\n', 'X', 2, 'ESTANTE 1 - FILA 5', 1, 0, 4, 152),
(27, 1, '10/15 P1', 'EN LA SELVA', '1ERA MEDIA HORA', 2015, '00:28:09', '', 'BOLIVIA', '', 36, '', '1', '1ERA MEDIA HORA: FABRICA DE CONSESIONES:       LECTURA: LA ÚNICA MANERA DE APRENDER A CONFIAR EN DIOS POR: KENNEY-DEAN\r\n\r\n', 'X', 2, 'ESTANTE 1 - FILA 5', 1, 0, 4, 152),
(28, 1, '12/15', 'EN LA SELVA', '1ERA MEDIA HORA', 2015, '00:28:13', '', 'BOLIVIA', '', 36, '', '1', '1ERA MEDIA HORA: ENTREVISTA INTERNACIONAL: EMMANUEL Y LINDA ESPINOZA-CANTAUTORES   CONTENIDO: SE PRESENTARION LA BIOGRAFÍA DE LOS DOS, SALUDO, EXPLICA SOBRE SU EXPERIENCIA LABORAL (MÚSICA), EXPLICA CÓMO SE FORMARON COMO PAREJA, Y DESPUÉS SE PRESENTARON UN VIDEO CLIP "HOY SE ESCUCHA UNA CANCIÓN".\r\n\r\n\r\n', 'X', 2, 'ESTANTE 1 - FILA 5', 1, 0, 4, 152),
(29, 1, '13/15', 'EN LA SELVA', '1ERA MEDIA HORA', 2015, '00:29:10', '', 'BOLIVIA', '', 36, '', '1', '1ERA MEDIA HORA: NO HAY, SÓLO SE PRESENTARON VIDEO CLIPS.\r\n', 'X', 2, 'ESTANTE 1 - FILA 5', 1, 0, 4, 152),
(30, 1, '14/15', 'EN LA SELVA', '1ERA MEDIA HORA', 2015, '00:27:25', '', 'BOLIVIA', '', 36, '', '1', '1ERA MEDIA HORA: INVITADO INTERNACIONAL: LENNY FLAMENCO - CANTAUTOR   CONTENIDO: PRESENTACIÓN LA BIOGRAFÍA DEL CANTAUTOR, CUENTA SOBRE SU EXPERIENCIA LABORAL (MÚSICA), Y DESPUÉS SE PRESENTARON UN VIDEO CLIP "NUESTRO SALVADOR". \r\n\r\n\r\n\r\n', 'X', 2, 'ESTANTE 1 - FILA 5', 1, 0, 4, 152),
(31, 1, '15/15', 'EN LA SELVA', '1ERA Y 2DA MEDIA HORA', 2015, '00:58:18', '', 'BOLIVIA', '', 36, '', '1', '1ERA MEDIA HORA: INVITADO INTERNACIONAL: RICKY HOLLEY - CANTAUTOR      CONTENIDO: SE PRESENTARON LA BIOGRAFÍA DEL CANTAUTOR, CUENTA SOBRE EXPERIENCIA LABORAL, Y DESPUÉS SE PRESENTARON UN VIDEO "TODO ESTÁ BIEN". \r\n2DA MEDIA HORA: NO HAY, SÓLO SE PRESENTÓ UN MENSAJE DE SOLEDAD Y UN VIEDO CLIPS.\r\n', 'X', 2, 'ESTANTE 1 - FILA 5', 1, 0, 4, 152),
(32, 1, '17/15', 'EN LA SELVA', '2DA MEDIA HORA', 2015, '00:28:57', '', 'BOLIVIA', '', 36, '', '1', '2DA MEDIA HORA: INVITADO A DISTANCIA: ANGEL CAREAGA - COMUNICADOR     CONTENIDO: SE PRESENTÓ LA BIOGRAFÍA DE CAREAGA, CUENTA SOBRE SU EXPERIENCIA LABORAL.\r\n', 'X', 2, 'ESTANTE 1 - FILA5', 1, 0, 4, 152),
(33, 1, '20/15', 'EN LA SELVA', '1ERA Y 2DA MEDIA HORA', 2015, '00:59:13', '', 'BOLIVIA', '', 36, '', '1', '1ERA MEDIA HORA: INVITADO INTERNACIONAL: MELVIN AYALA - CANTAUTOR  CONTENIDO: SE PRESENTÓ LA BIOGRAFÍA DE AYALA, CUENTA SU HISTORIA DE VIDA, TAMBIÉN CUENTA SOBRE SU EXPERIENCIA LABORAL, Y SE PRESENTACIÓN UN VIDEO CLIP "DÁNZALE" ESTRENO EXCLUSIVO.\r\n2DA MEDIA HORA: NO HAY, SÓLO SE PRESENTÓ VIDEO CLIP, MENSAJE DE ESPERANZA, TAMBIÉN SE PRESENTÓ TEMA DE MARCO BARRIENTOS "DE GLORIA EN GLORIA" CONCIERTO.\r\n', 'X', 2, 'ESTANTE 1 - FILA 5', 1, 0, 4, 152),
(34, 1, '21/15', 'EN LA SELVA', '1ERA MEDIA HORA', 2015, '00:30:09', '', 'BOLIVIA', '', 36, '', '1', '1ERA MEDIA HORA: FABRICA DE CONSESIONES: ¿QUÉ TAN MALAAS SON LAS DROGAS? Y, ¿CÓMO PUEDO AYUDAR A UN AMIGO QUE TIENE ESTE PROBLEMA?     \r\n\r\n', 'X', 2, 'ESTANTE 1 - FILA 5', 1, 0, 4, 152),
(35, 1, '22/15', 'EN LA SELVA', '1ERA MEDIA HORA', 2015, '00:28:11', '', 'BOLIVIA', '', 36, '', '1', '1ERA MEDIA HORA:  LECTURA: 5 MANERAS QUE LOS CHICOS SE DESCONECTAN FINALMENTE DE LA IGLESIA. POR : TAMERA KRAFT\r\n\r\n', 'X', 2, 'ESTANTE 1 - FILA 5', 1, 0, 4, 152),
(36, 1, '10/15', 'EN LA SELVA', '2DA MEDIA HORA', 2015, '00:22:02', '', 'BOLIVIA', '', 36, '', '1', '2DA MEDIA HORA: INVITADO: REPRESENTANTE DEL GRUPO GODS    CONTENIDO: PRESENTACIÓN PARA LA PUBLICIDAD DE SU MÚSICA, EXPLICA SOBRE DE CÓMO EMPEZÓ LA MÚSICA Y TAMBIÉN INFORMA SOBRE LA PRESENTACIÓN MÚSICA, Y MOSTRARON SU MÚSICA EN EL SET. TAMBIÉN CUENTA SOBRE LA BIOGRAFÍA DE CADA UNO, Y AL FINAL PRESENTÓ UN VIDEO CLIP.', 'X', 2, 'ESTANTE 1 - FILA 5', 1, 0, 4, 152),
(37, 1, '22/15', 'EN LA SELVA', '2DA MEDIA HORA', 2015, '00:29:19', '', 'BOLIVIA', '', 36, '', '1', '2DA MEDIA HORA: INVITADO A DISTANCIA: ALEX ROA - CANTAUTOR    CONTENIDO: PRESENTÓ LA BIOGRAÍA DEL CANTAUTOR, EXPLICA SOBRE EXPERIENCIA LABORAL MARATÓNICA (MÚSICA), TAMBIÉN CUENTA DE SU FAMILIA Y PRESENTÓ UN VIDEO CLIP "SOMOS LIBRES".\r\n', 'X', 2, 'ESTANTE 1 - FILA 5', 1, 0, 4, 152),
(38, 1, '24/15', 'EN LA SELVA', '1ERA MEDIA HORA', 2015, '00:25:36', '', 'BOLIVIA', '', 36, '', '1', '2DA MEDIA HORA: INVITADO A DISTANCIA: JAY RODRIGUEZ - CANTAUTOR   CONTENIDO: PRESENTÓ LA BIOGRAFÍA DEL CANTAUTOR, CUENTA SOBRE SU EXPERIENCIA LABORAL (MÚSICA), EXPLICA DE CÓMO EMPEZÓ SU MÚSICA Y PRESENTÓ UN VIDEO CLIP "CARTA DE DIOS".\r\n', 'X', 2, 'ESTANTE 1 - FILA 5', 1, 0, 4, 152),
(39, 1, '25/15', 'EN LA SELVA', '2DA MEDIA HORA', 2015, '00:27:11', '', 'BOLIVIA', '', 36, '', '1', '2DA MEDIA HORA: INVITADO: FERNANDO RIVERA - CANTANTE   CONTENIDO: PRESENTÓ UN VIDEO CLIP "LLENOS DEL ESPÍRITU SANTO"-THALLES ROBERTO, PRESENTÓ LA BIOGRAFÍA DEL CANTANTE, CUENTA SOBRE SU EXPERIENCIA LABORAL (MÚSICA), EXPLICA SOBRE DE CÓMO DECIDIÓ ESTAR EN LA PAZ Y PRESENTÓ SU CD "CÓDIGO FER".  \r\n', 'X', 2, 'ESTANTE 1 - FILA 5', 1, 0, 4, 152),
(40, 1, '26/15', 'EN LA SELVA', '1ERA MEDIA HORA', 2015, '00:28:31', '', 'BOLIVIA', '', 36, '', '1', '1ERA MEDIA HORA: INVITADO A DISTANCIA: SANDRA PARI - PRODUCTORA AUDIOVISUAL  CONTENIDO: PRESENTÓ LA BIOGRAFÍA DE LA COMUNICADORA, CUENTA SOBRE SU EXPERIENCIA LABORAL. ', 'X', 2, 'ESTANTE 1 - FILA 5', 1, 0, 4, 152),
(41, 1, '29/15', 'EN LA SELVA', '1ERA MEDIA HORA', 2015, '00:23:51', '', 'BOLIVIA', '', 36, '', '1', '1ERA MEDIA HORA: INVITADO A DISTANCIA: BENJAMIN RIVERA - CANTAUTOR   CONTENIDO: PRESENTÓ LA BIOGRAFÍA DEL CANTAUTOR, CUENTA SOBRE SU EXPERIENCIA LABORAL, EXPLICA LA FORMA DE SU TRABAJO Y PRESENTÓ UN CONCIERTO "HIJO DE DAVID".', 'X', 2, 'ESTANTE 1 - FILA 5', 1, 0, 4, 152),
(42, 1, 'SP', 'SU PRESNECIA', 'CIELOS ABIERTOS', 2015, '01:02:00', '', '', '', 4, '', '1', 'DVD + CD ORIGINAL\r\n1. ABRE LOS CIELOS \r\n2. TODO LO BUENO\r\n3. LA CIMA\r\n4. COMO UN TRUENO\r\n5. CERCA DE MÍ\r\n6. LOS COLORES\r\n7. PEGADITO\r\n8. TODA NACION\r\n9. EN CADA NACIÓN\r\n10. SANTO', 'X', 2, 'ESTANTE 1', 1, 0, 5, 5),
(43, 1, 'WS', 'INTEGRITY´S WORSHIP', 'CALLS TO WORSHIP', 0, '00:00:00', '', '', '', 0, '', '1', '', 'X', 1, 'ESTANTE 2', 1, 0, 5, 80),
(44, 1, 'XK', 'XTREME KIDS', 'VOY A GRITAR', 2011, '00:48:49', 'Vastago Producciones', '', '', 33, '', '1', 'DVD ORIGINAL\r\n1. Tómalo\r\n2. Voy a gritar\r\n3. Quiero estar \r\n4. Tú eres lo mejor\r\n5. Tu amor es grande\r\n6. Vine a adorarte\r\n7. Cuan grande es Dios\r\n8. Soy una princesa\r\n9. No puedo dejar\r\n10. Como un Rey\r\n11. Todo, todo, todo\r\n12. Whoah oh oh', 'X', 1, 'Estante 1', 1, 0, 5, 80),
(45, 1, 'TC', 'TC', 'HOLLYWOOOD', 2008, '01:15:13', '', 'Mexico', '', 0, '', '1', '1. Intro\r\n3. Locos por Jesús\r\n3. Aquí estás \r\n4. Eres\r\n5. Enamorados\r\n6. Intro a Regalo de Dios\r\n7. Regalo de Dios\r\n8. Ese soy yo\r\n9. La calle\r\n10. Solos musicales\r\n11. Solos musicales\r\n12. Cada día \r\n13. HOy te permito odiar\r\n14. Héroe\r\n15. Primer amor\r\n16. Algún día\r\n17. Yo te extrañare\r\n18. Llueve', 'X', 1, 'Estante 2', 1, 0, 5, 5),
(46, 1, 'JAR', 'JESÚS ADRIÁN ROMERO', 'EL AIRE DE TU CASA (EN VIVO)', 0, '01:30:00', '', 'EEUU', '', 6, '', '1', '1 DVD CONCIERTO\r\n1. El aire de tu casa\r\n2. Mi Universo\r\n3. Espérame \r\n4. Aquí estoy\r\n5. Dame tus ojos\r\n6. Te veo\r\n7. Me dice ue me ama\r\n8. De ti dependo\r\n9. Cada día\r\n10. Mi vida sin ti\r\n11. Mi corazón te canta\r\n12.Pegao a ti\r\n13. Mi herencia\r\n14. Dame este Monte\r\n15. No en como yo\r\n16. E s por tu gracia\r\n2. DVD 20 MIN. VIDEO CLIPS\r\n1. El aire de tu casa\r\n2. Mi universo\r\n3. Te veo\r\n4. Aqui estoy\r\n\r\n', 'X', 1, 'Estante 2', 1, 0, 5, 5),
(47, 1, 'JAR', 'JESÚS ADRIÁN ROMERO', 'FUE MÁS CLARO QUE LA LUNA', 2008, '02:05:00', '', 'LOS ÁNGELES, CALIFORNIA', '', 6, '', '1', '1DVD ORIGINAL\r\n1. Ayer te vi\r\n2. Fue más claro de la luna\r\n3. Tienen tu color\r\n4. Se desbaratan mis sueños\r\n5. Más que un concepto\r\n6. Raones pa´ vivir\r\n7. Aquí estoy\r\n8. No hay paredes\r\n9. Mi entorno\r\n10. No es como yo\r\n11. Es por tu gracia\r\n12. Dame\r\n13. Mi dia\r\n14. Cuenta conmigo\r\n15. Pegao a ti\r\n16. Mi herencia\r\n17. Princesas mágicas\r\n18. Mi Universo\r\n19. Sólo pienso en ti\r\n20. Si hubiera stado allí\r\n21. Como la brisa\r\n22. tú estás aquí', 'X', 1, 'Estante 2', 1, 0, 5, 5),
(48, 1, 'AWINMS', 'A WALK IN MY SHOES', 'AUDIO ESPAÑOL E INGLÉS  - SUBT ESPAÑOL', 2010, '01:25:06', '', 'EE.UU.', '', 18, '', '1', 'Stressed-out high school teacher Trish Fahey can´t understand her student´s lack of effort and why their parents don´t seem to care. This is especially true of Justin Kremer, a popular, skatevoard-loving, basketball star who is underperformingt in her class. Trish has him suspended from the team and quickly chalks up the situation as a case of bad parenting.', 'X', 1, 'Estante 2', 1, 0, 5, 98),
(49, 1, 'MW', 'MARCOS WITT', 'DIOS DE PACTOS', 0, '01:33:01', '', '', '', 2, '', '1', '1 DVD ORIGINAL\r\n1. Yo te busco\r\n2. Obertura para piano y orquesta\r\n3. Aquí estoy otra vez\r\n4. Oh gracias encontré la vida\r\n5. Vivifícame\r\n6. Lávame\r\n7. Sólo por tu sangre\r\n8. Mi pan, mi luz\r\n9. Amarte más\r\n10. Dios de Pactos\r\n11. Celebraré, me alegraré\r\n12. Al rey', 'X', 1, 'Estante 2', 1, 0, 5, 5),
(50, 1, 'CR', 'CUENTA REGRESIVA', 'UN PRELUDIO AL ARMAGEDÓN', 2011, '01:47:00', '', 'EE.UU.', '', 16, '', '1', 'Con los distubios en el Medio Oriente, el principal aliado de Israel es lanzado a una inminente guerra: los Estados Unidos son ahora el objetivo mientras comienza la batalla por Jerusalén. Basada en el éxito de ventas del Dr. Jhon Hagee, "Cuenta regresiva" resalta la realidad de un inevitable conflicto entre Israel y el islam. Cuando arma nueclares entran de contrabando a los Estados Unidos, el veterano agente del FBI, Shane Daughtry se enfrenta a una tarea imposible: encontrarlas antes que sean detonadas. El tiempo se agota y las únicas personas capaces de ayudar son un fracasado traficante de armas, un agente de Mossad convertido y un inflexible director adjunto de la CIA, interpretado por Randy Travis.', 'X', 1, 'Estante 2', 1, 0, 5, 11),
(51, 1, 'IC', 'ICE CASTLES', '"AN INSTANT ROMANTIC CLASSIC"', 2010, '01:35:00', '', 'EE.UU.', '', 18, '', '1', 'Young, beautiful, talented Alexis Winston comes from nowhere to become a figure skating superstar. But her rise to stardom isn´t easy. She has to push herself, reinvent herself, and most painfully of all, leave her hometown boyfriend behind. When a tragic fall leaves her blind, she needs someone to believe in her, to lover her; someone to convince her she has the strength to skate and dream again.', 'X', 1, 'Estante 2', 1, 0, 5, 11),
(52, 1, 'F', 'FIREPROOF', 'NEVER LEAVE YOUR PARTHER BEHIND', 2008, '01:58:00', '', 'EE.UU.', '', 18, '', '1', 'From the Creators of Facing the Giants comes a powerful tale of triumph, honor and forgiveness.\r\nKirk Cameron stars as Calev Holt, a heroic fire captain who values dedication and service to others adove all else. But the most important partnership in his life, his marriage, is about to transform his life and marriage through the healing powe of faith and fully embrace the fireman´s code: Never Leave Your Partner Behind.', 'X', 2, 'Estante 2', 1, 0, 5, 11),
(53, 1, 'FS', 'FOREVER STRONG', 'THE GREATEST VICTORIES ARE BORN IN THE HEART', 2009, '01:52:00', '', 'EE.UU.', '', 18, '', '1', 'A stand-up-and-cheer movie about loyalty, courage, and conviction, set amid the intense and often fierce competition of championship rugby.\r\nBest friends and teammates Rick and Lars become bitter rivals when Rick´s free-spirited lifestyle lands him in juvenile detention. there a concerned counselor and a national chanpionship rugby coach recruit Rick for a new team - and a new direction.', 'X', 2, 'Estante 2', 1, 0, 5, 11),
(54, 1, 'AC', 'ALEX CAMPOS', 'TOUR TE PUEDO SENTIR', 2010, '01:53:03', '', '', '', 6, '', '1', '2 DVDS ORIGINALES\r\nDISCO 1\r\n1. Más que ayer\r\n2. Tu planeta\r\n3. La fruta prohibida\r\n4. Te estoy esperando\r\n5. Eres mi sol\r\n6. Sueño de morir\r\n7. Come on\r\n8. Junto a ti\r\n9. Te quiero\r\n10. Cuidare de ti\r\nDISCO 2\r\n1. Su dulce voz\r\n2. Me robaste el corazón\r\n3. El sonido del silencio\r\n4. Como el color de la sangre\r\n5. Te puedo sentir\r\n6. Mi amor, tu amor\r\n7. Tu poeta\r\n8. Busco\r\n9. Dimelo\r\n10. Tu eres\r\n11. Dios creo\r\n12. Me dijo', 'X', 2, 'Estante 2', 1, 0, 5, 5),
(55, 1, 'FL', 'FLYWHEEL', 'IN EVERY MAN´S LIFE THERE IS A TURNING POINT', 2007, '01:54:00', '', 'EE.UU.', '', 18, '', '1', 'Jay Austin wants to sell used cars in the worst way... and that´s exactly how he does business at his dealership. Promising much more than he can ever deliver, he´ll do whatever it takes to sell a car. His manipulative ways permeate all of his relationships-even his wife and son know they can´t trust him.\r\nBut as Jay works on restoring a classic convertible, he begins to see that God is working on restoring him as well. Coming face-to-face with reality of how he truly conductos himself, Jay Austin begins the ride of his life as he learns to honor God with his business, his relationships, and his life!', 'X', 2, 'Estante 2', 1, 0, 5, 11),
(56, 1, 'GF', 'GRACIA INFINITA', 'UN HORRIBLE CRIMEN', 2011, '01:29:00', '', 'EE.UU.', '', 18, '', '1', 'En el otoño de 2006, la tranquilidad de la pequeña comunidad Nickel Mines en Pensilvania, Estados Unidos; fue violentada con un crimen inimaginable. Una tragedia que captó la atención de una nación, también revela una destacable perspectiva entre la vida y la muerte, y ofrece una inesperada lección acerca del perdón...', 'X', 2, 'Estante 2', 1, 0, 5, 11),
(57, 1, 'GU', 'GRACE UNPLUGGED', 'NOTHING CAN STOP A FAMILY´S LOVE', 2014, '01:41:00', '', 'EE.UU.', '', 18, '', '1', 'Grace is a Christian teen who is struggling to find her own way in life. Against the wishes of her overly protective father, she runs away from home to chase her musical dreams. While her father puts his faith in God to watch over his daughter, only Grace can decide if she will she find her way back to her faith and family?', 'X', 2, 'Estante 2 ', 1, 0, 5, 11),
(58, 1, 'IILWCG', 'I´M IN LOVE WITH A CHURCH GIRL', 'COME AS YOU ARE', 2013, '01:59:00', '', 'EE.UU.', '', 18, '', '1', 'Miles Montego has it all. Including a past. He was king of the streets as a high-level drug trafficker, and although he has tried to move on, the DEA isn´t convinced. Miles is still rolling with his old friends, aned the feds are certain he has not fully retired from his criminal past. When Miles meets Vannesa, a woman who is different than every other woman he´s known, he is drawn to her veauty and her spirituality. As their connection grows deeper, both are tested to their last ounce of faith in God and in each other.', 'X', 2, 'Estante 2', 1, 0, 5, 11),
(59, 1, 'S3L', 'STRIKE 3', 'LIVE', 2006, '00:00:00', '', '', '', 9, '', '1', 'DVD + CD\r\n1. The trust\r\n2. Intencity\r\n3. Jamas\r\n4. Si pudieras ver\r\n5. You can''t  Break this\r\n6. 3er poder\r\n7. Vivir Así\r\n8. Estaré Aquí\r\n9. Juntos los dos\r\n10. Donde estas\r\n11. unto a ti\r\n12. Para cantarte\r\n13. Transformame\r\n14. Sombra sin cuerpo\r\n15. Free man\r\n16. Break Down\r\n17. Dame más\r\n18. NAzareno\r\n', 'X', 2, 'Estante 2', 1, 0, 5, 86),
(60, 1, 'TC', 'TERCER CIELO', 'CREERÉ', 2009, '01:33:17', '', '', '', 9, '', '1', 'DVD ORIGINAL\r\n1. Locos por Jesús\r\n2. si no estás junto a mí\r\n3. Entre tu y yo\r\n4. Entre tu y yo\r\n5. Eres\r\n6. Exagerado amor\r\n7. Cada día\r\n8. Llueve\r\n9. Por fe\r\n10. Medley a paino por JC Rodríguez\r\n11. Mi último día\r\n12. vuelve a soñar\r\n13. No tengas miedo\r\n14. yo te extrañaré\r\n15. Mi destino\r\n16. Música pir dentro\r\n17. Latinoamérica\r\n18. Creeré', 'X', 2, 'Estante 2', 1, 0, 5, 5),
(61, 1, 'EEYV', 'EN ESPÍRITU Y EN VERDAD', 'GLORIOSO REY', 2008, '00:47:52', '', 'EEUU', '', 0, '', '1', '1 DVD ORIGINAL\r\n1. Los Santos\r\n2. Rodeas en la eternidad\r\n3. En tu luz\r\n4. Generación que Danza\r\n5. Glorioso Rey\r\n6. Perfume a tus pies\r\n7. Rey de Justicia\r\n8. Me dice Salvador', 'X', 2, 'Estante 2', 1, 0, 5, 5),
(62, 1, 'NGL', 'NO GREATER LOVE', 'FIRST LOVE. SECOND CHANCE.', 2009, '01:49:00', '', 'EE.UU.', '', 18, '', '1', 'Jeff and Heather were the "lucky ones". Best friesds from childhood, high school sweethearts and married by 22, they were inseparable soul mates. after the birth of their son, Heather fell into a deep depression. Hopelessly lost, she vanished. Ten years after his wife´s disappearance, Jeff´s world is dramatically rocked when Heather shockingly reappears in the most unusual place. With a score composed and performed by award-winning contemporary Christian music artist Michelle Tumes, No Greater Love is a touching story about faith and forgiveness for the family.', 'X', 2, 'Estante 2', 1, 0, 5, 11),
(63, 1, 'LID', 'LAY IT DOWN', 'WHEN EVERTHING IS ON THE LINE', 2001, '00:50:00', '', 'EE.UU.', '', 16, '', '1', 'Is an wplosive drama set against the teenage world of illegal street racing. Ride with Ben Destin as he finds the way of the narrow road to eternal life through Jesus Christ. Once he finds this route, he encouranges all of his friends to discover the same freedom.', 'X', 2, 'Estante 2', 1, 0, 5, 11),
(64, 1, 'LFDK', 'LA FE DE KING', 'UNA PELÍCULA EXCEPCIONAL QUE PUEDE CAMBIAR VIDAS', 2013, '01:48:00', '', 'EE.UU.', '', 18, '', '1', 'Durante el cumplimiento de su sentencia den la penitenciaría juvenil. el joven Brendan King encuntra esperanza en su nueva relación con Cristo. En el transcurso de su adapatación a la nueva vida en los suburbios y su reintegración a los estudios, Brendan encuentra apoyo que lucha con un dolor reprimido. La reaparición de los miembros de su antigua pandilla y los recuerdos de su vida pasada amenazan su esfuerzo por una vida regenerada. En su momento más oscuro, Brendan encontró la fe; ahora debe decidir si esa fe vale el precio de aferrarse a ella.', 'X', 2, 'Estante 2', 1, 0, 5, 11),
(65, 1, 'OB', 'OCTOBER BABY', 'EVERY LIFE IS BEAUTIFUL', 2012, '01:49:00', '', 'EE.UU.', '', 18, '', '1', 'As the curtain rises, Hennag steps onto the stage... only to collapse moments later. Countless medical tests all point to one inderlying factor: Hannah´s diddicult birth. The doctor´s diagnosis is nothing compared to her parents´ revelation: Hannag was adopted-after a failed abortion attempt.', 'X', 2, 'Estante 2', 1, 0, 5, 11),
(66, 1, 'PLHDUG', 'PENDRAGON LA HERENCIA DE UN GUERRERO', 'AQUIEL QUE DIO LA VISIÓN AUN LLAMA', 2011, '01:56:00', '', 'EE.UU.', '', 16, '', '1', 'Es la historia del jover Arturo, cuyo padre Pendragon, es asesinado en una de las batallas entre los británicos y sajones, quines luchan por la tierra Britania. Al enfrentarse con la realidad de la muerte de su familia, y la esclavitud a la cual es sometido; Arturo es invadido por las dudas del plan de Dios para su vida. En el transcurso de los acontecimientos, Arturo comprende que la visión de su padre "El Pendragon" no se basaba en la fuerza del hombre sino en el plan y la visión de Dios para liberar a Britania de las garras de los sajones. Llena dwe acción, impresionantes escenas y mensajes de fe, valentía, amor y el llamado de Dios, Pendragon cautivará su atención y ciertamente inspirará a su familia para toda la vida.', 'X', 2, 'Estante 2', 1, 0, 5, 11),
(67, 1, 'PLQP', 'PASE LO QUE PASE', '¿CUÁNDO COMIENZA LA VIDA?', 2011, '01:33:00', '', 'EE.UU.', '', 18, '', '1', 'Cuando el estudiante Caleb Hogan se encuentra en la posicón de debatir sobre la pregunta: ¿Cuándo comienza la vida?, enfrrenta el peligro de perder la competición más importante de su vida, al igual que el paoyo de su madre. Corre el riesgo de perder el anhelado título al igual que el corazón de su compañera de equipo, Rachel. Al tiempo que su madre se prepara para el debate más extraordinario en la Suprema Corte de Justia, Caleb descurbre el valor y la fuerza de la corriente Pro-vida. Pero en asuntos legales de vida o muerte, ¿existe realmente un ganador?.', 'X', 2, 'Estante 2', 1, 0, 5, 11),
(68, 1, 'SWL', 'SALVADOR', 'WORSHIP LIVE', 2003, '01:04:09', '', '', '', 0, '', '1', '1 DVD ORIGINAL\r\n1. David Danced\r\n2. Lord I Come Before you\r\n3. God People\r\n4. Con Poder\r\n5. Open the Eyes\r\n6. I love you lord\r\n7. Those Who Trust\r\n8. wefall Down\r\n9. I colud sing of your love forever\r\n10. My desire\r\n11. As the deer\r\n12. Here I am to Worship\r\n13. Montaña', 'X', 2, 'Estante 2', 1, 0, 5, 86),
(69, 1, 'BD', 'BRIAN DOERKSEN', 'LEVEL GROUND THE LIVE EXPERIENCE', 0, '02:05:40', '', '', '', 0, '', '1', '1 DVD ORIGINAL\r\n1. Intro\r\n2. Welcome to the place of level ground\r\n3. The Jesús way\r\n4. Lifelong Passion\r\n5. Grace Stories\r\n6. No condemnation intro\r\n7. No condemnation \r\n8. Here is love\r\n9. Interview With Brian Doerksen and Teresa Trask\r\n10. Everything \r\n11. With You love me in the Winter\r\n12. Giver of life\r\n13. Grace Stories\r\n14. Broken and Beautifull\r\n15. Enter the  rest of God\r\n16. Altar of love\r\n17. Grace Stories\r\n18. Whatever comes\r\n19. Thank you for the cross\r\n20. First', 'X', 2, 'Estante 2', 1, 0, 5, 86),
(70, 1, 'TE', 'THE ENCOUNTER', 'AUDIO ESPAÑOL E INGLÉS  - SUBT ESPAÑOL', 2010, '01:25:00', '', 'EE.UU.', '', 18, '', '1', 'Stranded in the middle of noehere five strangers find themselves marooned in a deserted roadside diner. An arrogant businessman, a lonely single woman, a couple on the verge of divorce, and a youthful runaway all come face to face with a diner owner who serves them more than temporal nourishment. This genial host is a certain Nazarene, who knows all of their secrets and possesses the answers to all of their problems - if only they would trust him. It is a miraculous Encounter that will leave them all changed.', 'X', 2, 'Estante 2', 1, 0, 5, 11),
(71, 1, 'TG', 'THE GATHERING', 'JESUS IS COMING IS HE COMING FOR YOU?', 2003, '00:57:00', '', 'EE.UU.', '', 16, '', '1', 'Michael Carey´s world turns upside-down when the successful marketing executive catches a glimpse of the near future. These visions could not come at a worse time for his marriage, his job or his friendships. Michael struggles to understand the meaning of the messages and must convince his loved ones that Jesus will soon return. Who will listen before it´s too late? Who will heed the warning? State of the art special effects captures the drama of the Rapture in this ultimate End Times story. This spectacular movie will have you and those you love asking whether you are ready for Christ´s return.', 'X', 2, 'Estante 2', 1, 0, 5, 11),
(72, 1, 'TN', 'TÍO NINO', 'AUDIO ESPAÑOL E INGLÉS  - SUBT ESPAÑOL', 2011, '01:41:45', '', 'EE.UU.', '', 18, '', '1', 'Con un trabajo absorbente, el ejecutivo Robert Micelli cuenta con muy poco tiempo para su linda esposa, su rebelde hijo adolescente Bobby y su hija de 12 años Gina quien desesperadamente quiere un cachorro. Esta desconectada familia es transformada por el anciano y olvidado Tío Nino quien llega improvisadamente a visitarlos. Las costumbres sencillas y la curiosidad de Nino lo convierten en una "rareza" del vecindario y un bochorno para Robert. Lentamente Nino se gana el cariño de todos los miembros de la familia, enseñandole a Robert a disfrutar de las cosas sencillas de la vida: buena comida, buena música y lo más importante, ¡la familia!', 'X', 2, 'Estante 2', 1, 0, 5, 11),
(73, 1, 'TNS', 'THE NATIVITY STORY', 'THE JOURNEY OF A LIFETIME, A STORY FOR ALL TIME', 0, '01:41:00', '', 'EE.UU.', '', 15, '', '1', 'Is "a beautiful telling of one of the word´s most familiar stories". It was the cruelest of times. Under Herod´s torturous reign, families struggled to survive and yet, in the midst of utter turmoil, a young woman´s faith was put to the test. Join Mary and Joseph on an incredible journey of hope and discovery. Epic in its scope, yet intimate in its portrayal of this historical family, this "a family feature that will be cherished for years to come".', 'X', 2, 'Estante 2', 1, 0, 5, 11),
(74, 1, 'TSJS', 'THE SECRETS OF JONATHAN SPERRY', 'WHAT HE TEACHES THEM EILL LASTA FOREVER', 2010, '01:36:00', '', 'EE.UU.', '', 18, '', '1', 'Dustin and his two best buddies are twelve year olds looking forward to a summer of fun in 1970. When Dustin mows the lawn of seventy-five-year-old Jonathan Sperry, a man he has seen at church, a unique friendship develops. What happens the rest of this summer is something Dustin and his friends will never!', 'X', 2, 'Estante 2', 1, 0, 5, 11),
(75, 1, 'TUG', 'THE ULTIMATE GIFT', 'LIFE IS HOW YOU LIVE IT NOT HOW YOU SPEND IT', 2006, '01:57:00', '', 'EE.UU.', '', 18, '', '1', 'Based on Jim Stvall´s best-selling novel, The Ultimate Fift sends a young man of privilege on an improbable journey. Trust fund baby Jason Stevens loves all of life´s gifts, as long as they´re bankable. But when his wealthy grandfather, Red, dies, Jason receives a most unusual inheritance: twelve tasks, which Red calls "gifts", to challenge Jason to grow as a man. If he succeds, the experience will not only change Jason forever, bur he will discover the real meaning of wealth.', 'X', 2, 'Estante 2', 1, 0, 5, 11),
(76, 1, 'UTAC', 'UN TOQUE AL CORAZÓN', 'AUDIO ESPAÑOL E INGLÉS  - SUBT ESPAÑOL', 2013, '01:36:00', '', 'EE.UU.', '', 18, '', '1', 'Rob Decker, el sagaz agente deportivo lo tiene todo: su propia agencia de repressentación de atletas, éxito en los negocios, un auto deportivo lujoso y además es muy astuto. En un viaje repentino al pequeño poblado de Middletown, se ve forzado a quedarse en el pueblo más tiempo del que tenía planeado. En el transcurso de unos días se da cuetna que la calmada vida del lugar, la fe en Dios y la vida sencilla y sin apuros de los habitantes discrepan pronunciadamente con todo lo que Ron conoce y valora.', 'X', 2, 'Estante 2', 1, 0, 5, 11),
(77, 1, 'HL', 'HILLSONG LIVE', 'A BEAUTIFUL EXCHANGE', 0, '01:14:24', '', 'AUSTRALIA', '', 0, '', '1', '1 DVD ORIGINAL\r\n1. You\r\n2. Open my eyes\r\n3. Forever reign\r\n4. The one who saves\r\n5. Like incense/ Sometimes by step\r\n6. The greatness of our god\r\n7. The father´s heart\r\n8. Our god is love\r\n9. Love like fire\r\n10. Believe\r\n11. Thank you\r\n12. Beatiful exchange', 'X', 2, 'Estante 2', 1, 0, 5, 86),
(78, 1, 'J', 'JULISSA', 'SU VIDA, SU MÚSICA Y SUS VIDEOS', 2004, '00:00:00', '', '', '', 9, '', '1', '1DVD ORIGINAL\r\n1. Enamorada\r\n2. El amor\r\n3. Amarte más\r\n4. Él no pereció\r\n5. Pienso en su amor\r\n6. Fueron tus manos\r\n7. Me salvó la vida\r\n8. Con cada Latido\r\n9 Mi todo\r\n10. Tu deseo\r\n11. Embrace Me\r\n12. Te has heho realidad\r\n13. Hermano mio', 'X', 2, 'Estante 2', 1, 0, 5, 5),
(79, 1, 'SP', 'SU PRESENCIA', 'CONCIERTO FREAK', 2011, '01:02:02', '', '', '', 0, '', '1', '1 DVD ORIGINAL\r\n1. Intro\r\n2. Goliat\r\n3. El cielo en la tierra\r\n4. Mono vs. Mono\r\n5. Conoceré\r\n6. estrella de la mañana\r\n7. Perdóname\r\n8. Parents\r\n9. Yo te necesito\r\n10. El reino\r\n11. Cool Sound\r\n12. Contigo soy feliz\r\n13. Stomp\r\n14. Plantado\r\n15. Conocerte es amarte\r\n16. Como las estrellas\r\n17. The Colombian Times\r\n18. Jesús Freak \r\n19. Cierre\r\n20. Amanecer de Fuego\r\n21. Fuego\r\n', 'X', 2, 'Estante 2', 1, 0, 5, 5),
(80, 1, 'HL', 'HILLSONG LONDON', 'HAIL TO THE KING', 2009, '01:07:32', '', '', '', 9, '', '1', '1 DVD ORIGINAL\r\n1. Hail to the ing\r\n2. You deserve\r\n3. Rise\r\n4. C.I.T.Y\r\n5. Now\r\n6. Hes is greater\r\n7. You are here (The same power)\r\n8. Look to the cross\r\n9. I receive  \r\n', 'X', 2, 'Estante 2', 1, 0, 5, 86),
(81, 1, 'HC', 'HILLSONG CHAPEL', 'YAVEH', 2010, '01:08:55', '', '', '', 0, '', '1', '1 DVD ORIGINAL\r\n1. Hosanna\r\n2. Yovill come\r\n3. Run\r\n4. The time has come\r\n5. Saviour King\r\n6. Yaveh\r\n7. Came to my rescne\r\n', 'X', 2, 'Estante 2', 1, 0, 5, 86),
(82, 1, 'AAGCSS', 'AN AMERICAN GIRL CHRISSA STANDS STRONG', 'BE COURAGEOUS ', 2009, '01:30:00', '', 'EE.UU.', '', 18, '', '1', 'Meet Chrissa Maxwell. She and her family have just moved, and Chrissa has to start at a new friends?\r\nOn her very first day, Chrissa is seated with thres girls who greet her with teasing and tricks. The Mean Bees really know how to sting - they bully Cgrissa in class, on the bus, online, and even at swin club. Chrissa can´t seem to make any new friends; not wven with the girl who seems to need a friend the most. When the biggest bully becomes Chrissa´s swimming rival, the tauting finally goes too far.', 'X', 2, 'Estante 2', 1, 0, 5, 11),
(83, 1, 'SOG', 'SON OF GOD', 'AUDIO ESPAÑOL E INGLÉS  - SUBT ESPAÑOL', 2014, '02:18:00', '', 'EE.UU.', '', 18, '', '1', 'From producers Mark Burnett and Roma Downey comes Son of God - the mosto important chapter of the Greatest Story Ever Told for a whole new generation of families to enjoy. Acclaimed Portuguese actor Diogo Moorgado delivers a spectacular portrayal of Jesus as this powerful and inspirational feature film depicts the life aof Christ, from His humble birth through His teachings, crucifixion and ultimate resurrection.', 'X', 2, 'Estante 2', 1, 0, 5, 11),
(84, 1, 'EMP', 'EL MEDALLÓN PERDIDO', 'ENCONTRARLO ES SOLO EL COMIENZO', 2013, '01:38:00', '', 'EE.UU.', '', 16, '', '1', 'Las Aventuras de Billy Stone comienza cuando Daniel Anderson visita un orfanato para dejar un donativo y los nños le piden que les cuente un cuento. Daniel les cuenta la historia de Billy Stone y Allie, dos amigos de 13 años que encuntran un medalión que había estado perdido por cientos de años y accidentalmente los transporta al pasado a una isla remota. Para salvar la vida de Allie, Billy le entega el medallón a Cobra, un guerrero del mal que gobierna la isla. Para recurar el medallón y salvar la isla de la exclavitud, Billy Allie debe aprender a trabajar en equipo con el joven y arrogante heredero al trono, su mejor amigo y un anciano sabio. Juntos, aprnederán a trabajar en equipo y cuando lo hacen, grandes cosas sucederán.', 'X', 2, 'Estante 2', 1, 0, 5, 11),
(85, 1, 'SF', 'STANDING FIRM', 'ONE FAMILY. ONE TRAGEDY. GOD´S PURPOSE.', 2010, '01:20:00', '', 'EE.UU.', '', 18, '', '1', 'David, a widower, is working himself to death. Late nights doing paperwork and runnig on fumes is the norm. Bills are piling up by the week, and foteclosure looms on the horizon. Blaming God for his wife´s death, he ends his relationship with the church.', 'X', 2, 'Estante 2', 1, 0, 5, 11),
(86, 1, 'PAP', 'PETER AND PAUL', 'AUDIO ESPAÑOL E INGLÉS  - SUBT ESPAÑOL', 0, '03:14:00', '', 'EE.UU.', '', 18, '', '1', 'This epic network television mini-series brings to life the precarious existence of early Christianity. The new movement is beset by violent opposition from without and constant turmoil from within. Two key leaders emerge - Peter and Paul - who struggle to keep the faith alive. This dramatic presentation follows the pair. together and separately, through three epochal decades. Included are the stoning of Stephen, the road to Damarcus their encounter in Jerusalem, their contravels to Asia Minor and Greece. Peter and Paul´s clashes over Jewish law, and Peter´s decision to follow in Paul´s courageous fottsteps. SSThe drama concludes in Rome in approximately AD. 64 with the beheading of Paul and the crucifixion of Peteer under Emperor Nero.', 'X', 2, 'Estante 2', 1, 0, 5, 11),
(87, 1, 'TRW', 'THE RIVER WITHIN', 'IN EVERYONE´S LIFE THE TRUTH WILL SURFACE.', 2009, '01:36:01', '', 'EE.UU.', '', 18, '', '1', 'It is question that has haunted Jason ever since he heard his dad utter it prior to his death several years ago. Now, fresh out of law school, and with an upcoming har wam to prepare for, the highly motivated and strictly disciplined Jason returns to the small Southern town he grew up in to spend the summer studying.', 'X', 2, 'Estante 2', 1, 0, 5, 11),
(88, 1, 'FTG', 'FACING THE GIANTS', 'AUDIO ESPAÑOL E INGLÉS  - SUBT ESPAÑOL', 2007, '01:52:00', '', 'EE.UU.', '', 18, '', '1', 'After six consecutive losing seansons, high school football coach Grant Taylor believes things can´t get any worse. He´s wrong. With fear and failure defeating him in football and in life, the downtrodden coach and husband turns to God in desperation. Trusting that God can somehow do the impossible, Coach Taylor and his Shiloh Christian Eagles soon discover how faith plays out on the field...', 'X', 2, 'Estante 2', 1, 0, 5, 11),
(89, 1, 'LSDUA', 'LA SUBASTA DE UN ALMA', 'AUDIO ESPAÑOL E INGLÉS  - SUBT ESPAÑOL', 0, '01:54:18', '', 'PUERTO RICO', '', 14, '', '1', 'Es una presentación del ministerio Mizpa; grabado en los estudios de La Cadena Del Milagro, Camuy, Puerto Rico, Ministerio Cristo Viene 1989', 'X', 2, 'Estante 2', 1, 0, 5, 11),
(90, 1, 'BTS', 'BEHIND THE SUN', 'AUDIO ESPAÑOL E INGLÉS  - SUBT ESPAÑOL', 1995, '00:56:00', '', '', '', 18, '', '1', 'Behind the Sun follows the storiy of Samir Majan, a young man born and raised a Muslim in the Middle Eastwho attended colege in America. After receiving a degree from a university in Chicago, he begins his trip back home to see his family. But something has drastically changed in the young man´s life since coming to the States.', 'X', 2, 'Estante 2', 1, 0, 5, 11),
(91, 1, 'LSM', 'LA SANTA MUERTE', 'TODO FAVOR TIENE UN PRECIO', 2014, '01:40:00', '', 'MÉXICO', '', 18, '', '1', 'Tres historias entrelazadas en diferentes esfereas sociales, hacen de esta una película emocionante, ágil, dramática... Un matrimonio pudiente acude a la Santa Muerte para sanar a su hija de un cáncer en el cerebro... Una sensual mujer se acerca a ella para atraer el amor prohibido de un hombre... Un "Don Nadie" lleno de deudas y desempleado, consigue trabajo y prospera gracias a su merced pero... ningún favor es gratis. La Santa Muerte es una ama intolerante y exigente... ¡Todo favor tiene un precio!', 'X', 2, 'Estante 2', 1, 0, 5, 11),
(92, 1, 'EAF', 'EL AVISO FINAL', 'AUDIO ESPAÑOL E INGLÉS  - SUBT ESPAÑOL', 0, '01:14:32', '', '', '', 16, '', '1', '¿Sabe que le dpara el futuro para usted, su familia, su trabajo, su país y el mundo entero? Se está enfrentando una crisis mundial en todas las áreas con proporciones catastróficas que en un futuro muy cercano hará estallar la apariencia de normalidad en que vivimos, los acelerados días con noticias aun más trágicas y sucesos que se registran en todo el mundo, transformaran todo aquello que nos es familiar.', 'X', 2, 'Estante 2', 1, 0, 5, 11),
(93, 1, 'I', 'INQUEBRANTABLE', 'LA JUVENTUD DE JOSH MCDOWELL', 2011, '01:08:00', '', '', '', 18, '', '1', 'Josh McDowell nació a la cruel realidad de la vida. El alcoholismo de su padre, que lo hacía violento, aparejado con un abuso sexual sufrido en su infancia llenaron a McDowell de verguienza. Con los años, eso lo alejó más y mpas de Cristo, hasta que finalmente se convirtió en ira. Ansioso por clamar contra la existnecia de Dios, McDowell buscó colflicto con los cristianos que encontr{o en la universidad. Se burló de sus creencias y menospreció su fe hasta que ellos le plantearon un desafío: prueba que Dios no eciste. De manera obsesiva, McDowell viajó por el mindo registrando municiosamente los textos históricos sagrados en busca de evidencia que contradijera el cristianismo. Lo que halló en lugar de ello fue la verdad y una fe que llevó a la gracia y redimió a un hombre quebrantado.', 'portadas/inquebrantable-DVD.jpg', 2, 'Estante 2', 1, 0, 5, 14),
(94, 1, '1-14', 'EN LA SELVA', '1RA MEDIA HORA ', 2014, '00:28:08', '', 'BOLIVIA', '', 36, '', '1', 'SÉPTIMA TEMPORADA:\r\nFABRICA DE CONFESIONES:\r\nSOY MAYOR DE EDAD PERO MIS PADRES ME CONTROLAN Y CHANTAJEAN. QUIERO IRME DE MI CASA, QUE HAGO?\r\n', 'X', 2, 'Estante 3 fila 5', 1, 0, 4, 152),
(95, 1, '01-13-P1', 'VASO FRAGIL', 'MARCELO VALDIVIA TESTIMONIO', 2013, '00:28:50', 'SILVIA CAMACHO', 'BOLIVIA', '', 1, 'XTO TV', '1', 'TESTIMONIO DE MARCELO VALDIVIA ACERCA DE LA FAMILIA', 'X', 2, 'ESTANTE 3 - FILA 6', 1, 0, 4, 55),
(96, 1, '1-14/2', 'EN LA SELVA', '2DA MEDIA HORA ', 2014, '00:14:20', '', '', '', 0, '', '1', '2DA MEDIA HORA: 2\r\nPYX CON YARE VARGAS', 'X', 2, 'Estante 3 fila 5', 1, 0, 4, 152),
(97, 1, '01-13 P2', 'VASO FRAGIL', 'MARCELO VALDIVIA TESTIMONIO', 2013, '00:28:20', 'SILVIA CAMACHO', 'BOLIVIA', '', 1, 'XTO TV', '1', 'TESTIMONIO DE MARCELO VALDIVIA SOBRE LA FAMILIA', 'X', 2, 'ESTANTE 3 FILA 6', 1, 0, 4, 55),
(98, 1, '1-14/3', 'EN LA SELVA', '2DA MEDIA HORA ', 2014, '00:14:16', '', 'BOLIVIA', '', 5, '', '1', '2DA MEDIA HORA/3\r\nGRUPO INVITADO PYX CON YARE VARGAS', 'X', 2, 'Estante 3 fila 5', 1, 0, 4, 152),
(99, 1, '02-13 P1', 'VASO FRAGIL', 'MARCELO VALDIVIA TESTIMONIO', 2013, '00:28:45', 'SILVIA CAMACHO', 'BOLIVIA', '', 1, 'XTO TV', '1', 'TESTIMONIO DE MARCELO VALDIVIA SOBRE SUS ADICCIONES ALCOHOL Y DROGAS', 'X', 2, 'ESTANTE 3 - FILA 3', 1, 0, 4, 55),
(100, 1, '02-13 P2', 'VASO FRAGIL', 'MARCELO VALDIVIA TESTIMONIO', 2013, '00:28:27', 'SILVIA CAMACHO', 'BOLIVIA', '', 1, 'XTO TV', '1', 'TESTIMONIO DE MARCELO VALDIVIA SOBRE SU ADICCION A \r\nLAS DROGAS', 'X', 1, 'ESTANTE 3 - FILA 6', 1, 0, 4, 55),
(101, 1, '2-14/1', 'EN LA SELVA', '1RA MEDIA HORA ', 2014, '00:28:30', '', '', '', 5, '', '1', '1RA MEDIA HORA:\r\nLECTURA: OREMOS EN EL ESPÍRITU POR JOYCE MEYER', 'X', 2, 'Estante 3 fila 5', 1, 0, 4, 152),
(102, 1, '2-14/2', 'EN LA SELVA', '2DA MEDIA HORA ', 2014, '00:11:30', '', 'BOLIVIA', '', 5, '', '1', '2DA MEDIA HORA:\r\nENTREVISTA A MAYRA GONZALES.', 'X', 2, 'Estante 3 fila 5', 1, 0, 4, 152),
(103, 1, '03-13 P1', 'VASO FRAGIL', 'MARCELO VALDIVIA TESTIMONIO', 2013, '00:27:50', 'SILVIA CAMACHO', 'BOLIVIA', '', 1, 'XTO TV', '1', 'TESTIMONIO DE MARCELOO VALDIVIA SOBRE LAS ADICCIONES Y SU RECUPERACION', 'X', 2, 'ESTANTE 3 - FILA 6', 1, 0, 4, 55),
(104, 1, '03-13 P2', 'VASO FRAGIL', 'MARCELO VALDIVIA TESTIMONIO', 2013, '00:28:00', 'SILVIA CAMACHO', 'BOLIVIA', '', 1, 'XTOO TV', '1', 'TESTIMONIO DE MARCELO VALDIVIA SOBRE LAS ADICCIONES Y SU RECUPERACION', 'X', 2, 'ESTANTE 3 - FILA 6', 1, 0, 4, 55),
(105, 1, '2-14/3', 'EN LA SELVA', '2DA MEDIA HORA/3', 2014, '00:11:31', '', '', '', 36, '', '1', '2DA MEDIA HORA:\r\nENTREVISTA A MAYRA GONZALES.', 'X', 2, 'Estante 3 fila 5', 1, 0, 4, 152),
(106, 1, '04-13 P1', 'VASO FRAGIL', 'MARCELO VALDIVIA TESTIMONIO', 2013, '00:28:00', 'SILVIA CAMACHO', 'BOLIVIA', '', 1, 'XTO TV', '1', 'TESTIMONIO DE MARCELO VALDIVIA SOBRE LAS ADICCIONES  SUS CARATERISTICAS ', 'X', 2, 'ESTANTE 3 - FILA 6', 1, 0, 4, 55),
(107, 1, '3-14', 'EN LA SELVA', '1RA MEDIA HORA ', 2014, '00:27:50', '', 'BOLIVIA', '', 36, '', '1', '1RA MEDIA HORA\r\nFABRICA DE CONFESIONES:\r\nFUI UNA PERSONA ENTREGADA A DIOS. NO ME CONGREGO POR PASIÓN SINO POR CUMPLIR. NECESITO AYUDA', 'X', 2, 'Estante 3 fila 5', 1, 0, 4, 152),
(108, 1, '3-14/2', 'EN LA SELVA', '2DA MEDIA HORA/2', 2014, '00:13:20', '', 'BOLIVIA', '', 36, '', '1', '2DA MEDIA HORA/2\r\nENTREVISTA:\r\nDIEGO CALDERÓN\r\n', 'X', 2, 'Estante 3 fila 5', 1, 0, 4, 152),
(109, 1, '3-14/3', 'EN LA SELVA', '2DA MEDIA HORA/3', 2014, '00:14:20', '', 'BOLIVIA', '', 36, '', '1', '2DA MEDIA HORA/3\r\nENTREVISTA:\r\nDIEGO CALDERÓN ', 'X', 2, 'Estante 3 fila 5', 1, 0, 4, 152);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2016_04_11_062046_algunas_tablas', 2),
('2016_04_11_090320_mas_tablas', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paquetes`
--

CREATE TABLE IF NOT EXISTS `paquetes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `NOM_PAQ` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `DES_PAQ` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `ID_USU` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `paquetes_id_usu_foreign` (`ID_USU`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prestamos`
--

CREATE TABLE IF NOT EXISTS `prestamos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `NOM_PRE` varchar(200) DEFAULT NULL,
  `FIN_PRE` timestamp NULL DEFAULT NULL,
  `FFN_PRE` timestamp NULL DEFAULT NULL,
  `MAT_PRE` varchar(200) DEFAULT NULL,
  `OBS_PRE` text,
  `EST_PRE` int(11) DEFAULT NULL,
  `ID_USU` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_usu_idx` (`ID_USU`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `prestamos`
--

INSERT INTO `prestamos` (`id`, `NOM_PRE`, `FIN_PRE`, `FFN_PRE`, `MAT_PRE`, `OBS_PRE`, `EST_PRE`, `ID_USU`, `created_at`, `updated_at`) VALUES
(1, 'Juan Perez', '2016-06-03 15:03:11', '2016-06-06 04:00:00', 'Predica - Dios es amor', 'Cd original', 1, 3, '2016-06-03 15:03:11', '2016-06-03 15:28:06'),
(2, 'Juan Perez', '2016-06-03 15:32:27', '2016-06-22 04:00:00', 'Predica - Dios es amor segunda parte', 'Sin detalle', 0, 3, '2016-06-03 15:32:27', '2016-06-03 15:32:27'),
(3, 'Juan Carlos Laura ', '2016-06-04 02:45:58', '2016-06-05 04:00:00', 'Desde lo alto - Dante Gebel', 'Uso produccion', 1, 3, '2016-06-04 02:45:58', '2016-06-04 02:46:35'),
(4, 'Mario Diaz', '2016-06-06 22:40:25', '2016-06-12 04:00:00', 'Un video', 'Original', 1, 3, '2016-06-06 22:40:25', '2016-06-06 22:40:37');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `procedencias`
--

CREATE TABLE IF NOT EXISTS `procedencias` (
  `id` int(10) NOT NULL,
  `titulo` text,
  `descripcion` text,
  `activo` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `procedencias`
--

INSERT INTO `procedencias` (`id`, `titulo`, `descripcion`, `activo`) VALUES
(1, 'Enlace', '', 1),
(2, 'Cadena de Milagro', '', 1),
(3, 'Enlace Juvenil', '', 1),
(4, 'Produccion Nacional', '', 1),
(5, 'Externo', '', 1),
(6, 'CBN', '', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `NOM_USU` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `APA_USU` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `AMA_USU` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `NIC_USU` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `NIV_USU` int(11) NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_nic_usu_unique` (`NIC_USU`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `NOM_USU`, `APA_USU`, `AMA_USU`, `NIC_USU`, `NIV_USU`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(3, 'Luis Felipe', 'Quisbert', 'Quispe', '7074342', 0, '$2y$10$.fCLTZnDbzAvspFj8xB0Teamumg8hpezwXqxLHB93cdu7CzjmnXtS', 'HmS2U8tWAkTKJdEBdRlhy0E05yyHoHVESp5bmdHKAqDEwuLxx0dArsUF9KTq', '2016-04-01 23:51:23', '2016-06-06 22:42:29'),
(4, 'Wilson', 'Yujra', 'G', '9959333', 0, '$2y$10$cdQZEoW0CV3yQ1bziC4/1OJxRATcd2tK0w3NPEkiK1qxdv.QQAAZW', 'omrdOz4H5ztbLEh4RZQsI42sj3wzn7fyXWmfrlf5EH9XG6mBaQMsfXaLmPZg', '2016-04-01 23:51:23', '2016-04-05 23:51:44'),
(5, 'Pelusa', 'Gordon', 'Petronila', '7074343', 1, '$2y$10$K5tUrw5bB3Ja3KgR.k.Ss.XFtx3fBZnZOVw8MGYGaI1JR9uPw1dOW', NULL, '2016-06-01 00:34:04', '2016-06-01 00:34:04'),
(6, 'Juan', 'Laura', 'Villca', 'juanca', 1, '$2y$10$uf3yEzoSo8cD6yfCpKHZwuZ7R4O9dFk4oY6aP.uAYKhe0FwlV3lKG', 'QETqUMoAkdUmri6nKm8BqHkPmh4MWHHmmwynVvJ0jQHhmAKR3qOLkqxR0eC8', '2016-06-04 02:58:03', '2016-06-06 22:43:20');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `articulos`
--
ALTER TABLE `articulos`
  ADD CONSTRAINT `articulos_id_cat_foreign` FOREIGN KEY (`ID_CAT`) REFERENCES `categorias` (`id`),
  ADD CONSTRAINT `articulos_id_usu_foreign` FOREIGN KEY (`ID_USU`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD CONSTRAINT `categorias_id_usu_foreign` FOREIGN KEY (`ID_USU`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `empaquetados`
--
ALTER TABLE `empaquetados`
  ADD CONSTRAINT `empaquetados_id_art_foreign` FOREIGN KEY (`ID_ART`) REFERENCES `articulos` (`id`),
  ADD CONSTRAINT `empaquetados_id_paq_foreign` FOREIGN KEY (`ID_PAQ`) REFERENCES `paquetes` (`id`);

--
-- Filtros para la tabla `paquetes`
--
ALTER TABLE `paquetes`
  ADD CONSTRAINT `paquetes_id_usu_foreign` FOREIGN KEY (`ID_USU`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `prestamos`
--
ALTER TABLE `prestamos`
  ADD CONSTRAINT `id_usu` FOREIGN KEY (`ID_USU`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
