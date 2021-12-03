-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 17, 2018 at 10:57 AM
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
-- Table structure for table `community_centres`
--

CREATE TABLE `community_centres` (
  `id` int(11) NOT NULL,
  `city_id` int(11) DEFAULT NULL,
  `centre_name` varchar(128) DEFAULT NULL,
  `latitude` varchar(128) DEFAULT NULL,
  `longitude` varchar(128) DEFAULT NULL,
  `address` varchar(128) DEFAULT NULL,
  `urllink` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `community_centres`
--

INSERT INTO `community_centres` (`id`, `city_id`, `centre_name`, `latitude`, `longitude`, `address`, `urllink`) VALUES
(1, 3, 'Britannia', '49.2756', '-123.0738', '1661 Napier St', 'http://vancouver.ca/parks/cc/britannia/index.htm'),
(2, 3, 'Carnegie Centre', '49.2811', '-123.1001', '401 Main St', 'http://vancouver.ca/commsvcs/CARNEGIECENTRE/index.htm'),
(3, 3, 'Roundhouse', '49.2733', '-123.1217', '181 Roundhouse Mews', 'http://vancouver.ca/parks/cc/roundhouse/index.htm'),
(4, 3, 'Coal Harbour', '49.2902', '-123.1259', '480 Broughton St', 'http://vancouver.ca/parks/cc/westend/index.htm'),
(5, 3, 'Marpole-Oakridge', '49.2145', '-123.1275', '990 W 59th Av', 'http://vancouver.ca/parks/cc/marpole/index.htm'),
(6, 3, 'Mount Pleasant', '49.2643', '-123.1002', '1 Kingsway', 'http://vancouver.ca/parks/cc/mtpleasant/index.htm'),
(7, 3, 'Renfrew Park', '49.2524', '-123.043', '2929 E 22nd Av', 'http://vancouver.ca/parks/cc/renfrew/index.htm'),
(8, 3, 'Hillcrest', '49.2438', '-123.1079', '4575 Clancy Loranger Way', 'http://vancouver.ca/parks-recreation-culture/hillcrest-centre.aspx'),
(9, 3, 'Strathcona', '49.2798', '-123.0915', '601 Keefer St', 'http://vancouver.ca/parks/cc/strathcona/index.htm'),
(10, 3, 'Sunset', '49.2229', '-123.1006', '6810 Main St', 'http://vancouver.ca/parks/cc/sunset/index.htm'),
(11, 3, 'Thunderbird', '49.2636', '-123.0321', '2311 Cassiar St', 'http://vancouver.ca/parks/cc/thunderbird/index.htm'),
(12, 3, 'Trout Lake', '49.2553', '-123.0655', '3360 Victoria Drive', 'http://vancouver.ca/parks/cc/troutlake/index.htm'),
(13, 3, 'West End', '49.2899', '-123.1361', '870 Denman St', 'http://vancouver.ca/parks/cc/westend/index.htm'),
(14, 3, 'West Point Grey', '49.2718', '-123.2045', '4397 W 2nd Av', 'http://vancouver.ca/parks/cc/westptgrey/index.htm'),
(15, 3, 'False Creek', '49.2694', '-123.134', '1318 Cartwright St', 'http://vancouver.ca/parks/cc/falsecreek/index.htm'),
(16, 3, 'Champlain Heights', '49.2144', '-123.0321', '3350 Maquinna Drive', 'http://vancouver.ca/parks/cc/champla/index.htm'),
(17, 3, 'Ray-Cam Co-Operative Center', '49.2807', '-123.0841', '920 E Hastings St', 'http://vancouver.ca/parks/cc/raycam/index.htm'),
(18, 3, 'Douglas Park', '49.2529', '-123.1213', '801 W 22nd Av', 'http://vancouver.ca/parks/cc/douglas/index.htm'),
(19, 3, 'Dunbar', '49.2428', '-123.1883', '4747 Dunbar St', 'http://vancouver.ca/parks/cc/dunbar/index.htm'),
(20, 3, 'Hastings', '49.2809', '-123.0393', '3096 E Hastings St', 'http://vancouver.ca/parks/cc/hastings/index.htm'),
(21, 3, 'Kensington', '49.2385', '-123.0755', '5175 Dumfries St', 'http://vancouver.ca/parks/cc/kensington/index.htm'),
(22, 3, 'Kerrisdale', '49.2332', '-123.1571', '5851 West Boulevard', 'http://vancouver.ca/parks/cc/kerrisdale/index.htm'),
(23, 3, 'Killarney', '49.2274', '-123.0444', '6260 Killarney St', 'http://vancouver.ca/parks/cc/killarney/index.htm'),
(24, 3, 'Kitsilano War Memorial', '49.2621', '-123.1601', '2690 Larch St', 'http://vancouver.ca/parks/cc/kitsilano/index.htm'),
(25, 3, 'Creekside', '49.2718', '-123.1056', '1 Athletes Way', 'http://vancouver.ca/parks/cc/creekside/index.htm'),
(26, 3, 'Evelyne Saller Centre', '49.2839', '-123.0971', '320 Alexander St', 'http://vancouver.ca/parks-recreation-culture/evelyne-saller-centre.aspx'),
(27, 3, 'Gathering Place Community Centre', '49.278', '-123.1235', '609 Helmcken St', 'http://vancouver.ca/parks-recreation-culture/gathering-place-community-centre.aspx');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `community_centres`
--
ALTER TABLE `community_centres`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `community_centres`
--
ALTER TABLE `community_centres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
