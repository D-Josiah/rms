-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: May 26, 2024 at 11:34 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rms`
--

-- --------------------------------------------------------

--
-- Table structure for table `active_status`
--

CREATE TABLE `active_status` (
  `active_status_id` int(11) NOT NULL,
  `type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `active_status`
--

INSERT INTO `active_status` (`active_status_id`, `type`) VALUES
(1, 'active'),
(2, 'inactive'),
(3, 'suspended');

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `address_id` int(11) NOT NULL,
  `region_id` int(11) NOT NULL,
  `province` varchar(100) NOT NULL,
  `postal_code` char(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `name`, `email`, `username`, `password`) VALUES
(1, 'Juan Santos', 'js@gmail.com', 'juan', 'f6ccb3e8d609012238c0b39e60b2c9632b3cdede91e035dad1de43469768f4cc');

-- --------------------------------------------------------

--
-- Table structure for table `availability`
--

CREATE TABLE `availability` (
  `availability_id` int(11) NOT NULL,
  `type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `availability`
--

INSERT INTO `availability` (`availability_id`, `type`) VALUES
(1, 'available'),
(2, 'limited stock'),
(3, 'out of stock');

-- --------------------------------------------------------

--
-- Table structure for table `manages`
--

CREATE TABLE `manages` (
  `manages_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `admin_id` int(11) DEFAULT NULL,
  `reseller_id` int(11) DEFAULT NULL,
  `transaction_type` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `reseller_id` int(11) DEFAULT NULL,
  `order_status` int(11) DEFAULT NULL,
  `delivery_info` varchar(100) NOT NULL,
  `total_price` decimal(10,2) DEFAULT NULL,
  `payment_method` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_status`
--

CREATE TABLE `order_status` (
  `orderStatus_id` int(11) NOT NULL,
  `type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_status`
--

INSERT INTO `order_status` (`orderStatus_id`, `type`) VALUES
(1, 'completed'),
(2, 'pending approval'),
(3, 'to be shipped'),
(4, 'cancelled');

-- --------------------------------------------------------

--
-- Table structure for table `payment_method`
--

CREATE TABLE `payment_method` (
  `paymentMethod_id` int(11) NOT NULL,
  `type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment_method`
--

INSERT INTO `payment_method` (`paymentMethod_id`, `type`) VALUES
(1, 'cash'),
(2, 'bank'),
(3, 'GCash'),
(4, 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `image` blob DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `availability` int(11) GENERATED ALWAYS AS (case when `stock` > 10 then 1 when `stock` between 1 and 10 then 2 else 3 end) STORED
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `records`
--

CREATE TABLE `records` (
  `record_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `admin_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `record_type` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `record_type`
--

CREATE TABLE `record_type` (
  `recordType_id` int(11) NOT NULL,
  `type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `record_type`
--

INSERT INTO `record_type` (`recordType_id`, `type`) VALUES
(1, 'product addition'),
(2, 'product update'),
(3, 'hide product');

-- --------------------------------------------------------

--
-- Table structure for table `region`
--

CREATE TABLE `region` (
  `region_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `region`
--

INSERT INTO `region` (`region_id`, `name`) VALUES
(1, 'Ilocos Region'),
(2, 'Cagayan Valley'),
(3, 'Central Luzon'),
(4, 'Calabarzon'),
(5, 'Bicol Region'),
(6, 'Western Visayas'),
(7, 'Central Visayas'),
(8, 'Eastern Visayas'),
(9, 'Zamboanga Peninsula'),
(10, 'Northern Mindanao'),
(11, 'Davao Region'),
(12, 'Soccsksargen'),
(13, 'Caraga'),
(14, 'Autonomous Region in Muslim Mindanao (ARMM)'),
(15, 'Cordillera Administrative Region (CAR)'),
(16, 'National Capital Region (NCR)'),
(17, 'Mimaropa'),
(18, 'Bangsamoro Autonomous Region in Muslim Mindanao (BARMM)');

-- --------------------------------------------------------

--
-- Table structure for table `reseller`
--

CREATE TABLE `reseller` (
  `reseller_id` int(11) NOT NULL,
  `name` varchar(70) NOT NULL,
  `email` varchar(40) NOT NULL,
  `phone_number` int(11) NOT NULL,
  `reseller_photo` blob DEFAULT NULL,
  `active_status` int(11) DEFAULT NULL,
  `join_date` date NOT NULL,
  `address` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `transaction_id` int(11) NOT NULL,
  `type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`transaction_id`, `type`) VALUES
(1, 'Account Creation'),
(2, 'Account Update');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `active_status`
--
ALTER TABLE `active_status`
  ADD PRIMARY KEY (`active_status_id`);

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`address_id`),
  ADD KEY `region_id` (`region_id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`) USING BTREE;

--
-- Indexes for table `availability`
--
ALTER TABLE `availability`
  ADD PRIMARY KEY (`availability_id`);

--
-- Indexes for table `manages`
--
ALTER TABLE `manages`
  ADD PRIMARY KEY (`manages_id`),
  ADD KEY `admin_id` (`admin_id`),
  ADD KEY `reseller_id` (`reseller_id`),
  ADD KEY `transaction_type` (`transaction_type`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `reseller_id` (`reseller_id`),
  ADD KEY `payment_method` (`payment_method`),
  ADD KEY `order_status` (`order_status`);

--
-- Indexes for table `order_status`
--
ALTER TABLE `order_status`
  ADD PRIMARY KEY (`orderStatus_id`);

--
-- Indexes for table `payment_method`
--
ALTER TABLE `payment_method`
  ADD PRIMARY KEY (`paymentMethod_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `availability` (`availability`);

--
-- Indexes for table `records`
--
ALTER TABLE `records`
  ADD PRIMARY KEY (`record_id`),
  ADD KEY `admin_id` (`admin_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `record_type` (`record_type`);

--
-- Indexes for table `record_type`
--
ALTER TABLE `record_type`
  ADD PRIMARY KEY (`recordType_id`);

--
-- Indexes for table `region`
--
ALTER TABLE `region`
  ADD PRIMARY KEY (`region_id`);

--
-- Indexes for table `reseller`
--
ALTER TABLE `reseller`
  ADD PRIMARY KEY (`reseller_id`),
  ADD KEY `address` (`address`),
  ADD KEY `active_status` (`active_status`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`transaction_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `manages`
--
ALTER TABLE `manages`
  MODIFY `manages_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `records`
--
ALTER TABLE `records`
  MODIFY `record_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reseller`
--
ALTER TABLE `reseller`
  MODIFY `reseller_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `address`
--
ALTER TABLE `address`
  ADD CONSTRAINT `address_ibfk_1` FOREIGN KEY (`region_id`) REFERENCES `region` (`region_id`);

--
-- Constraints for table `manages`
--
ALTER TABLE `manages`
  ADD CONSTRAINT `manages_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`admin_id`),
  ADD CONSTRAINT `manages_ibfk_2` FOREIGN KEY (`reseller_id`) REFERENCES `reseller` (`reseller_id`),
  ADD CONSTRAINT `manages_ibfk_3` FOREIGN KEY (`transaction_type`) REFERENCES `transaction` (`transaction_id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`reseller_id`) REFERENCES `reseller` (`reseller_id`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`payment_method`) REFERENCES `payment_method` (`paymentMethod_id`),
  ADD CONSTRAINT `orders_ibfk_3` FOREIGN KEY (`order_status`) REFERENCES `order_status` (`orderStatus_id`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`availability`) REFERENCES `availability` (`availability_id`);

--
-- Constraints for table `records`
--
ALTER TABLE `records`
  ADD CONSTRAINT `records_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`admin_id`),
  ADD CONSTRAINT `records_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`),
  ADD CONSTRAINT `records_ibfk_3` FOREIGN KEY (`record_type`) REFERENCES `record_type` (`recordType_id`);

--
-- Constraints for table `reseller`
--
ALTER TABLE `reseller`
  ADD CONSTRAINT `reseller_ibfk_1` FOREIGN KEY (`address`) REFERENCES `address` (`address_id`),
  ADD CONSTRAINT `reseller_ibfk_2` FOREIGN KEY (`active_status`) REFERENCES `active_status` (`active_status_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
