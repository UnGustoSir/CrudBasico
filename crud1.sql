-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-09-2024 a las 05:50:51
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `crud1`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignaciones`
--

CREATE TABLE `asignaciones` (
  `idAsig` int(11) NOT NULL,
  `asignacion` text NOT NULL,
  `descripcion` text NOT NULL,
  `fechaCreado` datetime DEFAULT NULL,
  `fechaCambio` datetime DEFAULT NULL,
  `fechaEntrega` datetime DEFAULT NULL,
  `empleadoAsignado` text DEFAULT NULL,
  `idEmpleado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `asignaciones`
--

INSERT INTO `asignaciones` (`idAsig`, `asignacion`, `descripcion`, `fechaCreado`, `fechaCambio`, `fechaEntrega`, `empleadoAsignado`, `idEmpleado`) VALUES
(57, 'Hacer un modal', 'Pasos 1, 2, 3...', '2024-09-09 22:22:04', NULL, '2024-09-18 22:22:00', 'Pedro Luis  Torres Torres', 24);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `idEmpleado` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `apellidos` text NOT NULL,
  `dni` int(8) NOT NULL,
  `puesto` text NOT NULL,
  `fechaCreado` datetime DEFAULT NULL,
  `fechaCambio` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`idEmpleado`, `nombre`, `apellidos`, `dni`, `puesto`, `fechaCreado`, `fechaCambio`) VALUES
(15, 'Giancarlos', 'Loyola as', 71879550, 'Administrador', '2024-09-06 08:57:49', '2024-09-09 20:17:56'),
(24, 'Pedro Luis ', 'Torres Torres', 0, '', '2024-09-09 22:21:06', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `idUser` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `apellidos` text NOT NULL,
  `usuario` text NOT NULL,
  `pass` text NOT NULL,
  `correo` text NOT NULL,
  `fechaCreado` datetime DEFAULT NULL,
  `fechaCambio` datetime DEFAULT NULL,
  `status` varchar(8) NOT NULL DEFAULT 'noActive',
  `privilege` varchar(5) NOT NULL DEFAULT 'user',
  `idEmpleado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`idUser`, `nombre`, `apellidos`, `usuario`, `pass`, `correo`, `fechaCreado`, `fechaCambio`, `status`, `privilege`, `idEmpleado`) VALUES
(12, 'Giancarlos', 'Loyola Caraza', 'glc123', '1', 'loyolacaraza@gmail.com', '2024-09-06 08:57:49', '2024-09-09 20:20:31', 'Active', 'admin', 15),
(21, 'Pedro Luis ', 'Torres Torres', 'pedro123', '123', 'pedro@gmail.com', '2024-09-09 22:21:06', '2024-09-09 22:21:13', 'Active', 'user', 24);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `asignaciones`
--
ALTER TABLE `asignaciones`
  ADD PRIMARY KEY (`idAsig`),
  ADD KEY `idEmpleado` (`idEmpleado`);

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`idEmpleado`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idUser`),
  ADD KEY `fk_idEmpleado` (`idEmpleado`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `asignaciones`
--
ALTER TABLE `asignaciones`
  MODIFY `idAsig` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT de la tabla `empleados`
--
ALTER TABLE `empleados`
  MODIFY `idEmpleado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `asignaciones`
--
ALTER TABLE `asignaciones`
  ADD CONSTRAINT `asignaciones_ibfk_1` FOREIGN KEY (`idEmpleado`) REFERENCES `empleados` (`idEmpleado`) ON DELETE CASCADE;

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_idEmpleado` FOREIGN KEY (`idEmpleado`) REFERENCES `empleados` (`idEmpleado`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
