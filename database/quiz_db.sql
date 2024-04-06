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
(1, 'What is the chemical symbol for water?', 'H2O', 'CO2', 'NaCl', 'O2', 'easy', '1', 1),
(2, 'Which gas do plants absorb during photosynthesis?', 'Carbon Dioxide', 'Oxygen', 'Nitrogen', 'Hydrogen', 'easy', '1', 1),
(3, 'What is the smallest unit of matter?', 'Atom', 'Molecule', 'Cell', 'Proton', 'easy', '1', 1),
(4, 'Which planet is known as the Red Planet?', 'Mars', 'Venus', 'Jupiter', 'Saturn', 'easy', '1', 1),
(5, 'What is the powerhouse of the cell?', 'Mitochondria', 'Nucleus', 'Endoplasmic Reticulum', 'Golgi Apparatus', 'medium', '1', 3),
(6, 'What is the process by which plants make their own food called?', 'Photosynthesis', 'Respiration', 'Transpiration', 'Fermentation', 'medium', '1', 3),
(7, 'What is the chemical symbol for gold?', 'Au', 'Ag', 'Fe', 'Cu', 'medium', '1', 3),
(8, 'What is the main gas that makes up the Earth’s atmosphere?', 'Nitrogen', 'Oxygen', 'Carbon Dioxide', 'Argon', 'medium', '1', 3),
(9, 'Which scientist is credited with the discovery of gravity?', 'Isaac Newton', 'Albert Einstein', 'Galileo Galilei', 'Nikola Tesla', 'medium', '1', 3),
(10, 'What is the chemical symbol for iron?', 'Fe', 'Au', 'Ag', 'Cu', 'medium', '1', 3),
(11, 'What is the largest organ in the human body?', 'Skin', 'Liver', 'Heart', 'Brain', 'hard', '1', 5),
(12, 'Which gas is responsible for the Earth’s ozone layer?', 'Ozone', 'Carbon Dioxide', 'Oxygen', 'Nitrogen', 'hard', '1', 5),
(13, 'What is the chemical symbol for silver?', 'Ag', 'Au', 'Fe', 'Cu', 'hard', '1', 5),
(14, 'What is the chemical process of burning called?', 'Combustion', 'Evaporation', 'Oxidation', 'Decomposition', 'hard', '1', 5),
(15, 'What is the speed of light in a vacuum?', '299,792,458 meters per second', '300,000,000 meters per second', '280,000,000 meters per second', '350,000,000 meters per second', 'hard', '1', 5),
(16, 'Sample Question 16', 'Option 1', 'Option 2', 'Option 3', 'Option 4', 'easy', '1', 1),
(17, 'Sample Question 17', 'Option 1', 'Option 2', 'Option 3', 'Option 4', 'easy', '1', 1),
(18, 'Sample Question 18', 'Option 1', 'Option 2', 'Option 3', 'Option 4', 'easy', '1', 1),
(19, 'Sample Question 19', 'Option 1', 'Option 2', 'Option 3', 'Option 4', 'easy', '1', 1),
(20, 'Sample Question 20', 'Option 1', 'Option 2', 'Option 3', 'Option 4', 'easy', '1', 1),
(21, 'Sample Question 21', 'Option 1', 'Option 2', 'Option 3', 'Option 4', 'easy', '1', 1),
(22, 'Sample Question 22', 'Option 1', 'Option 2', 'Option 3', 'Option 4', 'easy', '1', 1),
(23, 'Sample Question 23', 'Option 1', 'Option 2', 'Option 3', 'Option 4', 'easy', '1', 1),
(24, 'Sample Question 24', 'Option 1', 'Option 2', 'Option 3', 'Option 4', 'easy', '1', 1),
(25, 'Sample Question 25', 'Option 1', 'Option 2', 'Option 3', 'Option 4', 'medium', '1', 3),
(26, 'Sample Question 26', 'Option 1', 'Option 2', 'Option 3', 'Option 4', 'medium', '1', 3),
(27, 'Sample Question 27', 'Option 1', 'Option 2', 'Option 3', 'Option 4', 'medium', '1', 3),
(28, 'Sample Question 28', 'Option 1', 'Option 2', 'Option 3', 'Option 4', 'medium', '1', 3),
(29, 'Sample Question 29', 'Option 1', 'Option 2', 'Option 3', 'Option 4', 'medium', '1', 3),
(30, 'Sample Question 30', 'Option 1', 'Option 2', 'Option 3', 'Option 4', 'medium', '1', 3),
(31, 'Sample Question 31', 'Option 1', 'Option 2', 'Option 3', 'Option 4', 'medium', '1', 3),
(32, 'Sample Question 32', 'Option 1', 'Option 2', 'Option 3', 'Option 4', 'medium', '1', 3),
(33, 'Sample Question 33', 'Option 1', 'Option 2', 'Option 3', 'Option 4', 'hard', '1', 5),
(34, 'Sample Question 34', 'Option 1', 'Option 2', 'Option 3', 'Option 4', 'hard', '1', 5),
(35, 'Sample Question 35', 'Option 1', 'Option 2', 'Option 3', 'Option 4', 'hard', '1', 5),
(36, 'Sample Question 36', 'Option 1', 'Option 2', 'Option 3', 'Option 4', 'hard', '1', 5),
(37, 'Sample Question 37', 'Option 1', 'Option 2', 'Option 3', 'Option 4', 'hard', '1', 5),
(38, 'Sample Question 38', 'Option 1', 'Option 2', 'Option 3', 'Option 4', 'hard', '1', 5),
(39, 'Sample Question 39', 'Option 1', 'Option 2', 'Option 3', 'Option 4', 'hard', '1', 5),
(40, 'Sample Question 40', 'Option 1', 'Option 2', 'Option 3', 'Option 4', 'hard', '1', 5);

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
