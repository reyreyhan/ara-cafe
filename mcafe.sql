-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 29, 2018 at 10:30 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mcafe`
--

-- --------------------------------------------------------

--
-- Table structure for table `cashflow`
--

CREATE TABLE `cashflow` (
  `id` int(8) NOT NULL,
  `id_user` int(4) NOT NULL,
  `information` varchar(64) NOT NULL,
  `cash` bigint(32) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `code` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cashflow`
--

INSERT INTO `cashflow` (`id`, `id_user`, `information`, `cash`, `date`, `code`) VALUES
(4, 2, 'Investor', 1000000, '2018-05-29 17:36:13', '0'),
(5, 2, 'Beli Gula', -10000, '2018-05-29 17:36:22', '0'),
(6, 1, 'Investor', 500000, '2018-06-29 16:56:33', '0'),
(7, 2, 'Order Done', 75000, '2018-06-29 20:50:20', '420180629083604'),
(8, 2, 'Order Done', 40000, '2018-06-29 20:50:24', '1220180629070000'),
(9, 2, 'Order Done', 45000, '2018-06-29 21:36:32', '2120180629093604'),
(10, 2, 'Order Done', 35000, '2018-06-29 21:59:29', '120180629095802'),
(11, 1, 'Tumbas Mie 1 Kardus', -100000, '2018-06-29 22:01:10', '0'),
(12, 2, 'Order Done', 25000, '2018-07-02 12:57:51', '220180702124543'),
(13, 2, 'Order Done', 75000, '2018-07-02 17:06:51', '120180702050613'),
(14, 2, 'Order Done', 80000, '2018-07-18 21:40:16', '120180718093935');

-- --------------------------------------------------------

--
-- Table structure for table `cusorder`
--

CREATE TABLE `cusorder` (
  `id` int(8) NOT NULL,
  `code_invoice_order` varchar(32) NOT NULL,
  `id_item` int(8) NOT NULL,
  `amount` int(8) NOT NULL,
  `total` int(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cusorder`
--

INSERT INTO `cusorder` (`id`, `code_invoice_order`, `id_item`, `amount`, `total`) VALUES
(4, '1220180629070000', 1, 1, 5000),
(5, '1220180629070000', 2, 2, 20000),
(6, '1220180629070000', 1, 3, 15000),
(33, '420180629083604', 1, 3, 15000),
(34, '420180629083604', 2, 6, 60000),
(36, '2120180629093604', 1, 5, 25000),
(37, '2120180629093604', 2, 2, 20000),
(38, '120180629095802', 2, 1, 10000),
(39, '120180629095802', 1, 5, 25000),
(40, '220180702124543', 1, 3, 15000),
(41, '220180702124543', 2, 1, 10000),
(43, '120180702050613', 2, 5, 50000),
(44, '120180702050613', 1, 5, 25000),
(45, '320180703020504', 1, 2, 10000),
(46, '320180703020504', 2, 4, 40000),
(47, '120180718093935', 1, 3, 15000),
(48, '120180718093935', 35, 5, 65000),
(50, '120180718094128', 1, 2, 10000),
(51, '120180718094128', 36, 4, 92000),
(52, '120180718094128', 37, 4, 88000),
(53, '120180718094128', 37, 4, 88000);

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `id` int(8) NOT NULL,
  `code_invoice` varchar(32) NOT NULL,
  `name` varchar(64) NOT NULL,
  `num_table` int(4) NOT NULL,
  `total` bigint(64) NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`id`, `code_invoice`, `name`, `num_table`, `total`, `status`) VALUES
(8, '1220180629070000', 'Yohanes Bosko', 12, 40000, 2),
(17, '420180629083604', 'Surobitch', 4, 75000, 2),
(19, '2120180629093604', 'Takim', 21, 45000, 2),
(20, '120180629095802', 'Dhani', 1, 35000, 2),
(21, '220180702124543', 'Rey', 2, 25000, 2),
(22, '120180702050613', 'ryan', 1, 75000, 2),
(23, '320180703020504', 'Reyhan', 3, 0, 0),
(24, '120180718093935', 'Rey', 1, 80000, 2),
(25, '120180718094128', 'bosko', 1, 190000, 1),
(26, '6920180718094350', 'sidki', 69, 0, 0),
(27, '6920180718102331', 'sidki', 69, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `id` int(8) NOT NULL,
  `name` varchar(64) NOT NULL,
  `price` bigint(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`id`, `name`, `price`) VALUES
(1, 'Susu', 5000),
(2, 'Mie Double + Telor', 10000),
(34, 'name', 0),
(35, 'Toraja Black Coffee', 13000),
(36, 'Latte', 23000),
(37, 'cappuccino', 22000),
(38, 'Irish coffee', 26000),
(39, 'Matcha latte', 16000),
(40, 'coffee mocha', 26000),
(41, 'cappuccino hazelnut', 24000),
(42, 'chocolate', 23000),
(43, 'kopi susu vietnam', 21000),
(44, 'doppio', 25000),
(45, 'Milkshake vanila', 21000),
(46, 'Milkshake chocolate', 21000),
(47, 'Milkshake mocha', 21000),
(48, 'Mochashake', 21000),
(49, 'ice cappucino/ latte', 23000),
(50, 'choco mint', 21000),
(51, 'affogato', 23000),
(52, 'choco volcano', 24000),
(53, 'choco oreo', 25000),
(54, 'matcha frape', 25000),
(55, 'choconut', 21000),
(56, 'mango freeze', 21000),
(57, 'guava freeze', 21000),
(58, 'orange freeze', 21000),
(59, 'lychee squash', 25000),
(60, 'strawberry squash', 25000),
(61, 'lemon tea', 21000),
(62, 'lychee tea', 21000),
(63, 'strawberry tea', 21000);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(4) NOT NULL,
  `name` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `name`) VALUES
(1, 'Owner'),
(2, 'Employee');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(4) NOT NULL,
  `name` varchar(32) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `id_role` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `username`, `password`, `id_role`) VALUES
(1, 'Owner', 'owner', 'owner', 1),
(2, 'Lorem Ipsum', 'lorem', 'lorem', 2),
(3, 'Lorem Ipsum 2', 'lorem2', 'lorem2', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cashflow`
--
ALTER TABLE `cashflow`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `code` (`code`);

--
-- Indexes for table `cusorder`
--
ALTER TABLE `cusorder`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `code_invoice_order` (`code_invoice_order`),
  ADD KEY `id_item` (`id_item`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code_invoice` (`code_invoice`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cashflow`
--
ALTER TABLE `cashflow`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `cusorder`
--
ALTER TABLE `cusorder`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;
--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
