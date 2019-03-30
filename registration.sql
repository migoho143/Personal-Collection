-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 29, 2019 at 10:53 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `registration`
--

-- --------------------------------------------------------

--
-- Table structure for table `collection`
--

CREATE TABLE `collection` (
  `collection_code` int(100) NOT NULL,
  `userid` int(100) DEFAULT NULL,
  `customer_id` int(100) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `date_paid` date DEFAULT NULL,
  `interest` decimal(10,2) DEFAULT NULL,
  `due_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `collection`
--

INSERT INTO `collection` (`collection_code`, `userid`, `customer_id`, `status`, `date_paid`, `interest`, `due_date`) VALUES
(43, 6, 10, 'paid', '2019-03-21', '5.00', '2019-03-13'),
(44, 6, 11, 'paid', '2019-03-07', '5.00', '2019-03-27');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(100) NOT NULL,
  `userid` int(100) DEFAULT NULL,
  `firstname` varchar(100) DEFAULT NULL,
  `lastname` varchar(100) DEFAULT NULL,
  `middlename` varchar(100) DEFAULT NULL,
  `extname` varchar(100) DEFAULT NULL,
  `phoneno` varchar(100) DEFAULT NULL,
  `street` varchar(100) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `userid`, `firstname`, `lastname`, `middlename`, `extname`, `phoneno`, `street`, `city`) VALUES
(10, 6, 'ian', 'banag', 'm', 'abc', '312312', 'ada', 'oroquieta'),
(11, 6, 'brian', 'cabantac', 'm', 'l', '1232144', 'lower lamac', 'oroquieta'),
(12, 6, 'daphnie', 'andam', 'm', 'II', '045123789', 'poblacion 1', 'oroquieta city'),
(13, 6, 'devon', 'bacle', 'm', 'II', '01234579', 'poblacion', 'oroq');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `collection_code` int(100) DEFAULT NULL,
  `userid` int(100) DEFAULT NULL,
  `product_id` int(100) DEFAULT NULL,
  `quantity` varchar(100) DEFAULT NULL,
  `unit` varchar(100) DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`collection_code`, `userid`, `product_id`, `quantity`, `unit`, `amount`) VALUES
(43, 6, 5, '3', 'pcs', '32131231.00'),
(43, 6, 5, '5', 'liters', '4564564.00');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(100) NOT NULL,
  `userid` int(100) DEFAULT NULL,
  `particular` varchar(100) DEFAULT NULL,
  `item_quantity` int(100) DEFAULT NULL,
  `unit` varchar(100) DEFAULT NULL,
  `regular_price` int(100) DEFAULT NULL,
  `discount` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `userid`, `particular`, `item_quantity`, `unit`, `regular_price`, `discount`) VALUES
(5, 6, 'lotion', 4, 'dozen', 1000, '50.00'),
(6, 6, 't-shirt', 5, 'kl', 500, '5.00'),
(7, 6, 'shoes', 3, 'kl', 550, '10.00'),
(8, 6, 'bag', 3, 'liter', 5676, '5.00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(1, 'devon', 'devon@yahoo.com', '202cb962ac59075b964b07152d234b70'),
(2, 'djmb', 'djmb@gmail.com', '250cf8b51c773f3f8dc8b4be867a9a02'),
(3, 'devon', 'devon@yahoo.com', '250cf8b51c773f3f8dc8b4be867a9a02'),
(4, 'devon', 'devon@yahoo.com', '250cf8b51c773f3f8dc8b4be867a9a02'),
(5, 'pocong', 'pocong@gmail.com', '202cb962ac59075b964b07152d234b70'),
(6, 'admin', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `collection`
--
ALTER TABLE `collection`
  ADD PRIMARY KEY (`collection_code`),
  ADD KEY `userid` (`userid`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD KEY `code_no` (`collection_code`),
  ADD KEY `userid` (`userid`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `collection`
--
ALTER TABLE `collection`
  MODIFY `collection_code` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `collection`
--
ALTER TABLE `collection`
  ADD CONSTRAINT `collection_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `collection_ibfk_2` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `customer_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `users` (`id`);

--
-- Constraints for table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `items_ibfk_1` FOREIGN KEY (`collection_code`) REFERENCES `collection` (`collection_code`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `items_ibfk_2` FOREIGN KEY (`userid`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `items_ibfk_3` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `users` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
