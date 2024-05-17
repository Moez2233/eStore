-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 27, 2022 at 06:33 AM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `estore`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

DROP TABLE IF EXISTS `brands`;
CREATE TABLE IF NOT EXISTS `brands` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.png',
  `name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `image`, `name`, `active`) VALUES
(1, 'iphone--logo.png', 'IPhone ', 1),
(3, 'redmi-logo.png', 'Redmi', 1),
(10, 'samsung-logo.png', 'Samsung', 1),
(20, 'huawei-logo.png', 'Huawei', 1),
(27, 'dell--logo.png', 'Dell ', 1),
(28, 'lenovo-logo.png', 'Lenovo', 1),
(29, 'hp-logo.png', 'HP', 1),
(30, 'apple-logo.png', 'Apple', 1),
(31, 'sony-logo.png', 'Sony', 1),
(34, 'oneplus-logo.png', 'ONEPLUS', 1),
(35, 'jjjjjj-logo.png', 'JJJJJJ', 0);

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

DROP TABLE IF EXISTS `cities`;
CREATE TABLE IF NOT EXISTS `cities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.png',
  `name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shippindelivery` int(11) NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `image`, `name`, `shippindelivery`, `active`) VALUES
(1, 'cairo-logo.png', 'Cairo', 100, 1),
(2, 'default.png', 'Giza', 150, 1),
(4, 'default.png', 'sharkia', 250, 1),
(5, 'marsa-matruh-logo.png', 'Marsa Matruh', 1500, 1),
(6, 'new-alex-logo.png', 'Alex', 600, 1),
(16, 'aswan-logo.png', 'Aswan', 2500, 1),
(19, 'awq-logo.png', 'AWQ', 4444, 0);

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

DROP TABLE IF EXISTS `colors`;
CREATE TABLE IF NOT EXISTS `colors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` char(7) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`id`, `name`, `code`, `active`) VALUES
(1, 'black', '#000000', 1),
(2, 'red', '#ff0000', 1),
(3, 'Red', 'FF0000', 0),
(4, 'white', '#ffffff', 1),
(5, 'Grey', '#808080', 1),
(6, 'blue', '#0000ff', 1),
(7, 'blue', '#ff0000', 0),
(8, 'green', '#8fbc8f', 1),
(9, 'Very soft blue', '#b6e1f6', 1),
(10, 'Purple', '#7b68ee', 1),
(11, ',54', 'lk', 0);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

DROP TABLE IF EXISTS `customers`;
CREATE TABLE IF NOT EXISTS `customers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.png',
  `name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` char(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bdate` date NOT NULL,
  `city_id` int(11) NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `city_id` (`city_id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `image`, `name`, `phone`, `address`, `email`, `bdate`, `city_id`, `active`) VALUES
(1, 'samaomar-logo.png', 'SamaOmar', '01015314732', 'el3sher', 'sama@gmail', '2001-04-01', 4, 1),
(2, 'alaa-logo.png', 'alaa', '01015314732', 'El-Mohandessin', 'al@gmail', '1999-10-26', 2, 1),
(3, 'mahmoud-logo.png', 'mahmoud', '01015314732', 'Al-Maemura', 'ma@gmail', '2000-01-25', 6, 0),
(4, 'default.png', 'sara', '01015314732', 'el3sher', 'sara@gmail', '2003-11-18', 2, 1),
(10, 'default.png', 'salma', '01014536657', 'cairo', 'samaaomar340@gmail.com', '2022-08-18', 1, 1),
(11, 'default.png', 'Omnia', '01014536657', 'el3sher', 'Om@gmail.com', '2022-08-24', 4, 1),
(12, 'mohamed-logo.png', 'mohamed', '01012547888', 'cairo', 'mo@gmail.com', '2022-08-24', 2, 1),
(27, 'zein-logo.png', 'Zein', '01534258755', 'cairo', 'ze@gmail.com', '2022-07-20', 1, 1),
(28, 'samsung-galaxy-s20-logo.png', 'Samsung Galaxy S20', '1520764', 'El-Mohandessin', 'samaaomar801@gmail.com', '2022-08-19', 2, 0),
(30, 'samy-logo.png', 'sam', '01012355454', 'cairo', 'samy@gmail', '2022-08-18', 1, 0),
(31, 'wal-logo.png', 'wal', '01265478', 'gixa', 'wal@gm', '2022-09-08', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

DROP TABLE IF EXISTS `departments`;
CREATE TABLE IF NOT EXISTS `departments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`, `active`) VALUES
(1, 'Accounting', 1),
(2, 'Receptionist', 1),
(3, 'sales', 1),
(4, 'IT', 1),
(5, 'HR', 1),
(6, 'R&D', 1),
(7, 'CS', 1),
(8, 'Marketing', 1),
(9, 'Marketing', 0),
(10, 'R&D', 0),
(11, 'security', 1),
(12, 'IT', 0),
(13, 'CS', 0),
(14, '//', 0);

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

DROP TABLE IF EXISTS `employees`;
CREATE TABLE IF NOT EXISTS `employees` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.png',
  `name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` char(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `department_id` int(11) NOT NULL,
  `basic_salary` float NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `department_id` (`department_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `image`, `name`, `phone`, `address`, `email`, `department_id`, `basic_salary`, `active`) VALUES
(1, 'samaaomar-logo.png', 'samaaomar', '01012547880', 'el3sher', 'sa@gmail', 4, 9000, 1),
(2, 'default.png', 'Omar', '01046227452', 'el3sher', 'om@gmail.com', 5, 80000, 1),
(3, 'default.png', 'Ahmed', '01012547888', 'cairo', 'ah@gmail', 1, 2500, 1),
(4, 'default.png', 'Zein', '01012547888', 'el3sher', 'ze@gmail.com', 8, 6000, 1),
(5, 'mahmoud-logo.png', 'Mahmoud', '01054698712', 'El-3sher', 'mo@gmail.com', 6, 8000, 1),
(9, 'samsung-galaxy-s20-logo.png', 'Samsung Galaxy S20', '1520764', 'El-Mohandessin', 'samaaomar801@gmail.com', 1, 6000, 0),
(10, 'saaaaaaaaaaaa-logo.png', 'SAAAAAAAAAAAA', '555555555', 'KKK', 'llllmmm@gmail', 1, 5555560000000, 0),
(11, 'samy-logo.png', 'samy', '1456221', 'El-Mohandessin', 'samaaomar801@gmail.com', 1, 3000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `labs`
--

DROP TABLE IF EXISTS `labs`;
CREATE TABLE IF NOT EXISTS `labs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.png',
  `model_id` int(11) NOT NULL,
  `color_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `year_id` int(11) NOT NULL,
  `active` int(11) NOT NULL DEFAULT '1',
  `cart` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `labs`
--

INSERT INTO `labs` (`id`, `image`, `model_id`, `color_id`, `price`, `year_id`, `active`, `cart`) VALUES
(1, '20000-logo.png', 18, 5, 20000, 2, 1, 0),
(2, '7800-logo.png', 19, 2, 7800, 3, 1, 1),
(3, '30500-logo.png', 21, 5, 30500, 3, 1, 0),
(4, '27800-logo.png', 20, 1, 27800, 3, 1, 0),
(5, '35500-logo.png', 22, 10, 35500, 3, 1, 0),
(6, '3500-logo.png', 23, 1, 3500, 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `mobiles`
--

DROP TABLE IF EXISTS `mobiles`;
CREATE TABLE IF NOT EXISTS `mobiles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.png	',
  `model_id` int(11) NOT NULL,
  `color_id` int(11) NOT NULL,
  `price` float NOT NULL,
  `year_id` int(11) NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT '1',
  `cart` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `model_id` (`model_id`),
  KEY `color_id` (`color_id`),
  KEY `year_id` (`year_id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mobiles`
--

INSERT INTO `mobiles` (`id`, `image`, `model_id`, `color_id`, `price`, `year_id`, `active`, `cart`) VALUES
(11, '27500-logo.png', 10, 5, 27600, 3, 1, 1),
(12, '24400-logo.png', 1, 1, 24400, 4, 1, 0),
(14, '9900-logo.png', 2, 9, 9900, 2, 1, 1),
(15, '12500-logo.png', 14, 2, 12500, 3, 1, 0),
(16, '9900-logo.png', 16, 9, 9900, 1, 1, 0),
(17, '14500-logo.png', 17, 5, 14500, 3, 1, 0),
(18, '18900-logo.png', 24, 1, 18900, 3, 1, 0),
(19, '25700-logo.png', 25, 1, 25700, 2, 1, 0),
(20, '4444-logo.png', 1, 1, 4444, 1, 0, 0),
(21, '27500-logo.png', 1, 1, 27500, 1, 0, 0),
(22, '27500-logo.png', 1, 1, 27500, 1, 0, 0),
(23, '555555-logo.png', 19, 1, 555555, 1, 0, 0),
(24, '17800-logo.png', 27, 1, 17800, 3, 1, 0),
(25, '17800-logo.png', 27, 1, 17800, 3, 0, 0),
(26, '88888888888888-logo.png', 17, 1, 88888900000000, 1, 0, 0),
(27, '5555555555555555-logo.png', 25, 1, 5.55556e15, 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `models`
--

DROP TABLE IF EXISTS `models`;
CREATE TABLE IF NOT EXISTS `models` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_id` int(11) NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `brand_id` (`brand_id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `models`
--

INSERT INTO `models` (`id`, `name`, `brand_id`, `active`) VALUES
(1, 'IPhone 11 Pro', 1, 1),
(2, 'Huawei Nova 7 ', 20, 1),
(10, 'IPhone 13 Pro', 1, 1),
(12, 'Dell Gaming G15', 27, 1),
(13, 'hp', 27, 0),
(14, 'Samsung Galaxy S20', 10, 1),
(15, 'Xiaomi Redmi Note 11 Pro', 3, 1),
(16, 'Samsung Galaxy A53 Dual Sim', 10, 1),
(17, 'SAMSUNG - Galaxy Note 20 ', 10, 1),
(18, 'Dell Gaming G15', 27, 0),
(19, 'Dell Inspiron', 27, 1),
(20, 'Lenovo Legion 5', 28, 1),
(21, 'HP 255 G7 Laptop', 29, 1),
(22, 'Macbook Air', 30, 1),
(23, 'VAIO SX14', 31, 1),
(24, 'Xiaomi 12 Pro 5G', 31, 1),
(25, 'SAMSUNG-5G Galaxy S22', 10, 1),
(27, 'ONEPLUS 10 Pro 5G ', 34, 1);

-- --------------------------------------------------------

--
-- Table structure for table `payment_methods`
--

DROP TABLE IF EXISTS `payment_methods`;
CREATE TABLE IF NOT EXISTS `payment_methods` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment_methods`
--

INSERT INTO `payment_methods` (`id`, `name`, `active`) VALUES
(1, 'cash', 1),
(2, 'Premium', 1),
(3, 'Debit', 1),
(4, 'cash', 0),
(5, 'Credit', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `username`, `password`, `admin`) VALUES
(3, 'zeinayad', 'zein@gmail', '$2y$10$OpmK880kroiuMnd6RZMUxO5hPNpuVHxfHJZgQ1F4JkXoy18oGJZKi', 0),
(2, 'samaaomar', '42019082@hti.edu.eg', '$2y$10$gMmPX0wGYRj8lGLcfihz4eU1K46PqITCSdnGF8WxTmTpaDdtqcWRa', 1),
(5, 'alaaomar', 'alaaomar@gmail.com', '$2y$10$wZFTkJvdwP2L6RM.Aj/zh.EzR8YCqsWQw1UEVqFQFvOkfwjYkpz7e', 0);

-- --------------------------------------------------------

--
-- Table structure for table `years`
--

DROP TABLE IF EXISTS `years`;
CREATE TABLE IF NOT EXISTS `years` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `years`
--

INSERT INTO `years` (`id`, `name`, `active`) VALUES
(1, '2019', 1),
(2, '2021', 1),
(3, '2022', 1),
(4, '2020', 1),
(5, '', 0),
(6, '2010', 0),
(7, '200', 0);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customers`
--
ALTER TABLE `customers`
  ADD CONSTRAINT `customers_ibfk_1` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `employees_ibfk_1` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `mobiles`
--
ALTER TABLE `mobiles`
  ADD CONSTRAINT `mobiles_ibfk_1` FOREIGN KEY (`model_id`) REFERENCES `models` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `mobiles_ibfk_2` FOREIGN KEY (`year_id`) REFERENCES `years` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `mobiles_ibfk_3` FOREIGN KEY (`color_id`) REFERENCES `colors` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `models`
--
ALTER TABLE `models`
  ADD CONSTRAINT `models_ibfk_1` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
