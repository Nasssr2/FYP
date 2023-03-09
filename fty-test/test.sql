-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 30, 2022 at 07:08 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

-- DROP existing database
DROP DATABASE IF EXISTS `testDB`;

--
-- Database: `testDB`
--
CREATE DATABASE IF NOT EXISTS `testDB` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `testDB`;

-- --------------------------------------------------------

--
-- Table structure for table `User`
--

CREATE TABLE `User` (
  `User_ID` int(11) NOT NULL,
  `User_Name` varchar(100) NOT NULL,
  `phone_Number` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `User`
--

INSERT INTO `User` (`User_ID`, `User_Name`, `phone_Number`, `password`, `name`) VALUES
('1', 'Mary', '58674321', 'asd222', 'Ela'),
('2', 'Tom', '57568291', 'asd2224', 'elias');

ALTER TABLE `User`
  ADD PRIMARY KEY (`User_ID`);

ALTER TABLE `User`
  MODIFY `User_ID` int(11) NOT NULL AUTO_INCREMENT;
-- --------------------------------------------------------

--
-- Table structure for table `Pet`
--
/* 
CREATE TABLE `Pet` (
  `Pet_ID` int(11) NOT NULL,
  `Pet_Types` varchar(255) NOT NULL,
  `Pet_Name` varchar(255) NOT NULL,
  `Pet_Sex` varchar(255) NOT NULL,
  `Pet_Age` int(11) NOT NULL,
  `Pet_weight` int(11) NOT NULL,
  `Pet_chip` text NOT NULL, -- 晶片
  `Pet_Description` text DEFAULT NULL,
  `Pet_feature` text DEFAULT NULL,
  `Pet_color` text DEFAULT NULL,
  `Pet_image` varchar(100) DEFAULT NULL
--   `stockQuantity` int(11) NOT NULL DEFAULT 0,
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
*/
CREATE TABLE `Pet` (
  `Pet_ID` int(11)  NULL,
  `Pet_Types` varchar(255)  NULL,
  `Pet_Name` varchar(255)  NULL,
  `Pet_Sex` varchar(255)  NULL,
  `Pet_Age` int(11)  NULL,
  `Pet_weight` int(11)  NULL,
  `Pet_chip` text  NULL, -- 晶片
  `Pet_Description` text DEFAULT NULL,
  `Pet_feature` text DEFAULT NULL,
  `Pet_color` text DEFAULT NULL,
  `Pet_image` varchar(100) DEFAULT NULL
--   `stockQuantity` int(11) NOT NULL DEFAULT 0,
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `Pet`
--

INSERT INTO `Pet` (`Pet_ID`, `Pet_Types`, `Pet_Name`, `Pet_Sex`, `Pet_Age`, `Pet_weight`, `Pet_chip`, `Pet_Description`, `Pet_feature`, `Pet_color`, `Pet_image`) VALUES
(1, 'cat', 'Oliver', 'M', 1, 1, 'Y', 'this are so cat', 'so big', 'red', 'slampe1.jpg'),
(2, 'dog', 'Barker', 'F', 2, 2, 'N', 'this are so sdfs dog', 'so some', 'black', 'slampe2.jpg'),
(3, 'other', 'Barker', 'NG', 3, 3, 'NG', 'this are so other', 'so sad', 'red and white', 'slampe3.jpg'),
(4, 'other', 'sdfsdf', 'NG', 5, 6, 'NG', 'this are so 444', 'so 4444', '4 and 4', 'slampe4.jpg'),
(5, 'dog', '小狗', 'NG', 5, 6, 'NG', 'this are so 55', 'so 4444', '4 and 4', 'slampe5.jpg'),
(6, 'other', '比比鳥', 'NG', 5, 6, 'NG', 'this are so 66', 'so 4444', '4 and 4', 'slampe6.jpg'),
(7, 'cat', '小貓', 'NG', 5, 6, 'NG', 'this are so 777', 'so 4444', '4 and 4', 'slampe7.jpg'),
(8, 'other', 'Keroro', 'NG', 5, 6, 'NG', 'this are so 888', 'so 4444', '4 and 4', 'slampe8.jpg');


-- UPDATE Pet SET filename = 14 WHERE Pet_ID = '1';   -- pic  need
-- UPDATE Pet SET filename = '12.jpg' WHERE Pet_ID = '1';   -- pic need

ALTER TABLE `Pet`
  ADD PRIMARY KEY (`Pet_ID`);


-- --------------------------------------------------------

--
-- Table structure for table `lost_Post`
--

CREATE TABLE `lost_Post` (
  `lost_ID` int(11) NOT NULL,
  `User_ID` int(11) NOT NULL, -- needs to be coyp
  `Pet_ID` int(11) NOT NULL,  -- needs to be coyp
  `date` Date NOT NULL,
  `time` time NOT NULL,
  `area` varchar(50) NOT NULL,
  `Place` varchar(50) NOT NULL,
  `Details` varchar(50) NOT NULL,
  `coordinate` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lost_Post`
--

INSERT INTO `lost_Post` (`lost_ID`, `User_ID`, `Pet_ID`, `date`, `time`, `area`, `Place`, `Details`, `coordinate`) VALUES
('1', '1', 1, '2023-01-01', '13:21', '沙田', 'd大樓', '從窗口跳下', '22.331584, 114.181373'),
('2', '1', 2, '2023-01-02', '13:22', '屯門', 'c大樓', '從窗口跳下', '22.337041, 114.180490'),
('3', '1', 3, '2023-01-03', '13:23', '荃灣', 'b大樓', '從窗口跳下', '22.342334, 114.7675434'),
('4', '2', 4, '2023-01-04', '13:24', '荃灣', 'a大樓', '從窗口跳下', '22.111122, 114.4534454');

-- --------------------------------------------------------

ALTER TABLE `lost_Post`
  ADD PRIMARY KEY (`lost_ID`),
  ADD KEY `FK1` (`User_ID`),
  ADD KEY `FK2` (`Pet_ID`);
  
ALTER TABLE `lost_Post`
  ADD CONSTRAINT `FK1` FOREIGN KEY (`User_ID`) REFERENCES `User` (`User_ID`),
  ADD CONSTRAINT `FK2` FOREIGN KEY (`Pet_ID`) REFERENCES `Pet` (`Pet_ID`);


-- --------------------------------------------------------
--
-- Table structure for table `lost_Post`
--

CREATE TABLE `get_Post` (
  `lost_ID` int(11) NOT NULL,
  `User_ID` int(11) NOT NULL, -- needs to be coyp
  `Pet_ID` int(11) NOT NULL,  -- needs to be coyp
  `date` Date NOT NULL,
  `time` time NOT NULL,
  `area` varchar(50) NOT NULL,
  `Place` varchar(50) NOT NULL,
  `Details` varchar(50) NOT NULL,
  `coordinate` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lost_Post`
--

INSERT INTO `get_Post` (`lost_ID`, `User_ID`, `Pet_ID`, `date`, `time`, `area`, `Place`, `Details`, `coordinate`) VALUES
('1', '2', 5, '2023-01-01', '13:21', '沙田', 'd大樓', '從窗口跳下', '22.331584, 114.181373'),
('2', '2', 6, '2023-01-02', '13:22', '屯門', 'c大樓', '從窗口跳下', '22.337041, 114.180490'),
('3', '2', 7, '2023-01-03', '13:23', '荃灣', 'b大樓', '從窗口跳下', '22.342334, 114.7675434'),
('4', '2', 8, '2023-01-04', '13:24', '荃灣', 'a大樓', '從窗口跳下', '22.111122, 114.4534454');

-- --------------------------------------------------------

ALTER TABLE `get_Post`
  ADD PRIMARY KEY (`lost_ID`),
  ADD KEY `FK1_2` (`User_ID`),
  ADD KEY `FK2_2` (`Pet_ID`);
  
ALTER TABLE `get_Post`
  ADD CONSTRAINT `FK1_2` FOREIGN KEY (`User_ID`) REFERENCES `User` (`User_ID`),
  ADD CONSTRAINT `FK2_2` FOREIGN KEY (`Pet_ID`) REFERENCES `Pet` (`Pet_ID`);
COMMIT;