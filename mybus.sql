-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 14, 2018 at 05:45 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mybus`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `user_name` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `user_name`, `password`, `email`) VALUES
(1, 'amitgomi', 'gomi', 'amitgomi525.ag@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `bus`
--

CREATE TABLE `bus` (
  `bus_id` int(11) NOT NULL,
  `bus_no` varchar(25) NOT NULL,
  `intermediate_station` varchar(1024) NOT NULL,
  `driver_name` varchar(256) NOT NULL,
  `total_seats` int(11) NOT NULL,
  `intermediate_price` varchar(256) NOT NULL,
  `intermediate_time` varchar(1024) NOT NULL,
  `photo` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bus`
--

INSERT INTO `bus` (`bus_id`, `bus_no`, `intermediate_station`, `driver_name`, `total_seats`, `intermediate_price`, `intermediate_time`, `photo`) VALUES
(1, 'HR 10 A1234', 'allahabad,kanpur,mathura,alwar', 'good_driver', 30, '0,50,40,50', '06:10 AM,07:10 AM,08:10 AM,09:10 AM', '1.jpeg'),
(2, 'UP 10 F 1243', 'lucknow,kanpur,fatehpur,allahabad,handia,gopiganj,varanasi', 'ravi', 37, '0,45,26,48,75,59,48', '05:48 PM,08:15 PM,09:16 PM,10:48 PM,11:26 PM,11:55 PM,12:48 AM', '2.jpeg'),
(3, 'UP 11 F 1326', 'delhi,lucknow,kanpur,fatehpur,allahabad,handia,gopiganj,varanasi', 'ravi', 37, '0,34,45,26,48,75,59,48', '05:48 AM,08:15 AM,09:16 AM,10:48 AM,11:26 AM,11:55 AM,12:08 PM,12:48 PM', '3.jpeg'),
(4, 'UP 18 F 1343', 'delhi,bareilly,lucknow,faizabad,gorakhpur,jaunpur,varanasi', 'bittu_dalal', 34, '0,50,84,56,95,52,45', '09:00 AM,11:00 AM,12:30 PM,02:10 PM,03:12 PM,03:55 PM,05:00 PM', '4.jpeg'),
(5, 'DL 5 S 7856', 'delhi,gurugram,rewari,mahendragarh,narnaul,jaipur,tonk,bundi,kota', 'pandey', 34, '0,45,53,25,45,25,55,95,55', '08:00 AM,09:00 AM,09:45 AM,10:45 AM,11:15 AM,02:15 PM,05:30 PM,08:15 PM,09:00 PM', '5.jpeg'),
(9, 'a', 'a,a,a', 'a', 30, '0,12,12', '1:01 pm,1:01 am,3:03 pm', 'a');

-- --------------------------------------------------------

--
-- Table structure for table `seats`
--

CREATE TABLE `seats` (
  `bus_id` int(11) NOT NULL,
  `date1` date NOT NULL,
  `available_seats` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `seats`
--

INSERT INTO `seats` (`bus_id`, `date1`, `available_seats`) VALUES
(1, '2018-04-09', 25),
(1, '2018-04-08', 29),
(1, '2018-04-06', 31),
(1, '2018-04-10', 29),
(1, '0000-00-00', 30),
(2, '2018-05-05', 37),
(3, '2018-05-05', 35),
(2, '2018-04-10', 33),
(3, '2018-04-10', 35),
(1, '2018-04-11', 30),
(1, '2018-04-12', 30),
(1, '2018-04-05', 28),
(4, '2018-04-10', 34),
(5, '2018-04-10', 31),
(2, '2018-04-11', 37),
(3, '2018-04-11', 37),
(2, '2018-04-12', 37),
(3, '2018-04-12', 37),
(1, '2018-04-14', 30),
(1, '2018-04-21', 30),
(1, '2018-04-19', 29),
(1, '2018-04-18', 30),
(1, '2018-04-17', 30);

-- --------------------------------------------------------

--
-- Table structure for table `station`
--

CREATE TABLE `station` (
  `station_id` int(11) NOT NULL,
  `s_name` varchar(256) NOT NULL,
  `bus_ids` varchar(1024) NOT NULL,
  `bus_times` varchar(1024) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

CREATE TABLE `ticket` (
  `ticket_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `bus_id` int(11) NOT NULL,
  `source` varchar(256) NOT NULL,
  `destination` varchar(256) NOT NULL,
  `price` int(11) NOT NULL,
  `time_of_booking` varchar(50) NOT NULL,
  `no_of_passenger` int(11) NOT NULL,
  `date_of_journey` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ticket`
--

INSERT INTO `ticket` (`ticket_id`, `user_id`, `bus_id`, `source`, `destination`, `price`, `time_of_booking`, `no_of_passenger`, `date_of_journey`) VALUES
(28, 5, 1, 'allahabad', 'kanpur', 50, '2018-04-08 01:31:16pm GMT', 1, '2018-04-10'),
(29, 5, 1, 'allahabad', 'kanpur', 50, '2018-04-08 01:31:27pm GMT', 1, '2018-04-10'),
(30, 5, 3, 'allahabad', 'varanasi', 230, '2018-04-08 01:47:48pm GMT', 2, '2018-05-05'),
(31, 5, 2, 'allahabad', 'varanasi', 230, '2018-04-08 02:24:46pm GMT', 1, '2018-04-10'),
(32, 1, 1, 'allahabad', 'kanpur', 50, '2018-04-08 05:29:57pm GMT', 1, '2018-04-08'),
(33, 1, 1, 'allahabad', 'kanpur', 100, '2018-04-08 05:46:20pm GMT', 2, '2018-04-09'),
(34, 1, 1, 'allahabad', 'kanpur', 100, '2018-04-09 10:33:11am GMT', 2, '2018-04-05'),
(35, 1, 1, 'allahabad', 'kanpur', 50, '2018-04-09 10:56:39am GMT', 1, '2018-04-09'),
(38, 1, 1, 'allahabad', 'kanpur', 50, '2018-04-09 10:59:01am GMT', 1, '2018-04-09'),
(39, 1, 1, 'allahabad', 'kanpur', 50, '2018-04-09 11:01:19am GMT', 1, '2018-04-09'),
(43, 1, 3, 'delhi', 'varanasi', 670, '2018-04-09 11:08:41am GMT', 2, '2018-04-10'),
(44, 1, 5, 'delhi', 'kota', 1194, '2018-04-09 11:23:44am GMT', 3, '2018-04-10'),
(45, 1, 2, 'lucknow', 'varanasi', 903, '2018-04-09 11:45:37am GMT', 3, '2018-04-10'),
(46, 1, 1, 'allahabad', 'kanpur', 50, '2018-04-14 05:11:53pm GMT', 1, '2018-04-19');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `email_id` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `phone_no` bigint(20) NOT NULL,
  `first_name` varchar(256) NOT NULL,
  `last_name` varchar(256) NOT NULL,
  `user_name` varchar(256) NOT NULL,
  `photo` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `email_id`, `password`, `phone_no`, `first_name`, `last_name`, `user_name`, `photo`) VALUES
(1, 'amitgomi525.ag@gmail.com', 'gomi', 9728024431, 'amit', 'gomi', 'amitgomi', 'gomi.jpeg'),
(2, 'vineet@gmail.com', 'gomi', 8053081835, 'vineet', 'gomi', 'vineetgomi', 'gomi.jpeg'),
(5, 'pandey@gmail.com', 'pandey', 8745359624, 'shivansh', 'pandey', 'shivansh', 'pandey.jpeg'),
(6, 'vikash@gmail.com', 'tirpathi', 8764515365, 'vikash', 'tirpathi', 'vikash', 'tirpathi.jpeg'),
(7, 'garg@gmail.com', 'garg', 8785615365, 'sahil', 'garg', 'sahil', 'garg.jpeg'),
(8, 'hello@gmail.com', 'hello', 7518151534, 'hello', 'hello', 'hello', 'hello.jpeg'),
(9, 'hello', 'hello', 7895153153, 'hello', 'hello', 'hello', 'hello.jpeg'),
(37, 'vineset@gmail.com', 'amitgomi', 9876543210, 'a', 'a', 'amitgomi1', 'amitgomi1.jpeg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `bus`
--
ALTER TABLE `bus`
  ADD PRIMARY KEY (`bus_id`);

--
-- Indexes for table `station`
--
ALTER TABLE `station`
  ADD PRIMARY KEY (`station_id`);

--
-- Indexes for table `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`ticket_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `bus`
--
ALTER TABLE `bus`
  MODIFY `bus_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `station`
--
ALTER TABLE `station`
  MODIFY `station_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ticket`
--
ALTER TABLE `ticket`
  MODIFY `ticket_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
