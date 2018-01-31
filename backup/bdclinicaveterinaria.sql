-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 31-01-2018 a las 15:33:06
-- Versión del servidor: 5.7.11
-- Versión de PHP: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bdclinicaveterinaria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbanimal`
--

CREATE TABLE `tbanimal` (
  `animalid` int(3) NOT NULL,
  `animalnombre` varchar(50) NOT NULL,
  `animalespecierazaid` int(3) NOT NULL,
  `animalsennas` varchar(200) NOT NULL,
  `animalpeso` double NOT NULL,
  `animalmedidapeso` varchar(50) NOT NULL,
  `animalestado` varchar(3) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbanimal`
--

INSERT INTO `tbanimal` (`animalid`, `animalnombre`, `animalespecierazaid`, `animalsennas`, `animalpeso`, `animalmedidapeso`, `animalestado`) VALUES
(1, 'Animal1', 4, 'Ninguna', 10, 'Kilogramos', 'B'),
(2, 'Animal2', 5, 'Ninguna', 5, 'Kilogramos', 'B'),
(3, 'Rocket', 4, 'Color Negro', 12, 'Kilogramos', 'A'),
(4, 'Gatito', 5, 'Ninguna', 5, 'Kilogramos', 'B'),
(5, 'Aldo', 10, 'Color gris', 10, 'Kilogramos', 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbencargado`
--

CREATE TABLE `tbencargado` (
  `encargadoid` int(3) NOT NULL,
  `encargadonombrecompleto` varchar(50) NOT NULL,
  `encargadocorreo` varchar(100) NOT NULL,
  `encargadopueblo` varchar(100) NOT NULL,
  `encargadodireccion` varchar(100) NOT NULL,
  `encargadoestado` varchar(2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbencargado`
--

INSERT INTO `tbencargado` (`encargadoid`, `encargadonombrecompleto`, `encargadocorreo`, `encargadopueblo`, `encargadodireccion`, `encargadoestado`) VALUES
(3, 'persona1', '', '', 'persona1', 'A'),
(2, 'Maureen Calderon Fernandez', '', '', 'Turrialba', 'A'),
(1, 'Silvia Calderon Fernandez', '', '', 'Turrialba', 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbenfermedadescomunes`
--

CREATE TABLE `tbenfermedadescomunes` (
  `enfermedadescomunesid` int(11) NOT NULL,
  `enfermedadescomunesnombre` varchar(100) NOT NULL,
  `enfermedadescomunesdescripcion` varchar(300) NOT NULL,
  `enfermedadescomunessintomas` varchar(300) NOT NULL,
  `enfermedadescomunesestado` varchar(2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbenfermedadescomunes`
--

INSERT INTO `tbenfermedadescomunes` (`enfermedadescomunesid`, `enfermedadescomunesnombre`, `enfermedadescomunesdescripcion`, `enfermedadescomunessintomas`, `enfermedadescomunesestado`) VALUES
(1, 'enfermedad 1', 'primer registro', 'sin sintomas evidentes', 'A'),
(2, 'enfermedad 2', 'segundo registro', 'sin sinomas visibles', 'B'),
(3, 'Enfermedad 3', 'tercer registro', 'ninguno', 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbespecie`
--

CREATE TABLE `tbespecie` (
  `especieid` int(3) NOT NULL,
  `especienombre` varchar(50) NOT NULL,
  `especieestado` varchar(3) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbespecie`
--

INSERT INTO `tbespecie` (`especieid`, `especienombre`, `especieestado`) VALUES
(1, 'Perro', '1'),
(2, 'Gato', '1'),
(3, 'Vaca', 'B'),
(4, 'Conejo', '1'),
(5, 'Vaca', '1'),
(6, 'Oveja', 'B'),
(7, 'Caballo', '1'),
(8, 'Tortuga', 'A'),
(9, 'Loro', 'B'),
(10, 'Loro', 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbmedico`
--

CREATE TABLE `tbmedico` (
  `medicoid` int(11) NOT NULL,
  `mediconumeroidentificacion` varchar(12) NOT NULL,
  `mediconombrecompleto` varchar(50) NOT NULL,
  `medicocorreo` varchar(50) NOT NULL,
  `medicoespecialidad` varchar(50) NOT NULL,
  `medicolicencia` varchar(50) NOT NULL,
  `medicofechavigencialicencia` date NOT NULL,
  `medicoestado` varchar(5) NOT NULL,
  `medicoinclusionlaboral` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbmedico`
--

INSERT INTO `tbmedico` (`medicoid`, `mediconumeroidentificacion`, `mediconombrecompleto`, `medicocorreo`, `medicoespecialidad`, `medicolicencia`, `medicofechavigencialicencia`, `medicoestado`, `medicoinclusionlaboral`) VALUES
(1, '304980175', 'Silvia Calderon ', 'silvia23cf@gmail.com', 'algo', '12gr', '2018-01-19', '1', NULL),
(2, '309870354', 'Maureen Calderon', 'maureen@gmail.com', 'algo2', '1234567', '2018-01-27', 'B', NULL),
(3, '101110222', 'prueba', 'prueba@gmail.com', 'prueba', '34hbfd', '2018-01-18', 'B', NULL),
(4, '304440555', 'Karen Calderon', 'karen@gmail.com', 'cirugia', 'YZE46', '2018-03-15', '1', '2017-11-06'),
(5, '304440777', 'Alejandra Rojas', 'ale@gmail.com', 'especialidadades', '123abc', '2020-04-23', 'B', '2018-01-01'),
(6, '305550999', 'Prueba 1', 'prueba@gmail.com', 'mjdgbf', 'shefki', '2018-01-19', 'B', '2017-12-05');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbproductoveterinario`
--

CREATE TABLE `tbproductoveterinario` (
  `productoveterinarioid` int(3) NOT NULL,
  `productoveterinarionombre` varchar(100) NOT NULL,
  `productoveterinarionombrecomun` varchar(50) NOT NULL,
  `productoveterinarioprincipioactivo` varchar(50) NOT NULL,
  `productoveterinariocontenido` varchar(50) NOT NULL,
  `productoveterinarioprecio` int(10) NOT NULL,
  `productoveterinarioestado` varchar(2) NOT NULL,
  `productoveterinariofechavencimiento` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbproductoveterinario`
--

INSERT INTO `tbproductoveterinario` (`productoveterinarioid`, `productoveterinarionombre`, `productoveterinarionombrecomun`, `productoveterinarioprincipioactivo`, `productoveterinariocontenido`, `productoveterinarioprecio`, `productoveterinarioestado`, `productoveterinariofechavencimiento`) VALUES
(1, 'Producto 1', '', 'principio activo 1', '', 0, 'A', NULL),
(2, 'Producto 2', '', 'principio 2', '', 0, 'B', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbpropietario`
--

CREATE TABLE `tbpropietario` (
  `propietarioid` int(3) NOT NULL,
  `propietarionombrecompleto` varchar(50) NOT NULL,
  `propietariotelefono` varchar(50) NOT NULL,
  `propietariodireccion` varchar(100) NOT NULL,
  `propietarioestado` varchar(2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbpropietario`
--

INSERT INTO `tbpropietario` (`propietarioid`, `propietarionombrecompleto`, `propietariotelefono`, `propietariodireccion`, `propietarioestado`) VALUES
(1, 'Adolfo Calderon', '77777777', 'Turrialba', 'A'),
(2, 'Emily Fernandez', '23416785', 'San Pedro, San Jose', 'A'),
(3, 'prueba', '123', 'prueba2', 'B');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbraza`
--

CREATE TABLE `tbraza` (
  `razaid` int(3) NOT NULL,
  `razanombre` varchar(50) NOT NULL,
  `razaestado` varchar(2) NOT NULL,
  `razaespecieid` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbraza`
--

INSERT INTO `tbraza` (`razaid`, `razanombre`, `razaestado`, `razaespecieid`) VALUES
(3, 'Doberman', '1', NULL),
(4, 'Huskey', '1', 1),
(6, 'Hosten', 'B', 5),
(5, 'Angora', '1', 2),
(7, 'Jersey', '1', 5),
(8, 'Baula', 'B', 8),
(9, 'Carey', 'A', 8),
(10, 'Pastor Aleman', '1', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbtelefonoencargado`
--

CREATE TABLE `tbtelefonoencargado` (
  `encargadoid` int(11) NOT NULL,
  `numerotelefono` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbtelefonoencargado`
--

INSERT INTO `tbtelefonoencargado` (`encargadoid`, `numerotelefono`) VALUES
(1, '89661137'),
(2, '88888888'),
(2, '98765432'),
(3, '78'),
(3, '23');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbunidades`
--

CREATE TABLE `tbunidades` (
  `unidadid` int(11) NOT NULL,
  `unidadnombre` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbunidades`
--

INSERT INTO `tbunidades` (`unidadid`, `unidadnombre`) VALUES
(1, 'tableta'),
(2, 'miligramos');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbanimal`
--
ALTER TABLE `tbanimal`
  ADD PRIMARY KEY (`animalid`);

--
-- Indices de la tabla `tbencargado`
--
ALTER TABLE `tbencargado`
  ADD PRIMARY KEY (`encargadoid`);

--
-- Indices de la tabla `tbenfermedadescomunes`
--
ALTER TABLE `tbenfermedadescomunes`
  ADD PRIMARY KEY (`enfermedadescomunesid`);

--
-- Indices de la tabla `tbespecie`
--
ALTER TABLE `tbespecie`
  ADD PRIMARY KEY (`especieid`);

--
-- Indices de la tabla `tbmedico`
--
ALTER TABLE `tbmedico`
  ADD PRIMARY KEY (`medicoid`),
  ADD UNIQUE KEY `mediconumeroidentificacion` (`mediconumeroidentificacion`);

--
-- Indices de la tabla `tbpropietario`
--
ALTER TABLE `tbpropietario`
  ADD PRIMARY KEY (`propietarioid`);

--
-- Indices de la tabla `tbraza`
--
ALTER TABLE `tbraza`
  ADD PRIMARY KEY (`razaid`);

--
-- Indices de la tabla `tbunidades`
--
ALTER TABLE `tbunidades`
  ADD PRIMARY KEY (`unidadid`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
