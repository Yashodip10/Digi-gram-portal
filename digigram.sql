-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307
-- Generation Time: May 17, 2025 at 06:37 AM
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
-- Database: `digigram`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `sr` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `document_path` varchar(255) DEFAULT NULL,
  `document_type` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`sr`, `username`, `password`, `mobile`, `email`, `image_path`, `document_path`, `document_type`) VALUES
(1, 'yashodip', 'Admin@123', '7822996982', 'yashodipp10@gmail.com', NULL, NULL, NULL),
(3, 'vijay', 'Admin@123', '7620435349', 'vijaygpatil03062003@gmail.com', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `birth_certificates`
--

CREATE TABLE `birth_certificates` (
  `sr` int(11) NOT NULL,
  `name_of_child` varchar(255) DEFAULT NULL,
  `sex` enum('male','female','other') DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `place_of_birth` varchar(255) DEFAULT NULL,
  `village_of_birth` varchar(255) NOT NULL,
  `birth_tal` varchar(255) NOT NULL,
  `birth_dist` varchar(255) NOT NULL,
  `name_of_mother` varchar(255) DEFAULT NULL,
  `name_of_father` varchar(255) DEFAULT NULL,
  `father_aadhar_no` varchar(255) NOT NULL,
  `mother_aadhar_no` varchar(255) NOT NULL,
  `permanent_address` text DEFAULT NULL,
  `pin_code` int(6) NOT NULL,
  `mobile_no` varchar(12) NOT NULL,
  `remarks` text DEFAULT NULL,
  `issue_date` date DEFAULT NULL,
  `status` enum('pending','approved','rejected') DEFAULT 'pending',
  `pdf_file` varchar(255) DEFAULT NULL,
  `user_id` varchar(255) NOT NULL,
  `token_no` varchar(255) NOT NULL,
  `application_form` varchar(255) DEFAULT NULL,
  `requested_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `birth_certificates`
--

INSERT INTO `birth_certificates` (`sr`, `name_of_child`, `sex`, `date_of_birth`, `place_of_birth`, `village_of_birth`, `birth_tal`, `birth_dist`, `name_of_mother`, `name_of_father`, `father_aadhar_no`, `mother_aadhar_no`, `permanent_address`, `pin_code`, `mobile_no`, `remarks`, `issue_date`, `status`, `pdf_file`, `user_id`, `token_no`, `application_form`, `requested_date`) VALUES
(1, 'name of child', 'male', '2004-04-02', 'lon pirache hospital', 'Amalner', 'bhadgaon', 'jalgaon', '--------------------', '__________________', '1234567890', '8767637812', 'Ap shirsale tal AMALNER dist jalgoan\r\nShirsale', 425401, '7822996982', NULL, '2025-03-19', 'approved', 'C:/xampp/htdocs/Digi-gram/certificate/genrated_certificates/birth_certificates/birth_certificate_Birth1.pdf', 'yashodip_10', 'Birth1', 'C:/xampp/htdocs/Digi-gram/certificate/generated_forms/birth_form/birth_certificate_Birth1.pdf', '2025-03-19 21:56:49'),
(2, 'Yashodip Patil', 'male', '2003-11-30', 'bornar hospital', 'Amalner', 'amalner', 'jalgaon', '___________________', '-------------------', '458476473757', '8767637812', 'at post lon piracge tal. bhadgaon dist jalgaon', 417672, '717298987921', NULL, NULL, 'rejected', NULL, 'yashodip_10', 'Birth2', 'C:/xampp/htdocs/Digi-gram/certificate/generated_forms/birth_form/birth_certificate_Birth2.pdf', '2025-03-19 21:59:12'),
(3, 'abc pqr xyz', 'male', '2022-10-31', 'shirsale', 'Jalgaon', 'jalgaon', 'jalgaon', '___________________', 'xyzxyzyxz', '13453165514', '56465146', 'at post jalgaon', 762762, '898120108211', NULL, NULL, 'pending', NULL, 'yashodip_10', 'Birth3', 'C:/xampp/htdocs/Digi-gram/certificate/generated_forms/birth_form/birth_certificate_Birth3.pdf', '2025-03-19 22:01:32'),
(4, 'name of child2', 'male', '2023-12-31', 'lon pirache hospital', 'Jalgaon', 'amalner', 'jalgaon', '____________________', '____________________', '1345316551465164', '798797897981', 'at post jalgaon', 979798, '8797971098', NULL, NULL, 'pending', NULL, 'yashodip_10', 'Birth4', 'C:/xampp/htdocs/Digi-gram/certificate/generated_forms/birth_form/birth_certificate_Birth4.pdf', '2025-03-19 22:03:16'),
(5, 'name of child3', 'male', '2022-11-30', 'shirsale', 'Amalner', 'bhadgaon', 'jalgaon', '++++++++++++', '*******************', '808409830803', '908098349320', 'mumbai mumbai', 716287, '87299080218', NULL, NULL, 'pending', NULL, 'yashodip_10', 'Birth5', 'C:/xampp/htdocs/Digi-gram/certificate/generated_forms/birth_form/birth_certificate_Birth5.pdf', '2025-03-19 22:05:15'),
(7, 'patil ram', 'male', '2020-04-22', 'lon pirache hospital', 'Amalner', 'amalner', 'jalgaon', '__________', '_________', '458476473757', '45385739988', 'Old postal colony near radha krushna mandir\r\nRamanand Nagar', 425001, '07822996982', NULL, '2025-03-20', 'approved', 'C:/xampp/htdocs/Digi-gram/certificate/genrated_certificates/birth_certificates/birth_certificate_Birth6.pdf', 'yashodip_10', 'Birth6', 'C:/xampp/htdocs/Digi-gram/certificate/generated_forms/birth_form/birth_certificate_Birth6.pdf', '2025-03-20 07:29:35'),
(8, 'Yashodip Patil', 'male', '2004-09-22', 'shirsale', 'Amalner', 'amalner', 'jalgaon', '________', '________', '458476473757', '45385739988', 'Patil galli shirsale Bk', 425401, '07822996982', NULL, '2025-03-20', 'approved', 'C:/xampp/htdocs/Digi-gram/certificate/genrated_certificates/birth_certificates/birth_certificate_Birth7.pdf', 'yashodip', 'Birth7', 'C:/xampp/htdocs/Digi-gram/certificate/generated_forms/birth_form/birth_certificate_Birth7.pdf', '2025-03-20 09:15:14');

-- --------------------------------------------------------

--
-- Table structure for table `death_certificates`
--

CREATE TABLE `death_certificates` (
  `sr` int(11) NOT NULL,
  `token_no` varchar(255) NOT NULL,
  `user_id` varchar(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `gender` enum('Male','Female','Other') NOT NULL,
  `date_of_death` date NOT NULL,
  `place_of_death` varchar(255) NOT NULL,
  `father_or_husband_name` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `address_at_death` text NOT NULL,
  `permanent_address` text NOT NULL,
  `registration_no` varchar(50) DEFAULT NULL,
  `registration_date` date DEFAULT NULL,
  `remarks` text DEFAULT NULL,
  `date_of_issue` date DEFAULT NULL,
  `status` enum('pending','approved','rejected') DEFAULT 'pending',
  `application_form` varchar(255) NOT NULL,
  `requested_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `pdf_file_path` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `death_certificates`
--

INSERT INTO `death_certificates` (`sr`, `token_no`, `user_id`, `name`, `gender`, `date_of_death`, `place_of_death`, `father_or_husband_name`, `age`, `address_at_death`, `permanent_address`, `registration_no`, `registration_date`, `remarks`, `date_of_issue`, `status`, `application_form`, `requested_date`, `pdf_file_path`) VALUES
(1, 'Death1', 'yashodip_10', 'xvz', 'Male', '2007-03-23', 'pune', '________________________', 30, 'xvz 03:45', 'jalgaon ', 'regi50', '2008-05-31', 'NILL', '2025-03-19', 'approved', 'C:/xampp/htdocs/Digi-gram/certificate/generated_forms/death_form/death_certificate_Death1.pdf', '2025-03-19 15:12:52', 'C:/xampp/htdocs/Digi-gram/certificate/genrated_certificates/death_certificates/death_certificate_Death1.pdf'),
(2, 'Death2', 'yashodip_10', 'Death person', 'Male', '2023-02-01', 'pachora', '________________________', 50, '______________________', '_____________________', 'regi51', '2023-02-01', 'NILL', NULL, 'pending', 'C:/xampp/htdocs/Digi-gram/certificate/generated_forms/death_form/death_certificate_Death2.pdf', '2025-03-19 16:10:30', NULL),
(3, 'Death3', 'yashodip_10', 'death person name1', 'Male', '2024-01-01', 'pune', 'xyzzzz', 60, 'abcd', 'pqrst', 'regi53', '2022-01-01', 'NILL', NULL, 'rejected', 'C:/xampp/htdocs/Digi-gram/certificate/generated_forms/death_form/death_certificate_Death3.pdf', '2025-03-19 16:12:35', NULL),
(4, 'Death4', 'yashodip_10', 'death person name2', 'Male', '2025-03-12', 'mumbai', '________________________', 30, '--------------------------', '_________________________', 'regi54', '2024-12-31', 'NILL', NULL, 'pending', 'C:/xampp/htdocs/Digi-gram/certificate/generated_forms/death_form/death_certificate_Death4.pdf', '2025-03-19 16:14:08', NULL),
(5, 'Death5', 'yashodip_10', 'death person name3', 'Male', '2024-01-01', 'dehli', 'xyyyzzzz', 70, '______________________________-', '______________-____-----', 'regi56', '2024-01-01', 'NILL', NULL, 'pending', 'C:/xampp/htdocs/Digi-gram/certificate/generated_forms/death_form/death_certificate_Death5.pdf', '2025-03-19 16:15:22', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `document_requests`
--

CREATE TABLE `document_requests` (
  `sr` int(11) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `service_name` varchar(255) NOT NULL,
  `token_no` varchar(225) NOT NULL,
  `requested_date` datetime NOT NULL,
  `status` enum('pending','approved','rejected') DEFAULT 'pending',
  `pdf_file_path` varchar(255) DEFAULT NULL,
  `application_form` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `document_requests`
--

INSERT INTO `document_requests` (`sr`, `user_id`, `service_name`, `token_no`, `requested_date`, `status`, `pdf_file_path`, `application_form`) VALUES
(1, 'yashodip_10', 'Residential cerificate Request', 'Residential1', '2025-03-19 20:01:03', 'approved', 'C:/xampp/htdocs/Digi-gram/certificate/genrated_certificates/residential_certificates/residential_certificate_Residential1.pdf', 'C:/xampp/htdocs/Digi-gram/certificate/generated_forms/residential_forms/residential_form_Residential1.pdf'),
(2, 'yashodip_10', 'Residential cerificate Request', 'Residential2', '2025-03-19 20:03:38', 'rejected', NULL, 'C:/xampp/htdocs/Digi-gram/certificate/generated_forms/residential_forms/residential_form_Residential2.pdf'),
(3, 'yashodip_10', 'Residential cerificate Request', 'Residential3', '2025-03-19 20:05:59', 'approved', 'C:/xampp/htdocs/Digi-gram/certificate/genrated_certificates/residential_certificates/residential_certificate_Residential3.pdf', 'C:/xampp/htdocs/Digi-gram/certificate/generated_forms/residential_forms/residential_form_Residential3.pdf'),
(4, 'yashodip_10', 'Residential cerificate Request', 'Residential4', '2025-03-19 20:07:48', 'approved', 'C:/xampp/htdocs/Digi-gram/certificate/genrated_certificates/residential_certificates/residential_certificate_Residential4.pdf', 'C:/xampp/htdocs/Digi-gram/certificate/generated_forms/residential_forms/residential_form_Residential4.pdf'),
(5, 'yashodip_10', 'Residential cerificate Request', 'Residential5', '2025-03-19 20:10:19', 'approved', 'C:/xampp/htdocs/Digi-gram/certificate/genrated_certificates/residential_certificates/residential_certificate_Residential5.pdf', 'C:/xampp/htdocs/Digi-gram/certificate/generated_forms/residential_forms/residential_form_Residential5.pdf'),
(6, 'yashodip_10', 'No Objection Certificate Request', 'noc1', '2025-03-19 20:12:19', 'pending', NULL, 'C:/xampp/htdocs/Digi-gram/certificate/generated_forms/noobjection_form/noc_certificate_noc1.pdf'),
(7, 'yashodip_10', 'No Objection Certificate Request', 'noc2', '2025-03-19 20:13:56', 'rejected', NULL, 'C:/xampp/htdocs/Digi-gram/certificate/generated_forms/noobjection_form/noc_certificate_noc2.pdf'),
(8, 'yashodip_10', 'No Objection Certificate Request', 'noc3', '2025-03-19 20:24:46', 'pending', NULL, 'C:/xampp/htdocs/Digi-gram/certificate/generated_forms/noobjection_form/noc_certificate_noc3.pdf'),
(9, 'yashodip_10', 'No Objection Certificate Request', 'noc4', '2025-03-19 20:28:09', 'pending', NULL, 'C:/xampp/htdocs/Digi-gram/certificate/generated_forms/noobjection_form/noc_certificate_noc4.pdf'),
(10, 'yashodip_10', 'No Objection Certificate Request', 'noc5', '2025-03-19 20:30:12', 'pending', NULL, 'C:/xampp/htdocs/Digi-gram/certificate/generated_forms/noobjection_form/noc_certificate_noc5.pdf'),
(11, 'yashodip_10', 'Senior Citizen Certificate Request', 'Senior_citizen1', '2025-03-19 20:32:37', 'approved', 'C:/xampp/htdocs/Digi-gram/certificate/genrated_certificates/seniar_citizen_certificates/seniar_citizen_certificates_Senior_citizen1.pdf', 'C:/xampp/htdocs/Digi-gram/certificate/generated_forms/seniar_citizen_form/senior_citizen_Senior_citizen1.pdf'),
(12, 'yashodip_10', 'Senior Citizen Certificate Request', 'Senior_citizen2', '2025-03-19 20:34:17', 'rejected', NULL, 'C:/xampp/htdocs/Digi-gram/certificate/generated_forms/seniar_citizen_form/senior_citizen_Senior_citizen2.pdf'),
(13, 'yashodip_10', 'Senior Citizen Certificate Request', 'Senior_citizen3', '2025-03-19 20:36:49', 'pending', NULL, 'C:/xampp/htdocs/Digi-gram/certificate/generated_forms/seniar_citizen_form/senior_citizen_Senior_citizen3.pdf'),
(14, 'yashodip_10', 'Senior Citizen Certificate Request', 'Senior_citizen4', '2025-03-19 20:38:19', 'pending', NULL, 'C:/xampp/htdocs/Digi-gram/certificate/generated_forms/seniar_citizen_form/senior_citizen_Senior_citizen4.pdf'),
(15, 'yashodip_10', 'Senior Citizen Certificate Request', 'Senior_citizen5', '2025-03-19 20:39:42', 'pending', NULL, 'C:/xampp/htdocs/Digi-gram/certificate/generated_forms/seniar_citizen_form/senior_citizen_Senior_citizen5.pdf'),
(16, 'yashodip_10', 'Senior Citizen Certificate Request', 'Senior_citizen6', '2025-03-19 20:39:43', 'pending', NULL, 'C:/xampp/htdocs/Digi-gram/certificate/generated_forms/seniar_citizen_form/senior_citizen_Senior_citizen6.pdf'),
(17, 'yashodip_10', 'Death Certificate Request', 'Death1', '2025-03-19 20:42:52', 'approved', 'C:/xampp/htdocs/Digi-gram/certificate/genrated_certificates/death_certificates/death_certificate_Death1.pdf', 'C:/xampp/htdocs/Digi-gram/certificate/generated_forms/death_form/death_certificate_Death1.pdf'),
(18, 'yashodip_10', 'Death Certificate Request', 'Death2', '2025-03-19 21:40:30', 'pending', NULL, 'C:/xampp/htdocs/Digi-gram/certificate/generated_forms/death_form/death_certificate_Death2.pdf'),
(19, 'yashodip_10', 'Death Certificate Request', 'Death3', '2025-03-19 21:42:35', 'rejected', NULL, 'C:/xampp/htdocs/Digi-gram/certificate/generated_forms/death_form/death_certificate_Death3.pdf'),
(20, 'yashodip_10', 'Death Certificate Request', 'Death4', '2025-03-19 21:44:08', 'pending', NULL, 'C:/xampp/htdocs/Digi-gram/certificate/generated_forms/death_form/death_certificate_Death4.pdf'),
(21, 'yashodip_10', 'Death Certificate Request', 'Death5', '2025-03-19 21:45:22', 'pending', NULL, 'C:/xampp/htdocs/Digi-gram/certificate/generated_forms/death_form/death_certificate_Death5.pdf'),
(22, 'yashodip_10', 'Marriage Certificate Request', 'Marriage1', '2025-03-19 21:48:39', 'approved', 'C:/xampp/htdocs/Digi-gram/certificate/genrated_certificates/marriage_certificates/marriage_certificate_Marriage1.pdf', 'C:/xampp/htdocs/Digi-gram/certificate/generated_forms/marriage_forms/marriage_form_Marriage1.pdf'),
(23, 'yashodip_10', 'Marriage Certificate Request', 'Marriage2', '2025-03-19 21:50:08', 'approved', 'C:/xampp/htdocs/Digi-gram/certificate/genrated_certificates/marriage_certificates/marriage_certificate_Marriage2.pdf', 'C:/xampp/htdocs/Digi-gram/certificate/generated_forms/marriage_forms/marriage_form_Marriage2.pdf'),
(24, 'yashodip_10', 'Marriage Certificate Request', 'Marriage3', '2025-03-19 21:51:24', 'rejected', NULL, 'C:/xampp/htdocs/Digi-gram/certificate/generated_forms/marriage_forms/marriage_form_Marriage3.pdf'),
(25, 'yashodip_10', 'Marriage Certificate Request', 'Marriage4', '2025-03-19 21:53:14', 'pending', NULL, 'C:/xampp/htdocs/Digi-gram/certificate/generated_forms/marriage_forms/marriage_form_Marriage4.pdf'),
(26, 'yashodip_10', 'Marriage Certificate Request', 'Marriage5', '2025-03-19 21:54:26', 'pending', NULL, 'C:/xampp/htdocs/Digi-gram/certificate/generated_forms/marriage_forms/marriage_form_Marriage5.pdf'),
(27, 'yashodip_10', 'Birth Certificate Request', 'Birth1', '2025-03-19 21:56:49', 'approved', 'C:/xampp/htdocs/Digi-gram/certificate/genrated_certificates/birth_certificates/birth_certificate_Birth1.pdf', 'C:/xampp/htdocs/Digi-gram/certificate/generated_forms/birth_form/birth_certificate_Birth1.pdf'),
(28, 'yashodip_10', 'Birth Certificate Request', 'Birth2', '2025-03-19 21:59:12', 'rejected', NULL, 'C:/xampp/htdocs/Digi-gram/certificate/generated_forms/birth_form/birth_certificate_Birth2.pdf'),
(29, 'yashodip_10', 'Birth Certificate Request', 'Birth3', '2025-03-19 22:01:32', 'pending', NULL, 'C:/xampp/htdocs/Digi-gram/certificate/generated_forms/birth_form/birth_certificate_Birth3.pdf'),
(30, 'yashodip_10', 'Birth Certificate Request', 'Birth4', '2025-03-19 22:03:16', 'pending', NULL, 'C:/xampp/htdocs/Digi-gram/certificate/generated_forms/birth_form/birth_certificate_Birth4.pdf'),
(31, 'yashodip_10', 'Birth Certificate Request', 'Birth5', '2025-03-19 22:05:15', 'pending', NULL, 'C:/xampp/htdocs/Digi-gram/certificate/generated_forms/birth_form/birth_certificate_Birth5.pdf'),
(32, 'yashodip_10', 'Residential cerificate Request', 'Residential6', '2025-03-19 23:07:18', 'pending', NULL, 'C:/xampp/htdocs/Digi-gram/certificate/generated_forms/residential_forms/residential_form_Residential6.pdf'),
(33, 'yashodip_10', 'Residential cerificate Request', 'Residential7', '2025-03-19 23:09:06', 'pending', NULL, 'C:/xampp/htdocs/Digi-gram/certificate/generated_forms/residential_forms/residential_form_Residential7.pdf'),
(34, 'yashodip_10', 'Residential cerificate Request', 'Residential8', '2025-03-19 23:11:12', 'pending', NULL, 'C:/xampp/htdocs/Digi-gram/certificate/generated_forms/residential_forms/residential_form_Residential8.pdf'),
(35, 'yashodip_10', 'No Objection Certificate Request', 'noc6', '2025-03-19 23:14:25', 'pending', NULL, 'C:/xampp/htdocs/Digi-gram/certificate/generated_forms/noobjection_form/noc_certificate_noc6.pdf'),
(36, 'yashodip_10', 'No Objection Certificate Request', 'noc7', '2025-03-19 23:15:36', 'pending', NULL, 'C:/xampp/htdocs/Digi-gram/certificate/generated_forms/noobjection_form/noc_certificate_noc7.pdf'),
(37, 'yashodip_10', 'Birth Certificate Request', 'Birth6', '2025-03-20 07:24:11', 'approved', 'C:/xampp/htdocs/Digi-gram/certificate/genrated_certificates/birth_certificates/birth_certificate_Birth6.pdf', 'C:/xampp/htdocs/Digi-gram/certificate/generated_forms/birth_form/birth_certificate_Birth6.pdf'),
(38, 'yashodip_10', 'Birth Certificate Request', 'Birth6', '2025-03-20 07:29:35', 'approved', 'C:/xampp/htdocs/Digi-gram/certificate/genrated_certificates/birth_certificates/birth_certificate_Birth6.pdf', 'C:/xampp/htdocs/Digi-gram/certificate/generated_forms/birth_form/birth_certificate_Birth6.pdf'),
(39, 'yashodip_10', 'Marriage Certificate Request', 'Marriage6', '2025-03-20 07:32:10', 'approved', 'C:/xampp/htdocs/Digi-gram/certificate/genrated_certificates/marriage_certificates/marriage_certificate_Marriage6.pdf', 'C:/xampp/htdocs/Digi-gram/certificate/generated_forms/marriage_forms/marriage_form_Marriage6.pdf'),
(40, 'yashodip', 'Birth Certificate Request', 'Birth7', '2025-03-20 09:15:14', 'approved', 'C:/xampp/htdocs/Digi-gram/certificate/genrated_certificates/birth_certificates/birth_certificate_Birth7.pdf', 'C:/xampp/htdocs/Digi-gram/certificate/generated_forms/birth_form/birth_certificate_Birth7.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `marriage_certificates`
--

CREATE TABLE `marriage_certificates` (
  `sr` int(11) NOT NULL,
  `husband_name` varchar(255) NOT NULL,
  `husband_village` varchar(255) NOT NULL,
  `husband_tal` varchar(255) NOT NULL,
  `husband_dist` varchar(255) NOT NULL,
  `husband_father_name` varchar(255) NOT NULL,
  `wife_name` varchar(255) NOT NULL,
  `wife_village` varchar(255) NOT NULL,
  `wife_tal` varchar(255) NOT NULL,
  `wife_dist` varchar(255) NOT NULL,
  `wife_father_name` varchar(255) NOT NULL,
  `solemnized_date` date NOT NULL,
  `place` varchar(255) NOT NULL,
  `issue_date` datetime DEFAULT NULL,
  `husband_image` varchar(255) DEFAULT NULL,
  `wife_image` varchar(255) DEFAULT NULL,
  `qr_code` varchar(255) DEFAULT NULL,
  `requested_date` datetime NOT NULL DEFAULT current_timestamp(),
  `status` enum('pending','approved','rejected') DEFAULT 'pending',
  `token_no` varchar(255) NOT NULL,
  `user_id` varchar(30) NOT NULL,
  `pdf_file_path` varchar(255) DEFAULT NULL,
  `application_form` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `marriage_certificates`
--

INSERT INTO `marriage_certificates` (`sr`, `husband_name`, `husband_village`, `husband_tal`, `husband_dist`, `husband_father_name`, `wife_name`, `wife_village`, `wife_tal`, `wife_dist`, `wife_father_name`, `solemnized_date`, `place`, `issue_date`, `husband_image`, `wife_image`, `qr_code`, `requested_date`, `status`, `token_no`, `user_id`, `pdf_file_path`, `application_form`) VALUES
(1, 'husband name', 'lon pirache', 'bhadgaon', 'jalgaon', '________________________', 'future_wife_name', 'mumbai', 'mumbai', 'mumbai', '________________________', '2024-01-31', 'jalgaon', '2025-03-19 22:33:19', '../certificate/uploads/marriage/yashodip_10/husband.jpg', '../certificate/uploads/marriage/yashodip_10/wife.jpg', NULL, '2025-03-19 21:48:39', 'approved', 'Marriage1', 'yashodip_10', 'C:/xampp/htdocs/Digi-gram/certificate/genrated_certificates/marriage_certificates/marriage_certificate_Marriage1.pdf', 'C:/xampp/htdocs/Digi-gram/certificate/generated_forms/marriage_forms/marriage_form_Marriage1.pdf'),
(2, 'husband name', 'shirsale', 'amalner', 'jalgaon', '________________________', 'future_wife_name', 'amalner', 'amalner', 'jalgaon', '________________________', '2024-12-31', 'pune', '2025-03-20 12:31:54', '../certificate/uploads/marriage/yashodip_10/husband.jpg', '../certificate/uploads/marriage/yashodip_10/wife.jpg', NULL, '2025-03-19 21:50:08', 'approved', 'Marriage2', 'yashodip_10', 'C:/xampp/htdocs/Digi-gram/certificate/genrated_certificates/marriage_certificates/marriage_certificate_Marriage2.pdf', 'C:/xampp/htdocs/Digi-gram/certificate/generated_forms/marriage_forms/marriage_form_Marriage2.pdf'),
(3, 'husband name', 'aamdade', 'amalner', 'jalgaon', '________________________', 'future_wife_name', 'mumbai', 'mumbai', 'jalgaon', '________________________', '2024-12-31', 'pune', NULL, '../certificate/uploads/marriage/yashodip_10/husband.jpg', '../certificate/uploads/marriage/yashodip_10/wife.jpg', NULL, '2025-03-19 21:51:24', 'rejected', 'Marriage3', 'yashodip_10', NULL, 'C:/xampp/htdocs/Digi-gram/certificate/generated_forms/marriage_forms/marriage_form_Marriage3.pdf'),
(4, 'husband name', 'bornar', 'bhadgaon', 'jalgaon', '________________________', 'wife_name1', 'pachora', 'pachora', 'jalgaon', '________________________', '2024-11-30', 'jalgaon', NULL, '../certificate/uploads/marriage/yashodip_10/husband.jpg', '../certificate/uploads/marriage/yashodip_10/wife.jpg', NULL, '2025-03-19 21:53:14', 'pending', 'Marriage4', 'yashodip_10', NULL, 'C:/xampp/htdocs/Digi-gram/certificate/generated_forms/marriage_forms/marriage_form_Marriage4.pdf'),
(5, 'husband name', 'lon pirache', 'bhadgaon', 'jalgaon', '________________________', 'wife_name2', 'raver', 'raver', 'jalgaon', '________________________', '2024-10-31', 'jalgaon', NULL, '../certificate/uploads/marriage/yashodip_10/husband.jpg', '../certificate/uploads/marriage/yashodip_10/wife.jpg', NULL, '2025-03-19 21:54:26', 'pending', 'Marriage5', 'yashodip_10', NULL, 'C:/xampp/htdocs/Digi-gram/certificate/generated_forms/marriage_forms/marriage_form_Marriage5.pdf'),
(6, 'husband name', 'amalner', 'amalner', 'jalgaon', '________________________', 'wife_name1', 'pune', 'pune', 'pune', '________________________', '2025-09-22', 'jalgaon', '2025-03-20 07:33:28', '../certificate/uploads/marriage/yashodip_10/husband.jpg', '../certificate/uploads/marriage/yashodip_10/wife.jpg', NULL, '2025-03-20 07:32:10', 'approved', 'Marriage6', 'yashodip_10', 'C:/xampp/htdocs/Digi-gram/certificate/genrated_certificates/marriage_certificates/marriage_certificate_Marriage6.pdf', 'C:/xampp/htdocs/Digi-gram/certificate/generated_forms/marriage_forms/marriage_form_Marriage6.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `noc_certificates`
--

CREATE TABLE `noc_certificates` (
  `sr` int(11) NOT NULL,
  `token_no` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `father_husband_name` varchar(255) NOT NULL,
  `date_of_birth` date NOT NULL,
  `gender` enum('Male','Female','Other') NOT NULL,
  `full_address` text NOT NULL,
  `village` varchar(100) NOT NULL,
  `district` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL DEFAULT 'Maharashtra',
  `pin_code` varchar(10) NOT NULL,
  `purpose` enum('Job','Business','Immigration','Loan/Property','Other') NOT NULL,
  `purpose_details` text NOT NULL,
  `identity_proof_type` enum('Aadhar Card','PAN Card','Voter ID','Passport','Ration Card') NOT NULL,
  `identity_proof_path` varchar(255) NOT NULL,
  `status` enum('pending','approved','rejected') DEFAULT 'pending',
  `request_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `issue_date` timestamp NULL DEFAULT NULL,
  `pdf_file_path` varchar(255) DEFAULT NULL,
  `application_form` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `noc_certificates`
--

INSERT INTO `noc_certificates` (`sr`, `token_no`, `user_id`, `full_name`, `father_husband_name`, `date_of_birth`, `gender`, `full_address`, `village`, `district`, `state`, `pin_code`, `purpose`, `purpose_details`, `identity_proof_type`, `identity_proof_path`, `status`, `request_date`, `issue_date`, `pdf_file_path`, `application_form`) VALUES
(1, 'noc1', 'yashodip_10', 'Yashodip Patil', '___________________________', '2007-04-09', 'Male', 'Ap shirsale tal AMALNER dist jalgoan\r\nShirsale', 'Amalner', 'jalgaon', 'Maharashtra', '425401', '', 'job interview', 'Aadhar Card', '../certificate/uploads/no-Objection/yashodip_10/idprof.jpg', 'approved', '2025-03-19 14:42:19', '2025-03-19 17:04:45', 'C:/xampp/htdocs/Digi-gram/certificate/genrated_certificates/noobjection_certificates/no-objection_certificate_noc1.pdf', 'C:/xampp/htdocs/Digi-gram/certificate/generated_forms/noobjection_form/noc_certificate_noc1.pdf'),
(2, 'noc2', 'yashodip_10', 'mayur mahajan ', '___________________________', '2009-06-04', 'Male', 'Old postal colony near radha krushna mandir\r\nRamanand Nagar', 'Jalgaon', 'jalgaon', 'Maharashtra', '425001', '', 'for buisness', 'Aadhar Card', '../certificate/uploads/no-Objection/yashodip_10/idprof.jpg', 'rejected', '2025-03-19 14:43:56', NULL, NULL, 'C:/xampp/htdocs/Digi-gram/certificate/generated_forms/noobjection_form/noc_certificate_noc2.pdf'),
(3, 'noc3', 'yashodip_10', 'mangesh mali', '___________________________', '2005-05-21', 'Male', 'Old Postal colony radha krushna mandir jalgaon near sai bhakti mess', 'Jalgaon', 'jalgaon', 'Maharashtra', '425001', '', 'for job ', 'Aadhar Card', '../certificate/uploads/no-Objection/yashodip_10/idprof.jpg', 'approved', '2025-03-19 14:54:46', '2025-03-19 17:26:30', 'C:/xampp/htdocs/Digi-gram/certificate/genrated_certificates/noobjection_certificates/no-objection_certificate_noc3.pdf', 'C:/xampp/htdocs/Digi-gram/certificate/generated_forms/noobjection_form/noc_certificate_noc3.pdf'),
(4, 'noc4', 'yashodip_10', 'iqbql qudri', '___________________________', '2003-03-23', 'Male', 'malegaon nashik  nashik', 'malegaon', 'nashik', 'Maharashtra', '425001', '', 'for business', 'Aadhar Card', '../certificate/uploads/no-Objection/yashodip_10/idprof.jpg', 'approved', '2025-03-19 14:58:09', '2025-03-19 17:28:27', 'C:/xampp/htdocs/Digi-gram/certificate/genrated_certificates/noobjection_certificates/no-objection_certificate_noc4.pdf', 'C:/xampp/htdocs/Digi-gram/certificate/generated_forms/noobjection_form/noc_certificate_noc4.pdf'),
(5, 'noc5', 'yashodip_10', 'vijay patil', '___________________________', '1955-05-31', 'Male', 'Old postal colony near radha krushna mandir\r\nRamanand Nagar', 'Jalgaon', 'jalgaon', 'Maharashtra', '425001', '', 'for business', 'Aadhar Card', '../certificate/uploads/no-Objection/yashodip_10/idprof.jpg', 'pending', '2025-03-19 15:00:12', NULL, NULL, 'C:/xampp/htdocs/Digi-gram/certificate/generated_forms/noobjection_form/noc_certificate_noc5.pdf'),
(6, 'noc6', 'yashodip_10', 'vijay patil', '__________________________', '1999-01-02', 'Male', 'jalgaon', 'jalgaon', 'jalgaon', 'Maharashtra', '414102', '', 'no objection certificate for do current job', 'Aadhar Card', '../certificate/uploads/no-Objection/yashodip_10/idprof.jpg', 'pending', '2025-03-19 17:44:25', NULL, NULL, 'C:/xampp/htdocs/Digi-gram/certificate/generated_forms/noobjection_form/noc_certificate_noc6.pdf'),
(7, 'noc7', 'yashodip_10', 'Yashodip Patil', '___________________________', '2019-06-30', 'Male', 'patil nagar jalgaon', 'Amalner', 'jalgaon', 'Maharashtra', '425401', '', 'no objection for doing business', 'Aadhar Card', '../certificate/uploads/no-Objection/yashodip_10/idprof.jpg', 'pending', '2025-03-19 17:45:36', NULL, NULL, 'C:/xampp/htdocs/Digi-gram/certificate/generated_forms/noobjection_form/noc_certificate_noc7.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `notices`
--

CREATE TABLE `notices` (
  `sr` int(10) NOT NULL,
  `notice` text NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `file_path` varchar(255) NOT NULL,
  `visible` enum('yes','no') NOT NULL DEFAULT 'yes'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notices`
--

INSERT INTO `notices` (`sr`, `notice`, `date`, `file_path`, `visible`) VALUES
(1, 'Important Announcement: Upcoming Grampanchayat meeting on [date] at [venue]. All residents are requested to attend.', '2025-03-19 20:34:44', 'C:/xampp/htdocs/Digi-gram/notice/uploads/official_notice.pdf', 'yes'),
(2, 'Office Timings Update: The Grampanchayat office will remain open from [time] to [time] on all working days.', '2025-03-19 20:38:33', 'C:/xampp/htdocs/Digi-gram/notice/uploads/official_notice.pdf', 'yes'),
(3, 'New Complaint Portal: Citizens can now submit complaints online through the Grampanchayat portal for quicker resolution.', '2025-03-19 20:39:01', 'C:/xampp/htdocs/Digi-gram/notice/uploads/official_notice.pdf', 'yes'),
(4, 'Birth/Death Certificate Processing Delay: Due to technical issues, processing of birth and death certificates may take [X] extra days.', '2025-03-19 20:39:20', 'C:/xampp/htdocs/Digi-gram/notice/uploads/official_notice.pdf', 'yes'),
(5, 'Marriage Certificate Update: Couples applying for a marriage certificate must submit all required documents before [deadline].', '2025-03-19 20:39:36', 'C:/xampp/htdocs/Digi-gram/notice/uploads/official_notice.pdf', 'yes'),
(6, 'Senior Citizen Certificate: Eligible residents above 60 years can now apply for a Senior Citizen Certificate online.', '2025-03-19 20:40:46', 'C:/xampp/htdocs/Digi-gram/notice/uploads/official_notice.pdf', 'yes'),
(7, 'Road Repair Notification: Road construction/repair work will be carried out in [location] from [start date] to [end date]. Expect traffic diversions.', '2025-03-19 20:41:03', 'C:/xampp/htdocs/Digi-gram/notice/uploads/official_notice.pdf', 'yes'),
(8, 'Water Supply Disruption: Due to maintenance, water supply will be disrupted in [area] on [date] from [time] to [time].', '2025-03-19 20:41:26', 'C:/xampp/htdocs/Digi-gram/notice/uploads/official_notice.pdf', 'yes'),
(9, 'Drainage Cleaning Schedule: The drainage system in [location] will be cleaned on [date]. Residents are requested not to dump waste in open drains.', '2025-03-19 20:41:42', 'C:/xampp/htdocs/Digi-gram/notice/uploads/official_notice.pdf', 'yes'),
(10, 'Free Health Checkup Camp: A free health checkup camp will be organized at [location] on [date]. Bring your Aadhaar card for registration.', '2025-03-19 20:42:28', 'C:/xampp/htdocs/Digi-gram/notice/uploads/official_notice.pdf', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `residential_certificates`
--

CREATE TABLE `residential_certificates` (
  `sr` int(11) NOT NULL,
  `token_no` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `grampanchayat_office` varchar(255) NOT NULL,
  `taluka` varchar(100) NOT NULL,
  `district` varchar(100) NOT NULL,
  `request_date` date NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `aadhaar_number` varchar(12) NOT NULL,
  `village` varchar(100) NOT NULL,
  `residence_taluka` varchar(100) NOT NULL,
  `residence_district` varchar(100) NOT NULL,
  `full_address` text NOT NULL,
  `pin_code` varchar(10) NOT NULL,
  `residency_status` enum('Permanent','Temporary') NOT NULL,
  `proof_document_type` varchar(50) NOT NULL,
  `proof_document_path` varchar(255) NOT NULL,
  `status` enum('Pending','Approved','Rejected') DEFAULT 'Pending',
  `issue_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `application_form` varchar(255) DEFAULT NULL,
  `pdf_file_path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `residential_certificates`
--

INSERT INTO `residential_certificates` (`sr`, `token_no`, `user_id`, `grampanchayat_office`, `taluka`, `district`, `request_date`, `full_name`, `aadhaar_number`, `village`, `residence_taluka`, `residence_district`, `full_address`, `pin_code`, `residency_status`, `proof_document_type`, `proof_document_path`, `status`, `issue_date`, `application_form`, `pdf_file_path`) VALUES
(1, 'Residential1', 'yashodip_10', 'shirsale', 'amalner', 'jalgaon', '2024-09-22', 'Yashodip Patil', '363643653763', 'shirsale', 'amalner', 'jalgaon', 'Ap shirsale tal AMALNER dist jalgoan\r\nShirsale', '425401', 'Permanent', 'Aadhar Card', '../certificate/uploads/residential/yashodip_10/document.jpg', 'Approved', '2025-03-19 17:04:33', 'C:/xampp/htdocs/Digi-gram/certificate/generated_forms/residential_forms/residential_form_Residential1.pdf', 'C:/xampp/htdocs/Digi-gram/certificate/genrated_certificates/residential_certificates/residential_certificate_Residential1.pdf'),
(2, 'Residential2', 'yashodip_10', 'lon', 'bhadgaon', 'jalgaon', '2024-07-23', 'vijay patil', '324873842662', 'lon', 'bhadgaon', 'jalgaon', 'lon pr bhadgaon tal bhadgaon dist jalgaon ', '65746282', 'Temporary', 'Aadhar Card', '../certificate/uploads/residential/yashodip_10/document.jpg', 'Rejected', '2025-03-19 14:33:38', 'C:/xampp/htdocs/Digi-gram/certificate/generated_forms/residential_forms/residential_form_Residential2.pdf', ''),
(3, 'Residential3', 'yashodip_10', 'shirsale', 'amalner', 'jalgaon', '2005-05-31', 'mangesh mali', '2453347225', 'shirsale', 'amalner', 'jalgaon', 'shirsale tal amalner dist jalgaon', '2342114', 'Temporary', 'Aadhar Card', '../certificate/uploads/residential/yashodip_10/document.jpg', 'Approved', '2025-03-19 17:23:06', 'C:/xampp/htdocs/Digi-gram/certificate/generated_forms/residential_forms/residential_form_Residential3.pdf', 'C:/xampp/htdocs/Digi-gram/certificate/genrated_certificates/residential_certificates/residential_certificate_Residential3.pdf'),
(4, 'Residential4', 'yashodip_10', 'shegaon ', 'mumbai', 'mumbai', '1992-07-23', 'sanket tayde', '234332525446', 'shegaon', 'mumbai', 'mumbai', 'shegaon mumbai mumbai', '2132315142', 'Permanent', 'Aadhar Card', '../certificate/uploads/residential/yashodip_10/document.jpg', 'Approved', '2025-03-19 17:23:39', 'C:/xampp/htdocs/Digi-gram/certificate/generated_forms/residential_forms/residential_form_Residential4.pdf', 'C:/xampp/htdocs/Digi-gram/certificate/genrated_certificates/residential_certificates/residential_certificate_Residential4.pdf'),
(5, 'Residential5', 'yashodip_10', 'dubai ', 'amalner', 'jalgaon', '1984-03-31', 'mayur mahajan', '21323225426', 'dubai', 'amalner', 'jalgaon', 'dubai amalner jalgaon', '324332443', 'Temporary', 'Aadhar Card', '../certificate/uploads/residential/yashodip_10/document.jpg', 'Approved', '2025-03-19 17:24:43', 'C:/xampp/htdocs/Digi-gram/certificate/generated_forms/residential_forms/residential_form_Residential5.pdf', 'C:/xampp/htdocs/Digi-gram/certificate/genrated_certificates/residential_certificates/residential_certificate_Residential5.pdf'),
(6, 'Residential6', 'yashodip_10', 'shirsale', 'bhadgaon', 'jalgaon', '2025-12-31', 'Yashodip Patil', '498723972193', 'shirsale', 'amalner', 'jalgaon', 'Ap shirsale tal AMALNER dist jalgoan\r\nShirsale', '425401', 'Permanent', 'Aadhar Card', '../certificate/uploads/residential/yashodip_10/document.jpg', 'Pending', '2025-03-19 17:37:18', 'C:/xampp/htdocs/Digi-gram/certificate/generated_forms/residential_forms/residential_form_Residential6.pdf', ''),
(7, 'Residential7', 'yashodip_10', 'bornar', 'amalner', 'jalgaon', '2022-12-31', 'name of applicant xyz', '8398713987', 'Amalner', 'amalner', 'jalgaon', 'xyz xyz zyx', '723611', 'Permanent', 'Aadhar Card', '../certificate/uploads/residential/yashodip_10/document.jpg', 'Pending', '2025-03-19 17:39:06', 'C:/xampp/htdocs/Digi-gram/certificate/generated_forms/residential_forms/residential_form_Residential7.pdf', ''),
(8, 'Residential8', 'yashodip_10', 'shegaon ', 'mumbai', 'mumbai', '2023-11-30', 'vijay patil', '27327392398', 'lon pirache', 'bhadgaon', 'jalgaon', 'at post lon pirache tal bhadgaon', '267374', 'Permanent', 'Aadhar Card', '../certificate/uploads/residential/yashodip_10/document.jpg', 'Pending', '2025-03-19 17:41:12', 'C:/xampp/htdocs/Digi-gram/certificate/generated_forms/residential_forms/residential_form_Residential8.pdf', '');

-- --------------------------------------------------------

--
-- Table structure for table `senior_citizen_certificates`
--

CREATE TABLE `senior_citizen_certificates` (
  `sr` int(11) NOT NULL,
  `token_no` varchar(255) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `date_of_birth` date NOT NULL,
  `age` int(11) NOT NULL CHECK (`age` >= 60),
  `gender` enum('Male','Female','Other') NOT NULL,
  `father_or_husband_name` varchar(255) NOT NULL,
  `full_address` text NOT NULL,
  `village_town_city` varchar(255) NOT NULL,
  `taluka` varchar(255) NOT NULL,
  `district` varchar(255) NOT NULL,
  `pin_code` char(6) NOT NULL,
  `identity_proof_type` enum('Aadhar Card','PAN Card','Voter ID','Passport','Ration Card') NOT NULL,
  `id_document_no` varchar(255) NOT NULL,
  `identity_proof_document` longblob NOT NULL,
  `age_proof_type` enum('Birth Certificate','School Leaving Certificate','PAN Card','Driving License') NOT NULL,
  `age_document_no` varchar(255) NOT NULL,
  `age_proof_document` longblob NOT NULL,
  `sign` varchar(255) NOT NULL,
  `requested_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `date_of_issue` varchar(255) DEFAULT NULL,
  `pdf_file` varchar(255) NOT NULL,
  `status` enum('pending','approved','rejected') NOT NULL DEFAULT 'pending',
  `user_id` varchar(255) NOT NULL,
  `application_form` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `senior_citizen_certificates`
--

INSERT INTO `senior_citizen_certificates` (`sr`, `token_no`, `full_name`, `date_of_birth`, `age`, `gender`, `father_or_husband_name`, `full_address`, `village_town_city`, `taluka`, `district`, `pin_code`, `identity_proof_type`, `id_document_no`, `identity_proof_document`, `age_proof_type`, `age_document_no`, `age_proof_document`, `sign`, `requested_date`, `date_of_issue`, `pdf_file`, `status`, `user_id`, `application_form`) VALUES
(1, 'Senior_citizen1', 'Yashodip Patil', '1980-03-23', 70, 'Male', '___________________________', '', 'Amalner', 'amalner', 'jalgaon', '425401', 'Aadhar Card', '247434384348', 0x2e2e2f63657274696669636174652f75706c6f6164732f73656e696f725f636974697a656e2f796173686f6469705f31302f696470726f662e6a7067, '', '378355635638638', 0x2e2e2f63657274696669636174652f75706c6f6164732f73656e696f725f636974697a656e2f796173686f6469705f31302f61676570726f662e6a7067, '', '2025-03-19 15:02:37', '2025-03-19 22:34:52', 'C:/xampp/htdocs/Digi-gram/certificate/genrated_certificates/seniar_citizen_certificates/seniar_citizen_certificates_Senior_citizen1.pdf', 'approved', 'yashodip_10', 'C:/xampp/htdocs/Digi-gram/certificate/generated_forms/seniar_citizen_form/senior_citizen_Senior_citizen1.pdf'),
(2, 'Senior_citizen2', 'vijay patil', '1945-03-12', 80, 'Male', '___________________________', '', 'Jalgaon', 'jalgaon', 'jalgaon', '425001', 'Aadhar Card', '48753753835866', 0x2e2e2f63657274696669636174652f75706c6f6164732f73656e696f725f636974697a656e2f796173686f6469705f31302f696470726f662e6a7067, '', '3783556356386', 0x2e2e2f63657274696669636174652f75706c6f6164732f73656e696f725f636974697a656e2f796173686f6469705f31302f61676570726f662e6a7067, '', '2025-03-19 15:04:17', NULL, '', 'rejected', 'yashodip_10', 'C:/xampp/htdocs/Digi-gram/certificate/generated_forms/seniar_citizen_form/senior_citizen_Senior_citizen2.pdf'),
(3, 'Senior_citizen3', 'harshal patil', '1880-03-23', 94, 'Male', '___________________________', '', 'Jalgaon', 'jalgaon', 'nashik', '425001', 'Aadhar Card', '48753753835866', 0x2e2e2f63657274696669636174652f75706c6f6164732f73656e696f725f636974697a656e2f796173686f6469705f31302f696470726f662e6a7067, '', '3783556356386', 0x2e2e2f63657274696669636174652f75706c6f6164732f73656e696f725f636974697a656e2f796173686f6469705f31302f61676570726f662e6a7067, '', '2025-03-19 15:06:49', NULL, '', 'pending', 'yashodip_10', 'C:/xampp/htdocs/Digi-gram/certificate/generated_forms/seniar_citizen_form/senior_citizen_Senior_citizen3.pdf'),
(4, 'Senior_citizen4', 'sanket tayde', '1867-03-23', 99, 'Male', '___________________________', '', 'Jalgaon', 'mumbai', 'mumbai', '425001', 'Aadhar Card', '221416058940', 0x2e2e2f63657274696669636174652f75706c6f6164732f73656e696f725f636974697a656e2f796173686f6469705f31302f696470726f662e6a7067, '', '3783556356386', 0x2e2e2f63657274696669636174652f75706c6f6164732f73656e696f725f636974697a656e2f796173686f6469705f31302f61676570726f662e6a7067, '', '2025-03-19 15:08:19', NULL, '', 'pending', 'yashodip_10', 'C:/xampp/htdocs/Digi-gram/certificate/generated_forms/seniar_citizen_form/senior_citizen_Senior_citizen4.pdf'),
(5, 'Senior_citizen5', 'Yashodip Patil', '1980-04-03', 87, 'Male', '___________________________', '', 'Jalgaon', 'amalner', 'jalgaon', '425001', 'Aadhar Card', '247434384348', 0x2e2e2f63657274696669636174652f75706c6f6164732f73656e696f725f636974697a656e2f796173686f6469705f31302f696470726f662e6a7067, '', '3783556356386', 0x2e2e2f63657274696669636174652f75706c6f6164732f73656e696f725f636974697a656e2f796173686f6469705f31302f61676570726f662e6a7067, '', '2025-03-19 15:09:42', NULL, '', 'pending', 'yashodip_10', 'C:/xampp/htdocs/Digi-gram/certificate/generated_forms/seniar_citizen_form/senior_citizen_Senior_citizen5.pdf'),
(6, 'Senior_citizen6', 'Yashodip Patil', '1980-04-03', 87, 'Male', '___________________________', '', 'Jalgaon', 'amalner', 'jalgaon', '425001', 'Aadhar Card', '247434384348', 0x2e2e2f63657274696669636174652f75706c6f6164732f73656e696f725f636974697a656e2f796173686f6469705f31302f696470726f662e6a7067, '', '3783556356386', 0x2e2e2f63657274696669636174652f75706c6f6164732f73656e696f725f636974697a656e2f796173686f6469705f31302f61676570726f662e6a7067, '', '2025-03-19 15:09:43', NULL, '', 'pending', 'yashodip_10', 'C:/xampp/htdocs/Digi-gram/certificate/generated_forms/seniar_citizen_form/senior_citizen_Senior_citizen6.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `sr` int(3) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `mobile` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `image_path` varchar(255) NOT NULL DEFAULT 'user/uploads/images/vijayphoto.jpg',
  `document_path` varchar(100) DEFAULT NULL,
  `document_type` enum('aadhar','pan','ration') DEFAULT NULL,
  `approval` enum('pending','approved','rejected') NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`sr`, `name`, `username`, `password`, `mobile`, `email`, `image_path`, `document_path`, `document_type`, `approval`) VALUES
(7, 'Yashodip Patil', 'yashodipp10', '$2y$10$udac6vxRqQKUOxA1ULNTR.oiCIU/NdooBRmPLz1NjdHaq2AZhHtPO', '07822996982', 'yashodipp10@gmail.com', 'uploads/images/profile_yashodipp10.png', 'uploads/documents/document_yashodipp10.jpg', 'aadhar', 'approved');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`sr`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `birth_certificates`
--
ALTER TABLE `birth_certificates`
  ADD PRIMARY KEY (`sr`);

--
-- Indexes for table `death_certificates`
--
ALTER TABLE `death_certificates`
  ADD PRIMARY KEY (`sr`);

--
-- Indexes for table `document_requests`
--
ALTER TABLE `document_requests`
  ADD PRIMARY KEY (`sr`);

--
-- Indexes for table `marriage_certificates`
--
ALTER TABLE `marriage_certificates`
  ADD PRIMARY KEY (`sr`);

--
-- Indexes for table `noc_certificates`
--
ALTER TABLE `noc_certificates`
  ADD PRIMARY KEY (`sr`),
  ADD UNIQUE KEY `token_no` (`token_no`);

--
-- Indexes for table `notices`
--
ALTER TABLE `notices`
  ADD PRIMARY KEY (`sr`);

--
-- Indexes for table `residential_certificates`
--
ALTER TABLE `residential_certificates`
  ADD PRIMARY KEY (`sr`);

--
-- Indexes for table `senior_citizen_certificates`
--
ALTER TABLE `senior_citizen_certificates`
  ADD PRIMARY KEY (`sr`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`sr`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `sr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `birth_certificates`
--
ALTER TABLE `birth_certificates`
  MODIFY `sr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `death_certificates`
--
ALTER TABLE `death_certificates`
  MODIFY `sr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `document_requests`
--
ALTER TABLE `document_requests`
  MODIFY `sr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `marriage_certificates`
--
ALTER TABLE `marriage_certificates`
  MODIFY `sr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `noc_certificates`
--
ALTER TABLE `noc_certificates`
  MODIFY `sr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `notices`
--
ALTER TABLE `notices`
  MODIFY `sr` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `residential_certificates`
--
ALTER TABLE `residential_certificates`
  MODIFY `sr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `senior_citizen_certificates`
--
ALTER TABLE `senior_citizen_certificates`
  MODIFY `sr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `sr` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
