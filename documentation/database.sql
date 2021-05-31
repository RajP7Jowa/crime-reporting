-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 30, 2021 at 11:55 PM
-- Server version: 8.0.25-0ubuntu0.20.04.1
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `station`
--

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

CREATE TABLE `applications` (
  `application_id` int NOT NULL,
  `ID_number` int NOT NULL,
  `Type` char(100) NOT NULL,
  `status` varchar(1000) NOT NULL DEFAULT 'Not issued'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `applications`
--

INSERT INTO `applications` (`application_id`, `ID_number`, `Type`, `status`) VALUES
(1, 2131231, 'abstract', 'Granted'),
(2, 3242342, 'certificate', 'Granted'),
(3, 30234231, 'abstract', 'Granted'),
(4, 12345678, 'certificate', 'Granted'),
(10, 30084857, 'certificate', 'Granted'),
(11, 30084857, 'abstract', 'Granted'),
(12, 2147483647, 'certificate', 'Granted'),
(13, 24, 'certificate', 'Granted'),
(14, 6570000, 'certificate', 'Granted'),
(15, 2131231, 'abstract', 'Not issued'),
(16, 2131231, 'certificate', 'Not issued'),
(17, 3242342, 'abstract', 'Not issued');

-- --------------------------------------------------------

--
-- Table structure for table `attempts`
--

CREATE TABLE `attempts` (
  `id` int NOT NULL,
  `ip` varchar(39) NOT NULL,
  `count` int NOT NULL,
  `expiredate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `attempts`
--

INSERT INTO `attempts` (`id`, `ip`, `count`, `expiredate`) VALUES
(0, '::1', 1, '2015-02-23 20:47:16');

-- --------------------------------------------------------

--
-- Table structure for table `config`
--

CREATE TABLE `config` (
  `id` int NOT NULL,
  `setting` varchar(100) NOT NULL,
  `value` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `config`
--

INSERT INTO `config` (`id`, `setting`, `value`) VALUES
(1, 'site_name', 'Speak Up'),
(2, 'site_url', 'localhost/policeStation/'),
(3, 'site_email', 'speakUp@gmail.com'),
(4, 'cookie_name', 'authID'),
(5, 'cookie_path', '/'),
(6, 'cookie_domain', NULL),
(7, 'cookie_secure', '0'),
(8, 'cookie_http', '0'),
(9, 'site_key', 'fghuior.)/%dgdhjUyhdbv7867HVHG7777ghg'),
(10, 'cookie_remember', '+1 month'),
(11, 'cookie_forget', '+30 minutes'),
(12, 'bcrypt_cost', '10'),
(13, 'table_attempts', 'attempts'),
(14, 'table_requests', 'requests'),
(15, 'table_sessions', 'sessions'),
(16, 'table_users', 'users'),
(17, 'site_timezone', 'nairobu');

-- --------------------------------------------------------

--
-- Table structure for table `crimes`
--

CREATE TABLE `crimes` (
  `Crime_No` int NOT NULL,
  `Status` char(100) NOT NULL DEFAULT 'No action',
  `Category` char(100) NOT NULL,
  `Description` char(100) NOT NULL,
  `Crime_Scene` char(100) NOT NULL,
  `Suspects` char(100) NOT NULL DEFAULT 'Not yet',
  `phoneNumber` int NOT NULL,
  `Address` varchar(100) NOT NULL,
  `evidence` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `crimes`
--

INSERT INTO `crimes` (`Crime_No`, `Status`, `Category`, `Description`, `Crime_Scene`, `Suspects`, `phoneNumber`, `Address`, `evidence`) VALUES
(1, '', 'Rape', 'This is terrible', 'Kisumu county', 'Not yet', 0, '', ''),
(2, 'No action', 'Robbery', 'This is terrible', 'Kisumu county, Nyalenda sub county, along western road road.', 'Not yet', 0, '', ''),
(3, 'No action', 'Robbery', 'A house has been broke into and valuables stollen', 'Kisumu county, Nyando sub county, Ahero Kisumu road road.', 'Not yet', 0, '', ''),
(4, 'No action', 'Looting', 'Students looting a shop', 'Uasin Gishu county, Ziwa sub county, along kapsoya Nairobi road road.', 'Not yet', 0, '', ''),
(5, 'No action', 'Rape', 'Rape case', 'Nakuru county, Kirinyaga sub county, along kapsoya Nairobi road road.', 'Not yet', 0, '', ''),
(6, 'No action', 'Robbery', 'Rape', 'Kisumu county, Nyakack sub county, along kapsoya Nairobi road road.', 'Not yet', 0, '', ''),
(7, 'No action', 'Theft', 'My door was brocken into and all my property stollen', 'Kisumu county, Nyakach sub county, Ziwa Kitale road road.', 'Not yet', 0, '', ''),
(8, 'No action', 'Theft', 'This was a bad crime....', 'Kisumu county, Nyakach sub county, Along ahero Kisumu road road.', 'Not yet', 0, '', ''),
(9, 'No action', 'Theft', 'Mb hasdjas iuasduiasd iasdasd iasduasid', 'Kisumu county, Nyakach sub county, along kapsoya Nairobi road road.', 'Not yet', 0, '', ''),
(10, 'No action', 'muder', 'man murdered', 'kenya county, kisumu sub county, ngara road.', 'Not yet', 0, '', ''),
(11, 'No action', 'ewfwqedrqefqf', 'qewfqdfqfe', 'eqfqwfq county, efqwfqewfwf sub county, eqfqefq road.', 'Not yet', 0, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `investigations`
--

CREATE TABLE `investigations` (
  `Crime_No` int NOT NULL,
  `Status` char(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `Item_NO` int NOT NULL,
  `Description` char(100) NOT NULL,
  `Last_Seen` date NOT NULL,
  `Item_Name` varchar(1000) NOT NULL,
  `category` char(100) NOT NULL,
  `status` char(100) NOT NULL DEFAULT 'Not found'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`Item_NO`, `Description`, `Last_Seen`, `Item_Name`, `category`, `status`) VALUES
(1, 'Lets see this one', '2015-03-07', 'Phone', 'found', ''),
(2, 'I want my phone back', '0000-00-00', 'Phone', 'Lost', 'Not found'),
(3, 'blackberry', '0000-00-00', 'phone', 'Lost', 'Not found'),
(4, 'mlkkl', '0000-00-00', 'phone', 'found', 'Not found'),
(5, 'good pen', '0000-00-00', 'pens', 'Lost', 'Not found'),
(6, 'mnj,km', '0000-00-00', 'phone', 'Lost', 'Not found'),
(7, 'hp', '0000-00-00', 'laptop', 'Lost', 'Not found');

-- --------------------------------------------------------

--
-- Table structure for table `lost_valuables`
--

CREATE TABLE `lost_valuables` (
  `id` int NOT NULL,
  `item_name` char(100) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `missing_persons`
--

CREATE TABLE `missing_persons` (
  `person_id` int NOT NULL,
  `fullName` char(100) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `phoneNumber` int NOT NULL,
  `Description` text NOT NULL,
  `Image` varchar(100) NOT NULL,
  `Status` varchar(50) NOT NULL DEFAULT 'Not Found',
  `alert` varchar(100) NOT NULL DEFAULT 'Not posted'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `missing_persons`
--

INSERT INTO `missing_persons` (`person_id`, `fullName`, `Address`, `phoneNumber`, `Description`, `Image`, `Status`, `alert`) VALUES
(9, 'johnson mnoma', '35 narok', 712328250, '24 hours ago', '_10306244_797234470365607_8536154666687153479_n.jpg', 'Not Found', 'Not posted'),
(10, 'johhy', '35 narok', -989899898, '34 hours ago', '_564050_613612385333985_277754793_n.jpg', 'Not Found', 'post'),
(11, 'peter', '56 nai', 87788787, 'todat', '_564050_613612385333985_277754793_n.jpg', 'Found', 'post'),
(12, 'peter', '35 narok', 678975, '24 hours ago', '_8YuHf.jpg', 'Not Found', 'post'),
(13, 'Emmanuel Ongogo', '9647 Kisumu', 720482575, '2015-04-09', '_389586_247117228752607_390896264_n.jpg', 'Not Found', 'post');

-- --------------------------------------------------------

--
-- Table structure for table `missing_vehicles`
--

CREATE TABLE `missing_vehicles` (
  `vehicle_id` int NOT NULL,
  `Number_plate` varchar(100) NOT NULL,
  `Model` varchar(200) NOT NULL,
  `Owner` varchar(100) NOT NULL,
  `phoneNumber` int NOT NULL,
  `national_id` int NOT NULL,
  `description` text NOT NULL,
  `image` text NOT NULL,
  `reviewed` varchar(1000) NOT NULL DEFAULT 'Not reviewed'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `missing_vehicles`
--

INSERT INTO `missing_vehicles` (`vehicle_id`, `Number_plate`, `Model`, `Owner`, `phoneNumber`, `national_id`, `description`, `image`, `reviewed`) VALUES
(1, 'KBC 56k8', 'Toyota', 'Emmanuel Ongogo', 720482575, 2147483647, 'My prado..', 'img1.jpg', 'Found'),
(2, 'KCA 740C', 'Land cruiser', 'Johnson Okidi', 723746235, 301923212, 'Its white in color and classic in model', '_img3.jpg', 'post'),
(3, 'KBW 678K', 'Toyota', 'Silvanus', 723456987, 435435345, 'A white toyota', '_deborah_business.jpg', 'Found'),
(4, 'KAA 333U', 'toyota', 'koech', 7888888, 54678, 'yellow', '_img_20131209_150159794_001.jpg', 'Found'),
(5, 'dcdc', 'sdcdsc', 'sdcd', 34, 543, '34534', '_10919006_10153059948666663_319975267898663467_n.jpg', 'post'),
(7, 'KBC', 'SUBARU', 'johnson frankllin', 712328250, 30084857, 'four wheeel drive', '_10306244_797234470365607_8536154666687153479_n.jpg', 'post'),
(8, 'KBC', 'SUBARU', 'JOHNSON', 712328250, 34543234, 'black', '_66505_371710972906319_1645795297_n.jpg', 'Not reviewed');

-- --------------------------------------------------------

--
-- Table structure for table `missing_vehicles_found`
--

CREATE TABLE `missing_vehicles_found` (
  `vehicle_id` int NOT NULL,
  `Number_plate` varchar(100) NOT NULL,
  `Model` varchar(200) NOT NULL,
  `location_seen` varchar(100) NOT NULL,
  `phoneNumber` int NOT NULL,
  `national_id` int NOT NULL,
  `description` text NOT NULL,
  `image` text NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'Not reviewed'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `missing_vehicles_found`
--

INSERT INTO `missing_vehicles_found` (`vehicle_id`, `Number_plate`, `Model`, `location_seen`, `phoneNumber`, `national_id`, `description`, `image`, `status`) VALUES
(2, 'KBC 56k8', 'prado', 'Komarock', 734765234, 965678, 'cdsdcfvgbuhgvyj', 'img1.jpg', 'reviewed'),
(3, 'KBW 678K', 'Toyota', 'Kisumu', 734765234, 324234234, 'White toyota', '_deborah_business.jpg', 'reviewed'),
(4, 'KAA 333U', 'subaru', 'kisumu', 2147483647, 2147483647, 'abandoned', '_10408877_797234410365613_3173149416354206805_n.jpg', 'reviewed'),
(5, 'KAC', 'subaru', 'kisumu', 99876578, 787, 'brown', '_safe_image_004.jpg', 'reviewed'),
(6, 'KAA 333U', 'subaru', 'kisumu', 2147483647, 2147483647, 'hl.iug', '_8YuHf.jpg', 'reviewed');

-- --------------------------------------------------------

--
-- Table structure for table `persons`
--

CREATE TABLE `persons` (
  `firstName` char(100) NOT NULL,
  `lastName` char(100) NOT NULL,
  `ID_Number` int NOT NULL,
  `Location` char(100) NOT NULL,
  `Gender` char(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `persons`
--

INSERT INTO `persons` (`firstName`, `lastName`, `ID_Number`, `Location`, `Gender`) VALUES
('a', 'a', 0, 'kenya', 'm'),
('a', 'a', 222, 'kenya', 'm'),
('James', 'Boaz', 2131231, 'Eldoret', 'm'),
('Brian', 'Chemutai', 3242342, 'Kisumu', 'm'),
('raj', 'parihar', 12313132, 'india', 'm'),
('Johnson', 'Didinya', 12345678, 'Kisumu', 'm'),
('Fabian', 'ocham', 19828292, 'kenya', 'm'),
('Alfred', 'Mwangi', 30194285, 'Kisumu', 'm'),
('Emmauel', 'Steve', 30234231, 'Kisumu', 'm');

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `id` int NOT NULL,
  `uid` int NOT NULL,
  `rkey` varchar(20) NOT NULL,
  `expire` datetime NOT NULL,
  `type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` int NOT NULL,
  `uid` int NOT NULL,
  `hash` varchar(40) NOT NULL,
  `expiredate` datetime NOT NULL,
  `ip` varchar(39) NOT NULL,
  `agent` varchar(200) NOT NULL,
  `cookie_crc` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `uid`, `hash`, `expiredate`, `ip`, `agent`, `cookie_crc`) VALUES
(0, 1, '66442538ef7c20ded1ac034cfe791747b2280509', '2015-03-23 20:17:36', '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:36.0) Gecko/20100101 Firefox/36.0', '0d9a3acc2cef71e12f75719cb343f1f1010db5a0');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `password` varchar(60) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `password`, `email`) VALUES
(1, '1234', 'admin@admin.com'),
(2, '1234', 'user@user.com'),
(222, '11', 'didinkaj@gmail.com'),
(2131231, '6c03ac0ea7241c3b2e2b7d54ff1db5f5539dc198', 'jayb2oteno@gmail.com'),
(3242342, '6c03ac0ea7241c3b2e2b7d54ff1db5f5539dc198', 'jabu@gmail.com'),
(12313132, '1234', 'raj.parihar@yopmail.com'),
(12345678, 'ace893fb2c9553a38a873fb03d0e21a406b351a1', 'john@gmail.com'),
(19828292, '1234', 'fab@gmail.com'),
(30194285, 'qwertyui', 'alfred@gmail.com'),
(30234231, 'f78539c7f2beb3d398d69246d42bef48e94d3375', 'jabu@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`application_id`);

--
-- Indexes for table `attempts`
--
ALTER TABLE `attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `config`
--
ALTER TABLE `config`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `crimes`
--
ALTER TABLE `crimes`
  ADD PRIMARY KEY (`Crime_No`);

--
-- Indexes for table `investigations`
--
ALTER TABLE `investigations`
  ADD KEY `Crime_No` (`Crime_No`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`Item_NO`);

--
-- Indexes for table `lost_valuables`
--
ALTER TABLE `lost_valuables`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `missing_persons`
--
ALTER TABLE `missing_persons`
  ADD PRIMARY KEY (`person_id`);

--
-- Indexes for table `missing_vehicles`
--
ALTER TABLE `missing_vehicles`
  ADD PRIMARY KEY (`vehicle_id`);

--
-- Indexes for table `missing_vehicles_found`
--
ALTER TABLE `missing_vehicles_found`
  ADD PRIMARY KEY (`vehicle_id`);

--
-- Indexes for table `persons`
--
ALTER TABLE `persons`
  ADD PRIMARY KEY (`ID_Number`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applications`
--
ALTER TABLE `applications`
  MODIFY `application_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `crimes`
--
ALTER TABLE `crimes`
  MODIFY `Crime_No` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `Item_NO` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `lost_valuables`
--
ALTER TABLE `lost_valuables`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `missing_persons`
--
ALTER TABLE `missing_persons`
  MODIFY `person_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `missing_vehicles`
--
ALTER TABLE `missing_vehicles`
  MODIFY `vehicle_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `missing_vehicles_found`
--
ALTER TABLE `missing_vehicles_found`
  MODIFY `vehicle_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
