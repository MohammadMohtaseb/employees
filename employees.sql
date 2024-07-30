-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 30, 2024 at 11:59 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `employee_task`
--

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `salary` decimal(10,2) NOT NULL,
  `offdays` int(11) DEFAULT 0,
  `img` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `name`, `salary`, `offdays`, `img`) VALUES
(4, 'Mohammad', 15000.00, 0, 'img/users/66a95b18416fe.png'),
(5, 'ali mohammad', 9000.00, 2, 'img/users/66a9581267409.jpg'),
(6, 'zaid mohammad', 3000.00, 0, 'img/users/66a958366ebf8.jpg'),
(7, 'sarah ahmad', 4000.00, 0, 'img/users/66a958546e70a.jpg'),
(8, 'marah ahmad', 5000.00, 0, 'img/users/66a95874856ac.jpg'),
(9, 'aseel ahmad', 6000.00, 0, 'img/users/66a958e2438f9.jpg'),
(10, 'osama ahmad', 1000.00, 0, 'img/users/66a95914ea7fc.jpg'),
(11, 'bashar ahmad', 3500.00, 0, 'img/users/66a9593e0bdd4.jpg'),
(12, 'omar ahmad', 2500.00, 0, 'img/users/66a9595f0107f.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
