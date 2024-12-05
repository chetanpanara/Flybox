-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 25, 2022 at 04:39 AM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `flybox`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` int(1) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `email`, `password`, `created_date`) VALUES
(1, 'admin@admin.com', 'admin123', '2022-03-12 20:28:41');

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

DROP TABLE IF EXISTS `bill`;
CREATE TABLE IF NOT EXISTS `bill` (
  `bill_no` int(11) NOT NULL AUTO_INCREMENT,
  `sender_name` varchar(30) NOT NULL,
  `origin` int(11) NOT NULL,
  `courier_price` decimal(10,2) NOT NULL,
  `destination` int(11) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`bill_no`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bill`
--

INSERT INTO `bill` (`bill_no`, `sender_name`, `origin`, `courier_price`, `destination`, `created_date`) VALUES
(1, 'Ravi Dharajiya', 1, '50.00', 3, '2022-03-13 10:05:12'),
(2, 'Baraiya Vijay', 1, '200.00', 8, '2022-03-14 18:44:16'),
(3, 'Dipak Kihala', 8, '1000.00', 5, '2022-03-14 18:48:22'),
(4, 'Anil Parmar', 2, '200.00', 6, '2022-03-15 17:44:24'),
(5, 'Kuldip Bavaliya', 3, '1000.00', 9, '2022-03-25 09:51:05');

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

DROP TABLE IF EXISTS `branch`;
CREATE TABLE IF NOT EXISTS `branch` (
  `branch_id` int(11) NOT NULL AUTO_INCREMENT,
  `street` varchar(50) NOT NULL,
  `city` varchar(20) NOT NULL,
  `state` varchar(20) NOT NULL,
  `pincode` int(6) NOT NULL,
  `email` varchar(30) NOT NULL,
  `contact` varchar(10) NOT NULL,
  `password` varchar(20) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`branch_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`branch_id`, `street`, `city`, `state`, `pincode`, `email`, `contact`, `password`, `created_date`) VALUES
(1, 'haveli chowk', 'Botad', 'Gujarat', 364710, 'haveli@gmail.com', '9099565460', '9099565460', '2022-03-12 20:56:41'),
(2, 'Tower road', 'Botad', 'Gujarat', 364710, 'tower@gmail.com', '7861000576', '7861000576', '2022-03-12 20:58:33'),
(3, 'Waghawadi road', 'Bhavnagar', 'Gujarat', 360001, 'waghawadi@gmail.com', '9725342123', 'waghawadi123', '2022-03-12 21:03:59'),
(4, 'Sidsar', 'Bhavnagar', 'Gujarat', 360001, 'sidsar@gmail.com', '9987231234', 'sidsar123', '2022-03-12 21:07:22'),
(5, 'Ashram Road', 'Ahmedabad', 'Gujarat', 380009, 'ashram@gmail.com', '7032324531', 'ashram123', '2022-03-12 21:08:17'),
(6, 'Bapunagar', 'Ahmedabad', 'Gujarat', 380024, 'bapunagar@gmail.com', '7634542314', 'bapunagar123', '2022-03-12 21:09:22'),
(7, 'Katargam road', 'Surat', 'Gujarat', 395003, 'katargam@gmail.com', '7843531275', 'katargam123', '2022-03-12 21:11:13'),
(8, 'Gondal road', 'Rajkot', 'Gujarat', 360311, 'gondal@gmail.com', '8756432271', 'gondal123', '2022-03-12 21:12:34'),
(9, 'Jasdan road', 'Atkot', 'Gujarat', 364050, 'jasdan@gmail.com', '4567098756', 'jasdan123', '2022-03-14 19:57:44');

-- --------------------------------------------------------

--
-- Table structure for table `courier`
--

DROP TABLE IF EXISTS `courier`;
CREATE TABLE IF NOT EXISTS `courier` (
  `courier_id` int(11) NOT NULL AUTO_INCREMENT,
  `sender_name` varchar(30) NOT NULL,
  `sender_address` varchar(100) NOT NULL,
  `sender_contact` varchar(10) NOT NULL,
  `receiver_name` varchar(30) NOT NULL,
  `receiver_address` varchar(100) NOT NULL,
  `receiver_contact` varchar(10) NOT NULL,
  `from_branch` int(11) NOT NULL,
  `to_branch` int(11) NOT NULL,
  `courier_type` int(1) NOT NULL,
  `weight` varchar(20) NOT NULL,
  `height` varchar(20) NOT NULL,
  `length` varchar(20) NOT NULL,
  `width` varchar(20) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `track_no` int(10) NOT NULL,
  `status` int(2) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`courier_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `courier`
--

INSERT INTO `courier` (`courier_id`, `sender_name`, `sender_address`, `sender_contact`, `receiver_name`, `receiver_address`, `receiver_contact`, `from_branch`, `to_branch`, `courier_type`, `weight`, `height`, `length`, `width`, `price`, `track_no`, `status`, `created_date`) VALUES
(1, 'Ravi Dharajiya', 'Temple road,Botad,364710', '7865423456', 'Sunil Rathod', 'Sardarnagar circle,Bhavnagar,360001', '9087643432', 1, 3, 2, '0', '0', '0', '0', '50.00', 461018, 9, '2022-03-12 21:27:34'),
(2, 'Baraiya Vijay', 'Khakhui road', '6789034231', 'Yogesh Sarvaiya', 'Rajkot road', '8765439087', 1, 8, 1, '2', '1', '1', '1', '200.00', 841053, 0, '2022-03-14 18:44:16'),
(3, 'Dipak Kihala', 'Bhabhan road', '6755460986', 'Ajay Gabu', 'Gadhada road', '4567709781', 8, 5, 1, '10', '20', '20', '20', '1000.00', 153202, 0, '2022-03-14 18:48:22'),
(4, 'Kuldip Bavaliya', 'Vadod', '7834545678', 'Jignesh Parmar', 'Atkot', '9987536890', 3, 9, 1, '10', '12', '12', '12', '1000.00', 560695, 0, '2022-03-25 09:51:04');

-- --------------------------------------------------------

--
-- Table structure for table `courier_track`
--

DROP TABLE IF EXISTS `courier_track`;
CREATE TABLE IF NOT EXISTS `courier_track` (
  `track_id` int(11) NOT NULL AUTO_INCREMENT,
  `courier_id` int(11) NOT NULL,
  `status` int(2) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`track_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `courier_track`
--

INSERT INTO `courier_track` (`track_id`, `courier_id`, `status`, `created_date`) VALUES
(1, 1, 2, '2022-03-12 21:30:48'),
(2, 1, 3, '2022-03-12 21:31:08'),
(3, 1, 4, '2022-03-12 21:31:23'),
(4, 1, 5, '2022-03-12 21:32:19'),
(5, 1, 6, '2022-03-12 21:32:29'),
(6, 1, 7, '2022-03-12 21:32:41'),
(7, 1, 8, '2022-03-12 21:32:54'),
(8, 1, 9, '2022-03-12 21:46:36'),
(9, 1, 7, '2022-03-12 21:56:15'),
(10, 1, 9, '2022-03-12 22:04:53'),
(11, 1, 3, '2022-03-12 22:05:04'),
(12, 1, 7, '2022-03-12 22:06:41'),
(13, 1, 1, '2022-03-24 14:38:15'),
(14, 1, 9, '2022-03-24 14:38:23');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE IF NOT EXISTS `customer` (
  `customer_id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`customer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `firstname`, `lastname`, `email`, `password`, `created_date`) VALUES
(1, 'Anil', 'Parmar', 'anil@gmail.com', 'anil123456', '2022-03-13 13:35:00'),
(2, 'Jayesh', 'Bhalala', 'jk@gmail.com', 'jk123456', '2022-03-14 20:09:22'),
(3, 'Bavaliya', 'Kuldip', 'kuldip@gmail.com', 'kuldip123', '2022-03-25 09:49:31');

-- --------------------------------------------------------

--
-- Table structure for table `pricelist`
--

DROP TABLE IF EXISTS `pricelist`;
CREATE TABLE IF NOT EXISTS `pricelist` (
  `price_id` int(11) NOT NULL AUTO_INCREMENT,
  `origin` int(11) NOT NULL,
  `destination` int(11) NOT NULL,
  `weight` varchar(20) NOT NULL,
  `d_price` int(10) NOT NULL,
  `p_price` int(10) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`price_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pricelist`
--

INSERT INTO `pricelist` (`price_id`, `origin`, `destination`, `weight`, `d_price`, `p_price`, `created_date`) VALUES
(1, 1, 3, '1', 100, 50, '2022-03-12 21:35:46'),
(2, 3, 5, '1', 150, 100, '2022-03-12 21:36:22'),
(4, 2, 7, '1', 200, 150, '2022-03-12 21:38:09'),
(5, 7, 3, '1', 300, 150, '2022-03-12 21:38:26'),
(6, 4, 8, '1', 250, 150, '2022-03-12 21:38:44');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

DROP TABLE IF EXISTS `staff`;
CREATE TABLE IF NOT EXISTS `staff` (
  `staff_id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `contact` varchar(10) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`staff_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staff_id`, `firstname`, `lastname`, `branch_id`, `contact`, `email`, `password`, `created_date`) VALUES
(1, 'Jayesh', 'Bhalala', 2, '9099565460', 'jayeshbhalala@gmail.com', '9099565460', '2022-03-12 20:57:42'),
(2, 'Jignesh', 'Parmar', 1, '9510423683', 'parmarjigs428@gmail.com', 'jig@1234', '2022-03-12 21:17:01'),
(3, 'Keval', 'Jasoliya', 3, '7865523871', 'keval@gmail.com', 'keval123', '2022-03-12 21:17:37'),
(4, 'Kartik', 'Vaghasiya', 4, '6754230962', 'kartikvaghasiya@gmail.com', 'kartik123', '2022-03-12 21:18:09'),
(5, 'Yogesh', 'Sarvaiya', 8, '868000382', 'yogesh@gmail.com', 'yogesg123', '2022-03-12 21:18:55'),
(6, 'Ketan', 'Makawana', 7, '9865432123', 'ketan@gmail.com', 'ketan123', '2022-03-12 21:19:38'),
(7, 'Pratik', 'Parmar', 5, '6794573523', 'pratikparmar@gmail.com', 'pratik123', '2022-03-12 21:20:48'),
(8, 'Chetan', 'Panara', 6, '7065432134', 'chetan@gmail.com', 'chetan123', '2022-03-14 19:56:15');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
