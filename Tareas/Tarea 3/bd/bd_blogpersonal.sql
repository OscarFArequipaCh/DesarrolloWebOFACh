-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-09-2025 a las 06:29:58
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
-- Base de datos: `bd_blogpersonal`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `amigos`
--

CREATE TABLE `amigos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `descripcion` varchar(250) NOT NULL,
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `amigos`
--

INSERT INTO `amigos` (`id`, `nombre`, `descripcion`, `image`) VALUES
(1, 'Jesus Villca', 'Mi gran amigo, que me acompaño desde que empece primaria.', 'file:///D://Multimedia/Camara/IMG_20200106_231210.jpg'),
(2, 'Dhamar', 'Mi amiga, que se fue hace un tiempo del departamento', 'file:///D://Multimedia/Camara/foto2.jpg'),
(3, 'Jesus', 'Un amigo que siempre trato de animarme, y un ran guitarrista.', 'file:///D://Multimedia/IMG_20220526_152753.jpg'),
(4, 'Angel', 'Mi gymbro, el que me impulsa a cumplir con mis metas.', 'file:///D://Multimedia/Camara/IMG-20180926-WA0002.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hobies`
--

CREATE TABLE `hobies` (
  `id` int(11) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `descripcion` varchar(250) NOT NULL,
  `fotografia` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `hobies`
--

INSERT INTO `hobies` (`id`, `nombre`, `descripcion`, `fotografia`) VALUES
(1, 'Musica', 'Practico la tromperta desde el colegio, y estoy en una banda donde toco en dias festivos como carnavales.', 'images/68bf9a7d5b55d.jpg'),
(2, 'Gimnasio', 'Suelo ir al gimnasio a modo de desestresarme', 'images/68bf9b9b651d5.jfif'),
(3, 'World Of Warcraft', 'El juego al que le dedico tiempo libre es Word of Warcraft un MMORP en su version 4.3.4', 'images/68bfacf7b18b7.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `correo` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `correo`, `password`) VALUES
(1, 'drianlard2357@gmail.com', 'a9e57f48e011302eb87eb968f298f59fdc564ff3');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `amigos`
--
ALTER TABLE `amigos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `hobies`
--
ALTER TABLE `hobies`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `amigos`
--
ALTER TABLE `amigos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `hobies`
--
ALTER TABLE `hobies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
