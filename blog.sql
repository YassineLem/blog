-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 07, 2024 at 03:00 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

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
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `content` varchar(250) NOT NULL,
  `user` int(11) NOT NULL,
  `created_at` date NOT NULL,
  `posts` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `content`, `user`, `created_at`, `posts`) VALUES
(16, '<p>c\'est utile</p><p>&nbsp;</p>', 29, '2024-06-05', 4),
(17, '<p>c\'est future</p>', 29, '2024-06-07', 4);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `topic_id` int(11) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `published` tinyint(4) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `topic_id`, `title`, `image`, `body`, `published`, `created_at`) VALUES
(1, 29, 1, 'The Future of AI', 'ai_future.jpeg', 'Discussion about the future advancements in AI.', 1, '2024-06-07 10:00:00'),
(2, 29, 1, '5G Technology', '5g_tech.jpeg', 'How 5G will change the world.', 1, '2024-06-07 11:00:00'),
(3, 29, 1, 'Blockchain Basics', 'Blockchain_Basics.jpg', 'Understanding the fundamentals of blockchain technology.', 1, '2024-06-07 12:00:00'),
(4, 29, 1, 'Smart Homes', 'Smart Homes.jpeg', 'The rise of smart home technology.', 1, '2024-06-07 13:00:00'),
(5, 29, 1, 'Quantum Computing', 'Quantum Computing.jpeg', 'An introduction to quantum computing.', 1, '2024-06-07 14:00:00'),
(6, 1, 2, 'Healthy Eating', 'Healthy Eating.jpeg', 'Tips for a balanced diet.', 1, '2024-06-07 15:00:00'),
(7, 26, 2, 'Mental Health Awareness', 'mental_health.png', 'The importance of mental health.', 1, '2024-06-07 16:00:00'),
(8, 26, 2, 'Exercise Benefits', 'exercise.png', 'How regular exercise improves health.', 1, '2024-06-07 17:00:00'),
(9, 26, 2, 'Meditation Techniques', 'meditation.jpeg', 'Different techniques for meditation.', 1, '2024-06-07 18:00:00'),
(10, 26, 2, 'Sleep Hygiene', 'sleep_hygiene.png', 'Improving sleep quality.', 1, '2024-06-07 19:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE `topics` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`id`, `name`, `description`) VALUES
(1, 'Technology', 'General advancements and innovations in technology.'),
(2, 'Health', 'Topics related to physical and mental well-being.');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `admin` tinyint(4) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `admin`, `username`, `email`, `password`, `created_at`) VALUES
(26, 1, 'hamza', 'hamza@gmail.com', '$2y$10$gfldmUN6lAVo4GMy1utHC.batGIzyfBJlvSqMDKovMty08/LdC3PC', '2021-04-26 16:09:59'),
(27, 1, 'patel', 'patel@patel.com', '$2y$10$7V/XHQWKeY/2hSEkqgkJZOnwra0c7ZfdNV6LNWnn/23BRQ.WC2br.', '2021-04-26 22:03:12'),
(28, 0, 'yassine', 'yassine.lem99@gmail.com', '$2y$10$ry1kHbOBYbQ5KodeQSFq3efE9f3nOTFIxHeugpLbpyc1vPvWenxn6', '2024-06-03 11:18:43'),
(29, 0, 'yassine', 'yassine.lem88@gmail.com', '$2y$10$gfldmUN6lAVo4GMy1utHC.batGIzyfBJlvSqMDKovMty08/LdC3PC', '2024-06-03 11:32:20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user` (`user`),
  ADD KEY `posts` (`posts`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `topic_id` (`topic_id`);

--
-- Indexes for table `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

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
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `topics`
--
ALTER TABLE `topics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`user`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`posts`) REFERENCES `posts` (`id`);

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`topic_id`) REFERENCES `topics` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
