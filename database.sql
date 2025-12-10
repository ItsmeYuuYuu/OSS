-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql107.infinityfree.com
-- Generation Time: Dec 10, 2025 at 09:57 AM
-- Server version: 11.4.7-MariaDB
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `if0_40410414_forum_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `content` text NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `user_id` int(11) NOT NULL,
  `thread_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `content`, `created_at`, `user_id`, `thread_id`) VALUES
(7, 'nhìn mặt thằng này như đầu trâu mặt ngựa mà bạn cũng tin được hã', '2025-12-04 21:26:04', 1, 5),
(8, 'Đẹp trai quá em raaaaaaaaa', '2025-12-04 16:30:19', 3, 6),
(11, 'a này thường trốn trại giam', '2025-12-05 21:27:59', 4, 5),
(12, 'vl nghe điêu vậy ,cẩn thận scam', '2025-12-06 02:33:10', 3, 9),
(14, 'Đại sứ thiện chí của Salonpas', '2025-12-06 05:42:59', 3, 5);

-- --------------------------------------------------------

--
-- Table structure for table `threads`
--

CREATE TABLE `threads` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `threads`
--

INSERT INTO `threads` (`id`, `title`, `content`, `image`, `created_at`, `user_id`) VALUES
(5, 'Cần info bạn nam hay đi trap mấy bạn nữ trong trường', 'Các mom ơi chuyện là mình có quen 1 anh này ở trường mình, lúc đầu ncl đi chơi nói chuyện vui vẻ lắm xong cái về ảnh trap mình, mình bùn khóc mấy ngày nay huhuhuhuhuh\r\nẢnh ở dưới 👇👇', 'uploads/img_693199d7af9d46.65644572.jpg', '2025-12-04 21:25:27', 2),
(6, 'Testing hello oanh oem', 'Chào mừng oanh oem đến với diễn đàn Việt Nam đầu hàng về công nghệ!\r\nỞ đây, chúng tôi nói về mọi thứ.', 'uploads/img_69341d21ea35f9.77069404.png', '2025-12-04 07:13:49', 1),
(8, 'Tìm người yêu dùm thằng bạn', 'Chuyện là mình có đứa bạn ế lâu năm còn bị gái lừa nữa ,nên đăng bài này muốn tìm người yêu giùm thằng bạn\r\nĐiểm mạnh: không có\r\nĐiểm yếu : Xấu trai được cái tốt bụng', 'uploads/img_69322b162c4ae8.59700264.jpg', '2025-12-04 16:45:10', 3),
(9, 'Tìm người iu đi chơi noel', '21 tuổi, 1m65, 50cm, gia trưởng cần tìm người yêu đi chơi noel, nếu hợp sẽ cân nhắc tới chuyện hôn nhân.\r\nẢnh ở dưới👇 👇', 'uploads/img_6932ca86689362.99757820.jpg', '2025-12-05 04:05:26', 3),
(10, 'skibidi dob yes yes', 'skibidiii', 'uploads/img_6937de0b32de46.99723100.webp', '2025-12-09 00:30:03', 7);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','user') DEFAULT 'user',
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `created_at`) VALUES
(1, 'admin', '$2y$10$/Tvx7cl7jlA1DjuxvRUth.N1cn2IofpAx83SUDsfrnvxFuSVcUk9S', 'admin', '2025-11-19 13:30:04'),
(2, 'maybe', '$2y$10$ZEx3zlTTh/WHKVJMr7m9heBoigb/5sLtLGS7OWBETisIAdKBK/L/O', 'user', '2025-11-19 13:33:07'),
(3, 'nghia', '$2y$10$52PThFpWCJy3VwgqTcXpguRKYzN/xhSFBSsOT7Z7ynbMb1S.tdxti', 'user', '2025-12-04 16:29:10'),
(4, 'HuyPham', '$2y$10$gPlpx6IgrMVQOFz0PKsdrOQyVtngPdtA11.V4NlZGSfL5iwoqhHx6', 'user', '2025-12-04 16:49:16'),
(6, 'skibiditoilet', '$2y$10$m6in6.ed.x9.twNncdpZjuVGkKCP7PViHNpaxWFl5q6k7cXdvOL8a', 'user', '2025-12-09 00:27:56'),
(7, 'skibiditoilet2', '$2y$10$.SjXvo2pzEPg2lhBIfRNv.GBb92dWXOSOykQnjRuTqzcrTK2zMY1e', 'user', '2025-12-09 00:28:23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `thread_id` (`thread_id`);

--
-- Indexes for table `threads`
--
ALTER TABLE `threads`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `threads`
--
ALTER TABLE `threads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`thread_id`) REFERENCES `threads` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `threads`
--
ALTER TABLE `threads`
  ADD CONSTRAINT `threads_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

