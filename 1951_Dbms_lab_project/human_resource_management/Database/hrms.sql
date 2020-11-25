-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 25, 2020 at 03:31 PM
-- Server version: 5.7.21
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hrms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `Admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `F_name` varchar(40) NOT NULL,
  `L_name` varchar(40) NOT NULL,
  `Address` varchar(40) NOT NULL,
  `Gender` varchar(40) NOT NULL,
  `Contact_no` varchar(255) NOT NULL,
  `Age` int(15) NOT NULL,
  `Role` varchar(40) NOT NULL,
  `Email` varchar(40) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Admin_image` varchar(40) NOT NULL,
  `Admin_cover` varchar(40) NOT NULL,
  `Date_time_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`Admin_id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Admin_id`, `F_name`, `L_name`, `Address`, `Gender`, `Contact_no`, `Age`, `Role`, `Email`, `Password`, `Admin_image`, `Admin_cover`, `Date_time_created`) VALUES
(11, 'Bhisiraj', 'Satardekar', 'Siolim Goa', 'Male', '8411815190', 24, 'Super Admin', 'bhisirajsatardekar@gmail.com', '0a6d38558e446984ba751a6473fd824a', 'head_red.jpg', 'default_cover.jpg', '2020-11-20 13:46:49');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

DROP TABLE IF EXISTS `department`;
CREATE TABLE IF NOT EXISTS `department` (
  `Department_id` int(11) NOT NULL AUTO_INCREMENT,
  `Dname` varchar(40) NOT NULL,
  `Contact_no` varchar(40) NOT NULL,
  `Address` varchar(40) NOT NULL,
  `Date_time_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_deleted` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`Department_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`Department_id`, `Dname`, `Contact_no`, `Address`, `Date_time_created`, `is_deleted`) VALUES
(3, 'Accounts', '9922156490', 'Mapusa Goa', '2020-11-20 19:41:18', 0),
(4, 'IT', '8411815190', 'Mapusa Goa', '2020-11-20 19:42:13', 0);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

DROP TABLE IF EXISTS `employee`;
CREATE TABLE IF NOT EXISTS `employee` (
  `Employee_id` int(11) NOT NULL AUTO_INCREMENT,
  `F_name` varchar(40) NOT NULL,
  `L_name` varchar(40) NOT NULL,
  `Address` varchar(40) NOT NULL,
  `Contact_no` varchar(40) NOT NULL,
  `Age` int(40) NOT NULL,
  `Gender` varchar(40) NOT NULL,
  `Department` varchar(40) NOT NULL,
  `Designation` varchar(40) NOT NULL,
  `Email` varchar(40) NOT NULL,
  `Salary` int(25) NOT NULL,
  `Password` varchar(90) NOT NULL,
  `Employee_image` varchar(60) NOT NULL,
  `Employee_cover` varchar(60) NOT NULL,
  `Date_time_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_deleted` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`Employee_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`Employee_id`, `F_name`, `L_name`, `Address`, `Contact_no`, `Age`, `Gender`, `Department`, `Designation`, `Email`, `Salary`, `Password`, `Employee_image`, `Employee_cover`, `Date_time_created`, `is_deleted`) VALUES
(5, 'bhisi', 'satardekar', 'Mapusa', '8411815190', 26, 'Male', 'Accounts', 'Manager', 'bhisi@gmail.com', 40000, '0a6d38558e446984ba751a6473fd824a', 'head_sun_flower.jpg', 'default_cover.jpg', '2020-11-20 19:48:56', 0),
(7, 'Rohit', 'Sharma', 'Mumbai', '8411815190', 19, 'Male', 'IT', 'junior Clerk', 'Rohit@gmail.com', 15000, '0a6d38558e446984ba751a6473fd824a', 'head_sun_flower.jpg', 'default_cover.jpg', '2020-11-20 21:50:05', 0);

-- --------------------------------------------------------

--
-- Table structure for table `leaves`
--

DROP TABLE IF EXISTS `leaves`;
CREATE TABLE IF NOT EXISTS `leaves` (
  `Leave_id` int(11) NOT NULL AUTO_INCREMENT,
  `Employee_id` int(11) NOT NULL,
  `Employee_name` varchar(255) NOT NULL,
  `Dname` varchar(255) NOT NULL,
  `Leave_from` date NOT NULL,
  `Leave_to` date NOT NULL,
  `Description` varchar(255) NOT NULL,
  `Status` varchar(255) NOT NULL,
  PRIMARY KEY (`Leave_id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `leaves`
--

INSERT INTO `leaves` (`Leave_id`, `Employee_id`, `Employee_name`, `Dname`, `Leave_from`, `Leave_to`, `Description`, `Status`) VALUES
(12, 5, 'bhisi', 'Accounts', '2020-11-25', '2020-11-26', 'sick', 'Approved');

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

DROP TABLE IF EXISTS `notice`;
CREATE TABLE IF NOT EXISTS `notice` (
  `Notice_id` int(11) NOT NULL AUTO_INCREMENT,
  `Title` varchar(255) NOT NULL,
  `Dname` varchar(255) NOT NULL,
  `Content` text NOT NULL,
  PRIMARY KEY (`Notice_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notice`
--

INSERT INTO `notice` (`Notice_id`, `Title`, `Dname`, `Content`) VALUES
(1, 'Training to be held for employees', 'IT', '<p>Date 2020-11-25</p>\r\n<p>The human resource management system can be used to manage the human resource of a company. The system helps the company to add new employee, add new department, make notice for a particular department, employee can apply for a leave.</p>\r\n<p>It keeps the admin updated with the progress of employee and to know which employee works for which department and which employee wants to take leave on which day.</p>');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
