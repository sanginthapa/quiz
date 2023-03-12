-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 10, 2023 at 01:18 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quiz`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_user`
--

CREATE TABLE `admin_user` (
  `admin_id` int(11) UNSIGNED NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin_user`
--

INSERT INTO `admin_user` (`admin_id`, `username`, `email`, `password`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'admin', 'admin@admin.com', 'admin@123', '2023-03-10 00:00:00', '2023-03-10 13:15:46', '2023-03-10 13:15:46');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2023-03-10-012735', 'App\\Database\\Migrations\\AdminUsers', 'default', 'App', 1678450511, 1),
(2, '2023-03-10-012800', 'App\\Database\\Migrations\\StudentsTable', 'default', 'App', 1678450512, 1),
(3, '2023-03-10-012820', 'App\\Database\\Migrations\\QuizSessionTable', 'default', 'App', 1678450512, 1),
(4, '2023-03-10-012847', 'App\\Database\\Migrations\\QuizQuestions', 'default', 'App', 1678450512, 1),
(5, '2023-03-10-012903', 'App\\Database\\Migrations\\OptionsTable', 'default', 'App', 1678450512, 1),
(6, '2023-03-10-012931', 'App\\Database\\Migrations\\AttemptsTable', 'default', 'App', 1678450513, 1);

-- --------------------------------------------------------

--
-- Table structure for table `options_table`
--

CREATE TABLE `options_table` (
  `option_id` int(11) UNSIGNED NOT NULL,
  `question_id` int(11) UNSIGNED NOT NULL,
  `option_name` text NOT NULL,
  `is_correct` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `options_table`
--

INSERT INTO `options_table` (`option_id`, `question_id`, `option_name`, `is_correct`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Madrid', 1, NULL, NULL, NULL),
(2, 1, 'Barcelona', 0, NULL, NULL, NULL),
(3, 1, 'Seville', 0, NULL, NULL, NULL),
(4, 1, 'Valencia', 0, NULL, NULL, NULL),
(5, 2, 'Green', 1, NULL, NULL, NULL),
(6, 2, 'Red', 0, NULL, NULL, NULL),
(7, 2, 'Yellow', 0, NULL, NULL, NULL),
(8, 2, 'Purple', 0, NULL, NULL, NULL),
(9, 3, 'Atlantic', 0, NULL, NULL, NULL),
(10, 3, 'Pacific', 1, NULL, NULL, NULL),
(11, 3, 'Indian', 0, NULL, NULL, NULL),
(12, 3, 'Arctic', 0, NULL, NULL, NULL),
(13, 4, 'Tokyo', 1, NULL, NULL, NULL),
(14, 4, 'Seoul', 0, NULL, NULL, NULL),
(15, 4, 'Beijing', 0, NULL, NULL, NULL),
(16, 4, 'Shanghai', 0, NULL, NULL, NULL),
(17, 5, 'Rupee', 1, NULL, NULL, NULL),
(18, 5, 'Yen', 0, NULL, NULL, NULL),
(19, 5, 'Dollar', 0, NULL, NULL, NULL),
(20, 5, 'Euro', 0, NULL, NULL, NULL),
(21, 6, 'Potassium', 1, NULL, NULL, NULL),
(22, 6, 'Phosphorus', 0, NULL, NULL, NULL),
(23, 6, 'Sodium', 0, NULL, NULL, NULL),
(24, 6, 'Calcium', 0, NULL, NULL, NULL),
(25, 7, 'Tiger', 1, NULL, NULL, NULL),
(26, 7, 'Giraffe', 0, NULL, NULL, NULL),
(27, 7, 'Zebra', 0, NULL, NULL, NULL),
(28, 7, 'Leopard', 0, NULL, NULL, NULL),
(29, 8, 'Piano', 1, NULL, NULL, NULL),
(30, 8, 'Guitar', 0, NULL, NULL, NULL),
(31, 8, 'Drums', 0, NULL, NULL, NULL),
(32, 8, 'Violin', 0, NULL, NULL, NULL),
(33, 9, 'Egypt', 1, NULL, NULL, NULL),
(34, 9, 'China', 0, NULL, NULL, NULL),
(35, 9, 'Brazil', 0, NULL, NULL, NULL),
(36, 9, 'Mexico', 0, NULL, NULL, NULL),
(37, 10, 'Blue', 1, NULL, NULL, NULL),
(38, 10, 'Red', 0, NULL, NULL, NULL),
(39, 10, 'Green', 0, NULL, NULL, NULL),
(40, 10, 'Yellow', 0, NULL, NULL, NULL),
(41, 11, 'Clock', 1, NULL, NULL, NULL),
(42, 11, 'Calculator', 0, NULL, NULL, NULL),
(43, 11, 'Computer', 0, NULL, NULL, NULL),
(44, 11, 'Book', 0, NULL, NULL, NULL),
(45, 12, 'Coconut', 1, NULL, NULL, NULL),
(46, 12, 'Banana', 0, NULL, NULL, NULL),
(47, 12, 'Grapes', 0, NULL, NULL, NULL),
(48, 12, 'Watermelon', 0, NULL, NULL, NULL),
(49, 13, 'Programmer', 1, NULL, NULL, NULL),
(50, 13, 'Doctor', 0, NULL, NULL, NULL),
(51, 13, 'Chef', 0, NULL, NULL, NULL),
(52, 13, 'Artist', 0, NULL, NULL, NULL),
(53, 14, 'Tennis', 1, NULL, NULL, NULL),
(54, 14, 'Basketball', 0, NULL, NULL, NULL),
(55, 14, 'Baseball', 0, NULL, NULL, NULL),
(56, 14, 'Football', 0, NULL, NULL, NULL),
(57, 15, 'Bird', 1, NULL, NULL, NULL),
(58, 15, 'Fish', 0, NULL, NULL, NULL),
(59, 15, 'Lion', 0, NULL, NULL, NULL),
(60, 15, 'Elephant', 0, NULL, NULL, NULL),
(61, 16, 'Brasília', 1, NULL, NULL, NULL),
(62, 16, 'São Paulo', 0, NULL, NULL, NULL),
(63, 16, 'Rio de Janeiro', 0, NULL, NULL, NULL),
(64, 16, 'Buenos Aires', 0, NULL, NULL, NULL),
(65, 17, 'Salmon', 1, NULL, NULL, NULL),
(66, 17, 'Tuna', 0, NULL, NULL, NULL),
(67, 17, 'Trout', 0, NULL, NULL, NULL),
(68, 17, 'Shrimp', 0, NULL, NULL, NULL),
(69, 18, 'Neon', 0, NULL, NULL, NULL),
(70, 18, 'Sodium', 1, NULL, NULL, NULL),
(71, 18, 'Nitrogen', 0, NULL, NULL, NULL),
(72, 18, 'Nickel', 0, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `question_attempts`
--

CREATE TABLE `question_attempts` (
  `attempt_id` int(11) UNSIGNED NOT NULL,
  `student_id` int(11) UNSIGNED NOT NULL,
  `question_id` int(11) UNSIGNED NOT NULL,
  `option_id` int(11) NOT NULL,
  `session_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `delete_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `quiz_questions`
--

CREATE TABLE `quiz_questions` (
  `question_id` int(11) UNSIGNED NOT NULL,
  `question` text NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `quiz_questions`
--

INSERT INTO `quiz_questions` (`question_id`, `question`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Capital of Spain', NULL, NULL, NULL),
(2, 'Color of the grass', NULL, NULL, NULL),
(3, 'Name of the largest ocean on Earth', NULL, NULL, NULL),
(4, 'Capital of Japan?', NULL, NULL, NULL),
(5, 'Currency of India?', NULL, NULL, NULL),
(6, 'Element with symbol K?', NULL, NULL, NULL),
(7, 'Animal with stripes?', NULL, NULL, NULL),
(8, 'Instrument with black and white keys?', NULL, NULL, NULL),
(9, 'Country famous for pyramids?', NULL, NULL, NULL),
(10, 'Color of the ocean?', NULL, NULL, NULL),
(11, 'An object that tells time?', NULL, NULL, NULL),
(12, 'A fruit with a hard shell?', NULL, NULL, NULL),
(13, 'A person who writes code?', NULL, NULL, NULL),
(14, 'A sport with a net?', NULL, NULL, NULL),
(15, 'An animal that flies?', NULL, NULL, NULL),
(16, 'Capital of Brazil?', NULL, NULL, NULL),
(17, 'Type of fish?', NULL, NULL, NULL),
(18, 'Element with symbol \"Na\"?', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `quiz_sessions`
--

CREATE TABLE `quiz_sessions` (
  `session_id` int(10) UNSIGNED NOT NULL,
  `student_id` int(10) UNSIGNED DEFAULT NULL,
  `started_at` datetime NOT NULL DEFAULT '2023-03-10 12:15:12',
  `ended_at` datetime DEFAULT NULL,
  `score` int(10) UNSIGNED DEFAULT NULL,
  `is_completed` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `students_table`
--

CREATE TABLE `students_table` (
  `student_id` int(11) UNSIGNED NOT NULL,
  `student_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_user`
--
ALTER TABLE `admin_user`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `options_table`
--
ALTER TABLE `options_table`
  ADD PRIMARY KEY (`option_id`),
  ADD KEY `options_table_question_id_foreign` (`question_id`);

--
-- Indexes for table `question_attempts`
--
ALTER TABLE `question_attempts`
  ADD PRIMARY KEY (`attempt_id`);

--
-- Indexes for table `quiz_questions`
--
ALTER TABLE `quiz_questions`
  ADD PRIMARY KEY (`question_id`);

--
-- Indexes for table `quiz_sessions`
--
ALTER TABLE `quiz_sessions`
  ADD PRIMARY KEY (`session_id`),
  ADD KEY `quiz_sessions_student_id_foreign` (`student_id`);

--
-- Indexes for table `students_table`
--
ALTER TABLE `students_table`
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `student_id` (`student_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_user`
--
ALTER TABLE `admin_user`
  MODIFY `admin_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `options_table`
--
ALTER TABLE `options_table`
  MODIFY `option_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `question_attempts`
--
ALTER TABLE `question_attempts`
  MODIFY `attempt_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `quiz_questions`
--
ALTER TABLE `quiz_questions`
  MODIFY `question_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `quiz_sessions`
--
ALTER TABLE `quiz_sessions`
  MODIFY `session_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `students_table`
--
ALTER TABLE `students_table`
  MODIFY `student_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `options_table`
--
ALTER TABLE `options_table`
  ADD CONSTRAINT `options_table_question_id_foreign` FOREIGN KEY (`question_id`) REFERENCES `quiz_questions` (`question_id`);

--
-- Constraints for table `quiz_sessions`
--
ALTER TABLE `quiz_sessions`
  ADD CONSTRAINT `quiz_sessions_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students_table` (`student_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
