-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 05, 2018 at 03:02 PM
-- Server version: 10.2.6-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `oprofdbamp`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_logs`
--

CREATE TABLE `activity_logs` (
  `id` int(11) NOT NULL,
  `alarm_id` int(11) NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `description` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `admin_groups`
--

CREATE TABLE `admin_groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin_groups`
--

INSERT INTO `admin_groups` (`id`, `name`, `description`) VALUES
(1, 'webmaster', 'Webmaster');

-- --------------------------------------------------------

--
-- Table structure for table `admin_login_attempts`
--

CREATE TABLE `admin_login_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(15) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

CREATE TABLE `admin_users` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(15) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`) VALUES
(1, '127.0.0.1', 'webmaster', '$2y$08$D/Xca5qg1JPzi3lAVGnMFuP0UclhjFI/WT8GPQBzIM.WrlVfQpv2m', NULL, NULL, NULL, NULL, NULL, NULL, 1451900190, 1511908754, 1, 'Armel', 'Batara');

-- --------------------------------------------------------

--
-- Table structure for table `admin_users_groups`
--

CREATE TABLE `admin_users_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin_users_groups`
--

INSERT INTO `admin_users_groups` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `alarms`
--

CREATE TABLE `alarms` (
  `id` int(11) NOT NULL,
  `detail_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `reportee_id` int(11) NOT NULL,
  `receiver_id` int(11) UNSIGNED NOT NULL,
  `alarm_type_id` int(11) NOT NULL,
  `date_received` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `alarm_types`
--

CREATE TABLE `alarm_types` (
  `id` int(11) NOT NULL,
  `name` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `alarm_types`
--

INSERT INTO `alarm_types` (`id`, `name`) VALUES
(1, 'Missing person'),
(2, 'Found bodies');

-- --------------------------------------------------------

--
-- Table structure for table `body_marks`
--

CREATE TABLE `body_marks` (
  `id` int(11) NOT NULL,
  `name` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `body_marks`
--

INSERT INTO `body_marks` (`id`, `name`) VALUES
(1, 'mole'),
(2, 'scar'),
(3, 'tattoo'),
(4, 'birthmark');

-- --------------------------------------------------------

--
-- Table structure for table `details`
--

CREATE TABLE `details` (
  `id` int(11) NOT NULL,
  `upper_cloth` varchar(16) NOT NULL,
  `upper_cloth_color` varchar(16) NOT NULL,
  `lower_cloth` varchar(16) NOT NULL,
  `lower_cloth_color` varchar(16) NOT NULL,
  `peculiarity` varchar(20) NOT NULL,
  `body_mark_id` int(11) NOT NULL,
  `body_mark_loc` varchar(16) NOT NULL,
  `location_detail` varchar(64) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `lifts`
--

CREATE TABLE `lifts` (
  `id` int(11) NOT NULL,
  `alarm_id` int(11) NOT NULL,
  `lifter_id` int(11) UNSIGNED ZEROFILL NOT NULL,
  `reason` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(15) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `alarm_id` int(11) NOT NULL,
  `description` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `precincts`
--

CREATE TABLE `precincts` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `precincts`
--

INSERT INTO `precincts` (`id`, `name`, `description`) VALUES
(2, 'PCP-01', 'BRGY. Salapungan Police Community Precinct'),
(3, 'PCP-02', 'BRGY. Mabini, Police Community Precinct'),
(4, 'PCP-03', 'BRGY. Maliwalo Police Community Precinct'),
(5, 'PCP-04', 'BRGY. San Miguel Police Community Precinct'),
(6, 'PCP-05', 'BRGY. Tibag Police community Pricinct'),
(7, 'PCP-06', 'BRGY. San Isidro Police community Pricinct'),
(8, 'PCP-07', 'BRGY. Mapalacio Police community Pricinct'),
(9, 'PCP-08', 'BRGY. San Sebatian Police community Pricinct'),
(10, 'PCP-09', 'BRGY. Balete Police community Pricinct'),
(11, 'PCP-10', 'BRGY. San Manuel Police community Pricinct'),
(12, 'TCPS', 'Brgy. Cut-cut I Police Station');

-- --------------------------------------------------------

--
-- Table structure for table `precinct_user`
--

CREATE TABLE `precinct_user` (
  `id` int(11) NOT NULL,
  `precinct_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `precinct_user`
--

INSERT INTO `precinct_user` (`id`, `precinct_id`, `user_id`) VALUES
(1, 2, 1),
(2, 2, 2),
(3, 2, 3),
(4, 2, 5);

-- --------------------------------------------------------

--
-- Table structure for table `ranks`
--

CREATE TABLE `ranks` (
  `id` int(11) NOT NULL,
  `name` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `ranks`
--

INSERT INTO `ranks` (`id`, `name`) VALUES
(1, 'PO2'),
(2, 'PO3'),
(3, 'SPO4'),
(4, 'PINSP'),
(5, 'PSINSP'),
(6, 'PCINSP'),
(7, 'PSUPT');

-- --------------------------------------------------------

--
-- Table structure for table `reportees`
--

CREATE TABLE `reportees` (
  `id` int(11) NOT NULL,
  `fname` varchar(35) NOT NULL,
  `lname` varchar(35) NOT NULL,
  `mname` varchar(35) NOT NULL,
  `addr` varchar(64) NOT NULL,
  `contact_no` varchar(13) NOT NULL,
  `rel_to_subj` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int(11) NOT NULL,
  `fname` varchar(35) NOT NULL,
  `mname` varchar(35) NOT NULL,
  `lname` varchar(35) NOT NULL,
  `age` varchar(7) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `addr` varchar(64) NOT NULL,
  `nationality` varchar(16) NOT NULL,
  `height` int(3) NOT NULL,
  `weight` int(3) NOT NULL,
  `complexion` varchar(11) NOT NULL,
  `build` varchar(8) NOT NULL,
  `hair_color` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(15) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `rank_id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `precinct_id` int(11) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `last_login` int(11) NOT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `rank_id`, `email`, `activation_code`, `created_on`, `precinct_id`, `salt`, `active`, `last_login`, `first_name`, `last_name`, `company`, `phone`) VALUES
(1, '127.0.0.1', 'userkoto', '$2y$08$XB6ugpxkt6At7itRNzPaRu/o.E53.g00n33LlApO/cer4NLuIXWsG', 1, 'userkoto@gmail.com', NULL, 1451903855, 6, NULL, 1, 1511909450, 'Lily', 'Cruz', 'Wild Mocker', '+63 912 345 6789'),
(2, '::1', 'm.patawaran', '$2y$08$UBNyS/JaHs/T6GQTqE/UdOrFMLCte0ItU6z3bNCC629yjsE7GAgZe', 1, 'm.pat@yahoo.com', NULL, 1511602377, 2, NULL, 1, 0, 'Mark Anthony', 'Patawaran', NULL, NULL),
(3, '::1', 'marzan', '$2y$08$mdM0Q9EhTpMgvMG/w7DFFOiydF/WVlNv1agDw3JX7Ce5WY.2b8aZe', 1, 'qwe@qwe.com', NULL, 1511631855, 2, NULL, 1, 0, 'marzan', 'calilung', NULL, NULL),
(5, '::1', 'edenfernandez', '$2y$08$2ENjBWSBmaxFxRNAmAWZOu8UN4yQUpI68djCw/RE5H0oh5g99Gami', 6, 'edenfernandezjr@gmail.com', NULL, 1511688344, 2, NULL, 0, 0, 'Eden', 'Fernandez', NULL, NULL),
(8, '::1', 'qwe', '$2y$08$lKaaI/5eC6fVJzo0hO3z7.l1fCxFsOPO1hx.Ypvm7Id5xwVtPlC6e', 4, 'qweq@gma.com', NULL, 1511906102, 0, NULL, 1, 0, 'qwe', 'qwe', NULL, NULL),
(9, '::1', '123123', '$2y$08$4N0KpwXvKt8OkAiYFSTygOgLbqmpMKHmpY4XA1Mw0oNgwSiz6C95.', 3, '123@email.com', NULL, 1511906244, 2, NULL, 1, 0, '123123', '123123', NULL, NULL),
(10, '::1', 'chacha', '$2y$08$LSe68WgiHPpBPw8AYbF0t.tgqDe0qJML2ib/kzOEvdzuZencOjKGS', 1, 'cha@gmail.com', NULL, 1511907226, 4, NULL, 1, 1511907268, 'Cha', 'Cha', NULL, NULL),
(11, '::1', 'qweqwe', '$2y$08$5fRmlSyPuwu2cnLHD9dZr.1CGCBEirdaP73rRFqntWUaXbM62WD9e', 1, 'qwe@email.com', NULL, 1511908783, 3, NULL, 1, 1511909487, 'qweqwe', 'qweqwe', NULL, NULL),
(12, '::1', '1231231', '$2y$08$Eh1XYiI7wMODMLSCm0eoduQq4jPvIgbwht0qubckuFBmodwbjctsy', 3, '1233@email.com', NULL, 1511908826, 3, NULL, 1, 0, '123123', '123123', NULL, NULL),
(13, '::1', 'qweqwe123123', '$2y$08$fLepYSP5Sxu2dbMJllvDfufZ6UZ3qfoSvc/KTrvYfVnlJa.Bj42eq', 3, 'qweq@gma.comw', NULL, 1511909162, 0, NULL, 1, 0, 'qwe', 'qwe', NULL, NULL),
(14, '::1', 'qweqwe1231233', '$2y$08$oW6rnZbvkY5c8K.Bz5lnLOIWr1x7ZZEouaS.hENXOpaH45RGKihYe', 2, 'qweq@gma.comw3', NULL, 1511909297, 2, NULL, 1, 0, 'qwe', 'qwe', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_logs`
--
ALTER TABLE `activity_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `alarm_id` (`alarm_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `admin_groups`
--
ALTER TABLE `admin_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_login_attempts`
--
ALTER TABLE `admin_login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_users_groups`
--
ALTER TABLE `admin_users_groups`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`,`group_id`),
  ADD KEY `group_id` (`group_id`);

--
-- Indexes for table `alarms`
--
ALTER TABLE `alarms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `detail_id` (`detail_id`),
  ADD KEY `receiver_id` (`receiver_id`),
  ADD KEY `alarm_type_id` (`alarm_type_id`),
  ADD KEY `subject_id` (`subject_id`),
  ADD KEY `reportee_id` (`reportee_id`);

--
-- Indexes for table `alarm_types`
--
ALTER TABLE `alarm_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `body_marks`
--
ALTER TABLE `body_marks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `details`
--
ALTER TABLE `details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `body_mark_id` (`body_mark_id`);

--
-- Indexes for table `lifts`
--
ALTER TABLE `lifts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `alarm_id` (`alarm_id`),
  ADD KEY `lifter_id` (`lifter_id`);

--
-- Indexes for table `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`,`alarm_id`);

--
-- Indexes for table `precincts`
--
ALTER TABLE `precincts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `precinct_user`
--
ALTER TABLE `precinct_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ranks`
--
ALTER TABLE `ranks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reportees`
--
ALTER TABLE `reportees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rank_id` (`rank_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_logs`
--
ALTER TABLE `activity_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `admin_groups`
--
ALTER TABLE `admin_groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `admin_login_attempts`
--
ALTER TABLE `admin_login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `admin_users_groups`
--
ALTER TABLE `admin_users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `alarms`
--
ALTER TABLE `alarms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `alarm_types`
--
ALTER TABLE `alarm_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `body_marks`
--
ALTER TABLE `body_marks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `details`
--
ALTER TABLE `details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `lifts`
--
ALTER TABLE `lifts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `precincts`
--
ALTER TABLE `precincts`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `precinct_user`
--
ALTER TABLE `precinct_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `ranks`
--
ALTER TABLE `ranks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `reportees`
--
ALTER TABLE `reportees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `activity_logs`
--
ALTER TABLE `activity_logs`
  ADD CONSTRAINT `activity_logs_ibfk_1` FOREIGN KEY (`alarm_id`) REFERENCES `alarms` (`id`),
  ADD CONSTRAINT `activity_logs_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `admin_users_groups`
--
ALTER TABLE `admin_users_groups`
  ADD CONSTRAINT `admin_users_groups_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `admin_users` (`id`),
  ADD CONSTRAINT `admin_users_groups_ibfk_2` FOREIGN KEY (`group_id`) REFERENCES `admin_groups` (`id`);

--
-- Constraints for table `alarms`
--
ALTER TABLE `alarms`
  ADD CONSTRAINT `alarms_ibfk_4` FOREIGN KEY (`receiver_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `alarms_ibfk_6` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`),
  ADD CONSTRAINT `alarms_ibfk_7` FOREIGN KEY (`reportee_id`) REFERENCES `reportees` (`id`);

--
-- Constraints for table `details`
--
ALTER TABLE `details`
  ADD CONSTRAINT `details_ibfk_1` FOREIGN KEY (`body_mark_id`) REFERENCES `body_marks` (`id`);

--
-- Constraints for table `lifts`
--
ALTER TABLE `lifts`
  ADD CONSTRAINT `lifts_ibfk_1` FOREIGN KEY (`alarm_id`) REFERENCES `alarms` (`id`),
  ADD CONSTRAINT `lifts_ibfk_2` FOREIGN KEY (`lifter_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`rank_id`) REFERENCES `ranks` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
