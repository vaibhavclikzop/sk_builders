-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 24, 2025 at 10:38 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hr_dial`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `start_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `end_time` timestamp NULL DEFAULT NULL,
  `start_location` text DEFAULT NULL,
  `end_location` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `company_settings`
--

CREATE TABLE `company_settings` (
  `id` int(11) NOT NULL,
  `img` text DEFAULT NULL,
  `img_width` text DEFAULT NULL,
  `company_name` text DEFAULT NULL,
  `address` text DEFAULT NULL,
  `contact_person` text DEFAULT NULL,
  `number` text DEFAULT NULL,
  `email` text DEFAULT NULL,
  `gst_no` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `company_settings`
--

INSERT INTO `company_settings` (`id`, `img`, `img_width`, `company_name`, `address`, `contact_person`, `number`, `email`, `gst_no`, `created_at`, `updated_at`) VALUES
(1, '1736492134.webp', '252', 'Home Easy Realtors', 'SCO 6, Opposite Cosmo Mall, Zirakpur, Punjab', 'Mrinal Sharma', '9646797070', 'contact@thehomeeasy.com', '03CJWPS1038M1ZN', '2024-08-05 18:28:54', '2025-01-10 06:55:34');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `name` text DEFAULT NULL,
  `number` text DEFAULT NULL,
  `email` text DEFAULT NULL,
  `gst` text DEFAULT NULL,
  `address` text DEFAULT NULL,
  `state` text DEFAULT NULL,
  `city1` text DEFAULT NULL,
  `pincode` varchar(6) DEFAULT NULL,
  `active` int(1) NOT NULL DEFAULT 1,
  `created-at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `dob` date DEFAULT NULL,
  `pan_card` varchar(255) DEFAULT NULL,
  `adhar_card` varchar(255) DEFAULT NULL,
  `so_wo` varchar(255) DEFAULT NULL,
  `city` text DEFAULT NULL,
  `rating` varchar(255) DEFAULT NULL,
  `project` text DEFAULT NULL,
  `unit_no` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `number`, `email`, `gst`, `address`, `state`, `city1`, `pincode`, `active`, `created-at`, `updated_at`, `dob`, `pan_card`, `adhar_card`, `so_wo`, `city`, `rating`, `project`, `unit_no`) VALUES
(1, 'MRINAL SHARMA', '9501236805', 'MRINALSHARMA1291@GMAIL.COM', NULL, '461 12A', 'Haryana', 'Panchkula', '134113', 1, '2024-12-16 08:24:48', '2024-12-20 10:26:09', '1991-02-01', 'CJWPS1038M', '494020924279', 'RAVI SHARMA', 'Panchkula', '3 Star', 'projects', 'unit 2');

-- --------------------------------------------------------

--
-- Table structure for table `permission_mst`
--

CREATE TABLE `permission_mst` (
  `id` int(11) NOT NULL,
  `name` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `permission_mst`
--

INSERT INTO `permission_mst` (`id`, `name`, `created_at`, `updated_at`) VALUES
(2, 'user_masters', '2024-09-24 11:31:13', '2024-11-16 10:05:45'),
(3, 'masters', '2024-09-24 11:31:13', '2024-11-16 10:05:53'),
(4, 'Inventory', '2024-09-24 11:31:13', '2024-11-16 10:05:58'),
(5, 'customers', '2024-09-24 11:31:13', '2024-11-16 10:06:05'),
(6, 'sales', '2024-09-24 11:31:13', '2024-11-16 10:06:10'),
(7, 'settings', '2024-09-24 11:31:13', '2024-11-16 10:06:19');

-- --------------------------------------------------------

--
-- Table structure for table `reset_key`
--

CREATE TABLE `reset_key` (
  `id` int(1) NOT NULL,
  `reset_key` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reset_key`
--

INSERT INTO `reset_key` (`id`, `reset_key`) VALUES
(1, '6ade476a6311eef57485d48d092bd0c2');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `name` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'admin', '2024-12-13 07:31:34', NULL),
(2, 'Sales', '2024-12-24 08:11:10', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role_permission`
--

CREATE TABLE `role_permission` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL,
  `edit` int(11) NOT NULL DEFAULT 0,
  `view` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `role_permission`
--

INSERT INTO `role_permission` (`id`, `role_id`, `permission_id`, `edit`, `view`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 1, 1, '2024-12-13 07:32:17', '2024-12-24 08:13:15'),
(2, 1, 3, 1, 1, '2024-12-13 07:32:21', '2024-12-24 08:28:06'),
(3, 1, 4, 1, 1, '2024-12-13 07:32:26', NULL),
(4, 1, 5, 1, 1, '2024-12-13 07:32:30', '2024-12-24 08:28:08'),
(5, 1, 6, 1, 1, '2024-12-13 07:32:35', '2024-12-24 08:28:09'),
(6, 1, 7, 1, 1, '2024-12-13 07:32:39', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `state_city`
--

CREATE TABLE `state_city` (
  `id` int(10) NOT NULL,
  `state` varchar(100) DEFAULT NULL,
  `city` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `state_city`
--

INSERT INTO `state_city` (`id`, `state`, `city`) VALUES
(2, 'Andaman Nicobar', 'North Middle Andaman'),
(3, 'Andaman Nicobar', 'South Andaman'),
(4, 'Andhra Pradesh', 'Anantapur'),
(5, 'Andhra Pradesh', 'Chittoor'),
(6, 'Andhra Pradesh', 'East Godavari'),
(7, 'Andhra Pradesh', 'Guntur'),
(8, 'Andhra Pradesh', 'Kadapa'),
(9, 'Andhra Pradesh', 'Krishna'),
(10, 'Andhra Pradesh', 'Kurnool'),
(11, 'Andhra Pradesh', 'Nellore'),
(12, 'Andhra Pradesh', 'Prakasam'),
(13, 'Andhra Pradesh', 'Srikakulam'),
(14, 'Andhra Pradesh', 'Visakhapatnam'),
(15, 'Andhra Pradesh', 'Vizianagaram'),
(16, 'Andhra Pradesh', 'West Godavari'),
(17, 'Arunachal Pradesh', 'Anjaw'),
(18, 'Arunachal Pradesh', 'Siang'),
(19, 'Arunachal Pradesh', 'Changlang'),
(20, 'Arunachal Pradesh', 'Dibang Valley'),
(21, 'Arunachal Pradesh', 'East Kameng'),
(22, 'Arunachal Pradesh', 'East Siang'),
(23, 'Arunachal Pradesh', 'Kamle'),
(24, 'Arunachal Pradesh', 'Kra Daadi'),
(25, 'Arunachal Pradesh', 'Kurung Kumey'),
(26, 'Arunachal Pradesh', 'Lepa Rada'),
(27, 'Arunachal Pradesh', 'Lohit'),
(28, 'Arunachal Pradesh', 'Longding'),
(29, 'Arunachal Pradesh', 'Lower Dibang Valley'),
(30, 'Arunachal Pradesh', 'Lower Siang'),
(31, 'Arunachal Pradesh', 'Lower Subansiri'),
(32, 'Arunachal Pradesh', 'Namsai'),
(33, 'Arunachal Pradesh', 'Pakke Kessang'),
(34, 'Arunachal Pradesh', 'Papum Pare'),
(35, 'Arunachal Pradesh', 'Shi Yomi'),
(36, 'Arunachal Pradesh', 'Tawang'),
(37, 'Arunachal Pradesh', 'Tirap'),
(38, 'Arunachal Pradesh', 'Upper Siang'),
(39, 'Arunachal Pradesh', 'Upper Subansiri'),
(40, 'Arunachal Pradesh', 'West Kameng'),
(41, 'Arunachal Pradesh', 'West Siang'),
(42, 'Assam', 'Bajali'),
(43, 'Assam', 'Baksa'),
(44, 'Assam', 'Barpeta'),
(45, 'Assam', 'Biswanath'),
(46, 'Assam', 'Bongaigaon'),
(47, 'Assam', 'Cachar'),
(48, 'Assam', 'Charaideo'),
(49, 'Assam', 'Chirang'),
(50, 'Assam', 'Darrang'),
(51, 'Assam', 'Dhemaji'),
(52, 'Assam', 'Dhubri'),
(53, 'Assam', 'Dibrugarh'),
(54, 'Assam', 'Dima Hasao'),
(55, 'Assam', 'Goalpara'),
(56, 'Assam', 'Golaghat'),
(57, 'Assam', 'Hailakandi'),
(58, 'Assam', 'Hojai'),
(59, 'Assam', 'Jorhat'),
(60, 'Assam', 'Kamrup'),
(61, 'Assam', 'Kamrup Metropolitan'),
(62, 'Assam', 'Karbi Anglong'),
(63, 'Assam', 'Karimganj'),
(64, 'Assam', 'Kokrajhar'),
(65, 'Assam', 'Lakhimpur'),
(66, 'Assam', 'Majuli'),
(67, 'Assam', 'Morigaon'),
(68, 'Assam', 'Nagaon'),
(69, 'Assam', 'Nalbari'),
(70, 'Assam', 'Sivasagar'),
(71, 'Assam', 'Sonitpur'),
(72, 'Assam', 'South Salmara-Mankachar'),
(73, 'Assam', 'Tinsukia'),
(74, 'Assam', 'Udalguri'),
(75, 'Assam', 'West Karbi Anglong'),
(76, 'Bihar', 'Araria'),
(77, 'Bihar', 'Arwal'),
(78, 'Bihar', 'Aurangabad'),
(79, 'Bihar', 'Banka'),
(80, 'Bihar', 'Begusarai'),
(81, 'Bihar', 'Bhagalpur'),
(82, 'Bihar', 'Bhojpur'),
(83, 'Bihar', 'Buxar'),
(84, 'Bihar', 'Darbhanga'),
(85, 'Bihar', 'East Champaran'),
(86, 'Bihar', 'Gaya'),
(87, 'Bihar', 'Gopalganj'),
(88, 'Bihar', 'Jamui'),
(89, 'Bihar', 'Jehanabad'),
(90, 'Bihar', 'Kaimur'),
(91, 'Bihar', 'Katihar'),
(92, 'Bihar', 'Khagaria'),
(93, 'Bihar', 'Kishanganj'),
(94, 'Bihar', 'Lakhisarai'),
(95, 'Bihar', 'Madhepura'),
(96, 'Bihar', 'Madhubani'),
(97, 'Bihar', 'Munger'),
(98, 'Bihar', 'Muzaffarpur'),
(99, 'Bihar', 'Nalanda'),
(100, 'Bihar', 'Nawada'),
(101, 'Bihar', 'Patna'),
(102, 'Bihar', 'Purnia'),
(103, 'Bihar', 'Rohtas'),
(104, 'Bihar', 'Saharsa'),
(105, 'Bihar', 'Samastipur'),
(106, 'Bihar', 'Saran'),
(107, 'Bihar', 'Sheikhpura'),
(108, 'Bihar', 'Sheohar'),
(109, 'Bihar', 'Sitamarhi'),
(110, 'Bihar', 'Siwan'),
(111, 'Bihar', 'Supaul'),
(112, 'Bihar', 'Vaishali'),
(113, 'Bihar', 'West Champaran'),
(114, 'Chandigarh', 'Chandigarh'),
(115, 'Chhattisgarh', 'Balod'),
(116, 'Chhattisgarh', 'Baloda Bazar'),
(117, 'Chhattisgarh', 'Balrampur'),
(118, 'Chhattisgarh', 'Bastar'),
(119, 'Chhattisgarh', 'Bemetara'),
(120, 'Chhattisgarh', 'Bijapur'),
(121, 'Chhattisgarh', 'Bilaspur'),
(122, 'Chhattisgarh', 'Dantewada'),
(123, 'Chhattisgarh', 'Dhamtari'),
(124, 'Chhattisgarh', 'Durg'),
(125, 'Chhattisgarh', 'Gariaband'),
(126, 'Chhattisgarh', 'Gaurela Pendra Marwahi'),
(127, 'Chhattisgarh', 'Janjgir Champa'),
(128, 'Chhattisgarh', 'Jashpur'),
(129, 'Chhattisgarh', 'Kabirdham'),
(130, 'Chhattisgarh', 'Kanker'),
(131, 'Chhattisgarh', 'Kondagaon'),
(132, 'Chhattisgarh', 'Korba'),
(133, 'Chhattisgarh', 'Koriya'),
(134, 'Chhattisgarh', 'Mahasamund'),
(135, 'Chhattisgarh', 'Mungeli'),
(136, 'Chhattisgarh', 'Narayanpur'),
(137, 'Chhattisgarh', 'Raigarh'),
(138, 'Chhattisgarh', 'Raipur'),
(139, 'Chhattisgarh', 'Rajnandgaon'),
(140, 'Chhattisgarh', 'Sukma'),
(141, 'Chhattisgarh', 'Surajpur'),
(142, 'Chhattisgarh', 'Surguja'),
(143, 'Dadra Nagar Haveli', 'Dadra Nagar Haveli'),
(144, 'Daman Diu', 'Daman'),
(145, 'Daman Diu', 'Diu'),
(146, 'Delhi', 'Central Delhi'),
(147, 'Delhi', 'East Delhi'),
(148, 'Delhi', 'New Delhi'),
(149, 'Delhi', 'North Delhi'),
(150, 'Delhi', 'North East Delhi'),
(151, 'Delhi', 'North West Delhi'),
(152, 'Delhi', 'Shahdara'),
(153, 'Delhi', 'South Delhi'),
(154, 'Delhi', 'South East Delhi'),
(155, 'Delhi', 'South West Delhi'),
(156, 'Delhi', 'West Delhi'),
(157, 'Goa', 'North Goa'),
(158, 'Goa', 'South Goa'),
(159, 'Gujarat', 'Ahmedabad'),
(160, 'Gujarat', 'Amreli'),
(161, 'Gujarat', 'Anand'),
(162, 'Gujarat', 'Aravalli'),
(163, 'Gujarat', 'Banaskantha'),
(164, 'Gujarat', 'Bharuch'),
(165, 'Gujarat', 'Bhavnagar'),
(166, 'Gujarat', 'Botad'),
(167, 'Gujarat', 'Chhota Udaipur'),
(168, 'Gujarat', 'Dahod'),
(169, 'Gujarat', 'Dang'),
(170, 'Gujarat', 'Devbhoomi Dwarka'),
(171, 'Gujarat', 'Gandhinagar'),
(172, 'Gujarat', 'Gir Somnath'),
(173, 'Gujarat', 'Jamnagar'),
(174, 'Gujarat', 'Junagadh'),
(175, 'Gujarat', 'Kheda'),
(176, 'Gujarat', 'Kutch'),
(177, 'Gujarat', 'Mahisagar'),
(178, 'Gujarat', 'Mehsana'),
(179, 'Gujarat', 'Morbi'),
(180, 'Gujarat', 'Narmada'),
(181, 'Gujarat', 'Navsari'),
(182, 'Gujarat', 'Panchmahal'),
(183, 'Gujarat', 'Patan'),
(184, 'Gujarat', 'Porbandar'),
(185, 'Gujarat', 'Rajkot'),
(186, 'Gujarat', 'Sabarkantha'),
(187, 'Gujarat', 'Surat'),
(188, 'Gujarat', 'Surendranagar'),
(189, 'Gujarat', 'Tapi'),
(190, 'Gujarat', 'Vadodara'),
(191, 'Gujarat', 'Valsad'),
(192, 'Haryana', 'Ambala'),
(193, 'Haryana', 'Bhiwani'),
(194, 'Haryana', 'Charkhi Dadri'),
(195, 'Haryana', 'Faridabad'),
(196, 'Haryana', 'Fatehabad'),
(197, 'Haryana', 'Gurugram'),
(198, 'Haryana', 'Hisar'),
(199, 'Haryana', 'Jhajjar'),
(200, 'Haryana', 'Jind'),
(201, 'Haryana', 'Kaithal'),
(202, 'Haryana', 'Karnal'),
(203, 'Haryana', 'Kurukshetra'),
(204, 'Haryana', 'Mahendragarh'),
(205, 'Haryana', 'Mewat'),
(206, 'Haryana', 'Palwal'),
(207, 'Haryana', 'Panchkula'),
(208, 'Haryana', 'Panipat'),
(209, 'Haryana', 'Rewari'),
(210, 'Haryana', 'Rohtak'),
(211, 'Haryana', 'Sirsa'),
(212, 'Haryana', 'Sonipat'),
(213, 'Haryana', 'Yamunanagar'),
(214, 'Himachal Pradesh', 'Bilaspur'),
(215, 'Himachal Pradesh', 'Chamba'),
(216, 'Himachal Pradesh', 'Hamirpur'),
(217, 'Himachal Pradesh', 'Kangra'),
(218, 'Himachal Pradesh', 'Kinnaur'),
(219, 'Himachal Pradesh', 'Kullu'),
(220, 'Himachal Pradesh', 'Lahaul Spiti'),
(221, 'Himachal Pradesh', 'Mandi'),
(222, 'Himachal Pradesh', 'Shimla'),
(223, 'Himachal Pradesh', 'Sirmaur'),
(224, 'Himachal Pradesh', 'Solan'),
(225, 'Himachal Pradesh', 'Una'),
(226, 'Jammu Kashmir', 'Anantnag'),
(227, 'Jammu Kashmir', 'Bandipora'),
(228, 'Jammu Kashmir', 'Baramulla'),
(229, 'Jammu Kashmir', 'Budgam'),
(230, 'Jammu Kashmir', 'Doda'),
(231, 'Jammu Kashmir', 'Ganderbal'),
(232, 'Jammu Kashmir', 'Jammu'),
(233, 'Jammu Kashmir', 'Kathua'),
(234, 'Jammu Kashmir', 'Kishtwar'),
(235, 'Jammu Kashmir', 'Kulgam'),
(236, 'Jammu Kashmir', 'Kupwara'),
(237, 'Jammu Kashmir', 'Poonch'),
(238, 'Jammu Kashmir', 'Pulwama'),
(239, 'Jammu Kashmir', 'Rajouri'),
(240, 'Jammu Kashmir', 'Ramban'),
(241, 'Jammu Kashmir', 'Reasi'),
(242, 'Jammu Kashmir', 'Samba'),
(243, 'Jammu Kashmir', 'Shopian'),
(244, 'Jammu Kashmir', 'Srinagar'),
(245, 'Jammu Kashmir', 'Udhampur'),
(246, 'Jharkhand', 'Bokaro'),
(247, 'Jharkhand', 'Chatra'),
(248, 'Jharkhand', 'Deoghar'),
(249, 'Jharkhand', 'Dhanbad'),
(250, 'Jharkhand', 'Dumka'),
(251, 'Jharkhand', 'East Singhbhum'),
(252, 'Jharkhand', 'Garhwa'),
(253, 'Jharkhand', 'Giridih'),
(254, 'Jharkhand', 'Godda'),
(255, 'Jharkhand', 'Gumla'),
(256, 'Jharkhand', 'Hazaribagh'),
(257, 'Jharkhand', 'Jamtara'),
(258, 'Jharkhand', 'Khunti'),
(259, 'Jharkhand', 'Koderma'),
(260, 'Jharkhand', 'Latehar'),
(261, 'Jharkhand', 'Lohardaga'),
(262, 'Jharkhand', 'Pakur'),
(263, 'Jharkhand', 'Palamu'),
(264, 'Jharkhand', 'Ramgarh'),
(265, 'Jharkhand', 'Ranchi'),
(266, 'Jharkhand', 'Sahebganj'),
(267, 'Jharkhand', 'Seraikela Kharsawan'),
(268, 'Jharkhand', 'Simdega'),
(269, 'Jharkhand', 'West Singhbhum'),
(270, 'Karnataka', 'Bagalkot'),
(271, 'Karnataka', 'Bangalore Rural'),
(272, 'Karnataka', 'Bangalore Urban'),
(273, 'Karnataka', 'Belgaum'),
(274, 'Karnataka', 'Bellary'),
(275, 'Karnataka', 'Bidar'),
(276, 'Karnataka', 'Chamarajanagar'),
(277, 'Karnataka', 'Chikkaballapur'),
(278, 'Karnataka', 'Chikkamagaluru'),
(279, 'Karnataka', 'Chitradurga'),
(280, 'Karnataka', 'Dakshina Kannada'),
(281, 'Karnataka', 'Davanagere'),
(282, 'Karnataka', 'Dharwad'),
(283, 'Karnataka', 'Gadag'),
(284, 'Karnataka', 'Gulbarga'),
(285, 'Karnataka', 'Hassan'),
(286, 'Karnataka', 'Haveri'),
(287, 'Karnataka', 'Kodagu'),
(288, 'Karnataka', 'Kolar'),
(289, 'Karnataka', 'Koppal'),
(290, 'Karnataka', 'Mandya'),
(291, 'Karnataka', 'Mysore'),
(292, 'Karnataka', 'Raichur'),
(293, 'Karnataka', 'Ramanagara'),
(294, 'Karnataka', 'Shimoga'),
(295, 'Karnataka', 'Tumkur'),
(296, 'Karnataka', 'Udupi'),
(297, 'Karnataka', 'Uttara Kannada'),
(298, 'Karnataka', 'Vijayanagara'),
(299, 'Karnataka', 'Vijayapura'),
(300, 'Karnataka', 'Yadgir'),
(301, 'Kerala', 'Alappuzha'),
(302, 'Kerala', 'Ernakulam'),
(303, 'Kerala', 'Idukki'),
(304, 'Kerala', 'Kannur'),
(305, 'Kerala', 'Kasaragod'),
(306, 'Kerala', 'Kollam'),
(307, 'Kerala', 'Kottayam'),
(308, 'Kerala', 'Kozhikode'),
(309, 'Kerala', 'Malappuram'),
(310, 'Kerala', 'Palakkad'),
(311, 'Kerala', 'Pathanamthitta'),
(312, 'Kerala', 'Thiruvananthapuram'),
(313, 'Kerala', 'Thrissur'),
(314, 'Kerala', 'Wayanad'),
(315, 'Lakshadweep', 'Lakshadweep'),
(316, 'Ladakh', 'Kargil'),
(317, 'Ladakh', 'Leh'),
(318, 'Madhya Pradesh', 'Agar Malwa'),
(319, 'Madhya Pradesh', 'Alirajpur'),
(320, 'Madhya Pradesh', 'Anuppur'),
(321, 'Madhya Pradesh', 'Ashoknagar'),
(322, 'Madhya Pradesh', 'Balaghat'),
(323, 'Madhya Pradesh', 'Barwani'),
(324, 'Madhya Pradesh', 'Betul'),
(325, 'Madhya Pradesh', 'Bhind'),
(326, 'Madhya Pradesh', 'Bhopal'),
(327, 'Madhya Pradesh', 'Burhanpur'),
(328, 'Madhya Pradesh', 'Chachaura'),
(329, 'Madhya Pradesh', 'Chhatarpur'),
(330, 'Madhya Pradesh', 'Chhindwara'),
(331, 'Madhya Pradesh', 'Damoh'),
(332, 'Madhya Pradesh', 'Datia'),
(333, 'Madhya Pradesh', 'Dewas'),
(334, 'Madhya Pradesh', 'Dhar'),
(335, 'Madhya Pradesh', 'Dindori'),
(336, 'Madhya Pradesh', 'Guna'),
(337, 'Madhya Pradesh', 'Gwalior'),
(338, 'Madhya Pradesh', 'Harda'),
(339, 'Madhya Pradesh', 'Hoshangabad'),
(340, 'Madhya Pradesh', 'Indore'),
(341, 'Madhya Pradesh', 'Jabalpur'),
(342, 'Madhya Pradesh', 'Jhabua'),
(343, 'Madhya Pradesh', 'Katni'),
(344, 'Madhya Pradesh', 'Khandwa'),
(345, 'Madhya Pradesh', 'Khargone'),
(346, 'Madhya Pradesh', 'Maihar'),
(347, 'Madhya Pradesh', 'Mandla'),
(348, 'Madhya Pradesh', 'Mandsaur'),
(349, 'Madhya Pradesh', 'Morena'),
(350, 'Madhya Pradesh', 'Narsinghpur'),
(351, 'Madhya Pradesh', 'Nagda'),
(352, 'Madhya Pradesh', 'Neemuch'),
(353, 'Madhya Pradesh', 'Niwari'),
(354, 'Madhya Pradesh', 'Panna'),
(355, 'Madhya Pradesh', 'Raisen'),
(356, 'Madhya Pradesh', 'Rajgarh'),
(357, 'Madhya Pradesh', 'Ratlam'),
(358, 'Madhya Pradesh', 'Rewa'),
(359, 'Madhya Pradesh', 'Sagar'),
(360, 'Madhya Pradesh', 'Satna'),
(361, 'Madhya Pradesh', 'Sehore'),
(362, 'Madhya Pradesh', 'Seoni'),
(363, 'Madhya Pradesh', 'Shahdol'),
(364, 'Madhya Pradesh', 'Shajapur'),
(365, 'Madhya Pradesh', 'Sheopur'),
(366, 'Madhya Pradesh', 'Shivpuri'),
(367, 'Madhya Pradesh', 'Sidhi'),
(368, 'Madhya Pradesh', 'Singrauli'),
(369, 'Madhya Pradesh', 'Tikamgarh'),
(370, 'Madhya Pradesh', 'Ujjain'),
(371, 'Madhya Pradesh', 'Umaria'),
(372, 'Madhya Pradesh', 'Vidisha'),
(373, 'Maharashtra', 'Ahmednagar'),
(374, 'Maharashtra', 'Akola'),
(375, 'Maharashtra', 'Amravati'),
(376, 'Maharashtra', 'Aurangabad'),
(377, 'Maharashtra', 'Beed'),
(378, 'Maharashtra', 'Bhandara'),
(379, 'Maharashtra', 'Buldhana'),
(380, 'Maharashtra', 'Chandrapur'),
(381, 'Maharashtra', 'Dhule'),
(382, 'Maharashtra', 'Gadchiroli'),
(383, 'Maharashtra', 'Gondia'),
(384, 'Maharashtra', 'Hingoli'),
(385, 'Maharashtra', 'Jalgaon'),
(386, 'Maharashtra', 'Jalna'),
(387, 'Maharashtra', 'Kolhapur'),
(388, 'Maharashtra', 'Latur'),
(389, 'Maharashtra', 'Mumbai City'),
(390, 'Maharashtra', 'Mumbai Suburban'),
(391, 'Maharashtra', 'Nagpur'),
(392, 'Maharashtra', 'Nanded'),
(393, 'Maharashtra', 'Nandurbar'),
(394, 'Maharashtra', 'Nashik'),
(395, 'Maharashtra', 'Osmanabad'),
(396, 'Maharashtra', 'Palghar'),
(397, 'Maharashtra', 'Parbhani'),
(398, 'Maharashtra', 'Pune'),
(399, 'Maharashtra', 'Raigad'),
(400, 'Maharashtra', 'Ratnagiri'),
(401, 'Maharashtra', 'Sangli'),
(402, 'Maharashtra', 'Satara'),
(403, 'Maharashtra', 'Sindhudurg'),
(404, 'Maharashtra', 'Solapur'),
(405, 'Maharashtra', 'Thane'),
(406, 'Maharashtra', 'Wardha'),
(407, 'Maharashtra', 'Washim'),
(408, 'Maharashtra', 'Yavatmal'),
(409, 'Manipur', 'Bishnupur'),
(410, 'Manipur', 'Chandel'),
(411, 'Manipur', 'Churachandpur'),
(412, 'Manipur', 'Imphal East'),
(413, 'Manipur', 'Imphal West'),
(414, 'Manipur', 'Jiribam'),
(415, 'Manipur', 'Kakching'),
(416, 'Manipur', 'Kamjong'),
(417, 'Manipur', 'Kangpokpi'),
(418, 'Manipur', 'Noney'),
(419, 'Manipur', 'Pherzawl'),
(420, 'Manipur', 'Senapati'),
(421, 'Manipur', 'Tamenglong'),
(422, 'Manipur', 'Tengnoupal'),
(423, 'Manipur', 'Thoubal'),
(424, 'Manipur', 'Ukhrul'),
(425, 'Meghalaya', 'East Garo Hills'),
(426, 'Meghalaya', 'East Jaintia Hills'),
(427, 'Meghalaya', 'East Khasi Hills'),
(428, 'Meghalaya', 'North Garo Hills'),
(429, 'Meghalaya', 'Ri Bhoi'),
(430, 'Meghalaya', 'South Garo Hills'),
(431, 'Meghalaya', 'South West Garo Hills'),
(432, 'Meghalaya', 'South West Khasi Hills'),
(433, 'Meghalaya', 'West Garo Hills'),
(434, 'Meghalaya', 'West Jaintia Hills'),
(435, 'Meghalaya', 'West Khasi Hills'),
(436, 'Mizoram', 'Aizawl'),
(437, 'Mizoram', 'Champhai'),
(438, 'Mizoram', 'Hnahthial'),
(439, 'Mizoram', 'Kolasib'),
(440, 'Mizoram', 'Khawzawl'),
(441, 'Mizoram', 'Lawngtlai'),
(442, 'Mizoram', 'Lunglei'),
(443, 'Mizoram', 'Mamit'),
(444, 'Mizoram', 'Saiha'),
(445, 'Mizoram', 'Serchhip'),
(446, 'Mizoram', 'Saitual'),
(447, 'Nagaland', 'Mon'),
(448, 'Nagaland', 'Dimapur'),
(449, 'Nagaland', 'Kiphire'),
(450, 'Nagaland', 'Kohima'),
(451, 'Nagaland', 'Longleng'),
(452, 'Nagaland', 'Mokokchung'),
(453, 'Nagaland', 'Noklak'),
(454, 'Nagaland', 'Peren'),
(455, 'Nagaland', 'Phek'),
(456, 'Nagaland', 'Tuensang'),
(457, 'Nagaland', 'Wokha'),
(458, 'Nagaland', 'Zunheboto'),
(459, 'Odisha', 'Angul'),
(460, 'Odisha', 'Balangir'),
(461, 'Odisha', 'Balasore'),
(462, 'Odisha', 'Bargarh'),
(463, 'Odisha', 'Bhadrak'),
(464, 'Odisha', 'Boudh'),
(465, 'Odisha', 'Cuttack'),
(466, 'Odisha', 'Debagarh'),
(467, 'Odisha', 'Dhenkanal'),
(468, 'Odisha', 'Gajapati'),
(469, 'Odisha', 'Ganjam'),
(470, 'Odisha', 'Jagatsinghpur'),
(471, 'Odisha', 'Jajpur'),
(472, 'Odisha', 'Jharsuguda'),
(473, 'Odisha', 'Kalahandi'),
(474, 'Odisha', 'Kandhamal'),
(475, 'Odisha', 'Kendrapara'),
(476, 'Odisha', 'Kendujhar'),
(477, 'Odisha', 'Khordha'),
(478, 'Odisha', 'Koraput'),
(479, 'Odisha', 'Malkangiri'),
(480, 'Odisha', 'Mayurbhanj'),
(481, 'Odisha', 'Nabarangpur'),
(482, 'Odisha', 'Nayagarh'),
(483, 'Odisha', 'Nuapada'),
(484, 'Odisha', 'Puri'),
(485, 'Odisha', 'Rayagada'),
(486, 'Odisha', 'Sambalpur'),
(487, 'Odisha', 'Subarnapur'),
(488, 'Odisha', 'Sundergarh'),
(489, 'Puducherry', 'Karaikal'),
(490, 'Puducherry', 'Mahe'),
(491, 'Puducherry', 'Puducherry'),
(492, 'Puducherry', 'Yanam'),
(493, 'Punjab', 'Amritsar'),
(494, 'Punjab', 'Barnala'),
(495, 'Punjab', 'Bathinda'),
(496, 'Punjab', 'Faridkot'),
(497, 'Punjab', 'Fatehgarh Sahib'),
(498, 'Punjab', 'Fazilka'),
(499, 'Punjab', 'Firozpur'),
(500, 'Punjab', 'Gurdaspur'),
(501, 'Punjab', 'Hoshiarpur'),
(502, 'Punjab', 'Jalandhar'),
(503, 'Punjab', 'Kapurthala'),
(504, 'Punjab', 'Ludhiana'),
(505, 'Punjab', 'Malerkotla'),
(506, 'Punjab', 'Mansa'),
(507, 'Punjab', 'Moga'),
(508, 'Punjab', 'Mohali'),
(509, 'Punjab', 'Muktsar'),
(510, 'Punjab', 'Pathankot'),
(511, 'Punjab', 'Patiala'),
(512, 'Punjab', 'Rupnagar'),
(513, 'Punjab', 'Sangrur'),
(514, 'Punjab', 'Shaheed Bhagat Singh Nagar'),
(515, 'Punjab', 'Tarn Taran'),
(516, 'Rajasthan', 'Ajmer'),
(517, 'Rajasthan', 'Alwar'),
(518, 'Rajasthan', 'Banswara'),
(519, 'Rajasthan', 'Baran'),
(520, 'Rajasthan', 'Barmer'),
(521, 'Rajasthan', 'Bharatpur'),
(522, 'Rajasthan', 'Bhilwara'),
(523, 'Rajasthan', 'Bikaner'),
(524, 'Rajasthan', 'Bundi'),
(525, 'Rajasthan', 'Chittorgarh'),
(526, 'Rajasthan', 'Churu'),
(527, 'Rajasthan', 'Dausa'),
(528, 'Rajasthan', 'Dholpur'),
(529, 'Rajasthan', 'Dungarpur'),
(530, 'Rajasthan', 'Hanumangarh'),
(531, 'Rajasthan', 'Jaipur'),
(532, 'Rajasthan', 'Jaisalmer'),
(533, 'Rajasthan', 'Jalore'),
(534, 'Rajasthan', 'Jhalawar'),
(535, 'Rajasthan', 'Jhunjhunu'),
(536, 'Rajasthan', 'Jodhpur'),
(537, 'Rajasthan', 'Karauli'),
(538, 'Rajasthan', 'Kota'),
(539, 'Rajasthan', 'Nagaur'),
(540, 'Rajasthan', 'Pali'),
(541, 'Rajasthan', 'Pratapgarh'),
(542, 'Rajasthan', 'Rajsamand'),
(543, 'Rajasthan', 'Sawai Madhopur'),
(544, 'Rajasthan', 'Sikar'),
(545, 'Rajasthan', 'Sirohi'),
(546, 'Rajasthan', 'Sri Ganganagar'),
(547, 'Rajasthan', 'Tonk'),
(548, 'Rajasthan', 'Udaipur'),
(549, 'Sikkim', 'East Sikkim'),
(550, 'Sikkim', 'North Sikkim'),
(551, 'Sikkim', 'South Sikkim'),
(552, 'Sikkim', 'West Sikkim'),
(553, 'Tamil Nadu', 'Ariyalur'),
(554, 'Tamil Nadu', 'Chengalpattu'),
(555, 'Tamil Nadu', 'Chennai'),
(556, 'Tamil Nadu', 'Coimbatore'),
(557, 'Tamil Nadu', 'Cuddalore'),
(558, 'Tamil Nadu', 'Dharmapuri'),
(559, 'Tamil Nadu', 'Dindigul'),
(560, 'Tamil Nadu', 'Erode'),
(561, 'Tamil Nadu', 'Kallakurichi'),
(562, 'Tamil Nadu', 'Kanchipuram'),
(563, 'Tamil Nadu', 'Kanyakumari'),
(564, 'Tamil Nadu', 'Karur'),
(565, 'Tamil Nadu', 'Krishnagiri'),
(566, 'Tamil Nadu', 'Madurai'),
(567, 'Tamil Nadu', 'Mayiladuthurai'),
(568, 'Tamil Nadu', 'Nagapattinam'),
(569, 'Tamil Nadu', 'Namakkal'),
(570, 'Tamil Nadu', 'Nilgiris'),
(571, 'Tamil Nadu', 'Perambalur'),
(572, 'Tamil Nadu', 'Pudukkottai'),
(573, 'Tamil Nadu', 'Ramanathapuram'),
(574, 'Tamil Nadu', 'Ranipet'),
(575, 'Tamil Nadu', 'Salem'),
(576, 'Tamil Nadu', 'Sivaganga'),
(577, 'Tamil Nadu', 'Tenkasi'),
(578, 'Tamil Nadu', 'Thanjavur'),
(579, 'Tamil Nadu', 'Theni'),
(580, 'Tamil Nadu', 'Thoothukudi'),
(581, 'Tamil Nadu', 'Tiruchirappalli'),
(582, 'Tamil Nadu', 'Tirunelveli'),
(583, 'Tamil Nadu', 'Tirupattur'),
(584, 'Tamil Nadu', 'Tiruppur'),
(585, 'Tamil Nadu', 'Tiruvallur'),
(586, 'Tamil Nadu', 'Tiruvannamalai'),
(587, 'Tamil Nadu', 'Tiruvarur'),
(588, 'Tamil Nadu', 'Vellore'),
(589, 'Tamil Nadu', 'Viluppuram'),
(590, 'Tamil Nadu', 'Virudhunagar'),
(591, 'Telangana', 'Adilabad'),
(592, 'Telangana', 'Bhadradri Kothagudem'),
(593, 'Telangana', 'Hyderabad'),
(594, 'Telangana', 'Jagtial'),
(595, 'Telangana', 'Jangaon'),
(596, 'Telangana', 'Jayashankar'),
(597, 'Telangana', 'Jogulamba'),
(598, 'Telangana', 'Kamareddy'),
(599, 'Telangana', 'Karimnagar'),
(600, 'Telangana', 'Khammam'),
(601, 'Telangana', 'Komaram Bheem'),
(602, 'Telangana', 'Mahabubabad'),
(603, 'Telangana', 'Mahbubnagar'),
(604, 'Telangana', 'Mancherial'),
(605, 'Telangana', 'Medak'),
(606, 'Telangana', 'Medchal'),
(607, 'Telangana', 'Mulugu'),
(608, 'Telangana', 'Nagarkurnool'),
(609, 'Telangana', 'Nalgonda'),
(610, 'Telangana', 'Narayanpet'),
(611, 'Telangana', 'Nirmal'),
(612, 'Telangana', 'Nizamabad'),
(613, 'Telangana', 'Peddapalli'),
(614, 'Telangana', 'Rajanna Sircilla'),
(615, 'Telangana', 'Ranga Reddy'),
(616, 'Telangana', 'Sangareddy'),
(617, 'Telangana', 'Siddipet'),
(618, 'Telangana', 'Suryapet'),
(619, 'Telangana', 'Vikarabad'),
(620, 'Telangana', 'Wanaparthy'),
(621, 'Telangana', 'Warangal Rural'),
(622, 'Telangana', 'Warangal Urban'),
(623, 'Telangana', 'Yadadri Bhuvanagiri'),
(624, 'Tripura', 'Dhalai'),
(625, 'Tripura', 'Gomati'),
(626, 'Tripura', 'Khowai'),
(627, 'Tripura', 'North Tripura'),
(628, 'Tripura', 'Sepahijala'),
(629, 'Tripura', 'South Tripura'),
(630, 'Tripura', 'Unakoti'),
(631, 'Tripura', 'West Tripura'),
(632, 'Uttar Pradesh', 'Agra'),
(633, 'Uttar Pradesh', 'Aligarh'),
(634, 'Uttar Pradesh', 'Ambedkar Nagar'),
(635, 'Uttar Pradesh', 'Amethi'),
(636, 'Uttar Pradesh', 'Amroha'),
(637, 'Uttar Pradesh', 'Auraiya'),
(638, 'Uttar Pradesh', 'Ayodhya'),
(639, 'Uttar Pradesh', 'Azamgarh'),
(640, 'Uttar Pradesh', 'Baghpat'),
(641, 'Uttar Pradesh', 'Bahraich'),
(642, 'Uttar Pradesh', 'Ballia'),
(643, 'Uttar Pradesh', 'Balrampur'),
(644, 'Uttar Pradesh', 'Banda'),
(645, 'Uttar Pradesh', 'Barabanki'),
(646, 'Uttar Pradesh', 'Bareilly'),
(647, 'Uttar Pradesh', 'Basti'),
(648, 'Uttar Pradesh', 'Bhadohi'),
(649, 'Uttar Pradesh', 'Bijnor'),
(650, 'Uttar Pradesh', 'Budaun'),
(651, 'Uttar Pradesh', 'Bulandshahr'),
(652, 'Uttar Pradesh', 'Chandauli'),
(653, 'Uttar Pradesh', 'Chitrakoot'),
(654, 'Uttar Pradesh', 'Deoria'),
(655, 'Uttar Pradesh', 'Etah'),
(656, 'Uttar Pradesh', 'Etawah'),
(657, 'Uttar Pradesh', 'Farrukhabad'),
(658, 'Uttar Pradesh', 'Fatehpur'),
(659, 'Uttar Pradesh', 'Firozabad'),
(660, 'Uttar Pradesh', 'Gautam Buddha Nagar'),
(661, 'Uttar Pradesh', 'Ghaziabad'),
(662, 'Uttar Pradesh', 'Ghazipur'),
(663, 'Uttar Pradesh', 'Gonda'),
(664, 'Uttar Pradesh', 'Gorakhpur'),
(665, 'Uttar Pradesh', 'Hamirpur'),
(666, 'Uttar Pradesh', 'Hapur'),
(667, 'Uttar Pradesh', 'Hardoi'),
(668, 'Uttar Pradesh', 'Hathras'),
(669, 'Uttar Pradesh', 'Jalaun'),
(670, 'Uttar Pradesh', 'Jaunpur'),
(671, 'Uttar Pradesh', 'Jhansi'),
(672, 'Uttar Pradesh', 'Kannauj'),
(673, 'Uttar Pradesh', 'Kanpur Dehat'),
(674, 'Uttar Pradesh', 'Kanpur Nagar'),
(675, 'Uttar Pradesh', 'Kasganj'),
(676, 'Uttar Pradesh', 'Kaushambi'),
(677, 'Uttar Pradesh', 'Kheri'),
(678, 'Uttar Pradesh', 'Kushinagar'),
(679, 'Uttar Pradesh', 'Lalitpur'),
(680, 'Uttar Pradesh', 'Lucknow'),
(681, 'Uttar Pradesh', 'Maharajganj'),
(682, 'Uttar Pradesh', 'Mahoba'),
(683, 'Uttar Pradesh', 'Mainpuri'),
(684, 'Uttar Pradesh', 'Mathura'),
(685, 'Uttar Pradesh', 'Mau'),
(686, 'Uttar Pradesh', 'Meerut'),
(687, 'Uttar Pradesh', 'Mirzapur'),
(688, 'Uttar Pradesh', 'Moradabad'),
(689, 'Uttar Pradesh', 'Muzaffarnagar'),
(690, 'Uttar Pradesh', 'Pilibhit'),
(691, 'Uttar Pradesh', 'Pratapgarh'),
(692, 'Uttar Pradesh', 'Prayagraj'),
(693, 'Uttar Pradesh', 'Raebareli'),
(694, 'Uttar Pradesh', 'Rampur'),
(695, 'Uttar Pradesh', 'Saharanpur'),
(696, 'Uttar Pradesh', 'Sambhal'),
(697, 'Uttar Pradesh', 'Sant Kabir Nagar'),
(698, 'Uttar Pradesh', 'Shahjahanpur'),
(699, 'Uttar Pradesh', 'Shamli'),
(700, 'Uttar Pradesh', 'Shravasti'),
(701, 'Uttar Pradesh', 'Siddharthnagar'),
(702, 'Uttar Pradesh', 'Sitapur'),
(703, 'Uttar Pradesh', 'Sonbhadra'),
(704, 'Uttar Pradesh', 'Sultanpur'),
(705, 'Uttar Pradesh', 'Unnao'),
(706, 'Uttar Pradesh', 'Varanasi'),
(707, 'Uttarakhand', 'Almora'),
(708, 'Uttarakhand', 'Bageshwar'),
(709, 'Uttarakhand', 'Chamoli'),
(710, 'Uttarakhand', 'Champawat'),
(711, 'Uttarakhand', 'Dehradun'),
(712, 'Uttarakhand', 'Haridwar'),
(713, 'Uttarakhand', 'Nainital'),
(714, 'Uttarakhand', 'Pauri'),
(715, 'Uttarakhand', 'Pithoragarh'),
(716, 'Uttarakhand', 'Rudraprayag'),
(717, 'Uttarakhand', 'Tehri'),
(718, 'Uttarakhand', 'Udham Singh Nagar'),
(719, 'Uttarakhand', 'Uttarkashi'),
(720, 'West Bengal', 'Alipurduar'),
(721, 'West Bengal', 'Bankura'),
(722, 'West Bengal', 'Birbhum'),
(723, 'West Bengal', 'Cooch Behar'),
(724, 'West Bengal', 'Dakshin Dinajpur'),
(725, 'West Bengal', 'Darjeeling'),
(726, 'West Bengal', 'Hooghly'),
(727, 'West Bengal', 'Howrah'),
(728, 'West Bengal', 'Jalpaiguri'),
(729, 'West Bengal', 'Jhargram'),
(730, 'West Bengal', 'Kalimpong'),
(731, 'West Bengal', 'Kolkata'),
(732, 'West Bengal', 'Malda'),
(733, 'West Bengal', 'Murshidabad'),
(734, 'West Bengal', 'Nadia'),
(735, 'West Bengal', 'North 24 Parganas'),
(736, 'West Bengal', 'Paschim Bardhaman'),
(737, 'West Bengal', 'Paschim Medinipur'),
(738, 'West Bengal', 'Purba Bardhaman'),
(739, 'West Bengal', 'Purba Medinipur'),
(740, 'West Bengal', 'Purulia'),
(741, 'West Bengal', 'South 24 Parganas'),
(742, 'West Bengal', 'Uttar Dinajpur');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` text DEFAULT NULL,
  `address` text DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `pincode` varchar(10) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `password` text NOT NULL,
  `user_type` enum('admin','staff','packer','dispatcher') NOT NULL DEFAULT 'staff',
  `token` text DEFAULT NULL,
  `last_ip` text DEFAULT NULL,
  `last_login` text DEFAULT NULL,
  `platform` text DEFAULT NULL,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `role_id` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `address`, `state`, `city`, `pincode`, `email`, `phone`, `password`, `user_type`, `token`, `last_ip`, `last_login`, `platform`, `parent_id`, `role_id`, `created_at`, `updated_at`) VALUES
(1, 'asdf', 'asdf', NULL, NULL, NULL, 'admin@gmail.com', '9090909090', '123456', 'admin', '64fd4de71f6bbada585ff6c080fbd566', '127.0.0.1', '2025-03-24 13:03:40', 'Chrome / 134.0.0.0 / OS X', 0, 1, '2024-10-10 11:25:54', '2025-03-24 07:33:40'),
(6, 'Testing', NULL, 'Andaman Nicobar', NULL, NULL, 'vaibhav@clikzopinnovations.com', '0189229426', '123456', 'staff', NULL, NULL, NULL, NULL, 1, 2, '2025-03-24 09:34:33', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company_settings`
--
ALTER TABLE `company_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `number` (`number`) USING HASH;

--
-- Indexes for table `permission_mst`
--
ALTER TABLE `permission_mst`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reset_key`
--
ALTER TABLE `reset_key`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_permission`
--
ALTER TABLE `role_permission`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `state_city`
--
ALTER TABLE `state_city`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `company_settings`
--
ALTER TABLE `company_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `permission_mst`
--
ALTER TABLE `permission_mst`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `reset_key`
--
ALTER TABLE `reset_key`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `role_permission`
--
ALTER TABLE `role_permission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `state_city`
--
ALTER TABLE `state_city`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=743;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
