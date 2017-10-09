-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-10-2017 a las 00:47:28
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cao`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ca_curso`
--

CREATE TABLE `ca_curso` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `duracion` int(11) NOT NULL,
  `nota_requerida` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ca_tipo_matricula`
--

CREATE TABLE `ca_tipo_matricula` (
  `id` int(11) NOT NULL,
  `tipo_registro` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` varchar(1000) NOT NULL,
  `fecha_creacion` date NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ca_tipo_matricula_curso`
--

CREATE TABLE `ca_tipo_matricula_curso` (
  `id` int(11) NOT NULL,
  `tipo_matricula` int(11) NOT NULL,
  `curso` int(11) NOT NULL,
  `estado_actualidad` tinyint(1) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ca_tipo_registro`
--

CREATE TABLE `ca_tipo_registro` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ca_tipo_registro`
--

INSERT INTO `ca_tipo_registro` (`id`, `nombre`, `descripcion`) VALUES
(1, 'Oferta', 'Cursos a ofertar en un periodo de tiempo establecido.'),
(2, 'Solicitud', 'Cursos solicitados por algún lider.'),
(3, 'Plan de formación.', 'Cursos ofrecidos por algún plan formativo.');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `ca_curso`
--
ALTER TABLE `ca_curso`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ca_tipo_matricula`
--
ALTER TABLE `ca_tipo_matricula`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tipo_registro` (`tipo_registro`);

--
-- Indices de la tabla `ca_tipo_matricula_curso`
--
ALTER TABLE `ca_tipo_matricula_curso`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tipo_matricula` (`tipo_matricula`),
  ADD KEY `curso` (`curso`);

--
-- Indices de la tabla `ca_tipo_registro`
--
ALTER TABLE `ca_tipo_registro`
  ADD PRIMARY KEY (`id`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `ca_tipo_matricula`
--
ALTER TABLE `ca_tipo_matricula`
  ADD CONSTRAINT `ca_tipo_matricula_ibfk_1` FOREIGN KEY (`tipo_registro`) REFERENCES `ca_tipo_registro` (`id`);

--
-- Filtros para la tabla `ca_tipo_matricula_curso`
--
ALTER TABLE `ca_tipo_matricula_curso`
  ADD CONSTRAINT `ca_tipo_matricula_curso_ibfk_1` FOREIGN KEY (`tipo_matricula`) REFERENCES `ca_tipo_matricula` (`id`),
  ADD CONSTRAINT `ca_tipo_matricula_curso_ibfk_2` FOREIGN KEY (`curso`) REFERENCES `ca_curso` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
