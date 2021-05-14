-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 02, 2021 at 08:02 PM
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
(135, 'mj@gmail.com', '2020-11-16 12:00:00', '2020-11-16 13:00:00', NULL, '2', 1, NULL, 'mj@gmail.com<br> '),
(138, 'hj@gmail.com', '2021-03-16 10:00:00', '2021-03-16 11:00:00', NULL, '2', NULL, NULL, 'hj@gmail.com<br> '),
(139, 'mj@gmail.com', '2021-04-29 20:00:00', '2021-04-29 22:00:00', NULL, '2', NULL, NULL, 'mj@gmail.com<br> '),
(140, 'mj@gmail.com', '2021-04-30 09:00:00', '2021-04-30 12:00:00', NULL, '4', NULL, NULL, 'mj@gmail.com<br>');

-- --------------------------------------------------------

--
-- Table structure for table `events1`
--

CREATE TABLE `events1` (
  `id` int(11) NOT NULL,
  `name` text,
  `start` datetime DEFAULT NULL,
  `end` datetime DEFAULT NULL,
  `resource` varchar(30) DEFAULT NULL,
  `court` text,
  `etc` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `events2`
--

CREATE TABLE `events2` (
  `id` int(11) NOT NULL,
  `name` text,
  `start` datetime DEFAULT NULL,
  `end` datetime DEFAULT NULL,
  `resource` varchar(30) DEFAULT NULL,
  `court` text,
  `etc` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events2`
--

INSERT INTO `events2` (`id`, `name`, `start`, `end`, `resource`, `court`, `etc`) VALUES
(1, 'Hana Joy Lebios', '2020-10-07 10:30:00', '2020-10-07 11:30:00', NULL, 'West Greenhills Basketball Court', 'Hana Joy Lebios<br>West Greenhills Basketball Court');

-- --------------------------------------------------------

--
-- Table structure for table `events3`
--

CREATE TABLE `events3` (
  `id` int(11) NOT NULL,
  `name` text,
  `start` datetime DEFAULT NULL,
  `end` datetime DEFAULT NULL,
  `resource` varchar(30) DEFAULT NULL,
  `court` text,
  `etc` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `events4`
--

CREATE TABLE `events4` (
  `id` int(11) NOT NULL,
  `name` text,
  `start` datetime DEFAULT NULL,
  `end` datetime DEFAULT NULL,
  `resource` varchar(30) DEFAULT NULL,
  `court` text,
  `etc` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `events5`
--

CREATE TABLE `events5` (
  `id` int(11) NOT NULL,
  `name` text,
  `start` datetime DEFAULT NULL,
  `end` datetime DEFAULT NULL,
  `resource` varchar(30) DEFAULT NULL,
  `court` text,
  `Status` int(11) DEFAULT NULL,
  `eventsid` int(11) DEFAULT NULL,
  `etc` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events5`
--

INSERT INTO `events5` (`id`, `name`, `start`, `end`, `resource`, `court`, `Status`, `eventsid`, `etc`) VALUES
(1, 'MaryJane Lebios', '2020-09-22 09:00:00', '2020-09-22 11:00:00', NULL, 'Dumalo Gym', NULL, NULL, 'MaryJane Lebios<br>Dumalo Gym'),
(2, 'MaryJane Lebios', '2020-09-29 11:00:00', '2020-09-29 13:30:00', NULL, 'Dumalo Gym', NULL, NULL, 'MaryJane Lebios<br>Dumalo Gym'),
(3, 'Hana Joy Lebios', '2020-09-30 12:00:00', '2020-09-30 14:00:00', NULL, 'Dumalo Gym', NULL, NULL, 'Hana Joy Lebios<br>Dumalo Gym');

-- --------------------------------------------------------

--
-- Table structure for table `events6`
--

CREATE TABLE `events6` (
  `id` int(11) NOT NULL,
  `name` text,
  `start` datetime DEFAULT NULL,
  `end` datetime DEFAULT NULL,
  `resource` varchar(30) DEFAULT NULL,
  `court` text,
  `etc` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `events7`
--

CREATE TABLE `events7` (
  `id` int(11) NOT NULL,
  `name` text,
  `start` datetime DEFAULT NULL,
  `end` datetime DEFAULT NULL,
  `resource` varchar(30) DEFAULT NULL,
  `court` text,
  `etc` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `resources`
--

CREATE TABLE `resources` (
  `id` int(11) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `group_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(8, 'Angel ', 'Lebios', '123456', '0000-00-00', '12312', 'mj@gmail.com');

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
(2, 'West Greenhills Basketball Court', 2, 'Indoor\r\nWest Greenhills Clubhouse, Roosevelt st.', 400, 'sa3.jpg', 'sa4.jpg', 'sa5.jpg', 'sa6.jpg', '', 1, NULL, 1, 1, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-06-19 16:16:17', '2020-11-15 14:10:39', 'green.png', 'mille@gmail.com', 1),
(4, 'Fort Bonifacio Tenement', 6, 'Outdoor\r\nTenement, Sampaguita, Taguig, 1630 Metro Manila\r\n', 500, 'tent.jpg', 'sa2.jpg', 'sa3.jpg', 'sa1.jpg', '', 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-06-19 16:18:43', '2020-11-15 13:24:55', 'taguig.png', 'a@gmail.com', 1),
(7, 'Manuel L. Quezon Court', 4, 'Indoor\r\nNear Places: \r\n- Hidalgo St. Quiapo Manila\r\n- Quiapo Manila\r\n\r\nFor other info, go to our website: www.manuel.com', 350, 'sa2.jpg', 'sa4.jpg', 'sa3.jpg', 'sa5.jpg', '', 1, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-02-29 06:22:48', '2020-11-15 14:11:01', 'mlqu.jpg', 'a@gmail.com', 1),
(11, 'Ermels Basketball Court', 4, 'Outdoor\r\n879 Domingo Santiago Street', 300, 'sa3.jpg', 'sa4.jpg', 'sa5.jpg', 'sa1.jpg', '', 1, 1, NULL, 1, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-03-15 13:44:26', '2020-11-15 13:22:57', 'taguigg.png', 'a@gmail.com', 1),
(16, 'Dumalo Gym', 4, 'Indoor\r\n304 Shaw Boulevard\r\n\r\nMandaluyong, Metro Manila\r\nMandaluyong City\r\n', 300, 'sa4.jpg', 'sa1.jpg', 'sa8.jpg', 'sa5.jpg', '', 1, 1, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-03-22 20:01:05', '2020-11-15 13:22:59', 'dum2.png', 'mille@gmail.com', 1),
(18, 'YMCA', 5, 'Outdoor\r\n7 Sacred Heart Plaza StreetManila, 1203 Metro Manilaa', 300, 'fitness-center-basketball-court-company-nj-ny-nyc-ct-pa-md-de-compressor.jpg', 'DunbarPano.jpg', 'featured-img-1.jpg', '', '', NULL, 1, 1, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-03-24 17:39:57', '2020-11-15 13:23:00', 'ymca.JPG', 'mille@gmail.com', 1),
(20, 'YMCA 2', 9, 'YMCA Street 2, Manila || indoor Court', 200, '1055587_1_0205-Dawson-High-School-Coed-Basketball_standard.jpg', '4_centennial_hs__draper41.jpg', 'Blue Eagle Gym.jpg', 'c83ffbbaf6c9ee74226e015de9e6f20d.jpg', 'court.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, 1, 1, NULL, '2020-11-15 12:44:05', '2021-04-30 07:31:21', 'high2.png', 'a@gmail.com', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tblevents`
--

CREATE TABLE `tblevents` (
  `id` int(11) NOT NULL,
  `userEmail` varchar(100) DEFAULT NULL,
  `start` datetime DEFAULT NULL,
  `end` datetime DEFAULT NULL,
  `Status` int(11) DEFAULT NULL,
  `CourtId` int(11) NOT NULL,
  `Posting Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblevents`
--

INSERT INTO `tblevents` (`id`, `userEmail`, `start`, `end`, `Status`, `CourtId`, `Posting Date`) VALUES
(1, 'mille@gmail.com', '2020-03-20 13:30:00', '2020-03-20 14:30:00', 2, 1, '2020-03-20 13:13:13');

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
(3, 'About Us ', 'aboutus', '123144402_850109938861234_1480856253897343900_n.jpg', 'gcash.png', 'paymaya.png', 'softdes refund.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tblpending`
--

CREATE TABLE `tblpending` (
  `id` int(11) NOT NULL,
  `pLocation` varchar(25) NOT NULL,
  `pCourtBrand` varchar(25) NOT NULL,
  `pCourtOverview` varchar(25) NOT NULL,
  `pPrice` int(25) NOT NULL,
  `pVimage1` varchar(25) NOT NULL,
  `pVimage2` varchar(25) NOT NULL,
  `pVimage3` varchar(25) NOT NULL,
  `pVimage4` varchar(25) NOT NULL,
  `pVimage5` varchar(25) NOT NULL,
  `pvolleyball` varchar(25) NOT NULL,
  `pbasketball` varchar(25) NOT NULL,
  `pshuttlecock` varchar(25) NOT NULL,
  `pnet` varchar(25) NOT NULL,
  `pwashroom` varchar(25) NOT NULL,
  `pscoreboard` varchar(25) NOT NULL,
  `pwater` varchar(25) NOT NULL,
  `pbleachers` varchar(25) NOT NULL,
  `RegDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdationDate` timestamp(6) NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(20, 'mj@gmail.com', '\r\nI like your website, its useful.', '2020-03-25 17:40:17', 0),
(21, 'a@gmail.com', 'A', '2020-10-15 04:13:52', NULL),
(22, 'h@gmail.com', 'Angel cute', '2020-10-19 12:43:30', 1),
(23, 'hj@gmail.com', 'The website is good!', '2020-10-31 08:11:52', 1),
(24, 'mj@gmail.com', 'Thanks for this website!', '2020-11-15 10:41:53', NULL);

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
  `image` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblusers`
--

INSERT INTO `tblusers` (`id`, `FullName`, `EmailId`, `Password`, `ContactNo`, `Address`, `City`, `Role`, `Country`, `RegDate`, `UpdationDate`, `image`) VALUES
(16, 'Mj Lebios', 'mj@gmail.com', '1234', '09357015992', 'Narra St ', 'Taguig City', 'Renter', 'Metro Manila', '2020-03-24 13:14:17', '2021-04-23 15:08:18', 'IMG_20161026_082525.jpg'),
(35, 'Angel Caindoy Lebios', 'a@gmail.com', '1234', '09264739204', '1 Narra st.', 'Taguig City North Signal', 'Owner', 'Manila', '2020-03-24 17:30:08', '2020-11-15 13:57:52', '13567123_969626336490105_8820881039897629186_n.jpg'),
(37, 'Camille Brillantes Matira', 'mille@gmail.com', '123', '09212106296', 'Green Archers Palace', 'Vito Cruz, Taft Avenue', 'Owner', 'Matro Manila', '2020-03-25 17:35:38', '2020-10-31 11:35:43', 'camille.jpg'),
(40, 'Alliah Kanacan', 'hj@gmail.com', '123', '09212106296', 'Tondo St.', 'Manila City', 'Renter', 'Metro Manila, Manila', '2020-10-21 06:37:48', '2020-10-31 10:51:11', 'alliah.jpg'),
(42, 'Jean Catambay', 'jean@gmail.com', '123', '09971858126', '#2', 'Lipa City', 'Renter', 'Batangas', '2021-03-15 06:55:52', NULL, NULL);

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
-- Indexes for table `events1`
--
ALTER TABLE `events1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events2`
--
ALTER TABLE `events2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events3`
--
ALTER TABLE `events3`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events4`
--
ALTER TABLE `events4`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events5`
--
ALTER TABLE `events5`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events6`
--
ALTER TABLE `events6`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events7`
--
ALTER TABLE `events7`
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
-- Indexes for table `tblevents`
--
ALTER TABLE `tblevents`
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
-- Indexes for table `tblpending`
--
ALTER TABLE `tblpending`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=141;

--
-- AUTO_INCREMENT for table `events1`
--
ALTER TABLE `events1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `events2`
--
ALTER TABLE `events2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `events3`
--
ALTER TABLE `events3`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `events4`
--
ALTER TABLE `events4`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `events5`
--
ALTER TABLE `events5`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `events6`
--
ALTER TABLE `events6`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblbooking`
--
ALTER TABLE `tblbooking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
-- AUTO_INCREMENT for table `tblusers`
--
ALTER TABLE `tblusers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
