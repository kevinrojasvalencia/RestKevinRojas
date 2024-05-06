-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-04-2024 a las 21:26:52
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `condominios1`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamentos1`
--

CREATE TABLE `departamentos1` (
  `id` int(11) NOT NULL,
  `nombre_Depa` varchar(150) NOT NULL,
  `numero_Habi` int(150) NOT NULL,
  `numero_Banos` int(50) NOT NULL,
  `precio` int(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `departamentos1`
--

INSERT INTO `departamentos1` (`id`, `nombre_Depa`, `numero_Habi`, `numero_Banos`, `precio`) VALUES
(4, 'Suit Community Scrip', 25, 12, 50000),
(5, 'Hostal presidencial', 31, 14, 51478),
(7, 'Hosta preCuss', 25, 11, 15748),
(8, 'Hotel premium', 15, 10, 1500),
(12, 'hostal Masit', 5, 3, 1555),
(13, 'Hotel Brenford', 70, 35, 59631),
(14, 'Hotel aston villa', 45, 25, 14753);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `departamentos1`
--
ALTER TABLE `departamentos1`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `departamentos1`
--
ALTER TABLE `departamentos1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
