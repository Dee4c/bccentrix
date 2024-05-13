-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 20, 2023 at 12:54 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `prac`
--

-- --------------------------------------------------------

--
-- Table structure for table `academic_awardees`
--

CREATE TABLE `academic_awardees` (
  `id` int(11) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `minitial` varchar(255) NOT NULL,
  `department` varchar(250) NOT NULL,
  `year` text NOT NULL,
  `lg` text NOT NULL,
  `gwa` text NOT NULL,
  `award` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `academic_awardees`
--

INSERT INTO `academic_awardees` (`id`, `lastname`, `firstname`, `minitial`, `department`, `year`, `lg`, `gwa`, `award`) VALUES
(42, 'Chemros', 'Terania', 'S', 'BSIS', '3rd', '89', '95', 'With High'),
(43, 'KIMKIM', 'Terania', 'S', 'BSIS', '3rd', '89', '95', 'With High'),
(44, 'KIMKIM', 'Terania', 'S', 'BSIS', '3rd', '89', '95', 'With High');

-- --------------------------------------------------------

--
-- Table structure for table `bsa_comment`
--

CREATE TABLE `bsa_comment` (
  `bsa_comment_id` int(11) NOT NULL,
  `bsa_post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `content` varchar(500) NOT NULL,
  `date_posted` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bsa_comment`
--

INSERT INTO `bsa_comment` (`bsa_comment_id`, `bsa_post_id`, `user_id`, `content`, `date_posted`) VALUES
(1, 96, 35, 'dsdsds', '2023-10-17 18:44:23'),
(3, 4, 1, 'sdds', '2023-10-18 22:20:28');

-- --------------------------------------------------------

--
-- Table structure for table `bsa_post`
--

CREATE TABLE `bsa_post` (
  `bsa_post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `content` varchar(500) NOT NULL,
  `date_created` varchar(500) NOT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bsa_post`
--

INSERT INTO `bsa_post` (`bsa_post_id`, `user_id`, `content`, `date_created`, `image`) VALUES
(1, 27, 'HELLO IM ARTS', '2023-10-11 19:36:28', NULL),
(2, 27, 'bhbh', '2023-10-11 19:42:59', 'uploads/icon-3.png'),
(3, 35, 'bgnb', '2023-10-17 12:31:24', NULL),
(4, 1, 'heloo', '2023-10-18 22:07:59', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `bsa_reaction_logs`
--

CREATE TABLE `bsa_reaction_logs` (
  `log_id` int(11) NOT NULL,
  `bsa_post_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `reaction_type` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bsa_reaction_logs`
--

INSERT INTO `bsa_reaction_logs` (`log_id`, `bsa_post_id`, `user_id`, `reaction_type`, `created_at`) VALUES
(1, 2, 27, 'heart', '2023-10-11 11:53:58');

-- --------------------------------------------------------

--
-- Table structure for table `bscrim_comment`
--

CREATE TABLE `bscrim_comment` (
  `bscrim_comment_id` int(11) NOT NULL,
  `bscrim_post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `content` varchar(500) NOT NULL,
  `date_posted` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bscrim_comment`
--

INSERT INTO `bscrim_comment` (`bscrim_comment_id`, `bscrim_post_id`, `user_id`, `content`, `date_posted`) VALUES
(3, 6, 33, 'sasasa', '2023-10-19 00:48:30');

-- --------------------------------------------------------

--
-- Table structure for table `bscrim_post`
--

CREATE TABLE `bscrim_post` (
  `bscrim_post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `content` varchar(500) NOT NULL,
  `date_created` varchar(500) NOT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bscrim_post`
--

INSERT INTO `bscrim_post` (`bscrim_post_id`, `user_id`, `content`, `date_created`, `image`) VALUES
(2, 33, 'IM CRIMINOLOGY ', '2023-10-11 18:09:24', 'uploads/icon-4.png'),
(4, 1, 'sdsd', '2023-10-18 21:46:49', NULL),
(5, 1, 'dsds', '2023-10-18 21:46:54', NULL),
(6, 33, 'bnbbnb', '2023-10-19 00:48:17', NULL),
(7, 41, 'ssdsds\r\n', '2023-10-28 18:21:36', NULL),
(8, 43, 'mbmn', '2023-10-28 19:46:20', 'uploads/WHAT THE DOG DOIN.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `bscrim_reaction_logs`
--

CREATE TABLE `bscrim_reaction_logs` (
  `log_id` int(11) NOT NULL,
  `bscrim_post_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `reaction_type` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bscrim_reaction_logs`
--

INSERT INTO `bscrim_reaction_logs` (`log_id`, `bscrim_post_id`, `user_id`, `reaction_type`, `created_at`) VALUES
(3, 6, 43, 'heart', '2023-10-28 10:12:07');

-- --------------------------------------------------------

--
-- Table structure for table `bseduc_comment`
--

CREATE TABLE `bseduc_comment` (
  `bseduc_comment_id` int(11) NOT NULL,
  `bseduc_post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `content` varchar(500) NOT NULL,
  `date_posted` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bseduc_comment`
--

INSERT INTO `bseduc_comment` (`bseduc_comment_id`, `bseduc_post_id`, `user_id`, `content`, `date_posted`) VALUES
(6, 39, 1, 'xzz', '2023-10-19 00:31:18'),
(7, 39, 33, '', '2023-10-19 00:34:17'),
(8, 38, 33, 'nmmnmnm', '2023-10-19 00:43:15');

-- --------------------------------------------------------

--
-- Table structure for table `bseduc_post`
--

CREATE TABLE `bseduc_post` (
  `bseduc_post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `content` varchar(500) NOT NULL,
  `date_created` varchar(500) NOT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bseduc_post`
--

INSERT INTO `bseduc_post` (`bseduc_post_id`, `user_id`, `content`, `date_created`, `image`) VALUES
(32, 27, 'hello', '2023-10-11 21:32:59', NULL),
(33, 25, 'dfdf', '2023-10-11 21:38:50', NULL),
(34, 35, 'jhj', '2023-10-17 12:27:47', NULL),
(36, 1, 'vbvb', '2023-10-18 21:33:12', NULL),
(37, 1, 'dsdsds', '2023-10-18 21:39:58', NULL),
(38, 33, 'dsds', '2023-10-19 00:29:22', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `bseduc_reaction_logs`
--

CREATE TABLE `bseduc_reaction_logs` (
  `log_id` int(11) NOT NULL,
  `bseduc_post_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `reaction_type` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bseduc_reaction_logs`
--

INSERT INTO `bseduc_reaction_logs` (`log_id`, `bseduc_post_id`, `user_id`, `reaction_type`, `created_at`) VALUES
(1, 33, 25, 'heart', '2023-10-11 13:40:24'),
(2, 32, 25, 'heart', '2023-10-11 13:40:42'),
(3, 33, 27, 'heart', '2023-10-11 13:40:52'),
(4, 32, 27, 'heart', '2023-10-11 13:40:57'),
(6, 4, 1, 'heart', '2023-10-18 15:11:48'),
(7, 4, 1, 'heart', '2023-10-18 15:11:50'),
(8, 4, 1, 'heart', '2023-10-18 15:13:22'),
(9, 4, 1, 'heart', '2023-10-18 15:18:24'),
(10, 5, 1, 'heart', '2023-10-18 15:18:41'),
(11, 5, 1, 'heart', '2023-10-18 15:18:45'),
(12, 5, 1, 'heart', '2023-10-18 15:18:47'),
(13, 5, 1, 'heart', '2023-10-18 15:18:48'),
(14, 5, 1, 'heart', '2023-10-18 15:18:48'),
(15, 5, 1, 'heart', '2023-10-18 15:18:49'),
(16, 5, 1, 'heart', '2023-10-18 15:18:50'),
(17, 5, 1, 'heart', '2023-10-18 15:18:51'),
(18, 5, 1, 'heart', '2023-10-18 15:18:51'),
(19, 5, 1, 'heart', '2023-10-18 15:18:51'),
(20, 5, 1, 'heart', '2023-10-18 15:18:52'),
(21, 5, 1, 'heart', '2023-10-18 15:18:52'),
(22, 5, 1, 'heart', '2023-10-18 15:18:52'),
(23, 5, 1, 'heart', '2023-10-18 15:18:52'),
(24, 5, 1, 'heart', '2023-10-18 15:18:52'),
(25, 5, 1, 'heart', '2023-10-18 15:18:52'),
(26, 5, 1, 'heart', '2023-10-18 15:18:53'),
(27, 5, 1, 'heart', '2023-10-18 15:18:53'),
(28, 5, 1, 'heart', '2023-10-18 15:18:57'),
(29, 4, 1, 'heart', '2023-10-18 15:18:59'),
(30, 4, 1, 'heart', '2023-10-18 15:19:00'),
(31, 4, 1, 'heart', '2023-10-18 15:19:01'),
(32, 4, 1, 'heart', '2023-10-18 15:19:02'),
(33, 4, 1, 'heart', '2023-10-18 15:19:03'),
(34, 39, 33, 'heart', '2023-10-18 16:29:48'),
(35, 38, 61, 'heart', '2023-11-13 01:54:24'),
(36, 38, 1, 'heart', '2023-11-13 01:55:17');

-- --------------------------------------------------------

--
-- Table structure for table `bsis_comment`
--

CREATE TABLE `bsis_comment` (
  `bsis_comment_id` int(11) NOT NULL,
  `bsis_post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `content` varchar(500) NOT NULL,
  `date_posted` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bsis_comment`
--

INSERT INTO `bsis_comment` (`bsis_comment_id`, `bsis_post_id`, `user_id`, `content`, `date_posted`) VALUES
(2, 2, 27, 'hhh', '2023-10-11 16:10:47'),
(3, 2, 27, 'llolk', '2023-10-11 16:12:59'),
(4, 3, 35, 'cxc', '2023-10-17 12:39:32'),
(5, 3, 35, 'wasa', '2023-10-17 12:48:13'),
(6, 4, 35, 'sasds', '2023-10-17 12:48:33'),
(7, 3, 35, 'sdsdsd', '2023-10-17 12:48:41'),
(8, 3, 35, 'cxcx', '2023-10-17 12:49:06'),
(9, 4, 33, 'bcvv', '2023-10-18 18:46:26'),
(11, 5, 1, 'k\r\n', '2023-10-18 20:29:59'),
(12, 6, 1, 'xzz', '2023-10-18 20:34:48'),
(13, 9, 1, 'SDSDS', '2023-10-18 21:01:28'),
(14, 13, 1, 'sas', '2023-10-18 21:13:52'),
(16, 14, 33, 'asa', '2023-10-19 00:30:39'),
(18, 19, 1, '', '2023-11-26 14:17:12');

-- --------------------------------------------------------

--
-- Table structure for table `bsis_post`
--

CREATE TABLE `bsis_post` (
  `bsis_post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `content` varchar(500) NOT NULL,
  `date_created` varchar(500) NOT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bsis_post`
--

INSERT INTO `bsis_post` (`bsis_post_id`, `user_id`, `content`, `date_created`, `image`) VALUES
(6, 1, 'sdbsd', '2023-10-18 20:32:14', NULL),
(7, 33, 'nbnh', '2023-10-18 20:34:20', NULL),
(8, 1, 'hello', '2023-10-18 20:52:15', NULL),
(9, 1, 'hello', '2023-10-18 20:52:16', NULL),
(10, 1, 'XZXZ', '2023-10-18 21:03:31', NULL),
(11, 1, 'ZZXZ', '2023-10-18 21:03:38', NULL),
(12, 1, 'SASASAS', '2023-10-18 21:03:59', NULL),
(13, 1, 'FEWFEWWEFW', '2023-10-18 21:04:08', NULL),
(14, 1, 'dssd', '2023-10-18 21:06:39', NULL),
(19, 64, 'svs\r\n\r\n', '2023-11-13 15:24:14', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `bsis_reaction_logs`
--

CREATE TABLE `bsis_reaction_logs` (
  `log_id` int(11) NOT NULL,
  `bsis_post_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `reaction_type` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bsis_reaction_logs`
--

INSERT INTO `bsis_reaction_logs` (`log_id`, `bsis_post_id`, `user_id`, `reaction_type`, `created_at`) VALUES
(5, 6, 1, 'heart', '2023-10-18 12:41:45'),
(7, 7, 1, 'heart', '2023-10-18 12:43:28'),
(8, 14, 1, 'heart', '2023-10-18 15:22:09'),
(10, 12, 1, 'heart', '2023-11-13 01:55:31');

-- --------------------------------------------------------

--
-- Table structure for table `bsoa_comment`
--

CREATE TABLE `bsoa_comment` (
  `bsoa_comment_id` int(11) NOT NULL,
  `bsoa_post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `content` varchar(500) NOT NULL,
  `date_posted` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bsoa_comment`
--

INSERT INTO `bsoa_comment` (`bsoa_comment_id`, `bsoa_post_id`, `user_id`, `content`, `date_posted`) VALUES
(4, 8, 75, 'Hello', '2023-11-30 01:59:03');

-- --------------------------------------------------------

--
-- Table structure for table `bsoa_post`
--

CREATE TABLE `bsoa_post` (
  `bsoa_post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `content` varchar(500) NOT NULL,
  `date_created` varchar(500) NOT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bsoa_post`
--

INSERT INTO `bsoa_post` (`bsoa_post_id`, `user_id`, `content`, `date_created`, `image`) VALUES
(2, 27, 'IM OK', '2023-10-11 19:02:30', NULL),
(3, 27, 'cxcx', '2023-10-11 19:34:26', NULL),
(6, 33, ' bbvbn', '2023-10-19 01:00:40', NULL),
(7, 53, 'ds', '2023-11-08 07:46:13', NULL),
(8, 75, 'Hi2x', '2023-11-30 01:58:41', 'uploads/Screenshot_20231129_230348.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `bsoa_reaction_logs`
--

CREATE TABLE `bsoa_reaction_logs` (
  `log_id` int(11) NOT NULL,
  `bsoa_post_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `reaction_type` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bsoa_reaction_logs`
--

INSERT INTO `bsoa_reaction_logs` (`log_id`, `bsoa_post_id`, `user_id`, `reaction_type`, `created_at`) VALUES
(1, 1, 27, 'heart', '2023-10-11 11:01:19'),
(2, 3, 27, 'heart', '2023-10-11 11:45:31'),
(4, 3, 33, 'heart', '2023-10-18 17:00:25'),
(5, 8, 75, 'heart', '2023-11-29 17:59:27');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `comment_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `content` varchar(500) NOT NULL,
  `date_posted` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`comment_id`, `post_id`, `user_id`, `content`, `date_posted`) VALUES
(101, 96, 25, 'xz', '2023-10-17 17:47:58'),
(102, 96, 25, 'dfdf', '2023-10-17 17:50:13'),
(104, 96, 25, 'dsds', '2023-10-17 18:09:37'),
(105, 96, 35, 'cxc', '2023-10-17 18:10:07'),
(106, 97, 35, 'xzxzx', '2023-10-17 18:45:17'),
(107, 96, 35, 'cxcx', '2023-10-17 18:45:27'),
(108, 98, 35, 'hi', '2023-10-17 18:47:31'),
(109, 98, 35, '', '2023-10-17 18:47:46'),
(110, 98, 25, 'v', '2023-10-17 23:26:29'),
(111, 99, 35, '', '2023-10-18 11:06:43'),
(112, 99, 35, 'ddf', '2023-10-18 11:09:38'),
(116, 101, 25, 'dc', '2023-10-18 12:17:32'),
(117, 99, 35, 'cxc', '2023-10-18 12:18:45'),
(118, 102, 33, 'xzxz', '2023-10-18 12:27:21'),
(119, 102, 35, 'cjhhs', '2023-10-18 12:28:29'),
(120, 121, 33, 'hi', '2023-10-18 18:04:14'),
(124, 124, 1, 'sdsd', '2023-10-18 22:23:10'),
(125, 138, 49, 'hi po', '2023-11-01 19:03:11'),
(126, 139, 50, 'xzz\r\n', '2023-11-02 12:35:58'),
(127, 149, 50, 'nice', '2023-11-03 10:03:47'),
(128, 151, 50, 'dscx', '2023-11-03 11:20:01'),
(131, 151, 53, 'j', '2023-11-05 17:04:56'),
(132, 151, 52, 'hi', '2023-11-05 17:05:09'),
(133, 151, 52, 'lol', '2023-11-05 17:05:40'),
(135, 149, 53, '', '2023-11-05 20:13:07'),
(136, 152, 53, 'hi', '2023-11-06 01:34:49'),
(137, 152, 53, 'lo', '2023-11-06 01:56:33'),
(138, 152, 53, 'hello\r\nhello', '2023-11-06 01:57:52'),
(139, 149, 53, 's', '2023-11-06 08:22:42'),
(140, 149, 53, 'hello\r\n', '2023-11-06 08:50:42'),
(141, 152, 53, 'rro\r\nruu\r\nruu', '2023-11-06 08:59:01'),
(143, 155, 52, 'dsds', '2023-11-08 09:05:10'),
(144, 159, 52, 'hello po\r\n', '2023-11-09 20:26:59'),
(145, 153, 52, 'cxcx', '2023-11-10 11:46:42'),
(146, 161, 53, '', '2023-11-10 20:12:51'),
(147, 150, 49, 's', '2023-11-11 10:36:04'),
(148, 162, 49, '', '2023-11-11 10:36:31'),
(149, 161, 49, 'xcvxcx', '2023-11-11 10:51:13'),
(150, 165, 52, 'fffdd', '2023-11-12 20:01:49'),
(151, 166, 53, 's', '2023-11-12 20:13:15'),
(152, 166, 1, 'xvzxb', '2023-11-13 15:31:20'),
(153, 155, 64, 's', '2023-11-22 12:26:49'),
(154, 166, 64, 'x', '2023-11-22 12:27:32'),
(155, 175, 53, 'Hi', '2023-11-26 11:46:56'),
(156, 175, 53, '', '2023-11-26 15:26:48'),
(157, 175, 64, 'Hello', '2023-11-26 16:01:19'),
(158, 170, 53, 'Hi', '2023-11-26 17:06:41'),
(159, 176, 64, 'Hi', '2023-11-27 12:38:34'),
(160, 175, 64, 'Hello', '2023-11-27 12:52:20'),
(161, 150, 75, 'Helloo very mush thank you', '2023-11-29 17:26:28'),
(162, 150, 75, 'I love you till the endjalabdidmaobsosusnsidmdvdndjd', '2023-11-29 17:26:59'),
(164, 187, 75, '', '2023-11-30 00:37:43');

-- --------------------------------------------------------

--
-- Table structure for table `drygoods_comment`
--

CREATE TABLE `drygoods_comment` (
  `drygoods_comment_id` int(11) NOT NULL,
  `drygoods_post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `content` varchar(500) NOT NULL,
  `date_posted` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `drygoods_comment`
--

INSERT INTO `drygoods_comment` (`drygoods_comment_id`, `drygoods_post_id`, `user_id`, `content`, `date_posted`) VALUES
(1, 2, 1, 'xs', '2023-10-18 23:43:43');

-- --------------------------------------------------------

--
-- Table structure for table `drygoods_post`
--

CREATE TABLE `drygoods_post` (
  `drygoods_post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `content` varchar(500) NOT NULL,
  `date_created` varchar(500) NOT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `drygoods_post`
--

INSERT INTO `drygoods_post` (`drygoods_post_id`, `user_id`, `content`, `date_created`, `image`) VALUES
(4, 53, 'hi', '2023-11-08 07:41:58', NULL),
(5, 52, 'hi', '2023-11-08 07:42:42', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `drygoods_reaction_logs`
--

CREATE TABLE `drygoods_reaction_logs` (
  `log_id` int(11) NOT NULL,
  `drygoods_post_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `reaction_type` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `drygoods_reaction_logs`
--

INSERT INTO `drygoods_reaction_logs` (`log_id`, `drygoods_post_id`, `user_id`, `reaction_type`, `created_at`) VALUES
(1, 1, 25, 'heart', '2023-10-11 13:38:29'),
(2, 2, 1, 'heart', '2023-10-18 15:43:46');

-- --------------------------------------------------------

--
-- Table structure for table `foods_comment`
--

CREATE TABLE `foods_comment` (
  `foods_comment_id` int(11) NOT NULL,
  `foods_post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `content` varchar(500) NOT NULL,
  `date_posted` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `foods_comment`
--

INSERT INTO `foods_comment` (`foods_comment_id`, `foods_post_id`, `user_id`, `content`, `date_posted`) VALUES
(1, 3, 1, 'cxx', '2023-10-18 23:51:02');

-- --------------------------------------------------------

--
-- Table structure for table `foods_post`
--

CREATE TABLE `foods_post` (
  `foods_post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `content` varchar(500) NOT NULL,
  `date_created` varchar(500) NOT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `foods_post`
--

INSERT INTO `foods_post` (`foods_post_id`, `user_id`, `content`, `date_created`, `image`) VALUES
(3, 1, 'sa', '2023-10-18 23:50:52', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `foods_reaction_logs`
--

CREATE TABLE `foods_reaction_logs` (
  `log_id` int(11) NOT NULL,
  `foods_post_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `reaction_type` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `foods_reaction_logs`
--

INSERT INTO `foods_reaction_logs` (`log_id`, `foods_post_id`, `user_id`, `reaction_type`, `created_at`) VALUES
(0, 3, 1, 'heart', '2023-10-18 15:51:20');

-- --------------------------------------------------------

--
-- Table structure for table `founder_information`
--

CREATE TABLE `founder_information` (
  `id` int(11) NOT NULL,
  `Id_Number` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `year` varchar(50) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `found_date` date NOT NULL,
  `found_item` varchar(255) NOT NULL,
  `approval_status` enum('Accepted','Rejected','Pending') NOT NULL DEFAULT 'Pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `founder_information`
--

INSERT INTO `founder_information` (`id`, `Id_Number`, `name`, `department`, `year`, `mobile`, `found_date`, `found_item`, `approval_status`, `created_at`, `updated_at`) VALUES
(10, '2147483647', 'ana mage', 'ARTS', '3rd A', '09090909090', '2023-10-28', 'pen', 'Accepted', '2023-10-28 05:31:32', '2023-10-28 05:32:34');

-- --------------------------------------------------------

--
-- Table structure for table `founder_submissions`
--

CREATE TABLE `founder_submissions` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `submission_date` date NOT NULL,
  `submission_count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `founder_submissions`
--

INSERT INTO `founder_submissions` (`id`, `user_id`, `submission_date`, `submission_count`) VALUES
(1, 22, '2023-10-20', 1),
(2, 22, '2023-10-23', 1),
(3, 22, '2023-10-25', 1),
(4, 24, '2023-10-25', 1),
(5, 42, '2023-10-28', 1);

-- --------------------------------------------------------

--
-- Table structure for table `gen_comment`
--

CREATE TABLE `gen_comment` (
  `gen_comment_id` int(11) NOT NULL,
  `gen_post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `content` varchar(500) NOT NULL,
  `date_posted` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gen_comment`
--

INSERT INTO `gen_comment` (`gen_comment_id`, `gen_post_id`, `user_id`, `content`, `date_posted`) VALUES
(1, 4, 33, 'sdsd', '2023-10-18 22:22:23'),
(2, 2, 1, 'xzxzxc', '2023-10-18 22:22:44'),
(3, 5, 1, 'ssasa', '2023-10-18 22:22:58'),
(4, 8, 75, 'Fftf', '2023-11-30 01:33:52');

-- --------------------------------------------------------

--
-- Table structure for table `gen_post`
--

CREATE TABLE `gen_post` (
  `gen_post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `content` varchar(500) NOT NULL,
  `date_created` varchar(500) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `seen_check` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gen_post`
--

INSERT INTO `gen_post` (`gen_post_id`, `user_id`, `content`, `date_created`, `image`, `seen_check`) VALUES
(5, 1, 'dsds', '2023-10-18 22:22:53', NULL, 1),
(6, 50, 'l', '2023-11-02 21:58:03', NULL, 1),
(7, 53, 'bhnb', '2023-11-08 07:38:51', NULL, 1),
(8, 75, 'Fth', '2023-11-30 01:33:28', 'uploads/Screenshot_20231016_142338.jpg', 1),
(9, 75, 'Hh', '2023-11-30 02:17:28', 'uploads/Screenshot_20230512_183303_22e4250240c136c826b8a3b1264b092d.jpg', 1),
(10, 76, 'dsd', '2023-12-20 16:04:42', NULL, 1),
(11, 76, 'dsdsdsd', '2023-12-20 16:41:08', NULL, 1),
(12, 74, 'Bsbsbdb', '2023-12-20 16:53:18', NULL, 1),
(13, 74, 'Hsksh', '2023-12-20 16:55:12', NULL, 1),
(14, 74, 'Bsbdbdhd', '2023-12-20 17:00:19', NULL, 1),
(15, 74, 'Jrhehd', '2023-12-20 17:04:05', NULL, 1),
(16, 74, 'Hdhdbdbfj', '2023-12-20 17:08:59', NULL, 1),
(17, 74, 'Fjdjdh', '2023-12-20 17:12:09', NULL, 1),
(18, 74, 'Dhdbfbfb', '2023-12-20 17:21:33', NULL, 1),
(19, 74, 'Hd', '2023-12-20 17:26:53', NULL, 1),
(20, 74, 'Rbfnf', '2023-12-20 17:28:30', NULL, 1),
(21, 74, 'Ygfgg', '2023-12-20 17:28:57', NULL, 1),
(22, 74, 'Rhcnf', '2023-12-20 17:36:35', NULL, 1),
(23, 74, 'Bdf', '2023-12-20 17:46:31', NULL, 1),
(24, 74, 'Bdf', '2023-12-20 17:46:32', NULL, 1),
(25, 74, 'Dbxbdjf', '2023-12-20 17:55:15', NULL, 1),
(26, 74, 'Fbfh', '2023-12-20 17:55:22', NULL, 1),
(27, 75, 'Hi', '2023-12-20 19:16:39', NULL, 1),
(28, 75, 'Uchcu', '2023-12-20 19:20:30', NULL, 1),
(29, 75, 'Tx you v', '2023-12-20 19:21:11', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `gen_reaction_logs`
--

CREATE TABLE `gen_reaction_logs` (
  `log_id` int(11) NOT NULL,
  `gen_post_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `reaction_type` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gen_reaction_logs`
--

INSERT INTO `gen_reaction_logs` (`log_id`, `gen_post_id`, `user_id`, `reaction_type`, `created_at`) VALUES
(7, 5, 33, 'heart', '2023-10-18 17:08:04'),
(8, 7, 61, 'heart', '2023-11-13 01:54:12');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` int(11) NOT NULL,
  `group_name` varchar(255) NOT NULL,
  `group_code` varchar(255) NOT NULL,
  `id_number` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `year` varchar(200) NOT NULL,
  `year_section` varchar(255) NOT NULL,
  `owner_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `group_name`, `group_code`, `id_number`, `name`, `department`, `year`, `year_section`, `owner_id`) VALUES
(16, 'BSIS', '1T5PJM', '2121212121', 'Ana Dodge', 'BSOA', '', '2nd A', 53),
(17, 'ARTS', 'KM7Q5V', '2147483647', 'nob kate', 'BSIS', '', '2nd A', 64),
(19, 'NEW', 'L3YGGL', '2121212121', 'Ana Dodge', 'BSOA', '', '2nd A', 53),
(20, 'IS', 'ZAD564', '2147483647', 'nob kate', 'BSIS', '', '2nd A', 64),
(21, 'hello', 'AAHJH9', '2147483647', 'sample1 sample1', 'BSIS', '', 'O', 74),
(22, 'hi', 'Y2QYMZ', '2147483647', 'sample1 sample1', 'BSIS', '', 'O', 74),
(23, 'jo', '2NXI7C', '2147483647', 'sample1 sample1', 'BSIS', '2nd', 'O', 74),
(24, 'ex', '1TSNXV', '2147483647', 'sample2 sample2', 'BSOA', '2nd', 'C', 75);

-- --------------------------------------------------------

--
-- Table structure for table `group_chat_messages`
--

CREATE TABLE `group_chat_messages` (
  `message_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `user_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `group_chat_messages`
--

INSERT INTO `group_chat_messages` (`message_id`, `group_id`, `user_id`, `message`, `timestamp`, `user_name`) VALUES
(68, 17, 53, 'HI PO, GOOD MORNING NOB', '2023-11-15 06:01:35', 'Ana Dodge'),
(69, 17, 64, 'HELLO, ANA GOOD MORNING TOO', '2023-11-15 06:03:25', 'nob kate'),
(70, 17, 53, 'how are you?', '2023-11-15 06:25:12', 'Ana Dodge'),
(73, 24, 75, 'ki', '2023-11-29 20:57:14', 'sample2 sample2'),
(75, 23, 75, 'Hhg', '2023-11-29 14:31:45', 'sample2 sample2'),
(76, 23, 75, ',', '2023-11-29 15:26:16', 'sample2 sample2'),
(77, 22, 74, 'hi', '2023-12-19 23:29:59', 'sample1 sample1'),
(78, 22, 74, 'ddhjd', '2023-12-19 23:32:00', 'sample1 sample1'),
(79, 22, 74, 'hihihd', '2023-12-19 23:33:36', 'sample1 sample1'),
(80, 22, 74, 'xcdhcvshvc', '2023-12-19 23:34:57', 'sample1 sample1');

-- --------------------------------------------------------

--
-- Table structure for table `group_members`
--

CREATE TABLE `group_members` (
  `id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `join_timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `group_members`
--

INSERT INTO `group_members` (`id`, `group_id`, `name`, `join_timestamp`) VALUES
(57, 17, 'Ana Dodge', '2023-11-15 13:01:11'),
(58, 17, 'nob kate', '2023-11-15 13:02:51'),
(59, 20, '', '2023-11-22 12:38:09'),
(60, 22, 'sample1 sample1', '2023-11-29 03:41:30'),
(61, 24, 'sample2 sample2', '2023-11-29 20:57:00'),
(62, 23, 'sample2 sample2', '2023-11-29 21:29:10');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `filename` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `filename`, `description`) VALUES
(22, 'Catdolf Kitler.jpg', NULL),
(23, 'dantepizza.jpg', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `laf_comment`
--

CREATE TABLE `laf_comment` (
  `laf_comment_id` int(11) NOT NULL,
  `laf_post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `content` varchar(500) NOT NULL,
  `date_posted` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `laf_comment`
--

INSERT INTO `laf_comment` (`laf_comment_id`, `laf_post_id`, `user_id`, `content`, `date_posted`) VALUES
(5, 5, 53, 'hh', '2023-11-08 07:30:05'),
(6, 9, 52, 'xzcxc', '2023-11-08 09:05:52');

-- --------------------------------------------------------

--
-- Table structure for table `laf_post`
--

CREATE TABLE `laf_post` (
  `laf_post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `content` varchar(500) NOT NULL,
  `date_created` varchar(500) NOT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `laf_post`
--

INSERT INTO `laf_post` (`laf_post_id`, `user_id`, `content`, `date_created`, `image`) VALUES
(4, 1, 'hhi', '2023-10-18 23:11:42', NULL),
(5, 1, 'sdsdsd', '2023-10-18 23:18:37', NULL),
(7, 53, 'hh', '2023-11-08 07:36:29', NULL),
(8, 53, 'nbnb', '2023-11-08 07:37:02', 'uploads/icons8-birthday-100.png'),
(9, 52, 'cxcx', '2023-11-08 09:05:46', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `laf_reaction_logs`
--

CREATE TABLE `laf_reaction_logs` (
  `log_id` int(11) NOT NULL,
  `laf_post_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `reaction_type` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `laf_reaction_logs`
--

INSERT INTO `laf_reaction_logs` (`log_id`, `laf_post_id`, `user_id`, `reaction_type`, `created_at`) VALUES
(2, 4, 33, 'heart', '2023-10-18 15:13:04'),
(3, 5, 1, 'heart', '2023-10-18 15:21:26'),
(4, 4, 1, 'heart', '2023-10-18 15:21:32'),
(5, 9, 1, 'heart', '2023-11-23 13:22:14');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `msg_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `incoming_msg_id` int(255) NOT NULL,
  `outgoing_msg_id` int(255) NOT NULL,
  `msg` varchar(1000) NOT NULL,
  `date_msg` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`msg_id`, `user_id`, `incoming_msg_id`, `outgoing_msg_id`, `msg`, `date_msg`) VALUES
(92, 1, 68, 74, 'Hshsbs', '2023-12-20 06:15:30'),
(93, 1, 68, 74, 'Hevehe', '2023-12-20 06:19:49'),
(94, 1, 68, 74, 'Rurjr', '2023-12-20 06:44:38'),
(95, 1, 68, 74, 'Nznsbs', '2023-12-20 06:49:34'),
(96, 1, 68, 74, 'Hdbdhdhd', '2023-12-20 06:49:39'),
(97, 1, 68, 74, 'Hsjshs', '2023-12-20 06:49:44'),
(98, 1, 68, 74, 'Fjfj', '2023-12-20 06:50:12'),
(99, 1, 68, 74, 'Dbdnd', '2023-12-20 06:50:14'),
(100, 1, 68, 74, 'Djdj', '2023-12-20 06:50:35'),
(101, 1, 68, 74, 'Jtjrj', '2023-12-20 06:50:47'),
(102, 1, 68, 74, 'Dhdb', '2023-12-20 06:50:54'),
(103, 1, 68, 74, 'Urutj', '2023-12-20 06:51:45'),
(104, 1, 68, 74, 'Rjfj', '2023-12-20 06:52:30'),
(105, 1, 68, 74, 'Rhdhr', '2023-12-20 06:52:35'),
(106, 1, 68, 74, 'Rutjt', '2023-12-20 06:53:30'),
(107, 1, 68, 74, 'Dhdhd', '2023-12-20 06:57:08'),
(108, 1, 68, 74, 'Jshsbs', '2023-12-20 07:06:36'),
(109, 1, 68, 74, 'Jrhr', '2023-12-20 07:06:46'),
(110, 1, 68, 74, 'Jsnsjs', '2023-12-20 07:07:10'),
(111, 1, 68, 74, 'Rfh', '2023-12-20 07:09:37'),
(112, 1, 75, 74, 'Jehheeh', '2023-12-20 07:20:57'),
(113, 1, 76, 74, 'Hshsbs', '2023-12-20 08:05:10'),
(114, 1, 75, 74, 'Hshshd', '2023-12-20 08:47:00'),
(115, 1, 75, 74, 'Hshehs', '2023-12-20 08:47:03'),
(116, 1, 75, 74, 'Yehehe', '2023-12-20 08:47:14'),
(117, 1, 76, 74, 'Bsisbd', '2023-12-20 08:57:18'),
(118, 1, 76, 74, 'Hshdh', '2023-12-20 09:02:13'),
(119, 1, 76, 74, 'Rhdh', '2023-12-20 09:48:25'),
(120, 1, 76, 74, 'Hdhdj', '2023-12-20 09:50:24'),
(121, 1, 68, 74, 'Tegdh', '2023-12-20 09:53:07'),
(122, 1, 76, 74, 'Ehdnsgs', '2023-12-20 09:55:39'),
(123, 1, 76, 62, 'Ufhy', '2023-12-20 10:32:46'),
(124, 1, 76, 62, 'Ighig', '2023-12-20 10:33:00'),
(125, 1, 76, 62, 'Ytjfjr', '2023-12-20 10:33:32'),
(126, 1, 76, 62, 'Hshshs', '2023-12-20 10:39:52'),
(127, 1, 76, 62, 'Hshsbe', '2023-12-20 10:40:54'),
(128, 1, 76, 62, 'Hru', '2023-12-20 10:42:07'),
(129, 1, 76, 62, 'Gigigif', '2023-12-20 10:51:52'),
(130, 1, 76, 62, 'Bovo', '2023-12-20 10:52:06'),
(131, 1, 76, 62, 'Givig', '2023-12-20 10:54:09'),
(132, 0, 76, 75, 'Tfg', '2023-12-20 11:14:19');

-- --------------------------------------------------------

--
-- Table structure for table `message_tbl`
--

CREATE TABLE `message_tbl` (
  `id` int(11) NOT NULL,
  `message` varchar(200) NOT NULL,
  `seen` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `message_tbl`
--

INSERT INTO `message_tbl` (`id`, `message`, `seen`) VALUES
(0, 'dhsgdfndbsnd', 1),
(0, 'dhsgdfndbsnddbfhdf', 1);

-- --------------------------------------------------------

--
-- Table structure for table `owner_information`
--

CREATE TABLE `owner_information` (
  `id` int(11) NOT NULL,
  `Id_Number` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `year` varchar(255) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `lost_date` date NOT NULL,
  `lost_item` varchar(255) NOT NULL,
  `approval_status` enum('Accepted','Rejected','Pending') NOT NULL DEFAULT 'Pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `owner_information`
--

INSERT INTO `owner_information` (`id`, `Id_Number`, `name`, `department`, `year`, `mobile`, `lost_date`, `lost_item`, `approval_status`, `created_at`, `updated_at`) VALUES
(9, '2020115201', 'Martin Tom Espinosa', 'BSIS', '4th A', '09192142869', '2023-10-25', 'blue wallet', 'Rejected', '2023-10-25 11:49:55', '2023-11-27 04:44:46'),
(10, '2020102937', 'mice alter', 'CRIM', '3 Beta', '09403954839', '2023-10-28', 'pen', 'Accepted', '2023-10-28 05:26:57', '2023-10-28 05:32:48'),
(11, '2147483647', 'nob kate', 'BSIS', '2nd A', '09009999999', '2023-11-27', 'Wallet', 'Accepted', '2023-11-27 04:40:57', '2023-11-27 04:43:03'),
(12, '2147483647', 'sample1 sample1', 'BSIS', '2nd - O', '09089454485', '2023-11-29', 'ballpen', 'Accepted', '2023-11-29 03:53:04', '2023-11-29 03:54:26');

-- --------------------------------------------------------

--
-- Table structure for table `owner_submissions`
--

CREATE TABLE `owner_submissions` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `submission_date` date NOT NULL,
  `submission_count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `owner_submissions`
--

INSERT INTO `owner_submissions` (`id`, `user_id`, `submission_date`, `submission_count`) VALUES
(2, 22, '2023-10-20', 1),
(3, 22, '2023-10-23', 1),
(4, 22, '2023-10-25', 2),
(5, 41, '2023-10-28', 1),
(6, 64, '2023-11-27', 1),
(7, 74, '2023-11-29', 1);

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `content` varchar(500) NOT NULL,
  `date_created` varchar(500) NOT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`post_id`, `user_id`, `content`, `date_created`, `image`) VALUES
(148, 50, 'meow', '2023-11-02 22:02:08', 'uploads/MEME.jfif'),
(149, 50, 'example\r\n', '2023-11-03 09:28:09', 'uploads/sample2.jpg'),
(150, 49, 'xcxcx', '2023-11-03 11:10:53', NULL),
(151, 50, 'sas', '2023-11-03 11:12:36', NULL),
(152, 53, 'try', '2023-11-06 01:32:05', 'uploads/pallete.jfif'),
(153, 53, 'sd', '2023-11-08 07:35:51', NULL),
(154, 1, 'sdsds', '2023-11-08 08:00:57', NULL),
(155, 52, 'cxcx', '2023-11-08 09:04:57', NULL),
(156, 52, 'like', '2023-11-09 19:12:20', 'uploads/akatsuki.jpg'),
(158, 61, 'hello', '2023-11-09 20:15:22', 'uploads/Screenshot 2023-11-03 001512.jpg'),
(159, 61, 'yooww', '2023-11-09 20:18:49', NULL),
(160, 52, 's', '2023-11-10 10:21:12', NULL),
(161, 52, 'x', '2023-11-10 13:59:32', NULL),
(162, 53, 'nnn', '2023-11-10 14:01:11', NULL),
(163, 62, 'dsdsd\r\n', '2023-11-10 18:57:50', NULL),
(164, 63, 'mb\r\n', '2023-11-10 21:10:59', NULL),
(165, 63, 'nbnb\r\n', '2023-11-10 21:11:08', NULL),
(166, 65, 'JBNJ\r\n', '2023-11-11 18:24:04', NULL),
(167, 1, 'hello\r\nk', '2023-11-13 17:48:37', NULL),
(168, 53, 'hello po', '2023-11-13 21:44:03', NULL),
(169, 62, 'HSHS\r\n', '2023-11-14 16:16:23', NULL),
(170, 62, 'hello', '2023-11-15 10:40:12', NULL),
(171, 62, 'hi po', '2023-11-15 10:55:58', NULL),
(172, 62, 'hi po', '2023-11-15 10:55:59', NULL),
(173, 62, 'hi po', '2023-11-15 10:56:21', NULL),
(174, 53, 'hello', '2023-11-15 16:06:46', NULL),
(175, 1, 'hello', '2023-11-18 16:17:58', NULL),
(176, 53, 'Hi', '2023-11-26 17:12:01', NULL),
(178, 53, 'Hellolo', '2023-11-26 17:13:55', 'uploads/Screenshot_20230719_204159_22e4250240c136c826b8a3b1264b092d.jpg'),
(179, 64, 'Yoe', '2023-11-27 09:11:09', 'uploads/Screenshot_20231127_074454.jpg'),
(181, 64, 'Hello', '2023-11-27 12:50:16', 'uploads/1694996602189.jpg'),
(182, 53, 'Hi', '2023-11-29 00:51:42', 'uploads/Screenshot_20231005_124014.jpg'),
(183, 53, 'U', '2023-11-29 01:03:27', 'uploads/Screenshot_20230507_145703_22e4250240c136c826b8a3b1264b092d.jpg'),
(184, 75, 'Hello', '2023-11-29 12:10:02', NULL),
(185, 75, 'Heh', '2023-11-29 18:47:27', 'uploads/Screenshot_20231129_102933.jpg'),
(186, 75, 'Hi', '2023-11-29 18:59:24', NULL),
(187, 52, 'Hiii', '2023-11-29 19:05:27', NULL),
(188, 75, 'gd eve\r\n', '2023-12-18 21:34:38', 'uploads/19199360.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `reaction_logs`
--

CREATE TABLE `reaction_logs` (
  `log_id` int(11) NOT NULL,
  `post_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `reaction_type` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reaction_logs`
--

INSERT INTO `reaction_logs` (`log_id`, `post_id`, `user_id`, `reaction_type`, `created_at`) VALUES
(144, 151, 52, 'heart', '2023-11-05 09:06:43'),
(145, 151, 53, 'heart', '2023-11-05 11:21:20'),
(146, 150, 53, 'heart', '2023-11-05 11:50:30'),
(147, 154, 1, 'heart', '2023-11-08 00:01:05'),
(148, 165, 53, 'heart', '2023-11-11 02:03:53'),
(165, 150, 49, 'heart', '2023-11-11 03:45:04'),
(166, 164, 49, 'heart', '2023-11-11 03:45:34'),
(167, 166, 49, 'heart', '2023-11-11 13:55:49'),
(168, 165, 63, 'heart', '2023-11-12 05:41:44'),
(169, 166, 52, 'heart', '2023-11-12 11:41:41'),
(170, 167, 1, 'heart', '2023-11-13 13:43:46'),
(171, 168, 1, 'heart', '2023-11-13 15:26:11'),
(174, 174, 53, 'heart', '2023-11-26 03:45:39'),
(177, 175, 64, 'heart', '2023-11-26 07:22:59'),
(178, 170, 64, 'heart', '2023-11-26 08:24:59'),
(179, 170, 53, 'heart', '2023-11-26 09:06:28'),
(180, 178, 53, 'heart', '2023-11-26 12:00:46'),
(181, 160, 64, 'heart', '2023-11-27 04:43:52'),
(182, 159, 64, 'heart', '2023-11-27 04:43:55'),
(183, 158, 64, 'heart', '2023-11-27 04:43:57'),
(184, 156, 64, 'heart', '2023-11-27 04:43:59'),
(185, 155, 64, 'heart', '2023-11-27 04:44:00'),
(186, 154, 64, 'heart', '2023-11-27 04:44:02'),
(187, 181, 64, 'heart', '2023-11-27 04:51:18'),
(188, 178, 64, 'heart', '2023-11-27 04:52:03'),
(189, 162, 53, 'heart', '2023-11-28 16:52:16'),
(190, 168, 53, 'heart', '2023-11-28 17:47:41'),
(192, 150, 75, 'heart', '2023-11-29 18:56:20');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `Id_Number` int(10) NOT NULL,
  `fname` varchar(200) NOT NULL,
  `lname` varchar(200) NOT NULL,
  `department` varchar(255) NOT NULL,
  `year` text NOT NULL,
  `yr_section` varchar(200) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `unique_code` varchar(200) NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0,
  `is_active` varchar(255) DEFAULT 'Active now',
  `date_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `approval_status` enum('pending','accepted','rejected','deactivated') NOT NULL DEFAULT 'pending',
  `bio` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `location` varchar(255) NOT NULL,
  `contact_number` text NOT NULL,
  `gender` text NOT NULL,
  `image_path` varchar(255) NOT NULL DEFAULT 'includes/user icon for ui.png',
  `cover_photo` varchar(255) NOT NULL,
  `last_activity` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `Id_Number`, `fname`, `lname`, `department`, `year`, `yr_section`, `username`, `password`, `unique_code`, `is_admin`, `is_active`, `date_created`, `approval_status`, `bio`, `dob`, `location`, `contact_number`, `gender`, `image_path`, `cover_photo`, `last_activity`) VALUES
(1, 101010101, 'THE', 'ADMIN', '', '', 'ADMIN\r\n', 'Admin', '$2y$10$jI5H9jHgjy2.zOYFwjDi4OwqOHJsAkgnG0Ant.G/TPVd2jQfbiiaC', 'admin1', 1, 'Active now', '2023-09-18 06:47:27', 'accepted', '', '0000-00-00', '', '', 'Female', 'profile_pictures/images (1).jpeg', 'profile_pictures/selena.jpg', '2023-11-29 21:22:57'),
(49, 1212121212, 'Kimkim', 'Terania', 'BSIS', '', '4th A', 'kimkim', '$2y$10$sGDlTNvSHNFw/Wk9rrD1U.5EAxcMkIW.iAxRCC6TVO4xCJTppSF/W', '123', 0, 'Active now', '2023-10-29 09:47:33', 'deactivated', 'Wala lang', '2002-07-31', 'La Carlota City', '0985648363', 'Male', 'profile_pictures/photo6.png', 'profile_pictures/course bootstrap& media query.jpg', '2023-11-15 07:58:18'),
(50, 454554545, 'Chemros', 'Terania', 'CRIM', '', '3 Beta', 'michael321', '$2y$10$FniuOJM0tjlfI77SvNk8n.HrnynIe7IdhFt2uN30eBjqxvlZFkN9C', '321', 0, 'Active now', '2023-10-29 11:15:14', 'accepted', 'meh', '2002-07-31', 'America', '096736524434', 'Female', 'profile_pictures/icons8-birthday-100.png', 'profile_pictures/Screenshot 2023-11-03 001512.jpg', '1999-12-31 16:00:00'),
(52, 909099090, 'Jaziel', 'Griffin', 'BSEDUC', '', '1st B', 'justjaziel', '$2y$10$o03Yqw9B6WHqsw3fvudmou9LM0B.IT01wzJrr.2QRCUnGvNRKB4tC', '12345', 0, 'Active now', '2023-11-03 08:14:37', 'accepted', '', '0000-00-00', 'New Zealand', '09487134261', 'Female', 'profile_pictures/84dd10c4127610808e57a11cdd04d437.jpg', 'profile_pictures/tech3.jpg', '2023-11-14 04:56:37'),
(53, 2121212121, 'Ana', 'Dodge', 'BSOA', '', '2nd A', 'ana', '$2y$10$rJeHOEigjO6UyZwW1cPoF.Y4wwZsizBo0fgcYMPFGCKONWarIMcFC', 'ana', 0, 'Offline now', '2023-11-03 09:54:57', 'accepted', '', '2023-11-16', '', '', 'Female', 'profile_pictures/afdf3723e3638098c84a449e697194b1.jpg', 'profile_pictures/cover.png', '2023-11-18 08:43:30'),
(61, 1414441445, 'Jm', 'Salas', 'BSEDUC', '', '3rd A', 'callmejm', '$2y$10$At7f3x59XNUyTv/brcHaheTt0PU22vwJNXSNiKaRG5Vvd.6ZOH5C.', '123jm', 0, 'Active now', '2023-11-09 10:03:27', 'accepted', '', '0000-00-00', '', '', '', 'includes/user icon for ui.png', '', '1999-12-31 16:00:00'),
(62, 2147483647, 'jonas', 'lame', 'BSIS', '', '4th A', 'jonas', '$2y$10$/OaxDHYjGk/1J0sQT/Lecu1RfGSegNNJ/yj2xLqKtcZx5J/iQkCBG', 'jonas', 0, 'Active now', '2023-11-10 10:51:34', 'accepted', '', '0000-00-00', '', '', '', 'profile_pictures/profile8.jpg', 'profile_pictures/feed-image-3.png', '2023-11-15 09:52:02'),
(63, 2147483647, 'MARCUS', 'DE LOSANTOS III', 'BSOA', '', '2nd A', 'markey', '$2y$10$oXD1m.drYuANhSdDMwyC8OMH7LPv5yh41gvxpfmYaj7sjx0JXx0LC', '123', 0, 'Active now', '2023-11-10 11:04:48', 'accepted', '', '0000-00-00', '', '', 'Female', 'profile_pictures/photo5.png', 'profile_pictures/b1.jpg', '2023-11-15 12:42:55'),
(64, 2147483647, 'nob', 'kate', 'BSIS', '', '2nd A', 'nob', '$2y$10$zypMsKOyHhFHmMlgBBnhuu14.gtgTCCs7o.hBvJhZS2Rj.BE6zW8K', 'nob', 0, 'Offline now', '2023-11-10 11:34:16', 'accepted', 'Wala lang', '2023-11-30', 'san francisco', '097464544654', 'Female', 'profile_pictures/thunder flash selena.jpg', 'profile_pictures/bumble.jpg', '2023-11-18 08:22:45'),
(65, 2147483647, 'Kimkim', 'Montenegro', 'CRIM', '', '2 Alpha', '1', '$2y$10$KYnfU7r9sGx5LeeRHaT/eew5F1UTz45P0RXFhOApDwBf.r4LDwbqG', '1', 0, 'Active now', '2023-11-11 10:18:11', 'accepted', '', '0000-00-00', '', '', 'Female', 'includes/user icon for ui.png', '', '2023-11-13 10:13:21'),
(66, 2147483647, 'angeline', 'lim', 'BSEDUC', '', '1st B', 'lim', '$2y$10$kGChsS2BDFQexu0oxt.7oeI8pb8/AqjoVE8jCKFti9pZP1hf8yBcy', 'LIM', 0, 'Active now', '2023-11-13 06:38:06', 'accepted', '', '0000-00-00', '', '', '', 'includes/user icon for ui.png', '', '1999-12-31 16:00:00'),
(67, 2147483647, 'Mikey', 'Lore', 'ARTS', '', '3rd A', 'lore', '$2y$10$A5Axjan1j/EkJ6KWLlp4Nuz57iXhZiAzohPIbkZ4MZRBPeMqbBwtG', 'lore', 0, 'Active now', '2023-11-13 06:44:40', 'accepted', '', '0000-00-00', '', '', '', 'includes/user icon for ui.png', '', '2023-11-13 06:46:21'),
(68, 2029177386, 'Realyn', 'Terania', 'BSIS', '', '1st A', 'Rea', '$2y$10$unjWbhsq2KomY.4x7JRvuuhU6PrJiNteXD2O04zq4DWbwMcsYUdc2', '1234', 0, 'Active now', '2023-11-25 12:19:11', 'accepted', '', '0000-00-00', '', '', '', 'includes/user icon for ui.png', '', '2023-11-25 12:19:11'),
(74, 2147483647, 'sample1', 'sample1', 'BSIS', '2nd', 'O', 'sample1', '$2y$10$FDpt8XSLHa620BXj6698HOOPaHiCLyewik9Ytvl4FZ14w./JT5OSS', 'sample1', 0, 'Active now', '2023-11-29 02:11:58', 'accepted', '', '0000-00-00', '', '', '', 'includes/user icon for ui.png', '', '2023-11-29 02:11:58'),
(75, 2147483647, 'sample2', 'sample2', 'BSOA', '2nd', 'C', 'sample2', '$2y$10$/cMgAzKB16k4Q3D3HoOb.Obxz5ckWuHd899YNTes3/fcF2F630OJi', 'sample2', 0, 'Active now', '2023-11-29 03:57:03', 'accepted', '', '0000-00-00', '', '', '', 'profile_pictures/Screenshot_2023-11-09-22-22-13-39_22e4250240c136c826b8a3b1264b092d.jpg', 'profile_pictures/Screenshot_2023-11-09-22-32-08-25_22e4250240c136c826b8a3b1264b092d.jpg', '2023-11-29 03:57:03'),
(76, 2147483647, 'new', 'bie', 'CRIM', '3rd', 'M', 'new', '$2y$10$zJJkLl3seVAEj1NgEJKdY.b.0CqBFsPI..sQ5SSgd7MGU4x5QitLS', 'new', 0, 'Active now', '2023-12-20 07:19:48', 'accepted', '', '0000-00-00', '', '', '', 'includes/user icon for ui.png', '', '2023-12-20 07:19:48');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `academic_awardees`
--
ALTER TABLE `academic_awardees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bsa_comment`
--
ALTER TABLE `bsa_comment`
  ADD PRIMARY KEY (`bsa_comment_id`);

--
-- Indexes for table `bsa_post`
--
ALTER TABLE `bsa_post`
  ADD PRIMARY KEY (`bsa_post_id`);

--
-- Indexes for table `bsa_reaction_logs`
--
ALTER TABLE `bsa_reaction_logs`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `bscrim_comment`
--
ALTER TABLE `bscrim_comment`
  ADD PRIMARY KEY (`bscrim_comment_id`);

--
-- Indexes for table `bscrim_post`
--
ALTER TABLE `bscrim_post`
  ADD PRIMARY KEY (`bscrim_post_id`);

--
-- Indexes for table `bscrim_reaction_logs`
--
ALTER TABLE `bscrim_reaction_logs`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `bseduc_comment`
--
ALTER TABLE `bseduc_comment`
  ADD PRIMARY KEY (`bseduc_comment_id`);

--
-- Indexes for table `bseduc_post`
--
ALTER TABLE `bseduc_post`
  ADD PRIMARY KEY (`bseduc_post_id`);

--
-- Indexes for table `bseduc_reaction_logs`
--
ALTER TABLE `bseduc_reaction_logs`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `bsis_comment`
--
ALTER TABLE `bsis_comment`
  ADD PRIMARY KEY (`bsis_comment_id`);

--
-- Indexes for table `bsis_post`
--
ALTER TABLE `bsis_post`
  ADD PRIMARY KEY (`bsis_post_id`);

--
-- Indexes for table `bsis_reaction_logs`
--
ALTER TABLE `bsis_reaction_logs`
  ADD PRIMARY KEY (`log_id`),
  ADD KEY `fk_reaction_logs_bsis_post` (`bsis_post_id`);

--
-- Indexes for table `bsoa_comment`
--
ALTER TABLE `bsoa_comment`
  ADD PRIMARY KEY (`bsoa_comment_id`);

--
-- Indexes for table `bsoa_post`
--
ALTER TABLE `bsoa_post`
  ADD PRIMARY KEY (`bsoa_post_id`);

--
-- Indexes for table `bsoa_reaction_logs`
--
ALTER TABLE `bsoa_reaction_logs`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `drygoods_comment`
--
ALTER TABLE `drygoods_comment`
  ADD PRIMARY KEY (`drygoods_comment_id`);

--
-- Indexes for table `drygoods_post`
--
ALTER TABLE `drygoods_post`
  ADD PRIMARY KEY (`drygoods_post_id`);

--
-- Indexes for table `drygoods_reaction_logs`
--
ALTER TABLE `drygoods_reaction_logs`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `foods_comment`
--
ALTER TABLE `foods_comment`
  ADD PRIMARY KEY (`foods_comment_id`);

--
-- Indexes for table `foods_post`
--
ALTER TABLE `foods_post`
  ADD PRIMARY KEY (`foods_post_id`);

--
-- Indexes for table `foods_reaction_logs`
--
ALTER TABLE `foods_reaction_logs`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `founder_information`
--
ALTER TABLE `founder_information`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `founder_submissions`
--
ALTER TABLE `founder_submissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gen_comment`
--
ALTER TABLE `gen_comment`
  ADD PRIMARY KEY (`gen_comment_id`);

--
-- Indexes for table `gen_post`
--
ALTER TABLE `gen_post`
  ADD PRIMARY KEY (`gen_post_id`);

--
-- Indexes for table `gen_reaction_logs`
--
ALTER TABLE `gen_reaction_logs`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `group_chat_messages`
--
ALTER TABLE `group_chat_messages`
  ADD PRIMARY KEY (`message_id`);

--
-- Indexes for table `group_members`
--
ALTER TABLE `group_members`
  ADD PRIMARY KEY (`id`),
  ADD KEY `group_id` (`group_id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laf_comment`
--
ALTER TABLE `laf_comment`
  ADD PRIMARY KEY (`laf_comment_id`);

--
-- Indexes for table `laf_post`
--
ALTER TABLE `laf_post`
  ADD PRIMARY KEY (`laf_post_id`);

--
-- Indexes for table `laf_reaction_logs`
--
ALTER TABLE `laf_reaction_logs`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`msg_id`);

--
-- Indexes for table `owner_information`
--
ALTER TABLE `owner_information`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `owner_submissions`
--
ALTER TABLE `owner_submissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `reaction_logs`
--
ALTER TABLE `reaction_logs`
  ADD PRIMARY KEY (`log_id`),
  ADD KEY `fk_reaction_logs_post` (`post_id`),
  ADD KEY `fk_reaction_logs_user` (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `academic_awardees`
--
ALTER TABLE `academic_awardees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `bsa_comment`
--
ALTER TABLE `bsa_comment`
  MODIFY `bsa_comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `bsa_post`
--
ALTER TABLE `bsa_post`
  MODIFY `bsa_post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `bsa_reaction_logs`
--
ALTER TABLE `bsa_reaction_logs`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bscrim_comment`
--
ALTER TABLE `bscrim_comment`
  MODIFY `bscrim_comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `bscrim_post`
--
ALTER TABLE `bscrim_post`
  MODIFY `bscrim_post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `bscrim_reaction_logs`
--
ALTER TABLE `bscrim_reaction_logs`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `bseduc_comment`
--
ALTER TABLE `bseduc_comment`
  MODIFY `bseduc_comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `bseduc_post`
--
ALTER TABLE `bseduc_post`
  MODIFY `bseduc_post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `bseduc_reaction_logs`
--
ALTER TABLE `bseduc_reaction_logs`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `bsis_comment`
--
ALTER TABLE `bsis_comment`
  MODIFY `bsis_comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `bsis_post`
--
ALTER TABLE `bsis_post`
  MODIFY `bsis_post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `bsis_reaction_logs`
--
ALTER TABLE `bsis_reaction_logs`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `bsoa_comment`
--
ALTER TABLE `bsoa_comment`
  MODIFY `bsoa_comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `bsoa_post`
--
ALTER TABLE `bsoa_post`
  MODIFY `bsoa_post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `bsoa_reaction_logs`
--
ALTER TABLE `bsoa_reaction_logs`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=165;

--
-- AUTO_INCREMENT for table `drygoods_comment`
--
ALTER TABLE `drygoods_comment`
  MODIFY `drygoods_comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `drygoods_post`
--
ALTER TABLE `drygoods_post`
  MODIFY `drygoods_post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `drygoods_reaction_logs`
--
ALTER TABLE `drygoods_reaction_logs`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `foods_comment`
--
ALTER TABLE `foods_comment`
  MODIFY `foods_comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `foods_post`
--
ALTER TABLE `foods_post`
  MODIFY `foods_post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `founder_information`
--
ALTER TABLE `founder_information`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `founder_submissions`
--
ALTER TABLE `founder_submissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `gen_comment`
--
ALTER TABLE `gen_comment`
  MODIFY `gen_comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `gen_post`
--
ALTER TABLE `gen_post`
  MODIFY `gen_post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `gen_reaction_logs`
--
ALTER TABLE `gen_reaction_logs`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `group_chat_messages`
--
ALTER TABLE `group_chat_messages`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `group_members`
--
ALTER TABLE `group_members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `laf_comment`
--
ALTER TABLE `laf_comment`
  MODIFY `laf_comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `laf_post`
--
ALTER TABLE `laf_post`
  MODIFY `laf_post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `laf_reaction_logs`
--
ALTER TABLE `laf_reaction_logs`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;

--
-- AUTO_INCREMENT for table `owner_information`
--
ALTER TABLE `owner_information`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `owner_submissions`
--
ALTER TABLE `owner_submissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=189;

--
-- AUTO_INCREMENT for table `reaction_logs`
--
ALTER TABLE `reaction_logs`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=193;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bsis_reaction_logs`
--
ALTER TABLE `bsis_reaction_logs`
  ADD CONSTRAINT `fk_reaction_logs_bsis_post` FOREIGN KEY (`bsis_post_id`) REFERENCES `bsis_post` (`bsis_post_id`);

--
-- Constraints for table `group_members`
--
ALTER TABLE `group_members`
  ADD CONSTRAINT `group_members_ibfk_1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`);

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `reaction_logs`
--
ALTER TABLE `reaction_logs`
  ADD CONSTRAINT `fk_reaction_logs_post` FOREIGN KEY (`post_id`) REFERENCES `post` (`post_id`),
  ADD CONSTRAINT `fk_reaction_logs_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
