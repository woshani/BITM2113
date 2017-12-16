-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 16, 2017 at 05:35 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e-clinic`
--
CREATE DATABASE IF NOT EXISTS `e-clinic` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `e-clinic`;

-- --------------------------------------------------------

--
-- Table structure for table `consultation`
--

CREATE TABLE `consultation` (
  `consult_id` varchar(50) NOT NULL,
  `consultation_notes` varchar(255) DEFAULT NULL,
  `med_id` varchar(50) DEFAULT NULL,
  `user_id` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `consultation`
--

INSERT INTO `consultation` (`consult_id`, `consultation_notes`, `med_id`, `user_id`) VALUES
('201712166709899', 'kk', '4', '00201');

-- --------------------------------------------------------

--
-- Table structure for table `drug`
--

CREATE TABLE `drug` (
  `drug_id` int(50) NOT NULL,
  `drug_name` varchar(255) DEFAULT NULL,
  `price_per_unit` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `drug`
--

INSERT INTO `drug` (`drug_id`, `drug_name`, `price_per_unit`, `quantity`) VALUES
(1, 'Panadol Active Fast', 8, 100),
(2, 'PARACETAMOL', 10, 20),
(3, 'CODEINE', 50, 120),
(4, 'LACTULOSE', 35, 300);

-- --------------------------------------------------------

--
-- Table structure for table `drug_prescription`
--

CREATE TABLE `drug_prescription` (
  `consult_id` varchar(50) NOT NULL,
  `drug_id` varchar(50) NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `notes` varchar(255) DEFAULT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'NOT'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `drug_prescription`
--

INSERT INTO `drug_prescription` (`consult_id`, `drug_id`, `quantity`, `notes`, `status`) VALUES
('201712166709899', '2', 55, 'kk', 'NOT');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `ic_number` varchar(12) NOT NULL,
  `matricNo` varchar(10) NOT NULL,
  `full_name` varchar(255) DEFAULT NULL,
  `gender` char(1) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `idType` varchar(10) DEFAULT NULL,
  `med_id` int(11) NOT NULL,
  `status` varchar(30) NOT NULL DEFAULT 'Waiting'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`ic_number`, `matricNo`, `full_name`, `gender`, `age`, `address`, `email`, `idType`, `med_id`, `status`) VALUES
('950607015241', 'B031520027', 'SYAHIRAN SHAHRIN', 'm', 22, '', '', NULL, 1, 'Waiting'),
('950607015242', 'd031310001', 'FARIZ BANGLA', 'm', 22, 'KEBUN MANA TAH', '', NULL, 3, 'Waiting'),
('950607015241', 'B031520027', 'xxx', 'f', 12, 'xxx', 'email@email.com', NULL, 4, 'Consulted');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` varchar(50) NOT NULL,
  `full_name` varchar(255) DEFAULT NULL,
  `pass` varchar(255) DEFAULT NULL,
  `ic_num` varchar(12) DEFAULT NULL,
  `role` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `full_name`, `pass`, `ic_num`, `role`) VALUES
('00201', 'Muhamad Syahiran Bin Mohd Shahrin', 'abc123', '950607015241', 'Doctor'),
('00202', 'Mohammad Muzzaqir Affan Bin Mohd Zulkifli', 'abc123', '950623145161', 'Nurse'),
('00203', 'Muhammad Budie Bin Basri', 'abc123', '950321456987', 'Pharmacy');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `consultation`
--
ALTER TABLE `consultation`
  ADD PRIMARY KEY (`consult_id`);

--
-- Indexes for table `drug`
--
ALTER TABLE `drug`
  ADD PRIMARY KEY (`drug_id`);

--
-- Indexes for table `drug_prescription`
--
ALTER TABLE `drug_prescription`
  ADD PRIMARY KEY (`consult_id`,`drug_id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`med_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `drug`
--
ALTER TABLE `drug`
  MODIFY `drug_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `med_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
