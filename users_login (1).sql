-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 16, 2021 at 11:08 AM
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
-- Indexes for table `users_login`
--
ALTER TABLE `users_login`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users_login`
--
ALTER TABLE `users_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
