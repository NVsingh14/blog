-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 13, 2017 at 07:29 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tut`
--

-- --------------------------------------------------------

--
-- Table structure for table `users_info`
--

CREATE TABLE `users_info` (
  `id` int(11) NOT NULL,
  `email` varchar(120) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `user_name` varchar(100) DEFAULT NULL,
  `google_authentication` varchar(16) DEFAULT NULL,
  `created_at` varchar(15) DEFAULT NULL,
  `updated_at` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_info`
--

INSERT INTO `users_info` (`id`, `email`, `password`, `user_name`, `google_authentication`, `created_at`, `updated_at`) VALUES
(1, 'rmohanraj8212@gmail.com', '1aa79deaf05f0fe00a5d46b88145db92', 'mohan', '7KSKGLDJKPPIAQLZ', NULL, NULL),
(2, 'armohanraj8212@gmail.com', '1aa79deaf05f0fe00a5d46b88145db92', 'hel', '5OLPJFK5RV4F5TKF', NULL, NULL),
(3, 'rmohanraj8212@gmail.coma', '1aa79deaf05f0fe00a5d46b88145db92', 'sadfsadf', 'SHC4FGTRCY3N5UMY', NULL, NULL),
(4, 'jasdf@gmail.com', '1aa79deaf05f0fe00a5d46b88145db92', 'rajaa', 'UW43YA4WTFZIKW54', NULL, NULL),
(5, 'asfdrmohanraj8212@gmail.com', '1aa79deaf05f0fe00a5d46b88145db92', 'hello', 'BYRVSCBLWM4PFLOO', NULL, NULL),
(6, 'sadfrmohanraj8212@gmail.com', '1aa79deaf05f0fe00a5d46b88145db92', 'sadf', '75UH2YZJWCR57MKK', NULL, NULL),
(7, 'dsafrmohanraj8212@gmail.com', '1aa79deaf05f0fe00a5d46b88145db92', 'heal', '35NSQ3UHHE4LM3JM', NULL, NULL),
(8, 'rmohanraj8212@gmail.comasfd', '1aa79deaf05f0fe00a5d46b88145db92', 'sadfsaf', '7OKYPX7CZPYTAYAW', NULL, NULL),
(9, 'rmohanraj8212@gmail.comasd', '1aa79deaf05f0fe00a5d46b88145db92', 'afdsas', 'QIKBUU3R3CLT6Z7P', NULL, NULL),
(10, 'rmosafhanraj8212@gmail.com', '1aa79deaf05f0fe00a5d46b88145db92', 'sadf', '4YV5JHZMVJ3GALEO', NULL, NULL),
(11, 'rmohanrasdfaj8212@gmail.com', '1aa79deaf05f0fe00a5d46b88145db92', 'dsafsadf', 'HRJP2WMABBNYIDLL', NULL, NULL),
(12, 'rsadfmohanraj8212@gmail.com', '1aa79deaf05f0fe00a5d46b88145db92', 'sadf', 'I3ETTGPU7L7XJ4RM', NULL, NULL),
(13, 'rsadfmohanraj8212@gmail.comd', '47584ddcb32db8aaf6c709140135bd6a', 'asdf', 'AWVT2JKGUDZHRCI7', NULL, NULL),
(14, 'aasrmohanraj8212@gmail.com', '1aa79deaf05f0fe00a5d46b88145db92', 'dasf', 'A3JTLVURZK6C7CHS', NULL, NULL),
(15, 'kello@gmail.com', '1aa79deaf05f0fe00a5d46b88145db92', 'hello@gmail.com', 'RKIF763EEFFTHYKN', NULL, NULL),
(16, 'mohanka@gmail.com', '1aa79deaf05f0fe00a5d46b88145db92', 'MOhan', 'P6FTJERUVBM4KZKW', NULL, NULL),
(17, 'kjkasjf@gla.com', '1aa79deaf05f0fe00a5d46b88145db92', 'jkasklfj', 'UWUINTNE2OFDZILF', NULL, NULL),
(18, 'tersta@gmail.com', 'e9206237def4b4ef46fd933ed0f5a08f', 'testes', 'HUTKNKFZRJC5JM3J', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users_info`
--
ALTER TABLE `users_info`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users_info`
--
ALTER TABLE `users_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
