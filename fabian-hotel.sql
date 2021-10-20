-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-02-2021 a las 03:50:44
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `fabian-hotel`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `caja`
--

CREATE TABLE `caja` (
  `caj_id` int(11) NOT NULL,
  `caj_idUsuario` int(11) NOT NULL,
  `caj_fechaApertura` datetime NOT NULL,
  `caj_fechaCierre` datetime NOT NULL,
  `caj_ingresos` int(11) NOT NULL,
  `caj_egresos` int(11) NOT NULL,
  `caj_ventas` int(11) NOT NULL,
  `caj_efectivoCierre` int(11) NOT NULL,
  `caj_efectivoApertura` int(11) NOT NULL,
  `caj_descuadre` int(11) NOT NULL,
  `caj_observacion` text COLLATE utf8_spanish2_ci NOT NULL,
  `caj_estado` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `caja`
--

INSERT INTO `caja` (`caj_id`, `caj_idUsuario`, `caj_fechaApertura`, `caj_fechaCierre`, `caj_ingresos`, `caj_egresos`, `caj_ventas`, `caj_efectivoCierre`, `caj_efectivoApertura`, `caj_descuadre`, `caj_observacion`, `caj_estado`) VALUES
(1, 1, '2021-02-14 12:01:54', '0000-00-00 00:00:00', 0, 0, 0, 0, 100000, 0, '', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `cli_id` int(11) NOT NULL,
  `cli_tipoDocumento` text COLLATE utf8_spanish2_ci NOT NULL,
  `cli_documento` text COLLATE utf8_spanish2_ci NOT NULL,
  `cli_nombres` text COLLATE utf8_spanish2_ci NOT NULL,
  `cli_apellidos` text COLLATE utf8_spanish2_ci NOT NULL,
  `cli_genero` text COLLATE utf8_spanish2_ci NOT NULL,
  `cli_fechaNacimiento` date NOT NULL,
  `cli_telefono` text COLLATE utf8_spanish2_ci NOT NULL,
  `cli_direccion` text COLLATE utf8_spanish2_ci NOT NULL,
  `cli_correo` text COLLATE utf8_spanish2_ci NOT NULL,
  `cli_tipoSangre` text COLLATE utf8_spanish2_ci NOT NULL,
  `cli_estado` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`cli_id`, `cli_tipoDocumento`, `cli_documento`, `cli_nombres`, `cli_apellidos`, `cli_genero`, `cli_fechaNacimiento`, `cli_telefono`, `cli_direccion`, `cli_correo`, `cli_tipoSangre`, `cli_estado`) VALUES
(1, 'Cedula de ciudadania', '5698755', 'ben', 'zika', 'Masculino', '2021-02-18', '5661058', 'calle 123', 'd@d.com', 'A+', b'1'),
(2, 'Tarjeta de identidad', '1093444', 'marcos', 'alonso', 'Masculino', '2020-07-25', '78854', 'av 6', 'marcos@marcos.com', 'A+', b'0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturas`
--

CREATE TABLE `facturas` (
  `fac_id` int(11) NOT NULL,
  `fac_fecha` datetime NOT NULL,
  `fac_idReserva` int(11) NOT NULL,
  `fac_idCliente` int(11) NOT NULL,
  `fac_valor` int(11) NOT NULL,
  `fac_iva` int(11) NOT NULL,
  `fac_total` int(11) NOT NULL,
  `fac_estado` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `habitaciones`
--

CREATE TABLE `habitaciones` (
  `hab_id` int(11) NOT NULL,
  `hab_nombre` text COLLATE utf8_spanish2_ci NOT NULL,
  `hab_idPiso` int(11) NOT NULL,
  `hab_tipo` text COLLATE utf8_spanish2_ci NOT NULL,
  `hab_aire` bit(1) NOT NULL,
  `hab_ventilador` bit(1) NOT NULL,
  `hab_camaDoble` text COLLATE utf8_spanish2_ci NOT NULL,
  `hab_camaSencilla` text COLLATE utf8_spanish2_ci NOT NULL,
  `hab_tv` bit(1) NOT NULL,
  `hab_nevera` bit(1) NOT NULL DEFAULT b'0',
  `hab_precio` text COLLATE utf8_spanish2_ci NOT NULL,
  `hab_capacidad` text COLLATE utf8_spanish2_ci NOT NULL,
  `hab_estado` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `habitaciones`
--

INSERT INTO `habitaciones` (`hab_id`, `hab_nombre`, `hab_idPiso`, `hab_tipo`, `hab_aire`, `hab_ventilador`, `hab_camaDoble`, `hab_camaSencilla`, `hab_tv`, `hab_nevera`, `hab_precio`, `hab_capacidad`, `hab_estado`) VALUES
(1, '101', 1, 'Sencilla', b'1', b'1', '0', '1', b'1', b'1', '55000', '2', 1),
(2, '102', 1, 'Doble', b'1', b'1', '1', '1', b'1', b'1', '80000', '3', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movimientos_caja`
--

CREATE TABLE `movimientos_caja` (
  `mov_idCaja` int(11) NOT NULL,
  `mov_tipoCaja` tinyint(4) NOT NULL,
  `mov_fechaCaja` datetime NOT NULL,
  `mov_valorCaja` int(11) NOT NULL,
  `mov_descripcionCaja` text COLLATE utf8_spanish2_ci NOT NULL,
  `mov_idUsuarioCaja` int(11) NOT NULL,
  `mov_estadoCaja` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `movimientos_caja`
--

INSERT INTO `movimientos_caja` (`mov_idCaja`, `mov_tipoCaja`, `mov_fechaCaja`, `mov_valorCaja`, `mov_descripcionCaja`, `mov_idUsuarioCaja`, `mov_estadoCaja`) VALUES
(1, 0, '2021-02-13 14:51:11', 50000, 'utiles escolares', 1, 0),
(2, 1, '2021-02-14 10:30:15', 20000, 'cosas de aseo', 1, 0),
(3, 1, '2021-02-18 21:23:49', 5000, 'mototaxi', 1, 0),
(4, 0, '2021-02-18 21:25:43', 2000, 'mototaxi', 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movimientos_reservas`
--

CREATE TABLE `movimientos_reservas` (
  `mov_id` int(11) NOT NULL,
  `mov_fechaIngreso` datetime NOT NULL,
  `mov_idReserva` int(11) NOT NULL,
  `mov_huespedes` int(11) NOT NULL,
  `mov_fechaSalida` datetime NOT NULL,
  `mov_idUsuarioIngreso` int(11) NOT NULL,
  `mov_idUsuarioSalida` int(11) NOT NULL,
  `mov_estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos`
--

CREATE TABLE `pagos` (
  `pag_id` int(11) NOT NULL,
  `pag_idReserva` int(11) NOT NULL,
  `pag_valor` int(11) NOT NULL,
  `pag_fecha` datetime NOT NULL,
  `pag_idUsuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pisos`
--

CREATE TABLE `pisos` (
  `pis_id` int(11) NOT NULL,
  `pis_nombre` text COLLATE utf8_spanish2_ci NOT NULL,
  `pis_estado` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `pisos`
--

INSERT INTO `pisos` (`pis_id`, `pis_nombre`, `pis_estado`) VALUES
(1, 'piso 1', b'1'),
(2, 'piso 2', b'1'),
(3, 'piso 3', b'0'),
(4, 'piso 4', b'0'),
(5, '101', b'0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservas`
--

CREATE TABLE `reservas` (
  `res_id` int(11) NOT NULL,
  `res_fechaReserva` datetime NOT NULL,
  `res_idHabitacion` int(11) NOT NULL,
  `res_idCliente` int(11) NOT NULL,
  `res_fechaLlegada` datetime NOT NULL,
  `res_horaLlegada` time NOT NULL,
  `res_fechaSalida` datetime NOT NULL,
  `res_horaSalida` time NOT NULL,
  `res_precio` int(11) NOT NULL,
  `res_descuento` int(11) NOT NULL,
  `res_idUsuario` int(11) NOT NULL,
  `res_estado` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `usu_id` int(11) NOT NULL,
  `usu_nombre` text COLLATE utf8_spanish_ci NOT NULL,
  `usu_documento` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `usu_usuario` text COLLATE utf8_spanish_ci NOT NULL,
  `usu_correo` text COLLATE utf8_spanish_ci NOT NULL,
  `usu_password` text COLLATE utf8_spanish_ci NOT NULL,
  `usu_perfil` text COLLATE utf8_spanish_ci NOT NULL,
  `usu_estado` tinyint(3) NOT NULL,
  `usu_ultimoLogin` datetime NOT NULL,
  `usu_fechaIngreso` datetime NOT NULL,
  `usu_activo` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`usu_id`, `usu_nombre`, `usu_documento`, `usu_usuario`, `usu_correo`, `usu_password`, `usu_perfil`, `usu_estado`, `usu_ultimoLogin`, `usu_fechaIngreso`, `usu_activo`) VALUES
(1, 'admin', '5236978', 'admin', 'admin@admin.com', '$2a$07$usesomesillystringforegFOeQOp8RK/V8Yn0LZIZwSlh5IkndD.', 'Administrador', 1, '2021-02-19 15:14:01', '2019-02-20 16:24:42', b'1'),
(12, 'andres martinez', '1093781', 'andres', 'andres@andres.com', '$2a$07$usesomesillystringforeGsJAIIu7nhlxWq.cvdNluLcR1KdMYnq', 'Recepcionista', 1, '0000-00-00 00:00:00', '2021-02-14 16:59:18', b'0');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `caja`
--
ALTER TABLE `caja`
  ADD PRIMARY KEY (`caj_id`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`cli_id`);

--
-- Indices de la tabla `facturas`
--
ALTER TABLE `facturas`
  ADD PRIMARY KEY (`fac_id`);

--
-- Indices de la tabla `habitaciones`
--
ALTER TABLE `habitaciones`
  ADD PRIMARY KEY (`hab_id`);

--
-- Indices de la tabla `movimientos_caja`
--
ALTER TABLE `movimientos_caja`
  ADD PRIMARY KEY (`mov_idCaja`);

--
-- Indices de la tabla `movimientos_reservas`
--
ALTER TABLE `movimientos_reservas`
  ADD PRIMARY KEY (`mov_id`);

--
-- Indices de la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD PRIMARY KEY (`pag_id`);

--
-- Indices de la tabla `pisos`
--
ALTER TABLE `pisos`
  ADD PRIMARY KEY (`pis_id`);

--
-- Indices de la tabla `reservas`
--
ALTER TABLE `reservas`
  ADD PRIMARY KEY (`res_id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`usu_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `caja`
--
ALTER TABLE `caja`
  MODIFY `caj_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `cli_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `facturas`
--
ALTER TABLE `facturas`
  MODIFY `fac_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `habitaciones`
--
ALTER TABLE `habitaciones`
  MODIFY `hab_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `movimientos_caja`
--
ALTER TABLE `movimientos_caja`
  MODIFY `mov_idCaja` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `movimientos_reservas`
--
ALTER TABLE `movimientos_reservas`
  MODIFY `mov_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pagos`
--
ALTER TABLE `pagos`
  MODIFY `pag_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pisos`
--
ALTER TABLE `pisos`
  MODIFY `pis_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `reservas`
--
ALTER TABLE `reservas`
  MODIFY `res_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `usu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
