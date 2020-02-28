-- phpMyAdmin SQL Dump
-- version 4.7.1
-- https://www.phpmyadmin.net/
--
-- Servidor: b9tkmnain9rbhsy6ccqf-mysql.services.clever-cloud.com
-- Tiempo de generación: 28-02-2020 a las 22:06:54
-- Versión del servidor: 8.0.15-5
-- Versión de PHP: 7.0.33-0ubuntu0.16.04.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `b9tkmnain9rbhsy6ccqf`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_agencia`
--

CREATE TABLE `user_agencia` (
  `id` int(11) NOT NULL,
  `usuario` varchar(5) NOT NULL,
  `agencia` char(2) NOT NULL,
  `creado` date NOT NULL,
  `modificado` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `user_agencia`
--

INSERT INTO `user_agencia` (`id`, `usuario`, `agencia`, `creado`, `modificado`) VALUES
(4, '00141', '01', '2020-02-28', '2020-02-28'),
(5, '00220', '03', '2020-02-28', '2020-02-28'),
(8, '00127', '01', '2020-02-28', '2020-02-28'),
(9, '00946', '02', '2020-02-28', '2020-02-28');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `user_agencia`
--
ALTER TABLE `user_agencia`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `user_agencia`
--
ALTER TABLE `user_agencia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
