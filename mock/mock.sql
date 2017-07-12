-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 12, 2017 at 06:57 PM
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
(7, 'Awas', 'Yo', 'Asdas', 'admin@gmail.com', '$2y$10$nquD55RBbGq6eKS95M0x2..wm1VzFz2FJeSQkQqzxe5wYh.JGswJq', 'Male', '123', '', '213', 'admin@gmail.com.jpg', 'active');

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
(1, 'one@gmail.com', 'three@gmail.com', 'oy pare', '11:45 am, 2017, June 3'),
(2, 'three@gmail.com', 'one@gmail.com', 'ano men??\n\n', '11:45 am, 2017, June 3'),
(3, 'one@gmail.com', 'three@gmail.com', 'hirap ng thesis no?\n\n', '11:46 am, 2017, June 3'),
(4, 'three@gmail.com', 'one@gmail.com', 'oo nga putang ina', '11:46 am, 2017, June 3'),
(5, 'one@gmail.com', 'three@gmail.com', 'shet\n\n', '3:31 am, 2017, June 5'),
(6, 'two@gmail.com', 'one@gmail.com', 'gago\n\n', '3:32 am, 2017, June 5'),
(7, 'one@gmail.com', 'two@gmail.com', 'nung gusto mo?', '3:32 am, 2017, June 5'),
(8, 'one@gmail.com', 'yuen.yalung@gmail.com', 'sir', '1:49 pm, 2017, June 13'),
(9, 'one@gmail.com', 'three@gmail.com', 'namu!', '1:49 pm, 2017, June 13'),
(11, 'one@gmail.com', 'three@gmail.com', 'asdasd', '1:54 pm, 2017, June 13'),
(12, 'one@gmail.com', 'three@gmail.com', 'asdasd', '2:45 pm, 2017, June 28'),
(13, 'one@gmail.com', 'two@gmail.com', 'ssss', '2:45 pm, 2017, June 28'),
(14, 'one@gmail.com', 'two@gmail.com', 'fffff', '2:46 pm, 2017, June 28'),
(15, 'three@gmail.com', 'one@gmail.com', 'gago', '2:46 pm, 2017, June 28'),
(16, 'three@gmail.com', 'one@gmail.com', 'asdasd', '2:46 pm, 2017, June 28'),
(17, 'one@gmail.com', 'three@gmail.com', 'tado\n\n', '2:46 pm, 2017, June 28'),
(18, 'three@gmail.com', 'one@gmail.com', 'asdsd', '2:46 pm, 2017, June 28'),
(19, 'one@gmail.com', 'two@gmail.com', 'ey\n\n', '9:55 am, 2017, July 6');

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
(1, 'COLLEGE OF COMPUTING STUDIES'),
(2, 'COLLEGE OF ENGINEERING AND ARCHITECTURE'),
(3, 'COLLEGE OF INDUSTRIAL TECHNOLOGY'),
(4, 'COLLEGE OF ARTS AND SCIENCE');

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
(1, 'efile_592e675c5c3264.29676177', 'private', 'published natin to', '<p><span style=\"font-size:11pt\"><span style=\"line-height:114%\"><span style=\"font-family:Calibri\"><strong><span style=\"font-size:29.0000pt\"><span style=\"font-family:Calibri\"><span style=\"color:#205867\"><strong>Remittance template</strong></span></span></span></strong></span></span></span></p>\n\n\n\n<p><span style=\"font-size:11pt\"><span style=\"line-height:114%\"><span style=\"font-family:Calibri\"><strong><span style=\"font-size:14.0000pt\"><span style=\"font-family:Calibri\"><strong>Category:</strong></span></span></strong><span style=\"font-size:14.0000pt\"><span style=\"font-family:Calibri\">&nbsp;inward</span></span></span></span></span></p>\n\n\n\n<p>&nbsp;</p>\n\n\n\n<table border=\"1\" cellspacing=\"0\" class=\"Table\" style=\"border-collapse:collapse; border:1.5000pt solid #aabbff; font-family:&quot;Times New Roman&quot;; font-size:10pt; margin-left:0.9000pt; width:393.7500pt\">\n\n	<tbody>\n\n		<tr>\n\n			<td style=\"background-color:#ccddff; width:68.8500pt\">\n\n			<p><span style=\"font-size:11pt\"><span style=\"line-height:114%\"><span style=\"font-family:Calibri\"><strong><u><span style=\"font-size:9.0000pt\"><span style=\"font-family:Tahoma\"><span style=\"color:#333333\"><strong><u>Field No.</u></strong></span></span></span></u></strong></span></span></span></p>\n\n			</td>\n\n			<td style=\"background-color:#ccddff; width:324.9000pt\">\n\n			<p><span style=\"font-size:11pt\"><span style=\"line-height:114%\"><span style=\"font-family:Calibri\"><strong><u><span style=\"font-size:9.0000pt\"><span style=\"font-family:Tahoma\"><span style=\"color:#333333\"><strong><u>Description</u></strong></span></span></span></u></strong></span></span></span></p>\n\n			</td>\n\n		</tr>\n\n		<tr>\n\n			<td colspan=\"2\" style=\"background-color:#ccddff; width:393.7500pt\">\n\n			<p>&nbsp;</p>\n\n			</td>\n\n		</tr>\n\n		<tr>\n\n			<td style=\"background-color:#ccddff; width:68.8500pt\">\n\n			<p><span style=\"font-size:11pt\"><span style=\"line-height:114%\"><span style=\"font-family:Calibri\"><span style=\"font-size:10.5000pt\"><span style=\"font-family:Tahoma\"><span style=\"color:#333333\">50</span></span></span></span></span></span></p>\n\n			</td>\n\n			<td style=\"background-color:#ccddff; width:324.9000pt\">\n\n			<p><span style=\"font-size:11pt\"><span style=\"line-height:114%\"><span style=\"font-family:Calibri\"><span style=\"font-size:10.5000pt\"><span style=\"font-family:Tahoma\"><span style=\"color:#333333\">Ordering Customer</span></span></span></span></span></span></p>\n\n			</td>\n\n		</tr>\n\n		<tr>\n\n			<td style=\"background-color:#ccddff; width:68.8500pt\">\n\n			<p><span style=\"font-size:11pt\"><span style=\"line-height:114%\"><span style=\"font-family:Calibri\"><span style=\"font-size:10.5000pt\"><span style=\"font-family:Tahoma\"><span style=\"color:#333333\">52a</span></span></span></span></span></span></p>\n\n			</td>\n\n			<td style=\"background-color:#ccddff; width:324.9000pt\">\n\n			<p><span style=\"font-size:11pt\"><span style=\"line-height:114%\"><span style=\"font-family:Calibri\"><span style=\"font-size:10.5000pt\"><span style=\"font-family:Tahoma\"><span style=\"color:#333333\">Ordering Institution</span></span></span></span></span></span></p>\n\n			</td>\n\n		</tr>\n\n		<tr>\n\n			<td style=\"background-color:#ccddff; width:68.8500pt\">\n\n			<p><span style=\"font-size:11pt\"><span style=\"line-height:114%\"><span style=\"font-family:Calibri\"><span style=\"font-size:10.5000pt\"><span style=\"font-family:Tahoma\"><span style=\"color:#333333\">53a / 53d</span></span></span></span></span></span></p>\n\n			</td>\n\n			<td style=\"background-color:#ccddff; width:324.9000pt\">\n\n			<p><span style=\"font-size:11pt\"><span style=\"line-height:114%\"><span style=\"font-family:Calibri\"><span style=\"font-size:10.5000pt\"><span style=\"font-family:Tahoma\"><span style=\"color:#333333\">Sender&#39;s Correspondent Bank</span></span></span></span></span></span></p>\n\n			</td>\n\n		</tr>\n\n		<tr>\n\n			<td style=\"background-color:#ccddff; width:68.8500pt\">\n\n			<p><span style=\"font-size:11pt\"><span style=\"line-height:114%\"><span style=\"font-family:Calibri\"><span style=\"font-size:10.5000pt\"><span style=\"font-family:Tahoma\"><span style=\"color:#333333\">54a / 54d</span></span></span></span></span></span></p>\n\n			</td>\n\n			<td style=\"background-color:#ccddff; width:324.9000pt\">\n\n			<p><span style=\"font-size:11pt\"><span style=\"line-height:114%\"><span style=\"font-family:Calibri\"><span style=\"font-size:10.5000pt\"><span style=\"font-family:Tahoma\"><span style=\"color:#333333\">Receiver&#39;s Correspondent Bank</span></span></span></span></span></span></p>\n\n			</td>\n\n		</tr>\n\n		<tr>\n\n			<td style=\"background-color:#ccddff; width:68.8500pt\">\n\n			<p><span style=\"font-size:11pt\"><span style=\"line-height:114%\"><span style=\"font-family:Calibri\"><span style=\"font-size:10.5000pt\"><span style=\"font-family:Tahoma\"><span style=\"color:#333333\">57a / 57d</span></span></span></span></span></span></p>\n\n			</td>\n\n			<td style=\"background-color:#ccddff; width:324.9000pt\">\n\n			<p><span style=\"font-size:11pt\"><span style=\"line-height:114%\"><span style=\"font-family:Calibri\"><span style=\"font-size:10.5000pt\"><span style=\"font-family:Tahoma\"><span style=\"color:#333333\">Account with Receiver&#39;s Correspondent Bank</span></span></span></span></span></span></p>\n\n			</td>\n\n		</tr>\n\n		<tr>\n\n			<td style=\"background-color:#ccddff; width:68.8500pt\">\n\n			<p><span style=\"font-size:11pt\"><span style=\"line-height:114%\"><span style=\"font-family:Calibri\"><span style=\"font-size:10.5000pt\"><span style=\"font-family:Tahoma\"><span style=\"color:#333333\">58</span></span></span></span></span></span></p>\n\n			</td>\n\n			<td style=\"background-color:#ccddff; width:324.9000pt\">\n\n			<p><span style=\"font-size:11pt\"><span style=\"line-height:114%\"><span style=\"font-family:Calibri\"><span style=\"font-size:10.5000pt\"><span style=\"font-family:Tahoma\"><span style=\"color:#333333\">Beneficiary Account No.</span></span></span></span></span></span></p>\n\n			</td>\n\n		</tr>\n\n		<tr>\n\n			<td style=\"background-color:#ccddff; width:68.8500pt\">\n\n			<p><span style=\"font-size:11pt\"><span style=\"line-height:114%\"><span style=\"font-family:Calibri\"><span style=\"font-size:10.5000pt\"><span style=\"font-family:Tahoma\"><span style=\"color:#333333\">59</span></span></span></span></span></span></p>\n\n			</td>\n\n			<td style=\"background-color:#ccddff; width:324.9000pt\">\n\n			<p><span style=\"font-size:11pt\"><span style=\"line-height:114%\"><span style=\"font-family:Calibri\"><span style=\"font-size:10.5000pt\"><span style=\"font-family:Tahoma\"><span style=\"color:#333333\">Beneficiary Account Name</span></span></span></span></span></span></p>\n\n			</td>\n\n		</tr>\n\n		<tr>\n\n			<td style=\"background-color:#ccddff; width:68.8500pt\">\n\n			<p><span style=\"font-size:11pt\"><span style=\"line-height:114%\"><span style=\"font-family:Calibri\"><span style=\"font-size:10.5000pt\"><span style=\"font-family:Tahoma\"><span style=\"color:#333333\">70</span></span></span></span></span></span></p>\n\n			</td>\n\n			<td style=\"background-color:#ccddff; width:324.9000pt\">\n\n			<p><span style=\"font-size:11pt\"><span style=\"line-height:114%\"><span style=\"font-family:Calibri\"><span style=\"font-size:10.5000pt\"><span style=\"font-family:Tahoma\"><span style=\"color:#333333\">Details of Payment</span></span></span></span></span></span></p>\n\n			</td>\n\n		</tr>\n\n		<tr>\n\n			<td style=\"background-color:#ccddff; width:68.8500pt\">\n\n			<p><span style=\"font-size:11pt\"><span style=\"line-height:114%\"><span style=\"font-family:Calibri\"><span style=\"font-size:10.5000pt\"><span style=\"font-family:Tahoma\"><span style=\"color:#333333\">72</span></span></span></span></span></span></p>\n\n			</td>\n\n			<td style=\"background-color:#ccddff; width:324.9000pt\">\n\n			<p><span style=\"font-size:11pt\"><span style=\"line-height:114%\"><span style=\"font-family:Calibri\"><span style=\"font-size:10.5000pt\"><span style=\"font-family:Tahoma\"><span style=\"color:#333333\">Sender to Receiver Information</span></span></span></span></span></span></p>\n\n			</td>\n\n		</tr>\n\n	</tbody>\n\n</table>\n\n\n\n<p>&nbsp;</p>\n\n\n\n<table border=\"1\" cellspacing=\"0\" class=\"Table\" style=\"border-collapse:collapse; border:1.0000pt solid #000000; font-family:&quot;Times New Roman&quot;; font-size:10pt; width:478.8000pt\">\n\n	<tbody>\n\n		<tr>\n\n			<td style=\"vertical-align:top; width:478.8000pt\">\n\n			<p><span style=\"font-size:11pt\"><span style=\"line-height:114%\"><span style=\"font-family:Calibri\"><span style=\"font-size:11.0000pt\"><span style=\"font-family:Calibri\">Important Note:</span></span></span></span></span></p>\n\n\n\n			<ul>\n\n				<li><span style=\"font-size:11pt\"><span style=\"line-height:114%\"><span style=\"font-family:Calibri\"><span style=\"font-size:9.0000pt\"><span style=\"font-family:Tahoma\"><span style=\"color:#333333\">All above fields are compulsory for proper credit in beneficiary account in many countries.</span></span></span></span></span></span></li>\n\n			</ul>\n\n\n\n			<p><span style=\"font-size:11pt\"><span style=\"line-height:114%\"><span style=\"font-family:Calibri\"><span style=\"font-size:9.0000pt\"><span style=\"font-family:Tahoma\"><span style=\"color:#333333\">We are giving you a partial sample format. However, you may add additional details as required by the Ordering Institution / Sender&#39;s Correspondent Banks.</span></span></span></span></span></span></p>\n\n\n\n			<p>&nbsp;</p>\n\n			</td>\n\n		</tr>\n\n	</tbody>\n\n</table>\n\n\n\n<p>&nbsp;</p>\n\n', 'three@gmail.com,two@gmail.com', '', 'three@gmail.com,two@gmail.com', '<br><div style=\'display:inline-block !important; text-align:center !important\'>\n\n                    <img src=\'../../DB/signature/three@gmail.com.png\' width=\'150\'><br>\n\n                    Three Three Three <br>\n\n                    Wlapa\n\n                    </div><br><div style=\'display:inline-block !important; text-align:center !important\'>\n\n                    <img src=\'../../DB/signature/two@gmail.com.png\' width=\'150\'><br>\n\n                    Two Two Tow <br>\n\n                    Wlapa\n\n                    </div>', '', '', 'one@gmail.com', '2017, May 31, 8:49 am', '2017, May 31, 8:50 am', 'published', '<p><span style=\"font-size:11pt\"><span style=\"line-height:114%\"><span style=\"font-family:Calibri\"><strong><span style=\"font-size:29.0000pt\"><span style=\"font-family:Calibri\"><span style=\"color:#205867\"><strong>Remittance template</strong></span></span></span></strong></span></span></span></p>\n\n\n\n<p><span style=\"font-size:11pt\"><span style=\"line-height:114%\"><span style=\"font-family:Calibri\"><strong><span style=\"font-size:14.0000pt\"><span style=\"font-family:Calibri\"><strong>Category:</strong></span></span></strong><span style=\"font-size:14.0000pt\"><span style=\"font-family:Calibri\">&nbsp;inward</span></span></span></span></span></p>\n\n\n\n<p>&nbsp;</p>\n\n\n\n<table border=\"1\" cellspacing=\"0\" class=\"Table\" style=\"border-collapse:collapse; border:1.5000pt solid #aabbff; font-family:&quot;Times New Roman&quot;; font-size:10pt; margin-left:0.9000pt; width:393.7500pt\">\n\n	<tbody>\n\n		<tr>\n\n			<td style=\"background-color:#ccddff; width:68.8500pt\">\n\n			<p><span style=\"font-size:11pt\"><span style=\"line-height:114%\"><span style=\"font-family:Calibri\"><strong><u><span style=\"font-size:9.0000pt\"><span style=\"font-family:Tahoma\"><span style=\"color:#333333\"><strong><u>Field No.</u></strong></span></span></span></u></strong></span></span></span></p>\n\n			</td>\n\n			<td style=\"background-color:#ccddff; width:324.9000pt\">\n\n			<p><span style=\"font-size:11pt\"><span style=\"line-height:114%\"><span style=\"font-family:Calibri\"><strong><u><span style=\"font-size:9.0000pt\"><span style=\"font-family:Tahoma\"><span style=\"color:#333333\"><strong><u>Description</u></strong></span></span></span></u></strong></span></span></span></p>\n\n			</td>\n\n		</tr>\n\n		<tr>\n\n			<td colspan=\"2\" style=\"background-color:#ccddff; width:393.7500pt\">\n\n			<p>&nbsp;</p>\n\n			</td>\n\n		</tr>\n\n		<tr>\n\n			<td style=\"background-color:#ccddff; width:68.8500pt\">\n\n			<p><span style=\"font-size:11pt\"><span style=\"line-height:114%\"><span style=\"font-family:Calibri\"><span style=\"font-size:10.5000pt\"><span style=\"font-family:Tahoma\"><span style=\"color:#333333\">50</span></span></span></span></span></span></p>\n\n			</td>\n\n			<td style=\"background-color:#ccddff; width:324.9000pt\">\n\n			<p><span style=\"font-size:11pt\"><span style=\"line-height:114%\"><span style=\"font-family:Calibri\"><span style=\"font-size:10.5000pt\"><span style=\"font-family:Tahoma\"><span style=\"color:#333333\">Ordering Customer</span></span></span></span></span></span></p>\n\n			</td>\n\n		</tr>\n\n		<tr>\n\n			<td style=\"background-color:#ccddff; width:68.8500pt\">\n\n			<p><span style=\"font-size:11pt\"><span style=\"line-height:114%\"><span style=\"font-family:Calibri\"><span style=\"font-size:10.5000pt\"><span style=\"font-family:Tahoma\"><span style=\"color:#333333\">52a</span></span></span></span></span></span></p>\n\n			</td>\n\n			<td style=\"background-color:#ccddff; width:324.9000pt\">\n\n			<p><span style=\"font-size:11pt\"><span style=\"line-height:114%\"><span style=\"font-family:Calibri\"><span style=\"font-size:10.5000pt\"><span style=\"font-family:Tahoma\"><span style=\"color:#333333\">Ordering Institution</span></span></span></span></span></span></p>\n\n			</td>\n\n		</tr>\n\n		<tr>\n\n			<td style=\"background-color:#ccddff; width:68.8500pt\">\n\n			<p><span style=\"font-size:11pt\"><span style=\"line-height:114%\"><span style=\"font-family:Calibri\"><span style=\"font-size:10.5000pt\"><span style=\"font-family:Tahoma\"><span style=\"color:#333333\">53a / 53d</span></span></span></span></span></span></p>\n\n			</td>\n\n			<td style=\"background-color:#ccddff; width:324.9000pt\">\n\n			<p><span style=\"font-size:11pt\"><span style=\"line-height:114%\"><span style=\"font-family:Calibri\"><span style=\"font-size:10.5000pt\"><span style=\"font-family:Tahoma\"><span style=\"color:#333333\">Sender&#39;s Correspondent Bank</span></span></span></span></span></span></p>\n\n			</td>\n\n		</tr>\n\n		<tr>\n\n			<td style=\"background-color:#ccddff; width:68.8500pt\">\n\n			<p><span style=\"font-size:11pt\"><span style=\"line-height:114%\"><span style=\"font-family:Calibri\"><span style=\"font-size:10.5000pt\"><span style=\"font-family:Tahoma\"><span style=\"color:#333333\">54a / 54d</span></span></span></span></span></span></p>\n\n			</td>\n\n			<td style=\"background-color:#ccddff; width:324.9000pt\">\n\n			<p><span style=\"font-size:11pt\"><span style=\"line-height:114%\"><span style=\"font-family:Calibri\"><span style=\"font-size:10.5000pt\"><span style=\"font-family:Tahoma\"><span style=\"color:#333333\">Receiver&#39;s Correspondent Bank</span></span></span></span></span></span></p>\n\n			</td>\n\n		</tr>\n\n		<tr>\n\n			<td style=\"background-color:#ccddff; width:68.8500pt\">\n\n			<p><span style=\"font-size:11pt\"><span style=\"line-height:114%\"><span style=\"font-family:Calibri\"><span style=\"font-size:10.5000pt\"><span style=\"font-family:Tahoma\"><span style=\"color:#333333\">57a / 57d</span></span></span></span></span></span></p>\n\n			</td>\n\n			<td style=\"background-color:#ccddff; width:324.9000pt\">\n\n			<p><span style=\"font-size:11pt\"><span style=\"line-height:114%\"><span style=\"font-family:Calibri\"><span style=\"font-size:10.5000pt\"><span style=\"font-family:Tahoma\"><span style=\"color:#333333\">Account with Receiver&#39;s Correspondent Bank</span></span></span></span></span></span></p>\n\n			</td>\n\n		</tr>\n\n		<tr>\n\n			<td style=\"background-color:#ccddff; width:68.8500pt\">\n\n			<p><span style=\"font-size:11pt\"><span style=\"line-height:114%\"><span style=\"font-family:Calibri\"><span style=\"font-size:10.5000pt\"><span style=\"font-family:Tahoma\"><span style=\"color:#333333\">58</span></span></span></span></span></span></p>\n\n			</td>\n\n			<td style=\"background-color:#ccddff; width:324.9000pt\">\n\n			<p><span style=\"font-size:11pt\"><span style=\"line-height:114%\"><span style=\"font-family:Calibri\"><span style=\"font-size:10.5000pt\"><span style=\"font-family:Tahoma\"><span style=\"color:#333333\">Beneficiary Account No.</span></span></span></span></span></span></p>\n\n			</td>\n\n		</tr>\n\n		<tr>\n\n			<td style=\"background-color:#ccddff; width:68.8500pt\">\n\n			<p><span style=\"font-size:11pt\"><span style=\"line-height:114%\"><span style=\"font-family:Calibri\"><span style=\"font-size:10.5000pt\"><span style=\"font-family:Tahoma\"><span style=\"color:#333333\">59</span></span></span></span></span></span></p>\n\n			</td>\n\n			<td style=\"background-color:#ccddff; width:324.9000pt\">\n\n			<p><span style=\"font-size:11pt\"><span style=\"line-height:114%\"><span style=\"font-family:Calibri\"><span style=\"font-size:10.5000pt\"><span style=\"font-family:Tahoma\"><span style=\"color:#333333\">Beneficiary Account Name</span></span></span></span></span></span></p>\n\n			</td>\n\n		</tr>\n\n		<tr>\n\n			<td style=\"background-color:#ccddff; width:68.8500pt\">\n\n			<p><span style=\"font-size:11pt\"><span style=\"line-height:114%\"><span style=\"font-family:Calibri\"><span style=\"font-size:10.5000pt\"><span style=\"font-family:Tahoma\"><span style=\"color:#333333\">70</span></span></span></span></span></span></p>\n\n			</td>\n\n			<td style=\"background-color:#ccddff; width:324.9000pt\">\n\n			<p><span style=\"font-size:11pt\"><span style=\"line-height:114%\"><span style=\"font-family:Calibri\"><span style=\"font-size:10.5000pt\"><span style=\"font-family:Tahoma\"><span style=\"color:#333333\">Details of Payment</span></span></span></span></span></span></p>\n\n			</td>\n\n		</tr>\n\n		<tr>\n\n			<td style=\"background-color:#ccddff; width:68.8500pt\">\n\n			<p><span style=\"font-size:11pt\"><span style=\"line-height:114%\"><span style=\"font-family:Calibri\"><span style=\"font-size:10.5000pt\"><span style=\"font-family:Tahoma\"><span style=\"color:#333333\">72</span></span></span></span></span></span></p>\n\n			</td>\n\n			<td style=\"background-color:#ccddff; width:324.9000pt\">\n\n			<p><span style=\"font-size:11pt\"><span style=\"line-height:114%\"><span style=\"font-family:Calibri\"><span style=\"font-size:10.5000pt\"><span style=\"font-family:Tahoma\"><span style=\"color:#333333\">Sender to Receiver Information</span></span></span></span></span></span></p>\n\n			</td>\n\n		</tr>\n\n	</tbody>\n\n</table>\n\n\n\n<p>&nbsp;</p>\n\n\n\n<table border=\"1\" cellspacing=\"0\" class=\"Table\" style=\"border-collapse:collapse; border:1.0000pt solid #000000; font-family:&quot;Times New Roman&quot;; font-size:10pt; width:478.8000pt\">\n\n	<tbody>\n\n		<tr>\n\n			<td style=\"vertical-align:top; width:478.8000pt\">\n\n			<p><span style=\"font-size:11pt\"><span style=\"line-height:114%\"><span style=\"font-family:Calibri\"><span style=\"font-size:11.0000pt\"><span style=\"font-family:Calibri\">Important Note:</span></span></span></span></span></p>\n\n\n\n			<ul>\n\n				<li><span style=\"font-size:11pt\"><span style=\"line-height:114%\"><span style=\"font-family:Calibri\"><span style=\"font-size:9.0000pt\"><span style=\"font-family:Tahoma\"><span style=\"color:#333333\">All above fields are compulsory for proper credit in beneficiary account in many countries.</span></span></span></span></span></span></li>\n\n			</ul>\n\n\n\n			<p><span style=\"font-size:11pt\"><span style=\"line-height:114%\"><span style=\"font-family:Calibri\"><span style=\"font-size:9.0000pt\"><span style=\"font-family:Tahoma\"><span style=\"color:#333333\">We are giving you a partial sample format. However, you may add additional details as required by the Ordering Institution / Sender&#39;s Correspondent Banks.</span></span></span></span></span></span></p>\n\n\n\n			<p>&nbsp;</p>\n\n			</td>\n\n		</tr>\n\n	</tbody>\n\n</table>\n\n\n\n<p>&nbsp;</p>\n\n<div>noted by:</div>\n\n\n\n<div style=\"display:inline-block !important; margin-left:40px; text-align:center !important\"><img src=\"../../DB/signature/three@gmail.com.png\" style=\"width:150px\" /><br />\n\nThree Three Three<br />\n\nWlapa</div>\n\n\n\n<div>approved by:</div>\n\n\n\n<div style=\"display:inline-block !important; margin-left:40px; text-align:center !important\"><img src=\"../../DB/signature/two@gmail.com.png\" style=\"width:150px\" /><br />\n\nTwo Two Tow<br />\n\nWlapa</div>\n\n<img width=\'150\' height=\'150\' style=\'float:right !important; \'src=\'../../DB/qrcode/efile_592e675c5c3264.29676177.png\'>'),
(3, 'efile_5940af2a2f04d6.71465269', 'private', 'qaqo', '<p>sssss</p>\n\n', 'one@gmail.com', '', 'one@gmail.com', '<br><div style=\'display:inline-block !important; text-align:center !important\'>\n\n                    <img src=\'../../DB/signature/one@gmail.com.png\' width=\'150\'><br>\n\n                    One One One <br>\n\n                    Wlapa\n\n                    </div>', '', '', 'two@gmail.com', '2017, June 14, 5:36 am', '', 'pending', ''),
(4, 'efile_59435aae0bbe43.80244813', 'public', 'public', '<p>asda</p>\n\n', 'three@gmail.com,two@gmail.com', '', 'three@gmail.com,two@gmail.com', '<br><div style=\'display:inline-block !important; text-align:center !important\'>\n\n                    <img src=\'../../DB/signature/three@gmail.com.png\' width=\'150\'><br>\n\n                    Three Three Three <br>\n\n                    Wlapa\n\n                    </div><br><div style=\'display:inline-block !important; text-align:center !important\'>\n\n                    <img src=\'../../DB/signature/two@gmail.com.png\' width=\'150\'><br>\n\n                    Two Two Tow <br>\n\n                    Wlapa\n\n                    </div>', '', '', 'one@gmail.com', '2017, June 16, 6:12 am', '2017, June 16, 6:14 am', 'published', '<p>asda</p>\n\n<div>noted by:</div>\n\n\n\n<div style=\"display:inline-block !important; text-align:center !important\"><img src=\"../../DB/signature/three@gmail.com.png\" style=\"width:150px\" /><br />\n\nThree Three Three<br />\n\nWlapa</div>\n\n\n\n<div style=\"display:inline-block !important; text-align:center !important\">&nbsp;</div>\n\n\n\n<div>&nbsp;</div>\n\n\n\n<div>created by:</div>\n\n\n\n<div style=\"display:inline-block !important; text-align:center !important\"><img src=\"../../DB/signature/two@gmail.com.png\" style=\"width:150px\" /><br />\n\nTwo Two Tow<br />\n\nWlapa</div>\n\n<img width=\'150\' height=\'150\' style=\'float:right !important; \'src=\'../../DB/qrcode/efile_59435aae0bbe43.80244813.png\'>'),
(6, 'efile_5958c8f7394ba1.77073633', 'private', 'mama', '<p>sssss</p>\n\n', 'three@gmail.com,two@gmail.com', '', 'three@gmail.com,two@gmail.com', '<br><div style=\'display:inline-block !important; text-align:center !important\'>\n\n                    <img src=\'../../DB/signature/three@gmail.com.png\' width=\'150\'><br>\n\n                    Three Three Three <br>\n\n                    Wlapa\n\n                    </div><br><div style=\'display:inline-block !important; text-align:center !important\'>\n\n                    <img src=\'../../DB/signature/two@gmail.com.png\' width=\'150\'><br>\n\n                    Two Two Tow <br>\n\n                    Wlapa\n\n                    </div>', '', '', 'one@gmail.com', '2017, July 2, 12:20 pm', '2017, July 2, 12:22 pm', 'published', '<p>sssss</p>\n\n<p>noted by</p>\n\n\n\n<div style=\"display:inline-block !important; text-align:center !important\"><img src=\"../../DB/signature/three@gmail.com.png\" style=\"width:150px\" /><br />\n\nThree Three Three<br />\n\nWlapa</div>\n\n\n\n<p>&nbsp;</p>\n\n\n\n<p>apporved by</p>\n\n\n\n<div style=\"display:inline-block !important; text-align:center !important\"><img src=\"../../DB/signature/two@gmail.com.png\" style=\"width:150px\" /><br />\n\nTwo Two Tow<br />\n\nWlapa</div>\n\n\n\n<p>&nbsp;</p>\n\n<img width=\'150\' height=\'150\' style=\'float:right !important; \'src=\'../../DB/qrcode/efile_5958c8f7394ba1.77073633.png\'>'),
(7, 'efile_595a4876c1e916.04728465', 'private', 'puta', '<p>sssssaasdas</p>\n\n', 'three@gmail.com', '', 'three@gmail.com', '<br><div style=\'display:inline-block !important; text-align:center !important\'>\n\n                    <img src=\'../../DB/signature/three@gmail.com.png\' width=\'150\'><br>\n\n                    Three Three Three <br>\n\n                    Wlapa\n\n                    </div>', '', '', 'one@gmail.com', '2017, July 3, 3:36 pm', '2017, July 3, 3:58 pm', 'published', '<p>sssssaasdas</p>\n\n<p>&nbsp;</p>\n\n\n\n<div style=\"display:inline-block !important; text-align:center !important\"><img src=\"../../DB/signature/three@gmail.com.png\" style=\"width:150px\" /><br />\n\nThree Three Three<br />\n\nWlapa</div>\n\n\n\n<p>&nbsp;</p>\n\n<img width=\'150\' height=\'150\' style=\'float:right !important; \'src=\'../../DB/qrcode/efile_595a4876c1e916.04728465.png\'>'),
(8, 'efile_595c58c2d85758.66001770', 'private', 'triggered', '<p>sssss</p>\n\n', 'three@gmail.com', '', 'three@gmail.com', '<br><div style=\'display:inline-block !important; text-align:center !important\'>\r\n                    <img src=\'../../DB/signature/three@gmail.com.png\' width=\'150\'><br>\r\n                    Three Three Three <br>\r\n                    Wlapa\r\n                    </div>', '', '', 'one@gmail.com', '2017, July 5, 5:10 am', '', 'pending', ''),
(9, 'efile_596643fbdba658.34407566', 'private', 'triger test', '<p>asdasasdasd</p>\r\n', 'three@gmail.com', '', 'three@gmail.com', '<br><div style=\'display:inline-block !important; text-align:center !important\'>\r\n                    <img src=\'../../DB/signature/three@gmail.com.png\' width=\'150\'><br>\r\n                    Three Three Three <br>\r\n                    Wlapa\r\n                    </div>', '', '', 'one@gmail.com', '2017, July 12, 5:44 pm', '', 'pending', ''),
(10, 'efile_596647115175b6.57652044', 'private', '123', '<p>asdas</p>\r\n', 'one@gmail.com', '', 'one@gmail.com', '<br><div style=\'display:inline-block !important; text-align:center !important\'>\r\n                    <img src=\'../../DB/signature/one@gmail.com.png\' width=\'150\'><br>\r\n                    123 Gaga One <br>\r\n                    Wlapa\r\n                    </div>', '', '', 'three@gmail.com', '2017, July 12, 5:58 pm', '2017, July 12, 5:59 pm', 'published', '<p>asdas</p>\r\n<p>&nbsp;</p>\r\n\r\n<div style=\"display:inline-block !important; text-align:center !important\"><img src=\"../../DB/signature/one@gmail.com.png\" style=\"width:150px\" /><br />\r\n123 Gaga One<br />\r\nWlapa</div>\r\n\r\n<p>&nbsp;</p>\r\n<img width=\'150\' height=\'150\' style=\'float:right !important; \'src=\'../../DB/qrcode/efile_596647115175b6.57652044.png\'>');

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
(9, 'efile_596647115175b6.57652044', '123', 'one@gmail.com', '', '', '', 'pending', 'INSERT', '2017-07-12 08:58:09'),
(10, 'efile_596647115175b6.57652044', '123', '', 'one@gmail.com', '', '', 'pending', 'UPDATE', '2017-07-12 08:58:44'),
(11, 'efile_596647115175b6.57652044', '123', '', 'one@gmail.com', '', '', 'published', 'UPDATE', '2017-07-12 08:59:44'),
(12, 'efile_59664865627d64.32027803', 'delete taya ini', 'two@gmail.com', '', '', '', 'pending', 'INSERT', '2017-07-12 09:03:49'),
(13, 'efile_59664865627d64.32027803', 'delete taya ini', 'two@gmail.com', '', 'two@gmail.com', 'eke buri\r\n', 'pending', 'UPDATE', '2017-07-12 09:04:23'),
(14, 'efile_59664865627d64.32027803', 'delete taya ini', 'two@gmail.com', '', 'two@gmail.com', 'eke buri\r\n', 'pending', 'DELETE', '2017-07-12 09:04:38');

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

--
-- Dumping data for table `tbl_file`
--

INSERT INTO `tbl_file` (`num`, `file_id`, `orig_name`, `file_type`, `file_format`, `signatories`, `pending_signatories`, `approved_signatories`, `disapproved`, `comment`, `created_by`, `created_on`, `published_on`, `status`) VALUES
(7, 'excel_594d12b187ebd2.41727036.xlsx', 'Book1.xlsx', 'private', 'excel', 'three@gmail.com', 'three@gmail.com', '', '', '', 'one@gmail.com', '2017, June 23 3:08 pm', '', 'pending'),
(9, 'excel_594d27d7b43a67.27800232.xlsx', 'Book1.xlsx', 'private', 'excel', 'three@gmail.com', '', 'three@gmail.com', '', '', 'one@gmail.com', '2017, June 23 4:38 pm', '2017, June 24 8:01 am', 'published'),
(10, 'excel_594f7ca16df215.58668983.xlsx', 'dede.xlsx', 'private', 'excel', 'three@gmail.com', 'three@gmail.com', '', '', '', 'one@gmail.com', '2017, June 25 11:04 am', '', 'pending'),
(11, 'excel_594f9e8d6af981.20036362.xlsx', 'dede.xlsx', 'private', 'excel', 'three@gmail.com', '', 'three@gmail.com', '', '', 'one@gmail.com', '2017, June 25 1:29 pm', '2017, June 25 1:37 pm', 'published'),
(12, 'excel_594fb652c89c98.93696477.xlsx', 'dede.xlsx', 'public', 'excel', 'three@gmail.com', '', 'three@gmail.com', '', '', 'one@gmail.com', '2017, June 25 3:10 pm', '2017, June 25 3:11 pm', 'published'),
(13, 'powerpoint_595111f049be27.28250325.pptx', 'present.pptx', 'private', 'powerpoint', 'three@gmail.com', '', 'three@gmail.com', '', '', 'one@gmail.com', '2017, June 26 3:53 pm', '', 'pending'),
(14, 'powerpoint_59511200532812.64829573.pptx', 'present.pptx', 'private', 'powerpoint', 'three@gmail.com', '', 'three@gmail.com', '', '', 'one@gmail.com', '2017, June 26 3:54 pm', '2017, June 26 4:30 pm', 'published'),
(15, 'powerpoint_59511248b89dd3.62938116.pptx', 'present.pptx', 'private', 'powerpoint', 'three@gmail.com', 'three@gmail.com', '', 'three@gmail.com', 'asdasdasd', 'one@gmail.com', '2017, June 26 3:55 pm', '', 'pending'),
(16, 'powerpoint_595112cd9d8432.64886326.pptx', 'present.pptx', 'private', 'powerpoint', 'three@gmail.com', '', 'three@gmail.com', '', '', 'one@gmail.com', '2017, June 26 3:57 pm', '2017, June 26 4:18 pm', 'published'),
(17, 'video_595287d947d476.24614301', 'https://youtu.be/uKZdmfmRnl8', 'private', 'video', 'three@gmail.com', 'three@gmail.com', '', '', '', 'one@gmail.com', '2017, June 27 6:29 pm', '', 'pending'),
(18, 'video_595287e36a4745.05803556', 'https://youtu.be/uKZdmfmRnl8', 'private', 'video', 'three@gmail.com', 'three@gmail.com', '', '', '', 'one@gmail.com', '2017, June 27 6:29 pm', '', 'pending'),
(19, 'video_5952882907e523.79208392', 'https://www.youtube.com/embed/X4bogD3eUOc', 'private', 'video', 'three@gmail.com', 'three@gmail.com', '', '', '', 'one@gmail.com', '2017, June 27 6:30 pm', '', 'pending'),
(20, 'video_59531aa3dce547.58060190', 'https://www.youtube.com/embed/JGwWNGJdvx8', 'private', 'video', 'three@gmail.com', '', 'three@gmail.com', '', '', 'one@gmail.com', '2017, June 28 4:55 am', '2017, June 28 5:48 am', 'published'),
(21, 'video_59531d90a8c616.13873013', 'https://www.youtube.com/watch?v=JGwWNGJdvx8', 'private', 'video', 'three@gmail.com', '', 'three@gmail.com', '', '', 'one@gmail.com', '2017, June 28 5:08 am', '2017, June 28 5:46 am', 'published'),
(22, 'excel_595382f463a852.54219921.xlsx', 'dede.xlsx', 'private', 'excel', 'three@gmail.com', 'three@gmail.com', '', '', '', 'one@gmail.com', '2017, June 28 12:20 pm', '', 'pending'),
(23, 'powerpoint_595383036c0768.78750620.pptx', 'present.pptx', 'private', 'powerpoint', 'three@gmail.com', '', 'three@gmail.com', '', '', 'one@gmail.com', '2017, June 28 12:20 pm', '', 'pending'),
(24, 'video_5953832a4a0373.59730572', 'https://www.youtube.com/embed/weeI1G46q0o', 'private', 'video', 'three@gmail.com', 'three@gmail.com', '', '', '', 'one@gmail.com', '2017, June 28 12:21 pm', '', 'pending'),
(25, 'excel_59664f066200e5.55771485.xlsx', 'Book1.xlsx', 'private', 'excel', 'three@gmail.com', 'three@gmail.com', '', '', '', 'one@gmail.com', '2017, July 12 6:32 pm', '', 'pending');

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
(1, 'excel_59664f066200e5.55771485.xlsx', 'Book1.xlsx', 'private', 'three@gmail.com', '', '', '', 'one@gmail.com', '2017, July 12 6:32 pm', '', 'pending', 'INSERT', '2017-07-12 09:32:06');

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
(1, 'efile_592e675c5c3264.29676177', 'published natin to', 'one@gmail.com', '2017, May 31', '8:49 am', 'three@gmail.com,two@gmail.com', 'three@gmail.com,two@gmail.com', '', 'has created an efile', 'one@gmail.com.jpg', 'one@gmail.com'),
(2, 'efile_592e675c5c3264.29676177', 'published natin to', 'three@gmail.com', '2017, May 31', '8:49 am', 'three@gmail.com,two@gmail.com', 'two@gmail.com', 'three@gmail.com', 'has approved an efile', 'three@gmail.com.jpg', 'one@gmail.com'),
(3, 'efile_592e675c5c3264.29676177', 'published natin to', 'two@gmail.com', '2017, May 31', '8:49 am', 'three@gmail.com,two@gmail.com', '', 'three@gmail.com,two@gmail.com', 'has approved an efile', 'two@gmail.com.jpg', 'one@gmail.com'),
(4, 'efile_592e675c5c3264.29676177', 'published natin to', 'one@gmail.com', '2017, May 31', '8:50 am', 'three@gmail.com,two@gmail.com', '', 'three@gmail.com,two@gmail.com', 'has published an efile', 'one@gmail.com.jpg', 'one@gmail.com'),
(5, 'efile_5932405c25e0b1.21255764', 'asd', 'one@gmail.com', '2017, June 3', '6:51 am', 'three@gmail.com', 'three@gmail.com', '', 'has created an efile', 'one@gmail.com.jpg', 'one@gmail.com'),
(6, 'efile_5932405c25e0b1.21255764', 'asd', 'three@gmail.com', '2017, June 3', '6:51 am', 'three@gmail.com', 'three@gmail.com', '', 'has rejected an efile', 'three@gmail.com.jpg', 'one@gmail.com'),
(7, 'efile_5940af2a2f04d6.71465269', 'hhhh', 'two@gmail.com', '2017, June 14', '5:36 am', 'one@gmail.com', 'one@gmail.com', '', 'has created an efile', 'two@gmail.com.jpg', 'two@gmail.com'),
(8, 'efile_59435aae0bbe43.80244813', 'public', 'one@gmail.com', '2017, June 16', '6:12 am', 'three@gmail.com,two@gmail.com', 'three@gmail.com,two@gmail.com', '', 'has created an efile', 'one@gmail.com.jpg', 'one@gmail.com'),
(9, 'efile_59435aae0bbe43.80244813', 'public', 'three@gmail.com', '2017, June 16', '6:12 am', 'three@gmail.com,two@gmail.com', 'two@gmail.com', 'three@gmail.com', 'has approved an efile', 'three@gmail.com.jpg', 'one@gmail.com'),
(10, 'efile_59435aae0bbe43.80244813', 'public', 'two@gmail.com', '2017, June 16', '6:13 am', 'three@gmail.com,two@gmail.com', '', 'three@gmail.com,two@gmail.com', 'has approved an efile', 'two@gmail.com.jpg', 'one@gmail.com'),
(11, 'efile_59435aae0bbe43.80244813', 'public', 'one@gmail.com', '2017, June 16', '6:14 am', 'three@gmail.com,two@gmail.com', '', 'three@gmail.com,two@gmail.com', 'has published an efile', 'one@gmail.com.jpg', 'one@gmail.com'),
(12, 'excel_594bf1414aefb1.72464414.xlsx', 'Book1.xlsx', 'three@gmail.com', '2017, June 22', '6:33 pm', 'three@gmail.com,two@gmail.com,four@gmail.com', 'two@gmail.com,four@gmail.com', 'three@gmail.com', 'has uploaded a spreadsheet', 'three@gmail.com.jpg', 'one@gmail.com'),
(13, 'excel_594bf1414aefb1.72464414.xlsx', 'Book1.xlsx', 'two@gmail.com', '2017, June 22', '7:08 pm', 'three@gmail.com,two@gmail.com,four@gmail.com', 'two@gmail.com,four@gmail.com', 'three@gmail.com', 'has rejected a spreadsheet', 'two@gmail.com.jpg', 'one@gmail.com'),
(14, 'excel_594bf1414aefb1.72464414.xlsx', 'Book1.xlsx', 'two@gmail.com', '2017, June 22', '7:10 pm', 'three@gmail.com,two@gmail.com,four@gmail.com', 'two@gmail.com,four@gmail.com', 'three@gmail.com', 'has rejected a spreadsheet', 'two@gmail.com.jpg', 'one@gmail.com'),
(15, 'excel_594bf1414aefb1.72464414.xlsx', 'Book1.xlsx', 'two@gmail.com', '2017, June 23', '12:22 pm', 'three@gmail.com,two@gmail.com,four@gmail.com', 'two@gmail.com,four@gmail.com', 'three@gmail.com', 'has rejected a spreadsheet', 'two@gmail.com.jpg', 'one@gmail.com'),
(16, 'excel_594bf1414aefb1.72464414.xlsx', 'Book1.xlsx', 'two@gmail.com', '2017, June 23', '12:26 pm', 'three@gmail.com,two@gmail.com,four@gmail.com', 'two@gmail.com,four@gmail.com', 'three@gmail.com', 'has rejected a spreadsheet', 'two@gmail.com.jpg', 'one@gmail.com'),
(17, 'excel_594bf1414aefb1.72464414.xlsx', 'Book1.xlsx', 'two@gmail.com', '2017, June 23', '12:52 pm', 'three@gmail.com,two@gmail.com,four@gmail.com', 'two@gmail.com,four@gmail.com', 'three@gmail.com', 'has rejected a spreadsheet', 'two@gmail.com.jpg', 'one@gmail.com'),
(18, 'excel_594bf1414aefb1.72464414.xlsx', 'Book1.xlsx', 'two@gmail.com', '2017, June 23', '2:37 pm', 'three@gmail.com,two@gmail.com,four@gmail.com', 'two@gmail.com,four@gmail.com', 'three@gmail.com', 'has rejected a spreadsheet', 'two@gmail.com.jpg', 'one@gmail.com'),
(19, 'excel_594d1088365aa0.77873627.xlsx', 'Book1.xlsx', 'three@gmail.com', '2017, June 23', '2:59 pm', 'three@gmail.com', 'three@gmail.com', '', 'has rejected a spreadsheet', 'three@gmail.com.jpg', 'one@gmail.com'),
(20, 'excel_594d10d58db193.94500574.xlsx', 'Book1.xlsx', 'three@gmail.com', '2017, June 23', '3:00 pm', 'three@gmail.com', 'three@gmail.com', '', 'has rejected a spreadsheet', 'three@gmail.com.jpg', 'one@gmail.com'),
(21, 'excel_594d1128344460.44833373.xlsx', 'Book1.xlsx', 'three@gmail.com', '2017, June 23', '3:01 pm', 'three@gmail.com', 'three@gmail.com', '', 'has rejected a spreadsheet', 'three@gmail.com.jpg', 'one@gmail.com'),
(22, 'excel_594d12b187ebd2.41727036.xlsx', 'Book1.xlsx', 'one@gmail.com', '2017, June 23', '3:08 pm', 'three@gmail.com', 'three@gmail.com', '', 'has uploaded a Spreadsheet', 'one@gmail.com.jpg', 'one@gmail.com'),
(23, 'excel_594d178812aa68.75596420.xlsx', 'Book1.xlsx', 'one@gmail.com', '2017, June 23', '3:28 pm', 'three@gmail.com', 'three@gmail.com', '', 'has uploaded a Spreadsheet', 'one@gmail.com.jpg', 'one@gmail.com'),
(24, 'excel_594d178812aa68.75596420.xlsx', 'Book1.xlsx', 'three@gmail.com', '2017, June 23', '3:29 pm', 'three@gmail.com', 'three@gmail.com', '', 'has rejected a spreadsheet', 'three@gmail.com.jpg', 'one@gmail.com'),
(25, 'excel_594d178812aa68.75596420.xlsx', 'Book1.xlsx', 'one@gmail.com', '2017, June 23', '3:29 pm', 'three@gmail.com', 'three@gmail.com', '', 'has deleted a Spreadsheet', 'one@gmail.com.jpg', 'one@gmail.com'),
(26, 'efile_594d217b325bc9.78405472', 'asd', 'one@gmail.com', '2017, June 23', '4:11 pm', 'three@gmail.com', 'three@gmail.com', '', 'has created an efile', 'one@gmail.com.jpg', 'one@gmail.com'),
(27, 'efile_594d217b325bc9.78405472', 'asd', 'three@gmail.com', '2017, June 23', '4:11 pm', 'three@gmail.com', 'three@gmail.com', '', 'has rejected an efile', 'three@gmail.com.jpg', 'one@gmail.com'),
(28, 'efile_5932405c25e0b1.21255764', 'asd', 'three@gmail.com', '2017, June 23', '4:11 pm', 'three@gmail.com', 'three@gmail.com', '', 'has rejected an efile', 'three@gmail.com.jpg', 'one@gmail.com'),
(29, 'efile_594d217b325bc9.78405472', 'asd', 'one@gmail.com', '2017, June 23', '4:11 pm', 'three@gmail.com', 'three@gmail.com', '', 'has deleted an Efile', 'one@gmail.com.jpg', 'one@gmail.com'),
(30, 'efile_5932405c25e0b1.21255764', 'asd', 'one@gmail.com', '2017, June 23', '4:12 pm', 'three@gmail.com', 'three@gmail.com', '', 'has deleted an Efile', 'one@gmail.com.jpg', 'one@gmail.com'),
(31, 'excel_594d27d7b43a67.27800232.xlsx', 'Book1.xlsx', 'one@gmail.com', '2017, June 23', '4:38 pm', 'three@gmail.com', 'three@gmail.com', '', 'has uploaded a Spreadsheet', 'one@gmail.com.jpg', 'one@gmail.com'),
(32, 'excel_594d12b187ebd2.41727036.xlsx', 'Book1.xlsx', 'three@gmail.com', '2017, June 23', '4:39 pm', 'three@gmail.com', 'three@gmail.com', '', 'has rejected a spreadsheet', 'three@gmail.com.jpg', 'one@gmail.com'),
(33, 'excel_594d27d7b43a67.27800232.xlsx', 'Book1.xlsx', 'three@gmail.com', '2017, June 23', '4:40 pm', 'three@gmail.com', '', 'three@gmail.com', 'has approved a spreadsheet', 'three@gmail.com.jpg', 'one@gmail.com'),
(34, 'excel_594d27d7b43a67.27800232.xlsx', 'Book1.xlsx', 'one@gmail.com', '2017, June 24', '8:01 am', 'three@gmail.com', '', 'three@gmail.com', 'has published a spreadsheet', 'one@gmail.com.jpg', 'one@gmail.com'),
(35, 'excel_594d12b187ebd2.41727036.xlsx', 'Book1.xlsx', 'three@gmail.com', '2017, June 24', '11:10 am', 'three@gmail.com', 'three@gmail.com', '', 'has rejected a spreadsheet', 'three@gmail.com.jpg', 'one@gmail.com'),
(36, 'excel_594d12b187ebd2.41727036.xlsx', 'Book1.xlsx', 'one@gmail.com', '2017, June 24', '11:10 am', 'three@gmail.com', 'three@gmail.com', '', 'has edit a spreadsheet', 'one@gmail.com.jpg', 'one@gmail.com'),
(37, 'excel_594f7ca16df215.58668983.xlsx', 'dede.xlsx', 'one@gmail.com', '2017, June 25', '11:04 am', 'three@gmail.com', 'three@gmail.com', '', 'has uploaded a Spreadsheet', 'one@gmail.com.jpg', 'one@gmail.com'),
(38, 'excel_594f7ca16df215.58668983.xlsx', 'dede.xlsx', 'three@gmail.com', '2017, June 25', '11:04 am', 'three@gmail.com', 'three@gmail.com', '', 'has rejected a spreadsheet', 'three@gmail.com.jpg', 'one@gmail.com'),
(39, 'excel_594f7ca16df215.58668983.xlsx', 'dede.xlsx', 'one@gmail.com', '2017, June 25', '11:05 am', 'three@gmail.com', 'three@gmail.com', '', 'has edit a spreadsheet', 'one@gmail.com.jpg', 'one@gmail.com'),
(40, 'excel_594f7ca16df215.58668983.xlsx', 'dede.xlsx', 'three@gmail.com', '2017, June 25', '11:05 am', 'three@gmail.com', 'three@gmail.com', '', 'has rejected a spreadsheet', 'three@gmail.com.jpg', 'one@gmail.com'),
(41, 'excel_594f7ca16df215.58668983.xlsx', 'dede.xlsx', 'one@gmail.com', '2017, June 25', '11:06 am', 'three@gmail.com', 'three@gmail.com', '', 'has edit a spreadsheet', 'one@gmail.com.jpg', 'one@gmail.com'),
(42, 'excel_594f9e8d6af981.20036362.xlsx', 'dede.xlsx', 'one@gmail.com', '2017, June 25', '1:29 pm', 'three@gmail.com', 'three@gmail.com', '', 'has uploaded a Spreadsheet', 'one@gmail.com.jpg', 'one@gmail.com'),
(43, 'excel_594f9e8d6af981.20036362.xlsx', 'dede.xlsx', 'three@gmail.com', '2017, June 25', '1:37 pm', 'three@gmail.com', '', 'three@gmail.com', 'has approved a spreadsheet', 'three@gmail.com.jpg', 'one@gmail.com'),
(44, 'excel_594f9e8d6af981.20036362.xlsx', 'dede.xlsx', 'one@gmail.com', '2017, June 25', '1:37 pm', 'three@gmail.com', '', 'three@gmail.com', 'has published a spreadsheet', 'one@gmail.com.jpg', 'one@gmail.com'),
(45, 'excel_594fb652c89c98.93696477.xlsx', 'dede.xlsx', 'one@gmail.com', '2017, June 25', '3:10 pm', 'three@gmail.com', 'three@gmail.com', '', 'has uploaded a Spreadsheet', 'one@gmail.com.jpg', 'one@gmail.com'),
(46, 'excel_594fb652c89c98.93696477.xlsx', 'dede.xlsx', 'three@gmail.com', '2017, June 25', '3:10 pm', 'three@gmail.com', '', 'three@gmail.com', 'has approved a spreadsheet', 'three@gmail.com.jpg', 'one@gmail.com'),
(47, 'excel_594fb652c89c98.93696477.xlsx', 'dede.xlsx', 'one@gmail.com', '2017, June 25', '3:11 pm', 'three@gmail.com', '', 'three@gmail.com', 'has published a spreadsheet', 'one@gmail.com.jpg', 'one@gmail.com'),
(48, 'powerpoint_59511248b89dd3.62938116.pptx', 'present.pptx', 'one@gmail.com', '2017, June 26', '3:55 pm', 'three@gmail.com', 'three@gmail.com', '', 'has uploaded a Spreadsheet', 'one@gmail.com.jpg', 'one@gmail.com'),
(49, 'powerpoint_595112cd9d8432.64886326.pptx', 'present.pptx', 'one@gmail.com', '2017, June 26', '3:57 pm', 'three@gmail.com', 'three@gmail.com', '', 'has uploaded a Spreadsheet', 'one@gmail.com.jpg', 'one@gmail.com'),
(50, 'powerpoint_595112cd9d8432.64886326.pptx', 'present.pptx', 'three@gmail.com', '2017, June 26', '4:08 pm', 'three@gmail.com', 'three@gmail.com', '', 'has rejected a spreadsheet', 'three@gmail.com.jpg', 'one@gmail.com'),
(51, 'powerpoint_595112cd9d8432.64886326.pptx', 'present.pptx', 'one@gmail.com', '2017, June 26', '4:16 pm', 'three@gmail.com', 'three@gmail.com', '', 'has edit a spreadsheet', 'one@gmail.com.jpg', 'one@gmail.com'),
(52, 'powerpoint_595112cd9d8432.64886326.pptx', 'present.pptx', 'three@gmail.com', '2017, June 26', '4:17 pm', 'three@gmail.com', '', 'three@gmail.com', 'has approved a spreadsheet', 'three@gmail.com.jpg', 'one@gmail.com'),
(53, 'powerpoint_595112cd9d8432.64886326.pptx', 'present.pptx', 'one@gmail.com', '2017, June 26', '4:18 pm', 'three@gmail.com', '', 'three@gmail.com', 'has published a spreadsheet', 'one@gmail.com.jpg', 'one@gmail.com'),
(54, 'powerpoint_59511248b89dd3.62938116.pptx', 'present.pptx', 'three@gmail.com', '2017, June 26', '4:22 pm', 'three@gmail.com', 'three@gmail.com', '', 'has rejected a Presentation', 'three@gmail.com.jpg', 'one@gmail.com'),
(55, 'powerpoint_59511200532812.64829573.pptx', 'present.pptx', 'three@gmail.com', '2017, June 26', '4:29 pm', 'three@gmail.com', '', 'three@gmail.com', 'has approved a presentation', 'three@gmail.com.jpg', 'one@gmail.com'),
(56, 'powerpoint_59511200532812.64829573.pptx', 'present.pptx', 'one@gmail.com', '2017, June 26', '4:30 pm', 'three@gmail.com', '', 'three@gmail.com', 'has published a presentation', 'one@gmail.com.jpg', 'one@gmail.com'),
(57, 'video_5952882907e523.79208392', 'https://www.youtube.com/watch?v=Y5qhef6ZY4k', 'one@gmail.com', '2017, June 27', '6:30 pm', 'three@gmail.com', 'three@gmail.com', '', 'has uploaded a video', 'one@gmail.com.jpg', 'one@gmail.com'),
(58, 'video_59531aa3dce547.58060190', 'https://www.youtube.com/watch?v=WkcYz6Wf9L8', 'one@gmail.com', '2017, June 28', '4:55 am', 'three@gmail.com', 'three@gmail.com', '', 'has uploaded a video', 'one@gmail.com.jpg', 'one@gmail.com'),
(59, 'video_59531d90a8c616.13873013', 'https://www.youtube.com/embed/uKZdmfmRnl8', 'one@gmail.com', '2017, June 28', '5:08 am', 'three@gmail.com', 'three@gmail.com', '', 'has uploaded a video', 'one@gmail.com.jpg', 'one@gmail.com'),
(60, 'video_59531d90a8c616.13873013', 'https://www.youtube.com/embed/uKZdmfmRnl8', 'three@gmail.com', '2017, June 28', '5:26 am', 'three@gmail.com', 'three@gmail.com', '', 'has rejected a video', 'three@gmail.com.jpg', 'one@gmail.com'),
(61, 'video_59531d90a8c616.13873013', 'https://www.youtube.com/embed/uKZdmfmRnl8', 'one@gmail.com', '2017, June 28', '5:37 am', 'three@gmail.com', 'three@gmail.com', '', 'has edit a video', 'one@gmail.com.jpg', 'one@gmail.com'),
(62, 'video_59531aa3dce547.58060190', 'https://www.youtube.com/watch?v=WkcYz6Wf9L8', 'three@gmail.com', '2017, June 28', '5:39 am', 'three@gmail.com', 'three@gmail.com', '', 'has rejected a video', 'three@gmail.com.jpg', 'one@gmail.com'),
(63, 'video_59531aa3dce547.58060190', 'https://www.youtube.com/watch?v=WkcYz6Wf9L8', 'one@gmail.com', '2017, June 28', '5:39 am', 'three@gmail.com', 'three@gmail.com', '', 'has edit a video', 'one@gmail.com.jpg', 'one@gmail.com'),
(64, 'video_59531aa3dce547.58060190', 'https://www.youtube.com/watch?v=JGwWNGJdvx8', 'three@gmail.com', '2017, June 28', '5:42 am', 'three@gmail.com', 'three@gmail.com', '', 'has rejected a video', 'three@gmail.com.jpg', 'one@gmail.com'),
(65, 'video_59531aa3dce547.58060190', 'https://www.youtube.com/watch?v=JGwWNGJdvx8', 'one@gmail.com', '2017, June 28', '5:42 am', 'three@gmail.com', 'three@gmail.com', '', 'has edit a video', 'one@gmail.com.jpg', 'one@gmail.com'),
(66, 'video_59531d90a8c616.13873013', 'https://www.youtube.com/watch?v=JGwWNGJdvx8', 'three@gmail.com', '2017, June 28', '5:44 am', 'three@gmail.com', '', 'three@gmail.com', 'has approved a video', 'three@gmail.com.jpg', 'one@gmail.com'),
(67, 'video_59531d90a8c616.13873013', 'https://www.youtube.com/watch?v=JGwWNGJdvx8', 'one@gmail.com', '2017, June 28', '5:46 am', 'three@gmail.com', '', 'three@gmail.com', 'has published a video', 'one@gmail.com.jpg', 'one@gmail.com'),
(68, 'video_59531aa3dce547.58060190', 'https://www.youtube.com/embed/JGwWNGJdvx8', 'three@gmail.com', '2017, June 28', '5:48 am', 'three@gmail.com', '', 'three@gmail.com', 'has approved a video', 'three@gmail.com.jpg', 'one@gmail.com'),
(69, 'video_59531aa3dce547.58060190', 'https://www.youtube.com/embed/JGwWNGJdvx8', 'one@gmail.com', '2017, June 28', '5:48 am', 'three@gmail.com', '', 'three@gmail.com', 'has published a video', 'one@gmail.com.jpg', 'one@gmail.com'),
(70, 'efile_5940af2a2f04d6.71465269', 'hhhh', 'one@gmail.com', '2017, June 28', '12:06 pm', 'one@gmail.com', '', 'one@gmail.com', 'has approved an efile', 'one@gmail.com.jpg', 'two@gmail.com'),
(71, 'excel_595382f463a852.54219921.xlsx', 'dede.xlsx', 'one@gmail.com', '2017, June 28', '12:20 pm', 'three@gmail.com', 'three@gmail.com', '', 'has uploaded a Spreadsheet', 'one@gmail.com.jpg', 'one@gmail.com'),
(72, 'powerpoint_595383036c0768.78750620.pptx', 'present.pptx', 'one@gmail.com', '2017, June 28', '12:20 pm', 'three@gmail.com', 'three@gmail.com', '', 'has uploaded a presentation', 'one@gmail.com.jpg', 'one@gmail.com'),
(73, 'video_5953832a4a0373.59730572', 'https://www.youtube.com/embed/weeI1G46q0o', 'one@gmail.com', '2017, June 28', '12:21 pm', 'three@gmail.com', 'three@gmail.com', '', 'has uploaded a video', 'one@gmail.com.jpg', 'one@gmail.com'),
(74, 'excel_595382f463a852.54219921.xlsx', 'dede.xlsx', 'three@gmail.com', '2017, June 28', '1:03 pm', 'three@gmail.com', 'three@gmail.com', '', 'has rejected a spreadsheet', 'three@gmail.com.jpg', 'one@gmail.com'),
(75, 'powerpoint_595383036c0768.78750620.pptx', 'present.pptx', 'three@gmail.com', '2017, June 28', '1:07 pm', 'three@gmail.com', '', 'three@gmail.com', 'has approved a presentation', 'three@gmail.com.jpg', 'one@gmail.com'),
(76, 'powerpoint_595111f049be27.28250325.pptx', 'present.pptx', 'three@gmail.com', '2017, June 28', '1:08 pm', 'three@gmail.com', '', 'three@gmail.com', 'has approved a presentation', 'three@gmail.com.jpg', 'one@gmail.com'),
(77, 'efile_595390361e9a01.87087173', 'sadasd', 'one@gmail.com', '2017, June 28', '1:17 pm', 'three@gmail.com', 'three@gmail.com', '', 'has created an efile', 'one@gmail.com.jpg', 'one@gmail.com'),
(78, 'excel_595382f463a852.54219921.xlsx', 'dede.xlsx', 'one@gmail.com', '2017, July 2', '9:24 am', 'three@gmail.com', 'three@gmail.com', '', 'has edit a spreadsheet', 'one@gmail.com.jpg', 'one@gmail.com'),
(79, 'excel_595382f463a852.54219921.xlsx', 'dede.xlsx', 'three@gmail.com', '2017, July 2', '9:25 am', 'three@gmail.com', 'three@gmail.com', '', 'has rejected a spreadsheet', 'three@gmail.com.jpg', 'one@gmail.com'),
(80, 'efile_595390361e9a01.87087173', 'sadasd', 'three@gmail.com', '2017, July 2', '9:27 am', 'three@gmail.com', 'three@gmail.com', '', 'has rejected an efile', 'three@gmail.com.jpg', 'one@gmail.com'),
(81, 'excel_595382f463a852.54219921.xlsx', 'dede.xlsx', 'one@gmail.com', '2017, July 2', '9:28 am', 'three@gmail.com', 'three@gmail.com', '', 'has edit a spreadsheet', 'one@gmail.com.jpg', 'one@gmail.com'),
(82, 'efile_5958c8f7394ba1.77073633', 'mama', 'one@gmail.com', '2017, July 2', '12:20 pm', 'three@gmail.com,two@gmail.com', 'three@gmail.com,two@gmail.com', '', 'has created an efile', 'one@gmail.com.jpg', 'one@gmail.com'),
(83, 'efile_5958c8f7394ba1.77073633', 'mama', 'three@gmail.com', '2017, July 2', '12:21 pm', 'three@gmail.com,two@gmail.com', 'two@gmail.com', 'three@gmail.com', 'has approved an efile', 'three@gmail.com.jpg', 'one@gmail.com'),
(84, 'efile_5958c8f7394ba1.77073633', 'mama', 'two@gmail.com', '2017, July 2', '12:21 pm', 'three@gmail.com,two@gmail.com', '', 'three@gmail.com,two@gmail.com', 'has approved an efile', 'two@gmail.com.jpg', 'one@gmail.com'),
(85, 'efile_5958c8f7394ba1.77073633', 'mama', 'one@gmail.com', '2017, July 2', '12:22 pm', 'three@gmail.com,two@gmail.com', '', 'three@gmail.com,two@gmail.com', 'has published an efile', 'one@gmail.com.jpg', 'one@gmail.com'),
(86, 'efile_595a4876c1e916.04728465', 'puta', 'one@gmail.com', '2017, July 3', '3:36 pm', 'three@gmail.com', 'three@gmail.com', '', 'has created an efile', 'one@gmail.com.jpg', 'one@gmail.com'),
(87, 'efile_595a4876c1e916.04728465', 'puta', 'three@gmail.com', '2017, July 3', '3:52 pm', 'three@gmail.com', 'three@gmail.com', '', 'has rejected an efile', 'three@gmail.com.jpg', 'one@gmail.com'),
(88, 'efile_595a4876c1e916.04728465', 'puta', 'three@gmail.com', '2017, July 3', '3:57 pm', 'three@gmail.com', '', 'three@gmail.com', 'has approved an efile', 'three@gmail.com.jpg', 'one@gmail.com'),
(89, 'efile_595a4876c1e916.04728465', 'puta', 'one@gmail.com', '2017, July 3', '3:58 pm', 'three@gmail.com', '', 'three@gmail.com', 'has published an efile', 'one@gmail.com.jpg', 'one@gmail.com'),
(90, 'efile_595c58c2d85758.66001770', 'triggered', 'one@gmail.com', '2017, July 5', '5:10 am', 'three@gmail.com', 'three@gmail.com', '', 'has created an efile', 'one@gmail.com.jpg', 'one@gmail.com'),
(91, 'efile_595390361e9a01.87087173', 'sadasd', 'one@gmail.com', '2017, July 5', '5:23 am', 'three@gmail.com', 'three@gmail.com', '', 'has deleted an Efile', 'one@gmail.com.jpg', 'one@gmail.com'),
(92, 'efile_596643fbdba658.34407566', 'triger test', 'one@gmail.com', '2017, July 12', '5:44 pm', 'three@gmail.com', 'three@gmail.com', '', 'has created an efile', 'one@gmail.com.jpg', 'one@gmail.com'),
(93, 'efile_596643fbdba658.34407566', 'triger test', 'three@gmail.com', '2017, July 12', '5:55 pm', 'three@gmail.com', '', 'three@gmail.com', 'has approved an efile', 'three@gmail.com.jpg', 'one@gmail.com'),
(94, 'efile_595c58c2d85758.66001770', 'triggered', 'three@gmail.com', '2017, July 12', '5:55 pm', 'three@gmail.com', '', 'three@gmail.com', 'has approved an efile', 'three@gmail.com.jpg', 'one@gmail.com'),
(95, 'efile_596647115175b6.57652044', '123', 'three@gmail.com', '2017, July 12', '5:58 pm', 'one@gmail.com', 'one@gmail.com', '', 'has created an efile', 'three@gmail.com.jpg', 'three@gmail.com'),
(96, 'efile_596647115175b6.57652044', '123', 'one@gmail.com', '2017, July 12', '5:58 pm', 'one@gmail.com', '', 'one@gmail.com', 'has approved an efile', 'one@gmail.com.jpg', 'three@gmail.com'),
(97, 'efile_596647115175b6.57652044', '123', 'three@gmail.com', '2017, July 12', '5:59 pm', 'one@gmail.com', '', 'one@gmail.com', 'has published an efile', 'three@gmail.com.jpg', 'three@gmail.com'),
(98, 'efile_59664865627d64.32027803', 'delete taya ini', 'three@gmail.com', '2017, July 12', '6:03 pm', 'two@gmail.com', 'two@gmail.com', '', 'has created an efile', 'three@gmail.com.jpg', 'three@gmail.com'),
(99, 'efile_59664865627d64.32027803', 'delete taya ini', 'two@gmail.com', '2017, July 12', '6:04 pm', 'two@gmail.com', 'two@gmail.com', '', 'has rejected an efile', 'two@gmail.com.jpg', 'three@gmail.com'),
(100, 'efile_59664865627d64.32027803', 'delete taya ini', 'three@gmail.com', '2017, July 12', '6:04 pm', 'two@gmail.com', 'two@gmail.com', '', 'has deleted an Efile', 'three@gmail.com.jpg', 'three@gmail.com'),
(101, 'excel_59664f066200e5.55771485.xlsx', 'Book1.xlsx', 'one@gmail.com', '2017, July 12', '6:32 pm', 'three@gmail.com', 'three@gmail.com', '', 'has uploaded a Spreadsheet', 'one@gmail.com.jpg', 'one@gmail.com');

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
(2, 'img_59571fc54f6895.39299567.jpg', '1200x630bb.jpg', '2017, July 1 6:06 am', 'one@gmail.com'),
(4, 'img_596316c59a2c23.02809150.jpg', 'c2.jpg', '2017, July 10 7:55 am', 'admin@gmail.com'),
(5, 'img_59635b8555ac32.42391982.jpg', '4.jpg', '2017, July 10 12:48 pm', 'admin@gmail.com'),
(6, 'img_59635b8c2df0b3.50137987.jpg', 'c1.jpg', '2017, July 10 12:48 pm', 'admin@gmail.com'),
(7, 'img_596363c2277020.34183350.jpg', 'regular.jpg', '2017, July 10 1:23 pm', 'one@gmail.com'),
(8, 'img_59661bbbeb21a2.39797938.png', '1.png', '2017, July 12 2:53 pm', 'one@gmail.com'),
(9, 'img_59661c282d1ab2.75778216.png', '11.png', '2017, July 12 2:55 pm', 'admin@gmail.com');

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

--
-- Dumping data for table `tbl_template`
--

INSERT INTO `tbl_template` (`num`, `tmp_id`, `name`, `content`, `owner`, `department`) VALUES
(1, 'tmplt_593766f3b69bd5.55653937', 'akn tos', '<p>123</p>\n\n', 'one@gmail.com', 'private'),
(2, 'tmplt_59376df610dc75.16019425', 'global', '<p>sssss</p>\n\n', 'yuen.yalung@gmail.com', 'COLLEGE OF ENGINEERING AND ARCHITECTURE'),
(3, 'tmplt_5947bfaccdfe93.12662426', 'ccs memo from admin', '<p>adasdasdasdas</p>\n\n', 'admin@gmail.com', 'COLLEGE OF COMPUTING STUDIES'),
(4, 'tmplt_595deb83caf8a9.82535186', 'arch', '<p>asdasdasdasd</p>\n\n', 'admin@gmail.com', 'COLLEGE OF ENGINEERING AND ARCHITECTURE'),
(5, 'tmplt_596364195c18f3.64093604', 'CCS temp', '<p>123123123</p>\r\n', 'admin@gmail.com', 'COLLEGE OF COMPUTING STUDIES'),
(6, 'tmplt_59661cf3033527.27839385', 'global template', '<p>asdas</p>\r\n', 'admin@gmail.com', 'COLLEGE OF COMPUTING STUDIES');

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
(11, '123', 'One', 'Gaga', 'one@gmail.com', '$2y$10$0wfFjPeLmoWtAeFWvoJhbuOaRwEWxWpvl6u7toU/rfGhotvrl7BRW', 'Male', '12312312312', 'COLLEGE OF COMPUTING STUDIES', 'Wlapa', 'one@gmail.com.jpg', 'active'),
(12, 'Two', 'Tow', 'Two', 'two@gmail.com', '$2y$10$GY1csdNEhzrxD0qNHoUY8uSBTAyeEE9aVz3O2bKUxb7NvlVQFIiRy', 'Male', '123', 'COLLEGE OF ENGINEERING AND ARCHITECTURE', 'Wlapa', 'two@gmail.com.jpg', 'active'),
(13, 'Three', 'Three', 'Three', 'three@gmail.com', '$2y$10$cHU8agX2u0HuoTkrxEWEqeRRYVi0UbSsDj/EtSva1dJ5qJ55jNbUi', 'Male', '12312321', 'COLLEGE OF COMPUTING STUDIES', 'Wlapa', 'three@gmail.com.jpg', 'active'),
(17, 'Five', 'Five', 'Five', 'five@gmail.com', '$2y$10$QVqSws1M1RAaOuanNq0fauZ9Rf/TtwysN48g5VbuAzIgXe21tR1aK', 'Male', '123', 'COLLEGE OF COMPUTING STUDIES', 'Asdasd', 'default.jpg', 'pending');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tbl_chat`
--
ALTER TABLE `tbl_chat`
  MODIFY `num` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `tbl_department`
--
ALTER TABLE `tbl_department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_efile`
--
ALTER TABLE `tbl_efile`
  MODIFY `num` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `tbl_efile_trgr`
--
ALTER TABLE `tbl_efile_trgr`
  MODIFY `num` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `tbl_file`
--
ALTER TABLE `tbl_file`
  MODIFY `num` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `tbl_file_trgr`
--
ALTER TABLE `tbl_file_trgr`
  MODIFY `num` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_news`
--
ALTER TABLE `tbl_news`
  MODIFY `num` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;
--
-- AUTO_INCREMENT for table `tbl_photo`
--
ALTER TABLE `tbl_photo`
  MODIFY `num` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tbl_template`
--
ALTER TABLE `tbl_template`
  MODIFY `num` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
