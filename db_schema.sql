-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-02-2021 a las 04:12:23
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `prueba_extreme`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pqr`
--

CREATE TABLE `pqr` (
  `cod_pqr` int(11) NOT NULL,
  `tipo_pqr` varchar(30) NOT NULL,
  `asunto_pqr` varchar(100) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `estado` varchar(30) NOT NULL,
  `fecha_creacion` date DEFAULT curdate(),
  `fecha_limite` date DEFAULT NULL,
  `cod_usua` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pqr`
--

INSERT INTO `pqr` (`cod_pqr`, `tipo_pqr`, `asunto_pqr`, `usuario`, `estado`, `fecha_creacion`, `fecha_limite`, `cod_usua`) VALUES
(14, 'peticion', 'Llegar puntual', 'edi29', 'Nuevo', '2020-10-02', '2020-10-09', 2),
(15, 'queja', 'Hacen mucho desorden', 'lop1', 'Nuevo', '2020-10-02', '2020-10-05', 3),
(16, 'reclamo', 'Me cobraron de mas en la factura', 'edi29', 'Nuevo', '2020-10-02', '2020-10-04', 2),
(17, 'peticion', 'Por favor no quiten la luz los domigos', 'edi29', 'Nuevo', '2020-12-02', '2020-12-09', 2),
(18, 'peticion', 'Coloquen la letra del recibo mas grande', 'lop1', 'Nuevo', '2021-01-06', '2021-01-09', 2),
(19, 'queja', 'ñojwenghoñiaerhñgfbieah', 'lop1', 'Nuevo', '2021-01-06', '2021-01-09', 3),
(20, 'queja', 'Ese recibo viene muy caro', 'edi29', 'Nuevo', '2021-01-06', '2021-01-09', 2),
(22, 'queja', 'Muy cara esa vaina', 'lop1', 'Nuevo', '2021-01-06', '2021-01-09', 3),
(30, 'peticion', 'sDÑojneijfgiefjbu', 'lop1', 'Nuevo', '2021-01-08', '2021-01-15', 3),
(31, 'queja', 'dfjngodajufingiuen ', 'edi29', 'Nuevo', '2021-01-08', '2021-01-11', 2),
(33, 'reclamo', 'jujujujujuju', 'lop1', 'Cerrado', '2021-01-08', '2021-01-10', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `cod_usua` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `usuario` varchar(50) DEFAULT NULL,
  `pass` varchar(300) DEFAULT NULL,
  `role` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`cod_usua`, `nombre`, `usuario`, `pass`, `role`) VALUES
(1, 'Administrador', 'admin', 'ba3253876aed6bc22d4a6ff53d8406c6ad864195ed144ab5c87621b6c233b548baeae6956df346ec8c17f5ea10f35ee3cbc514797ed7ddd3145464e2a0bab413', 'administrador'),
(2, 'Edinson', 'edi29', 'ba3253876aed6bc22d4a6ff53d8406c6ad864195ed144ab5c87621b6c233b548baeae6956df346ec8c17f5ea10f35ee3cbc514797ed7ddd3145464e2a0bab413', 'usuario'),
(3, 'lopez', 'lop1', 'ba3253876aed6bc22d4a6ff53d8406c6ad864195ed144ab5c87621b6c233b548baeae6956df346ec8c17f5ea10f35ee3cbc514797ed7ddd3145464e2a0bab413', 'usuario');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `pqr`
--
ALTER TABLE `pqr`
  ADD PRIMARY KEY (`cod_pqr`),
  ADD KEY `cod_usua` (`cod_usua`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`cod_usua`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `pqr`
--
ALTER TABLE `pqr`
  MODIFY `cod_pqr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `cod_usua` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `pqr`
--
ALTER TABLE `pqr`
  ADD CONSTRAINT `pqr_ibfk_1` FOREIGN KEY (`cod_usua`) REFERENCES `usuarios` (`cod_usua`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
