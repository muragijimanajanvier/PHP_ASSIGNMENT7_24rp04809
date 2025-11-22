-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 22, 2025 at 03:59 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fb_login_crud`
--

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `course` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `google_id` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `google_id`, `created_at`) VALUES
(1, 'admin', 'admin@example.com', '$2y$10$KIXn/3V2QZWF1i0gQZlN6e1c4sRdqQGh0pG9FQW3Ykq9xV1Jr3k5G', NULL, '2025-11-20 07:37:08'),
(2, 'muragijimana', 'mj60419256@gmail.com', '$2y$10$t9ZFC2yIFf419VkoE.HZE.Ip2ZuZrKwTphVOwD/0Ct70XTa9WmYM6', NULL, '2025-11-20 07:54:03'),
(3, 'muragijimana1', 'mj20@gmail.com', '$2y$10$Ppj.rK4nlec35wyMFR/DSe5lcOrlKgfvc20bhWdPOZ4ofU3gkx/I2', NULL, '2025-11-20 07:57:49'),
(4, 'muragijimana2', 'mj30@gmail.com', '$2y$10$kaK2Jp3Q1RObp0W5tBURTeAp.hUDUYpgYVPhlAycm7gztUScxDIDS', NULL, '2025-11-20 07:58:58'),
(5, 'muragijimana', 'baba@gmail.com', '$2y$10$y/lt47K6VlXlAXIUxogNbuq7TODeeJgPKpwAXWMRE6sDFpB3tB.4e', NULL, '2025-11-20 08:05:51'),
(6, 'muragijimana12', 'mh30@gmail.com', '$2y$10$6zt0bFPeRbThBLTvWP268uxCWPzyAghdpwtkz1pOWGKtUCa281ViC', NULL, '2025-11-20 08:42:04'),
(7, 'baba', 'babaa@gmail.com', '$2y$10$61opr2j1VVZlydVyTfdq6uQp10R2vK0deUR.7APKXBEA/tgYJgttG', NULL, '2025-11-20 09:03:31'),
(8, 'ubalide', 'ubalide12@gmail.com', '$2y$10$vFTeetUQrxI20Z7Q8Vf2p.joZKnzVoNqd77F.SYorMvoq2rcntBsS', NULL, '2025-11-20 10:49:24'),
(9, 'guser304', 'guser682@gmail.com', NULL, 'google_691f0e85c5dd8', '2025-11-20 12:50:13'),
(10, 'kimenyi', 'kimenyi@gmail.com', '$2y$10$90WsiA/SvnVjhTnbnvKaDeKKm1qyWyJFdGBHSwMwL4nW4T4UJ.oD6', NULL, '2025-11-20 19:37:41'),
(11, 'MURAGIJIMANA', 'muragijimanajanvier0@gmail.com', '$2y$10$0X669RjlkQdxXZ.GV67Gn.E8Zs.pITN6957otMm4NFWIYpcs.Yw6O', NULL, '2025-11-22 14:46:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
