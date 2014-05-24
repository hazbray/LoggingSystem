-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 16, 2014 at 10:44 PM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `loggingsystem`
--
CREATE DATABASE IF NOT EXISTS `loggingsystem` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `loggingsystem`;

-- --------------------------------------------------------

--
-- Table structure for table `institution`
--

CREATE TABLE IF NOT EXISTS `institution` (
  `iid` int(11) NOT NULL AUTO_INCREMENT,
  `instaname` varchar(30) NOT NULL,
  `instatype` varchar(30) NOT NULL,
  PRIMARY KEY (`iid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=68 ;

--
-- Dumping data for table `institution`
--

INSERT INTO `institution` (`iid`, `instaname`, `instatype`) VALUES
(65, 'dsadsad', 'school'),
(66, 'dsfdsfdsf', 'school'),
(67, 'mrt', 'school');

-- --------------------------------------------------------

--
-- Table structure for table `person`
--

CREATE TABLE IF NOT EXISTS `person` (
  `pid` int(11) NOT NULL AUTO_INCREMENT,
  `lname` varchar(30) NOT NULL,
  `fname` varchar(30) NOT NULL,
  `occupation` varchar(50) NOT NULL,
  `contact_num` varchar(12) NOT NULL,
  `institution_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`pid`),
  KEY `FK_person` (`institution_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `person`
--

INSERT INTO `person` (`pid`, `lname`, `fname`, `occupation`, `contact_num`, `institution_id`) VALUES
(23, 'asdsadas', 'dasdasdsa', 'sadsadsa', '4324324324', 65),
(24, 'gnfgn', 'dgnbgsfbnf45636', 'garehgngfn', '457665', 66),
(25, 'kjkl', 'jk', 'skjajklasj', 'jlkj', 67);

-- --------------------------------------------------------

--
-- Table structure for table `visit`
--

CREATE TABLE IF NOT EXISTS `visit` (
  `vid` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `purpose` varchar(100) NOT NULL,
  `person_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`vid`),
  KEY `FK_visit` (`person_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `visit`
--

INSERT INTO `visit` (`vid`, `date`, `purpose`, `person_id`) VALUES
(1, '2014-04-28', 'fsfdafdasdfds', 23),
(3, '2014-05-18', 'dsaasda', 25);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `person`
--
ALTER TABLE `person`
  ADD CONSTRAINT `FK_person` FOREIGN KEY (`institution_id`) REFERENCES `institution` (`iid`);

--
-- Constraints for table `visit`
--
ALTER TABLE `visit`
  ADD CONSTRAINT `FK_visit` FOREIGN KEY (`person_id`) REFERENCES `person` (`pid`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
