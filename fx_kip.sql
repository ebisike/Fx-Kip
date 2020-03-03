-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 23, 2019 at 09:22 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fx_kip`
--

-- --------------------------------------------------------

--
-- Table structure for table `balance`
--

CREATE TABLE `balance` (
  `id` int(5) NOT NULL,
  `balance` float NOT NULL DEFAULT '0',
  `company_id` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `balance`
--

INSERT INTO `balance` (`id`, `balance`, `company_id`) VALUES
(13, 0, 38);

-- --------------------------------------------------------

--
-- Table structure for table `basic_info`
--

CREATE TABLE `basic_info` (
  `id` int(8) NOT NULL,
  `stewardship` int(6) NOT NULL,
  `last_name` varchar(40) NOT NULL,
  `first_name` varchar(40) NOT NULL,
  `other_name` varchar(40) NOT NULL,
  `date_of_birth` date NOT NULL,
  `gender` varchar(8) NOT NULL,
  `company_id` int(6) NOT NULL,
  `passport` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `basic_info`
--

INSERT INTO `basic_info` (`id`, `stewardship`, `last_name`, `first_name`, `other_name`, `date_of_birth`, `gender`, `company_id`, `passport`) VALUES
(67, 10071234, 'KELECHI', 'JEREMIAH', 'KCEE', '1999-05-21', 'MALE', 38, 'fx_male_Avatar.png');

-- --------------------------------------------------------

--
-- Table structure for table `church_info`
--

CREATE TABLE `church_info` (
  `id` int(4) NOT NULL,
  `ref_id` int(4) NOT NULL,
  `baptizim_status` varchar(20) NOT NULL,
  `date_of_baptizim` date NOT NULL,
  `confirmation_status` varchar(20) NOT NULL,
  `date_of_confirmation` date NOT NULL,
  `group_number` varchar(1) NOT NULL,
  `company_id` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `church_info`
--

INSERT INTO `church_info` (`id`, `ref_id`, `baptizim_status`, `date_of_baptizim`, `confirmation_status`, `date_of_confirmation`, `group_number`, `company_id`) VALUES
(28, 67, 'Yes', '1999-10-23', 'Yes', '2015-07-14', '4', 38);

-- --------------------------------------------------------

--
-- Table structure for table `contact_info`
--

CREATE TABLE `contact_info` (
  `id` int(4) NOT NULL,
  `ref_id` int(4) NOT NULL,
  `Address` varchar(50) NOT NULL,
  `phone1` varchar(11) NOT NULL,
  `phone2` varchar(11) NOT NULL,
  `email` varchar(60) NOT NULL,
  `state_of_origin` varchar(20) NOT NULL,
  `LGA` varchar(30) NOT NULL,
  `village` varchar(30) NOT NULL,
  `company_id` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact_info`
--

INSERT INTO `contact_info` (`id`, `ref_id`, `Address`, `phone1`, `phone2`, `email`, `state_of_origin`, `LGA`, `village`, `company_id`) VALUES
(36, 67, '22 MOKOYA STREET OLODI APAPA LLAGOS', '08165610038', '08165610038', 'oparajeremiah@yahoo.com', 'IMO', 'ABOH MBAISE', 'UMUODA', 38);

-- --------------------------------------------------------

--
-- Table structure for table `expense`
--

CREATE TABLE `expense` (
  `id` int(5) NOT NULL,
  `expense_source` varchar(20) NOT NULL,
  `description` varchar(255) NOT NULL,
  `amount` int(11) NOT NULL,
  `expense_date` date NOT NULL,
  `dates` varchar(12) NOT NULL,
  `company_id` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `income`
--

CREATE TABLE `income` (
  `id` int(5) NOT NULL,
  `income_source` varchar(20) NOT NULL,
  `description` varchar(255) NOT NULL,
  `amount` int(11) NOT NULL,
  `credit_date` date NOT NULL,
  `dates` varchar(12) NOT NULL,
  `company_id` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `marital_info`
--

CREATE TABLE `marital_info` (
  `id` int(4) NOT NULL,
  `ref_id` int(4) NOT NULL,
  `marital_status` varchar(20) NOT NULL,
  `name_of_spouse` varchar(30) NOT NULL,
  `nature_of_marriage` varchar(30) NOT NULL,
  `date_of_marriage` date NOT NULL,
  `number_of_children` int(2) NOT NULL DEFAULT '0',
  `company_id` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `marital_info`
--

INSERT INTO `marital_info` (`id`, `ref_id`, `marital_status`, `name_of_spouse`, `nature_of_marriage`, `date_of_marriage`, `number_of_children`, `company_id`) VALUES
(28, 67, 'SINGLE', '', 'NILL', '0000-00-00', 0, 38);

-- --------------------------------------------------------

--
-- Table structure for table `social_info`
--

CREATE TABLE `social_info` (
  `id` int(4) NOT NULL,
  `ref_id` int(4) NOT NULL,
  `academics` varchar(10) NOT NULL,
  `occupation` varchar(20) NOT NULL,
  `nature_of_business` varchar(30) NOT NULL,
  `business_address` varchar(30) NOT NULL,
  `company_id` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `social_info`
--

INSERT INTO `social_info` (`id`, `ref_id`, `academics`, `occupation`, `nature_of_business`, `business_address`, `company_id`) VALUES
(27, 67, 'O level', 'STUDENT', 'STUDENT', 'TOLU COMPLEX', 38);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(3) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `email` varchar(225) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `company_name`, `email`, `password`) VALUES
(38, 'St. Peter\'s (Ang) Church, Olodi', 'stpetersangchurcholodi@yahoo.com', '81dc9bdb52d04dc20036dbd8313ed055');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `balance`
--
ALTER TABLE `balance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `basic_info`
--
ALTER TABLE `basic_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `church_info`
--
ALTER TABLE `church_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_info`
--
ALTER TABLE `contact_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expense`
--
ALTER TABLE `expense`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `income`
--
ALTER TABLE `income`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `marital_info`
--
ALTER TABLE `marital_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `social_info`
--
ALTER TABLE `social_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `balance`
--
ALTER TABLE `balance`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `basic_info`
--
ALTER TABLE `basic_info`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `church_info`
--
ALTER TABLE `church_info`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `contact_info`
--
ALTER TABLE `contact_info`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `expense`
--
ALTER TABLE `expense`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `income`
--
ALTER TABLE `income`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `marital_info`
--
ALTER TABLE `marital_info`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `social_info`
--
ALTER TABLE `social_info`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
