-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 05, 2023 at 12:29 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_shopping_cart`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` bigint(30) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `email`, `password`) VALUES
(2, 'admin', 'admincafe@gmail.com', 'admincafe');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cid` int(30) NOT NULL,
  `cname` varchar(100) NOT NULL,
  `ccode` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--
-- Error reading structure for table db_shopping_cart.orders: #1932 - Table 'db_shopping_cart.orders' doesn't exist in engine
-- Error reading data for table db_shopping_cart.orders: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'FROM `db_shopping_cart`.`orders`' at line 1

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `ID` int(10) UNSIGNED NOT NULL,
  `OID` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `PID` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `PNAME` varchar(45) NOT NULL DEFAULT '',
  `PRICE` double(10,2) NOT NULL DEFAULT 0.00,
  `QTY` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `TOTAL` double(10,2) NOT NULL DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(30) NOT NULL,
  `p_name` varchar(100) NOT NULL,
  `c_name` varchar(100) NOT NULL,
  `price` varchar(30) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `p_name`, `c_name`, `price`, `image`) VALUES
(3, 'Iced_vanilla_Latte', 'Coffee', '30', 'Iced-Vanilla-Latte-2-1.jpg'),
(6, 'Green tea', 'Tea', '12', 'Green_tea_recipe.jpg'),
(7, 'Crossiant', 'Pastries', '25', 'merlin_184841898_ccc8fb62-ee41-44e8-9ddf-b95b198b88db-master768.jpg'),
(9, 'Fruit & Yogurt ', 'Smoothie', '10', '441727-fruit-and-yogurt-smoothie-Alberta-Rose-4x3-1-aa04390dac11483aaeeec142dff1f6c7.jpg'),
(10, 'Cuppuccino', 'Coffee', '10', 'Cappuccino_at_Sightglass_Coffee.jpg'),
(11, 'Iced_Americano', 'Coffee', '15', 'jorik-blom-HP4VFH70LMc-unsplash.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `reguser`
--

CREATE TABLE `reguser` (
  `id` bigint(30) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reguser`
--

INSERT INTO `reguser` (`id`, `username`, `email`, `password`) VALUES
(1, 'jeni', 'jeni@gmail.com', '$2y$10$G3WHMbRO8VoHgPEqxQUi7eCafzvI3AlIgSxLDIdEStJesCT2E3iTS'),
(2, 'rohit', 'rohit@gmail.com', '$2y$10$OGMqTaXq.Visz06xTpRphO1L7AoPZsJid1aCxj7nnP4A.B.xbHdw.'),
(3, 'shylie', 'shylie@gmail.com', '$2y$10$ww1t58FSk7LLmcfCi4LjMes.8TCqKegHxYUVXMAMZrkNaQWfWA..u'),
(4, 'abhi', 'abhi@gmail.com', '$2y$10$eol9VQm21KrHlcWuQZqQke7Zd7jFFdY0S2DwAqF9Rn3lAWDFoaJLS'),
(5, 'jeni@', 'Surenams1505@gmail.com', '$2y$10$.W6NwECRl79de8ouF.7mcey0TmU6gSX4d46biYZDXzpglXY3K.mu2');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UID` int(11) NOT NULL,
  `NAME` varchar(150) NOT NULL DEFAULT '',
  `CONTACT` varchar(150) NOT NULL DEFAULT '',
  `ADDRESS` text DEFAULT NULL,
  `CITY` varchar(45) NOT NULL DEFAULT '',
  `PINCODE` varchar(45) NOT NULL DEFAULT '',
  `EMAIL` varchar(45) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UID` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
