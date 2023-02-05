-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-01-2023 a las 22:36:55
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `citas_hospital`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calendario`
--

CREATE TABLE `calendario` (
  `idhora` int(50) NOT NULL,
  `nomhora` varchar(100) NOT NULL,
  `coddoc` int(50) NOT NULL,
  `estado` char(50) NOT NULL,
  `fere` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `calendario`
--

INSERT INTO `calendario` (`idhora`, `nomhora`, `coddoc`, `estado`, `fere`) VALUES
(1, 'Lunes, Viernes', 1, '1', '2023-01-24 08:52:42'),
(2, 'Viernes', 2, '1', '2023-01-24 08:53:03'),
(3, 'Jueves, Viernes', 3, '1', '2023-01-24 08:53:27'),
(4, 'Martes, Jueves', 4, '1', '2023-01-24 08:53:48'),
(5, 'Miercoles, Viernes', 5, '1', '2023-01-24 08:54:07'),
(6, 'Jueves', 6, '1', '2023-01-24 08:54:24'),
(7, 'Martes, Miercoles', 7, '1', '2023-01-24 08:54:42'),
(8, 'Miercoles, Viernes', 8, '1', '2023-01-24 08:55:02'),
(9, 'Lunes, Jueves', 9, '1', '2023-01-24 08:55:22'),
(10, 'Martes, Miercoles, Viernes', 10, '1', '2023-01-24 08:55:44');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `citas`
--

CREATE TABLE `citas` (
  `codcit` int(50) NOT NULL,
  `asunto` varchar(200) NOT NULL,
  `color` char(50) NOT NULL,
  `codpaci` int(50) NOT NULL,
  `coddoc` int(50) NOT NULL,
  `idhora` int(50) NOT NULL,
  `codespe` int(50) NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL,
  `estado` char(50) NOT NULL,
  `fecha_create` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `citas`
--

INSERT INTO `citas` (`codcit`, `asunto`, `color`, `codpaci`, `coddoc`, `idhora`, `codespe`, `start`, `end`, `estado`, `fecha_create`) VALUES
(1, 'cita para los dientes', '', 4, 3, 3, 5, '2023-01-26 10:30:00', '2023-01-26 10:30:00', '1', '2023-01-24 09:21:24');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `customers`
--

CREATE TABLE `customers` (
  `codpaci` int(11) NOT NULL,
  `dnipa` char(10) NOT NULL,
  `nombrep` varchar(50) NOT NULL,
  `apellidop` varchar(50) NOT NULL,
  `seguro` char(2) NOT NULL,
  `tele` char(10) NOT NULL,
  `sexo` varchar(15) NOT NULL,
  `email` varchar(35) NOT NULL,
  `ciudad` varchar(200) NOT NULL,
  `direccion` varchar(200) NOT NULL,
  `nacimiento` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `usuario` varchar(15) NOT NULL,
  `clave` varchar(255) NOT NULL,
  `cargo` char(1) NOT NULL,
  `estado` char(1) NOT NULL,
  `fecha_create` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `customers`
--

INSERT INTO `customers` (`codpaci`, `dnipa`, `nombrep`, `apellidop`, `seguro`, `tele`, `sexo`, `email`, `ciudad`, `direccion`, `nacimiento`, `usuario`, `clave`, `cargo`, `estado`, `fecha_create`) VALUES
(1, '1176886868', 'Jose Maria ', 'Torres Ayala', 'No', '0978777565', 'Masculino', 'josemaria@gmail.com', '', '', '2023-01-24 20:51:27', 'josemari21', 'b0baee9d279d34fa1dfd71aadb908c3f', '2', '1', '2023-01-23 06:31:59'),
(2, '1177777777', 'Maria Jose', 'Flores Torres', 'Si', '0989808008', 'Femenino', 'flores@gmail.com', '', '', '2023-01-24 20:51:27', 'flore123', '827ccb0eea8a706c4c34a16891f84e7b', '2', '1', '2023-01-23 06:31:50'),
(3, '1179900060', 'Jose ', 'Peres Perales', 'Si', '0987777777', 'Masculino', 'joseperales@gmail.com', '', '', '2023-01-24 20:51:27', 'joseperes21', 'b0baee9d279d34fa1dfd71aadb908c3f', '2', '1', '2023-01-23 06:32:06'),
(4, '1121621663', 'Alexander', 'Jimenez', 'Si', '099834783', 'Masculino', 'alexji89@gmail.com', '', '', '2023-01-24 20:51:27', 'alex89', '5e8edd851d2fdfbd7415232c67367cc3', '2', '1', '2023-01-23 06:30:56'),
(6, '1163873821', 'wilson', 'chamba', '', '0925271124', 'masculino', 'wilson56@gmail.com', 'loja', 'los paltas', '2023-01-24 21:12:46', 'wilson56', '5e8edd851d2fdfbd7415232c67367cc3', '2', '', '2023-01-24 21:12:46'),
(7, '1136489542', 'Julio', 'Ordoñez', '', '0965348272', 'masculino', 'julio789@gmail.com', 'cuenca', 'avenida cañaris', '2000-09-20 05:00:00', 'julio789', '5e8edd851d2fdfbd7415232c67367cc3', '2', '', '2023-01-24 21:23:40'),
(8, '4543333333', 'werwes', 'sdfsdfs', '', 'dc45435444', 'sdffgdsfsd', 'dsfasdf@gmail.com', 'cccc', 'zzzzzzzzzz', '2023-01-06 05:00:00', 'ale', '5e8edd851d2fdfbd7415232c67367cc3', '2', '', '2023-01-24 21:26:25');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especialidades`
--

CREATE TABLE `especialidades` (
  `codespe` int(100) NOT NULL,
  `especialidad` varchar(200) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `estado` char(20) NOT NULL,
  `fecha_create` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `especialidades`
--

INSERT INTO `especialidades` (`codespe`, `especialidad`, `descripcion`, `estado`, `fecha_create`) VALUES
(1, 'Medicina General', 'Se realizan controles y revisiones de manera periódica', '1', '2023-01-23 04:00:13'),
(3, 'Neumología', 'Sirve para tratar temas de los pulmones', '1', '2023-01-23 03:58:58'),
(5, 'Pediatría', 'Chequeos de la salud para niños', '1', '2023-01-23 04:05:30'),
(6, 'Cardiología', 'Sirve para el tratamiento de las enfermedades del corazón', '1', '2023-01-23 04:06:57'),
(7, 'Odontología', 'Sirve para tratar los dientes y las encías ', '1', '2023-01-23 04:08:07'),
(8, 'Ginecología', 'Atención a las mujeres durante el embarazo y el parto', '1', '2023-01-23 04:09:13'),
(9, 'Reumatología', 'Chequeos sobre las articulaciones, los músculos, tendones y huesos.', '1', '2023-01-23 04:11:38'),
(10, 'Neurología', 'Sirve para tratar las patologías del sistema nervioso', '1', '2023-01-23 04:13:44'),
(11, 'Endocrinología', 'Para diagnósticos y tratamientos de trastornos del sistema endocrino', '1', '2023-01-23 04:16:03'),
(12, 'Medicina Interna', 'Tratamiento de todas las enfermedades que pueden afectar al adulto', '1', '2023-01-23 04:19:11'),
(13, 'prueba1', 'sirve para prueba', '1', '2023-01-23 05:03:48');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horario`
--

CREATE TABLE `horario` (
  `idhora` int(11) NOT NULL,
  `nomhora` varchar(25) NOT NULL,
  `coddoc` int(11) NOT NULL,
  `estado` char(1) NOT NULL,
  `fere` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medico`
--

CREATE TABLE `medico` (
  `coddoc` int(50) NOT NULL,
  `dnidoc` char(10) NOT NULL,
  `nomdoc` varchar(200) NOT NULL,
  `apedoc` varchar(200) NOT NULL,
  `codespe` int(50) NOT NULL,
  `sexo` char(50) NOT NULL,
  `telefo` char(10) NOT NULL,
  `ciudad` varchar(200) NOT NULL,
  `fechanaci` date NOT NULL,
  `correo` varchar(200) NOT NULL,
  `estado` char(50) NOT NULL,
  `fecha_create` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `medico`
--

INSERT INTO `medico` (`coddoc`, `dnidoc`, `nomdoc`, `apedoc`, `codespe`, `sexo`, `telefo`, `ciudad`, `fechanaci`, `correo`, `estado`, `fecha_create`) VALUES
(1, '1163873983', 'Julio', 'Montaño', 1, 'Masculino', '0987346711', 'loja', '1999-11-04', 'julio89@gmail.com', '1', '2023-01-24 07:31:05'),
(2, '7687342320', 'Maria', 'Gualan', 3, 'Femenino', '0923568912', 'quito', '2005-08-19', 'maria56@gmail.com', '1', '2023-01-24 07:32:11'),
(3, '5429081355', 'Pablo', 'Pineda', 5, 'Masculino', '0993478129', 'cuenca', '2002-08-14', 'pinedapablo93@gmail.com', '1', '2023-01-24 07:33:18'),
(4, '6742901521', 'Magdalena', 'Zuares', 6, 'Femenino', '0967341896', 'loja', '2008-02-09', 'magdalena45@gmail.com', '1', '2023-01-24 07:34:53'),
(5, '3427119072', 'Lorena', 'Villavicencio', 7, 'Femenino', '0978167498', 'ambato', '1979-12-14', 'lorena890@gmail.com', '1', '2023-01-24 07:37:05'),
(6, '1169809564', 'Graciela', 'Ruiz', 8, 'Femenino', '0959123890', 'cuenca', '2008-07-24', 'graciela1035@gmail.com', '1', '2023-01-24 07:39:26'),
(7, '1170254716', 'Erika', 'Aguirre', 9, 'Femenino', '0936552662', 'Machala', '2000-03-24', 'erikaguirre58@gmail.com', '1', '2023-01-24 07:41:32'),
(8, '1168723671', 'Victor ', 'Martínez', 10, 'Masculino', '0952782651', 'loja', '1983-07-02', 'victormarti67@gmail.com', '1', '2023-01-24 07:43:22'),
(9, '1189354215', 'Mónica', 'Maldonado', 11, 'Femenino', '0985945234', 'guayaquil', '1998-11-13', 'monica39@gmail.com', '1', '2023-01-24 07:44:59'),
(10, '1167839019', ' Santiago', 'Guzmán', 12, 'Masculino', '0967893416', 'loja', '2004-05-20', 'guzmansanti345@gmail.com', '1', '2023-01-24 07:46:28');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profile`
--

CREATE TABLE `profile` (
  `idprof` int(11) NOT NULL,
  `nombr` varchar(30) NOT NULL,
  `ruc` char(14) NOT NULL,
  `telef` char(9) NOT NULL,
  `corr` varchar(35) NOT NULL,
  `direcc` varchar(35) NOT NULL,
  `descrip` varchar(100) NOT NULL,
  `logo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `profile`
--

INSERT INTO `profile` (`idprof`, `nombr`, `ruc`, `telef`, `corr`, `direcc`, `descrip`, `logo`) VALUES
(1, 'Un programador mas', '10275334542234', '999876754', 'unprogramadormas@gmail.com', 'Piura-Peru', 'Esto es un sistema', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `usuario` varchar(25) NOT NULL,
  `email` varchar(50) NOT NULL,
  `clave` varchar(255) NOT NULL,
  `cargo` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `usuario`, `email`, `clave`, `cargo`) VALUES
(3, 'Willan Jimenez', 'willan80', 'jimenez80@gmail.com', '5e8edd851d2fdfbd7415232c67367cc3', '1'),
(4, 'admin', 'admin12', 'admin12@gmail.com', '5e8edd851d2fdfbd7415232c67367cc3', '1');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `calendario`
--
ALTER TABLE `calendario`
  ADD PRIMARY KEY (`idhora`);

--
-- Indices de la tabla `citas`
--
ALTER TABLE `citas`
  ADD PRIMARY KEY (`codcit`);

--
-- Indices de la tabla `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`codpaci`);

--
-- Indices de la tabla `especialidades`
--
ALTER TABLE `especialidades`
  ADD PRIMARY KEY (`codespe`);

--
-- Indices de la tabla `horario`
--
ALTER TABLE `horario`
  ADD PRIMARY KEY (`idhora`);

--
-- Indices de la tabla `medico`
--
ALTER TABLE `medico`
  ADD PRIMARY KEY (`coddoc`);

--
-- Indices de la tabla `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`idprof`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `calendario`
--
ALTER TABLE `calendario`
  MODIFY `idhora` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `citas`
--
ALTER TABLE `citas`
  MODIFY `codcit` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `customers`
--
ALTER TABLE `customers`
  MODIFY `codpaci` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `especialidades`
--
ALTER TABLE `especialidades`
  MODIFY `codespe` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `horario`
--
ALTER TABLE `horario`
  MODIFY `idhora` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `medico`
--
ALTER TABLE `medico`
  MODIFY `coddoc` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `profile`
--
ALTER TABLE `profile`
  MODIFY `idprof` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `horario`
--
ALTER TABLE `horario`
  ADD CONSTRAINT `horario_ibfk_1` FOREIGN KEY (`coddoc`) REFERENCES `doctor` (`coddoc`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
