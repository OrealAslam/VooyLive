-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 13, 2018 at 10:15 AM
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
-- Table structure for table `libraries`
--

CREATE TABLE `libraries` (
  `id` int(11) NOT NULL,
  `library_system` varchar(128) DEFAULT NULL,
  `branch_name` varchar(128) DEFAULT NULL,
  `branch_unique_id` varchar(128) DEFAULT NULL,
  `school_district_served` varchar(128) DEFAULT NULL,
  `phone` varchar(128) DEFAULT NULL,
  `physical_address` varchar(128) DEFAULT NULL,
  `city` varchar(128) DEFAULT NULL,
  `province` varchar(128) DEFAULT NULL,
  `postal_code` varchar(128) DEFAULT NULL,
  `latitude` varchar(128) DEFAULT NULL,
  `longitude` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `libraries`
--

INSERT INTO `libraries` (`id`, `library_system`, `branch_name`, `branch_unique_id`, `school_district_served`, `phone`, `physical_address`, `city`, `province`, `postal_code`, `latitude`, `longitude`) VALUES
(1, 'Alert Bay Public Library & Museum', 'Alert Bay Public Library & Museum', 'BABM001', '85', '(250) 974-5721', '118 Fir Street', 'Alert Bay', 'BC', 'V0N 1A0', '50.577201', '-126.90657'),
(2, 'Beaver Valley Public Library', 'Beaver Valley Public Library', 'BFBV001', '20', '(250) 367-7114', '1847 - 1st Street', 'Fruitvale', 'BC', 'V0G 1L0', '49.11381', '-117.550079'),
(3, 'Bowen Island Public Library', 'Bowen Island Public Library', 'BBI001', '45', '(604) 947-9788', '430 Bowen Island Trunk', 'Bowen Island', 'BC', 'V0N 1G0', '49.379668', '-123.333937'),
(4, 'Burnaby Public Library', 'Bob Prittie Metrotown Branch', 'BB001', '41', '(604) 436-5427', '6100 Willingdon Avenue', 'Burnaby', 'BC', 'V5H 4N5', '49.228683', '-123.006456'),
(5, 'Burnaby Public Library', 'Cameron', 'BB002', '41', '(604) 421-5454', '9523 Cameron Street', 'Burnaby', 'BC', 'V3J 1L6', '49.253462', '-122.899745'),
(6, 'Burnaby Public Library', 'Tommy Douglas Branch', 'BB004', '41', '(604) 522-3971', '7311 Kingsway', 'Burnaby', 'BC', 'V5E 1G8', '49.281898', '-123.000644'),
(7, 'Burnaby Public Library', 'McGill', 'BB003', '41', '(604) 299-8955', '4595 Albert St', 'Burnaby', 'BC', 'V5C 2G6', '49.218365', '-122.953688'),
(8, 'Burns Lake Public Library', 'Burns Lake Public Library', 'BBUL001', '91', '(250) 692-3192', '585 Government Street', 'Burns Lake', 'BC', 'V0J 1E0', '54.231245', '-125.764894'),
(9, 'Cariboo Regional District Library System', 'Alexis Creek', 'BWLC002', '27', '(250) 394-4346', '7651 Yells Road', 'Alexis Creek', 'BC', 'V0L 1A0', '52.08521', '-123.276801'),
(10, 'Cariboo Regional District Library System', 'Anahim Lake', 'BWLC003', '27', '(250) 742- 2056', 'Unit #1 - 2409 Whispering Pines Trailer Court, Hwy 20', 'Anahim Lake', 'BC', 'V0L 1C0', '52.459101', '-125.301491'),
(11, 'Cariboo Regional District Library System', 'Big Lake', 'BWLC004', '59', '(250) 243-2355', '4056 Lakeview Rd', 'Big Lake', 'BC', 'V0L 1G0', '52.41529', '-121.847499'),
(12, 'Cariboo Regional District Library System', 'Bridge Lake', 'BWLC005', '27', '(250 593-4545', '7567 Bridge Lake Road', 'Bridge Lake', 'BC', 'V0K 1E0', '51.53757', '-120.786749'),
(13, 'Cariboo Regional District Library System', 'Forest Grove', 'BWLC006', '27', '(250) 397-2927', '4485 Eagle Creek Road', 'Forest Grove', 'BC', 'V0K 1M0', '51.84176', '-121.024609'),
(14, 'Cariboo Regional District Library System', 'Horsefly', 'BWLC007', '27', '(250) 620-3345', '5779 Walters Drive', 'Horsefly', 'BC', 'V0L 1L0', '52.333719', '-121.420555'),
(15, 'Cariboo Regional District Library System', 'Lac La Hache', 'BWLC008', '27', '(250) 396-7642', '4787 Clark Avenue', 'Lac La Hache', 'BC', 'V0K 1T0', '51.82892', '-121.533203'),
(16, 'Cariboo Regional District Library System', 'Likely', 'BWLC009', '27', '(250) 790-2234', '6163 Keithly Creek Road', 'Likely', 'BC', 'V0L 1N0', '52.621083', '-121.535935'),
(17, 'Cariboo Regional District Library System', 'McLeese Lake', 'BWLC010', '27', '(250) 297-6533', '6749 Highway 97 N', 'McLeese Lake', 'BC', 'V0L 1P0', '52.409823', '-122.286079'),
(18, 'Cariboo Regional District Library System', 'Nazko', 'BWLC011', '28', '(250) 249-5289', '1351 Palmer Road', 'Quesnel', 'BC', 'V2J 3H9', '52.945292', '-123.577625'),
(19, 'Cariboo Regional District Library System', 'Tatla Lake', 'BWLC013', '27', '(250) 476-3424', '16451 Chilcotin Highway 20', 'Tatla Lake', 'BC', 'V0L 1V0', '51.9052811', '-124.5945904'),
(20, 'Cariboo Regional District Library System', '100 Mile House Branch', 'BWLC001', '27', '(250) 395-2332', '449 S. Birch Avenue', '100 Mile House', 'BC', 'V0K 2E0', '51.64139', '-121.29562'),
(21, 'Cariboo Regional District Library System', 'Quesnel Branch', 'BWLC012', '28', '(250) 992-7912', '101 - #410 Kinchant Street', 'Quesnel', 'BC', 'V2J 7J5', '52.979328', '-122.493927'),
(22, 'Cariboo Regional District Library System', 'Wells Branch', 'BWLC014', '28', '(250) 994-3424', '4269 Saunders Avenue', 'Wells', 'BC', 'V0K 2R0', '53.104898', '-121.572226'),
(23, 'Cariboo Regional District Library System', 'Williams Lake', 'BWLC015', '27', '(250) 392-3630', 'Suite A - 180 North 3rd Avenue', 'Williams Lake', 'BC', 'V2G 2A4', '52.13175', '-122.139817'),
(24, 'Castlegar & District Public Library', 'Castlegar & District Public Library', 'BCD001', '20', '(250) 365-6611', '1005 Third Street', 'Castlegar', 'BC', 'V1N 2A2', '49.326463', '-117.663205'),
(25, 'Chetwynd Public Library', 'Chetwynd Public Library', 'BCHE001', '59', '(250) 788-2559', '5012 - 46th Street', 'Chetwynd', 'BC', 'V0C 1J0', '55.695967', '-121.613889'),
(26, 'Coquitlam Public Library', 'Coquitlam Public Library ', 'BCOQ002', '43', '(604) 937-4141', '575 Poirier Street', 'Coquitlam', 'BC', 'V3J 6A9', '49.253185', '-122.846541'),
(27, 'Coquitlam Public Library', 'City Centre Branch', 'BCOQ001', '43', '(604) 554-7323', '1169 Pinetree Way', 'Coquitlam', 'BC', 'V3B 0Y1', '49.284268', '-122.79557'),
(28, 'Coquitlam Public Library', 'Library Link', 'BCOQ003', '43', 'n.d.', 'n.d.', 'Coquitlam', 'BC', 'n.d.', '49.284268', '-122.79555'),
(29, 'Cranbrook Public Library', 'Cranbrook Public Library', 'BCR001', '5', '(250) 426-4063', '1212 2nd Street N', 'Cranbrook', 'BC', 'V1C 4T6', '49.513908', '-115.764565'),
(30, 'Creston and District Public Library', 'Creston and District Public Library', 'BCRE001', '8', '(250) 428-4141', '531 - 16th Avenue S', 'Creston', 'BC', 'V0B 1G5', '49.090049', '-116.505477'),
(31, 'Dawson Creek Municipal Public Library', 'Dawson Creek Municipal Public Library', 'BDC001', '59', '(250) 782-4661', '1001 McKellar Avenue', 'Dawson Creek', 'BC', 'V1G 4W7', '55.753764', '-120.234247'),
(32, 'Elkford Public Library', 'Elkford Public Library', 'BELK001', '5', '(250) 865-2912', '816 Michel Road', 'Elkford', 'BC', 'V0B 1H0', '50.024766', '-114.921278'),
(33, 'Fernie Public Library', 'Fernie Public Library', 'BF001', '5', '(250) 423-4458', '492 Third Avenue', 'Fernie', 'BC', 'V0B 1M0', '49.503354', '-115.06284'),
(34, 'Fort Nelson Public Library', 'Fort Nelson Public Library', 'BFN001', '81', '(250) 774-6777', '5315 - 50th Avenue S', 'Fort Nelson', 'BC', 'V0C 1R0', '58.80442', '-122.706149'),
(35, 'Fort St. James Centennial Library', 'Fort St. James Centennial Library', 'BFSJA001', '91', '(250) 996-7431', '425 Manson Street', 'Fort St. James', 'BC', 'V0J 1P0', '54.445248', '-124.255224'),
(36, 'Fort St. John Public Library Association', 'Fort St. John Public Library Association', 'BFSJ001', '60', '(250) 785-3731', '10015 - 100th Avenue', 'Fort St. John', 'BC', 'V1J 1Y7', '56.246452', '-120.848044'),
(37, 'Fraser Lake Public Library', 'Fraser Lake Public Library', 'BFRL001', '91', '(250) 699-8888', '280 Endako Avenue', 'Fraser Lake', 'BC', 'V0J 1S0', '54.056412', '-124.846697'),
(38, 'Fraser Valley Regional Library', 'Administrative Centre', 'BABF001', '34', '1 (888) 668-4141', '34589 Delair Rd', 'Abbotsford', 'BC', 'V2S 5Y1', '49.036617', '-122.266378'),
(39, 'Fraser Valley Regional Library', 'Abbotsford Community Library', 'BABF016', '34', '(604) 853-1753', '33660 South Fraser Way', 'Abbotsford', 'BC', 'V2S 2B9', '49.055028', '-122.328655'),
(40, 'Fraser Valley Regional Library', 'Agassiz Library', 'BABF002', '78', '(604) 796-9510', '7140 Cheam Ave', 'Agassiz', 'BC', 'V0M 1A0', '49.243554', '-121.992562'),
(41, 'Fraser Valley Regional Library', 'Aldergrove Library', 'BABF003', '35', '(604) 856-6415', '26770-29th Avenue', 'Aldergrove', 'BC', 'V4W 3B8', '49.055541', '-122.481863'),
(42, 'Fraser Valley Regional Library', 'Boston Bar Library', 'BABF004', '78', '(604) 867-8847', '47643 Old Boston Bar Road', 'Boston Bar', 'BC', 'V0K 1C0', '49.860949', '-121.440379'),
(43, 'Fraser Valley Regional Library', 'Brookswood Library', 'BABF005', '35', '(604) 534-7055', '20045 - 40th Avenue', 'Langley', 'BC', 'V3A 2W2', '49.074725', '-122.668615'),
(44, 'Fraser Valley Regional Library', 'Chilliwack Library', 'BABF006', '33', '(604) 792-1941', '45860 First Avenue', 'Chilliwack', 'BC', 'V2P 7K1', '49.168253', '-121.955032'),
(45, 'Fraser Valley Regional Library', 'Clearbrook Library', 'BABF008', '34', '(604) 859-7814', '32320 George Ferguson Way', 'Abbotsford', 'BC', 'V2T 6N4', '49.052125', '-122.345235'),
(46, 'Fraser Valley Regional Library', 'Fort Langley Library', 'BABF009', '35', '(604) 888-0722', '9167 Glover Road', 'Fort Langley', 'BC', 'V1M 2R6', '49.169014', '-122.579297'),
(47, 'Fraser Valley Regional Library', 'George Mackie Library', 'BABF010', '37', '(604) 594-8155', '8440 - 112th Street', 'Delta', 'BC', 'V4C 4W9', '49.156793', '-122.912391'),
(48, 'Fraser Valley Regional Library', 'Hope Library', 'BABF011', '78', '(604) 869-2313', '1005 - 6th Avenue', 'Hope', 'BC', 'V0X 1L0', '49.377998', '-121.431461'),
(49, 'Fraser Valley Regional Library', 'Ladner Pioneer Library', 'BABF012', '37', '(604) 946-6215', '4683 - 51st Street', 'Delta', 'BC', 'V4K 2V8', '49.087117', '-123.08266'),
(50, 'Fraser Valley Regional Library', 'Langley City Library', 'BABF007', '35', '(604) 514-2850', '20399 Douglas Crescent', 'Langley', 'BC', 'V3A 4B3', '49.103549', '-122.65676'),
(51, 'Fraser Valley Regional Library', 'Maple Ridge Public Library', 'BABF013', '42', '(604) 467-7417', '130 - 22470 Dewdney Trunk Road', 'Maple Ridge', 'BC', 'V2X 5Z6', '49.22046', '-122.600057'),
(52, 'Fraser Valley Regional Library', 'Mission Library', 'BABF014', '75', '(604) 826-6610', '33247 - 2nd Avenue', 'Mission', 'BC', 'V2V 1J7', '49.135283', '-122.303564'),
(53, 'Fraser Valley Regional Library', 'Mount Lehman Library', 'BABF015', '34', '(604) 856-4988', '5875 Mt. Lehman Road', 'Abbotsford', 'BC', 'V4X 1V5', '49.109047', '-122.381877'),
(54, 'Fraser Valley Regional Library', 'Muriel Arnason Library', 'BABF017', '35', '(604) 532-3590', '130 - 20338 65th Avenue', 'Langley', 'BC', 'V2Y 2X3', '49.12069', '-122.656765'),
(55, 'Fraser Valley Regional Library', 'Murrayville Library', 'BABF018', '35', '(604) 533-0339', 'Unit 100 - 22071 48th Avenue', 'Langely', 'BC', 'V3A 3N1', '49.089422', '-122.612315'),
(56, 'Fraser Valley Regional Library', 'Pitt Meadows Public Library', 'BABF019', '42', '(604) 465-4113', '12047 Harris Road', 'Pitt Meadows', 'BC', 'V3Y 1Z2', '49.221363', '-122.68959'),
(57, 'Fraser Valley Regional Library', 'Terry Fox Library', 'BABF021', '43', '(604) 927-7999', '2470 Mary Hill Road', 'Port Coquitlam', 'BC', 'V3C 3B1', '49.260305', '-122.778532'),
(58, 'Fraser Valley Regional Library', 'Tsawwassen Library', 'BABF022', '37', '(604) 943-2271', '1321A - 56th Street', 'Delta', 'BC', 'V4L 2A6', '49.026996', '-123.068683'),
(59, 'Fraser Valley Regional Library', 'Walnut Grove Library', 'BABF023', '35', '(604) 882-0410', '8889 Walnut Grove Drive', 'Langley', 'BC', 'V1M 2N7', '49.163691', '-122.640499'),
(60, 'Fraser Valley Regional Library', 'White Rock Library', 'BABF024', '36', '(604) 541-2201', '15342 Buena Vista Avenue', 'White Rock', 'BC', 'V4B 1Y6', '49.023902', '-122.796236'),
(61, 'Fraser Valley Regional Library', 'Yale Library', 'BABF025', '78', '(604) 863-2279', '65050 Albert Street', 'Yale', 'BC', 'V0K 2S0', '49.56175', '-121.431384'),
(62, 'Fraser Valley Regional Library', 'Yarrow Library', 'BABF026', '33', '(604) 823-4664', '4670 Community Street', 'Yarrow', 'BC', 'V2R 5E1', '49.086416', '-122.052378'),
(63, 'Gibsons & District Public Library', 'Gibsons & District Public Library', 'BGI001', '46', '(604) 886-2130', '470 S Fletcher Road', 'Gibsons', 'BC', 'V0N 1V0', '49.398917', '-123.511436'),
(64, 'Grand Forks & District Public Library', 'Grand Forks & District Public Library', 'BGF001', '51', '(250) 442-3944', '7342 Fifth Avenue', 'Grand Forks', 'BC', 'V0H 1H0', '49.032346', '-118.441005'),
(65, 'Granisle Public Library', 'Granisle Public Library', 'BGR001', '91', '(250) 697-2713', '#2 Village Square -  McDonald Avenue', 'Granisle', 'BC', 'V0J 1W0', '54.88542', '-126.204987'),
(66, 'Greater Victoria Public Library', 'Langford Heritage Branch', 'BVI011', '62', '(250) 940-4875', '102-1314 Lakepoint Way', 'Victoria', 'BC', 'V9B 0S2', '48.4457', '-123.533998'),
(67, 'Greater Victoria Public Library', 'Greater Victoria Public Central Library', 'BVI003', '61', '(250) 382-7241', '735 Broughton Street', 'Victoria', 'BC', 'V8W 3H2', '48.42369', '-123.36447'),
(68, 'Greater Victoria Public Library', 'Bruce Hutchison Branch', 'BVI001', '63', '(250) 727-0104', '4636 Elk Lake Drive', 'Saanich', 'BC', 'V8Z 7K2', '48.500968', '-123.386514'),
(69, 'Greater Victoria Public Library', 'Central Saanich Branch', 'BVI002', '63', '(250) 652-2013', '1209 Clarke Road', 'Central Saanich', 'BC', 'V8M 1P8', '48.576061', '-123.449061'),
(70, 'Greater Victoria Public Library', 'Emily Carr Branch', 'BVI004', '63', '(250) 475-6100', '3500 Blanshard Street', 'Saanich', 'BC', 'V8X 1W3', '48.455637', '-123.372717'),
(71, 'Greater Victoria Public Library', 'Esquimalt Branch', 'BVI005', '61', '(250) 414-7198', '1231 Esquimalt Road', 'Esquimalt', 'BC', 'V9A 3P1', '48.429873', '-123.409324'),
(72, 'Greater Victoria Public Library', 'Juan de Fuca Branch', 'BVI007', '62', '(250) 391-0653', '1759 Island Highway', 'Colwood', 'BC', 'V9B 1J1', '48.447522', '-123.465822'),
(73, 'Greater Victoria Public Library', 'Nellie McClung Branch', 'BVI008', '63', '(250) 477-7111', '3950 Cedar Hill Road', 'Saanich', 'BC', 'V8P 3Z9', '48.468443', '-123.335387'),
(74, 'Greater Victoria Public Library', 'Oak Bay Branch', 'BVI009', '61', '(250) 592-2489', '1442 Monterey Avenue', 'Oak Bay', 'BC', 'V8S 4W1', '48.425795', '-123.314091'),
(75, 'Greater Victoria Public Library', 'Saanich Centennial Branch', 'BVI010', '63', '(250) 477-9030', '3110 Tillicum Road', 'Saanich', 'BC', 'V9A 6T2', '48.45227', '-123.395259'),
(76, 'Greater Victoria Public Library', 'Goudy Branch', 'BVI006', '62', '(250) 391-5702', '119 - 755 Goldstream Avenue', 'Langford', 'BC', 'V9B 2X4', '48.448365', '-123.497972'),
(77, 'Greenwood Public Library', 'Greenwood Public Library', 'BGRE001', '51', '(250) 445-6111', '346 South Copper Street', 'Greenwood', 'BC', 'V0H 1J0', '49.09655', '-118.676719'),
(78, 'Hazelton District Public Library', 'Hazelton District Public Library', 'BHA001', '82', '(250) 842-5961', '4255 Government Street', 'Hazelton', 'BC', 'V0J 1Y0', '55.2562774', '-127.6772884'),
(79, 'Houston Public Library', 'Houston Public Library', 'BH001', '54', '(250) 845-2256', '3150 - 14th Street', 'Houston', 'BC', 'V0J 1Z0', '54.396495', '-126.654854'),
(80, 'Hudson\'s Hope Public Library', 'Hudson\'s Hope Public Library', 'BHH001', '60', '(250) 783-9414', '9905 Dudley Drive', 'Hudson\'s Hope', 'BC', 'V0C 1V0', '56.025816', '-121.913228'),
(81, 'Invermere Public Library', 'Invermere Public Library', 'BIN001', '6', '(250) 342-6416', '201 - 7th Avenue', 'Invermere', 'BC', 'V0A 1K0', '50.50344', '-116.027059'),
(82, 'Kaslo & District Public Library', 'Kaslo & District Public Library', 'BKASL001', '8', '(250) 353-2942', '413 Fourth Street', 'Kaslo', 'BC', 'V0G 1M0', '50.243665', '-117.802664'),
(83, 'Kimberley Public Library', 'Kimberley Public Library', 'BKI001', '6', '(250) 427-3112', '115 Spokane Street', 'Kimberley', 'BC', 'V1A 2E5', '49.686154', '-115.984693'),
(84, 'Kitimat Public Library Association', 'Kitimat Public Library Association', 'BKIT001', '82', '(250) 632-8985', '940 Wakashan Avenue', 'Kitimat', 'BC', 'V8C 2G3', '54.051291', '-128.651814'),
(85, 'Lillooet Area Public Library', 'Lillooet Public Library', 'BLP003', '74', '(250) 256-7944', 'Recreational Centre - 930 Main Street', 'Lillooet', 'BC', 'V0K 1V0', '50.691476', '-121.937524'),
(86, 'Lillooet Area Public Library', 'Bridge River Branch', 'BLP001', '74', '(250) 259-8242', '41 Bridge River Townsite', 'Shalalth', 'BC', 'V0N 3B0', '50.732557', '-122.23187'),
(87, 'Lillooet Area Public Library', 'Gold Bridge Branch', 'BLP002', '74', '(250) 238-2521', 'Haylmore Street', 'Gold Bridge', 'BC', 'V0K 1P0', '50.853689', '-122.83471'),
(88, 'Mackenzie Public Library', 'Mackenzie Public Library', 'BMK001', '57', '(250) 997-6343', '400 Skeena Drive', 'Mackenzie', 'BC', 'V0J 2C0', '55.338469', '-123.091202'),
(89, 'McBride & District Public Library', 'McBride & District Public Library', 'BMB002', '57', '(250) 569-2411', '241 Dominion Street', 'McBride', 'BC', 'V0J 2E0', '53.2998', '-120.163099'),
(90, 'McBride & District Public Library', 'Lena Schultz Reading Room', 'BMB001', '57', '250-553-2388', '13741 Dome Creek Road', 'Dome Creek', 'BC', 'V0J 1H0', '53.748', '-121.022212'),
(91, 'Midway Public Library', 'Midway Public Library', 'BM001', '51', '(250) 449-2620', '612 - 6th Avenue', 'Midway', 'BC', 'V0H 1M0', '49.006655', '-118.772044'),
(92, 'Nakusp Public Library', 'Nakusp Public Library', 'BNA001', '10', '(250) 265-3363', '92 - 6th Avenue NW', 'Nakusp', 'BC', 'V0G 1R0', '50.240151', '-117.805153'),
(93, 'Nelson Municipal Library', 'Nelson Municipal Library', 'BNE001', '8', '(250) 352-6333', '602 Stanley Street', 'Nelson', 'BC', 'V1L 1N4', '49.490607', '-117.294603'),
(94, 'New Westminster Public Library', 'Main Branch', 'BNW001', '40', '(604) 527-4660', '716 - 6th Avenue', 'New Westminster', 'BC', 'V3M 2B3', '49.212106', '-122.922293'),
(95, 'New Westminster Public Library', 'Queensborough', 'BNW002', '40', '604-636-4450', '920 Ewan Ave', 'New Westminster', 'BC', 'V3M 5C8', '49.186458', '-122.945466'),
(96, 'North Vancouver City Library', 'North Vancouver City Library', 'BNV001', '44', '(604) 998-3450', '120 West 14th Street', 'North Vancouver', 'BC', 'V7M 1N9', '49.321066', '-123.073542'),
(97, 'North Vancouver District Public Library', 'Lynn Valley Main', 'BNVD002', '44', '(604) 984-0286', '1277 Lynn Valley Road', 'North Vancouver', 'BC', 'V7J 2A1', '49.336693', '-123.038858'),
(98, 'North Vancouver District Public Library', 'Capilano', 'BNVD001', '44', '(604) 987-4471', '3045 Highland Boulevard', 'North Vancouver', 'BC', 'V7R 2X4', '49.337232', '-123.102372'),
(99, 'North Vancouver District Public Library', 'Parkgate', 'BNVD003', '44', '(604) 929-3727', '3675 Banff Court', 'North Vancouver', 'BC', 'V7H 2Z8', '49.318722', '-122.969798'),
(100, 'Okanagan Regional Library District', 'ORL Administration', 'BKO001', '23', 'n/a', '1430 KLO Road', 'Kelowna', 'BC', 'V1W 3P6', '49.861045', '-119.461991'),
(101, 'Okanagan Regional Library District', 'Enderby Branch', 'BKO004', '83', '(250) 838-6488', '514 Cliff Avenue', 'Enderby', 'BC', 'V0E 1V0', '50.550263', '-119.13802'),
(102, 'Okanagan Regional Library District', 'Keremeos Branch', 'BKO010', '53', '(250) 499-2313', '638 - 7th Ave', 'Keremeos', 'BC', 'V0X 1N0', '49.205148', '-119.824315'),
(103, 'Okanagan Regional Library District', 'Armstrong Branch', 'BKO002', '83', '(250) 546-8311', '10 - 3305 Smith Dr.', 'Armstrong', 'BC', 'V0E 1B1', '50.447099', '-119.184194'),
(104, 'Okanagan Regional Library District', 'Cherryville Branch', 'BKO003', '22', '(250) 547-9776', '1114 Hwy. 6', 'Cherryville', 'BC', 'V0E 2G3', '50.243805', '-118.650473'),
(105, 'Okanagan Regional Library District', 'Falkland Branch', 'BKO005', '83', '(250) 379-2705', '5771 Hwy 97', 'Falkland', 'BC', 'V0E 1W0', '50.500371', '-119.559925'),
(106, 'Okanagan Regional Library District', 'Golden Branch', 'BKO006', '6', '(250) 344-6516', '819 Park Avenue', 'Golden', 'BC', 'V0A 1H0', '51.297745', '-116.964029'),
(107, 'Okanagan Regional Library District', 'Hedley Branch', 'BKO007', '53', '(250) 292-8209', '789 Scott Avenue ', 'Hedley', 'BC', 'V0X 1K0', '49.356002', '-120.077808'),
(108, 'Okanagan Regional Library District', 'Kaleden Branch', 'BKO008', '67', '(250) 497-8066', '101 Linden Avenue', 'Kaleden', 'BC', 'V0H 1K0', '49.390167', '-119.595589'),
(109, 'Okanagan Regional Library District', 'Kelowna Branch', 'BKO009', '23', '(250) 762-2800', '1380 Ellis Street', 'Kelowna', 'BC', 'V1Y 2A2', '49.88967', '-119.493544'),
(110, 'Okanagan Regional Library District', 'Lumby Branch', 'BKO012', '22', '(250) 547-9528', '2250 Shields Avenue', 'Lumby', 'BC', 'V0E 2G0', '50.251508', '-118.961189'),
(111, 'Okanagan Regional Library District', 'Mission', 'BKO013', '23', '(250) 764-2254', '4105 Gordon Dr.', 'Kelowna', 'BC', 'V1W 4Z1', '49.83498', '-119.482978'),
(112, 'Okanagan Regional Library District', 'Naramata Branch', 'BKO014', '67', '(250) 496-5679', '3580 Third Street', 'Naramata', 'BC', 'V0H 1N0', '49.596712', '-119.600313'),
(113, 'Okanagan Regional Library District', 'Okanagan Falls Branch', 'BKO016', '53', '(250) 497-5886', '101 - 850 Railway Lane', 'Okanagan Falls', 'BC', 'V0H 1R0', '49.345502', '-119.577837'),
(114, 'Okanagan Regional Library District', 'Lake Country Branch', 'BKO011', '23', '(250) 766-3141', '2-10150 Bottom Wood Lake Road', 'Lake Country', 'BC', 'V4V 2M1', '50.030339', '-119.40189'),
(115, 'Okanagan Regional Library District', 'North Shuswap', 'BKO015', '83', '(250) 955-8198', '3867 Squilax Anglemont Road', 'Scotch Creek', 'BC', 'V0E 1M5', '50.910819', '-119.4564'),
(116, 'Okanagan Regional Library District', 'Oliver Branch', 'BKO017', '53', '(250) 498-2242', '6239 Station Street ', 'Oliver', 'BC', 'V0H 1T0', '49.183', '-119.549147'),
(117, 'Okanagan Regional Library District', 'Osoyoos Branch', 'BKO018', '53', '(250) 495-7637', '8505 68th Avenue', 'Osoyoos', 'BC', 'V0H 1V0', '49.029649', '-119.465142'),
(118, 'Okanagan Regional Library District', 'Oyama Branch', 'BKO019', '23', '(250) 548-3377', '15718 Oyama Road', 'Oyama', 'BC', 'V4V 2E1', '50.109279', '-119.375895'),
(119, 'Okanagan Regional Library District', 'Peachland Branch', 'BKO020', '23', '(250) 767-9111', '40 - 5500 Clements Crescent', 'Peachland', 'BC', 'V0H 1X5', '49.785926', '-119.717785'),
(120, 'Okanagan Regional Library District', 'Princeton Branch', 'BKO021', '58', '(250) 295-6495', '107 Vermillion Avenue', 'Princeton', 'BC', 'V0X 1W0', '49.459208', '-120.508549'),
(121, 'Okanagan Regional Library District', 'Revelstoke Branch', 'BKO022', '19', '(250) 837-5095', '605 Campbell Avenue', 'Revelstoke', 'BC', 'V0E 2S0', '50.99883', '-118.198969'),
(122, 'Okanagan Regional Library District', 'Rutland', 'BKO023', '23', '(250) 765-8165', '20 - 301 Hwy. 33 W', 'Kelowna', 'BC', 'V1X 1X8', '49.888972', '-119.391389'),
(123, 'Okanagan Regional Library District', 'Salmon Arm Branch', 'BKO024', '83', '(250) 832-6161', '1151 - 10th Avenue SW', 'Salmon Arm', 'BC', 'V1E 1T3', '50.6926', '-119.298671'),
(124, 'Okanagan Regional Library District', 'Sicamous Branch', 'BKO025', '83', '(250) 836-4845', '#2 - 446 Main Street ', 'Sicamous', 'BC', 'V0E 2V0', '50.391909', '-119.22017'),
(125, 'Okanagan Regional Library District', 'Silver Creek', 'BKO026', '83', '(250) 832-4719', '921 Salmon River Road', 'Salmon Arm', 'BC', 'V1E 3G3', '50.692675', '-119.332208'),
(126, 'Okanagan Regional Library District', 'South Shuswap Branch', 'BKO027', '83', '(250) 675-4818 ', '2676 Fairway Hills Rd  Unit 1', 'Blind Bay', 'BC', 'V0E 1H2', '50.788946', '-119.082322'),
(127, 'Okanagan Regional Library District', 'Summerland Branch', 'BKO028', '67', '(250) 494-5591', '9525 Wharton Street', 'Summerland', 'BC', 'V0H 1Z0', '49.600772', '-119.678358'),
(128, 'Okanagan Regional Library District', 'Vernon Branch', 'BKO029', '22', '(250) 542-7610', '3001 - 32nd Avenue', 'Vernon', 'BC', 'V1T 2L8', '50.265328', '-119.271476'),
(129, 'Okanagan Regional Library District', 'Westbank Branch', 'BKO030', '23', '250-768-4369', '2484 Highway 97 S', 'West Kelowna', 'BC', 'V4T 2G2', '49.840048', '-119.629779'),
(130, 'Pemberton & District Public Library', 'Pemberton & District Public Library', 'BPE001', '48', '(604) 894-6916', '7390 Cottonwood Street', 'Pemberton', 'BC', 'V0N 2L0', '50.32023', '-122.799899'),
(131, 'Southern Gulf Islands Library Commission (Pender Island Public Library)', 'Pender Island Public Library', 'BPI003', '64', '(250) 629-3722', '4407 Bedwell Harbour Road', 'Pender Island', 'BC', 'V0N 2M0', '48.797561', '-123.281938'),
(132, 'Southern Gulf Islands Library Commission (Pender Island Public Library)', 'Mayne Island Reading Centre Society', 'BPI002', '64', '(250) 539-2597', '411 Naylor Road', 'Mayne Island', 'BC', 'V0N 2J2', '49.79529', '-124.364228'),
(133, 'Southern Gulf Islands Library Commission (Pender Island Public Library)', 'Galiano Island Community Library', 'BPI001', '64', '(250) 539-2141 ', '2540 Sturdies Bay Road', 'Galiano Island', 'BC', 'V0N 1P0', '48.879085', '-123.318603'),
(134, 'Southern Gulf Islands Library Commission (Pender Island Public Library)', 'Saturna Branch Library', 'BPI005', '64', '(250) 539-5312', '140 East Point Road', 'Saturna Island', 'BC', 'V0N 2Y0', '48.788424', '-123.128983'),
(135, 'Southern Gulf Islands Library Commission (Pender Island Public Library)', 'Piers Island Library', 'BPI004', '64', 'n/a', 'c/o Box 2223', 'Sidney', 'BC', 'V8L 3S8', '48.704901', '-123.416096'),
(136, 'Penticton Public Library', 'Penticton Public Library', 'BP001', '67', '(250) 770-7787', '785 Main Street', 'Penticton', 'BC', 'V2A 5E3', '49.491202', '-119.588557'),
(137, 'Port Moody Public Library', 'Port Moody Public Library', 'BPMP001', '43', '(604) 469-4575', '100 Newport Drive', 'Port Moody', 'BC', 'V3H 3E1', '49.282312', '-122.829572'),
(138, 'Pouce Coupe Public Library', 'Pouce Coupe Public Library', 'BPOC001', '59', '(250) 786-5765', '5010 - 52nd Avenue', 'Pouce Coupe', 'BC', 'V0C 2C0', '55.717808', '-120.133229'),
(139, 'Powell River Public Library', 'Powell River Public Library', 'BPRDP001', '47', '(604) 485-4796', '4411 Michigan Avenue', 'Powell River', 'BC', 'V8A 2S3', '49.835023', '-124.523884'),
(140, 'Prince George Public Library', 'Bob Harkins Library', 'BPG001', '57', '(250) 563-9251', '887 Dominion Street', 'Prince George', 'BC', 'V2L 5L1', '53.913252', '-122.747224'),
(141, 'Prince George Public Library', 'Nechako Branch', 'BPG002', '57', '(250) 962-9710', '6547 Hart Highway', 'Prince George', 'BC', 'V2K 3A4', '53.98958', '-122.786479'),
(142, 'Prince Rupert Library', 'Prince Rupert Library', 'BPR001', '52', '(250) 624-1345', '101-6th Avenue West', 'Prince Rupert', 'BC', 'V8J 1Y9', '54.313174', '-130.317858'),
(143, 'Radium Hot Springs Public Library', 'Radium Hot Springs Public Library', 'BRHP001', '6', '(250) 347-2434', 'Unit #2  Radium Plaza Main Street West', 'Radium Hot Springs', 'BC', 'V0A 1M0', '50.621981', '-116.071315'),
(144, 'Richmond Public Library', 'Brighouse (Main) Branch', 'BRI001', '38', '(604) 231-6422', '100 - 7700 Minoru Gate', 'Richmond', 'BC', 'V6Y 1R8', '49.16293', '-123.142625'),
(145, 'Richmond Public Library', 'Ironwood Branch', 'BRI003', '38', '(604) 231-6468', '11688 Steveston Hwy', 'Richmond', 'BC', 'V7A 1N6', '49.133322', '-123.095352'),
(146, 'Richmond Public Library', 'Steveston Branch', 'BRI004', '38', '(604) 274-2012', '4111 Moncton Street', 'Richmond', 'BC', 'V7E 3A8', '49.125177', '-123.178441'),
(147, 'Richmond Public Library', 'Cambie Branch', 'BRI002', '38', '(604) 273-2223', '150 - 11590 Cambie Road', 'Richmond', 'BC', 'V6X 3Z5', '49.184558', '-123.095055'),
(148, 'Rossland Public Library Association', 'Rossland Public Library Association', 'BR001', '20', '(250) 362-7611', '2180 Columbia Avenue', 'Rossland', 'BC', 'V0G 1Y0', '49.076853', '-117.797294'),
(149, 'Salmo Public Library', 'Salmo Public Library', 'BSA001', '8', '(250) 357-2312', '106 - 4th Street', 'Salmo', 'BC', 'V0G 1Z0', '50.243104', '-117.797759'),
(150, 'Salt Spring Island Public Library', 'Salt Spring Island Public Library', 'BGSI001', '64', '(250) 537-4666', '129 McPhillips Avenue', 'Salt Spring Island', 'BC', 'V8K 2T6', '48.852651', '-123.501603'),
(151, 'Sechelt Public Library', 'Sechelt Public Library', 'BSE001', '46', '(604) 885-3260', '5797 Cowrie Street', 'Sechelt', 'BC', 'V0N 3A0', '49.472417', '-123.763318'),
(152, 'Smithers Public Library', 'Smithers Public Library', 'BS001', '54', '(250) 847-3043', '3817 Alfred Avenue', 'Smithers', 'BC', 'V0J 2N0', '54.779091', '-127.175247'),
(153, 'Sparwood Public Library', 'Sparwood Public Library', 'BSPA001', '5', '(250) 425-2299', '110 Pine Ave', 'Sparwood', 'BC', 'V0B 2G0', '49.734432', '-114.881059'),
(154, 'Squamish Public Library', 'Squamish Public Library', 'BSQ001', '48', '(604) 892-3110', '37907 - 2nd Avenue', 'Squamish', 'BC', 'V8B 0A7', '49.697432', '-123.15594'),
(155, 'Stewart Public Library', 'Stewart Public Library', 'BSP001', '82', '(250) 636-2380', '824 A Main Street', 'Stewart', 'BC', 'V0T 1W0', '55.45665', '-129.473308'),
(156, 'Surrey Public Library', 'Cloverdale', 'BSUR002', '36', '(604) 598-7320', '5642 - 176A Street', 'Surrey', 'BC', 'V3S 4G9', '49.107276', '-122.760497'),
(157, 'Surrey Public Library', 'Fleetwood', 'BSUR003', '36', '(604) 598-7340', '15996 - 84th Avenue', 'Surrey', 'BC', 'V4N 0W1', '49.155404', '-122.779226'),
(158, 'Surrey Public Library', 'Guildford', 'BSUR004', '36', '604) 598-7360', '15105 - 105th Avenue', 'Surrey', 'BC', 'V3R 7G8', '49.193243', '-122.803609'),
(159, 'Surrey Public Library', 'Newton', 'BSUR005', '36', '(604) 598-7400', '13795 - 70th Avenue', 'Surrey', 'BC', 'V3W 0E1', '49.129975', '-122.838988'),
(160, 'Surrey Public Library', 'Ocean Park', 'BSUR006', '36', '(604) 502-6304', '12854 - 17th Avenue', 'Surrey', 'BC', 'V4A 1T5', '49.033003', '-122.8656'),
(161, 'Surrey Public Library', 'Port Kells', 'BSUR007', '36', '(604) 598-7440', '18885 - 88th Avenue', 'Surrey', 'BC', 'V3S 5X7', '49.16281', '-122.790169'),
(162, 'Surrey Public Library', 'Semiahmoo Library', 'BSUR008', '36', '(604) 592-6900', '1815 - 152nd Street', 'Surrey', 'BC', 'V4A 9Y9', '49.035002', '-122.801187'),
(163, 'Surrey Public Library', 'Strawberry Hill', 'BSUR009', '36', '(604) 501-5836', '7399 - 122nd Street', 'Surrey', 'BC', 'V3W 5J2', '49.136445', '-122.884575'),
(164, 'Taylor Public Library', 'Taylor Public Library', 'BTA001', '60', '(250) 789-9878', '10008 - 104 Ave', 'Taylor', 'BC', 'V0C 2K0', '56.153335', '-120.683744'),
(165, 'Terrace Public Library', 'Terrace Public Library', 'BTE001', '82', '(250) 638-8177', '4610 Park Avenue', 'Terrace', 'BC', 'V8G 1V6', '54.518129', '-128.587312'),
(166, 'Thompson-Nicola Regional District Library System', 'TNRDLS Administration', 'BKCT001', '73', '250-374-8866', '300-465 Victoria Street', 'Kamloops', 'BC', 'V2C 2A9', '50.675866', '-120.330497'),
(167, 'Thompson-Nicola Regional District Library System', 'Kamloops Branch', 'BKCT010', '73', '(250) 372-5145', '100 - 465 Victoria Street', 'Kamloops', 'BC', 'V2C 2A9', '50.675866', '-120.330497'),
(168, 'Thompson-Nicola Regional District Library System', 'Ashcroft Branch', 'BKCT002', '74', '(250) 453-9042', '201 Brink Street', 'Ashcroft', 'BC', 'V0K 1A0', '50.725522', '-121.280626'),
(169, 'Thompson-Nicola Regional District Library System', 'Barriere Branch', 'BKCT003', '73', '(250) 672-5811', '4511 Barriere Town Road', 'Barriere', 'BC', 'V0E 1E0', '51.18586', '-120.142364'),
(170, 'Thompson-Nicola Regional District Library System', 'Blue River Branch', 'BKCT004', '73', '(250) 673-8235', '829 Cedar Street', 'Blue River', 'BC', 'V0E 1J0', '52.10771', '-119.307739'),
(171, 'Thompson-Nicola Regional District Library System', 'Cache Creek Branch', 'BKCT006', '74', '(250) 457-9953', '1390 Quartz Road', 'Cache Creek', 'BC', 'V0K 1H0', '50.813935', '-121.324914'),
(172, 'Thompson-Nicola Regional District Library System', 'Chase Branch', 'BKCT007', '73', '(250) 679-3331', '614 Shuswap Avenue', 'Chase', 'BC', 'V0E 1M0', '50.818971', '-119.690258'),
(173, 'Thompson-Nicola Regional District Library System', 'Clearwater Branch', 'BKCT008', '73', '(250) 674-2543', '422 Murtle Crescent', 'Clearwater', 'BC', 'V0E 1N0', '51.6497', '-120.038295'),
(174, 'Thompson-Nicola Regional District Library System', 'Clinton Branch', 'BKCT009', '74', '(250) 459-7752', '1506 Tingley Street', 'Clinton', 'BC', 'V0K 1K0', '51.09215', '-121.582649'),
(175, 'Thompson-Nicola Regional District Library System', 'Logan Lake Branch', 'BKCT011', '73', '(250) 523-6745', '70 - 150 Opal Dr.', 'Logan Lake', 'BC', 'V0K 1W0', '50.49465', '-120.819329'),
(176, 'Thompson-Nicola Regional District Library System', 'Lytton Branch', 'BKCT012', '74', '(250) 455-2521', '121 Fourth Street', 'Lytton', 'BC', 'V0K 1Z0', '50.231335', '-121.581809'),
(177, 'Thompson-Nicola Regional District Library System', 'Merritt Branch', 'BKCT013', '58', '(250) 378-4737', '1691 Garcia Street', 'Merritt', 'BC', 'V1K 1B8', '50.108473', '-120.788262'),
(178, 'Thompson-Nicola Regional District Library System', 'North Kamloops Branch', 'BKCT014', '73', '(250) 554-1124', '693 Tranquille Road', 'Kamloops', 'BC', 'V2B 3H7', '50.698889', '-120.363726'),
(179, 'Thompson-Nicola Regional District Library System', 'Savona Branch', 'BKCT016', '73', '(250) 373-2666', '60 Savona Street', 'Savona', 'BC', 'V0K 2J0', '50.7531', '-120.842679'),
(180, 'Thompson-Nicola Regional District Library System', 'Bookmobile', 'BKCT005', 'n/a', '1-855-552-2665', '693 Tranquille Road', 'Kamloops', 'BC', 'V2B 3H7', '50.698889', '-120.363726'),
(181, 'Thompson-Nicola Regional District Library System', 'Readers\' Home Service', 'BKCT015', '73', '1-800-552-2665', '693 Tranquille Road', 'Kamloops', 'BC', 'V2B 3H7', '50.698889', '-120.363726'),
(182, 'Trail & District Public Library', 'Trail & District Public Library', 'BT001', '20', '(250) 364-1731', '1051 Victoria Street', 'Trail', 'BC', 'V1R 3T3', '49.097866', '-117.709223'),
(183, 'Tumbler Ridge Public Library', 'Tumbler Ridge Public Library', 'BTR001', '59', '(250) 242-4778', '340 Front Street', 'Tumbler Ridge', 'BC', 'V0C 2W0', '55.125356', '-121.000472'),
(184, 'Valemount Public Library', 'Valemount Public Library', 'BVALE001', '57', '(250) 566-4367', '1090A Main Street', 'Valemount', 'BC', 'V0E 2Z0', '52.83702', '-119.265109'),
(185, 'Vancouver Island Regional Library', 'Headquarters', 'BNVI038', '68', 'n/a', '6250 Hammond Bay Road', 'Nanaimo', 'BC', 'V9R 5N3', '49.234736', '-124.038734'),
(186, 'Vancouver Island Regional Library', 'Bella Coola Branch', 'BNVI001', '49', '(250) 799-5330', '450 MacKenzie St', 'Bella Coola', 'BC', 'V0T 1C0', '52.37201', '-126.757864'),
(187, 'Vancouver Island Regional Library', 'Bowser Branch', 'BNVI002', '69', '(250) 757-9570', '6996 Island Highway West', 'Bowser', 'BC', 'V0R 1G0', '49.435724', '-124.67665'),
(188, 'Vancouver Island Regional Library', 'Campbell River Branch', 'BNVI003', '72', '(250)287-3655', '1240 Shopper\'s Row', 'Campbell River', 'BC', 'V9W 2C8', '50.027378', '-125.245379'),
(189, 'Vancouver Island Regional Library', 'Chemainus Branch', 'BNVI004', '79', '(250) 246-9471', '2592 Legion Street', 'Chemainus', 'BC', 'V0R 1K0', '48.922375', '-123.718821'),
(190, 'Vancouver Island Regional Library', 'Comox Branch', 'BNVI005', '71', '(250) 339-2971', '1720 Beaufort Avenue', 'Comox', 'BC', 'V9M 1R7', '49.671709', '-124.923911'),
(191, 'Vancouver Island Regional Library', 'Cortes Island Branch', 'BNVI006', '72', '(250) 935-6566', 'Sutil Point Road', 'Mansons Landing', 'BC', 'V0P 1K0', '50.067433', '-124.982959'),
(192, 'Vancouver Island Regional Library', 'Courtenay Branch', 'BNVI007', '71', '(250) 334-3369', '300 - 6th Street', 'Courtenay', 'BC', 'V9N 9V9', '49.690244', '-124.997863'),
(193, 'Vancouver Island Regional Library', 'Cowichan Branch', 'BNVI008', '79', '(250) 746-7661', '2687 James Street', 'Duncan', 'BC', 'V9L 2X5', '48.7821', '-123.704142'),
(194, 'Vancouver Island Regional Library', 'Cowichan Lake Branch', 'BNVI009', '79', '(250) 749-3431', '38 King George Street', 'Lake Cowichan', 'BC', 'V0R 2G0', '48.82478', '-124.05367'),
(195, 'Vancouver Island Regional Library', 'Cumberland Branch', 'BNVI010', '71', '(250) 336-8121', '2724 Dunsmuir Avenue', 'Cumberland', 'BC', 'V0R 1S0', '49.619054', '-125.028427'),
(196, 'Vancouver Island Regional Library', 'Gabriola Island Branch', 'BNVI011', '68', '(250) 247-7878', '5 - 575 North Road', 'Gabriola Island', 'BC', 'V0R 1X5', '49.049587', '-124.176893'),
(197, 'Vancouver Island Regional Library', 'Gold River Branch', 'BNVI012', '84', '(250) 283-2502', '396 Nimpkish Drive', 'Gold River', 'BC', 'V0P 1G0', '49.78481', '-126.054164'),
(198, 'Vancouver Island Regional Library', 'Hornby Island Branch', 'BNVI013', '71', '(250) 335-0044', '1765 Sollans Road', 'Hornby Island', 'BC', 'V0R 1Z0', '49.53205', '-124.664679'),
(199, 'Vancouver Island Regional Library', 'Ladysmith Branch', 'BNVI014', '68', '(250) 245 2322', '#3 - 740 First Avenue', 'Ladysmith', 'BC', 'V9G 1A3', '48.995162', '-123.820195'),
(200, 'Vancouver Island Regional Library', 'Masset Branch', 'BNVI015', '50', '(250) 626-3663', '2123 Collison', 'Masset', 'BC', 'V0T 1M0', '54.013335', '-132.151854'),
(201, 'Vancouver Island Regional Library', 'Nanaimo Harbourfront Branch', 'BNVI016', '68', '(250) 753-1154', '90 Commercial Street', 'Nanaimo', 'BC', 'V9R 5G4', '49.165401', '-123.936855'),
(202, 'Vancouver Island Regional Library', 'Nanaimo North', 'BNVI039', '85', '(250) 281-2263', '4503B Railway Ave', 'Woss', 'BC', 'V0N 3P0', '50.217', '-126.59'),
(203, 'Vancouver Island Regional Library', 'Nanaimo Wellington Branch', 'BNVI017', '68', '(250) 758-5544', '3032 Barons Road', 'Nanaimo', 'BC', 'V9T 4B5', '49.20783', '-124.004216'),
(204, 'Vancouver Island Regional Library', 'Parksville Branch', 'BNVI018', '69', '(250) 248-3841', '100 Jensen Avenue E', 'Parksville', 'BC', 'V9P 2G6', '49.31833', '-124.312432'),
(205, 'Vancouver Island Regional Library', 'Port Alberni Branch', 'BNVI019', '70', '(250) 723-9511', '4245 Wallace Unit B', 'Port Alberni', 'BC', 'V9Y 3Y6', '49.233985', '-124.807574'),
(206, 'Vancouver Island Regional Library', 'Port Alice Branch', 'BNVI020', '85', '(250) 284-3554', '951 Marine Drive', 'Port Alice', 'BC', 'V0N 2N0', '50.42545', '-127.486774'),
(207, 'Vancouver Island Regional Library', 'Port Clements Branch', 'BNVI021', '50', '(250) 557-4402', '35 Cedar Avenue W.', 'Port Clements', 'BC', 'V0T 1R0', '53.68779', '-132.16135'),
(208, 'Vancouver Island Regional Library', 'Port Hardy Branch', 'BNVI022', '85', '(250) 949-6661', '7110 Market', 'Port Hardy', 'BC', 'V0N 2P0', '50.721093', '-127.492257'),
(209, 'Vancouver Island Regional Library', 'Port McNeill Branch', 'BNVI023', '85', '(250) 956-3669', '4 - 1584 Broughton Blvd.', 'Port McNeill', 'BC', 'V0N 2R0', '50.589665', '-127.08667'),
(210, 'Vancouver Island Regional Library', 'Port Renfrew Branch', 'BNVI024', '62', '(250) 647-5423', '6633 Deering Road', 'Port Renfrew', 'BC', 'V0S 1K0', '48.576422', '-124.40907'),
(211, 'Vancouver Island Regional Library', 'Quadra Island Branch', 'BNVI025', '72', '(250) 285-2216', '712 Cramer Road', 'Quadra Island', 'BC', 'V0P 1H0', '50.101533', '-125.213598'),
(212, 'Vancouver Island Regional Library', 'Qualicum Beach Branch', 'BNVI026', '69', '(250) 752-6121', '660 Primrose Street', 'Qualicum Beach', 'BC', 'V9K 1S9', '49.347486', '-124.444331'),
(213, 'Vancouver Island Regional Library', 'Queen Charlotte Branch', 'BNVI027', '50', '(250) 559-4518', '138 Bay', 'Queen Charlotte City', 'BC', 'V0T 1S0', '53.266063', '-132.12209'),
(214, 'Vancouver Island Regional Library', 'Sandspit Branch', 'BNVI028', '50', '(250) 637-2247', 'Seabreeze Plaza', 'Sandspit', 'BC', 'V0T 1T0', '53.23702', '-131.844091'),
(215, 'Vancouver Island Regional Library', 'Sayward Branch', 'BNVI029', '72', '(250) 282-5551', '641C Kelsey Way', 'Sayward', 'BC', 'V0P 1R0', '50.378652', '-125.95894'),
(216, 'Vancouver Island Regional Library', 'Sidney/North Saanich Branch', 'BNVI030', '63', '(250) 656-0944', '10091 Resthaven Drive', 'Sidney', 'BC', 'V8L 3G3', '48.655232', '-123.402751'),
(217, 'Vancouver Island Regional Library', 'Sointula Branch', 'BNVI031', '85', '(250) 973-6493', '280 1st Street', 'Sointula', 'BC', 'V0N 3E0', '50.641414', '-127.028812'),
(218, 'Vancouver Island Regional Library', 'Sooke Branch', 'BNVI032', '62', '(250) 642-3022', '2065 Anna Marie Road', 'Sooke', 'BC', 'V9Z 0A4', '48.379663', '-123.7192'),
(219, 'Vancouver Island Regional Library', 'South Cowichan Branch', 'BNVI033', '79', '(250) 743-5436', '310 - 2720 Mill Bay Road', 'Mill Bay', 'BC', 'V0R 2P0', '48.6526', '-123.5587'),
(220, 'Vancouver Island Regional Library', 'Tahsis Branch', 'BNVI034', '84', '(250) 934-6621', '977  Maquinna Drive S', 'Tahsis', 'BC', 'V0P 1X0', '49.923965', '-126.661451'),
(221, 'Vancouver Island Regional Library', 'Tofino Branch', 'BNVI035', '70', '(250) 725-3713', '331 Main Street', 'Tofino', 'BC', 'V0R 2Z0', '49.153938', '-125.907328'),
(222, 'Vancouver Island Regional Library', 'Ucluelet Branch', 'BNVI036', '70', '(250) 726-4642', '500 Matterson Dr', 'Ucluelet', 'BC', 'V0R 3A0', '48.945053', '-125.558933'),
(223, 'Vancouver Island Regional Library', 'Union Bay Branch', 'BNVI037', '71', '(250) 335-2433', '5527 Island Highway', 'Union Bay', 'BC', 'V0R 3B0', '49.618', '-124.89'),
(224, 'Vancouver Island Regional Library', 'Woss Branch', 'BNVI039', '85', '(250) 281-2263', '4503B Railway Ave', 'Woss', 'BC', 'V0N 3P0', '50.217', '-126.59'),
(225, 'Vancouver Public Library', 'Britannia Branch', 'BVA001', '39', '(604) 665-2222', '1661 Napier', 'Vancouver', 'BC', 'V5L 4X4', '49.274931', '-123.070318'),
(226, 'Vancouver Public Library', 'Carnegie Branch', 'BVA002', '39', '(604) 665-3010', '401 Main Street', 'Vancouver', 'BC', 'V6A 2T7', '49.281272', '-123.099827'),
(227, 'Vancouver Public Library', 'Champlain Heights Branch', 'BVA004', '39', '(604) 665-3955', '7110 Kerr Street', 'Vancouver', 'BC', 'V5S 4W2', '49.218627', '-123.041505'),
(228, 'Vancouver Public Library', 'Collingwood Branch', 'BVA005', '39', '(604) 665-3953', '2985 Kingsway', 'Vancouver', 'BC', 'V5R 5J4', '49.236137', '-123.04283'),
(229, 'North Vancouver District Public Library', 'Parkgate', 'BNVD003', '44', '(604) 929-3727', '3675 Banff Court', 'North Vancouver', 'BC', 'V7H 2Z8', '49.318722', '-122.969798'),
(230, 'Surrey Public Library', 'City Centre', 'BSUR001', '36', '(604) 598-7420 ', '10350 University Drive', 'Surrey', 'BC', 'V3T 4B8', '49.19131', '-122.849808'),
(231, 'Vancouver Public Library', 'Dunbar Branch', 'BVA006', '39', '(604) 665-3968', '4515 Dunbar Street', 'Vancouver', 'BC', 'V6S 2G7', '49.245986', '-123.1853'),
(232, 'Vancouver Public Library', 'Firehall Branch', 'BVA007', '39', '(604) 665-3970', '1455 West 10th Avenue', 'Vancouver', 'BC', 'V6H 1J8', '49.262674', '-123.137671'),
(233, 'Vancouver Public Library', 'Fraserview Branch', 'BVA008', '39', '(604) 665-3957', '1950 Argyle Drive', 'Vancouver', 'BC', 'V5P 2A8', '49.219808', '-123.067061'),
(234, 'Vancouver Public Library', 'Hastings Branch', 'BVA009', '39', '(604) 665-3959', '2674 East Hastings Street', 'Vancouver', 'BC', 'V5K 1Z6', '49.281101', '-123.050147'),
(235, 'Vancouver Public Library', 'Joe Fortes Branch', 'BVA010', '39', '(604) 665-3972', '870 Denman Street', 'Vancouver', 'BC', 'V6G 2L8', '49.290776', '-123.136434'),
(236, 'Vancouver Public Library', 'Kensington Branch', 'BVA011', '39', '(604) 665-3961', '1428 Cedar Cottage Mews', 'Vancouver', 'BC', 'V5N 5Z1', '49.249333', '-123.076218'),
(237, 'Vancouver Public Library', 'Kerrisdale Branch', 'BVA012', '39', '(604) 665-3974', '2112 West 42nd Avenue', 'Vancouver', 'BC', 'V6M 2B6', '49.233618', '-123.156225'),
(238, 'Vancouver Public Library', 'Kitsilano Branch', 'BVA013', '39', '(604) 665-3976', '2425 Macdonald Street', 'Vancouver', 'BC', 'V6K 3Y9', '49.26465', '-123.16854'),
(239, 'Vancouver Public Library', 'Marpole Branch', 'BVA014', '39', '(604) 665-3978', '8386 Granville Street', 'Vancouver', 'BC', 'V6P 4Z7', '49.210001', '-123.14029'),
(240, 'Vancouver Public Library', 'Mount Pleasant Branch', 'BVA015', '39', '(604) 665-3962', '1 Kingsway', 'Vancouver', 'BC', 'V5T 3H7', '49.264073', '-123.100364'),
(241, 'Vancouver Public Library', 'Oakridge Branch', 'BVA016', '39', '(604) 665-3980', '191 - 650 West 41st Avenue', 'Vancouver', 'BC', 'V5Z 2M9', '49.233625', '-123.12042'),
(242, 'Vancouver Public Library', 'Renfrew Branch', 'BVA018', '39', '(604) 257-8705', '2969 East 22nd Avenue', 'Vancouver', 'BC', 'V5M 2Y3', '49.250885', '-123.04287'),
(243, 'Vancouver Public Library', 'South Hill Branch', 'BVA019', '39', '(604) 665-3965', '6076 Fraser Street', 'Vancouver', 'BC', 'V5W 2Z7', '49.2296', '-123.090547'),
(244, 'Vancouver Public Library', 'Strathcona Branch', 'BVA020', '39', '(604) 665-3967', '592 East Pender Street', 'Vancouver', 'BC', 'V6A 1V5', '49.280215', '-123.091958'),
(245, 'Vancouver Public Library', 'Terry Salman Branch', 'BVA021', '39', '(604) 665-3964', '4575 Clancy Loranger Way', 'Vancouver', 'BC', 'V5Y 2M4', '49.254571', '-123.107211'),
(246, 'Vancouver Public Library', 'West Point Grey Branch', 'BVA022', '39', '(604) 665-3982', '4480 West 10th Avenue', 'Vancouver', 'BC', 'V6R 2H9', '49.26388', '-123.20762'),
(247, 'Vancouver Public Library', 'Central Library', 'BVA003', '39', '(604) 331-3603', '350 West Georgia Street', 'Vancouver', 'BC', 'V6B 6B1', '49.280404', '-123.115175'),
(248, 'Vancouver Public Library', 'Accessible Services', 'BVA017', '39', '604-331-4100', '345 Robson St', 'Vancouver', 'BC', 'V6B 6B3', '49.279222', '-123.11624'),
(249, 'Vanderhoof Public Library', 'Vanderhoof Public Library', 'BVDH001', '91', '(250) 567-4060', '230 Stewart Drive', 'Vanderhoof', 'BC', 'V0J 3A0', '54.014086', '-124.008737'),
(250, 'West Vancouver Memorial Library', 'West Vancouver Memorial Library', 'BWV001', '45', '(604) 925-7400', '1950 Marine Drive', 'West Vancouver', 'BC', 'V7V 1J8', '49.329034', '-123.16538'),
(251, 'Whistler Public Library', 'Whistler Public Library', 'BW001', '48', '(604) 935-8433', '4329 Main Street', 'Whistler', 'BC', 'V0N 1B4', '50.117127', '-122.956295');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `libraries`
--
ALTER TABLE `libraries`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `libraries`
--
ALTER TABLE `libraries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=252;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
