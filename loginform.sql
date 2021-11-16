-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 16, 2021 at 11:50 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `loginform`
--

-- --------------------------------------------------------

--
-- Table structure for table `dogs`
--

CREATE TABLE `dogs` (
  `id` int(11) NOT NULL,
  `dname` varchar(255) NOT NULL,
  `breed` varchar(255) NOT NULL,
  `age` varchar(255) NOT NULL,
  `daddress` varchar(255) NOT NULL,
  `color` varchar(255) NOT NULL,
  `height` varchar(255) NOT NULL,
  `dweight` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_authors`
--

CREATE TABLE `tbl_authors` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_authors`
--

INSERT INTO `tbl_authors` (`id`, `name`, `status`) VALUES
(1, 'Johnny Sins', 1),
(2, 'Manta Mas', 1),
(3, 'Author1dasdasdas', 0),
(4, 'Christopher', 1),
(5, 'Monster Smoosh', 1),
(6, 'Author1dasdasdas', 0),
(7, 'Author1dasdasdas', 0),
(8, 'James Gooch', 0),
(9, 'Garden Flow', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_books`
--

CREATE TABLE `tbl_books` (
  `id` int(11) NOT NULL,
  `author` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `description` varchar(510) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `date_updated` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(255) NOT NULL,
  `image_id` varchar(255) NOT NULL,
  `quantity` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_books`
--

INSERT INTO `tbl_books` (`id`, `author`, `title`, `price`, `description`, `date_created`, `date_updated`, `status`, `image_id`, `quantity`) VALUES
(1, '1', 'Rampage', 'Rampage', 'Rampage', '2021-11-15 05:09:28', '2021-11-15 05:09:28', '1', 'book-Rampage.png', 0),
(2, '4', 'test2', 'test2', 'test', '2021-11-15 05:13:20', '2021-11-15 05:13:20', '1', '', 0),
(3, '1', 'Test', 'Test', '', '2021-11-15 05:35:25', '2021-11-15 05:35:25', '1', 'book-Test.png', 0),
(4, '1', 'Sample', 'Sample', 'Sample', '2021-11-15 05:39:50', '2021-11-15 05:39:50', '1', 'book-Sample.png', 0),
(5, '1', '123', '465', '4465465', '2021-11-15 07:35:48', '2021-11-15 07:35:48', '1', 'book-123.png', 0),
(6, '5', 'Vampire Diaries', '200', 'Vampire Description', '2021-11-15 09:05:45', '2021-11-15 09:05:45', '1', '', 0),
(7, '4', 'Big Bang', '200', 'Big Bang Desc', '2021-11-15 09:07:01', '2021-11-15 09:07:01', '1', 'book-Big Bang.jpg', 0),
(8, '9', 'Twilight', '200', 'No Desc', '2021-11-16 10:36:15', '2021-11-16 10:36:15', '1', 'book-Twilight.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_status`
--

CREATE TABLE `tbl_status` (
  `id` int(12) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_status`
--

INSERT INTO `tbl_status` (`id`, `type`) VALUES
(1, 'publish'),
(2, 'review'),
(3, 'sold'),
(4, 'review'),
(5, 'deleted'),
(6, 'out of stock');

-- --------------------------------------------------------

--
-- Table structure for table `users_login`
--

CREATE TABLE `users_login` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `userlevel` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users_login`
--

INSERT INTO `users_login` (`id`, `email`, `username`, `password`, `userlevel`, `status`, `image`) VALUES
(1, 'johncarlgabuat@yahoo.com', '', '09214554370', 'admin', 'active', ''),
(2, 'randolfhilarbo@gmail.com', '', 'test', 'admin', 'active', ''),
(3, 'randolfhilarbo@gmail.com', '', 'test', 'admin', 'active', ''),
(4, 'randolfhilarbo@gmail.com', '', 'test', 'user', 'disable', ''),
(5, 'randolfhilarbo@gmail.com', '', 'test', 'admin', 'active', ''),
(6, 'johncarlgabuat@gmail.com', 'ren', '123456789', 'admin', 'active', ''),
(7, 'rgabuat@ellickbposolutions.com', 'randy', '$2y$10$88Z9/YxWRolzSiINMfmHkeeGYfj4qagc3DuzAcf3AhwNZi2zKjnOa', 'admin', 'active', ''),
(8, 'reily@gmail.com', 'rezxy', '$2y$10$q26Szjis7dn.H4gtoFhibu6DpzBfEZNFNXOokUoDN5itZm7rx2LBu', 'admin', 'active', ''),
(9, 'j@ellickbposolutions.com', 'jon', '$2y$10$.TzB8FgLLWF/Vzefr0hTReIP0q/EWpWT/werbrJanUQ4YQtxFBioy', 'admin', 'active', './uploads/profilejon.jpg'),
(10, 'jmas@yahoo.com', 'ron', '$2y$10$ev5GESKafThPAT7TkI6czOw0I.Ops2Zctw8401ZjPSadWTJIRwEb6', 'user', 'active', './uploads/profileron.jpg'),
(11, 'acab@ellickbposolutions.com', 'saitama', '$2y$10$8nnU7vHNMSrHFuEQbk0M7.FtlTgpVAqd84tBD4OcnCcMLTdUjnWze', 'admin', 'active', ''),
(12, 'jbon@ellickbposolutions.com', 'jensen', '$2y$10$JoRPZoGl2dZnZKk/lswDU.JBANBOGzCr4iTqhTNkzUz5vfBaJ44Qi', 'user', 'active', './uploads/profilejensen.jpeg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dogs`
--
ALTER TABLE `dogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_authors`
--
ALTER TABLE `tbl_authors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_books`
--
ALTER TABLE `tbl_books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_status`
--
ALTER TABLE `tbl_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_login`
--
ALTER TABLE `users_login`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dogs`
--
ALTER TABLE `dogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_authors`
--
ALTER TABLE `tbl_authors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_books`
--
ALTER TABLE `tbl_books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_status`
--
ALTER TABLE `tbl_status`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users_login`
--
ALTER TABLE `users_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
