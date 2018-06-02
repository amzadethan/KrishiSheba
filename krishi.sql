-- phpMyAdmin SQL Dump
-- version 4.5.0.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 26, 2016 at 10:08 PM
-- Server version: 10.0.17-MariaDB
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `krishi`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `farmer_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `phone` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `farmer_id`, `product_id`, `phone`) VALUES
(1, 5, 3, 3, '01676320284'),
(2, 5, 3, 1, '01928403640'),
(3, 5, 3, 5, '0123456789'),
(4, 5, 3, 2, '01712671707');

-- --------------------------------------------------------

--
-- Table structure for table `productpost`
--

CREATE TABLE `productpost` (
  `id` int(11) NOT NULL,
  `farmerid` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `district` varchar(255) NOT NULL,
  `subDistrict` varchar(255) NOT NULL,
  `details` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `productpost`
--

INSERT INTO `productpost` (`id`, `farmerid`, `title`, `price`, `phone`, `district`, `subDistrict`, `details`) VALUES
(1, 3, 'Miniket', '40 Tk/kg', '017318218299', 'Dhaka', 'Keraniganj', 'A Grade Quality'),
(2, 3, 'Najirshail', '48Tk/kg', '01731828299', 'Dhaka', 'Keraniganj', 'Top Breed'),
(3, 3, 'Bashmati', '55tk/kg', '01731828299', 'Tangail', 'Nagorpur', 'Aromatic'),
(4, 3, 'Polaw', '38Tk/kg', '01731828299', 'Dhaka', 'Manikganj', 'Medium Grade'),
(5, 3, 'Chini Gura', '40tk/kg', '017318218299', 'Tangail', 'Nagorpur', 'Aromatic');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_fname` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_type` varchar(255) NOT NULL,
  `user_pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_name`, `user_fname`, `user_email`, `user_type`, `user_pass`) VALUES
(1, 'amzad.ethan', 'Mohammad Amzad Hossain', 'amzad.ethan@gmail.com', 'true', 'chronos'),
(3, 'sourav', 'Sourav Saha', 'rocking.sourav@gmail.com', 'true', 'sourav'),
(4, 'telot', 'M Alam Telot', 'm.a.telot@gmail.com', 'true', 'telot'),
(5, 'romy', 'Sebastian Romy Gomez', 'sebastian@gmail.com', 'false', 'romy'),
(6, 'mehedi', 'Mahedi Hasan', 'controversial.mehedi@gmail.com', 'true', 'mehedi'),
(7, 'afzal', 'Mohammad Afzal Hossain', 'afzal@gmail.com', 'false', 'afzal');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `farmer_id` (`farmer_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `productpost`
--
ALTER TABLE `productpost`
  ADD PRIMARY KEY (`id`),
  ADD KEY `farmerid` (`farmerid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `productpost`
--
ALTER TABLE `productpost`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`farmer_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `orders_ibfk_3` FOREIGN KEY (`product_id`) REFERENCES `productpost` (`id`);

--
-- Constraints for table `productpost`
--
ALTER TABLE `productpost`
  ADD CONSTRAINT `productpost_ibfk_1` FOREIGN KEY (`farmerid`) REFERENCES `users` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
