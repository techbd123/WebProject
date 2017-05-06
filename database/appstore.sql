-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 07, 2017 at 12:05 AM
-- Server version: 5.7.18-0ubuntu0.16.04.1
-- PHP Version: 7.0.15-0ubuntu0.16.04.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `appstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `appinfo`
--

CREATE TABLE `appinfo` (
  `appid` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `developerid` bigint(20) UNSIGNED NOT NULL,
  `version` double DEFAULT NULL,
  `applogolink` varchar(2047) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `appfilelink` varchar(2047) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastupload` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `developer`
--

CREATE TABLE `developer` (
  `developerid` bigint(20) UNSIGNED NOT NULL,
  `userid` bigint(20) UNSIGNED NOT NULL,
  `companyname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `weblink` varchar(2047) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userid` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(64) CHARACTER SET ascii NOT NULL,
  `isDeveloper` tinyint(1) NOT NULL,
  `isVerified` tinyint(1) NOT NULL,
  `joiningDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appinfo`
--
ALTER TABLE `appinfo`
  ADD PRIMARY KEY (`appid`),
  ADD UNIQUE KEY `developerid` (`developerid`);

--
-- Indexes for table `developer`
--
ALTER TABLE `developer`
  ADD PRIMARY KEY (`developerid`),
  ADD UNIQUE KEY `userid` (`userid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userid`),
  ADD KEY `username` (`username`),
  ADD KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appinfo`
--
ALTER TABLE `appinfo`
  MODIFY `appid` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `developer`
--
ALTER TABLE `developer`
  MODIFY `developerid` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userid` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `appinfo`
--
ALTER TABLE `appinfo`
  ADD CONSTRAINT `appinfo_ibfk_1` FOREIGN KEY (`developerid`) REFERENCES `developer` (`developerid`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `developer`
--
ALTER TABLE `developer`
  ADD CONSTRAINT `developer_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `user` (`userid`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
