-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 30, 2017 at 05:17 PM
-- Server version: 10.1.24-MariaDB
-- PHP Version: 7.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mock`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(11) NOT NULL,
  `fn` varchar(100) NOT NULL,
  `ln` varchar(100) NOT NULL,
  `mn` varchar(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pw` varchar(255) NOT NULL,
  `gender` varchar(15) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `department` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `fn`, `ln`, `mn`, `email`, `pw`, `gender`, `mobile`, `department`, `title`, `photo`, `status`) VALUES
(7, 'Awas', 'Yo', 'Asdas', 'admin@gmail.com', '$2y$10$nquD55RBbGq6eKS95M0x2..wm1VzFz2FJeSQkQqzxe5wYh.JGswJq', 'Male', '123', '', '213', 'admin@gmail.com.jpg', 'active'),
(8, 'asd', 'asd', 'asd', 'asd@gmail', '$2y$10$nquD55RBbGq6eKS95M0x2..wm1VzFz2FJeSQkQqzxe5wYh.JGswJq', 'Male', '123', '', '', '', 'active'),
(9, '123', '123', '123', 'admin2@gmail.com', '$2y$10$lu7FI/CYHFgyyPCY.w4n.us0NK/dbW6ssiLboH2mFMAj3pbuiiAFi', 'Male', '12312', 'COLLEGE OF COMPUTING STUDIES', 'Asdsa', 'default.jpg', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_chat`
--

CREATE TABLE `tbl_chat` (
  `num` int(11) NOT NULL,
  `sender` varchar(255) NOT NULL,
  `recepient` varchar(255) NOT NULL,
  `msg` varchar(255) NOT NULL,
  `time` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_chat`
--

INSERT INTO `tbl_chat` (`num`, `sender`, `recepient`, `msg`, `time`) VALUES
(1, 'one@gmail.com', 'three@gmail.com', 'hi', '2:18 am, 2017, July 30');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_department`
--

CREATE TABLE `tbl_department` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_department`
--

INSERT INTO `tbl_department` (`id`, `name`) VALUES
(5, 'OFFICE OF THE MAYOR'),
(6, 'OFFICE OF THE VICE MAYOR'),
(7, 'DSWD'),
(8, 'DOH');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_efile`
--

CREATE TABLE `tbl_efile` (
  `num` int(11) NOT NULL,
  `doc_id` varchar(255) NOT NULL,
  `doc_type` varchar(50) NOT NULL,
  `name` varchar(255) NOT NULL,
  `content` longtext NOT NULL,
  `signatories` varchar(255) NOT NULL,
  `pending_signatories` varchar(255) NOT NULL,
  `approved_signatories` varchar(255) NOT NULL,
  `signatures` mediumtext NOT NULL,
  `disapproved` varchar(50) NOT NULL,
  `comment` mediumtext NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `created_on` varchar(100) NOT NULL,
  `published_on` varchar(100) NOT NULL,
  `status` varchar(50) NOT NULL,
  `final_content` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_efile_trgr`
--

CREATE TABLE `tbl_efile_trgr` (
  `num` int(11) NOT NULL,
  `doc_id` varchar(100) NOT NULL,
  `name` varchar(255) NOT NULL,
  `pending_signatories` varchar(255) NOT NULL,
  `approved_signatories` varchar(255) NOT NULL,
  `disapproved` varchar(255) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `action` varchar(255) NOT NULL,
  `date_time` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_file`
--

CREATE TABLE `tbl_file` (
  `num` int(11) NOT NULL,
  `file_id` varchar(100) NOT NULL,
  `orig_name` varchar(100) NOT NULL,
  `file_type` varchar(100) NOT NULL,
  `file_format` varchar(100) NOT NULL,
  `signatories` text NOT NULL,
  `pending_signatories` text NOT NULL,
  `approved_signatories` text NOT NULL,
  `disapproved` varchar(100) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `created_on` varchar(100) NOT NULL,
  `published_on` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_file_trgr`
--

CREATE TABLE `tbl_file_trgr` (
  `num` int(11) NOT NULL,
  `file_id` varchar(255) NOT NULL,
  `orig_name` varchar(255) NOT NULL,
  `file_type` varchar(20) NOT NULL,
  `pending_signatories` varchar(255) NOT NULL,
  `approved_signatories` varchar(255) NOT NULL,
  `disapproved` varchar(100) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `created_on` varchar(100) NOT NULL,
  `published_on` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `action` varchar(50) NOT NULL,
  `date_time` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_news`
--

CREATE TABLE `tbl_news` (
  `num` int(11) NOT NULL,
  `doc_id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `date` varchar(50) NOT NULL,
  `time` varchar(50) NOT NULL,
  `signatories` varchar(255) NOT NULL,
  `pending_signatories` varchar(255) NOT NULL,
  `approved_signatories` varchar(255) NOT NULL,
  `msg` varchar(50) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `created_by` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_photo`
--

CREATE TABLE `tbl_photo` (
  `num` int(11) NOT NULL,
  `photo_id` varchar(255) NOT NULL,
  `photo_name` varchar(255) NOT NULL,
  `created_on` varchar(100) NOT NULL,
  `created_by` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_photo`
--

INSERT INTO `tbl_photo` (`num`, `photo_id`, `photo_name`, `created_on`, `created_by`) VALUES
(10, 'img_597a04311dfbb5.51882953.png', 'Templatee.png', '2017, July 27 5:18 pm', 'one@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_template`
--

CREATE TABLE `tbl_template` (
  `num` int(11) NOT NULL,
  `tmp_id` varchar(255) NOT NULL,
  `name` varchar(200) NOT NULL,
  `content` longtext NOT NULL,
  `owner` varchar(200) NOT NULL,
  `department` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `fn` varchar(100) NOT NULL,
  `ln` varchar(100) NOT NULL,
  `mn` varchar(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pw` varchar(255) NOT NULL,
  `gender` varchar(15) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `department` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `fn`, `ln`, `mn`, `email`, `pw`, `gender`, `mobile`, `department`, `title`, `photo`, `status`) VALUES
(22, 'Eden', 'Garcia', 'Sir', 'one@gmail.com', '$2y$10$4ojQK5oVjk7C2CgPHAkpEOajksT1EEOEqxWJrudnRCqLdnLq4MQA.', 'Male', '09121212121', 'OFFICE OF THE MAYOR', 'Instructor', 'one@gmail.com.jpg', 'active'),
(23, 'Nikz', 'Nicdao', 'Sir', 'two@gmail.com', '$2y$10$r8pnsj7hGtkwx7H.5gsgHODGmrm33F0KHdEqFyV73z7xTtn28kHOG', 'Male', '09121212121', 'OFFICE OF THE VICE MAYOR', 'Instructor', 'two@gmail.com.jpg', 'active'),
(24, 'Three', 'Three', 'Three', 'three@gmail.com', '$2y$10$EjnXpzxqDK3uOCX/gnPsdu5b3hGK1MvcVNcUWYgNuqGCMzadnGOKS', 'Male', '09121212122', 'DSWD', 'Facilitator', 'three@gmail.com.jpg', 'active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_chat`
--
ALTER TABLE `tbl_chat`
  ADD PRIMARY KEY (`num`);

--
-- Indexes for table `tbl_department`
--
ALTER TABLE `tbl_department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_efile`
--
ALTER TABLE `tbl_efile`
  ADD PRIMARY KEY (`num`);

--
-- Indexes for table `tbl_efile_trgr`
--
ALTER TABLE `tbl_efile_trgr`
  ADD PRIMARY KEY (`num`);

--
-- Indexes for table `tbl_file`
--
ALTER TABLE `tbl_file`
  ADD PRIMARY KEY (`num`);

--
-- Indexes for table `tbl_file_trgr`
--
ALTER TABLE `tbl_file_trgr`
  ADD PRIMARY KEY (`num`);

--
-- Indexes for table `tbl_news`
--
ALTER TABLE `tbl_news`
  ADD PRIMARY KEY (`num`);

--
-- Indexes for table `tbl_photo`
--
ALTER TABLE `tbl_photo`
  ADD PRIMARY KEY (`num`);

--
-- Indexes for table `tbl_template`
--
ALTER TABLE `tbl_template`
  ADD PRIMARY KEY (`num`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tbl_chat`
--
ALTER TABLE `tbl_chat`
  MODIFY `num` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_department`
--
ALTER TABLE `tbl_department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tbl_efile`
--
ALTER TABLE `tbl_efile`
  MODIFY `num` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_efile_trgr`
--
ALTER TABLE `tbl_efile_trgr`
  MODIFY `num` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_file`
--
ALTER TABLE `tbl_file`
  MODIFY `num` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_file_trgr`
--
ALTER TABLE `tbl_file_trgr`
  MODIFY `num` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_news`
--
ALTER TABLE `tbl_news`
  MODIFY `num` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_photo`
--
ALTER TABLE `tbl_photo`
  MODIFY `num` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tbl_template`
--
ALTER TABLE `tbl_template`
  MODIFY `num` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
