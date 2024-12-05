-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2024 at 01:36 PM
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
-- Database: `clinic-booking-system`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_info`
--

CREATE TABLE `admin_info` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact_number` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_info`
--

INSERT INTO `admin_info` (`id`, `name`, `email`, `contact_number`, `password`) VALUES
(1, 'ADMIN01', 'scpg2300128@segi4u.my', '012-4047985', '$2y$10$ME0iomFK66rN5pCFswepW.iKdYeA9YKnuF2vrHkLdzBT7WGXcVC4u');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` varchar(255) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `status` varchar(30) NOT NULL DEFAULT 'Pending',
  `requested` varchar(30) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`id`, `date`, `time`, `patient_id`, `doctor_id`, `status`, `requested`) VALUES
(1, '2024-12-11', '9:30a.m. - 10:00a.m.', 1, 2, 'Pending', '0'),
(2, '2025-01-02', '2:00p.m. - 2:30p.m.', 1, 1, 'Approved', '1'),
(3, '2025-03-13', '2:00p.m. - 2:30p.m.', 1, 2, 'Approved', '1'),
(4, '2024-12-24', '9:00a.m. - 9:30a.m.', 2, 1, 'Pending', '0'),
(5, '2025-02-01', '11:30a.m. - 12:00p.m.', 2, 1, 'Pending', '0'),
(6, '2024-12-13', '2:00p.m. - 2:30p.m.', 2, 1, 'Approved', '0'),
(7, '2025-01-10', '2:30p.m. - 3:00p.m.', 2, 1, 'Approved', '0');

-- --------------------------------------------------------

--
-- Table structure for table `doctor_info`
--

CREATE TABLE `doctor_info` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact_number` varchar(30) NOT NULL,
  `specialist` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doctor_info`
--

INSERT INTO `doctor_info` (`id`, `name`, `email`, `contact_number`, `specialist`, `description`, `picture`, `password`) VALUES
(1, 'TOH, HANNAH', 'hooihoon70@outlook.com', '012-3369879', 'Paediatric Medicine', 'MBBS (Bombay), MRCP (UK), FRCP (Glasg)', 'doctor4.jpg', '$2y$10$0/7YeP66Nx8BuT3IzBxjgeiSWJl.4MIj6Orfx8N0IRGN5AJPIGVNq'),
(2, 'LOH KEAN HENG', 'hooihoon70@gmail.com', '016-4873356', 'Paediatric Medicine & Neonatology', 'MD (Mal), MRCP (UK), M Med (Paeds) (Mal)', 'doctor3.jpg', '$2y$10$PYgRt2VUQ2ajlrlcv1Z8oOyIo48SECNKnNnEkb9R1TyTOFSZtyiqy'),
(4, 'AINA BT OTHMAN', 'lamyongqin@outlook.com', '016-5117996', 'Paediatric Medicine', 'MD (Taiwan)', 'doctor2.jpg', '$2y$10$mxz.i3s5uBZt2YMLgne5zOd71VX6MeZrpJUpeU.W3A1Fg9RaO4V7G'),
(5, 'SWARAN SINGH', 'lamgp1216@gmail.com', '012-7845512', 'Paediatric Neurology', 'MBBS (UM), M Med (Paeds) (UK M’sia), Fellowship In Paediatric Neurology (Mal)', 'doctor1.jpg', '$2y$10$aVZtLpIqAYTFJoVxa9y5C.42mV6dfavWXZEX3TIMbw6Je59cpKGOi');

-- --------------------------------------------------------

--
-- Table structure for table `patient_info`
--

CREATE TABLE `patient_info` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact_number` varchar(30) NOT NULL,
  `ic_number` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patient_info`
--

INSERT INTO `patient_info` (`id`, `name`, `dob`, `email`, `contact_number`, `ic_number`, `password`) VALUES
(1, 'LAM YONG QIN', '2005-01-11', 'lamyongqin@gmail.com', '016-3679616', '050111-07-0147', '$2y$10$7Ifh4iRRWirb2knRWHjkT.ZXNSmm3Nj7xBkdnL5yGFs3On90XPL..'),
(2, 'KIVEN RAJ', '2005-02-18', 'kivenraj1299@gmail.com', '014-9087619', '050218-07-0569', '$2y$10$IK0LShpKit7.3QbsHI9KFeX9.jHSCIcqT4GBBIjxbU3HJ6AgMM2L.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_info`
--
ALTER TABLE `admin_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctor_info`
--
ALTER TABLE `doctor_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patient_info`
--
ALTER TABLE `patient_info`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_info`
--
ALTER TABLE `admin_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `doctor_info`
--
ALTER TABLE `doctor_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `patient_info`
--
ALTER TABLE `patient_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
