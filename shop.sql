-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 24, 2019 at 07:26 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `Brands`
--

CREATE TABLE `Brands` (
  `id` int(11) NOT NULL,
  `Brandsname` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Brands`
--

INSERT INTO `Brands` (`id`, `Brandsname`) VALUES
(11, 'aaaaaaa'),
(10, 'dfhdfh'),
(12, 'fgjdfgj'),
(13, 'fgjdfgj'),
(14, 'fgjdfgj'),
(3, 'الأجهزة الأمريكية'),
(5, 'الأجهزة الاسبانية'),
(4, 'الأجهزة الايطالية'),
(9, 'الأجهزة التركية'),
(6, 'الأجهزة الفرنسية'),
(7, 'الأجهزة المصرية'),
(8, 'الأجهزة اليابانية');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `ID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Description` text NOT NULL,
  `parent` int(11) NOT NULL,
  `Ordering` int(11) DEFAULT NULL,
  `Visibility` tinyint(4) NOT NULL DEFAULT 0,
  `Allow_Comment` tinyint(4) NOT NULL DEFAULT 0,
  `Allow_Ads` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`ID`, `Name`, `Description`, `parent`, `Ordering`, `Visibility`, `Allow_Comment`, `Allow_Ads`) VALUES
(1, 'القاهرة', 'cairo orders', 0, 1, 1, 1, 1),
(2, 'الجيزة', 'giza orders', 0, 2, 0, 0, 0),
(3, 'الاسكندرية', 'elxandria orders', 0, 3, 0, 0, 0),
(4, 'الاسماعيلية', '', 8, 4, 0, 0, 0),
(5, 'اسوان', '', 0, 5, 0, 0, 0),
(6, 'اسيوط', '', 10, 2, 0, 0, 0),
(7, 'الاقصر', '', 12, 1, 0, 0, 0),
(8, 'البحر الاحمر', '', 12, 3, 0, 0, 0),
(9, 'البحيرة', '', 0, 1, 0, 0, 0),
(10, 'بني سويف ', '', 0, 1, 0, 0, 0),
(12, 'بور سعيد', '', 0, 1, 0, 0, 0),
(13, 'جنوب سيناء', '', 0, 1, 0, 0, 0),
(14, 'الدقهلية', '', 0, 0, 0, 0, 0),
(15, 'دمياط', '', 0, 1, 0, 0, 0),
(16, 'سوهاج', '', 0, 1, 0, 0, 0),
(17, 'محافظة السويس ', '', 0, 1, 0, 0, 0),
(18, 'الشرقية', '', 0, 1, 0, 0, 0),
(19, 'الغربية', '', 0, 1, 0, 0, 0),
(20, 'الفيوم', '', 0, 1, 0, 0, 0),
(21, 'القليوبية', '', 0, 1, 0, 0, 0),
(22, 'قنا', '', 0, 1, 0, 0, 0),
(23, 'كفر الشيخ', '', 0, 1, 0, 0, 0),
(24, 'شمال سيناء', '', 0, 1, 0, 0, 0),
(25, 'مطروح', '', 0, 1, 0, 0, 0),
(26, 'المنوفية', '', 0, 1, 0, 0, 0),
(27, 'المنيا', '', 0, 1, 0, 0, 0),
(28, 'الودي الجديد', '', 0, 1, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `c_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `status` tinyint(4) NOT NULL,
  `comment_date` date NOT NULL,
  `item_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`c_id`, `comment`, `status`, `comment_date`, `item_id`, `user_id`) VALUES
(16, '131563', 0, '2019-08-23', 51, 176),
(17, '456456456456456', 0, '2019-08-23', 51, 176),
(18, '456456456456456', 0, '2019-08-23', 51, 176);

-- --------------------------------------------------------

--
-- Table structure for table `engineer`
--

CREATE TABLE `engineer` (
  `UserID` int(11) NOT NULL,
  `Username` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `Password` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `Email` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `FullName` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `GroupID` int(11) NOT NULL DEFAULT 0,
  `TrustStatus` int(11) NOT NULL DEFAULT 0,
  `RegStatus` int(11) NOT NULL DEFAULT 0,
  `Date` date NOT NULL,
  `avatar` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `phone` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `engineer`
--

INSERT INTO `engineer` (`UserID`, `Username`, `Password`, `Email`, `FullName`, `GroupID`, `TrustStatus`, `RegStatus`, `Date`, `avatar`, `phone`) VALUES
(1, 'bodyy', '0000', 'abdelrahman18251@gmail.com', 'abdelrahman mohamed', 0, 0, 1, '2019-08-06', '', '011001111');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `Item_ID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Description` text DEFAULT NULL,
  `Price` varchar(255) DEFAULT NULL,
  `Add_Date` text NOT NULL,
  `Country_Made` varchar(255) DEFAULT NULL,
  `Image` varchar(255) DEFAULT NULL,
  `Status` varchar(255) NOT NULL COMMENT '0 / hide   1/ show',
  `Rating` smallint(6) DEFAULT NULL,
  `Approve` tinyint(4) NOT NULL DEFAULT 0,
  `Cat_ID` int(11) NOT NULL,
  `Member_ID` int(11) DEFAULT NULL,
  `tags` varchar(255) DEFAULT NULL,
  `address` longtext NOT NULL,
  `mobile` varchar(150) NOT NULL,
  `phone` varchar(150) NOT NULL,
  `types` varchar(150) NOT NULL,
  `brands` varchar(150) NOT NULL,
  `brand` varchar(150) NOT NULL,
  `defect` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`Item_ID`, `Name`, `Description`, `Price`, `Add_Date`, `Country_Made`, `Image`, `Status`, `Rating`, `Approve`, `Cat_ID`, `Member_ID`, `tags`, `address`, `mobile`, `phone`, `types`, `brands`, `brand`, `defect`) VALUES
(50, 'Kaseem Pace', 'Vitae expedita dolorVitae expedita dolorVitae expedita dolorVitae expedita dolorVitae expedita dolorVitae expedita dolorVitae expedita dolorVitae expedita dolorVitae expedita dolorVitae expedita dolorVitae expedita dolorVitae expedita dolorVitae expedita dolorVitae expedita dolorVitae expedita dolorVitae expedita dolorVitae expedita dolor', '457457', '2019-08-23 21:36:31', 'aa', 'img', '1', NULL, 1, 23, 175, NULL, 'Nemo rerum quis quis', '67807807806', '+1 (765) 357-5344', 'أجهزة منزلية', 'fgjdfgj', '5', 'Vitae expedita dolorVitae expedita dolorVitae expedita dolorVitae expedita dolorVitae expedita dolorVitae expedita dolorVitae expedita dolorVitae expedita dolorVitae expedita dolorVitae expedita dolorVitae expedita dolorVitae expedita dolorVitae expedita dolorVitae expedita dolorVitae expedita dolorVitae expedita dolorVitae expedita dolor'),
(51, 'Victor Cunningham', ' Tempore ipsum reruTempore ipsum reruTempore ipsum reruTempore ipsum reruTempore ipsum reruTempore ipsum reruTempore ipsum reruTempore ipsum reru', '457547', '2019-08-23 21:36:58', 'eg', 'img', '1', NULL, 1, 23, 168, NULL, 'Saepe voluptatem ven', '76897695695', '+1 (483) 802-8762', 'تكييف مركزى', 'الأجهزة المصرية', '8', ' Tempore ipsum reruTempore ipsum reruTempore ipsum reruTempore ipsum reruTempore ipsum reruTempore ipsum reruTempore ipsum reruTempore ipsum reru'),
(52, 'Diana Cantu', 'Anim cum voluptatem Anim cum voluptatem Anim cum voluptatem Anim cum voluptatem Anim cum voluptatem Anim cum voluptatem Anim cum voluptatem Anim cum voluptatem Anim cum voluptatem Anim cum voluptatem Anim cum voluptatem Anim cum voluptatem ', '457457', '2019-08-23 21:37:34', 'rr', 'img', '0', NULL, 1, 23, 169, NULL, 'Mollitia aut enim ip', '65845864568', '+1 (299) 646-9641', 'أجهزة منزلية', 'الأجهزة الايطالية', '4', 'Anim cum voluptatem Anim cum voluptatem Anim cum voluptatem Anim cum voluptatem Anim cum voluptatem Anim cum voluptatem Anim cum voluptatem Anim cum voluptatem Anim cum voluptatem Anim cum voluptatem Anim cum voluptatem Anim cum voluptatem '),
(53, 'ELSAWY', 'Omnis laborum sint i', NULL, '2019-08-23 21:49:28', NULL, 'img', '1', NULL, 1, 23, NULL, NULL, 'In illo exercitation', '76967967967', '+1 (318) 525-3759', 'أجهزة منزلية', 'الأجهزة الاسبانية', '2', 'Omnis laborum sint i');

-- --------------------------------------------------------

--
-- Table structure for table `manufactureCountrys`
--

CREATE TABLE `manufactureCountrys` (
  `id` int(11) NOT NULL,
  `Brands_id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `manufactureCountrys`
--

INSERT INTO `manufactureCountrys` (`id`, `Brands_id`, `name`) VALUES
(2, 3, 'جنرال اليكتريك'),
(3, 3, 'هوت بوينت'),
(4, 4, 'اريستون'),
(5, 6, 'اندست'),
(6, 6, 'فاجور'),
(7, 7, 'شارب'),
(8, 7, 'الاسكا');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserID` int(11) NOT NULL COMMENT 'To Identify User',
  `Username` varchar(255) NOT NULL COMMENT 'Username To Login',
  `Password` varchar(255) NOT NULL COMMENT 'Password To Login',
  `Email` varchar(255) NOT NULL,
  `FullName` varchar(255) DEFAULT NULL,
  `GroupID` int(11) NOT NULL DEFAULT 0 COMMENT 'Identify User Group',
  `TrustStatus` int(11) NOT NULL DEFAULT 0 COMMENT 'Seller Rank',
  `RegStatus` int(11) NOT NULL DEFAULT 0 COMMENT 'User Approval',
  `Date` timestamp NULL DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `phone` varchar(150) DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 DEFAULT NULL,
  `Governorate` varchar(255) DEFAULT NULL,
  `types` varchar(150) DEFAULT NULL,
  `brands` varchar(150) DEFAULT NULL,
  `brand` varchar(150) DEFAULT NULL,
  `jop` varchar(150) DEFAULT NULL,
  `national_ID` varchar(150) DEFAULT NULL,
  `qualification` varchar(150) DEFAULT NULL,
  `Commercial_Registration` varchar(150) DEFAULT NULL,
  `Issuer` varchar(150) DEFAULT NULL,
  `formNo14` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserID`, `Username`, `Password`, `Email`, `FullName`, `GroupID`, `TrustStatus`, `RegStatus`, `Date`, `avatar`, `phone`, `address`, `Governorate`, `types`, `brands`, `brand`, `jop`, `national_ID`, `qualification`, `Commercial_Registration`, `Issuer`, `formNo14`) VALUES
(157, 'null', 'null', 'gibavuwoqo@mailinator.net', 'Henry Stein', 0, 0, 0, '2019-08-20 20:03:06', NULL, '', 'Ad ab velit aut cum ', '', '1', '7', '', '1', '574574745747', 'فوق المتوسط', '', '', '56'),
(158, '', '', '275c0c0d13@hellomail.fun', 'fgjfgj fg dgfj', 0, 0, 0, '2019-08-20 20:12:52', NULL, '', 'ly/login.phply/login.php', '', '1', '7', '', '4', '', '', '', '', '4336463436'),
(159, 'munyxat', 'Pa$$w0rd!', 'luxok@mailinator.com', 'Gil Shaw', 0, 0, 0, '2019-08-20 20:26:55', NULL, '4574574', 'Aut eu eveniet amet', '', '1', '5', '', '3', '', '', '4574', '547457457', ''),
(160, 'fezam', 'ac748cb38ff28d1ea98458b16695739d7e90f22d', 'ziqago@mailinator.net', 'Ocean Le', 0, 0, 0, '2019-08-20 20:33:42', NULL, '', 'Possimus quod assum', '', '1', '12', '', '6', '43636463643636', 'نظام 5 سنوات صنايعي', '', '', ''),
(161, 'kigetepy', 'ac748cb38ff28d1ea98458b16695739d7e90f22d', 'rejanonut@mailinator.com', 'Lee Meadows', 0, 0, 0, '2019-08-20 20:35:34', NULL, '', 'Voluptas incidunt l', '', '1', '12', '', '', '', '', '', '', ''),
(162, 'pujydukone', 'ac748cb38ff28d1ea98458b16695739d7e90f22d', 'lovyr@mailinator.net', 'Lance Wiggins', 0, 0, 0, '2019-08-20 20:36:22', NULL, '', 'Est do officiis non', '1', '1', '13', '', '', '', '', '', '', ''),
(163, 'jeryhideq', 'ac748cb38ff28d1ea98458b16695739d7e90f22d', 'waryhav@mailinator.com', 'Jorden Joyner', 0, 0, 0, '2019-08-20 21:25:29', NULL, '', 'Facilis vel inventor', '', '2', '4', '', '1', '35235235235235', 'معهد فني صنايعي', '', '', ''),
(164, 'gobenogufo', 'ac748cb38ff28d1ea98458b16695739d7e90f22d', 'kularyz@mailinator.net', 'Samantha Brennan', 0, 0, 0, '2019-08-20 21:26:27', NULL, '', 'Sed sed voluptatibus', '', '1', '9', '', '', '', '', '', '', ''),
(165, 'carofot', 'ac748cb38ff28d1ea98458b16695739d7e90f22d', 'zykyzyhime@mailinator.com', 'Brenden Serrano', 0, 0, 0, '2019-08-20 21:27:42', NULL, '', 'Autem do ex neque al', '', '2', '3', '', '', '', '', '', '', ''),
(166, 'jicura', 'ac748cb38ff28d1ea98458b16695739d7e90f22d', 'pobe@mailinator.net', 'Cooper Boyd', 0, 0, 0, '2019-08-20 21:29:15', NULL, '', 'Unde fugiat quaerat', 'الفيوم', '1', '14', '', '', '', '', '', '', ''),
(167, 'golanyvut', 'ac748cb38ff28d1ea98458b16695739d7e90f22d', 'qyruzyrowo@mailinator.com', 'Kirsten Rivera', 0, 0, 0, '2019-08-20 21:42:58', NULL, '+1 (282) 271-4324', 'Qui laudantium sint', 'اسوان', 'أجهزة منزلية', 'الأجهزة الاسبانية', '4', 'وكيلاء تجاريون', '', '', '5', 'Aut voluptatem eos ', '47457474575'),
(168, 'mifeb', 'ac748cb38ff28d1ea98458b16695739d7e90f22d', 'cyre@mailinator.com', 'Evangeline Sellers', 0, 0, 0, '2019-08-20 21:46:52', NULL, '', 'Eius sunt non omnis', 'بني سويف ', 'أجهزة منزلية', 'fgjdfgj', '', '', '', '', '', '', ''),
(169, 'gagenunu', 'ac748cb38ff28d1ea98458b16695739d7e90f22d', 'fypynu@mailinator.com', 'Knox Pace', 0, 0, 0, '2019-08-20 21:55:50', NULL, '', 'Eu culpa quo dolor i', '14', 'تكييف مركزى', 'الأجهزة الأمريكية', '', '', '', '', '', '', ''),
(170, 'trtur5474', '4b8aaf27d22e5b15e5da3c911521ab4715494808', 'aafsafs@sdggd.com', 'fjgfdjfdgjdfgjdfgj', 0, 0, 0, '2019-08-20 21:59:06', NULL, '', 'fdhdf dfhdfh', '10', 'أجهزة منزلية', '', '', '', '', '', '', '', ''),
(171, 'hohumojema', 'ac748cb38ff28d1ea98458b16695739d7e90f22d', 'novof@mailinator.net', 'Jescie Hood', 0, 0, 0, '2019-08-20 22:18:44', NULL, '685868', 'Expedita itaque exer', '10', 'تكييف مركزى', 'الأجهزة المصرية', '', 'مركز خدمة متخصص', '', '', '568568', '56858568', ''),
(172, 'qezanu', 'ac748cb38ff28d1ea98458b16695739d7e90f22d', 'ditywub@mailinator.com', 'Kieran Mayer', 0, 0, 0, '2019-08-20 22:21:19', NULL, '', 'Mollitia non cumque ', '2', 'تكييف مركزى', 'الأجهزة الأمريكية', '', '', '', '', '', '', ''),
(173, 'rixymi', 'ac748cb38ff28d1ea98458b16695739d7e90f22d', 'fozafutah@mailinator.net', 'James Harrington', 0, 0, 0, '2019-08-20 22:41:43', NULL, '', 'Est assumenda volupt', '9', 'أجهزة منزلية', 'الأجهزة الايطالية', '8', 'وكيلاء تجاريون', '', '', '', '', ''),
(174, 'lonufoso', 'ac748cb38ff28d1ea98458b16695739d7e90f22d', 'zosori@mailinator.com', 'Ishmael Kent', 0, 0, 0, '2019-08-20 22:58:18', NULL, '', 'Excepteur molestiae ', '28', 'أجهزة منزلية', 'الأجهزة المصرية', '', '', '', '', '', '', ''),
(175, 'qipybixu', 'ac748cb38ff28d1ea98458b16695739d7e90f22d', 'sifi@mailinator.net', 'Lucy Douglas', 0, 0, 0, '2019-08-21 01:47:21', NULL, '457474575', 'Cupiditate et quo ev', '9', 'أجهزة منزلية', 'الأجهزة اليابانية', '', 'مركز خدمة معتمد', '', '', '547', '47457457', ''),
(176, 'rojyh', 'ac748cb38ff28d1ea98458b16695739d7e90f22d', 'maleredu@mailinator.com', 'Ifeoma Glenn', 0, 0, 0, '2019-08-23 16:49:24', NULL, '', 'Exercitationem enim ', '23', 'تكييف مركزى', 'dfhdfh', '4', 'فني كنترول', '34634634634', 'مؤهل عالي', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Brands`
--
ALTER TABLE `Brands`
  ADD PRIMARY KEY (`id`),
  ADD KEY `name` (`Brandsname`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Name` (`Name`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`c_id`),
  ADD KEY `items_comment` (`item_id`),
  ADD KEY `comment_user` (`user_id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`Item_ID`),
  ADD KEY `member_1` (`Member_ID`),
  ADD KEY `cat_1` (`Cat_ID`);

--
-- Indexes for table `manufactureCountrys`
--
ALTER TABLE `manufactureCountrys`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Brands_id` (`Brands_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserID`),
  ADD UNIQUE KEY `Username` (`Username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Brands`
--
ALTER TABLE `Brands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `Item_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `manufactureCountrys`
--
ALTER TABLE `manufactureCountrys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'To Identify User', AUTO_INCREMENT=177;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comment_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `items_comment` FOREIGN KEY (`item_id`) REFERENCES `items` (`Item_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `cat_1` FOREIGN KEY (`Cat_ID`) REFERENCES `categories` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `member_1` FOREIGN KEY (`Member_ID`) REFERENCES `users` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `manufactureCountrys`
--
ALTER TABLE `manufactureCountrys`
  ADD CONSTRAINT `manufactureCountrys_ibfk_1` FOREIGN KEY (`Brands_id`) REFERENCES `Brands` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
