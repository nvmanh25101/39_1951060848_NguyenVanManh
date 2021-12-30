-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3306
-- Thời gian đã tạo: Th12 30, 2021 lúc 04:42 PM
-- Phiên bản máy phục vụ: 5.7.33
-- Phiên bản PHP: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `zingmp3`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
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
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`, `image`, `gender`, `phone`, `level`) VALUES
(1, 'admin', 'admin@gmail.com', '$2y$10$HlolXs97T2oBvYt2WWlZP.r/ieGfzuZZY9yepzcI4eVA5.KecEKjO', 'admin.jpg', 1, '0123456789', 1),
(3, 'Đỗ Phương', 'phuongnn@gmail.com', '$2y$10$.yy.pj/HN5dFnmrd6AvqcOV6Ki5Zu6vYVGx2DMXA1O4NYdGVjbSYS', 'admin_1640796988.jpg', 0, '0244142142', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `image` varchar(254) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`, `image`) VALUES
(2, 'Nhạc Việt', 'category_1640529639.jpg'),
(3, 'Nhạc Âu Mỹ', 'category_1640623549.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `playlists`
--

CREATE TABLE `playlists` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `playlist_song`
--

CREATE TABLE `playlist_song` (
  `playlist_id` int(11) NOT NULL,
  `song_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `saved_songs`
--

CREATE TABLE `saved_songs` (
  `user_id` int(11) NOT NULL,
  `song_id` int(11) NOT NULL,
  `saved_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `songs`
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

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `image` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `image`, `email`, `password`, `token`) VALUES
(1, 'Mạnh Nguyễn', 'user_1640768030.jpg', 'nvm@gmail.com', '$2y$10$gyvGO/HFfV.GKaVViTf4l.U//IbMaRq6qw9o.vI2QzOqbSUEcmqQe', NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Chỉ mục cho bảng `playlists`
--
ALTER TABLE `playlists`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `playlist_song`
--
ALTER TABLE `playlist_song`
  ADD PRIMARY KEY (`playlist_id`,`song_id`),
  ADD KEY `song_id` (`song_id`);

--
-- Chỉ mục cho bảng `saved_songs`
--
ALTER TABLE `saved_songs`
  ADD PRIMARY KEY (`song_id`,`user_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `songs`
--
ALTER TABLE `songs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_id` (`admin_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `playlists`
--
ALTER TABLE `playlists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `songs`
--
ALTER TABLE `songs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `playlist_song`
--
ALTER TABLE `playlist_song`
  ADD CONSTRAINT `playlist_song_ibfk_1` FOREIGN KEY (`playlist_id`) REFERENCES `playlists` (`id`),
  ADD CONSTRAINT `playlist_song_ibfk_2` FOREIGN KEY (`song_id`) REFERENCES `songs` (`id`);

--
-- Các ràng buộc cho bảng `saved_songs`
--
ALTER TABLE `saved_songs`
  ADD CONSTRAINT `saved_songs_ibfk_1` FOREIGN KEY (`song_id`) REFERENCES `songs` (`id`),
  ADD CONSTRAINT `saved_songs_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `songs`
--
ALTER TABLE `songs`
  ADD CONSTRAINT `songs_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`id`),
  ADD CONSTRAINT `songs_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
