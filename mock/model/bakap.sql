-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 09, 2017 at 06:45 PM
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
(9, '123', '123', '123', 'admin2@gmail.com', '$2y$10$lu7FI/CYHFgyyPCY.w4n.us0NK/dbW6ssiLboH2mFMAj3pbuiiAFi', 'Male', '12312', 'COLLEGE OF COMPUTING STUDIES', 'Asdsa', 'default.jpg', 'pending'),
(10, 'Trial', 'Trial', 'Trial', 'trial@gmail.com', '$2y$10$pl.iWsxw5t.tGdhgb/FxrOB/cqHNtr1RwYxczQobVGLF/L.W3dQ62', 'Male', '123123123', 'OFFICE OF THE MAYOR', 'Adasd', 'default.jpg', 'pending'),
(11, 'Trial', 'Trial', 'Trial', 'trials@gmail.com', '$2y$10$Q./.saz24z5/nuucAg3ooera11MktCyBGKGnlLTUj3wpTc1d4dR9G', 'Male', '123123123', 'OFFICE OF THE MAYOR', 'Adasd', 'default.jpg', 'pending'),
(13, '123123', '12321', '12312', '1231312312312@gmail.com', '$2y$10$sa5sW.MMGGIbPEh8gy40M.UhoQNbBQGRjUH.9OclbYNwfKloF4k7.', 'Male', '213123', 'OFFICE OF THE VICE MAYOR', '123', 'default.jpg', 'pending');

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
(1, 'one@gmail.com', 'three@gmail.com', 'hi', '2:18 am, 2017, July 30'),
(2, 'one@gmail.com', 'three@gmail.com', 'sus\r\n', '4:14 pm, 2017, August 7');

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

--
-- Dumping data for table `tbl_efile`
--

INSERT INTO `tbl_efile` (`num`, `doc_id`, `doc_type`, `name`, `content`, `signatories`, `pending_signatories`, `approved_signatories`, `signatures`, `disapproved`, `comment`, `created_by`, `created_on`, `published_on`, `status`, `final_content`) VALUES
(1, 'efile_597e6bff1144f4.02266968', 'private', 'try', '<p>asdasdasd</p>\r\n', 'two@gmail.com', 'two@gmail.com', '', '', '', '', 'one@gmail.com', '2017, July 31, 1:30 am', '', 'pending', ''),
(2, 'efile_5988116400c869.54893505', 'private', 'ahg', '<p>asdasdasd</p>\r\n', 'three@gmail.com', '', 'three@gmail.com', '<br><div style=\'display:inline-block !important; text-align:center !important\'>\r\n                    <img src=\'../../DB/signature/three@gmail.com.png\' width=\'150\'><br>\r\n                    Three Three Three <br>\r\n                    Facilitator\r\n                    </div>', '', '', 'one@gmail.com', '2017, August 7, 9:06 am', '', 'pending', ''),
(3, 'efile_59881bad2c6653.15747980', 'private', '123', '<p>adasdas</p>\r\n', 'three@gmail.com', '', 'three@gmail.com', '<br><div style=\'display:inline-block !important; text-align:center !important\'>\r\n                    <img src=\'../../DB/signature/three@gmail.com.png\' width=\'150\'><br>\r\n                    Three Three Three <br>\r\n                    Facilitator\r\n                    </div>', '', '', 'one@gmail.com', '2017, August 7, 9:50 am', '', 'pending', ''),
(4, 'efile_59881c3bbf5403.45300442', 'private', '123', '<p>asd</p>\r\n', 'three@gmail.com', '', 'three@gmail.com', '<br><div style=\'display:inline-block !important; text-align:center !important\'>\r\n                    <img src=\'../../DB/signature/three@gmail.com.png\' width=\'150\'><br>\r\n                    Three Three Three <br>\r\n                    Facilitator\r\n                    </div>', '', '', 'one@gmail.com', '2017, August 7, 9:52 am', '', 'pending', ''),
(8, 'efile_59881f2c41e9e3.53343520', 'private', 'wqe', '<p>asd</p>\r\n', 'three@gmail.com', '', 'three@gmail.com', '<br><div style=\'display:inline-block !important; text-align:center !important\'>\r\n                    <img src=\'../../DB/signature/three@gmail.com.png\' width=\'150\'><br>\r\n                    Three Three Three <br>\r\n                    Facilitator\r\n                    </div>', '', '', 'one@gmail.com', '2017, August 7, 10:05 am', '', 'pending', ''),
(9, 'efile_598820f63caf90.77570594', 'private', '12', '<p>asdas</p>\r\n', 'three@gmail.com', 'three@gmail.com', '', '', 'three@gmail.com', 'Duplicate Filing :	The exact document has already been filed', 'one@gmail.com', '2017, August 7, 10:12 am', '', 'pending', ''),
(10, 'efile_598820f7df1584.12748564', 'private', '12', '<p>asdas</p>\r\n', 'three@gmail.com', '', 'three@gmail.com', '<br><div style=\'display:inline-block !important; text-align:center !important\'>\r\n                    <img src=\'../../DB/signature/three@gmail.com.png\' width=\'150\'><br>\r\n                    Three Three Three <br>\r\n                    Facilitator\r\n                    </div>', '', '', 'one@gmail.com', '2017, August 7, 10:12 am', '', 'pending', ''),
(11, 'efile_598821502576e6.42968288', 'private', '123', '<p>asd</p>\r\n', 'three@gmail.com', '', 'three@gmail.com', '<br><div style=\'display:inline-block !important; text-align:center !important\'>\r\n                    <img src=\'../../DB/signature/three@gmail.com.png\' width=\'150\'><br>\r\n                    Three Three Three <br>\r\n                    Facilitator\r\n                    </div>', '', '', 'one@gmail.com', '2017, August 7, 10:14 am', '', 'pending', ''),
(12, 'efile_59882189c4eec0.42129227', 'private', 'asd', '<p>123</p>\r\n', 'three@gmail.com', '', 'three@gmail.com', '<br><div style=\'display:inline-block !important; text-align:center !important\'>\r\n                    <img src=\'../../DB/signature/three@gmail.com.png\' width=\'150\'><br>\r\n                    Three Three Three <br>\r\n                    Facilitator\r\n                    </div>', '', '', 'one@gmail.com', '2017, August 7, 10:15 am', '', 'pending', ''),
(13, 'efile_5988340fe23f80.97701810', 'private', '123', '<p>asd</p>\r\n', 'three@gmail.com', 'three@gmail.com', '', '', 'three@gmail.com', 'Document Issue: Check if the document is not dated; the document contains incomplete files; the attached image is not legible; etc', 'one@gmail.com', '2017, August 7, 11:34 am', '', 'pending', ''),
(14, 'efile_5988473c4c8a67.26355406', 'private', '213', '<p>asd</p>\r\n', 'three@gmail.com', '', 'three@gmail.com', '<br><div style=\'display:inline-block !important; text-align:center !important\'>\r\n                    <img src=\'../../DB/signature/three@gmail.com.png\' width=\'150\'><br>\r\n                    Three Three Three <br>\r\n                    Facilitator\r\n                    </div>', '', '', 'one@gmail.com', '2017, August 7, 12:55 pm', '', 'pending', ''),
(15, 'efile_59885d7a218725.38911844', 'private', 'tatat', '<p>gadfgdf</p>\r\n', 'two@gmail.com,one@gmail.com', 'two@gmail.com,one@gmail.com', '', '', '', '', 'three@gmail.com', '2017, August 7, 2:30 pm', '', 'pending', ''),
(16, 'efile_598acdaa653b98.20841817', 'private', 'asd', '<p>asd</p>\r\n', 'three@gmail.com', 'three@gmail.com', '', '', '', '', 'one@gmail.com', '2017, August 9, 10:54 am', '', 'pending', '');

--
-- Triggers `tbl_efile`
--
DELIMITER $$
CREATE TRIGGER `tbl_efile_after_insert` AFTER INSERT ON `tbl_efile` FOR EACH ROW BEGIN
INSERT INTO tbl_efile_trgr SET action = 'INSERT',
doc_id = NEW.doc_id,
name = NEW.name,
pending_signatories = NEW.pending_signatories,
approved_signatories = NEW.approved_signatories,
disapproved = NEW.disapproved,
comment = NEW.comment,
status = NEW.status,
date_time = NOW();
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tbl_efile_b4_update` BEFORE UPDATE ON `tbl_efile` FOR EACH ROW BEGIN
INSERT INTO tbl_efile_trgr SET action = 'UPDATE',
doc_id = OLD.doc_id,
name = OLD.name,
pending_signatories = NEW.pending_signatories,
approved_signatories = NEW.approved_signatories,
disapproved = NEW.disapproved,
comment = NEW.comment,
status = NEW.status,
date_time = NOW();
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tbl_efile_before_delete` BEFORE DELETE ON `tbl_efile` FOR EACH ROW BEGIN
INSERT INTO tbl_efile_trgr SET action = 'DELETE',
doc_id = OLD.doc_id,
name = OLD.name,
pending_signatories = OLD.pending_signatories,
approved_signatories = OLD.approved_signatories,
disapproved = OLD.disapproved,
comment = OLD.comment,
status = OLD.status,
date_time = NOW();
END
$$
DELIMITER ;

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

--
-- Dumping data for table `tbl_efile_trgr`
--

INSERT INTO `tbl_efile_trgr` (`num`, `doc_id`, `name`, `pending_signatories`, `approved_signatories`, `disapproved`, `comment`, `status`, `action`, `date_time`) VALUES
(1, 'efile_597e6bff1144f4.02266968', 'try', 'two@gmail.com', '', '', '', 'pending', 'INSERT', '2017-07-30 16:30:07'),
(2, 'efile_5988116400c869.54893505', 'ahg', 'three@gmail.com', '', '', '', 'pending', 'INSERT', '2017-08-07 00:06:12'),
(3, 'efile_5988116400c869.54893505', 'ahg', '', 'three@gmail.com', '', '', 'pending', 'UPDATE', '2017-08-07 00:42:22'),
(4, 'efile_59881bad2c6653.15747980', '123', 'three@gmail.com', '', '', '', 'pending', 'INSERT', '2017-08-07 00:50:05'),
(5, 'efile_59881bad2c6653.15747980', '123', '', 'three@gmail.com', '', '', 'pending', 'UPDATE', '2017-08-07 00:52:07'),
(6, 'efile_59881c3bbf5403.45300442', '123', 'three@gmail.com', '', '', '', 'pending', 'INSERT', '2017-08-07 00:52:27'),
(7, 'efile_59881c3bbf5403.45300442', '123', '', 'three@gmail.com', '', '', 'pending', 'UPDATE', '2017-08-07 00:57:37'),
(8, 'efile_59881eeed2d188.06613157', '123', 'three@gmail.com', '', '', '', 'pending', 'INSERT', '2017-08-07 01:03:58'),
(9, 'efile_59881ef237c1c7.29714305', '123', 'three@gmail.com', '', '', '', 'pending', 'INSERT', '2017-08-07 01:04:02'),
(10, 'efile_59881ef2608946.18192593', '123', 'three@gmail.com', '', '', '', 'pending', 'INSERT', '2017-08-07 01:04:02'),
(11, 'efile_59881ef2608946.18192593', '123', 'three@gmail.com', '', 'three@gmail.com', '', 'pending', 'UPDATE', '2017-08-07 01:04:26'),
(12, 'efile_59881ef237c1c7.29714305', '123', 'three@gmail.com', '', 'three@gmail.com', '', 'pending', 'UPDATE', '2017-08-07 01:04:28'),
(13, 'efile_59881eeed2d188.06613157', '123', 'three@gmail.com', '', 'three@gmail.com', '', 'pending', 'UPDATE', '2017-08-07 01:04:30'),
(14, 'efile_59881ef2608946.18192593', '123', 'three@gmail.com', '', 'three@gmail.com', '', 'pending', 'DELETE', '2017-08-07 01:04:41'),
(15, 'efile_59881ef237c1c7.29714305', '123', 'three@gmail.com', '', 'three@gmail.com', '', 'pending', 'DELETE', '2017-08-07 01:04:42'),
(16, 'efile_59881eeed2d188.06613157', '123', 'three@gmail.com', '', 'three@gmail.com', '', 'pending', 'DELETE', '2017-08-07 01:04:44'),
(17, 'efile_59881f2c41e9e3.53343520', 'wqe', 'three@gmail.com', '', '', '', 'pending', 'INSERT', '2017-08-07 01:05:00'),
(18, 'efile_59881f2c41e9e3.53343520', 'wqe', '', 'three@gmail.com', '', '', 'pending', 'UPDATE', '2017-08-07 01:12:19'),
(19, 'efile_598820f63caf90.77570594', '12', 'three@gmail.com', '', '', '', 'pending', 'INSERT', '2017-08-07 01:12:38'),
(20, 'efile_598820f7df1584.12748564', '12', 'three@gmail.com', '', '', '', 'pending', 'INSERT', '2017-08-07 01:12:39'),
(21, 'efile_598820f7df1584.12748564', '12', '', 'three@gmail.com', '', '', 'pending', 'UPDATE', '2017-08-07 01:12:52'),
(22, 'efile_598821502576e6.42968288', '123', 'three@gmail.com', '', '', '', 'pending', 'INSERT', '2017-08-07 01:14:08'),
(23, 'efile_598821502576e6.42968288', '123', '', 'three@gmail.com', '', '', 'pending', 'UPDATE', '2017-08-07 01:14:24'),
(24, 'efile_59882189c4eec0.42129227', 'asd', 'three@gmail.com', '', '', '', 'pending', 'INSERT', '2017-08-07 01:15:05'),
(25, 'efile_59882189c4eec0.42129227', 'asd', '', 'three@gmail.com', '', '', 'pending', 'UPDATE', '2017-08-07 01:15:17'),
(26, 'efile_598820f63caf90.77570594', '12', 'three@gmail.com', '', 'three@gmail.com', 'Duplicate Filing', 'pending', 'UPDATE', '2017-08-07 02:04:10'),
(27, 'efile_598820f63caf90.77570594', '12', 'three@gmail.com', '', '', '', 'pending', 'UPDATE', '2017-08-07 02:20:55'),
(28, 'efile_598820f63caf90.77570594', '12', 'three@gmail.com', '', 'three@gmail.com', 'Duplicate Filing :	The exact document has already been filed', 'pending', 'UPDATE', '2017-08-07 02:21:12'),
(29, 'efile_5988340fe23f80.97701810', '123', 'three@gmail.com', '', '', '', 'pending', 'INSERT', '2017-08-07 02:34:07'),
(30, 'efile_5988340fe23f80.97701810', '123', 'three@gmail.com', '', 'three@gmail.com', 'Document Issue: Check if the document is not dated; the document contains incomplete files; the attached image is not legible; etc', 'pending', 'UPDATE', '2017-08-07 02:44:28'),
(31, 'efile_5988473c4c8a67.26355406', '213', 'three@gmail.com', '', '', '', 'pending', 'INSERT', '2017-08-07 03:55:56'),
(32, 'efile_59885d7a218725.38911844', 'tatat', 'two@gmail.com,one@gmail.com', '', '', '', 'pending', 'INSERT', '2017-08-07 05:30:50'),
(33, 'efile_5988473c4c8a67.26355406', '213', '', 'three@gmail.com', '', '', 'pending', 'UPDATE', '2017-08-08 00:05:53'),
(34, 'efile_598acdaa653b98.20841817', 'asd', 'three@gmail.com', '', '', '', 'pending', 'INSERT', '2017-08-09 01:54:02');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_file`
--

CREATE TABLE `tbl_file` (
  `num` int(11) NOT NULL,
  `file_id` varchar(100) NOT NULL,
  `orig_name` varchar(100) NOT NULL,
  `proxy` varchar(255) NOT NULL,
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

--
-- Dumping data for table `tbl_file`
--

INSERT INTO `tbl_file` (`num`, `file_id`, `orig_name`, `proxy`, `file_type`, `file_format`, `signatories`, `pending_signatories`, `approved_signatories`, `disapproved`, `comment`, `created_by`, `created_on`, `published_on`, `status`) VALUES
(1, 'excel_598832cddef2f8.21638141.xlsx', 'Book1.xlsx', '', 'private', 'excel', 'three@gmail.com', '', 'three@gmail.com', '', '', 'one@gmail.com', '2017, August 7 11:28 am', '', 'pending'),
(2, 'excel_598834ee54b436.89824908.xlsx', 'Book1.xlsx', '', 'private', 'excel', 'three@gmail.com', '', 'three@gmail.com', '', '', 'one@gmail.com', '2017, August 7 11:37 am', '', 'pending'),
(3, 'excel_598835699588f5.24975127.xlsx', 'Book1.xlsx', '', 'private', 'excel', 'three@gmail.com', '', 'three@gmail.com', '', '', 'one@gmail.com', '2017, August 7 11:39 am', '', 'pending'),
(4, 'excel_5988413bec63f1.86626099.xlsx', 'Book1.xlsx', '', 'private', 'excel', 'three@gmail.com', 'three@gmail.com', '', 'three@gmail.com', 'Late Submission', 'one@gmail.com', '2017, August 7 12:30 pm', '', 'pending'),
(5, 'video_59885884b520e5.08475755', 'https://www.youtube.com/embed/r1zyVGooNME', '', 'private', 'video', 'three@gmail.com', '', 'three@gmail.com', '', '', 'one@gmail.com', '2017, August 7 2:09 pm', '', 'pending'),
(6, 'excel_598866d3196224.68542839.xlsx', 'Book1.xlsx', '', 'private', 'excel', 'three@gmail.com', '', 'three@gmail.com', '', '', 'one@gmail.com', '2017, August 7 3:10 pm', '', 'pending'),
(7, 'video_598870e3e839e4.73185912', 'http://www.facebook.com/', 'hymno', 'private', 'video', 'three@gmail.com', '', 'three@gmail.com', '', '', 'one@gmail.com', '2017, August 7 3:53 pm', '2017, August 7 3:56 pm', 'published'),
(8, 'video_598874597abf30.70009332', 'http://www.facebook.com/', 'sasa', 'private', 'video', 'three@gmail.com', '', 'three@gmail.com', '', '', 'one@gmail.com', '2017, August 7 4:08 pm', '2017, August 7 4:12 pm', 'published'),
(9, 'powerpoint_598962b1d4ae84.45258669.pptx', 'Presentation1.pptx', '', 'private', 'powerpoint', 'three@gmail.com', '', 'three@gmail.com', '', '', 'one@gmail.com', '2017, August 8 9:05 am', '2017, August 8 10:48 am', 'published'),
(10, 'powerpoint_59897aa20e7174.40106372.pptx', 'Presentation1.pptx', '', 'private', 'powerpoint', 'three@gmail.com', 'three@gmail.com', '', 'three@gmail.com', 'Document Issue: Check if the document is not dated; the document contains incomplete files; the attached image is not legible; etc', 'one@gmail.com', '2017, August 8 10:47 am', '', 'pending'),
(11, 'video_59897c116d5c68.11263879', 'http://thehypedgeek.com/china-wins-world-cosplay-summit-2017/', 'trial video', 'private', 'video', 'three@gmail.com', '', 'three@gmail.com', '', '', 'one@gmail.com', '2017, August 8 10:53 am', '', 'pending'),
(12, 'powerpoint_59897e02dc8413.16826946.pptx', 'Presentation1.pptx', '', 'private', 'powerpoint', 'three@gmail.com', 'three@gmail.com', '', '', '', 'one@gmail.com', '2017, August 8 11:01 am', '', 'pending'),
(13, 'video_59897f87858e56.74371249', 'https://www.facebook.com', 'asa', 'private', 'video', 'three@gmail.com', 'three@gmail.com', '', 'three@gmail.com', 'Duplicate Filing :	The exact document has already been filed', 'one@gmail.com', '2017, August 8 11:08 am', '', 'pending');

--
-- Triggers `tbl_file`
--
DELIMITER $$
CREATE TRIGGER `tbl_file_after_insert` AFTER INSERT ON `tbl_file` FOR EACH ROW BEGIN
INSERT INTO tbl_file_trgr SET action = 'INSERT',
file_id = NEW.file_id,
orig_name = NEW.orig_name,
file_type = NEW.file_type,
pending_signatories = NEW.pending_signatories,
approved_signatories = NEW.approved_signatories,
disapproved = NEW.disapproved,
comment = NEW.comment,
created_by = NEW.created_by,
created_on = NEW.created_on,
published_on = NEW.published_on,
status = NEW.status,
date_time = NOW();
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tbl_file_b4_update` BEFORE UPDATE ON `tbl_file` FOR EACH ROW BEGIN
INSERT INTO tbl_file_trgr SET action = 'UPDATE',
file_id = OLD.file_id,
orig_name = OLD.orig_name,
file_type = NEW.file_type,
pending_signatories = NEW.pending_signatories,
approved_signatories = NEW.approved_signatories,
disapproved = NEW.disapproved,
comment = NEW.comment,
created_by = NEW.created_by,
created_on = NEW.created_on,
published_on = NEW.published_on,
status = NEW.status,
date_time = NOW();
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tbl_file_before_delete` BEFORE DELETE ON `tbl_file` FOR EACH ROW BEGIN
INSERT INTO tbl_file_trgr SET action = 'DELETE',
file_id = OLD.file_id,
orig_name = OLD.orig_name,
file_type = OLD.file_type,
pending_signatories = OLD.pending_signatories,
approved_signatories = OLD.approved_signatories,
disapproved = OLD.disapproved,
comment = OLD.comment,
created_by = OLD.created_by,
created_on = OLD.created_on,
published_on = OLD.published_on,
status = OLD.status,
date_time = NOW();
END
$$
DELIMITER ;

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

--
-- Dumping data for table `tbl_file_trgr`
--

INSERT INTO `tbl_file_trgr` (`num`, `file_id`, `orig_name`, `file_type`, `pending_signatories`, `approved_signatories`, `disapproved`, `comment`, `created_by`, `created_on`, `published_on`, `status`, `action`, `date_time`) VALUES
(1, 'excel_598832cddef2f8.21638141.xlsx', 'Book1.xlsx', 'private', 'three@gmail.com', '', '', '', 'one@gmail.com', '2017, August 7 11:28 am', '', 'pending', 'INSERT', '2017-08-07 02:28:45'),
(2, 'excel_598832cddef2f8.21638141.xlsx', 'Book1.xlsx', 'private', '', 'three@gmail.com', '', '', 'one@gmail.com', '2017, August 7 11:28 am', '', 'pending', 'UPDATE', '2017-08-07 02:37:00'),
(3, 'excel_598834ee54b436.89824908.xlsx', 'Book1.xlsx', 'private', 'three@gmail.com', '', '', '', 'one@gmail.com', '2017, August 7 11:37 am', '', 'pending', 'INSERT', '2017-08-07 02:37:50'),
(4, 'excel_598834ee54b436.89824908.xlsx', 'Book1.xlsx', 'private', '', 'three@gmail.com', '', '', 'one@gmail.com', '2017, August 7 11:37 am', '', 'pending', 'UPDATE', '2017-08-07 02:38:48'),
(5, 'excel_598835699588f5.24975127.xlsx', 'Book1.xlsx', 'private', 'three@gmail.com', '', '', '', 'one@gmail.com', '2017, August 7 11:39 am', '', 'pending', 'INSERT', '2017-08-07 02:39:53'),
(6, 'excel_598835699588f5.24975127.xlsx', 'Book1.xlsx', 'private', '', 'three@gmail.com', '', '', 'one@gmail.com', '2017, August 7 11:39 am', '', 'pending', 'UPDATE', '2017-08-07 02:52:29'),
(7, 'excel_5988413bec63f1.86626099.xlsx', 'Book1.xlsx', 'private', 'three@gmail.com', '', '', '', 'one@gmail.com', '2017, August 7 12:30 pm', '', 'pending', 'INSERT', '2017-08-07 03:30:19'),
(8, 'excel_5988413bec63f1.86626099.xlsx', 'Book1.xlsx', 'private', 'three@gmail.com', '', 'three@gmail.com', 'Duplicate Filing :	The exact document has already been filed', 'one@gmail.com', '2017, August 7 12:30 pm', '', 'pending', 'UPDATE', '2017-08-07 03:30:32'),
(9, 'excel_5988413bec63f1.86626099.xlsx', 'Book1.xlsx', 'private', 'three@gmail.com', '', 'three@gmail.com', 'Duplicate Filing :	The exact document has already been filed', 'one@gmail.com', '2017, August 7 12:30 pm', '', 'pending', 'UPDATE', '2017-08-07 03:30:46'),
(10, 'excel_5988413bec63f1.86626099.xlsx', 'Book1.xlsx', 'private', 'three@gmail.com', '', '', '', 'one@gmail.com', '2017, August 7 12:30 pm', '', 'pending', 'UPDATE', '2017-08-07 03:31:09'),
(11, 'excel_5988413bec63f1.86626099.xlsx', 'Book1.xlsx', 'private', 'three@gmail.com', '', 'three@gmail.com', 'Late Submission', 'one@gmail.com', '2017, August 7 12:30 pm', '', 'pending', 'UPDATE', '2017-08-07 03:31:23'),
(12, 'video_59885884b520e5.08475755', 'https://www.youtube.com/embed/r1zyVGooNME', 'private', 'three@gmail.com', '', '', '', 'one@gmail.com', '2017, August 7 2:09 pm', '', 'pending', 'INSERT', '2017-08-07 05:09:40'),
(13, 'excel_598866d3196224.68542839.xlsx', 'Book1.xlsx', 'private', 'three@gmail.com', '', '', '', 'one@gmail.com', '2017, August 7 3:10 pm', '', 'pending', 'INSERT', '2017-08-07 06:10:43'),
(14, 'video_598870e3e839e4.73185912', 'http://www.facebook.com/', 'private', 'three@gmail.com', '', '', '', 'one@gmail.com', '2017, August 7 3:53 pm', '', 'pending', 'INSERT', '2017-08-07 06:53:39'),
(15, 'video_598870e3e839e4.73185912', 'http://www.facebook.com/', 'private', '', 'three@gmail.com', '', '', 'one@gmail.com', '2017, August 7 3:53 pm', '', 'pending', 'UPDATE', '2017-08-07 06:56:40'),
(16, 'video_598870e3e839e4.73185912', 'http://www.facebook.com/', 'private', '', 'three@gmail.com', '', '', 'one@gmail.com', '2017, August 7 3:53 pm', '2017, August 7 3:56 pm', 'published', 'UPDATE', '2017-08-07 06:56:55'),
(17, 'video_598874597abf30.70009332', 'http://www.facebook.com/', 'private', 'three@gmail.com', '', '', '', 'one@gmail.com', '2017, August 7 4:08 pm', '', 'pending', 'INSERT', '2017-08-07 07:08:25'),
(18, 'video_598874597abf30.70009332', 'http://www.facebook.com/', 'private', 'three@gmail.com', '', 'three@gmail.com', 'as', 'one@gmail.com', '2017, August 7 4:08 pm', '', 'pending', 'UPDATE', '2017-08-07 07:08:44'),
(19, 'video_598874597abf30.70009332', 'http://www.facebook.com/', 'private', 'three@gmail.com', '', '', '', 'one@gmail.com', '2017, August 7 4:08 pm', '', 'pending', 'UPDATE', '2017-08-07 07:10:34'),
(20, 'video_598874597abf30.70009332', 'http://www.facebook.com/', 'private', '', 'three@gmail.com', '', '', 'one@gmail.com', '2017, August 7 4:08 pm', '', 'pending', 'UPDATE', '2017-08-07 07:11:51'),
(21, 'video_598874597abf30.70009332', 'http://www.facebook.com/', 'private', '', 'three@gmail.com', '', '', 'one@gmail.com', '2017, August 7 4:08 pm', '2017, August 7 4:12 pm', 'published', 'UPDATE', '2017-08-07 07:12:05'),
(22, 'powerpoint_598962b1d4ae84.45258669.pptx', 'Presentation1.pptx', 'private', 'three@gmail.com', '', '', '', 'one@gmail.com', '2017, August 8 9:05 am', '', 'pending', 'INSERT', '2017-08-08 00:05:21'),
(23, 'powerpoint_598962b1d4ae84.45258669.pptx', 'Presentation1.pptx', 'private', '', 'three@gmail.com', '', '', 'one@gmail.com', '2017, August 8 9:05 am', '', 'pending', 'UPDATE', '2017-08-08 01:42:44'),
(24, 'powerpoint_59897aa20e7174.40106372.pptx', 'Presentation1.pptx', 'private', 'three@gmail.com', '', '', '', 'one@gmail.com', '2017, August 8 10:47 am', '', 'pending', 'INSERT', '2017-08-08 01:47:30'),
(25, 'powerpoint_59897aa20e7174.40106372.pptx', 'Presentation1.pptx', 'private', 'three@gmail.com', '', 'three@gmail.com', 'Late Submission', 'one@gmail.com', '2017, August 8 10:47 am', '', 'pending', 'UPDATE', '2017-08-08 01:47:49'),
(26, 'powerpoint_598962b1d4ae84.45258669.pptx', 'Presentation1.pptx', 'private', '', 'three@gmail.com', '', '', 'one@gmail.com', '2017, August 8 9:05 am', '2017, August 8 10:48 am', 'published', 'UPDATE', '2017-08-08 01:48:08'),
(27, 'video_59897c116d5c68.11263879', 'http://thehypedgeek.com/china-wins-world-cosplay-summit-2017/', 'private', 'three@gmail.com', '', '', '', 'one@gmail.com', '2017, August 8 10:53 am', '', 'pending', 'INSERT', '2017-08-08 01:53:37'),
(28, 'powerpoint_59897e02dc8413.16826946.pptx', 'Presentation1.pptx', 'private', 'three@gmail.com', '', '', '', 'one@gmail.com', '2017, August 8 11:01 am', '', 'pending', 'INSERT', '2017-08-08 02:01:54'),
(29, 'powerpoint_59897e02dc8413.16826946.pptx', 'Presentation1.pptx', 'private', 'three@gmail.com', '', 'three@gmail.com', 'Late Submission', 'one@gmail.com', '2017, August 8 11:01 am', '', 'pending', 'UPDATE', '2017-08-08 02:02:37'),
(30, 'video_59897c116d5c68.11263879', 'http://thehypedgeek.com/china-wins-world-cosplay-summit-2017/', 'private', '', 'three@gmail.com', '', '', 'one@gmail.com', '2017, August 8 10:53 am', '', 'pending', 'UPDATE', '2017-08-08 02:04:41'),
(31, 'video_59885884b520e5.08475755', 'https://www.youtube.com/embed/r1zyVGooNME', 'private', '', 'three@gmail.com', '', '', 'one@gmail.com', '2017, August 7 2:09 pm', '', 'pending', 'UPDATE', '2017-08-08 02:05:25'),
(32, 'video_59897f87858e56.74371249', 'https://www.facebook.com', 'private', 'three@gmail.com', '', '', '', 'one@gmail.com', '2017, August 8 11:08 am', '', 'pending', 'INSERT', '2017-08-08 02:08:23'),
(33, 'video_59897f87858e56.74371249', 'https://www.facebook.com', 'private', 'three@gmail.com', '', 'three@gmail.com', 'Duplicate Filing :	The exact document has already been filed', 'one@gmail.com', '2017, August 8 11:08 am', '', 'pending', 'UPDATE', '2017-08-08 02:08:53'),
(34, 'powerpoint_59897e02dc8413.16826946.pptx', 'Presentation1.pptx', 'private', 'three@gmail.com', '', '', '', 'one@gmail.com', '2017, August 8 11:01 am', '', 'pending', 'UPDATE', '2017-08-08 04:45:16'),
(35, 'powerpoint_59897aa20e7174.40106372.pptx', 'Presentation1.pptx', 'private', 'three@gmail.com', '', '', '', 'one@gmail.com', '2017, August 8 10:47 am', '', 'pending', 'UPDATE', '2017-08-08 04:46:07'),
(36, 'powerpoint_59897e02dc8413.16826946.pptx', 'Presentation1.pptx', 'private', 'three@gmail.com', '', 'three@gmail.com', 'Duplicate Filing :	The exact document has already been filed', 'one@gmail.com', '2017, August 8 11:01 am', '', 'pending', 'UPDATE', '2017-08-08 04:46:30'),
(37, 'powerpoint_59897aa20e7174.40106372.pptx', 'Presentation1.pptx', 'private', 'three@gmail.com', '', 'three@gmail.com', 'Document Issue: Check if the document is not dated; the document contains incomplete files; the attached image is not legible; etc', 'one@gmail.com', '2017, August 8 10:47 am', '', 'pending', 'UPDATE', '2017-08-08 04:46:34'),
(38, 'powerpoint_59897e02dc8413.16826946.pptx', 'Presentation1.pptx', 'private', 'three@gmail.com', '', '', '', 'one@gmail.com', '2017, August 8 11:01 am', '', 'pending', 'UPDATE', '2017-08-08 04:47:13'),
(39, 'excel_598866d3196224.68542839.xlsx', 'Book1.xlsx', 'private', '', 'three@gmail.com', '', '', 'one@gmail.com', '2017, August 7 3:10 pm', '', 'pending', 'UPDATE', '2017-08-09 01:54:18');

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

--
-- Dumping data for table `tbl_news`
--

INSERT INTO `tbl_news` (`num`, `doc_id`, `name`, `email`, `date`, `time`, `signatories`, `pending_signatories`, `approved_signatories`, `msg`, `photo`, `created_by`) VALUES
(1, 'efile_597e6bff1144f4.02266968', 'try', 'one@gmail.com', '2017, July 31', '1:30 am', 'two@gmail.com', 'two@gmail.com', '', 'has created an efile', 'one@gmail.com.jpg', 'one@gmail.com'),
(2, 'efile_5988116400c869.54893505', 'ahg', 'one@gmail.com', '2017, August 7', '9:06 am', 'three@gmail.com', 'three@gmail.com', '', 'has created an efile', 'one@gmail.com.jpg', 'one@gmail.com'),
(3, 'efile_5988116400c869.54893505', 'ahg', 'three@gmail.com', '2017, August 7', '9:42 am', 'three@gmail.com', '', 'three@gmail.com', 'has approved an efile', 'three@gmail.com.jpg', 'one@gmail.com'),
(4, 'efile_59881bad2c6653.15747980', '123', 'one@gmail.com', '2017, August 7', '9:50 am', 'three@gmail.com', 'three@gmail.com', '', 'has created an efile', 'one@gmail.com.jpg', 'one@gmail.com'),
(5, 'efile_59881bad2c6653.15747980', '123', 'three@gmail.com', '2017, August 7', '9:52 am', 'three@gmail.com', '', 'three@gmail.com', 'has approved an efile', 'three@gmail.com.jpg', 'one@gmail.com'),
(6, 'efile_59881c3bbf5403.45300442', '123', 'one@gmail.com', '2017, August 7', '9:52 am', 'three@gmail.com', 'three@gmail.com', '', 'has created an efile', 'one@gmail.com.jpg', 'one@gmail.com'),
(7, 'efile_59881c3bbf5403.45300442', '123', 'three@gmail.com', '2017, August 7', '9:57 am', 'three@gmail.com', '', 'three@gmail.com', 'has approved an efile', 'three@gmail.com.jpg', 'one@gmail.com'),
(8, 'efile_59881eeed2d188.06613157', '123', 'one@gmail.com', '2017, August 7', '10:03 am', 'three@gmail.com', 'three@gmail.com', '', 'has created an efile', 'one@gmail.com.jpg', 'one@gmail.com'),
(9, 'efile_59881ef237c1c7.29714305', '123', 'one@gmail.com', '2017, August 7', '10:04 am', 'three@gmail.com', 'three@gmail.com', '', 'has created an efile', 'one@gmail.com.jpg', 'one@gmail.com'),
(10, 'efile_59881ef2608946.18192593', '123', 'one@gmail.com', '2017, August 7', '10:04 am', 'three@gmail.com', 'three@gmail.com', '', 'has created an efile', 'one@gmail.com.jpg', 'one@gmail.com'),
(11, 'efile_59881ef2608946.18192593', '123', 'three@gmail.com', '2017, August 7', '10:04 am', 'three@gmail.com', 'three@gmail.com', '', 'has rejected an efile', 'three@gmail.com.jpg', 'one@gmail.com'),
(12, 'efile_59881ef237c1c7.29714305', '123', 'three@gmail.com', '2017, August 7', '10:04 am', 'three@gmail.com', 'three@gmail.com', '', 'has rejected an efile', 'three@gmail.com.jpg', 'one@gmail.com'),
(13, 'efile_59881eeed2d188.06613157', '123', 'three@gmail.com', '2017, August 7', '10:04 am', 'three@gmail.com', 'three@gmail.com', '', 'has rejected an efile', 'three@gmail.com.jpg', 'one@gmail.com'),
(14, 'efile_59881ef2608946.18192593', '123', 'one@gmail.com', '2017, August 7', '10:04 am', 'three@gmail.com', 'three@gmail.com', '', 'has deleted an Efile', 'one@gmail.com.jpg', 'one@gmail.com'),
(15, 'efile_59881ef237c1c7.29714305', '123', 'one@gmail.com', '2017, August 7', '10:04 am', 'three@gmail.com', 'three@gmail.com', '', 'has deleted an Efile', 'one@gmail.com.jpg', 'one@gmail.com'),
(16, 'efile_59881eeed2d188.06613157', '123', 'one@gmail.com', '2017, August 7', '10:04 am', 'three@gmail.com', 'three@gmail.com', '', 'has deleted an Efile', 'one@gmail.com.jpg', 'one@gmail.com'),
(17, 'efile_59881f2c41e9e3.53343520', 'wqe', 'one@gmail.com', '2017, August 7', '10:05 am', 'three@gmail.com', 'three@gmail.com', '', 'has created an efile', 'one@gmail.com.jpg', 'one@gmail.com'),
(18, 'efile_59881f2c41e9e3.53343520', 'wqe', 'three@gmail.com', '2017, August 7', '10:12 am', 'three@gmail.com', '', 'three@gmail.com', 'has approved an efile', 'three@gmail.com.jpg', 'one@gmail.com'),
(19, 'efile_598820f63caf90.77570594', '12', 'one@gmail.com', '2017, August 7', '10:12 am', 'three@gmail.com', 'three@gmail.com', '', 'has created an efile', 'one@gmail.com.jpg', 'one@gmail.com'),
(20, 'efile_598820f7df1584.12748564', '12', 'one@gmail.com', '2017, August 7', '10:12 am', 'three@gmail.com', 'three@gmail.com', '', 'has created an efile', 'one@gmail.com.jpg', 'one@gmail.com'),
(21, 'efile_598820f7df1584.12748564', '12', 'three@gmail.com', '2017, August 7', '10:12 am', 'three@gmail.com', '', 'three@gmail.com', 'has approved an efile', 'three@gmail.com.jpg', 'one@gmail.com'),
(22, 'efile_598821502576e6.42968288', '123', 'one@gmail.com', '2017, August 7', '10:14 am', 'three@gmail.com', 'three@gmail.com', '', 'has created an efile', 'one@gmail.com.jpg', 'one@gmail.com'),
(23, 'efile_598821502576e6.42968288', '123', 'three@gmail.com', '2017, August 7', '10:14 am', 'three@gmail.com', '', 'three@gmail.com', 'has approved an efile', 'three@gmail.com.jpg', 'one@gmail.com'),
(24, 'efile_59882189c4eec0.42129227', 'asd', 'one@gmail.com', '2017, August 7', '10:15 am', 'three@gmail.com', 'three@gmail.com', '', 'has created an efile', 'one@gmail.com.jpg', 'one@gmail.com'),
(25, 'efile_59882189c4eec0.42129227', 'asd', 'three@gmail.com', '2017, August 7', '10:15 am', 'three@gmail.com', '', 'three@gmail.com', 'has approved an efile', 'three@gmail.com.jpg', 'one@gmail.com'),
(26, 'efile_598820f63caf90.77570594', '12', 'three@gmail.com', '2017, August 7', '11:04 am', 'three@gmail.com', 'three@gmail.com', '', 'has rejected an efile', 'three@gmail.com.jpg', 'one@gmail.com'),
(27, 'efile_598820f63caf90.77570594', '12', 'three@gmail.com', '2017, August 7', '11:21 am', 'three@gmail.com', 'three@gmail.com', '', 'has rejected an efile', 'three@gmail.com.jpg', 'one@gmail.com'),
(28, 'excel_598832cddef2f8.21638141.xlsx', 'Book1.xlsx', 'one@gmail.com', '2017, August 7', '11:28 am', 'three@gmail.com', 'three@gmail.com', '', 'has uploaded a Spreadsheet', 'one@gmail.com.jpg', 'one@gmail.com'),
(29, 'efile_5988340fe23f80.97701810', '123', 'one@gmail.com', '2017, August 7', '11:34 am', 'three@gmail.com', 'three@gmail.com', '', 'has created an efile', 'one@gmail.com.jpg', 'one@gmail.com'),
(30, 'excel_598832cddef2f8.21638141.xlsx', 'Book1.xlsx', 'three@gmail.com', '2017, August 7', '11:37 am', 'three@gmail.com', '', 'three@gmail.com', 'has approved a spreadsheet', 'three@gmail.com.jpg', 'one@gmail.com'),
(31, 'excel_598834ee54b436.89824908.xlsx', 'Book1.xlsx', 'one@gmail.com', '2017, August 7', '11:37 am', 'three@gmail.com', 'three@gmail.com', '', 'has uploaded a Spreadsheet', 'one@gmail.com.jpg', 'one@gmail.com'),
(32, 'excel_598834ee54b436.89824908.xlsx', 'Book1.xlsx', 'three@gmail.com', '2017, August 7', '11:38 am', 'three@gmail.com', '', 'three@gmail.com', 'has approved a spreadsheet', 'three@gmail.com.jpg', 'one@gmail.com'),
(33, 'excel_598835699588f5.24975127.xlsx', 'Book1.xlsx', 'one@gmail.com', '2017, August 7', '11:39 am', 'three@gmail.com', 'three@gmail.com', '', 'has uploaded a Spreadsheet', 'one@gmail.com.jpg', 'one@gmail.com'),
(34, 'efile_5988340fe23f80.97701810', '123', 'three@gmail.com', '2017, August 7', '11:44 am', 'three@gmail.com', 'three@gmail.com', '', 'has rejected an efile', 'three@gmail.com.jpg', 'one@gmail.com'),
(35, 'excel_598835699588f5.24975127.xlsx', 'Book1.xlsx', 'three@gmail.com', '2017, August 7', '11:52 am', 'three@gmail.com', '', 'three@gmail.com', 'has approved a spreadsheet', 'three@gmail.com.jpg', 'one@gmail.com'),
(36, 'excel_5988413bec63f1.86626099.xlsx', 'Book1.xlsx', 'one@gmail.com', '2017, August 7', '12:30 pm', 'three@gmail.com', 'three@gmail.com', '', 'has uploaded a Spreadsheet', 'one@gmail.com.jpg', 'one@gmail.com'),
(37, 'excel_5988413bec63f1.86626099.xlsx', 'Book1.xlsx', 'three@gmail.com', '2017, August 7', '12:30 pm', 'three@gmail.com', 'three@gmail.com', '', 'has rejected a spreadsheet', 'three@gmail.com.jpg', 'one@gmail.com'),
(38, 'excel_5988413bec63f1.86626099.xlsx', 'Book1.xlsx', 'three@gmail.com', '2017, August 7', '12:30 pm', 'three@gmail.com', 'three@gmail.com', '', 'has rejected a spreadsheet', 'three@gmail.com.jpg', 'one@gmail.com'),
(39, 'excel_5988413bec63f1.86626099.xlsx', 'Book1.xlsx', 'one@gmail.com', '2017, August 7', '12:31 pm', 'three@gmail.com', 'three@gmail.com', '', 'has edit a spreadsheet', 'one@gmail.com.jpg', 'one@gmail.com'),
(40, 'excel_5988413bec63f1.86626099.xlsx', 'Book1.xlsx', 'three@gmail.com', '2017, August 7', '12:31 pm', 'three@gmail.com', 'three@gmail.com', '', 'has rejected a spreadsheet', 'three@gmail.com.jpg', 'one@gmail.com'),
(41, 'efile_5988473c4c8a67.26355406', '213', 'one@gmail.com', '2017, August 7', '12:55 pm', 'three@gmail.com', 'three@gmail.com', '', 'has created an efile', 'one@gmail.com.jpg', 'one@gmail.com'),
(42, 'video_59885884b520e5.08475755', 'https://www.youtube.com/embed/r1zyVGooNME', 'one@gmail.com', '2017, August 7', '2:09 pm', 'three@gmail.com', 'three@gmail.com', '', 'has uploaded a video', 'one@gmail.com.jpg', 'one@gmail.com'),
(43, 'efile_59885d7a218725.38911844', 'tatat', 'three@gmail.com', '2017, August 7', '2:30 pm', 'two@gmail.com,one@gmail.com', 'two@gmail.com,one@gmail.com', '', 'has created an efile', 'three@gmail.com.jpg', 'three@gmail.com'),
(44, 'excel_598866d3196224.68542839.xlsx', 'Book1.xlsx', 'one@gmail.com', '2017, August 7', '3:10 pm', 'three@gmail.com', 'three@gmail.com', '', 'has uploaded a Spreadsheet', 'one@gmail.com.jpg', 'one@gmail.com'),
(45, 'video_598870e3e839e4.73185912', 'hymno', 'one@gmail.com', '2017, August 7', '3:53 pm', 'three@gmail.com', 'three@gmail.com', '', 'has uploaded a video', 'one@gmail.com.jpg', 'one@gmail.com'),
(46, 'video_598870e3e839e4.73185912', 'http://www.facebook.com/', 'three@gmail.com', '2017, August 7', '3:56 pm', 'three@gmail.com', '', 'three@gmail.com', 'has approved a video', 'three@gmail.com.jpg', 'one@gmail.com'),
(47, 'video_598870e3e839e4.73185912', 'http://www.facebook.com/', 'one@gmail.com', '2017, August 7', '3:56 pm', 'three@gmail.com', '', 'three@gmail.com', 'has published a video', 'one@gmail.com.jpg', 'one@gmail.com'),
(48, 'video_598874597abf30.70009332', 'sasa', 'one@gmail.com', '2017, August 7', '4:08 pm', 'three@gmail.com', 'three@gmail.com', '', 'has uploaded a video', 'one@gmail.com.jpg', 'one@gmail.com'),
(49, 'video_598874597abf30.70009332', 'sasa', 'three@gmail.com', '2017, August 7', '4:08 pm', 'three@gmail.com', 'three@gmail.com', '', 'has rejected a video', 'three@gmail.com.jpg', 'one@gmail.com'),
(50, 'video_598874597abf30.70009332', 'http://www.facebook.com/', 'one@gmail.com', '2017, August 7', '4:10 pm', 'three@gmail.com', 'three@gmail.com', '', 'has edit a video', 'one@gmail.com.jpg', 'one@gmail.com'),
(51, 'video_598874597abf30.70009332', 'sasa', 'three@gmail.com', '2017, August 7', '4:11 pm', 'three@gmail.com', '', 'three@gmail.com', 'has approved a video', 'three@gmail.com.jpg', 'one@gmail.com'),
(52, 'video_598874597abf30.70009332', 'sasa', 'one@gmail.com', '2017, August 7', '4:12 pm', 'three@gmail.com', '', 'three@gmail.com', 'has published a video', 'one@gmail.com.jpg', 'one@gmail.com'),
(53, 'powerpoint_598962b1d4ae84.45258669.pptx', 'Presentation1.pptx', 'one@gmail.com', '2017, August 8', '9:05 am', 'three@gmail.com', 'three@gmail.com', '', 'has uploaded a presentation', 'one@gmail.com.jpg', 'one@gmail.com'),
(54, 'efile_5988473c4c8a67.26355406', '213', 'three@gmail.com', '2017, August 8', '9:05 am', 'three@gmail.com', '', 'three@gmail.com', 'has approved an efile', 'three@gmail.com.jpg', 'one@gmail.com'),
(55, 'powerpoint_598962b1d4ae84.45258669.pptx', 'Presentation1.pptx', 'three@gmail.com', '2017, August 8', '10:42 am', 'three@gmail.com', '', 'three@gmail.com', 'has approved a presentation', 'three@gmail.com.jpg', 'one@gmail.com'),
(56, 'powerpoint_59897aa20e7174.40106372.pptx', 'Presentation1.pptx', 'one@gmail.com', '2017, August 8', '10:47 am', 'three@gmail.com', 'three@gmail.com', '', 'has uploaded a presentation', 'one@gmail.com.jpg', 'one@gmail.com'),
(57, 'powerpoint_59897aa20e7174.40106372.pptx', 'Presentation1.pptx', 'three@gmail.com', '2017, August 8', '10:47 am', 'three@gmail.com', 'three@gmail.com', '', 'has rejected a presentation', 'three@gmail.com.jpg', 'one@gmail.com'),
(58, 'powerpoint_598962b1d4ae84.45258669.pptx', 'Presentation1.pptx', 'one@gmail.com', '2017, August 8', '10:48 am', 'three@gmail.com', '', 'three@gmail.com', 'has published a presentation', 'one@gmail.com.jpg', 'one@gmail.com'),
(59, 'video_59897c116d5c68.11263879', 'trial video', 'one@gmail.com', '2017, August 8', '10:53 am', 'three@gmail.com', 'three@gmail.com', '', 'has uploaded a video', 'one@gmail.com.jpg', 'one@gmail.com'),
(60, 'powerpoint_59897e02dc8413.16826946.pptx', 'Presentation1.pptx', 'one@gmail.com', '2017, August 8', '11:01 am', 'three@gmail.com', 'three@gmail.com', '', 'has uploaded a presentation', 'one@gmail.com.jpg', 'one@gmail.com'),
(61, 'powerpoint_59897e02dc8413.16826946.pptx', 'Presentation1.pptx', 'three@gmail.com', '2017, August 8', '11:02 am', 'three@gmail.com', 'three@gmail.com', '', 'has rejected a presentation', 'three@gmail.com.jpg', 'one@gmail.com'),
(62, 'video_59897c116d5c68.11263879', 'trial video', 'three@gmail.com', '2017, August 8', '11:04 am', 'three@gmail.com', '', 'three@gmail.com', 'has approved a video', 'three@gmail.com.jpg', 'one@gmail.com'),
(63, 'video_59885884b520e5.08475755', '', 'three@gmail.com', '2017, August 8', '11:05 am', 'three@gmail.com', '', 'three@gmail.com', 'has approved a video', 'three@gmail.com.jpg', 'one@gmail.com'),
(64, 'video_59897f87858e56.74371249', 'asa', 'one@gmail.com', '2017, August 8', '11:08 am', 'three@gmail.com', 'three@gmail.com', '', 'has uploaded a video', 'one@gmail.com.jpg', 'one@gmail.com'),
(65, 'video_59897f87858e56.74371249', 'asa', 'three@gmail.com', '2017, August 8', '11:08 am', 'three@gmail.com', 'three@gmail.com', '', 'has rejected a video', 'three@gmail.com.jpg', 'one@gmail.com'),
(66, 'powerpoint_59897e02dc8413.16826946.pptx', 'Presentation1.pptx', 'one@gmail.com', '2017, August 8', '1:45 pm', 'three@gmail.com', 'three@gmail.com', '', 'has edit a presentation', 'one@gmail.com.jpg', 'one@gmail.com'),
(67, 'powerpoint_59897aa20e7174.40106372.pptx', 'Presentation1.pptx', 'one@gmail.com', '2017, August 8', '1:46 pm', 'three@gmail.com', 'three@gmail.com', '', 'has edit a presentation', 'one@gmail.com.jpg', 'one@gmail.com'),
(68, 'powerpoint_59897e02dc8413.16826946.pptx', 'Presentation1.pptx', 'three@gmail.com', '2017, August 8', '1:46 pm', 'three@gmail.com', 'three@gmail.com', '', 'has rejected a presentation', 'three@gmail.com.jpg', 'one@gmail.com'),
(69, 'powerpoint_59897aa20e7174.40106372.pptx', 'Presentation1.pptx', 'three@gmail.com', '2017, August 8', '1:46 pm', 'three@gmail.com', 'three@gmail.com', '', 'has rejected a presentation', 'three@gmail.com.jpg', 'one@gmail.com'),
(70, 'powerpoint_59897e02dc8413.16826946.pptx', 'Presentation1.pptx', 'one@gmail.com', '2017, August 8', '1:47 pm', 'three@gmail.com', 'three@gmail.com', '', 'has edit a presentation', 'one@gmail.com.jpg', 'one@gmail.com'),
(71, 'efile_598acdaa653b98.20841817', 'asd', 'one@gmail.com', '2017, August 9', '10:54 am', 'three@gmail.com', 'three@gmail.com', '', 'has created an efile', 'one@gmail.com.jpg', 'one@gmail.com'),
(72, 'excel_598866d3196224.68542839.xlsx', 'Book1.xlsx', 'three@gmail.com', '2017, August 9', '10:54 am', 'three@gmail.com', '', 'three@gmail.com', 'has approved a spreadsheet', 'three@gmail.com.jpg', 'one@gmail.com');

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
(10, 'img_597a04311dfbb5.51882953.png', 'Templatee.png', '2017, July 27 5:18 pm', 'one@gmail.com'),
(11, 'img_5989d525e445e0.50231195.jpg', '6mYMKGh.jpg', '2017, August 8 5:13 pm', 'admin@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_position`
--

CREATE TABLE `tbl_position` (
  `id` int(11) NOT NULL,
  `department` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_position`
--

INSERT INTO `tbl_position` (`id`, `department`, `position`) VALUES
(1, 'OFFICE OF THE MAYOR', 'mayor'),
(2, 'OFFICE OF THE MAYOR', 'secretary'),
(3, 'DSWD', 'facilitator 1'),
(4, 'DSWD', 'facilitator 2');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sudo`
--

CREATE TABLE `tbl_sudo` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pw` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_sudo`
--

INSERT INTO `tbl_sudo` (`id`, `email`, `pw`, `status`) VALUES
(3, 'sudo@gmail.com', '$2y$10$hB619BLmLwjWwYo8tqK36enl5W5XtVV0Nvg5FofeYIGILWkPA3oRu', 'active');

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
-- Indexes for table `tbl_position`
--
ALTER TABLE `tbl_position`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_sudo`
--
ALTER TABLE `tbl_sudo`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `tbl_chat`
--
ALTER TABLE `tbl_chat`
  MODIFY `num` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_department`
--
ALTER TABLE `tbl_department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tbl_efile`
--
ALTER TABLE `tbl_efile`
  MODIFY `num` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `tbl_efile_trgr`
--
ALTER TABLE `tbl_efile_trgr`
  MODIFY `num` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `tbl_file`
--
ALTER TABLE `tbl_file`
  MODIFY `num` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `tbl_file_trgr`
--
ALTER TABLE `tbl_file_trgr`
  MODIFY `num` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `tbl_news`
--
ALTER TABLE `tbl_news`
  MODIFY `num` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;
--
-- AUTO_INCREMENT for table `tbl_photo`
--
ALTER TABLE `tbl_photo`
  MODIFY `num` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `tbl_position`
--
ALTER TABLE `tbl_position`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_sudo`
--
ALTER TABLE `tbl_sudo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
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
