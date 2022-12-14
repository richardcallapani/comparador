-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-12-2022 a las 21:33:07
-- Versión del servidor: 10.4.18-MariaDB
-- Versión de PHP: 7.4.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `comparacion`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `textos`
--

CREATE TABLE `textos` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) DEFAULT '',
  `fecha` datetime DEFAULT NULL,
  `texto` text DEFAULT NULL,
  `comentarios` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `textos`
--

INSERT INTO `textos` (`id`, `titulo`, `fecha`, `texto`, `comentarios`) VALUES
(9, 'Primer texto', '2022-12-12 17:32:47', 'Este es un poderoso texto de demo \r\n\"string\"\r\nLa cadena de entrada. Debe ser de almenos de un caracter.\r\n\r\nstart\r\nSi start no es negativo, la cadena devuelta comenzará en el start de la posición del string empezando desde cero. Por ejemplo, en la cadena \'abcdef\', el carácter en la posición 0 es \'a\', el carácter en la posición 2 es \'c\', y así sucesivamente.\r\n\r\nSi start es negativo, la cadena devuelta empezará en start contando desde el final de string.\r\n\r\nSi la longitud del string es menor que start, la función devolverá false.\r\n\r\nEjemplo #1 Usando un start negativo', 'es demostracion'),
(10, 'Desde archivo', '2022-12-12 17:33:15', 'Esto\r\ndos\r\nes\r\nlineas\r\nuna\r\nprueba\r\n', 'con el archivo'),
(11, 'Ingresando', '2022-12-12 17:35:05', ' texto texto textotexto', 'es demo'),
(12, 'Desde txt', '2022-12-12 17:35:32', 'dos\r\nlineas\r\n', 'desde el archivo'),
(13, 'noticia', '2022-12-13 10:38:54', 'el jachis es un troll', 'mas cui'),
(14, 'aaaa', '2022-12-13 15:32:03', 'Esto\r\nes\r\nuna\r\nprueba\r\n', 'aaaaaaa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) DEFAULT '',
  `correo_electronico` varchar(255) DEFAULT '',
  `usuario` varchar(255) DEFAULT '',
  `clave` varchar(255) DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `correo_electronico`, `usuario`, `clave`) VALUES
(1, 'Walther Santos', '', 'walther', 'walther');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `textos`
--
ALTER TABLE `textos`
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
-- AUTO_INCREMENT de la tabla `textos`
--
ALTER TABLE `textos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
