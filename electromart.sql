-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 01, 2022 at 06:46 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `electromart`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `ad_id` int(11) NOT NULL,
  `ad_uname` varchar(30) NOT NULL,
  `ad_email` varchar(45) NOT NULL,
  `ad_ph` bigint(10) NOT NULL,
  `ad_pwd` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ad_id`, `ad_uname`, `ad_email`, `ad_ph`, `ad_pwd`) VALUES
(1, 'admin', 'admin@gmail.com', 2147483647, 'qwerty');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `bid` int(11) NOT NULL,
  `bname` varchar(30) NOT NULL,
  `buname` varchar(40) NOT NULL,
  `bemail` varchar(45) NOT NULL,
  `bcontactno` bigint(10) NOT NULL,
  `bpwd` varchar(30) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`bid`, `bname`, `buname`, `bemail`, `bcontactno`, `bpwd`, `status`) VALUES
(13, 'Apple', 'John', 'johnapple@gmail.com', 9878876543, 'john', 'enable'),
(14, 'Dell', 'Jonathan', 'jonathan@gmail.com', 8569834832, 'jonathan', 'enable'),
(15, 'HP', 'Johny', 'johny@gmail.com', 9689586978, 'johny', 'enable'),
(16, 'Lenovo', 'Rachel', 'rachel@gmail.com', 9586795847, 'rachel', 'enable');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(45) NOT NULL,
  `textarea` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `username`, `email`, `textarea`) VALUES
(2, 'jack', 'jack@gmail.com', 'hey. awesome service guys'),
(3, 'jay', 'jay@gmail.com', 'Thank you for the service.');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `fullname` varchar(40) NOT NULL,
  `username` varchar(40) NOT NULL,
  `email` varchar(45) NOT NULL,
  `contactno` bigint(10) NOT NULL,
  `address` varchar(150) NOT NULL,
  `pwd` varchar(30) NOT NULL,
  `profile` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `fullname`, `username`, `email`, `contactno`, `address`, `pwd`, `profile`) VALUES
(17, 'Priyanka', 'priyanka', 'priyanka@gmail.com', 8656453426, 'Mumbai', 'priyanka', '../uploads/defaultprofile.png'),
(18, 'Thomas', 'thomas', 'thomas@gmail.com', 7778889767, 'Kerala', 'thomas', '../uploads/defaultprofile.png'),
(19, 'Joey', 'joey', 'joey@gmail.com', 9832123234, 'Delhi', 'joey', '../uploads/defaultprofile.png'),
(20, 'Aju', 'aju', 'aju@gmail.com', 9878768796, 'Kerala', 'aju', '../uploads/defaultprofile.png');

-- --------------------------------------------------------

--
-- Table structure for table `delivery`
--

CREATE TABLE `delivery` (
  `id` int(11) NOT NULL,
  `orderid` int(11) NOT NULL,
  `ordereduser` varchar(30) NOT NULL,
  `usercontact` bigint(10) NOT NULL,
  `useraddress` varchar(150) NOT NULL,
  `payment_type` varchar(11) NOT NULL,
  `totalprice` int(11) NOT NULL,
  `res_status` varchar(11) NOT NULL,
  `delivery_status` varchar(11) NOT NULL,
  `delivery_person` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `delivery`
--

INSERT INTO `delivery` (`id`, `orderid`, `ordereduser`, `usercontact`, `useraddress`, `payment_type`, `totalprice`, `res_status`, `delivery_status`, `delivery_person`) VALUES
(34, 60, 'Thomas', 7778889767, 'Kerala', 'cod', 120, 'shipped', 'delivering', 'gokul'),
(36, 69, 'Aju', 9878768796, 'kerala', 'online', 113000, 'shipped', 'delivering', 'faizi'),
(40, 70, 'Thomas', 7778889767, 'Kerala', 'online', 80000, 'shipped', 'delivering', 'chris'),
(41, 73, 'Aju', 9878768796, 'Kerala', 'cod', 40000, 'shipped', 'delivering', 'abigail');

-- --------------------------------------------------------

--
-- Table structure for table `delivperson`
--

CREATE TABLE `delivperson` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `uname` varchar(30) NOT NULL,
  `email` varchar(45) NOT NULL,
  `contact` bigint(10) NOT NULL,
  `address` varchar(150) NOT NULL,
  `profile` varchar(200) NOT NULL,
  `pwd` varchar(45) NOT NULL,
  `status` varchar(3) NOT NULL,
  `dstatus` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `delivperson`
--

INSERT INTO `delivperson` (`id`, `name`, `uname`, `email`, `contact`, `address`, `profile`, `pwd`, `status`, `dstatus`) VALUES
(12, 'Faizi', 'faizi', 'faizi@gmail.com', 9323421234, 'Karnataka', '630dee247e0382.76814068.png', 'faizi', 'yes', 'Ready'),
(14, 'Abigail', 'abigail', 'abigail@gmail.com', 9786978968, 'Kerala', '630f316231e205.58257898.png', 'abigail', 'yes', 'Ready'),
(15, 'Jacob', 'jacob', 'jacob@gmail.com', 9458985948, 'Mysore', '630fab0d1b94f8.73121938.png', 'jacob', 'yes', 'Ready');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderid` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `pname` varchar(30) NOT NULL,
  `pprice` int(10) NOT NULL,
  `pbrand` varchar(50) NOT NULL,
  `qty` int(10) NOT NULL,
  `ordereduser` varchar(50) NOT NULL,
  `totalprice` int(10) NOT NULL,
  `ordered_date` date DEFAULT NULL,
  `payment_type` varchar(20) NOT NULL,
  `res_status` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orderid`, `pid`, `pname`, `pprice`, `pbrand`, `qty`, `ordereduser`, `totalprice`, `ordered_date`, `payment_type`, `res_status`) VALUES
(69, 29, 'Mac Pro', 113000, 'Apple', 1, 'aju', 113000, '2022-08-30', 'online', 'shipped'),
(70, 33, 'Dell XPS', 80000, 'Dell', 1, 'thomas', 80000, '2022-08-31', 'online', 'shipped'),
(71, 34, 'HP Spectre', 86000, 'HP', 1, 'shawn', 86000, '2022-08-31', 'online', 'waiting'),
(72, 30, 'Macbook Pro', 120000, 'Apple', 1, 'joey', 120000, '2022-08-31', 'online', 'waiting'),
(73, 39, 'Lenovo Chromebook', 40000, 'Lenovo', 1, 'aju', 40000, '2022-08-31', 'cod', 'shipped'),
(74, 32, 'Dell Inspiron', 70000, 'Dell', 1, 'priyanka', 70000, '2022-08-31', 'online', 'waiting');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `pid` int(11) NOT NULL,
  `pname` varchar(30) NOT NULL,
  `pprice` varchar(15) NOT NULL,
  `pdescription` varchar(100) NOT NULL,
  `pbrands` varchar(50) NOT NULL,
  `pimage` varchar(125) NOT NULL,
  `manager` varchar(45) NOT NULL,
  `pstatus` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`pid`, `pname`, `pprice`, `pdescription`, `pbrands`, `pimage`, `manager`, `pstatus`) VALUES
(30, 'Macbook Pro', '120000', 'Its the new macbook pro.', 'Apple', '630f2ee59e6b99.08819939.jpg', 'John', 'available'),
(31, 'Macbook Air', '110000', 'Its the latest macbook air.', 'Apple', '630f2f3f0c9be8.05473133.jpg', 'John', 'available'),
(32, 'Dell Inspiron', '70000', 'All new dell inspiron', 'Dell', '630f35d13272a8.02920050.jpg', 'Jonathan', 'available'),
(33, 'Dell XPS', '80000', 'All new dell xps with latest features.', 'Dell', '630f361b1b6c84.75441361.jpg', 'Jonathan', 'available'),
(34, 'HP Spectre', '86000', 'Powerful HP with new features.', 'HP', '630f3696869ce2.15023926.jpg', 'Johny', 'available'),
(35, 'HP Pavilion', '75000', 'Brand new HP Pavilion', 'HP', '630f36d257d366.95515629.jpg', 'Johny', 'available'),
(37, 'Lenovo ThinkPad', '55000', 'ThinkPad is here.', 'Lenovo', '630fb58d13a727.48355905.jpg', 'Rachel', 'available'),
(39, 'Lenovo Chromebook', '40000', 'Get the Chromebook.', 'Lenovo', '630fb62957ed41.23017160.jpg', 'Rachel', 'available');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ad_id`),
  ADD UNIQUE KEY `ad_uname` (`ad_uname`),
  ADD UNIQUE KEY `ad_ph` (`ad_ph`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`bid`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `contactno` (`contactno`);

--
-- Indexes for table `delivery`
--
ALTER TABLE `delivery`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `orderid` (`orderid`);

--
-- Indexes for table `delivperson`
--
ALTER TABLE `delivperson`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderid`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`pid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `ad_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `bid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `delivery`
--
ALTER TABLE `delivery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `delivperson`
--
ALTER TABLE `delivperson`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
