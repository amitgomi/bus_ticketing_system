-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 01, 2018 at 12:29 AM
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
  `name` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bus`
--

CREATE TABLE `bus` (
  `bus_id` int(11) NOT NULL,
  `bus_no` varchar(25) NOT NULL,
  `source_station` varchar(256) NOT NULL,
  `intermediate_station` varchar(1024) NOT NULL,
  `destination_station` varchar(256) NOT NULL,
  `driver_name` varchar(256) NOT NULL,
  `total_seats` int(11) NOT NULL,
  `available_seats` int(11) NOT NULL,
  `intermediate_price` varchar(256) NOT NULL,
  `source_time` varchar(256) NOT NULL,
  `intermediate_time` varchar(1024) NOT NULL,
  `destination_time` varchar(256) NOT NULL,
  `photo` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bus`
--

INSERT INTO `bus` (`bus_id`, `bus_no`, `source_station`, `intermediate_station`, `destination_station`, `driver_name`, `total_seats`, `available_seats`, `intermediate_price`, `source_time`, `intermediate_time`, `destination_time`, `photo`) VALUES
(1, 'HR 10 A1234', 'allahabad', 'allahabad,kanpur,mathura,alwar', 'alwar', 'good_driver', 30, 30, '0,50,40,50', '06:10', '06:10,07:10,08:10,09:10', '09:10', '1.jpeg'),
(2, 'UP 10 F 1243', 'lucknow', 'lucknow,kanpur,fatehpur,allahabad,handia,gopiganj,varanasi', 'varanasi', 'ravi', 37, 37, '0,45,26,48,75,59,48', '05:48', '05:48,08:15,09:16,10:48,11:26,11:55,12:48', '12:48', '2.jpeg'),
(3, 'UP 11 F 1326', 'delhi', 'delhi,lucknow,kanpur,fatehpur,allahabad,handia,gopiganj,varanasi', 'varanasi', 'ravi', 37, 37, '0,34,45,26,48,75,59,48', '05:48', '05:48,08:15,09:16,10:48,11:26,11:55,12:08,12:48', '12:48', '3.jpeg');

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
  `no_of_passenger` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ticket`
--

INSERT INTO `ticket` (`ticket_id`, `user_id`, `bus_id`, `source`, `destination`, `price`, `time_of_booking`, `no_of_passenger`) VALUES
(1, 1, 1, 'allahabad', 'kanpur', 50, '00:00', 2),
(2, 1, 3, 'delhi', 'allahabad', 153, '00:00', 3);

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
(10, 'fsd', 'fs', 1535515634, 'fsd', 'fds', 'fds', 'fs.jpeg'),
(11, 'fdsfs', 'asdf', 1234567890, 'sdf', 'dsfsd', 'df', 'asdf.jpeg');

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
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `bus`
--
ALTER TABLE `bus`
  MODIFY `bus_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `station`
--
ALTER TABLE `station`
  MODIFY `station_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ticket`
--
ALTER TABLE `ticket`
  MODIFY `ticket_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
