-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.11
-- Generation Time: Dec 04, 2023 at 08:49 PM
-- Server version: 10.6.15-MariaDB-cll-lve
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u459866298_pokemon_go`
--

-- --------------------------------------------------------

--
-- Table structure for table `cm_employee`
--

CREATE TABLE `cm_employee` (
  `emp_id` int(11) NOT NULL COMMENT 'PK',
  `emp_prefix_id` int(11) NOT NULL COMMENT 'รหัสคำนำหน้า',
  `emp_first_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'ชื่อ',
  `emp_last_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'นามสกุล',
  `emp_gender_id` int(11) NOT NULL COMMENT 'รหัสตารางเพศ',
  `emp_email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'email',
  `emp_telephone` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'เบอร์โทรศัพท์',
  `emp_pic` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `emp_status` char(1) NOT NULL DEFAULT 'Y' COMMENT 'Y = ปกติ, N=ถูกลบ',
  `emp_username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'username',
  `emp_password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'password',
  `emp_create` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'วันเวลาที่เพิ่มข้อมูล',
  `emp_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT 'วันเวลาที่แก้ไขข้อมูลล่าสุด'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='ข้อมูลพนักงาน';

--
-- Dumping data for table `cm_employee`
--

INSERT INTO `cm_employee` (`emp_id`, `emp_prefix_id`, `emp_first_name`, `emp_last_name`, `emp_gender_id`, `emp_email`, `emp_telephone`, `emp_pic`, `emp_status`, `emp_username`, `emp_password`, `emp_create`, `emp_update`) VALUES
(1, 1, 'ประภากร', 'ธนสรศักดิ์ประภาพร', 1, 'prapakon.t@gmail.com', '0876543210', 'pic-1.webp', 'Y', 'prapakon', '3e359ec80841c4919e32a95404088862', '2023-12-04 08:26:15', '2023-12-05 01:29:48'),
(2, 2, 'วิภาพร', 'วิภาพร', 2, 'wipapon@gmail.com', '0222222222', 'pic-2.jpg', 'Y', 'wipapon', '3e359ec80841c4919e32a95404088862', '2023-12-04 17:32:26', '2023-12-05 02:57:51'),
(3, 3, 'ดวงกมล', 'ดวงกมล', 2, 'duanjong@gmail.com', '011111111', 'pic-3.jpg', 'Y', 'duanjong', '8b8dbf6d585c9da200d13a4353405820', '2023-12-04 17:34:18', '2023-12-05 02:57:39'),
(4, 1, 'ประพันธ์', 'สรัญรัตน์', 1, 'prapun@gmail.com', '0598745182', 'pic-8.jpg', 'Y', 'prapun', '1337b65b235d44d90990441559fad2c2', '2023-12-05 03:01:48', '2023-12-05 03:08:43'),
(5, 3, 'รสา', 'ระวีช่วงโชติ', 2, 'rasa', 'kkkk', 'pic-5.jpg', 'Y', 'ksd;fja', '86ed6cd3f18e6f616f7038764be50a77', '2023-12-04 18:02:19', '2023-12-05 01:27:38'),
(6, 3, 'อรสา', 'ประภาพร', 2, 'Orasa', 'Prapapon', 'pic-6.jpg', 'Y', 'username', 'c62100d89a1ef936db9bad9324a3d934', '2023-12-04 18:02:57', '2023-12-05 02:58:02'),
(7, 3, 'กรกนก', 'คนตลก', 3, 'konkanok', '0555555', 'default-profile.jpg', 'N', '123', '1af66e51ecc89ede88076d754e7effc8', '2023-12-04 18:06:17', '2023-12-04 18:56:56'),
(8, 3, 'กนกรัตน์', 'วงศ์เทวา', 2, 'Inwzaa2586@gmail.com', '0942587484', 'pic-8.jpeg', 'Y', 'inwzaa2586', '955220b44f141f20273ae240a2e51330', '2023-12-05 03:07:43', '2023-12-05 03:07:43');

-- --------------------------------------------------------

--
-- Table structure for table `cm_gender`
--

CREATE TABLE `cm_gender` (
  `gender_id` int(11) NOT NULL COMMENT 'PK',
  `gender_name` varchar(20) NOT NULL COMMENT 'ชื่อเพศ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='เพศ';

--
-- Dumping data for table `cm_gender`
--

INSERT INTO `cm_gender` (`gender_id`, `gender_name`) VALUES
(1, 'ชาย'),
(2, 'หญิง'),
(3, 'ไม่ระบุ');

-- --------------------------------------------------------

--
-- Table structure for table `cm_prefix`
--

CREATE TABLE `cm_prefix` (
  `prefix_id` int(11) NOT NULL COMMENT 'PK',
  `prefix_name` varchar(255) NOT NULL COMMENT 'คำนำหน้าชื่อ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='คำนำหน้าชื่อ';

--
-- Dumping data for table `cm_prefix`
--

INSERT INTO `cm_prefix` (`prefix_id`, `prefix_name`) VALUES
(1, 'นาย'),
(2, 'นาง'),
(3, 'นางสาว');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cm_employee`
--
ALTER TABLE `cm_employee`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indexes for table `cm_gender`
--
ALTER TABLE `cm_gender`
  ADD PRIMARY KEY (`gender_id`);

--
-- Indexes for table `cm_prefix`
--
ALTER TABLE `cm_prefix`
  ADD PRIMARY KEY (`prefix_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cm_employee`
--
ALTER TABLE `cm_employee`
  MODIFY `emp_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'PK', AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
