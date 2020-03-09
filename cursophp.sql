-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 04-03-2020 a las 19:01:34
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cursophp`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jobs`
--

CREATE TABLE `jobs` (
  `id` int(11) NOT NULL,
  `title` text CHARACTER SET latin1 NOT NULL,
  `description` text CHARACTER SET latin1 NOT NULL,
  `visible` tinyint(1) NOT NULL DEFAULT 1,
  `months` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `jobs`
--

INSERT INTO `jobs` (`id`, `title`, `description`, `visible`, `months`, `created_at`, `updated_at`) VALUES
(1, 'Title1', 'Desc1', 1, 0, '2020-03-02 18:11:25', '2020-03-02 18:11:25'),
(2, 'PHP Developer', 'IM DOING DIIIISSS', 1, 0, '2020-03-02 18:39:18', '2020-03-02 18:39:18'),
(3, 'Python Dev', 'We\'re cool bro', 1, 15, '2020-03-02 19:14:43', '2020-03-02 19:14:43'),
(4, 'DevOps ', 'Interesting!!!', 1, 8, '2020-03-02 19:47:07', '2020-03-02 19:47:07'),
(5, 'Node Dev', 'Seeing how to do this', 1, 20, '2020-03-03 12:17:17', '2020-03-03 12:17:17'),
(7, 'Fullstack Dev', 'It works!!', 1, 12, '2020-03-04 10:54:45', '2020-03-04 10:54:45'),
(8, 'Fullstack Dev', 'It works!!', 1, 12, '2020-03-04 17:19:25', '2020-03-04 17:19:25'),
(9, 'Fullstack Dev', 'It works!!', 1, 12, '2020-03-04 17:21:26', '2020-03-04 17:21:26');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `projects`
--

CREATE TABLE `projects` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `projects`
--

INSERT INTO `projects` (`id`, `title`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Nutrix', 'Hello', '2020-03-04 19:00:03', '2020-03-04 19:00:03');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
