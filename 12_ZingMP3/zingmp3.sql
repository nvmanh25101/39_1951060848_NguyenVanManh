-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 05, 2022 at 02:32 AM
-- Server version: 5.7.33
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zingmp3`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `gender` tinyint(1) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `level` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`, `image`, `gender`, `phone`, `level`) VALUES
(1, 'admin', 'admin@gmail.com', '$2y$10$HlolXs97T2oBvYt2WWlZP.r/ieGfzuZZY9yepzcI4eVA5.KecEKjO', 'admin.jpg', 1, '0123456789', 1),
(3, 'Đỗ Phương', 'phuongnn@gmail.com', '$2y$10$.yy.pj/HN5dFnmrd6AvqcOV6Ki5Zu6vYVGx2DMXA1O4NYdGVjbSYS', 'admin_1640796988.jpg', 0, '0244142142', 0);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `image` varchar(254) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `image`) VALUES
(2, 'Nhạc Việt', 'category_1640529639.jpg'),
(3, 'Nhạc Âu Mỹ', 'category_1640623549.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `playlists`
--

CREATE TABLE `playlists` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `playlists`
--

INSERT INTO `playlists` (`id`, `name`, `image`) VALUES
(1, 'Nhạc Trẻ Gây Nghiện', 'playlist_1641117830.jpg'),
(2, '100% Gây Nghiện', 'playlist_1641197875.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `playlist_song`
--

CREATE TABLE `playlist_song` (
  `playlist_id` int(11) NOT NULL,
  `song_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `playlist_song`
--

INSERT INTO `playlist_song` (`playlist_id`, `song_id`, `created_at`) VALUES
(2, 1, '2022-01-03 08:54:10');

-- --------------------------------------------------------

--
-- Table structure for table `saved_songs`
--

CREATE TABLE `saved_songs` (
  `user_id` int(11) NOT NULL,
  `song_id` int(11) NOT NULL,
  `saved_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `songs`
--

CREATE TABLE `songs` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `image` varchar(255) NOT NULL,
  `audio` varchar(255) NOT NULL,
  `lyric` text NOT NULL,
  `vocalist` varchar(200) NOT NULL,
  `category_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `songs`
--

INSERT INTO `songs` (`id`, `name`, `image`, `audio`, `lyric`, `vocalist`, `category_id`, `admin_id`, `created_at`) VALUES
(1, 'Past Lives', 'admin_1641111650.jpg', 'song_1641111650.mp3', 'Past lives couldn\'t ever hold me down\r\nLost love is sweeter when it\'s finally found\r\nI\'ve got the strangest feeling\r\nThis isn\'t our first time around\r\nPast lives couldn\'t ever come between us\r\nSome time the dreamers finally wake up\r\nDon\'t wake me I\'m not dreaming\r\nDon\'t wake me I\'m not dreaming', 'SapientDream', 3, 1, '2022-01-02 08:20:50');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `image` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `token_verification` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `image`, `email`, `password`, `token`, `status`, `token_verification`) VALUES
(3, 'Nguyễn Mạnh', 'user_1641313634.jpg', 'nvmanh25101@gmail.com', '$2y$10$lMUBwClnPWiGVG2qpy3ule/fMdwky8LurO3eXbRIn.vv38WHqZm0e', NULL, 1, '61d47562b77791641313634');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `playlists`
--
ALTER TABLE `playlists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `playlist_song`
--
ALTER TABLE `playlist_song`
  ADD PRIMARY KEY (`playlist_id`,`song_id`),
  ADD KEY `song_id` (`song_id`);

--
-- Indexes for table `saved_songs`
--
ALTER TABLE `saved_songs`
  ADD PRIMARY KEY (`song_id`,`user_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `songs`
--
ALTER TABLE `songs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_id` (`admin_id`),
  ADD KEY `category_id` (`category_id`);

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
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `playlists`
--
ALTER TABLE `playlists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `songs`
--
ALTER TABLE `songs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `playlist_song`
--
ALTER TABLE `playlist_song`
  ADD CONSTRAINT `playlist_song_ibfk_1` FOREIGN KEY (`playlist_id`) REFERENCES `playlists` (`id`),
  ADD CONSTRAINT `playlist_song_ibfk_2` FOREIGN KEY (`song_id`) REFERENCES `songs` (`id`);

--
-- Constraints for table `saved_songs`
--
ALTER TABLE `saved_songs`
  ADD CONSTRAINT `saved_songs_ibfk_1` FOREIGN KEY (`song_id`) REFERENCES `songs` (`id`),
  ADD CONSTRAINT `saved_songs_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `songs`
--
ALTER TABLE `songs`
  ADD CONSTRAINT `songs_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`id`),
  ADD CONSTRAINT `songs_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
