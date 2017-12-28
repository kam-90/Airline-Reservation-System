-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 06, 2017 at 04:23 AM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ticket_reservation`
--

-- --------------------------------------------------------

--
-- Table structure for table `currentloc`
--

CREATE TABLE `currentloc` (
  `From_ID` int(11) NOT NULL,
  `City_Name` varchar(20) NOT NULL,
  `Airport_Name` varchar(40) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `currentloc`
--

INSERT INTO `currentloc` (`From_ID`, `City_Name`, `Airport_Name`) VALUES
(1, 'NewYork', 'JFK Airport'),
(5, 'houston', ' International Airport'),
(3, 'Boston', 'Logan Airport'),
(4, 'California', 'Ontario Airport'),
(6, 'Texas', 'Int\'l Airport');

-- --------------------------------------------------------

--
-- Table structure for table `destination`
--

CREATE TABLE `destination` (
  `To_ID` int(11) NOT NULL,
  `Dest_City` varchar(30) NOT NULL,
  `Airport_Name` varchar(40) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `destination`
--

INSERT INTO `destination` (`To_ID`, `Dest_City`, `Airport_Name`) VALUES
(1, 'Washington D.C', 'Ronald Regan Airport'),
(2, 'California', 'Ontario Airport'),
(3, 'California', 'LA Int\'l '),
(5, 'NewYork', 'JFK Airport');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `Register_ID` int(11) NOT NULL,
  `User_Name` varchar(30) NOT NULL,
  `Password` varchar(60) DEFAULT NULL,
  `Email` varchar(40) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`Register_ID`, `User_Name`, `Password`, `Email`) VALUES
(16, 'admin', '$2a$10$kFqTFBBRgoV3tcT/0Sr02eEX/H5kkWpzDo4igtK6ddNF1p3Ah0jDm', 'admin99@bu.edu'),
(18, 'professor', '$2a$10$rcq01dVaKoiwbuC.ij8zsOEG2dRT2BGc6CQEH41KnKNWh4S.SloeG', 'professor@bu.edu'),
(15, 'Kamran Saeed', '$2a$10$lZqaSJhuBo1WyHS6eZbwHOgMA/e7hiVWXif7FhldzlvBImGwTQm16', 'kam_90@outlook.com'),
(14, 'kam saeed', '$2a$10$eDUpxx6Am.qWlTx/AGVE9eEK0JwYv5s8Jz.f.Qfhu2MIavj0Xsjei', 'kamran90@bu.edu'),
(17, 'alpha beta', '$2a$10$wdJxtmQF/ZVOK.RbN4IEn.Miuo4rBp55g.ZIdOihTZwZOqxA0g2l6', 'alpha@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `ticketcart`
--

CREATE TABLE `ticketcart` (
  `Cart_ID` int(11) NOT NULL,
  `Customer_ID` int(11) NOT NULL,
  `Ticket_ID` int(11) NOT NULL,
  `Session_ID` varchar(30) NOT NULL,
  `Trip_Type` varchar(12) NOT NULL,
  `Seat_Class` varchar(9) NOT NULL,
  `Total_Fare` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ticketcart`
--

INSERT INTO `ticketcart` (`Cart_ID`, `Customer_ID`, `Ticket_ID`, `Session_ID`, `Trip_Type`, `Seat_Class`, `Total_Fare`) VALUES
(4, 14, 1101, 'q2tmbv85aaeff5s2u7hebh9mf3', 'OneWay', 'Economy', 105),
(3, 14, 1100, 'q2tmbv85aaeff5s2u7hebh9mf3', 'RoundTrip', 'Economy', 105),
(5, 17, 1101, 'q2tmbv85aaeff5s2u7hebh9mf3', 'OneWay', 'Economy', 105),
(7, 18, 1103, 'q2tmbv85aaeff5s2u7hebh9mf3', 'OneWay', 'Economy', 220);

-- --------------------------------------------------------

--
-- Table structure for table `ticketdetails`
--

CREATE TABLE `ticketdetails` (
  `Ticket_ID` int(11) NOT NULL,
  `Airline_Name` varchar(30) NOT NULL,
  `Airline_image` varchar(50) DEFAULT NULL,
  `From_ID` int(11) NOT NULL,
  `To_ID` int(11) NOT NULL,
  `Ticket_Date` date NOT NULL,
  `Return_Date` date DEFAULT NULL,
  `Depart_Time` time NOT NULL,
  `Arrival_Time` time NOT NULL,
  `Return_Depart_Time` time DEFAULT NULL,
  `Return_Arrival_Time` time DEFAULT NULL,
  `Ticket_Type` varchar(11) NOT NULL,
  `Economy_Price` int(11) NOT NULL,
  `Business_Price` int(11) NOT NULL,
  `Discount_Price` int(11) NOT NULL,
  `Total_Seats` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ticketdetails`
--

INSERT INTO `ticketdetails` (`Ticket_ID`, `Airline_Name`, `Airline_image`, `From_ID`, `To_ID`, `Ticket_Date`, `Return_Date`, `Depart_Time`, `Arrival_Time`, `Return_Depart_Time`, `Return_Arrival_Time`, `Ticket_Type`, `Economy_Price`, `Business_Price`, `Discount_Price`, `Total_Seats`) VALUES
(1100, 'American Airline', NULL, 1, 2, '2017-05-24', '2017-05-31', '10:30:00', '12:40:00', '15:40:00', '17:50:00', 'RoundTrip', 145, 220, 28, 175),
(1101, 'American Airline', NULL, 1, 2, '2017-05-24', '2017-05-31', '05:15:00', '07:30:00', NULL, NULL, 'OneWay', 125, 195, 20, 220),
(1102, 'alpha', NULL, 1, 1, '2017-05-26', '2017-05-31', '14:22:00', '02:33:00', '02:33:00', '02:05:00', 'OneWay', 111, 111, 20, 50),
(1103, 'Delta', NULL, 3, 5, '2017-05-10', '2017-05-30', '02:02:00', '04:02:00', '01:01:00', '03:02:00', 'OneWay', 120, 240, 20, 150);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `currentloc`
--
ALTER TABLE `currentloc`
  ADD PRIMARY KEY (`From_ID`);

--
-- Indexes for table `destination`
--
ALTER TABLE `destination`
  ADD PRIMARY KEY (`To_ID`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`Register_ID`);

--
-- Indexes for table `ticketcart`
--
ALTER TABLE `ticketcart`
  ADD PRIMARY KEY (`Cart_ID`),
  ADD KEY `Ticket_ID` (`Ticket_ID`);

--
-- Indexes for table `ticketdetails`
--
ALTER TABLE `ticketdetails`
  ADD PRIMARY KEY (`Ticket_ID`),
  ADD KEY `From_ID` (`From_ID`),
  ADD KEY `To_ID` (`To_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `currentloc`
--
ALTER TABLE `currentloc`
  MODIFY `From_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `destination`
--
ALTER TABLE `destination`
  MODIFY `To_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `Register_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `ticketcart`
--
ALTER TABLE `ticketcart`
  MODIFY `Cart_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `ticketdetails`
--
ALTER TABLE `ticketdetails`
  MODIFY `Ticket_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1104;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
