-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-07-2022 a las 20:18:46
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `luvenese_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `account_permission`
--

CREATE TABLE `account_permission` (
  `account_permission_id` int(11) NOT NULL,
  `name` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `account_permission`
--

INSERT INTO `account_permission` (`account_permission_id`, `name`, `description`) VALUES
(1, 'Manage Assigned Project', 'User can view and manage only assigned projects to him. Project status update, document upload/view, project discussion will be available to assigned projects'),
(2, 'Manage All Projects', ''),
(3, 'Manage Clients', ''),
(4, 'Manage Staffs', ''),
(5, 'Manage Payment', ''),
(6, 'Manage Assigned Support Ticket', ''),
(7, 'Manage All Support Tickets', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `account_role`
--

CREATE TABLE `account_role` (
  `account_role_id` int(11) NOT NULL,
  `name` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `account_permissions` longtext COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `addons`
--

CREATE TABLE `addons` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `unique_identifier` varchar(255) NOT NULL,
  `version` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `about` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `name` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `chat_status` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'offline',
  `owner_status` int(11) NOT NULL DEFAULT 0 COMMENT '1 owner, 0 not owner'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `admin`
--

INSERT INTO `admin` (`admin_id`, `name`, `email`, `password`, `phone`, `address`, `chat_status`, `owner_status`) VALUES
(1, 'Lüvenes Center', 'admin@luvenescenter.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', NULL, NULL, 'offline', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bookmark`
--

CREATE TABLE `bookmark` (
  `bookmark_id` int(11) NOT NULL,
  `title` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `url` longtext COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calendar_event`
--

CREATE TABLE `calendar_event` (
  `calendar_event_id` int(11) NOT NULL,
  `title` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_type` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `start_timestamp` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `end_timestamp` int(11) DEFAULT NULL,
  `colour` longtext COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `calendar_event`
--

INSERT INTO `calendar_event` (`calendar_event_id`, `title`, `description`, `user_type`, `user_id`, `start_timestamp`, `end_timestamp`, `colour`) VALUES
(2, 'jose ', 'wewew', 'admin', 1, '1655157600', 1655157600, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `chat`
--

CREATE TABLE `chat` (
  `id` int(10) UNSIGNED NOT NULL,
  `from` varchar(255) NOT NULL DEFAULT '',
  `to` varchar(255) NOT NULL DEFAULT '',
  `message` text NOT NULL,
  `sent` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `recd` int(10) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `id` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `ip_address` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `ci_sessions`
--

INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('048r6tsbn5pfd01k7jk5lltucpr0vlvb', '::1', 1658182859, 0x5f5f63695f6c6173745f726567656e65726174657c693a313635383138323835393b6572726f725f6d6573736167657c733a31333a22496e76616c6964204c6f67696e223b5f5f63695f766172737c613a313a7b733a31333a226572726f725f6d657373616765223b733a333a226f6c64223b7d61646d696e5f6c6f67696e7c733a313a2231223b6c6f67696e5f757365725f69647c733a313a2231223b6e616d657c733a31353a224cc3bc76656e65732043656e746572223b6c6f67696e5f747970657c733a353a2261646d696e223b),
('0avapmi1jshpld8t7a9r9c0qp62igihs', '::1', 1658180151, 0x5f5f63695f6c6173745f726567656e65726174657c693a313635383138303135313b6572726f725f6d6573736167657c733a31333a22496e76616c6964204c6f67696e223b5f5f63695f766172737c613a313a7b733a31333a226572726f725f6d657373616765223b733a333a226f6c64223b7d61646d696e5f6c6f67696e7c733a313a2231223b6c6f67696e5f757365725f69647c733a313a2231223b6e616d657c733a31353a224cc3bc76656e65732043656e746572223b6c6f67696e5f747970657c733a353a2261646d696e223b),
('0krtsrv5a92tbhfgicicto986d9d0hhe', '::1', 1658181358, 0x5f5f63695f6c6173745f726567656e65726174657c693a313635383138313335383b6572726f725f6d6573736167657c733a31333a22496e76616c6964204c6f67696e223b5f5f63695f766172737c613a313a7b733a31333a226572726f725f6d657373616765223b733a333a226f6c64223b7d61646d696e5f6c6f67696e7c733a313a2231223b6c6f67696e5f757365725f69647c733a313a2231223b6e616d657c733a31353a224cc3bc76656e65732043656e746572223b6c6f67696e5f747970657c733a353a2261646d696e223b),
('1ioj5lp0mqq813jfrcp60cdbh9rv7m33', '::1', 1658247856, 0x5f5f63695f6c6173745f726567656e65726174657c693a313635383234373835363b6572726f725f6d6573736167657c733a31333a22496e76616c6964204c6f67696e223b5f5f63695f766172737c613a313a7b733a31333a226572726f725f6d657373616765223b733a333a226f6c64223b7d61646d696e5f6c6f67696e7c733a313a2231223b6c6f67696e5f757365725f69647c733a313a2231223b6e616d657c733a31353a224cc3bc76656e65732043656e746572223b6c6f67696e5f747970657c733a353a2261646d696e223b),
('209sd2h0g4ravhs99u07j67vq415qvke', '::1', 1658251413, 0x5f5f63695f6c6173745f726567656e65726174657c693a313635383235313431333b6572726f725f6d6573736167657c733a31333a22496e76616c6964204c6f67696e223b5f5f63695f766172737c613a313a7b733a31333a226572726f725f6d657373616765223b733a333a226f6c64223b7d61646d696e5f6c6f67696e7c733a313a2231223b6c6f67696e5f757365725f69647c733a313a2231223b6e616d657c733a31353a224cc3bc76656e65732043656e746572223b6c6f67696e5f747970657c733a353a2261646d696e223b),
('4bmj9als938sj21feuh9912tgs9clpjm', '::1', 1658179814, 0x5f5f63695f6c6173745f726567656e65726174657c693a313635383137393831343b6572726f725f6d6573736167657c733a31333a22496e76616c6964204c6f67696e223b5f5f63695f766172737c613a313a7b733a31333a226572726f725f6d657373616765223b733a333a226f6c64223b7d61646d696e5f6c6f67696e7c733a313a2231223b6c6f67696e5f757365725f69647c733a313a2231223b6e616d657c733a31353a224cc3bc76656e65732043656e746572223b6c6f67696e5f747970657c733a353a2261646d696e223b),
('4uml5r38lt2b85nss6imo485ftarhsqt', '::1', 1658184553, 0x5f5f63695f6c6173745f726567656e65726174657c693a313635383138343535333b6572726f725f6d6573736167657c733a31333a22496e76616c6964204c6f67696e223b5f5f63695f766172737c613a313a7b733a31333a226572726f725f6d657373616765223b733a333a226f6c64223b7d61646d696e5f6c6f67696e7c733a313a2231223b6c6f67696e5f757365725f69647c733a313a2231223b6e616d657c733a31353a224cc3bc76656e65732043656e746572223b6c6f67696e5f747970657c733a353a2261646d696e223b),
('5pe44geh6crhni56g2i9j3rmdvbbvu7v', '::1', 1658244071, 0x5f5f63695f6c6173745f726567656e65726174657c693a313635383234343037313b6572726f725f6d6573736167657c733a31333a22496e76616c6964204c6f67696e223b5f5f63695f766172737c613a313a7b733a31333a226572726f725f6d657373616765223b733a333a226f6c64223b7d61646d696e5f6c6f67696e7c733a313a2231223b6c6f67696e5f757365725f69647c733a313a2231223b6e616d657c733a31353a224cc3bc76656e65732043656e746572223b6c6f67696e5f747970657c733a353a2261646d696e223b),
('6r7h37qvvckjq3md3kimerlmb9b6aubu', '::1', 1658183236, 0x5f5f63695f6c6173745f726567656e65726174657c693a313635383138333233363b6572726f725f6d6573736167657c733a31333a22496e76616c6964204c6f67696e223b5f5f63695f766172737c613a313a7b733a31333a226572726f725f6d657373616765223b733a333a226f6c64223b7d61646d696e5f6c6f67696e7c733a313a2231223b6c6f67696e5f757365725f69647c733a313a2231223b6e616d657c733a31353a224cc3bc76656e65732043656e746572223b6c6f67696e5f747970657c733a353a2261646d696e223b),
('7p6ik5oql7htfkn2v4i6dk4tk9i2rnli', '::1', 1658249948, 0x5f5f63695f6c6173745f726567656e65726174657c693a313635383234393934383b6572726f725f6d6573736167657c733a31333a22496e76616c6964204c6f67696e223b5f5f63695f766172737c613a313a7b733a31333a226572726f725f6d657373616765223b733a333a226f6c64223b7d61646d696e5f6c6f67696e7c733a313a2231223b6c6f67696e5f757365725f69647c733a313a2231223b6e616d657c733a31353a224cc3bc76656e65732043656e746572223b6c6f67696e5f747970657c733a353a2261646d696e223b),
('9na301qi7u6kag2vpinog381eseu6su0', '::1', 1658178334, 0x5f5f63695f6c6173745f726567656e65726174657c693a313635383137383333343b6572726f725f6d6573736167657c733a31333a22496e76616c6964204c6f67696e223b5f5f63695f766172737c613a313a7b733a31333a226572726f725f6d657373616765223b733a333a226f6c64223b7d61646d696e5f6c6f67696e7c733a313a2231223b6c6f67696e5f757365725f69647c733a313a2231223b6e616d657c733a31353a224cc3bc76656e65732043656e746572223b6c6f67696e5f747970657c733a353a2261646d696e223b),
('b0uvcqa8jrei5043f318oaa0m14ode7r', '::1', 1658246454, 0x5f5f63695f6c6173745f726567656e65726174657c693a313635383234363435343b6572726f725f6d6573736167657c733a31333a22496e76616c6964204c6f67696e223b5f5f63695f766172737c613a313a7b733a31333a226572726f725f6d657373616765223b733a333a226f6c64223b7d61646d696e5f6c6f67696e7c733a313a2231223b6c6f67696e5f757365725f69647c733a313a2231223b6e616d657c733a31353a224cc3bc76656e65732043656e746572223b6c6f67696e5f747970657c733a353a2261646d696e223b),
('dfudcdf3fgru12idojn680et7rbvic18', '::1', 1658249203, 0x5f5f63695f6c6173745f726567656e65726174657c693a313635383234393230333b6572726f725f6d6573736167657c733a31333a22496e76616c6964204c6f67696e223b5f5f63695f766172737c613a313a7b733a31333a226572726f725f6d657373616765223b733a333a226f6c64223b7d61646d696e5f6c6f67696e7c733a313a2231223b6c6f67696e5f757365725f69647c733a313a2231223b6e616d657c733a31353a224cc3bc76656e65732043656e746572223b6c6f67696e5f747970657c733a353a2261646d696e223b),
('dqbr25sg3irpmiintcrj1ejvqbu96lkn', '::1', 1658184963, 0x5f5f63695f6c6173745f726567656e65726174657c693a313635383138343936333b6572726f725f6d6573736167657c733a31333a22496e76616c6964204c6f67696e223b5f5f63695f766172737c613a313a7b733a31333a226572726f725f6d657373616765223b733a333a226f6c64223b7d61646d696e5f6c6f67696e7c733a313a2231223b6c6f67696e5f757365725f69647c733a313a2231223b6e616d657c733a31353a224cc3bc76656e65732043656e746572223b6c6f67696e5f747970657c733a353a2261646d696e223b),
('e1qukm4fdkldvnt29v0j3ril6k45j30l', '::1', 1658248510, 0x5f5f63695f6c6173745f726567656e65726174657c693a313635383234383531303b6572726f725f6d6573736167657c733a31333a22496e76616c6964204c6f67696e223b5f5f63695f766172737c613a313a7b733a31333a226572726f725f6d657373616765223b733a333a226f6c64223b7d61646d696e5f6c6f67696e7c733a313a2231223b6c6f67696e5f757365725f69647c733a313a2231223b6e616d657c733a31353a224cc3bc76656e65732043656e746572223b6c6f67696e5f747970657c733a353a2261646d696e223b),
('en0oirl1fka7h6q1lotcfocic680gfh0', '::1', 1658247381, 0x5f5f63695f6c6173745f726567656e65726174657c693a313635383234373338313b6572726f725f6d6573736167657c733a31333a22496e76616c6964204c6f67696e223b5f5f63695f766172737c613a313a7b733a31333a226572726f725f6d657373616765223b733a333a226f6c64223b7d61646d696e5f6c6f67696e7c733a313a2231223b6c6f67696e5f757365725f69647c733a313a2231223b6e616d657c733a31353a224cc3bc76656e65732043656e746572223b6c6f67696e5f747970657c733a353a2261646d696e223b),
('f8opunuhitm0jnm40gqj2om32iin7lp0', '::1', 1658181996, 0x5f5f63695f6c6173745f726567656e65726174657c693a313635383138313939363b6572726f725f6d6573736167657c733a31333a22496e76616c6964204c6f67696e223b5f5f63695f766172737c613a313a7b733a31333a226572726f725f6d657373616765223b733a333a226f6c64223b7d61646d696e5f6c6f67696e7c733a313a2231223b6c6f67696e5f757365725f69647c733a313a2231223b6e616d657c733a31353a224cc3bc76656e65732043656e746572223b6c6f67696e5f747970657c733a353a2261646d696e223b),
('fjvgi74t9rcam25nsgu6d2i6lrfkn0qr', '::1', 1658249560, 0x5f5f63695f6c6173745f726567656e65726174657c693a313635383234393536303b6572726f725f6d6573736167657c733a31333a22496e76616c6964204c6f67696e223b5f5f63695f766172737c613a313a7b733a31333a226572726f725f6d657373616765223b733a333a226f6c64223b7d61646d696e5f6c6f67696e7c733a313a2231223b6c6f67696e5f757365725f69647c733a313a2231223b6e616d657c733a31353a224cc3bc76656e65732043656e746572223b6c6f67696e5f747970657c733a353a2261646d696e223b),
('frebakejkhcu7uag7onvusvqhjq4lpch', '::1', 1658250628, 0x5f5f63695f6c6173745f726567656e65726174657c693a313635383235303632383b6572726f725f6d6573736167657c733a31333a22496e76616c6964204c6f67696e223b5f5f63695f766172737c613a313a7b733a31333a226572726f725f6d657373616765223b733a333a226f6c64223b7d61646d696e5f6c6f67696e7c733a313a2231223b6c6f67696e5f757365725f69647c733a313a2231223b6e616d657c733a31353a224cc3bc76656e65732043656e746572223b6c6f67696e5f747970657c733a353a2261646d696e223b),
('g393dmgmi1s6tejsadvdk6elt4eir943', '::1', 1658254699, 0x5f5f63695f6c6173745f726567656e65726174657c693a313635383235323339373b6572726f725f6d6573736167657c733a31333a22496e76616c6964204c6f67696e223b5f5f63695f766172737c613a313a7b733a31333a226572726f725f6d657373616765223b733a333a226f6c64223b7d61646d696e5f6c6f67696e7c733a313a2231223b6c6f67696e5f757365725f69647c733a313a2231223b6e616d657c733a31353a224cc3bc76656e65732043656e746572223b6c6f67696e5f747970657c733a353a2261646d696e223b),
('gmubjvd43n5rajm01n44ns67s5kp9lmf', '::1', 1658185091, 0x5f5f63695f6c6173745f726567656e65726174657c693a313635383138343936333b6572726f725f6d6573736167657c733a31333a22496e76616c6964204c6f67696e223b5f5f63695f766172737c613a313a7b733a31333a226572726f725f6d657373616765223b733a333a226f6c64223b7d61646d696e5f6c6f67696e7c733a313a2231223b6c6f67696e5f757365725f69647c733a313a2231223b6e616d657c733a31353a224cc3bc76656e65732043656e746572223b6c6f67696e5f747970657c733a353a2261646d696e223b),
('h7c68m62nnellct4omvhblbo38vniq2s', '::1', 1658179311, 0x5f5f63695f6c6173745f726567656e65726174657c693a313635383137393331313b6572726f725f6d6573736167657c733a31333a22496e76616c6964204c6f67696e223b5f5f63695f766172737c613a313a7b733a31333a226572726f725f6d657373616765223b733a333a226f6c64223b7d61646d696e5f6c6f67696e7c733a313a2231223b6c6f67696e5f757365725f69647c733a313a2231223b6e616d657c733a31353a224cc3bc76656e65732043656e746572223b6c6f67696e5f747970657c733a353a2261646d696e223b),
('ih4h04lp2p078tmcuqd8jib811c78t0r', '::1', 1658184249, 0x5f5f63695f6c6173745f726567656e65726174657c693a313635383138343234393b6572726f725f6d6573736167657c733a31333a22496e76616c6964204c6f67696e223b5f5f63695f766172737c613a313a7b733a31333a226572726f725f6d657373616765223b733a333a226f6c64223b7d61646d696e5f6c6f67696e7c733a313a2231223b6c6f67696e5f757365725f69647c733a313a2231223b6e616d657c733a31353a224cc3bc76656e65732043656e746572223b6c6f67696e5f747970657c733a353a2261646d696e223b),
('kv0kts4j31a5jloq4050ee3phsmaceo7', '::1', 1658245749, 0x5f5f63695f6c6173745f726567656e65726174657c693a313635383234353734393b6572726f725f6d6573736167657c733a31333a22496e76616c6964204c6f67696e223b5f5f63695f766172737c613a313a7b733a31333a226572726f725f6d657373616765223b733a333a226f6c64223b7d61646d696e5f6c6f67696e7c733a313a2231223b6c6f67696e5f757365725f69647c733a313a2231223b6e616d657c733a31353a224cc3bc76656e65732043656e746572223b6c6f67696e5f747970657c733a353a2261646d696e223b),
('lscl6mjor4bv78f13t9360feqkif3o7f', '::1', 1658178722, 0x5f5f63695f6c6173745f726567656e65726174657c693a313635383137383732323b6572726f725f6d6573736167657c733a31333a22496e76616c6964204c6f67696e223b5f5f63695f766172737c613a313a7b733a31333a226572726f725f6d657373616765223b733a333a226f6c64223b7d61646d696e5f6c6f67696e7c733a313a2231223b6c6f67696e5f757365725f69647c733a313a2231223b6e616d657c733a31353a224cc3bc76656e65732043656e746572223b6c6f67696e5f747970657c733a353a2261646d696e223b),
('mjib5f5b23v5ge5dk3gvjlkcvf72scc0', '::1', 1658181689, 0x5f5f63695f6c6173745f726567656e65726174657c693a313635383138313638393b6572726f725f6d6573736167657c733a31333a22496e76616c6964204c6f67696e223b5f5f63695f766172737c613a313a7b733a31333a226572726f725f6d657373616765223b733a333a226f6c64223b7d61646d696e5f6c6f67696e7c733a313a2231223b6c6f67696e5f757365725f69647c733a313a2231223b6e616d657c733a31353a224cc3bc76656e65732043656e746572223b6c6f67696e5f747970657c733a353a2261646d696e223b),
('n2ggpjj817dgupbgtn08thvd2fobmkan', '::1', 1658177987, 0x5f5f63695f6c6173745f726567656e65726174657c693a313635383137373938373b6572726f725f6d6573736167657c733a31333a22496e76616c6964204c6f67696e223b5f5f63695f766172737c613a313a7b733a31333a226572726f725f6d657373616765223b733a333a226f6c64223b7d61646d696e5f6c6f67696e7c733a313a2231223b6c6f67696e5f757365725f69647c733a313a2231223b6e616d657c733a31353a224cc3bc76656e65732043656e746572223b6c6f67696e5f747970657c733a353a2261646d696e223b),
('n3job3re0n26uvsosd8f60has6h2slq5', '::1', 1658250306, 0x5f5f63695f6c6173745f726567656e65726174657c693a313635383235303330363b6572726f725f6d6573736167657c733a31333a22496e76616c6964204c6f67696e223b5f5f63695f766172737c613a313a7b733a31333a226572726f725f6d657373616765223b733a333a226f6c64223b7d61646d696e5f6c6f67696e7c733a313a2231223b6c6f67696e5f757365725f69647c733a313a2231223b6e616d657c733a31353a224cc3bc76656e65732043656e746572223b6c6f67696e5f747970657c733a353a2261646d696e223b),
('ng1f8shaqbobtbenc051kc6v67uo18g1', '::1', 1658244511, 0x5f5f63695f6c6173745f726567656e65726174657c693a313635383234343531313b6572726f725f6d6573736167657c733a31333a22496e76616c6964204c6f67696e223b5f5f63695f766172737c613a313a7b733a31333a226572726f725f6d657373616765223b733a333a226f6c64223b7d61646d696e5f6c6f67696e7c733a313a2231223b6c6f67696e5f757365725f69647c733a313a2231223b6e616d657c733a31353a224cc3bc76656e65732043656e746572223b6c6f67696e5f747970657c733a353a2261646d696e223b),
('nps3nlup097ol281738mnlujk8bt43ks', '::1', 1658248165, 0x5f5f63695f6c6173745f726567656e65726174657c693a313635383234383136353b6572726f725f6d6573736167657c733a31333a22496e76616c6964204c6f67696e223b5f5f63695f766172737c613a313a7b733a31333a226572726f725f6d657373616765223b733a333a226f6c64223b7d61646d696e5f6c6f67696e7c733a313a2231223b6c6f67696e5f757365725f69647c733a313a2231223b6e616d657c733a31353a224cc3bc76656e65732043656e746572223b6c6f67696e5f747970657c733a353a2261646d696e223b),
('q07lfddmh2lv7jqq8urvbcluhsb4r9i3', '::1', 1658252397, 0x5f5f63695f6c6173745f726567656e65726174657c693a313635383235323339373b6572726f725f6d6573736167657c733a31333a22496e76616c6964204c6f67696e223b5f5f63695f766172737c613a313a7b733a31333a226572726f725f6d657373616765223b733a333a226f6c64223b7d61646d696e5f6c6f67696e7c733a313a2231223b6c6f67696e5f757365725f69647c733a313a2231223b6e616d657c733a31353a224cc3bc76656e65732043656e746572223b6c6f67696e5f747970657c733a353a2261646d696e223b),
('rhhhg6hv3fom7hdgqtoe8gdibrj2rjct', '::1', 1658177569, 0x5f5f63695f6c6173745f726567656e65726174657c693a313635383137373536393b6572726f725f6d6573736167657c733a31333a22496e76616c6964204c6f67696e223b5f5f63695f766172737c613a313a7b733a31333a226572726f725f6d657373616765223b733a333a226f6c64223b7d61646d696e5f6c6f67696e7c733a313a2231223b6c6f67696e5f757365725f69647c733a313a2231223b6e616d657c733a31353a224cc3bc76656e65732043656e746572223b6c6f67696e5f747970657c733a353a2261646d696e223b),
('t4nh883904j3kv6ao73l65pgtfrsis6f', '::1', 1658246124, 0x5f5f63695f6c6173745f726567656e65726174657c693a313635383234363132343b6572726f725f6d6573736167657c733a31333a22496e76616c6964204c6f67696e223b5f5f63695f766172737c613a313a7b733a31333a226572726f725f6d657373616765223b733a333a226f6c64223b7d61646d696e5f6c6f67696e7c733a313a2231223b6c6f67696e5f757365725f69647c733a313a2231223b6e616d657c733a31353a224cc3bc76656e65732043656e746572223b6c6f67696e5f747970657c733a353a2261646d696e223b),
('tgja5ekbg5uv1i35utuqude2qnor2blv', '::1', 1658245020, 0x5f5f63695f6c6173745f726567656e65726174657c693a313635383234353032303b6572726f725f6d6573736167657c733a31333a22496e76616c6964204c6f67696e223b5f5f63695f766172737c613a313a7b733a31333a226572726f725f6d657373616765223b733a333a226f6c64223b7d61646d696e5f6c6f67696e7c733a313a2231223b6c6f67696e5f757365725f69647c733a313a2231223b6e616d657c733a31353a224cc3bc76656e65732043656e746572223b6c6f67696e5f747970657c733a353a2261646d696e223b),
('th8k5m8tmc80deb6dguv52jso1b9ti1g', '::1', 1658180463, 0x5f5f63695f6c6173745f726567656e65726174657c693a313635383138303436333b6572726f725f6d6573736167657c733a31333a22496e76616c6964204c6f67696e223b5f5f63695f766172737c613a313a7b733a31333a226572726f725f6d657373616765223b733a333a226f6c64223b7d61646d696e5f6c6f67696e7c733a313a2231223b6c6f67696e5f757365725f69647c733a313a2231223b6e616d657c733a31353a224cc3bc76656e65732043656e746572223b6c6f67696e5f747970657c733a353a2261646d696e223b),
('u009100qfg8qfq5sup74agij2q0en3ng', '::1', 1658180852, 0x5f5f63695f6c6173745f726567656e65726174657c693a313635383138303835323b6572726f725f6d6573736167657c733a31333a22496e76616c6964204c6f67696e223b5f5f63695f766172737c613a313a7b733a31333a226572726f725f6d657373616765223b733a333a226f6c64223b7d61646d696e5f6c6f67696e7c733a313a2231223b6c6f67696e5f757365725f69647c733a313a2231223b6e616d657c733a31353a224cc3bc76656e65732043656e746572223b6c6f67696e5f747970657c733a353a2261646d696e223b),
('v18bipo1u4np7p6rpa1o0ilbggotv2qa', '::1', 1658252026, 0x5f5f63695f6c6173745f726567656e65726174657c693a313635383235323032363b6572726f725f6d6573736167657c733a31333a22496e76616c6964204c6f67696e223b5f5f63695f766172737c613a313a7b733a31333a226572726f725f6d657373616765223b733a333a226f6c64223b7d61646d696e5f6c6f67696e7c733a313a2231223b6c6f67696e5f757365725f69647c733a313a2231223b6e616d657c733a31353a224cc3bc76656e65732043656e746572223b6c6f67696e5f747970657c733a353a2261646d696e223b),
('vuil9q64kppecoi8ed5rjurm52v0qotg', '::1', 1658248841, 0x5f5f63695f6c6173745f726567656e65726174657c693a313635383234383834313b6572726f725f6d6573736167657c733a31333a22496e76616c6964204c6f67696e223b5f5f63695f766172737c613a313a7b733a31333a226572726f725f6d657373616765223b733a333a226f6c64223b7d61646d696e5f6c6f67696e7c733a313a2231223b6c6f67696e5f757365725f69647c733a313a2231223b6e616d657c733a31353a224cc3bc76656e65732043656e746572223b6c6f67696e5f747970657c733a353a2261646d696e223b);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `client`
--

CREATE TABLE `client` (
  `client_id` int(11) NOT NULL,
  `name` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `website` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `skype_id` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `facebook_profile_link` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `linkedin_profile_link` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `twitter_profile_link` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `short_note` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `chat_status` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'offline'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `client`
--

INSERT INTO `client` (`client_id`, `name`, `email`, `password`, `address`, `phone`, `website`, `skype_id`, `facebook_profile_link`, `linkedin_profile_link`, `twitter_profile_link`, `short_note`, `chat_status`) VALUES
(4, ' Mendoza Navarro', 'admin@therejuvenateconcept.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Luigi Pirandello 5451, Luigi Pirandello 5451, Luigi Pirandello 5451', '+523322090166', '', '', '', '', '', '', 'offline');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `client_pending`
--

CREATE TABLE `client_pending` (
  `client_pending_id` int(11) NOT NULL,
  `name` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` longtext COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `company`
--

CREATE TABLE `company` (
  `company_id` int(11) NOT NULL,
  `name` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `website` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `client_id` int(11) DEFAULT NULL,
  `influencer_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `currency`
--

CREATE TABLE `currency` (
  `currency_id` int(11) NOT NULL,
  `currency_code` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `currency_symbol` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `currency_name` longtext COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `currency`
--

INSERT INTO `currency` (`currency_id`, `currency_code`, `currency_symbol`, `currency_name`) VALUES
(1, 'USD', '$', 'US dollar'),
(2, 'GBP', '£', 'Pound'),
(3, 'EUR', '€', 'Euro'),
(4, 'AUD', '$', 'Australian Dollar'),
(5, 'CAD', '$', 'Canadian Dollar'),
(6, 'JPY', '¥', 'Japanese Yen'),
(7, 'NZD', '$', 'N.Z. Dollar'),
(8, 'CHF', 'Fr', 'Swiss Franc'),
(9, 'HKD', '$', 'Hong Kong Dollar'),
(10, 'SGD', '$', 'Singapore Dollar'),
(11, 'SEK', 'kr', 'Swedish Krona'),
(12, 'DKK', 'kr', 'Danish Krone'),
(13, 'PLN', 'zł', 'Polish Zloty'),
(14, 'HUF', 'Ft', 'Hungarian Forint'),
(15, 'CZK', 'Kč', 'Czech Koruna'),
(16, 'MXN', '$', 'Mexican Peso'),
(17, 'CZK', 'Kč', 'Czech Koruna'),
(18, 'MYR', 'RM', 'Malaysian Ringgit');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `document`
--

CREATE TABLE `document` (
  `document_id` int(11) NOT NULL,
  `title` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `file_name` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `file_type` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `class_id` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `teacher_id` int(11) DEFAULT NULL,
  `timestamp` longtext COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `email_template`
--

CREATE TABLE `email_template` (
  `email_template_id` int(11) NOT NULL,
  `task` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `subject` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `body` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `instruction` longtext COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `email_template`
--

INSERT INTO `email_template` (`email_template_id`, `task`, `subject`, `body`, `instruction`) VALUES
(1, 'new_project_opening', 'New project created', '<span>\r\n<div>Hello, [CLIENT_NAME], <br>we have created a new project with your account.<br><br>Project name : [PROJECT_NAME]<br>Please follow the link below to view status and updates of the project.<br>[PROJECT_LINK]</div></span>', ''),
(2, 'new_client_account_opening', 'Client account creation', '<span><div>Hi [CLIENT_NAME],</div></span>Your client account is created !<span>Please login to your client account panel here :&nbsp;<br></span>[SYSTEM_URL]<br>Login credential :<br>email : [CLIENT_EMAIL]<br>password : [CLIENT_PASSWORD]', ''),
(3, 'new_staff_account_opening', 'Staff account creation', '<span>\n<div><div>Hi [STAFF_NAME],</div>Your staff account is created !&nbsp;Please login to your staff account panel here :&nbsp;<br>[SYSTEM_URL]<br>Login credential :<br>email : [STAFF_EMAIL]<br>password : [STAFF_PASSWORD]<br></div></span>', ''),
(4, 'payment_completion_notification', 'Payment completion notification', '<span>\n<div>Your payment of invoice [INVOICE_NUMBER] is completed.<br>You can review your payment history here :<br>[SYSTEM_PAYMENT_URL]</div></span>', ''),
(5, 'new_support_ticket_notify_admin', 'New support ticket notification', 'Hi [ADMIN_NAME],<br>A new support ticket is submitted. Ticket code : [TICKET_CODE]<br><br>Review all opened support tickets here :<br>[SYSTEM_OPENED_TICKET_URL]<br>', ''),
(6, 'support_ticket_assign_staff', 'Support ticket assignment notification', 'Hi [STAFF_NAME],<br>A new support ticket is assigned. Ticket code : [TICKET_CODE]<br><br>Review all opened support tickets here :<br>[SYSTEM_OPENED_TICKET_URL]', ''),
(7, 'new_message_notification', 'New message notification.', 'A new message has been sent by [SENDER_NAME].<br><br><span class=\"wysiwyg-color-silver\">[MESSAGE]<br></span><br><span>To reply to this message, login to your account :<br></span>[SYSTEM_URL]', ''),
(8, 'password_reset_confirmation', 'Password reset notification', 'Hi [NAME],<br>Your password is reset. New password : [NEW_PASSWORD]<br>Login here with your new password :<br>[SYSTEM_URL]<br><br>You can change your password after logging in to your account.', ''),
(9, 'new_client_account_confirm', 'New Client account confirmed', '<span><div>Hi [CLIENT_NAME],</div></span>Your client account is confirmed!<span>Please login to your client account panel here :&nbsp;<br></span>[SYSTEM_URL]<br>', ''),
(10, 'new_admin_account_creation', 'Admin Account Creation', '<span><div>Hi [ADMIN_NAME],</div></span>Your admin account is created !<span>Please login to your admin account panel here :&nbsp;<br></span>[SYSTEM_URL]<br>Login credential :<br>email : [ADMIN_EMAIL]<br>password : [ADMIN_PASSWORD]', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `expense_category`
--

CREATE TABLE `expense_category` (
  `expense_category_id` int(11) NOT NULL,
  `title` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `influencer`
--

CREATE TABLE `influencer` (
  `influencer_id` int(11) NOT NULL,
  `name` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `website` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `skype_id` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `facebook_profile_link` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `linkedin_profile_link` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `twitter_profile_link` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `short_note` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `chat_status` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'offline'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `influencer`
--

INSERT INTO `influencer` (`influencer_id`, `name`, `email`, `password`, `address`, `phone`, `website`, `skype_id`, `facebook_profile_link`, `linkedin_profile_link`, `twitter_profile_link`, `short_note`, `chat_status`) VALUES
(1, 'José Antonio Mendoza Navarro', 'admin@therejuvenateconcept.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Luigi Pirandello 5451, Luigi Pirandello 5451, Luigi Pirandello 5451', '+523322090166', '', '', '', '', '', '', 'offline');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `invoice`
--

CREATE TABLE `invoice` (
  `invoice_id` int(11) NOT NULL,
  `invoice_number` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `client_id` int(11) DEFAULT NULL,
  `project_id` int(11) DEFAULT NULL,
  `title` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `invoice_entries` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `creation_timestamp` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `due_timestamp` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT 'paid or unpaid',
  `vat_percentage` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `discount_amount` longtext COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `message`
--

CREATE TABLE `message` (
  `message_id` int(11) NOT NULL,
  `message_thread_code` longtext DEFAULT NULL,
  `message` longtext DEFAULT NULL,
  `sender` longtext DEFAULT NULL,
  `timestamp` longtext DEFAULT NULL,
  `read_status` int(11) NOT NULL DEFAULT 0 COMMENT '0 unread 1 read'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `message_thread`
--

CREATE TABLE `message_thread` (
  `message_thread_id` int(11) NOT NULL,
  `message_thread_code` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `sender` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `reciever` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_message_timestamp` longtext COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `note`
--

CREATE TABLE `note` (
  `note_id` int(11) NOT NULL,
  `title` longtext COLLATE utf8_unicode_ci NOT NULL,
  `note` longtext COLLATE utf8_unicode_ci NOT NULL,
  `user_type` longtext COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `timestamp_create` longtext COLLATE utf8_unicode_ci NOT NULL,
  `timestamp_last_update` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notice`
--

CREATE TABLE `notice` (
  `notice_id` int(11) NOT NULL,
  `title` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `published_by` int(11) DEFAULT NULL,
  `visible_for` int(11) NOT NULL DEFAULT 1 COMMENT '1-all, 2-staff, 3-client',
  `date_added` int(11) DEFAULT NULL,
  `last_modified` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(11) NOT NULL,
  `project_code` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `amount` int(11) NOT NULL DEFAULT 0,
  `title` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `payment_method` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `timestamp` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `milestone_id` int(11) DEFAULT NULL,
  `expense_category_id` int(11) DEFAULT NULL,
  `client_id` int(11) DEFAULT NULL,
  `company_id` int(11) DEFAULT NULL,
  `influencer_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `payment`
--

INSERT INTO `payment` (`payment_id`, `project_code`, `type`, `amount`, `title`, `description`, `payment_method`, `timestamp`, `milestone_id`, `expense_category_id`, `client_id`, `company_id`, `influencer_id`) VALUES
(1, '118f8bc6a0', 'income', 10, 'test', '', 'cash', '1656538058', 1, NULL, 4, 0, NULL),
(2, '118f8bc6a0', 'income', 20, 'test2', 'q2wwedwq', 'cash', '1656538122', 2, NULL, 4, 0, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `Nombre` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `descripcion` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `publicado_por` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `visible_for` int(11) NOT NULL DEFAULT 1 COMMENT '1-all, 2-staff, 3-client',
  `date_added` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_modified` int(11) DEFAULT NULL,
  `marca` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `existencia` int(11) NOT NULL,
  `costo` int(11) NOT NULL,
  `precio` int(11) NOT NULL,
  `categories` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `file` longtext COLLATE utf8_unicode_ci NOT NULL,
  `caducidad` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `product`
--

INSERT INTO `product` (`product_id`, `Nombre`, `descripcion`, `publicado_por`, `visible_for`, `date_added`, `last_modified`, `marca`, `existencia`, `costo`, `precio`, `categories`, `file`, `caducidad`) VALUES
(15, 'Prueba3', 'Prueba3', '1', 0, '1657140274', 1657141071, 'Prueba3', 5, 500, 1500, 'Prueba3', '', '2022-07-14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `project`
--

CREATE TABLE `project` (
  `project_id` int(11) NOT NULL,
  `project_code` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `title` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `demo_url` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `project_category_id` int(11) DEFAULT NULL,
  `client_id` int(11) DEFAULT NULL,
  `influencer_id` int(11) DEFAULT NULL,
  `company_id` int(11) DEFAULT NULL,
  `staffs` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `budget` int(11) NOT NULL DEFAULT 0,
  `timer_status` int(11) NOT NULL DEFAULT 0 COMMENT '1 running 0stopped',
  `timer_starting_timestamp` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `total_time_spent` int(11) NOT NULL DEFAULT 0 COMMENT 'second',
  `progress_status` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `timestamp_start` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `timestamp_end` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `project_status` int(11) NOT NULL DEFAULT 1 COMMENT '1 for running, 0 for archived',
  `project_note` longtext COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `project`
--

INSERT INTO `project` (`project_id`, `project_code`, `title`, `description`, `demo_url`, `project_category_id`, `client_id`, `influencer_id`, `company_id`, `staffs`, `budget`, `timer_status`, `timer_starting_timestamp`, `total_time_spent`, `progress_status`, `timestamp_start`, `timestamp_end`, `project_status`, `project_note`) VALUES
(3, 'a001a56586', 'test', 'test', '', NULL, 0, 1, 0, '5,', 0, 0, NULL, 0, '0', '', '', 1, 'Prueba');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `project_bug`
--

CREATE TABLE `project_bug` (
  `project_bug_id` int(11) NOT NULL,
  `project_code` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `title` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_type` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `file` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL COMMENT '0 for pending, 1 for solved',
  `timestamp` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `assigned_staff` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `project_bug`
--

INSERT INTO `project_bug` (`project_bug_id`, `project_code`, `title`, `description`, `user_type`, `user_id`, `file`, `status`, `timestamp`, `assigned_staff`) VALUES
(3, 'a001a56586', 'prueba', 'prueba', 'admin', 1, NULL, 0, '1657218120', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `project_category`
--

CREATE TABLE `project_category` (
  `project_category_id` int(11) NOT NULL,
  `name` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `project_file`
--

CREATE TABLE `project_file` (
  `project_file_id` int(11) NOT NULL,
  `project_id` int(11) DEFAULT NULL,
  `description` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `visibility_client` int(11) NOT NULL DEFAULT 1 COMMENT '1visible 0hidden',
  `visibility_staff` int(11) NOT NULL DEFAULT 1 COMMENT '1visible 0hidden',
  `size` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `file_type` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `uploader_type` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `uploader_id` int(11) DEFAULT NULL,
  `timestamp_upload` longtext COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `project_historia_clinica`
--

CREATE TABLE `project_historia_clinica` (
  `project_historia_clinica_id` int(11) NOT NULL,
  `project_code` longtext DEFAULT NULL,
  `assigned_staff` longtext DEFAULT NULL,
  `nombre_completo` longtext DEFAULT NULL,
  `title` longtext DEFAULT NULL,
  `nacimiento` longtext DEFAULT NULL,
  `nacionalidad` longtext DEFAULT NULL,
  `sexo` int(11) DEFAULT NULL COMMENT '0 for Masculino, 1 for Femenino',
  `genero` longtext DEFAULT NULL,
  `regla` longtext DEFAULT NULL,
  `embarazo` int(11) DEFAULT NULL COMMENT '0 for no, 1 for si',
  `menopausia` int(11) DEFAULT NULL COMMENT '0 for no, 1 for si',
  `estatura` longtext DEFAULT NULL,
  `peso` longtext DEFAULT NULL,
  `estado_civil` int(11) DEFAULT NULL COMMENT '0 for soltero, 1 for casado',
  `grado_estudios` longtext DEFAULT NULL,
  `ocupacion` longtext DEFAULT NULL,
  `email` longtext DEFAULT NULL,
  `motivo_consulta` longtext DEFAULT NULL,
  `alergias` longtext DEFAULT NULL,
  `enfermedades_cronicas` longtext DEFAULT NULL,
  `farmacos_actuales` longtext DEFAULT NULL,
  `suplementos` longtext DEFAULT NULL,
  `cirujias_previas` longtext DEFAULT NULL,
  `tratamientos_esteticos` longtext DEFAULT NULL,
  `rutina_piel` longtext DEFAULT NULL,
  `notas` longtext DEFAULT NULL,
  `timestamp` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `project_historia_clinica`
--

INSERT INTO `project_historia_clinica` (`project_historia_clinica_id`, `project_code`, `assigned_staff`, `nombre_completo`, `title`, `nacimiento`, `nacionalidad`, `sexo`, `genero`, `regla`, `embarazo`, `menopausia`, `estatura`, `peso`, `estado_civil`, `grado_estudios`, `ocupacion`, `email`, `motivo_consulta`, `alergias`, `enfermedades_cronicas`, `farmacos_actuales`, `suplementos`, `cirujias_previas`, `tratamientos_esteticos`, `rutina_piel`, `notas`, `timestamp`) VALUES
(3, 'a001a56586', '5', 'Nombre', 'Titulo', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Me duele la pierna', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1658179814'),
(4, 'a001a56586', '', 'a', 'Prueba', '2022-07-14', 'a', 0, 'a', '', 0, 0, '157', '50', 0, 'Preparatoria', 'asd', 'julio@test.com', 'Me duele la pierna', '', '', '', '', '', '', '', '', '1658254920');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `project_lab`
--

CREATE TABLE `project_lab` (
  `project_lab_id` int(11) NOT NULL,
  `project_id` int(11) DEFAULT NULL,
  `description` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `visibility_client` int(11) NOT NULL DEFAULT 1 COMMENT '1visible 0hidden',
  `visibility_staff` int(11) NOT NULL DEFAULT 1 COMMENT '1visible 0hidden',
  `size` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `file_type` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `uploader_type` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `uploader_id` int(11) DEFAULT NULL,
  `timestamp_upload` longtext COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `project_message`
--

CREATE TABLE `project_message` (
  `project_message_id` int(11) NOT NULL,
  `message` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `project_id` int(11) DEFAULT NULL,
  `date` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_type` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `message_file_name` longtext COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `project_milestone`
--

CREATE TABLE `project_milestone` (
  `project_milestone_id` int(11) NOT NULL,
  `title` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `project_code` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `client_id` int(11) DEFAULT NULL,
  `company_id` int(11) DEFAULT NULL,
  `amount` int(11) NOT NULL DEFAULT 0,
  `timestamp` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `currency_id` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL COMMENT '0 for unpaid, 1 for paid',
  `note` longtext COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `project_milestone`
--

INSERT INTO `project_milestone` (`project_milestone_id`, `title`, `project_code`, `client_id`, `company_id`, `amount`, `timestamp`, `currency_id`, `status`, `note`) VALUES
(1, 'test', '118f8bc6a0', 4, 0, 10, '1656453600', NULL, 1, ''),
(2, 'test2', '118f8bc6a0', 4, 0, 20, '1656540000', NULL, 1, 'test');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `project_progreso`
--

CREATE TABLE `project_progreso` (
  `project_progreso_id` int(11) NOT NULL,
  `project_id` int(11) DEFAULT NULL,
  `description` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `visibility_client` int(11) NOT NULL DEFAULT 1 COMMENT '1visible 0hidden',
  `visibility_staff` int(11) NOT NULL DEFAULT 1 COMMENT '1visible 0hidden',
  `size` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `file_type` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `uploader_type` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `uploader_id` int(11) DEFAULT NULL,
  `timestamp_upload` longtext COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `project_task`
--

CREATE TABLE `project_task` (
  `project_task_id` int(11) NOT NULL,
  `project_id` int(11) DEFAULT NULL,
  `title` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `staff_id` int(11) DEFAULT NULL,
  `complete_status` int(11) DEFAULT NULL,
  `status` longtext COLLATE utf8_unicode_ci NOT NULL,
  `timestamp_start` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `timestamp_end` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `task_color` longtext COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `project_timesheet`
--

CREATE TABLE `project_timesheet` (
  `project_timesheet_id` int(11) NOT NULL,
  `start_timestamp` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `end_timestamp` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `project_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `quote`
--

CREATE TABLE `quote` (
  `quote_id` int(11) NOT NULL,
  `title` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `timestamp` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `amount` longtext COLLATE utf8_unicode_ci NOT NULL,
  `files` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `quote_message`
--

CREATE TABLE `quote_message` (
  `quote_message_id` int(11) NOT NULL,
  `quote_id` int(11) DEFAULT NULL,
  `message` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `file` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_type` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `timestamp` longtext COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `schedule`
--

CREATE TABLE `schedule` (
  `schedule_id` int(11) NOT NULL,
  `user_type` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_id` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `title` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `timestamp` longtext COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `settings`
--

CREATE TABLE `settings` (
  `settings_id` int(11) NOT NULL,
  `type` longtext DEFAULT NULL,
  `description` longtext DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `settings`
--

INSERT INTO `settings` (`settings_id`, `type`, `description`) VALUES
(1, 'system_name', 'Lüvenes Center'),
(2, 'system_title', 'Lüvenes Center'),
(3, 'address', 'Sydney, Australia'),
(4, 'phone', '2560565'),
(5, 'paypal_email', ''),
(6, 'currency', 'usd'),
(7, 'system_email', 'admin@example.com'),
(8, 'buyer', '[ your-codecanyon-username-here ]'),
(9, 'purchase_code', '3f848de3-0cb0-488f-9165-c8e1fbaf1901'),
(10, 'language', 'english'),
(11, 'text_align', 'left-to-right'),
(12, 'system_currency_id', '1'),
(13, 'theme', NULL),
(14, 'stripe_publishable_key', ''),
(15, 'stripe_api_key', ''),
(16, 'dropbox_data_app_key', NULL),
(17, 'skin_colour', 'default'),
(18, 'paypal_type', 'live'),
(27, 'smtp_host', 'ssl://smtp.googlemail.com'),
(24, 'paypal', '[{\"active\":\"1\",\"mode\":\"sandbox\",\"sandbox_client_id\":\"AZDxjDScFpQtjWTOUtWKbyN_bDt4OgqaF4eYXlewfBP4-8aqX3PiV8e1GWU6liB2CUXlkA59kJXE7M6R\",\"production_client_id\":\"SomeId\"}]'),
(25, 'stripe_keys', '[{\"active\":\"1\",\"testmode\":\"on\",\"public_key\":\"pk_test_c6VvBEbwHFdulFZ62q1IQrar\",\"secret_key\":\"sk_test_9IMkiM6Ykxr1LCe2dJ3PgaxS\",\"public_live_key\":\"pk_live_xxxxxxxxxxxxxxxxxxxxxxxx\",\"secret_live_key\":\"sk_live_xxxxxxxxxxxxxxxxxxxxxxxx\"}]'),
(26, 'version', '5.0'),
(28, 'smtp_port', '465'),
(34, 'protocol', 'smtp'),
(35, 'smtp_user', 'Your real email'),
(36, 'smtp_pass', 'Your real password');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `staff`
--

CREATE TABLE `staff` (
  `staff_id` int(11) NOT NULL,
  `name` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `account_role_id` int(11) DEFAULT NULL,
  `phone` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `skype_id` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `facebook_profile_link` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `twitter_profile_link` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `linkedin_profile_link` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `chat_status` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'offline'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `staff`
--

INSERT INTO `staff` (`staff_id`, `name`, `email`, `password`, `account_role_id`, `phone`, `skype_id`, `facebook_profile_link`, `twitter_profile_link`, `linkedin_profile_link`, `chat_status`) VALUES
(5, 'Personal1', 'hugo.valero@yocontigo-it.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 1, NULL, NULL, NULL, NULL, NULL, 'offline');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `support_canned_message`
--

CREATE TABLE `support_canned_message` (
  `support_canned_message_id` int(11) NOT NULL,
  `title` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `team_subtask`
--

CREATE TABLE `team_subtask` (
  `team_subtask_id` int(11) NOT NULL,
  `title` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `team_task_id` int(11) DEFAULT NULL,
  `subtask_status` int(11) NOT NULL DEFAULT 1 COMMENT '1 for incomplete , 0 for complete'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `team_task`
--

CREATE TABLE `team_task` (
  `team_task_id` int(11) NOT NULL,
  `task_title` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `task_note` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `assigned_staff_ids` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `creation_timestamp` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `due_timestamp` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `task_status` int(11) NOT NULL DEFAULT 1 COMMENT '0 for archived, 1 for running'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `team_task_file`
--

CREATE TABLE `team_task_file` (
  `team_task_file_id` int(11) NOT NULL,
  `name` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `team_task_id` int(11) DEFAULT NULL,
  `upload_timestamp` longtext COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ticket`
--

CREATE TABLE `ticket` (
  `ticket_id` int(11) NOT NULL,
  `title` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `ticket_code` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT 'opened closed',
  `priority` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `client_id` int(11) DEFAULT NULL,
  `assigned_staff_id` int(11) DEFAULT NULL,
  `project_id` int(11) DEFAULT NULL,
  `timestamp` longtext COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ticket_message`
--

CREATE TABLE `ticket_message` (
  `ticket_message_id` int(11) NOT NULL,
  `ticket_code` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `message` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `file` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `sender_type` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `sender_id` int(11) DEFAULT NULL,
  `timestamp` longtext COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `todo`
--

CREATE TABLE `todo` (
  `todo_id` int(11) NOT NULL,
  `title` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `user` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `order` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `account_permission`
--
ALTER TABLE `account_permission`
  ADD PRIMARY KEY (`account_permission_id`);

--
-- Indices de la tabla `account_role`
--
ALTER TABLE `account_role`
  ADD PRIMARY KEY (`account_role_id`);

--
-- Indices de la tabla `addons`
--
ALTER TABLE `addons`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indices de la tabla `bookmark`
--
ALTER TABLE `bookmark`
  ADD PRIMARY KEY (`bookmark_id`);

--
-- Indices de la tabla `calendar_event`
--
ALTER TABLE `calendar_event`
  ADD PRIMARY KEY (`calendar_event_id`);

--
-- Indices de la tabla `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Indices de la tabla `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`client_id`);

--
-- Indices de la tabla `client_pending`
--
ALTER TABLE `client_pending`
  ADD PRIMARY KEY (`client_pending_id`);

--
-- Indices de la tabla `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`company_id`);

--
-- Indices de la tabla `currency`
--
ALTER TABLE `currency`
  ADD PRIMARY KEY (`currency_id`);

--
-- Indices de la tabla `document`
--
ALTER TABLE `document`
  ADD PRIMARY KEY (`document_id`);

--
-- Indices de la tabla `email_template`
--
ALTER TABLE `email_template`
  ADD PRIMARY KEY (`email_template_id`);

--
-- Indices de la tabla `expense_category`
--
ALTER TABLE `expense_category`
  ADD PRIMARY KEY (`expense_category_id`);

--
-- Indices de la tabla `influencer`
--
ALTER TABLE `influencer`
  ADD PRIMARY KEY (`influencer_id`);

--
-- Indices de la tabla `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`invoice_id`);

--
-- Indices de la tabla `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`message_id`);

--
-- Indices de la tabla `message_thread`
--
ALTER TABLE `message_thread`
  ADD PRIMARY KEY (`message_thread_id`);

--
-- Indices de la tabla `note`
--
ALTER TABLE `note`
  ADD PRIMARY KEY (`note_id`);

--
-- Indices de la tabla `notice`
--
ALTER TABLE `notice`
  ADD PRIMARY KEY (`notice_id`);

--
-- Indices de la tabla `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indices de la tabla `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indices de la tabla `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`project_id`);

--
-- Indices de la tabla `project_bug`
--
ALTER TABLE `project_bug`
  ADD PRIMARY KEY (`project_bug_id`);

--
-- Indices de la tabla `project_category`
--
ALTER TABLE `project_category`
  ADD PRIMARY KEY (`project_category_id`);

--
-- Indices de la tabla `project_file`
--
ALTER TABLE `project_file`
  ADD PRIMARY KEY (`project_file_id`);

--
-- Indices de la tabla `project_historia_clinica`
--
ALTER TABLE `project_historia_clinica`
  ADD PRIMARY KEY (`project_historia_clinica_id`);

--
-- Indices de la tabla `project_lab`
--
ALTER TABLE `project_lab`
  ADD PRIMARY KEY (`project_lab_id`);

--
-- Indices de la tabla `project_message`
--
ALTER TABLE `project_message`
  ADD PRIMARY KEY (`project_message_id`);

--
-- Indices de la tabla `project_milestone`
--
ALTER TABLE `project_milestone`
  ADD PRIMARY KEY (`project_milestone_id`);

--
-- Indices de la tabla `project_progreso`
--
ALTER TABLE `project_progreso`
  ADD PRIMARY KEY (`project_progreso_id`);

--
-- Indices de la tabla `project_task`
--
ALTER TABLE `project_task`
  ADD PRIMARY KEY (`project_task_id`);

--
-- Indices de la tabla `project_timesheet`
--
ALTER TABLE `project_timesheet`
  ADD PRIMARY KEY (`project_timesheet_id`);

--
-- Indices de la tabla `quote`
--
ALTER TABLE `quote`
  ADD PRIMARY KEY (`quote_id`);

--
-- Indices de la tabla `quote_message`
--
ALTER TABLE `quote_message`
  ADD PRIMARY KEY (`quote_message_id`);

--
-- Indices de la tabla `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`schedule_id`);

--
-- Indices de la tabla `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`settings_id`);

--
-- Indices de la tabla `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staff_id`);

--
-- Indices de la tabla `support_canned_message`
--
ALTER TABLE `support_canned_message`
  ADD PRIMARY KEY (`support_canned_message_id`);

--
-- Indices de la tabla `team_subtask`
--
ALTER TABLE `team_subtask`
  ADD PRIMARY KEY (`team_subtask_id`);

--
-- Indices de la tabla `team_task`
--
ALTER TABLE `team_task`
  ADD PRIMARY KEY (`team_task_id`);

--
-- Indices de la tabla `team_task_file`
--
ALTER TABLE `team_task_file`
  ADD PRIMARY KEY (`team_task_file_id`);

--
-- Indices de la tabla `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`ticket_id`);

--
-- Indices de la tabla `ticket_message`
--
ALTER TABLE `ticket_message`
  ADD PRIMARY KEY (`ticket_message_id`);

--
-- Indices de la tabla `todo`
--
ALTER TABLE `todo`
  ADD PRIMARY KEY (`todo_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `account_permission`
--
ALTER TABLE `account_permission`
  MODIFY `account_permission_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `account_role`
--
ALTER TABLE `account_role`
  MODIFY `account_role_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `addons`
--
ALTER TABLE `addons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `bookmark`
--
ALTER TABLE `bookmark`
  MODIFY `bookmark_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `calendar_event`
--
ALTER TABLE `calendar_event`
  MODIFY `calendar_event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `client`
--
ALTER TABLE `client`
  MODIFY `client_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `client_pending`
--
ALTER TABLE `client_pending`
  MODIFY `client_pending_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `company`
--
ALTER TABLE `company`
  MODIFY `company_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `currency`
--
ALTER TABLE `currency`
  MODIFY `currency_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `document`
--
ALTER TABLE `document`
  MODIFY `document_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `email_template`
--
ALTER TABLE `email_template`
  MODIFY `email_template_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `expense_category`
--
ALTER TABLE `expense_category`
  MODIFY `expense_category_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `influencer`
--
ALTER TABLE `influencer`
  MODIFY `influencer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `invoice`
--
ALTER TABLE `invoice`
  MODIFY `invoice_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `message`
--
ALTER TABLE `message`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `message_thread`
--
ALTER TABLE `message_thread`
  MODIFY `message_thread_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `note`
--
ALTER TABLE `note`
  MODIFY `note_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `notice`
--
ALTER TABLE `notice`
  MODIFY `notice_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `project`
--
ALTER TABLE `project`
  MODIFY `project_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `project_bug`
--
ALTER TABLE `project_bug`
  MODIFY `project_bug_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `project_category`
--
ALTER TABLE `project_category`
  MODIFY `project_category_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `project_file`
--
ALTER TABLE `project_file`
  MODIFY `project_file_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `project_historia_clinica`
--
ALTER TABLE `project_historia_clinica`
  MODIFY `project_historia_clinica_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `project_lab`
--
ALTER TABLE `project_lab`
  MODIFY `project_lab_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `project_message`
--
ALTER TABLE `project_message`
  MODIFY `project_message_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `project_milestone`
--
ALTER TABLE `project_milestone`
  MODIFY `project_milestone_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `project_progreso`
--
ALTER TABLE `project_progreso`
  MODIFY `project_progreso_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `project_task`
--
ALTER TABLE `project_task`
  MODIFY `project_task_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `project_timesheet`
--
ALTER TABLE `project_timesheet`
  MODIFY `project_timesheet_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `quote`
--
ALTER TABLE `quote`
  MODIFY `quote_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `quote_message`
--
ALTER TABLE `quote_message`
  MODIFY `quote_message_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `schedule`
--
ALTER TABLE `schedule`
  MODIFY `schedule_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `settings`
--
ALTER TABLE `settings`
  MODIFY `settings_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de la tabla `staff`
--
ALTER TABLE `staff`
  MODIFY `staff_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `support_canned_message`
--
ALTER TABLE `support_canned_message`
  MODIFY `support_canned_message_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `team_subtask`
--
ALTER TABLE `team_subtask`
  MODIFY `team_subtask_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `team_task`
--
ALTER TABLE `team_task`
  MODIFY `team_task_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `team_task_file`
--
ALTER TABLE `team_task_file`
  MODIFY `team_task_file_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ticket`
--
ALTER TABLE `ticket`
  MODIFY `ticket_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ticket_message`
--
ALTER TABLE `ticket_message`
  MODIFY `ticket_message_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `todo`
--
ALTER TABLE `todo`
  MODIFY `todo_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
