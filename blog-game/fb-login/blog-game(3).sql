-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 20, 2015 at 05:42 PM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `blog-game`
--
CREATE DATABASE IF NOT EXISTS `blog-game` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `blog-game`;

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE IF NOT EXISTS `questions` (
  `qn_no` int(11) NOT NULL AUTO_INCREMENT,
  `qn_start` text NOT NULL,
  `qn_end` text NOT NULL,
  `qn_head` text NOT NULL,
  `data` text NOT NULL,
  `solved` int(11) NOT NULL,
  `attempted` int(11) NOT NULL,
  PRIMARY KEY (`qn_no`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`qn_no`, `qn_start`, `qn_end`, `qn_head`, `data`, `solved`, `attempted`) VALUES
(1, '14/11/interstellar-movie-review/', '2015/01/simulating-the-universe-the-eagle-project/', 'Simulating the universe – The EAGLE Project', 'The farther you zoom out from Earth, the more it looks like something under a microscope', 0, 11),
(2, '14/09/attitude-pointing-the-right-direction/', '2014/11/did-you-know-about-the-procedure-for-makinglaunching-a-satellite-in-india/', 'DID YOU KNOW-the procedure for making & launching a satellite in India', 'Quora is a big hit in India. With over one-third of users from India, one can confidently say we learn about our country a lot from that site than any other online source', 1, 84),
(3, '15/02/peer-to-peer-file-sharing/', '2014/12/snowdens-privacy-tips/', 'Snowden’s Privacy Tips', 'Are you the kind of person who is very keen on ensuring that your secrets remain secrets, the kind of person who respects privacy', 0, 0),
(4, '14/12/snowdens-privacy-tips/', '2015/02/the-art-of-behavioural-science/\r\n', 'The Art of Behavioural Science', 'What we say doesn’t really matter as much as how we say it', 0, 0),
(5, '14/12/xiaomi-and-oneplus-sales-ban-in-india/', '2014/12/surely-you-are-joking/', 'Surely you are joking', 'All of you at one point of time or the other would have gone up to the terrace or to your front yard, carrying a mug brimming with hot coffee, with a novel in the other hand to just sit back, relax and immerse yourself into the book', 0, 0),
(6, '14/12/xiaomi-and-oneplus-sales-ban-in-india/', '2014/08/top-10-google-giggles/', 'Top 10: Google Easter Eggs', 'Google is one company that takes jokes very seriously', 0, 0),
(7, '14/12/xiaomi-and-oneplus-sales-ban-in-india/', '2014/11/the-internet-of-things/', 'The Internet of Things', 'Imagine coming home tired, hungry and worn out after a busy whole day', 0, 0),
(8, '14/12/tech-review-nexus-6/', '2014/11/the-internet-of-things/', 'The Internet of Things', 'Imagine coming home tired, hungry and worn out after a busy whole day', 0, 0),
(9, '15/01/worlds-greatest-physics-teacher/', '2014/12/inquisitive-inquiry-into-isros-experiment/', 'INQUISITIVE INQUIRY INTO ISRO’S EXPERIMENT', 'It was the LVM3X mission. It was the test launch of the newly developed GSLV mark 3 vehicle and the Crew Module', 0, 0),
(10, '14/12/xiaomi-and-oneplus-sales-ban-in-india/', '2015/02/one-step-further-into-the-world-of-digitalization/', 'ONE STEP FURTHER INTO THE WORLD OF DIGITALIZATION', 'As the series of Samsung Notes seem to be flooding the markets; a newbie in the technological arena, Portronics\nhas come up with 2 pathbreaking devices: the Electropen and the Portable Scanner', 0, 0),
(11, '15/01/will-we-ever-run-out-of-new-music/', '2015/02/electronic-musical-instruments/', 'TOP TEN ELECTRONIC MUSICAL INSTRUMENTS', 'The increasing power and decreasing cost of sound generating electronics and the personal computer has given rise to music controllers and music synthesizers', 0, 0),
(12, '14/12/xiaomi-and-oneplus-sales-ban-in-india/', '2014/09/solenoid-valve-which-shook-the-mission/', 'SOLENOID VALVE WHICH SHOOK THE MISSION', 'Solenoid valves are electro-mechanically operated flow control devices', 0, 0),
(13, '15/02/electronic-musical-instruments/', '2015/01/printing-yourself-sounds-far-fetched/', 'PRINTING YOURSELF – SOUNDS FAR FETCHED?\r\n', 'Let’s say that you have to build a diorama of a famous Civil War battle for a project, and you use that same printer to construct all the soldiers, cannons and trees in perfect detail', 0, 0),
(14, '14/11/google-ara-project-the-next-step/', '2014/09/apple-pay/', 'APPLE PAY', 'Here’s the thing Apple Pay will function anywhere that something like Google Wallet would work', 0, 0),
(15, '14/12/samsung-galaxy-s-series-a-comparison-over-the-years/', '2014/08/tech-review-asus-rog-g750-series/', 'TECH REVIEW: ASUS ROG G750 SERIES', 'In general the Asus ROG G750 series laptops are packed with 24 GB of RAM ( 32 GB upgradeable ) ', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `name` text NOT NULL,
  `fid` text NOT NULL,
  `solved` int(11) NOT NULL DEFAULT '0',
  `points` int(11) NOT NULL,
  `time` int(11) NOT NULL DEFAULT '0',
  `clicks` int(11) NOT NULL DEFAULT '0',
  `curr_sol` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`name`, `fid`, `solved`, `points`, `time`, `clicks`, `curr_sol`) VALUES
('Ananth Natarajan', '897626976945387', 0, 0, 0, 0, NULL),
('Rishi Kc', '804154769677200', 0, 0, 0, 0, NULL),
('Aditya Balaji', '782651868455651', 0, 0, 0, 0, NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
