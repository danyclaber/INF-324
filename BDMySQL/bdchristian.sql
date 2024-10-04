-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-10-2024 a las 16:29:30
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
-- Base de datos: `bdchristian`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--


CREATE TABLE `persona` (
  `id_persona` int(11) NOT NULL,
  `ci` varchar(50) DEFAULT NULL,
  `nombres` varchar(50) DEFAULT NULL,
  `aPaterno` varchar(50) DEFAULT NULL,
  `aMaterno` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`id_persona`, `ci`, `nombres`, `aPaterno`, `aMaterno`) VALUES
(1, '12345678', 'Juan', 'Pérez', 'Gómez'),
(2, '87654321', 'María', 'García', 'López'),
(3, '11223344', 'Carlos', 'Martínez', 'Hernández'),
(4, '44332211', 'Ana', 'Torres', 'Suárez'),
(5, '55667788', 'Luis', 'Ramírez', 'Alvarez'),
(6, '99887766', 'Laura', 'Fernández', 'Jiménez'),
(7, '22334455', 'Sofía', 'Mendoza', 'Ríos'),
(8, '33445566', 'Fernando', 'Bermúdez', 'Soto'),
(9, '44556677', 'Pedro', 'Reyes', 'Márquez'),
(10, '66778899', 'Claudia', 'Cruz', 'Salazar'),
(11, '4288316', 'Christian', 'Medina', 'Juarez');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `propiedad`
--

CREATE TABLE `propiedad` (
  `id` int(11) NOT NULL,
  `codCatastral` varchar(10) DEFAULT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `distrito` int(11) DEFAULT NULL,
  `zona` varchar(100) DEFAULT NULL,
  `superficie` decimal(10,2) DEFAULT NULL,
  `xIni` decimal(10,2) DEFAULT NULL,
  `yIni` decimal(10,2) DEFAULT NULL,
  `xFin` decimal(10,2) DEFAULT NULL,
  `yFin` decimal(10,2) DEFAULT NULL,
  `tipoPropiedad` varchar(50) DEFAULT NULL,
  `valor` decimal(15,2) DEFAULT NULL,
  `id_persona` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `propiedad`
--

INSERT INTO `propiedad` (`id`, `codCatastral`, `direccion`, `distrito`, `zona`, `superficie`, `xIni`, `yIni`, `xFin`, `yFin`, `tipoPropiedad`, `valor`, `id_persona`) VALUES
(11, 'CP001', 'Av. Siempre Viva 742', 1, 'Zona Norte', 120.50, 50.00, 50.00, 100.00, 100.00, 'Casa', 150000.00, 1),
(12, 'CP002', 'Calle Los Olivos 123', 1, 'Zona Norte', 250.75, 100.00, 100.00, 200.00, 200.00, 'Terreno', 250000.00, 1),
(13, 'CP003', 'Calle de la Paz 456', 2, 'Zona Sur', 180.00, 30.00, 30.00, 90.00, 90.00, 'Casa', 180000.00, 2),
(14, 'CP002', 'Av. Libertador 789', 2, 'Zona Sur', 300.00, 110.00, 110.00, 200.00, 200.00, 'Terreno', 320000.00, 2),
(15, 'CP003', 'Calle Central 123', 3, 'Zona Este', 150.00, 40.00, 40.00, 90.00, 90.00, 'Casa', 220000.00, 3),
(16, 'CP001', 'Calle Secundaria 321', 3, 'Zona Este', 220.50, 60.00, 60.00, 130.00, 130.00, 'Departamento', 250000.00, 4),
(17, 'CP002', 'Calle Nueva 234', 4, 'Zona Oeste', 300.00, 50.00, 50.00, 150.00, 150.00, 'Casa', 200000.00, 5),
(18, 'CP001', 'Av. del Sol 987', 4, 'Zona Oeste', 450.00, 80.00, 80.00, 200.00, 200.00, 'Terreno', 500000.00, 6),
(19, 'CP001', 'Calle La Paz 111', 5, 'Zona Centro', 160.00, 20.00, 20.00, 80.00, 80.00, 'Casa', 170000.00, 7),
(20, 'CP001', 'Calle del Mercado 222', 5, 'Zona Centro', 200.00, 25.00, 25.00, 90.00, 90.00, 'Departamento', 190000.00, 8),
(22, 'CP002', 'Av los Palotes', 2, 'Zona 2', 300.00, 300.00, 300.00, 300.00, 300.00, 'Casa', 1500000.00, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `ci` varchar(20) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `rol` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `ci`, `password`, `rol`) VALUES
(1, '12345678', '12345678', 'persona'),
(2, '87654321', '87654321', 'persona'),
(3, '11223344', '11223344', 'persona'),
(4, '44332211', '44332211', 'persona'),
(5, '55667788', '55667788', 'persona'),
(6, '99887766', '99887766', 'persona'),
(7, '22334455', '22334455', 'persona'),
(8, '33445566', '33445566', 'persona'),
(9, '44556677', '44556677', 'persona'),
(10, '66778899', '66778899', 'persona'),
(11, '4288316', '4288316', 'funcionario'),
(12, '9201571', '9201571', 'persona');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`id_persona`),
  ADD UNIQUE KEY `ci` (`ci`);

--
-- Indices de la tabla `propiedad`
--
ALTER TABLE `propiedad`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_persona` (`id_persona`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `ci` (`ci`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `id_persona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `propiedad`
--
ALTER TABLE `propiedad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `propiedad`
--
ALTER TABLE `propiedad`
  ADD CONSTRAINT `propiedad_ibfk_1` FOREIGN KEY (`id_persona`) REFERENCES `persona` (`id_persona`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
