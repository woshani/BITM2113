-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 18, 2017 at 09:50 PM
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

DROP TABLE IF EXISTS `consultation`;
CREATE TABLE IF NOT EXISTS `consultation` (
  `consult_id` varchar(50) NOT NULL,
  `consultation_notes` varchar(255) DEFAULT NULL,
  `med_id` varchar(50) DEFAULT NULL,
  `user_id` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`consult_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `consultation`
--

INSERT INTO `consultation` (`consult_id`, `consultation_notes`, `med_id`, `user_id`) VALUES
('201712166709899', 'kk', '4', '00201'),
('201712182369689', 'qwqeqwe', '1', '00201');

-- --------------------------------------------------------

--
-- Table structure for table `drug`
--

DROP TABLE IF EXISTS `drug`;
CREATE TABLE IF NOT EXISTS `drug` (
  `drug_id` int(50) NOT NULL AUTO_INCREMENT,
  `drug_name` varchar(255) DEFAULT NULL,
  `price_per_unit` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  PRIMARY KEY (`drug_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

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

DROP TABLE IF EXISTS `drug_prescription`;
CREATE TABLE IF NOT EXISTS `drug_prescription` (
  `consult_id` varchar(50) NOT NULL,
  `drug_id` varchar(50) NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `notes` varchar(255) DEFAULT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'NOT',
  `date_prescribe` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`consult_id`,`drug_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `drug_prescription`
--

INSERT INTO `drug_prescription` (`consult_id`, `drug_id`, `quantity`, `notes`, `status`, `date_prescribe`) VALUES
('201712166709899', '2', 55, 'kk', 'Dispense', '2017-12-01 08:10:00'),
('201712182369689', '3', 12, 'wdawdawdawdawdawd', 'Dispense', '2017-05-17 11:34:32');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

DROP TABLE IF EXISTS `patient`;
CREATE TABLE IF NOT EXISTS `patient` (
  `ic_number` varchar(12) NOT NULL,
  `matricNo` varchar(10) NOT NULL,
  `full_name` varchar(255) DEFAULT NULL,
  `gender` char(1) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `date_in` datetime DEFAULT CURRENT_TIMESTAMP,
  `med_id` int(11) NOT NULL AUTO_INCREMENT,
  `status` varchar(30) NOT NULL DEFAULT 'Waiting',
  PRIMARY KEY (`med_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`ic_number`, `matricNo`, `full_name`, `gender`, `age`, `address`, `email`, `date_in`, `med_id`, `status`) VALUES
('950607015241', 'B031520027', 'SYAHIRAN SHAHRIN', 'm', 22, '', '', '2017-05-02 00:00:00', 1, 'Discharged'),
('950607015242', 'd031310001', 'FARIZ BANGLA', 'm', 22, 'KEBUN MANA TAH', '', '2016-07-19 00:00:00', 3, 'Waiting'),
('950607015241', 'B031520027', 'xxx', 'f', 12, 'xxx', 'email@email.com', '2016-07-22 00:00:00', 4, 'Consulted');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` varchar(50) NOT NULL,
  `full_name` varchar(255) DEFAULT NULL,
  `pass` varchar(255) DEFAULT NULL,
  `ic_num` varchar(12) DEFAULT NULL,
  `role` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `full_name`, `pass`, `ic_num`, `role`) VALUES
('00201', 'Muhamad Syahiran Bin Mohd Shahrin', 'abc123', '950607015241', 'Doctor'),
('00202', 'Mohammad Muzzaqir Affan Bin Mohd Zulkifli', 'abc123', '950623145161', 'Nurse'),
('00203', 'Muhammad Budie Bin Basri', 'abc123', '950321456987', 'Pharmacy');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
