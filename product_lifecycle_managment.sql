-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 29, 2022 at 01:36 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `product_lifecycle_managment`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `a_id` int(11) NOT NULL,
  `f_name` text NOT NULL,
  `img_path` text NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`a_id`, `f_name`, `img_path`, `email`, `password`) VALUES
(14, 'Zeeshan Javed', 'images/165376602_10219531715593883_1895807702623759180_n.jpg', 'danial.wakeel@hotmail.com', '$2y$10$kycKoKrR3/ka72X4I2t4g.g5Bjv2Hqgo/L5uNY2frz0E3UvTlu8rm');

-- --------------------------------------------------------

--
-- Table structure for table `assign_projects`
--

CREATE TABLE `assign_projects` (
  `r_id` int(11) NOT NULL,
  `m_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `issue_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `end_date` timestamp NULL DEFAULT NULL,
  `m_status` text NOT NULL DEFAULT 'unseen',
  `description` text NOT NULL,
  `a_status` text NOT NULL DEFAULT 'unseen',
  `verification` text NOT NULL DEFAULT 'notverify'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `assign_projects`
--

INSERT INTO `assign_projects` (`r_id`, `m_id`, `p_id`, `issue_date`, `end_date`, `m_status`, `description`, `a_status`, `verification`) VALUES
(13, 18, 61, '2021-12-27 02:54:04', '2022-02-12 08:00:00', 'unseen', 'last time check with alert ', 'unseen', 'notverify'),
(17, 21, 61, '2022-01-06 04:24:21', '2022-01-21 08:00:00', 'unseen', 'xczxcdfd', 'unseen', 'notverify'),
(19, 33, 80, '2022-01-25 02:35:00', '2022-01-14 08:00:00', 'seen', 'ok', 'unseen', 'notverify'),
(20, 25, 80, '2022-02-01 19:43:52', '2022-02-16 19:00:00', 'seen', 'just check', 'unseen', 'notverify'),
(23, 33, 61, '2022-02-01 21:40:20', '2022-02-10 19:00:00', 'seen', 'asdadasd', 'unseen', 'notverify'),
(24, 33, 71, '2022-03-27 09:40:32', '2022-03-17 04:00:00', 'seen', 'nothing', 'unseen', 'notverify'),
(25, 33, 70, '2022-03-27 09:40:51', '2022-03-31 04:00:00', 'seen', 'ok', 'unseen', 'notverify'),
(26, 33, 51, '2022-03-27 20:54:58', '2022-03-31 04:00:00', 'seen', 'check out', 'unseen', 'notverify'),
(27, 33, 68, '2022-03-27 21:12:53', '2022-03-26 04:00:00', 'seen', 'ok', 'unseen', 'notverify'),
(29, 33, 62, '2022-04-04 11:26:02', '2022-04-22 04:00:00', 'seen', 'ok', 'unseen', 'notverify'),
(30, 25, 83, '2022-04-12 18:59:26', '2022-04-21 04:00:00', 'seen', 'compelte it', 'unseen', 'notverify'),
(31, 25, 84, '2022-04-15 07:02:40', '2022-04-28 04:00:00', 'seen', 'abc', 'unseen', 'notverify'),
(32, 33, 84, '2022-04-15 07:08:19', '2022-04-28 04:00:00', 'seen', 'hhello', 'unseen', 'notverify');

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `msg_id` int(11) NOT NULL,
  `s_id` int(11) NOT NULL,
  `r_id` int(11) NOT NULL,
  `msg` text NOT NULL,
  `status` text NOT NULL DEFAULT 'unseen',
  `category` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`msg_id`, `s_id`, `r_id`, `msg`, `status`, `category`, `date`) VALUES
(1, 33, 14, 'ok', 'seen', 1, '2022-03-13 20:27:28'),
(2, 33, 14, 'sir hope you fine', 'seen', 1, '2022-03-14 10:29:15'),
(3, 14, 33, 'hi', 'seen', 0, '2022-03-14 10:29:15'),
(4, 14, 33, 'i am fine', 'seen', 0, '2022-04-14 10:29:15'),
(5, 33, 30, 'i am fine', 'seen', 1, '2022-03-14 10:29:15'),
(6, 30, 33, 'ok', 'seen', 1, '2022-03-14 10:29:15'),
(7, 30, 33, 'ok', 'seen', 1, '2022-03-14 10:29:15'),
(8, 30, 33, 'ok', 'seen', 1, '2022-03-14 10:29:15'),
(9, 33, 30, 'i am fine', 'seen', 1, '2022-03-14 10:29:15'),
(10, 33, 30, 'i am fine', 'seen', 1, '2022-03-14 10:29:15'),
(11, 30, 33, 'ok', 'seen', 1, '2022-05-14 10:29:15'),
(12, 30, 33, 'ok', 'seen', 1, '2022-03-14 10:29:15'),
(13, 25, 33, 'ok', 'seen', 1, '2022-03-14 10:29:15'),
(14, 25, 33, 'ok', 'seen', 1, '2022-03-14 10:29:15'),
(15, 14, 33, 'hi', 'seen', 0, '2022-03-14 10:29:15'),
(16, 33, 14, 'wao', 'seen', 1, '2022-03-16 17:05:19'),
(17, 33, 14, 'this is nice', 'seen', 1, '2022-03-16 17:05:31'),
(18, 33, 14, 'ok', 'seen', 1, '2022-03-16 17:14:15'),
(19, 33, 14, 'hello\n', 'seen', 1, '2022-03-16 17:15:34'),
(20, 33, 14, 'next', 'seen', 1, '2022-03-16 17:16:13'),
(21, 33, 14, 'testing', 'seen', 1, '2022-03-16 17:23:33'),
(22, 33, 14, 'checking for button', 'seen', 1, '2022-03-16 17:23:49'),
(23, 33, 14, 'now check with enter', 'seen', 1, '2022-03-16 17:23:57'),
(24, 33, 14, 'check input slider', 'seen', 1, '2022-03-16 17:26:26'),
(25, 33, 14, 'common', 'seen', 1, '2022-05-16 17:28:53'),
(26, 14, 33, 'ok i will se\r\n', 'seen', 0, '2022-03-14 10:29:15'),
(27, 33, 14, 'ok thanks', 'seen', 1, '2022-03-16 17:39:09'),
(28, 33, 20, 'hello', 'unseen', 1, '2022-03-17 14:00:44'),
(29, 33, 20, 'abdullah', 'unseen', 1, '2022-03-17 14:01:53'),
(30, 33, 20, '', 'unseen', 1, '2022-03-17 14:05:50'),
(31, 33, 20, '', 'unseen', 1, '2022-03-17 14:05:56'),
(32, 33, 20, 'ni', 'unseen', 1, '2022-03-17 14:06:04'),
(33, 33, 20, 'ni', 'unseen', 1, '2022-03-17 14:06:33'),
(34, 33, 14, 'ni', 'seen', 1, '2022-03-17 14:06:53'),
(35, 33, 14, 'nice', 'seen', 1, '2022-03-17 14:08:52'),
(36, 33, 20, '.', 'unseen', 1, '2022-03-17 14:33:24'),
(37, 14, 33, 'hi', 'seen', 0, '2022-03-14 10:29:15'),
(38, 14, 33, 'hi', 'seen', 0, '2022-03-14 10:29:15'),
(39, 25, 33, 'ok', 'seen', 1, '2022-03-14 10:29:15'),
(40, 25, 33, 'ok', 'seen', 1, '2022-03-14 10:29:15'),
(41, 25, 33, 'ok', 'seen', 1, '2022-03-14 10:29:15'),
(42, 25, 33, 'ok final check', 'seen', 1, '2022-03-14 10:29:15'),
(43, 14, 33, 'ok i will se\r\n', 'seen', 0, '2022-03-14 10:29:15'),
(44, 14, 33, 'ok i will se\r\n', 'seen', 0, '2022-03-14 10:29:15'),
(45, 30, 33, 'ok', 'seen', 1, '2022-03-14 10:29:15'),
(46, 33, 30, 'ok', 'seen', 1, '2022-03-17 17:19:17'),
(47, 14, 33, 'ok i will se\r\n', 'seen', 0, '2022-03-14 10:29:15'),
(48, 33, 14, 'check input slider', 'seen', 1, '2022-03-16 17:26:26'),
(49, 33, 14, 'common', 'seen', 1, '2022-04-16 17:28:53'),
(50, 14, 33, 'hi', 'seen', 0, '2022-04-14 10:29:15'),
(51, 14, 33, 'hi', 'seen', 0, '2022-06-14 10:29:15'),
(52, 33, 14, 'nice', 'seen', 1, '2022-06-17 14:08:52'),
(53, 20, 33, 'hello', 'seen', 1, '2022-09-17 14:00:44'),
(54, 14, 33, 'hi', 'seen', 0, '2022-06-14 10:29:15'),
(55, 14, 33, 'nice', 'seen', 1, '2022-07-17 14:08:52'),
(56, 20, 33, '', 'seen', 1, '2022-09-17 14:05:56'),
(57, 33, 20, 'ni', 'unseen', 1, '2022-12-17 15:06:04'),
(58, 33, 20, 'ni', 'unseen', 1, '2023-12-17 15:06:04'),
(59, 20, 33, 'ni', 'seen', 1, '2024-12-17 15:06:04'),
(60, 20, 33, 'ni', 'seen', 1, '2025-12-17 15:06:04'),
(61, 33, 14, 'ok', 'seen', 1, '2022-03-26 19:45:22'),
(64, 14, 33, 'ok', 'seen', 0, '2022-03-26 19:48:34'),
(66, 33, 14, 'i will see', 'seen', 1, '2022-03-26 19:47:07'),
(67, 20, 14, 'i will see', 'seen', 1, '2022-03-26 19:47:07'),
(68, 20, 14, 'i will see', 'seen', 1, '2022-03-26 19:47:07'),
(69, 33, 14, 'i will see', 'seen', 1, '2022-03-26 19:47:07'),
(70, 33, 14, 'i will see', 'seen', 1, '2022-03-26 19:47:07'),
(71, 33, 14, 'i will see', 'seen', 1, '2022-03-26 19:47:07'),
(72, 33, 14, 'i will see', 'seen', 1, '2022-03-26 19:47:07'),
(73, 33, 14, 'i will see', 'seen', 1, '2022-04-26 19:47:07'),
(74, 33, 14, 'i will see', 'seen', 1, '2022-05-26 19:47:07'),
(75, 33, 14, 'i will see', 'seen', 1, '2022-06-26 19:47:07'),
(76, 33, 14, 'i will see', 'seen', 1, '2022-07-26 19:47:07'),
(77, 33, 14, 'i will see', 'seen', 1, '2022-08-26 19:47:07'),
(78, 33, 14, 'i will see', 'seen', 1, '2022-09-26 19:47:07'),
(79, 33, 20, 'let see', 'unseen', 1, '2022-03-27 06:59:53'),
(80, 33, 20, 'fit', 'unseen', 1, '2022-03-27 07:00:09'),
(81, 33, 20, 'no ', 'unseen', 1, '2022-03-27 07:00:24'),
(82, 33, 20, 'no', 'unseen', 1, '2022-03-27 07:00:32'),
(83, 33, 20, '\n', 'unseen', 1, '2022-03-27 07:00:34'),
(84, 33, 14, 'mo', 'seen', 1, '2022-03-27 07:00:46'),
(85, 33, 14, 'pick', 'seen', 1, '2022-03-27 07:00:57'),
(86, 14, 33, 'fine', 'seen', 0, '2022-03-27 07:01:41'),
(87, 14, 33, 'let see', 'seen', 0, '2022-03-27 07:02:07'),
(88, 14, 33, 'ok i will check', 'seen', 0, '2022-03-27 07:04:28'),
(89, 33, 14, 'let me check', 'seen', 1, '2022-03-27 07:11:50'),
(90, 14, 27, 'ok', 'unseen', 0, '2022-03-28 13:16:53'),
(91, 14, 27, '\n', 'unseen', 0, '2022-03-28 13:16:56'),
(92, 14, 27, 'ok', 'unseen', 0, '2022-03-28 13:19:11'),
(93, 14, 27, '.', 'unseen', 0, '2022-03-28 13:19:21'),
(94, 14, 27, 'hello', 'unseen', 0, '2022-03-28 13:19:52'),
(95, 14, 27, 'with', 'unseen', 0, '2022-03-28 13:20:09'),
(96, 14, 27, '\n', 'unseen', 0, '2022-03-28 13:20:13'),
(97, 14, 27, '\n', 'unseen', 0, '2022-03-28 13:20:13'),
(98, 14, 27, '\n', 'unseen', 0, '2022-03-28 13:20:14'),
(99, 14, 27, '\n', 'unseen', 0, '2022-03-28 13:20:15'),
(100, 14, 27, '\n', 'unseen', 0, '2022-03-28 13:20:15'),
(101, 14, 27, '\n', 'unseen', 0, '2022-03-28 13:20:18'),
(102, 14, 27, 'k', 'unseen', 0, '2022-03-28 13:21:38'),
(103, 14, 27, 'ok', 'unseen', 0, '2022-03-28 13:21:56'),
(104, 14, 27, 'flow', 'unseen', 0, '2022-03-28 13:22:03'),
(105, 14, 27, 'ok', 'unseen', 0, '2022-03-28 13:22:12'),
(106, 14, 27, 'why', 'unseen', 0, '2022-03-28 13:22:42'),
(107, 14, 27, 'ok', 'unseen', 0, '2022-03-28 13:22:59'),
(108, 14, 20, 'ok', 'unseen', 0, '2022-03-28 13:23:29'),
(109, 14, 20, 'ok', 'unseen', 0, '2022-03-28 13:23:42'),
(110, 14, 20, 'ok', 'unseen', 0, '2022-03-28 13:24:10'),
(111, 33, 14, 'ok', 'seen', 1, '2022-03-28 13:25:27'),
(112, 33, 14, 'chat', 'seen', 1, '2022-03-28 13:25:35'),
(113, 33, 14, 'going', 'seen', 1, '2022-03-28 13:25:46'),
(114, 33, 14, 'go', 'seen', 1, '2022-03-28 13:25:54'),
(115, 33, 14, 'oks', 'seen', 1, '2022-03-28 13:26:00'),
(116, 33, 14, 'filter', 'seen', 1, '2022-03-28 13:27:14'),
(117, 33, 14, 'ok', 'seen', 1, '2022-03-28 13:52:54'),
(118, 33, 14, 'fine', 'seen', 1, '2022-03-28 13:56:08'),
(119, 33, 14, 'ok', 'seen', 1, '2022-03-28 13:56:17'),
(120, 33, 20, 'ok', 'unseen', 1, '2022-03-28 13:59:35'),
(121, 33, 20, 'ok', 'unseen', 1, '2022-03-28 14:00:15'),
(122, 33, 20, 'ok', 'unseen', 1, '2022-03-28 14:00:51'),
(123, 33, 25, 'fine', 'seen', 1, '2022-03-28 14:05:16'),
(124, 33, 25, 'let me check', 'seen', 1, '2022-03-28 14:05:38'),
(125, 33, 26, 'ok', 'unseen', 1, '2022-03-28 14:06:30'),
(126, 33, 26, 'new', 'unseen', 1, '2022-03-28 14:06:53'),
(127, 33, 26, 'let me test', 'unseen', 1, '2022-03-28 14:11:22'),
(128, 33, 26, 'ok', 'unseen', 1, '2022-03-28 14:13:16'),
(129, 33, 26, 'ok check', 'unseen', 1, '2022-03-28 14:13:40'),
(130, 33, 14, 'ok fine', 'seen', 1, '2022-03-28 14:16:57'),
(131, 33, 14, 'let me handle', 'seen', 1, '2022-03-28 14:17:16'),
(132, 33, 14, 'ok', 'seen', 1, '2022-03-28 14:18:32'),
(133, 33, 14, 'figure out problem', 'seen', 1, '2022-03-28 14:19:06'),
(134, 33, 14, 'find', 'seen', 1, '2022-03-28 14:19:24'),
(135, 33, 14, 'me', 'seen', 1, '2022-03-28 14:24:04'),
(136, 33, 14, 'go', 'seen', 1, '2022-03-28 14:25:00'),
(137, 33, 14, 'ok fine gud', 'seen', 1, '2022-03-28 14:27:34'),
(138, 33, 14, 'ok let me check', 'seen', 1, '2022-03-28 14:27:49'),
(139, 33, 14, 'fine gud', 'seen', 1, '2022-03-28 14:27:58'),
(140, 33, 14, 'me testing', 'seen', 1, '2022-03-28 14:28:56'),
(141, 33, 14, 'ok tsesdfsdfd', 'seen', 1, '2022-03-28 14:29:24'),
(142, 33, 14, 'gghhgjjhjjg', 'seen', 1, '2022-03-28 14:32:23'),
(143, 33, 14, 'qwqwqwqwq', 'seen', 1, '2022-03-28 14:32:34'),
(144, 33, 20, 'deed', 'unseen', 1, '2022-03-28 14:41:12'),
(145, 33, 20, 'ffghfhh', 'unseen', 1, '2022-03-28 14:41:30'),
(146, 33, 14, 'ok', 'seen', 1, '2022-03-28 14:54:21'),
(147, 33, 30, 'ok', 'seen', 1, '2022-03-28 16:30:04'),
(148, 33, 20, 'let find', 'unseen', 1, '2022-03-28 16:30:18'),
(149, 33, 14, 'meaing', 'seen', 1, '2022-03-28 16:30:27'),
(150, 33, 26, 'common', 'unseen', 1, '2022-03-28 16:30:37'),
(151, 33, 30, 'testing complete', 'seen', 1, '2022-03-28 16:35:11'),
(152, 33, 20, 'figyre out', 'unseen', 1, '2022-03-28 16:36:01'),
(153, 33, 26, 'let take\n', 'unseen', 1, '2022-03-28 16:36:06'),
(154, 33, 30, 'shukar \n', 'seen', 1, '2022-03-28 16:36:12'),
(155, 14, 20, 'ok', 'unseen', 0, '2022-03-28 16:44:06'),
(156, 14, 20, 'ok\n', 'unseen', 0, '2022-03-28 16:44:11'),
(157, 14, 20, '\n', 'unseen', 0, '2022-03-28 16:44:13'),
(158, 14, 20, 'no', 'unseen', 0, '2022-03-28 16:44:18'),
(159, 14, 20, 'keep try', 'unseen', 0, '2022-03-28 16:49:33'),
(160, 14, 25, 'hy', 'seen', 0, '2022-03-28 16:49:41'),
(161, 14, 27, 'then why', 'unseen', 0, '2022-03-28 16:49:50'),
(162, 14, 30, 'please take its srious', 'seen', 0, '2022-03-28 16:50:02'),
(163, 14, 33, 'ok', 'seen', 0, '2022-03-28 16:50:08'),
(164, 14, 33, 'please give me update about project', 'seen', 0, '2022-03-29 16:41:12'),
(165, 33, 14, 'ok sir', 'seen', 1, '2022-03-29 16:41:40'),
(166, 33, 14, 'ok', 'seen', 1, '2022-03-29 16:41:58'),
(167, 33, 14, 'ok', 'seen', 1, '2022-03-29 16:42:24'),
(168, 33, 14, 'ok', 'seen', 1, '2022-03-29 16:42:40'),
(169, 33, 14, 'let see', 'seen', 1, '2022-03-29 16:42:51'),
(170, 14, 33, 'ok', 'seen', 0, '2022-03-29 16:44:09'),
(171, 30, 33, 'how project going', 'seen', 1, '2022-03-29 17:02:31'),
(172, 33, 14, 'ok', 'seen', 1, '2022-03-29 18:43:05'),
(173, 33, 14, 'ok i check', 'seen', 1, '2022-03-29 18:43:27'),
(174, 33, 14, 'ok', 'seen', 1, '2022-03-29 18:47:16'),
(175, 33, 14, 'ok', 'seen', 1, '2022-03-29 18:51:46'),
(176, 33, 14, 'ok', 'seen', 1, '2022-03-29 18:55:54'),
(177, 33, 20, 'ok', 'unseen', 1, '2022-03-29 18:56:44'),
(178, 33, 14, 'nice', 'seen', 1, '2022-03-29 19:04:28'),
(179, 33, 14, 'ok i will check', 'seen', 1, '2022-03-29 19:05:44'),
(180, 33, 14, 'let figure', 'seen', 1, '2022-03-29 19:06:04'),
(181, 33, 14, 'its done make sense', 'seen', 1, '2022-03-29 19:06:25'),
(182, 14, 33, 'ok', 'seen', 0, '2022-03-29 19:27:21'),
(183, 14, 20, 'ok', 'unseen', 0, '2022-03-29 19:38:08'),
(184, 33, 14, 'ok', 'seen', 1, '2022-03-29 19:39:31'),
(185, 33, 14, 'ok', 'seen', 1, '2022-03-29 20:30:11'),
(186, 33, 20, 'let me handle', 'unseen', 1, '2022-03-29 20:30:22'),
(187, 33, 25, 'ok i see\n', 'seen', 1, '2022-03-29 20:30:30'),
(188, 14, 33, 'sir', 'seen', 0, '2022-03-29 20:32:06'),
(189, 14, 20, 'fine', 'unseen', 0, '2022-03-29 20:32:17'),
(190, 33, 14, 'no', 'seen', 1, '2022-03-29 20:37:15'),
(191, 33, 14, 'ok', 'seen', 1, '2022-03-29 20:37:27'),
(192, 33, 14, 'ok nice', 'seen', 1, '2022-03-29 21:00:07'),
(193, 33, 14, 'be nice', 'seen', 1, '2022-03-29 21:14:57'),
(194, 33, 14, 'ok', 'seen', 1, '2022-03-29 21:15:42'),
(195, 33, 14, 'let ok', 'seen', 1, '2022-03-29 21:17:13'),
(196, 33, 14, 'ok', 'seen', 1, '2022-03-29 21:39:19'),
(197, 33, 20, 'sure', 'unseen', 1, '2022-03-29 21:39:54'),
(198, 33, 27, 'ok', 'unseen', 1, '2022-03-29 21:40:09'),
(199, 33, 30, 'shukar', 'unseen', 1, '2022-03-29 21:40:28'),
(200, 33, 30, 'ok', 'unseen', 1, '2022-03-30 10:37:17'),
(201, 33, 14, 'sir\n', 'seen', 1, '2022-03-30 10:37:30'),
(202, 33, 14, '\n', 'seen', 1, '2022-03-30 10:37:35'),
(203, 14, 20, 'ok sir', 'unseen', 0, '2022-03-30 10:43:34'),
(204, 14, 25, 'sir \n', 'seen', 0, '2022-03-30 10:43:46'),
(205, 25, 14, 'yes', 'seen', 1, '2022-04-04 14:48:14'),
(206, 25, 14, '\nok', 'seen', 1, '2022-04-04 14:48:18'),
(207, 25, 33, 'ok', 'seen', 1, '2022-04-04 14:49:02'),
(208, 33, 25, 'hello', 'seen', 1, '2022-04-04 16:25:45'),
(209, 25, 33, 'hy', 'seen', 1, '2022-04-04 16:25:57'),
(210, 25, 33, 'what your doing', 'seen', 1, '2022-04-04 16:27:37'),
(211, 33, 25, 'nothing', 'seen', 1, '2022-04-04 16:28:00'),
(212, 25, 33, 'ok\n', 'seen', 1, '2022-04-04 16:28:10'),
(213, 25, 33, 'so\n', 'seen', 1, '2022-04-04 16:28:21'),
(214, 25, 33, '\nok', 'seen', 1, '2022-04-04 16:31:42'),
(215, 25, 33, 'make\n', 'seen', 1, '2022-04-04 16:32:20'),
(216, 25, 33, 'ok', 'seen', 1, '2022-04-04 16:37:06'),
(217, 25, 33, '\nlet me check', 'seen', 1, '2022-04-04 16:40:10'),
(218, 25, 33, '\nok', 'seen', 1, '2022-04-04 16:44:52'),
(219, 25, 33, '\nfine', 'seen', 1, '2022-04-04 16:46:33'),
(220, 25, 33, '\nok', 'seen', 1, '2022-04-04 16:47:21'),
(221, 14, 25, 'ok', 'seen', 0, '2022-04-04 17:03:06'),
(222, 14, 25, 'again\n', 'seen', 0, '2022-04-04 17:03:23'),
(223, 14, 25, '\nok', 'seen', 0, '2022-04-04 17:03:43'),
(224, 14, 25, '\nok', 'seen', 0, '2022-04-04 17:14:27'),
(225, 14, 33, 'ok\n', 'seen', 0, '2022-04-04 17:14:44'),
(226, 14, 33, 'lets finds\n', 'seen', 0, '2022-04-04 17:15:02'),
(227, 14, 33, 'testing', 'seen', 0, '2022-04-04 17:15:40'),
(228, 14, 33, 'testing', 'seen', 0, '2022-04-04 17:15:51'),
(229, 14, 33, 'testing', 'seen', 0, '2022-04-04 17:55:27'),
(230, 25, 33, 'testing', 'seen', 1, '2022-04-04 19:19:01'),
(231, 25, 14, 'sir', 'seen', 1, '2022-04-08 10:04:09'),
(232, 14, 25, 'yes', 'seen', 0, '2022-04-08 10:04:29'),
(233, 14, 25, '??\n', 'seen', 0, '2022-04-08 10:04:40'),
(234, 14, 25, 'ok i will\n', 'seen', 0, '2022-04-08 10:04:56'),
(235, 14, 25, '???', 'seen', 0, '2022-04-08 10:05:57'),
(236, 25, 14, 'yes', 'seen', 1, '2022-04-08 10:06:15'),
(237, 14, 30, 'ok', 'unseen', 0, '2022-04-08 10:11:30'),
(238, 14, 25, 'ok', 'seen', 0, '2022-04-08 10:27:58'),
(239, 14, 25, 'ok\n', 'seen', 0, '2022-04-08 10:28:06'),
(240, 14, 25, 'fine', 'seen', 0, '2022-04-08 10:28:18'),
(241, 33, 27, 'testing', 'unseen', 1, '2022-04-08 16:23:09'),
(242, 33, 27, 'chagne', 'unseen', 1, '2022-04-08 16:23:18'),
(243, 33, 27, '\nno prbolem', 'unseen', 1, '2022-04-08 16:23:24'),
(244, 14, 26, 'yes', 'unseen', 0, '2022-04-08 16:27:13'),
(245, 14, 26, '\nyes', 'unseen', 0, '2022-04-08 16:27:15'),
(246, 33, 30, 'ok', 'unseen', 1, '2022-04-08 16:36:40'),
(247, 33, 14, 'find', 'seen', 1, '2022-04-08 16:38:36'),
(248, 33, 14, 'ok', 'seen', 1, '2022-04-08 16:40:40'),
(249, 33, 14, 'no', 'seen', 1, '2022-04-08 16:41:41'),
(250, 33, 14, '\n', 'seen', 1, '2022-04-08 16:41:52'),
(251, 33, 14, '\n', 'seen', 1, '2022-04-08 16:41:53'),
(252, 33, 14, '\n', 'seen', 1, '2022-04-08 16:41:53'),
(253, 33, 14, '\n', 'seen', 1, '2022-04-08 16:41:53'),
(254, 33, 14, '\n', 'seen', 1, '2022-04-08 16:41:54'),
(255, 33, 14, '\n', 'seen', 1, '2022-04-08 16:41:54'),
(256, 33, 14, '\n', 'seen', 1, '2022-04-08 16:41:54'),
(257, 33, 14, '\n', 'seen', 1, '2022-04-08 16:41:54'),
(258, 33, 14, '\n', 'seen', 1, '2022-04-08 16:41:54'),
(259, 33, 14, '\n', 'seen', 1, '2022-04-08 16:42:00'),
(260, 33, 14, '\n', 'seen', 1, '2022-04-08 16:43:16'),
(261, 33, 14, '\n', 'seen', 1, '2022-04-08 16:43:19'),
(262, 33, 14, '\n', 'seen', 1, '2022-04-08 16:43:20'),
(263, 33, 14, '\n', 'seen', 1, '2022-04-08 16:44:09'),
(264, 33, 14, '\n', 'seen', 1, '2022-04-08 16:44:10'),
(265, 33, 14, '\n', 'seen', 1, '2022-04-08 16:44:11'),
(266, 33, 14, '\n', 'seen', 1, '2022-04-08 16:44:11'),
(267, 33, 14, '\n', 'seen', 1, '2022-04-08 16:44:11'),
(268, 33, 14, '\n', 'seen', 1, '2022-04-08 16:44:12'),
(269, 33, 14, '\n', 'seen', 1, '2022-04-08 16:44:12'),
(270, 33, 14, '\n', 'seen', 1, '2022-04-08 16:44:15'),
(271, 33, 14, '\n', 'seen', 1, '2022-04-08 16:44:23'),
(272, 33, 30, '\n', 'unseen', 1, '2022-04-08 16:44:52'),
(273, 33, 30, '\n', 'unseen', 1, '2022-04-08 16:44:54'),
(274, 33, 30, '\n', 'unseen', 1, '2022-04-08 16:44:58'),
(275, 33, 25, '', 'seen', 1, '2022-04-08 16:47:28'),
(276, 33, 25, '\n', 'seen', 1, '2022-04-08 16:47:32'),
(277, 33, 25, '', 'seen', 1, '2022-04-08 16:48:19'),
(278, 33, 25, '\n', 'seen', 1, '2022-04-08 16:48:21'),
(279, 33, 25, '\n', 'seen', 1, '2022-04-08 16:48:22'),
(280, 33, 27, '', 'unseen', 1, '2022-04-08 16:52:22'),
(281, 33, 27, '\ndffsdfsdf', 'unseen', 1, '2022-04-08 16:52:31'),
(282, 33, 27, '\nw', 'unseen', 1, '2022-04-08 16:52:35'),
(283, 33, 27, '\n', 'unseen', 1, '2022-04-08 16:53:08'),
(284, 33, 27, '', 'unseen', 1, '2022-04-08 16:53:17'),
(285, 33, 27, '', 'unseen', 1, '2022-04-08 16:53:26'),
(286, 33, 26, '\n', 'unseen', 1, '2022-04-08 16:54:03'),
(287, 33, 20, 'ok', 'unseen', 1, '2022-04-08 17:43:58'),
(288, 33, 20, 'ok', 'unseen', 1, '2022-04-08 17:45:07'),
(289, 33, 20, 'hello', 'unseen', 1, '2022-04-08 17:46:27'),
(290, 33, 20, 'no', 'unseen', 1, '2022-04-08 17:46:55'),
(291, 33, 20, 'ok', 'unseen', 1, '2022-04-08 17:47:38'),
(292, 33, 20, 'ok', 'unseen', 1, '2022-04-08 17:49:36'),
(293, 33, 20, 'issue', 'unseen', 1, '2022-04-08 17:50:36'),
(294, 33, 20, 'ok', 'unseen', 1, '2022-04-08 17:50:40'),
(295, 33, 20, 'let test\n', 'unseen', 1, '2022-04-08 17:50:48'),
(296, 33, 20, 'ok', 'unseen', 1, '2022-04-08 17:52:54'),
(297, 33, 20, 'let tests\n', 'unseen', 1, '2022-04-08 17:53:03'),
(298, 33, 20, 'make it clear\n\nputl', 'unseen', 1, '2022-04-08 17:53:17'),
(299, 33, 20, 'find out', 'unseen', 1, '2022-04-08 17:53:31'),
(300, 33, 20, 'not wau', 'unseen', 1, '2022-04-08 17:54:12'),
(301, 33, 20, 'clear it', 'unseen', 1, '2022-04-08 17:54:30'),
(302, 33, 20, 'ok', 'unseen', 1, '2022-04-08 17:54:35'),
(303, 33, 20, 'enter', 'unseen', 1, '2022-04-08 17:57:04'),
(304, 33, 20, 'testing', 'unseen', 1, '2022-04-08 17:58:03'),
(305, 33, 20, 'enter', 'unseen', 1, '2022-04-08 17:58:45'),
(306, 33, 20, 'test', 'unseen', 1, '2022-04-08 18:00:48'),
(307, 33, 20, 'enter', 'unseen', 1, '2022-04-08 18:01:44'),
(308, 33, 20, 'ok\nok', 'unseen', 1, '2022-04-08 18:09:36'),
(309, 33, 20, 'let take import', 'unseen', 1, '2022-04-08 18:09:46'),
(310, 33, 20, 'ok\n', 'unseen', 1, '2022-04-08 18:10:53'),
(311, 33, 20, 'let see', 'unseen', 1, '2022-04-08 18:10:59'),
(312, 33, 20, 'no\ni take it easy', 'unseen', 1, '2022-04-08 18:11:12'),
(313, 33, 20, 'hello', 'unseen', 1, '2022-04-08 18:16:16'),
(314, 33, 20, 'good way', 'unseen', 1, '2022-04-08 18:16:22'),
(315, 33, 20, 'being good', 'unseen', 1, '2022-04-08 18:16:33'),
(316, 14, 20, 'ok', 'unseen', 0, '2022-04-08 18:19:37'),
(317, 14, 20, 'let see', 'unseen', 0, '2022-04-08 18:19:40'),
(318, 14, 20, 'good', 'unseen', 0, '2022-04-08 18:19:46'),
(319, 33, 14, 'hello', 'seen', 1, '2022-04-12 07:19:45'),
(320, 33, 14, 'how are you', 'seen', 1, '2022-04-12 07:19:55'),
(321, 33, 20, 'ok', 'unseen', 1, '2022-04-12 07:20:04'),
(322, 25, 14, 'hello', 'seen', 1, '2022-04-12 18:56:26'),
(323, 14, 25, 'hy', 'seen', 0, '2022-04-12 18:56:38'),
(324, 14, 25, 'how are you', 'seen', 0, '2022-04-12 18:57:01'),
(325, 14, 25, 'you are fine', 'seen', 0, '2022-04-12 18:57:19'),
(326, 14, 25, '??', 'seen', 0, '2022-04-12 18:57:40'),
(327, 14, 25, 'i assign you project please check', 'seen', 0, '2022-04-12 18:58:05'),
(328, 25, 14, 'ok sir i will check', 'seen', 1, '2022-04-12 19:00:18'),
(329, 14, 25, 'ok good', 'seen', 0, '2022-04-12 19:00:35'),
(330, 14, 25, 'please update me', 'seen', 0, '2022-04-12 19:00:52'),
(331, 33, 14, 'hello', 'seen', 1, '2022-04-14 11:07:39'),
(332, 33, 14, 'hi', 'seen', 1, '2022-04-14 11:14:49'),
(333, 14, 33, 'ok', 'seen', 0, '2022-04-14 16:37:55'),
(334, 25, 33, 'hello', 'seen', 1, '2022-04-14 17:17:06'),
(335, 25, 33, 'hy', 'seen', 1, '2022-04-14 17:17:25'),
(336, 25, 33, 'how are you', 'seen', 1, '2022-04-14 17:17:35'),
(337, 25, 33, 'ok', 'seen', 1, '2022-04-14 17:20:46'),
(338, 25, 33, 'let me check', 'seen', 1, '2022-04-14 17:21:00'),
(339, 25, 33, 'let find', 'seen', 1, '2022-04-14 17:21:32'),
(340, 25, 33, 'message me', 'seen', 1, '2022-04-14 17:29:06'),
(341, 25, 33, 'message', 'seen', 1, '2022-04-14 17:40:23'),
(342, 25, 33, '\n', 'seen', 1, '2022-04-14 17:40:34'),
(343, 25, 33, 'no', 'seen', 1, '2022-04-14 17:40:39'),
(344, 25, 33, 'ok', 'seen', 1, '2022-04-14 17:40:51'),
(345, 25, 33, 'know check', 'seen', 1, '2022-04-14 17:48:09'),
(346, 25, 33, 'ok', 'seen', 1, '2022-04-14 17:58:43'),
(347, 25, 33, 'check', 'seen', 1, '2022-04-14 18:01:33'),
(348, 14, 33, 'hy', 'seen', 0, '2022-04-21 17:52:03'),
(349, 14, 33, 'ok', 'seen', 0, '2022-04-21 18:10:30');

-- --------------------------------------------------------

--
-- Table structure for table `cost`
--

CREATE TABLE `cost` (
  `c_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `create_id` int(11) NOT NULL,
  `m_id` int(11) NOT NULL,
  `mod_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `price` double NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cost`
--

INSERT INTO `cost` (`c_id`, `p_id`, `create_id`, `m_id`, `mod_id`, `name`, `description`, `price`, `date`) VALUES
(1, 80, 33, 33, 22, 'chatting system', 'abc', 200, '2022-04-03 09:21:28'),
(3, 80, 33, 33, 26, 'android senser', 'keep', 2400, '2022-04-03 09:21:51'),
(5, 80, 33, 25, 23, 'new theme', 'admin want new theme ', 12000, '2022-04-03 11:32:35'),
(6, 80, 33, 25, 40, 'chatting', 'latest plugin add', 12000, '2022-04-04 16:20:04'),
(7, 80, 33, 25, 43, 'check', 'tessting', 1200, '2022-04-04 16:22:45'),
(8, 80, 33, 33, 44, 'last time', 'taking three weeks', 12000, '2022-04-04 16:25:13'),
(9, 80, 25, 33, 42, 'from me', 'testing', 12000, '2022-04-04 16:33:17');

-- --------------------------------------------------------

--
-- Table structure for table `emails`
--

CREATE TABLE `emails` (
  `e_id` int(11) NOT NULL,
  `crt_id` int(11) NOT NULL,
  `m_id` int(11) NOT NULL,
  `subject` text NOT NULL,
  `description` text NOT NULL,
  `category` int(11) NOT NULL,
  `file_path` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` text NOT NULL DEFAULT 'unseen'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `emails`
--

INSERT INTO `emails` (`e_id`, `crt_id`, `m_id`, `subject`, `description`, `category`, `file_path`, `date`, `status`) VALUES
(56, 14, 33, 'first mail from me', 'testing', 0, '', '2022-04-14 15:17:56', 'seen'),
(57, 14, 33, 'second', 'testing', 0, '', '2022-04-14 15:18:25', 'seen'),
(58, 14, 33, 'thurd', 'testing', 0, '', '2022-04-14 15:21:14', 'seen'),
(59, 33, 14, 'from member', 'testing', 1, '', '2022-04-14 15:23:41', 'seen'),
(60, 14, 33, 'fourth', 'testing', 0, '', '2022-04-14 15:24:53', 'seen'),
(61, 14, 33, 'fifth', 'testing', 0, '', '2022-04-14 15:26:50', 'seen'),
(62, 25, 14, 'from me member', 'testing', 1, '', '2022-04-14 15:28:28', 'seen'),
(63, 25, 33, 'from me member', 'testing', 0, '', '2022-04-14 15:28:28', 'seen'),
(64, 25, 14, 'one  more', 'sent', 1, '', '2022-04-14 15:29:09', 'seen'),
(65, 25, 33, 'one  more', 'sent', 0, '', '2022-04-14 15:29:09', 'seen'),
(66, 33, 14, 'testing', 'test', 1, '', '2022-04-14 15:51:00', 'seen'),
(67, 33, 14, 'testing again', 'again', 1, '', '2022-04-14 15:54:16', 'seen'),
(68, 14, 33, 'check', 'check', 0, 'files/1942397195DFM Major Project 2022_S2.docx', '2022-04-14 16:38:35', 'seen');

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `h_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `m_id` int(11) NOT NULL,
  `description` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`h_id`, `p_id`, `m_id`, `description`, `date`) VALUES
(1, 80, 33, 'add module', '2022-03-28 20:40:54'),
(2, 80, 33, 'made some changes in testing', '2022-03-29 14:58:43'),
(3, 80, 33, 'delete module seezer', '2022-03-29 16:36:13'),
(4, 80, 33, 'add schedule of module testing', '2022-03-29 18:16:03'),
(5, 80, 33, 'my way module replaced name by on way', '2022-03-30 16:08:30'),
(6, 80, 33, 'add module', '2022-03-31 20:59:42'),
(7, 80, 33, 'add module', '2022-03-31 20:59:57'),
(8, 80, 33, 'add module', '2022-03-31 21:00:52'),
(9, 80, 33, 'add module', '2022-03-31 21:01:19'),
(10, 80, 33, 'add module', '2022-03-31 21:03:39'),
(11, 80, 33, 'add module', '2022-03-31 21:05:32'),
(12, 80, 33, 'add module', '2022-03-31 21:07:40'),
(13, 80, 33, 'add module', '2022-03-31 21:09:29'),
(14, 80, 33, 'add module', '2022-03-31 21:11:50'),
(15, 80, 33, 'add module', '2022-03-31 21:13:19'),
(16, 80, 33, 'add module', '2022-03-31 21:15:47'),
(17, 80, 33, 'add module', '2022-03-31 21:18:43'),
(18, 80, 33, 'add module', '2022-03-31 21:37:23'),
(19, 80, 33, 'add module', '2022-03-31 21:38:10'),
(20, 80, 33, 'add module', '2022-03-31 21:47:27'),
(21, 80, 33, 'made some changes in module on way', '2022-03-31 22:02:41'),
(22, 80, 33, 'made some changes in module on way', '2022-03-31 22:03:15'),
(23, 80, 33, 'made some changes in module notify', '2022-04-01 09:41:41'),
(24, 80, 33, 'made some changes in module notify', '2022-04-01 09:42:05'),
(25, 80, 33, 'made some changes in module on way', '2022-04-01 17:00:23'),
(26, 80, 33, 'made some changes in module on way', '2022-04-01 17:01:19'),
(27, 80, 33, 'add module', '2022-04-01 17:09:46'),
(28, 80, 33, 'add module', '2022-04-01 17:10:20'),
(29, 80, 33, 'add cost of chat', '2022-04-01 18:50:50'),
(30, 80, 33, 'add cost of chatting', '2022-04-01 18:58:15'),
(31, 80, 33, 'delete cost chatting', '2022-04-01 21:08:23'),
(32, 80, 33, 'sadsad cost replaced name by ', '2022-04-01 21:53:04'),
(33, 80, 33, ' cost replaced name by sadsad', '2022-04-01 21:53:25'),
(34, 80, 33, 'sadsad cost replaced name by chatting', '2022-04-01 21:53:48'),
(35, 80, 33, 'add cost of ajmal', '2022-04-02 09:50:08'),
(36, 80, 33, 'ajmal cost replaced name by android senser', '2022-04-02 09:50:34'),
(37, 80, 33, 'add cost of notification system', '2022-04-02 10:26:20'),
(38, 80, 33, 'chatting cost replaced name by chatting system', '2022-04-02 10:32:50'),
(39, 80, 33, 'add cost of new theme', '2022-04-02 19:35:46'),
(40, 80, 33, 'made some changes in cost new theme', '2022-04-02 20:41:18'),
(41, 80, 33, 'add schedule of module new', '2022-04-03 17:15:52'),
(42, 80, 33, 'add module', '2022-04-03 18:58:07'),
(43, 80, 33, 'add schedule of module picachu', '2022-04-03 18:58:43'),
(44, 80, 33, 'add module', '2022-04-04 11:11:09'),
(45, 80, 33, 'delete module on way', '2022-04-04 11:32:53'),
(46, 80, 33, 'add schedule of module one again', '2022-04-04 11:39:11'),
(47, 80, 33, 'add schedule of module one more', '2022-04-04 11:52:55'),
(48, 80, 33, 'delete cost notification system', '2022-04-04 12:03:28'),
(49, 80, 25, 'add module', '2022-04-04 14:53:12'),
(50, 80, 33, 'add cost of chatting', '2022-04-04 16:20:04'),
(51, 80, 33, 'add cost of check', '2022-04-04 16:22:45'),
(52, 80, 33, 'add cost of last time', '2022-04-04 16:25:13'),
(53, 80, 25, 'add cost of from me', '2022-04-04 16:33:17'),
(54, 80, 25, 'add module', '2022-04-04 17:56:36'),
(55, 80, 33, 'add module', '2022-04-05 15:15:33'),
(56, 80, 33, 'add schedule of module keep', '2022-04-08 10:49:09'),
(57, 80, 33, 'add module', '2022-04-12 17:51:58'),
(58, 80, 33, 'add schedule of module include', '2022-04-12 17:52:36'),
(59, 80, 33, 'add schedule of module tessting again', '2022-04-12 17:54:21'),
(60, 80, 33, 'add schedule of module make test', '2022-04-12 17:54:46'),
(61, 80, 33, 'add schedule of module asdas', '2022-04-12 17:55:16'),
(62, 84, 25, 'add module', '2022-04-15 07:06:27'),
(63, 84, 33, 'add module', '2022-04-21 19:18:00'),
(64, 84, 33, 'made some changes in module new ', '2022-04-21 19:36:02'),
(65, 84, 33, 'made some changes in module new ', '2022-04-21 19:37:17'),
(66, 84, 33, 'made some changes in module new ', '2022-04-21 19:37:56'),
(67, 80, 33, 'add schedule of module kan', '2022-04-22 20:30:25'),
(68, 80, 33, 'add schedule of module kan', '2022-04-22 20:40:12'),
(69, 80, 33, 'add schedule of module kan', '2022-04-22 20:40:23');

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `l_id` int(11) NOT NULL,
  `m_id` int(11) NOT NULL,
  `l_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`l_id`, `m_id`, `l_name`) VALUES
(1, 12, 'JAVA'),
(2, 12, 'JAVA'),
(6, 16, 'JAVA'),
(7, 16, 'PHP'),
(26, 18, 'KOTLIN'),
(27, 18, 'KOTLIN'),
(28, 18, 'KOTLIN'),
(29, 21, 'KOTLIN'),
(30, 21, 'JAVA'),
(31, 21, ''),
(32, 21, ''),
(36, 21, 'KOTLIN'),
(37, 21, 'PHP'),
(38, 21, 'KOTLIN'),
(39, 21, 'PHP'),
(40, 21, ''),
(41, 21, ''),
(42, 21, ''),
(45, 21, 'KOTLIN'),
(46, 21, 'KOTLIN'),
(47, 21, ''),
(48, 21, ''),
(52, 21, 'PHP'),
(53, 21, 'JAVA'),
(54, 21, 'PHP'),
(55, 21, ''),
(56, 21, ''),
(59, 21, 'PHP'),
(60, 21, 'JAVA'),
(61, 21, 'PHP'),
(62, 21, 'JAVA'),
(63, 21, ''),
(66, 21, 'PHP'),
(67, 21, 'JAVA'),
(68, 21, 'KOTLIN'),
(69, 21, 'PHP'),
(70, 21, 'JAVA'),
(71, 21, 'KOTLIN'),
(72, 21, 'KOTLIN'),
(73, 21, 'PHP'),
(74, 21, 'JAVA'),
(75, 21, 'KOTLIN'),
(76, 21, ''),
(77, 21, 'PHP'),
(78, 21, 'JAVA'),
(79, 21, ''),
(80, 21, ''),
(81, 21, ''),
(85, 21, 'PHP'),
(86, 21, 'KOTLIN'),
(87, 21, ''),
(88, 21, ''),
(89, 21, ''),
(93, 21, 'KOTLIN'),
(94, 21, 'JAVA'),
(97, 21, 'KOTLIN'),
(98, 21, 'JAVA'),
(99, 21, 'JAVA'),
(100, 21, 'PHP'),
(101, 21, 'KOTLIN'),
(102, 21, ''),
(103, 21, ''),
(104, 21, ''),
(105, 21, ''),
(109, 21, 'KOTLIN'),
(110, 21, 'PHP'),
(111, 21, 'JAVA'),
(112, 21, 'KOTLIN'),
(113, 21, ''),
(114, 21, ''),
(115, 21, ''),
(118, 21, 'KOTLIN'),
(119, 21, 'PHP'),
(120, 21, 'KOTLIN'),
(121, 21, 'PHP'),
(122, 21, ''),
(125, 21, 'KOTLIN'),
(126, 21, 'PHP'),
(127, 21, 'JAVA'),
(128, 21, 'KOTLIN'),
(129, 21, 'PHP'),
(130, 21, ''),
(131, 21, ''),
(132, 21, 'KOTLIN'),
(133, 21, ''),
(136, 21, 'KOTLIN'),
(137, 21, 'PHP'),
(146, 13, 'JAVA'),
(147, 26, 'PHP'),
(148, 30, 'PHP'),
(149, 31, 'JAVA'),
(150, 31, 'PHP'),
(151, 32, 'JAVA'),
(152, 32, 'KOTLIN'),
(153, 20, 'KOTLIN'),
(154, 20, 'PHP'),
(155, 33, 'JAVA');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `m_id` int(11) NOT NULL,
  `f_name` text NOT NULL,
  `l_name` text NOT NULL,
  `reg_no` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `designation` text NOT NULL,
  `speciality` text NOT NULL,
  `img_path` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`m_id`, `f_name`, `l_name`, `reg_no`, `email`, `password`, `designation`, `speciality`, `img_path`, `date`) VALUES
(20, 'abdullah', 'talat', '', '6znBzwaleedtahir@plcm.com', 'TBWh4bEatS', 'BS', 'Mobile app Development', 'images/1052915969WhatsApp Image 2021-11-21 at 5.11.16 AM.jpeg', '2021-12-19 04:43:26'),
(25, 'sharjeel ', 'wakeel', '', 'JlPs9sharjeelwakeel@plcm.com', 'uRnkINFprI', 'BS', 'Web Development', 'images/144877969798341558_279333590123740_5835491160776245248_n.jpg', '2022-04-04 14:47:42'),
(26, 'new', 'new', '', 'ZLhPInewnew@plcm.com', 'gdEpXu3hzd', 'MS', 'Web Development', 'images/728574595sharjeel linkedin-02.png', '2022-01-17 08:00:00'),
(27, 'abdullah', 'talat', '', '6znBzwaleedtahir@plcm.com', 'TBWh4bEatS', 'BS', 'Mobile app Development', 'images/1052915969WhatsApp Image 2021-11-21 at 5.11.16 AM.jpeg', '2021-12-19 04:43:26'),
(30, 'abdul', 'moiz', '18-arid-2593', 'qNxG6abdulmoiz@plcm.com', '9jVlMvqyPq', 'BS', 'Mobile app Development', 'images/166252359class_diagram_final.png', '2022-01-17 08:00:00'),
(33, 'zeeshan', 'nawaz', '18-arid-2731', 'W7BLOzeeshannawaz@plcm.com', 'pUYap5rWvZ', 'BS', 'Mobile app Development', 'images/439542088kids-mark-protective-no-entry-without-face-mask-wear-mask-icon-yes-no-sign_83111-1744.jpg', '2022-02-01 19:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `module`
--

CREATE TABLE `module` (
  `mod_id` int(11) NOT NULL,
  `create_id` int(11) NOT NULL,
  `assign_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `subject` text NOT NULL,
  `status` text NOT NULL,
  `priority` text NOT NULL,
  `type` text NOT NULL,
  `m_file_path` text DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `module`
--

INSERT INTO `module` (`mod_id`, `create_id`, `assign_id`, `p_id`, `subject`, `status`, `priority`, `type`, `m_file_path`, `date`) VALUES
(23, 33, 33, 80, 'notify', 'In progress', 'Normal', 'Task', 'files/2002014441Assignment no 2.docx', '2022-04-01 09:42:05'),
(24, 33, 33, 71, 'new', 'Schedule', 'Normal', 'Milestone', '', '2022-03-27 16:39:01'),
(25, 33, 25, 80, 'testing', 'To be schedule', 'Low', 'Task', '', '2022-03-27 21:07:15'),
(26, 33, 25, 80, 'new', 'To be schedule', 'Low', 'Task', '', '2022-03-27 21:11:33'),
(27, 33, 33, 80, 'one again', 'To be schedule', 'Low', 'Milestone', '', '2022-03-28 20:40:02'),
(28, 33, 33, 80, 'one more', 'Schedule', 'Low', 'Milestone', '', '2022-03-28 20:40:54'),
(29, 33, 25, 80, 'keep', 'Schedule', 'Low', 'Task', 'files/1412343346IMG_3252.JPG', '2022-03-31 20:59:42'),
(33, 33, 33, 80, 'make test', 'Schedule', 'Low', 'Phase', 'files/696006479', '2022-03-31 21:03:39'),
(34, 33, 25, 80, 'test again', 'To be schedule', 'Low', 'Milestone', 'files/32006009', '2022-03-31 21:05:32'),
(35, 33, 33, 80, 'asdas', 'To be schedule', 'Low', 'Milestone', 'files/187328966', '2022-03-31 21:07:40'),
(36, 33, 33, 80, 'no way', 'To be schedule', 'Normal', 'Milestone', 'files/1355337180', '2022-03-31 21:09:29'),
(37, 33, 25, 80, 'kan', 'Schedule', 'Low', 'Milestone', 'files/1238213762', '2022-03-31 21:11:50'),
(38, 33, 33, 80, 'sls', 'Schedule', 'Low', 'Task', 'files/419769686', '2022-03-31 21:13:19'),
(39, 33, 33, 80, 'sdsdSD', 'In progress', 'Normal', 'Task', 'files/216149984', '2022-03-31 21:15:47'),
(40, 33, 33, 80, 'data', 'Schedule', 'Normal', 'Milestone', NULL, '2022-03-31 21:18:43'),
(41, 33, 25, 80, 'testing', 'On hold', 'Normal', 'Milestone', 'files/149160546698341558_279333590123740_5835491160776245248_n.jpg', '2022-03-31 21:37:23'),
(42, 33, 25, 80, 'last', 'Schedule', 'Low', 'Task', NULL, '2022-03-31 21:38:10'),
(43, 33, 33, 80, 'seezer', 'To be schedule', 'Low', 'Task', 'files/964807140sharjeel linkedin-02.png', '2022-03-31 21:47:27'),
(44, 33, 33, 80, 'first', 'To be schedule', 'Low', 'Task', 'files/92925525SQLite Task.docx', '2022-04-01 17:09:46'),
(45, 33, 33, 80, 'sdsdSD', 'Schedule', 'Normal', 'Task', NULL, '2022-04-01 17:10:20'),
(46, 33, 25, 80, 'picachu', 'Schedule', 'Low', 'Task', NULL, '2022-04-03 18:58:07'),
(47, 33, 33, 80, 'new one', 'Schedule', 'Low', 'Task', NULL, '2022-04-04 11:11:09'),
(48, 25, 33, 80, 'from me', 'Schedule', 'Normal', 'Task', NULL, '2022-04-04 14:53:12'),
(49, 25, 33, 80, 'tessting again', 'To be schedule', 'Low', 'Milestone', NULL, '2022-04-04 17:56:36'),
(50, 33, 33, 80, 'no way', 'Schedule', 'Normal', 'Task', NULL, '2022-04-05 15:15:33'),
(51, 33, 33, 80, 'include', 'Schedule', 'Low', 'Task', NULL, '2022-04-12 17:51:58'),
(52, 25, 25, 84, 'documtatin', 'Schedule', 'Low', 'Task', 'files/1110111129abdullah send.docx', '2022-04-15 07:16:19'),
(53, 33, 25, 84, 'new ', 'On hold', 'High', 'Milestone', NULL, '2022-04-21 19:37:17');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `n_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `u_category` text NOT NULL,
  `link_page` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` text NOT NULL DEFAULT 'unseen'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`n_id`, `p_id`, `c_id`, `u_id`, `name`, `description`, `u_category`, `link_page`, `date`, `status`) VALUES
(81, 71, 33, 14, 'new', 'add module in', 'admin', '', '2022-03-27 16:39:01', 'seen'),
(82, 71, 33, 33, 'new', 'add module in', 'member', '', '2022-03-27 16:39:01', 'seen'),
(83, 71, 14, 33, 'new', 'add module in', 'admin', '', '2022-04-27 16:39:01', 'seen'),
(84, 71, 20, 33, 'new', 'add module in', 'member', '', '2022-05-27 16:39:01', 'seen'),
(85, 71, 25, 33, 'new', 'add module in', 'member', '', '2022-06-27 16:39:01', 'seen'),
(86, 71, 25, 33, 'new', 'add module in', 'member', '', '2022-07-27 16:39:01', 'seen'),
(87, 71, 25, 33, 'clone', 'add module in', 'member', '', '2022-08-27 16:39:01', 'seen'),
(88, 71, 25, 33, 'clone', 'add module in', 'member', '', '2022-09-27 16:39:01', 'seen'),
(89, 71, 25, 33, 'clone', 'add module in', 'member', '', '2022-10-27 16:39:01', 'seen'),
(90, 71, 25, 33, 'clone', 'add module in', 'member', '', '2022-11-27 17:39:01', 'seen'),
(91, 71, 25, 33, 'clone', 'add module in', 'member', '', '2022-12-27 17:39:01', 'seen'),
(92, 71, 25, 33, 'clone', 'add module in', 'member', '', '2023-01-27 17:39:01', 'seen'),
(93, 71, 25, 33, 'clone', 'add module in', 'member', '', '2023-02-27 17:39:01', 'seen'),
(94, 71, 25, 33, 'clone', 'add module in', 'member', '', '2023-03-27 16:39:01', 'seen'),
(95, 71, 25, 33, 'clone', 'add module in', 'member', '', '2023-04-27 16:39:01', 'seen'),
(96, 71, 25, 33, 'clone', 'add module in', 'member', '', '2023-05-27 16:39:01', 'seen'),
(97, 71, 25, 33, 'clone', 'add module in', 'member', '', '2023-06-27 16:39:01', 'seen'),
(98, 71, 25, 33, 'clone', 'add module in', 'member', '', '2023-07-27 16:39:01', 'seen'),
(99, 71, 25, 33, 'clone', 'add module in', 'member', '', '2023-08-27 16:39:01', 'seen'),
(100, 71, 20, 33, 'clone not', 'add module in', 'member', '', '2023-09-27 16:39:01', 'seen'),
(102, 71, 33, 14, 'new', 'add module in', 'admin', '', '2022-04-27 16:39:01', 'seen'),
(103, 71, 33, 14, 'new', 'add module in', 'admin', '', '2022-05-27 16:39:01', 'seen'),
(104, 71, 33, 14, 'new', 'add module in', 'admin', '', '2022-06-27 16:39:01', 'seen'),
(105, 71, 33, 14, 'new', 'add module in', 'admin', '', '2022-07-27 16:39:01', 'seen'),
(106, 71, 33, 14, 'new', 'add module in', 'admin', '', '2022-08-27 16:39:01', 'seen'),
(109, 51, 0, 33, 'assign', 'assign project ', 'admin', '', '2022-03-27 20:54:58', 'seen'),
(111, 80, 33, 14, 'new', 'add module in', 'admin', '', '2022-03-27 21:11:33', 'seen'),
(112, 80, 33, 25, 'new', 'add module in', 'member', '', '2022-03-27 21:11:33', 'seen'),
(113, 68, 14, 33, 'assign', 'assign project ', 'admin', '', '2022-03-27 21:14:57', 'seen'),
(114, 80, 33, 14, ' ', 'made some changes intesting', 'admin', '', '2022-03-28 11:18:35', 'seen'),
(116, 80, 33, 25, ' ', 'made some changes intesting', 'member', '', '2022-03-28 11:19:30', 'seen'),
(117, 80, 33, 14, ' ', 'chatting replaced name by chat', 'admin', '', '2022-03-28 11:21:22', 'seen'),
(118, 80, 33, 25, ' ', 'chatting replaced name by chat', 'member', '', '2022-03-28 11:21:22', 'seen'),
(119, 80, 33, 14, 'one again', 'add module in', 'admin', '', '2022-03-28 20:40:02', 'seen'),
(120, 80, 33, 25, 'one again', 'add module in', 'member', '', '2022-03-28 20:40:02', 'seen'),
(121, 80, 33, 14, 'one more', 'add module in', 'admin', '', '2022-03-28 20:40:54', 'seen'),
(122, 80, 33, 25, 'one more', 'add module in', 'member', '', '2022-03-28 20:40:54', 'seen'),
(123, 80, 33, 14, ' ', 'made some changes intesting', 'admin', '', '2022-03-29 14:58:43', 'seen'),
(124, 80, 33, 25, ' ', 'made some changes intesting', 'member', '', '2022-03-29 14:58:43', 'seen'),
(125, 80, 33, 14, ' ', 'delete modulechat in', 'admin', '', '2022-03-29 16:31:13', 'seen'),
(126, 80, 33, 25, ' ', 'delete module chat in', 'member', '', '2022-03-29 16:31:13', 'seen'),
(127, 80, 33, 14, ' ', 'delete module seezer in', 'admin', '', '2022-03-29 16:36:13', 'seen'),
(128, 80, 33, 25, ' ', 'delete module seezer in', 'member', '', '2022-03-29 16:36:13', 'seen'),
(129, 80, 33, 14, ' ', 'add schedule of module testing in', 'admin', '', '2022-03-29 18:16:03', 'seen'),
(130, 80, 33, 25, ' ', 'add schedule of module testing in', 'member', '', '2022-03-29 18:16:03', 'seen'),
(131, 80, 33, 14, ' ', 'my way module replaced name by on way', 'admin', '', '2022-03-30 16:08:30', 'seen'),
(132, 80, 33, 25, ' ', 'my way module replaced name by on way', 'member', '', '2022-03-30 16:08:30', 'unseen'),
(133, 80, 33, 14, 'keep', 'add module in', 'admin', '', '2022-03-31 21:01:19', 'unseen'),
(134, 80, 33, 25, 'keep', 'add module in', 'member', '', '2022-03-31 21:01:19', 'unseen'),
(135, 80, 33, 14, 'make test', 'add module in', 'admin', '', '2022-03-31 21:03:39', 'unseen'),
(136, 80, 33, 25, 'make test', 'add module in', 'member', '', '2022-03-31 21:03:39', 'unseen'),
(137, 80, 33, 14, 'test again', 'add module in', 'admin', '', '2022-03-31 21:05:32', 'unseen'),
(138, 80, 33, 25, 'test again', 'add module in', 'member', '', '2022-03-31 21:05:32', 'unseen'),
(139, 80, 33, 14, 'asdas', 'add module in', 'admin', '', '2022-03-31 21:07:40', 'unseen'),
(140, 80, 33, 25, 'asdas', 'add module in', 'member', '', '2022-03-31 21:07:40', 'unseen'),
(141, 80, 33, 14, 'no way', 'add module in', 'admin', '', '2022-03-31 21:09:29', 'unseen'),
(142, 80, 33, 25, 'no way', 'add module in', 'member', '', '2022-03-31 21:09:29', 'unseen'),
(143, 80, 33, 14, 'kan', 'add module in', 'admin', '', '2022-03-31 21:11:50', 'unseen'),
(144, 80, 33, 25, 'kan', 'add module in', 'member', '', '2022-03-31 21:11:50', 'unseen'),
(145, 80, 33, 14, 'sls', 'add module in', 'admin', '', '2022-03-31 21:13:19', 'unseen'),
(146, 80, 33, 25, 'sls', 'add module in', 'member', '', '2022-03-31 21:13:19', 'unseen'),
(147, 80, 33, 14, 'sdsdSD', 'add module in', 'admin', '', '2022-03-31 21:15:47', 'unseen'),
(148, 80, 33, 25, 'sdsdSD', 'add module in', 'member', '', '2022-03-31 21:15:47', 'unseen'),
(149, 80, 33, 14, 'data', 'add module in', 'admin', '', '2022-03-31 21:18:43', 'unseen'),
(150, 80, 33, 25, 'data', 'add module in', 'member', '', '2022-03-31 21:18:43', 'unseen'),
(151, 80, 33, 14, 'testing', 'add module in', 'admin', '', '2022-03-31 21:37:23', 'unseen'),
(152, 80, 33, 25, 'testing', 'add module in', 'member', '', '2022-03-31 21:37:23', 'unseen'),
(153, 80, 33, 14, 'last', 'add module in', 'admin', '', '2022-03-31 21:38:10', 'unseen'),
(154, 80, 33, 25, 'last', 'add module in', 'member', '', '2022-03-31 21:38:10', 'unseen'),
(155, 80, 33, 14, 'seezer', 'add module in', 'admin', '', '2022-03-31 21:47:27', 'unseen'),
(156, 80, 33, 25, 'seezer', 'add module in', 'member', '', '2022-03-31 21:47:27', 'unseen'),
(157, 80, 33, 14, ' ', 'made some changes in module on way', 'admin', '', '2022-03-31 22:02:41', 'unseen'),
(158, 80, 33, 25, ' ', 'made some changes in module on way', 'member', '', '2022-03-31 22:02:41', 'unseen'),
(159, 80, 33, 14, ' ', 'made some changes in module on way', 'admin', '', '2022-03-31 22:03:15', 'unseen'),
(160, 80, 33, 25, ' ', 'made some changes in module on way', 'member', '', '2022-03-31 22:03:15', 'unseen'),
(161, 80, 33, 14, ' ', 'made some changes in module notify', 'admin', '', '2022-04-01 09:41:41', 'unseen'),
(162, 80, 33, 25, ' ', 'made some changes in module notify', 'member', '', '2022-04-01 09:41:41', 'unseen'),
(163, 80, 33, 14, ' ', 'made some changes in module notify', 'admin', '', '2022-04-01 09:42:05', 'unseen'),
(164, 80, 33, 25, ' ', 'made some changes in module notify', 'member', '', '2022-04-01 09:42:05', 'unseen'),
(165, 80, 33, 14, ' ', 'made some changes in module on way', 'admin', '', '2022-04-01 17:00:23', 'unseen'),
(166, 80, 33, 25, ' ', 'made some changes in module on way', 'member', '', '2022-04-01 17:00:23', 'unseen'),
(167, 80, 33, 14, ' ', 'made some changes in module on way', 'admin', '', '2022-04-01 17:01:19', 'unseen'),
(168, 80, 33, 25, ' ', 'made some changes in module on way', 'member', '', '2022-04-01 17:01:19', 'unseen'),
(169, 80, 33, 14, 'first', 'add module in', 'admin', '', '2022-04-01 17:09:46', 'unseen'),
(170, 80, 33, 25, 'first', 'add module in', 'member', '', '2022-04-01 17:09:46', 'unseen'),
(171, 80, 33, 14, 'sdsdSD', 'add module in', 'admin', '', '2022-04-01 17:10:20', 'unseen'),
(172, 80, 33, 25, 'sdsdSD', 'add module in', 'member', '', '2022-04-01 17:10:20', 'unseen'),
(173, 80, 33, 14, '', 'add cost of chat in', 'admin', '', '2022-04-01 18:50:50', 'unseen'),
(174, 80, 33, 25, '', 'add cost of chat in', 'member', '', '2022-04-01 18:50:50', 'unseen'),
(175, 80, 33, 14, '', 'add cost of chatting in', 'admin', '', '2022-04-01 18:58:17', 'unseen'),
(176, 80, 33, 25, '', 'add cost of chatting in', 'member', '', '2022-04-01 18:58:17', 'unseen'),
(177, 80, 33, 14, ' ', 'delete module chatting in', 'admin', '', '2022-04-01 21:08:23', 'unseen'),
(178, 80, 33, 25, ' ', 'delete module chatting in', 'member', '', '2022-04-01 21:08:23', 'unseen'),
(179, 80, 33, 14, ' ', 'sadsad cost replaced name by ', 'admin', '', '2022-04-01 21:53:04', 'unseen'),
(180, 80, 33, 25, ' ', 'sadsad cost replaced name by ', 'member', '', '2022-04-01 21:53:04', 'unseen'),
(181, 80, 33, 14, ' ', ' cost replaced name by sadsad', 'admin', '', '2022-04-01 21:53:25', 'unseen'),
(182, 80, 33, 25, ' ', ' cost replaced name by sadsad', 'member', '', '2022-04-01 21:53:25', 'unseen'),
(183, 80, 33, 14, ' ', 'sadsad cost replaced name by chatting', 'admin', '', '2022-04-01 21:53:48', 'unseen'),
(184, 80, 33, 25, ' ', 'sadsad cost replaced name by chatting', 'member', '', '2022-04-01 21:53:48', 'unseen'),
(185, 80, 33, 14, '', 'add cost of ajmal in', 'admin', '', '2022-04-02 09:50:08', 'unseen'),
(186, 80, 33, 25, '', 'add cost of ajmal in', 'member', '', '2022-04-02 09:50:08', 'unseen'),
(187, 80, 33, 14, ' ', 'ajmal cost replaced name by android senser', 'admin', '', '2022-04-02 09:50:34', 'unseen'),
(188, 80, 33, 25, ' ', 'ajmal cost replaced name by android senser', 'member', '', '2022-04-02 09:50:34', 'unseen'),
(189, 80, 33, 14, '', 'add cost of notification system in', 'admin', '', '2022-04-02 10:26:20', 'unseen'),
(190, 80, 33, 25, '', 'add cost of notification system in', 'member', '', '2022-04-02 10:26:20', 'unseen'),
(191, 80, 33, 14, ' ', 'chatting cost replaced name by chatting system', 'admin', '', '2022-04-02 10:32:50', 'unseen'),
(192, 80, 33, 25, ' ', 'chatting cost replaced name by chatting system', 'member', '', '2022-04-02 10:32:50', 'unseen'),
(193, 80, 33, 14, '', 'add cost of new theme in', 'admin', '', '2022-04-02 19:35:46', 'unseen'),
(194, 80, 33, 25, '', 'add cost of new theme in', 'member', '', '2022-04-02 19:35:46', 'unseen'),
(195, 80, 33, 14, ' ', 'made some changes in cost new theme', 'admin', '', '2022-04-02 20:41:18', 'unseen'),
(196, 80, 33, 25, ' ', 'made some changes in cost new theme', 'member', '', '2022-04-02 20:41:18', 'unseen'),
(197, 80, 33, 14, ' ', 'add schedule of module new in', 'admin', '', '2022-04-03 17:15:52', 'unseen'),
(198, 80, 33, 25, ' ', 'add schedule of module new in', 'member', '', '2022-04-03 17:15:52', 'unseen'),
(199, 80, 33, 14, 'picachu', 'add module in', 'admin', '', '2022-04-03 18:58:07', 'seen'),
(200, 80, 33, 25, 'picachu', 'add module in', 'member', '', '2022-04-03 18:58:07', 'unseen'),
(201, 80, 33, 14, ' ', 'add schedule of module picachu in', 'admin', '', '2022-04-03 18:58:43', 'unseen'),
(202, 80, 33, 25, ' ', 'add schedule of module picachu in', 'member', '', '2022-04-03 18:58:43', 'unseen'),
(203, 80, 33, 14, 'new one', 'add module in', 'admin', 'work_packages.php?', '2022-04-04 11:11:09', 'seen'),
(204, 80, 33, 25, 'new one', 'add module in', 'member', 'work_packages.php', '2022-04-04 11:11:09', 'seen'),
(205, 62, 14, 33, 'assign', 'assign project ', 'admin', 'detail_project.php?', '2022-04-04 11:26:02', 'seen'),
(206, 80, 33, 14, ' ', 'delete module on way in', 'admin', 'work_packages.php?', '2022-04-04 11:32:53', 'seen'),
(207, 80, 33, 25, ' ', 'delete module on way in', 'member', 'work_packages.php', '2022-04-04 11:32:53', 'seen'),
(208, 80, 33, 14, ' ', 'add schedule of module one again in', 'admin', 'c_detail.php?', '2022-04-04 11:39:11', 'seen'),
(209, 80, 33, 25, ' ', 'add schedule of module one again in', 'member', 'add_schedule.php', '2022-04-04 11:39:11', 'seen'),
(210, 80, 33, 14, ' ', 'add schedule of module one more in', 'admin', 'c_detail.php?mod_id=28&&', '2022-04-04 11:52:55', 'seen'),
(211, 80, 33, 25, ' ', 'add schedule of module one more in', 'member', 'add_schedule.php', '2022-04-04 11:52:55', 'seen'),
(212, 80, 33, 14, ' ', 'delete module notification system in', 'admin', 'cost_analysis.php?', '2022-04-04 12:03:28', 'seen'),
(213, 80, 33, 25, ' ', 'delete module notification system in', 'member', 'add_cost.php', '2022-04-04 12:03:28', 'seen'),
(214, 80, 25, 14, 'from me', 'add module in', 'admin', 'work_packages.php?', '2022-04-04 14:53:12', 'seen'),
(215, 80, 25, 33, 'from me', 'add module in', 'member', 'work_packages.php', '2022-04-04 14:53:12', 'seen'),
(216, 80, 33, 14, '', 'add cost of chatting in', 'admin', 'cost_analysis.php?', '2022-04-04 16:20:04', 'seen'),
(217, 80, 33, 25, '', 'add cost of chatting in', 'member', 'add_cost.php', '2022-04-04 16:20:04', 'seen'),
(218, 80, 33, 14, '', 'add cost of check in', 'admin', 'cost_analysis.php?', '2022-04-04 16:22:45', 'seen'),
(219, 80, 33, 25, '', 'add cost of check in', 'member', 'add_cost.php', '2022-04-04 16:22:45', 'seen'),
(220, 80, 33, 14, '', 'add cost of last time in', 'admin', 'cost_analysis.php?', '2022-04-04 16:25:13', 'seen'),
(221, 80, 33, 25, '', 'add cost of last time in', 'member', 'add_cost.php', '2022-04-04 16:25:13', 'seen'),
(222, 80, 25, 14, '', 'add cost of from me in', 'admin', 'cost_analysis.php?', '2022-04-04 16:33:17', 'seen'),
(223, 80, 25, 33, '', 'add cost of from me in', 'member', 'add_cost.php', '2022-04-04 16:33:17', 'seen'),
(224, 80, 25, 14, 'tessting again', 'add module in', 'admin', 'work_packages.php?', '2022-04-04 17:56:37', 'seen'),
(225, 80, 25, 33, 'tessting again', 'add module in', 'member', 'work_packages.php', '2022-04-04 17:56:37', 'seen'),
(226, 80, 33, 14, 'no way', 'add module in', 'admin', 'work_packages.php?', '2022-04-05 15:15:33', 'seen'),
(227, 80, 33, 25, 'no way', 'add module in', 'member', 'work_packages.php', '2022-04-05 15:15:33', 'seen'),
(228, 80, 33, 14, ' ', 'add schedule of module keep in', 'admin', 'c_detail.php?mod_id=29&&', '2022-04-08 10:49:09', 'seen'),
(229, 80, 33, 25, ' ', 'add schedule of module keep in', 'member', 'add_schedule.php', '2022-04-08 10:49:09', 'seen'),
(230, 80, 33, 14, 'include', 'add module in', 'admin', 'work_packages.php?', '2022-04-12 17:51:58', 'unseen'),
(231, 80, 33, 25, 'include', 'add module in', 'member', 'work_packages.php', '2022-04-12 17:51:58', 'seen'),
(232, 80, 33, 14, ' ', 'add schedule of module include in', 'admin', 'c_detail.php?mod_id=51&&', '2022-04-12 17:52:36', 'unseen'),
(233, 80, 33, 25, ' ', 'add schedule of module include in', 'member', 'add_schedule.php', '2022-04-12 17:52:36', 'seen'),
(234, 80, 33, 14, ' ', 'add schedule of module tessting again in', 'admin', 'c_detail.php?mod_id=49&&', '2022-04-12 17:54:21', 'unseen'),
(235, 80, 33, 25, ' ', 'add schedule of module tessting again in', 'member', 'add_schedule.php', '2022-04-12 17:54:21', 'seen'),
(236, 80, 33, 14, ' ', 'add schedule of module make test in', 'admin', 'c_detail.php?mod_id=33&&', '2022-04-12 17:54:46', 'unseen'),
(237, 80, 33, 25, ' ', 'add schedule of module make test in', 'member', 'add_schedule.php', '2022-04-12 17:54:46', 'seen'),
(238, 80, 33, 14, ' ', 'add schedule of module asdas in', 'admin', 'c_detail.php?mod_id=35&&', '2022-04-12 17:55:16', 'unseen'),
(239, 80, 33, 25, ' ', 'add schedule of module asdas in', 'member', 'add_schedule.php', '2022-04-12 17:55:16', 'seen'),
(240, 83, 14, 25, 'assign', 'assign project ', 'admin', 'detail_project.php', '2022-04-12 18:59:26', 'seen'),
(241, 84, 14, 25, 'assign', 'assign project ', 'admin', 'detail_project.php', '2022-04-15 07:02:40', 'seen'),
(242, 84, 25, 14, 'documtatin', 'add module in', 'admin', 'work_packages.php?', '2022-04-15 07:06:27', 'seen'),
(243, 84, 14, 33, 'assign', 'assign project ', 'admin', 'detail_project.php', '2022-04-15 07:08:19', 'seen'),
(244, 84, 25, 33, ' ', 'made some changes in module documtatin', 'member', '', '2022-04-15 07:16:19', 'unseen'),
(245, 84, 33, 14, 'new ', 'add module in', 'admin', 'work_packages.php?', '2022-04-21 19:18:01', 'unseen'),
(246, 84, 33, 25, 'new ', 'add module in', 'member', 'work_packages.php', '2022-04-21 19:18:01', 'seen'),
(247, 84, 33, 25, ' ', 'made some changes in module new ', 'member', '', '2022-04-21 19:19:02', 'seen'),
(248, 84, 33, 14, ' ', 'made some changes in module new ', 'admin', 'work_packages.php', '2022-04-21 19:33:41', 'unseen'),
(249, 84, 33, 25, ' ', 'made some changes in module new ', 'member', 'work_packages.php', '2022-04-21 19:33:41', 'seen'),
(250, 84, 33, 14, ' ', 'made some changes in module new ', 'admin', 'work_packages.php', '2022-04-21 19:36:02', 'unseen'),
(251, 84, 33, 25, ' ', 'made some changes in module new ', 'member', 'work_packages.php', '2022-04-21 19:36:02', 'unseen'),
(252, 84, 33, 14, ' ', 'made some changes in module new ', 'admin', 'work_packages.php', '2022-04-21 19:37:17', 'unseen'),
(253, 84, 33, 25, ' ', 'made some changes in module new ', 'member', 'work_packages.php', '2022-04-21 19:37:17', 'unseen'),
(254, 80, 33, 14, ' ', 'add schedule of module kan in', 'admin', 'c_detail.php?mod_id=37&&', '2022-04-22 20:30:25', 'unseen'),
(255, 80, 33, 25, ' ', 'add schedule of module kan in', 'member', 'add_schedule.php', '2022-04-22 20:30:25', 'unseen'),
(256, 80, 33, 14, ' ', 'add schedule of module kan in', 'admin', 'c_detail.php?mod_id=37&&', '2022-04-22 20:40:12', 'unseen'),
(257, 80, 33, 25, ' ', 'add schedule of module kan in', 'member', 'add_schedule.php', '2022-04-22 20:40:12', 'unseen'),
(258, 80, 33, 14, ' ', 'add schedule of module kan in', 'admin', 'c_detail.php?mod_id=37&&', '2022-04-22 20:40:23', 'unseen'),
(259, 80, 33, 25, ' ', 'add schedule of module kan in', 'member', 'add_schedule.php', '2022-04-22 20:40:23', 'unseen');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `p_id` int(11) NOT NULL,
  `p_title` text NOT NULL,
  `p_category` text NOT NULL,
  `p_problem` text NOT NULL,
  `p_description` text NOT NULL,
  `file_path` text NOT NULL,
  `a_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`p_id`, `p_title`, `p_category`, `p_problem`, `p_description`, `file_path`, `a_id`) VALUES
(51, 'peak days', 'website', 'solving big ', 'PHAgc3R5bGU9Im1hcmdpbjogMC41ZW0gMHB4OyB1c2VyLXNlbGVjdDogYXV0bzsgY29sb3I6ICMyMDIxMjI7IGZvbnQtZmFtaWx5OiBzYW5zLXNlcmlmOyBmb250LXNpemU6IDE0cHg7IGJhY2tncm91bmQtY29sb3I6ICNmZmZmZmY7Ij4mbmJzcDs8L3A+DQo8cCBzdHlsZT0ibWFyZ2luOiAwLjVlbSAwcHg7IHVzZXItc2VsZWN0OiBhdXRvOyBjb2xvcjogIzIwMjEyMjsgZm9udC1mYW1pbHk6IHNhbnMtc2VyaWY7IGZvbnQtc2l6ZTogMTRweDsgYmFja2dyb3VuZC1jb2xvcjogI2ZmZmZmZjsiPlRoZSBlbWVyZ2VuY2UgYW5kIGdyb3d0aCBvZiBibG9ncyBpbiB0aGUgbGF0ZSAxOTkwcyBjb2luY2lkZWQgd2l0aCB0aGUgYWR2ZW50IG9mIHdlYiBwdWJsaXNoaW5nIHRvb2xzIHRoYXQgZmFjaWxpdGF0ZWQgdGhlIHBvc3Rpbmcgb2YgY29udGVudCBieSBub24tdGVjaG5pY2FsIHVzZXJzIHdobyBkaWQgbm90IGhhdmUgbXVjaCBleHBlcmllbmNlIHdpdGgmbmJzcDs8YSBzdHlsZT0idGV4dC1kZWNvcmF0aW9uLWxpbmU6IG5vbmU7IGNvbG9yOiAjMDY0NWFkOyBiYWNrZ3JvdW5kOiBub25lOyB1c2VyLXNlbGVjdDogYXV0bzsiIHRpdGxlPSJIVE1MIiBocmVmPSJodHRwczovL2VuLndpa2lwZWRpYS5vcmcvd2lraS9IVE1MIj5IVE1MPC9hPiZuYnNwO29yJm5ic3A7PGEgc3R5bGU9InRleHQtZGVjb3JhdGlvbi1saW5lOiBub25lOyBjb2xvcjogIzA2NDVhZDsgYmFja2dyb3VuZDogbm9uZTsgdXNlci1zZWxlY3Q6IGF1dG87IiB0aXRsZT0iQ29tcHV0ZXIgcHJvZ3JhbW1pbmciIGhyZWY9Imh0dHBzOi8vZW4ud2lraXBlZGlhLm9yZy93aWtpL0NvbXB1dGVyX3Byb2dyYW1taW5nIj5jb21wdXRlciBwcm9ncmFtbWluZzwvYT4uIFByZXZpb3VzbHksIGEga25vd2xlZGdlIG9mIHN1Y2ggdGVjaG5vbG9naWVzIGFzIEhUTUwgYW5kJm5ic3A7PGEgc3R5bGU9InRleHQtZGVjb3JhdGlvbi1saW5lOiBub25lOyBjb2xvcjogIzA2NDVhZDsgYmFja2dyb3VuZDogbm9uZTsgdXNlci1zZWxlY3Q6IGF1dG87IiB0aXRsZT0iRmlsZSBUcmFuc2ZlciBQcm90b2NvbCIgaHJlZj0iaHR0cHM6Ly9lbi53aWtpcGVkaWEub3JnL3dpa2kvRmlsZV9UcmFuc2Zlcl9Qcm90b2NvbCI+RmlsZSBUcmFuc2ZlciBQcm90b2NvbDwvYT4mbmJzcDtoYWQgYmVlbiByZXF1aXJlZCB0byBwdWJsaXNoIGNvbnRlbnQgb24gdGhlIFdlYiwgYW5kIGVhcmx5IFdlYiB1c2VycyB0aGVyZWZvcmUgdGVuZGVkIHRvIGJlJm5ic3A7PGEgc3R5bGU9InRleHQtZGVjb3JhdGlvbi1saW5lOiBub25lOyBjb2xvcjogIzA2NDVhZDsgYmFja2dyb3VuZDogbm9uZTsgdXNlci1zZWxlY3Q6IGF1dG87IiB0aXRsZT0iSGFja2VyIiBocmVmPSJodHRwczovL2VuLndpa2lwZWRpYS5vcmcvd2lraS9IYWNrZXIiPmhhY2tlcnM8L2E+Jm5ic3A7YW5kIGNvbXB1dGVyIGVudGh1c2lhc3RzLiBJbiB0aGUgMjAxMHMsIHRoZSBtYWpvcml0eSBhcmUgaW50ZXJhY3RpdmUmbmJzcDs8YSBzdHlsZT0idGV4dC1kZWNvcmF0aW9uLWxpbmU6IG5vbmU7IGNvbG9yOiAjMDY0NWFkOyBiYWNrZ3JvdW5kOiBub25lOyB1c2VyLXNlbGVjdDogYXV0bzsiIHRpdGxlPSJXZWIgMi4wIiBocmVmPSJodHRwczovL2VuLndpa2lwZWRpYS5vcmcvd2lraS9XZWJfMi4wIj5XZWIgMi4wPC9hPiZuYnNwO3dlYnNpdGVzLCBhbGxvd2luZyB2aXNpdG9ycyB0byBsZWF2ZSBvbmxpbmUgY29tbWVudHMsIGFuZCBpdCBpcyB0aGlzIGludGVyYWN0aXZpdHkgdGhhdCBkaXN0aW5ndWlzaGVzIHRoZW0gZnJvbSBvdGhlciBzdGF0aWMgd2Vic2l0ZXMuPHN1cCBpZD0iY2l0ZV9yZWYtMiIgY2xhc3M9InJlZmVyZW5jZSIgc3R5bGU9ImxpbmUtaGVpZ2h0OiAxOyB1bmljb2RlLWJpZGk6IGlzb2xhdGU7IHdoaXRlLXNwYWNlOiBub3dyYXA7IGZvbnQtc2l6ZTogMTEuMnB4OyB1c2VyLXNlbGVjdDogYXV0bzsiPjxhIHN0eWxlPSJ0ZXh0LWRlY29yYXRpb24tbGluZTogbm9uZTsgY29sb3I6ICMwNjQ1YWQ7IGJhY2tncm91bmQ6IG5vbmU7IHVzZXItc2VsZWN0OiBhdXRvOyIgaHJlZj0iaHR0cHM6Ly9lbi53aWtpcGVkaWEub3JnL3dpa2kvQmxvZyNjaXRlX25vdGUtMiI+WzJdPC9hPjwvc3VwPiZuYnNwO0luIHRoYXQgc2Vuc2UsIGJsb2dnaW5nIGNhbiBiZSBzZWVuIGFzIGEgZm9ybSBvZiZuYnNwOzxhIHN0eWxlPSJ0ZXh0LWRlY29yYXRpb24tbGluZTogbm9uZTsgY29sb3I6ICMwNjQ1YWQ7IGJhY2tncm91bmQ6IG5vbmU7IHVzZXItc2VsZWN0OiBhdXRvOyIgdGl0bGU9IlNvY2lhbCBuZXR3b3JraW5nIHNlcnZpY2UiIGhyZWY9Imh0dHBzOi8vZW4ud2lraXBlZGlhLm9yZy93aWtpL1NvY2lhbF9uZXR3b3JraW5nX3NlcnZpY2UiPnNvY2lhbCBuZXR3b3JraW5nIHNlcnZpY2U8L2E+LiBJbmRlZWQsIGJsb2dnZXJzIG5vdCBvbmx5IHByb2R1Y2UgY29udGVudCB0byBwb3N0IG9uIHRoZWlyIGJsb2dzIGJ1dCBhbHNvIG9mdGVuIGJ1aWxkIHNvY2lhbCByZWxhdGlvbnMgd2l0aCB0aGVpciByZWFkZXJzIGFuZCBvdGhlciBibG9nZ2Vycy48c3VwIGlkPSJjaXRlX3JlZi0zIiBjbGFzcz0icmVmZXJlbmNlIiBzdHlsZT0ibGluZS1oZWlnaHQ6IDE7IHVuaWNvZGUtYmlkaTogaXNvbGF0ZTsgd2hpdGUtc3BhY2U6IG5vd3JhcDsgZm9udC1zaXplOiAxMS4ycHg7IHVzZXItc2VsZWN0OiBhdXRvOyI+PGEgc3R5bGU9InRleHQtZGVjb3JhdGlvbi1saW5lOiBub25lOyBjb2xvcjogIzA2NDVhZDsgYmFja2dyb3VuZDogbm9uZTsgdXNlci1zZWxlY3Q6IGF1dG87IiBocmVmPSJodHRwczovL2VuLndpa2lwZWRpYS5vcmcvd2lraS9CbG9nI2NpdGVfbm90ZS0zIj5bM108L2E+PC9zdXA+Jm5ic3A7SG93ZXZlciwgdGhlcmUgYXJlIGhpZ2gtcmVhZGVyc2hpcCBibG9ncyB3aGljaCBkbyBub3QgYWxsb3cgY29tbWVudHMuPC9wPg0KPHAgc3R5bGU9Im1hcmdpbjogMC41ZW0gMHB4OyB1c2VyLXNlbGVjdDogYXV0bzsgY29sb3I6ICMyMDIxMjI7IGZvbnQtZmFtaWx5OiBzYW5zLXNlcmlmOyBmb250LXNpemU6IDE0cHg7IGJhY2tncm91bmQtY29sb3I6ICNmZmZmZmY7Ij5NYW55IGJsb2dzIHByb3ZpZGUgY29tbWVudGFyeSBvbiBhIHBhcnRpY3VsYXIgc3ViamVjdCBvciB0b3BpYywgcmFuZ2luZyBmcm9tJm5ic3A7PGEgc3R5bGU9InRleHQtZGVjb3JhdGlvbi1saW5lOiBub25lOyBjb2xvcjogIzA2NDVhZDsgYmFja2dyb3VuZDogbm9uZTsgdXNlci1zZWxlY3Q6IGF1dG87IiB0aXRsZT0iUGhpbG9zb3BoeSIgaHJlZj0iaHR0cHM6Ly9lbi53aWtpcGVkaWEub3JnL3dpa2kvUGhpbG9zb3BoeSI+cGhpbG9zb3BoeTwvYT4sJm5ic3A7PGEgc3R5bGU9InRleHQtZGVjb3JhdGlvbi1saW5lOiBub25lOyBjb2xvcjogIzA2NDVhZDsgYmFja2dyb3VuZDogbm9uZTsgdXNlci1zZWxlY3Q6IGF1dG87IiB0aXRsZT0iUmVsaWdpb24iIGhyZWY9Imh0dHBzOi8vZW4ud2lraXBlZGlhLm9yZy93aWtpL1JlbGlnaW9uIj5yZWxpZ2lvbjwvYT4sIGFuZCZuYnNwOzxhIHN0eWxlPSJ0ZXh0LWRlY29yYXRpb24tbGluZTogbm9uZTsgY29sb3I6ICMwNjQ1YWQ7IGJhY2tncm91bmQ6IG5vbmU7IHVzZXItc2VsZWN0OiBhdXRvOyIgdGl0bGU9IkFydCIgaHJlZj0iaHR0cHM6Ly9lbi53aWtpcGVkaWEub3JnL3dpa2kvQXJ0Ij5hcnRzPC9hPiZuYnNwO3RvJm5ic3A7PGEgc3R5bGU9InRleHQtZGVjb3JhdGlvbi1saW5lOiBub25lOyBjb2xvcjogIzA2NDVhZDsgYmFja2dyb3VuZDogbm9uZTsgdXNlci1zZWxlY3Q6IGF1dG87IiB0aXRsZT0iU2NpZW5jZSIgaHJlZj0iaHR0cHM6Ly9lbi53aWtpcGVkaWEub3JnL3dpa2kvU2NpZW5jZSI+c2NpZW5jZTwvYT4sJm5ic3A7PGEgc3R5bGU9InRleHQtZGVjb3JhdGlvbi1saW5lOiBub25lOyBjb2xvcjogIzA2NDVhZDsgYmFja2dyb3VuZDogbm9uZTsgdXNlci1zZWxlY3Q6IGF1dG87IiB0aXRsZT0iUG9saXRpY3MiIGhyZWY9Imh0dHBzOi8vZW4ud2lraXBlZGlhLm9yZy93aWtpL1BvbGl0aWNzIj5wb2xpdGljczwvYT4sIGFuZCZuYnNwOzxhIHN0eWxlPSJ0ZXh0LWRlY29yYXRpb24tbGluZTogbm9uZTsgY29sb3I6ICMwNjQ1YWQ7IGJhY2tncm91bmQ6IG5vbmU7IHVzZXItc2VsZWN0OiBhdXRvOyIgdGl0bGU9IlNwb3J0IiBocmVmPSJodHRwczovL2VuLndpa2lwZWRpYS5vcmcvd2lraS9TcG9ydCI+c3BvcnRzPC9hPi4gT3RoZXJzIGZ1bmN0aW9uIGFzIG1vcmUgcGVyc29uYWwmbmJzcDs8YSBzdHlsZT0idGV4dC1kZWNvcmF0aW9uLWxpbmU6IG5vbmU7IGNvbG9yOiAjMDY0NWFkOyBiYWNrZ3JvdW5kOiBub25lOyB1c2VyLXNlbGVjdDogYXV0bzsiIHRpdGxlPSJPbmxpbmUgZGlhcnkiIGhyZWY9Imh0dHBzOi8vZW4ud2lraXBlZGlhLm9yZy93aWtpL09ubGluZV9kaWFyeSI+b25saW5lIGRpYXJpZXM8L2E+Jm5ic3A7b3ImbmJzcDs8YSBzdHlsZT0idGV4dC1kZWNvcmF0aW9uLWxpbmU6IG5vbmU7IGNvbG9yOiAjMDY0NWFkOyBiYWNrZ3JvdW5kOiBub25lOyB1c2VyLXNlbGVjdDogYXV0bzsiIHRpdGxlPSJPbmxpbmUgYWR2ZXJ0aXNpbmciIGhyZWY9Imh0dHBzOi8vZW4ud2lraXBlZGlhLm9yZy93aWtpL09ubGluZV9hZHZlcnRpc2luZyI+b25saW5lIGJyYW5kIGFkdmVydGlzaW5nPC9hPiZuYnNwO29mIGEgcGFydGljdWxhciBpbmRpdmlkdWFsIG9yIGNvbXBhbnkuIEEgdHlwaWNhbCBibG9nIGNvbWJpbmVzIHRleHQsJm5ic3A7PGEgc3R5bGU9InRleHQtZGVjb3JhdGlvbi1saW5lOiBub25lOyBjb2xvcjogIzA2NDVhZDsgYmFja2dyb3VuZDogbm9uZTsgdXNlci1zZWxlY3Q6IGF1dG87IiB0aXRsZT0iRGlnaXRhbCBpbWFnZSIgaHJlZj0iaHR0cHM6Ly9lbi53aWtpcGVkaWEub3JnL3dpa2kvRGlnaXRhbF9pbWFnZSI+ZGlnaXRhbCBpbWFnZXM8L2E+LCBhbmQmbmJzcDs8YSBzdHlsZT0idGV4dC1kZWNvcmF0aW9uLWxpbmU6IG5vbmU7IGNvbG9yOiAjMDY0NWFkOyBiYWNrZ3JvdW5kOiBub25lOyB1c2VyLXNlbGVjdDogYXV0bzsiIHRpdGxlPSJIeXBlcmxpbmsiIGhyZWY9Imh0dHBzOi8vZW4ud2lraXBlZGlhLm9yZy93aWtpL0h5cGVybGluayI+bGlua3M8L2E+Jm5ic3A7dG8gb3RoZXIgYmxvZ3MsIHdlYiBwYWdlcywgYW5kIG90aGVyIG1lZGlhIHJlbGF0ZWQgdG8gaXRzIHRvcGljLiBUaGUgYWJpbGl0eSBvZiByZWFkZXJzIHRvIGxlYXZlIHB1YmxpY2x5IHZpZXdhYmxlIGNvbW1lbnRzLCBhbmQgaW50ZXJhY3Qgd2l0aCBvdGhlciBjb21tZW50ZXJzLCBpcyBhbiBpbXBvcnRhbnQgY29udHJpYnV0aW9uIHRvIHRoZSBwb3B1bGFyaXR5IG9mIG1hbnkgYmxvZ3MuIEhvd2V2ZXIsIGJsb2cgb3duZXJzIG9yIGF1dGhvcnMgb2Z0ZW4mbmJzcDs8YSBzdHlsZT0idGV4dC1kZWNvcmF0aW9uLWxpbmU6IG5vbmU7IGNvbG9yOiAjMDY0NWFkOyBiYWNrZ3JvdW5kOiBub25lOyB1c2VyLXNlbGVjdDogYXV0bzsiIHRpdGxlPSJJbnRlcm5ldCBmb3J1bSIgaHJlZj0iaHR0cHM6Ly9lbi53aWtpcGVkaWEub3JnL3dpa2kvSW50ZXJuZXRfZm9ydW0jTW9kZXJhdG9ycyI+bW9kZXJhdGU8L2E+Jm5ic3A7YW5kJm5ic3A7PGEgc3R5bGU9InRleHQtZGVjb3JhdGlvbi1saW5lOiBub25lOyBjb2xvcjogIzA2NDVhZDsgYmFja2dyb3VuZDogbm9uZTsgdXNlci1zZWxlY3Q6IGF1dG87IiB0aXRsZT0iV29yZGZpbHRlciIgaHJlZj0iaHR0cHM6Ly9lbi53aWtpcGVkaWEub3JnL3dpa2kvV29yZGZpbHRlciI+ZmlsdGVyPC9hPiZuYnNwO29ubGluZSBjb21tZW50cyB0byByZW1vdmUmbmJzcDs8YSBzdHlsZT0idGV4dC1kZWNvcmF0aW9uLWxpbmU6IG5vbmU7IGNvbG9yOiAjMDY0NWFkOyBiYWNrZ3JvdW5kOiBub25lOyB1c2VyLXNlbGVjdDogYXV0bzsiIHRpdGxlPSJIYXRlIHNwZWVjaCIgaHJlZj0iaHR0cHM6Ly9lbi53aWtpcGVkaWEub3JnL3dpa2kvSGF0ZV9zcGVlY2giPmhhdGUgc3BlZWNoPC9hPiZuYnNwO29yIG90aGVyIG9mZmVuc2l2ZSBjb250ZW50LiBNb3N0IGJsb2dzIGFyZSBwcmltYXJpbHkgdGV4dHVhbCwgYWx0aG91Z2ggc29tZSBmb2N1cyBvbiBhcnQgKDxlbSBzdHlsZT0idXNlci1zZWxlY3Q6IGF1dG87Ij48YSBzdHlsZT0idGV4dC1kZWNvcmF0aW9uLWxpbmU6IG5vbmU7IGNvbG9yOiAjMDY0NWFkOyBiYWNrZ3JvdW5kOiBub25lOyB1c2VyLXNlbGVjdDogYXV0bzsiIHRpdGxlPSJBcnQgYmxvZyIgaHJlZj0iaHR0cHM6Ly9lbi53aWtpcGVkaWEub3JnL3dpa2kvQXJ0X2Jsb2ciPmFydCBibG9nczwvYT48L2VtPiksIHBob3RvZ3JhcGhzICg8ZW0gc3R5bGU9InVzZXItc2VsZWN0OiBhdXRvOyI+PGEgc3R5bGU9InRleHQtZGVjb3JhdGlvbi1saW5lOiBub25lOyBjb2xvcjogIzA2NDVhZDsgYmFja2dyb3VuZDogbm9uZTsgdXNlci1zZWxlY3Q6IGF1dG87IiB0aXRsZT0iUGhvdG9ibG9nIiBocmVmPSJodHRwczovL2VuLndpa2lwZWRpYS5vcmcvd2lraS9QaG90b2Jsb2ciPnBob3RvYmxvZ3M8L2E+PC9lbT4pLCB2aWRlb3MgKDxlbSBzdHlsZT0idXNlci1zZWxlY3Q6IGF1dG87Ij48YSBjbGFzcz0ibXctcmVkaXJlY3QiIHN0eWxlPSJ0ZXh0LWRlY29yYXRpb24tbGluZTogbm9uZTsgY29sb3I6ICMwNjQ1YWQ7IGJhY2tncm91bmQ6IG5vbmU7IHVzZXItc2VsZWN0OiBhdXRvOyIgdGl0bGU9IlZpZGVvIGJsb2ciIGhyZWY9Imh0dHBzOi8vZW4ud2lraXBlZGlhLm9yZy93aWtpL1ZpZGVvX2Jsb2ciPnZpZGVvIGJsb2dzPC9hPjwvZW0+Jm5ic3A7b3IgIjxlbSBzdHlsZT0idXNlci1zZWxlY3Q6IGF1dG87Ij52bG9nczwvZW0+IiksIG11c2ljICg8ZW0gc3R5bGU9InVzZXItc2VsZWN0OiBhdXRvOyI+PGEgc3R5bGU9InRleHQtZGVjb3JhdGlvbi1saW5lOiBub25lOyBjb2xvcjogIzA2NDVhZDsgYmFja2dyb3VuZDogbm9uZTsgdXNlci1zZWxlY3Q6IGF1dG87IiB0aXRsZT0iTVAzIGJsb2ciIGhyZWY9Imh0dHBzOi8vZW4ud2lraXBlZGlhLm9yZy93aWtpL01QM19ibG9nIj5NUDMgYmxvZ3M8L2E+PC9lbT4pLCBhbmQgYXVkaW8gKDxlbSBzdHlsZT0idXNlci1zZWxlY3Q6IGF1dG87Ij48YSBzdHlsZT0idGV4dC1kZWNvcmF0aW9uLWxpbmU6IG5vbmU7IGNvbG9yOiAjMDY0NWFkOyBiYWNrZ3JvdW5kOiBub25lOyB1c2VyLXNlbGVjdDogYXV0bzsiIHRpdGxlPSJQb2RjYXN0IiBocmVmPSJodHRwczovL2VuLndpa2lwZWRpYS5vcmcvd2lraS9Qb2RjYXN0Ij5wb2RjYXN0czwvYT48L2VtPikuIEluIGVkdWNhdGlvbiwgYmxvZ3MgY2FuIGJlIHVzZWQgYXMgaW5zdHJ1Y3Rpb25hbCByZXNvdXJjZXM7IHRoZXNlIGFyZSByZWZlcnJlZCB0byBhcyZuYnNwOzxlbSBzdHlsZT0idXNlci1zZWxlY3Q6IGF1dG87Ij48YSBzdHlsZT0idGV4dC1kZWNvcmF0aW9uLWxpbmU6IG5vbmU7IGNvbG9yOiAjMDY0NWFkOyBiYWNrZ3JvdW5kOiBub25lOyB1c2VyLXNlbGVjdDogYXV0bzsiIHRpdGxlPSJFZHVibG9nIiBocmVmPSJodHRwczovL2VuLndpa2lwZWRpYS5vcmcvd2lraS9FZHVibG9nIj5lZHVibG9nczwvYT48L2VtPi4mbmJzcDs8YSBzdHlsZT0idGV4dC1kZWNvcmF0aW9uLWxpbmU6IG5vbmU7IGNvbG9yOiAjMDY0NWFkOyBiYWNrZ3JvdW5kOiBub25lOyB1c2VyLXNlbGVjdDogYXV0bzsiIHRpdGxlPSJNaWNyb2Jsb2dnaW5nIiBocmVmPSJodHRwczovL2VuLndpa2lwZWRpYS5vcmcvd2lraS9NaWNyb2Jsb2dnaW5nIj5NaWNyb2Jsb2dnaW5nPC9hPiZuYnNwO2lzIGFub3RoZXIgdHlwZSBvZiBibG9nZ2luZywgZmVhdHVyaW5nIHZlcnkgc2hvcnQgcG9zdHMuPC9wPg==', '', 14),
(52, 'file', 'software', 'write', 'PGgzIHN0eWxlPSJtYXJnaW46IDAuM2VtIDBweCAwcHg7IHBhZGRpbmctdG9wOiAwLjVlbTsgcGFkZGluZy1ib3R0b206IDBweDsgb3ZlcmZsb3c6IGhpZGRlbjsgZm9udC1zaXplOiAxLjJlbTsgbGluZS1oZWlnaHQ6IDEuNjsgZm9udC1mYW1pbHk6IHNhbnMtc2VyaWY7IGJhY2tncm91bmQtY29sb3I6ICNmZmZmZmY7IHVzZXItc2VsZWN0OiBhdXRvOyI+PHNwYW4gaWQ9Ik9yaWdpbnMiIGNsYXNzPSJtdy1oZWFkbGluZSIgc3R5bGU9InVzZXItc2VsZWN0OiBhdXRvOyI+T3JpZ2luczwvc3Bhbj48L2gzPg0KPHAgc3R5bGU9Im1hcmdpbjogMC41ZW0gMHB4OyB1c2VyLXNlbGVjdDogYXV0bzsgY29sb3I6ICMyMDIxMjI7IGZvbnQtZmFtaWx5OiBzYW5zLXNlcmlmOyBmb250LXNpemU6IDE0cHg7IGJhY2tncm91bmQtY29sb3I6ICNmZmZmZmY7Ij5CZWZvcmUgYmxvZ2dpbmcgYmVjYW1lIHBvcHVsYXIsIGRpZ2l0YWwgY29tbXVuaXRpZXMgdG9vayBtYW55IGZvcm1zIGluY2x1ZGluZyZuYnNwOzxhIHN0eWxlPSJ0ZXh0LWRlY29yYXRpb24tbGluZTogbm9uZTsgY29sb3I6ICMwNjQ1YWQ7IGJhY2tncm91bmQ6IG5vbmU7IHVzZXItc2VsZWN0OiBhdXRvOyIgdGl0bGU9IlVzZW5ldCIgaHJlZj0iaHR0cHM6Ly9lbi53aWtpcGVkaWEub3JnL3dpa2kvVXNlbmV0Ij5Vc2VuZXQ8L2E+LCBjb21tZXJjaWFsIG9ubGluZSBzZXJ2aWNlcyBzdWNoIGFzJm5ic3A7PGEgc3R5bGU9InRleHQtZGVjb3JhdGlvbi1saW5lOiBub25lOyBjb2xvcjogIzA2NDVhZDsgYmFja2dyb3VuZDogbm9uZTsgdXNlci1zZWxlY3Q6IGF1dG87IiB0aXRsZT0iR0VuaWUiIGhyZWY9Imh0dHBzOi8vZW4ud2lraXBlZGlhLm9yZy93aWtpL0dFbmllIj5HRW5pZTwvYT4sJm5ic3A7PGEgc3R5bGU9InRleHQtZGVjb3JhdGlvbi1saW5lOiBub25lOyBjb2xvcjogIzA2NDVhZDsgYmFja2dyb3VuZDogbm9uZTsgdXNlci1zZWxlY3Q6IGF1dG87IiB0aXRsZT0iQnl0ZSBJbmZvcm1hdGlvbiBFeGNoYW5nZSIgaHJlZj0iaHR0cHM6Ly9lbi53aWtpcGVkaWEub3JnL3dpa2kvQnl0ZV9JbmZvcm1hdGlvbl9FeGNoYW5nZSI+Qnl0ZSBJbmZvcm1hdGlvbiBFeGNoYW5nZTwvYT4mbmJzcDsoQklYKSBhbmQgdGhlIGVhcmx5Jm5ic3A7PGEgc3R5bGU9InRleHQtZGVjb3JhdGlvbi1saW5lOiBub25lOyBjb2xvcjogIzA2NDVhZDsgYmFja2dyb3VuZDogbm9uZTsgdXNlci1zZWxlY3Q6IGF1dG87IiB0aXRsZT0iQ29tcHVTZXJ2ZSIgaHJlZj0iaHR0cHM6Ly9lbi53aWtpcGVkaWEub3JnL3dpa2kvQ29tcHVTZXJ2ZSI+Q29tcHVTZXJ2ZTwvYT4sJm5ic3A7PGEgc3R5bGU9InRleHQtZGVjb3JhdGlvbi1saW5lOiBub25lOyBjb2xvcjogIzA2NDVhZDsgYmFja2dyb3VuZDogbm9uZTsgdXNlci1zZWxlY3Q6IGF1dG87IiB0aXRsZT0iRWxlY3Ryb25pYyBtYWlsaW5nIGxpc3QiIGhyZWY9Imh0dHBzOi8vZW4ud2lraXBlZGlhLm9yZy93aWtpL0VsZWN0cm9uaWNfbWFpbGluZ19saXN0Ij5lLW1haWwgbGlzdHM8L2E+LDxzdXAgaWQ9ImNpdGVfcmVmLTE0IiBjbGFzcz0icmVmZXJlbmNlIiBzdHlsZT0ibGluZS1oZWlnaHQ6IDE7IHVuaWNvZGUtYmlkaTogaXNvbGF0ZTsgd2hpdGUtc3BhY2U6IG5vd3JhcDsgZm9udC1zaXplOiAxMS4ycHg7IHVzZXItc2VsZWN0OiBhdXRvOyI+PGEgc3R5bGU9InRleHQtZGVjb3JhdGlvbi1saW5lOiBub25lOyBjb2xvcjogIzA2NDVhZDsgYmFja2dyb3VuZDogbm9uZTsgdXNlci1zZWxlY3Q6IGF1dG87IiBocmVmPSJodHRwczovL2VuLndpa2lwZWRpYS5vcmcvd2lraS9CbG9nI2NpdGVfbm90ZS0xNCI+WzE0XTwvYT48L3N1cD4mbmJzcDthbmQmbmJzcDs8YSBjbGFzcz0ibXctcmVkaXJlY3QiIHN0eWxlPSJ0ZXh0LWRlY29yYXRpb24tbGluZTogbm9uZTsgY29sb3I6ICMwNjQ1YWQ7IGJhY2tncm91bmQ6IG5vbmU7IHVzZXItc2VsZWN0OiBhdXRvOyIgdGl0bGU9IkJ1bGxldGluIEJvYXJkIFN5c3RlbSIgaHJlZj0iaHR0cHM6Ly9lbi53aWtpcGVkaWEub3JnL3dpa2kvQnVsbGV0aW5fQm9hcmRfU3lzdGVtIj5CdWxsZXRpbiBCb2FyZCBTeXN0ZW1zPC9hPiZuYnNwOyhCQlMpLiBJbiB0aGUgMTk5MHMsJm5ic3A7PGEgc3R5bGU9InRleHQtZGVjb3JhdGlvbi1saW5lOiBub25lOyBjb2xvcjogIzA2NDVhZDsgYmFja2dyb3VuZDogbm9uZTsgdXNlci1zZWxlY3Q6IGF1dG87IiB0aXRsZT0iSW50ZXJuZXQgZm9ydW0iIGhyZWY9Imh0dHBzOi8vZW4ud2lraXBlZGlhLm9yZy93aWtpL0ludGVybmV0X2ZvcnVtIj5JbnRlcm5ldCBmb3J1bTwvYT4mbmJzcDtzb2Z0d2FyZSBjcmVhdGVkIHJ1bm5pbmcgY29udmVyc2F0aW9ucyB3aXRoICJ0aHJlYWRzIi4gVGhyZWFkcyBhcmUgdG9waWNhbCBjb25uZWN0aW9ucyBiZXR3ZWVuIG1lc3NhZ2VzIG9uIGEgdmlydHVhbCAiPGEgc3R5bGU9InRleHQtZGVjb3JhdGlvbi1saW5lOiBub25lOyBjb2xvcjogIzA2NDVhZDsgYmFja2dyb3VuZDogbm9uZTsgdXNlci1zZWxlY3Q6IGF1dG87IiB0aXRsZT0iQnVsbGV0aW4gYm9hcmQiIGhyZWY9Imh0dHBzOi8vZW4ud2lraXBlZGlhLm9yZy93aWtpL0J1bGxldGluX2JvYXJkIj5jb3JrYm9hcmQ8L2E+Ii4gRnJvbSBKdW5lIDE0LCAxOTkzLCBNb3NhaWMgQ29tbXVuaWNhdGlvbnMgQ29ycG9yYXRpb24gbWFpbnRhaW5lZCB0aGVpciAiV2hhdCdzIE5ldyI8c3VwIGlkPSJjaXRlX3JlZi0xNSIgY2xhc3M9InJlZmVyZW5jZSIgc3R5bGU9ImxpbmUtaGVpZ2h0OiAxOyB1bmljb2RlLWJpZGk6IGlzb2xhdGU7IHdoaXRlLXNwYWNlOiBub3dyYXA7IGZvbnQtc2l6ZTogMTEuMnB4OyB1c2VyLXNlbGVjdDogYXV0bzsiPjxhIHN0eWxlPSJ0ZXh0LWRlY29yYXRpb24tbGluZTogbm9uZTsgY29sb3I6ICMwNjQ1YWQ7IGJhY2tncm91bmQ6IG5vbmU7IHVzZXItc2VsZWN0OiBhdXRvOyIgaHJlZj0iaHR0cHM6Ly9lbi53aWtpcGVkaWEub3JnL3dpa2kvQmxvZyNjaXRlX25vdGUtMTUiPlsxNV08L2E+PC9zdXA+Jm5ic3A7bGlzdCBvZiBuZXcgd2Vic2l0ZXMsIHVwZGF0ZWQgZGFpbHkgYW5kIGFyY2hpdmVkIG1vbnRobHkuIFRoZSBwYWdlIHdhcyBhY2Nlc3NpYmxlIGJ5IGEgc3BlY2lhbCAiV2hhdCdzIE5ldyIgYnV0dG9uIGluIHRoZSBNb3NhaWMgd2ViIGJyb3dzZXIuPC9wPg0KPHAgc3R5bGU9Im1hcmdpbjogMC41ZW0gMHB4OyB1c2VyLXNlbGVjdDogYXV0bzsgY29sb3I6ICMyMDIxMjI7IGZvbnQtZmFtaWx5OiBzYW5zLXNlcmlmOyBmb250LXNpemU6IDE0cHg7IGJhY2tncm91bmQtY29sb3I6ICNmZmZmZmY7Ij5UaGUgZWFybGllc3QgaW5zdGFuY2Ugb2YgYSBjb21tZXJjaWFsIGJsb2cgd2FzIG9uIHRoZSBmaXJzdCZuYnNwOzxhIGNsYXNzPSJtdy1yZWRpcmVjdCIgc3R5bGU9InRleHQtZGVjb3JhdGlvbi1saW5lOiBub25lOyBjb2xvcjogIzA2NDVhZDsgYmFja2dyb3VuZDogbm9uZTsgdXNlci1zZWxlY3Q6IGF1dG87IiB0aXRsZT0iQnVzaW5lc3MgdG8gY29uc3VtZXIiIGhyZWY9Imh0dHBzOi8vZW4ud2lraXBlZGlhLm9yZy93aWtpL0J1c2luZXNzX3RvX2NvbnN1bWVyIj5idXNpbmVzcyB0byBjb25zdW1lcjwvYT4mbmJzcDtXZWIgc2l0ZSBjcmVhdGVkIGluIDE5OTUgYnkmbmJzcDs8YSBjbGFzcz0ibXctcmVkaXJlY3QiIHN0eWxlPSJ0ZXh0LWRlY29yYXRpb24tbGluZTogbm9uZTsgY29sb3I6ICMwNjQ1YWQ7IGJhY2tncm91bmQ6IG5vbmU7IHVzZXItc2VsZWN0OiBhdXRvOyIgdGl0bGU9IlR5IEluYyIgaHJlZj0iaHR0cHM6Ly9lbi53aWtpcGVkaWEub3JnL3dpa2kvVHlfSW5jIj5UeSwgSW5jLjwvYT4sIHdoaWNoIGZlYXR1cmVkIGEgYmxvZyBpbiBhIHNlY3Rpb24gY2FsbGVkICJPbmxpbmUgRGlhcnkiLiBUaGUgZW50cmllcyB3ZXJlIG1haW50YWluZWQgYnkgZmVhdHVyZWQmbmJzcDs8YSBzdHlsZT0idGV4dC1kZWNvcmF0aW9uLWxpbmU6IG5vbmU7IGNvbG9yOiAjMDY0NWFkOyBiYWNrZ3JvdW5kOiBub25lOyB1c2VyLXNlbGVjdDogYXV0bzsiIHRpdGxlPSJCZWFuaWUgQmFiaWVzIiBocmVmPSJodHRwczovL2VuLndpa2lwZWRpYS5vcmcvd2lraS9CZWFuaWVfQmFiaWVzIj5CZWFuaWUgQmFiaWVzPC9hPiZuYnNwO3RoYXQgd2VyZSB2b3RlZCBmb3IgbW9udGhseSBieSBXZWIgc2l0ZSB2aXNpdG9ycy48c3VwIGlkPSJjaXRlX3JlZi1CZWFuaWVCYWJpZXNfMTYtMCIgY2xhc3M9InJlZmVyZW5jZSIgc3R5bGU9ImxpbmUtaGVpZ2h0OiAxOyB1bmljb2RlLWJpZGk6IGlzb2xhdGU7IHdoaXRlLXNwYWNlOiBub3dyYXA7IGZvbnQtc2l6ZTogMTEuMnB4OyB1c2VyLXNlbGVjdDogYXV0bzsiPjxhIHN0eWxlPSJ0ZXh0LWRlY29yYXRpb24tbGluZTogbm9uZTsgY29sb3I6ICMwNjQ1YWQ7IGJhY2tncm91bmQ6IG5vbmU7IHVzZXItc2VsZWN0OiBhdXRvOyIgaHJlZj0iaHR0cHM6Ly9lbi53aWtpcGVkaWEub3JnL3dpa2kvQmxvZyNjaXRlX25vdGUtQmVhbmllQmFiaWVzLTE2Ij5bMTZdPC9hPjwvc3VwPjwvcD4NCjxwIHN0eWxlPSJtYXJnaW46IDAuNWVtIDBweDsgdXNlci1zZWxlY3Q6IGF1dG87IGNvbG9yOiAjMjAyMTIyOyBmb250LWZhbWlseTogc2Fucy1zZXJpZjsgZm9udC1zaXplOiAxNHB4OyBiYWNrZ3JvdW5kLWNvbG9yOiAjZmZmZmZmOyI+VGhlIG1vZGVybiBibG9nIGV2b2x2ZWQgZnJvbSB0aGUmbmJzcDs8YSBzdHlsZT0idGV4dC1kZWNvcmF0aW9uLWxpbmU6IG5vbmU7IGNvbG9yOiAjMDY0NWFkOyBiYWNrZ3JvdW5kOiBub25lOyB1c2VyLXNlbGVjdDogYXV0bzsiIHRpdGxlPSJPbmxpbmUgZGlhcnkiIGhyZWY9Imh0dHBzOi8vZW4ud2lraXBlZGlhLm9yZy93aWtpL09ubGluZV9kaWFyeSI+b25saW5lIGRpYXJ5PC9hPiZuYnNwO3doZXJlIHBlb3BsZSB3b3VsZCBrZWVwIGEgcnVubmluZyBhY2NvdW50IG9mIHRoZSBldmVudHMgaW4gdGhlaXIgcGVyc29uYWwgbGl2ZXMuIE1vc3Qgc3VjaCB3cml0ZXJzIGNhbGxlZCB0aGVtc2VsdmVzIGRpYXJpc3RzLCBqb3VybmFsaXN0cywgb3Igam91cm5hbGVycy4mbmJzcDs8YSBzdHlsZT0idGV4dC1kZWNvcmF0aW9uLWxpbmU6IG5vbmU7IGNvbG9yOiAjMDY0NWFkOyBiYWNrZ3JvdW5kOiBub25lOyB1c2VyLXNlbGVjdDogYXV0bzsiIHRpdGxlPSJKdXN0aW4gSGFsbCIgaHJlZj0iaHR0cHM6Ly9lbi53aWtpcGVkaWEub3JnL3dpa2kvSnVzdGluX0hhbGwiPkp1c3RpbiBIYWxsPC9hPiwgd2hvIGJlZ2FuIHBlcnNvbmFsIGJsb2dnaW5nIGluIDE5OTQgd2hpbGUgYSBzdHVkZW50IGF0Jm5ic3A7PGEgc3R5bGU9InRleHQtZGVjb3JhdGlvbi1saW5lOiBub25lOyBjb2xvcjogIzA2NDVhZDsgYmFja2dyb3VuZDogbm9uZTsgdXNlci1zZWxlY3Q6IGF1dG87IiB0aXRsZT0iU3dhcnRobW9yZSBDb2xsZWdlIiBocmVmPSJodHRwczovL2VuLndpa2lwZWRpYS5vcmcvd2lraS9Td2FydGhtb3JlX0NvbGxlZ2UiPlN3YXJ0aG1vcmUgQ29sbGVnZTwvYT4sIGlzIGdlbmVyYWxseSByZWNvZ25pemVkIGFzIG9uZSBvZiB0aGUgZWFybGllciBibG9nZ2Vycyw8c3VwIGlkPSJjaXRlX3JlZi0xNyIgY2xhc3M9InJlZmVyZW5jZSIgc3R5bGU9ImxpbmUtaGVpZ2h0OiAxOyB1bmljb2RlLWJpZGk6IGlzb2xhdGU7IHdoaXRlLXNwYWNlOiBub3dyYXA7IGZvbnQtc2l6ZTogMTEuMnB4OyB1c2VyLXNlbGVjdDogYXV0bzsiPjxhIHN0eWxlPSJ0ZXh0LWRlY29yYXRpb24tbGluZTogbm9uZTsgY29sb3I6ICMwNjQ1YWQ7IGJhY2tncm91bmQ6IG5vbmU7IHVzZXItc2VsZWN0OiBhdXRvOyIgaHJlZj0iaHR0cHM6Ly9lbi53aWtpcGVkaWEub3JnL3dpa2kvQmxvZyNjaXRlX25vdGUtMTciPlsxN108L2E+PC9zdXA+Jm5ic3A7YXMgaXMmbmJzcDs8YSBzdHlsZT0idGV4dC1kZWNvcmF0aW9uLWxpbmU6IG5vbmU7IGNvbG9yOiAjMDY0NWFkOyBiYWNrZ3JvdW5kOiBub25lOyB1c2VyLXNlbGVjdDogYXV0bzsiIHRpdGxlPSJKZXJyeSBQb3VybmVsbGUiIGhyZWY9Imh0dHBzOi8vZW4ud2lraXBlZGlhLm9yZy93aWtpL0plcnJ5X1BvdXJuZWxsZSI+SmVycnkgUG91cm5lbGxlPC9hPi48c3VwIGlkPSJjaXRlX3JlZi0xOCIgY2xhc3M9InJlZmVyZW5jZSIgc3R5bGU9ImxpbmUtaGVpZ2h0OiAxOyB1bmljb2RlLWJpZGk6IGlzb2xhdGU7IHdoaXRlLXNwYWNlOiBub3dyYXA7IGZvbnQtc2l6ZTogMTEuMnB4OyB1c2VyLXNlbGVjdDogYXV0bzsiPjxhIHN0eWxlPSJ0ZXh0LWRlY29yYXRpb24tbGluZTogbm9uZTsgY29sb3I6ICMwNjQ1YWQ7IGJhY2tncm91bmQ6IG5vbmU7IHVzZXItc2VsZWN0OiBhdXRvOyIgaHJlZj0iaHR0cHM6Ly9lbi53aWtpcGVkaWEub3JnL3dpa2kvQmxvZyNjaXRlX25vdGUtMTgiPlsxOF08L2E+PC9zdXA+Jm5ic3A7PGEgc3R5bGU9InRleHQtZGVjb3JhdGlvbi1saW5lOiBub25lOyBjb2xvcjogIzA2NDVhZDsgYmFja2dyb3VuZDogbm9uZTsgdXNlci1zZWxlY3Q6IGF1dG87IiB0aXRsZT0iRGF2ZSBXaW5lciIgaHJlZj0iaHR0cHM6Ly9lbi53aWtpcGVkaWEub3JnL3dpa2kvRGF2ZV9XaW5lciI+RGF2ZSBXaW5lcjwvYT4ncyBTY3JpcHRpbmcgTmV3cyBpcyBhbHNvIGNyZWRpdGVkIHdpdGggYmVpbmcgb25lIG9mIHRoZSBvbGRlciBhbmQgbG9uZ2VyIHJ1bm5pbmcgd2VibG9ncy48c3VwIGlkPSJjaXRlX3JlZi0xOSIgY2xhc3M9InJlZmVyZW5jZSIgc3R5bGU9ImxpbmUtaGVpZ2h0OiAxOyB1bmljb2RlLWJpZGk6IGlzb2xhdGU7IHdoaXRlLXNwYWNlOiBub3dyYXA7IGZvbnQtc2l6ZTogMTEuMnB4OyB1c2VyLXNlbGVjdDogYXV0bzsiPjxhIHN0eWxlPSJ0ZXh0LWRlY29yYXRpb24tbGluZTogbm9uZTsgY29sb3I6ICMwNjQ1YWQ7IGJhY2tncm91bmQ6IG5vbmU7IHVzZXItc2VsZWN0OiBhdXRvOyIgaHJlZj0iaHR0cHM6Ly9lbi53aWtpcGVkaWEub3JnL3dpa2kvQmxvZyNjaXRlX25vdGUtMTkiPlsxOV08L2E+PC9zdXA+PHN1cCBpZD0iY2l0ZV9yZWYtMjAiIGNsYXNzPSJyZWZlcmVuY2UiIHN0eWxlPSJsaW5lLWhlaWdodDogMTsgdW5pY29kZS1iaWRpOiBpc29sYXRlOyB3aGl0ZS1zcGFjZTogbm93cmFwOyBmb250LXNpemU6IDExLjJweDsgdXNlci1zZWxlY3Q6IGF1dG87Ij48YSBzdHlsZT0idGV4dC1kZWNvcmF0aW9uLWxpbmU6IG5vbmU7IGNvbG9yOiAjMDY0NWFkOyBiYWNrZ3JvdW5kOiBub25lOyB1c2VyLXNlbGVjdDogYXV0bzsiIGhyZWY9Imh0dHBzOi8vZW4ud2lraXBlZGlhLm9yZy93aWtpL0Jsb2cjY2l0ZV9ub3RlLTIwIj5bMjBdPC9hPjwvc3VwPiZuYnNwO1RoZSBBdXN0cmFsaWFuIE5ldGd1aWRlIG1hZ2F6aW5lIG1haW50YWluZWQgdGhlIERhaWx5IE5ldCBOZXdzPHN1cCBpZD0iY2l0ZV9yZWYtMjEiIGNsYXNzPSJyZWZlcmVuY2UiIHN0eWxlPSJsaW5lLWhlaWdodDogMTsgdW5pY29kZS1iaWRpOiBpc29sYXRlOyB3aGl0ZS1zcGFjZTogbm93cmFwOyBmb250LXNpemU6IDExLjJweDsgdXNlci1zZWxlY3Q6IGF1dG87Ij48YSBzdHlsZT0idGV4dC1kZWNvcmF0aW9uLWxpbmU6IG5vbmU7IGNvbG9yOiAjMDY0NWFkOyBiYWNrZ3JvdW5kOiBub25lOyB1c2VyLXNlbGVjdDogYXV0bzsiIGhyZWY9Imh0dHBzOi8vZW4ud2lraXBlZGlhLm9yZy93aWtpL0Jsb2cjY2l0ZV9ub3RlLTIxIj5bMjFdPC9hPjwvc3VwPiZuYnNwO29uIHRoZWlyIHdlYiBzaXRlIGZyb20gMTk5Ni4gRGFpbHkgTmV0IE5ld3MgcmFuIGxpbmtzIGFuZCBkYWlseSByZXZpZXdzIG9mIG5ldyB3ZWJzaXRlcywgbW9zdGx5IGluIEF1c3RyYWxpYS48L3A+DQo8cCBzdHlsZT0ibWFyZ2luOiAwLjVlbSAwcHg7IHVzZXItc2VsZWN0OiBhdXRvOyBjb2xvcjogIzIwMjEyMjsgZm9udC1mYW1pbHk6IHNhbnMtc2VyaWY7IGZvbnQtc2l6ZTogMTRweDsgYmFja2dyb3VuZC1jb2xvcjogI2ZmZmZmZjsiPkFub3RoZXIgZWFybHkgYmxvZyB3YXMgV2VhcmFibGUgV2lyZWxlc3MgV2ViY2FtLCBhbiBvbmxpbmUgc2hhcmVkIGRpYXJ5IG9mIGEgcGVyc29uJ3MgcGVyc29uYWwgbGlmZSBjb21iaW5pbmcgdGV4dCwgZGlnaXRhbCB2aWRlbywgYW5kIGRpZ2l0YWwgcGljdHVyZXMgdHJhbnNtaXR0ZWQgbGl2ZSBmcm9tIGEgd2VhcmFibGUgY29tcHV0ZXIgYW5kJm5ic3A7PGEgc3R5bGU9InRleHQtZGVjb3JhdGlvbi1saW5lOiBub25lOyBjb2xvcjogIzA2NDVhZDsgYmFja2dyb3VuZDogbm9uZTsgdXNlci1zZWxlY3Q6IGF1dG87IiB0aXRsZT0iRXllVGFwIiBocmVmPSJodHRwczovL2VuLndpa2lwZWRpYS5vcmcvd2lraS9FeWVUYXAiPkV5ZVRhcDwvYT4mbmJzcDtkZXZpY2UgdG8gYSB3ZWIgc2l0ZSBpbiAxOTk0LiBUaGlzIHByYWN0aWNlIG9mIHNlbWktYXV0b21hdGVkIGJsb2dnaW5nIHdpdGggbGl2ZSB2aWRlbyB0b2dldGhlciB3aXRoIHRleHQgd2FzIHJlZmVycmVkIHRvIGFzJm5ic3A7PGEgc3R5bGU9InRleHQtZGVjb3JhdGlvbi1saW5lOiBub25lOyBjb2xvcjogIzA2NDVhZDsgYmFja2dyb3VuZDogbm9uZTsgdXNlci1zZWxlY3Q6IGF1dG87IiB0aXRsZT0iU291c3ZlaWxsYW5jZSIgaHJlZj0iaHR0cHM6Ly9lbi53aWtpcGVkaWEub3JnL3dpa2kvU291c3ZlaWxsYW5jZSI+c291c3ZlaWxsYW5jZTwvYT4sIGFuZCBzdWNoIGpvdXJuYWxzIHdlcmUgYWxzbyB1c2VkIGFzIGV2aWRlbmNlIGluIGxlZ2FsIG1hdHRlcnMuIFNvbWUgZWFybHkgYmxvZ2dlcnMsIHN1Y2ggYXMgVGhlIE1pc2FudGhyb3BpYyBCaXRjaCwgd2hvIGJlZ2FuIGluIDE5OTcsIGFjdHVhbGx5IHJlZmVycmVkIHRvIHRoZWlyIG9ubGluZSBwcmVzZW5jZSBhcyBhJm5ic3A7PGEgc3R5bGU9InRleHQtZGVjb3JhdGlvbi1saW5lOiBub25lOyBjb2xvcjogIzA2NDVhZDsgYmFja2dyb3VuZDogbm9uZTsgdXNlci1zZWxlY3Q6IGF1dG87IiB0aXRsZT0iWmluZSIgaHJlZj0iaHR0cHM6Ly9lbi53aWtpcGVkaWEub3JnL3dpa2kvWmluZSI+emluZTwvYT4sIGJlZm9yZSB0aGUgdGVybSBibG9nIGVudGVyZWQgY29tbW9uIHVzYWdlLjwvcD4NCjxoMyBzdHlsZT0ibWFyZ2luOiAwLjNlbSAwcHggMHB4OyBwYWRkaW5nLXRvcDogMC41ZW07IHBhZGRpbmctYm90dG9tOiAwcHg7IG92ZXJmbG93OiBoaWRkZW47IGZvbnQtc2l6ZTogMS4yZW07IGxpbmUtaGVpZ2h0OiAxLjY7IGZvbnQtZmFtaWx5OiBzYW5zLXNlcmlmOyBiYWNrZ3JvdW5kLWNvbG9yOiAjZmZmZmZmOyB1c2VyLXNlbGVjdDogYXV0bzsiPjxzcGFuIGlkPSJUZWNobm9sb2d5IiBjbGFzcz0ibXctaGVhZGxpbmUiIHN0eWxlPSJ1c2VyLXNlbGVjdDogYXV0bzsiPlRlY2hub2xvZ3k8L3NwYW4+PC9oMz4NCjxwIHN0eWxlPSJtYXJnaW46IDAuNWVtIDBweDsgdXNlci1zZWxlY3Q6IGF1dG87IGNvbG9yOiAjMjAyMTIyOyBmb250LWZhbWlseTogc2Fucy1zZXJpZjsgZm9udC1zaXplOiAxNHB4OyBiYWNrZ3JvdW5kLWNvbG9yOiAjZmZmZmZmOyI+RWFybHkgYmxvZ3Mgd2VyZSBzaW1wbHkgbWFudWFsbHkgdXBkYXRlZCBjb21wb25lbnRzIG9mIGNvbW1vbiBXZWJzaXRlcy4gSW4gMTk5NSwgdGhlICJPbmxpbmUgRGlhcnkiIG9uIHRoZSZuYnNwOzxhIGNsYXNzPSJtdy1yZWRpcmVjdCIgc3R5bGU9InRleHQtZGVjb3JhdGlvbi1saW5lOiBub25lOyBjb2xvcjogIzA2NDVhZDsgYmFja2dyb3VuZDogbm9uZTsgdXNlci1zZWxlY3Q6IGF1dG87IiB0aXRsZT0iVHksIEluYy4iIGhyZWY9Imh0dHBzOi8vZW4ud2lraXBlZGlhLm9yZy93aWtpL1R5LF9JbmMuIj5UeSwgSW5jLjwvYT4mbmJzcDtXZWIgc2l0ZSB3YXMgcHJvZHVjZWQgYW5kIHVwZGF0ZWQgbWFudWFsbHkgYmVmb3JlIGFueSBibG9nZ2luZyBwcm9ncmFtcyB3ZXJlIGF2YWlsYWJsZS4gUG9zdHMgd2VyZSBtYWRlIHRvIGFwcGVhciBpbiByZXZlcnNlIGNocm9ub2xvZ2ljYWwgb3JkZXIgYnkgbWFudWFsbHkgdXBkYXRpbmcgdGV4dCBiYXNlZCZuYnNwOzxhIHN0eWxlPSJ0ZXh0LWRlY29yYXRpb24tbGluZTogbm9uZTsgY29sb3I6ICMwNjQ1YWQ7IGJhY2tncm91bmQ6IG5vbmU7IHVzZXItc2VsZWN0OiBhdXRvOyIgdGl0bGU9IkhUTUwiIGhyZWY9Imh0dHBzOi8vZW4ud2lraXBlZGlhLm9yZy93aWtpL0hUTUwiPkhUTUw8L2E+Jm5ic3A7Y29kZSB1c2luZyZuYnNwOzxhIGNsYXNzPSJtdy1yZWRpcmVjdCIgc3R5bGU9InRleHQtZGVjb3JhdGlvbi1saW5lOiBub25lOyBjb2xvcjogIzA2NDVhZDsgYmFja2dyb3VuZDogbm9uZTsgdXNlci1zZWxlY3Q6IGF1dG87IiB0aXRsZT0iRlRQIiBocmVmPSJodHRwczovL2VuLndpa2lwZWRpYS5vcmcvd2lraS9GVFAiPkZUUDwvYT4mbmJzcDtzb2Z0d2FyZSBpbiByZWFsIHRpbWUgc2V2ZXJhbCB0aW1lcyBhIGRheS4gVG8gdXNlcnMsIHRoaXMgb2ZmZXJlZCB0aGUgYXBwZWFyYW5jZSBvZiBhIGxpdmUgZGlhcnkgdGhhdCBjb250YWluZWQgbXVsdGlwbGUgbmV3IGVudHJpZXMgcGVyIGRheS4gQXQgdGhlIGJlZ2lubmluZyBvZiBlYWNoIG5ldyBkYXksIG5ldyBkaWFyeSBlbnRyaWVzIHdlcmUgbWFudWFsbHkgY29kZWQgaW50byBhIG5ldyBIVE1MIGZpbGUsIGFuZCB0aGUgc3RhcnQgb2YgZWFjaCBtb250aCwgZGlhcnkgZW50cmllcyB3ZXJlIGFyY2hpdmVkIGludG8gaXRzIG93biBmb2xkZXIgd2hpY2ggY29udGFpbmVkIGEgc2VwYXJhdGUgSFRNTCBwYWdlIGZvciBldmVyeSBkYXkgb2YgdGhlIG1vbnRoLiBUaGVuIG1lbnVzIHRoYXQgY29udGFpbmVkIGxpbmtzIHRvIHRoZSBtb3N0IHJlY2VudCBkaWFyeSBlbnRyeSB3ZXJlIHVwZGF0ZWQgbWFudWFsbHkgdGhyb3VnaG91dCB0aGUgc2l0ZS4gVGhpcyB0ZXh0LWJhc2VkIG1ldGhvZCBvZiBvcmdhbml6aW5nIHRob3VzYW5kcyBvZiBmaWxlcyBzZXJ2ZWQgYXMgYSBzcHJpbmdib2FyZCB0byBkZWZpbmUgZnV0dXJlIGJsb2dnaW5nIHN0eWxlcyB0aGF0IHdlcmUgY2FwdHVyZWQgYnkgYmxvZ2dpbmcgc29mdHdhcmUgZGV2ZWxvcGVkIHllYXJzIGxhdGVyLjxzdXAgaWQ9ImNpdGVfcmVmLUJlYW5pZUJhYmllc18xNi0xIiBjbGFzcz0icmVmZXJlbmNlIiBzdHlsZT0ibGluZS1oZWlnaHQ6IDE7IHVuaWNvZGUtYmlkaTogaXNvbGF0ZTsgd2hpdGUtc3BhY2U6IG5vd3JhcDsgZm9udC1zaXplOiAxMS4ycHg7IHVzZXItc2VsZWN0OiBhdXRvOyI+PGEgc3R5bGU9InRleHQtZGVjb3JhdGlvbi1saW5lOiBub25lOyBjb2xvcjogIzA2NDVhZDsgYmFja2dyb3VuZDogbm9uZTsgdXNlci1zZWxlY3Q6IGF1dG87IiBocmVmPSJodHRwczovL2VuLndpa2lwZWRpYS5vcmcvd2lraS9CbG9nI2NpdGVfbm90ZS1CZWFuaWVCYWJpZXMtMTYiPlsxNl08L2E+PC9zdXA+PC9wPg0KPHAgc3R5bGU9Im1hcmdpbjogMC41ZW0gMHB4OyB1c2VyLXNlbGVjdDogYXV0bzsgY29sb3I6ICMyMDIxMjI7IGZvbnQtZmFtaWx5OiBzYW5zLXNlcmlmOyBmb250LXNpemU6IDE0cHg7IGJhY2tncm91bmQtY29sb3I6ICNmZmZmZmY7Ij5UaGUgZXZvbHV0aW9uIG9mIGVsZWN0cm9uaWMgYW5kIHNvZnR3YXJlIHRvb2xzIHRvIGZhY2lsaXRhdGUgdGhlIHByb2R1Y3Rpb24gYW5kIG1haW50ZW5hbmNlIG9mIFdlYiBhcnRpY2xlcyBwb3N0ZWQgaW4gcmV2ZXJzZSBjaHJvbm9sb2dpY2FsIG9yZGVyIG1hZGUgdGhlIHB1Ymxpc2hpbmcgcHJvY2VzcyBmZWFzaWJsZSB0byBhIG11Y2ggbGFyZ2VyIGFuZCBsZXNzIHRlY2huaWNhbGx5LWluY2xpbmVkIHBvcHVsYXRpb24uIFVsdGltYXRlbHksIHRoaXMgcmVzdWx0ZWQgaW4gdGhlIGRpc3RpbmN0IGNsYXNzIG9mIG9ubGluZSBwdWJsaXNoaW5nIHRoYXQgcHJvZHVjZXMgYmxvZ3Mgd2UgcmVjb2duaXplIHRvZGF5LiBGb3IgaW5zdGFuY2UsIHRoZSB1c2Ugb2Ygc29tZSBzb3J0IG9mIGJyb3dzZXItYmFzZWQgc29mdHdhcmUgaXMgbm93IGEgdHlwaWNhbCBhc3BlY3Qgb2YgImJsb2dnaW5nIi4gQmxvZ3MgY2FuIGJlIGhvc3RlZCBieSBkZWRpY2F0ZWQmbmJzcDs8YSBjbGFzcz0ibXctcmVkaXJlY3QiIHN0eWxlPSJ0ZXh0LWRlY29yYXRpb24tbGluZTogbm9uZTsgY29sb3I6ICMwNjQ1YWQ7IGJhY2tncm91bmQ6IG5vbmU7IHVzZXItc2VsZWN0OiBhdXRvOyIgdGl0bGU9IkJsb2cgaG9zdGluZyBzZXJ2aWNlIiBocmVmPSJodHRwczovL2VuLndpa2lwZWRpYS5vcmcvd2lraS9CbG9nX2hvc3Rpbmdfc2VydmljZSI+YmxvZyBob3N0aW5nIHNlcnZpY2VzPC9hPiwgb24gcmVndWxhciZuYnNwOzxhIHN0eWxlPSJ0ZXh0LWRlY29yYXRpb24tbGluZTogbm9uZTsgY29sb3I6ICMwNjQ1YWQ7IGJhY2tncm91bmQ6IG5vbmU7IHVzZXItc2VsZWN0OiBhdXRvOyIgdGl0bGU9IldlYiBob3N0aW5nIHNlcnZpY2UiIGhyZWY9Imh0dHBzOi8vZW4ud2lraXBlZGlhLm9yZy93aWtpL1dlYl9ob3N0aW5nX3NlcnZpY2UiPndlYiBob3N0aW5nIHNlcnZpY2VzPC9hPiwgb3IgcnVuIHVzaW5nIGJsb2cgc29mdHdhcmUuPC9wPg0KPGgzIHN0eWxlPSJtYXJnaW46IDAuM2VtIDBweCAwcHg7IHBhZGRpbmctdG9wOiAwLjVlbTsgcGFkZGluZy1ib3R0b206IDBweDsgb3ZlcmZsb3c6IGhpZGRlbjsgZm9udC1zaXplOiAxLjJlbTsgbGluZS1oZWlnaHQ6IDEuNjsgZm9udC1mYW1pbHk6IHNhbnMtc2VyaWY7IGJhY2tncm91bmQtY29sb3I6ICNmZmZmZmY7IHVzZXItc2VsZWN0OiBhdXRvOyI+PHNwYW4gaWQ9IlJpc2VfaW5fcG9wdWxhcml0eSIgY2xhc3M9Im13LWhlYWRsaW5lIiBzdHlsZT0idXNlci1zZWxlY3Q6IGF1dG87Ij5SaXNlIGluIHBvcHVsYXJpdHk8L3NwYW4+PC9oMz4NCjxwIHN0eWxlPSJtYXJnaW46IDAuNWVtIDBweDsgdXNlci1zZWxlY3Q6IGF1dG87IGNvbG9yOiAjMjAyMTIyOyBmb250LWZhbWlseTogc2Fucy1zZXJpZjsgZm9udC1zaXplOiAxNHB4OyBiYWNrZ3JvdW5kLWNvbG9yOiAjZmZmZmZmOyI+QWZ0ZXIgYSBzbG93IHN0YXJ0LCBibG9nZ2luZyByYXBpZGx5IGdhaW5lZCBpbiBwb3B1bGFyaXR5LiBCbG9nIHVzYWdlIHNwcmVhZCBkdXJpbmcgMTk5OSBhbmQgdGhlIHllYXJzIGZvbGxvd2luZywgYmVpbmcgZnVydGhlciBwb3B1bGFyaXplZCBieSB0aGUgbmVhci1zaW11bHRhbmVvdXMgYXJyaXZhbCBvZiB0aGUgZmlyc3QgaG9zdGVkIGJsb2cgdG9vbHM6PC9wPg0KPHVsIHN0eWxlPSJsaXN0LXN0eWxlLWltYWdlOiB1cmwoJy4uL3cvc2tpbnMvVmVjdG9yL3Jlc291cmNlcy9jb21tb24vaW1hZ2VzL2J1bGxldC1pY29uLnN2Zz9kNDUxNScpOyBtYXJnaW46IDAuM2VtIDBweCAwcHggMS42ZW07IHBhZGRpbmc6IDBweDsgY29sb3I6ICMyMDIxMjI7IGZvbnQtZmFtaWx5OiBzYW5zLXNlcmlmOyBmb250LXNpemU6IDE0cHg7IGJhY2tncm91bmQtY29sb3I6ICNmZmZmZmY7IHVzZXItc2VsZWN0OiBhdXRvOyI+DQo8bGkgc3R5bGU9Im1hcmdpbi1ib3R0b206IDAuMWVtOyB1c2VyLXNlbGVjdDogYXV0bzsiPjxhIHN0eWxlPSJ0ZXh0LWRlY29yYXRpb24tbGluZTogbm9uZTsgY29sb3I6ICMwNjQ1YWQ7IGJhY2tncm91bmQ6IG5vbmU7IHVzZXItc2VsZWN0OiBhdXRvOyIgdGl0bGU9IkJydWNlIEFibGVzb24iIGhyZWY9Imh0dHBzOi8vZW4ud2lraXBlZGlhLm9yZy93aWtpL0JydWNlX0FibGVzb24iPkJydWNlIEFibGVzb248L2E+Jm5ic3A7bGF1bmNoZWQmbmJzcDs8YSBzdHlsZT0idGV4dC1kZWNvcmF0aW9uLWxpbmU6IG5vbmU7IGNvbG9yOiAjMDY0NWFkOyBiYWNrZ3JvdW5kOiBub25lOyB1c2VyLXNlbGVjdDogYXV0bzsiIHRpdGxlPSJPcGVuIERpYXJ5IiBocmVmPSJodHRwczovL2VuLndpa2lwZWRpYS5vcmcvd2lraS9PcGVuX0RpYXJ5Ij5PcGVuIERpYXJ5PC9hPiZuYnNwO2luIE9jdG9iZXIgMTk5OCwgd2hpY2ggc29vbiBncmV3IHRvIHRob3VzYW5kcyBvZiBvbmxpbmUgZGlhcmllcy4gT3BlbiBEaWFyeSBpbm5vdmF0ZWQgdGhlIHJlYWRlciBjb21tZW50LCBiZWNvbWluZyB0aGUgZmlyc3QgYmxvZyBjb21tdW5pdHkgd2hlcmUgcmVhZGVycyBjb3VsZCBhZGQgY29tbWVudHMgdG8gb3RoZXIgd3JpdGVycycgYmxvZyBlbnRyaWVzLjwvbGk+DQo8bGkgc3R5bGU9Im1hcmdpbi1ib3R0b206IDAuMWVtOyB1c2VyLXNlbGVjdDogYXV0bzsiPjxhIHN0eWxlPSJ0ZXh0LWRlY29yYXRpb24tbGluZTogbm9uZTsgY29sb3I6ICMwNjQ1YWQ7IGJhY2tncm91bmQ6IG5vbmU7IHVzZXItc2VsZWN0OiBhdXRvOyIgdGl0bGU9IkJyYWQgRml0enBhdHJpY2siIGhyZWY9Imh0dHBzOi8vZW4ud2lraXBlZGlhLm9yZy93aWtpL0JyYWRfRml0enBhdHJpY2siPkJyYWQgRml0enBhdHJpY2s8L2E+Jm5ic3A7c3RhcnRlZCZuYnNwOzxhIHN0eWxlPSJ0ZXh0LWRlY29yYXRpb24tbGluZTogbm9uZTsgY29sb3I6ICMwNjQ1YWQ7IGJhY2tncm91bmQ6IG5vbmU7IHVzZXItc2VsZWN0OiBhdXRvOyIgdGl0bGU9IkxpdmVKb3VybmFsIiBocmVmPSJodHRwczovL2VuLndpa2lwZWRpYS5vcmcvd2lraS9MaXZlSm91cm5hbCI+TGl2ZUpvdXJuYWw8L2E+Jm5ic3A7aW4gTWFyY2ggMTk5OS48L2xpPg0KPGxpIHN0eWxlPSJtYXJnaW4tYm90dG9tOiAwLjFlbTsgdXNlci1zZWxlY3Q6IGF1dG87Ij5BbmRyZXcgU21hbGVzIGNyZWF0ZWQgUGl0YXMuY29tIGluIEp1bHkgMTk5OSBhcyBhbiBlYXNpZXIgYWx0ZXJuYXRpdmUgdG8gbWFpbnRhaW5pbmcgYSAibmV3cyBwYWdlIiBvbiBhIFdlYiBzaXRlLCBmb2xsb3dlZCBieSBEaWFyeUxhbmQgaW4gU2VwdGVtYmVyIDE5OTksIGZvY3VzaW5nIG1vcmUgb24gYSBwZXJzb25hbCBkaWFyeSBjb21tdW5pdHkuPHN1cCBpZD0iY2l0ZV9yZWYtMjIiIGNsYXNzPSJyZWZlcmVuY2UiIHN0eWxlPSJsaW5lLWhlaWdodDogMTsgdW5pY29kZS1iaWRpOiBpc29sYXRlOyB3aGl0ZS1zcGFjZTogbm93cmFwOyBmb250LXNpemU6IDExLjJweDsgdXNlci1zZWxlY3Q6IGF1dG87Ij48YSBzdHlsZT0idGV4dC1kZWNvcmF0aW9uLWxpbmU6IG5vbmU7IGNvbG9yOiAjMDY0NWFkOyBiYWNrZ3JvdW5kOiBub25lOyB1c2VyLXNlbGVjdDogYXV0bzsiIGhyZWY9Imh0dHBzOi8vZW4ud2lraXBlZGlhLm9yZy93aWtpL0Jsb2cjY2l0ZV9ub3RlLTIyIj5bMjJdPC9hPjwvc3VwPjwvbGk+DQo8bGkgc3R5bGU9Im1hcmdpbi1ib3R0b206IDAuMWVtOyB1c2VyLXNlbGVjdDogYXV0bzsiPjxhIHN0eWxlPSJ0ZXh0LWRlY29yYXRpb24tbGluZTogbm9uZTsgY29sb3I6ICMwNjQ1YWQ7IGJhY2tncm91bmQ6IG5vbmU7IHVzZXItc2VsZWN0OiBhdXRvOyIgdGl0bGU9IkV2YW4gV2lsbGlhbXMgKEludGVybmV0IGVudHJlcHJlbmV1cikiIGhyZWY9Imh0dHBzOi8vZW4ud2lraXBlZGlhLm9yZy93aWtpL0V2YW5fV2lsbGlhbXNfKEludGVybmV0X2VudHJlcHJlbmV1cikiPkV2YW4gV2lsbGlhbXM8L2E+Jm5ic3A7YW5kJm5ic3A7PGEgc3R5bGU9InRleHQtZGVjb3JhdGlvbi1saW5lOiBub25lOyBjb2xvcjogIzA2NDVhZDsgYmFja2dyb3VuZDogbm9uZTsgdXNlci1zZWxlY3Q6IGF1dG87IiB0aXRsZT0iTWVnIEhvdXJpaGFuIiBocmVmPSJodHRwczovL2VuLndpa2lwZWRpYS5vcmcvd2lraS9NZWdfSG91cmloYW4iPk1lZyBIb3U8L2E+PC9saT4NCjwvdWw+', '', 14),
(53, 'peak days', 'website', 'solving big ', 'PHAgc3R5bGU9Im1hcmdpbjogMC41ZW0gMHB4OyB1c2VyLXNlbGVjdDogYXV0bzsgY29sb3I6ICMyMDIxMjI7IGZvbnQtZmFtaWx5OiBzYW5zLXNlcmlmOyBmb250LXNpemU6IDE0cHg7IGJhY2tncm91bmQtY29sb3I6ICNmZmZmZmY7Ij4mbmJzcDs8L3A+DQo8cCBzdHlsZT0ibWFyZ2luOiAwLjVlbSAwcHg7IHVzZXItc2VsZWN0OiBhdXRvOyBjb2xvcjogIzIwMjEyMjsgZm9udC1mYW1pbHk6IHNhbnMtc2VyaWY7IGZvbnQtc2l6ZTogMTRweDsgYmFja2dyb3VuZC1jb2xvcjogI2ZmZmZmZjsiPlRoZSBlbWVyZ2VuY2UgYW5kIGdyb3d0aCBvZiBibG9ncyBpbiB0aGUgbGF0ZSAxOTkwcyBjb2luY2lkZWQgd2l0aCB0aGUgYWR2ZW50IG9mIHdlYiBwdWJsaXNoaW5nIHRvb2xzIHRoYXQgZmFjaWxpdGF0ZWQgdGhlIHBvc3Rpbmcgb2YgY29udGVudCBieSBub24tdGVjaG5pY2FsIHVzZXJzIHdobyBkaWQgbm90IGhhdmUgbXVjaCBleHBlcmllbmNlIHdpdGgmbmJzcDs8YSBzdHlsZT0idGV4dC1kZWNvcmF0aW9uLWxpbmU6IG5vbmU7IGNvbG9yOiAjMDY0NWFkOyBiYWNrZ3JvdW5kOiBub25lOyB1c2VyLXNlbGVjdDogYXV0bzsiIHRpdGxlPSJIVE1MIiBocmVmPSJodHRwczovL2VuLndpa2lwZWRpYS5vcmcvd2lraS9IVE1MIj5IVE1MPC9hPiZuYnNwO29yJm5ic3A7PGEgc3R5bGU9InRleHQtZGVjb3JhdGlvbi1saW5lOiBub25lOyBjb2xvcjogIzA2NDVhZDsgYmFja2dyb3VuZDogbm9uZTsgdXNlci1zZWxlY3Q6IGF1dG87IiB0aXRsZT0iQ29tcHV0ZXIgcHJvZ3JhbW1pbmciIGhyZWY9Imh0dHBzOi8vZW4ud2lraXBlZGlhLm9yZy93aWtpL0NvbXB1dGVyX3Byb2dyYW1taW5nIj5jb21wdXRlciBwcm9ncmFtbWluZzwvYT4uIFByZXZpb3VzbHksIGEga25vd2xlZGdlIG9mIHN1Y2ggdGVjaG5vbG9naWVzIGFzIEhUTUwgYW5kJm5ic3A7PGEgc3R5bGU9InRleHQtZGVjb3JhdGlvbi1saW5lOiBub25lOyBjb2xvcjogIzA2NDVhZDsgYmFja2dyb3VuZDogbm9uZTsgdXNlci1zZWxlY3Q6IGF1dG87IiB0aXRsZT0iRmlsZSBUcmFuc2ZlciBQcm90b2NvbCIgaHJlZj0iaHR0cHM6Ly9lbi53aWtpcGVkaWEub3JnL3dpa2kvRmlsZV9UcmFuc2Zlcl9Qcm90b2NvbCI+RmlsZSBUcmFuc2ZlciBQcm90b2NvbDwvYT4mbmJzcDtoYWQgYmVlbiByZXF1aXJlZCB0byBwdWJsaXNoIGNvbnRlbnQgb24gdGhlIFdlYiwgYW5kIGVhcmx5IFdlYiB1c2VycyB0aGVyZWZvcmUgdGVuZGVkIHRvIGJlJm5ic3A7PGEgc3R5bGU9InRleHQtZGVjb3JhdGlvbi1saW5lOiBub25lOyBjb2xvcjogIzA2NDVhZDsgYmFja2dyb3VuZDogbm9uZTsgdXNlci1zZWxlY3Q6IGF1dG87IiB0aXRsZT0iSGFja2VyIiBocmVmPSJodHRwczovL2VuLndpa2lwZWRpYS5vcmcvd2lraS9IYWNrZXIiPmhhY2tlcnM8L2E+Jm5ic3A7YW5kIGNvbXB1dGVyIGVudGh1c2lhc3RzLiBJbiB0aGUgMjAxMHMsIHRoZSBtYWpvcml0eSBhcmUgaW50ZXJhY3RpdmUmbmJzcDs8YSBzdHlsZT0idGV4dC1kZWNvcmF0aW9uLWxpbmU6IG5vbmU7IGNvbG9yOiAjMDY0NWFkOyBiYWNrZ3JvdW5kOiBub25lOyB1c2VyLXNlbGVjdDogYXV0bzsiIHRpdGxlPSJXZWIgMi4wIiBocmVmPSJodHRwczovL2VuLndpa2lwZWRpYS5vcmcvd2lraS9XZWJfMi4wIj5XZWIgMi4wPC9hPiZuYnNwO3dlYnNpdGVzLCBhbGxvd2luZyB2aXNpdG9ycyB0byBsZWF2ZSBvbmxpbmUgY29tbWVudHMsIGFuZCBpdCBpcyB0aGlzIGludGVyYWN0aXZpdHkgdGhhdCBkaXN0aW5ndWlzaGVzIHRoZW0gZnJvbSBvdGhlciBzdGF0aWMgd2Vic2l0ZXMuPHN1cCBpZD0iY2l0ZV9yZWYtMiIgY2xhc3M9InJlZmVyZW5jZSIgc3R5bGU9ImxpbmUtaGVpZ2h0OiAxOyB1bmljb2RlLWJpZGk6IGlzb2xhdGU7IHdoaXRlLXNwYWNlOiBub3dyYXA7IGZvbnQtc2l6ZTogMTEuMnB4OyB1c2VyLXNlbGVjdDogYXV0bzsiPjxhIHN0eWxlPSJ0ZXh0LWRlY29yYXRpb24tbGluZTogbm9uZTsgY29sb3I6ICMwNjQ1YWQ7IGJhY2tncm91bmQ6IG5vbmU7IHVzZXItc2VsZWN0OiBhdXRvOyIgaHJlZj0iaHR0cHM6Ly9lbi53aWtpcGVkaWEub3JnL3dpa2kvQmxvZyNjaXRlX25vdGUtMiI+WzJdPC9hPjwvc3VwPiZuYnNwO0luIHRoYXQgc2Vuc2UsIGJsb2dnaW5nIGNhbiBiZSBzZWVuIGFzIGEgZm9ybSBvZiZuYnNwOzxhIHN0eWxlPSJ0ZXh0LWRlY29yYXRpb24tbGluZTogbm9uZTsgY29sb3I6ICMwNjQ1YWQ7IGJhY2tncm91bmQ6IG5vbmU7IHVzZXItc2VsZWN0OiBhdXRvOyIgdGl0bGU9IlNvY2lhbCBuZXR3b3JraW5nIHNlcnZpY2UiIGhyZWY9Imh0dHBzOi8vZW4ud2lraXBlZGlhLm9yZy93aWtpL1NvY2lhbF9uZXR3b3JraW5nX3NlcnZpY2UiPnNvY2lhbCBuZXR3b3JraW5nIHNlcnZpY2U8L2E+LiBJbmRlZWQsIGJsb2dnZXJzIG5vdCBvbmx5IHByb2R1Y2UgY29udGVudCB0byBwb3N0IG9uIHRoZWlyIGJsb2dzIGJ1dCBhbHNvIG9mdGVuIGJ1aWxkIHNvY2lhbCByZWxhdGlvbnMgd2l0aCB0aGVpciByZWFkZXJzIGFuZCBvdGhlciBibG9nZ2Vycy48c3VwIGlkPSJjaXRlX3JlZi0zIiBjbGFzcz0icmVmZXJlbmNlIiBzdHlsZT0ibGluZS1oZWlnaHQ6IDE7IHVuaWNvZGUtYmlkaTogaXNvbGF0ZTsgd2hpdGUtc3BhY2U6IG5vd3JhcDsgZm9udC1zaXplOiAxMS4ycHg7IHVzZXItc2VsZWN0OiBhdXRvOyI+PGEgc3R5bGU9InRleHQtZGVjb3JhdGlvbi1saW5lOiBub25lOyBjb2xvcjogIzA2NDVhZDsgYmFja2dyb3VuZDogbm9uZTsgdXNlci1zZWxlY3Q6IGF1dG87IiBocmVmPSJodHRwczovL2VuLndpa2lwZWRpYS5vcmcvd2lraS9CbG9nI2NpdGVfbm90ZS0zIj5bM108L2E+PC9zdXA+Jm5ic3A7SG93ZXZlciwgdGhlcmUgYXJlIGhpZ2gtcmVhZGVyc2hpcCBibG9ncyB3aGljaCBkbyBub3QgYWxsb3cgY29tbWVudHMuPC9wPg0KPHAgc3R5bGU9Im1hcmdpbjogMC41ZW0gMHB4OyB1c2VyLXNlbGVjdDogYXV0bzsgY29sb3I6ICMyMDIxMjI7IGZvbnQtZmFtaWx5OiBzYW5zLXNlcmlmOyBmb250LXNpemU6IDE0cHg7IGJhY2tncm91bmQtY29sb3I6ICNmZmZmZmY7Ij5NYW55IGJsb2dzIHByb3ZpZGUgY29tbWVudGFyeSBvbiBhIHBhcnRpY3VsYXIgc3ViamVjdCBvciB0b3BpYywgcmFuZ2luZyBmcm9tJm5ic3A7PGEgc3R5bGU9InRleHQtZGVjb3JhdGlvbi1saW5lOiBub25lOyBjb2xvcjogIzA2NDVhZDsgYmFja2dyb3VuZDogbm9uZTsgdXNlci1zZWxlY3Q6IGF1dG87IiB0aXRsZT0iUGhpbG9zb3BoeSIgaHJlZj0iaHR0cHM6Ly9lbi53aWtpcGVkaWEub3JnL3dpa2kvUGhpbG9zb3BoeSI+cGhpbG9zb3BoeTwvYT4sJm5ic3A7PGEgc3R5bGU9InRleHQtZGVjb3JhdGlvbi1saW5lOiBub25lOyBjb2xvcjogIzA2NDVhZDsgYmFja2dyb3VuZDogbm9uZTsgdXNlci1zZWxlY3Q6IGF1dG87IiB0aXRsZT0iUmVsaWdpb24iIGhyZWY9Imh0dHBzOi8vZW4ud2lraXBlZGlhLm9yZy93aWtpL1JlbGlnaW9uIj5yZWxpZ2lvbjwvYT4sIGFuZCZuYnNwOzxhIHN0eWxlPSJ0ZXh0LWRlY29yYXRpb24tbGluZTogbm9uZTsgY29sb3I6ICMwNjQ1YWQ7IGJhY2tncm91bmQ6IG5vbmU7IHVzZXItc2VsZWN0OiBhdXRvOyIgdGl0bGU9IkFydCIgaHJlZj0iaHR0cHM6Ly9lbi53aWtpcGVkaWEub3JnL3dpa2kvQXJ0Ij5hcnRzPC9hPiZuYnNwO3RvJm5ic3A7PGEgc3R5bGU9InRleHQtZGVjb3JhdGlvbi1saW5lOiBub25lOyBjb2xvcjogIzA2NDVhZDsgYmFja2dyb3VuZDogbm9uZTsgdXNlci1zZWxlY3Q6IGF1dG87IiB0aXRsZT0iU2NpZW5jZSIgaHJlZj0iaHR0cHM6Ly9lbi53aWtpcGVkaWEub3JnL3dpa2kvU2NpZW5jZSI+c2NpZW5jZTwvYT4sJm5ic3A7PGEgc3R5bGU9InRleHQtZGVjb3JhdGlvbi1saW5lOiBub25lOyBjb2xvcjogIzA2NDVhZDsgYmFja2dyb3VuZDogbm9uZTsgdXNlci1zZWxlY3Q6IGF1dG87IiB0aXRsZT0iUG9saXRpY3MiIGhyZWY9Imh0dHBzOi8vZW4ud2lraXBlZGlhLm9yZy93aWtpL1BvbGl0aWNzIj5wb2xpdGljczwvYT4sIGFuZCZuYnNwOzxhIHN0eWxlPSJ0ZXh0LWRlY29yYXRpb24tbGluZTogbm9uZTsgY29sb3I6ICMwNjQ1YWQ7IGJhY2tncm91bmQ6IG5vbmU7IHVzZXItc2VsZWN0OiBhdXRvOyIgdGl0bGU9IlNwb3J0IiBocmVmPSJodHRwczovL2VuLndpa2lwZWRpYS5vcmcvd2lraS9TcG9ydCI+c3BvcnRzPC9hPi4gT3RoZXJzIGZ1bmN0aW9uIGFzIG1vcmUgcGVyc29uYWwmbmJzcDs8YSBzdHlsZT0idGV4dC1kZWNvcmF0aW9uLWxpbmU6IG5vbmU7IGNvbG9yOiAjMDY0NWFkOyBiYWNrZ3JvdW5kOiBub25lOyB1c2VyLXNlbGVjdDogYXV0bzsiIHRpdGxlPSJPbmxpbmUgZGlhcnkiIGhyZWY9Imh0dHBzOi8vZW4ud2lraXBlZGlhLm9yZy93aWtpL09ubGluZV9kaWFyeSI+b25saW5lIGRpYXJpZXM8L2E+Jm5ic3A7b3ImbmJzcDs8YSBzdHlsZT0idGV4dC1kZWNvcmF0aW9uLWxpbmU6IG5vbmU7IGNvbG9yOiAjMDY0NWFkOyBiYWNrZ3JvdW5kOiBub25lOyB1c2VyLXNlbGVjdDogYXV0bzsiIHRpdGxlPSJPbmxpbmUgYWR2ZXJ0aXNpbmciIGhyZWY9Imh0dHBzOi8vZW4ud2lraXBlZGlhLm9yZy93aWtpL09ubGluZV9hZHZlcnRpc2luZyI+b25saW5lIGJyYW5kIGFkdmVydGlzaW5nPC9hPiZuYnNwO29mIGEgcGFydGljdWxhciBpbmRpdmlkdWFsIG9yIGNvbXBhbnkuIEEgdHlwaWNhbCBibG9nIGNvbWJpbmVzIHRleHQsJm5ic3A7PGEgc3R5bGU9InRleHQtZGVjb3JhdGlvbi1saW5lOiBub25lOyBjb2xvcjogIzA2NDVhZDsgYmFja2dyb3VuZDogbm9uZTsgdXNlci1zZWxlY3Q6IGF1dG87IiB0aXRsZT0iRGlnaXRhbCBpbWFnZSIgaHJlZj0iaHR0cHM6Ly9lbi53aWtpcGVkaWEub3JnL3dpa2kvRGlnaXRhbF9pbWFnZSI+ZGlnaXRhbCBpbWFnZXM8L2E+LCBhbmQmbmJzcDs8YSBzdHlsZT0idGV4dC1kZWNvcmF0aW9uLWxpbmU6IG5vbmU7IGNvbG9yOiAjMDY0NWFkOyBiYWNrZ3JvdW5kOiBub25lOyB1c2VyLXNlbGVjdDogYXV0bzsiIHRpdGxlPSJIeXBlcmxpbmsiIGhyZWY9Imh0dHBzOi8vZW4ud2lraXBlZGlhLm9yZy93aWtpL0h5cGVybGluayI+bGlua3M8L2E+Jm5ic3A7dG8gb3RoZXIgYmxvZ3MsIHdlYiBwYWdlcywgYW5kIG90aGVyIG1lZGlhIHJlbGF0ZWQgdG8gaXRzIHRvcGljLiBUaGUgYWJpbGl0eSBvZiByZWFkZXJzIHRvIGxlYXZlIHB1YmxpY2x5IHZpZXdhYmxlIGNvbW1lbnRzLCBhbmQgaW50ZXJhY3Qgd2l0aCBvdGhlciBjb21tZW50ZXJzLCBpcyBhbiBpbXBvcnRhbnQgY29udHJpYnV0aW9uIHRvIHRoZSBwb3B1bGFyaXR5IG9mIG1hbnkgYmxvZ3MuIEhvd2V2ZXIsIGJsb2cgb3duZXJzIG9yIGF1dGhvcnMgb2Z0ZW4mbmJzcDs8YSBzdHlsZT0idGV4dC1kZWNvcmF0aW9uLWxpbmU6IG5vbmU7IGNvbG9yOiAjMDY0NWFkOyBiYWNrZ3JvdW5kOiBub25lOyB1c2VyLXNlbGVjdDogYXV0bzsiIHRpdGxlPSJJbnRlcm5ldCBmb3J1bSIgaHJlZj0iaHR0cHM6Ly9lbi53aWtpcGVkaWEub3JnL3dpa2kvSW50ZXJuZXRfZm9ydW0jTW9kZXJhdG9ycyI+bW9kZXJhdGU8L2E+Jm5ic3A7YW5kJm5ic3A7PGEgc3R5bGU9InRleHQtZGVjb3JhdGlvbi1saW5lOiBub25lOyBjb2xvcjogIzA2NDVhZDsgYmFja2dyb3VuZDogbm9uZTsgdXNlci1zZWxlY3Q6IGF1dG87IiB0aXRsZT0iV29yZGZpbHRlciIgaHJlZj0iaHR0cHM6Ly9lbi53aWtpcGVkaWEub3JnL3dpa2kvV29yZGZpbHRlciI+ZmlsdGVyPC9hPiZuYnNwO29ubGluZSBjb21tZW50cyB0byByZW1vdmUmbmJzcDs8YSBzdHlsZT0idGV4dC1kZWNvcmF0aW9uLWxpbmU6IG5vbmU7IGNvbG9yOiAjMDY0NWFkOyBiYWNrZ3JvdW5kOiBub25lOyB1c2VyLXNlbGVjdDogYXV0bzsiIHRpdGxlPSJIYXRlIHNwZWVjaCIgaHJlZj0iaHR0cHM6Ly9lbi53aWtpcGVkaWEub3JnL3dpa2kvSGF0ZV9zcGVlY2giPmhhdGUgc3BlZWNoPC9hPiZuYnNwO29yIG90aGVyIG9mZmVuc2l2ZSBjb250ZW50LiBNb3N0IGJsb2dzIGFyZSBwcmltYXJpbHkgdGV4dHVhbCwgYWx0aG91Z2ggc29tZSBmb2N1cyBvbiBhcnQgKDxlbSBzdHlsZT0idXNlci1zZWxlY3Q6IGF1dG87Ij48YSBzdHlsZT0idGV4dC1kZWNvcmF0aW9uLWxpbmU6IG5vbmU7IGNvbG9yOiAjMDY0NWFkOyBiYWNrZ3JvdW5kOiBub25lOyB1c2VyLXNlbGVjdDogYXV0bzsiIHRpdGxlPSJBcnQgYmxvZyIgaHJlZj0iaHR0cHM6Ly9lbi53aWtpcGVkaWEub3JnL3dpa2kvQXJ0X2Jsb2ciPmFydCBibG9nczwvYT48L2VtPiksIHBob3RvZ3JhcGhzICg8ZW0gc3R5bGU9InVzZXItc2VsZWN0OiBhdXRvOyI+PGEgc3R5bGU9InRleHQtZGVjb3JhdGlvbi1saW5lOiBub25lOyBjb2xvcjogIzA2NDVhZDsgYmFja2dyb3VuZDogbm9uZTsgdXNlci1zZWxlY3Q6IGF1dG87IiB0aXRsZT0iUGhvdG9ibG9nIiBocmVmPSJodHRwczovL2VuLndpa2lwZWRpYS5vcmcvd2lraS9QaG90b2Jsb2ciPnBob3RvYmxvZ3M8L2E+PC9lbT4pLCB2aWRlb3MgKDxlbSBzdHlsZT0idXNlci1zZWxlY3Q6IGF1dG87Ij48YSBjbGFzcz0ibXctcmVkaXJlY3QiIHN0eWxlPSJ0ZXh0LWRlY29yYXRpb24tbGluZTogbm9uZTsgY29sb3I6ICMwNjQ1YWQ7IGJhY2tncm91bmQ6IG5vbmU7IHVzZXItc2VsZWN0OiBhdXRvOyIgdGl0bGU9IlZpZGVvIGJsb2ciIGhyZWY9Imh0dHBzOi8vZW4ud2lraXBlZGlhLm9yZy93aWtpL1ZpZGVvX2Jsb2ciPnZpZGVvIGJsb2dzPC9hPjwvZW0+Jm5ic3A7b3IgIjxlbSBzdHlsZT0idXNlci1zZWxlY3Q6IGF1dG87Ij52bG9nczwvZW0+IiksIG11c2ljICg8ZW0gc3R5bGU9InVzZXItc2VsZWN0OiBhdXRvOyI+PGEgc3R5bGU9InRleHQtZGVjb3JhdGlvbi1saW5lOiBub25lOyBjb2xvcjogIzA2NDVhZDsgYmFja2dyb3VuZDogbm9uZTsgdXNlci1zZWxlY3Q6IGF1dG87IiB0aXRsZT0iTVAzIGJsb2ciIGhyZWY9Imh0dHBzOi8vZW4ud2lraXBlZGlhLm9yZy93aWtpL01QM19ibG9nIj5NUDMgYmxvZ3M8L2E+PC9lbT4pLCBhbmQgYXVkaW8gKDxlbSBzdHlsZT0idXNlci1zZWxlY3Q6IGF1dG87Ij48YSBzdHlsZT0idGV4dC1kZWNvcmF0aW9uLWxpbmU6IG5vbmU7IGNvbG9yOiAjMDY0NWFkOyBiYWNrZ3JvdW5kOiBub25lOyB1c2VyLXNlbGVjdDogYXV0bzsiIHRpdGxlPSJQb2RjYXN0IiBocmVmPSJodHRwczovL2VuLndpa2lwZWRpYS5vcmcvd2lraS9Qb2RjYXN0Ij5wb2RjYXN0czwvYT48L2VtPikuIEluIGVkdWNhdGlvbiwgYmxvZ3MgY2FuIGJlIHVzZWQgYXMgaW5zdHJ1Y3Rpb25hbCByZXNvdXJjZXM7IHRoZXNlIGFyZSByZWZlcnJlZCB0byBhcyZuYnNwOzxlbSBzdHlsZT0idXNlci1zZWxlY3Q6IGF1dG87Ij48YSBzdHlsZT0idGV4dC1kZWNvcmF0aW9uLWxpbmU6IG5vbmU7IGNvbG9yOiAjMDY0NWFkOyBiYWNrZ3JvdW5kOiBub25lOyB1c2VyLXNlbGVjdDogYXV0bzsiIHRpdGxlPSJFZHVibG9nIiBocmVmPSJodHRwczovL2VuLndpa2lwZWRpYS5vcmcvd2lraS9FZHVibG9nIj5lZHVibG9nczwvYT48L2VtPi4mbmJzcDs8YSBzdHlsZT0idGV4dC1kZWNvcmF0aW9uLWxpbmU6IG5vbmU7IGNvbG9yOiAjMDY0NWFkOyBiYWNrZ3JvdW5kOiBub25lOyB1c2VyLXNlbGVjdDogYXV0bzsiIHRpdGxlPSJNaWNyb2Jsb2dnaW5nIiBocmVmPSJodHRwczovL2VuLndpa2lwZWRpYS5vcmcvd2lraS9NaWNyb2Jsb2dnaW5nIj5NaWNyb2Jsb2dnaW5nPC9hPiZuYnNwO2lzIGFub3RoZXIgdHlwZSBvZiBibG9nZ2luZywgZmVhdHVyaW5nIHZlcnkgc2hvcnQgcG9zdHMuPC9wPg==', '', 14);
INSERT INTO `projects` (`p_id`, `p_title`, `p_category`, `p_problem`, `p_description`, `file_path`, `a_id`) VALUES
(54, 'peak days', 'website', 'solving big ', 'PHAgc3R5bGU9Im1hcmdpbjogMC41ZW0gMHB4OyB1c2VyLXNlbGVjdDogYXV0bzsgY29sb3I6ICMyMDIxMjI7IGZvbnQtZmFtaWx5OiBzYW5zLXNlcmlmOyBmb250LXNpemU6IDE0cHg7IGJhY2tncm91bmQtY29sb3I6ICNmZmZmZmY7Ij4mbmJzcDs8L3A+DQo8cCBzdHlsZT0ibWFyZ2luOiAwLjVlbSAwcHg7IHVzZXItc2VsZWN0OiBhdXRvOyBjb2xvcjogIzIwMjEyMjsgZm9udC1mYW1pbHk6IHNhbnMtc2VyaWY7IGZvbnQtc2l6ZTogMTRweDsgYmFja2dyb3VuZC1jb2xvcjogI2ZmZmZmZjsiPlRoZSBlbWVyZ2VuY2UgYW5kIGdyb3d0aCBvZiBibG9ncyBpbiB0aGUgbGF0ZSAxOTkwcyBjb2luY2lkZWQgd2l0aCB0aGUgYWR2ZW50IG9mIHdlYiBwdWJsaXNoaW5nIHRvb2xzIHRoYXQgZmFjaWxpdGF0ZWQgdGhlIHBvc3Rpbmcgb2YgY29udGVudCBieSBub24tdGVjaG5pY2FsIHVzZXJzIHdobyBkaWQgbm90IGhhdmUgbXVjaCBleHBlcmllbmNlIHdpdGgmbmJzcDs8YSBzdHlsZT0idGV4dC1kZWNvcmF0aW9uLWxpbmU6IG5vbmU7IGNvbG9yOiAjMDY0NWFkOyBiYWNrZ3JvdW5kOiBub25lOyB1c2VyLXNlbGVjdDogYXV0bzsiIHRpdGxlPSJIVE1MIiBocmVmPSJodHRwczovL2VuLndpa2lwZWRpYS5vcmcvd2lraS9IVE1MIj5IVE1MPC9hPiZuYnNwO29yJm5ic3A7PGEgc3R5bGU9InRleHQtZGVjb3JhdGlvbi1saW5lOiBub25lOyBjb2xvcjogIzA2NDVhZDsgYmFja2dyb3VuZDogbm9uZTsgdXNlci1zZWxlY3Q6IGF1dG87IiB0aXRsZT0iQ29tcHV0ZXIgcHJvZ3JhbW1pbmciIGhyZWY9Imh0dHBzOi8vZW4ud2lraXBlZGlhLm9yZy93aWtpL0NvbXB1dGVyX3Byb2dyYW1taW5nIj5jb21wdXRlciBwcm9ncmFtbWluZzwvYT4uIFByZXZpb3VzbHksIGEga25vd2xlZGdlIG9mIHN1Y2ggdGVjaG5vbG9naWVzIGFzIEhUTUwgYW5kJm5ic3A7PGEgc3R5bGU9InRleHQtZGVjb3JhdGlvbi1saW5lOiBub25lOyBjb2xvcjogIzA2NDVhZDsgYmFja2dyb3VuZDogbm9uZTsgdXNlci1zZWxlY3Q6IGF1dG87IiB0aXRsZT0iRmlsZSBUcmFuc2ZlciBQcm90b2NvbCIgaHJlZj0iaHR0cHM6Ly9lbi53aWtpcGVkaWEub3JnL3dpa2kvRmlsZV9UcmFuc2Zlcl9Qcm90b2NvbCI+RmlsZSBUcmFuc2ZlciBQcm90b2NvbDwvYT4mbmJzcDtoYWQgYmVlbiByZXF1aXJlZCB0byBwdWJsaXNoIGNvbnRlbnQgb24gdGhlIFdlYiwgYW5kIGVhcmx5IFdlYiB1c2VycyB0aGVyZWZvcmUgdGVuZGVkIHRvIGJlJm5ic3A7PGEgc3R5bGU9InRleHQtZGVjb3JhdGlvbi1saW5lOiBub25lOyBjb2xvcjogIzA2NDVhZDsgYmFja2dyb3VuZDogbm9uZTsgdXNlci1zZWxlY3Q6IGF1dG87IiB0aXRsZT0iSGFja2VyIiBocmVmPSJodHRwczovL2VuLndpa2lwZWRpYS5vcmcvd2lraS9IYWNrZXIiPmhhY2tlcnM8L2E+Jm5ic3A7YW5kIGNvbXB1dGVyIGVudGh1c2lhc3RzLiBJbiB0aGUgMjAxMHMsIHRoZSBtYWpvcml0eSBhcmUgaW50ZXJhY3RpdmUmbmJzcDs8YSBzdHlsZT0idGV4dC1kZWNvcmF0aW9uLWxpbmU6IG5vbmU7IGNvbG9yOiAjMDY0NWFkOyBiYWNrZ3JvdW5kOiBub25lOyB1c2VyLXNlbGVjdDogYXV0bzsiIHRpdGxlPSJXZWIgMi4wIiBocmVmPSJodHRwczovL2VuLndpa2lwZWRpYS5vcmcvd2lraS9XZWJfMi4wIj5XZWIgMi4wPC9hPiZuYnNwO3dlYnNpdGVzLCBhbGxvd2luZyB2aXNpdG9ycyB0byBsZWF2ZSBvbmxpbmUgY29tbWVudHMsIGFuZCBpdCBpcyB0aGlzIGludGVyYWN0aXZpdHkgdGhhdCBkaXN0aW5ndWlzaGVzIHRoZW0gZnJvbSBvdGhlciBzdGF0aWMgd2Vic2l0ZXMuPHN1cCBpZD0iY2l0ZV9yZWYtMiIgY2xhc3M9InJlZmVyZW5jZSIgc3R5bGU9ImxpbmUtaGVpZ2h0OiAxOyB1bmljb2RlLWJpZGk6IGlzb2xhdGU7IHdoaXRlLXNwYWNlOiBub3dyYXA7IGZvbnQtc2l6ZTogMTEuMnB4OyB1c2VyLXNlbGVjdDogYXV0bzsiPjxhIHN0eWxlPSJ0ZXh0LWRlY29yYXRpb24tbGluZTogbm9uZTsgY29sb3I6ICMwNjQ1YWQ7IGJhY2tncm91bmQ6IG5vbmU7IHVzZXItc2VsZWN0OiBhdXRvOyIgaHJlZj0iaHR0cHM6Ly9lbi53aWtpcGVkaWEub3JnL3dpa2kvQmxvZyNjaXRlX25vdGUtMiI+WzJdPC9hPjwvc3VwPiZuYnNwO0luIHRoYXQgc2Vuc2UsIGJsb2dnaW5nIGNhbiBiZSBzZWVuIGFzIGEgZm9ybSBvZiZuYnNwOzxhIHN0eWxlPSJ0ZXh0LWRlY29yYXRpb24tbGluZTogbm9uZTsgY29sb3I6ICMwNjQ1YWQ7IGJhY2tncm91bmQ6IG5vbmU7IHVzZXItc2VsZWN0OiBhdXRvOyIgdGl0bGU9IlNvY2lhbCBuZXR3b3JraW5nIHNlcnZpY2UiIGhyZWY9Imh0dHBzOi8vZW4ud2lraXBlZGlhLm9yZy93aWtpL1NvY2lhbF9uZXR3b3JraW5nX3NlcnZpY2UiPnNvY2lhbCBuZXR3b3JraW5nIHNlcnZpY2U8L2E+LiBJbmRlZWQsIGJsb2dnZXJzIG5vdCBvbmx5IHByb2R1Y2UgY29udGVudCB0byBwb3N0IG9uIHRoZWlyIGJsb2dzIGJ1dCBhbHNvIG9mdGVuIGJ1aWxkIHNvY2lhbCByZWxhdGlvbnMgd2l0aCB0aGVpciByZWFkZXJzIGFuZCBvdGhlciBibG9nZ2Vycy48c3VwIGlkPSJjaXRlX3JlZi0zIiBjbGFzcz0icmVmZXJlbmNlIiBzdHlsZT0ibGluZS1oZWlnaHQ6IDE7IHVuaWNvZGUtYmlkaTogaXNvbGF0ZTsgd2hpdGUtc3BhY2U6IG5vd3JhcDsgZm9udC1zaXplOiAxMS4ycHg7IHVzZXItc2VsZWN0OiBhdXRvOyI+PGEgc3R5bGU9InRleHQtZGVjb3JhdGlvbi1saW5lOiBub25lOyBjb2xvcjogIzA2NDVhZDsgYmFja2dyb3VuZDogbm9uZTsgdXNlci1zZWxlY3Q6IGF1dG87IiBocmVmPSJodHRwczovL2VuLndpa2lwZWRpYS5vcmcvd2lraS9CbG9nI2NpdGVfbm90ZS0zIj5bM108L2E+PC9zdXA+Jm5ic3A7SG93ZXZlciwgdGhlcmUgYXJlIGhpZ2gtcmVhZGVyc2hpcCBibG9ncyB3aGljaCBkbyBub3QgYWxsb3cgY29tbWVudHMuPC9wPg0KPHAgc3R5bGU9Im1hcmdpbjogMC41ZW0gMHB4OyB1c2VyLXNlbGVjdDogYXV0bzsgY29sb3I6ICMyMDIxMjI7IGZvbnQtZmFtaWx5OiBzYW5zLXNlcmlmOyBmb250LXNpemU6IDE0cHg7IGJhY2tncm91bmQtY29sb3I6ICNmZmZmZmY7Ij5NYW55IGJsb2dzIHByb3ZpZGUgY29tbWVudGFyeSBvbiBhIHBhcnRpY3VsYXIgc3ViamVjdCBvciB0b3BpYywgcmFuZ2luZyBmcm9tJm5ic3A7PGEgc3R5bGU9InRleHQtZGVjb3JhdGlvbi1saW5lOiBub25lOyBjb2xvcjogIzA2NDVhZDsgYmFja2dyb3VuZDogbm9uZTsgdXNlci1zZWxlY3Q6IGF1dG87IiB0aXRsZT0iUGhpbG9zb3BoeSIgaHJlZj0iaHR0cHM6Ly9lbi53aWtpcGVkaWEub3JnL3dpa2kvUGhpbG9zb3BoeSI+cGhpbG9zb3BoeTwvYT4sJm5ic3A7PGEgc3R5bGU9InRleHQtZGVjb3JhdGlvbi1saW5lOiBub25lOyBjb2xvcjogIzA2NDVhZDsgYmFja2dyb3VuZDogbm9uZTsgdXNlci1zZWxlY3Q6IGF1dG87IiB0aXRsZT0iUmVsaWdpb24iIGhyZWY9Imh0dHBzOi8vZW4ud2lraXBlZGlhLm9yZy93aWtpL1JlbGlnaW9uIj5yZWxpZ2lvbjwvYT4sIGFuZCZuYnNwOzxhIHN0eWxlPSJ0ZXh0LWRlY29yYXRpb24tbGluZTogbm9uZTsgY29sb3I6ICMwNjQ1YWQ7IGJhY2tncm91bmQ6IG5vbmU7IHVzZXItc2VsZWN0OiBhdXRvOyIgdGl0bGU9IkFydCIgaHJlZj0iaHR0cHM6Ly9lbi53aWtpcGVkaWEub3JnL3dpa2kvQXJ0Ij5hcnRzPC9hPiZuYnNwO3RvJm5ic3A7PGEgc3R5bGU9InRleHQtZGVjb3JhdGlvbi1saW5lOiBub25lOyBjb2xvcjogIzA2NDVhZDsgYmFja2dyb3VuZDogbm9uZTsgdXNlci1zZWxlY3Q6IGF1dG87IiB0aXRsZT0iU2NpZW5jZSIgaHJlZj0iaHR0cHM6Ly9lbi53aWtpcGVkaWEub3JnL3dpa2kvU2NpZW5jZSI+c2NpZW5jZTwvYT4sJm5ic3A7PGEgc3R5bGU9InRleHQtZGVjb3JhdGlvbi1saW5lOiBub25lOyBjb2xvcjogIzA2NDVhZDsgYmFja2dyb3VuZDogbm9uZTsgdXNlci1zZWxlY3Q6IGF1dG87IiB0aXRsZT0iUG9saXRpY3MiIGhyZWY9Imh0dHBzOi8vZW4ud2lraXBlZGlhLm9yZy93aWtpL1BvbGl0aWNzIj5wb2xpdGljczwvYT4sIGFuZCZuYnNwOzxhIHN0eWxlPSJ0ZXh0LWRlY29yYXRpb24tbGluZTogbm9uZTsgY29sb3I6ICMwNjQ1YWQ7IGJhY2tncm91bmQ6IG5vbmU7IHVzZXItc2VsZWN0OiBhdXRvOyIgdGl0bGU9IlNwb3J0IiBocmVmPSJodHRwczovL2VuLndpa2lwZWRpYS5vcmcvd2lraS9TcG9ydCI+c3BvcnRzPC9hPi4gT3RoZXJzIGZ1bmN0aW9uIGFzIG1vcmUgcGVyc29uYWwmbmJzcDs8YSBzdHlsZT0idGV4dC1kZWNvcmF0aW9uLWxpbmU6IG5vbmU7IGNvbG9yOiAjMDY0NWFkOyBiYWNrZ3JvdW5kOiBub25lOyB1c2VyLXNlbGVjdDogYXV0bzsiIHRpdGxlPSJPbmxpbmUgZGlhcnkiIGhyZWY9Imh0dHBzOi8vZW4ud2lraXBlZGlhLm9yZy93aWtpL09ubGluZV9kaWFyeSI+b25saW5lIGRpYXJpZXM8L2E+Jm5ic3A7b3ImbmJzcDs8YSBzdHlsZT0idGV4dC1kZWNvcmF0aW9uLWxpbmU6IG5vbmU7IGNvbG9yOiAjMDY0NWFkOyBiYWNrZ3JvdW5kOiBub25lOyB1c2VyLXNlbGVjdDogYXV0bzsiIHRpdGxlPSJPbmxpbmUgYWR2ZXJ0aXNpbmciIGhyZWY9Imh0dHBzOi8vZW4ud2lraXBlZGlhLm9yZy93aWtpL09ubGluZV9hZHZlcnRpc2luZyI+b25saW5lIGJyYW5kIGFkdmVydGlzaW5nPC9hPiZuYnNwO29mIGEgcGFydGljdWxhciBpbmRpdmlkdWFsIG9yIGNvbXBhbnkuIEEgdHlwaWNhbCBibG9nIGNvbWJpbmVzIHRleHQsJm5ic3A7PGEgc3R5bGU9InRleHQtZGVjb3JhdGlvbi1saW5lOiBub25lOyBjb2xvcjogIzA2NDVhZDsgYmFja2dyb3VuZDogbm9uZTsgdXNlci1zZWxlY3Q6IGF1dG87IiB0aXRsZT0iRGlnaXRhbCBpbWFnZSIgaHJlZj0iaHR0cHM6Ly9lbi53aWtpcGVkaWEub3JnL3dpa2kvRGlnaXRhbF9pbWFnZSI+ZGlnaXRhbCBpbWFnZXM8L2E+LCBhbmQmbmJzcDs8YSBzdHlsZT0idGV4dC1kZWNvcmF0aW9uLWxpbmU6IG5vbmU7IGNvbG9yOiAjMDY0NWFkOyBiYWNrZ3JvdW5kOiBub25lOyB1c2VyLXNlbGVjdDogYXV0bzsiIHRpdGxlPSJIeXBlcmxpbmsiIGhyZWY9Imh0dHBzOi8vZW4ud2lraXBlZGlhLm9yZy93aWtpL0h5cGVybGluayI+bGlua3M8L2E+Jm5ic3A7dG8gb3RoZXIgYmxvZ3MsIHdlYiBwYWdlcywgYW5kIG90aGVyIG1lZGlhIHJlbGF0ZWQgdG8gaXRzIHRvcGljLiBUaGUgYWJpbGl0eSBvZiByZWFkZXJzIHRvIGxlYXZlIHB1YmxpY2x5IHZpZXdhYmxlIGNvbW1lbnRzLCBhbmQgaW50ZXJhY3Qgd2l0aCBvdGhlciBjb21tZW50ZXJzLCBpcyBhbiBpbXBvcnRhbnQgY29udHJpYnV0aW9uIHRvIHRoZSBwb3B1bGFyaXR5IG9mIG1hbnkgYmxvZ3MuIEhvd2V2ZXIsIGJsb2cgb3duZXJzIG9yIGF1dGhvcnMgb2Z0ZW4mbmJzcDs8YSBzdHlsZT0idGV4dC1kZWNvcmF0aW9uLWxpbmU6IG5vbmU7IGNvbG9yOiAjMDY0NWFkOyBiYWNrZ3JvdW5kOiBub25lOyB1c2VyLXNlbGVjdDogYXV0bzsiIHRpdGxlPSJJbnRlcm5ldCBmb3J1bSIgaHJlZj0iaHR0cHM6Ly9lbi53aWtpcGVkaWEub3JnL3dpa2kvSW50ZXJuZXRfZm9ydW0jTW9kZXJhdG9ycyI+bW9kZXJhdGU8L2E+Jm5ic3A7YW5kJm5ic3A7PGEgc3R5bGU9InRleHQtZGVjb3JhdGlvbi1saW5lOiBub25lOyBjb2xvcjogIzA2NDVhZDsgYmFja2dyb3VuZDogbm9uZTsgdXNlci1zZWxlY3Q6IGF1dG87IiB0aXRsZT0iV29yZGZpbHRlciIgaHJlZj0iaHR0cHM6Ly9lbi53aWtpcGVkaWEub3JnL3dpa2kvV29yZGZpbHRlciI+ZmlsdGVyPC9hPiZuYnNwO29ubGluZSBjb21tZW50cyB0byByZW1vdmUmbmJzcDs8YSBzdHlsZT0idGV4dC1kZWNvcmF0aW9uLWxpbmU6IG5vbmU7IGNvbG9yOiAjMDY0NWFkOyBiYWNrZ3JvdW5kOiBub25lOyB1c2VyLXNlbGVjdDogYXV0bzsiIHRpdGxlPSJIYXRlIHNwZWVjaCIgaHJlZj0iaHR0cHM6Ly9lbi53aWtpcGVkaWEub3JnL3dpa2kvSGF0ZV9zcGVlY2giPmhhdGUgc3BlZWNoPC9hPiZuYnNwO29yIG90aGVyIG9mZmVuc2l2ZSBjb250ZW50LiBNb3N0IGJsb2dzIGFyZSBwcmltYXJpbHkgdGV4dHVhbCwgYWx0aG91Z2ggc29tZSBmb2N1cyBvbiBhcnQgKDxlbSBzdHlsZT0idXNlci1zZWxlY3Q6IGF1dG87Ij48YSBzdHlsZT0idGV4dC1kZWNvcmF0aW9uLWxpbmU6IG5vbmU7IGNvbG9yOiAjMDY0NWFkOyBiYWNrZ3JvdW5kOiBub25lOyB1c2VyLXNlbGVjdDogYXV0bzsiIHRpdGxlPSJBcnQgYmxvZyIgaHJlZj0iaHR0cHM6Ly9lbi53aWtpcGVkaWEub3JnL3dpa2kvQXJ0X2Jsb2ciPmFydCBibG9nczwvYT48L2VtPiksIHBob3RvZ3JhcGhzICg8ZW0gc3R5bGU9InVzZXItc2VsZWN0OiBhdXRvOyI+PGEgc3R5bGU9InRleHQtZGVjb3JhdGlvbi1saW5lOiBub25lOyBjb2xvcjogIzA2NDVhZDsgYmFja2dyb3VuZDogbm9uZTsgdXNlci1zZWxlY3Q6IGF1dG87IiB0aXRsZT0iUGhvdG9ibG9nIiBocmVmPSJodHRwczovL2VuLndpa2lwZWRpYS5vcmcvd2lraS9QaG90b2Jsb2ciPnBob3RvYmxvZ3M8L2E+PC9lbT4pLCB2aWRlb3MgKDxlbSBzdHlsZT0idXNlci1zZWxlY3Q6IGF1dG87Ij48YSBjbGFzcz0ibXctcmVkaXJlY3QiIHN0eWxlPSJ0ZXh0LWRlY29yYXRpb24tbGluZTogbm9uZTsgY29sb3I6ICMwNjQ1YWQ7IGJhY2tncm91bmQ6IG5vbmU7IHVzZXItc2VsZWN0OiBhdXRvOyIgdGl0bGU9IlZpZGVvIGJsb2ciIGhyZWY9Imh0dHBzOi8vZW4ud2lraXBlZGlhLm9yZy93aWtpL1ZpZGVvX2Jsb2ciPnZpZGVvIGJsb2dzPC9hPjwvZW0+Jm5ic3A7b3IgIjxlbSBzdHlsZT0idXNlci1zZWxlY3Q6IGF1dG87Ij52bG9nczwvZW0+IiksIG11c2ljICg8ZW0gc3R5bGU9InVzZXItc2VsZWN0OiBhdXRvOyI+PGEgc3R5bGU9InRleHQtZGVjb3JhdGlvbi1saW5lOiBub25lOyBjb2xvcjogIzA2NDVhZDsgYmFja2dyb3VuZDogbm9uZTsgdXNlci1zZWxlY3Q6IGF1dG87IiB0aXRsZT0iTVAzIGJsb2ciIGhyZWY9Imh0dHBzOi8vZW4ud2lraXBlZGlhLm9yZy93aWtpL01QM19ibG9nIj5NUDMgYmxvZ3M8L2E+PC9lbT4pLCBhbmQgYXVkaW8gKDxlbSBzdHlsZT0idXNlci1zZWxlY3Q6IGF1dG87Ij48YSBzdHlsZT0idGV4dC1kZWNvcmF0aW9uLWxpbmU6IG5vbmU7IGNvbG9yOiAjMDY0NWFkOyBiYWNrZ3JvdW5kOiBub25lOyB1c2VyLXNlbGVjdDogYXV0bzsiIHRpdGxlPSJQb2RjYXN0IiBocmVmPSJodHRwczovL2VuLndpa2lwZWRpYS5vcmcvd2lraS9Qb2RjYXN0Ij5wb2RjYXN0czwvYT48L2VtPikuIEluIGVkdWNhdGlvbiwgYmxvZ3MgY2FuIGJlIHVzZWQgYXMgaW5zdHJ1Y3Rpb25hbCByZXNvdXJjZXM7IHRoZXNlIGFyZSByZWZlcnJlZCB0byBhcyZuYnNwOzxlbSBzdHlsZT0idXNlci1zZWxlY3Q6IGF1dG87Ij48YSBzdHlsZT0idGV4dC1kZWNvcmF0aW9uLWxpbmU6IG5vbmU7IGNvbG9yOiAjMDY0NWFkOyBiYWNrZ3JvdW5kOiBub25lOyB1c2VyLXNlbGVjdDogYXV0bzsiIHRpdGxlPSJFZHVibG9nIiBocmVmPSJodHRwczovL2VuLndpa2lwZWRpYS5vcmcvd2lraS9FZHVibG9nIj5lZHVibG9nczwvYT48L2VtPi4mbmJzcDs8YSBzdHlsZT0idGV4dC1kZWNvcmF0aW9uLWxpbmU6IG5vbmU7IGNvbG9yOiAjMDY0NWFkOyBiYWNrZ3JvdW5kOiBub25lOyB1c2VyLXNlbGVjdDogYXV0bzsiIHRpdGxlPSJNaWNyb2Jsb2dnaW5nIiBocmVmPSJodHRwczovL2VuLndpa2lwZWRpYS5vcmcvd2lraS9NaWNyb2Jsb2dnaW5nIj5NaWNyb2Jsb2dnaW5nPC9hPiZuYnNwO2lzIGFub3RoZXIgdHlwZSBvZiBibG9nZ2luZywgZmVhdHVyaW5nIHZlcnkgc2hvcnQgcG9zdHMuPC9wPg==', '', 14),
(57, 'file', 'software', 'write', 'PGgzIHN0eWxlPSJtYXJnaW46IDAuM2VtIDBweCAwcHg7IHBhZGRpbmctdG9wOiAwLjVlbTsgcGFkZGluZy1ib3R0b206IDBweDsgb3ZlcmZsb3c6IGhpZGRlbjsgZm9udC1zaXplOiAxLjJlbTsgbGluZS1oZWlnaHQ6IDEuNjsgZm9udC1mYW1pbHk6IHNhbnMtc2VyaWY7IGJhY2tncm91bmQtY29sb3I6ICNmZmZmZmY7IHVzZXItc2VsZWN0OiBhdXRvOyI+PHNwYW4gaWQ9Ik9yaWdpbnMiIGNsYXNzPSJtdy1oZWFkbGluZSIgc3R5bGU9InVzZXItc2VsZWN0OiBhdXRvOyI+T3JpZ2luczwvc3Bhbj48L2gzPg0KPHAgc3R5bGU9Im1hcmdpbjogMC41ZW0gMHB4OyB1c2VyLXNlbGVjdDogYXV0bzsgY29sb3I6ICMyMDIxMjI7IGZvbnQtZmFtaWx5OiBzYW5zLXNlcmlmOyBmb250LXNpemU6IDE0cHg7IGJhY2tncm91bmQtY29sb3I6ICNmZmZmZmY7Ij5CZWZvcmUgYmxvZ2dpbmcgYmVjYW1lIHBvcHVsYXIsIGRpZ2l0YWwgY29tbXVuaXRpZXMgdG9vayBtYW55IGZvcm1zIGluY2x1ZGluZyZuYnNwOzxhIHN0eWxlPSJ0ZXh0LWRlY29yYXRpb24tbGluZTogbm9uZTsgY29sb3I6ICMwNjQ1YWQ7IGJhY2tncm91bmQ6IG5vbmU7IHVzZXItc2VsZWN0OiBhdXRvOyIgdGl0bGU9IlVzZW5ldCIgaHJlZj0iaHR0cHM6Ly9lbi53aWtpcGVkaWEub3JnL3dpa2kvVXNlbmV0Ij5Vc2VuZXQ8L2E+LCBjb21tZXJjaWFsIG9ubGluZSBzZXJ2aWNlcyBzdWNoIGFzJm5ic3A7PGEgc3R5bGU9InRleHQtZGVjb3JhdGlvbi1saW5lOiBub25lOyBjb2xvcjogIzA2NDVhZDsgYmFja2dyb3VuZDogbm9uZTsgdXNlci1zZWxlY3Q6IGF1dG87IiB0aXRsZT0iR0VuaWUiIGhyZWY9Imh0dHBzOi8vZW4ud2lraXBlZGlhLm9yZy93aWtpL0dFbmllIj5HRW5pZTwvYT4sJm5ic3A7PGEgc3R5bGU9InRleHQtZGVjb3JhdGlvbi1saW5lOiBub25lOyBjb2xvcjogIzA2NDVhZDsgYmFja2dyb3VuZDogbm9uZTsgdXNlci1zZWxlY3Q6IGF1dG87IiB0aXRsZT0iQnl0ZSBJbmZvcm1hdGlvbiBFeGNoYW5nZSIgaHJlZj0iaHR0cHM6Ly9lbi53aWtpcGVkaWEub3JnL3dpa2kvQnl0ZV9JbmZvcm1hdGlvbl9FeGNoYW5nZSI+Qnl0ZSBJbmZvcm1hdGlvbiBFeGNoYW5nZTwvYT4mbmJzcDsoQklYKSBhbmQgdGhlIGVhcmx5Jm5ic3A7PGEgc3R5bGU9InRleHQtZGVjb3JhdGlvbi1saW5lOiBub25lOyBjb2xvcjogIzA2NDVhZDsgYmFja2dyb3VuZDogbm9uZTsgdXNlci1zZWxlY3Q6IGF1dG87IiB0aXRsZT0iQ29tcHVTZXJ2ZSIgaHJlZj0iaHR0cHM6Ly9lbi53aWtpcGVkaWEub3JnL3dpa2kvQ29tcHVTZXJ2ZSI+Q29tcHVTZXJ2ZTwvYT4sJm5ic3A7PGEgc3R5bGU9InRleHQtZGVjb3JhdGlvbi1saW5lOiBub25lOyBjb2xvcjogIzA2NDVhZDsgYmFja2dyb3VuZDogbm9uZTsgdXNlci1zZWxlY3Q6IGF1dG87IiB0aXRsZT0iRWxlY3Ryb25pYyBtYWlsaW5nIGxpc3QiIGhyZWY9Imh0dHBzOi8vZW4ud2lraXBlZGlhLm9yZy93aWtpL0VsZWN0cm9uaWNfbWFpbGluZ19saXN0Ij5lLW1haWwgbGlzdHM8L2E+LDxzdXAgaWQ9ImNpdGVfcmVmLTE0IiBjbGFzcz0icmVmZXJlbmNlIiBzdHlsZT0ibGluZS1oZWlnaHQ6IDE7IHVuaWNvZGUtYmlkaTogaXNvbGF0ZTsgd2hpdGUtc3BhY2U6IG5vd3JhcDsgZm9udC1zaXplOiAxMS4ycHg7IHVzZXItc2VsZWN0OiBhdXRvOyI+PGEgc3R5bGU9InRleHQtZGVjb3JhdGlvbi1saW5lOiBub25lOyBjb2xvcjogIzA2NDVhZDsgYmFja2dyb3VuZDogbm9uZTsgdXNlci1zZWxlY3Q6IGF1dG87IiBocmVmPSJodHRwczovL2VuLndpa2lwZWRpYS5vcmcvd2lraS9CbG9nI2NpdGVfbm90ZS0xNCI+WzE0XTwvYT48L3N1cD4mbmJzcDthbmQmbmJzcDs8YSBjbGFzcz0ibXctcmVkaXJlY3QiIHN0eWxlPSJ0ZXh0LWRlY29yYXRpb24tbGluZTogbm9uZTsgY29sb3I6ICMwNjQ1YWQ7IGJhY2tncm91bmQ6IG5vbmU7IHVzZXItc2VsZWN0OiBhdXRvOyIgdGl0bGU9IkJ1bGxldGluIEJvYXJkIFN5c3RlbSIgaHJlZj0iaHR0cHM6Ly9lbi53aWtpcGVkaWEub3JnL3dpa2kvQnVsbGV0aW5fQm9hcmRfU3lzdGVtIj5CdWxsZXRpbiBCb2FyZCBTeXN0ZW1zPC9hPiZuYnNwOyhCQlMpLiBJbiB0aGUgMTk5MHMsJm5ic3A7PGEgc3R5bGU9InRleHQtZGVjb3JhdGlvbi1saW5lOiBub25lOyBjb2xvcjogIzA2NDVhZDsgYmFja2dyb3VuZDogbm9uZTsgdXNlci1zZWxlY3Q6IGF1dG87IiB0aXRsZT0iSW50ZXJuZXQgZm9ydW0iIGhyZWY9Imh0dHBzOi8vZW4ud2lraXBlZGlhLm9yZy93aWtpL0ludGVybmV0X2ZvcnVtIj5JbnRlcm5ldCBmb3J1bTwvYT4mbmJzcDtzb2Z0d2FyZSBjcmVhdGVkIHJ1bm5pbmcgY29udmVyc2F0aW9ucyB3aXRoICJ0aHJlYWRzIi4gVGhyZWFkcyBhcmUgdG9waWNhbCBjb25uZWN0aW9ucyBiZXR3ZWVuIG1lc3NhZ2VzIG9uIGEgdmlydHVhbCAiPGEgc3R5bGU9InRleHQtZGVjb3JhdGlvbi1saW5lOiBub25lOyBjb2xvcjogIzA2NDVhZDsgYmFja2dyb3VuZDogbm9uZTsgdXNlci1zZWxlY3Q6IGF1dG87IiB0aXRsZT0iQnVsbGV0aW4gYm9hcmQiIGhyZWY9Imh0dHBzOi8vZW4ud2lraXBlZGlhLm9yZy93aWtpL0J1bGxldGluX2JvYXJkIj5jb3JrYm9hcmQ8L2E+Ii4gRnJvbSBKdW5lIDE0LCAxOTkzLCBNb3NhaWMgQ29tbXVuaWNhdGlvbnMgQ29ycG9yYXRpb24gbWFpbnRhaW5lZCB0aGVpciAiV2hhdCdzIE5ldyI8c3VwIGlkPSJjaXRlX3JlZi0xNSIgY2xhc3M9InJlZmVyZW5jZSIgc3R5bGU9ImxpbmUtaGVpZ2h0OiAxOyB1bmljb2RlLWJpZGk6IGlzb2xhdGU7IHdoaXRlLXNwYWNlOiBub3dyYXA7IGZvbnQtc2l6ZTogMTEuMnB4OyB1c2VyLXNlbGVjdDogYXV0bzsiPjxhIHN0eWxlPSJ0ZXh0LWRlY29yYXRpb24tbGluZTogbm9uZTsgY29sb3I6ICMwNjQ1YWQ7IGJhY2tncm91bmQ6IG5vbmU7IHVzZXItc2VsZWN0OiBhdXRvOyIgaHJlZj0iaHR0cHM6Ly9lbi53aWtpcGVkaWEub3JnL3dpa2kvQmxvZyNjaXRlX25vdGUtMTUiPlsxNV08L2E+PC9zdXA+Jm5ic3A7bGlzdCBvZiBuZXcgd2Vic2l0ZXMsIHVwZGF0ZWQgZGFpbHkgYW5kIGFyY2hpdmVkIG1vbnRobHkuIFRoZSBwYWdlIHdhcyBhY2Nlc3NpYmxlIGJ5IGEgc3BlY2lhbCAiV2hhdCdzIE5ldyIgYnV0dG9uIGluIHRoZSBNb3NhaWMgd2ViIGJyb3dzZXIuPC9wPg0KPHAgc3R5bGU9Im1hcmdpbjogMC41ZW0gMHB4OyB1c2VyLXNlbGVjdDogYXV0bzsgY29sb3I6ICMyMDIxMjI7IGZvbnQtZmFtaWx5OiBzYW5zLXNlcmlmOyBmb250LXNpemU6IDE0cHg7IGJhY2tncm91bmQtY29sb3I6ICNmZmZmZmY7Ij5UaGUgZWFybGllc3QgaW5zdGFuY2Ugb2YgYSBjb21tZXJjaWFsIGJsb2cgd2FzIG9uIHRoZSBmaXJzdCZuYnNwOzxhIGNsYXNzPSJtdy1yZWRpcmVjdCIgc3R5bGU9InRleHQtZGVjb3JhdGlvbi1saW5lOiBub25lOyBjb2xvcjogIzA2NDVhZDsgYmFja2dyb3VuZDogbm9uZTsgdXNlci1zZWxlY3Q6IGF1dG87IiB0aXRsZT0iQnVzaW5lc3MgdG8gY29uc3VtZXIiIGhyZWY9Imh0dHBzOi8vZW4ud2lraXBlZGlhLm9yZy93aWtpL0J1c2luZXNzX3RvX2NvbnN1bWVyIj5idXNpbmVzcyB0byBjb25zdW1lcjwvYT4mbmJzcDtXZWIgc2l0ZSBjcmVhdGVkIGluIDE5OTUgYnkmbmJzcDs8YSBjbGFzcz0ibXctcmVkaXJlY3QiIHN0eWxlPSJ0ZXh0LWRlY29yYXRpb24tbGluZTogbm9uZTsgY29sb3I6ICMwNjQ1YWQ7IGJhY2tncm91bmQ6IG5vbmU7IHVzZXItc2VsZWN0OiBhdXRvOyIgdGl0bGU9IlR5IEluYyIgaHJlZj0iaHR0cHM6Ly9lbi53aWtpcGVkaWEub3JnL3dpa2kvVHlfSW5jIj5UeSwgSW5jLjwvYT4sIHdoaWNoIGZlYXR1cmVkIGEgYmxvZyBpbiBhIHNlY3Rpb24gY2FsbGVkICJPbmxpbmUgRGlhcnkiLiBUaGUgZW50cmllcyB3ZXJlIG1haW50YWluZWQgYnkgZmVhdHVyZWQmbmJzcDs8YSBzdHlsZT0idGV4dC1kZWNvcmF0aW9uLWxpbmU6IG5vbmU7IGNvbG9yOiAjMDY0NWFkOyBiYWNrZ3JvdW5kOiBub25lOyB1c2VyLXNlbGVjdDogYXV0bzsiIHRpdGxlPSJCZWFuaWUgQmFiaWVzIiBocmVmPSJodHRwczovL2VuLndpa2lwZWRpYS5vcmcvd2lraS9CZWFuaWVfQmFiaWVzIj5CZWFuaWUgQmFiaWVzPC9hPiZuYnNwO3RoYXQgd2VyZSB2b3RlZCBmb3IgbW9udGhseSBieSBXZWIgc2l0ZSB2aXNpdG9ycy48c3VwIGlkPSJjaXRlX3JlZi1CZWFuaWVCYWJpZXNfMTYtMCIgY2xhc3M9InJlZmVyZW5jZSIgc3R5bGU9ImxpbmUtaGVpZ2h0OiAxOyB1bmljb2RlLWJpZGk6IGlzb2xhdGU7IHdoaXRlLXNwYWNlOiBub3dyYXA7IGZvbnQtc2l6ZTogMTEuMnB4OyB1c2VyLXNlbGVjdDogYXV0bzsiPjxhIHN0eWxlPSJ0ZXh0LWRlY29yYXRpb24tbGluZTogbm9uZTsgY29sb3I6ICMwNjQ1YWQ7IGJhY2tncm91bmQ6IG5vbmU7IHVzZXItc2VsZWN0OiBhdXRvOyIgaHJlZj0iaHR0cHM6Ly9lbi53aWtpcGVkaWEub3JnL3dpa2kvQmxvZyNjaXRlX25vdGUtQmVhbmllQmFiaWVzLTE2Ij5bMTZdPC9hPjwvc3VwPjwvcD4NCjxwIHN0eWxlPSJtYXJnaW46IDAuNWVtIDBweDsgdXNlci1zZWxlY3Q6IGF1dG87IGNvbG9yOiAjMjAyMTIyOyBmb250LWZhbWlseTogc2Fucy1zZXJpZjsgZm9udC1zaXplOiAxNHB4OyBiYWNrZ3JvdW5kLWNvbG9yOiAjZmZmZmZmOyI+VGhlIG1vZGVybiBibG9nIGV2b2x2ZWQgZnJvbSB0aGUmbmJzcDs8YSBzdHlsZT0idGV4dC1kZWNvcmF0aW9uLWxpbmU6IG5vbmU7IGNvbG9yOiAjMDY0NWFkOyBiYWNrZ3JvdW5kOiBub25lOyB1c2VyLXNlbGVjdDogYXV0bzsiIHRpdGxlPSJPbmxpbmUgZGlhcnkiIGhyZWY9Imh0dHBzOi8vZW4ud2lraXBlZGlhLm9yZy93aWtpL09ubGluZV9kaWFyeSI+b25saW5lIGRpYXJ5PC9hPiZuYnNwO3doZXJlIHBlb3BsZSB3b3VsZCBrZWVwIGEgcnVubmluZyBhY2NvdW50IG9mIHRoZSBldmVudHMgaW4gdGhlaXIgcGVyc29uYWwgbGl2ZXMuIE1vc3Qgc3VjaCB3cml0ZXJzIGNhbGxlZCB0aGVtc2VsdmVzIGRpYXJpc3RzLCBqb3VybmFsaXN0cywgb3Igam91cm5hbGVycy4mbmJzcDs8YSBzdHlsZT0idGV4dC1kZWNvcmF0aW9uLWxpbmU6IG5vbmU7IGNvbG9yOiAjMDY0NWFkOyBiYWNrZ3JvdW5kOiBub25lOyB1c2VyLXNlbGVjdDogYXV0bzsiIHRpdGxlPSJKdXN0aW4gSGFsbCIgaHJlZj0iaHR0cHM6Ly9lbi53aWtpcGVkaWEub3JnL3dpa2kvSnVzdGluX0hhbGwiPkp1c3RpbiBIYWxsPC9hPiwgd2hvIGJlZ2FuIHBlcnNvbmFsIGJsb2dnaW5nIGluIDE5OTQgd2hpbGUgYSBzdHVkZW50IGF0Jm5ic3A7PGEgc3R5bGU9InRleHQtZGVjb3JhdGlvbi1saW5lOiBub25lOyBjb2xvcjogIzA2NDVhZDsgYmFja2dyb3VuZDogbm9uZTsgdXNlci1zZWxlY3Q6IGF1dG87IiB0aXRsZT0iU3dhcnRobW9yZSBDb2xsZWdlIiBocmVmPSJodHRwczovL2VuLndpa2lwZWRpYS5vcmcvd2lraS9Td2FydGhtb3JlX0NvbGxlZ2UiPlN3YXJ0aG1vcmUgQ29sbGVnZTwvYT4sIGlzIGdlbmVyYWxseSByZWNvZ25pemVkIGFzIG9uZSBvZiB0aGUgZWFybGllciBibG9nZ2Vycyw8c3VwIGlkPSJjaXRlX3JlZi0xNyIgY2xhc3M9InJlZmVyZW5jZSIgc3R5bGU9ImxpbmUtaGVpZ2h0OiAxOyB1bmljb2RlLWJpZGk6IGlzb2xhdGU7IHdoaXRlLXNwYWNlOiBub3dyYXA7IGZvbnQtc2l6ZTogMTEuMnB4OyB1c2VyLXNlbGVjdDogYXV0bzsiPjxhIHN0eWxlPSJ0ZXh0LWRlY29yYXRpb24tbGluZTogbm9uZTsgY29sb3I6ICMwNjQ1YWQ7IGJhY2tncm91bmQ6IG5vbmU7IHVzZXItc2VsZWN0OiBhdXRvOyIgaHJlZj0iaHR0cHM6Ly9lbi53aWtpcGVkaWEub3JnL3dpa2kvQmxvZyNjaXRlX25vdGUtMTciPlsxN108L2E+PC9zdXA+Jm5ic3A7YXMgaXMmbmJzcDs8YSBzdHlsZT0idGV4dC1kZWNvcmF0aW9uLWxpbmU6IG5vbmU7IGNvbG9yOiAjMDY0NWFkOyBiYWNrZ3JvdW5kOiBub25lOyB1c2VyLXNlbGVjdDogYXV0bzsiIHRpdGxlPSJKZXJyeSBQb3VybmVsbGUiIGhyZWY9Imh0dHBzOi8vZW4ud2lraXBlZGlhLm9yZy93aWtpL0plcnJ5X1BvdXJuZWxsZSI+SmVycnkgUG91cm5lbGxlPC9hPi48c3VwIGlkPSJjaXRlX3JlZi0xOCIgY2xhc3M9InJlZmVyZW5jZSIgc3R5bGU9ImxpbmUtaGVpZ2h0OiAxOyB1bmljb2RlLWJpZGk6IGlzb2xhdGU7IHdoaXRlLXNwYWNlOiBub3dyYXA7IGZvbnQtc2l6ZTogMTEuMnB4OyB1c2VyLXNlbGVjdDogYXV0bzsiPjxhIHN0eWxlPSJ0ZXh0LWRlY29yYXRpb24tbGluZTogbm9uZTsgY29sb3I6ICMwNjQ1YWQ7IGJhY2tncm91bmQ6IG5vbmU7IHVzZXItc2VsZWN0OiBhdXRvOyIgaHJlZj0iaHR0cHM6Ly9lbi53aWtpcGVkaWEub3JnL3dpa2kvQmxvZyNjaXRlX25vdGUtMTgiPlsxOF08L2E+PC9zdXA+Jm5ic3A7PGEgc3R5bGU9InRleHQtZGVjb3JhdGlvbi1saW5lOiBub25lOyBjb2xvcjogIzA2NDVhZDsgYmFja2dyb3VuZDogbm9uZTsgdXNlci1zZWxlY3Q6IGF1dG87IiB0aXRsZT0iRGF2ZSBXaW5lciIgaHJlZj0iaHR0cHM6Ly9lbi53aWtpcGVkaWEub3JnL3dpa2kvRGF2ZV9XaW5lciI+RGF2ZSBXaW5lcjwvYT4ncyBTY3JpcHRpbmcgTmV3cyBpcyBhbHNvIGNyZWRpdGVkIHdpdGggYmVpbmcgb25lIG9mIHRoZSBvbGRlciBhbmQgbG9uZ2VyIHJ1bm5pbmcgd2VibG9ncy48c3VwIGlkPSJjaXRlX3JlZi0xOSIgY2xhc3M9InJlZmVyZW5jZSIgc3R5bGU9ImxpbmUtaGVpZ2h0OiAxOyB1bmljb2RlLWJpZGk6IGlzb2xhdGU7IHdoaXRlLXNwYWNlOiBub3dyYXA7IGZvbnQtc2l6ZTogMTEuMnB4OyB1c2VyLXNlbGVjdDogYXV0bzsiPjxhIHN0eWxlPSJ0ZXh0LWRlY29yYXRpb24tbGluZTogbm9uZTsgY29sb3I6ICMwNjQ1YWQ7IGJhY2tncm91bmQ6IG5vbmU7IHVzZXItc2VsZWN0OiBhdXRvOyIgaHJlZj0iaHR0cHM6Ly9lbi53aWtpcGVkaWEub3JnL3dpa2kvQmxvZyNjaXRlX25vdGUtMTkiPlsxOV08L2E+PC9zdXA+PHN1cCBpZD0iY2l0ZV9yZWYtMjAiIGNsYXNzPSJyZWZlcmVuY2UiIHN0eWxlPSJsaW5lLWhlaWdodDogMTsgdW5pY29kZS1iaWRpOiBpc29sYXRlOyB3aGl0ZS1zcGFjZTogbm93cmFwOyBmb250LXNpemU6IDExLjJweDsgdXNlci1zZWxlY3Q6IGF1dG87Ij48YSBzdHlsZT0idGV4dC1kZWNvcmF0aW9uLWxpbmU6IG5vbmU7IGNvbG9yOiAjMDY0NWFkOyBiYWNrZ3JvdW5kOiBub25lOyB1c2VyLXNlbGVjdDogYXV0bzsiIGhyZWY9Imh0dHBzOi8vZW4ud2lraXBlZGlhLm9yZy93aWtpL0Jsb2cjY2l0ZV9ub3RlLTIwIj5bMjBdPC9hPjwvc3VwPiZuYnNwO1RoZSBBdXN0cmFsaWFuIE5ldGd1aWRlIG1hZ2F6aW5lIG1haW50YWluZWQgdGhlIERhaWx5IE5ldCBOZXdzPHN1cCBpZD0iY2l0ZV9yZWYtMjEiIGNsYXNzPSJyZWZlcmVuY2UiIHN0eWxlPSJsaW5lLWhlaWdodDogMTsgdW5pY29kZS1iaWRpOiBpc29sYXRlOyB3aGl0ZS1zcGFjZTogbm93cmFwOyBmb250LXNpemU6IDExLjJweDsgdXNlci1zZWxlY3Q6IGF1dG87Ij48YSBzdHlsZT0idGV4dC1kZWNvcmF0aW9uLWxpbmU6IG5vbmU7IGNvbG9yOiAjMDY0NWFkOyBiYWNrZ3JvdW5kOiBub25lOyB1c2VyLXNlbGVjdDogYXV0bzsiIGhyZWY9Imh0dHBzOi8vZW4ud2lraXBlZGlhLm9yZy93aWtpL0Jsb2cjY2l0ZV9ub3RlLTIxIj5bMjFdPC9hPjwvc3VwPiZuYnNwO29uIHRoZWlyIHdlYiBzaXRlIGZyb20gMTk5Ni4gRGFpbHkgTmV0IE5ld3MgcmFuIGxpbmtzIGFuZCBkYWlseSByZXZpZXdzIG9mIG5ldyB3ZWJzaXRlcywgbW9zdGx5IGluIEF1c3RyYWxpYS48L3A+DQo8cCBzdHlsZT0ibWFyZ2luOiAwLjVlbSAwcHg7IHVzZXItc2VsZWN0OiBhdXRvOyBjb2xvcjogIzIwMjEyMjsgZm9udC1mYW1pbHk6IHNhbnMtc2VyaWY7IGZvbnQtc2l6ZTogMTRweDsgYmFja2dyb3VuZC1jb2xvcjogI2ZmZmZmZjsiPkFub3RoZXIgZWFybHkgYmxvZyB3YXMgV2VhcmFibGUgV2lyZWxlc3MgV2ViY2FtLCBhbiBvbmxpbmUgc2hhcmVkIGRpYXJ5IG9mIGEgcGVyc29uJ3MgcGVyc29uYWwgbGlmZSBjb21iaW5pbmcgdGV4dCwgZGlnaXRhbCB2aWRlbywgYW5kIGRpZ2l0YWwgcGljdHVyZXMgdHJhbnNtaXR0ZWQgbGl2ZSBmcm9tIGEgd2VhcmFibGUgY29tcHV0ZXIgYW5kJm5ic3A7PGEgc3R5bGU9InRleHQtZGVjb3JhdGlvbi1saW5lOiBub25lOyBjb2xvcjogIzA2NDVhZDsgYmFja2dyb3VuZDogbm9uZTsgdXNlci1zZWxlY3Q6IGF1dG87IiB0aXRsZT0iRXllVGFwIiBocmVmPSJodHRwczovL2VuLndpa2lwZWRpYS5vcmcvd2lraS9FeWVUYXAiPkV5ZVRhcDwvYT4mbmJzcDtkZXZpY2UgdG8gYSB3ZWIgc2l0ZSBpbiAxOTk0LiBUaGlzIHByYWN0aWNlIG9mIHNlbWktYXV0b21hdGVkIGJsb2dnaW5nIHdpdGggbGl2ZSB2aWRlbyB0b2dldGhlciB3aXRoIHRleHQgd2FzIHJlZmVycmVkIHRvIGFzJm5ic3A7PGEgc3R5bGU9InRleHQtZGVjb3JhdGlvbi1saW5lOiBub25lOyBjb2xvcjogIzA2NDVhZDsgYmFja2dyb3VuZDogbm9uZTsgdXNlci1zZWxlY3Q6IGF1dG87IiB0aXRsZT0iU291c3ZlaWxsYW5jZSIgaHJlZj0iaHR0cHM6Ly9lbi53aWtpcGVkaWEub3JnL3dpa2kvU291c3ZlaWxsYW5jZSI+c291c3ZlaWxsYW5jZTwvYT4sIGFuZCBzdWNoIGpvdXJuYWxzIHdlcmUgYWxzbyB1c2VkIGFzIGV2aWRlbmNlIGluIGxlZ2FsIG1hdHRlcnMuIFNvbWUgZWFybHkgYmxvZ2dlcnMsIHN1Y2ggYXMgVGhlIE1pc2FudGhyb3BpYyBCaXRjaCwgd2hvIGJlZ2FuIGluIDE5OTcsIGFjdHVhbGx5IHJlZmVycmVkIHRvIHRoZWlyIG9ubGluZSBwcmVzZW5jZSBhcyBhJm5ic3A7PGEgc3R5bGU9InRleHQtZGVjb3JhdGlvbi1saW5lOiBub25lOyBjb2xvcjogIzA2NDVhZDsgYmFja2dyb3VuZDogbm9uZTsgdXNlci1zZWxlY3Q6IGF1dG87IiB0aXRsZT0iWmluZSIgaHJlZj0iaHR0cHM6Ly9lbi53aWtpcGVkaWEub3JnL3dpa2kvWmluZSI+emluZTwvYT4sIGJlZm9yZSB0aGUgdGVybSBibG9nIGVudGVyZWQgY29tbW9uIHVzYWdlLjwvcD4NCjxoMyBzdHlsZT0ibWFyZ2luOiAwLjNlbSAwcHggMHB4OyBwYWRkaW5nLXRvcDogMC41ZW07IHBhZGRpbmctYm90dG9tOiAwcHg7IG92ZXJmbG93OiBoaWRkZW47IGZvbnQtc2l6ZTogMS4yZW07IGxpbmUtaGVpZ2h0OiAxLjY7IGZvbnQtZmFtaWx5OiBzYW5zLXNlcmlmOyBiYWNrZ3JvdW5kLWNvbG9yOiAjZmZmZmZmOyB1c2VyLXNlbGVjdDogYXV0bzsiPjxzcGFuIGlkPSJUZWNobm9sb2d5IiBjbGFzcz0ibXctaGVhZGxpbmUiIHN0eWxlPSJ1c2VyLXNlbGVjdDogYXV0bzsiPlRlY2hub2xvZ3k8L3NwYW4+PC9oMz4NCjxwIHN0eWxlPSJtYXJnaW46IDAuNWVtIDBweDsgdXNlci1zZWxlY3Q6IGF1dG87IGNvbG9yOiAjMjAyMTIyOyBmb250LWZhbWlseTogc2Fucy1zZXJpZjsgZm9udC1zaXplOiAxNHB4OyBiYWNrZ3JvdW5kLWNvbG9yOiAjZmZmZmZmOyI+RWFybHkgYmxvZ3Mgd2VyZSBzaW1wbHkgbWFudWFsbHkgdXBkYXRlZCBjb21wb25lbnRzIG9mIGNvbW1vbiBXZWJzaXRlcy4gSW4gMTk5NSwgdGhlICJPbmxpbmUgRGlhcnkiIG9uIHRoZSZuYnNwOzxhIGNsYXNzPSJtdy1yZWRpcmVjdCIgc3R5bGU9InRleHQtZGVjb3JhdGlvbi1saW5lOiBub25lOyBjb2xvcjogIzA2NDVhZDsgYmFja2dyb3VuZDogbm9uZTsgdXNlci1zZWxlY3Q6IGF1dG87IiB0aXRsZT0iVHksIEluYy4iIGhyZWY9Imh0dHBzOi8vZW4ud2lraXBlZGlhLm9yZy93aWtpL1R5LF9JbmMuIj5UeSwgSW5jLjwvYT4mbmJzcDtXZWIgc2l0ZSB3YXMgcHJvZHVjZWQgYW5kIHVwZGF0ZWQgbWFudWFsbHkgYmVmb3JlIGFueSBibG9nZ2luZyBwcm9ncmFtcyB3ZXJlIGF2YWlsYWJsZS4gUG9zdHMgd2VyZSBtYWRlIHRvIGFwcGVhciBpbiByZXZlcnNlIGNocm9ub2xvZ2ljYWwgb3JkZXIgYnkgbWFudWFsbHkgdXBkYXRpbmcgdGV4dCBiYXNlZCZuYnNwOzxhIHN0eWxlPSJ0ZXh0LWRlY29yYXRpb24tbGluZTogbm9uZTsgY29sb3I6ICMwNjQ1YWQ7IGJhY2tncm91bmQ6IG5vbmU7IHVzZXItc2VsZWN0OiBhdXRvOyIgdGl0bGU9IkhUTUwiIGhyZWY9Imh0dHBzOi8vZW4ud2lraXBlZGlhLm9yZy93aWtpL0hUTUwiPkhUTUw8L2E+Jm5ic3A7Y29kZSB1c2luZyZuYnNwOzxhIGNsYXNzPSJtdy1yZWRpcmVjdCIgc3R5bGU9InRleHQtZGVjb3JhdGlvbi1saW5lOiBub25lOyBjb2xvcjogIzA2NDVhZDsgYmFja2dyb3VuZDogbm9uZTsgdXNlci1zZWxlY3Q6IGF1dG87IiB0aXRsZT0iRlRQIiBocmVmPSJodHRwczovL2VuLndpa2lwZWRpYS5vcmcvd2lraS9GVFAiPkZUUDwvYT4mbmJzcDtzb2Z0d2FyZSBpbiByZWFsIHRpbWUgc2V2ZXJhbCB0aW1lcyBhIGRheS4gVG8gdXNlcnMsIHRoaXMgb2ZmZXJlZCB0aGUgYXBwZWFyYW5jZSBvZiBhIGxpdmUgZGlhcnkgdGhhdCBjb250YWluZWQgbXVsdGlwbGUgbmV3IGVudHJpZXMgcGVyIGRheS4gQXQgdGhlIGJlZ2lubmluZyBvZiBlYWNoIG5ldyBkYXksIG5ldyBkaWFyeSBlbnRyaWVzIHdlcmUgbWFudWFsbHkgY29kZWQgaW50byBhIG5ldyBIVE1MIGZpbGUsIGFuZCB0aGUgc3RhcnQgb2YgZWFjaCBtb250aCwgZGlhcnkgZW50cmllcyB3ZXJlIGFyY2hpdmVkIGludG8gaXRzIG93biBmb2xkZXIgd2hpY2ggY29udGFpbmVkIGEgc2VwYXJhdGUgSFRNTCBwYWdlIGZvciBldmVyeSBkYXkgb2YgdGhlIG1vbnRoLiBUaGVuIG1lbnVzIHRoYXQgY29udGFpbmVkIGxpbmtzIHRvIHRoZSBtb3N0IHJlY2VudCBkaWFyeSBlbnRyeSB3ZXJlIHVwZGF0ZWQgbWFudWFsbHkgdGhyb3VnaG91dCB0aGUgc2l0ZS4gVGhpcyB0ZXh0LWJhc2VkIG1ldGhvZCBvZiBvcmdhbml6aW5nIHRob3VzYW5kcyBvZiBmaWxlcyBzZXJ2ZWQgYXMgYSBzcHJpbmdib2FyZCB0byBkZWZpbmUgZnV0dXJlIGJsb2dnaW5nIHN0eWxlcyB0aGF0IHdlcmUgY2FwdHVyZWQgYnkgYmxvZ2dpbmcgc29mdHdhcmUgZGV2ZWxvcGVkIHllYXJzIGxhdGVyLjxzdXAgaWQ9ImNpdGVfcmVmLUJlYW5pZUJhYmllc18xNi0xIiBjbGFzcz0icmVmZXJlbmNlIiBzdHlsZT0ibGluZS1oZWlnaHQ6IDE7IHVuaWNvZGUtYmlkaTogaXNvbGF0ZTsgd2hpdGUtc3BhY2U6IG5vd3JhcDsgZm9udC1zaXplOiAxMS4ycHg7IHVzZXItc2VsZWN0OiBhdXRvOyI+PGEgc3R5bGU9InRleHQtZGVjb3JhdGlvbi1saW5lOiBub25lOyBjb2xvcjogIzA2NDVhZDsgYmFja2dyb3VuZDogbm9uZTsgdXNlci1zZWxlY3Q6IGF1dG87IiBocmVmPSJodHRwczovL2VuLndpa2lwZWRpYS5vcmcvd2lraS9CbG9nI2NpdGVfbm90ZS1CZWFuaWVCYWJpZXMtMTYiPlsxNl08L2E+PC9zdXA+PC9wPg0KPHAgc3R5bGU9Im1hcmdpbjogMC41ZW0gMHB4OyB1c2VyLXNlbGVjdDogYXV0bzsgY29sb3I6ICMyMDIxMjI7IGZvbnQtZmFtaWx5OiBzYW5zLXNlcmlmOyBmb250LXNpemU6IDE0cHg7IGJhY2tncm91bmQtY29sb3I6ICNmZmZmZmY7Ij5UaGUgZXZvbHV0aW9uIG9mIGVsZWN0cm9uaWMgYW5kIHNvZnR3YXJlIHRvb2xzIHRvIGZhY2lsaXRhdGUgdGhlIHByb2R1Y3Rpb24gYW5kIG1haW50ZW5hbmNlIG9mIFdlYiBhcnRpY2xlcyBwb3N0ZWQgaW4gcmV2ZXJzZSBjaHJvbm9sb2dpY2FsIG9yZGVyIG1hZGUgdGhlIHB1Ymxpc2hpbmcgcHJvY2VzcyBmZWFzaWJsZSB0byBhIG11Y2ggbGFyZ2VyIGFuZCBsZXNzIHRlY2huaWNhbGx5LWluY2xpbmVkIHBvcHVsYXRpb24uIFVsdGltYXRlbHksIHRoaXMgcmVzdWx0ZWQgaW4gdGhlIGRpc3RpbmN0IGNsYXNzIG9mIG9ubGluZSBwdWJsaXNoaW5nIHRoYXQgcHJvZHVjZXMgYmxvZ3Mgd2UgcmVjb2duaXplIHRvZGF5LiBGb3IgaW5zdGFuY2UsIHRoZSB1c2Ugb2Ygc29tZSBzb3J0IG9mIGJyb3dzZXItYmFzZWQgc29mdHdhcmUgaXMgbm93IGEgdHlwaWNhbCBhc3BlY3Qgb2YgImJsb2dnaW5nIi4gQmxvZ3MgY2FuIGJlIGhvc3RlZCBieSBkZWRpY2F0ZWQmbmJzcDs8YSBjbGFzcz0ibXctcmVkaXJlY3QiIHN0eWxlPSJ0ZXh0LWRlY29yYXRpb24tbGluZTogbm9uZTsgY29sb3I6ICMwNjQ1YWQ7IGJhY2tncm91bmQ6IG5vbmU7IHVzZXItc2VsZWN0OiBhdXRvOyIgdGl0bGU9IkJsb2cgaG9zdGluZyBzZXJ2aWNlIiBocmVmPSJodHRwczovL2VuLndpa2lwZWRpYS5vcmcvd2lraS9CbG9nX2hvc3Rpbmdfc2VydmljZSI+YmxvZyBob3N0aW5nIHNlcnZpY2VzPC9hPiwgb24gcmVndWxhciZuYnNwOzxhIHN0eWxlPSJ0ZXh0LWRlY29yYXRpb24tbGluZTogbm9uZTsgY29sb3I6ICMwNjQ1YWQ7IGJhY2tncm91bmQ6IG5vbmU7IHVzZXItc2VsZWN0OiBhdXRvOyIgdGl0bGU9IldlYiBob3N0aW5nIHNlcnZpY2UiIGhyZWY9Imh0dHBzOi8vZW4ud2lraXBlZGlhLm9yZy93aWtpL1dlYl9ob3N0aW5nX3NlcnZpY2UiPndlYiBob3N0aW5nIHNlcnZpY2VzPC9hPiwgb3IgcnVuIHVzaW5nIGJsb2cgc29mdHdhcmUuPC9wPg0KPGgzIHN0eWxlPSJtYXJnaW46IDAuM2VtIDBweCAwcHg7IHBhZGRpbmctdG9wOiAwLjVlbTsgcGFkZGluZy1ib3R0b206IDBweDsgb3ZlcmZsb3c6IGhpZGRlbjsgZm9udC1zaXplOiAxLjJlbTsgbGluZS1oZWlnaHQ6IDEuNjsgZm9udC1mYW1pbHk6IHNhbnMtc2VyaWY7IGJhY2tncm91bmQtY29sb3I6ICNmZmZmZmY7IHVzZXItc2VsZWN0OiBhdXRvOyI+PHNwYW4gaWQ9IlJpc2VfaW5fcG9wdWxhcml0eSIgY2xhc3M9Im13LWhlYWRsaW5lIiBzdHlsZT0idXNlci1zZWxlY3Q6IGF1dG87Ij5SaXNlIGluIHBvcHVsYXJpdHk8L3NwYW4+PC9oMz4NCjxwIHN0eWxlPSJtYXJnaW46IDAuNWVtIDBweDsgdXNlci1zZWxlY3Q6IGF1dG87IGNvbG9yOiAjMjAyMTIyOyBmb250LWZhbWlseTogc2Fucy1zZXJpZjsgZm9udC1zaXplOiAxNHB4OyBiYWNrZ3JvdW5kLWNvbG9yOiAjZmZmZmZmOyI+QWZ0ZXIgYSBzbG93IHN0YXJ0LCBibG9nZ2luZyByYXBpZGx5IGdhaW5lZCBpbiBwb3B1bGFyaXR5LiBCbG9nIHVzYWdlIHNwcmVhZCBkdXJpbmcgMTk5OSBhbmQgdGhlIHllYXJzIGZvbGxvd2luZywgYmVpbmcgZnVydGhlciBwb3B1bGFyaXplZCBieSB0aGUgbmVhci1zaW11bHRhbmVvdXMgYXJyaXZhbCBvZiB0aGUgZmlyc3QgaG9zdGVkIGJsb2cgdG9vbHM6PC9wPg0KPHVsIHN0eWxlPSJsaXN0LXN0eWxlLWltYWdlOiB1cmwoJy4uL3cvc2tpbnMvVmVjdG9yL3Jlc291cmNlcy9jb21tb24vaW1hZ2VzL2J1bGxldC1pY29uLnN2Zz9kNDUxNScpOyBtYXJnaW46IDAuM2VtIDBweCAwcHggMS42ZW07IHBhZGRpbmc6IDBweDsgY29sb3I6ICMyMDIxMjI7IGZvbnQtZmFtaWx5OiBzYW5zLXNlcmlmOyBmb250LXNpemU6IDE0cHg7IGJhY2tncm91bmQtY29sb3I6ICNmZmZmZmY7IHVzZXItc2VsZWN0OiBhdXRvOyI+DQo8bGkgc3R5bGU9Im1hcmdpbi1ib3R0b206IDAuMWVtOyB1c2VyLXNlbGVjdDogYXV0bzsiPjxhIHN0eWxlPSJ0ZXh0LWRlY29yYXRpb24tbGluZTogbm9uZTsgY29sb3I6ICMwNjQ1YWQ7IGJhY2tncm91bmQ6IG5vbmU7IHVzZXItc2VsZWN0OiBhdXRvOyIgdGl0bGU9IkJydWNlIEFibGVzb24iIGhyZWY9Imh0dHBzOi8vZW4ud2lraXBlZGlhLm9yZy93aWtpL0JydWNlX0FibGVzb24iPkJydWNlIEFibGVzb248L2E+Jm5ic3A7bGF1bmNoZWQmbmJzcDs8YSBzdHlsZT0idGV4dC1kZWNvcmF0aW9uLWxpbmU6IG5vbmU7IGNvbG9yOiAjMDY0NWFkOyBiYWNrZ3JvdW5kOiBub25lOyB1c2VyLXNlbGVjdDogYXV0bzsiIHRpdGxlPSJPcGVuIERpYXJ5IiBocmVmPSJodHRwczovL2VuLndpa2lwZWRpYS5vcmcvd2lraS9PcGVuX0RpYXJ5Ij5PcGVuIERpYXJ5PC9hPiZuYnNwO2luIE9jdG9iZXIgMTk5OCwgd2hpY2ggc29vbiBncmV3IHRvIHRob3VzYW5kcyBvZiBvbmxpbmUgZGlhcmllcy4gT3BlbiBEaWFyeSBpbm5vdmF0ZWQgdGhlIHJlYWRlciBjb21tZW50LCBiZWNvbWluZyB0aGUgZmlyc3QgYmxvZyBjb21tdW5pdHkgd2hlcmUgcmVhZGVycyBjb3VsZCBhZGQgY29tbWVudHMgdG8gb3RoZXIgd3JpdGVycycgYmxvZyBlbnRyaWVzLjwvbGk+DQo8bGkgc3R5bGU9Im1hcmdpbi1ib3R0b206IDAuMWVtOyB1c2VyLXNlbGVjdDogYXV0bzsiPjxhIHN0eWxlPSJ0ZXh0LWRlY29yYXRpb24tbGluZTogbm9uZTsgY29sb3I6ICMwNjQ1YWQ7IGJhY2tncm91bmQ6IG5vbmU7IHVzZXItc2VsZWN0OiBhdXRvOyIgdGl0bGU9IkJyYWQgRml0enBhdHJpY2siIGhyZWY9Imh0dHBzOi8vZW4ud2lraXBlZGlhLm9yZy93aWtpL0JyYWRfRml0enBhdHJpY2siPkJyYWQgRml0enBhdHJpY2s8L2E+Jm5ic3A7c3RhcnRlZCZuYnNwOzxhIHN0eWxlPSJ0ZXh0LWRlY29yYXRpb24tbGluZTogbm9uZTsgY29sb3I6ICMwNjQ1YWQ7IGJhY2tncm91bmQ6IG5vbmU7IHVzZXItc2VsZWN0OiBhdXRvOyIgdGl0bGU9IkxpdmVKb3VybmFsIiBocmVmPSJodHRwczovL2VuLndpa2lwZWRpYS5vcmcvd2lraS9MaXZlSm91cm5hbCI+TGl2ZUpvdXJuYWw8L2E+Jm5ic3A7aW4gTWFyY2ggMTk5OS48L2xpPg0KPGxpIHN0eWxlPSJtYXJnaW4tYm90dG9tOiAwLjFlbTsgdXNlci1zZWxlY3Q6IGF1dG87Ij5BbmRyZXcgU21hbGVzIGNyZWF0ZWQgUGl0YXMuY29tIGluIEp1bHkgMTk5OSBhcyBhbiBlYXNpZXIgYWx0ZXJuYXRpdmUgdG8gbWFpbnRhaW5pbmcgYSAibmV3cyBwYWdlIiBvbiBhIFdlYiBzaXRlLCBmb2xsb3dlZCBieSBEaWFyeUxhbmQgaW4gU2VwdGVtYmVyIDE5OTksIGZvY3VzaW5nIG1vcmUgb24gYSBwZXJzb25hbCBkaWFyeSBjb21tdW5pdHkuPHN1cCBpZD0iY2l0ZV9yZWYtMjIiIGNsYXNzPSJyZWZlcmVuY2UiIHN0eWxlPSJsaW5lLWhlaWdodDogMTsgdW5pY29kZS1iaWRpOiBpc29sYXRlOyB3aGl0ZS1zcGFjZTogbm93cmFwOyBmb250LXNpemU6IDExLjJweDsgdXNlci1zZWxlY3Q6IGF1dG87Ij48YSBzdHlsZT0idGV4dC1kZWNvcmF0aW9uLWxpbmU6IG5vbmU7IGNvbG9yOiAjMDY0NWFkOyBiYWNrZ3JvdW5kOiBub25lOyB1c2VyLXNlbGVjdDogYXV0bzsiIGhyZWY9Imh0dHBzOi8vZW4ud2lraXBlZGlhLm9yZy93aWtpL0Jsb2cjY2l0ZV9ub3RlLTIyIj5bMjJdPC9hPjwvc3VwPjwvbGk+DQo8bGkgc3R5bGU9Im1hcmdpbi1ib3R0b206IDAuMWVtOyB1c2VyLXNlbGVjdDogYXV0bzsiPjxhIHN0eWxlPSJ0ZXh0LWRlY29yYXRpb24tbGluZTogbm9uZTsgY29sb3I6ICMwNjQ1YWQ7IGJhY2tncm91bmQ6IG5vbmU7IHVzZXItc2VsZWN0OiBhdXRvOyIgdGl0bGU9IkV2YW4gV2lsbGlhbXMgKEludGVybmV0IGVudHJlcHJlbmV1cikiIGhyZWY9Imh0dHBzOi8vZW4ud2lraXBlZGlhLm9yZy93aWtpL0V2YW5fV2lsbGlhbXNfKEludGVybmV0X2VudHJlcHJlbmV1cikiPkV2YW4gV2lsbGlhbXM8L2E+Jm5ic3A7YW5kJm5ic3A7PGEgc3R5bGU9InRleHQtZGVjb3JhdGlvbi1saW5lOiBub25lOyBjb2xvcjogIzA2NDVhZDsgYmFja2dyb3VuZDogbm9uZTsgdXNlci1zZWxlY3Q6IGF1dG87IiB0aXRsZT0iTWVnIEhvdXJpaGFuIiBocmVmPSJodHRwczovL2VuLndpa2lwZWRpYS5vcmcvd2lraS9NZWdfSG91cmloYW4iPk1lZyBIb3U8L2E+PC9saT4NCjwvdWw+', '', 14),
(59, 'ok', 'software', 'welfare', 'PHAgc3R5bGU9Im1hcmdpbjogMC41ZW0gMHB4OyB1c2VyLXNlbGVjdDogYXV0bzsgY29sb3I6ICMyMDIxMjI7IGZvbnQtZmFtaWx5OiBzYW5zLXNlcmlmOyBmb250LXNpemU6IDE0cHg7IGJhY2tncm91bmQtY29sb3I6ICNmZmZmZmY7Ij5BJm5ic3A7PHN0cm9uZyBzdHlsZT0idXNlci1zZWxlY3Q6IGF1dG87Ij5ibG9nPC9zdHJvbmc+Jm5ic3A7KGEmbmJzcDs8YSBzdHlsZT0idGV4dC1kZWNvcmF0aW9uLWxpbmU6IG5vbmU7IGNvbG9yOiAjMDY0NWFkOyBiYWNrZ3JvdW5kOiBub25lOyB1c2VyLXNlbGVjdDogYXV0bzsiIHRpdGxlPSJDbGlwcGluZyAobW9ycGhvbG9neSkiIGhyZWY9Imh0dHBzOi8vZW4ud2lraXBlZGlhLm9yZy93aWtpL0NsaXBwaW5nXyhtb3JwaG9sb2d5KSI+dHJ1bmNhdGlvbjwvYT4mbmJzcDtvZiAiPHN0cm9uZyBzdHlsZT0idXNlci1zZWxlY3Q6IGF1dG87Ij53ZWJsb2c8L3N0cm9uZz4iKTxzdXAgaWQ9ImNpdGVfcmVmLTEiIGNsYXNzPSJyZWZlcmVuY2UiIHN0eWxlPSJsaW5lLWhlaWdodDogMTsgdW5pY29kZS1iaWRpOiBpc29sYXRlOyB3aGl0ZS1zcGFjZTogbm93cmFwOyBmb250LXNpemU6IDExLjJweDsgdXNlci1zZWxlY3Q6IGF1dG87Ij48YSBzdHlsZT0idGV4dC1kZWNvcmF0aW9uLWxpbmU6IG5vbmU7IGNvbG9yOiAjMDY0NWFkOyBiYWNrZ3JvdW5kOiBub25lOyB1c2VyLXNlbGVjdDogYXV0bzsiIGhyZWY9Imh0dHBzOi8vZW4ud2lraXBlZGlhLm9yZy93aWtpL0Jsb2cjY2l0ZV9ub3RlLTEiPlsxXTwvYT48L3N1cD4mbmJzcDtpcyBhIGRpc2N1c3Npb24gb3IgaW5mb3JtYXRpb25hbCZuYnNwOzxhIHN0eWxlPSJ0ZXh0LWRlY29yYXRpb24tbGluZTogbm9uZTsgY29sb3I6ICMwNjQ1YWQ7IGJhY2tncm91bmQ6IG5vbmU7IHVzZXItc2VsZWN0OiBhdXRvOyIgdGl0bGU9IldlYnNpdGUiIGhyZWY9Imh0dHBzOi8vZW4ud2lraXBlZGlhLm9yZy93aWtpL1dlYnNpdGUiPndlYnNpdGU8L2E+Jm5ic3A7cHVibGlzaGVkIG9uIHRoZSZuYnNwOzxhIHN0eWxlPSJ0ZXh0LWRlY29yYXRpb24tbGluZTogbm9uZTsgY29sb3I6ICMwNjQ1YWQ7IGJhY2tncm91bmQ6IG5vbmU7IHVzZXItc2VsZWN0OiBhdXRvOyIgdGl0bGU9IldvcmxkIFdpZGUgV2ViIiBocmVmPSJodHRwczovL2VuLndpa2lwZWRpYS5vcmcvd2lraS9Xb3JsZF9XaWRlX1dlYiI+V29ybGQgV2lkZSBXZWI8L2E+Jm5ic3A7Y29uc2lzdGluZyBvZiBkaXNjcmV0ZSwgb2Z0ZW4gaW5mb3JtYWwgZGlhcnktc3R5bGUgdGV4dCBlbnRyaWVzIChwb3N0cykuIFBvc3RzIGFyZSB0eXBpY2FsbHkgZGlzcGxheWVkIGluJm5ic3A7PGEgc3R5bGU9InRleHQtZGVjb3JhdGlvbi1saW5lOiBub25lOyBjb2xvcjogIzA2NDVhZDsgYmFja2dyb3VuZDogbm9uZTsgdXNlci1zZWxlY3Q6IGF1dG87IiB0aXRsZT0iUmV2ZXJzZSBjaHJvbm9sb2d5IiBocmVmPSJodHRwczovL2VuLndpa2lwZWRpYS5vcmcvd2lraS9SZXZlcnNlX2Nocm9ub2xvZ3kiPnJldmVyc2UgY2hyb25vbG9naWNhbCBvcmRlcjwvYT4sIHNvIHRoYXQgdGhlIG1vc3QgcmVjZW50IHBvc3QgYXBwZWFycyBmaXJzdCwgYXQgdGhlIHRvcCBvZiB0aGUmbmJzcDs8YSBzdHlsZT0idGV4dC1kZWNvcmF0aW9uLWxpbmU6IG5vbmU7IGNvbG9yOiAjMDY0NWFkOyBiYWNrZ3JvdW5kOiBub25lOyB1c2VyLXNlbGVjdDogYXV0bzsiIHRpdGxlPSJXZWIgcGFnZSIgaHJlZj0iaHR0cHM6Ly9lbi53aWtpcGVkaWEub3JnL3dpa2kvV2ViX3BhZ2UiPndlYiBwYWdlPC9hPi4gVW50aWwgMjAwOSwgYmxvZ3Mgd2VyZSB1c3VhbGx5IHRoZSB3b3JrIG9mIGEgc2luZ2xlIGluZGl2aWR1YWwsPHN1cCBjbGFzcz0ibm9wcmludCBJbmxpbmUtVGVtcGxhdGUgVGVtcGxhdGUtRmFjdCIgc3R5bGU9ImxpbmUtaGVpZ2h0OiAxOyBmb250LXNpemU6IDExLjJweDsgd2hpdGUtc3BhY2U6IG5vd3JhcDsgdXNlci1zZWxlY3Q6IGF1dG87Ij5bPGVtIHN0eWxlPSJ1c2VyLXNlbGVjdDogYXV0bzsiPjxhIHN0eWxlPSJ0ZXh0LWRlY29yYXRpb24tbGluZTogbm9uZTsgY29sb3I6ICMwNjQ1YWQ7IGJhY2tncm91bmQ6IG5vbmU7IHVzZXItc2VsZWN0OiBhdXRvOyIgdGl0bGU9Ildpa2lwZWRpYTpDaXRhdGlvbiBuZWVkZWQiIGhyZWY9Imh0dHBzOi8vZW4ud2lraXBlZGlhLm9yZy93aWtpL1dpa2lwZWRpYTpDaXRhdGlvbl9uZWVkZWQiPjxzcGFuIHN0eWxlPSJ1c2VyLXNlbGVjdDogYXV0bzsiIHRpdGxlPSJUaGlzIGNsYWltIG5lZWRzIHJlZmVyZW5jZXMgdG8gcmVsaWFibGUgc291cmNlcy4gKE1heSAyMDE0KSI+Y2l0YXRpb24gbmVlZGVkPC9zcGFuPjwvYT48L2VtPl08L3N1cD4mbmJzcDtvY2Nhc2lvbmFsbHkgb2YgYSBzbWFsbCBncm91cCwgYW5kIG9mdGVuIGNvdmVyZWQgYSBzaW5nbGUgc3ViamVjdCBvciB0b3BpYy4gSW4gdGhlIDIwMTBzLCAibXVsdGktYXV0aG9yIGJsb2dzIiAoTUFCcykgZW1lcmdlZCwgZmVhdHVyaW5nIHRoZSB3cml0aW5nIG9mIG11bHRpcGxlIGF1dGhvcnMgYW5kIHNvbWV0aW1lcyBwcm9mZXNzaW9uYWxseSZuYnNwOzxhIHN0eWxlPSJ0ZXh0LWRlY29yYXRpb24tbGluZTogbm9uZTsgY29sb3I6ICMwNjQ1YWQ7IGJhY2tncm91bmQ6IG5vbmU7IHVzZXItc2VsZWN0OiBhdXRvOyIgdGl0bGU9IkVkaXRpbmciIGhyZWY9Imh0dHBzOi8vZW4ud2lraXBlZGlhLm9yZy93aWtpL0VkaXRpbmciPmVkaXRlZDwvYT4uIE1BQnMgZnJvbSZuYnNwOzxhIHN0eWxlPSJ0ZXh0LWRlY29yYXRpb24tbGluZTogbm9uZTsgY29sb3I6ICMwNjQ1YWQ7IGJhY2tncm91bmQ6IG5vbmU7IHVzZXItc2VsZWN0OiBhdXRvOyIgdGl0bGU9Ik5ld3NwYXBlciIgaHJlZj0iaHR0cHM6Ly9lbi53aWtpcGVkaWEub3JnL3dpa2kvTmV3c3BhcGVyIj5uZXdzcGFwZXJzPC9hPiwgb3RoZXImbmJzcDs8YSBzdHlsZT0idGV4dC1kZWNvcmF0aW9uLWxpbmU6IG5vbmU7IGNvbG9yOiAjMDY0NWFkOyBiYWNrZ3JvdW5kOiBub25lOyB1c2VyLXNlbGVjdDogYXV0bzsiIHRpdGxlPSJOZXdzIG1lZGlhIiBocmVmPSJodHRwczovL2VuLndpa2lwZWRpYS5vcmcvd2lraS9OZXdzX21lZGlhIj5tZWRpYSBvdXRsZXRzPC9hPiwgdW5pdmVyc2l0aWVzLCZuYnNwOzxhIHN0eWxlPSJ0ZXh0LWRlY29yYXRpb24tbGluZTogbm9uZTsgY29sb3I6ICMwNjQ1YWQ7IGJhY2tncm91bmQ6IG5vbmU7IHVzZXItc2VsZWN0OiBhdXRvOyIgdGl0bGU9IlRoaW5rIHRhbmsiIGhyZWY9Imh0dHBzOi8vZW4ud2lraXBlZGlhLm9yZy93aWtpL1RoaW5rX3RhbmsiPnRoaW5rIHRhbmtzPC9hPiwmbmJzcDs8YSBzdHlsZT0idGV4dC1kZWNvcmF0aW9uLWxpbmU6IG5vbmU7IGNvbG9yOiAjMDY0NWFkOyBiYWNrZ3JvdW5kOiBub25lOyB1c2VyLXNlbGVjdDogYXV0bzsiIHRpdGxlPSJBZHZvY2FjeSBncm91cCIgaHJlZj0iaHR0cHM6Ly9lbi53aWtpcGVkaWEub3JnL3dpa2kvQWR2b2NhY3lfZ3JvdXAiPmFkdm9jYWN5IGdyb3VwczwvYT4sIGFuZCBzaW1pbGFyIGluc3RpdHV0aW9ucyBhY2NvdW50IGZvciBhbiBpbmNyZWFzaW5nIHF1YW50aXR5IG9mIGJsb2cmbmJzcDs8YSBzdHlsZT0idGV4dC1kZWNvcmF0aW9uLWxpbmU6IG5vbmU7IGNvbG9yOiAjMDY0NWFkOyBiYWNrZ3JvdW5kOiBub25lOyB1c2VyLXNlbGVjdDogYXV0bzsiIHRpdGxlPSJXZWIgdHJhZmZpYyIgaHJlZj0iaHR0cHM6Ly9lbi53aWtpcGVkaWEub3JnL3dpa2kvV2ViX3RyYWZmaWMiPnRyYWZmaWM8L2E+LiBUaGUgcmlzZSBvZiZuYnNwOzxhIHN0eWxlPSJ0ZXh0LWRlY29yYXRpb24tbGluZTogbm9uZTsgY29sb3I6ICMwNjQ1YWQ7IGJhY2tncm91bmQ6IG5vbmU7IHVzZXItc2VsZWN0OiBhdXRvOyIgdGl0bGU9IlR3aXR0ZXIiIGhyZWY9Imh0dHBzOi8vZW4ud2lraXBlZGlhLm9yZy93aWtpL1R3aXR0ZXIiPlR3aXR0ZXI8L2E+Jm5ic3A7YW5kIG90aGVyICI8YSBzdHlsZT0idGV4dC1kZWNvcmF0aW9uLWxpbmU6IG5vbmU7IGNvbG9yOiAjMDY0NWFkOyBiYWNrZ3JvdW5kOiBub25lOyB1c2VyLXNlbGVjdDogYXV0bzsiIHRpdGxlPSJNaWNyb2Jsb2dnaW5nIiBocmVmPSJodHRwczovL2VuLndpa2lwZWRpYS5vcmcvd2lraS9NaWNyb2Jsb2dnaW5nIj5taWNyb2Jsb2dnaW5nPC9hPiIgc3lzdGVtcyBoZWxwcyBpbnRlZ3JhdGUgTUFCcyBhbmQgc2luZ2xlLWF1dGhvciBibG9ncyBpbnRvIHRoZSBuZXdzIG1lZGlhLiZuYnNwOzxlbSBzdHlsZT0idXNlci1zZWxlY3Q6IGF1dG87Ij5CbG9nPC9lbT4mbmJzcDtjYW4gYWxzbyBiZSB1c2VkIGFzIGEgdmVyYiwgbWVhbmluZyZuYnNwOzxlbSBzdHlsZT0idXNlci1zZWxlY3Q6IGF1dG87Ij50byBtYWludGFpbiBvciBhZGQgY29udGVudCB0byBhIGJsb2c8L2VtPi48L3A+DQo8cCBzdHlsZT0ibWFyZ2luOiAwLjVlbSAwcHg7IHVzZXItc2VsZWN0OiBhdXRvOyBjb2xvcjogIzIwMjEyMjsgZm9udC1mYW1pbHk6IHNhbnMtc2VyaWY7IGZvbnQtc2l6ZTogMTRweDsgYmFja2dyb3VuZC1jb2xvcjogI2ZmZmZmZjsiPlRoZSBlbWVyZ2VuY2UgYW5kIGdyb3d0aCBvZiBibG9ncyBpbiB0aGUgbGF0ZSAxOTkwcyBjb2luY2lkZWQgd2l0aCB0aGUgYWR2ZW50IG9mIHdlYiBwdWJsaXNoaW5nIHRvb2xzIHRoYXQgZmFjaWxpdGF0ZWQgdGhlIHBvc3Rpbmcgb2YgY29udGVudCBieSBub24tdGVjaG5pY2FsIHU8L3A+', '', 14),
(60, 'main activity', 'hardware', ' Blog usage spread during 1999 and the years following, being fu', 'PHAgc3R5bGU9Im1hcmdpbjogMC41ZW0gMHB4OyB1c2VyLXNlbGVjdDogYXV0bzsgY29sb3I6ICMyMDIxMjI7IGZvbnQtZmFtaWx5OiBzYW5zLXNlcmlmOyBmb250LXNpemU6IDE0cHg7IGJhY2tncm91bmQtY29sb3I6ICNmZmZmZmY7Ij5zaW5nIGJsb2cgc29mdHdhcmUuPC9wPg0KPGgzIHN0eWxlPSJtYXJnaW46IDAuM2VtIDBweCAwcHg7IHBhZGRpbmctdG9wOiAwLjVlbTsgcGFkZGluZy1ib3R0b206IDBweDsgb3ZlcmZsb3c6IGhpZGRlbjsgZm9udC1zaXplOiAxLjJlbTsgbGluZS1oZWlnaHQ6IDEuNjsgZm9udC1mYW1pbHk6IHNhbnMtc2VyaWY7IGJhY2tncm91bmQtY29sb3I6ICNmZmZmZmY7IHVzZXItc2VsZWN0OiBhdXRvOyI+PHNwYW4gaWQ9IlJpc2VfaW5fcG9wdWxhcml0eSIgY2xhc3M9Im13LWhlYWRsaW5lIiBzdHlsZT0idXNlci1zZWxlY3Q6IGF1dG87Ij5SaXNpbmcgaW4gcG9wdWxhcml0eTwvc3Bhbj48L2gzPg0KPHAgc3R5bGU9Im1hcmdpbjogMC41ZW0gMHB4OyB1c2VyLXNlbGVjdDogYXV0bzsgY29sb3I6ICMyMDIxMjI7IGZvbnQtZmFtaWx5OiBzYW5zLXNlcmlmOyBmb250LXNpemU6IDE0cHg7IGJhY2tncm91bmQtY29sb3I6ICNmZmZmZmY7Ij5BZnRlciBhIHNsb3cgc3RhcnQsIGJsb2dnaW5nIHJhcGlkbHkgZ2FpbmVkIGluIHBvcHVsYXJpdHkuIEJsb2cgdXNhZ2Ugc3ByZWFkIGR1cmluZyAxOTk5IGFuZCB0aGUgeWVhcnMgZm9sbG93aW5nLCBiZWluZyBmdXJ0aGVyIHBvcHVsYXJpemVkIGJ5IHRoZSBuZWFyLXNpbXVsdGFuZW91cyBhcnJpdmFsIG9mIHRoZSBmaXJzdCBob3N0ZWQgYmxvZyB0b29sczo8L3A+DQo8dWwgc3R5bGU9Imxpc3Qtc3R5bGUtaW1hZ2U6IHVybCgnLi4vdy9za2lucy9WZWN0b3IvcmVzb3VyY2VzL2NvbW1vbi9pbWFnZXMvYnVsbGV0LWljb24uc3ZnP2Q0NTE1Jyk7IG1hcmdpbjogMC4zZW0gMHB4IDBweCAxLjZlbTsgcGFkZGluZzogMHB4OyBjb2xvcjogIzIwMjEyMjsgZm9udC1mYW1pbHk6IHNhbnMtc2VyaWY7IGZvbnQtc2l6ZTogMTRweDsgYmFja2dyb3VuZC1jb2xvcjogI2ZmZmZmZjsgdXNlci1zZWxlY3Q6IGF1dG87Ij4NCjxsaSBzdHlsZT0ibWFyZ2luLWJvdHRvbTogMC4xZW07IHVzZXItc2VsZWN0OiBhdXRvOyI+PGEgc3R5bGU9InRleHQtZGVjb3JhdGlvbi1saW5lOiBub25lOyBjb2xvcjogIzA2NDVhZDsgYmFja2dyb3VuZDogbm9uZTsgdXNlci1zZWxlY3Q6IGF1dG87IiB0aXRsZT0iQnJ1Y2UgQWJsZXNvbiIgaHJlZj0iaHR0cHM6Ly9lbi53aWtpcGVkaWEub3JnL3dpa2kvQnJ1Y2VfQWJsZXNvbiI+QnJ1Y2UgQWJsZXNvbjwvYT4mbmJzcDtsYXVuY2hlZCZuYnNwOzxhIHN0eWxlPSJ0ZXh0LWRlY29yYXRpb24tbGluZTogbm9uZTsgY29sb3I6ICMwNjQ1YWQ7IGJhY2tncm91bmQ6IG5vbmU7IHVzZXItc2VsZWN0OiBhdXRvOyIgdGl0bGU9Ik9wZW4gRGlhcnkiIGhyZWY9Imh0dHBzOi8vZW4ud2lraXBlZGlhLm9yZy93aWtpL09wZW5fRGlhcnkiPk9wZW4gRGlhcnk8L2E+Jm5ic3A7aW4gT2N0b2JlciAxOTk4LCB3aGljaCBzb29uIGdyZXcgdG8gdGhvdXNhbmRzIG9mIG9ubGluZSBkaWFyaWVzLiBPcGVuIERpYXJ5IGlubm92YXRlZCB0aGUgcmVhZGVyIGNvbW1lbnQsIGJlY29taW5nIHRoZSBmaXJzdCBibG9nIGNvbW11bml0eSB3aGVyZSByZWFkZXJzIGNvdWxkIGFkZCBjb21tZW50cyB0byBvdGhlciB3cml0ZXJzJyBibG9nIGVudHJpZXMuPC9saT4NCjxsaSBzdHlsZT0ibWFyZ2luLWJvdHRvbTogMC4xZW07IHVzZXItc2VsZWN0OiBhdXRvOyI+PGEgc3R5bGU9InRleHQtZGVjb3JhdGlvbi1saW5lOiBub25lOyBjb2xvcjogIzA2NDVhZDsgYmFja2dyb3VuZDogbm9uZTsgdXNlci1zZWxlY3Q6IGF1dG87IiB0aXRsZT0iQnJhZCBGaXR6cGF0cmljayIgaHJlZj0iaHR0cHM6Ly9lbi53aWtpcGVkaWEub3JnL3dpa2kvQnJhZF9GaXR6cGF0cmljayI+QnJhZCBGaXR6cGF0cmljazwvYT4mbmJzcDtzdGFydGVkJm5ic3A7PGEgc3R5bGU9InRleHQtZGVjb3JhdGlvbi1saW5lOiBub25lOyBjb2xvcjogIzA2NDVhZDsgYmFja2dyb3VuZDogbm9uZTsgdXNlci1zZWxlY3Q6IGF1dG87IiB0aXRsZT0iTGl2ZUpvdXJuYWwiIGhyZWY9Imh0dHBzOi8vZW4ud2lraXBlZGlhLm9yZy93aWtpL0xpdmVKb3VybmFsIj5MaXZlSm91cm5hbDwvYT4mbmJzcDtpbiBNYXJjaCAxOTk5LjwvbGk+DQo8bGkgc3R5bGU9Im1hcmdpbi1ib3R0b206IDAuMWVtOyB1c2VyLXNlbGVjdDogYXV0bzsiPkFuZHJldyBTbWFsZXMgY3JlYXRlZCBQaXRhcy5jb20gaW4gSnVseSAxOTk5IGFzIGFuIGVhc2llciBhbHRlcm5hdGl2ZSB0byBtYWludGFpbmluZyBhICJuZXdzIHBhZ2UiIG9uIGEgV2ViIHNpdGUsIGZvbGxvd2VkIGJ5IERpYXJ5TGFuZCBpbiBTZXB0ZW1iZXIgMTk5OSwgZm9jdXNpbmcgbW9yZSBvbiBhIHBlcnNvbmFsIGRpYXJ5IGNvbW11bml0eS48c3VwIGlkPSJjaXRlX3JlZi0yMiIgY2xhc3M9InJlZmVyZW5jZSIgc3R5bGU9ImxpbmUtaGVpZ2h0OiAxOyB1bmljb2RlLWJpZGk6IGlzb2xhdGU7IHdoaXRlLXNwYWNlOiBub3dyYXA7IGZvbnQtc2l6ZTogMTEuMnB4OyB1c2VyLXNlbGVjdDogYXV0bzsiPjxhIHN0eWxlPSJ0ZXh0LWRlY29yYXRpb24tbGluZTogbm9uZTsgY29sb3I6ICMwNjQ1YWQ7IGJhY2tncm91bmQ6IG5vbmU7IHVzZXItc2VsZWN0OiBhdXRvOyIgaHJlZj0iaHR0cHM6Ly9lbi53aWtpcGVkaWEub3JnL3dpa2kvQmxvZyNjaXRlX25vdGUtMjIiPlsyMl08L2E+PC9zdXA+PC9saT4NCjxsaSBzdHlsZT0ibWFyZ2luLWJvdHRvbTogMC4xZW07IHVzZXItc2VsZWN0OiBhdXRvOyI+PGEgc3R5bGU9InRleHQtZGVjb3JhdGlvbi1saW5lOiBub25lOyBjb2xvcjogIzA2NDVhZDsgYmFja2dyb3VuZDogbm9uZTsgdXNlci1zZWxlY3Q6IGF1dG87IiB0aXRsZT0iRXZhbiBXaWxsaWFtcyAoSW50ZXJuZXQgZW50cmVwcmVuZXVyKSIgaHJlZj0iaHR0cHM6Ly9lbi53aWtpcGVkaWEub3JnL3dpa2kvRXZhbl9XaWxsaWFtc18oSW50ZXJuZXRfZW50cmVwcmVuZXVyKSI+RXZhbiBXaWxsaWFtczwvYT4mbmJzcDthbmQmbmJzcDs8YSBzdHlsZT0idGV4dC1kZWNvcmF0aW9uLWxpbmU6IG5vbmU7IGNvbG9yOiAjMDY0NWFkOyBiYWNrZ3JvdW5kOiBub25lOyB1c2VyLXNlbGVjdDogYXV0bzsiIHRpdGxlPSJNZWcgSG91cmloYW4iIGhyZWY9Imh0dHBzOi8vZW4ud2lraXBlZGlhLm9yZy93aWtpL01lZ19Ib3VyaWhhbiI+TWVnIEhvdXJpaGFuPC9hPiZuYnNwOyg8YSBzdHlsZT0idGV4dC1kZWNvcmF0aW9uLWxpbmU6IG5vbmU7IGNvbG9yOiAjMDY0NWFkOyBiYWNrZ3JvdW5kOiBub25lOyB1c2VyLXNlbGVjdDogYXV0bzsiIHRpdGxlPSJQeXJhIExhYnMiIGhyZWY9Imh0dHBzOi8vZW4ud2lraXBlZGlhLm9yZy93aWtpL1B5cmFfTGFicyI+UHlyYSBMYWJzPC9hPikgbGF1bmNoZWQmbmJzcDs8YSBjbGFzcz0ibXctcmVkaXJlY3QiIHN0eWxlPSJ0ZXh0LWRlY29yYXRpb24tbGluZTogbm9uZTsgY29sb3I6ICMwNjQ1YWQ7IGJhY2tncm91bmQ6IG5vbmU7IHVzZXItc2VsZWN0OiBhdXRvOyIgdGl0bGU9IkJsb2dnZXIuY29tIiBocmVmPSJodHRwczovL2VuLndpa2lwZWRpYS5vcmcvd2lraS9CbG9nZ2VyLmNvbSI+QmxvZ2dlci5jb208L2E+Jm5ic3A7aW4gQXVndXN0IDE5OTkgKHB1cmNoYXNlZCBieSBHb29nbGUgaW4gRmVicnVhcnkgMjAwMyk8L2xpPg0KPGxpPiZuYnNwOzwvbGk+DQo8L3VsPg==', '', 14),
(61, 'product lifecycle managment', 'select', ' Blog usage spread during 1999 and the years following, being fu', '', '', 14),
(62, 'asdadsdas', 'select', 'sdasdsdsa', '', '', 14),
(63, 'sdadasds', 'hardware', 'xcxcdsd', '', '', 14),
(64, 'sadasdaasd', 'hardware', 'asdasdasdasds', 'PHA+bGV0IGJlZ2luPC9wPg==', '', 14),
(65, 'asdasasd', 'hardware', 'asdsadasdsad', '', '', 14),
(66, 'sdasdsdsa', 'hardware', 'sdasdsadasd', 'PHA+ZHNkYWRzZGFzPC9wPg==', '', 14),
(68, 'addressing a problem', 'hardware', 'capable of editing', 'PHA+c2RzZHNhZGFzZHM8L3A+', 'files/16348353', 14),
(69, 'pk', 'hardware', 'extension leaded', 'PHA+cGVlayBkYXlzPC9wPg==', 'files/1113603356Product Lifecycle Management detail.docx', 14),
(70, 'abc', 'Mobile app Development', '', '', 'files/931974990', 14),
(71, 'product life cycle management\r\n', 'Mobile app Development', '', '', 'files/443112124', 14),
(73, 'def', 'Mobile app Development', '', '', 'files/1355676497', 14);
INSERT INTO `projects` (`p_id`, `p_title`, `p_category`, `p_problem`, `p_description`, `file_path`, `a_id`) VALUES
(80, 'file', 'hardware', 'write', 'PGgzIHN0eWxlPSJtYXJnaW46IDAuM2VtIDBweCAwcHg7IHBhZGRpbmctdG9wOiAwLjVlbTsgcGFkZGluZy1ib3R0b206IDBweDsgb3ZlcmZsb3c6IGhpZGRlbjsgZm9udC1zaXplOiAxLjJlbTsgbGluZS1oZWlnaHQ6IDEuNjsgZm9udC1mYW1pbHk6IHNhbnMtc2VyaWY7IGJhY2tncm91bmQtY29sb3I6ICNmZmZmZmY7IHVzZXItc2VsZWN0OiBhdXRvOyI+PHNwYW4gaWQ9Ik9yaWdpbnMiIGNsYXNzPSJtdy1oZWFkbGluZSIgc3R5bGU9InVzZXItc2VsZWN0OiBhdXRvOyI+T3JpZ2luczwvc3Bhbj48L2gzPg0KPHAgc3R5bGU9Im1hcmdpbjogMC41ZW0gMHB4OyB1c2VyLXNlbGVjdDogYXV0bzsgY29sb3I6ICMyMDIxMjI7IGZvbnQtZmFtaWx5OiBzYW5zLXNlcmlmOyBmb250LXNpemU6IDE0cHg7IGJhY2tncm91bmQtY29sb3I6ICNmZmZmZmY7Ij5CZWZvcmUgYmxvZ2dpbmcgYmVjYW1lIHBvcHVsYXIsIGRpZ2l0YWwgY29tbXVuaXRpZXMgdG9vayBtYW55IGZvcm1zIGluY2x1ZGluZyZuYnNwOzxhIHN0eWxlPSJ0ZXh0LWRlY29yYXRpb24tbGluZTogbm9uZTsgY29sb3I6ICMwNjQ1YWQ7IGJhY2tncm91bmQ6IG5vbmU7IHVzZXItc2VsZWN0OiBhdXRvOyIgdGl0bGU9IlVzZW5ldCIgaHJlZj0iaHR0cHM6Ly9lbi53aWtpcGVkaWEub3JnL3dpa2kvVXNlbmV0Ij5Vc2VuZXQ8L2E+LCBjb21tZXJjaWFsIG9ubGluZSBzZXJ2aWNlcyBzdWNoIGFzJm5ic3A7PGEgc3R5bGU9InRleHQtZGVjb3JhdGlvbi1saW5lOiBub25lOyBjb2xvcjogIzA2NDVhZDsgYmFja2dyb3VuZDogbm9uZTsgdXNlci1zZWxlY3Q6IGF1dG87IiB0aXRsZT0iR0VuaWUiIGhyZWY9Imh0dHBzOi8vZW4ud2lraXBlZGlhLm9yZy93aWtpL0dFbmllIj5HRW5pZTwvYT4sJm5ic3A7PGEgc3R5bGU9InRleHQtZGVjb3JhdGlvbi1saW5lOiBub25lOyBjb2xvcjogIzA2NDVhZDsgYmFja2dyb3VuZDogbm9uZTsgdXNlci1zZWxlY3Q6IGF1dG87IiB0aXRsZT0iQnl0ZSBJbmZvcm1hdGlvbiBFeGNoYW5nZSIgaHJlZj0iaHR0cHM6Ly9lbi53aWtpcGVkaWEub3JnL3dpa2kvQnl0ZV9JbmZvcm1hdGlvbl9FeGNoYW5nZSI+Qnl0ZSBJbmZvcm1hdGlvbiBFeGNoYW5nZTwvYT4mbmJzcDsoQklYKSBhbmQgdGhlIGVhcmx5Jm5ic3A7PGEgc3R5bGU9InRleHQtZGVjb3JhdGlvbi1saW5lOiBub25lOyBjb2xvcjogIzA2NDVhZDsgYmFja2dyb3VuZDogbm9uZTsgdXNlci1zZWxlY3Q6IGF1dG87IiB0aXRsZT0iQ29tcHVTZXJ2ZSIgaHJlZj0iaHR0cHM6Ly9lbi53aWtpcGVkaWEub3JnL3dpa2kvQ29tcHVTZXJ2ZSI+Q29tcHVTZXJ2ZTwvYT4sJm5ic3A7PGEgc3R5bGU9InRleHQtZGVjb3JhdGlvbi1saW5lOiBub25lOyBjb2xvcjogIzA2NDVhZDsgYmFja2dyb3VuZDogbm9uZTsgdXNlci1zZWxlY3Q6IGF1dG87IiB0aXRsZT0iRWxlY3Ryb25pYyBtYWlsaW5nIGxpc3QiIGhyZWY9Imh0dHBzOi8vZW4ud2lraXBlZGlhLm9yZy93aWtpL0VsZWN0cm9uaWNfbWFpbGluZ19saXN0Ij5lLW1haWwgbGlzdHM8L2E+LDxzdXAgaWQ9ImNpdGVfcmVmLTE0IiBjbGFzcz0icmVmZXJlbmNlIiBzdHlsZT0ibGluZS1oZWlnaHQ6IDE7IHVuaWNvZGUtYmlkaTogaXNvbGF0ZTsgd2hpdGUtc3BhY2U6IG5vd3JhcDsgZm9udC1zaXplOiAxMS4ycHg7IHVzZXItc2VsZWN0OiBhdXRvOyI+PGEgc3R5bGU9InRleHQtZGVjb3JhdGlvbi1saW5lOiBub25lOyBjb2xvcjogIzA2NDVhZDsgYmFja2dyb3VuZDogbm9uZTsgdXNlci1zZWxlY3Q6IGF1dG87IiBocmVmPSJodHRwczovL2VuLndpa2lwZWRpYS5vcmcvd2lraS9CbG9nI2NpdGVfbm90ZS0xNCI+WzE0XTwvYT48L3N1cD4mbmJzcDthbmQmbmJzcDs8YSBjbGFzcz0ibXctcmVkaXJlY3QiIHN0eWxlPSJ0ZXh0LWRlY29yYXRpb24tbGluZTogbm9uZTsgY29sb3I6ICMwNjQ1YWQ7IGJhY2tncm91bmQ6IG5vbmU7IHVzZXItc2VsZWN0OiBhdXRvOyIgdGl0bGU9IkJ1bGxldGluIEJvYXJkIFN5c3RlbSIgaHJlZj0iaHR0cHM6Ly9lbi53aWtpcGVkaWEub3JnL3dpa2kvQnVsbGV0aW5fQm9hcmRfU3lzdGVtIj5CdWxsZXRpbiBCb2FyZCBTeXN0ZW1zPC9hPiZuYnNwOyhCQlMpLiBJbiB0aGUgMTk5MHMsJm5ic3A7PGEgc3R5bGU9InRleHQtZGVjb3JhdGlvbi1saW5lOiBub25lOyBjb2xvcjogIzA2NDVhZDsgYmFja2dyb3VuZDogbm9uZTsgdXNlci1zZWxlY3Q6IGF1dG87IiB0aXRsZT0iSW50ZXJuZXQgZm9ydW0iIGhyZWY9Imh0dHBzOi8vZW4ud2lraXBlZGlhLm9yZy93aWtpL0ludGVybmV0X2ZvcnVtIj5JbnRlcm5ldCBmb3J1bTwvYT4mbmJzcDtzb2Z0d2FyZSBjcmVhdGVkIHJ1bm5pbmcgY29udmVyc2F0aW9ucyB3aXRoICJ0aHJlYWRzIi4gVGhyZWFkcyBhcmUgdG9waWNhbCBjb25uZWN0aW9ucyBiZXR3ZWVuIG1lc3NhZ2VzIG9uIGEgdmlydHVhbCAiPGEgc3R5bGU9InRleHQtZGVjb3JhdGlvbi1saW5lOiBub25lOyBjb2xvcjogIzA2NDVhZDsgYmFja2dyb3VuZDogbm9uZTsgdXNlci1zZWxlY3Q6IGF1dG87IiB0aXRsZT0iQnVsbGV0aW4gYm9hcmQiIGhyZWY9Imh0dHBzOi8vZW4ud2lraXBlZGlhLm9yZy93aWtpL0J1bGxldGluX2JvYXJkIj5jb3JrYm9hcmQ8L2E+Ii4gRnJvbSBKdW5lIDE0LCAxOTkzLCBNb3NhaWMgQ29tbXVuaWNhdGlvbnMgQ29ycG9yYXRpb24gbWFpbnRhaW5lZCB0aGVpciAiV2hhdCdzIE5ldyI8c3VwIGlkPSJjaXRlX3JlZi0xNSIgY2xhc3M9InJlZmVyZW5jZSIgc3R5bGU9ImxpbmUtaGVpZ2h0OiAxOyB1bmljb2RlLWJpZGk6IGlzb2xhdGU7IHdoaXRlLXNwYWNlOiBub3dyYXA7IGZvbnQtc2l6ZTogMTEuMnB4OyB1c2VyLXNlbGVjdDogYXV0bzsiPjxhIHN0eWxlPSJ0ZXh0LWRlY29yYXRpb24tbGluZTogbm9uZTsgY29sb3I6ICMwNjQ1YWQ7IGJhY2tncm91bmQ6IG5vbmU7IHVzZXItc2VsZWN0OiBhdXRvOyIgaHJlZj0iaHR0cHM6Ly9lbi53aWtpcGVkaWEub3JnL3dpa2kvQmxvZyNjaXRlX25vdGUtMTUiPlsxNV08L2E+PC9zdXA+Jm5ic3A7bGlzdCBvZiBuZXcgd2Vic2l0ZXMsIHVwZGF0ZWQgZGFpbHkgYW5kIGFyY2hpdmVkIG1vbnRobHkuIFRoZSBwYWdlIHdhcyBhY2Nlc3NpYmxlIGJ5IGEgc3BlY2lhbCAiV2hhdCdzIE5ldyIgYnV0dG9uIGluIHRoZSBNb3NhaWMgd2ViIGJyb3dzZXIuPC9wPg0KPHAgc3R5bGU9Im1hcmdpbjogMC41ZW0gMHB4OyB1c2VyLXNlbGVjdDogYXV0bzsgY29sb3I6ICMyMDIxMjI7IGZvbnQtZmFtaWx5OiBzYW5zLXNlcmlmOyBmb250LXNpemU6IDE0cHg7IGJhY2tncm91bmQtY29sb3I6ICNmZmZmZmY7Ij5UaGUgZWFybGllc3QgaW5zdGFuY2Ugb2YgYSBjb21tZXJjaWFsIGJsb2cgd2FzIG9uIHRoZSBmaXJzdCZuYnNwOzxhIGNsYXNzPSJtdy1yZWRpcmVjdCIgc3R5bGU9InRleHQtZGVjb3JhdGlvbi1saW5lOiBub25lOyBjb2xvcjogIzA2NDVhZDsgYmFja2dyb3VuZDogbm9uZTsgdXNlci1zZWxlY3Q6IGF1dG87IiB0aXRsZT0iQnVzaW5lc3MgdG8gY29uc3VtZXIiIGhyZWY9Imh0dHBzOi8vZW4ud2lraXBlZGlhLm9yZy93aWtpL0J1c2luZXNzX3RvX2NvbnN1bWVyIj5idXNpbmVzcyB0byBjb25zdW1lcjwvYT4mbmJzcDtXZWIgc2l0ZSBjcmVhdGVkIGluIDE5OTUgYnkmbmJzcDs8YSBjbGFzcz0ibXctcmVkaXJlY3QiIHN0eWxlPSJ0ZXh0LWRlY29yYXRpb24tbGluZTogbm9uZTsgY29sb3I6ICMwNjQ1YWQ7IGJhY2tncm91bmQ6IG5vbmU7IHVzZXItc2VsZWN0OiBhdXRvOyIgdGl0bGU9IlR5IEluYyIgaHJlZj0iaHR0cHM6Ly9lbi53aWtpcGVkaWEub3JnL3dpa2kvVHlfSW5jIj5UeSwgSW5jLjwvYT4sIHdoaWNoIGZlYXR1cmVkIGEgYmxvZyBpbiBhIHNlY3Rpb24gY2FsbGVkICJPbmxpbmUgRGlhcnkiLiBUaGUgZW50cmllcyB3ZXJlIG1haW50YWluZWQgYnkgZmVhdHVyZWQmbmJzcDs8YSBzdHlsZT0idGV4dC1kZWNvcmF0aW9uLWxpbmU6IG5vbmU7IGNvbG9yOiAjMDY0NWFkOyBiYWNrZ3JvdW5kOiBub25lOyB1c2VyLXNlbGVjdDogYXV0bzsiIHRpdGxlPSJCZWFuaWUgQmFiaWVzIiBocmVmPSJodHRwczovL2VuLndpa2lwZWRpYS5vcmcvd2lraS9CZWFuaWVfQmFiaWVzIj5CZWFuaWUgQmFiaWVzPC9hPiZuYnNwO3RoYXQgd2VyZSB2b3RlZCBmb3IgbW9udGhseSBieSBXZWIgc2l0ZSB2aXNpdG9ycy48c3VwIGlkPSJjaXRlX3JlZi1CZWFuaWVCYWJpZXNfMTYtMCIgY2xhc3M9InJlZmVyZW5jZSIgc3R5bGU9ImxpbmUtaGVpZ2h0OiAxOyB1bmljb2RlLWJpZGk6IGlzb2xhdGU7IHdoaXRlLXNwYWNlOiBub3dyYXA7IGZvbnQtc2l6ZTogMTEuMnB4OyB1c2VyLXNlbGVjdDogYXV0bzsiPjxhIHN0eWxlPSJ0ZXh0LWRlY29yYXRpb24tbGluZTogbm9uZTsgY29sb3I6ICMwNjQ1YWQ7IGJhY2tncm91bmQ6IG5vbmU7IHVzZXItc2VsZWN0OiBhdXRvOyIgaHJlZj0iaHR0cHM6Ly9lbi53aWtpcGVkaWEub3JnL3dpa2kvQmxvZyNjaXRlX25vdGUtQmVhbmllQmFiaWVzLTE2Ij5bMTZdPC9hPjwvc3VwPjwvcD4NCjxwIHN0eWxlPSJtYXJnaW46IDAuNWVtIDBweDsgdXNlci1zZWxlY3Q6IGF1dG87IGNvbG9yOiAjMjAyMTIyOyBmb250LWZhbWlseTogc2Fucy1zZXJpZjsgZm9udC1zaXplOiAxNHB4OyBiYWNrZ3JvdW5kLWNvbG9yOiAjZmZmZmZmOyI+VGhlIG1vZGVybiBibG9nIGV2b2x2ZWQgZnJvbSB0aGUmbmJzcDs8YSBzdHlsZT0idGV4dC1kZWNvcmF0aW9uLWxpbmU6IG5vbmU7IGNvbG9yOiAjMDY0NWFkOyBiYWNrZ3JvdW5kOiBub25lOyB1c2VyLXNlbGVjdDogYXV0bzsiIHRpdGxlPSJPbmxpbmUgZGlhcnkiIGhyZWY9Imh0dHBzOi8vZW4ud2lraXBlZGlhLm9yZy93aWtpL09ubGluZV9kaWFyeSI+b25saW5lIGRpYXJ5PC9hPiZuYnNwO3doZXJlIHBlb3BsZSB3b3VsZCBrZWVwIGEgcnVubmluZyBhY2NvdW50IG9mIHRoZSBldmVudHMgaW4gdGhlaXIgcGVyc29uYWwgbGl2ZXMuIE1vc3Qgc3VjaCB3cml0ZXJzIGNhbGxlZCB0aGVtc2VsdmVzIGRpYXJpc3RzLCBqb3VybmFsaXN0cywgb3Igam91cm5hbGVycy4mbmJzcDs8YSBzdHlsZT0idGV4dC1kZWNvcmF0aW9uLWxpbmU6IG5vbmU7IGNvbG9yOiAjMDY0NWFkOyBiYWNrZ3JvdW5kOiBub25lOyB1c2VyLXNlbGVjdDogYXV0bzsiIHRpdGxlPSJKdXN0aW4gSGFsbCIgaHJlZj0iaHR0cHM6Ly9lbi53aWtpcGVkaWEub3JnL3dpa2kvSnVzdGluX0hhbGwiPkp1c3RpbiBIYWxsPC9hPiwgd2hvIGJlZ2FuIHBlcnNvbmFsIGJsb2dnaW5nIGluIDE5OTQgd2hpbGUgYSBzdHVkZW50IGF0Jm5ic3A7PGEgc3R5bGU9InRleHQtZGVjb3JhdGlvbi1saW5lOiBub25lOyBjb2xvcjogIzA2NDVhZDsgYmFja2dyb3VuZDogbm9uZTsgdXNlci1zZWxlY3Q6IGF1dG87IiB0aXRsZT0iU3dhcnRobW9yZSBDb2xsZWdlIiBocmVmPSJodHRwczovL2VuLndpa2lwZWRpYS5vcmcvd2lraS9Td2FydGhtb3JlX0NvbGxlZ2UiPlN3YXJ0aG1vcmUgQ29sbGVnZTwvYT4sIGlzIGdlbmVyYWxseSByZWNvZ25pemVkIGFzIG9uZSBvZiB0aGUgZWFybGllciBibG9nZ2Vycyw8c3VwIGlkPSJjaXRlX3JlZi0xNyIgY2xhc3M9InJlZmVyZW5jZSIgc3R5bGU9ImxpbmUtaGVpZ2h0OiAxOyB1bmljb2RlLWJpZGk6IGlzb2xhdGU7IHdoaXRlLXNwYWNlOiBub3dyYXA7IGZvbnQtc2l6ZTogMTEuMnB4OyB1c2VyLXNlbGVjdDogYXV0bzsiPjxhIHN0eWxlPSJ0ZXh0LWRlY29yYXRpb24tbGluZTogbm9uZTsgY29sb3I6ICMwNjQ1YWQ7IGJhY2tncm91bmQ6IG5vbmU7IHVzZXItc2VsZWN0OiBhdXRvOyIgaHJlZj0iaHR0cHM6Ly9lbi53aWtpcGVkaWEub3JnL3dpa2kvQmxvZyNjaXRlX25vdGUtMTciPlsxN108L2E+PC9zdXA+Jm5ic3A7YXMgaXMmbmJzcDs8YSBzdHlsZT0idGV4dC1kZWNvcmF0aW9uLWxpbmU6IG5vbmU7IGNvbG9yOiAjMDY0NWFkOyBiYWNrZ3JvdW5kOiBub25lOyB1c2VyLXNlbGVjdDogYXV0bzsiIHRpdGxlPSJKZXJyeSBQb3VybmVsbGUiIGhyZWY9Imh0dHBzOi8vZW4ud2lraXBlZGlhLm9yZy93aWtpL0plcnJ5X1BvdXJuZWxsZSI+SmVycnkgUG91cm5lbGxlPC9hPi48c3VwIGlkPSJjaXRlX3JlZi0xOCIgY2xhc3M9InJlZmVyZW5jZSIgc3R5bGU9ImxpbmUtaGVpZ2h0OiAxOyB1bmljb2RlLWJpZGk6IGlzb2xhdGU7IHdoaXRlLXNwYWNlOiBub3dyYXA7IGZvbnQtc2l6ZTogMTEuMnB4OyB1c2VyLXNlbGVjdDogYXV0bzsiPjxhIHN0eWxlPSJ0ZXh0LWRlY29yYXRpb24tbGluZTogbm9uZTsgY29sb3I6ICMwNjQ1YWQ7IGJhY2tncm91bmQ6IG5vbmU7IHVzZXItc2VsZWN0OiBhdXRvOyIgaHJlZj0iaHR0cHM6Ly9lbi53aWtpcGVkaWEub3JnL3dpa2kvQmxvZyNjaXRlX25vdGUtMTgiPlsxOF08L2E+PC9zdXA+Jm5ic3A7PGEgc3R5bGU9InRleHQtZGVjb3JhdGlvbi1saW5lOiBub25lOyBjb2xvcjogIzA2NDVhZDsgYmFja2dyb3VuZDogbm9uZTsgdXNlci1zZWxlY3Q6IGF1dG87IiB0aXRsZT0iRGF2ZSBXaW5lciIgaHJlZj0iaHR0cHM6Ly9lbi53aWtpcGVkaWEub3JnL3dpa2kvRGF2ZV9XaW5lciI+RGF2ZSBXaW5lcjwvYT4ncyBTY3JpcHRpbmcgTmV3cyBpcyBhbHNvIGNyZWRpdGVkIHdpdGggYmVpbmcgb25lIG9mIHRoZSBvbGRlciBhbmQgbG9uZ2VyIHJ1bm5pbmcgd2VibG9ncy48c3VwIGlkPSJjaXRlX3JlZi0xOSIgY2xhc3M9InJlZmVyZW5jZSIgc3R5bGU9ImxpbmUtaGVpZ2h0OiAxOyB1bmljb2RlLWJpZGk6IGlzb2xhdGU7IHdoaXRlLXNwYWNlOiBub3dyYXA7IGZvbnQtc2l6ZTogMTEuMnB4OyB1c2VyLXNlbGVjdDogYXV0bzsiPjxhIHN0eWxlPSJ0ZXh0LWRlY29yYXRpb24tbGluZTogbm9uZTsgY29sb3I6ICMwNjQ1YWQ7IGJhY2tncm91bmQ6IG5vbmU7IHVzZXItc2VsZWN0OiBhdXRvOyIgaHJlZj0iaHR0cHM6Ly9lbi53aWtpcGVkaWEub3JnL3dpa2kvQmxvZyNjaXRlX25vdGUtMTkiPlsxOV08L2E+PC9zdXA+PHN1cCBpZD0iY2l0ZV9yZWYtMjAiIGNsYXNzPSJyZWZlcmVuY2UiIHN0eWxlPSJsaW5lLWhlaWdodDogMTsgdW5pY29kZS1iaWRpOiBpc29sYXRlOyB3aGl0ZS1zcGFjZTogbm93cmFwOyBmb250LXNpemU6IDExLjJweDsgdXNlci1zZWxlY3Q6IGF1dG87Ij48YSBzdHlsZT0idGV4dC1kZWNvcmF0aW9uLWxpbmU6IG5vbmU7IGNvbG9yOiAjMDY0NWFkOyBiYWNrZ3JvdW5kOiBub25lOyB1c2VyLXNlbGVjdDogYXV0bzsiIGhyZWY9Imh0dHBzOi8vZW4ud2lraXBlZGlhLm9yZy93aWtpL0Jsb2cjY2l0ZV9ub3RlLTIwIj5bMjBdPC9hPjwvc3VwPiZuYnNwO1RoZSBBdXN0cmFsaWFuIE5ldGd1aWRlIG1hZ2F6aW5lIG1haW50YWluZWQgdGhlIERhaWx5IE5ldCBOZXdzPHN1cCBpZD0iY2l0ZV9yZWYtMjEiIGNsYXNzPSJyZWZlcmVuY2UiIHN0eWxlPSJsaW5lLWhlaWdodDogMTsgdW5pY29kZS1iaWRpOiBpc29sYXRlOyB3aGl0ZS1zcGFjZTogbm93cmFwOyBmb250LXNpemU6IDExLjJweDsgdXNlci1zZWxlY3Q6IGF1dG87Ij48YSBzdHlsZT0idGV4dC1kZWNvcmF0aW9uLWxpbmU6IG5vbmU7IGNvbG9yOiAjMDY0NWFkOyBiYWNrZ3JvdW5kOiBub25lOyB1c2VyLXNlbGVjdDogYXV0bzsiIGhyZWY9Imh0dHBzOi8vZW4ud2lraXBlZGlhLm9yZy93aWtpL0Jsb2cjY2l0ZV9ub3RlLTIxIj5bMjFdPC9hPjwvc3VwPiZuYnNwO29uIHRoZWlyIHdlYiBzaXRlIGZyb20gMTk5Ni4gRGFpbHkgTmV0IE5ld3MgcmFuIGxpbmtzIGFuZCBkYWlseSByZXZpZXdzIG9mIG5ldyB3ZWJzaXRlcywgbW9zdGx5IGluIEF1c3RyYWxpYS48L3A+DQo8cCBzdHlsZT0ibWFyZ2luOiAwLjVlbSAwcHg7IHVzZXItc2VsZWN0OiBhdXRvOyBjb2xvcjogIzIwMjEyMjsgZm9udC1mYW1pbHk6IHNhbnMtc2VyaWY7IGZvbnQtc2l6ZTogMTRweDsgYmFja2dyb3VuZC1jb2xvcjogI2ZmZmZmZjsiPkFub3RoZXIgZWFybHkgYmxvZyB3YXMgV2VhcmFibGUgV2lyZWxlc3MgV2ViY2FtLCBhbiBvbmxpbmUgc2hhcmVkIGRpYXJ5IG9mIGEgcGVyc29uJ3MgcGVyc29uYWwgbGlmZSBjb21iaW5pbmcgdGV4dCwgZGlnaXRhbCB2aWRlbywgYW5kIGRpZ2l0YWwgcGljdHVyZXMgdHJhbnNtaXR0ZWQgbGl2ZSBmcm9tIGEgd2VhcmFibGUgY29tcHV0ZXIgYW5kJm5ic3A7PGEgc3R5bGU9InRleHQtZGVjb3JhdGlvbi1saW5lOiBub25lOyBjb2xvcjogIzA2NDVhZDsgYmFja2dyb3VuZDogbm9uZTsgdXNlci1zZWxlY3Q6IGF1dG87IiB0aXRsZT0iRXllVGFwIiBocmVmPSJodHRwczovL2VuLndpa2lwZWRpYS5vcmcvd2lraS9FeWVUYXAiPkV5ZVRhcDwvYT4mbmJzcDtkZXZpY2UgdG8gYSB3ZWIgc2l0ZSBpbiAxOTk0LiBUaGlzIHByYWN0aWNlIG9mIHNlbWktYXV0b21hdGVkIGJsb2dnaW5nIHdpdGggbGl2ZSB2aWRlbyB0b2dldGhlciB3aXRoIHRleHQgd2FzIHJlZmVycmVkIHRvIGFzJm5ic3A7PGEgc3R5bGU9InRleHQtZGVjb3JhdGlvbi1saW5lOiBub25lOyBjb2xvcjogIzA2NDVhZDsgYmFja2dyb3VuZDogbm9uZTsgdXNlci1zZWxlY3Q6IGF1dG87IiB0aXRsZT0iU291c3ZlaWxsYW5jZSIgaHJlZj0iaHR0cHM6Ly9lbi53aWtpcGVkaWEub3JnL3dpa2kvU291c3ZlaWxsYW5jZSI+c291c3ZlaWxsYW5jZTwvYT4sIGFuZCBzdWNoIGpvdXJuYWxzIHdlcmUgYWxzbyB1c2VkIGFzIGV2aWRlbmNlIGluIGxlZ2FsIG1hdHRlcnMuIFNvbWUgZWFybHkgYmxvZ2dlcnMsIHN1Y2ggYXMgVGhlIE1pc2FudGhyb3BpYyBCaXRjaCwgd2hvIGJlZ2FuIGluIDE5OTcsIGFjdHVhbGx5IHJlZmVycmVkIHRvIHRoZWlyIG9ubGluZSBwcmVzZW5jZSBhcyBhJm5ic3A7PGEgc3R5bGU9InRleHQtZGVjb3JhdGlvbi1saW5lOiBub25lOyBjb2xvcjogIzA2NDVhZDsgYmFja2dyb3VuZDogbm9uZTsgdXNlci1zZWxlY3Q6IGF1dG87IiB0aXRsZT0iWmluZSIgaHJlZj0iaHR0cHM6Ly9lbi53aWtpcGVkaWEub3JnL3dpa2kvWmluZSI+emluZTwvYT4sIGJlZm9yZSB0aGUgdGVybSBibG9nIGVudGVyZWQgY29tbW9uIHVzYWdlLjwvcD4NCjxoMyBzdHlsZT0ibWFyZ2luOiAwLjNlbSAwcHggMHB4OyBwYWRkaW5nLXRvcDogMC41ZW07IHBhZGRpbmctYm90dG9tOiAwcHg7IG92ZXJmbG93OiBoaWRkZW47IGZvbnQtc2l6ZTogMS4yZW07IGxpbmUtaGVpZ2h0OiAxLjY7IGZvbnQtZmFtaWx5OiBzYW5zLXNlcmlmOyBiYWNrZ3JvdW5kLWNvbG9yOiAjZmZmZmZmOyB1c2VyLXNlbGVjdDogYXV0bzsiPjxzcGFuIGlkPSJUZWNobm9sb2d5IiBjbGFzcz0ibXctaGVhZGxpbmUiIHN0eWxlPSJ1c2VyLXNlbGVjdDogYXV0bzsiPlRlY2hub2xvZ3k8L3NwYW4+PC9oMz4NCjxwIHN0eWxlPSJtYXJnaW46IDAuNWVtIDBweDsgdXNlci1zZWxlY3Q6IGF1dG87IGNvbG9yOiAjMjAyMTIyOyBmb250LWZhbWlseTogc2Fucy1zZXJpZjsgZm9udC1zaXplOiAxNHB4OyBiYWNrZ3JvdW5kLWNvbG9yOiAjZmZmZmZmOyI+RWFybHkgYmxvZ3Mgd2VyZSBzaW1wbHkgbWFudWFsbHkgdXBkYXRlZCBjb21wb25lbnRzIG9mIGNvbW1vbiBXZWJzaXRlcy4gSW4gMTk5NSwgdGhlICJPbmxpbmUgRGlhcnkiIG9uIHRoZSZuYnNwOzxhIGNsYXNzPSJtdy1yZWRpcmVjdCIgc3R5bGU9InRleHQtZGVjb3JhdGlvbi1saW5lOiBub25lOyBjb2xvcjogIzA2NDVhZDsgYmFja2dyb3VuZDogbm9uZTsgdXNlci1zZWxlY3Q6IGF1dG87IiB0aXRsZT0iVHksIEluYy4iIGhyZWY9Imh0dHBzOi8vZW4ud2lraXBlZGlhLm9yZy93aWtpL1R5LF9JbmMuIj5UeSwgSW5jLjwvYT4mbmJzcDtXZWIgc2l0ZSB3YXMgcHJvZHVjZWQgYW5kIHVwZGF0ZWQgbWFudWFsbHkgYmVmb3JlIGFueSBibG9nZ2luZyBwcm9ncmFtcyB3ZXJlIGF2YWlsYWJsZS4gUG9zdHMgd2VyZSBtYWRlIHRvIGFwcGVhciBpbiByZXZlcnNlIGNocm9ub2xvZ2ljYWwgb3JkZXIgYnkgbWFudWFsbHkgdXBkYXRpbmcgdGV4dCBiYXNlZCZuYnNwOzxhIHN0eWxlPSJ0ZXh0LWRlY29yYXRpb24tbGluZTogbm9uZTsgY29sb3I6ICMwNjQ1YWQ7IGJhY2tncm91bmQ6IG5vbmU7IHVzZXItc2VsZWN0OiBhdXRvOyIgdGl0bGU9IkhUTUwiIGhyZWY9Imh0dHBzOi8vZW4ud2lraXBlZGlhLm9yZy93aWtpL0hUTUwiPkhUTUw8L2E+Jm5ic3A7Y29kZSB1c2luZyZuYnNwOzxhIGNsYXNzPSJtdy1yZWRpcmVjdCIgc3R5bGU9InRleHQtZGVjb3JhdGlvbi1saW5lOiBub25lOyBjb2xvcjogIzA2NDVhZDsgYmFja2dyb3VuZDogbm9uZTsgdXNlci1zZWxlY3Q6IGF1dG87IiB0aXRsZT0iRlRQIiBocmVmPSJodHRwczovL2VuLndpa2lwZWRpYS5vcmcvd2lraS9GVFAiPkZUUDwvYT4mbmJzcDtzb2Z0d2FyZSBpbiByZWFsIHRpbWUgc2V2ZXJhbCB0aW1lcyBhIGRheS4gVG8gdXNlcnMsIHRoaXMgb2ZmZXJlZCB0aGUgYXBwZWFyYW5jZSBvZiBhIGxpdmUgZGlhcnkgdGhhdCBjb250YWluZWQgbXVsdGlwbGUgbmV3IGVudHJpZXMgcGVyIGRheS4gQXQgdGhlIGJlZ2lubmluZyBvZiBlYWNoIG5ldyBkYXksIG5ldyBkaWFyeSBlbnRyaWVzIHdlcmUgbWFudWFsbHkgY29kZWQgaW50byBhIG5ldyBIVE1MIGZpbGUsIGFuZCB0aGUgc3RhcnQgb2YgZWFjaCBtb250aCwgZGlhcnkgZW50cmllcyB3ZXJlIGFyY2hpdmVkIGludG8gaXRzIG93biBmb2xkZXIgd2hpY2ggY29udGFpbmVkIGEgc2VwYXJhdGUgSFRNTCBwYWdlIGZvciBldmVyeSBkYXkgb2YgdGhlIG1vbnRoLiBUaGVuIG1lbnVzIHRoYXQgY29udGFpbmVkIGxpbmtzIHRvIHRoZSBtb3N0IHJlY2VudCBkaWFyeSBlbnRyeSB3ZXJlIHVwZGF0ZWQgbWFudWFsbHkgdGhyb3VnaG91dCB0aGUgc2l0ZS4gVGhpcyB0ZXh0LWJhc2VkIG1ldGhvZCBvZiBvcmdhbml6aW5nIHRob3VzYW5kcyBvZiBmaWxlcyBzZXJ2ZWQgYXMgYSBzcHJpbmdib2FyZCB0byBkZWZpbmUgZnV0dXJlIGJsb2dnaW5nIHN0eWxlcyB0aGF0IHdlcmUgY2FwdHVyZWQgYnkgYmxvZ2dpbmcgc29mdHdhcmUgZGV2ZWxvcGVkIHllYXJzIGxhdGVyLjxzdXAgaWQ9ImNpdGVfcmVmLUJlYW5pZUJhYmllc18xNi0xIiBjbGFzcz0icmVmZXJlbmNlIiBzdHlsZT0ibGluZS1oZWlnaHQ6IDE7IHVuaWNvZGUtYmlkaTogaXNvbGF0ZTsgd2hpdGUtc3BhY2U6IG5vd3JhcDsgZm9udC1zaXplOiAxMS4ycHg7IHVzZXItc2VsZWN0OiBhdXRvOyI+PGEgc3R5bGU9InRleHQtZGVjb3JhdGlvbi1saW5lOiBub25lOyBjb2xvcjogIzA2NDVhZDsgYmFja2dyb3VuZDogbm9uZTsgdXNlci1zZWxlY3Q6IGF1dG87IiBocmVmPSJodHRwczovL2VuLndpa2lwZWRpYS5vcmcvd2lraS9CbG9nI2NpdGVfbm90ZS1CZWFuaWVCYWJpZXMtMTYiPlsxNl08L2E+PC9zdXA+PC9wPg0KPHAgc3R5bGU9Im1hcmdpbjogMC41ZW0gMHB4OyB1c2VyLXNlbGVjdDogYXV0bzsgY29sb3I6ICMyMDIxMjI7IGZvbnQtZmFtaWx5OiBzYW5zLXNlcmlmOyBmb250LXNpemU6IDE0cHg7IGJhY2tncm91bmQtY29sb3I6ICNmZmZmZmY7Ij5UaGUgZXZvbHV0aW9uIG9mIGVsZWN0cm9uaWMgYW5kIHNvZnR3YXJlIHRvb2xzIHRvIGZhY2lsaXRhdGUgdGhlIHByb2R1Y3Rpb24gYW5kIG1haW50ZW5hbmNlIG9mIFdlYiBhcnRpY2xlcyBwb3N0ZWQgaW4gcmV2ZXJzZSBjaHJvbm9sb2dpY2FsIG9yZGVyIG1hZGUgdGhlIHB1Ymxpc2hpbmcgcHJvY2VzcyBmZWFzaWJsZSB0byBhIG11Y2ggbGFyZ2VyIGFuZCBsZXNzIHRlY2huaWNhbGx5LWluY2xpbmVkIHBvcHVsYXRpb24uIFVsdGltYXRlbHksIHRoaXMgcmVzdWx0ZWQgaW4gdGhlIGRpc3RpbmN0IGNsYXNzIG9mIG9ubGluZSBwdWJsaXNoaW5nIHRoYXQgcHJvZHVjZXMgYmxvZ3Mgd2UgcmVjb2duaXplIHRvZGF5LiBGb3IgaW5zdGFuY2UsIHRoZSB1c2Ugb2Ygc29tZSBzb3J0IG9mIGJyb3dzZXItYmFzZWQgc29mdHdhcmUgaXMgbm93IGEgdHlwaWNhbCBhc3BlY3Qgb2YgImJsb2dnaW5nIi4gQmxvZ3MgY2FuIGJlIGhvc3RlZCBieSBkZWRpY2F0ZWQmbmJzcDs8YSBjbGFzcz0ibXctcmVkaXJlY3QiIHN0eWxlPSJ0ZXh0LWRlY29yYXRpb24tbGluZTogbm9uZTsgY29sb3I6ICMwNjQ1YWQ7IGJhY2tncm91bmQ6IG5vbmU7IHVzZXItc2VsZWN0OiBhdXRvOyIgdGl0bGU9IkJsb2cgaG9zdGluZyBzZXJ2aWNlIiBocmVmPSJodHRwczovL2VuLndpa2lwZWRpYS5vcmcvd2lraS9CbG9nX2hvc3Rpbmdfc2VydmljZSI+YmxvZyBob3N0aW5nIHNlcnZpY2VzPC9hPiwgb24gcmVndWxhciZuYnNwOzxhIHN0eWxlPSJ0ZXh0LWRlY29yYXRpb24tbGluZTogbm9uZTsgY29sb3I6ICMwNjQ1YWQ7IGJhY2tncm91bmQ6IG5vbmU7IHVzZXItc2VsZWN0OiBhdXRvOyIgdGl0bGU9IldlYiBob3N0aW5nIHNlcnZpY2UiIGhyZWY9Imh0dHBzOi8vZW4ud2lraXBlZGlhLm9yZy93aWtpL1dlYl9ob3N0aW5nX3NlcnZpY2UiPndlYiBob3N0aW5nIHNlcnZpY2VzPC9hPiwgb3IgcnVuIHVzaW5nIGJsb2cgc29mdHdhcmUuPC9wPg0KPGgzIHN0eWxlPSJtYXJnaW46IDAuM2VtIDBweCAwcHg7IHBhZGRpbmctdG9wOiAwLjVlbTsgcGFkZGluZy1ib3R0b206IDBweDsgb3ZlcmZsb3c6IGhpZGRlbjsgZm9udC1zaXplOiAxLjJlbTsgbGluZS1oZWlnaHQ6IDEuNjsgZm9udC1mYW1pbHk6IHNhbnMtc2VyaWY7IGJhY2tncm91bmQtY29sb3I6ICNmZmZmZmY7IHVzZXItc2VsZWN0OiBhdXRvOyI+PHNwYW4gaWQ9IlJpc2VfaW5fcG9wdWxhcml0eSIgY2xhc3M9Im13LWhlYWRsaW5lIiBzdHlsZT0idXNlci1zZWxlY3Q6IGF1dG87Ij5SaXNlIGluIHBvcHVsYXJpdHk8L3NwYW4+PC9oMz4NCjxwIHN0eWxlPSJtYXJnaW46IDAuNWVtIDBweDsgdXNlci1zZWxlY3Q6IGF1dG87IGNvbG9yOiAjMjAyMTIyOyBmb250LWZhbWlseTogc2Fucy1zZXJpZjsgZm9udC1zaXplOiAxNHB4OyBiYWNrZ3JvdW5kLWNvbG9yOiAjZmZmZmZmOyI+QWZ0ZXIgYSBzbG93IHN0YXJ0LCBibG9nZ2luZyByYXBpZGx5IGdhaW5lZCBpbiBwb3B1bGFyaXR5LiBCbG9nIHVzYWdlIHNwcmVhZCBkdXJpbmcgMTk5OSBhbmQgdGhlIHllYXJzIGZvbGxvd2luZywgYmVpbmcgZnVydGhlciBwb3B1bGFyaXplZCBieSB0aGUgbmVhci1zaW11bHRhbmVvdXMgYXJyaXZhbCBvZiB0aGUgZmlyc3QgaG9zdGVkIGJsb2cgdG9vbHM6PC9wPg0KPHVsIHN0eWxlPSJsaXN0LXN0eWxlLWltYWdlOiB1cmwoJy4uL3cvc2tpbnMvVmVjdG9yL3Jlc291cmNlcy9jb21tb24vaW1hZ2VzL2J1bGxldC1pY29uLnN2Zz9kNDUxNScpOyBtYXJnaW46IDAuM2VtIDBweCAwcHggMS42ZW07IHBhZGRpbmc6IDBweDsgY29sb3I6ICMyMDIxMjI7IGZvbnQtZmFtaWx5OiBzYW5zLXNlcmlmOyBmb250LXNpemU6IDE0cHg7IGJhY2tncm91bmQtY29sb3I6ICNmZmZmZmY7IHVzZXItc2VsZWN0OiBhdXRvOyI+DQo8bGkgc3R5bGU9Im1hcmdpbi1ib3R0b206IDAuMWVtOyB1c2VyLXNlbGVjdDogYXV0bzsiPjxhIHN0eWxlPSJ0ZXh0LWRlY29yYXRpb24tbGluZTogbm9uZTsgY29sb3I6ICMwNjQ1YWQ7IGJhY2tncm91bmQ6IG5vbmU7IHVzZXItc2VsZWN0OiBhdXRvOyIgdGl0bGU9IkJydWNlIEFibGVzb24iIGhyZWY9Imh0dHBzOi8vZW4ud2lraXBlZGlhLm9yZy93aWtpL0JydWNlX0FibGVzb24iPkJydWNlIEFibGVzb248L2E+Jm5ic3A7bGF1bmNoZWQmbmJzcDs8YSBzdHlsZT0idGV4dC1kZWNvcmF0aW9uLWxpbmU6IG5vbmU7IGNvbG9yOiAjMDY0NWFkOyBiYWNrZ3JvdW5kOiBub25lOyB1c2VyLXNlbGVjdDogYXV0bzsiIHRpdGxlPSJPcGVuIERpYXJ5IiBocmVmPSJodHRwczovL2VuLndpa2lwZWRpYS5vcmcvd2lraS9PcGVuX0RpYXJ5Ij5PcGVuIERpYXJ5PC9hPiZuYnNwO2luIE9jdG9iZXIgMTk5OCwgd2hpY2ggc29vbiBncmV3IHRvIHRob3VzYW5kcyBvZiBvbmxpbmUgZGlhcmllcy4gT3BlbiBEaWFyeSBpbm5vdmF0ZWQgdGhlIHJlYWRlciBjb21tZW50LCBiZWNvbWluZyB0aGUgZmlyc3QgYmxvZyBjb21tdW5pdHkgd2hlcmUgcmVhZGVycyBjb3VsZCBhZGQgY29tbWVudHMgdG8gb3RoZXIgd3JpdGVycycgYmxvZyBlbnRyaWVzLjwvbGk+DQo8bGkgc3R5bGU9Im1hcmdpbi1ib3R0b206IDAuMWVtOyB1c2VyLXNlbGVjdDogYXV0bzsiPjxhIHN0eWxlPSJ0ZXh0LWRlY29yYXRpb24tbGluZTogbm9uZTsgY29sb3I6ICMwNjQ1YWQ7IGJhY2tncm91bmQ6IG5vbmU7IHVzZXItc2VsZWN0OiBhdXRvOyIgdGl0bGU9IkJyYWQgRml0enBhdHJpY2siIGhyZWY9Imh0dHBzOi8vZW4ud2lraXBlZGlhLm9yZy93aWtpL0JyYWRfRml0enBhdHJpY2siPkJyYWQgRml0enBhdHJpY2s8L2E+Jm5ic3A7c3RhcnRlZCZuYnNwOzxhIHN0eWxlPSJ0ZXh0LWRlY29yYXRpb24tbGluZTogbm9uZTsgY29sb3I6ICMwNjQ1YWQ7IGJhY2tncm91bmQ6IG5vbmU7IHVzZXItc2VsZWN0OiBhdXRvOyIgdGl0bGU9IkxpdmVKb3VybmFsIiBocmVmPSJodHRwczovL2VuLndpa2lwZWRpYS5vcmcvd2lraS9MaXZlSm91cm5hbCI+TGl2ZUpvdXJuYWw8L2E+Jm5ic3A7aW4gTWFyY2ggMTk5OS48L2xpPg0KPGxpIHN0eWxlPSJtYXJnaW4tYm90dG9tOiAwLjFlbTsgdXNlci1zZWxlY3Q6IGF1dG87Ij5BbmRyZXcgU21hbGVzIGNyZWF0ZWQgUGl0YXMuY29tIGluIEp1bHkgMTk5OSBhcyBhbiBlYXNpZXIgYWx0ZXJuYXRpdmUgdG8gbWFpbnRhaW5pbmcgYSAibmV3cyBwYWdlIiBvbiBhIFdlYiBzaXRlLCBmb2xsb3dlZCBieSBEaWFyeUxhbmQgaW4gU2VwdGVtYmVyIDE5OTksIGZvY3VzaW5nIG1vcmUgb24gYSBwZXJzb25hbCBkaWFyeSBjb21tdW5pdHkuPHN1cCBpZD0iY2l0ZV9yZWYtMjIiIGNsYXNzPSJyZWZlcmVuY2UiIHN0eWxlPSJsaW5lLWhlaWdodDogMTsgdW5pY29kZS1iaWRpOiBpc29sYXRlOyB3aGl0ZS1zcGFjZTogbm93cmFwOyBmb250LXNpemU6IDExLjJweDsgdXNlci1zZWxlY3Q6IGF1dG87Ij48YSBzdHlsZT0idGV4dC1kZWNvcmF0aW9uLWxpbmU6IG5vbmU7IGNvbG9yOiAjMDY0NWFkOyBiYWNrZ3JvdW5kOiBub25lOyB1c2VyLXNlbGVjdDogYXV0bzsiIGhyZWY9Imh0dHBzOi8vZW4ud2lraXBlZGlhLm9yZy93aWtpL0Jsb2cjY2l0ZV9ub3RlLTIyIj5bMjJdPC9hPjwvc3VwPjwvbGk+DQo8bGkgc3R5bGU9Im1hcmdpbi1ib3R0b206IDAuMWVtOyB1c2VyLXNlbGVjdDogYXV0bzsiPjxhIHN0eWxlPSJ0ZXh0LWRlY29yYXRpb24tbGluZTogbm9uZTsgY29sb3I6ICMwNjQ1YWQ7IGJhY2tncm91bmQ6IG5vbmU7IHVzZXItc2VsZWN0OiBhdXRvOyIgdGl0bGU9IkV2YW4gV2lsbGlhbXMgKEludGVybmV0IGVudHJlcHJlbmV1cikiIGhyZWY9Imh0dHBzOi8vZW4ud2lraXBlZGlhLm9yZy93aWtpL0V2YW5fV2lsbGlhbXNfKEludGVybmV0X2VudHJlcHJlbmV1cikiPkV2YW4gV2lsbGlhbXM8L2E+Jm5ic3A7YW5kJm5ic3A7PGEgc3R5bGU9InRleHQtZGVjb3JhdGlvbi1saW5lOiBub25lOyBjb2xvcjogIzA2NDVhZDsgYmFja2dyb3VuZDogbm9uZTsgdXNlci1zZWxlY3Q6IGF1dG87IiB0aXRsZT0iTWVnIEhvdXJpaGFuIiBocmVmPSJodHRwczovL2VuLndpa2lwZWRpYS5vcmcvd2lraS9NZWdfSG91cmloYW4iPk1lZyBIb3U8L2E+PC9saT4NCjwvdWw+', 'files/3681469progress report.docx', 14),
(83, 'arival of new', 'software', 'nedd to complete one time', 'PHA+bm8gbm1vcmU8L3A+', 'files/2122858850SHARJEEL WAKEEL CV.docx', 14),
(84, 'product ', 'website', 'avbc', 'PHA+aGVsbG88L3A+', 'files/591246281sharjeel wakeel cv.pdf', 14);

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `s_id` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `m_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `s_date` timestamp NULL DEFAULT NULL,
  `e_date` timestamp NULL DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`s_id`, `c_id`, `m_id`, `p_id`, `s_date`, `e_date`, `date`) VALUES
(10, 33, 12, 80, '2020-11-02 05:00:00', '2022-03-03 05:00:00', '2022-03-05 20:11:21'),
(11, 0, 13, 80, NULL, NULL, '2022-03-27 10:08:44'),
(12, 0, 14, 80, NULL, NULL, '2022-03-27 10:08:48'),
(13, 0, 15, 80, NULL, NULL, '2022-03-27 10:08:59'),
(14, 0, 16, 80, NULL, NULL, '2022-03-27 10:09:01'),
(15, 0, 17, 80, NULL, NULL, '2022-03-27 10:09:03'),
(16, 0, 18, 80, NULL, NULL, '2022-03-27 10:09:41'),
(17, 0, 19, 80, NULL, NULL, '2022-03-27 10:12:50'),
(18, 0, 20, 80, NULL, NULL, '2022-03-27 10:14:09'),
(21, 0, 23, 80, '2022-03-06 05:00:00', '2023-03-24 04:00:00', '2022-03-27 16:35:22'),
(22, 0, 24, 71, NULL, NULL, '2022-03-27 16:39:01'),
(23, 0, 25, 80, '2022-03-21 04:00:00', '2023-04-27 04:00:00', '2022-03-27 21:07:15'),
(24, 0, 26, 80, '2022-04-25 04:00:00', '2023-09-26 04:00:00', '2022-03-27 21:11:33'),
(25, 0, 27, 80, '2022-04-26 04:00:00', '2023-10-27 04:00:00', '2022-03-28 20:40:02'),
(26, 0, 28, 80, '2022-04-13 04:00:00', '2023-09-29 04:00:00', '2022-03-28 20:40:54'),
(27, 0, 29, 80, '2022-04-26 04:00:00', '2022-04-27 04:00:00', '2022-03-31 20:59:42'),
(28, 0, 30, 80, NULL, NULL, '2022-03-31 20:59:56'),
(29, 0, 31, 80, NULL, NULL, '2022-03-31 21:00:52'),
(30, 0, 32, 80, NULL, NULL, '2022-03-31 21:01:19'),
(31, 0, 33, 80, '2022-04-24 04:00:00', '2022-08-06 04:00:00', '2022-03-31 21:03:39'),
(32, 0, 34, 80, '2022-03-06 05:00:00', '2022-03-10 05:00:00', '2022-03-31 21:05:32'),
(33, 0, 35, 80, '2022-04-17 04:00:00', '2022-04-01 04:00:00', '2022-03-31 21:07:40'),
(34, 0, 36, 80, '2022-03-06 05:00:00', '2022-03-13 05:00:00', '2022-03-31 21:09:29'),
(35, 0, 37, 80, '2022-03-05 05:00:00', '2022-03-10 05:00:00', '2022-03-31 21:11:50'),
(36, 0, 38, 80, NULL, NULL, '2022-03-31 21:13:19'),
(37, 0, 39, 80, NULL, NULL, '2022-03-31 21:15:47'),
(38, 0, 40, 80, NULL, NULL, '2022-03-31 21:18:43'),
(39, 0, 41, 80, NULL, NULL, '2022-03-31 21:37:23'),
(40, 0, 42, 80, NULL, NULL, '2022-03-31 21:38:10'),
(41, 0, 43, 80, NULL, NULL, '2022-03-31 21:47:27'),
(42, 0, 44, 80, NULL, NULL, '2022-04-01 17:09:46'),
(43, 0, 45, 80, NULL, NULL, '2022-04-01 17:10:20'),
(44, 33, 46, 80, '2022-04-04 04:00:00', '2024-02-09 05:00:00', '2022-04-03 18:58:07'),
(45, 33, 47, 80, NULL, NULL, '2022-04-04 11:11:09'),
(46, 25, 48, 80, NULL, NULL, '2022-04-04 14:53:12'),
(47, 25, 49, 80, '2022-04-24 04:00:00', '2022-07-30 04:00:00', '2022-04-04 17:56:36'),
(48, 33, 50, 80, NULL, NULL, '2022-04-05 15:15:33'),
(49, 33, 51, 80, '2022-04-26 04:00:00', '2022-08-31 04:00:00', '2022-04-12 17:51:58'),
(50, 25, 52, 84, NULL, NULL, '2022-04-15 07:06:27'),
(51, 33, 53, 84, NULL, NULL, '2022-04-21 19:18:00');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `password`) VALUES
(1, 'sh', '123'),
(2, 'danial.wakeel@hotmail.com', '123'),
(3, 'saeed@gmail.com', '123'),
(4, '', ''),
(5, '', ''),
(6, '', ''),
(7, '', ''),
(8, 'wakeel@gmail.com', '123'),
(9, '', ''),
(10, '', ''),
(11, '', ''),
(12, '', ''),
(13, '', ''),
(14, '', ''),
(15, '', ''),
(16, '', ''),
(17, '', ''),
(18, '', ''),
(19, '', ''),
(20, '', ''),
(21, '', ''),
(22, '', ''),
(23, '', ''),
(24, '', ''),
(25, '', ''),
(26, '', ''),
(27, '', ''),
(28, '', ''),
(29, 'sharjeelwakeel@gmail.com', 'Sharjeelwakeel123'),
(30, 'sharjeelwakeel@gmail.com', 'Sharjeelwakeel123'),
(31, 'sharjeelwakee@lgmail.com', 'dasdsa'),
(32, 'danial.wakeel@hotmail.com', 'Sharjeelwakeel123'),
(33, 'danial.wakeel@hotmail.com', 'Sh123'),
(34, 'danial.wakeel@hotmail.com', 'Sh123'),
(35, 'danial.wakeel@hotmail.com', 'Sh123'),
(36, 'wakeel@gmail.com', 'Sh123'),
(37, '', ''),
(38, '', ''),
(39, '', ''),
(40, 'danial.wakeel@hotmai.com', 'Sh123'),
(41, '', ''),
(42, '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `assign_projects`
--
ALTER TABLE `assign_projects`
  ADD PRIMARY KEY (`r_id`);

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`msg_id`);

--
-- Indexes for table `cost`
--
ALTER TABLE `cost`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `emails`
--
ALTER TABLE `emails`
  ADD PRIMARY KEY (`e_id`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`h_id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`l_id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`m_id`);

--
-- Indexes for table `module`
--
ALTER TABLE `module`
  ADD PRIMARY KEY (`mod_id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`n_id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `assign_projects`
--
ALTER TABLE `assign_projects`
  MODIFY `r_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=350;

--
-- AUTO_INCREMENT for table `cost`
--
ALTER TABLE `cost`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `emails`
--
ALTER TABLE `emails`
  MODIFY `e_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `h_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `l_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=156;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `m_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `module`
--
ALTER TABLE `module`
  MODIFY `mod_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `n_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=260;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
