-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 28, 2018 at 12:43 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE IF NOT EXISTS `customers` (
`id` int(11) NOT NULL,
  `salescode` int(6) NOT NULL,
  `customername` varchar(30) NOT NULL,
  `customeradress` varchar(500) NOT NULL,
  `customeremail` varchar(50) NOT NULL,
  `customerphone` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `salescode`, `customername`, `customeradress`, `customeremail`, `customerphone`) VALUES
(2, 18765, 'Nafi Ahmed', 'Dhanmondi dhaka', 'nafi@gmail.com', 1670239294),
(3, 45026, 'Atikul Hoque', 'Dhanmondi', 'atik@gmail.com', 14684646),
(4, 27187, 'Ashik Rahman', 'asik@gmail.com', 'asik@gmail.com', 684684681),
(5, 57642, 'Tanzir Mahmud', 'Zigatola', 'tanzir@gmail.com', 2145343245),
(6, 69159, 'Tanzir Mahmud', 'Zigatola', 'tanzir@gmail.com', 2145343245);

-- --------------------------------------------------------

--
-- Table structure for table `deleveryinfo`
--

CREATE TABLE IF NOT EXISTS `deleveryinfo` (
`id` int(11) NOT NULL,
  `salescode` int(6) NOT NULL,
  `product_id` int(6) NOT NULL,
  `saleprice` int(10) NOT NULL,
  `salequantity` int(6) NOT NULL,
  `s_total` int(10) NOT NULL,
  `s_payamount` int(10) NOT NULL,
  `saledate` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `deleveryinfo`
--

INSERT INTO `deleveryinfo` (`id`, `salescode`, `product_id`, `saleprice`, `salequantity`, `s_total`, `s_payamount`, `saledate`) VALUES
(2, 18765, 30, 600, 15, 9000, 1200, '2018-02-27'),
(3, 4502, 28, 580, 3, 1740, 1000, '2018-02-27'),
(4, 69159, 28, 4364, 33, 144012, 234, '2018-02-27'),
(5, 57642, 29, 600, 10, 6000, 2000, '2018-02-27'),
(6, 27187, 30, 450, 5, 2250, 999, '2018-02-27');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE IF NOT EXISTS `items` (
`id` int(11) NOT NULL,
  `productcode` varchar(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `vendorprice` varchar(50) NOT NULL,
  `rtlprice` int(100) NOT NULL,
  `quantity` int(10) NOT NULL,
  `totalprice` int(6) NOT NULL,
  `payamount` int(6) NOT NULL,
  `vendorid` int(10) NOT NULL,
  `purchasedate` date NOT NULL,
  `lastpaydate` date NOT NULL,
  `image` varchar(50) NOT NULL,
  `status` varchar(500) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `productcode`, `name`, `vendorprice`, `rtlprice`, `quantity`, `totalprice`, `payamount`, `vendorid`, `purchasedate`, `lastpaydate`, `image`, `status`) VALUES
(25, 'CKA-KS04', 'Kids Shirt', '230', 400, 10, 2300, 1500, 1, '2018-02-26', '2018-02-24', '3593445.png', '4'),
(27, 'CKA-KS06', 'Kids Panjabi', '350', 600, 15, 5250, 3000, 2, '2018-02-27', '2018-02-27', '3962097.jpg', '6'),
(28, 'CKA-KS08', 'Kids Tshirt', '350', 500, 10, 3500, 2000, 1, '2018-02-27', '2018-02-28', '292054.jpeg', '36'),
(29, 'CKA-KSI9', 'Kids Shoe', '500', 800, 49, 25000, 10000, 1, '2018-02-26', '2018-02-26', '6429443.jpg', '10'),
(30, 'CKA-HTI4', 'Kids Panjabi short', '400', 600, 66, 26400, 22998, 1, '2018-02-26', '2018-02-23', '5068665.jpg', '20'),
(31, 'FTS-0111', 'Female T Shirt', '400', 600, 4, 1600, 1000, 1, '2018-02-22', '2018-02-24', '6678467.jpg', '0');

-- --------------------------------------------------------

--
-- Table structure for table `salesitem`
--

CREATE TABLE IF NOT EXISTS `salesitem` (
`id` int(11) NOT NULL,
  `salescode` int(6) NOT NULL,
  `product_id` int(6) NOT NULL,
  `saleprice` int(6) NOT NULL,
  `salequantity` int(4) NOT NULL,
  `s_total` int(6) NOT NULL,
  `s_payamount` int(6) NOT NULL,
  `s_due` int(6) NOT NULL,
  `saledate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `phone` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `phone`) VALUES
(1, 'Gtech', 'gtechcp', 'gtechcp@123', 1723120990);

-- --------------------------------------------------------

--
-- Table structure for table `vendor`
--

CREATE TABLE IF NOT EXISTS `vendor` (
`id` int(11) NOT NULL,
  `vendorname` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vendor`
--

INSERT INTO `vendor` (`id`, `vendorname`) VALUES
(1, 'HQ Garements'),
(2, 'Ridyad Fashion'),
(3, 'Riyadur Garments'),
(4, 'Hqs Group'),
(5, 'Nafi Fashions'),
(6, 'Nafidur Rahman Fashion'),
(7, 'Riyadur Raihan '),
(8, 'Nafi Ahmed Fashion'),
(9, 'Riyadur Kabir Garments New');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deleveryinfo`
--
ALTER TABLE `deleveryinfo`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salesitem`
--
ALTER TABLE `salesitem`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vendor`
--
ALTER TABLE `vendor`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `deleveryinfo`
--
ALTER TABLE `deleveryinfo`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `salesitem`
--
ALTER TABLE `salesitem`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `vendor`
--
ALTER TABLE `vendor`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
