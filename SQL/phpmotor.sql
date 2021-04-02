-- phpMyAdmin SQL Dump
-- version 4.9.7deb1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 02, 2021 at 04:53 AM
-- Server version: 10.3.25-MariaDB-0ubuntu1
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phpmotor`
--

-- --------------------------------------------------------

--
-- Table structure for table `carclassification`
--

CREATE TABLE `carclassification` (
  `classificationId` int(11) NOT NULL,
  `classificationName` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `carclassification`
--

INSERT INTO `carclassification` (`classificationId`, `classificationName`) VALUES
(1, 'SUV'),
(2, 'Classic'),
(3, 'Sports'),
(4, 'Trucks'),
(5, 'Used');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `clientId` int(10) UNSIGNED NOT NULL,
  `clientFirstname` varchar(15) NOT NULL,
  `clientLastname` varchar(25) NOT NULL,
  `clientEmail` varchar(40) NOT NULL,
  `clientPassword` varchar(255) NOT NULL,
  `clientLevel` enum('1','2','3') NOT NULL DEFAULT '1',
  `comment` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`clientId`, `clientFirstname`, `clientLastname`, `clientEmail`, `clientPassword`, `clientLevel`, `comment`) VALUES
(5, 'Tony', 'Stark', 'tony@starkent.com', 'Iam1ronM@n', '3', 'I am the real Ironman'),
(17, 'Admin', 'Client', 'admin@cit340.net', '$2y$10$/7fNIQu5wdWEcrEt1zdslue.0V3aNSbOKSveeAQ2y0oK1nppeogFq', '3', NULL),
(20, 'Nathan', 'Webb', 'nwrocketman@yahoo.com', '$2y$10$9DGf4rvVziAjKoNv6mehr.I7NRmmFa/jYAVwI3oaqb5UjqR4XlLty', '1', NULL),
(21, 'Nathan', 'Webb', 'nwrocketman64@yahoo.com', '$2y$10$WpNu18ZJD8tVd.SwQ3Q6remTPRdglbpl9ZBWC/Ucbb9cFu0uw4YFy', '1', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `imgId` int(10) UNSIGNED NOT NULL,
  `invId` int(10) UNSIGNED NOT NULL,
  `imgName` varchar(100) CHARACTER SET latin1 NOT NULL,
  `imgPath` varchar(150) CHARACTER SET latin1 NOT NULL,
  `imgDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `imgPrimary` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`imgId`, `invId`, `imgName`, `imgPath`, `imgDate`, `imgPrimary`) VALUES
(11, 3, 'adventador.jpg', '/img/adventador.jpg', '2021-03-19 07:29:00', 1),
(12, 3, 'adventador-tn.jpg', '/img/adventador-tn.jpg', '2021-03-19 07:29:00', 1),
(13, 13, 'aerocar.jpg', '/img/aerocar.jpg', '2021-03-19 07:29:24', 1),
(14, 13, 'aerocar-tn.jpg', '/img/aerocar-tn.jpg', '2021-03-19 07:29:24', 1),
(15, 6, 'batmobile.jpg', '/img/batmobile.jpg', '2021-03-19 07:29:47', 1),
(16, 6, 'batmobile-tn.jpg', '/img/batmobile-tn.jpg', '2021-03-19 07:29:47', 1),
(17, 10, 'camaro.jpg', '/img/camaro.jpg', '2021-03-19 07:30:14', 1),
(18, 10, 'camaro-tn.jpg', '/img/camaro-tn.jpg', '2021-03-19 07:30:14', 1),
(19, 9, 'crwn-vic.jpg', '/img/crwn-vic.jpg', '2021-03-19 07:30:43', 1),
(20, 9, 'crwn-vic-tn.jpg', '/img/crwn-vic-tn.jpg', '2021-03-19 07:30:43', 1),
(21, 11, 'escalade.jpg', '/img/escalade.jpg', '2021-03-19 07:31:11', 1),
(22, 11, 'escalade-tn.jpg', '/img/escalade-tn.jpg', '2021-03-19 07:31:11', 1),
(23, 8, 'fire-truck.jpg', '/img/fire-truck.jpg', '2021-03-19 07:31:50', 1),
(24, 8, 'fire-truck-tn.jpg', '/img/fire-truck-tn.jpg', '2021-03-19 07:31:50', 1),
(25, 12, 'hummer.jpg', '/img/hummer.jpg', '2021-03-19 07:32:15', 1),
(26, 12, 'hummer-tn.jpg', '/img/hummer-tn.jpg', '2021-03-19 07:32:15', 1),
(27, 5, 'mechanic.jpg', '/img/mechanic.jpg', '2021-03-19 07:32:42', 1),
(28, 5, 'mechanic-tn.jpg', '/img/mechanic-tn.jpg', '2021-03-19 07:32:42', 1),
(29, 4, 'monster-truck.jpg', '/img/monster-truck.jpg', '2021-03-19 07:33:24', 1),
(30, 4, 'monster-truck-tn.jpg', '/img/monster-truck-tn.jpg', '2021-03-19 07:33:24', 1),
(31, 7, 'mystery-van.jpg', '/img/mystery-van.jpg', '2021-03-19 07:34:03', 1),
(32, 7, 'mystery-van-tn.jpg', '/img/mystery-van-tn.jpg', '2021-03-19 07:34:03', 1),
(33, 14, 'van.jpg', '/img/van.jpg', '2021-03-19 07:34:22', 1),
(34, 14, 'van-tn.jpg', '/img/van-tn.jpg', '2021-03-19 07:34:22', 1),
(37, 3, 'HNI_0002.JPG', '/img/HNI_0002.JPG', '2021-03-19 09:27:42', 0),
(38, 3, 'HNI_0002-tn.JPG', '/img/HNI_0002-tn.JPG', '2021-03-19 09:27:42', 0),
(39, 5, 'HNI_0003.JPG', '/img/HNI_0003.JPG', '2021-03-19 09:31:30', 0),
(40, 5, 'HNI_0003-tn.JPG', '/img/HNI_0003-tn.JPG', '2021-03-19 09:31:30', 0),
(41, 12, 'HNI_0004.JPG', '/img/HNI_0004.JPG', '2021-03-19 09:32:20', 0),
(42, 12, 'HNI_0004-tn.JPG', '/img/HNI_0004-tn.JPG', '2021-03-19 09:32:20', 0);

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `invId` int(10) UNSIGNED NOT NULL,
  `invMake` varchar(30) NOT NULL,
  `invModel` varchar(30) NOT NULL,
  `invDescription` text DEFAULT NULL,
  `invImage` varchar(50) NOT NULL,
  `invThumbnail` varchar(50) NOT NULL,
  `invPrice` decimal(10,2) NOT NULL,
  `invStock` smallint(6) NOT NULL,
  `invColor` varchar(20) NOT NULL,
  `classificationId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`invId`, `invMake`, `invModel`, `invDescription`, `invImage`, `invThumbnail`, `invPrice`, `invStock`, `invColor`, `classificationId`) VALUES
(3, 'Lamborghini', 'Adventador', 'This V-12 engine packs a punch in this sporty car. Make sure you wear your seatbelt and obey all traffic laws. ', '/img/adventador.jpg', '/img/adventador-tn.jpg', '417650.00', 1, 'Blue', 3),
(4, 'Monster', 'Truck', 'Most trucks are for working, this one is for fun. this beast comes with 60in tires giving you tracktions needed to jump and roll in the mud.', '/img/monster-truck.jpg', '/img/monster-truck-tn.jpg', '150000.00', 3, 'purple', 4),
(5, 'Mechanic', 'Special', 'Not sure where this car came from. however with a little tlc it will run as good a new.', '/img/mechanic.jpg', '/img/mechanic-tn.jpg', '100.00', 200, 'Rust', 5),
(6, 'Batmobile', 'Custom', 'Ever want to be a super hero? now you can with the batmobile. This car allows you to switch to bike mode allowing you to easily maneuver through trafic during rush hour.', '/img/bat.jpg', '/img/batmobile-tn.jpg', '65000.00', 2, 'Black', 3),
(7, 'Mystery', 'Machine', 'Scooby and the gang always found luck in solving their mysteries because of there 4 wheel drive Mystery Machine. This Van will help you do whatever job you are required to with a success rate of 100%.', '/img/mystery-van.jpg', '/img/mystery-van-tn.jpg', '10000.00', 12, 'Green', 1),
(8, 'Spartan', 'Fire Truck', 'Emergencies happen often. Be prepared with this Spartan fire truck. Comes complete with 1000 ft. of hose and a 1000 gallon tank.', '/img/fire-truck.jpg', '/img/fire-truck-tn.jpg', '50000.00', 2, 'Red', 4),
(9, 'Ford', 'Crown Victoria', 'After the police force updated their fleet these cars are now available to the public! These cars come equiped with the siren which is convenient for college students running late to class.', '/img/crwn-vic.jpg', '/img/crwn-vic-tn.jpg', '10000.00', 5, 'White', 5),
(10, 'Chevy', 'Camaro', 'If you want to look cool this is the ar you need! This car has great performance at an affordable price. Own it today!', '/img/camaro.jpg', '/img/camaro-tn.jpg', '25000.00', 10, 'Silver', 3),
(11, 'Cadilac', 'Escalade', 'This stylin car is great for any occasion from going to the beach to meeting the president. The luxurious inside makes this car a home away from home.', '/img/escalade.jpg', '/img/escalade-tn.jpg', '75195.00', 4, 'Black', 1),
(12, 'GM', 'Hummer', 'Do you have 6 kids and like to go offroading? The Hummer gives you the spacious interiors with an engine to get you out of any muddy or rocky situation.', '/img/hummer.jpg', '/img/hummer-tn.jpg', '58800.00', 5, 'Yellow', 5),
(13, 'Aerocar International', 'Aerocar', 'Are you sick of rushhour trafic? This car converts into an airplane to get you where you are going fast. Only 6 of these were made, get them while they last!', '/img/aerocar.jpg', '/img/aerocar-tn.jpg', '1000000.00', 6, 'Red', 2),
(14, 'FBI', 'Survalence Van', 'do you like police shows? You\'ll feel right at home driving this van, come complete with survalence equipments for and extra fee of $2,000 a month. ', '/img/van.jpg', '/img/van-tn.jpg', '20000.00', 1, 'Green', 1),
(15, 'Dog ', 'Car', 'Do you like dogs? Well this car is for you straight from the 90s from Aspen, Colorado we have the orginal Dog Car complete with fluffy ears.  ', '/img/no-image.png', '/img/no-image-tn.png', '35000.00', 1, 'Brown', 2);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `reviewId` int(10) UNSIGNED NOT NULL,
  `reviewText` text CHARACTER SET latin1 NOT NULL,
  `reviewDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `invId` int(10) UNSIGNED NOT NULL,
  `clientId` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`reviewId`, `reviewText`, `reviewDate`, `invId`, `clientId`) VALUES
(12, 'It&#39;s an interesting car.', '2021-04-02 04:41:43', 6, 21);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carclassification`
--
ALTER TABLE `carclassification`
  ADD PRIMARY KEY (`classificationId`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`clientId`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`imgId`),
  ADD KEY `invId` (`invId`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`invId`),
  ADD KEY `classificationId` (`classificationId`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`reviewId`),
  ADD KEY `FK_reviews_clients` (`clientId`),
  ADD KEY `FK_reviews_inventory` (`invId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carclassification`
--
ALTER TABLE `carclassification`
  MODIFY `classificationId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `clientId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `imgId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `invId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `reviewId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `FK_inv_images` FOREIGN KEY (`invId`) REFERENCES `inventory` (`invId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `inventory`
--
ALTER TABLE `inventory`
  ADD CONSTRAINT `inventory_ibfk_1` FOREIGN KEY (`classificationId`) REFERENCES `carclassification` (`classificationId`);

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `FK_reviews_clients` FOREIGN KEY (`clientId`) REFERENCES `clients` (`clientId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_reviews_inventory` FOREIGN KEY (`invId`) REFERENCES `inventory` (`invId`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
