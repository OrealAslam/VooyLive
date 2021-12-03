-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 17, 2018 at 11:00 AM
-- Server version: 5.7.21-0ubuntu0.16.04.1
-- PHP Version: 7.2.4-1+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `site_communityfeaturesheet`
--

-- --------------------------------------------------------

--
-- Table structure for table `demographic`
--

CREATE TABLE `demographic` (
  `id` int(11) NOT NULL,
  `city_id` int(11) DEFAULT NULL,
  `neighborhood_id` int(11) DEFAULT NULL,
  `median_age` float DEFAULT NULL,
  `age_0_9` float DEFAULT NULL,
  `age_10_19` float DEFAULT NULL,
  `age_20_34` float DEFAULT NULL,
  `age_35_49` float DEFAULT NULL,
  `age_50_54` float DEFAULT NULL,
  `age_55_64` float DEFAULT NULL,
  `age_65_over` float DEFAULT NULL,
  `avg_total_income` float DEFAULT NULL,
  `owner` float DEFAULT NULL,
  `renter` float DEFAULT NULL,
  `edu_university` float DEFAULT NULL,
  `edu_college_certificate_diploma` float DEFAULT NULL,
  `edu_trades` float DEFAULT NULL,
  `edu_other` float DEFAULT NULL,
  `edu_high_school` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `demographic`
--

INSERT INTO `demographic` (`id`, `city_id`, `neighborhood_id`, `median_age`, `age_0_9`, `age_10_19`, `age_20_34`, `age_35_49`, `age_50_54`, `age_55_64`, `age_65_over`, `avg_total_income`, `owner`, `renter`, `edu_university`, `edu_college_certificate_diploma`, `edu_trades`, `edu_other`, `edu_high_school`) VALUES
(1, 3, 1, 46.2, 1140, 2110, 2540, 2875, 1310, 1855, 3480, 83073, 3875, 2250, 4820, 1040, 215, 260, 1270),
(2, 3, 2, 37.1, 3185, 1990, 22610, 15985, 4160, 7335, 6760, 74738, 15030, 20070, 26930, 7100, 1715, 1325, 6430),
(3, 3, 3, 44.1, 1900, 3450, 3545, 4115, 1895, 2860, 3660, 97207, 5885, 1635, 7175, 1440, 290, 280, 1560),
(4, 3, 4, 40.2, 2000, 1235, 10285, 7965, 2110, 4125, 5895, 71075, 8175, 11340, 14415, 3880, 865, 370, 2925),
(5, 3, 5, 38.1, 2345, 1695, 8695, 7480, 2025, 3500, 3435, 46501, 5455, 9580, 9260, 3700, 1245, 1755, 4105),
(6, 3, 6, 42.1, 3070, 3305, 7630, 7180, 2800, 4545, 6040, 42461, 7515, 5210, 6630, 3505, 1345, 2600, 5485),
(7, 3, 7, 38.8, 4905, 4790, 12000, 11145, 3570, 6030, 6875, 42676, 9960, 7935, 11810, 4915, 1745, 3725, 6940),
(8, 3, 8, 45.6, 1030, 1895, 2615, 2560, 1245, 1930, 2700, 96603, 3670, 1860, 4555, 875, 175, 225, 1230),
(9, 3, 9, 43.4, 2700, 3245, 5550, 6015, 2395, 4265, 5150, 43904, 6375, 4285, 6575, 3135, 925, 1540, 4035),
(10, 3, 10, 37.7, 3125, 2615, 13630, 9835, 2895, 5025, 5925, 72653, 9930, 13025, 18295, 4345, 1235, 540, 3700),
(11, 3, 11, 42.2, 1760, 2285, 6060, 5050, 2135, 3400, 3780, 42306, 4490, 6410, 7120, 2465, 775, 805, 3330),
(12, 3, 12, 35.5, 2475, 1235, 12310, 8970, 2025, 3120, 2825, 60100, 7035, 10955, 13755, 4430, 1185, 1050, 3855),
(13, 3, 13, 45.1, 970, 1425, 2770, 2250, 1010, 1680, 2910, 53357, 3080, 1940, 3910, 885, 255, 365, 1300),
(14, 3, 14, 40, 4180, 4945, 13145, 10410, 4115, 6830, 7910, 37413, 11010, 7855, 10415, 5205, 1905, 4245, 8235),
(15, 3, 15, 39.3, 2335, 2145, 5300, 5135, 1700, 2665, 3260, 60673, 5130, 3700, 7665, 2225, 595, 650, 2290),
(16, 3, 16, 45.7, 675, 1075, 1625, 1450, 665, 1135, 1820, 172746, 2145, 730, 2745, 515, 100, 155, 610),
(17, 3, 17, 40.2, 725, 755, 1850, 1785, 530, 885, 1435, 76952, 1860, 1300, 2855, 780, 135, 105, 640),
(18, 3, 18, 48.3, 725, 710, 2420, 2775, 1080, 2095, 2775, 33190, 1125, 4725, 1915, 1040, 430, 1135, 1340),
(19, 3, 19, 38.7, 3475, 4555, 8325, 7735, 2610, 4245, 5550, 38556, 6185, 5410, 7745, 3075, 1205, 2625, 5185),
(20, 3, 20, 44.3, 2385, 3305, 6500, 5680, 2450, 4580, 6185, 38075, 6200, 3970, 5365, 2885, 965, 2590, 5000),
(21, 3, 21, 38.4, 1525, 1025, 17615, 11175, 3230, 5625, 7000, 52908, 6135, 24685, 19115, 6640, 1725, 1060, 5880),
(22, 3, 22, 43.9, 1090, 1725, 2605, 2385, 1030, 1725, 2510, 109517, 3325, 2015, 4435, 880, 155, 120, 895);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `demographic`
--
ALTER TABLE `demographic`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `demographic`
--
ALTER TABLE `demographic`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
