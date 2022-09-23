-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 23, 2022 at 12:10 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `price` decimal(4,2) NOT NULL,
  `quantity` int(5) NOT NULL,
  `Category` varchar(10) NOT NULL,
  `picture` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `quantity`, `Category`, `picture`) VALUES
(1, 'Intel I5 CPU', '99.99', 10, 'CPU', 'i5.png'),
(2, 'Intel i3 CPU', '89.89', 34, 'CPU', 'i3.png'),
(3, 'Intel i7 CPU', '99.99', 23, 'CPU', 'i7.png'),
(4, 'Intel I9 CPU', '99.99', 7, 'CPU', 'i9.jpg'),
(6, 'GTX 980', '99.99', 20, 'GPU', 'gtx980.jpg'),
(7, 'GTX 1070', '99.99', 12, 'GPU', 'gtx1070.jpg'),
(8, 'RTX 3070', '99.99', 20, 'GPU', 'rtx3070.jpg'),
(9, 'RTX 3070ti', '99.99', 20, 'GPU', 'rtx3070ti.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
