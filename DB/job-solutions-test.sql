-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 17, 2021 at 07:36 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.4.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `job-solutions-test`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tasks`
--

DROP TABLE IF EXISTS `tbl_tasks`;
CREATE TABLE IF NOT EXISTS `tbl_tasks` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `TaskDescription` text NOT NULL,
  `TaskDueDate` date NOT NULL,
  `AssignedBy` int(11) NOT NULL,
  `AssignedTo` int(11) NOT NULL,
  `Status` enum('Pending','InProgress','Completed') NOT NULL,
  `Created_date` datetime NOT NULL,
  `Modified_date` datetime DEFAULT NULL,
  `Modified_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_tasks`
--

INSERT INTO `tbl_tasks` (`Id`, `TaskDescription`, `TaskDueDate`, `AssignedBy`, `AssignedTo`, `Status`, `Created_date`, `Modified_date`, `Modified_by`) VALUES
(1, 'This is a First Task', '2021-06-18', 1, 2, 'Pending', '2021-06-17 10:35:00', NULL, NULL),
(2, 'This is a Second Task ', '2021-06-19', 1, 2, 'Pending', '2021-06-17 10:37:00', NULL, NULL),
(3, 'This is Third Task', '2021-06-20', 1, 2, 'Pending', '2021-06-17 10:39:00', NULL, NULL),
(4, 'This is Fourth Task', '2021-06-21', 1, 2, 'Pending', '2021-06-17 10:44:00', NULL, NULL),
(6, 'This is Sixth Task', '2021-06-17', 1, 3, 'Completed', '2021-06-17 08:00:00', NULL, NULL),
(7, 'This is Seventh Task', '2021-06-18', 1, 3, 'Pending', '2021-06-17 11:00:00', NULL, NULL),
(8, 'This is Eight Task', '2021-06-20', 1, 3, 'Pending', '2021-06-17 11:11:00', NULL, NULL),
(9, 'This is Nineth Task', '2021-06-22', 1, 3, 'Pending', '2021-06-17 11:32:00', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

DROP TABLE IF EXISTS `tbl_users`;
CREATE TABLE IF NOT EXISTS `tbl_users` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(500) NOT NULL,
  `UserId` varchar(500) NOT NULL,
  `Password` text NOT NULL,
  `UserType` enum('Manager','Employee') NOT NULL DEFAULT 'Manager',
  `Status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  `Created_date` datetime NOT NULL,
  `Modified_date` datetime DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`Id`, `Name`, `UserId`, `Password`, `UserType`, `Status`, `Created_date`, `Modified_date`) VALUES
(1, 'Test Manager', 'manager01', 'manager12021#', 'Manager', 'Active', '2021-06-17 10:25:00', NULL),
(2, 'Test Employee 01', 'employee01', 'employee12021#', 'Employee', 'Active', '2021-06-17 10:29:00', NULL),
(3, 'Test Employee 02', 'employee02', 'employee22021#', 'Employee', 'Active', '2021-06-17 14:00:00', NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
