-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 27-05-2019 a las 20:19:20
-- Versión del servidor: 10.3.14-MariaDB
-- Versión de PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `id9737123_andromeda`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `activos_tecnologicos`
--

CREATE TABLE `activos_tecnologicos` (
  `id_inventario` int(11) NOT NULL,
  `Asignado` int(11) NOT NULL,
  `Nombre` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `Tipo` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `Marca` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `Modelo` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `Serial` varchar(11) COLLATE utf8_spanish_ci NOT NULL,
  `Fabricante` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `Estado` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `invproveedor` int(11) NOT NULL,
  `Fecha_Ingreso` date NOT NULL,
  `Fecha_Salida` date NOT NULL,
  `Seguimientos` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fabricante`
--

CREATE TABLE `fabricante` (
  `idFabricante` int(11) NOT NULL,
  `NombreFabricante` varchar(45) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `fabricante`
--

INSERT INTO `fabricante` (`idFabricante`, `NombreFabricante`) VALUES
(7, 'APPLE'),
(2, 'COMPAQ'),
(4, 'COMPUMAX'),
(5, 'DELL'),
(1, 'HP'),
(3, 'LENOVO'),
(6, 'Xiaomi');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marca`
--

CREATE TABLE `marca` (
  `idMarca` int(11) NOT NULL,
  `NombreMarca` varchar(45) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `marca`
--

INSERT INTO `marca` (`idMarca`, `NombreMarca`) VALUES
(6, 'Apple'),
(2, 'COMPAQ'),
(5, 'COMPUMAX'),
(4, 'DELL'),
(1, 'HP'),
(3, 'LENOVO'),
(7, 'XIAOMI');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfil`
--

CREATE TABLE `perfil` (
  `ID` int(11) NOT NULL,
  `Login` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `Password` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `Estado` enum('Activo','Inactivo') COLLATE utf8_spanish_ci NOT NULL,
  `Rol` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `perfil`
--

INSERT INTO `perfil` (`ID`, `Login`, `Password`, `Estado`, `Rol`) VALUES
(2, 'Admin1', '2e33a9b0b06aa0a01ede70995674ee23', 'Activo', 1),
(3, 'Admin2', '21eed4f2e9ab214fdbf00a2a091d63c4', 'Activo', 1),
(4, 'Usuario1', '3f1308149ab8219e32bf9d91028c4eb4', 'Activo', 3),
(5, 'Usuario2', '471f605e622680810b256b28b40d7cb1', 'Activo', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `id_Proveedor` int(11) NOT NULL,
  `NIT` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `Nombre` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `Direccion` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `Telefono` varchar(45) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id_rol` int(2) NOT NULL,
  `tipo_rol` varchar(20) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id_rol`, `tipo_rol`) VALUES
(1, 'SuperAdmin'),
(2, 'Administrador'),
(3, 'Usuario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_hardware`
--

CREATE TABLE `tipo_hardware` (
  `idTipo_Hardware` int(11) NOT NULL,
  `NombreTipo` varchar(45) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tipo_hardware`
--

INSERT INTO `tipo_hardware` (`idTipo_Hardware`, `NombreTipo`) VALUES
(1, 'Desktop'),
(3, 'Impresora'),
(2, 'Laptop'),
(7, 'Licencia'),
(4, 'Mouse'),
(6, 'Servidor'),
(5, 'Teclado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuarios` int(11) NOT NULL,
  `Nombres` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `Apellidos` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `Cedula` int(11) NOT NULL,
  `Cargo` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `Area` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `Correo` varchar(45) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `activos_tecnologicos`
--
ALTER TABLE `activos_tecnologicos`
  ADD PRIMARY KEY (`id_inventario`),
  ADD KEY `Asignado_idx` (`Asignado`),
  ADD KEY `Proveedor_idx` (`invproveedor`),
  ADD KEY `Marca_idx` (`Marca`),
  ADD KEY `Fabricante_idx` (`Fabricante`),
  ADD KEY `Tipo_idx` (`Tipo`);

--
-- Indices de la tabla `fabricante`
--
ALTER TABLE `fabricante`
  ADD PRIMARY KEY (`idFabricante`),
  ADD UNIQUE KEY `NombreFabricante_UNIQUE` (`NombreFabricante`);

--
-- Indices de la tabla `marca`
--
ALTER TABLE `marca`
  ADD PRIMARY KEY (`idMarca`),
  ADD UNIQUE KEY `NombreModelo_UNIQUE` (`NombreMarca`);

--
-- Indices de la tabla `perfil`
--
ALTER TABLE `perfil`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Rol_perfil` (`Rol`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`id_Proveedor`),
  ADD UNIQUE KEY `NIT_UNIQUE` (`NIT`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `tipo_hardware`
--
ALTER TABLE `tipo_hardware`
  ADD PRIMARY KEY (`idTipo_Hardware`),
  ADD KEY `NombreTipo_idx` (`NombreTipo`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuarios`),
  ADD UNIQUE KEY `Cedula_UNIQUE` (`Cedula`),
  ADD UNIQUE KEY `Correo_UNIQUE` (`Correo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `activos_tecnologicos`
--
ALTER TABLE `activos_tecnologicos`
  MODIFY `id_inventario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `fabricante`
--
ALTER TABLE `fabricante`
  MODIFY `idFabricante` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `marca`
--
ALTER TABLE `marca`
  MODIFY `idMarca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `perfil`
--
ALTER TABLE `perfil`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  MODIFY `id_Proveedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id_rol` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tipo_hardware`
--
ALTER TABLE `tipo_hardware`
  MODIFY `idTipo_Hardware` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuarios` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `activos_tecnologicos`
--
ALTER TABLE `activos_tecnologicos`
  ADD CONSTRAINT `Asignacion` FOREIGN KEY (`Asignado`) REFERENCES `usuarios` (`id_usuarios`),
  ADD CONSTRAINT `Proveedor` FOREIGN KEY (`invproveedor`) REFERENCES `proveedor` (`id_Proveedor`);

--
-- Filtros para la tabla `perfil`
--
ALTER TABLE `perfil`
  ADD CONSTRAINT `Rol_perfil` FOREIGN KEY (`Rol`) REFERENCES `roles` (`id_rol`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
