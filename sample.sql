-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 02, 2018 at 12:27 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sample`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `typeid` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_info` text NOT NULL,
  `is_deleted` int(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `typeid`, `username`, `password`, `user_info`, `is_deleted`) VALUES
(1, 1, 'admin', '0192023a7bbd73250516f069df18b500', '{\"first_name\":\"Admin\",\"last_name\":\"admin\"}', 0),
(2, 2, 'stalin123', '0192023a7bbd73250516f069df18b500', '{\"first_name\":\"stalin\",\"last_name\":\"Thomas\",\"email\":\"stalin@gmail.com\",\"phone\":\"1122334455\",\"address\":\"no.40 north east street vadakara40\",\"created_date\":null}', 0),
(3, 2, 'veni123', '0192023a7bbd73250516f069df18b500', '{\"first_name\":\"Veni\",\"last_name\":\"Dhilip\",\"email\":\"veni@gmail.com\",\"phone\":\"123456\",\"address\":\"no.8 north east street thiruka\",\"created_date\":\"2018-09-01\"}', 0),
(4, 3, '', '', '{\"first_name\":\"Anandh\",\"last_name\":\"Chandrasekran\",\"email\":\"anandh@gmail.com\",\"phone\":\"123456783\",\"address\":\"no.4, 1st main street \",\"loanstart_date\":\"09/03/2018\",\"loan_amount\":\"200000\",\"interest_percent\":\"1\",\"balance_amount\":\"198000\",\"fieldofficer_id\":\"2\",\"is_approved\":1}', 0),
(5, 3, '', '', '{\"first_name\":\"Indu\",\"last_name\":\"Raj\",\"email\":\"indu@gmail.com\",\"phone\":\"1223456783\",\"address\":\"no.20 1st amin \",\"loanstart_date\":\"09/03/2018\",\"loan_amount\":\"200000\",\"interest_percent\":\"1\",\"balance_amount\":\"198000\",\"fieldofficer_id\":\"2\"}', 0),
(6, 3, '', '', '{\"first_name\":\"Nandhini\",\"last_name\":\"Anandh\",\"email\":\"nandhini@gmail.com\",\"phone\":\"1223456783\",\"address\":\"no.40, 1st main street \",\"loanstart_date\":\"09/02/2018\",\"loan_amount\":\"100000\",\"interest_percent\":\"1.5\",\"balance_amount\":\"98500\",\"fieldofficer_id\":\"3\"}', 0),
(7, 3, '', '', '{\"first_name\":\"John\",\"last_name\":\"kennady\",\"email\":\"jk@gmail.com\",\"phone\":\"1223456783\",\"address\":\"no.4/30, 2nd main street \",\"loanstart_date\":\"09/03/2018\",\"loan_amount\":\"200000\",\"interest_percent\":\"1\",\"balance_amount\":\"198000\",\"fieldofficer_id\":\"3\"}', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `name`) VALUES
(1, 'Admin'),
(2, 'Field Officer'),
(3, 'Customer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
