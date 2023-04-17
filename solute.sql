-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3307
-- Tiempo de generación: 17-04-2023 a las 04:32:49
-- Versión del servidor: 10.6.5-MariaDB
-- Versión de PHP: 8.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `solute`
--
DROP DATABASE IF EXISTS `solute`;
CREATE DATABASE IF NOT EXISTS `solute` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `solute`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modules`
--

DROP TABLE IF EXISTS `modules`;
CREATE TABLE IF NOT EXISTS `modules` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `module` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon_class` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) DEFAULT 1 COMMENT '0=No vigente;1=Vigente',
  `order_group` tinyint(2) DEFAULT NULL,
  `order_module` tinyint(2) DEFAULT NULL,
  `url` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Volcado de datos para la tabla `modules`
--

INSERT INTO `modules` (`id`, `group`, `module`, `icon_class`, `status`, `order_group`, `order_module`, `url`) VALUES
(1, 'mantenedores', 'uf', 'bar-chart', 1, 1, 1, 'uf_maintainer/list'),
(2, 'inicio', 'dashboard', 'list', 1, 0, 1, 'home/dashboard');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permissions`
--

DROP TABLE IF EXISTS `permissions`;
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(255) DEFAULT NULL,
  `id_module` int(255) DEFAULT NULL,
  `permissions` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL COMMENT '1=ver;2=agregar;3=editar;4=eliminar',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Volcado de datos para la tabla `permissions`
--

INSERT INTO `permissions` (`id`, `id_user`, `id_module`, `permissions`) VALUES
(1, 1, 1, '[1,2,3,4]'),
(2, 1, 2, '[1,2,3,4]');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `uf`
--

DROP TABLE IF EXISTS `uf`;
CREATE TABLE IF NOT EXISTS `uf` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` date DEFAULT NULL,
  `precio` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=136 DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `uf`
--

INSERT INTO `uf` (`id`, `fecha`, `precio`) VALUES
(1, '2023-01-01', '35122.26'),
(2, '2023-01-02', '35133.53'),
(3, '2023-01-03', '35144.81'),
(4, '2023-01-04', '35156.09'),
(5, '2023-01-05', '35167.38'),
(6, '2023-01-06', '35178.67'),
(7, '2023-01-07', '35189.96'),
(8, '2023-01-08', '35201.26'),
(9, '2023-01-09', '35212.56'),
(10, '2023-01-10', '35215.96'),
(11, '2023-01-11', '35219.37'),
(12, '2023-01-12', '35222.77'),
(13, '2023-01-13', '35226.17'),
(14, '2023-01-14', '35229.58'),
(15, '2023-01-15', '35232.98'),
(16, '2023-01-16', '35236.39'),
(17, '2023-01-17', '35239.79'),
(18, '2023-01-18', '35243.20'),
(19, '2023-01-19', '35246.60'),
(20, '2023-01-20', '35250.01'),
(21, '2023-01-21', '35253.41'),
(22, '2023-01-22', '35256.82'),
(23, '2023-01-23', '35260.23'),
(24, '2023-01-24', '35263.64'),
(25, '2023-01-25', '35267.04'),
(26, '2023-01-26', '35270.45'),
(27, '2023-01-27', '35273.86'),
(28, '2023-01-28', '35277.27'),
(29, '2023-01-29', '35280.68'),
(30, '2023-01-30', '35284.09'),
(31, '2023-01-31', '35287.50'),
(32, '2023-02-01', '35290.91'),
(33, '2023-02-02', '35294.32'),
(34, '2023-02-03', '35297.73'),
(35, '2023-02-04', '35301.14'),
(36, '2023-02-05', '35304.55'),
(37, '2023-02-06', '35307.96'),
(38, '2023-02-07', '35311.37'),
(39, '2023-02-08', '35314.79'),
(40, '2023-02-09', '35318.20'),
(41, '2023-02-10', '35328.25'),
(42, '2023-02-11', '35338.31'),
(43, '2023-02-12', '35348.37'),
(44, '2023-02-13', '35358.43'),
(45, '2023-02-14', '35368.49'),
(46, '2023-02-15', '35378.56'),
(47, '2023-02-16', '35388.63'),
(48, '2023-02-17', '35398.70'),
(49, '2023-02-18', '35408.77'),
(50, '2023-02-19', '35418.85'),
(51, '2023-02-20', '35428.93'),
(52, '2023-02-21', '35439.02'),
(53, '2023-02-22', '35449.10'),
(54, '2023-02-23', '35459.19'),
(55, '2023-02-24', '35469.28'),
(56, '2023-02-25', '35479.38'),
(57, '2023-02-26', '35489.48'),
(58, '2023-02-27', '35499.58'),
(59, '2023-02-28', '35509.68'),
(60, '2023-03-01', '35519.79'),
(61, '2023-03-02', '35529.90'),
(62, '2023-03-03', '35540.01'),
(63, '2023-03-04', '35550.13'),
(64, '2023-03-05', '35560.24'),
(65, '2023-03-06', '35570.37'),
(66, '2023-03-07', '35580.49'),
(67, '2023-03-08', '35590.62'),
(68, '2023-03-09', '35600.75'),
(69, '2023-03-10', '35599.60'),
(70, '2023-03-11', '35598.45'),
(71, '2023-03-12', '35597.30'),
(72, '2023-03-13', '35596.15'),
(73, '2023-03-14', '35595.01'),
(74, '2023-03-15', '35593.86'),
(75, '2023-03-16', '35592.71'),
(76, '2023-03-17', '35591.56'),
(77, '2023-03-18', '35590.41'),
(78, '2023-03-19', '35589.26'),
(79, '2023-03-20', '35588.11'),
(80, '2023-03-21', '35586.96'),
(81, '2023-03-22', '35585.82'),
(82, '2023-03-23', '35584.67'),
(83, '2023-03-24', '35583.52'),
(84, '2023-03-25', '35582.37'),
(85, '2023-03-26', '35581.22'),
(86, '2023-03-27', '35580.07'),
(87, '2023-03-28', '35578.93'),
(88, '2023-03-29', '35577.78'),
(89, '2023-03-30', '35576.63'),
(90, '2023-03-31', '35575.48'),
(91, '2023-04-01', '35574.33'),
(92, '2023-04-02', '35573.19'),
(93, '2023-04-03', '35572.04'),
(94, '2023-04-04', '35570.89'),
(95, '2023-04-05', '35569.74'),
(96, '2023-04-06', '35568.59'),
(97, '2023-04-07', '35567.44'),
(98, '2023-04-08', '35566.30'),
(99, '2023-04-09', '35565.15'),
(100, '2023-04-10', '35578.12'),
(101, '2023-04-11', '35591.10'),
(102, '2023-04-12', '35604.08'),
(103, '2023-04-13', '35617.07'),
(104, '2023-04-14', '35630.06'),
(105, '2023-04-15', '35643.05'),
(106, '2023-04-16', '35656.05'),
(107, '2023-04-17', '35669.06'),
(108, '2023-04-18', '35682.07'),
(109, '2023-04-19', '35695.08'),
(110, '2023-04-20', '35708.10'),
(111, '2023-04-21', '35721.12'),
(112, '2023-04-22', '35734.15'),
(113, '2023-04-23', '35747.19'),
(114, '2023-04-24', '35760.22'),
(115, '2023-04-25', '35773.27'),
(116, '2023-04-26', '35786.31'),
(117, '2023-04-27', '35799.37'),
(118, '2023-04-28', '35812.42'),
(119, '2023-04-29', '35825.49'),
(120, '2023-04-30', '35838.55'),
(121, '2023-05-01', '35851.62'),
(122, '2023-05-02', '35864.70'),
(123, '2023-05-03', '35877.78'),
(124, '2023-05-04', '35890.87'),
(125, '2023-05-05', '35903.96'),
(126, '2023-05-06', '35917.05'),
(127, '2023-05-07', '35930.15'),
(128, '2023-05-08', '35943.26'),
(129, '2023-05-09', '35956.37'),
(134, '2023-12-16', '2.10'),
(135, '2023-12-15', '1.10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL COMMENT '0=Eliminado;1=Vigente;2=suspendido',
  `username` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `status`, `username`, `first_name`, `last_name`, `created_at`) VALUES
(1, 'cristianceron.2.0@gmail.com', '$2y$10$0.rS5cT8mhMX49XZi5d5qeyK/aCTLEqs1/.4y5Y2prFW5H6Q071qq', 1, 'cceron', 'Cristian', 'Ceron', '2022-04-15 12:59:22');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
