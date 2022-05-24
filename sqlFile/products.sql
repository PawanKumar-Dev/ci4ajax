-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 13, 2022 at 08:25 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ci4ajx`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_brand` varchar(255) NOT NULL,
  `product_price` varchar(255) NOT NULL,
  `product_category` varchar(255) NOT NULL,
  `product_desc` varchar(255) NOT NULL,
  `product_img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `product_brand`, `product_price`, `product_category`, `product_desc`, `product_img`) VALUES
(2, 'Apple', 'Apple Corpo', '90', 'Fruits', 'This is some random text', 'kitchen.jpg'),
(3, 'Orange', 'Orange Corportion', '45', 'Fruits', 'This is some text', 'kitchen.jpg'),
(4, 'Banana', 'Banana Industries', '35', 'Fruits', 'This is text', 'kitchen.jpg'),
(5, 'Grapes', 'Grapes Corpo', '67', 'Fruits', 'Some text is here', 'kitchen.jpg'),
(6, 'Guava', 'Guava Pvt Ltd', '89', 'Fruits', 'Just some random text', 'kitchen.jpg'),
(7, 'Papaya', 'Papaya International Ltd', '78', 'Fruits', 'This is description of papaya', 'kitchen.jpg'),
(8, 'Cashew', 'Cashew Cropo Org', '34', 'Dried Fruits', 'Just some text again', 'kitchen.jpg'),
(9, 'Spinach', 'Spinach Iron Industries', '199', 'Vegetables', 'Just a vegetable description', 'kitchen.jpg'),
(10, 'Paneer', 'Paneer Milk In Ltd', '90', 'Dairy', 'Just some text', 'kitchen.jpg');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
