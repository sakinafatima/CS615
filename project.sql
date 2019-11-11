-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 28, 2019 at 04:17 PM
-- Server version: 5.7.24
-- PHP Version: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `experiment1`
--

DROP TABLE IF EXISTS `experiment1`;
CREATE TABLE IF NOT EXISTS `experiment1` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `experimentID` int(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `Tasks` varchar(1000) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `user` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=59 DEFAULT CHARSET=hp8;

-- --------------------------------------------------------

--
-- Stand-in structure for view `exv`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `exv`;
CREATE TABLE IF NOT EXISTS `exv` (
`id` int(50)
,`experimentID` int(50)
,`name` varchar(50)
,`Tasks` varchar(1000)
,`subject` varchar(100)
);

-- --------------------------------------------------------

--
-- Table structure for table `researcher`
--

DROP TABLE IF EXISTS `researcher`;
CREATE TABLE IF NOT EXISTS `researcher` (
  `id` int(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=hp8;

--
-- Dumping data for table `researcher`
--

INSERT INTO `researcher` (`id`, `name`, `email`, `password`) VALUES
(1, 'sakina', 'sakina725@gmail.com', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

DROP TABLE IF EXISTS `tasks`;
CREATE TABLE IF NOT EXISTS `tasks` (
  `taskId` int(11) NOT NULL AUTO_INCREMENT,
  `taskName` varchar(200) NOT NULL,
  `url` varchar(100) NOT NULL,
  `description` varchar(6000) NOT NULL,
  PRIMARY KEY (`taskId`)
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=hp8;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`taskId`, `taskName`, `url`, `description`) VALUES
(17, 'Ireland Volcanic Activity', 'https://www.wikipedia.org/121/2211jdjd', 'okokfind volcanic activititesss'),
(31, 'bake a cake', 'https://stackoverflow.com/', 'add sugar'),
(18, 'Ireland Seaports', 'https://www.imdo.ie/Home/site-area/statistics/ports-operators/irish-port-companies', 'Find total number of seaports in Ireland and compare it with the number of seaports in UK, USA and Asia'),
(25, 'Ireland Universities', 'https://www.iua.ie/', 'Find total number of universities ');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `userID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `dob` varchar(30) NOT NULL,
  PRIMARY KEY (`userID`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=hp8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `name`, `email`, `password`, `gender`, `dob`) VALUES
(9, 'Charles Boyles', 'charlesbb@yahoo.com', '1234567890000', 'male', '2019-04-01');

-- --------------------------------------------------------

--
-- Structure for view `exv`
--
DROP TABLE IF EXISTS `exv`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `exv`  AS  select `experiment1`.`id` AS `id`,`experiment1`.`experimentID` AS `experimentID`,`experiment1`.`name` AS `name`,`experiment1`.`Tasks` AS `Tasks`,`experiment1`.`subject` AS `subject` from `experiment1` group by `experiment1`.`experimentID` ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
