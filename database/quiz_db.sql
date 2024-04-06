-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 06, 2024 at 04:21 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quiz_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `forget_password`
--

CREATE TABLE `forget_password` (
  `id` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `temp_key` varchar(200) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mcqs`
--

CREATE TABLE `mcqs` (
  `id` int(11) NOT NULL,
  `question` text DEFAULT NULL,
  `option1` text DEFAULT NULL,
  `option2` text DEFAULT NULL,
  `option3` text DEFAULT NULL,
  `option4` text DEFAULT NULL,
  `difficulty` varchar(200) DEFAULT NULL,
  `correct_ans` text DEFAULT NULL,
  `marks` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mcqs`
--

INSERT INTO `mcqs` (`id`, `question`, `option1`, `option2`, `option3`, `option4`, `difficulty`, `correct_ans`, `marks`) VALUES
(1, 'Question 1 from db', 'option 1', 'option 2', 'optioon3', 'option4 ', 'easy', '1', 1),
(2, 'q2', 'o1', 'o2', 'o3', 'o4', 'easy', '1', 1),
(3, 'q3', 'o1', 'o2', 'o3', 'o4', 'easy', '1', 1),
(4, 'q4', 'o1', 'o2', 'o3', 'o4', 'easy', '1', 1),
(5, 'q5', 'o1', 'o2', 'o3', 'o4', 'easy', '1', 1),
(6, 'q6', 'o1', 'o2', 'o3', 'o4', 'easy', '1', 1),
(7, 'q7', 'o1', 'o2', 'o3', 'o4', 'easy', '1', 1),
(8, 'q8', 'o1', 'o2', 'o3', 'o4', 'easy', '1', 1),
(9, 'q9', 'o1', 'o2', 'o3', 'o4', 'easy', '1', 1),
(10, 'q10', 'o1', 'o2', 'o3', 'o4', 'easy', '1', 1),
(11, 'q11', 'o1', 'o2', 'o3', 'o4', 'easy', '1', 1),
(12, 'q12', 'o1', 'o2', 'o3', 'o4', 'easy', '1', 1),
(13, 'q13', 'o1', 'o2', 'o3', 'o4', 'easy', '1', 1),
(14, 'q14', 'o1', 'o2', 'o3', 'o4', 'easy', '1', 1),
(15, 'q15', 'o1', 'o2', '', 'o4', 'easy', '1', 1),
(16, 'q16', 'o1', 'o2', 'o3', 'o4', 'easy', '1', 1),
(17, 'q17', 'o1', 'o2', 'o3', 'o4', 'easy', '1', 1),
(18, 'q18', 'o1', 'o2', 'o3', 'o4', 'easy', '1', 1),
(19, 'q19', 'o1', 'o2', 'o3', 'o4', 'medium', '1', 3),
(20, 'q20', 'o1', 'o2', 'o3', 'o4', 'medium', '1', 3),
(21, 'q21', 'o1', 'o2', 'o3', 'o4', 'medium', '1', 3),
(22, 'q22', 'o1', 'o2', 'o3', 'o4', 'easy', '1', 1),
(23, 'q23', 'o1', 'o2', 'o3', 'o4', 'easy', '1', 1),
(24, 'q24', 'o1', 'o2', 'o3', 'o4', 'easy', '1', 1),
(25, 'q25', 'o1', 'o2', 'o3', 'o4', 'medium', '1', 3),
(26, 'q26', 'o1', 'o2', 'o3', 'o4', 'medium', '1', 3),
(27, 'q27', 'o1', 'o2', 'o3', 'o4', 'medium', '1', 3),
(28, 'q28', 'o1', 'o2', 'o3', 'o4', 'medium', '1', 3),
(29, 'q29', 'o1', 'o2', 'o3', 'o4', 'medium', '1', 3),
(30, 'q30', 'o1', 'o2', 'o3', 'o4', 'medium', '1', 3),
(31, 'q31', 'o1', 'o2', 'o3', 'o4', 'medium', '1', 3),
(32, 'q32', 'o1', 'o2', 'o3', 'o4', 'medium', '1', 3),
(33, 'q33', 'o1', 'o2', 'o3', 'o4', 'hard', '1', 5),
(34, 'q34', 'o1', 'o2', 'o3', 'o4', 'hard', '1', 5),
(35, 'q35', 'o1', 'o2', 'o3', 'o4', 'hard', '1', 5),
(36, 'q36', 'o1', 'o2', 'o3', 'o4', 'hard', '1', 5),
(37, 'q37', 'o1', 'o2', 'o3', 'o4', 'hard', '1', 5),
(38, 'q38', 'o1', 'o2', 'o3', 'o4', 'hard', '1', 5);

-- --------------------------------------------------------

--
-- Table structure for table `saved_questions`
--

CREATE TABLE `saved_questions` (
  `id` int(11) NOT NULL,
  `question_id` int(11) DEFAULT NULL,
  `student_id` int(11) DEFAULT NULL,
  `saved_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(300) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(30) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `city` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mcqs`
--
ALTER TABLE `mcqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `saved_questions`
--
ALTER TABLE `saved_questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mcqs`
--
ALTER TABLE `mcqs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `saved_questions`
--
ALTER TABLE `saved_questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
