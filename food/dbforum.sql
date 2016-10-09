-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 09, 2016 at 08:26 AM
-- Server version: 10.1.8-MariaDB
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbforum`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(12) NOT NULL,
  `category` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `category`) VALUES
(13, 'Main meals'),
(14, 'Dessert');

-- --------------------------------------------------------

--
-- Table structure for table `tblaccount`
--

CREATE TABLE `tblaccount` (
  `accnt_Id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `user_Id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblaccount`
--

INSERT INTO `tblaccount` (`accnt_Id`, `username`, `password`, `user_Id`) VALUES
(15, 'johna', 'aa8e7e8c8894f55dceb668662106bc7a', 15);

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

CREATE TABLE `tbladmin` (
  `Id` int(11) NOT NULL,
  `uname` varchar(255) DEFAULT NULL,
  `pwd` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`Id`, `uname`, `pwd`) VALUES
(1, 'admin', 'admin'),
(2, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tblcomment`
--

CREATE TABLE `tblcomment` (
  `comment_Id` int(11) NOT NULL,
  `comment` varchar(255) DEFAULT NULL,
  `post_Id` int(11) DEFAULT NULL,
  `datetime` datetime DEFAULT NULL,
  `user_Id` int(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblimg`
--

CREATE TABLE `tblimg` (
  `image_id` int(11) NOT NULL,
  `image_name` varchar(250) DEFAULT NULL,
  `image_path` varchar(250) DEFAULT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblimg`
--

INSERT INTO `tblimg` (`image_id`, `image_name`, `image_path`, `content`) VALUES
(7, 'chicken curry.jpg', '../photo', 'Chicken curry is a common delicacy in South Asia, Southeast Asia, as well as in the Caribbean (where it is usually referred to as "curry chicken"). A typical South Asian curry consists of chicken stewed in an onion and tomato-based sauce, flavored with ginger, garlic, chili peppers and a variety of spices, often including turmeric, cumin, coriander, cinnamon, cardamom and so on. Outside South Asia, chicken curry is often made with a pre-made spice mixture known as curry powder. '),
(16, 'Zucchini-tacos-1-1-of-1-2.jpg', '../photo', 'If I told you I had a simple and delicious recipe with 150% of your daily Vitamin A, 100% of your daily fiber, 75% of your daily Vitamin C, and 50% of your daily protein and iron needs, all with just 380 calories, you would probably think I was kidding, right? Well today is your lucky day, because I do have such a recipe â€“ this delicious vegan spinach lentil curryâ€¦.'),
(17, 'porridge.jpg', '../photo', '50 gram uncooked premium short grain rice (a little less than Â¼ cup or 4 Tbsp.) 250 ml water You will also need Small donabe (earthenwere pot) or any heavy bottomed pot (See Note 1) Toppings of your choice Shredded Japanese Salted Salmon Umeboshi (Japanese pickled plum) Chopped scallions Shredded nori seaweed + white sesame seeds Mitsuba for garnish');

-- --------------------------------------------------------

--
-- Table structure for table `tblpost`
--

CREATE TABLE `tblpost` (
  `post_Id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `content` text,
  `datetime` datetime DEFAULT NULL,
  `cat_id` int(12) DEFAULT NULL,
  `user_Id` int(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblpost`
--

INSERT INTO `tblpost` (`post_Id`, `title`, `content`, `datetime`, `cat_id`, `user_Id`) VALUES
(22, 'Roasted Zucchini And Chickpea Tacos {Vegan}', '                        how to make it?', '2016-10-09 01:59:50', 13, 15);

-- --------------------------------------------------------

--
-- Table structure for table `tbluser`
--

CREATE TABLE `tbluser` (
  `user_Id` int(11) NOT NULL,
  `fname` varchar(255) DEFAULT NULL,
  `lname` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `bdate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbluser`
--

INSERT INTO `tbluser` (`user_Id`, `fname`, `lname`, `gender`, `address`, `country`, `email`, `phone`, `bdate`) VALUES
(15, 'johna', 'ngujo', 'Female', 'timpolok lapu-lapu city', 'PH', 'johnangujo@gmail.com', '09426107357', '1996-11-25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `tblaccount`
--
ALTER TABLE `tblaccount`
  ADD PRIMARY KEY (`accnt_Id`),
  ADD KEY `user_Id` (`user_Id`);

--
-- Indexes for table `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `tblcomment`
--
ALTER TABLE `tblcomment`
  ADD PRIMARY KEY (`comment_Id`),
  ADD KEY `user_Id` (`user_Id`),
  ADD KEY `post_Id` (`post_Id`),
  ADD KEY `user_Id_2` (`user_Id`);

--
-- Indexes for table `tblimg`
--
ALTER TABLE `tblimg`
  ADD PRIMARY KEY (`image_id`);

--
-- Indexes for table `tblpost`
--
ALTER TABLE `tblpost`
  ADD PRIMARY KEY (`post_Id`),
  ADD KEY `cat_id` (`cat_id`),
  ADD KEY `user_Id` (`user_Id`);

--
-- Indexes for table `tbluser`
--
ALTER TABLE `tbluser`
  ADD PRIMARY KEY (`user_Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `tblaccount`
--
ALTER TABLE `tblaccount`
  MODIFY `accnt_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tblcomment`
--
ALTER TABLE `tblcomment`
  MODIFY `comment_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tblimg`
--
ALTER TABLE `tblimg`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `tblpost`
--
ALTER TABLE `tblpost`
  MODIFY `post_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `tbluser`
--
ALTER TABLE `tbluser`
  MODIFY `user_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tblaccount`
--
ALTER TABLE `tblaccount`
  ADD CONSTRAINT `tblaccount_ibfk_1` FOREIGN KEY (`user_Id`) REFERENCES `tbluser` (`user_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tblcomment`
--
ALTER TABLE `tblcomment`
  ADD CONSTRAINT `tblcomment_ibfk_1` FOREIGN KEY (`user_Id`) REFERENCES `tbluser` (`user_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tblcomment_ibfk_2` FOREIGN KEY (`post_Id`) REFERENCES `tblpost` (`post_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tblpost`
--
ALTER TABLE `tblpost`
  ADD CONSTRAINT `tblpost_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `category` (`cat_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
