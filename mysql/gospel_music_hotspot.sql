-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 07, 2017 at 05:42 PM
-- Server version: 5.7.14
-- PHP Version: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gospel_music_hotspot`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(50) NOT NULL,
  `admin_name` varchar(120) NOT NULL,
  `password` varchar(120) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `password`) VALUES
(1, 'dresong', 'people@8624');

-- --------------------------------------------------------

--
-- Table structure for table `advertisement`
--

CREATE TABLE `advertisement` (
  `ad_id` int(50) NOT NULL,
  `program_name` varchar(120) NOT NULL,
  `banner_link` varchar(120) NOT NULL,
  `phone_number` varchar(120) NOT NULL,
  `email` varchar(120) NOT NULL,
  `prog_url` varchar(120) NOT NULL,
  `upload_date` timestamp NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `message_id` int(50) NOT NULL,
  `message_date` timestamp NOT NULL,
  `guest_name` varchar(120) NOT NULL,
  `message_link` varchar(120) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `fan_messages`
--

CREATE TABLE `fan_messages` (
  `artiste_name` varchar(120) NOT NULL,
  `message_link` varchar(120) NOT NULL,
  `message_date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `artiste_id` int(30) NOT NULL,
  `first_name` varchar(120) DEFAULT NULL,
  `last_name` varchar(120) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `born_again` date DEFAULT NULL,
  `sex` enum('MALE','FEMALE') NOT NULL,
  `country` varchar(120) DEFAULT NULL,
  `phone` varchar(120) DEFAULT NULL,
  `email` varchar(120) DEFAULT NULL,
  `address` varchar(500) DEFAULT NULL,
  `fb_link` varchar(120) DEFAULT NULL,
  `twitter_link` varchar(120) DEFAULT NULL,
  `artiste_name` varchar(120) NOT NULL,
  `password` varchar(120) DEFAULT NULL,
  `membership_date` timestamp NULL DEFAULT NULL,
  `expiry_date` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `members_songs`
--

CREATE TABLE `members_songs` (
  `artiste_id` int(50) NOT NULL,
  `artiste_name` varchar(120) NOT NULL,
  `song_title` varchar(120) NOT NULL,
  `album_name` varchar(150) NOT NULL,
  `album_art` varchar(120) NOT NULL,
  `song_link` varchar(250) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `music_promotion`
--

CREATE TABLE `music_promotion` (
  `artiste_id` int(30) NOT NULL,
  `artiste_name` varchar(120) NOT NULL,
  `phone` varchar(120) NOT NULL,
  `email` varchar(120) NOT NULL,
  `song_title` varchar(120) NOT NULL,
  `album_art` varchar(120) NOT NULL,
  `mp3_name` varchar(120) NOT NULL,
  `song_link` varchar(120) NOT NULL,
  `upload_date` timestamp NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `advertisement`
--
ALTER TABLE `advertisement`
  ADD PRIMARY KEY (`ad_id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`message_id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`artiste_id`);

--
-- Indexes for table `music_promotion`
--
ALTER TABLE `music_promotion`
  ADD PRIMARY KEY (`artiste_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `advertisement`
--
ALTER TABLE `advertisement`
  MODIFY `ad_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `message_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `artiste_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;
--
-- AUTO_INCREMENT for table `music_promotion`
--
ALTER TABLE `music_promotion`
  MODIFY `artiste_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
