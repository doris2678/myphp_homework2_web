-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2025-07-16 15:24:47
-- 伺服器版本： 10.4.32-MariaDB
-- PHP 版本： 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `tieat`
--

-- --------------------------------------------------------

--
-- 資料表結構 `admin`
--

CREATE TABLE `admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `acc` text NOT NULL,
  `pw` text NOT NULL,
  `created_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `admin`
--

INSERT INTO `admin` (`id`, `acc`, `pw`, `created_time`, `updated_time`) VALUES
(1, 'admin', '1234', '2025-07-05 05:17:02', '2025-07-15 12:16:15'),
(43, 'test', '1234', '2025-07-15 14:16:02', '2025-07-16 12:23:59');

-- --------------------------------------------------------

--
-- 資料表結構 `bottom`
--

CREATE TABLE `bottom` (
  `id` int(10) UNSIGNED NOT NULL,
  `text` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `bottom`
--

INSERT INTO `bottom` (`id`, `text`) VALUES
(1, 'Copyright © 2025 Tieat. All Rights Reserved 泰好喝有限公司');

-- --------------------------------------------------------

--
-- 資料表結構 `first_img`
--

CREATE TABLE `first_img` (
  `id` int(10) UNSIGNED NOT NULL,
  `pd1` text NOT NULL,
  `pd2` text NOT NULL,
  `img` text NOT NULL,
  `sh` int(1) UNSIGNED NOT NULL,
  `created_time` date NOT NULL DEFAULT current_timestamp(),
  `updated_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `first_img`
--

INSERT INTO `first_img` (`id`, `pd1`, `pd2`, `img`, `sh`, `created_time`, `updated_time`) VALUES
(1, '芒果冰沙', '嚴選當季新鮮水果，每一口都是自然的甜美', 'drink-1.jpg', 1, '2025-07-13', '2025-07-14 12:55:00'),
(2, '經典珍珠奶茶', '香濃奶茶配上Q彈珍珠，經典不敗的好滋味', 'drink-9.jpg', 1, '2025-07-14', '2025-07-14 12:55:12'),
(5, '金桔檸檬', '新鮮金桔與檸檬完美結合，酸甜清爽，維他命C滿滿', 'drink-8.jpg', 1, '2025-07-14', '2025-07-15 14:16:52');

-- --------------------------------------------------------

--
-- 資料表結構 `items`
--

CREATE TABLE `items` (
  `id` int(10) UNSIGNED NOT NULL,
  `item_no` text NOT NULL,
  `item_name` text NOT NULL,
  `price` int(10) UNSIGNED NOT NULL,
  `cost` int(10) UNSIGNED DEFAULT NULL,
  `img` text NOT NULL,
  `sh` int(1) NOT NULL,
  `created_time` date NOT NULL DEFAULT current_timestamp(),
  `updated_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `items`
--

INSERT INTO `items` (`id`, `item_no`, `item_name`, `price`, `cost`, `img`, `sh`, `created_time`, `updated_time`) VALUES
(12, 'A-001', '茉莉綠茶', 35, 20, 'drink-3.jpg', 1, '2025-07-12', '2025-07-15 12:29:26'),
(13, 'A-002', '茉莉綠茶', 40, 20, 'drink-3.jpg', 1, '2025-07-12', '2025-07-15 12:29:26'),
(14, 'A-003', '阿薩姆紅茶', 35, 15, 'A-003.jpg', 1, '2025-07-12', '2025-07-15 12:29:26'),
(15, 'A-004', '阿薩姆紅茶', 40, 20, 'A-003.jpg', 1, '2025-07-12', '2025-07-15 12:29:26'),
(16, 'A-005', '四季春青茶', 35, 15, 'A-001.jpg', 1, '2025-07-12', '2025-07-15 12:29:26'),
(17, 'A-006', '四季春青茶', 40, 20, 'A-001.jpg', 1, '2025-07-12', '2025-07-15 12:29:26'),
(20, 'A-009', '檸檬綠', 50, 30, 'drink-4.jpg', 1, '2025-07-12', '2025-07-15 12:29:26'),
(21, 'A-010', '檸檬綠', 60, 40, 'drink-4.jpg', 1, '2025-07-12', '2025-07-15 14:17:56'),
(22, 'A-011', '梅子綠', 50, 30, 'drink-5.jpg', 1, '2025-07-12', '2025-07-15 12:29:26'),
(23, 'A-012', '梅子綠', 60, 40, 'drink-5.jpg', 1, '2025-07-12', '2025-07-15 12:29:26'),
(28, 'A-017', '養樂多綠', 50, 30, 'drink-3.jpg', 1, '2025-07-12', '2025-07-15 12:29:26'),
(34, 'A-023', '鮮柚綠', 60, 40, 'A-001.jpg', 1, '2025-07-12', '2025-07-16 12:28:33'),
(35, 'A-024', '鮮柚綠', 75, 55, 'drink-3.jpg', 1, '2025-07-12', '2025-07-16 12:28:45'),
(36, 'A-025', '奶茶', 50, 30, 'drink-2.jpg', 1, '2025-07-12', '2025-07-15 12:29:26'),
(37, 'A-026', '奶茶', 60, 40, 'drink-9.jpg', 1, '2025-07-12', '2025-07-15 12:29:26'),
(38, 'A-027', '奶綠', 50, 30, 'drink-3.jpg', 1, '2025-07-12', '2025-07-15 12:29:26'),
(39, 'A-028', '奶綠', 60, 40, 'drink-3.jpg', 1, '2025-07-12', '2025-07-15 12:29:26'),
(66, 'A-055', '檸檬汁', 55, 35, 'drink-4.jpg', 1, '2025-07-12', '2025-07-15 12:29:26'),
(67, 'A-056', '檸檬汁', 65, 45, 'drink-4.jpg', 1, '2025-07-12', '2025-07-15 12:29:26'),
(68, 'A-057', '金桔檸檬', 55, 35, 'drink-4.jpg', 1, '2025-07-12', '2025-07-15 12:29:26'),
(69, 'A-058', '金桔檸檬', 65, 45, 'drink-4.jpg', 1, '2025-07-12', '2025-07-15 12:29:26'),
(72, 'A-061', '檸檬養樂多', 65, 45, 'drink-4.jpg', 1, '2025-07-12', '2025-07-15 12:29:26'),
(73, 'A-062', '檸檬養樂多', 80, 60, 'drink-4.jpg', 1, '2025-07-12', '2025-07-15 12:29:26'),
(74, 'A-063', '葡萄柚多多', 65, 45, 'drink-4.jpg', 1, '2025-07-12', '2025-07-15 12:29:26'),
(75, 'A-064', '葡萄柚多多', 80, 60, 'drink-8.jpg', 1, '2025-07-12', '2025-07-15 12:29:26'),
(80, 'A-069', '鮮柚汁', 65, 45, 'drink-8.jpg', 1, '2025-07-12', '2025-07-15 12:29:26'),
(81, 'A-070', '鮮柚汁', 75, 55, 'drink-8.jpg', 1, '2025-07-12', '2025-07-15 12:29:26'),
(84, 'A-073', '波霸紅', 35, 15, 'drink-2.jpg', 1, '2025-07-12', '2025-07-15 12:29:26'),
(85, 'A-074', '波霸紅', 45, 25, 'drink-2.jpg', 1, '2025-07-12', '2025-07-15 12:29:26'),
(92, 'A-081', '多多綠', 40, 20, 'drink-3.jpg', 1, '2025-07-12', '2025-07-15 12:29:26'),
(93, 'A-082', '多多綠', 55, 35, 'drink-3.jpg', 1, '2025-07-12', '2025-07-15 12:29:26'),
(94, 'A-083', '多多檸檬綠', 50, 30, 'drink-3.jpg', 1, '2025-07-12', '2025-07-15 12:29:26'),
(95, 'A-084', '多多檸檬綠', 65, 45, 'drink-3.jpg', 1, '2025-07-12', '2025-07-15 12:29:26'),
(98, 'A-087', '波霸奶茶', 40, 20, 'drink-2.jpg', 1, '2025-07-12', '2025-07-15 12:29:26'),
(99, 'A-088', '波霸奶茶', 55, 35, 'drink-2.jpg', 1, '2025-07-12', '2025-07-15 12:29:26'),
(100, 'A-089', '波霸奶綠', 40, 20, 'drink-3.jpg', 1, '2025-07-12', '2025-07-15 12:29:26'),
(101, 'A-090', '波霸奶綠', 55, 35, 'drink-3.jpg', 1, '2025-07-12', '2025-07-15 12:29:26'),
(102, 'A-091', '珍珠奶茶', 40, 20, 'drink-2.jpg', 1, '2025-07-12', '2025-07-15 12:29:26'),
(103, 'A-092', '珍珠奶茶', 55, 35, 'drink-2.jpg', 1, '2025-07-12', '2025-07-15 12:29:26'),
(115, 'A-103', '芒果冰沙', 70, 50, 'drink-1.jpg', 1, '2025-07-13', '2025-07-15 12:29:26'),
(116, 'A-104', '蜂蜜檸檬茶', 50, 30, 'drink-4.jpg', 1, '2025-07-13', '2025-07-15 12:29:26');

-- --------------------------------------------------------

--
-- 資料表結構 `member`
--

CREATE TABLE `member` (
  `id` int(10) UNSIGNED NOT NULL,
  `acc` text NOT NULL,
  `pw` text NOT NULL,
  `name` text NOT NULL,
  `email` text DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `created_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `member`
--

INSERT INTO `member` (`id`, `acc`, `pw`, `name`, `email`, `birthday`, `created_time`, `updated_time`) VALUES
(1, 'doris01', '1234', '黃芯', 'dorishsh2678@gmail.com', '2000-02-02', '2025-07-05 06:14:37', '2025-07-12 07:01:06'),
(11, 'doris02', '1234', '王小美', 'doris02@test.com', '2000-01-01', '2025-07-15 13:14:56', '2025-07-15 13:14:56'),
(12, 'may', '1234', '林美美', 'may@test.com', '2002-05-01', '2025-07-15 13:16:19', '2025-07-15 13:22:52'),
(17, 'min', '1234', '張大明', 'min@test.com', '2010-01-01', '2025-07-15 14:08:18', '2025-07-15 14:08:18');

-- --------------------------------------------------------

--
-- 資料表結構 `order1`
--

CREATE TABLE `order1` (
  `id` int(10) UNSIGNED NOT NULL,
  `date1` date NOT NULL,
  `or_no` varchar(20) NOT NULL,
  `acc` text NOT NULL,
  `name` text NOT NULL,
  `amt` int(11) NOT NULL DEFAULT 0,
  `tel` varchar(20) NOT NULL,
  `created_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `order1`
--

INSERT INTO `order1` (`id`, `date1`, `or_no`, `acc`, `name`, `amt`, `tel`, `created_time`, `updated_time`) VALUES
(76, '2025-07-15', '202507150002', 'doris01', '黃芯', 190, '0912345678', '2025-07-15 13:11:52', '2025-07-15 13:11:52'),
(80, '2025-07-16', '202507160001', 'doris01', '黃芯', 175, '0955555555', '2025-07-16 12:34:49', '2025-07-16 12:34:49'),
(83, '2025-07-16', '202507160004', 'may', '林美美', 155, '0922222222', '2025-07-16 13:20:24', '2025-07-16 13:20:24'),
(85, '2025-07-16', '202507160006', 'may', '林美美', 220, '0922222222', '2025-07-16 13:21:20', '2025-07-16 13:21:20');

-- --------------------------------------------------------

--
-- 資料表結構 `order2`
--

CREATE TABLE `order2` (
  `id` int(10) UNSIGNED NOT NULL,
  `or_no` varchar(20) DEFAULT NULL,
  `item_no` text DEFAULT NULL,
  `item_name` text DEFAULT NULL,
  `price` int(10) DEFAULT 0,
  `qty` int(10) DEFAULT 0,
  `created_time` timestamp NULL DEFAULT current_timestamp(),
  `updated_time` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `order2`
--

INSERT INTO `order2` (`id`, `or_no`, `item_no`, `item_name`, `price`, `qty`, `created_time`, `updated_time`) VALUES
(136, '202507150002', 'A-006', '四季春青茶', 40, 1, '2025-07-15 13:11:52', '2025-07-15 13:11:52'),
(137, '202507150002', 'A-009', '檸檬綠', 50, 1, '2025-07-15 13:11:52', '2025-07-15 13:11:52'),
(138, '202507150002', 'A-011', '梅子綠', 50, 2, '2025-07-15 13:11:52', '2025-07-15 13:11:52'),
(146, '202507160001', 'A-001', '茉莉綠茶', 35, 1, '2025-07-16 12:34:49', '2025-07-16 12:34:49'),
(147, '202507160001', 'A-006', '四季春青茶', 40, 1, '2025-07-16 12:34:49', '2025-07-16 12:34:49'),
(148, '202507160001', 'A-009', '檸檬綠', 50, 2, '2025-07-16 12:34:49', '2025-07-16 12:34:49'),
(157, '202507160004', 'A-001', '茉莉綠茶', 35, 1, '2025-07-16 13:20:24', '2025-07-16 13:20:24'),
(158, '202507160004', 'A-003', '阿薩姆紅茶', 35, 1, '2025-07-16 13:20:24', '2025-07-16 13:20:24'),
(159, '202507160004', 'A-005', '四季春青茶', 35, 1, '2025-07-16 13:20:24', '2025-07-16 13:20:24'),
(160, '202507160004', 'A-009', '檸檬綠', 50, 1, '2025-07-16 13:20:24', '2025-07-16 13:20:24'),
(164, '202507160006', 'A-011', '梅子綠', 50, 1, '2025-07-16 13:21:20', '2025-07-16 13:21:20'),
(165, '202507160006', 'A-017', '養樂多綠', 50, 1, '2025-07-16 13:21:20', '2025-07-16 13:21:20'),
(166, '202507160006', 'A-026', '奶茶', 60, 2, '2025-07-16 13:21:20', '2025-07-16 13:21:20');

-- --------------------------------------------------------

--
-- 資料表結構 `second_img`
--

CREATE TABLE `second_img` (
  `id` int(10) UNSIGNED NOT NULL,
  `pd1` text NOT NULL,
  `pd2` text NOT NULL,
  `img` text NOT NULL,
  `sh` int(1) UNSIGNED NOT NULL,
  `created_time` date NOT NULL DEFAULT current_timestamp(),
  `updated_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `second_img`
--

INSERT INTO `second_img` (`id`, `pd1`, `pd2`, `img`, `sh`, `created_time`, `updated_time`) VALUES
(1, '珍珠奶茶', '香濃奶茶配上Q彈珍珠，經典不敗的好滋味', 'drink-2.jpg', 1, '2025-07-14', '2025-07-14 12:57:40'),
(2, '茉莉綠茶', '精選茉莉花與綠茶完美融合，清香淡雅，回甘持久', 'A-001.jpg', 0, '2025-07-14', '2025-07-15 14:17:20'),
(3, '阿薩姆紅茶', '印度阿薩姆茶葉，濃郁醇厚，香氣四溢', 'drink-7.jpg', 0, '2025-07-14', '2025-07-15 12:37:40'),
(4, '蜂蜜檸檬茶', '新鮮檸檬片搭配天然蜂蜜，酸甜清爽好滋味', 'drink-4.jpg', 1, '2025-07-14', '2025-07-14 12:56:43'),
(5, '芒果冰沙', '新鮮芒果製成，綿密冰沙口感，夏日必備清涼飲品', 'drink-1.jpg', 1, '2025-07-14', '2025-07-14 12:56:58'),
(6, '金桔檸檬', '新鮮金桔與檸檬完美結合，酸甜清爽，維他命C滿滿', 'drink-8.jpg', 1, '2025-07-14', '2025-07-14 12:57:16');

-- --------------------------------------------------------

--
-- 資料表結構 `set_no`
--

CREATE TABLE `set_no` (
  `id` int(10) UNSIGNED NOT NULL,
  `or_no` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `set_no`
--

INSERT INTO `set_no` (`id`, `or_no`) VALUES
(1, '202507160006');

-- --------------------------------------------------------

--
-- 資料表結構 `title`
--

CREATE TABLE `title` (
  `id` int(10) UNSIGNED NOT NULL,
  `text` text DEFAULT NULL,
  `img` text DEFAULT NULL,
  `sh` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `title`
--

INSERT INTO `title` (`id`, `text`, `img`, `sh`) VALUES
(1, '泰好喝', NULL, 0);

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `bottom`
--
ALTER TABLE `bottom`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `first_img`
--
ALTER TABLE `first_img`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `order1`
--
ALTER TABLE `order1`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `order2`
--
ALTER TABLE `order2`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `second_img`
--
ALTER TABLE `second_img`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `set_no`
--
ALTER TABLE `set_no`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `title`
--
ALTER TABLE `title`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `bottom`
--
ALTER TABLE `bottom`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `first_img`
--
ALTER TABLE `first_img`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `items`
--
ALTER TABLE `items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `member`
--
ALTER TABLE `member`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `order1`
--
ALTER TABLE `order1`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `order2`
--
ALTER TABLE `order2`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=167;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `second_img`
--
ALTER TABLE `second_img`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `set_no`
--
ALTER TABLE `set_no`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `title`
--
ALTER TABLE `title`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
