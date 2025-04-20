-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 20, 2025 at 11:13 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `description`) VALUES
(1, 'Technology', 'Latest gadgets, app reviews, coding tutorials, tech news, AI tools.'),
(2, 'Travel', 'Destination guides, travel tips, personal travel stories.'),
(3, 'Food &amp; Recipes', 'Easy recipes, restaurant reviews, food photography.'),
(4, 'Lifestyle', 'Productivity, wellness, daily routines, minimalism.'),
(5, 'Personal Development / Motivation', 'Goal setting, time management, self-improvement books.');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `thumbnail` varchar(255) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `category_id` int(11) DEFAULT NULL,
  `author_id` int(11) DEFAULT NULL,
  `is_featured` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `body`, `thumbnail`, `date_time`, `category_id`, `author_id`, `is_featured`) VALUES
(1, 'The Rise of Artificial Intelligence', 'Artificial Intelligence has rapidly evolved from a niche concept in science fiction to a powerful force shaping our everyday lives. From voice assistants like Siri and Alexa to complex algorithms powering medical diagnostics, AI is revolutionizing the way we live and work. This post explores the journey of AI, its current impact across industries, and what the future might hold as machines become more intelligent and autonomous.', '17451388711688446664blog17.jpg', '2025-04-20 08:47:51', 1, 1, 1),
(2, 'Top 10 Must-Visit Places in Europe', 'Europe is a continent rich in culture, history, and breathtaking landscapes. Whether you&#39;re a fan of romantic cities, ancient architecture, or natural wonders, there’s something for every traveler. In this blog post, we take you through ten of the most stunning destinations in Europe, each offering a unique experience—from the charming streets of Paris to the scenic fjords of Norway. This list is perfect for planning your next vacation or simply dreaming about future adventures.', '17451389471688447488blog35.jpg', '2025-04-20 08:49:07', 3, 2, 0),
(3, ' 5 Easy Recipes for Busy Weeknights', 'After a long, tiring day, cooking might feel like the last thing you want to do—but it doesn&#39;t have to be complicated. In this post, we share five delicious and simple recipes that require minimal time and ingredients. Perfect for students, professionals, or anyone short on time, these recipes are both satisfying and quick to prepare. Think 20-minute pasta, one-pan chicken dishes, and healthy stir-frys—all with step-by-step instructions to make your evenings stress-free.&#13;&#10;&#13;&#10;', '17451390271688448091blog87.jpg', '2025-04-20 08:50:27', 3, 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `is_admin` tinyint(1) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `username`, `email`, `password`, `avatar`, `is_admin`, `created_at`) VALUES
(1, 'Kamran', 'Baig', 'kamranbaig627', 'kbmughal456@gmail.com', '$2y$10$v0qe6s2lyjyC9tbF8PPpMuUEKPO2ue.J6Ywn55KN5YpDj.k5tjIS2', '1745067508me.jpg', 1, '2025-04-19 12:58:28'),
(2, 'Ali', 'Khan', 'alikhan123', 'alikhan123@gmail.com', '$2y$10$kmpDvTwfKxEHEfAKunll5.VaUd.kiBcY.1Pl6TVqzBh6aEqD3EYPO', '1745138620av2.jpg', 0, '2025-04-20 08:43:40'),
(3, 'Sana', 'Ahmad', 'sanaahmad123', 'sanaahmad123@gmail.com', '$2y$10$n2euy3jvjjxX8OEJxp9Q2OJu1fXp20/tJD8M.doy/uoIGcS.j0rbO', '1745138688av1.jpg', 0, '2025-04-20 08:44:48'),
(4, 'umar', 'raza', 'umarraza123', 'umarraza123@gmail.com', '$2y$10$JBVQ3P4Es1RaQ8x2nvt7D.KyFp017QqQMUNLffe8bzEgc1M2zGzFC', '1745138735av2.jpg', 0, '2025-04-20 08:45:35'),
(5, 'Ayesha', 'tariq', 'ayeshatariq123', 'ayeshatariq123@gmail.com', '$2y$10$Y2b3F6sZDHA5HY7mPiYgp.EFYBe/rEloLA8a3FaapyL3KqxyRjrzC', '1745138779av1.jpg', 0, '2025-04-20 08:46:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `author_id` (`author_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `posts_ibfk_2` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
