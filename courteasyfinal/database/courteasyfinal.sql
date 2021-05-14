-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 14, 2021 at 06:52 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `courteasyfinal`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `UserName` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `updationDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `UserName`, `Password`, `updationDate`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', '2020-11-03 09:41:34');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `name` text,
  `start` datetime DEFAULT NULL,
  `end` datetime DEFAULT NULL,
  `resource_id` varchar(30) DEFAULT NULL,
  `court` text,
  `Status` int(11) DEFAULT NULL,
  `eventsid` int(11) DEFAULT NULL,
  `etc` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `name`, `start`, `end`, `resource_id`, `court`, `Status`, `eventsid`, `etc`) VALUES
(146, 'mj@gmail.com', '2021-05-06 10:30:00', '2021-05-06 12:00:00', NULL, '2', 1, NULL, 'mj@gmail.com<br> '),
(147, 'mj@gmail.com', '2021-05-07 12:00:00', '2021-05-07 14:30:00', NULL, '16', 1, NULL, 'mj@gmail.com<br>'),
(155, 'hj@gmail.com', '2021-05-11 11:00:00', '2021-05-11 13:00:00', NULL, '7', 1, 2, 'hj@gmail.com<br>'),
(156, 'aj@gmail.com', '2021-05-13 11:00:00', '2021-05-13 13:00:00', NULL, '20', NULL, NULL, 'aj@gmail.com<br>'),
(157, 'mj@gmail.com', '2021-05-15 14:00:00', '2021-05-15 15:00:00', NULL, '2', NULL, NULL, 'mj@gmail.com<br> ');

-- --------------------------------------------------------

--
-- Table structure for table `tblbooking`
--

CREATE TABLE `tblbooking` (
  `id` int(11) NOT NULL,
  `FirstName` varchar(100) DEFAULT NULL,
  `LastName` varchar(100) CHARACTER SET latin2 DEFAULT NULL,
  `cardnum` varchar(16) CHARACTER SET latin1 COLLATE latin1_german2_ci DEFAULT NULL,
  `exdate` date DEFAULT NULL,
  `ccv` varchar(16) CHARACTER SET latin7 DEFAULT NULL,
  `emailid` varchar(110) CHARACTER SET latin2 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblbooking`
--

INSERT INTO `tblbooking` (`id`, `FirstName`, `LastName`, `cardnum`, `exdate`, `ccv`, `emailid`) VALUES
(6, 'mj', 'lebios', '120932', '2012-09-12', '12323', 'mj@gmail.com'),
(10, 'Aj', 'Lumbes', '1111111111111111', '2021-05-18', '123', 'aj@gmail.com'),
(11, NULL, NULL, NULL, NULL, NULL, 'mj@gmail.com'),
(12, NULL, NULL, NULL, NULL, NULL, 'mj@gmail.com'),
(13, NULL, NULL, NULL, NULL, NULL, 'hj@gmail.com'),
(14, NULL, NULL, NULL, NULL, NULL, 'mj@gmail.com'),
(15, NULL, NULL, NULL, NULL, NULL, 'aj@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `tblcontactusinfo`
--

CREATE TABLE `tblcontactusinfo` (
  `id` int(11) NOT NULL,
  `Address` tinytext,
  `EmailId` varchar(255) DEFAULT NULL,
  `ContactNo` char(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblcontactusinfo`
--

INSERT INTO `tblcontactusinfo` (`id`, `Address`, `EmailId`, `ContactNo`) VALUES
(1, '363 P. Casal Street, Quiapo, Manila 1338 Arlegui Street, Quiapo, Manila																			', 'courteasyph@gmail.com', '09264739204');

-- --------------------------------------------------------

--
-- Table structure for table `tblcontactusquery`
--

CREATE TABLE `tblcontactusquery` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `EmailId` varchar(120) DEFAULT NULL,
  `ContactNumber` char(11) DEFAULT NULL,
  `Message` longtext,
  `PostingDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblcontactusquery`
--

INSERT INTO `tblcontactusquery` (`id`, `name`, `EmailId`, `ContactNumber`, `Message`, `PostingDate`, `status`) VALUES
(6, 'Henry Faundo', 'h@gmail.com', '092139343', 'Please confirm my added court.', '2021-03-15 06:49:10', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblcourts`
--

CREATE TABLE `tblcourts` (
  `id` int(11) NOT NULL,
  `CourtName` varchar(150) DEFAULT NULL,
  `CourtLocation` int(11) DEFAULT NULL,
  `CourtOverview` longtext,
  `Price` int(11) DEFAULT NULL,
  `Vimage1` varchar(120) DEFAULT NULL,
  `Vimage2` varchar(120) DEFAULT NULL,
  `Vimage3` varchar(120) DEFAULT NULL,
  `Vimage4` varchar(120) DEFAULT NULL,
  `Vimage5` varchar(120) DEFAULT NULL,
  `volleyball` int(11) DEFAULT NULL,
  `basketball` int(11) DEFAULT NULL,
  `shuttlecock` int(11) DEFAULT NULL,
  `net` int(11) DEFAULT NULL,
  `washroom` int(25) DEFAULT NULL,
  `scoreboard` int(25) DEFAULT NULL,
  `water` int(12) DEFAULT NULL,
  `bleachers` int(25) DEFAULT NULL,
  `TableTennis` int(12) DEFAULT NULL,
  `Badminton` int(12) DEFAULT NULL,
  `Swimming` int(12) DEFAULT NULL,
  `Boxing` int(12) DEFAULT NULL,
  `BoardGames` int(12) DEFAULT NULL,
  `Ball` int(12) DEFAULT NULL,
  `Ring` int(12) DEFAULT NULL,
  `Gloves` int(12) DEFAULT NULL,
  `RegDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `maps` varchar(255) NOT NULL,
  `Role` varchar(50) NOT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblcourts`
--

INSERT INTO `tblcourts` (`id`, `CourtName`, `CourtLocation`, `CourtOverview`, `Price`, `Vimage1`, `Vimage2`, `Vimage3`, `Vimage4`, `Vimage5`, `volleyball`, `basketball`, `shuttlecock`, `net`, `washroom`, `scoreboard`, `water`, `bleachers`, `TableTennis`, `Badminton`, `Swimming`, `Boxing`, `BoardGames`, `Ball`, `Ring`, `Gloves`, `RegDate`, `UpdationDate`, `maps`, `Role`, `status`) VALUES
(2, 'West Greenhills Basketball Court', 2, 'Indoor\r\nWest Greenhills Clubhouse, Roosevelt st.', 430, 'sa3.jpg', 'sa4.jpg', 'sa5.jpg', 'sa6.jpg', '', 1, NULL, 1, 1, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-06-19 16:16:17', '2021-05-13 17:35:02', 'green.png', 'mille@gmail.com', 1),
(7, 'Manuel L. Quezon Court', 4, 'Indoor\r\nNear Places: \r\n- Hidalgo St. Quiapo Manila\r\n- Quiapo Manila\r\n\r\nFor other info, go to our website: www.manuel.com', 350, 'sa2.jpg', 'sa4.jpg', 'sa3.jpg', 'sa5.jpg', '', 1, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-02-29 06:22:48', '2021-05-13 17:18:51', 'mlqu.jpg', 'a@gmail.com', 1),
(11, 'Ermels Basketball Court', 4, 'Outdoor\r\n879 Domingo Santiago Street', 300, 'sa3.jpg', 'sa4.jpg', 'sa5.jpg', 'sa1.jpg', '', 1, 1, NULL, 1, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-03-15 13:44:26', '2021-05-13 17:18:53', 'taguigg.png', 'a@gmail.com', 1),
(16, 'Dumalo Gym', 4, 'Indoor\r\n304 Shaw Boulevard\r\n\r\nMandaluyong, Metro Manila\r\nMandaluyong City\r\n', 300, 'sa4.jpg', 'sa1.jpg', 'sa8.jpg', 'sa5.jpg', '', 1, 1, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-03-22 20:01:05', '2021-05-13 17:18:55', 'dum2.png', 'mille@gmail.com', 1),
(18, 'YMC', 5, 'Outdoor7 Sacred Heart Plaza StreetManila, 1203 Metro Manilaa', 250, '4_centennial_hs__draper41.jpg', '1055587_1_0205-Dawson-High-School-Coed-Basketball_standard.jpg', 'Blue Eagle Gym.jpg', 'c83ffbbaf6c9ee74226e015de9e6f20d.jpg', 'car_755x430.png', 1, 1, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, 1, NULL, NULL, 1, '2020-03-24 17:39:57', '2021-05-13 21:49:26', 'ymca.JPG', 'mille@gmail.com', 1),
(20, 'YMCA Taguig Branch', 9, 'YMCA Street 2, Taguig || indoor Court', 150, 'gym-flooring-construction-courtsandgreens-107.jpg', 'gym-flooring-construction-courtsandgreens-108.jpg', 'gym-flooring-construction-courtsandgreens-108.jpg', NULL, NULL, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2020-11-15 12:44:05', '2021-05-13 18:07:10', 'high2.png', 'a@gmail.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbllocations`
--

CREATE TABLE `tbllocations` (
  `id` int(11) NOT NULL,
  `LocationName` varchar(120) NOT NULL,
  `OpeningDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `group_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbllocations`
--

INSERT INTO `tbllocations` (`id`, `LocationName`, `OpeningDate`, `UpdationDate`, `group_id`) VALUES
(1, 'Pasay City', '2017-06-18 16:24:34', '2020-03-25 05:19:10', NULL),
(2, 'Makati City', '2017-06-18 16:24:50', '2020-03-16 07:31:00', NULL),
(3, 'Caloocan City', '2017-06-18 16:25:03', '2020-03-16 07:46:32', NULL),
(4, 'Quezon City', '2017-06-18 16:25:13', '2020-03-25 05:20:29', NULL),
(5, 'Manila City', '2017-06-18 16:25:24', NULL, NULL),
(6, 'Taguig City', '2017-07-05 11:02:29', '2020-03-16 08:01:49', NULL),
(7, 'Paranaque City', '2020-03-20 19:43:58', NULL, NULL),
(8, 'Pasig City', '2020-03-20 20:15:28', NULL, NULL),
(9, 'Mandaluyong City', '2020-03-25 05:18:28', '2020-11-05 09:00:26', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblpages`
--

CREATE TABLE `tblpages` (
  `id` int(11) NOT NULL,
  `PageName` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `detail` varchar(255) DEFAULT NULL,
  `manual1` varchar(255) DEFAULT NULL,
  `manual2` varchar(255) DEFAULT NULL,
  `refund` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblpages`
--

INSERT INTO `tblpages` (`id`, `PageName`, `type`, `detail`, `manual1`, `manual2`, `refund`) VALUES
(1, 'Terms and Conditions', 'terms', 'terms.jpg', NULL, NULL, ''),
(2, 'Privacy Policy', 'privacy', 'policy.jpg', NULL, NULL, ''),
(3, 'About Us ', 'aboutus', '123144402_850109938861234_1480856253897343900_n.jpg', 'gcash.png', 'paymaya.png', 'refund.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tblsubscribers`
--

CREATE TABLE `tblsubscribers` (
  `id` int(11) NOT NULL,
  `SubscriberEmail` varchar(120) DEFAULT NULL,
  `PostingDate` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblsubscribers`
--

INSERT INTO `tblsubscribers` (`id`, `SubscriberEmail`, `PostingDate`) VALUES
(14, 'mille@gmail.com', '2021-03-15 14:46:58');

-- --------------------------------------------------------

--
-- Table structure for table `tbltestimonial`
--

CREATE TABLE `tbltestimonial` (
  `id` int(11) NOT NULL,
  `UserEmail` varchar(100) NOT NULL,
  `Testimonial` mediumtext NOT NULL,
  `PostingDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbltestimonial`
--

INSERT INTO `tbltestimonial` (`id`, `UserEmail`, `Testimonial`, `PostingDate`, `status`) VALUES
(14, 'mille@gmail.com', 'Your website is goood', '2020-03-15 12:12:08', 1),
(21, 'a@gmail.com', 'A', '2020-10-15 04:13:52', 0),
(22, 'h@gmail.com', 'Angel cute', '2020-10-19 12:43:30', 1),
(23, 'hj@gmail.com', 'The website is good!', '2020-10-31 08:11:52', 1),
(24, 'mj@gmail.com', 'Thanks for this website!', '2020-11-15 10:41:53', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbltransachistory`
--

CREATE TABLE `tbltransachistory` (
  `id` int(11) NOT NULL,
  `ref` int(20) DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `paytype` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `tfee` int(11) DEFAULT NULL,
  `postingdate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbltransachistory`
--

INSERT INTO `tbltransachistory` (`id`, `ref`, `amount`, `paytype`, `email`, `tfee`, `postingdate`) VALUES
(1, 12343545, 200, 'BPI', 'a@gmail.com', 12, '2021-05-14 04:04:55'),
(2, 234567107, 1000, 'Gcash', 'mille@gmail.com', 0, '2021-05-14 04:11:59');

-- --------------------------------------------------------

--
-- Table structure for table `tblusers`
--

CREATE TABLE `tblusers` (
  `id` int(11) NOT NULL,
  `FullName` varchar(120) DEFAULT NULL,
  `EmailId` varchar(100) DEFAULT NULL,
  `Password` varchar(100) DEFAULT NULL,
  `ContactNo` char(11) DEFAULT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `City` varchar(100) DEFAULT NULL,
  `Role` varchar(50) NOT NULL,
  `Country` varchar(100) DEFAULT NULL,
  `RegDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `image` varchar(200) DEFAULT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblusers`
--

INSERT INTO `tblusers` (`id`, `FullName`, `EmailId`, `Password`, `ContactNo`, `Address`, `City`, `Role`, `Country`, `RegDate`, `UpdationDate`, `image`, `status`) VALUES
(16, 'Mj Caindoy Lebios', 'mj@gmail.com', '1234', '09357015992', 'Narra St ', 'Taguig City', 'Renter', 'Metro Manila', '2020-03-24 13:14:17', '2021-05-13 21:25:19', 'IMG_20161026_082525.jpg', 0),
(35, 'Angel  Lebios', 'a@gmail.com', '123', '09264739204', '1 Narra st.', 'Taguig City North Signal', 'Owner', 'Manila', '2020-03-24 17:30:08', '2021-05-10 15:30:02', '13567123_969626336490105_8820881039897629186_n.jpg', 0),
(37, 'Camille Brillantes ', 'mille@gmail.com', '123', '09212106296', 'Green Archers Palace', 'Vito Cruz, Taft Avenue', 'Owner', 'Matro Manila', '2020-03-25 17:35:38', '2021-05-13 18:13:34', 'camille.jpg', 0),
(40, 'Alliah Kanacan', 'hj@gmail.com', '123', '09212106296', 'Tondo St.', 'Manila City', 'Renter', 'Metro Manila, Manila', '2020-10-21 06:37:48', '2021-05-13 17:58:59', 'alliah.jpg', 0),
(46, 'Charlotte Lebios', 'charlotte@gmail.com', '123', '09264739204', 'Narra St', 'Taguig City North', 'Owner', 'Metro Manila, Manila', '2021-05-13 18:00:10', NULL, NULL, 0),
(47, 'Alice Lebios', 'alice@gmail.com', '123', '09264739204', 'vv', 'vv', 'Renter', 'Metro Manila, Manila', '2021-05-14 04:51:38', NULL, NULL, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblbooking`
--
ALTER TABLE `tblbooking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblcontactusinfo`
--
ALTER TABLE `tblcontactusinfo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblcontactusquery`
--
ALTER TABLE `tblcontactusquery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblcourts`
--
ALTER TABLE `tblcourts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbllocations`
--
ALTER TABLE `tbllocations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblpages`
--
ALTER TABLE `tblpages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblsubscribers`
--
ALTER TABLE `tblsubscribers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbltestimonial`
--
ALTER TABLE `tbltestimonial`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbltransachistory`
--
ALTER TABLE `tbltransachistory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblusers`
--
ALTER TABLE `tblusers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=158;

--
-- AUTO_INCREMENT for table `tblbooking`
--
ALTER TABLE `tblbooking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tblcontactusinfo`
--
ALTER TABLE `tblcontactusinfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblcontactusquery`
--
ALTER TABLE `tblcontactusquery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tblcourts`
--
ALTER TABLE `tblcourts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tbllocations`
--
ALTER TABLE `tbllocations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tblpages`
--
ALTER TABLE `tblpages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tblsubscribers`
--
ALTER TABLE `tblsubscribers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbltestimonial`
--
ALTER TABLE `tbltestimonial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tbltransachistory`
--
ALTER TABLE `tbltransachistory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblusers`
--
ALTER TABLE `tblusers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
