-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 21, 2021 at 08:49 AM
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
(9, 'Garden Flow', 1),
(10, 'dasdasdasdas', 1),
(11, 'sam', 1),
(12, 'jagu', 1),
(13, 'jaguss', 1),
(14, 'james', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_books`
--

CREATE TABLE `tbl_books` (
  `id` int(11) NOT NULL,
  `author` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `category` int(12) NOT NULL,
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

INSERT INTO `tbl_books` (`id`, `author`, `title`, `category`, `price`, `description`, `date_created`, `date_updated`, `status`, `image_id`, `quantity`) VALUES
(1, '9', 'Rampage', 0, 'Rampage', 'Rampage', '2021-11-15 05:09:28', '2021-11-15 05:09:28', '1', 'book-Rampage.png', 0),
(2, '4', 'test2', 0, 'test2', 'test', '2021-11-15 05:13:20', '2021-11-15 05:13:20', '1', '', 0),
(3, '1', 'Test', 0, 'Test', '123456', '2021-11-15 05:35:25', '2021-11-15 05:35:25', '1', 'book-Test.jpg', 0),
(4, '1', 'Sample', 0, 'Sample', 'Sample', '2021-11-15 05:39:50', '2021-11-15 05:39:50', '1', 'book-Sample.png', 0),
(5, '1', '123', 0, '465', '4465465', '2021-11-15 07:35:48', '2021-11-15 07:35:48', '1', 'book-123.png', 0),
(6, '5', 'Vampire Diaries', 0, '200', 'Vampire Description', '2021-11-15 09:05:45', '2021-11-15 09:05:45', '1', '', 0),
(7, '4', 'Big Bang', 0, '200', 'Big Bang Desc', '2021-11-15 09:07:01', '2021-11-15 09:07:01', '1', 'book-Big Bang.jpg', 0),
(8, '1', 'Twilight', 0, '200', 'No Desc', '2021-11-16 10:36:15', '2021-11-16 10:36:15', '1', 'book-Twilight.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `id` int(12) NOT NULL,
  `uid` int(12) NOT NULL,
  `bid` int(12) NOT NULL,
  `status` int(12) NOT NULL,
  `trans_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_cart`
--

INSERT INTO `tbl_cart` (`id`, `uid`, `bid`, `status`, `trans_date`) VALUES
(25, 11, 4, 0, '2021-11-20 19:52:52'),
(26, 11, 2, 0, '2021-11-20 19:54:33'),
(27, 11, 6, 0, '2021-11-20 20:23:58'),
(28, 11, 3, 0, '2021-11-20 20:25:54');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id` int(12) NOT NULL,
  `category` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `category`) VALUES
(1, 'romanace'),
(2, 'action');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_logs`
--

CREATE TABLE `tbl_logs` (
  `id` int(12) NOT NULL,
  `action` varchar(60) NOT NULL,
  `user` varchar(60) NOT NULL,
  `module` varchar(60) NOT NULL,
  `status` varchar(60) NOT NULL,
  `status_result` varchar(255) NOT NULL,
  `role` varchar(60) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_logs`
--

INSERT INTO `tbl_logs` (`id`, `action`, `user`, `module`, `status`, `status_result`, `role`, `date`) VALUES
(87, 'logout', 'saitama', '', 'success', 'success', 'admin', '2021-11-17 07:47:43'),
(88, 'login', 'saitama', '', 'success', 'logged in', 'admin', '2021-11-17 07:49:00'),
(89, 'create', '', '', '', '', '', '2021-11-17 08:01:53'),
(90, 'create', '', '', '', '', '', '2021-11-17 08:02:52'),
(91, 'create', 'saitama', '', '', '', 'admin', '2021-11-17 08:06:46'),
(92, 'logout', 'saitama', 'success', 'logged out', 'admin', 'Login', '2021-11-17 08:13:01'),
(93, 'login', 'saitama', 'login', 'success', 'logged in', 'admin', '2021-11-17 08:13:32'),
(94, 'logout', 'saitama', 'Login', 'success', 'logged out', 'admin', '2021-11-17 08:13:35'),
(95, 'login', 'saitama', 'login', 'success', 'logged in', 'admin', '2021-11-17 08:15:32'),
(96, 'logout', 'saitama', 'Login', 'success', 'logged out', 'admin', '2021-11-17 08:15:39'),
(97, 'login', 'saitama', 'login', 'success', 'logged in', 'admin', '2021-11-17 08:15:45'),
(98, 'create', 'saitama', 'Author', '', '', 'admin', '2021-11-17 08:16:28'),
(99, 'create', 'saitama', 'Author', '', '', 'admin', '2021-11-17 08:17:37'),
(100, 'create', 'saitama', 'Author', '', '', 'admin', '2021-11-17 08:24:02'),
(101, 'create', 'saitama', 'Author', 'failed', 'admin', 'error', '2021-11-17 08:32:16'),
(102, 'create', 'saitama', 'Author', 'success', 'true', 'admin', '2021-11-17 08:33:29'),
(103, 'logout', 'saitama', 'Login', 'success', 'logged out', 'admin', '2021-11-17 09:30:33'),
(104, 'login', 'saitama', 'login', 'success', 'logged in', 'admin', '2021-11-20 16:28:06');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_orderdetails`
--

CREATE TABLE `tbl_orderdetails` (
  `id` int(12) NOT NULL,
  `ord_lid` int(12) NOT NULL,
  `ords_id` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_orderdetails`
--

INSERT INTO `tbl_orderdetails` (`id`, `ord_lid`, `ords_id`) VALUES
(1, 13, 1),
(2, 13, 5),
(3, 13, 7),
(4, 14, 1),
(5, 14, 5),
(6, 14, 7);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_orders`
--

CREATE TABLE `tbl_orders` (
  `id` int(12) NOT NULL,
  `ord_id` varchar(255) NOT NULL,
  `ord_uid` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_orders`
--

INSERT INTO `tbl_orders` (`id`, `ord_id`, `ord_uid`, `date`) VALUES
(1, '2021112135006', '11', '2021-11-21 05:34:07'),
(2, '2021112169547', '11', '2021-11-21 06:59:50'),
(3, '2021112169547', '11', '2021-11-21 07:00:14'),
(4, '2021112169547', '11', '2021-11-21 07:00:27'),
(5, '2021112169547', '11', '2021-11-21 07:00:44'),
(6, '2021112169547', '11', '2021-11-21 07:01:07'),
(7, '2021112169547', '11', '2021-11-21 07:01:19'),
(8, '2021112169547', '11', '2021-11-21 07:01:27'),
(9, '2021112169547', '11', '2021-11-21 07:01:34'),
(10, '2021112169547', '11', '2021-11-21 07:01:54'),
(11, '2021112169547', '11', '2021-11-21 07:04:49'),
(12, '2021112169547', '11', '2021-11-21 07:05:05'),
(13, '2021112152100', '11', '2021-11-21 07:19:15'),
(14, '2021112141795', '11', '2021-11-21 07:21:18');

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
(1, 'active'),
(2, 'inactive'),
(3, 'denied'),
(4, 'review'),
(5, 'deleted'),
(6, 'out of stock'),
(7, 'borrowed');

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
  `status` int(12) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users_login`
--

INSERT INTO `users_login` (`id`, `email`, `username`, `password`, `userlevel`, `status`, `image`) VALUES
(1, 'johncarlgabuat@yahoo.com', '', '09214554370', 'admin', 0, ''),
(2, 'randolfhilarbo@gmail.com', '', 'test', 'admin', 0, ''),
(3, 'randolfhilarbo@gmail.com', '', 'test', 'admin', 0, ''),
(4, 'randolfhilarbo@gmail.com', '', 'test', 'user', 0, ''),
(5, 'randolfhilarbo@gmail.com', '', 'test', 'admin', 0, ''),
(6, 'johncarlgabuat@gmail.com', 'ren', '123456789', 'admin', 0, ''),
(7, 'rgabuat@ellickbposolutions.com', 'randy', '$2y$10$88Z9/YxWRolzSiINMfmHkeeGYfj4qagc3DuzAcf3AhwNZi2zKjnOa', 'admin', 0, ''),
(8, 'reily@gmail.com', 'rezxy', '$2y$10$q26Szjis7dn.H4gtoFhibu6DpzBfEZNFNXOokUoDN5itZm7rx2LBu', 'admin', 0, ''),
(9, 'j@ellickbposolutions.com', 'jon', '$2y$10$.TzB8FgLLWF/Vzefr0hTReIP0q/EWpWT/werbrJanUQ4YQtxFBioy', 'admin', 0, './uploads/profilejon.jpg'),
(10, 'jmas@yahoo.com', 'ron', '$2y$10$ev5GESKafThPAT7TkI6czOw0I.Ops2Zctw8401ZjPSadWTJIRwEb6', 'user', 0, './uploads/profileron.jpg'),
(11, 'acab@ellickbposolutions.com', 'saitama', '$2y$10$8nnU7vHNMSrHFuEQbk0M7.FtlTgpVAqd84tBD4OcnCcMLTdUjnWze', 'admin', 0, ''),
(12, 'jbon@ellickbposolutions.com', 'jensen', '$2y$10$JoRPZoGl2dZnZKk/lswDU.JBANBOGzCr4iTqhTNkzUz5vfBaJ44Qi', 'user', 0, './uploads/profilejensen.jpeg');

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
-- Indexes for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_logs`
--
ALTER TABLE `tbl_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_orderdetails`
--
ALTER TABLE `tbl_orderdetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_orders`
--
ALTER TABLE `tbl_orders`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_books`
--
ALTER TABLE `tbl_books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_logs`
--
ALTER TABLE `tbl_logs`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT for table `tbl_orderdetails`
--
ALTER TABLE `tbl_orderdetails`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_orders`
--
ALTER TABLE `tbl_orders`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_status`
--
ALTER TABLE `tbl_status`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users_login`
--
ALTER TABLE `users_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
