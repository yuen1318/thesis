-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 13, 2017 at 06:35 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Table structure for table `tbl_template`
--

CREATE TABLE `tbl_template` (
  `num` int(11) NOT NULL,
  `tmp_id` varchar(255) NOT NULL,
  `name` varchar(200) NOT NULL,
  `content` longtext NOT NULL,
  `owner` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_template`
--

INSERT INTO `tbl_template` (`num`, `tmp_id`, `name`, `content`, `owner`) VALUES
(3, 'tmplt_58e755d3399e44.34575151', 'asdasda', '<p>asagg</p>\r\n<p>as</p>\r\n<p>sd</p>\r\n<p>f</p>\r\n<p>sdf</p>\r\n<p>asdf</p>', 'sample@gmail.com'),
(4, 'tmplt_58e755fa0f0f35.29704834', 'marakal', '<p style="text-align: center; font-size: 15px;"><img title="TinyMCE Logo" src="https://www.google.com/doodle4google/images/splashes/featured.png" alt="TinyMCE Logo" width="110" height="97" /></p>\r\n<h1 style="text-align: center;">Welcome to the TinyMCE &amp; Community Plugins demo!</h1>\r\n<h5 style="text-align: center;">Note, this is not an "enterprise/premium" demo.<br />Visit the <a href="https://www.tinymce.com/pricing/#demo-enterprise">pricing page</a> to demo our premium plugins.</h5>\r\n<p>Please try out the features provided in this full featured example.</p>\r\n<p>Note that any <strong>MoxieManager</strong> file and image management functionality in this example is part of our commercial offering &ndash; the demo is to show the integration.</p>\r\n<h2>Got questions or need help?</h2>\r\n<ul>\r\n<li>Our <a href="//www.tinymce.com/docs/">documentation</a> is a great resource for learning how to configure TinyMCE.</li>\r\n<li>Have a specific question? Visit the <a href="http://community.tinymce.com/forum/">Community Forum</a>.</li>\r\n<li>We also offer enterprise grade support as part of <a href="http://tinymce.com/pricing">TinyMCE Enterprise</a>.</li>\r\n</ul>\r\n<h2>A simple table to play with</h2>\r\n<table style="text-align: center;">\r\n<thead>\r\n<tr>\r\n<th>Product</th>\r\n<th>Cost</th>\r\n<th>Really?</th>\r\n</tr>\r\n</thead>\r\n<tbody>\r\n<tr>\r\n<td>TinyMCE</td>\r\n<td>Free</td>\r\n<td>YES!</td>\r\n</tr>\r\n<tr>\r\n<td>Plupload</td>\r\n<td>Free</td>\r\n<td>YES!</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<h2>Found a bug?</h2>\r\n<p>If you think you have found a bug please create an issue on the <a href="https://github.com/tinymce/tinymce/issues">GitHub repo</a> to report it to the developers.</p>\r\n<h2>Finally ...</h2>\r\n<p>Don''t forget to check out our other product <a href="http://www.plupload.com" target="_blank" rel="noopener noreferrer">Plupload</a>, your ultimate upload solution featuring HTML5 upload support.</p>\r\n<p>Thanks for supporting TinyMCE! We hope it helps you and your users create great content.<br />All the best from the TinyMCE team.</p>', 'sample@gmail.com'),
(5, 'tmplt_58e874af727822.76708048', 'trynatin to', '<p style="text-align: center; font-size: 15px;"><img title="TinyMCE Logo" src="https://www.google.com/doodle4google/images/splashes/featured.png" alt="TinyMCE Logo" width="110" height="97" /></p>\r\n<h1 style="text-align: center;">Welcome to the TinyMCE &amp; Community Plugins demo!</h1>\r\n<h5 style="text-align: center;">Note, this is not an "enterprise/premium" demo.<br />Visit the <a href="https://www.tinymce.com/pricing/#demo-enterprise">pricing page</a> to demo our premium plugins.</h5>\r\n<p>Please try out the features provided in this full featured example.</p>\r\n<p>Note that any <strong>MoxieManager</strong> file and image management functionality in this example is part of our commercial offering &ndash; the demo is to show the integration.</p>\r\n<h2>Got questions or need help?</h2>\r\n<ul>\r\n<li>Our <a href="//www.tinymce.com/docs/">documentation</a> is a great resource for learning how to configure TinyMCE.</li>\r\n<li>Have a specific question? Visit the <a href="http://community.tinymce.com/forum/">Community Forum</a>.</li>\r\n<li>We also offer enterprise grade support as part of <a href="http://tinymce.com/pricing">TinyMCE Enterprise</a>.</li>\r\n</ul>\r\n<h2>A simple table to play with</h2>\r\n<table style="text-align: center;">\r\n<thead>\r\n<tr>\r\n<th>Product</th>\r\n<th>Cost</th>\r\n<th>Really?</th>\r\n</tr>\r\n</thead>\r\n<tbody>\r\n<tr>\r\n<td>TinyMCE</td>\r\n<td>Free</td>\r\n<td>YES!</td>\r\n</tr>\r\n<tr>\r\n<td>Plupload</td>\r\n<td>Free</td>\r\n<td>YES!</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<h2>Found a bug?</h2>\r\n<p>If you think you have found a bug please create an issue on the <a href="https://github.com/tinymce/tinymce/issues">GitHub repo</a> to report it to the developers.</p>\r\n<h2>Finally ...</h2>\r\n<p>Don''t forget to check out our other product <a href="http://www.plupload.com" target="_blank" rel="noopener noreferrer">Plupload</a>, your ultimate upload solution featuring HTML5 upload support.</p>\r\n<p>Thanks for supporting TinyMCE! We hope it helps you and your users create great content.<br />All the best from the TinyMCE team.</p>', 'sample@gmail.com'),
(6, 'tmplt_58e87508dc1233.23218017', 'asdas', '<p style="text-align: center; font-size: 15px;"><img title="TinyMCE Logo" src="https://www.google.com/doodle4google/images/splashes/featured.png" alt="TinyMCE Logo" width="110" height="97" /></p>\r\n<h1 style="text-align: center;">Welcome to the TinyMCE &amp; Community Plugins demo!</h1>\r\n<h5 style="text-align: center;">Note, this is not an "enterprise/premium" demo.<br />Visit the <a href="https://www.tinymce.com/pricing/#demo-enterprise">pricing page</a> to demo our premium plugins.</h5>\r\n<p>Please try out the features provided in this full featured example.</p>\r\n<p>Note that any <strong>MoxieManager</strong> file and image management functionality in this example is part of our commercial offering &ndash; the demo is to show the integration.</p>\r\n<h2>Got questions or need help?</h2>\r\n<ul>\r\n<li>Our <a href="//www.tinymce.com/docs/">documentation</a> is a great resource for learning how to configure TinyMCE.</li>\r\n<li>Have a specific question? Visit the <a href="http://community.tinymce.com/forum/">Community Forum</a>.</li>\r\n<li>We also offer enterprise grade support as part of <a href="http://tinymce.com/pricing">TinyMCE Enterprise</a>.</li>\r\n</ul>\r\n<h2>A simple table to play with</h2>\r\n<table style="text-align: center;">\r\n<thead>\r\n<tr>\r\n<th>Product</th>\r\n<th>Cost</th>\r\n<th>Really?</th>\r\n</tr>\r\n</thead>\r\n<tbody>\r\n<tr>\r\n<td>TinyMCE</td>\r\n<td>Free</td>\r\n<td>YES!</td>\r\n</tr>\r\n<tr>\r\n<td>Plupload</td>\r\n<td>Free</td>\r\n<td>YES!</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<h2>Found a bug?</h2>\r\n<p>If you think you have found a bug please create an issue on the <a href="https://github.com/tinymce/tinymce/issues">GitHub repo</a> to report it to the developers.</p>\r\n<h2>Finally ...</h2>\r\n<p>Don''t forget to check out our other product <a href="http://www.plupload.com" target="_blank" rel="noopener noreferrer">Plupload</a>, your ultimate upload solution featuring HTML5 upload support.</p>\r\n<p>Thanks for supporting TinyMCE! We hope it helps you and your users create great content.<br />All the best from the TinyMCE team.</p>', 'sample@gmail.com'),
(10, 'tmplt_58ec4242749537.25714182', 'lkjfkjdfldshkjsdfhksadfasdf', '<p>assdkfsdfjsdfkjlsdf</p>', 'sample@gmail.com'),
(11, 'tmplt_58ec458283ed05.28864624', 'edited to', '<p>same here</p>\r\n<p>&nbsp;</p>', 'sample@gmail.com');

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
  `access` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `fn`, `ln`, `mn`, `email`, `pw`, `gender`, `mobile`, `department`, `title`, `photo`, `access`, `status`) VALUES
(5, 'yuen', 'yalung', 'yambao', 'yuen.yalung@gmail.com', '$2y$10$CAZu32Xl0ndwtoAdzmBdbuArOfyq4rmOQ296Ea9AlThBdnZFqZzaG', 'Male', '123', 'COLLEGE OF COMPUTING STUDIES', '213', 'default.png', 'admin', 'active'),
(6, 'sample', '123', '213', 'sample@gmail.com', '$2y$10$81tZ556ekSpLLHEsDlNhzes1PxvJx5ZeOY5JPx36VzFXRbUQ21tFa', 'Male', '123', 'COLLEGE OF COMPUTING STUDIES', '123', 'default.png', 'user', 'active'),
(7, '123', '123', '123', 'sample2@gmail.com', '$2y$10$oXnCk6RtQ9YNP/FqdXKBC.9QzNnKS81aLifi/lJCe1GooAb5NjYDe', 'Male', '123', 'COLLEGE OF ENGINEERING AND ARCHITECTURE', '213', 'default.png', 'user', 'active'),
(9, '123', '123', '123', 'sample3@gmail.com', '$2y$10$OFa6FrhMEOCTG1Qam0LXzeRjYJqca/ZNWROVIJDphCrsYHmSR5TrG', 'Male', '123', 'COLLEGE OF COMPUTING STUDIES', '213', 'default.png', 'user', 'active'),
(10, 'Gago', 'Try Nga Nating', 'Tong', '123@email.com', '$2y$10$HoQcnulrQew6tFTtjXmjKuMIen/iWXhy4PCL2VvtYApIZn8PzvlM.', 'Male', '123', 'COLLEGE OF COMPUTING STUDIES', '123', 'default.png', 'user', 'active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_department`
--
ALTER TABLE `tbl_department`
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
-- AUTO_INCREMENT for table `tbl_department`
--
ALTER TABLE `tbl_department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_template`
--
ALTER TABLE `tbl_template`
  MODIFY `num` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
