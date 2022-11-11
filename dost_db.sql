-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 17, 2020 at 06:46 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dost_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart_t`
--

CREATE TABLE `cart_t` (
  `c_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `m_id` int(11) NOT NULL,
  `p_name` varchar(20) NOT NULL,
  `p_price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart_t`
--

INSERT INTO `cart_t` (`c_id`, `p_id`, `m_id`, `p_name`, `p_price`) VALUES
(1, 3, 1, 'Sample', 15),
(1, 14, 1, 'sample', 50),
(1, 2, 1, 'Sample', 20);

-- --------------------------------------------------------

--
-- Table structure for table `customers_t`
--

CREATE TABLE `customers_t` (
  `u_id` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `c_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers_t`
--

INSERT INTO `customers_t` (`u_id`, `c_id`, `c_name`) VALUES
(4, 1, 'abdul s');

-- --------------------------------------------------------

--
-- Table structure for table `merchants_t`
--

CREATE TABLE `merchants_t` (
  `u_id` int(11) NOT NULL,
  `m_id` int(11) NOT NULL,
  `m_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `merchants_t`
--

INSERT INTO `merchants_t` (`u_id`, `m_id`, `m_name`) VALUES
(3, 1, 'aziz somandar');

-- --------------------------------------------------------

--
-- Table structure for table `products_t`
--

CREATE TABLE `products_t` (
  `p_id` int(11) NOT NULL,
  `m_id` int(11) NOT NULL,
  `p_name` varchar(20) NOT NULL,
  `p_price` double NOT NULL,
  `p_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products_t`
--

INSERT INTO `products_t` (`p_id`, `m_id`, `p_name`, `p_price`, `p_date`) VALUES
(2, 1, 'Sample Product 1', 20, '2020-07-15'),
(3, 1, 'Sample Product 2', 15, '2020-07-18'),
(14, 1, 'sample product 3', 50, '2020-07-20'),
(15, 1, 'product 4', 10, '2020-07-20'),
(16, 1, 'prod 5', 10, '2020-07-21');

-- --------------------------------------------------------

--
-- Table structure for table `users_t`
--

CREATE TABLE `users_t` (
  `u_id` int(11) NOT NULL,
  `u_username` varchar(20) NOT NULL,
  `u_password` text NOT NULL,
  `u_role` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users_t`
--

INSERT INTO `users_t` (`u_id`, `u_username`, `u_password`, `u_role`) VALUES
(3, 'merchant', '123', 1),
(4, 'customer', '123', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers_t`
--
ALTER TABLE `customers_t`
  ADD PRIMARY KEY (`c_id`),
  ADD KEY `user_id` (`u_id`);

--
-- Indexes for table `merchants_t`
--
ALTER TABLE `merchants_t`
  ADD PRIMARY KEY (`m_id`),
  ADD KEY `user_id` (`u_id`);

--
-- Indexes for table `products_t`
--
ALTER TABLE `products_t`
  ADD PRIMARY KEY (`p_id`),
  ADD KEY `merchant_id` (`m_id`);

--
-- Indexes for table `users_t`
--
ALTER TABLE `users_t`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers_t`
--
ALTER TABLE `customers_t`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `merchants_t`
--
ALTER TABLE `merchants_t`
  MODIFY `m_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products_t`
--
ALTER TABLE `products_t`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users_t`
--
ALTER TABLE `users_t`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customers_t`
--
ALTER TABLE `customers_t`
  ADD CONSTRAINT `customers_t_ibfk_1` FOREIGN KEY (`u_id`) REFERENCES `users_t` (`u_id`);

--
-- Constraints for table `merchants_t`
--
ALTER TABLE `merchants_t`
  ADD CONSTRAINT `merchants_t_ibfk_1` FOREIGN KEY (`u_id`) REFERENCES `users_t` (`u_id`);

--
-- Constraints for table `products_t`
--
ALTER TABLE `products_t`
  ADD CONSTRAINT `products_t_ibfk_1` FOREIGN KEY (`m_id`) REFERENCES `merchants_t` (`m_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
