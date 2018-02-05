-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-02-2018 a las 16:28:29
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
  `animalidcliente` int(11) NOT NULL,
  `animalfechanacimiento` date NOT NULL,
  `animalestado` varchar(3) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbanimal`
--

INSERT INTO `tbanimal` (`animalid`, `animalnombre`, `animalespecierazaid`, `animalidcliente`, `animalfechanacimiento`, `animalestado`) VALUES
(1, 'Tais', 1, 1, '2017-12-01', 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbdiagnostico`
--

CREATE TABLE `tbdiagnostico` (
  `diagnosticoid` int(11) NOT NULL,
  `diagnosticoanimalid` int(11) NOT NULL,
  `diagnosticofecha` date NOT NULL,
  `diagnosticodescripcion` varchar(300) NOT NULL,
  `diagnosticoestado` varchar(3) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbdiagnostico`
--

INSERT INTO `tbdiagnostico` (`diagnosticoid`, `diagnosticoanimalid`, `diagnosticofecha`, `diagnosticodescripcion`, `diagnosticoestado`) VALUES
(1, 1, '2018-02-05', 'Presentaba menos picazon necesita otra nextCard', 'A');

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
(2, 'algo', 'LGO@GMAIL.COM', 'Turrialba', 'Turrialba', 'A'),
(1, 'Johan', 'johan@gmail.com', 'San Rafael', 'Juan Viñas', 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbenfermedadescomunes`
--

CREATE TABLE `tbenfermedadescomunes` (
  `enfermedadescomunesid` int(11) NOT NULL,
  `enfermedadescomunesnombre` varchar(100) NOT NULL,
  `enfermedadescomunesdescripcion` varchar(300) NOT NULL,
  `enfermedadescomunesestado` varchar(2) NOT NULL,
  `enfermedadescomunesproductosusados` varchar(300) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbenfermedadescomunes`
--

INSERT INTO `tbenfermedadescomunes` (`enfermedadescomunesid`, `enfermedadescomunesnombre`, `enfermedadescomunesdescripcion`, `enfermedadescomunesestado`, `enfermedadescomunesproductosusados`) VALUES
(1, 'Rasquiña', 'Mucha comezón y dolor', 'A', 'NextCard');

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
(1, 'Canino', 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbfuncion`
--

CREATE TABLE `tbfuncion` (
  `funcionnombre` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbfuncion`
--

INSERT INTO `tbfuncion` (`funcionnombre`) VALUES
('desinflamatorio'),
('antiinflamatorio'),
('desparacitante'),
('anticoagulante');

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
(2, '21', 'iji', 'ij@gmail.com', 'ihio', 'b5', '2019-04-04', 'B', '2018-01-04'),
(1, '3503808', 'Alfonso', 'alfonsobrenes08@gmail.com', 'cirujano', 'B2', '2019-01-11', '1', '2018-02-05');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbpesoanimal`
--

CREATE TABLE `tbpesoanimal` (
  `diagnosticoid` int(11) NOT NULL,
  `animalid` int(11) NOT NULL,
  `animalpeso` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbpesoanimal`
--

INSERT INTO `tbpesoanimal` (`diagnosticoid`, `animalid`, `animalpeso`) VALUES
(1, 1, '7 kilos');

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
  `productoveterinariofechavencimiento` date DEFAULT NULL,
  `productoveterinariofunciones` varchar(300) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbproductoveterinario`
--

INSERT INTO `tbproductoveterinario` (`productoveterinarioid`, `productoveterinarionombre`, `productoveterinarionombrecomun`, `productoveterinarioprincipioactivo`, `productoveterinariocontenido`, `productoveterinarioprecio`, `productoveterinarioestado`, `productoveterinariofechavencimiento`, `productoveterinariofunciones`) VALUES
(1, 'NextCard', 'NextCard', '  Vitamina A', '  1 Unidades', 9000, 'A', '2019-09-20', 'desparacitante,desinflamatorio');

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
(1, 'Snouser', '1', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbsintoma`
--

CREATE TABLE `tbsintoma` (
  `sintomaid` int(11) NOT NULL,
  `sintomanombre` varchar(100) NOT NULL,
  `sintomadescripcion` varchar(200) NOT NULL,
  `sintomaestado` varchar(3) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbsintoma`
--

INSERT INTO `tbsintoma` (`sintomaid`, `sintomanombre`, `sintomadescripcion`, `sintomaestado`) VALUES
(1, 'Comezón', 'Se le despeyeja la piel y coge mal olor', 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbsintomaenfermedad`
--

CREATE TABLE `tbsintomaenfermedad` (
  `enfermedadcomunid` int(11) NOT NULL,
  `sintomaid` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbsintomaenfermedad`
--

INSERT INTO `tbsintomaenfermedad` (`enfermedadcomunid`, `sintomaid`) VALUES
(1, 1);

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
(2, '6578'),
(1, '25560090');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbtratamiento`
--

CREATE TABLE `tbtratamiento` (
  `tratamientoid` int(11) NOT NULL,
  `tratamientoproductoveterinarioid` int(11) NOT NULL,
  `tratamientoenfermedadcomunid` int(11) NOT NULL,
  `tratamientodosis` varchar(50) NOT NULL,
  `tratamientoperiodicidad` varchar(100) NOT NULL,
  `tratamientofecha` date NOT NULL,
  `tratamientoestado` varchar(2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbtratamiento`
--

INSERT INTO `tbtratamiento` (`tratamientoid`, `tratamientoproductoveterinarioid`, `tratamientoenfermedadcomunid`, `tratamientodosis`, `tratamientoperiodicidad`, `tratamientofecha`, `tratamientoestado`) VALUES
(1, 1, 1, 'una tableta', '5pm cada mes dias', '2018-02-05', 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbtratamientocliente`
--

CREATE TABLE `tbtratamientocliente` (
  `tratamientoid` int(11) NOT NULL,
  `animalid` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbtratamientocliente`
--

INSERT INTO `tbtratamientocliente` (`tratamientoid`, `animalid`) VALUES
(1, 1);

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
(1, 'Unidades por tableta'),
(2, 'Miligramos'),
(3, 'Mililitros');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbdiagnostico`
--
ALTER TABLE `tbdiagnostico`
  ADD PRIMARY KEY (`diagnosticoid`);

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
-- Indices de la tabla `tbpesoanimal`
--
ALTER TABLE `tbpesoanimal`
  ADD PRIMARY KEY (`diagnosticoid`);

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
-- Indices de la tabla `tbsintoma`
--
ALTER TABLE `tbsintoma`
  ADD PRIMARY KEY (`sintomaid`);

--
-- Indices de la tabla `tbsintomaenfermedad`
--
ALTER TABLE `tbsintomaenfermedad`
  ADD PRIMARY KEY (`enfermedadcomunid`,`sintomaid`);

--
-- Indices de la tabla `tbtratamiento`
--
ALTER TABLE `tbtratamiento`
  ADD PRIMARY KEY (`tratamientoid`);

--
-- Indices de la tabla `tbtratamientocliente`
--
ALTER TABLE `tbtratamientocliente`
  ADD PRIMARY KEY (`tratamientoid`,`animalid`);

--
-- Indices de la tabla `tbunidades`
--
ALTER TABLE `tbunidades`
  ADD PRIMARY KEY (`unidadid`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
