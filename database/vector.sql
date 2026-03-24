-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 24, 2026 at 09:53 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

CREATE DATABASE IF NOT EXISTS `vector`
  DEFAULT CHARACTER SET utf8
  COLLATE utf8_hungarian_ci;

USE `vector`;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `vector`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendees`
--

CREATE TABLE `attendees` (
  `id` int(11) NOT NULL,
  `event_id` int(11) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `ticket_code` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- Dumping data for table `attendees`
--

INSERT INTO `attendees` (`id`, `event_id`, `email`, `name`, `ticket_code`) VALUES
(330, 2, 'Teszt388', 'teszt901@mail.com', 'd63a0ab1de'),
(331, 2, 'Teszt62', 'teszt243@mail.com', '3191e98ec7'),
(332, 2, 'Teszt474', 'teszt418@mail.com', 'b507bfbfee'),
(333, 2, 'Teszt806', 'teszt578@mail.com', '5a7183546b'),
(334, 2, 'Teszt221', 'teszt51@mail.com', '65517cb72f'),
(335, 2, 'Teszt332', 'teszt815@mail.com', '051a32fa0e'),
(336, 2, 'Teszt40', 'teszt941@mail.com', '24aefdec4f'),
(337, 2, 'Teszt256', 'teszt221@mail.com', 'b8983a50f9'),
(338, 2, 'Teszt880', 'teszt496@mail.com', 'e4bff876c3'),
(339, 2, 'Teszt785', 'teszt197@mail.com', 'ba2877d5c4'),
(340, 1, 'Teszt811', 'teszt665@mail.com', 'b4b7a47573'),
(341, 1, 'Teszt405', 'teszt734@mail.com', '8ef992da07'),
(342, 1, 'Teszt21', 'teszt201@mail.com', 'e9fd7520ef'),
(343, 1, 'Teszt321', 'teszt621@mail.com', 'c275533e12'),
(344, 1, 'Teszt968', 'teszt389@mail.com', '66633366ca'),
(345, 1, 'Teszt109', 'teszt567@mail.com', '5a4cca4355'),
(346, 1, 'Teszt44', 'teszt209@mail.com', '29691d7274'),
(347, 1, 'Teszt809', 'teszt558@mail.com', '21be3d47f9'),
(348, 1, 'Teszt883', 'teszt541@mail.com', 'c5401ce21a'),
(349, 1, 'Teszt79', 'teszt413@mail.com', 'e7b821d70a');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `start_date` datetime DEFAULT NULL,
  `capacity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `name`, `start_date`, `capacity`) VALUES
(1, 'event1', '2026-03-24 09:50:34', 10),
(2, 'event2', '2027-03-01 20:40:00', 10),
(3, 'event3', '2028-03-22 09:40:44', 10);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendees`
--
ALTER TABLE `attendees`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ticket_code` (`ticket_code`),
  ADD KEY `fk_eventIdAttendees` (`event_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendees`
--
ALTER TABLE `attendees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=360;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendees`
--
ALTER TABLE `attendees`
  ADD CONSTRAINT `fk_eventIdAttendees` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
