-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 18, 2025 at 03:56 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `testdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `attachments`
--

CREATE TABLE `attachments` (
  `attachmentID` int(11) NOT NULL,
  `postID` int(11) NOT NULL,
  `attachmentName` varchar(100) NOT NULL,
  `attachmentPath` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `attachments`
--

INSERT INTO `attachments` (`attachmentID`, `postID`, `attachmentName`, `attachmentPath`) VALUES
(1, 10, 'IronMan.JPG', '../assets/imgs/'),
(2, 3, 'test.jpg', '../assets/imgs/'),
(3, 4, 'maloi.JPG', '../assets/imgs/'),
(4, 5, 'matencio_character.png', '../assets/imgs/'),
(5, 6, 'Mikha.JPG', '../assets/imgs/'),
(6, 7, 'pfp.jpg', '../assets/imgs/'),
(7, 9, 'testPost.jpg', '../assets/imgs/');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `commentID` int(11) NOT NULL,
  `content` varchar(1000) NOT NULL,
  `postID` int(11) NOT NULL,
  `userID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`commentID`, `content`, `postID`, `userID`) VALUES
(7, 'that\'s good!', 8, 3),
(8, 'edi ikaw na!', 8, 4),
(9, 'noice!', 2, 6),
(10, 'that\'s great!', 6, 2);

-- --------------------------------------------------------

--
-- Table structure for table `follows`
--

CREATE TABLE `follows` (
  `followID` int(11) NOT NULL,
  `followedID` int(11) NOT NULL,
  `followerID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `follows`
--

INSERT INTO `follows` (`followID`, `followedID`, `followerID`) VALUES
(1, 3, 2),
(2, 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `notificationID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `followID` int(11) NOT NULL,
  `ratingID` int(11) NOT NULL,
  `commentID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`notificationID`, `userID`, `followID`, `ratingID`, `commentID`) VALUES
(1, 3, 1, 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `postID` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` varchar(10000) NOT NULL,
  `dateUploaded` datetime NOT NULL,
  `isDeleted` tinyint(1) DEFAULT NULL,
  `tagID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `ratingID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`postID`, `title`, `description`, `dateUploaded`, `isDeleted`, `tagID`, `userID`, `ratingID`) VALUES
(1, 'How to code \"Hello World\" in C++', 'This video will show how to code in C++.', '2025-01-08 14:52:36', NULL, 1, 2, NULL),
(4, 'Update: Quick Snap!', 'Dump Picture.', '2025-01-15 15:37:35', NULL, 1, 6, NULL),
(5, 'Test Post', 'this is a test post.', '2025-01-16 05:55:52', NULL, 3, 3, NULL),
(6, 'Feelin\' Good', 'hahhaha', '2025-01-16 07:50:41', NULL, 3, 4, NULL),
(7, 'Happiness', 'this is happiness', '2025-01-18 12:02:38', NULL, 3, 6, NULL),
(9, 'Me, myself, and I!', 'this is me.', '2025-01-18 13:26:08', NULL, 3, 3, NULL),
(10, 'this is a project', 'Programming is the process of writing instructions that a computer can execute to perform specific tasks. It involves using languages such as Python, JavaScript, or Java to create software, websites, and applications. Through programming, developers can solve complex problems by breaking them down into smaller, manageable steps. It also requires critical thinking and attention to detail, as even the smallest mistake can lead to errors. As technology continues to evolve, programming has become a fundamental skill, opening up endless opportunities for innovation and problem-solving.', '2025-01-18 14:13:46', NULL, 1, 6, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `ratingID` int(11) NOT NULL,
  `ratingValue` int(5) NOT NULL,
  `postID` int(11) NOT NULL,
  `userID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`ratingID`, `ratingValue`, `postID`, `userID`) VALUES
(1, 1, 0, 0),
(2, 2, 0, 0),
(3, 3, 0, 0),
(4, 4, 0, 0),
(5, 5, 0, 0),
(6, 5, 2, 2),
(7, 4, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `savedbookmarks`
--

CREATE TABLE `savedbookmarks` (
  `bookmarkID` int(11) NOT NULL,
  `postID` int(11) NOT NULL,
  `userID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `savedbookmarks`
--

INSERT INTO `savedbookmarks` (`bookmarkID`, `postID`, `userID`) VALUES
(1, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `tagID` int(11) NOT NULL,
  `tags` varchar(100) NOT NULL,
  `tagColor` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`tagID`, `tags`, `tagColor`) VALUES
(1, 'Technology', '#388E3C'),
(2, 'Education', '#1976D2'),
(3, 'Lifestyle', '#FB8C00'),
(4, 'Cooking', '#D32F2F'),
(5, 'Health', '#689F38\n');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(11) NOT NULL,
  `firstName` varchar(30) NOT NULL,
  `lastName` varchar(30) NOT NULL,
  `userName` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `birthday` date NOT NULL,
  `profilePicture` varchar(100) DEFAULT NULL,
  `coverPhoto` varchar(100) DEFAULT NULL,
  `userType` varchar(10) NOT NULL,
  `phoneNumber` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `firstName`, `lastName`, `userName`, `email`, `password`, `birthday`, `profilePicture`, `coverPhoto`, `userType`, `phoneNumber`) VALUES
(1, 'Sophia', 'Harrison', 'sophieHarry', 'sophie.harrison@example.com', 'sophie123', '1995-08-14', 'Mikha.JPG', NULL, 'user', '09234567890'),
(2, 'John', 'Doe', 'jdoe', 'jdoe@gmail.com', 'Test123!', '2015-01-01', 'Sheena.JPG', NULL, 'admin', '09125376131'),
(3, 'Jane', 'Air', 'janeair', 'janeair@gmail.com', 'jane123', '2018-01-03', 'Gwen.JPG', NULL, 'user', '09517829423'),
(4, 'Bill', 'Gates', 'billgates', 'billgates@gmail.com', 'bill123', '2017-03-02', 'maloi.JPG', NULL, 'user', '09135782811'),
(6, 'lala', 'doe', 'laladoe', 'laladoe@gmail.com', 'testing123!', '0000-00-00', 'Colet.JPG', NULL, '', '+6391234567');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attachments`
--
ALTER TABLE `attachments`
  ADD PRIMARY KEY (`attachmentID`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`commentID`);

--
-- Indexes for table `follows`
--
ALTER TABLE `follows`
  ADD PRIMARY KEY (`followID`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`notificationID`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`postID`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`ratingID`);

--
-- Indexes for table `savedbookmarks`
--
ALTER TABLE `savedbookmarks`
  ADD PRIMARY KEY (`bookmarkID`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`tagID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attachments`
--
ALTER TABLE `attachments`
  MODIFY `attachmentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `commentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `follows`
--
ALTER TABLE `follows`
  MODIFY `followID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `notificationID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `postID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `ratingID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `savedbookmarks`
--
ALTER TABLE `savedbookmarks`
  MODIFY `bookmarkID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `tagID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
