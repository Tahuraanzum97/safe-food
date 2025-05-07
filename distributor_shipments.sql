-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 06, 2025 at 09:18 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `distributor_dashboard`
--

-- --------------------------------------------------------

--
-- Table structure for table `distributor_shipments`
--

CREATE TABLE `distributor_shipments` (
  `id` int(11) NOT NULL,
  `shipment_id` varchar(255) NOT NULL,
  `dispatch_date` date NOT NULL,
  `arrival_date` date NOT NULL,
  `quantity_shipped` varchar(100) NOT NULL,
  `shipment_status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `distributor_shipments`
--

INSERT INTO `distributor_shipments` (`id`, `shipment_id`, `dispatch_date`, `arrival_date`, `quantity_shipped`, `shipment_status`) VALUES
(2, 'SHIP125', '2025-04-22', '2025-04-24', '1000kg', 'Active'),
(3, 'SHIP126', '2025-04-23', '2025-05-05', '200 kg', 'Delivered'),
(4, 'SHIP127', '2025-04-24', '2025-04-26', '700 kg', 'Pending'),
(6, 'SHIP128', '2025-05-05', '2025-05-06', '450kg', 'Delivered'),
(7, 'SHIP129', '2025-05-03', '2025-05-06', '900kg', 'Pending');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `distributor_shipments`
--
ALTER TABLE `distributor_shipments`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `distributor_shipments`
--
ALTER TABLE `distributor_shipments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
