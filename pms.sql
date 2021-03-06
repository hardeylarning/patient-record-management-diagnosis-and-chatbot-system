-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 11, 2021 at 02:37 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `name` varchar(80) NOT NULL,
  `username` varchar(80) NOT NULL,
  `password` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `name`, `username`, `password`) VALUES
(1, 'hardexico', 'developer', 'password'),
(2, 'owner', 'pmsadmin', 'password');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `contact_id` int(80) NOT NULL,
  `author_name` varchar(255) NOT NULL,
  `author_no` varchar(255) NOT NULL,
  `author_email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `message_date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`contact_id`, `author_name`, `author_no`, `author_email`, `message`, `message_date`) VALUES
(1, 'tester', '08069380966', 'tester@gmail.com', 'please kindly come along with us', '2020-05-13 18:06:17');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `msg_id` int(80) NOT NULL,
  `sender_name` varchar(255) NOT NULL,
  `sender_no` varchar(25) NOT NULL,
  `receiver_name` varchar(255) NOT NULL,
  `receiver_no` varchar(25) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `message_date` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`msg_id`, `sender_name`, `sender_no`, `receiver_name`, `receiver_no`, `subject`, `body`, `message_date`) VALUES
(22, 'musibawu roqeeb', '08069380966', 'Dr. Olaosebikan', 'doctor', 'To book an appointment with you', 'Dear Dr., I would like to have a conversation with you and to know exact time you will be available.', '2020-12-27 07:11p.m'),
(23, 'musibawu roqqeb', '08169516301', 'Dr. Adribigbe ', 'doctor', 'Second Appointment', 'Can I have a word with you that deals with life.', '2020-12-28 10:17a.m'),
(24, 'Dr. Adribigbe ', 'doctor', 'musibawu roqqeb', '08169516301', 'Second Appointment', 'I will be available by 2p.m', 'Monday 28th of December 2020 12:55:48 PM'),
(25, 'Dr. Olaosebikan', 'doctor', 'musibawu roqeeb', '08069380966', 'To book an appointment with you', 'you can come by 3p.m', 'Monday 28th of December 2020 05:20:52 PM'),
(26, 'Dr. Adribigbe ', 'doctor', 'musibawu roqqeb', '08169516301', 'Second Appointment', 'common you can do it', 'Monday 28th of December 2020 05:25:35 PM'),
(28, 'Dr. Adribigbe ', 'doctor', 'musibawu roqqeb', '08169516301', 'Second Appointment', 'can we', 'Monday 28th of December 2020 05:27:50 PM'),
(29, 'Dr. Adribigbe ', 'doctor', 'musibawu roqqeb', '08169516301', 'Second Appointment', 'why doing this nah', 'Monday 28th of December 2020 05:31:35 PM'),
(30, 'Dr. Adribigbe ', 'doctor', 'musibawu roqqeb', '08169516301', 'Second Appointment', 'you can have it done anyway', 'Monday 28th of December 2020 05:31:56 PM'),
(31, 'Dr. Olaosebikan', 'doctor', 'musibawu roqeeb', '08069380966', 'To book an appointment with you', 'common guys you can have it', 'Monday 28th of December 2020 05:32:26 PM'),
(32, 'Dr. Olaosebikan', 'doctor', 'musibawu roqeeb', '08069380966', 'To book an appointment with you', 'can I', 'Monday 28th of December 2020 05:32:42 PM'),
(34, 'Dr. Adribigbe ', 'doctor', 'musibawu roqqeb', '08169516301', 'Second Appointment', 'confirmer', 'Monday 28th of December 2020 05:34:35 PM'),
(35, 'musibawu roqeeb', '08069380966', 'Dr. Olaosebikan', 'doctor', 'To book an appointment with you', 'Thank you sir', 'Monday 28th of December 2020 06:21:10 PM'),
(37, 'musibawu roqeeb', '08069380966', 'Dr. Olaosebikan Akande', 'doctor', 'Booking an Appointment', 'Checking things out guys!!!!!!', 'Friday 29th of January 2021 10:23:50 AM'),
(38, 'musibawu roqeeb', '08069380966', 'Dr. Olaosebikan Akande', 'doctor', 'Booking an Appointment', 'Checking things out guys!!!!!!', 'Friday 29th of January 2021 10:23:50 AM'),
(39, 'musibawu roqeeb', '08069380966', 'Dr. Olaosebikan Akande', 'doctor', 'Booking an Appointment', 'Checking second', 'Friday 29th of January 2021 10:26:33 AM'),
(40, 'Dr. Olaosebikan Akande', 'doctor', 'musibawu roqeeb', '08069380966', 'Booking an Appointment', 'You can come by 4:30p.m', 'Friday 29th of January 2021 10:28:00 AM'),
(41, 'musibawu roqeeb', '08069380966', 'Dr. Olaosebikan Akande', 'doctor', 'urgent', 'nsdj djsskkkvfkdkksjjksdhnffshfsljfsjfshnfhnfhfshkf', 'Monday 8th of February 2021 03:03:21 PM'),
(42, 'musibawu roqeeb', '08069380966', 'Dr. Olaosebikan Akande', 'doctor', 'Booking an Appointment', 'thank you ', 'Monday 8th of February 2021 03:04:36 PM');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `testimony_id` int(80) NOT NULL,
  `title` varchar(80) NOT NULL,
  `author_name` varchar(80) NOT NULL,
  `content` text NOT NULL,
  `testified_date` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`testimony_id`, `title`, `author_name`, `content`, `testified_date`) VALUES
(3, 'Dev.', 'Roqeeb', 'testing the shit out', '2021-01-27 15:42:06');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(111) NOT NULL,
  `phone_no` varchar(80) NOT NULL,
  `firstname` varchar(80) NOT NULL,
  `surname` varchar(80) NOT NULL,
  `gender` varchar(11) NOT NULL,
  `date_of_birth` varchar(11) NOT NULL,
  `next_of_kin` varchar(255) NOT NULL,
  `blood_group` varchar(11) NOT NULL,
  `genotype` varchar(11) NOT NULL,
  `user_role` varchar(80) NOT NULL,
  `picture` text NOT NULL,
  `address` text NOT NULL,
  `registered_date` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `phone_no`, `firstname`, `surname`, `gender`, `date_of_birth`, `next_of_kin`, `blood_group`, `genotype`, `user_role`, `picture`, `address`, `registered_date`) VALUES
(12, '08069380966', 'olawale', 'adewale', 'male', '01-01-2010', 'akande', 'O+', 'AA', 'patient', 'FB_IMG_1498650619777.jpg', 'oke-baale osogbo, Osun State', '2020-12-17'),
(13, '08069380961', 'Michael', 'Adelabu', 'female', '01-01-2010', 'adelani', 'A+', 'AA', 'patient', 'Top-learner.png', '7, ile gogo.', '2020-12-17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`msg_id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`testimony_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `contact_id` int(80) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `msg_id` int(80) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `testimony_id` int(80) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(111) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
