-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 19, 2025 at 03:27 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sales_dashboard_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phoneNum` varchar(255) NOT NULL,
  `collegeName` varchar(255) NOT NULL,
  `roomNum` varchar(255) DEFAULT NULL,
  `method` enum('delivery','pickup') NOT NULL,
  `totalPrice` decimal(10,2) NOT NULL,
  `orderDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `name`, `phoneNum`, `collegeName`, `roomNum`, `method`, `totalPrice`, `orderDate`) VALUES
(1, 'Aszaa', '60196455319', 'Gamma', '', 'pickup', 5.50, '2025-05-18'),
(3, 'Nur', '60199213065', 'Gamma', '', 'pickup', 11.00, '2025-05-17'),
(5, 'Husna', '60182692092', 'Beta', 'B08-04-03', 'delivery', 5.50, '2025-05-01'),
(6, 'Aniq', '60167416987', 'Alpha', 'A5-03-03', 'delivery', 6.00, '2025-05-17'),
(7, 'Hana', '60196107995', 'Beta', 'B06-03-03', 'delivery', 6.00, '2025-04-29'),
(8, 'Zul', '601156549349', 'Alpha', '', 'pickup', 22.00, '2025-05-07'),
(9, 'Aqilah', '60149546906', 'Gamma', NULL, 'pickup', 16.50, '2025-03-25'),
(10, 'Nadhirah', '601116891337', 'Gamma', NULL, 'pickup', 5.50, '2025-05-06'),
(12, 'Mardhia', '60137413493', 'Beta', 'B7-02-11', 'delivery', 11.50, '2025-03-31'),
(13, 'Sha', '60163215657', 'Gamma', NULL, 'pickup', 5.50, '2025-05-04'),
(14, 'Khairul', '601156518244', 'Alpha', NULL, 'pickup', 5.50, '2025-04-09'),
(15, 'Hidayah', '60149333629', 'Beta', 'B05-04-01', 'delivery', 17.00, '2025-04-23'),
(16, 'Firah', '60135108433', 'Gamma', 'B0113', 'pickup', 5.50, '2025-03-15'),
(17, 'Zahirah', '601159743045', 'Non-resident', NULL, 'pickup', 5.00, '2025-03-20'),
(18, 'Aisyah', '60198853804', 'Beta', 'B09-04-06', 'delivery', 6.00, '2025-04-11'),
(19, 'Akmal', '012-224 4366', 'Alpha', 'A9-02-09', 'delivery', 22.00, '2025-03-29'),
(20, 'Nur Eizzaty', '60125859841', 'Beta', 'B11-03-08', 'delivery', 6.00, '2025-05-01'),
(21, 'Nik', '60174345161', 'Alpha', NULL, 'pickup', 5.00, '2025-04-15'),
(22, 'Liyana', '601160911317', 'Beta', NULL, 'pickup', 16.00, '2025-04-07'),
(23, 'Manjie', '60106630563', 'Non-resident', NULL, 'pickup', 16.00, '2025-04-05'),
(24, 'Lisa', '60173667342', 'Gamma', 'B0113', 'pickup', 5.50, '2025-03-23'),
(25, 'Syarfa', '601137722972', 'Beta', 'B06-03-05', 'delivery', 6.00, '2025-04-04'),
(26, 'Daniel Hariz', '60143011013', 'Alpha', NULL, 'pickup', 5.50, '2025-05-06'),
(27, 'Hidayah', '60149333629', 'Beta', 'B05-04-01', 'delivery', 17.00, '2025-04-23'),
(28, 'Zul', '601156549349', 'Alpha', NULL, 'pickup', 22.00, '2025-05-06'),
(29, 'Khadija', '60167338731', 'Beta', 'B01-01-05', 'delivery', 6.00, '2025-04-20'),
(30, 'Afifah', '60122477158', 'Gamma', 'A0339', 'delivery', 6.00, '2025-05-01'),
(31, 'Afiah', '60137347937', 'Beta', NULL, 'pickup', 5.50, '2025-04-08'),
(32, 'Aqilah', '601121525569', 'Gamma', 'B0120', 'delivery', 5.50, '2025-03-15'),
(33, 'Nurfiffi', '601157629520', 'Beta', 'B10-03-03', 'delivery', 6.00, '2025-04-05'),
(34, 'Daniel', '60143011013', 'Alpha', NULL, 'pickup', 5.50, '2025-03-30'),
(35, 'Afifah', '60122477158', 'Gamma', 'A0339', 'delivery', 6.00, '2025-05-05'),
(36, 'Qama', '60177994593', 'Beta', 'B9-04-05', 'delivery', 6.00, '2025-04-22'),
(37, 'Zikri', '60197690617', 'Alpha', NULL, 'pickup', 5.50, '2025-03-17'),
(38, 'Aisyah', '60198853804', 'Beta', 'B09-04-06', 'delivery', 6.00, '2025-04-06'),
(39, 'Zul', '601156549349', 'Alpha', NULL, 'pickup', 22.00, '2025-04-18'),
(40, 'Nadhirah', '601116891337', 'Gamma', NULL, 'pickup', 5.50, '2025-05-02'),
(41, 'Husna', '60182692092', 'Beta', 'B08-04-03', 'delivery', 5.50, '2025-03-27'),
(42, 'Hana', '60196107995', 'Beta', 'B06-03-03', 'delivery', 6.00, '2025-05-05'),
(43, 'Afiah', '60137347937', 'Beta', NULL, 'pickup', 5.50, '2025-03-26'),
(44, 'Zahirah', '601159743045', 'Non-resident', NULL, 'pickup', 5.00, '2025-04-25'),
(45, 'Daniel Hariz', '60143011013', 'Alpha', NULL, 'pickup', 5.50, '2025-04-29'),
(46, 'Rys', '60173805039', 'Beta', 'B01-03-10', 'delivery', 6.00, '2025-03-21'),
(47, 'Syarfa', '601137722972', 'Beta', 'B06-03-05', 'delivery', 6.00, '2025-03-12'),
(48, 'Aqilah', '601121525569', 'Gamma', 'B0120', 'delivery', 5.50, '2025-04-19'),
(49, 'Nurfiffi', '601157629520', 'Beta', 'B10-03-03', 'delivery', 6.00, '2025-03-24'),
(50, 'Nadhirah', '601116891337', 'Gamma', NULL, 'pickup', 5.50, '2025-05-02'),
(51, 'Daniel', '60143011013', 'Alpha', NULL, 'pickup', 5.50, '2025-04-19'),
(52, 'Naufal', '010-448 2681', 'Alpha', 'A5-02-10', 'delivery', 10.50, '2025-04-22'),
(53, 'Aniq', '60167416987', 'Alpha', 'A5-03-03', 'delivery', 6.00, '2025-05-06'),
(58, 'Shahir', '+601242555651', 'Alpha', NULL, 'pickup', 17.50, '2025-05-16'),
(60, 'Zya', '+601024125125', 'Beta', NULL, 'pickup', 19.50, '2025-05-18');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('user','admin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`) VALUES
(4, 'Customer', 'customer@gmail.com', '$2y$10$t7Jh11TSXH5YA9.x/WfEXu4zPQV.QGD5tnkdc.HcjrBQvo7mVZGj.', 'user'),
(5, 'Admin', 'admin@gmail.com', '$2y$10$UbSUSjBU8YfoXqQxnG3aqe8rNnzvmihdpNjqKaiu4ID94pnfYXthq', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
