-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 09, 2016 at 09:04 PM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.5.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crm`
--

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int(4) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `initial` varchar(255) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `address` varchar(255) NOT NULL,
  `service` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `company_id` int(3) NOT NULL,
  `attachment` text NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `password` text NOT NULL,
  `company_username` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `firstname`, `initial`, `lastname`, `gender`, `phone`, `email`, `country`, `state`, `city`, `address`, `service`, `status`, `company_id`, `attachment`, `token`, `created_at`, `password`, `company_username`) VALUES
(6, 'Random1', 'R1', 'Random1', 'male', '123', 'random@gmail.com', '', '', '', '123', 'service3', 'disabled', 0, '', 'cbc39abd93781d17567c9263767bb2902', '2016-10-10 16:47:29', '', ''),
(7, 'Asim-company-client1', 'ACC', 'LastC1', 'male', '3333908980', 'asim-company-client1@mail.com', '', '', '', 'Block 16 Gulshan-e-Iqbal', 'service1', 'active', 2, '', 'cb79326ca26e9bdf556c565e33da87c99', '2016-10-23 15:56:35', '81dc9bdb52d04dc20036dbd8313ed055', 'cp');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `company_id` int(50) NOT NULL,
  `company_name` text NOT NULL,
  `created_date` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `phone_number` text NOT NULL,
  `first_name` text NOT NULL,
  `last_name` text NOT NULL,
  `address` text NOT NULL,
  `city` text NOT NULL,
  `state` text NOT NULL,
  `country` text NOT NULL,
  `token` varchar(255) NOT NULL,
  `post_code` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `multichoice_questions`
--

CREATE TABLE `multichoice_questions` (
  `id` int(3) NOT NULL,
  `question_id` int(3) NOT NULL,
  `question` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `multichoice_questions`
--

INSERT INTO `multichoice_questions` (`id`, `question_id`, `question`) VALUES
(1, 1, 'Query took 0.0005 seconds'),
(2, 1, 'ok 2'),
(3, 2, 'ok 1'),
(4, 2, 'ok 2'),
(5, 4, 'Multiple Choice:1  Multiple Choice:1 Multiple Choice:1 Multiple Choice:1\n\n'),
(6, 4, 'Multiple Choice:2'),
(7, 8, 'multi choice question 1 '),
(8, 8, 'multi choice question 2');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(3) NOT NULL,
  `page` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `page`) VALUES
(1, 'Clients'),
(2, 'Permissions'),
(3, 'Users'),
(4, 'Services');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(3) NOT NULL,
  `type` varchar(255) NOT NULL,
  `view_permission` int(3) NOT NULL,
  `update_permission` int(3) NOT NULL,
  `delete_permission` int(3) NOT NULL,
  `page_access` varchar(500) NOT NULL DEFAULT '[]'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `type`, `view_permission`, `update_permission`, `delete_permission`, `page_access`) VALUES
(1, 'Admin', 1, 1, 1, '["Permissions","Users","Services","Clients"]'),
(2, 'Service Provider', 1, 1, 1, '["Users"]'),
(5, 'Reception', 0, 1, 0, '["Users","Services"]'),
(6, 'Accounts', 1, 1, 0, '["Clients","Users","Services"]');

-- --------------------------------------------------------

--
-- Table structure for table `publish_questionnaire`
--

CREATE TABLE `publish_questionnaire` (
  `id` int(50) NOT NULL,
  `user_id` int(50) NOT NULL,
  `publish_date` date NOT NULL,
  `expire_date` date NOT NULL,
  `type` text NOT NULL,
  `questionnaire_id` int(50) NOT NULL,
  `token` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `publish_questionnaire`
--

INSERT INTO `publish_questionnaire` (`id`, `user_id`, `publish_date`, `expire_date`, `type`, `questionnaire_id`, `token`) VALUES
(4, 1, '2016-10-29', '2016-10-29', 'public', 3, ''),
(5, 1, '2016-10-30', '2016-10-31', 'private', 4, ''),
(6, 1, '2016-10-30', '2016-11-01', 'public', 3, ''),
(7, 1, '2016-11-05', '2016-11-12', 'public', 5, ''),
(8, 1, '2016-11-06', '2016-11-06', 'public', 6, '77c547d4088dde1612db8f26883f4cfe');

-- --------------------------------------------------------

--
-- Table structure for table `questionnaire`
--

CREATE TABLE `questionnaire` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `company_id` int(50) NOT NULL,
  `name` text NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questionnaire`
--

INSERT INTO `questionnaire` (`id`, `user_id`, `company_id`, `name`, `status`) VALUES
(1, 0, 0, '', ''),
(2, 0, 0, '', ''),
(3, 1, 2, 'Hello', 'publish'),
(4, 1, 2, 'test', 'publish'),
(5, 1, 0, 'Hello world ', 'publish'),
(6, 1, 2, 'Testing Questionnaire', 'publish');

-- --------------------------------------------------------

--
-- Table structure for table `questionnaire_answer`
--

CREATE TABLE `questionnaire_answer` (
  `id` int(50) NOT NULL,
  `question_id` int(50) NOT NULL,
  `attempt_id` int(50) NOT NULL,
  `answer` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questionnaire_answer`
--

INSERT INTO `questionnaire_answer` (`id`, `question_id`, `attempt_id`, `answer`) VALUES
(1, 6, 0, 'e'),
(2, 8, 1, 'multi choice question 1 '),
(3, 7, 1, 'answer 1'),
(4, 9, 1, 'answer 2'),
(5, 8, 2, 'multi choice question 2'),
(6, 7, 2, 'dsfsf'),
(7, 9, 2, 'sdfsdfsdfsd'),
(8, 8, 3, 'multi choice question 2'),
(9, 7, 3, '123'),
(10, 9, 3, '43235'),
(11, 5, 4, 'Hello'),
(12, 8, 5, 'multi choice question 1 '),
(13, 7, 5, '123'),
(14, 9, 5, '32131231231231231231'),
(15, 10, 6, '1'),
(16, 10, 7, '1');

-- --------------------------------------------------------

--
-- Table structure for table `questionnaire_attempt`
--

CREATE TABLE `questionnaire_attempt` (
  `id` int(50) NOT NULL,
  `questionnaire_id` int(50) NOT NULL,
  `publish_id` int(3) NOT NULL,
  `user_id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questionnaire_attempt`
--

INSERT INTO `questionnaire_attempt` (`id`, `questionnaire_id`, `publish_id`, `user_id`) VALUES
(3, 5, 7, 1),
(4, 3, 4, 1),
(5, 5, 7, 1);

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(3) NOT NULL,
  `questionnaire_id` int(3) NOT NULL,
  `question` text NOT NULL,
  `type` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `questionnaire_id`, `question`, `type`) VALUES
(1, 1, 'ur Marketer''s Playbook series asks "Is ad blocking the realization of an altruistic ideal or naïve disruption of an already fragile ecosystem?" The only certainty is its growing popularity', 'multi'),
(2, 1, 'question 2', 'multi'),
(3, 2, 'Quick - display only the minimal options', 'text'),
(4, 2, 'Custom - display all possible options', 'multi'),
(5, 3, 'Test', 'text'),
(6, 4, 'test 1', 'text'),
(7, 5, 'question 1', 'text'),
(8, 5, 'question 2', 'multi'),
(9, 5, 'question 3', 'text'),
(10, 6, 'what is your age', 'text');

-- --------------------------------------------------------

--
-- Table structure for table `sample`
--

CREATE TABLE `sample` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `type` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sample`
--

INSERT INTO `sample` (`id`, `name`, `type`) VALUES
(1, 'Moiz', 'sample'),
(2, 'Hello', 'sample 1 '),
(3, 'sdsf sdf sdf', ' dsfsd dsaf sdf ');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `service_id` int(50) NOT NULL,
  `service_name` text NOT NULL,
  `type` text NOT NULL,
  `occurrence` text NOT NULL,
  `rate` text NOT NULL,
  `time_interval` int(3) NOT NULL,
  `token` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(4) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `initial` varchar(50) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `type` varchar(25) NOT NULL,
  `permission` int(3) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `add_permission` int(3) NOT NULL,
  `company_id` int(3) NOT NULL,
  `view_permission` int(3) NOT NULL,
  `update_permission` int(3) NOT NULL,
  `delete_permission` int(3) NOT NULL,
  `password_request` int(3) NOT NULL,
  `company_username` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `initial`, `lastname`, `phone`, `company_name`, `email`, `password`, `type`, `permission`, `token`, `created_at`, `add_permission`, `company_id`, `view_permission`, `update_permission`, `delete_permission`, `password_request`, `company_username`) VALUES
(1, 'Muhammad', '', 'Moiz', '', 'Home', 'moiz@gmail.com', '202cb962ac59075b964b07152d234b70', '', 1, '', '2016-10-10 13:54:33', 0, 0, 0, 0, 0, 0, ''),
(2, 'Asim', '', 'Bilal', '', 'Asim-Company', 'asim@mail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'COMPANY', 1, '', '2016-10-22 13:51:52', 0, 2, 1, 1, 1, 0, ''),
(3, 'Asim1', '', 'Bilal1', '', '', 'asimbilal@mail.com', '202cb962ac59075b964b07152d234b70', 'EMPLOYEE', 0, '', '2016-11-05 03:15:40', 0, 2, 0, 1, 0, 0, ''),
(4, 'avsd', 'fsdf', 'xyc', '', '', 'abc@gmil.com', '220466675e31b9d20c051d5e57974150', 'EMPLOYEE', 0, 'u7d0bad82c8d0532656f3a0d4d7250923', '2016-10-09 03:12:09', 0, 0, 0, 0, 0, 0, ''),
(5, 'random', 'random', 'random', '', '', 'm0ix@live.com', '202cb962ac59075b964b07152d234b70', 'EMPLOYEE', 1, 'u539712d36b3914d76335b1782e98896e', '2016-11-06 01:08:07', 0, 0, 0, 0, 0, 0, ''),
(6, 'Admin', '', 'Admin', '', 'admin', 'admin@gmail.com', '202cb962ac59075b964b07152d234b70', 'COMPANY', 1, 'u7793c439a9cd38b64ca9f41839d92353', '2016-10-10 14:25:45', 0, 0, 1, 1, 1, 0, ''),
(7, 'Test', '', 'User', '', 'Test Company', 'test@mail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'COMPANY', 1, 'u7bf3fd000cffd29c5b437f12b9e63e93', '2016-10-12 13:53:04', 0, 7, 1, 1, 1, 0, ''),
(8, 'Test1', 'TU', 'User1', '', '', 'test-user1@mail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'EMPLOYEE', 2, 'u15f14186ece0ce97ab24d08c345456f1', '2016-10-12 14:04:07', 0, 7, 0, 0, 0, 0, ''),
(10, 'Test2', 'TU2', 'User2', '12345677', '', 'test-user2@mail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'EMPLOYEE', 1, 'ub819dabd1aae9ee3b5ca40a480a9f440', '2016-10-12 14:16:10', 0, 7, 0, 0, 0, 0, ''),
(12, 'Test3', 'TU3', 'User3', '1213455566', '', 'test-user3@mail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'EMPLOYEE', 5, 'u55b12b3386ff3925de205eb32f502515', '2016-10-26 21:44:10', 0, 7, 0, 0, 0, 0, 'helloo'),
(13, 'Asim', '', 'Bilal', '', 'asim-new-company', 'a@mal.com', '81dc9bdb52d04dc20036dbd8313ed055', 'COMPANY', 1, 'u49f3780c735e58c6cbc7b6b58d78923e', '2016-10-26 22:04:54', 0, 13, 1, 1, 1, 0, 'helloo');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`company_id`);

--
-- Indexes for table `multichoice_questions`
--
ALTER TABLE `multichoice_questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `publish_questionnaire`
--
ALTER TABLE `publish_questionnaire`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questionnaire`
--
ALTER TABLE `questionnaire`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questionnaire_answer`
--
ALTER TABLE `questionnaire_answer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questionnaire_attempt`
--
ALTER TABLE `questionnaire_attempt`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sample`
--
ALTER TABLE `sample`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`service_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `company_id` int(50) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `multichoice_questions`
--
ALTER TABLE `multichoice_questions`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `publish_questionnaire`
--
ALTER TABLE `publish_questionnaire`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `questionnaire`
--
ALTER TABLE `questionnaire`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `questionnaire_answer`
--
ALTER TABLE `questionnaire_answer`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `questionnaire_attempt`
--
ALTER TABLE `questionnaire_attempt`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `sample`
--
ALTER TABLE `sample`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `service_id` int(50) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
