-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 04, 2024 at 03:14 AM
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
(1, 'admin01', 'scpg2300128@segi4u.my', '018-7549963', '$2y$10$GbRulqMPS9tYL/8zlc2wTeNTvDvG3taW4WEQCGokaPuTvmwnUg/pm');

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
(5, '2024-12-14', '2:30p.m. - 3:00p.m.', 10, 4, 'Approved', '1'),
(6, '2024-12-03', '2:00p.m. - 2:30p.m.', 10, 3, 'Approved', '0'),
(7, '2024-12-14', '11:30a.m. - 12:00p.m.', 10, 1, 'Pending', '0'),
(8, '2024-12-05', '11:30a.m. - 12:00p.m.', 10, 3, 'Pending', '0'),
(9, '2024-12-06', '9:30a.m. - 10:00a.m.', 10, 2, 'Pending', '0'),
(10, '2024-12-20', '9:00a.m. - 9:30a.m.', 10, 1, 'Pending', '0'),
(11, '2024-12-25', '9:30a.m. - 10:00a.m.', 10, 2, 'Pending', '0'),
(12, '2024-12-14', '9:30a.m. - 10:00a.m.', 10, 2, 'Pending', '0'),
(13, '2024-12-06', '9:00a.m. - 9:30a.m.', 10, 1, 'Pending', '0'),
(14, '2024-12-05', '9:30a.m. - 10:00a.m.', 10, 1, 'Pending', '0'),
(15, '2024-12-03', '9:00a.m. - 9:30a.m.', 10, 2, 'Pending', '0'),
(24, '2024-12-13', '11:30a.m. - 12:00p.m.', 10, 2, 'Pending', '0'),
(25, '2024-12-13', '2:30p.m. - 3:00p.m.', 10, 4, 'Approved', '1'),
(27, '2024-12-21', '9:30a.m. - 10:00a.m.', 10, 4, 'Approved', '0'),
(29, '2024-12-07', '11:30a.m. - 12:00p.m.', 10, 2, 'Pending', '0');

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
(1, 'TOH, HANNAH', 'hooihoon70@gmail.com', '014-2316694', 'Paediatric Medicine', 'MBBS (Bombay), MRCP (UK), FRCP (Glasg)', 'doctor4.jpg', '$2y$10$YzX/WJpFHtmc6PbFbpsSs.L.d3x20gZS0.4HQdxCij0FbQxYx.YZe'),
(2, 'LOH KEAN HENG', 'kivenraj1299@gmail.com', '016-9651123', 'Paediatric CardiologyProfessional', 'MD (USM), MRCPCH (UK), Fellowship in Paediatric Cardiology (M\'sia & Aus)', 'doctor3.jpg', 'lohkeanheng\r\n'),
(3, 'AINA BT OTHMAN', 'pengseonglam@gmail.com', '015-8941287', 'Paediatric Medicine & Neonatology', 'MD (Mal), MRCP (UK), M Med (Paeds) (Mal)', 'doctor2.jpg', '$2y$10$eT9ZSZpt101kt9zgqBu1n.kkfRBggDdXtkuRSda.SG01tQ2l8Ocqu'),
(4, 'SWARAN SINGH', 'hooihoon70@outlook.com', '012-8123364', 'Paediatric Neurology', 'MBBS (UM), M Med (Paeds) (UK M’sia), Fellowship In Paediatric Neurology (Mal)', 'doctor1.jpg', '$2y$10$YjXrbD8lu2oBbGYrNg3l9O9ry5nDXUFdMKhB90Twu9a3wsCbbc48y'),
(6, 'TAN, LOUIS', 'minkailee7637@gmail.com', '012-8412215', 'Paediatric Medicine', 'MBBS (Manipal), MRCPCH (UK), M Med (Paeds) (NUS S\'pore), GDip.FP Dermatology (NUS S\'pore)', 'doctor5.jpg', 'tanlouis');

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
(10, 'LAM YONG QIN', '2024-11-15', 'lamyongqin@gmail.com', '016-3679616', '050111-07-0147', '$2y$10$0toeli53.1JYo/IKvkh/sevZZhmeA0tNAqlaZZVNWnu1hi6i/OrHG');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `doctor_info`
--
ALTER TABLE `doctor_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `patient_info`
--
ALTER TABLE `patient_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
