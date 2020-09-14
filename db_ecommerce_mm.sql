-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 14, 2020 at 10:22 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_ecommerce_mm`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_brand`
--

CREATE TABLE `tbl_brand` (
  `brand_id` int(11) NOT NULL,
  `brand_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_brand`
--

INSERT INTO `tbl_brand` (`brand_id`, `brand_name`) VALUES
(1, 'Apple'),
(2, 'Microsoft'),
(3, 'LG'),
(4, 'Sony'),
(6, 'HP'),
(7, 'Samsung');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`cat_id`, `cat_name`) VALUES
(1, 'Laptop'),
(2, 'Mobile'),
(3, 'Head Phone'),
(5, 'Tab'),
(6, 'Desktop');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `mobaile_number` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`id`, `username`, `mobaile_number`, `address`, `email`, `password`) VALUES
(1, 'Anisur Rahman', '01748613498', 'Sylhet', 'asfaq@gmail.com', '123'),
(2, 'Mahedi', '01738597697', 'Sylhet', 'mhdiptoucm@gmail.com', '123');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer_order`
--

CREATE TABLE `tbl_customer_order` (
  `id` int(11) NOT NULL,
  `product_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `product_img` varchar(255) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `total_price` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `final_order` int(11) NOT NULL DEFAULT 0,
  `delivery_status` int(11) NOT NULL DEFAULT 0,
  `seen_unseen` int(11) NOT NULL DEFAULT 0,
  `time` datetime NOT NULL DEFAULT current_timestamp(),
  `confirmOrder` int(11) NOT NULL DEFAULT 1,
  `payment_methood` int(11) NOT NULL DEFAULT 1,
  `payment_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_customer_order`
--

INSERT INTO `tbl_customer_order` (`id`, `product_name`, `product_img`, `product_id`, `quantity`, `price`, `total_price`, `customer_id`, `final_order`, `delivery_status`, `seen_unseen`, `time`, `confirmOrder`, `payment_methood`, `payment_status`) VALUES
(10, 'Microsoft,Microsoft 20Surface 20Go 20Pentium 208GB', 'microsoftTab1.jpg', 17, 2, 60990, 0, 1, 1, 1, 1, '0000-00-00 00:00:00', 0, 2, 1),
(11, 'HP,11064', 'hp16inch1.jpg', 5, 2, 26000, 0, 1, 1, 1, 1, '0000-00-00 00:00:00', 0, 2, 1),
(12, 'HP,10613', 'desktophp31.jpg', 9, 1, 40000, 0, 1, 1, 1, 1, '0000-00-00 00:00:00', 0, 2, 1),
(13, 'Apple,MacBook 20Pro', 'apple-macbook-pro-mid-2017-s-23.jpg', 12, 3, 112993, 0, 1, 1, 1, 1, '0000-00-00 00:00:00', 0, 2, 1),
(14, 'HP,8090', 'hp14inc2.jpg', 6, 3, 37500, 0, 1, 1, 0, 1, '0000-00-00 00:00:00', 0, 2, 0),
(15, 'HP,9377', 'desktophp11.jpg', 7, 1, 31200, 0, 1, 1, 0, 1, '0000-00-00 00:00:00', 0, 2, 0),
(16, 'LG,Harmony', 'lg-g8x-thinq1.jpg', 22, 7, 12378, 0, 1, 1, 0, 1, '0000-00-00 00:00:00', 0, 2, 0),
(17, 'HP,11149', 'hp14inc1.jpg', 4, 3, 26000, 0, 1, 1, 0, 1, '0000-00-00 00:00:00', 0, 2, 0),
(18, 'Apple, 20MacBook 20Pro 2013-inch', 'apple-macbook-pro-mid-2017-s-22.jpg', 11, 1, 11299, 0, 1, 1, 0, 1, '0000-00-00 00:00:00', 0, 2, 0),
(19, 'LG,LG 20V20', 'lgmobaile1.jpg', 18, 2, 44800, 0, 1, 1, 0, 1, '0000-00-00 00:00:00', 0, 2, 0),
(20, 'Apple,Macbook-air', 'laptopapple11.jpeg', 10, 9, 109900, 0, 1, 1, 0, 1, '0000-00-00 00:00:00', 0, 2, 0),
(21, 'LG,Harmony', 'lg-g8x-thinq1.jpg', 22, 1, 12378, 0, 1, 1, 0, 1, '0000-00-00 00:00:00', 0, 2, 0),
(23, 'HP,8090', 'hp14inc2.jpg', 6, 3, 37500, 0, 1, 1, 0, 1, '0000-00-00 00:00:00', 0, 2, 0),
(25, 'Apple,I 20Mac', 'desktopApple1.jpeg', 13, 1, 109900, 0, 1, 1, 0, 1, '0000-00-00 00:00:00', 0, 2, 0),
(26, 'HP,8090', 'hp14inc2.jpg', 6, 1, 37500, 0, 1, 1, 0, 1, '0000-00-00 00:00:00', 0, 2, 0),
(27, 'HP,10613', 'desktophp31.jpg', 9, 1, 40000, 0, 1, 1, 0, 1, '0000-00-00 00:00:00', 0, 2, 0),
(28, 'HP,10878', 'desktophp21.jpg', 8, 1, 92000, 0, 1, 1, 0, 1, '0000-00-00 00:00:00', 0, 2, 0),
(29, 'Apple,Macbook-air', 'laptopapple11.jpeg', 10, 1, 109900, 0, 1, 1, 0, 1, '0000-00-00 00:00:00', 0, 2, 0),
(30, 'Apple,iPhone 2011 20Pro', 'Apple-iPhone-11-Pro2.jpg', 14, 2, 109900, 0, 1, 1, 0, 1, '0000-00-00 00:00:00', 0, 2, 0),
(35, 'HP,11149', 'hp14inc1.jpg', 4, 3, 26000, 0, 1, 1, 0, 1, '0000-00-00 00:00:00', 0, 2, 0),
(36, 'HP,11149', 'hp14inc1.jpg', 4, 1, 26000, 0, 2, 1, 0, 1, '0000-00-00 00:00:00', 0, 1, 0),
(37, 'HP,9377', 'desktophp11.jpg', 7, 1, 31200, 0, 2, 1, 0, 1, '0000-00-00 00:00:00', 0, 1, 0),
(38, 'Apple,MacBook 20Pro', 'apple-macbook-pro-mid-2017-s-23.jpg', 12, 1, 112993, 0, 2, 1, 0, 1, '0000-00-00 00:00:00', 0, 1, 0),
(39, 'Microsoft,Microsoft 20Lumia 20650', 'microsoftMobaile11.jpg', 15, 1, 19600, 0, 2, 1, 0, 1, '0000-00-00 00:00:00', 0, 1, 0),
(40, 'Apple,Macbook-air', 'laptopapple11.jpeg', 10, 1, 109900, 0, 1, 1, 0, 1, '0000-00-00 00:00:00', 0, 2, 0),
(41, 'HP,11149', 'hp14inc1.jpg', 4, 3, 26000, 0, 1, 1, 0, 1, '0000-00-00 00:00:00', 0, 2, 0),
(42, 'HP,11149', 'hp14inc1.jpg', 4, 3, 26000, 0, 1, 1, 0, 1, '0000-00-00 00:00:00', 0, 2, 0),
(43, 'HP,11149', 'hp14inc1.jpg', 4, 3, 26000, 0, 1, 1, 0, 1, '0000-00-00 00:00:00', 0, 2, 0),
(44, 'HP,11149', 'hp14inc1.jpg', 4, 3, 26000, 0, 1, 1, 0, 0, '0000-00-00 00:00:00', 0, 2, 0),
(45, 'HP,11149', 'hp14inc1.jpg', 4, 3, 26000, 0, 1, 1, 0, 0, '0000-00-00 00:00:00', 0, 2, 0),
(46, 'HP,11149', 'hp14inc1.jpg', 4, 3, 26000, 0, 1, 1, 0, 0, '0000-00-00 00:00:00', 0, 2, 0),
(47, 'HP,11149', 'hp14inc1.jpg', 4, 3, 26000, 0, 1, 1, 0, 0, '0000-00-00 00:00:00', 0, 2, 0),
(49, 'HP,11149', 'hp14inc1.jpg', 4, 1, 26000, 0, 1, 1, 0, 0, '0000-00-00 00:00:00', 0, 2, 0),
(50, 'HP,11064', 'hp16inch1.jpg', 5, 1, 26000, 0, 1, 1, 0, 0, '0000-00-00 00:00:00', 0, 2, 0),
(51, 'HP,11064', 'hp16inch1.jpg', 5, 5, 26000, 0, 1, 1, 0, 0, '0000-00-00 00:00:00', 0, 2, 0),
(52, 'HP,11149', 'hp14inc1.jpg', 4, 1, 26000, 0, 1, 1, 0, 0, '0000-00-00 00:00:00', 0, 2, 0),
(53, 'Microsoft,Microsoft 20Lumia 20650', 'microsoftMobaile11.jpg', 15, 1, 19600, 0, 1, 1, 0, 0, '0000-00-00 00:00:00', 0, 2, 0),
(54, 'HP,8090', 'hp14inc2.jpg', 6, 1, 37500, 0, 1, 1, 0, 0, '0000-00-00 00:00:00', 0, 2, 0),
(55, 'HP,11064', 'hp16inch1.jpg', 5, 1, 26000, 0, 1, 1, 0, 0, '0000-00-00 00:00:00', 0, 2, 0),
(60, 'HP,11064', 'hp16inch1.jpg', 5, 1, 26000, 0, 1, 1, 0, 0, '0000-00-00 00:00:00', 0, 2, 0),
(61, 'Apple, 20MacBook 20Pro 2013-inch', 'apple-macbook-pro-mid-2017-s-22.jpg', 11, 1, 11299, 0, 1, 1, 0, 0, '0000-00-00 00:00:00', 0, 2, 0),
(62, 'HP,8090', 'hp14inc2.jpg', 6, 1, 37500, 0, 1, 1, 0, 0, '0000-00-00 00:00:00', 0, 2, 0),
(63, 'HP,8090', 'hp14inc2.jpg', 6, 2, 37500, 0, 1, 1, 0, 0, '0000-00-00 00:00:00', 0, 2, 0),
(64, 'HP,8090', 'hp14inc2.jpg', 6, 1, 37500, 0, 1, 1, 0, 0, '0000-00-00 00:00:00', 0, 2, 0),
(65, 'HP,11064', 'hp16inch1.jpg', 5, 1, 26000, 0, 1, 1, 0, 0, '0000-00-00 00:00:00', 0, 2, 0),
(66, 'HP,11149', 'hp14inc1.jpg', 4, 1, 26000, 0, 1, 1, 0, 0, '0000-00-00 00:00:00', 0, 2, 0),
(67, 'HP,8090', 'hp14inc2.jpg', 6, 1, 37500, 0, 1, 1, 0, 0, '2020-02-04 14:04:39', 0, 2, 0),
(69, 'Apple, 20MacBook 20Pro 2013-inch', 'apple-macbook-pro-mid-2017-s-22.jpg', 11, 1, 11299, 0, 1, 1, 0, 0, '2020-02-05 11:28:24', 0, 2, 0),
(70, 'HP,11064', 'hp16inch1.jpg', 5, 1, 26000, 0, 1, 1, 0, 0, '2020-02-11 07:38:38', 0, 2, 0),
(71, 'HP,11064', 'hp16inch1.jpg', 5, 1, 26000, 0, 1, 1, 0, 0, '2020-02-11 07:59:58', 1, 2, 0),
(72, 'Apple, 20MacBook 20Pro 2013-inch', 'apple-macbook-pro-mid-2017-s-22.jpg', 11, 1, 11299, 0, 1, 1, 0, 0, '2020-02-11 08:02:02', 1, 2, 0),
(73, 'HP,11149', 'hp14inc1.jpg', 4, 1, 26000, 0, 1, 1, 0, 0, '2020-02-11 08:03:20', 1, 2, 0),
(74, 'Apple,Macbook-air', 'laptopapple11.jpeg', 10, 1, 109900, 0, 1, 1, 0, 0, '2020-02-11 08:05:30', 1, 2, 0),
(75, 'HP,8090', 'hp14inc2.jpg', 6, 1, 37500, 0, 1, 1, 0, 0, '2020-02-11 08:06:03', 1, 2, 0),
(76, 'HP,11064', 'hp16inch1.jpg', 5, 1, 26000, 0, 1, 1, 0, 0, '2020-02-11 08:07:12', 1, 2, 0),
(77, 'Apple, 20MacBook 20Pro 2013-inch', 'apple-macbook-pro-mid-2017-s-22.jpg', 11, 1, 11299, 0, 1, 1, 0, 0, '2020-02-11 08:07:20', 1, 2, 0),
(78, 'HP,11149', 'hp14inc1.jpg', 4, 1, 26000, 0, 1, 1, 0, 0, '2020-02-11 08:36:52', 1, 2, 1),
(79, 'HP,11149', 'hp14inc1.jpg', 4, 1, 26000, 0, 1, 1, 0, 0, '2020-02-11 10:53:02', 1, 2, 1),
(80, 'HP,8090', 'hp14inc2.jpg', 6, 1, 37500, 0, 1, 1, 0, 1, '2020-02-11 10:54:13', 1, 2, 1),
(82, 'Apple, 20MacBook 20Pro 2013-inch', 'apple-macbook-pro-mid-2017-s-22.jpg', 11, 1, 11299, 0, 1, 1, 0, 0, '2020-02-11 15:32:20', 1, 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_message`
--

CREATE TABLE `tbl_message` (
  `id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `sender_name` varchar(255) NOT NULL,
  `message` varchar(10000) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_message`
--

INSERT INTO `tbl_message` (`id`, `sender_id`, `sender_name`, `message`, `status`) VALUES
(1, 1, 'Anisur Rahman', 'Hello Moomu This is Test!! and I am Anisur Rahman', 1),
(2, 1, 'Anisur Rahman', 'Hi', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `p_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `p_brand` varchar(255) NOT NULL,
  `p_title` varchar(255) NOT NULL,
  `p_img` varchar(255) NOT NULL,
  `p_details` varchar(255) NOT NULL,
  `P_stock` int(11) NOT NULL,
  `p_model` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `features1` varchar(255) NOT NULL,
  `features2` varchar(255) NOT NULL,
  `features3` varchar(255) NOT NULL,
  `features4` varchar(255) NOT NULL,
  `processor` varchar(255) NOT NULL,
  `display` varchar(255) NOT NULL,
  `memory` varchar(255) NOT NULL,
  `storage` varchar(255) NOT NULL,
  `graphics` varchar(255) NOT NULL,
  `chipset` varchar(255) NOT NULL,
  `operating_System` varchar(255) NOT NULL,
  `battery` varchar(255) NOT NULL,
  `adapter` varchar(255) NOT NULL,
  `audio` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`p_id`, `cat_id`, `p_brand`, `p_title`, `p_img`, `p_details`, `P_stock`, `p_model`, `price`, `features1`, `features2`, `features3`, `features4`, `processor`, `display`, `memory`, `storage`, `graphics`, `chipset`, `operating_System`, `battery`, `adapter`, `audio`) VALUES
(4, 0, 'HP', 'HP 14-cm0120AU AMD Dual Core A4-9125 14 inch HD Laptop with Genuine Windows 10', 'hp14inc1.jpg', 'HP 14-cm0120AU is of the best creation of HP. It has a 14” HD LED (1366 x 768) Display. Its HD display increases the enjoyment of watching. This laptop is powered by AMD Dual Core A4-9125 processor which cache memory 1M and clock speed up to 2.60 GHz. It ', 0, '11149', '26000', 'AMD Dual Core A4-9125 ( 1MB Cache, 2.30GHz-2.6GHz ) Processor', '4GB DDR4 RAM', '500GB HDD', '14', 'AMD Dual Core A4-9125 ( 1MB Cache, 2.30GHz-2.6GHz ) Processor', '14', '4 GB DDR4-1866 SDRAM (1 x 4 GB)', '500 GB 5400 rpm SATA', 'AMD Radeon R3 Graphics', 'AMD', 'Win 10', '3-cell, 41 Wh Li-ion', '45 W AC power adapter', 'Dual speakers'),
(5, 0, 'HP', 'HP 15-db0084AX AMD Dual Core 15.6 Inch HD Laptop with Genuine Windows 10', 'hp16inch1.jpg', 'HP 15-db0084AX laptop has a 15.6 Inches HD display for your daily needs. Its HD display experiences you a new interest of watching. This laptop is powered by AMD Dual Core A4-9125 processor which cache memory 1M and clock speed up to 2.90GHz. You will als', 0, '11064', '26000', 'AMD Dual Core A4-9125 (1MB Cache , 2.30GHz up to 2.6GHz) Processor', '4GB DDR4 RAM', '500GB HDD', '15.6', 'AMD Dual Core A4-9125 (1MB Cache , Base frequency 2.30GHz up to 2.6GHz) Processor', '15.6', '4GB DDR4 RAM', '500GB HDD', 'AMD Radeon R3 Graphics', 'AMD', 'Win 10', '3-cell, 41 Wh Li-ion', '45 W AC power adapter', 'Dual speakers'),
(6, 0, 'HP', 'HP 240 G7 Core i3 7th Gen 14.1', 'hp14inc2.jpg', 'HP 240 G7 containing 14.1\" diagonal HD SVA anti-glare slim LED-backlit display laptop with Intel core i3-7020U processor having the base frequency of 2.30GHz. This American stylish brand also contains 1TB SATA storage and 4 GB DDR4 RAM to ensure greater c', 1, '8090', '37500', 'Intel Core i3-7020U (3M Cache, 2.30 GHz)', '4 GB DDR4 Ram', '1 TB SATA 5400 rpm', '14.1', 'Intel® Core™ i3-7020U Processor (3M Cache, 2.30 GHz, 2 Cores, 4 Threads)', '14.1', '4 GB DDR4', '1 TB SATA 5400 rpm', 'Intel® HD Graphics 620', 'Intel', 'Free Dos', '3-cell, 31 Wh Li-ion', '45 W AC power adapter', 'Dual speakers'),
(7, 6, 'HP', 'Gaming PC Pentium G5400', 'desktophp11.jpg', 'Gaming PC Pentium G5400 With Intel Pentium Gold G5400 8th Gen Processor. It has Asrock H310M-HDV/M.2 8th Gen DDR4 Motherboard. Geil Evo Spear 4GB DDR4- 2400MHz Ram .Western Digital 1TB Blue Desktop HDD. GALAX GeForce GT 1030 2GB DDR4 Graphics Card. Antec ', 0, '9377', '31200', 'Intel Pentium Gold G5400 (4M Cache, 3.70 GHz)', '4GB DDR4- 2400MHz Ram', 'WD 1TB Blue HDD', 'GALAX GT 1030 2GB Graphics', 'Intel Pentium Gold G5400 Processor (4M Cache, 3.70 GHz)', '15.6\" LED HD ( 1366x768 )Display', '4 GB DDR4', 'Western Digital 1TB Blue Desktop HDD', 'GALAX GeForce GT 1030 2GB DDR4 Graphics Card', 'Intel', 'Free Dos', '3-cell, 31 Wh Li-ion', '50 W AC power adapter', 'Dual speakers'),
(8, 6, 'HP', 'HP ProOne 400 G4 Core i7 8th Gen 23.8 Inch Full HD WLED-backlit Anti-glare All in One PC', 'desktophp21.jpg', 'HP ProOne 400 G4 8th Gen All in One PC with Intel Core i7-8700 Processor (12M Cache, 3.20 GHz up to 4.60 GHz). It is boost up with 8GB DDR4 Ram which is huge powerful. In addition, it also has 1TB HDD and 128GB SSD .So with that not only your pc becomes f', 0, '10878', '92000', 'Intel Core i7-8700 Processor (12M Cache,3.20 GHz up to 4.60 GHz)', '8 GB DDR4 Ram', '1TB HDD + 128GB SSD', '23.8\" WLED-backlit (1920 x 1080)', 'Intel Core i7-8700 Processor (12M Cache,3.20 GHz up to 4.60 GHz)', '60.45 cm(23.8) diagonal FHD IPS widescreen WLED-backlit anti-glare (1920 x 1080)', '4GB DDR4 RAM', '1TB HDD + 128GB SSD', 'Integrated Intel UHD Graphics 630', 'Intel', 'Free DOS', '3-cell, 41 Wh Li-ion', '55 W AC power adapter', 'Dual speakers'),
(9, 6, 'HP', 'i-Life ZED PC CX3 21.5? HD Core i3 All in One PC with Genuine Windows 10', 'desktophp31.jpg', 'The all-new Zed Air CX3, featuring the latest generation of Intel Core i3-5005U Processor (3M Cache, 2.00 GHz), Intel HD Graphics, help apps load faster and allow multiple tasks to run simultaneously without lag. Easily take on everyday computing tasks, w', 0, '10613', '40000', '4 GB Ram and 1 TB HDD', 'Stand Thin ( 9 mm screen thickness )', 'Intel HD 5500 Graphics Chipset', 'Built-in Battery', 'Intel Core i3-5005U Processor (3M Cache, 2.00 GHz)', '21.5 inch', '4GB DDR4 RAM', '1 TB SATA 5400 rpm', 'Intel Integrated HD 5500', 'Intel', 'Windows 10', '4-cell, 41 Wh Li-ion', '40 W AC power adapter', 'Dual speakers'),
(10, 1, 'Apple', '1.6GHz Dual-Core Processor with Turbo Boost up to 3.6GHz 128GB Storage Touch ID', 'laptopapple11.jpeg', 'Testing conducted by Apple in October 2018 using preproduction 1.6GHz dual-core Intel Core i5-based MacBook Air systems with 8GB of RAM and 256GB SSD. The wireless web test measures battery life by wirelessly browsing 25 popular websites with display brig', 6, 'Macbook-air', '109900', 'Retina display with True Tone', '1.6GHz dual-core 8th-generation Intel Core i5 processor with Turbo Boost up to 3.6GHz', '8GB 2133MHz LPDDR3 memory', '128GB SSD storage¹', '', '13.3-inch (diagonal) LED-backlit display with IPS technology; 2560-by-1600 native resolution at 227 pixels per inch with support for millions of colors', '8GB of 2133MHz LPDDR3 onboard memory  Configurable to 16GB of memory', '1 TB SATA 5400 rpm', 'Intel UHD Graphics 617  Support for Thunderbolt 3–enabled external graphics processors (eGPUs)', 'Intel UHD', 'macOS', '3-cell, 41 Wh Li-ion', '45 W AC power adapter', ' Stereo speakers  Three microphones  3.5 mm headphone jack'),
(11, 0, 'Apple', '1.4GHz Quad-Core Processor with Turbo Boost up to 3.9GHz 128GB Storage Touch Bar and Touch ID', 'apple-macbook-pro-mid-2017-s-22.jpg', ' Trade-in value based on 2018 MacBook Pro 15. Trade-in value will vary based on the condition, year, and configuration of your trade-in device. You must be at least 18 years old to be eligible to trade in for credit or for an Apple Store Gift Card. Not al', -7, ' MacBook Pro 13-inch', '11299', 'Intel Core i7-8700 Processor (12M Cache,3.20 GHz up to 4.60 GHz)', '8 GB DDR4 Ram', 'Intel HD 5500 Graphics Chipset', 'Built-in Battery', 'Intel® Core™ i3-7020U Processor (3M Cache, 2.30 GHz, 2 Cores, 4 Threads)', '13.3-inch (diagonal) LED-backlit display with IPS technology; 2560-by-1600 native resolution at 227 pixels per inch with support for millions of colors', '4GB DDR4 RAM', '1TB HDD + 128GB SSD', 'AMD Radeon R3 Graphics', 'Intel UHD', 'macOS', '4-cell, 41 Wh Li-ion', '40 W AC power adapter', ' Stereo speakers  Three microphones  3.5 mm headphone jack'),
(12, 1, 'Apple', 'MacBook Pro (16-inch, 2019)', 'apple-macbook-pro-mid-2017-s-23.jpg', 'With the MacBook Pro (16-inch, 2019), Apple set out to make the best MacBook Pro ever, offering fans of the MacBook Pro line – in Apple’s own words – “more of what they love.” By listening to the feedback from its customers, Apple has managed exactly that', 0, 'MacBook Pro', '112993', 'Intel Core i7-8700 Processor (12M Cache,3.20 GHz up to 4.60 GHz)', 'Stand Thin ( 9 mm screen thickness )', '8GB 2133MHz LPDDR3 memory', 'GALAX GT 1030 2GB Graphics', 'Intel Core i7-8700 Processor (12M Cache,3.20 GHz up to 4.60 GHz)', '16-inch, 3,072 x 1,920 Retina display (backlit LED, IPS, 500 nits brightness, wide color P3 gamut)', '4 GB DDR4-1866 SDRAM (1 x 4 GB)', '1TB SSD', 'AMD Radeon Pro', 'AMD', 'macOS', '3-cell, 41 Wh Li-ion', '45 W AC power adapter', ' Stereo speakers  Three microphones  3.5 mm headphone jack'),
(13, 6, 'Apple', '2.3GHz Dual-Core Processor with Turbo Boost up to 3.6GHz 1TB Storage', 'desktopApple1.jpeg', 'Apple takes a complete product life cycle approach to determining our environmental impact.Apple takes a complete product life cycle approach to determining our environmental impact.Apple takes a complete product life cycle approach to determining our env', 0, 'I Mac', '109900', '2.3GHz dual-core 7th-generation Intel Core i5 processor', 'Turbo Boost up to 3.6GHz', '8GB 2133MHz memory, configurable to 16GB', '1TB hard drive¹', '2.3GHz', '21.5-inch (diagonal) LED-backlit display 1920?by?1080 resolution with support for millions of colors', '8GB of 2133MHz DDR4 memory', '1TB (5400-rpm) hard drive', 'Intel Iris Plus Graphics 640', 'Intel', 'macOS', '3-cell, 41 Wh Li-ion', '55 W AC power adapter', 'Stereo speakers  Microphone'),
(14, 0, 'Apple', 'iPhone 11 Pro', 'Apple-iPhone-11-Pro2.jpg', 'Apple in September 2019 unveiled the new iPhone 11 Pro and iPhone 11 Pro Max with triple-lens cameras, A13 chips, faster Face ID, Night Mode, shatter resistant glass, improved water resistance and more. iPhone 11 Pro starts at $999, iPhone 11 Pro Max star', 0, 'iPhone 11 Pro', '109900', 'Triple-lens cameras w/ new ultra wide-angle lens', 'More durable, water resistant body', 'Matte finish and new dark green color', 'Night Mode for better low-light images', 'Intel® Core™ i3-7020U Processor (3M Cache, 2.30 GHz, 2 Cores, 4 Threads)', '14', '4 GB DDR4-1866 SDRAM (1 x 4 GB)', '1 TB SATA 5400 rpm', 'GALAX GeForce GT 1030 2GB DDR4 Graphics Card', 'AMD', 'iOS 13, upgradable to iOS 13.3', '3-cell, 41 Wh Li-ion', '50 W AC power adapter', ' Stereo speakers  Three microphones  3.5 mm headphone jack'),
(15, 0, 'Microsoft', 'Microsoft Lumia 650 ', 'microsoftMobaile11.jpg', 'Microsoft Lumia 650 mobile phone features and price in Bangladesh. Microsoft Lumia 650 is a 5.0 inches display smartphone with 1GB RAM.\r\nGeneral Info:\r\nNetwork Technology: GSM / HSPA / LTE\r\nOS: Microsoft Windows 10\r\nChipset: Qualcomm Snapdragon 212\r\nCPU: ', 9, 'Microsoft Lumia 650 ', '19600', 'Network Technology: GSM / HSPA / LTE', '4 GB DDR4 Ram', 'WD 1TB Blue HDD', 'Built-in Battery', 'Intel® Core™ i3-7020U Processor (3M Cache, 2.30 GHz, 2 Cores, 4 Threads)', ' 5.0 inches', '4 GB DDR4', '1TB SSD', 'Intel Integrated HD 5500', 'Intel', 'Windows 10', '3-cell, 41 Wh Li-ion', '40 W AC power adapter', 'Dual speakers'),
(16, 1, 'Microsoft', 'Microsoft Surface Pro 7 10th Gen Intel Core i3', 'microsoftLaptop1.jpg', 'Processor - Intel Core i3 1005G1\r\nProcessor Generation - 10th Gen\r\nProcessor Clock Speed - 1.20-3.40GHz\r\nDisplay Size - 12.3 inch\r\nRAM - 4GB\r\nStorage - 128GB SSD\r\nGraphics Chipset - Intel UHD Graphics\r\nGraphics Memory - Shared', 1, 'Microsoft Surface Pro 7 10th Gen Intel Core i3', '80000', 'Intel Pentium Gold G5400 (4M Cache, 3.70 GHz)', '1.6GHz dual-core 8th-generation Intel Core i5 processor with Turbo Boost up to 3.6GHz', '1TB HDD + 128GB SSD', '15.6\" LED HD ( 1366x768 )Display', 'Intel Core i7-8700 Processor (12M Cache,3.20 GHz up to 4.60 GHz)', '15.6\" LED HD ( 1366x768 )Display', '4GB DDR4 RAM', '500 GB 5400 rpm SATA', 'Intel® HD Graphics 620', 'Intel', 'Win 10', '3-cell, 31 Wh Li-ion', '55 W AC power adapter', 'Dual speakers'),
(17, 5, 'Microsoft', 'Microsoft Surface Go Pentium 8GB', 'microsoftTab1.jpg', 'Features\r\nIntel Pentium Gold 4415Y (2M Cache, 1.60 GHz)\r\n8GB Ram\r\n128GB SSD\r\n10\" (1800 x 1200) Touch Display', 0, 'Microsoft Surface Go Pentium 8GB', '60990', 'AMD Dual Core A4-9125 (1MB Cache , 2.30GHz up to 2.6GHz) Processor', '', '8GB 2133MHz LPDDR3 memory', '10.1\" anti-glare LED (1366 x 768)', 'AMD Dual Core A4-9125 ( 1MB Cache, 2.30GHz-2.6GHz ) Processor', '10.1inch', '4 GB DDR4', '500GB HDD', 'AMD Radeon R3 Graphics', 'AMD', 'Windows 10', '3-cell, 41 Wh Li-ion', '45 W AC power adapter', 'Dual speakers'),
(18, 2, 'LG', 'LG V20', 'lgmobaile1.jpg', 'LG V20 Price in Bangladesh and Full Specifications. LG V20 is a Smartphone of LG. This LG V20 have 4 GB RAM. 32/64 GB Internal Memory (ROM). microSD, up to 512 GB (dedicated slot) External Memory Card. LG V20 Comes with 5.7 inches, IPS LCD capacitive touc', 0, 'LG V20', '44800', 'Fast battery charging (Quick Charge 3.0)', 'MP4/DviX/XviD/H.265/WMV player', 'MP3/WAV/FLAC/eAAC+/WMA player', 'Photo/video editor', 'AMD Dual Core A4-9125 ( 1MB Cache, 2.30GHz-2.6GHz ) Processor', 'IPS LCD capacitive touchscreen, 16M colors', '8GB of 2133MHz LPDDR3 onboard memory  Configurable to 16GB of memory', 'Western Digital 1TB Blue Desktop HDD', 'Intel UHD Graphics 617  Support for Thunderbolt 3–enabled external graphics processors (eGPUs)', 'Qualcomm MSM8996 Snapdragon 820', '7.0 (Nougat), upgradable to Android 8.0 (Oreo) - K', '3200 mAh battery', '45 W AC power adapter', 'MP3/WAV/FLAC/eAAC+/WMA player'),
(19, 1, 'Soney', 'Sony VAIO', 'soneyLaptop1.jpg', '\r\nProcessor:3rd gen Intel® Core™ i7-3632QM quad-core (2.20GHz / 3.20GHz with Turbo Boost)\r\n\r\nOperating System: Windows 8 64-bit\r\n\r\nDisplay:14\" LED backlit display (1600 x 900)Touch Screen!!!\r\n\r\nGraphics: (Video Card): AMD Radeon™ HD 7670M (2GB) hybrid gra', 0, 'VAIO E Series 14P Custom Touch Laptop', '160000', '', '', '', '', '3rd gen Intel® Core™ i7-3632QM quad-core (2.20GHz / 3.20GHz with Turbo Boost)', '14\" LED backlit display (1600 x 900)Touch Screen!!!', '8GB (8GB x1) DDR3-1600MHz', '1TB SSD', 'Video Card): AMD Radeon™ HD 7670M (2GB) hybrid graphics', 'AMD', 'Free Dos', '3-cell, 31 Wh Li-ion', '55 W AC power adapter', 'Stereo speakers  Microphone'),
(20, 5, 'Soney', 'Sony Xperia Tablet', 'soneyTablet1.jpg', 'This Tab was the best tab from sony Xperia serise i brought it with a very big ammount when it was realeased in 2016.\r\n\r\nnow sony release their 2,3, 4th gen Tab\'s so iam salling it. i dont play games anymor. dont have time. so selling my best time killing', 1, 'Sony Xperia Tablet', ' 8500', 'Sensors Accelerometer, gyro, compass', 'Stand Thin ( 9 mm screen thickness )', '1TB HDD + 128GB SSD', 'Built-in Battery', 'AMD Dual Core A4-9125 ( 1MB Cache, 2.30GHz-2.6GHz ) Processor', ' LED-backlit , capacitive touchscreen, 16Million colors', 'Card slot + microSD, up to 64 GB (dedicated slot)', '1TB HDD + 128GB SSD', 'GALAX GeForce GT 1030 2GB DDR4 Graphics Card', 'Qualcomm APQ8064 Snapdragon 600', 'Win 10', '3200 mAh battery', '55 W AC power adapter', 'SOUND Loudspeaker : Yes, with stereo speakers'),
(21, 5, 'Samsung', 'Samsung Galaxy Tab S4', 'samsungTablet1.jpg', '\r\nBrand New Samsung Galaxy Tab S4 64GB 10 Days Guarantee 3 Years Warranty.\r\n\r\nMobile Buzz BD\r\n\r\nBashundhara City Shopping Mall. \r\n\r\nLevel-5,Block-B,Shop-44\r\nBrand New Samsung Galaxy Tab S4 64GB 10 Days Guarantee 3 Years Warranty.\r\n\r\nMobile Buzz BD\r\n\r\nBash', 1, 'Samsung Galaxy Tab S4', '49500', 'Intel Pentium Gold G5400 (4M Cache, 3.70 GHz)', '4GB DDR4- 2400MHz Ram', 'WD 1TB Blue HDD', '10.6\" LED HD ( 1366x768 )Display', 'AMD Dual Core A4-9125 ( 1MB Cache, 2.30GHz-2.6GHz ) Processor', '10\" diagonal HD SVA BrightView WLED-backlit (1366 x 768)', '4 GB DDR4-1866 SDRAM (1 x 4 GB)', '500 GB 5400 rpm SATA', 'GALAX GeForce GT 1030 2GB DDR4 Graphics Card', 'Qualcomm MSM8996 Snapdragon 820', 'Free DOS', '3200 mAh battery', '40 W AC power adapter', 'SOUND Loudspeaker : Yes, with stereo speakers'),
(22, 2, 'LG', 'LG HARMONY', 'lg-g8x-thinq1.jpg', 'MP3/WAV/FLAC/eAAC+/WMA player MP3/WAV/FLAC/eAAC+/WMA player MP3/WAV/FLAC/eAAC+/WMA player MP3/WAV/FLAC/eAAC+/WMA player MP3/WAV/FLAC/eAAC+/WMA player MP3/WAV/FLAC/eAAC+/WMA player MP3/WAV/FLAC/eAAC+/WMA player MP3/WAV/FLAC/eAAC+/WMA player MP3/WAV/FLAC/eA', 1, 'Harmony', '12378', 'Intel Core i7-8700 Processor (12M Cache,3.20 GHz up to 4.60 GHz)', '1.6GHz dual-core 8th-generation Intel Core i5 processor with Turbo Boost up to 3.6GHz', '1TB HDD + 128GB SSD', '23.8\" WLED-backlit (1920 x 1080)', 'AMD Dual Core A4-9125 ( 1MB Cache, 2.30GHz-2.6GHz ) Processor', '10.5 inch', '8GB of 2133MHz DDR4 memory', 'Western Digital 1TB Blue Desktop HDD', 'Intel UHD Graphics 617  Support for Thunderbolt 3–enabled external graphics processors (eGPUs)', 'Qualcomm APQ8064 Snapdragon 600', 'iOS 13, upgradable to iOS 13.3', '3-cell, 41 Wh Li-ion', '45 W AC power adapter', 'MP3/WAV/FLAC/eAAC+/WMA player');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `addedBy` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `name`, `type`, `password`, `addedBy`) VALUES
(1, 'mahedi', 'Admin', '123', ''),
(3, 'Ajijul Islam', 'Co-Admin', '123', 'mahedi'),
(4, 'Rakibul Hasan', 'Admin', '001', 'mahedi');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_type`
--

CREATE TABLE `tbl_user_type` (
  `id` int(11) NOT NULL,
  `type_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user_type`
--

INSERT INTO `tbl_user_type` (`id`, `type_name`) VALUES
(1, 'Admin'),
(2, 'Co-Admin'),
(4, 'Employee');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_customer_order`
--
ALTER TABLE `tbl_customer_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_message`
--
ALTER TABLE `tbl_message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user_type`
--
ALTER TABLE `tbl_user_type`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_customer_order`
--
ALTER TABLE `tbl_customer_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `tbl_message`
--
ALTER TABLE `tbl_message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_user_type`
--
ALTER TABLE `tbl_user_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
