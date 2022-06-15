-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 15, 2022 at 11:35 PM
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
(33, 47, 85, '2022-06-13 11:22:20', '2022-06-22 04:00:00', 'seen', 'wel done', 'unseen', 'notverify'),
(34, 48, 85, '2022-06-14 10:39:57', '2022-06-25 04:00:00', 'seen', 'asdasdsad', 'unseen', 'notverify');

-- --------------------------------------------------------

--
-- Table structure for table `backlog`
--

CREATE TABLE `backlog` (
  `b_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `s_date` timestamp NULL DEFAULT NULL,
  `e_date` timestamp NULL DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `backlog`
--

INSERT INTO `backlog` (`b_id`, `p_id`, `name`, `s_date`, `e_date`, `date`) VALUES
(5, 85, 'no way', '2021-08-08 04:00:00', '2022-09-23 04:00:00', '2022-06-13 22:03:13');

-- --------------------------------------------------------

--
-- Table structure for table `browser`
--

CREATE TABLE `browser` (
  `b_id` int(11) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `browser`
--

INSERT INTO `browser` (`b_id`, `name`) VALUES
(2, 'Internet Explorer 6'),
(3, 'Internet Explorer 7'),
(4, 'Infinix S3x'),
(5, 'Sumsung g1'),
(6, 'Firefox2.1'),
(7, 'testing');

-- --------------------------------------------------------

--
-- Table structure for table `browser_cross`
--

CREATE TABLE `browser_cross` (
  `id` int(11) NOT NULL,
  `t_id` int(11) NOT NULL,
  `b_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `browser_cross`
--

INSERT INTO `browser_cross` (`id`, `t_id`, `b_id`) VALUES
(19, 8, 1),
(20, 8, 2),
(30, 1, 2),
(31, 1, 5),
(32, 9, 5),
(34, 11, 4),
(38, 12, 5),
(40, 10, 3);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `c_id` int(11) NOT NULL,
  `c_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`c_id`, `c_name`) VALUES
(1, 'Hardware'),
(2, 'Software'),
(3, 'Webiste'),
(4, 'App');

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
(382, 47, 14, 'sir', 'seen', 1, '2022-06-13 11:24:51'),
(383, 14, 47, 'g', 'seen', 0, '2022-06-13 11:25:03'),
(384, 47, 14, 'how are you>>>', 'seen', 1, '2022-06-13 11:25:23'),
(385, 14, 47, 'fine', 'seen', 0, '2022-06-13 11:25:34'),
(386, 14, 47, '??', 'seen', 0, '2022-06-13 11:25:43'),
(387, 47, 14, 'ok', 'seen', 1, '2022-06-13 11:25:55');

-- --------------------------------------------------------

--
-- Table structure for table `content`
--

CREATE TABLE `content` (
  `c_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `r_id` int(11) NOT NULL,
  `status` text NOT NULL,
  `description` text NOT NULL,
  `file_path` text DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `m_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(10, 85, 47, 47, 62, 'cost', 'sdasdsa', 12, '2022-06-13 22:01:59'),
(11, 85, 47, 47, 62, 'sdas', 'sdad', 1212, '2022-06-13 22:02:32'),
(12, 85, 48, 47, 63, 'cost', 'asdasds', 12, '2022-06-14 10:44:49');

-- --------------------------------------------------------

--
-- Table structure for table `cpu`
--

CREATE TABLE `cpu` (
  `c_id` int(11) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cpu`
--

INSERT INTO `cpu` (`c_id`, `name`) VALUES
(1, 'AMD 64'),
(2, 'x86-32'),
(4, 'x86-64');

-- --------------------------------------------------------

--
-- Table structure for table `cpu_cross`
--

CREATE TABLE `cpu_cross` (
  `id` int(11) NOT NULL,
  `t_id` int(11) NOT NULL,
  `c_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cpu_cross`
--

INSERT INTO `cpu_cross` (`id`, `t_id`, `c_id`) VALUES
(16, 8, 1),
(17, 8, 2),
(29, 1, 1),
(30, 9, 1),
(31, 9, 2),
(33, 11, 4),
(37, 12, 2),
(39, 10, 2);

-- --------------------------------------------------------

--
-- Table structure for table `defect`
--

CREATE TABLE `defect` (
  `d_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `t_id` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `description` text NOT NULL,
  `status` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `defect`
--

INSERT INTO `defect` (`d_id`, `p_id`, `t_id`, `c_id`, `description`, `status`, `date`) VALUES
(6, 85, 10, 47, 'check now', 'Removed', '2022-06-14 10:23:28'),
(7, 85, 10, 47, 'now', 'Removed', '2022-06-14 10:26:25'),
(8, 85, 10, 48, 'add', 'Pending', '2022-06-14 10:47:02'),
(9, 85, 10, 48, 'asd', 'Pending', '2022-06-14 11:11:15');

-- --------------------------------------------------------

--
-- Table structure for table `designation`
--

CREATE TABLE `designation` (
  `d_id` int(11) NOT NULL,
  `d_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `designation`
--

INSERT INTO `designation` (`d_id`, `d_name`) VALUES
(2, 'MS'),
(5, 'P.HD'),
(28, 'BS');

-- --------------------------------------------------------

--
-- Table structure for table `emails`
--

CREATE TABLE `emails` (
  `e_id` int(11) NOT NULL,
  `crt_id` int(11) NOT NULL,
  `m_id` int(11) NOT NULL,
  `rand_num` int(11) NOT NULL,
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

INSERT INTO `emails` (`e_id`, `crt_id`, `m_id`, `rand_num`, `subject`, `description`, `category`, `file_path`, `date`, `status`) VALUES
(103, 47, 14, 92133790, 'testinh', 'pok', 1, 'files/561560888final product lifecycle magagment.docx', '2022-06-13 11:26:29', 'seen'),
(104, 14, 47, 806330792, 'testinh', 'pok', 0, 'files/561560888final product lifecycle magagment.docx', '2022-06-13 11:26:55', 'seen');

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
(199, 85, 47, 'add schedule of module chatting', '2022-06-13 21:58:03'),
(200, 85, 47, 'delete module chatting', '2022-06-13 21:59:32'),
(201, 85, 47, 'add module', '2022-06-13 22:00:07'),
(202, 85, 47, 'add schedule of module new', '2022-06-13 22:00:37'),
(203, 85, 47, 'add cost of cost', '2022-06-13 22:01:59'),
(204, 85, 47, 'add cost of sdas', '2022-06-13 22:02:32'),
(205, 85, 47, 'add requirement', '2022-06-14 10:03:32'),
(206, 85, 47, 'add requirement', '2022-06-14 10:04:30'),
(207, 85, 47, 'add test case', '2022-06-14 10:05:43'),
(208, 85, 47, 'add defect', '2022-06-14 10:06:28'),
(209, 85, 47, 'add defect', '2022-06-14 10:22:59'),
(210, 85, 47, 'add defect', '2022-06-14 10:23:28'),
(211, 85, 47, 'add defect', '2022-06-14 10:26:25'),
(212, 85, 47, 'delete requirement new', '2022-06-14 10:27:09'),
(213, 85, 47, 'req requirement replaced name by change', '2022-06-14 10:28:10'),
(214, 85, 47, 'change requirement replaced name by new', '2022-06-14 10:32:07'),
(215, 85, 47, 'add requirement', '2022-06-14 10:33:28'),
(216, 85, 47, 'add test case', '2022-06-14 10:34:03'),
(217, 85, 47, 'delete requirement jeck', '2022-06-14 10:34:15'),
(218, 85, 47, 'add module', '2022-06-14 10:43:27'),
(219, 85, 47, 'add schedule of module add', '2022-06-14 10:44:05'),
(220, 85, 48, 'add cost of cost', '2022-06-14 10:44:49'),
(221, 85, 47, 'add requirement', '2022-06-14 10:45:23'),
(222, 85, 48, 'add test case', '2022-06-14 10:46:05'),
(223, 85, 48, 'add defect', '2022-06-14 10:47:02'),
(224, 85, 48, 'add defect', '2022-06-14 11:11:15'),
(225, 85, 47, 'delete defect ', '2022-06-14 11:12:13'),
(226, 85, 47, 'made some changes in defect Pending', '2022-06-14 11:17:35'),
(227, 85, 47, 'delete defect ', '2022-06-14 11:20:25'),
(228, 85, 47, 'made some changes in requirment new', '2022-06-14 11:23:55'),
(229, 85, 48, 'made some changes in test case dasds', '2022-06-14 11:24:50'),
(230, 85, 48, 'made some changes in test case dasds', '2022-06-14 11:25:03'),
(231, 85, 48, 'made some changes in test case dasds', '2022-06-14 11:25:14'),
(232, 85, 47, 'made some changes in test case test', '2022-06-14 11:31:14'),
(233, 85, 48, 'made some changes in test case test', '2022-06-14 11:31:50');

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
(161, 34, '5'),
(162, 34, '2'),
(163, 34, '6'),
(165, 30, '5'),
(166, 35, '2'),
(167, 35, '5'),
(168, 36, '2'),
(169, 37, '5'),
(170, 38, '2'),
(171, 39, '2'),
(175, 47, '2');

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
  `category` text NOT NULL,
  `img_path` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`m_id`, `f_name`, `l_name`, `reg_no`, `email`, `password`, `designation`, `speciality`, `category`, `img_path`, `date`) VALUES
(47, 'zeeshan ', 'nawaz', '18-arid-2770', 'bPvzNzeeshannawaz@plcm.com', 'g9K7GLo165', '28', '1', 'CR', 'images/976761839Driver’s License.jpg', '2022-06-13 04:00:00'),
(48, 'abdullah ', 'talat', '18-arid-2595', 'OdaFAabdullahtalat@plcm.com', 'NNqXQX7k1R', '5', '1', 'CR', 'images/193910229298341558_279333590123740_5835491160776245248_n.jpg', '2022-06-13 10:53:30');

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
  `file_status` text NOT NULL,
  `description` longtext NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `module`
--

INSERT INTO `module` (`mod_id`, `create_id`, `assign_id`, `p_id`, `subject`, `status`, `priority`, `type`, `m_file_path`, `file_status`, `description`, `date`) VALUES
(62, 47, 47, 85, 'new', 'Schedule', 'Low', 'Milestone', NULL, '', '', '2022-06-13 22:00:07'),
(63, 47, 48, 85, 'add', 'To be schedule', 'Low', 'Milestone', NULL, '', '', '2022-06-14 10:43:27');

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
(517, 85, 47, 14, ' ', 'add schedule of module chatting in', 'admin', 'c_detail.php?mod_id=61&&', '2022-06-13 21:58:03', 'seen'),
(518, 85, 47, 14, ' ', 'delete module chatting in', 'admin', 'work_packages.php?', '2022-06-13 21:59:32', 'seen'),
(519, 85, 47, 14, 'new', 'add module in', 'admin', 'work_packages.php?', '2022-06-13 22:00:07', 'seen'),
(520, 85, 47, 14, ' ', 'add schedule of module new in', 'admin', 'c_detail.php?mod_id=62&&', '2022-06-13 22:00:37', 'seen'),
(521, 85, 47, 14, '', 'add cost of cost in', 'admin', 'cost_analysis.php?', '2022-06-13 22:01:59', 'seen'),
(522, 85, 47, 14, '', 'add cost of sdas in', 'admin', 'cost_analysis.php?', '2022-06-13 22:02:32', 'seen'),
(523, 85, 47, 14, 'req', 'add requirement in', 'admin', 'require.php?', '2022-06-14 10:03:33', 'seen'),
(524, 85, 47, 14, 'new', 'add requirement in', 'admin', 'require.php?', '2022-06-14 10:04:30', 'seen'),
(525, 85, 47, 14, 'test', 'add test case in', 'admin', 'quality.php?', '2022-06-14 10:05:43', 'seen'),
(526, 85, 47, 14, 'typing mistakes', 'add defect in', 'admin', 'defect.php?', '2022-06-14 10:06:28', 'seen'),
(527, 85, 47, 14, 'chatiing module not working', 'add defect in', 'admin', 'defect.php?t_id=5', '2022-06-14 10:22:59', 'unseen'),
(528, 85, 47, 14, 'check now', 'add defect in', 'admin', 'defect.php?t_id=6&&', '2022-06-14 10:23:28', 'seen'),
(529, 85, 47, 14, 'now', 'add defect in', 'admin', 'defect.php?t_id=10&&', '2022-06-14 10:26:25', 'seen'),
(530, 85, 47, 14, ' ', 'delete requirment new in', 'admin', 'require.php?', '2022-06-14 10:27:09', 'seen'),
(531, 85, 47, 14, ' ', 'req requirement replaced name by change', 'admin', 'require.php?', '2022-06-14 10:28:10', 'seen'),
(532, 85, 47, 14, ' ', 'change requirement replaced name by new', 'admin', 'require.php?', '2022-06-14 10:32:07', 'seen'),
(533, 85, 47, 14, 'jeck', 'add requirement in', 'admin', 'require.php?', '2022-06-14 10:33:28', 'unseen'),
(534, 85, 47, 14, 'dele', 'add test case in', 'admin', 'quality.php?', '2022-06-14 10:34:03', 'unseen'),
(535, 85, 47, 14, ' ', 'delete requirment jeck in', 'admin', 'require.php?', '2022-06-14 10:34:15', 'unseen'),
(536, 85, 14, 48, 'assign', 'assign project ', 'admin', 'detail_project.php', '2022-06-14 10:39:57', 'seen'),
(537, 85, 47, 14, 'add', 'add module in', 'admin', 'work_packages.php?', '2022-06-14 10:43:27', 'unseen'),
(538, 85, 47, 48, 'add', 'add module in', 'member', 'work_packages.php', '2022-06-14 10:43:27', 'seen'),
(539, 85, 47, 14, ' ', 'add schedule of module add in', 'admin', 'c_detail.php?mod_id=63&&', '2022-06-14 10:44:05', 'unseen'),
(540, 85, 47, 48, ' ', 'add schedule of module add in', 'member', 'add_schedule.php', '2022-06-14 10:44:05', 'seen'),
(541, 85, 48, 14, '', 'add cost of cost in', 'admin', 'cost_analysis.php?', '2022-06-14 10:44:49', 'unseen'),
(542, 85, 48, 47, '', 'add cost of cost in', 'member', 'add_cost.php', '2022-06-14 10:44:49', 'seen'),
(543, 85, 47, 14, 'req', 'add requirement in', 'admin', 'require.php?', '2022-06-14 10:45:23', 'unseen'),
(544, 85, 47, 48, 'req', 'add requirement in', 'member', 'require.php', '2022-06-14 10:45:23', 'seen'),
(545, 85, 48, 14, 'dasds', 'add test case in', 'admin', 'quality.php?', '2022-06-14 10:46:05', 'unseen'),
(546, 85, 48, 47, 'dasds', 'add test case in', 'member', 'quality.php', '2022-06-14 10:46:05', 'seen'),
(547, 85, 48, 14, 'add', 'add defect in', 'admin', 'defect.php?t_id=10&&', '2022-06-14 10:47:02', 'unseen'),
(548, 85, 48, 47, 'add', 'add defect in', 'member', 'defect.php', '2022-06-14 10:47:02', 'seen'),
(549, 85, 48, 14, 'asd', 'add defect in', 'admin', 'defect.php?t_id=10&&', '2022-06-14 11:11:15', 'unseen'),
(550, 85, 48, 47, 'asd', 'add defect in', 'member', 'defect.php?t_id=10&&', '2022-06-14 11:11:15', 'seen'),
(551, 85, 47, 14, ' ', 'delete defect in ', 'admin', 'defect.php?', '2022-06-14 11:12:13', 'unseen'),
(552, 85, 47, 48, ' ', 'delete defect in ', 'member', 'defect.php', '2022-06-14 11:12:13', 'unseen'),
(553, 85, 47, 14, ' ', 'made some changes in defect Pending', 'admin', 'defect.php?t_id=5&&', '2022-06-14 11:17:35', 'unseen'),
(554, 85, 47, 48, ' ', 'made some changes in defect Pending', 'member', 'defect.php?t_id=5&&', '2022-06-14 11:17:35', 'seen'),
(555, 85, 47, 14, ' ', 'delete defect in ', 'admin', 'defect.php?t_id=10&&', '2022-06-14 11:20:26', 'unseen'),
(556, 85, 47, 48, ' ', 'delete defect in ', 'member', 'defect.php?t_id=10&&', '2022-06-14 11:20:26', 'seen'),
(557, 85, 47, 14, ' ', 'made some changes in requirment new', 'admin', 'require.php?', '2022-06-14 11:23:55', 'unseen'),
(558, 85, 47, 48, ' ', 'made some changes in requirment new', 'member', 'require.php', '2022-06-14 11:23:55', 'seen'),
(559, 85, 48, 14, ' ', 'made some changes in test case dasds', 'admin', 'quality.php?', '2022-06-14 11:24:50', 'unseen'),
(560, 85, 48, 47, ' ', 'made some changes in test case dasds', 'member', 'quality.php', '2022-06-14 11:24:50', 'unseen'),
(561, 85, 48, 14, ' ', 'made some changes in test case dasds', 'admin', 'quality.php?', '2022-06-14 11:25:03', 'unseen'),
(562, 85, 48, 47, ' ', 'made some changes in test case dasds', 'member', 'quality.php', '2022-06-14 11:25:03', 'unseen'),
(563, 85, 48, 14, ' ', 'made some changes in test case dasds', 'admin', 'quality.php?', '2022-06-14 11:25:14', 'unseen'),
(564, 85, 48, 47, ' ', 'made some changes in test case dasds', 'member', 'quality.php', '2022-06-14 11:25:14', 'seen'),
(565, 85, 47, 14, ' ', 'made some changes in test case test', 'admin', 'quality.php?', '2022-06-14 11:31:14', 'unseen'),
(566, 85, 47, 48, ' ', 'made some changes in test case test', 'member', 'quality.php', '2022-06-14 11:31:14', 'seen'),
(567, 85, 48, 14, ' ', 'made some changes in test case test', 'admin', 'quality.php?', '2022-06-14 11:31:50', 'unseen'),
(568, 85, 48, 47, ' ', 'made some changes in test case test', 'member', 'quality.php', '2022-06-14 11:31:50', 'seen');

-- --------------------------------------------------------

--
-- Table structure for table `operating_system`
--

CREATE TABLE `operating_system` (
  `o_id` int(11) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `operating_system`
--

INSERT INTO `operating_system` (`o_id`, `name`) VALUES
(1, 'RedHat Linux'),
(2, 'Window Vista Business'),
(3, 'Window XP'),
(4, 'Andriod'),
(6, 'IOs');

-- --------------------------------------------------------

--
-- Table structure for table `operating_system_cross`
--

CREATE TABLE `operating_system_cross` (
  `id` int(11) NOT NULL,
  `t_id` int(11) NOT NULL,
  `o_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `operating_system_cross`
--

INSERT INTO `operating_system_cross` (`id`, `t_id`, `o_id`) VALUES
(3, 5, 2),
(4, 5, 3),
(5, 6, 2),
(6, 6, 3),
(15, 8, 1),
(16, 8, 2),
(17, 8, 3),
(18, 8, 4),
(19, 8, 5),
(29, 1, 2),
(30, 9, 2),
(32, 11, 3),
(36, 12, 2),
(38, 10, 2);

-- --------------------------------------------------------

--
-- Table structure for table `permission`
--

CREATE TABLE `permission` (
  `p_id` int(11) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `permission`
--

INSERT INTO `permission` (`p_id`, `name`) VALUES
(1, 'add module'),
(2, 'delete module'),
(4, 'update module'),
(6, 'add cost '),
(7, 'update cost'),
(8, 'delete cost'),
(9, 'add schedule '),
(10, 'update schedule'),
(11, 'delete schedule'),
(12, 'add require'),
(13, 'update require'),
(14, 'delete require'),
(15, 'add test'),
(16, 'update test'),
(17, 'delete test'),
(18, 'add defect'),
(19, 'update defect'),
(20, 'delete defect');

-- --------------------------------------------------------

--
-- Table structure for table `permission_status`
--

CREATE TABLE `permission_status` (
  `s_id` int(11) NOT NULL,
  `m_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `status` text NOT NULL COMMENT 'yes:allow,no:no allow'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `permission_status`
--

INSERT INTO `permission_status` (`s_id`, `m_id`, `p_id`, `status`) VALUES
(1, 33, 1, 'yes'),
(2, 33, 2, 'yes'),
(4, 33, 4, 'yes'),
(6, 33, 6, 'yes'),
(7, 33, 7, 'yes'),
(8, 33, 8, 'yes'),
(9, 33, 9, 'no'),
(10, 33, 10, 'yes'),
(11, 33, 11, 'yes'),
(12, 33, 12, 'yes'),
(13, 33, 13, 'yes'),
(14, 33, 14, 'no'),
(15, 33, 15, 'no'),
(16, 33, 16, 'yes'),
(17, 33, 17, 'no'),
(18, 33, 18, 'yes'),
(19, 33, 19, 'yes'),
(20, 33, 20, 'yes'),
(21, 25, 1, 'no'),
(22, 25, 2, 'no'),
(23, 25, 4, 'no'),
(24, 25, 6, 'no'),
(25, 25, 7, 'no'),
(26, 25, 8, 'no'),
(27, 25, 9, 'no'),
(28, 25, 10, 'no'),
(29, 25, 11, 'no'),
(30, 25, 12, 'no'),
(31, 25, 13, 'no'),
(32, 25, 14, 'no'),
(33, 25, 15, 'no'),
(34, 25, 16, 'no'),
(35, 25, 17, 'no'),
(36, 25, 18, 'no'),
(37, 25, 19, 'no'),
(38, 25, 20, 'no'),
(39, 46, 1, 'yes'),
(40, 46, 2, 'yes'),
(41, 46, 4, 'yes'),
(42, 46, 6, 'yes'),
(43, 46, 7, 'yes'),
(44, 46, 8, 'yes'),
(45, 46, 9, 'yes'),
(46, 46, 10, 'yes'),
(47, 46, 11, 'yes'),
(48, 46, 12, 'yes'),
(49, 46, 13, 'yes'),
(50, 46, 14, 'yes'),
(51, 46, 15, 'yes'),
(52, 46, 16, 'yes'),
(53, 46, 17, 'yes'),
(54, 46, 18, 'yes'),
(55, 46, 19, 'yes'),
(56, 46, 20, 'yes'),
(57, 47, 1, 'yes'),
(58, 47, 2, 'yes'),
(59, 47, 4, 'yes'),
(60, 47, 6, 'yes'),
(61, 47, 7, 'yes'),
(62, 47, 8, 'yes'),
(63, 47, 9, 'yes'),
(64, 47, 10, 'yes'),
(65, 47, 11, 'yes'),
(66, 47, 12, 'yes'),
(67, 47, 13, 'yes'),
(68, 47, 14, 'yes'),
(69, 47, 15, 'yes'),
(70, 47, 16, 'yes'),
(71, 47, 17, 'yes'),
(72, 47, 18, 'yes'),
(73, 47, 19, 'yes'),
(74, 47, 20, 'yes'),
(75, 48, 1, 'yes'),
(76, 48, 2, 'yes'),
(77, 48, 4, 'yes'),
(78, 48, 6, 'yes'),
(79, 48, 7, 'yes'),
(80, 48, 8, 'yes'),
(81, 48, 9, 'yes'),
(82, 48, 10, 'yes'),
(83, 48, 11, 'yes'),
(84, 48, 12, 'yes'),
(85, 48, 13, 'yes'),
(86, 48, 14, 'yes'),
(87, 48, 15, 'yes'),
(88, 48, 16, 'yes'),
(89, 48, 17, 'yes'),
(90, 48, 18, 'yes'),
(91, 48, 19, 'yes'),
(92, 48, 20, 'yes'),
(93, 49, 1, 'yes'),
(94, 49, 2, 'yes'),
(95, 49, 4, 'yes'),
(96, 49, 6, 'yes'),
(97, 49, 7, 'yes'),
(98, 49, 8, 'yes'),
(99, 49, 9, 'yes'),
(100, 49, 10, 'yes'),
(101, 49, 11, 'yes'),
(102, 49, 12, 'yes'),
(103, 49, 13, 'yes'),
(104, 49, 14, 'yes'),
(105, 49, 15, 'yes'),
(106, 49, 16, 'yes'),
(107, 49, 17, 'yes'),
(108, 49, 18, 'yes'),
(109, 49, 19, 'yes'),
(110, 49, 20, 'yes');

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
(85, 'testing ', '2', 'testing for fyp', 'PHA+Y2hlY2tpbmcgc29mdHdhcmU8L3A+', 'files/2116881162abdullah assign.docx', 14);

-- --------------------------------------------------------

--
-- Table structure for table `requirement`
--

CREATE TABLE `requirement` (
  `r_id` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `mod_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `artifact` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `requirement`
--

INSERT INTO `requirement` (`r_id`, `c_id`, `p_id`, `mod_id`, `name`, `artifact`, `date`) VALUES
(6, 47, 85, 62, 'new', 'Scenario Act', '2022-06-14 10:32:07'),
(9, 47, 85, 62, 'req', 'Scenario Scene', '2022-06-14 10:45:23');

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
(60, 47, 62, 85, '2022-06-12 04:00:00', '2022-06-13 04:00:00', '2022-06-13 22:00:07'),
(61, 47, 63, 85, '2022-06-12 04:00:00', '2022-06-22 04:00:00', '2022-06-14 10:43:27');

-- --------------------------------------------------------

--
-- Table structure for table `speciality`
--

CREATE TABLE `speciality` (
  `s_id` int(11) NOT NULL,
  `s_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `speciality`
--

INSERT INTO `speciality` (`s_id`, `s_name`) VALUES
(1, 'Mobile App development'),
(2, 'Web development'),
(5, 'full stack developer');

-- --------------------------------------------------------

--
-- Table structure for table `storage`
--

CREATE TABLE `storage` (
  `d_id` int(11) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `storage`
--

INSERT INTO `storage` (`d_id`, `name`) VALUES
(2, 'Oracle11g'),
(3, 'SQL Server 2008'),
(4, 'DB2');

-- --------------------------------------------------------

--
-- Table structure for table `storage_cross`
--

CREATE TABLE `storage_cross` (
  `id` int(11) NOT NULL,
  `t_id` int(11) NOT NULL,
  `s_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `storage_cross`
--

INSERT INTO `storage_cross` (`id`, `t_id`, `s_id`) VALUES
(10, 8, 3),
(22, 1, 2),
(23, 9, 3),
(24, 9, 4),
(26, 11, 3),
(30, 12, 3),
(32, 10, 3);

-- --------------------------------------------------------

--
-- Table structure for table `technology`
--

CREATE TABLE `technology` (
  `t_id` int(11) NOT NULL,
  `t_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `technology`
--

INSERT INTO `technology` (`t_id`, `t_name`) VALUES
(2, 'KOTLIN'),
(5, 'PHP'),
(6, 'C#');

-- --------------------------------------------------------

--
-- Table structure for table `test_case`
--

CREATE TABLE `test_case` (
  `t_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `r_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `status` text NOT NULL,
  `assigned` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `due` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `test_case`
--

INSERT INTO `test_case` (`t_id`, `p_id`, `r_id`, `name`, `description`, `status`, `assigned`, `c_id`, `due`, `date`) VALUES
(10, 85, 6, 'test', 'abc', 'Blocked', 47, 47, '2022-06-17 04:00:00', '2022-06-14 10:05:43'),
(11, 85, 8, 'dele', 'ded', 'Pass', 47, 47, '2022-06-23 04:00:00', '2022-06-14 10:34:03'),
(12, 85, 9, 'dasds', 'testing', 'Fail', 47, 48, '2022-06-24 04:00:00', '2022-06-14 10:46:05');

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
-- Indexes for table `backlog`
--
ALTER TABLE `backlog`
  ADD PRIMARY KEY (`b_id`);

--
-- Indexes for table `browser`
--
ALTER TABLE `browser`
  ADD PRIMARY KEY (`b_id`);

--
-- Indexes for table `browser_cross`
--
ALTER TABLE `browser_cross`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`msg_id`);

--
-- Indexes for table `content`
--
ALTER TABLE `content`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `cost`
--
ALTER TABLE `cost`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `cpu`
--
ALTER TABLE `cpu`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `cpu_cross`
--
ALTER TABLE `cpu_cross`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `defect`
--
ALTER TABLE `defect`
  ADD PRIMARY KEY (`d_id`);

--
-- Indexes for table `designation`
--
ALTER TABLE `designation`
  ADD PRIMARY KEY (`d_id`);

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
-- Indexes for table `operating_system`
--
ALTER TABLE `operating_system`
  ADD PRIMARY KEY (`o_id`);

--
-- Indexes for table `operating_system_cross`
--
ALTER TABLE `operating_system_cross`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permission`
--
ALTER TABLE `permission`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `permission_status`
--
ALTER TABLE `permission_status`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `requirement`
--
ALTER TABLE `requirement`
  ADD PRIMARY KEY (`r_id`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `speciality`
--
ALTER TABLE `speciality`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `storage`
--
ALTER TABLE `storage`
  ADD PRIMARY KEY (`d_id`);

--
-- Indexes for table `storage_cross`
--
ALTER TABLE `storage_cross`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `technology`
--
ALTER TABLE `technology`
  ADD PRIMARY KEY (`t_id`);

--
-- Indexes for table `test_case`
--
ALTER TABLE `test_case`
  ADD PRIMARY KEY (`t_id`);

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
  MODIFY `r_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `backlog`
--
ALTER TABLE `backlog`
  MODIFY `b_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `browser`
--
ALTER TABLE `browser`
  MODIFY `b_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `browser_cross`
--
ALTER TABLE `browser_cross`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=388;

--
-- AUTO_INCREMENT for table `content`
--
ALTER TABLE `content`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `cost`
--
ALTER TABLE `cost`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `cpu`
--
ALTER TABLE `cpu`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cpu_cross`
--
ALTER TABLE `cpu_cross`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `defect`
--
ALTER TABLE `defect`
  MODIFY `d_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `designation`
--
ALTER TABLE `designation`
  MODIFY `d_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `emails`
--
ALTER TABLE `emails`
  MODIFY `e_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `h_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=234;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `l_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=176;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `m_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `module`
--
ALTER TABLE `module`
  MODIFY `mod_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `n_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=569;

--
-- AUTO_INCREMENT for table `operating_system`
--
ALTER TABLE `operating_system`
  MODIFY `o_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `operating_system_cross`
--
ALTER TABLE `operating_system_cross`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `permission`
--
ALTER TABLE `permission`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `permission_status`
--
ALTER TABLE `permission_status`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `requirement`
--
ALTER TABLE `requirement`
  MODIFY `r_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `speciality`
--
ALTER TABLE `speciality`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `storage`
--
ALTER TABLE `storage`
  MODIFY `d_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `storage_cross`
--
ALTER TABLE `storage_cross`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `technology`
--
ALTER TABLE `technology`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `test_case`
--
ALTER TABLE `test_case`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
