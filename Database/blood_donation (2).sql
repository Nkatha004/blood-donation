-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 19, 2022 at 08:11 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blood_donation`
--

-- --------------------------------------------------------

--
-- Table structure for table `blood_details`
--

CREATE TABLE `blood_details` (
  `blood_details_id` int(11) NOT NULL,
  `hospital_id` int(11) NOT NULL,
  `donor_id` int(11) NOT NULL,
  `eligibility_status` varchar(15) NOT NULL,
  `reason` varchar(200) DEFAULT NULL,
  `haemoglobin_levels` float NOT NULL,
  `donor_weight` int(3) NOT NULL,
  `blood_pressure` varchar(5) NOT NULL,
  `pulse` int(3) NOT NULL,
  `date_filled` datetime NOT NULL,
  `donation_status` varchar(10) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blood_details`
--

INSERT INTO `blood_details` (`blood_details_id`, `hospital_id`, `donor_id`, `eligibility_status`, `reason`, `haemoglobin_levels`, `donor_weight`, `blood_pressure`, `pulse`, `date_filled`, `donation_status`) VALUES
(6, 1, 1, 'not-eligible', 'underweight', 89, 56, '76', 89, '2022-07-10 09:17:52', 'pending'),
(7, 1, 2, 'eligible', NULL, 78, 56, '65', 32, '2022-07-10 09:58:54', 'complete'),
(8, 1, 2, 'eligible', NULL, 98, 56, '87', 54, '2022-07-10 11:40:53', 'complete'),
(9, 1, 1, 'eligible', NULL, 98, 67, '21', 78, '2022-07-11 10:06:56', 'complete'),
(11, 1, 1, 'eligible', NULL, 89, 67, '56', 45, '2022-07-13 02:56:31', 'complete'),
(12, 2, 4, 'eligible', NULL, 14, 65, '90/60', 70, '2022-07-17 09:17:42', 'complete'),
(13, 2, 4, 'eligible', NULL, 15, 78, '92/64', 80, '2022-07-17 09:42:22', 'complete'),
(14, 2, 6, 'eligible', NULL, 15, 53, '90/60', 80, '2022-07-19 04:56:40', 'pending'),
(15, 2, 4, 'eligible', NULL, 16, 56, '90/60', 80, '2022-07-19 07:22:46', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `blood_drive`
--

CREATE TABLE `blood_drive` (
  `blood_drive_id` int(11) NOT NULL,
  `blood_drive_name` varchar(150) NOT NULL,
  `blood_drive_location` varchar(100) NOT NULL,
  `date_from` datetime NOT NULL,
  `date_to` datetime NOT NULL,
  `hospital_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blood_drive`
--

INSERT INTO `blood_drive` (`blood_drive_id`, `blood_drive_name`, `blood_drive_location`, `date_from`, `date_to`, `hospital_id`) VALUES
(2, 'Meridian Drive', 'Uhuru Gardens', '2022-07-19 08:30:00', '2022-07-26 18:00:00', 2),
(3, 'Drive 1', 'Uhuru gardens', '2022-07-20 08:00:00', '2022-07-22 14:50:00', 2),
(4, 'Nairobi West Drive', 'Nyayo Stadium', '2022-07-22 08:00:00', '2022-07-26 18:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `donation`
--

CREATE TABLE `donation` (
  `donation_id` int(11) NOT NULL,
  `donation_date` date NOT NULL,
  `blood_details_id` int(11) NOT NULL,
  `hospital_id` int(11) NOT NULL,
  `results_status` varchar(15) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `donation`
--

INSERT INTO `donation` (`donation_id`, `donation_date`, `blood_details_id`, `hospital_id`, `results_status`) VALUES
(1, '2022-07-10', 6, 1, 'pending'),
(2, '2022-07-07', 7, 1, 'released'),
(3, '2022-07-10', 8, 1, 'released'),
(4, '2022-04-12', 9, 1, 'released'),
(5, '2022-07-13', 11, 1, 'released'),
(6, '2022-07-17', 12, 2, 'released'),
(7, '2022-07-17', 13, 2, 'released'),
(8, '2022-01-11', 14, 2, 'released');

-- --------------------------------------------------------

--
-- Table structure for table `donor`
--

CREATE TABLE `donor` (
  `donor_id` int(11) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `donor_email` varchar(40) NOT NULL,
  `donor_password` varchar(225) NOT NULL,
  `donor_phoneNo` int(10) NOT NULL,
  `gender` enum('male','female') NOT NULL,
  `date_of_birth` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `donor`
--

INSERT INTO `donor` (`donor_id`, `first_name`, `last_name`, `donor_email`, `donor_password`, `donor_phoneNo`, `gender`, `date_of_birth`) VALUES
(1, 'Christine', 'Mukami', 'mukami@gmail.com', '$2y$10$q8lCfp/JBKoO.DRGCaZ7N.ynCfFTH1nBLFUq5vdMdu/9.0HsHrHI6', 711223344, 'female', '1985-03-12'),
(2, 'Salem', 'Weru', 'samel@gmail.com', '$2y$10$H8T0YG6Il4r6tZWso/DBpuL48wlhD6K41vsuiQj1CG29RnGAgugt.', 711432432, 'male', '1990-09-09'),
(3, 'Solomon', 'Mkubwa', 'mk@gmail.com', '$2y$10$gRJHTckc8S.jgCKvBIN81OQBKtQlTOaoVj3dNoFpO5JEfOx/OlEhW', 722334432, 'male', '1993-02-28'),
(4, 'Susan', 'Gitau', 'sgitau@gmail.com', '$2y$10$UcRBYelykVguwAl4ckxCPe3aX0pom1PIIvCnLfqNoOZBUoZR1AJHa', 711457623, 'female', '2000-03-08'),
(5, 'Lucy ', 'Karimi', 'lucykar@gmail.com', '$2y$10$zuXvSzbOSiCprAkZaUEjreDGKyE9ZbuXTZwK1S/O7YZDd6YAmYe/6', 765478965, 'female', '1984-11-27'),
(6, 'Maria', 'Muthiore', 'mmuthiore@gmail.com', '$2y$10$.YV5QKXwH7lupZ9C.OyNl.k9gpfTJ/0J1kmf6dQeNq3bLqvU.Hj6e', 732543165, 'female', '1998-11-08'),
(7, 'Maria', 'Njambi', 'mmuthiore@outlook.com', '$2y$10$uNnRj0YKxLeH92yZAZKafeoxgvqmhoTAs8vstJ6oyBm8TPV39Kvbe', 724537542, 'female', '2004-04-08'),
(8, 'Joy', 'Nkatha', 'nkathajoy36@gmail.com', '$2y$10$/Y52dX8Azkf1RDs03BJaGe2Z2XqjeViqxXRXRTYpjkNaxqnnFmXnm', 765421426, 'female', '1997-05-11');

-- --------------------------------------------------------

--
-- Table structure for table `drive_booking`
--

CREATE TABLE `drive_booking` (
  `drive_booking_id` int(11) NOT NULL,
  `donor_id` int(11) DEFAULT NULL,
  `blood_drive_id` int(11) DEFAULT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `drive_booking`
--

INSERT INTO `drive_booking` (`drive_booking_id`, `donor_id`, `blood_drive_id`, `status`) VALUES
(4, 3, 2, 'seen'),
(8, 2, 4, 'pending'),
(9, 4, 3, 'seen'),
(11, 6, 3, 'seen'),
(12, 4, 2, 'seen');

-- --------------------------------------------------------

--
-- Table structure for table `hospital`
--

CREATE TABLE `hospital` (
  `hospital_id` int(11) NOT NULL,
  `hospital_name` varchar(100) NOT NULL,
  `hospital_email` varchar(50) NOT NULL,
  `hospital_password` varchar(225) NOT NULL,
  `hospital_phoneNo` int(10) NOT NULL,
  `hospital_location` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hospital`
--

INSERT INTO `hospital` (`hospital_id`, `hospital_name`, `hospital_email`, `hospital_password`, `hospital_phoneNo`, `hospital_location`) VALUES
(1, 'Nairobi West', 'nairobiwest@hospital.com', '$2y$10$NjVRS5AAfKsa9AN57gxqgOOX997zsFSd41zMQRmbTUUqm7W/qeQCy', 2020192492, 'Gandhi Avenue, Nairobi'),
(2, 'Equator Meridian', 'meridian@hospital.com', '$2y$10$Ed1fkpm2q7SNgNw/rOnXu.Hz0ZL.Sjf4RCLxUYVvPQ42xbq0CBbUi', 2020908980, 'Bukani Road, Nairobi');

-- --------------------------------------------------------

--
-- Table structure for table `hospital_appointment`
--

CREATE TABLE `hospital_appointment` (
  `appointment_id` int(11) NOT NULL,
  `donor_id` int(11) NOT NULL,
  `hospital_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `status` varchar(15) NOT NULL DEFAULT 'not yet seen',
  `blood_details_status` varchar(15) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hospital_appointment`
--

INSERT INTO `hospital_appointment` (`appointment_id`, `donor_id`, `hospital_id`, `date`, `time`, `status`, `blood_details_status`) VALUES
(1, 1, 1, '2022-07-26', '12:30:00', 'not yet seen', 'pending'),
(7, 2, 1, '2022-06-30', '11:40:00', 'seen', 'complete'),
(8, 3, 1, '2022-06-28', '15:00:00', 'not yet seen', 'pending'),
(10, 1, 2, '2022-07-01', '13:00:00', 'seen', 'complete'),
(11, 2, 1, '2022-07-28', '14:00:00', 'not yet seen', 'pending'),
(12, 4, 2, '2022-07-19', '15:15:00', 'seen', 'complete');

-- --------------------------------------------------------

--
-- Table structure for table `test_results`
--

CREATE TABLE `test_results` (
  `results_id` int(11) NOT NULL,
  `donation_id` int(11) NOT NULL,
  `blood_group` varchar(10) NOT NULL,
  `Rh_type` varchar(10) NOT NULL,
  `hepatitis_B` varchar(10) NOT NULL,
  `hepatitis_C` varchar(10) NOT NULL,
  `HIV` varchar(10) NOT NULL,
  `Syphilis` varchar(10) NOT NULL,
  `bacterial_contamination` varchar(10) NOT NULL,
  `t_lymphotropic_virus` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `test_results`
--

INSERT INTO `test_results` (`results_id`, `donation_id`, `blood_group`, `Rh_type`, `hepatitis_B`, `hepatitis_C`, `HIV`, `Syphilis`, `bacterial_contamination`, `t_lymphotropic_virus`) VALUES
(3, 2, 'O Negative', 'negative', 'negative', 'negative', 'negative', 'negative', 'negative', 'negative'),
(4, 4, 'A Negative', 'negative', 'negative', 'negative', 'negative', 'negative', 'negative', 'negative'),
(7, 5, 'O Positive', 'positive', 'negative', 'negative', 'negative', 'negative', 'negative', 'negative'),
(8, 6, 'B Negative', 'negative', 'negative', 'negative', 'negative', 'negative', 'negative', 'negative'),
(9, 6, 'B Negative', 'negative', 'negative', 'negative', 'negative', 'negative', 'negative', 'negative'),
(10, 6, 'B Negative', 'negative', 'negative', 'negative', 'negative', 'negative', 'negative', 'negative'),
(11, 7, 'O Negative', 'negative', 'negative', 'negative', 'negative', 'negative', 'positive', 'negative'),
(12, 7, 'O Negative', 'negative', 'negative', 'negative', 'negative', 'negative', 'positive', 'negative'),
(13, 8, 'B Negative', 'negative', 'negative', 'negative', 'negative', 'negative', 'negative', 'negative'),
(14, 8, 'A Positive', 'negative', 'negative', 'negative', 'negative', 'negative', 'negative', 'negative');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blood_details`
--
ALTER TABLE `blood_details`
  ADD PRIMARY KEY (`blood_details_id`),
  ADD KEY `hospital_const` (`hospital_id`),
  ADD KEY `donor_id_const` (`donor_id`);

--
-- Indexes for table `blood_drive`
--
ALTER TABLE `blood_drive`
  ADD PRIMARY KEY (`blood_drive_id`),
  ADD KEY `hospital_id` (`hospital_id`);

--
-- Indexes for table `donation`
--
ALTER TABLE `donation`
  ADD PRIMARY KEY (`donation_id`),
  ADD KEY `hospital` (`hospital_id`),
  ADD KEY `blood_det` (`blood_details_id`);

--
-- Indexes for table `donor`
--
ALTER TABLE `donor`
  ADD PRIMARY KEY (`donor_id`);

--
-- Indexes for table `drive_booking`
--
ALTER TABLE `drive_booking`
  ADD PRIMARY KEY (`drive_booking_id`),
  ADD KEY `donor_id` (`donor_id`),
  ADD KEY `blood_drive_id` (`blood_drive_id`);

--
-- Indexes for table `hospital`
--
ALTER TABLE `hospital`
  ADD PRIMARY KEY (`hospital_id`);

--
-- Indexes for table `hospital_appointment`
--
ALTER TABLE `hospital_appointment`
  ADD PRIMARY KEY (`appointment_id`),
  ADD KEY `donor_id` (`donor_id`),
  ADD KEY `hospital_id` (`hospital_id`);

--
-- Indexes for table `test_results`
--
ALTER TABLE `test_results`
  ADD PRIMARY KEY (`results_id`),
  ADD KEY `donation` (`donation_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blood_details`
--
ALTER TABLE `blood_details`
  MODIFY `blood_details_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `blood_drive`
--
ALTER TABLE `blood_drive`
  MODIFY `blood_drive_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `donation`
--
ALTER TABLE `donation`
  MODIFY `donation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `donor`
--
ALTER TABLE `donor`
  MODIFY `donor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `drive_booking`
--
ALTER TABLE `drive_booking`
  MODIFY `drive_booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `hospital`
--
ALTER TABLE `hospital`
  MODIFY `hospital_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `hospital_appointment`
--
ALTER TABLE `hospital_appointment`
  MODIFY `appointment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `test_results`
--
ALTER TABLE `test_results`
  MODIFY `results_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blood_details`
--
ALTER TABLE `blood_details`
  ADD CONSTRAINT `donor_id_const` FOREIGN KEY (`donor_id`) REFERENCES `donor` (`donor_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `hospital_const` FOREIGN KEY (`hospital_id`) REFERENCES `hospital` (`hospital_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `blood_drive`
--
ALTER TABLE `blood_drive`
  ADD CONSTRAINT `blood_drive_ibfk_1` FOREIGN KEY (`hospital_id`) REFERENCES `hospital` (`hospital_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `donation`
--
ALTER TABLE `donation`
  ADD CONSTRAINT `blood_det` FOREIGN KEY (`blood_details_id`) REFERENCES `blood_details` (`blood_details_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `hospital` FOREIGN KEY (`hospital_id`) REFERENCES `hospital` (`hospital_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `drive_booking`
--
ALTER TABLE `drive_booking`
  ADD CONSTRAINT `drive_booking_ibfk_1` FOREIGN KEY (`donor_id`) REFERENCES `donor` (`donor_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `drive_booking_ibfk_2` FOREIGN KEY (`blood_drive_id`) REFERENCES `blood_drive` (`blood_drive_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `hospital_appointment`
--
ALTER TABLE `hospital_appointment`
  ADD CONSTRAINT `donor_id` FOREIGN KEY (`donor_id`) REFERENCES `donor` (`donor_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `hospital_id` FOREIGN KEY (`hospital_id`) REFERENCES `hospital` (`hospital_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `test_results`
--
ALTER TABLE `test_results`
  ADD CONSTRAINT `donation` FOREIGN KEY (`donation_id`) REFERENCES `donation` (`donation_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
