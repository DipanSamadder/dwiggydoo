-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 26, 2023 at 09:39 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dwiggydoo_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `postal_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `location_id` int(11) DEFAULT NULL,
  `latitude` varchar(399) COLLATE utf8_unicode_ci DEFAULT NULL,
  `longitude` varchar(399) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `set_default` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `addresses`
--

INSERT INTO `addresses` (`id`, `user_id`, `address`, `country`, `city`, `postal_code`, `location_id`, `latitude`, `longitude`, `phone`, `set_default`, `created_at`, `updated_at`) VALUES
(42, 9, 'address', 'country', 'city', '43243243', NULL, NULL, NULL, NULL, 0, '2023-06-13 09:51:40', '2023-06-13 09:51:40'),
(43, 9, 'address', 'country', 'city', '43243243', NULL, NULL, NULL, NULL, 0, '2023-06-13 10:22:24', '2023-06-13 10:22:24'),
(44, 9, 'address', 'country', 'city', '43243243', NULL, NULL, NULL, NULL, 0, '2023-06-13 10:23:10', '2023-06-13 10:23:10');

-- --------------------------------------------------------

--
-- Table structure for table `blocks`
--

CREATE TABLE `blocks` (
  `id` int(11) NOT NULL,
  `friendships_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `blockable_id` bigint(20) NOT NULL,
  `blockable_type` varchar(355) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `breeds`
--

CREATE TABLE `breeds` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `top` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `breeds`
--

INSERT INTO `breeds` (`id`, `name`, `image`, `top`, `status`, `created_at`, `updated_at`) VALUES
(58, 'Affenpinscher', 'https://dwiggydoo.com/storage/app/public/breed/PbubboD7VIhm8bmG0TO1hop0X8lOd8AJmLr5bJkN.png', 1, 1, '2022-04-08 13:58:49', '2022-12-27 12:03:12'),
(2, 'Nep', '', 0, 0, '2022-04-09 08:42:25', '2022-12-27 12:03:31'),
(3, 'Afador', '', 0, 0, '2022-04-09 08:42:25', '2022-12-07 10:01:49'),
(4, 'Barbet', 'https://dwiggydoo.com/storage/app/public/breed/Mb8BcjvabceEkOlQcKtZ5i8ySH4JZ4tVaCTIlq8u.jpg', 0, 1, '2022-04-09 08:42:25', '2022-12-27 12:30:14'),
(5, 'Beabull', 'https://dwiggydoo.com/storage/app/public/breed/ePg7J392SVZP2oBPRah9XEONxhA2tK4CIrEWO1ia.jpg', 0, 1, '2022-04-09 08:42:25', '2022-12-27 16:33:45'),
(6, 'Chigi', 'https://dwiggydoo.com/storage/app/public/breed/X6ReIyZRkB3UL5h7hzLVct6dpFPtMXTa4HfBJpbo.jpg', 0, 0, '2022-04-09 08:42:25', '2022-04-12 09:43:19'),
(7, 'Havanese', '', 1, 1, '2022-04-09 08:42:25', '2022-12-27 16:35:36'),
(8, 'Terripoo', 'https://dwiggydoo.com/storage/app/public/breed/kSzm7ycYH3LK8qynVjhIl7tMW7FGdv3afmAHlP0r.jpg', 0, 0, '2022-04-09 08:42:25', '2022-04-12 09:51:23'),
(59, 'Indian Pariah Dog', 'https://dwiggydoo.com/storage/app/public/breed/nErlRZp3i4biCYp9B67vBGAV2QhrRgnArjTAICRf.jpg', 0, 1, '2022-04-09 11:57:43', '2022-04-13 05:05:15'),
(60, 'Golden Retriever', 'https://dwiggydoo.com/storage/app/public/breed/1Y27807wWdqaTwKWZrF0q1bqtiGaC3e8K3gt2AXl.jpg', 0, 1, '2022-04-09 11:57:43', '2022-11-24 07:22:11'),
(61, 'Beagle', 'https://dwiggydoo.com/storage/app/public/breed/CFPgWcOQ46ewCViwbMxfVwChixuORd8P4iZio8q3.jpg', 0, 1, '2022-04-09 11:57:43', '2022-11-24 07:22:05'),
(62, 'Pug', 'https://dwiggydoo.com/storage/app/public/breed/zVhEBAJ48CFmg43b0xXCJxrDOj297x4Dbgc0wIRE.jpg', 0, 1, '2022-04-09 11:57:43', '2022-04-13 05:03:43'),
(63, 'Indian Spitz', 'https://dwiggydoo.com/storage/app/public/breed/GJJEIIJpU0DSw3MwbeWJT7nmfxZ4xEIzt0U2xqgY.jpg', 0, 1, '2022-04-09 11:57:43', '2022-11-24 09:34:38'),
(64, 'Lhasa Apso', 'https://dwiggydoo.com/storage/app/public/breed/Aet5hRrwTiKM2uHI5f0V4RpIu3SmcVSEWh9ze8VG.jpg', 0, 1, '2022-04-09 11:57:43', '2022-04-13 05:01:05'),
(65, 'Dalbo dog', 'https://dwiggydoo.com/storage/app/public/breed/xFupAfIVDXrorraYz3hbGTFlAexrhJReiFKuImUN.jpg', 0, 1, '2022-04-09 11:57:43', '2022-04-26 06:07:11'),
(66, 'German Shepherd Dog', 'https://dwiggydoo.com/storage/app/public/breed/fX0d1l7EGhO2soervl9xim0lzcihj7eHeaabIMc9.jpg', 0, 1, '2022-04-09 11:57:43', '2022-04-12 14:00:39'),
(67, 'Japanese Spitz', 'https://dwiggydoo.com/storage/app/public/breed/XvPes9wMtQ322BPB4x8KdtqQ8tLK5MHvqAphjPbD.jpg', 0, 1, '2022-04-09 11:57:43', '2022-04-13 04:59:55'),
(68, 'Lapponian Herder', 'https://dwiggydoo.com/storage/app/public/breed/mlrrc4EpxmnHEzNhPzTj1yjTrmoj38N8iERfLGeN.png', 0, 1, '2022-04-09 11:57:43', '2022-04-13 05:31:54'),
(69, 'Shih Tzu', 'https://dwiggydoo.com/storage/app/public/breed/tWe0kpddqT0ZKF4AkwJYtCFq1zwQhoCRZxGypRTd.jpg', 0, 1, '2022-04-09 11:57:43', '2022-04-13 04:59:19'),
(70, 'Labrador Retriever', 'https://dwiggydoo.com/storage/app/public/breed/BxOnBupbNV1EaFtRMC1bLyzVUb6ugIBe2YOAK2sY.jpg', 0, 1, '2022-04-09 11:57:43', '2022-11-24 07:22:28'),
(71, 'Siberian Husky', 'https://dwiggydoo.com/storage/app/public/breed/W71eHyVPzvL2h2yDWBqxG3Tj3gYtNnoKjtIMVI5D.jpg', 0, 1, '2022-04-09 11:57:43', '2022-04-13 04:57:41'),
(72, 'Belgian Shepherd', 'https://dwiggydoo.com/storage/app/public/breed/Zz3CiKmik2lIbsWpamLaXu9azgCy1tI99IdfW4Kc.jpg', 0, 1, '2022-04-09 11:57:43', '2022-04-12 14:05:26'),
(73, 'German Spitz', 'https://dwiggydoo.com/storage/app/public/breed/K4AJrUwobEkOt6NdYaQ217ltlT9kkjsRkcZCMFDf.jpg', 0, 1, '2022-04-09 11:57:43', '2022-04-12 14:01:44'),
(74, 'English Cocker Spaniel', 'https://dwiggydoo.com/storage/app/public/breed/r4uBQCPtZWSEF1BjqPWHHquaZDtMy7Rx0wlOeZSp.jpg', 0, 1, '2022-04-09 11:57:43', '2022-11-24 07:22:22'),
(75, 'Chow Chow', 'https://dwiggydoo.com/storage/app/public/breed/TtPvyKe4e6lbcA3qVEsyWllWuKSBKky91b7hQfxI.jpg', 0, 1, '2022-04-09 11:57:43', '2022-04-12 13:53:29'),
(76, 'Pomeranian', 'https://dwiggydoo.com/storage/app/public/breed/Ft0gAfZzKhaaAfyuqP4CWeaS2yo0MxPd2LqqMtrQ.jpg', 0, 1, '2022-04-09 11:57:43', '2022-04-13 05:06:14'),
(77, 'Billy', 'https://dwiggydoo.com/storage/app/public/breed/70RgaSHjJAAw3igAVGzIQLYmfXG9phXUustn38Wj.jpg', 0, 1, '2022-04-09 11:57:43', '2022-04-13 05:15:07'),
(78, 'Bulldog', 'https://dwiggydoo.com/storage/app/public/breed/dMsiEqoY2rRCY3M9EIisuQ9XAt5oOcqyHCQTDDOC.jpg', 0, 1, '2022-04-09 11:57:43', '2022-04-13 05:13:39'),
(79, 'Rottweiler', 'https://dwiggydoo.com/storage/app/public/breed/a9NLsYYA3VF5GB7YNHBcZVXMb1BKSkQFJYR2LPNS.jpg', 0, 1, '2022-04-09 11:57:43', '2022-04-13 05:13:18'),
(80, 'Kombai', 'https://dwiggydoo.com/storage/app/public/breed/M9rpZQpy2BvAxrrSrJDJNp0Ddcc5vty31cl3fIhB.jpg', 0, 1, '2022-04-09 11:57:43', '2022-04-13 05:12:28'),
(81, 'Finnish Spitz', 'https://dwiggydoo.com/storage/app/public/breed/EkxTCRa8m3EcBqQqYpVh8DVNCHU5pp8nHf6yELyW.jpg', 0, 1, '2022-04-09 11:57:43', '2022-04-13 05:12:50'),
(82, 'American Bully', 'https://dwiggydoo.com/storage/app/public/breed/D31sLkSc2q0eZq2SwiiyYo8B343oPB1kkGRO1Apg.png', 0, 1, '2022-04-09 11:57:43', '2022-04-12 13:46:16'),
(83, 'Alaskan Husky', 'https://dwiggydoo.com/storage/app/public/breed/cnFZRngxlAmnCOGFzZSVsX44F4YtdZB23OKbh8Y7.png', 0, 1, '2022-04-09 11:57:43', '2022-04-12 10:51:14'),
(84, 'Georgian Shepherd', 'https://dwiggydoo.com/storage/app/public/breed/e3KEt7BiU1YrCWyYwo3UlBiKU5s3bd8DEMiuzlBP.jpg', 0, 1, '2022-04-09 11:57:43', '2022-04-13 05:11:33'),
(85, 'American Pitbull Terrier', 'https://dwiggydoo.com/storage/app/public/breed/SrefQXPZ8zYrexgq5QBw9UCbg9knmDYU0lnVnhXN.jpg', 0, 1, '2022-04-09 11:57:43', '2022-04-12 09:59:45'),
(86, 'Boxer', 'https://dwiggydoo.com/storage/app/public/breed/6tALQlU7UYd8dGg3b1TjJ1UDGR33OmDwtgU3avTe.jpg', 0, 1, '2022-04-09 11:57:43', '2022-04-13 05:11:55'),
(87, 'Dobermann', 'https://dwiggydoo.com/storage/app/public/breed/y4BVEDfv3X3a2QLIZZHulzE6oJsYtNk4xYCOibyz.jpg', 0, 1, '2022-04-09 11:57:43', '2022-04-13 05:10:09'),
(88, 'Sakhalin Husky', 'https://dwiggydoo.com/storage/app/public/breed/IyUwY5q7xczg0sp7UD9YyuzncaSLvEkW0Hq8iE3V.jpg', 0, 1, '2022-04-09 11:57:43', '2022-04-13 05:08:09'),
(89, 'French Bulldog', 'https://dwiggydoo.com/storage/app/public/breed/2DutDgHjZrBcERIl7v8YaXnbyJWFel0QRGOeseO3.jpg', 0, 1, '2022-04-09 11:57:43', '2022-11-24 09:34:43'),
(90, 'Saint Bernard', 'https://dwiggydoo.com/storage/app/public/breed/Xa2Z8u3RSo5lx5Xrdzag4CN2ytNZhsIM7fuUGbMp.jpg', 0, 1, '2022-04-09 11:57:43', '2022-04-13 05:00:43'),
(91, 'American Cocker Spaniel', 'https://dwiggydoo.com/storage/app/public/breed/XR2Tt1yuRYrfHO0xIqF9FLJp2hRq7xuwxiG2TJvy.jpg', 0, 1, '2022-04-09 11:57:43', '2022-04-12 09:56:56'),
(92, 'Bichon Frisé', 'https://dwiggydoo.com/storage/app/public/breed/2puYDWbZH2fpleKpFQmPFUshHjb7mh3qvyja02AN.jpg', 0, 1, '2022-04-09 11:57:43', '2022-04-12 13:54:06'),
(93, 'Maltese', 'https://dwiggydoo.com/storage/app/public/breed/2BQFdKftdzFJamheESJnwxgu1iRK8pYQRhqdMHrR.jpg', 0, 1, '2022-04-09 11:57:43', '2022-04-12 13:55:29'),
(94, 'Poodle', 'https://dwiggydoo.com/storage/app/public/breed/cPSROIL0PCcVyOvl1oQ2nylBfGO6O2yhzkhdMZlf.jpg', 0, 1, '2022-04-09 11:57:43', '2022-04-12 13:55:49'),
(95, 'Pekingese', 'https://dwiggydoo.com/storage/app/public/breed/2t5g2KFteAhcuAooM61UOiX7wdeLw7hCGKflas52.jpg', 0, 1, '2022-04-09 11:57:43', '2022-04-12 13:56:09'),
(96, 'Shetland Sheepdog', 'https://dwiggydoo.com/storage/app/public/breed/IYYzqTVWZOSgNjCViWbj1MHknP32Gco9iCWtFOK1.jpg', 0, 1, '2022-04-09 11:57:43', '2022-04-12 13:56:34'),
(97, 'Papillon', 'https://dwiggydoo.com/storage/app/public/breed/8Us68WEsOYbjeg3ktTU53nWXpw8ouWyazJWPl8M3.jpg', 0, 1, '2022-04-09 11:57:43', '2022-04-12 13:56:58'),
(98, 'Australian Cattle Dog', 'https://dwiggydoo.com/storage/app/public/breed/RjlB9pjej3wHmf71YULjHMXi99jdqvlV33RyeUMa.jpg', 0, 1, '2022-04-09 11:57:43', '2022-04-12 13:47:18'),
(99, 'Irish Wolfhound', 'https://dwiggydoo.com/storage/app/public/breed/l6Bn9tJyfvBVDPG4MZvdJ5cvJ1ALWhub2jWuse15.png', 0, 1, '2022-04-09 11:57:43', '2022-04-13 05:29:28'),
(100, 'American Staffordshire Terrier', 'https://dwiggydoo.com/storage/app/public/breed/vmBHru1r1VB7fW226LD0kjreuRpHPCffAlOp0Fm1.jpg', 0, 1, '2022-04-09 11:57:43', '2022-04-12 13:45:51'),
(101, 'Coton De Tulear', 'https://dwiggydoo.com/storage/app/public/breed/FJsVHrub7hVsGQgOzvEhDJ7yDth5tsJkifPTsYCa.jpg', 0, 1, '2022-04-09 11:57:43', '2022-04-12 13:57:24'),
(102, 'YorkshireTerrier', 'https://dwiggydoo.com/storage/app/public/breed/FU7y8DmUBBDXOHPSXoe73hQWWFrsGjjUKmIuxnnZ.jpg', 0, 1, '2022-04-09 11:57:43', '2022-04-12 09:53:20'),
(103, 'Akita', 'https://dwiggydoo.com/storage/app/public/breed/RJHA3xFoScW20versudO35qgaozw48s1wIyDrgHT.jpg', 1, 1, '2022-04-09 11:57:43', '2022-04-12 06:49:03'),
(104, 'Lagotto Romagnolo', 'https://dwiggydoo.com/storage/app/public/breed/iCqI2uH3h6GVE6qruoPyTkWOa74R8pI9kXnZyWUv.jpg', 0, 1, '2022-04-09 11:57:43', '2022-04-12 13:57:56'),
(105, 'Dogo Argentino', 'https://dwiggydoo.com/storage/app/public/breed/FgF9DQXOjwi8ro2p7gTtp5HIVeavV3dY0CgfnyaV.jpg', 0, 1, '2022-04-09 11:57:43', '2022-04-12 13:58:32'),
(106, 'Himalayan Sheepdog', 'https://dwiggydoo.com/storage/app/public/breed/GYQjewoZ0aoHEQFlMcd9jRJdmFgV7IuskAOij9y4.jpg', 0, 1, '2022-04-09 11:57:43', '2022-04-12 13:58:52'),
(107, 'Pharaoh Hound', 'https://dwiggydoo.com/storage/app/public/breed/vASiEmbs4jcRMVUZgUGoox6FmitvxCHCuDq7VGfG.jpg', 0, 1, '2022-04-09 11:57:43', '2022-04-12 13:59:42'),
(108, 'Japanese Chin', 'https://dwiggydoo.com/storage/app/public/breed/5xS8l9oF6gbiZLzOz2MbaYtVXJksuTFztX2MKrqd.jpg', 0, 1, '2022-04-09 11:57:43', '2022-04-12 14:00:04'),
(109, 'Toy Bulldog', 'https://dwiggydoo.com/storage/app/public/breed/P7BY8hlp5zMf8r5v1QaQ7aVI6Arw9yDNlzCNlV2p.jpg', 0, 1, '2022-04-09 11:57:44', '2022-04-12 09:21:16'),
(111, 'Cane Corso', 'https://dwiggydoo.com/storage/app/public/breed/ZjwlA9fEHnpKLhaLUXuoh6Y2tUpGdjqysJcbkmPj.jpg', 0, 1, '2022-04-09 11:57:44', '2022-04-12 09:21:41'),
(112, 'Blue Lacy', 'https://dwiggydoo.com/storage/app/public/breed/mWXzZBns56Q8nkhpVTUeNmTrZ6vyaj6e6aODgsbG.jpg', 0, 1, '2022-04-09 11:57:44', '2022-04-12 11:00:10'),
(113, 'Kintamani', 'https://dwiggydoo.com/storage/app/public/breed/YHmb2jBRFxBom9w6L1MWSxgWYIFG3Lg5O4DbrJvZ.jpg', 0, 1, '2022-04-09 11:57:44', '2022-04-12 09:20:49'),
(114, 'Brittany', 'https://dwiggydoo.com/storage/app/public/breed/hN5puEO4sMQdmKFMK4CLptWs6qV9dUCxW2h8iZaR.jpg', 0, 1, '2022-04-09 11:57:44', '2022-04-12 09:22:12'),
(115, 'Komondor', 'https://dwiggydoo.com/storage/app/public/breed/8kV7oqhwggsyJaDNzLD4jrf6jQhm3w6D7t91yGTw.png', 0, 1, '2022-04-09 11:57:44', '2022-04-13 05:26:39'),
(116, 'Cavalier King Charles Spaniel', 'https://dwiggydoo.com/storage/app/public/breed/bJ28YCMAgurgHgCmjvnN0JNQm4zfcYT77wxbjYix.jpg', 0, 1, '2022-04-09 11:57:44', '2022-04-12 09:22:54'),
(117, 'Greenland Dog', 'https://dwiggydoo.com/storage/app/public/breed/qDKxZ2ywXWksdVBDYw0WufQ8qgVYgYLakqzoD6FR.jpg', 0, 1, '2022-04-09 11:57:44', '2022-04-12 09:23:18'),
(118, 'Africanis', 'https://dwiggydoo.com/storage/app/public/breed/nV9tMM20k8mOZt7fszvOHmbHrzKYoncUq5rYJXef.png', 1, 1, '2022-04-09 11:57:44', '2022-04-11 13:46:02'),
(119, 'Whippet', 'https://dwiggydoo.com/storage/app/public/breed/954naR9WOVsKAKJsM7FBS838PvI5LTOWyg0PPoQt.jpg', 0, 1, '2022-04-09 11:57:44', '2022-04-12 09:55:22'),
(120, 'Icelandic Sheepdog', 'https://dwiggydoo.com/storage/app/public/breed/XKE0ZO8g1KAQqi2W92gbCKEFdKvQel88MwuHkJlU.jpg', 0, 1, '2022-04-09 11:57:44', '2022-04-12 09:23:47'),
(121, 'Leonberger', 'https://dwiggydoo.com/storage/app/public/breed/FCKNrKmly2XdpgSD10Z4PnQm96n2eIEolXcK3hbK.jpg', 0, 1, '2022-04-09 11:57:44', '2022-04-12 13:55:08'),
(122, 'Staffordshire Bull Terrier', 'https://dwiggydoo.com/storage/app/public/breed/H3UgCWDERgZ1eMXtWnsMmoTgoWfWF5tl7t0MzgdI.jpg', 0, 1, '2022-04-09 11:57:44', '2022-04-12 13:54:33'),
(123, 'Bucovina Shepherd Dog', 'https://dwiggydoo.com/storage/app/public/breed/Hm4IsSMJdwaBTrYKTZ1K1a2m6NiiiM2zvBIpRSgm.png', 0, 1, '2022-04-09 11:57:44', '2022-04-12 13:44:56'),
(124, 'Pointer', 'https://dwiggydoo.com/storage/app/public/breed/Kv5Ix9TuL32CZO4aUnmzrs6IDJNGbUrBCt1fNNjT.jpg', 0, 1, '2022-04-09 11:57:44', '2022-04-12 13:44:33'),
(125, 'Dogue de Bordeaux', 'https://dwiggydoo.com/storage/app/public/breed/88ZopEbsiKOJnUTTpsZldlyg2trxbNXc1ZaadciP.jpg', 0, 1, '2022-04-09 11:57:44', '2022-04-12 13:44:14'),
(126, 'Dalmatian', 'https://dwiggydoo.com/storage/app/public/breed/gWaKRlNS47RbNqtCjf1XlHHe0w0sIDQ0GUl8hAYo.jpg', 0, 1, '2022-04-09 11:57:44', '2022-04-12 11:25:11'),
(127, 'Jindo', 'https://dwiggydoo.com/storage/app/public/breed/nZQQXymSYDN9JvLN7PRjpCpUyxCtHKdcifdMrcCj.jpg', 0, 1, '2022-04-09 11:57:44', '2022-04-12 09:24:10'),
(129, 'Aidi', 'https://dwiggydoo.com/storage/app/public/breed/SxVv8GSzEZK7648PIbkChEonUuBI5gdY3r5TujGL.jpg', 1, 1, '2022-04-10 17:02:46', '2022-04-12 06:48:35'),
(130, 'Airedale Terrier', 'https://dwiggydoo.com/storage/app/public/breed/iyiI3PhnVg0Kg1bmBm9H13ZHHCo1VHRlsIkQsrEe.jpg', 1, 1, '2022-04-10 17:05:17', '2022-04-12 06:48:26'),
(131, 'Akbash', 'https://dwiggydoo.com/storage/app/public/breed/GlIVtDSQuhp0AGHxPqKMPyahqflsIf8fbRBn9qH7.jpg', 1, 1, '2022-04-10 17:08:04', '2022-04-12 06:48:15'),
(132, 'Aksaray Malaklisi', 'https://dwiggydoo.com/storage/app/public/breed/7JjFfBCzJfRyZ3wM8j6akbL7pnZ47tmjRP05wz5j.jpg', 1, 1, '2022-04-10 17:12:49', '2022-04-12 10:55:49'),
(133, 'Shar Pei', 'https://dwiggydoo.com/storage/app/public/breed/e9a9lpkcjOkkMWw2a9LRho05RwIWRHBhAFlqmhgt.png', 0, 0, '2022-04-11 13:52:05', '0000-00-00 00:00:00'),
(134, 'Other', 'https://dwiggydoo.com/storage/app/public/breed/HJVoj0B8ywyv0HRbWJr6g2vhvVFn33whMQJdKR3u.png', 0, 1, '2022-04-13 13:10:18', '0000-00-00 00:00:00'),
(135, 'Bakharwal dog', 'https://dwiggydoo.com/storage/app/public/breed/ed5gNEyBb47rtyvFGKNcwfgA2yeHp5HCLwjVRAhJ.jpg', 0, 1, '2022-04-15 06:20:22', '0000-00-00 00:00:00'),
(136, 'Banjara Hound', 'https://dwiggydoo.com/storage/app/public/breed/0tJesZw43jSXpfsP72bQeHpR4VY6U8WnkHSu4V6w.jpg', 0, 1, '2022-04-15 06:22:16', '0000-00-00 00:00:00'),
(137, 'Barbado da Terceira', 'https://dwiggydoo.com/storage/app/public/breed/pKEJvDzVztx2QWJ1cFs0lA6XUi7vB8l1UhzZgJ4S.jpg', 0, 1, '2022-04-15 06:24:39', '0000-00-00 00:00:00'),
(138, 'Barbet', 'https://dwiggydoo.com/storage/app/public/breed/drpVyBi7jT0SAf1jwFu8JNFViIfEXSb2fdvRylTo.jpg', 0, 1, '2022-04-15 06:28:31', '0000-00-00 00:00:00'),
(139, 'Basenji', 'https://dwiggydoo.com/storage/app/public/breed/hCqcPnupEIYRi7xCwDGOebNUUBLJOF79f6Jazpqr.jpg', 0, 1, '2022-04-15 06:30:41', '0000-00-00 00:00:00'),
(140, 'Basque Shepherd Dog', 'https://dwiggydoo.com/storage/app/public/breed/j3SkkX6SwJsMB6jT1f29tBryOqvlzWln2Q47pc4s.jpg', 0, 1, '2022-04-15 06:33:40', '0000-00-00 00:00:00'),
(141, 'Basset Artésien Normand', 'https://dwiggydoo.com/storage/app/public/breed/6AJVIoU249EoUXeyQBVnCriG14wa1OGtT1BVJdCQ.jpg', 0, 1, '2022-04-15 06:36:10', '0000-00-00 00:00:00'),
(142, 'Basset Bleu de Gascogne', 'https://dwiggydoo.com/storage/app/public/breed/7Hd5nzZUBPiIjnfyVyqV9rLPIO0AIRdhBGiyb7lr.jpg', 0, 1, '2022-04-15 06:38:17', '0000-00-00 00:00:00'),
(143, 'Afghan Hound', 'https://dwiggydoo.com/storage/app/public/breed/HfCAiEzl0U0RxngGTOufA41cvxotDpQumVfDrIUJ.png', 0, 1, '2022-04-15 07:27:35', '0000-00-00 00:00:00'),
(144, 'Alano Español', 'https://dwiggydoo.com/storage/app/public/breed/4XBGQlrifwIm3hPlBO4grcKl4khMbQZyYjtRlwUk.png', 0, 1, '2022-04-15 07:30:09', '0000-00-00 00:00:00'),
(145, 'Alapaha Blue Blood Bulldog', 'https://dwiggydoo.com/storage/app/public/breed/ufKllGIAbElMVXvZwmWs0S4EUtROsnjOCx5Jr2cl.png', 0, 1, '2022-04-15 07:30:36', '0000-00-00 00:00:00'),
(146, 'Alaskan Klee Kai', 'https://dwiggydoo.com/storage/app/public/breed/7FZbeN9wS2mo07eD9xieqNf1OeTuCnGlzNfHa1Ch.png', 0, 1, '2022-04-15 07:30:50', '0000-00-00 00:00:00'),
(147, 'Alaskan Malamute', 'https://dwiggydoo.com/storage/app/public/breed/DPVLhzgMKqCmGXYtzM80Ne7whZFLkYeBCid7m9G4.png', 0, 1, '2022-04-15 07:31:00', '0000-00-00 00:00:00'),
(148, 'Alaunt', 'https://dwiggydoo.com/storage/app/public/breed/F9Vw7NNFpIhgf7GvpVC6TaPWFkxLC86bcclV6Z5L.png', 0, 1, '2022-04-15 07:31:12', '0000-00-00 00:00:00'),
(149, 'Alopekis', 'https://dwiggydoo.com/storage/app/public/breed/7IV58cRdtI9VperMo5AjIJv15eWlzg0BcbpRV5Nv.png', 0, 1, '2022-04-15 07:31:21', '0000-00-00 00:00:00'),
(150, 'Alpine Dachsbracke', 'https://dwiggydoo.com/storage/app/public/breed/sP4pEM2Fjb8heE8HF91UUQo7O569ylzCV0dPCeTo.png', 0, 1, '2022-04-15 07:31:37', '0000-00-00 00:00:00'),
(151, 'Alpine Mastiff', 'https://dwiggydoo.com/storage/app/public/breed/UEgPJHr10xCr2uGUPcgxDh0JONFx3ngwxFlVCPXk.png', 0, 1, '2022-04-15 07:31:58', '0000-00-00 00:00:00'),
(152, 'American Bulldog', 'https://dwiggydoo.com/storage/app/public/breed/b0UsTKjw1mYZ5MxHLRKFPAqeUTA5SzsylIpKZuzC.png', 0, 1, '2022-04-15 07:32:24', '0000-00-00 00:00:00'),
(153, 'American English Coonhound', 'https://dwiggydoo.com/storage/app/public/breed/4wZ6PbWNF17sJPjE0HYRb4sPBHCu3YbZMy6WYcDn.png', 0, 1, '2022-04-15 07:32:33', '0000-00-00 00:00:00'),
(154, 'American Eskimo Dog', 'https://dwiggydoo.com/storage/app/public/breed/WR5I2qr2EZrcPoBlpX9NWSvVgDuDpy4o4mMTbxPX.png', 0, 1, '2022-04-15 07:32:49', '0000-00-00 00:00:00'),
(155, 'American Foxhound', 'https://dwiggydoo.com/storage/app/public/breed/7JnYOkladQlO5CnmIRjWVIcdeMZ5yvXFfDraczkl.png', 0, 1, '2022-04-15 07:33:08', '0000-00-00 00:00:00'),
(156, 'American Hairless Terrier', 'https://dwiggydoo.com/storage/app/public/breed/NEFKgPiyWVtyvRI9FTrLJTUQEcGttecKSSFMrWRI.png', 0, 1, '2022-04-15 07:33:18', '0000-00-00 00:00:00'),
(157, 'American Staffordshire Terrier', 'https://dwiggydoo.com/storage/app/public/breed/9GPCOKHfnwcOzmoWXBK264iOt667bzyS9hZQvpLV.png', 0, 1, '2022-04-15 07:33:32', '0000-00-00 00:00:00'),
(158, 'American Water Spaniel', 'https://dwiggydoo.com/storage/app/public/breed/IbJMiaXmqGgv08WEGvMfHM0LMRTFbxiijpnPxtGQ.png', 0, 1, '2022-04-15 07:33:40', '0000-00-00 00:00:00'),
(159, 'Andalusian Hound', 'https://dwiggydoo.com/storage/app/public/breed/THbc5Kp6L6kiJ6I48lJdaWipELH5oHRwl7vu2AtV.png', 0, 1, '2022-04-15 07:33:54', '0000-00-00 00:00:00'),
(160, 'Anglo-Français de Petite Vénerie', 'https://dwiggydoo.com/storage/app/public/breed/S8oZtnX6y032n2oSUIsGi2dNIYDpbJdBZ3OMj4Bp.png', 0, 1, '2022-04-15 07:34:07', '0000-00-00 00:00:00'),
(161, 'Appenzeller Sennenhund', 'https://dwiggydoo.com/storage/app/public/breed/2xTuTDMuFdG6N3ssvLgTw0OovK5cTStMKVuLKEmH.png', 0, 1, '2022-04-15 07:34:20', '0000-00-00 00:00:00'),
(162, 'Argentine Polar Dog', 'https://dwiggydoo.com/storage/app/public/breed/LjfQNarnzITuQLJsFH7Egr2njKEmJdHfDAKTET6Y.png', 0, 1, '2022-04-15 07:34:29', '0000-00-00 00:00:00'),
(163, 'Ariegeois', 'https://dwiggydoo.com/storage/app/public/breed/hcDVUZKESvhRsmhEs4o1xv8F5Y8hlFRiXAL6cqMi.png', 0, 1, '2022-04-15 07:34:41', '0000-00-00 00:00:00'),
(164, 'Armant', 'https://dwiggydoo.com/storage/app/public/breed/Tjn0r6HH5GeuchxPjeffP6aeSIfP3Taw4NmMT3Jv.png', 0, 1, '2022-04-15 08:04:52', '0000-00-00 00:00:00'),
(165, 'Armenian Gampr dog', 'https://dwiggydoo.com/storage/app/public/breed/vCcuyljsTbupartV5mkzjBGKSdD7zde4ykQvLRWT.png', 0, 1, '2022-04-15 08:05:07', '0000-00-00 00:00:00'),
(166, 'Artois Hound', 'https://dwiggydoo.com/storage/app/public/breed/nyMw0ZQGe5up28bMA1lvjAV9Fqajq9bqKPZNGHg8.png', 0, 1, '2022-04-15 08:05:19', '0000-00-00 00:00:00'),
(167, 'Australian Kelpie', 'https://dwiggydoo.com/storage/app/public/breed/TW5XK2139ysRFSn06mHwi8gfByONBPhwpyD1VobW.png', 0, 1, '2022-04-15 08:05:31', '0000-00-00 00:00:00'),
(168, 'Australian Shepherd', 'https://dwiggydoo.com/storage/app/public/breed/cpbscE0DEMyHGak3ngInP6rWKmsd1qIN625hP8Q1.png', 0, 1, '2022-04-15 08:05:45', '0000-00-00 00:00:00'),
(169, 'Australian Stumpy Tail Cattle Dog', 'https://dwiggydoo.com/storage/app/public/breed/sw0R1cudnsCLsXlsZkEnr3k2P2j3PESjN9miDyW7.png', 0, 1, '2022-04-15 08:05:58', '0000-00-00 00:00:00'),
(170, 'Australian Terrier', 'https://dwiggydoo.com/storage/app/public/breed/Nv24SyOJHVRi6mYBaBEZOerpdr0EtvJaiMHUmI9u.png', 0, 1, '2022-04-15 08:06:09', '0000-00-00 00:00:00'),
(171, 'Austrian Black and Tan Hound', 'https://dwiggydoo.com/storage/app/public/breed/a1efWWigR1mBHD6yxRmf7XEwx1ZBmVQzuRD0UHuL.png', 0, 1, '2022-04-15 08:06:20', '0000-00-00 00:00:00'),
(172, 'Austrian Pinscher', 'https://dwiggydoo.com/storage/app/public/breed/kqwZXIKbMlDGUxeMiY4ZYUe18njoNgVhvFbutBxy.png', 0, 1, '2022-04-15 08:06:30', '0000-00-00 00:00:00'),
(173, 'Azawakh', 'https://dwiggydoo.com/storage/app/public/breed/ZdVjmb4q5aILqPh74FLfBS12NIjwFz0wbovdocAI.png', 0, 1, '2022-04-15 08:06:38', '0000-00-00 00:00:00'),
(174, 'Beauceron', 'https://dwiggydoo.com/storage/app/public/breed/gceFcffRinANPChFMcSwnD8rEUnEdSMKSC6wGr9t.png', 0, 1, '2022-04-18 07:03:00', '0000-00-00 00:00:00'),
(175, 'Bedlington Terrier', 'https://dwiggydoo.com/storage/app/public/breed/3py0t32VpBBvq082DVRtlTwt320fnyXqUIlXCrqT.jpg', 0, 1, '2022-04-18 07:05:49', '0000-00-00 00:00:00'),
(176, 'Belgian Mastiff', 'https://dwiggydoo.com/storage/app/public/breed/GIdCyxvsp9E7BPoUgVnjupcmEP7cqujemysvcDtB.jpg', 0, 1, '2022-04-18 07:30:36', '2022-04-18 07:47:39'),
(177, 'Bergamasco Shepherd', 'https://dwiggydoo.com/storage/app/public/breed/GLzmnXOasV4C31u1qdhmhRp7DsjvYfDptm7dRPXK.jpg', 0, 1, '2022-04-18 07:33:21', '0000-00-00 00:00:00'),
(178, 'Berger Picard', 'https://dwiggydoo.com/storage/app/public/breed/3SdJv8si8AUZOmWGlGIses4DqoGxcjrg6ekeyNJH.jpg', 0, 1, '2022-04-18 07:45:52', '0000-00-00 00:00:00'),
(179, 'Bernese Mountain Dog', 'https://dwiggydoo.com/storage/app/public/breed/WWkeAUN0kCde097SW0hlOe3wd0eYesOBJdrmuwHO.jpg', 0, 1, '2022-04-18 07:54:21', '0000-00-00 00:00:00'),
(180, 'Black and Tan Coonhound', 'https://dwiggydoo.com/storage/app/public/breed/HURPqBPbX8OYPtuQyAuSwjx5jtWXtLDoyRsKWEVN.jpg', 0, 1, '2022-04-18 07:59:10', '0000-00-00 00:00:00'),
(181, 'Black and Tan Terrier', 'https://dwiggydoo.com/storage/app/public/breed/eJpEKmRgWEmDU3MoFCbJMatC7gifxCGnBGo0eIVy.jpg', 0, 1, '2022-04-18 08:00:50', '0000-00-00 00:00:00'),
(182, 'Black Mouth Cur', 'https://dwiggydoo.com/storage/app/public/breed/YfTtevYXkFgTlyZHjeReZ3bSOmcn2910WTd2sOtI.jpg', 0, 1, '2022-04-18 08:42:27', '0000-00-00 00:00:00'),
(183, 'Black Norwegian Elkhound', 'https://dwiggydoo.com/storage/app/public/breed/oqNAt61UY0D06u3tdHN3vjnsxlmLk0ESVbyooWnT.jpg', 0, 1, '2022-04-18 08:43:55', '0000-00-00 00:00:00'),
(184, 'Black Russian Terrier', 'https://dwiggydoo.com/storage/app/public/breed/ijfEomWoaEa6TMncEDf2JtvcTfQ0QfTYs3TvZR4j.jpg', 0, 1, '2022-04-18 08:47:29', '0000-00-00 00:00:00'),
(185, 'Bloodhound dog', 'https://dwiggydoo.com/storage/app/public/breed/X29qSxMfzCMGgtss5HfYajuDV6gNqirB0RobLujE.jpg', 0, 1, '2022-04-18 08:50:11', '0000-00-00 00:00:00'),
(186, 'Blue Paul Terrier', 'https://dwiggydoo.com/storage/app/public/breed/XbpyH1MHUN0dxNThaKWQ1Ryyqngq6fpsLMuMTDtK.jpg', 0, 1, '2022-04-18 09:33:08', '0000-00-00 00:00:00'),
(187, 'Blue Picardy Spaniel', 'https://dwiggydoo.com/storage/app/public/breed/17JAMsOBDoGWFuVioRHXmxSyPd3bUeZ079onFxST.jpg', 0, 1, '2022-04-18 11:15:39', '0000-00-00 00:00:00'),
(188, 'Bluetick Coonhound', 'https://dwiggydoo.com/storage/app/public/breed/Ds9G2jPUo6ZYD8Z6hrQipaPNv1SesJjVVjgxSDXM.jpg', 0, 1, '2022-04-18 11:17:56', '0000-00-00 00:00:00'),
(189, 'Boerboel', 'https://dwiggydoo.com/storage/app/public/breed/PS3ZjIIjA9SPT0rohP0ojuobYsp6jQJBycsm6Ujy.jpg', 0, 1, '2022-04-18 11:20:09', '0000-00-00 00:00:00'),
(190, 'Bohemian Shepherd', 'https://dwiggydoo.com/storage/app/public/breed/m5k4ppuUqJOihZDxpH5zWBKWUqc8RSqTgY4TJ2zJ.jpg', 0, 1, '2022-04-18 11:23:28', '0000-00-00 00:00:00'),
(191, 'Bolognese', 'https://dwiggydoo.com/storage/app/public/breed/HQsIHwEiblUi9VR23aqjULiMrV193lTfxcK1oFjP.jpg', 0, 1, '2022-04-18 11:28:21', '0000-00-00 00:00:00'),
(192, 'Border Collie', 'https://dwiggydoo.com/storage/app/public/breed/oZdm0O1oW4ZahBCPgCAwLEEC9OqsPcZgQQMMbZsa.jpg', 0, 1, '2022-04-18 11:36:50', '0000-00-00 00:00:00'),
(193, 'Border Terrier', 'https://dwiggydoo.com/storage/app/public/breed/bkfF6Q8E32xy3KlfY2nGgMSj9rCzBbFhb2kxwZ9i.jpg', 0, 1, '2022-04-18 12:08:14', '0000-00-00 00:00:00'),
(194, 'Borzoi', 'https://dwiggydoo.com/storage/app/public/breed/Ag5CSAM2DigEMcva6bbq6MJMpHQNzUzk7dH0NUSZ.jpg', 0, 1, '2022-04-18 12:22:58', '0000-00-00 00:00:00'),
(195, 'Bosnian Coarse-haired Hound', 'https://dwiggydoo.com/storage/app/public/breed/EaW7bhbC7RmZsFgmTOUFjz4UsxVxDAwmtOCJuv1b.jpg', 0, 1, '2022-04-18 12:25:09', '0000-00-00 00:00:00'),
(196, 'Boston Terrier', 'https://dwiggydoo.com/storage/app/public/breed/L2rB9cPGZoRNHOLkmXOJax1mRoidWy1U1VRPOLIV.jpg', 0, 1, '2022-04-18 12:27:15', '0000-00-00 00:00:00'),
(197, 'Bouvier des Flandres', 'https://dwiggydoo.com/storage/app/public/breed/g5iHUqRhESRgQ3MjM7WLakM0DEqXLIEEroAQnWEr.jpg', 0, 1, '2022-04-18 12:33:04', '0000-00-00 00:00:00'),
(198, 'Boykin Spaniel', 'https://dwiggydoo.com/storage/app/public/breed/ZKm5bAudwVf29341FMuNbuiL9ILRbauO1wj9dSY1.jpg', 0, 1, '2022-04-18 12:36:22', '0000-00-00 00:00:00'),
(199, 'Bracco Italiano', 'https://dwiggydoo.com/storage/app/public/breed/8y30w6iVPbhBBXM79YbPAWu4b5dwXKEB19OXpgrP.jpg', 0, 1, '2022-04-18 12:37:48', '0000-00-00 00:00:00'),
(200, 'Braque d\'Auvergne', 'https://dwiggydoo.com/storage/app/public/breed/BBbD8uDtWyEeOkOhgfyV0fT4WleqkCI3dUH81IXU.jpg', 0, 1, '2022-04-18 12:41:57', '0000-00-00 00:00:00'),
(201, 'Braque de l\'Ariège', 'https://dwiggydoo.com/storage/app/public/breed/sUSjpmTIB7U5fdYrBgGDaKoe0LBWohOrfUUTpLrK.jpg', 0, 1, '2022-04-18 12:43:35', '0000-00-00 00:00:00'),
(202, 'Braque du Bourbonnais', 'https://dwiggydoo.com/storage/app/public/breed/r5PIfkjL0t3atlY5T1Vrm989IGgdDcnE2Zw9KrW4.jpg', 0, 1, '2022-04-18 12:47:58', '0000-00-00 00:00:00'),
(203, 'Ca Mè Mallorquí', 'https://dwiggydoo.com/storage/app/public/breed/73d8K1oi5FKpmw9umnJ4fTs9wxugbiQ79eZm72dn.png', 0, 1, '2022-04-20 05:16:30', '0000-00-00 00:00:00'),
(204, 'Cairn Terrier', 'https://dwiggydoo.com/storage/app/public/breed/HIfi1lk0rxDKoV2Lo1DepSUYYf6v0MEIDmfwxo3x.png', 0, 1, '2022-04-20 05:16:42', '0000-00-00 00:00:00'),
(205, 'Campeiro Bulldog', 'https://dwiggydoo.com/storage/app/public/breed/mnF3L5iMUqDvlXFAgcSj5exvgH8j9YjIyG1vCNzF.png', 0, 1, '2022-04-20 05:16:53', '0000-00-00 00:00:00'),
(206, 'Can de Chira', 'https://dwiggydoo.com/storage/app/public/breed/svEunmN1Pl1WDhkbTqtC7JXVAfO35rDbbiei6mmW.png', 0, 1, '2022-04-20 05:17:03', '0000-00-00 00:00:00'),
(207, 'Can de Palleiro', 'https://dwiggydoo.com/storage/app/public/breed/zsBlHg27poqPMucvtaB5pPgwsnBMkt2u89JxiZ3a.png', 0, 1, '2022-04-20 05:17:12', '0000-00-00 00:00:00'),
(208, 'Canaan Dog', 'https://dwiggydoo.com/storage/app/public/breed/RsqpTNKN5YpM10bVl816cnTKxURTPMeYieys56Td.png', 0, 1, '2022-04-20 05:17:22', '0000-00-00 00:00:00'),
(209, 'Canadian Eskimo Dog', 'https://dwiggydoo.com/storage/app/public/breed/gaQ3FK3FSLK0g8pRnKo0v84Fd6V1Q2zZJt94RB09.png', 0, 1, '2022-04-20 05:17:31', '0000-00-00 00:00:00'),
(210, 'Cane di Oropa', 'https://dwiggydoo.com/storage/app/public/breed/ZXHf6ynuWeCg9J0UOgpENXGhfyaYNG9HDb3yiV5s.png', 0, 1, '2022-04-20 05:18:04', '0000-00-00 00:00:00'),
(211, 'Cane Paratore', 'https://dwiggydoo.com/storage/app/public/breed/AnZbNFFh3cPfbXVFK7MfZeQkBD3S3FSytbqLjQJk.png', 0, 1, '2022-04-20 05:18:21', '0000-00-00 00:00:00'),
(212, 'Cantabrian Water Dog', 'https://dwiggydoo.com/storage/app/public/breed/tn23oluU3m2KgPi9FOVzGS4QO2uk1KyIdNSPh4sG.png', 0, 1, '2022-04-20 05:18:40', '0000-00-00 00:00:00'),
(213, 'Cão da Serra de Aires', 'https://dwiggydoo.com/storage/app/public/breed/D9j5ApcfhGeqCB7lhEwXoZBUf8wpUmAUrY2WSeuX.png', 0, 1, '2022-04-20 05:18:50', '0000-00-00 00:00:00'),
(214, 'Cão de Castro Laboreiro', 'https://dwiggydoo.com/storage/app/public/breed/AkA9MmfB3d88dLhO3ZtJaeFHIT8rlcSnElAdlpdC.png', 0, 1, '2022-04-20 05:18:58', '0000-00-00 00:00:00'),
(215, 'Cão de Gado Transmontano', 'https://dwiggydoo.com/storage/app/public/breed/ml5ndluZuNy2bvUAUM6aKCj1tJ8Ywh2vvmec3X0a.png', 0, 1, '2022-04-20 05:19:09', '0000-00-00 00:00:00'),
(216, 'Cão Fila de São Miguel', 'https://dwiggydoo.com/storage/app/public/breed/XLwtrinSe9EkRdPMkyF2ypD9tmBUPamKdXJbqZhn.png', 0, 1, '2022-04-20 05:21:18', '0000-00-00 00:00:00'),
(217, 'Cardigan Welsh Corgi', 'https://dwiggydoo.com/storage/app/public/breed/3pjKYiCADGRJRXTUNnw3PwbBpItNyD24YuwMLvp1.png', 0, 1, '2022-04-20 05:21:31', '0000-00-00 00:00:00'),
(218, 'Carea Castellano Manchego', 'https://dwiggydoo.com/storage/app/public/breed/jOkEW4kEnEvgF5dW6TMlRmXg1v8nbqJjGcpgkayf.png', 0, 1, '2022-04-20 05:21:42', '0000-00-00 00:00:00'),
(219, 'Carea Leonés', 'https://dwiggydoo.com/storage/app/public/breed/fbNTCu0vFO8g2mclSlz4L8j8S5rmOPCrMlOhpN6P.png', 0, 1, '2022-04-20 05:21:51', '0000-00-00 00:00:00'),
(220, 'Carolina Dog', 'https://dwiggydoo.com/storage/app/public/breed/KTJYEi7tsn2BylRXp3AeuO5GwspoNKnEeTPtSMa2.png', 0, 1, '2022-04-20 05:22:07', '0000-00-00 00:00:00'),
(221, 'Carpathian Shepherd Dog', 'https://dwiggydoo.com/storage/app/public/breed/iriFp874qzHAAx7J9qfiKrgtVhX5QtWArhrba9Kf.png', 0, 1, '2022-04-20 05:22:23', '0000-00-00 00:00:00'),
(222, 'Catahoula Leopard Dog', 'https://dwiggydoo.com/storage/app/public/breed/NHo5Ub4iXetD5xtrQuFkUbceyHfwkyE6vCBVTXcJ.png', 0, 1, '2022-04-20 05:22:36', '0000-00-00 00:00:00'),
(223, 'Catalan Sheepdog', 'https://dwiggydoo.com/storage/app/public/breed/qcBJe8S51AoX11lE6ymQIWUfdBRbaSV46CDsCTHU.png', 0, 1, '2022-04-20 05:22:54', '0000-00-00 00:00:00'),
(224, 'Caucasian Shepherd Dog', 'https://dwiggydoo.com/storage/app/public/breed/ZgmRFni3bBF6xerSzdeubO62z2hrpTY2pp841WcJ.png', 0, 1, '2022-04-20 05:23:06', '0000-00-00 00:00:00'),
(225, 'Cavalier King Charles Spaniel', 'https://dwiggydoo.com/storage/app/public/breed/qsJobOJZtYsb5MifO2O27bSF71NSSNDzns7VLt5G.png', 0, 1, '2022-04-20 05:24:59', '0000-00-00 00:00:00'),
(226, 'Central Asian Shepherd Dog', 'https://dwiggydoo.com/storage/app/public/breed/Z0Uh7UkUzl09dSWoxnQUGp9Qr762XcC0SfwjoyCC.png', 0, 1, '2022-04-20 05:25:08', '0000-00-00 00:00:00'),
(227, 'Cesky Fousek', 'https://dwiggydoo.com/storage/app/public/breed/12ax1Ju6bYP29sl5tS8qeY7TvTEwGdXcbeyrmJNF.png', 0, 1, '2022-04-20 05:25:23', '0000-00-00 00:00:00'),
(228, 'Cesky Terrier', 'https://dwiggydoo.com/storage/app/public/breed/ZptVYq9KNGlR5H6gP5DWfCxA57ANnKbA3iLCPclX.png', 0, 1, '2022-04-20 05:25:35', '0000-00-00 00:00:00'),
(229, 'Chesapeake Bay Retriever', 'https://dwiggydoo.com/storage/app/public/breed/d9MIQ1pzMupITXc4KuIFk1zOlyiDxO0RTEigYStB.png', 0, 1, '2022-04-20 05:25:44', '0000-00-00 00:00:00'),
(230, 'Chien Français Blanc et Noir', 'https://dwiggydoo.com/storage/app/public/breed/sp97YX778ioGUwHrJi8HMFxvHGl2Uh7cvEw5hM4X.png', 0, 1, '2022-04-20 05:25:54', '0000-00-00 00:00:00'),
(231, 'Chien Français Blanc et Orange', 'https://dwiggydoo.com/storage/app/public/breed/nNasqXZS04NYU4eqyBmXt06IwmPpYdZeHjGk7cOa.png', 0, 1, '2022-04-20 05:26:02', '0000-00-00 00:00:00'),
(232, 'Chien Français Tricolore', 'https://dwiggydoo.com/storage/app/public/breed/507LIMJAAx0vgsja4yVsBdLN9YFUAVj55p8aORmz.png', 0, 1, '2022-04-20 05:26:10', '0000-00-00 00:00:00'),
(233, 'Chien-gris', 'https://dwiggydoo.com/storage/app/public/breed/H17JoQXjf1ooxZK3AVzKNmpMZlWg84P8biEwJwde.png', 0, 1, '2022-04-20 05:26:18', '0000-00-00 00:00:00'),
(234, 'Chihuahua', 'https://dwiggydoo.com/storage/app/public/breed/BlWNEMkG7oIyFrvF7DKoMBlWeViKm0KGsogMwWHC.png', 0, 1, '2022-04-20 05:26:29', '0000-00-00 00:00:00'),
(235, 'Chilean Terrier', 'https://dwiggydoo.com/storage/app/public/breed/HTmfY6EwiO6SIngW4XsPr0XRxJ4SsABeia1jeLwX.png', 0, 1, '2022-04-20 05:26:39', '0000-00-00 00:00:00'),
(236, 'Chinese Crested Dog', 'https://dwiggydoo.com/storage/app/public/breed/TpEm6QInlmx4nesazlyrtULg2ErbuTPZZDOIgIwm.png', 0, 1, '2022-04-20 05:26:51', '0000-00-00 00:00:00'),
(237, 'Chinook', 'https://dwiggydoo.com/storage/app/public/breed/jzNERyOnAOz9xGjpqsEltTm6thYdOUV8rKcCEqur.png', 0, 1, '2022-04-20 05:27:02', '0000-00-00 00:00:00'),
(238, 'Chippiparai', 'https://dwiggydoo.com/storage/app/public/breed/riTb9iYrqorY1u8gaAZNI8cmTVeSUvu1XyQ7aRTw.png', 0, 1, '2022-04-20 05:27:10', '0000-00-00 00:00:00'),
(239, 'Chongqing dog', 'https://dwiggydoo.com/storage/app/public/breed/IbVjACBIqb0IG0g1h2XlOv9wR7dA4Jj3hU6MgN4s.png', 0, 1, '2022-04-20 05:27:21', '0000-00-00 00:00:00'),
(240, 'Chortai', 'https://dwiggydoo.com/storage/app/public/breed/SFb52O20gVQB5yil750Fr4tYhjS8aL9SUGdqRzyM.png', 0, 1, '2022-04-20 05:27:31', '0000-00-00 00:00:00'),
(241, 'Braque Francais', 'https://dwiggydoo.com/storage/app/public/breed/Wu01b82PADwuCItM85ajAvaZN8r778g82BN2xS4k.jpg', 0, 1, '2022-04-20 05:33:42', '0000-00-00 00:00:00'),
(242, 'Braque Saint-Germain', 'https://dwiggydoo.com/storage/app/public/breed/VaD5DR09cqnugngisxbgUw2xBArtxmn10X9RPKfP.jpg', 0, 1, '2022-04-20 05:36:42', '0000-00-00 00:00:00'),
(243, 'Briard', 'https://dwiggydoo.com/storage/app/public/breed/qAeblpafqiSJPjHJ8opAYIljyW4XpWxFXQq6wxeL.jpg', 0, 1, '2022-04-20 05:38:42', '0000-00-00 00:00:00'),
(244, 'Briquet Griffon Vendéen', 'https://dwiggydoo.com/storage/app/public/breed/v7ZdPEPczLV372DGJdh7fAn3cdX3945McdqcsXbg.jpg', 0, 1, '2022-04-20 05:41:02', '0000-00-00 00:00:00'),
(245, 'Broholmer', 'https://dwiggydoo.com/storage/app/public/breed/jiqoUjraavjraO5ByuO8ireFGo3jaeIJ2KSvou8m.jpg', 0, 1, '2022-04-20 05:43:49', '0000-00-00 00:00:00'),
(246, 'Bruno Jura Hound', 'https://dwiggydoo.com/storage/app/public/breed/hHCve9VNec0PdcOJBIIBS6cJjAJLzChwmbcLaysr.jpg', 0, 1, '2022-04-20 05:52:11', '0000-00-00 00:00:00'),
(247, 'Brussels Griffon', 'https://dwiggydoo.com/storage/app/public/breed/1vmrqu66TlT689wJcyMGE9g7AlYgrfkKe5k2JM1M.jpg', 0, 1, '2022-04-20 05:54:57', '0000-00-00 00:00:00'),
(248, 'Bull and terrier', 'https://dwiggydoo.com/storage/app/public/breed/D3vpmyMcqgHEBogPQlAsaRNlRnt4IcH5oI6wDXyF.jpg', 0, 1, '2022-04-20 05:58:01', '0000-00-00 00:00:00'),
(249, 'Bull Arab', 'https://dwiggydoo.com/storage/app/public/breed/d79G1zOZoC5TwQ8F7N4dCsIJzKH9N1hacmRKXSsC.png', 0, 1, '2022-04-22 05:44:35', '0000-00-00 00:00:00'),
(250, 'Bull Terrier', 'https://dwiggydoo.com/storage/app/public/breed/wOCA2KHq1udrpq6ohD5fPm4u6WlyhGiw6UGvC5A8.jpg', 0, 1, '2022-04-22 05:46:49', '0000-00-00 00:00:00'),
(251, 'Bullenbeisser', 'https://dwiggydoo.com/storage/app/public/breed/RQRUDpp26nLL2SH1NqgM8W0RgGzXbyPEfuIVF5Ko.jpg', 0, 1, '2022-04-22 05:51:54', '0000-00-00 00:00:00'),
(252, 'Bullmastiff', 'https://dwiggydoo.com/storage/app/public/breed/zS24mdL90EyMym9ySDicXNxyKE0mq491ZcDP6mSh.jpg', 0, 1, '2022-04-25 10:56:31', '0000-00-00 00:00:00'),
(253, 'Bully Kutta', 'https://dwiggydoo.com/storage/app/public/breed/2TfuEyGURvgtkhxxqEmtor5MfrqtLE0fDkjmEEza.jpg', 0, 1, '2022-04-25 10:59:17', '0000-00-00 00:00:00'),
(254, 'Burgos Pointer', 'https://dwiggydoo.com/storage/app/public/breed/wkzRTfteq9TdGiE3yZbg8FOy5dAadVYcuInkJjAa.jpg', 0, 1, '2022-04-25 11:01:11', '0000-00-00 00:00:00'),
(255, 'Cimarrón Uruguayo', 'https://dwiggydoo.com/storage/app/public/breed/qRWt0ncWdMYFATuw8ZtVDVC09jUCVgR8uhQh4fee.jpg', 0, 1, '2022-04-25 11:11:05', '0000-00-00 00:00:00'),
(256, 'Cirneco dell\'Etna', 'https://dwiggydoo.com/storage/app/public/breed/kVnbs9OfQ3Vz23MVcb2PtNnq0mGmNseyEIc6cuGq.jpg', 0, 1, '2022-04-25 11:14:34', '0000-00-00 00:00:00'),
(257, 'Clumber Spaniel', 'https://dwiggydoo.com/storage/app/public/breed/FZajiokbkCjKr45Zb6jFn7TQx1L88wKadybuGKQm.jpg', 0, 1, '2022-04-25 11:19:04', '0000-00-00 00:00:00'),
(258, 'Cockapoo', 'https://dwiggydoo.com/storage/app/public/breed/0AZkDpTAogobUZfgErcy9v8hm19uaqyoKfT2S9OE.jpg', 0, 1, '2022-04-25 11:22:32', '0000-00-00 00:00:00'),
(259, 'Cordoba Fighting Dog', 'https://dwiggydoo.com/storage/app/public/breed/kVP5sC3M1fjXr4Bh5CWbU8Mht25W1is7CnNICIJP.jpg', 0, 1, '2022-04-26 05:38:14', '0000-00-00 00:00:00'),
(260, 'Coton de Tulear', 'https://dwiggydoo.com/storage/app/public/breed/XV8A1SVuyGAN7CnMDsuR7oI8S8QEpUYodU9RhDZ2.jpg', 0, 1, '2022-04-26 05:41:18', '0000-00-00 00:00:00'),
(261, 'Cretan Hound', 'https://dwiggydoo.com/storage/app/public/breed/OV8jqGPrVMDgpHFiA5Bge6y402hzZDS2as2QGq4v.jpg', 0, 1, '2022-04-26 05:42:54', '0000-00-00 00:00:00'),
(262, 'Croatian Sheepdog', 'https://dwiggydoo.com/storage/app/public/breed/xedWf4N0jd0OBxIoTlIemauOv4vQ44AEYAAY2r9n.jpg', 0, 1, '2022-04-26 05:43:55', '0000-00-00 00:00:00'),
(263, 'Culture Pomeranian', 'https://dwiggydoo.com/storage/app/public/breed/nourOJZD9ojPKJhXg1TJcYT3awPGXf9I7kiGbEIp.jpg', 0, 1, '2022-04-26 05:53:45', '0000-00-00 00:00:00'),
(264, 'Cumberland Sheepdog', 'https://dwiggydoo.com/storage/app/public/breed/H9TjBWKplUxAqAkrdsbAXLCniKMyoD5Ji1kczJ9o.jpg', 0, 1, '2022-04-26 05:55:27', '0000-00-00 00:00:00'),
(265, 'Cur', 'https://dwiggydoo.com/storage/app/public/breed/yVNKfF67e1SVJLTc6bFt8PpJFAJmZqQ7rjL1T5Pi.jpg', 0, 1, '2022-04-26 05:58:52', '0000-00-00 00:00:00'),
(266, 'Curly-Coated Retriever', 'https://dwiggydoo.com/storage/app/public/breed/YjnKamPOidWjFPFvoqqraKolR6Qj2MLThMOt5I4p.jpg', 0, 1, '2022-04-26 06:00:03', '0000-00-00 00:00:00'),
(267, 'Cursinu', 'https://dwiggydoo.com/storage/app/public/breed/XznY36jlJC5jaHBN6lMYHWQdxDeeZB014IlHH93F.jpg', 0, 1, '2022-04-26 06:01:57', '0000-00-00 00:00:00'),
(268, 'Czechoslovakian Wolfdog', 'https://dwiggydoo.com/storage/app/public/breed/BMGTeDuVqqpgzPcQlBp8mPGzZAGmTKGJwYpTOL6b.jpg', 0, 1, '2022-04-26 06:03:22', '0000-00-00 00:00:00'),
(269, 'Dachshund', 'https://dwiggydoo.com/storage/app/public/breed/oveW78cR5vCQCMhWcLZwZg6MopXzoxypskbVkDSp.jpg', 0, 1, '2022-04-26 06:04:20', '0000-00-00 00:00:00'),
(270, 'Dalmatian', 'https://dwiggydoo.com/storage/app/public/breed/5c8aLWY3pJQpJqGOF1X563ekYIj7M5kaM58DjF0c.jpg', 0, 1, '2022-04-26 06:09:06', '0000-00-00 00:00:00'),
(271, 'Dandie Dinmont Terrier', 'https://dwiggydoo.com/storage/app/public/breed/E5YFpQBEh0Bv5DW3O2l30B6kzJCz3QNTQtirpp8g.jpg', 0, 1, '2022-04-26 06:10:58', '0000-00-00 00:00:00'),
(272, 'Danish Spitz', 'https://dwiggydoo.com/storage/app/public/breed/2R48wqyliXGFGuUxo1JhCjm4YyavXAlu2dJWI3lp.jpg', 0, 1, '2022-04-26 06:11:59', '0000-00-00 00:00:00'),
(273, 'Danish-Swedish Farmdog', 'https://dwiggydoo.com/storage/app/public/breed/dw5j0tL7xDPXF3p4x7VMmqfZvuM7oFczQHeX0UV3.jpg', 0, 1, '2022-04-26 06:13:44', '0000-00-00 00:00:00'),
(274, 'Denmark Feist', 'https://dwiggydoo.com/storage/app/public/breed/IpEYbo0hinIUiPcrE31Yd2shwsS38P0vW1IV1Vrt.jpg', 0, 1, '2022-04-26 06:34:07', '0000-00-00 00:00:00'),
(275, 'Dingo', 'https://dwiggydoo.com/storage/app/public/breed/q2wPYJXpyGAHnGk5LyLcdf4xJWqnhtZAEvIXklNi.jpg', 0, 1, '2022-04-26 06:36:13', '0000-00-00 00:00:00'),
(276, 'Dogo cubano', 'https://dwiggydoo.com/storage/app/public/breed/kyMF7WgOy2Ie7Fe9Yhjgl7qpBXFu47mw46wxHUXU.jpg', 0, 1, '2022-04-26 06:47:01', '0000-00-00 00:00:00'),
(277, 'Dogo Guatemalteco', 'https://dwiggydoo.com/storage/app/public/breed/DAwENIJIVOKvyuu1uBRpzWRxQxPKgom5FE2wnWqc.jpg', 0, 1, '2022-04-26 06:50:12', '0000-00-00 00:00:00'),
(278, 'Dogo Sardesco', 'https://dwiggydoo.com/storage/app/public/breed/Wc1jX65wVWsAlEpI9ifwhxQmcS2YuvShURE8HP6s.jpg', 0, 1, '2022-04-26 06:55:53', '0000-00-00 00:00:00'),
(279, 'Dogue Brasileiro', 'https://dwiggydoo.com/storage/app/public/breed/rSXAbadAGb84JBDC4b6p4rkXv1RFPBxFceINVuek.jpg', 0, 1, '2022-04-26 09:53:36', '0000-00-00 00:00:00'),
(280, 'Drentse Patrijshond', 'https://dwiggydoo.com/storage/app/public/breed/JyLi93Iv4cHaUd2vzeTX6ZQQTixRtuL4zLCvNHjm.jpg', 0, 1, '2022-04-26 09:56:14', '0000-00-00 00:00:00'),
(281, 'Drever', 'https://dwiggydoo.com/storage/app/public/breed/xXHGhmIM10FDQgHKYdL21DOZbCQkr9BYceFX6HPz.jpg', 0, 1, '2022-04-26 09:58:38', '0000-00-00 00:00:00'),
(282, 'Dumfriesshire Black and Tan Foxhound', 'https://dwiggydoo.com/storage/app/public/breed/3FAzCP3dnOx2SL8rQQTv9qoNCd2ulwD0uMXUnoZA.jpg', 0, 1, '2022-04-26 10:02:31', '0000-00-00 00:00:00'),
(283, 'Dunker', 'https://dwiggydoo.com/storage/app/public/breed/OMWD4eDuDRJdYWXihNGZQkYK2NOHHyKbSL2SmcuJ.png', 0, 1, '2022-04-27 05:27:43', '0000-00-00 00:00:00'),
(284, 'Dutch Shepherd', 'https://dwiggydoo.com/storage/app/public/breed/XsuQtv5dF6Zf5RvryqdTUyyQ4E2bLfaA3wMkoK88.png', 0, 1, '2022-04-27 05:30:38', '0000-00-00 00:00:00'),
(285, 'Dutch Smoushond', 'https://dwiggydoo.com/storage/app/public/breed/byvzb320dj1av5yC3QzhvOyIU4iUkiyOdSFS3RuB.png', 0, 1, '2022-04-27 05:32:21', '0000-00-00 00:00:00'),
(286, 'East European Shepherd', 'https://dwiggydoo.com/storage/app/public/breed/mG9KFvuQHBIc9xsjeT8QfrWrG4hzcnq2AVSXYUGK.png', 0, 1, '2022-04-27 05:41:04', '0000-00-00 00:00:00'),
(287, 'East Siberian Laika', 'https://dwiggydoo.com/storage/app/public/breed/1n5KIgbJQ2mgT8SJ6Te2tYc0Z7OgaA4pL7t1sXTk.png', 0, 1, '2022-04-27 05:42:13', '0000-00-00 00:00:00'),
(288, 'Ecuadorian Hairless Dog', 'https://dwiggydoo.com/storage/app/public/breed/m7WiEExPfJPyjymnL4wwOoqE6c1uM3LF9HFuPrMZ.png', 0, 1, '2022-04-27 05:43:36', '0000-00-00 00:00:00'),
(289, 'English Foxhound', 'https://dwiggydoo.com/storage/app/public/breed/x3xBlvOAudNfNpCoGlMdJzkvYNNWSIyH4Scsdgeb.png', 0, 1, '2022-04-27 05:44:58', '0000-00-00 00:00:00'),
(290, 'English Mastiff', 'https://dwiggydoo.com/storage/app/public/breed/bIySZaVh47AjXmyrnyjS7uB2nlGi4G9xAYYvfWYx.png', 0, 1, '2022-04-27 05:46:02', '0000-00-00 00:00:00'),
(291, 'English Setter', 'https://dwiggydoo.com/storage/app/public/breed/W3L0n9vxJ0TqrScyx85t31hDc5mD7GLd7JCc0Pvt.png', 0, 1, '2022-04-27 05:47:13', '0000-00-00 00:00:00'),
(292, 'English Shepherd', 'https://dwiggydoo.com/storage/app/public/breed/uGBsHfr2sFjP7gvIWxVWpFCACRnLHeRlQUGEM9da.png', 0, 1, '2022-04-27 05:48:52', '0000-00-00 00:00:00'),
(293, 'English Springer Spaniel', 'https://dwiggydoo.com/storage/app/public/breed/grWatKgiRmSbYxTVY7NBsHmBYXEPmcGaE763WRij.png', 0, 1, '2022-04-27 05:49:57', '0000-00-00 00:00:00'),
(294, 'English Toy Terrier (Black & Tan)', 'https://dwiggydoo.com/storage/app/public/breed/MkEZEHycLEGVjKCvNuat8YAXH0pAZ4bZtGsMRFe4.png', 0, 1, '2022-04-27 05:50:57', '0000-00-00 00:00:00'),
(295, 'English Water Spaniel', 'https://dwiggydoo.com/storage/app/public/breed/4S7GlBvX1goY1BvSbAugSSfJdGlN7Ao09kTl7eWw.png', 0, 1, '2022-04-27 05:52:19', '0000-00-00 00:00:00'),
(296, 'English White Terrier', 'https://dwiggydoo.com/storage/app/public/breed/dq9xcueUeducsKQY3q4fsum9hKqYuPw4ves6KEyt.png', 0, 1, '2022-04-27 05:56:34', '0000-00-00 00:00:00'),
(297, 'Estonian Hound', 'https://dwiggydoo.com/storage/app/public/breed/xjGm0OrKtY69rPSyQ1lrE0q2RUzAx59LlXYQT1uZ.png', 0, 1, '2022-04-27 06:01:13', '0000-00-00 00:00:00'),
(298, 'Estrela Mountain Dog', 'https://dwiggydoo.com/storage/app/public/breed/Z6mAgNUXDnKxkSJkyPh7BBDTzLzAj9W4tKerIcvI.png', 0, 1, '2022-04-27 06:02:26', '0000-00-00 00:00:00'),
(299, 'Eurasier', 'https://dwiggydoo.com/storage/app/public/breed/0qRNjvq7aYMlBneDTmXeaoDFaFed7Sr28XY48ywB.png', 0, 1, '2022-04-27 06:03:48', '0000-00-00 00:00:00'),
(300, 'Field Spaniel', 'https://dwiggydoo.com/storage/app/public/breed/rAx4zkABkaqzAyUCE3NnPvoArq1PBtQMA0KGrKCQ.png', 0, 1, '2022-04-27 07:34:39', '0000-00-00 00:00:00'),
(301, 'Fila Brasileiro', 'https://dwiggydoo.com/storage/app/public/breed/zLpFRakcSR0RgO5stlIiJb4dZbCzm0goFFV1oBCA.png', 0, 1, '2022-04-27 07:36:26', '0000-00-00 00:00:00'),
(302, 'Fila da Terceira', 'https://dwiggydoo.com/storage/app/public/breed/toAtWhJt6LCk1Nnz59ZIxAg5bJoe60r4UgCEX80j.png', 0, 1, '2022-04-27 07:37:47', '0000-00-00 00:00:00'),
(303, 'Finnish Hound', 'https://dwiggydoo.com/storage/app/public/breed/8elAeA7Df46GZqM8kE6biv91ml5okF1jlQJrAXHz.png', 0, 1, '2022-04-27 07:40:16', '0000-00-00 00:00:00'),
(304, 'Finnish Lapphund', 'https://dwiggydoo.com/storage/app/public/breed/tfTeRuJ6SaOUtyufXbm9mi5gxNo9qWs1YL0t5nQ7.png', 0, 1, '2022-04-27 07:42:20', '0000-00-00 00:00:00'),
(305, 'Flat-Coated Retriever', 'https://dwiggydoo.com/storage/app/public/breed/1mxHLD59pEG2h4dcBphZkzDs4ZYDOYMf8GAO5IB9.png', 0, 1, '2022-04-27 07:46:41', '0000-00-00 00:00:00'),
(306, 'French Spaniel', 'https://dwiggydoo.com/storage/app/public/breed/xcWcbVK1rZTvUWuqVY3jqgc9GSRY5W6HyPFKQBCQ.png', 0, 1, '2022-04-27 07:46:55', '2022-04-27 07:48:31'),
(307, 'Galgo Español', 'https://dwiggydoo.com/storage/app/public/breed/Ij4COANJaIjKifBJwW0rqu29t1RjUsniminsjVBD.png', 0, 1, '2022-04-27 07:50:18', '0000-00-00 00:00:00'),
(308, 'Garafian Shepherd', 'https://dwiggydoo.com/storage/app/public/breed/85WhXiKjPrcpEOrL4HEqIImSWFYWCV5de43dS0sC.png', 0, 1, '2022-04-27 07:51:54', '0000-00-00 00:00:00'),
(309, 'Gascon Saintongeois', 'https://dwiggydoo.com/storage/app/public/breed/dQinvSGrAwbFrQq8I3iy3yekgly2QBTQR1RYWuoS.png', 0, 1, '2022-04-27 07:52:58', '0000-00-00 00:00:00'),
(310, 'German Hound', 'https://dwiggydoo.com/storage/app/public/breed/vW46LzZtipeEkWCwsR7IWKvmUcdQHIEpbOxAhXqL.png', 0, 1, '2022-04-27 07:58:23', '0000-00-00 00:00:00'),
(311, 'German Longhaired Pointer', 'https://dwiggydoo.com/storage/app/public/breed/bdywNHKHTCDyJ4YKvGRKAFunZE4knMxEiYVAU1uJ.png', 0, 1, '2022-04-27 07:58:24', '2022-04-27 08:02:57'),
(312, 'German Pinscher', 'https://dwiggydoo.com/storage/app/public/breed/pf9Ha71hs3SI1fizBVREJNXWgQuNOY511zwgOoUW.png', 0, 1, '2022-04-27 13:28:23', '0000-00-00 00:00:00'),
(313, 'German Roughhaired Pointer', 'https://dwiggydoo.com/storage/app/public/breed/cKt9zFEH5vJ9lK98UMV7Iax4aeVPolT2qAUemIC4.png', 0, 1, '2022-04-27 13:29:20', '0000-00-00 00:00:00'),
(314, 'German Shorthaired Pointer', 'https://dwiggydoo.com/storage/app/public/breed/LnytjPhHR9VBxovXvWQEDjTlc710rMnbJyeN6ln5.png', 0, 1, '2022-04-27 13:31:56', '0000-00-00 00:00:00'),
(315, 'German Spaniel', 'https://dwiggydoo.com/storage/app/public/breed/BSb0fT8zFHhbNT3HBSVAE1rQTBQpMUWNFMoDwidk.png', 0, 1, '2022-04-27 13:33:30', '0000-00-00 00:00:00'),
(316, 'German Wirehaired Pointer', 'https://dwiggydoo.com/storage/app/public/breed/Fpm6T95tpkLId1z8YZxVPoXJGyMFscQka6gYvxTg.png', 0, 1, '2022-04-27 13:35:20', '0000-00-00 00:00:00'),
(317, 'Giant Schnauzer', 'https://dwiggydoo.com/storage/app/public/breed/kgdJyADiv28jZDLxkKy1DiFtLsSWM94iXqcZgcUj.png', 0, 1, '2022-04-27 13:36:16', '0000-00-00 00:00:00'),
(318, 'Glen of Imaal Terrier', 'https://dwiggydoo.com/storage/app/public/breed/Uah0iCB7Pd7vIMHJ2TrgI0JDMEZabCGjBO37lifF.png', 0, 1, '2022-04-27 13:37:14', '0000-00-00 00:00:00'),
(319, 'Meme', 'https://dwiggydoo.com/storage/app/public/breed/zh6hJbNTOq9tkVnVpne1jXoIuf4SM0MshIxHS7yJ.jpg', 0, 1, '2022-04-28 07:51:12', '2022-04-28 07:51:45'),
(320, 'Husky', 'https://dwiggydoo.com/storage/app/public/breed/9AxDFRygNaf63zgaBw9kscfcDQVq2tlpzVpzXvMH.jpg', 0, 1, '2022-11-24 07:16:12', '0000-00-00 00:00:00'),
(321, 'Shitzu Tzu', 'https://dwiggydoo.com/storage/app/public/breed/EmwrS7TYZmwRd038H8F9gjsdKhKxbyM3FJj8IUqF.jpg', 0, 1, '2022-11-24 07:21:04', '2023-07-10 04:46:01');

-- --------------------------------------------------------

--
-- Table structure for table `business_settings`
--

CREATE TABLE `business_settings` (
  `id` int(11) NOT NULL,
  `type` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `value` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `business_settings`
--

INSERT INTO `business_settings` (`id`, `type`, `value`, `created_at`, `updated_at`) VALUES
(1, 'email_verification', '1', '2023-06-14 13:10:03', '2023-06-14 13:10:03'),
(2, 'referral_system', '1', '2023-06-16 05:45:53', '2023-06-16 05:45:53'),
(3, 'referral_system_message', 'You have earned these points by refferal signup.', '2023-06-16 09:17:40', '2023-06-16 09:17:40'),
(4, 'referral_system_points', '10', '2023-06-16 09:21:02', '2023-06-16 09:21:02'),
(7, 'referral_system_ru_message', 'You have earned signup points', '2023-06-16 09:56:36', '2023-06-16 09:56:36'),
(8, 'referral_system_ru_points', '10', '2023-06-16 09:21:02', '2023-06-16 09:21:02'),
(9, 'referral_system_ru', '1', '2023-06-16 05:45:53', '2023-06-16 05:45:53'),
(10, 'dashboard_title', 'DwiggyDoo', '2023-07-04 10:32:24', '2023-07-04 10:33:34'),
(11, 'dashboard_copyright', '© Dwiggydoo v5.743333', '2023-07-04 10:32:24', '2023-08-02 23:28:38'),
(12, 'dashboard_logo', '102', '2023-07-04 10:32:24', '2023-07-04 11:04:01'),
(13, 'dashboard_fav_icon', '102', '2023-07-04 10:32:24', '2023-07-04 11:04:01'),
(14, 'dashboard_loader_icon', '102', '2023-07-04 10:32:24', '2023-07-04 11:04:01'),
(15, 'dashboard_login_background', '103', '2023-07-04 10:32:24', '2023-07-04 11:09:10'),
(16, 'dashboard_registration_background', '103', '2023-07-04 10:32:24', '2023-07-04 11:09:10'),
(17, 'dashboard_notifications', 'Notification', '2023-07-04 10:32:24', '2023-07-04 11:02:06'),
(18, 'social_link_name', '[\"0\"]', '2023-07-07 11:46:40', '2023-07-10 05:23:22'),
(19, 'social_link_url', '[null]', '2023-07-07 11:46:40', '2023-07-10 05:23:22'),
(20, 'dashboard_theme_color', 'light', '2023-07-07 06:46:39', '2023-08-02 06:33:34'),
(21, 'dashboard_base_color', 'orange', '2023-07-07 06:46:39', '2023-08-02 05:56:39'),
(22, 'dashboard_rtl_version', 'null', '2023-07-07 06:46:39', '2023-07-07 06:46:53'),
(23, 'site_title', 'Test', '2023-07-10 05:22:43', '2023-07-10 05:22:57'),
(24, 'site_meta_keyword', 'dfgssdf', '2023-07-10 05:22:43', '2023-07-10 05:22:58'),
(25, 'site_meta_description', 'tas', '2023-07-10 05:22:43', '2023-07-10 05:22:58'),
(26, 'site_logo', 'null', '2023-07-10 05:22:43', '2023-07-10 05:22:43'),
(27, 'site_fav_icon', 'null', '2023-07-10 05:22:44', '2023-07-10 05:22:44'),
(28, 'site_login_background', '104', '2023-07-10 05:22:44', '2023-08-02 23:55:27'),
(29, 'site_registration_background', 'null', '2023-07-10 05:22:44', '2023-07-10 05:22:44');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(355) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(9, 'Category 1', 'category-1', '2023-08-04 03:50:28', '2023-08-04 03:50:28'),
(10, 'Category 2', 'category-2', '2023-08-04 03:50:36', '2023-08-04 03:50:36');

-- --------------------------------------------------------

--
-- Table structure for table `category_post`
--

CREATE TABLE `category_post` (
  `post_id` int(11) NOT NULL DEFAULT 0,
  `category_id` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category_post`
--

INSERT INTO `category_post` (`post_id`, `category_id`) VALUES
(21, 9);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `dogs_id` int(11) NOT NULL,
  `parents_id` int(11) NOT NULL DEFAULT 0,
  `level` int(11) NOT NULL DEFAULT 0,
  `content` varchar(899) COLLATE utf8mb4_unicode_ci NOT NULL,
  `commentable_id` bigint(11) NOT NULL,
  `commentable_type` varchar(355) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `dogs_id`, `parents_id`, `level`, `content`, `commentable_id`, `commentable_type`, `status`, `created_at`, `updated_at`) VALUES
(11, 5, 8, 1, 'Good', 14, 'App\\Models\\Feed', 0, '2023-06-26 05:41:58', '2023-06-26 05:41:58'),
(12, 5, 11, 2, 'Good', 14, 'App\\Models\\Feed', 0, '2023-06-26 05:42:47', '2023-06-26 05:42:47'),
(13, 5, 12, 3, 'Good Na', 14, 'App\\Models\\Feed', 0, '2023-06-26 05:44:30', '2023-06-26 05:44:30'),
(14, 5, 12, 3, 'Good Na', 14, 'App\\Models\\Feed', 0, '2023-06-26 05:45:11', '2023-06-26 05:45:11');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(11) NOT NULL,
  `code` varchar(2) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `phone_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `code`, `name`, `phone_code`, `status`, `created_at`, `updated_at`) VALUES
(1, 'AF', 'Afghanistan', '93', 1, NULL, NULL),
(2, 'AL', 'Albania', '355', 1, NULL, NULL),
(3, 'DZ', 'Algeria', '213', 1, NULL, NULL),
(4, 'DS', 'American Samoa', NULL, 1, NULL, NULL),
(5, 'AD', 'Andorra', '376', 1, NULL, NULL),
(6, 'AO', 'Angola', '244', 1, NULL, NULL),
(7, 'AI', 'Anguilla', '1-264', 1, NULL, NULL),
(8, 'AQ', 'Antarctica', '672', 1, NULL, NULL),
(9, 'AG', 'Antigua and Barbuda', '1-268', 1, NULL, NULL),
(10, 'AR', 'Argentina', '54', 1, NULL, NULL),
(11, 'AM', 'Armenia', '374', 1, NULL, NULL),
(12, 'AW', 'Aruba', '297', 1, NULL, NULL),
(13, 'AU', 'Australia', '61', 1, NULL, NULL),
(14, 'AT', 'Austria', '43', 1, NULL, NULL),
(15, 'AZ', 'Azerbaijan', '994', 1, NULL, NULL),
(16, 'BS', 'Bahamas', '1-242', 1, NULL, NULL),
(17, 'BH', 'Bahrain', '973', 1, NULL, NULL),
(18, 'BD', 'Bangladesh', '880', 1, NULL, NULL),
(19, 'BB', 'Barbados', '1-246', 1, NULL, NULL),
(20, 'BY', 'Belarus', '375', 1, NULL, NULL),
(21, 'BE', 'Belgium', '32', 1, NULL, NULL),
(22, 'BZ', 'Belize', '501', 1, NULL, NULL),
(23, 'BJ', 'Benin', '229', 1, NULL, NULL),
(24, 'BM', 'Bermuda', '1-441', 1, NULL, NULL),
(25, 'BT', 'Bhutan', '975', 1, NULL, NULL),
(26, 'BO', 'Bolivia', '591', 1, NULL, NULL),
(27, 'BA', 'Bosnia and Herzegovina', '387', 1, NULL, NULL),
(28, 'BW', 'Botswana', '267', 1, NULL, NULL),
(29, 'BV', 'Bouvet Island', NULL, 1, NULL, NULL),
(30, 'BR', 'Brazil', '55', 1, NULL, NULL),
(31, 'IO', 'British Indian Ocean Territory', '246', 1, NULL, NULL),
(32, 'BN', 'Brunei Darussalam', '673', 1, NULL, NULL),
(33, 'BG', 'Bulgaria', '359', 1, NULL, NULL),
(34, 'BF', 'Burkina Faso', '226', 1, NULL, NULL),
(35, 'BI', 'Burundi', '257', 1, NULL, NULL),
(36, 'KH', 'Cambodia', '855', 1, NULL, NULL),
(37, 'CM', 'Cameroon', '237', 1, NULL, NULL),
(38, 'CA', 'Canada', '1', 1, NULL, NULL),
(39, 'CV', 'Cape Verde', '238', 1, NULL, NULL),
(40, 'KY', 'Cayman Islands', '1-345', 1, NULL, NULL),
(41, 'CF', 'Central African Republic', '236', 1, NULL, NULL),
(42, 'TD', 'Chad', '235', 1, NULL, NULL),
(43, 'CL', 'Chile', '56', 1, NULL, NULL),
(44, 'CN', 'China', '86', 1, NULL, NULL),
(45, 'CX', 'Christmas Island', '61', 1, NULL, NULL),
(46, 'CC', 'Cocos (Keeling) Islands', '61', 1, NULL, NULL),
(47, 'CO', 'Colombia', '57', 1, NULL, NULL),
(48, 'KM', 'Comoros', '269', 1, NULL, NULL),
(49, 'CG', 'Congo', '242', 1, NULL, NULL),
(50, 'CK', 'Cook Islands', '682', 1, NULL, NULL),
(51, 'CR', 'Costa Rica', '506', 1, NULL, NULL),
(52, 'HR', 'Croatia (Hrvatska)', '385', 1, NULL, NULL),
(53, 'CU', 'Cuba', '53', 1, NULL, NULL),
(54, 'CY', 'Cyprus', '357', 1, NULL, NULL),
(55, 'CZ', 'Czech Republic', '420', 1, NULL, NULL),
(56, 'DK', 'Denmark', '45', 1, NULL, NULL),
(57, 'DJ', 'Djibouti', '253', 1, NULL, NULL),
(58, 'DM', 'Dominica', '1-767', 1, NULL, NULL),
(59, 'DO', 'Dominican Republic', '1-809, 1-829, 1-849', 1, NULL, NULL),
(60, 'TP', 'East Timor', NULL, 1, NULL, NULL),
(61, 'EC', 'Ecuador', '593', 1, NULL, NULL),
(62, 'EG', 'Egypt', '20', 1, NULL, NULL),
(63, 'SV', 'El Salvador', '503', 1, NULL, NULL),
(64, 'GQ', 'Equatorial Guinea', '240', 1, NULL, NULL),
(65, 'ER', 'Eritrea', '291', 1, NULL, NULL),
(66, 'EE', 'Estonia', '372', 1, NULL, NULL),
(67, 'ET', 'Ethiopia', '251', 1, NULL, NULL),
(68, 'FK', 'Falkland Islands (Malvinas)', '500', 1, NULL, NULL),
(69, 'FO', 'Faroe Islands', '298', 1, NULL, NULL),
(70, 'FJ', 'Fiji', '679', 1, NULL, NULL),
(71, 'FI', 'Finland', '358', 1, NULL, NULL),
(72, 'FR', 'France', '33', 1, NULL, NULL),
(73, 'FX', 'France, Metropolitan', NULL, 1, NULL, NULL),
(74, 'GF', 'French Guiana', NULL, 1, NULL, NULL),
(75, 'PF', 'French Polynesia', '689', 1, NULL, NULL),
(76, 'TF', 'French Southern Territories', NULL, 1, NULL, NULL),
(77, 'GA', 'Gabon', '241', 1, NULL, NULL),
(78, 'GM', 'Gambia', '220', 1, NULL, NULL),
(79, 'GE', 'Georgia', '995', 1, NULL, NULL),
(80, 'DE', 'Germany', '49', 1, NULL, NULL),
(81, 'GH', 'Ghana', '233', 1, NULL, NULL),
(82, 'GI', 'Gibraltar', '350', 1, NULL, NULL),
(83, 'GK', 'Guernsey', NULL, 1, NULL, NULL),
(84, 'GR', 'Greece', '30', 1, NULL, NULL),
(85, 'GL', 'Greenland', '299', 1, NULL, NULL),
(86, 'GD', 'Grenada', '1-473', 1, NULL, NULL),
(87, 'GP', 'Guadeloupe', NULL, 1, NULL, NULL),
(88, 'GU', 'Guam', '1-671', 1, NULL, NULL),
(89, 'GT', 'Guatemala', '502', 1, NULL, NULL),
(90, 'GN', 'Guinea', '224', 1, NULL, NULL),
(91, 'GW', 'Guinea-Bissau', '245', 1, NULL, NULL),
(92, 'GY', 'Guyana', '592', 1, NULL, NULL),
(93, 'HT', 'Haiti', '509', 1, NULL, NULL),
(94, 'HM', 'Heard and Mc Donald Islands', NULL, 1, NULL, NULL),
(95, 'HN', 'Honduras', '504', 1, NULL, NULL),
(96, 'HK', 'Hong Kong', '852', 1, NULL, NULL),
(97, 'HU', 'Hungary', '36', 1, NULL, NULL),
(98, 'IS', 'Iceland', '354', 1, NULL, NULL),
(99, 'IN', 'India', '91', 1, NULL, NULL),
(100, 'IM', 'Isle of Man', '44-1624', 1, NULL, NULL),
(101, 'ID', 'Indonesia', '62', 1, NULL, NULL),
(102, 'IR', 'Iran (Islamic Republic of)', '98', 1, NULL, NULL),
(103, 'IQ', 'Iraq', '964', 1, NULL, NULL),
(104, 'IE', 'Ireland', '353', 1, NULL, NULL),
(105, 'IL', 'Israel', '972', 1, NULL, NULL),
(106, 'IT', 'Italy', '39', 1, NULL, NULL),
(107, 'CI', 'Ivory Coast', '225', 1, NULL, NULL),
(108, 'JE', 'Jersey', '44-1534', 1, NULL, NULL),
(109, 'JM', 'Jamaica', '1-876', 1, NULL, NULL),
(110, 'JP', 'Japan', '81', 1, NULL, NULL),
(111, 'JO', 'Jordan', '962', 1, NULL, NULL),
(112, 'KZ', 'Kazakhstan', '7', 1, NULL, NULL),
(113, 'KE', 'Kenya', '254', 1, NULL, NULL),
(114, 'KI', 'Kiribati', '686', 1, NULL, NULL),
(115, 'KP', 'Korea, Democratic People\'s Republic of', '850', 1, NULL, NULL),
(116, 'KR', 'Korea, Republic of', '82', 1, NULL, NULL),
(117, 'XK', 'Kosovo', '383', 1, NULL, NULL),
(118, 'KW', 'Kuwait', '965', 1, NULL, NULL),
(119, 'KG', 'Kyrgyzstan', '996', 1, NULL, NULL),
(120, 'LA', 'Lao People\'s Democratic Republic', '856', 1, NULL, NULL),
(121, 'LV', 'Latvia', '371', 1, NULL, NULL),
(122, 'LB', 'Lebanon', '961', 1, NULL, NULL),
(123, 'LS', 'Lesotho', '266', 1, NULL, NULL),
(124, 'LR', 'Liberia', '231', 1, NULL, NULL),
(125, 'LY', 'Libyan Arab Jamahiriya', '218', 1, NULL, NULL),
(126, 'LI', 'Liechtenstein', '423', 1, NULL, NULL),
(127, 'LT', 'Lithuania', '370', 1, NULL, NULL),
(128, 'LU', 'Luxembourg', '352', 1, NULL, NULL),
(129, 'MO', 'Macau', '853', 1, NULL, NULL),
(130, 'MK', 'Macedonia', '389', 1, NULL, NULL),
(131, 'MG', 'Madagascar', '261', 1, NULL, NULL),
(132, 'MW', 'Malawi', '265', 1, NULL, NULL),
(133, 'MY', 'Malaysia', '60', 1, NULL, NULL),
(134, 'MV', 'Maldives', '960', 1, NULL, NULL),
(135, 'ML', 'Mali', '223', 1, NULL, NULL),
(136, 'MT', 'Malta', '356', 1, NULL, NULL),
(137, 'MH', 'Marshall Islands', '692', 1, NULL, NULL),
(138, 'MQ', 'Martinique', NULL, 1, NULL, NULL),
(139, 'MR', 'Mauritania', '222', 1, NULL, NULL),
(140, 'MU', 'Mauritius', '230', 1, NULL, NULL),
(141, 'TY', 'Mayotte', NULL, 1, NULL, NULL),
(142, 'MX', 'Mexico', '52', 1, NULL, NULL),
(143, 'FM', 'Micronesia, Federated States of', '691', 1, NULL, NULL),
(144, 'MD', 'Moldova, Republic of', '373', 1, NULL, NULL),
(145, 'MC', 'Monaco', '377', 1, NULL, NULL),
(146, 'MN', 'Mongolia', '976', 1, NULL, NULL),
(147, 'ME', 'Montenegro', '382', 1, NULL, NULL),
(148, 'MS', 'Montserrat', '1-664', 1, NULL, NULL),
(149, 'MA', 'Morocco', '212', 1, NULL, NULL),
(150, 'MZ', 'Mozambique', '258', 1, NULL, NULL),
(151, 'MM', 'Myanmar', '95', 1, NULL, NULL),
(152, 'NA', 'Namibia', '264', 1, NULL, NULL),
(153, 'NR', 'Nauru', '674', 1, NULL, NULL),
(154, 'NP', 'Nepal', '977', 1, NULL, NULL),
(155, 'NL', 'Netherlands', '31', 1, NULL, NULL),
(156, 'AN', 'Netherlands Antilles', '599', 1, NULL, NULL),
(157, 'NC', 'New Caledonia', '687', 1, NULL, NULL),
(158, 'NZ', 'New Zealand', '64', 1, NULL, NULL),
(159, 'NI', 'Nicaragua', '505', 1, NULL, NULL),
(160, 'NE', 'Niger', '227', 1, NULL, NULL),
(161, 'NG', 'Nigeria', '234', 1, NULL, NULL),
(162, 'NU', 'Niue', '683', 1, NULL, NULL),
(163, 'NF', 'Norfolk Island', NULL, 1, NULL, NULL),
(164, 'MP', 'Northern Mariana Islands', '1-670', 1, NULL, NULL),
(165, 'NO', 'Norway', '47', 1, NULL, NULL),
(166, 'OM', 'Oman', '968', 1, NULL, NULL),
(167, 'PK', 'Pakistan', '92', 1, NULL, NULL),
(168, 'PW', 'Palau', '680', 1, NULL, NULL),
(169, 'PS', 'Palestine', '970', 1, NULL, NULL),
(170, 'PA', 'Panama', '507', 1, NULL, NULL),
(171, 'PG', 'Papua New Guinea', '675', 1, NULL, NULL),
(172, 'PY', 'Paraguay', '595', 1, NULL, NULL),
(173, 'PE', 'Peru', '51', 1, NULL, NULL),
(174, 'PH', 'Philippines', '63', 1, NULL, NULL),
(175, 'PN', 'Pitcairn', '64', 1, NULL, NULL),
(176, 'PL', 'Poland', '48', 1, NULL, NULL),
(177, 'PT', 'Portugal', '351', 1, NULL, NULL),
(178, 'PR', 'Puerto Rico', '1-787, 1-939', 1, NULL, NULL),
(179, 'QA', 'Qatar', '974', 1, NULL, NULL),
(180, 'RE', 'Reunion', '262', 1, NULL, NULL),
(181, 'RO', 'Romania', '40', 1, NULL, NULL),
(182, 'RU', 'Russian Federation', '7', 1, NULL, NULL),
(183, 'RW', 'Rwanda', '250', 1, NULL, NULL),
(184, 'KN', 'Saint Kitts and Nevis', '1-869', 1, NULL, NULL),
(185, 'LC', 'Saint Lucia', '1-758', 1, NULL, NULL),
(186, 'VC', 'Saint Vincent and the Grenadines', '1-784', 1, NULL, NULL),
(187, 'WS', 'Samoa', '685', 1, NULL, NULL),
(188, 'SM', 'San Marino', '378', 1, NULL, NULL),
(189, 'ST', 'Sao Tome and Principe', '239', 1, NULL, NULL),
(190, 'SA', 'Saudi Arabia', '966', 1, NULL, NULL),
(191, 'SN', 'Senegal', '221', 1, NULL, NULL),
(192, 'RS', 'Serbia', '381', 1, NULL, NULL),
(193, 'SC', 'Seychelles', '248', 1, NULL, NULL),
(194, 'SL', 'Sierra Leone', '232', 1, NULL, NULL),
(195, 'SG', 'Singapore', '65', 1, NULL, NULL),
(196, 'SK', 'Slovakia', '421', 1, NULL, NULL),
(197, 'SI', 'Slovenia', '386', 1, NULL, NULL),
(198, 'SB', 'Solomon Islands', '677', 1, NULL, NULL),
(199, 'SO', 'Somalia', '252', 1, NULL, NULL),
(200, 'ZA', 'South Africa', '27', 1, NULL, NULL),
(201, 'GS', 'South Georgia South Sandwich Islands', NULL, 1, NULL, NULL),
(202, 'SS', 'South Sudan', '211', 1, NULL, NULL),
(203, 'ES', 'Spain', '34', 1, NULL, NULL),
(204, 'LK', 'Sri Lanka', '94', 1, NULL, NULL),
(205, 'SH', 'St. Helena', '290', 1, NULL, NULL),
(206, 'PM', 'St. Pierre and Miquelon', '508', 1, NULL, NULL),
(207, 'SD', 'Sudan', '249', 1, NULL, NULL),
(208, 'SR', 'Suriname', '597', 1, NULL, NULL),
(209, 'SJ', 'Svalbard and Jan Mayen Islands', '47', 1, NULL, NULL),
(210, 'SZ', 'Swaziland', '268', 1, NULL, NULL),
(211, 'SE', 'Sweden', '46', 1, NULL, NULL),
(212, 'CH', 'Switzerland', '41', 1, NULL, NULL),
(213, 'SY', 'Syrian Arab Republic', '963', 1, NULL, NULL),
(214, 'TW', 'Taiwan', '886', 1, NULL, NULL),
(215, 'TJ', 'Tajikistan', '992', 1, NULL, NULL),
(216, 'TZ', 'Tanzania, United Republic of', '255', 1, NULL, NULL),
(217, 'TH', 'Thailand', '66', 1, NULL, NULL),
(218, 'TG', 'Togo', '228', 1, NULL, NULL),
(219, 'TK', 'Tokelau', '690', 1, NULL, NULL),
(220, 'TO', 'Tonga', '676', 1, NULL, NULL),
(221, 'TT', 'Trinidad and Tobago', '1-868', 1, NULL, NULL),
(222, 'TN', 'Tunisia', '216', 1, NULL, NULL),
(223, 'TR', 'Turkey', '90', 1, NULL, NULL),
(224, 'TM', 'Turkmenistan', '993', 1, NULL, NULL),
(225, 'TC', 'Turks and Caicos Islands', '1-649', 1, NULL, NULL),
(226, 'TV', 'Tuvalu', '688', 1, NULL, NULL),
(227, 'UG', 'Uganda', '256', 1, NULL, NULL),
(228, 'UA', 'Ukraine', '380', 1, NULL, NULL),
(229, 'AE', 'United Arab Emirates', '971', 1, NULL, NULL),
(230, 'GB', 'United Kingdom', '44', 1, NULL, NULL),
(231, 'US', 'United States', '1', 1, NULL, NULL),
(232, 'UM', 'United States minor outlying islands', NULL, 1, NULL, NULL),
(233, 'UY', 'Uruguay', '598', 1, NULL, NULL),
(234, 'UZ', 'Uzbekistan', '998', 1, NULL, NULL),
(235, 'VU', 'Vanuatu', '678', 1, NULL, NULL),
(236, 'VA', 'Vatican City State', '379', 1, NULL, NULL),
(237, 'VE', 'Venezuela', '58', 1, NULL, NULL),
(238, 'VN', 'Vietnam', '84', 1, NULL, NULL),
(239, 'VG', 'Virgin Islands (British)', '1-284', 1, NULL, NULL),
(240, 'VI', 'Virgin Islands (U.S.)', '1-340', 1, NULL, NULL),
(241, 'WF', 'Wallis and Futuna Islands', '681', 1, NULL, NULL),
(242, 'EH', 'Western Sahara', '212', 1, NULL, NULL),
(243, 'YE', 'Yemen', '967', 1, NULL, NULL),
(244, 'ZR', 'Zaire', NULL, 1, NULL, NULL),
(245, 'ZM', 'Zambia', '260', 1, NULL, NULL),
(246, 'ZW', 'Zimbabwe', '263', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 7, '2023-06-12 09:55:39', '2023-06-12 09:55:39'),
(2, 8, '2023-06-12 10:02:30', '2023-06-12 10:02:30'),
(3, 9, '2023-06-12 10:29:00', '2023-06-12 10:29:00'),
(4, 10, '2023-06-16 05:15:48', '2023-06-16 05:15:48'),
(5, 11, '2023-06-16 06:01:32', '2023-06-16 06:01:32'),
(6, 12, '2023-06-16 06:04:37', '2023-06-16 06:04:37'),
(7, 13, '2023-06-16 06:14:04', '2023-06-16 06:14:04'),
(8, 14, '2023-06-16 06:14:22', '2023-06-16 06:14:22'),
(9, 15, '2023-06-16 06:14:44', '2023-06-16 06:14:44'),
(10, 16, '2023-06-16 06:17:01', '2023-06-16 06:17:01'),
(11, 17, '2023-06-16 06:18:51', '2023-06-16 06:18:51'),
(12, 18, '2023-06-16 06:19:53', '2023-06-16 06:19:53'),
(13, 19, '2023-06-16 06:21:26', '2023-06-16 06:21:26'),
(14, 20, '2023-06-16 06:21:31', '2023-06-16 06:21:31'),
(15, 21, '2023-06-16 08:25:40', '2023-06-16 08:25:40'),
(16, 22, '2023-06-16 08:27:07', '2023-06-16 08:27:07'),
(17, 23, '2023-06-16 08:50:13', '2023-06-16 08:50:13'),
(18, 25, '2023-06-16 09:38:37', '2023-06-16 09:38:37'),
(19, 26, '2023-06-16 09:39:45', '2023-06-16 09:39:45'),
(20, 27, '2023-06-16 09:41:13', '2023-06-16 09:41:13'),
(21, 28, '2023-06-16 09:44:02', '2023-06-16 09:44:02'),
(22, 30, '2023-06-16 10:02:41', '2023-06-16 10:02:41'),
(23, 31, '2023-06-16 10:04:43', '2023-06-16 10:04:43'),
(24, 32, '2023-06-26 10:17:57', '2023-06-26 10:17:57'),
(25, 33, '2023-06-27 05:33:53', '2023-06-27 05:33:53');

-- --------------------------------------------------------

--
-- Table structure for table `dogs`
--

CREATE TABLE `dogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` int(11) NOT NULL DEFAULT 15,
  `avatar` varchar(256) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `avatar_original` varchar(256) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `good_genes_id` int(11) NOT NULL DEFAULT 15,
  `breed_id` int(11) NOT NULL DEFAULT 15,
  `gender` enum('0','1','2','3') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `is_default` tinyint(4) NOT NULL DEFAULT 1,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dogs`
--

INSERT INTO `dogs` (`id`, `user_id`, `name`, `age`, `avatar`, `avatar_original`, `good_genes_id`, `breed_id`, `gender`, `is_default`, `status`, `created_at`, `updated_at`) VALUES
(5, 9, 'TOmy 9-5', 4, '[23,24]', '23', 3, 33, '1', 1, 1, '2023-06-13 09:51:36', '2023-06-13 09:51:40'),
(6, 22, 'TOmy 9-6', 4, '[28,29]', '28', 3, 33, '1', 0, 1, '2023-06-13 10:22:20', '2023-06-13 10:22:24'),
(7, 1, 'TOmy 1-7', 4, '[33,34]', '33', 3, 33, '1', 1, 1, '2023-06-13 10:23:05', '2023-06-13 10:23:10'),
(8, 3, 'TOmy 7-8', 4, '[23,24]', '23', 3, 33, '1', 1, 1, '2023-06-13 09:51:36', '2023-06-13 09:51:40'),
(9, 9, 'TOmy 6-9', 4, '[23,24]', '23', 3, 33, '1', 1, 1, '2023-06-13 09:51:36', '2023-06-13 09:51:40'),
(10, 3, 'TOmy 3-10', 4, '[23,24]', '23', 3, 33, '1', 1, 1, '2023-06-13 09:51:36', '2023-06-13 09:51:40'),
(11, 3, 'TOmy 3-11', 4, '[23,24]', '23', 3, 33, '1', 1, 1, '2023-06-13 09:51:36', '2023-06-13 09:51:40'),
(12, 9, 'TOmy 9-12', 4, '[28,29]', '28', 3, 33, '1', 0, 1, '2023-06-13 10:22:20', '2023-06-13 10:22:24');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `feeds`
--

CREATE TABLE `feeds` (
  `id` int(11) NOT NULL,
  `slug` varchar(455) COLLATE utf8mb4_unicode_ci NOT NULL,
  `media` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` varchar(655) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `feedable_id` bigint(20) NOT NULL,
  `feedable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'image' COMMENT 'image, video',
  `status` int(11) NOT NULL DEFAULT 0 COMMENT 'published 1, hide 0',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `feeds`
--

INSERT INTO `feeds` (`id`, `slug`, `media`, `content`, `feedable_id`, `feedable_type`, `type`, `status`, `created_at`, `updated_at`) VALUES
(7, '0', '87', 'Hi, I am dipan', 5, 'App\\Models\\Dog', 'image', 1, '2023-06-23 13:12:49', '2023-06-23 13:12:49'),
(8, '0', '88', 'Hi, I am dipan', 5, 'App\\Models\\Dog', 'image', 1, '2023-06-23 13:13:14', '2023-06-23 13:13:14'),
(9, '0', '89', 'Hi, I am dipan', 4, 'App\\Models\\Dog', 'image', 1, '2023-06-23 13:14:23', '2023-06-24 13:06:04'),
(10, '0', '90', 'Hi, I am dipan', 6, 'App\\Models\\Dog', 'image', 1, '2023-06-23 13:16:07', '2023-06-24 13:05:56'),
(11, '0', '91', 'Hi, I am dipan', 5, 'App\\Models\\Dog', 'image', 1, '2023-06-23 13:17:09', '2023-06-23 13:17:09'),
(12, '0', '92', 'Hi, I am dipan', 7, 'App\\Models\\Dog', 'image', 1, '2023-06-23 13:17:13', '2023-06-24 13:06:02'),
(13, '0', '93', 'Hi, I am dipan', 8, 'App\\Models\\Dog', 'image', 1, '2023-06-23 13:17:37', '2023-06-24 13:07:10'),
(14, '0', '', 'Hi, I am dipan', 7, 'App\\Models\\Dog', '', 1, '2023-06-24 08:08:01', '2023-06-24 13:07:14'),
(17, 'n06fuae5dx', '', 'Hi this is new post', 5, 'App\\Models\\Dog', '', 1, '2023-06-26 07:05:05', '2023-06-26 07:05:05'),
(18, 'glntamhiqd', '', 'Hi this is new post', 5, 'App\\Models\\Dog', '', 1, '2023-06-26 07:05:28', '2023-06-26 07:05:28'),
(19, 'sxzl6o16tp', NULL, 'Hi this is new post', 5, 'App\\Models\\Dog', 'image', 1, '2023-06-26 07:30:24', '2023-06-26 07:30:24'),
(20, 'nfiph79fir20', '', 'Hi this is new post', 5, 'App\\Models\\Dog', '', 1, '2023-06-26 07:30:51', '2023-06-26 07:30:51'),
(21, 'lfaydgzjpo21', '', 'Hi this is new post', 5, 'App\\Models\\Dog', '', 1, '2023-06-26 09:39:29', '2023-06-26 09:39:29');

-- --------------------------------------------------------

--
-- Table structure for table `friendships`
--

CREATE TABLE `friendships` (
  `id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL COMMENT 'receiver, dog_id ',
  `dogable_id` bigint(20) NOT NULL,
  `dogable_type` varchar(355) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0 COMMENT 'accepted 1, pending 0,  block 2, report 3',
  `view` enum('0','1') NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `friendships`
--

INSERT INTO `friendships` (`id`, `receiver_id`, `dogable_id`, `dogable_type`, `status`, `view`, `created_at`, `updated_at`) VALUES
(12, 6, 5, 'App\\Models\\Dog', 1, '0', '2023-06-23 05:08:58', '2023-06-23 09:17:06'),
(13, 8, 5, 'App\\Models\\Dog', 1, '0', '2023-06-23 05:08:58', '2023-06-23 09:21:35'),
(14, 8, 6, 'App\\Models\\Dog', 0, '0', '2023-06-23 09:48:01', '2023-06-23 09:48:01'),
(18, 5, 7, 'App\\Models\\Dog', 1, '0', '2023-06-23 09:51:41', '2023-06-23 11:29:45');

-- --------------------------------------------------------

--
-- Table structure for table `good_genes`
--

CREATE TABLE `good_genes` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `banner` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `icon` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `top` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `good_genes`
--

INSERT INTO `good_genes` (`id`, `name`, `banner`, `icon`, `top`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Playful', NULL, NULL, 0, 1, '2022-04-10 22:32:00', '2022-03-29 19:54:08'),
(2, 'Love Kids', NULL, NULL, 0, 1, '2022-12-04 20:40:00', '2022-12-04 18:10:00'),
(5, 'Mens', '40', '40', 0, 1, '2022-04-10 22:32:00', '2022-03-29 19:22:11'),
(6, 'Womens', '40', '40', 0, 1, '2022-04-10 22:32:00', '2022-01-23 18:17:52'),
(7, 'Unisex', '40', '40', 0, 1, '2022-04-10 22:32:00', '2022-01-23 18:18:27'),
(8, 'Quite', NULL, NULL, 0, 1, '2022-04-13 04:04:05', '2022-04-12 20:04:05'),
(9, 'Loyal', NULL, NULL, 0, 1, '2023-07-10 05:20:59', '2023-07-09 23:50:59'),
(11, 'Party Crasher', NULL, NULL, 0, 1, '2022-12-04 18:12:48', '2022-12-04 18:12:48'),
(12, 'Low Mantainnance', NULL, NULL, 0, 1, '2022-12-04 18:13:05', '2022-12-04 18:13:05'),
(13, 'Unconditional Love', NULL, NULL, 0, 1, '2022-12-04 18:13:11', '2022-12-04 18:13:11'),
(14, 'Calm & clever', NULL, NULL, 0, 1, '2022-12-04 18:13:17', '2022-12-04 18:13:17'),
(15, 'Lol', NULL, NULL, 0, 1, '2022-12-04 18:13:22', '2022-12-04 18:13:22');

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `rtl` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `name`, `code`, `rtl`, `created_at`, `updated_at`) VALUES
(1, 'English', 'en', 0, '2019-01-20 06:43:20', '2023-07-11 01:25:50'),
(3, 'Hindi', 'in', 0, '2023-07-11 01:28:24', '2023-07-11 01:28:24'),
(4, 'Bengali', 'bd', 0, '2023-07-11 01:28:31', '2023-07-11 01:29:02');

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` int(11) NOT NULL,
  `dogs_id` int(11) NOT NULL,
  `likeable_id` bigint(20) NOT NULL,
  `likeable_type` varchar(455) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id`, `dogs_id`, `likeable_id`, `likeable_type`, `created_at`, `updated_at`) VALUES
(1, 5, 1, 'App\\Models\\DogPost', '2023-06-22 08:56:17', '2023-06-22 08:56:17'),
(2, 7, 1, 'App\\Models\\DogPost', '2023-06-22 08:58:05', '2023-06-22 08:58:05'),
(3, 7, 2, 'App\\Models\\DogPost', '2023-06-22 08:58:24', '2023-06-22 08:58:24'),
(4, 7, 4, 'App\\Models\\DogPost', '2023-06-22 08:58:29', '2023-06-22 08:58:29'),
(5, 6, 4, 'App\\Models\\DogPost', '2023-06-22 08:58:35', '2023-06-22 08:58:35'),
(7, 8, 2, 'App\\Models\\DogPost', '2023-06-22 08:59:12', '2023-06-22 08:59:12'),
(9, 5, 14, 'App\\Models\\Feed', '2023-06-26 05:32:41', '2023-06-26 05:32:41');

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `collection_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mime_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `disk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `conversions_disk` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` bigint(20) UNSIGNED NOT NULL,
  `manipulations` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`manipulations`)),
  `custom_properties` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`custom_properties`)),
  `generated_conversions` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`generated_conversions`)),
  `responsive_images` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`responsive_images`)),
  `order_column` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_06_13_052559_create_media_table', 2),
(6, '2023_07_06_093310_create_permission_tables', 2);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_permissions`
--

INSERT INTO `model_has_permissions` (`permission_id`, `model_type`, `model_id`) VALUES
(58, 'App\\Models\\User', 35),
(59, 'App\\Models\\User', 35),
(60, 'App\\Models\\User', 35),
(61, 'App\\Models\\User', 35),
(65, 'App\\Models\\User', 35),
(66, 'App\\Models\\User', 35),
(68, 'App\\Models\\User', 35),
(78, 'App\\Models\\User', 35),
(80, 'App\\Models\\User', 35),
(82, 'App\\Models\\User', 35),
(83, 'App\\Models\\User', 35),
(84, 'App\\Models\\User', 35),
(85, 'App\\Models\\User', 35);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 3),
(7, 'App\\Models\\User', 35);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL DEFAULT 0,
  `reason_key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reason_id` int(11) NOT NULL DEFAULT 0,
  `user_id` int(11) NOT NULL,
  `sub` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` varchar(655) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_view` int(11) NOT NULL DEFAULT 0,
  `is_hide` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `sender_id`, `reason_key`, `reason_id`, `user_id`, `sub`, `message`, `is_view`, `is_hide`, `created_at`, `updated_at`) VALUES
(25, 0, 'question_answer', 33, 9, 'Rewards for Question & Answer.', 'Thank you for submission! You have earned 5.', 1, 1, '2022-10-05 01:38:32', '2022-10-16 01:38:32'),
(97, 3, 'Test', 234, 9, '23', 'Test', 0, 0, '2023-06-10 09:58:43', '2023-06-10 09:58:43'),
(98, 3, 'Test', 234, 22, '23', 'Test', 0, 0, '2023-06-10 12:56:22', '2023-06-10 12:56:22'),
(99, 0, 'question_answer', 0, 9, 'Subject', 'Message', 0, 0, '2023-06-12 12:15:36', '2023-06-12 12:15:36'),
(100, 0, 'question_answer', 0, 9, 'Subject', 'Message', 0, 0, '2023-06-14 05:25:02', '2023-06-14 05:25:02');

-- --------------------------------------------------------

--
-- Table structure for table `not_pet_questions`
--

CREATE TABLE `not_pet_questions` (
  `id` int(11) NOT NULL,
  `question` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `option` varchar(455) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `answer` varchar(222) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `published` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `expire_at` timestamp NULL DEFAULT NULL,
  `reward` tinyint(4) NOT NULL DEFAULT 5,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `not_pet_questions`
--

INSERT INTO `not_pet_questions` (`id`, `question`, `option`, `answer`, `published`, `expire_at`, `reward`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Q22222', '{\"0\":\"A\",\"1\":\"V\",\"2\":\"BV\",\"3\":\"Tesfsd\"}', '0', '2022-12-19 16:00:00', '2023-06-08 16:00:00', 5, 0, '2022-12-10 08:42:38', '2023-06-09 03:41:07'),
(3, 'Which dog breed is characterised by black spots on white fur?', '{\"0\":\"A\",\"1\":\"B\",\"2\":\"C\"}', '1', '2023-07-10 09:53:38', '1970-01-15 16:30:00', 5, 1, '2022-12-14 05:15:25', '2023-07-10 04:23:38'),
(4, 'Q3 Today', '{\"0\":\"A\",\"1\":\"B\",\"2\":\"6\",\"3\":\"^\"}', '2', '2023-07-10 09:53:37', '2023-06-08 16:00:00', 5, 1, '2022-12-14 05:43:29', '2023-07-10 04:23:37'),
(8, 'Question 1111111222', '{\"0\":\"A\",\"1\":\"B\"}', '0', '2023-07-09 18:30:00', '2023-07-19 18:30:00', 5, 1, '2023-07-10 04:13:40', '2023-07-10 04:23:35'),
(9, 'Question2', '{\"0\":\"Tesfsd\",\"1\":\"A\",\"2\":\"fsdf\"}', '0', '2023-07-10 18:30:00', '2023-07-13 18:30:00', 5, 1, '2023-07-10 04:14:32', '2023-07-10 04:23:29');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `title`, `guard_name`, `status`, `created_at`, `updated_at`) VALUES
(58, 'show-permissions', 'show permissions', 'web', 1, '2023-07-06 11:19:44', '2023-07-11 00:48:45'),
(59, 'add-permissions', 'add permissions', 'web', 1, '2023-07-06 11:19:44', '2023-07-11 00:48:45'),
(60, 'edit-permissions', 'edit permissions', 'web', 1, '2023-07-06 11:19:44', '2023-07-11 00:48:45'),
(61, 'delete-permissions', 'delete permissions', 'web', 1, '2023-07-06 11:19:44', '2023-07-11 00:48:45'),
(62, 'show-roles', 'show roles', 'web', 1, '2023-07-06 11:20:15', '2023-07-11 00:48:45'),
(63, 'add-roles', 'add roles', 'web', 1, '2023-07-06 11:20:15', '2023-07-11 00:48:45'),
(64, 'edit-roles', 'edit roles', 'web', 1, '2023-07-06 11:20:15', '2023-07-11 00:48:45'),
(65, 'delete-roles', 'delete roles', 'web', 1, '2023-07-06 11:20:15', '2023-07-11 00:48:45'),
(66, 'show-backend-setting', 'show backend setting', 'web', 1, '2023-07-06 11:20:32', '2023-07-11 00:48:45'),
(68, 'edit-backend-setting', 'edit backend setting', 'web', 1, '2023-07-06 11:20:32', '2023-07-11 00:48:45'),
(74, 'show-terminal', 'show terminal', 'web', 1, '2023-07-06 11:20:45', '2023-07-11 00:48:46'),
(78, 'show-frontend-setting', 'show frontend setting', 'web', 1, '2023-07-06 11:21:30', '2023-07-11 00:48:46'),
(80, 'edit-frontend-setting', 'edit frontend setting', 'web', 1, '2023-07-06 11:21:30', '2023-07-11 00:48:46'),
(82, 'show-user', 'show user', 'web', 1, '2023-07-07 09:49:44', '2023-07-11 00:48:46'),
(83, 'add-user', 'add user', 'web', 1, '2023-07-07 09:49:44', '2023-07-11 00:48:46'),
(84, 'edit-user', 'edit user', 'web', 1, '2023-07-07 09:49:44', '2023-07-11 00:48:46'),
(85, 'delete-user', 'delete user', 'web', 1, '2023-07-07 09:49:44', '2023-07-11 00:48:46'),
(90, 'show-questions', 'show questions', 'web', 1, '2023-07-10 01:49:27', '2023-07-11 00:48:46'),
(91, 'add-questions', 'add questions', 'web', 1, '2023-07-10 01:49:27', '2023-07-11 00:48:46'),
(92, 'edit-questions', 'edit questions', 'web', 1, '2023-07-10 01:49:27', '2023-07-11 00:48:46'),
(93, 'delete-questions', 'delete questions', 'web', 1, '2023-07-10 01:49:27', '2023-07-11 00:48:46'),
(94, 'show-dogs', 'show dogs', 'web', 1, '2023-07-10 01:49:39', '2023-07-11 00:48:46'),
(95, 'add-dogs', 'add dogs', 'web', 1, '2023-07-10 01:49:39', '2023-07-11 00:48:46'),
(96, 'edit-dogs', 'edit dogs', 'web', 1, '2023-07-10 01:49:39', '2023-07-11 00:48:46'),
(97, 'delete-dogs', 'delete dogs', 'web', 1, '2023-07-10 01:49:39', '2023-07-11 00:48:47'),
(98, 'show-breeds', 'show breeds', 'web', 1, '2023-07-10 01:49:44', '2023-07-11 00:48:47'),
(99, 'add-breeds', 'add breeds', 'web', 1, '2023-07-10 01:49:44', '2023-07-11 00:48:47'),
(100, 'edit-breeds', 'edit breeds', 'web', 1, '2023-07-10 01:49:44', '2023-07-11 00:48:47'),
(101, 'delete-breeds', 'delete breeds', 'web', 1, '2023-07-10 01:49:44', '2023-07-11 00:48:47'),
(102, 'show-genes', 'show genes', 'web', 1, '2023-07-10 01:49:48', '2023-07-11 00:48:47'),
(103, 'add-genes', 'add genes', 'web', 1, '2023-07-10 01:49:48', '2023-07-11 00:48:47'),
(104, 'edit-genes', 'edit genes', 'web', 1, '2023-07-10 01:49:48', '2023-07-11 00:48:47'),
(105, 'delete-genes', 'delete genes', 'web', 1, '2023-07-10 01:49:48', '2023-07-11 00:48:47'),
(106, 'show-not-pet-questions', 'show not pet questions', 'web', 1, '2023-07-10 03:53:19', '2023-07-11 00:48:47'),
(107, 'add-not-pet-questions', 'add not pet questions', 'web', 1, '2023-07-10 03:53:19', '2023-07-11 00:48:47'),
(108, 'edit-not-pet-questions', 'edit not pet questions', 'web', 1, '2023-07-10 03:53:19', '2023-07-11 00:48:47'),
(109, 'delete-not-pet-questions', 'delete not pet questions', 'web', 1, '2023-07-10 03:53:19', '2023-07-11 00:48:48'),
(122, 'language', 'Show Language', 'web', 1, '2023-07-11 00:55:38', '2023-07-11 00:55:59'),
(123, 'add-language', 'Add Language', 'web', 1, '2023-07-11 00:55:38', '2023-07-11 00:55:38'),
(124, 'edit-language', 'Edit Language', 'web', 1, '2023-07-11 00:55:38', '2023-07-11 00:55:38'),
(125, 'delete-language', 'Delete Language', 'web', 1, '2023-07-11 00:55:39', '2023-07-11 00:55:39');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 1, 'MyAuthApp', '4c480d8c6a6a9529ff4e9081104092fda46147cef035880dca87c54c5db9e9b6', '[\"*\"]', NULL, NULL, '2023-06-12 08:36:30', '2023-06-12 08:36:30'),
(2, 'App\\Models\\User', 3, 'MyAuthApp', '4f6edfb18ce8ec992fd3e0faa40c7bd48fdf40d471c72041e7efa2ff1b75a7e1', '[\"*\"]', NULL, NULL, '2023-06-12 08:38:34', '2023-06-12 08:38:34'),
(3, 'App\\Models\\User', 1, 'MyAuthApp', '260d65c47553eb347d1e4b797f7f99887c4d47f778f16d7c414aaa4f7d83c92a', '[\"*\"]', NULL, NULL, '2023-06-12 08:39:34', '2023-06-12 08:39:34'),
(4, 'App\\Models\\User', 1, 'MyAuthApp', 'bd4b54173eafedcbb9b27c9310f248c9841364e8e6706098b44c17fe7b19a4f6', '[\"*\"]', NULL, NULL, '2023-06-12 08:46:25', '2023-06-12 08:46:25'),
(5, 'App\\Models\\User', 1, 'MyAuthApp', 'd3f39c2b1d5b010b44513829c5ea2182ac79752169785f5aecc0b7d1ef4ec4af', '[\"*\"]', NULL, NULL, '2023-06-12 08:52:34', '2023-06-12 08:52:34'),
(6, 'App\\Models\\User', 1, 'MyAuthApp', '6b370c4966c33b9545c6cd893ad9178088f52139804f86dcf66b8799689da602', '[\"*\"]', NULL, NULL, '2023-06-12 08:52:48', '2023-06-12 08:52:48'),
(7, 'App\\Models\\User', 1, 'MyAuthApp', 'e9f85cd629e6a41416c6dcc44b2e4b51c9e2a9f59202c3232fdeb18ced85feb5', '[\"*\"]', NULL, NULL, '2023-06-12 09:23:24', '2023-06-12 09:23:24'),
(8, 'App\\Models\\User', 6, 'MyAuthApp', '265e556d88051694913625b47030312d0c697849ed139a30ba74bfa343d5015a', '[\"*\"]', NULL, NULL, '2023-06-12 10:11:16', '2023-06-12 10:11:16'),
(9, 'App\\Models\\User', 6, 'MyAuthApp', 'cdc6e18d50bd3c8ecd836044b47dce4a36687faff266cc971a7e16e9198a0f90', '[\"*\"]', NULL, NULL, '2023-06-12 10:13:39', '2023-06-12 10:13:39'),
(10, 'App\\Models\\User', 6, 'MyAuthApp', 'd7d88856934a27bf21d843afb5044150c6b662fd3d7d6a3ec6f4b8335407cd1f', '[\"*\"]', NULL, NULL, '2023-06-12 10:23:41', '2023-06-12 10:23:41'),
(11, 'App\\Models\\User', 6, 'MyAuthApp', 'b1e8e251d63820efa6e09634dc0fdcc43dad1ca5d2d07830e94943b086d84c66', '[\"*\"]', NULL, NULL, '2023-06-12 10:25:27', '2023-06-12 10:25:27'),
(12, 'App\\Models\\User', 6, 'MyAuthApp', 'e35aee90d7a62bd699cdd05def12f096f3197faf40e689775a1515b7a7192a42', '[\"*\"]', NULL, NULL, '2023-06-12 10:26:19', '2023-06-12 10:26:19'),
(13, 'App\\Models\\User', 9, 'MyAuthApp', 'f59d2a5d8d41ecbf914419487df911a3e3bc958140d28011d3abe88efd5a4723', '[\"*\"]', NULL, NULL, '2023-06-12 10:54:46', '2023-06-12 10:54:46'),
(14, 'App\\Models\\User', 1, 'MyAuthApp', '806c081e01b11c7e9bfcc6e59deac05cc42d1273dfaea050e92b2475dd42886d', '[\"*\"]', NULL, NULL, '2023-06-12 11:22:56', '2023-06-12 11:22:56'),
(15, 'App\\Models\\User', 9, 'MyAuthApp', '27c3f4972bd243a71184323884d701d62c7d4853077602f789c1a6e893100b4d', '[\"*\"]', '2023-06-26 09:39:29', NULL, '2023-06-12 11:32:19', '2023-06-26 09:39:29'),
(16, 'App\\Models\\User', 23, 'MyAuthApp', '0f5d2a5577daa01bfad405e20ab21805eef5acca489f6efcec4ffb6f34c08639', '[\"*\"]', NULL, NULL, '2023-06-16 08:50:13', '2023-06-16 08:50:13'),
(17, 'App\\Models\\User', 27, 'MyAuthApp', 'be835a65c25e0be0bf471529b1294916e98dd3768e1dceea4503553947ba7ba4', '[\"*\"]', NULL, NULL, '2023-06-16 09:41:13', '2023-06-16 09:41:13'),
(18, 'App\\Models\\User', 28, 'MyAuthApp', '0b2b0eae11a3e13b0fc339de76d63bcb23f738c5a67f6c85cd7ece58962f20f2', '[\"*\"]', NULL, NULL, '2023-06-16 09:44:02', '2023-06-16 09:44:02'),
(19, 'App\\Models\\User', 30, 'MyAuthApp', '3973e1893d731ef3b8c5ba7cfa4911591684b189550f0e91bf76e4a24cd23e94', '[\"*\"]', NULL, NULL, '2023-06-16 10:02:41', '2023-06-16 10:02:41'),
(20, 'App\\Models\\User', 31, 'MyAuthApp', 'e8ae263608887009530f08982573cfcc6b64ecbe2002dcd9fb39299d077a7fa1', '[\"*\"]', NULL, NULL, '2023-06-16 10:04:43', '2023-06-16 10:04:43'),
(21, 'App\\Models\\User', 9, 'MyAuthApp', '20a91e675f880b6a44f5a62bcd3ae4f1c02bc49dc800bc031ca493553d57bb77', '[\"*\"]', '2023-06-16 11:01:34', NULL, '2023-06-16 10:46:15', '2023-06-16 11:01:34'),
(22, 'App\\Models\\User', 9, 'MyAuthApp', 'f7ec97aaa983196e8ea5e4a7a9ab7696eb43a1d2f8985fa74ee312a22d3abbe2', '[\"*\"]', '2023-06-16 11:04:38', NULL, '2023-06-16 11:02:19', '2023-06-16 11:04:38'),
(23, 'App\\Models\\User', 1, 'MyAuthApp', 'c9472b65219431842861a77790382f489f3731eb1cf2cf0fea00f06e156c156d', '[\"*\"]', NULL, NULL, '2023-06-20 06:46:35', '2023-06-20 06:46:35'),
(24, 'App\\Models\\User', 36, 'MyAuthApp', 'e4e39202b107d0a2fd8311a030fe5d6baf6d9ae8e130ec09e99d22ce0a07774d', '[\"*\"]', NULL, NULL, '2023-07-13 00:11:10', '2023-07-13 00:11:10');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent` int(11) DEFAULT 0,
  `level` int(11) DEFAULT 1,
  `cat_type` varchar(2000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `key_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_content` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banner` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thumbnail` varchar(366) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `template` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_meta` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 0,
  `meta_fields` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order` int(11) NOT NULL DEFAULT 0,
  `visitor` bigint(20) NOT NULL DEFAULT 0,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keywords` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `type`, `parent`, `level`, `cat_type`, `title`, `key_title`, `slug`, `content`, `short_content`, `banner`, `thumbnail`, `template`, `is_meta`, `status`, `meta_fields`, `order`, `visitor`, `meta_title`, `meta_description`, `keywords`, `created_at`, `updated_at`) VALUES
(2, 'custom_page', 3, 2, NULL, 'Teset', 'Teset', 'teset', 'fsdf', NULL, '103', '', 'page_with_sidebar', 0, 1, NULL, 0, 0, 'Teset', 'Teset', 'Teset', '2023-07-10 06:30:21', '2023-07-10 06:52:57'),
(3, 'custom_page', 0, 1, NULL, 'Tesfsd32423', 'Tesfsd32423', 'Tesfsd32423', 'fsdf', NULL, NULL, NULL, 'default', 0, 1, NULL, 0, 0, 'Tesfsd32423', 'Tesfsd32423', 'Tesfsd32423', '2023-07-10 06:30:40', '2023-07-10 06:30:40'),
(4, 'blade_template', 0, 1, NULL, 'Default', 'default', 'default', 'fsdf', NULL, NULL, NULL, 'default', 0, 1, NULL, 0, 0, 'Tesfsd32423', 'Tesfsd32423', 'Tesfsd32423', '2023-07-10 06:30:40', '2023-07-10 06:30:40'),
(5, 'blade_template', 0, 1, NULL, 'About', 'about', 'about', 'fsdf', NULL, NULL, NULL, 'about', 0, 1, NULL, 0, 0, 'Tesfsd32423', 'Tesfsd32423', 'Tesfsd32423', '2023-07-10 06:30:40', '2023-07-10 06:30:40'),
(6, 'blade_template', 0, 1, NULL, 'Page With Sidebar', 'page_with_sidebar', 'page_with_sidebar', 'fsdf', NULL, NULL, NULL, 'page_with_sidebar', 0, 1, NULL, 0, 0, 'Tesfsd32423', 'Tesfsd32423', 'Tesfsd32423', '2023-07-10 06:30:40', '2023-07-10 06:30:40'),
(7, 'blade_template', 0, 1, NULL, 'Page Full width', 'page_full_width', 'page_full_width', 'fsdf', NULL, NULL, NULL, 'page_full_width', 0, 1, NULL, 0, 0, 'Tesfsd32423', 'Tesfsd32423', 'Tesfsd32423', '2023-07-10 06:30:40', '2023-07-10 06:30:40'),
(8, 'blade_template', 0, 1, NULL, 'Blogs', 'blogs_listing', 'blogs_listing', 'fsdf', NULL, NULL, NULL, 'blogs_listing', 0, 1, NULL, 0, 0, 'Tesfsd32423', 'Tesfsd32423', 'Tesfsd32423', '2023-07-10 06:30:40', '2023-07-10 06:30:40'),
(9, 'custom_page', 0, 1, NULL, 'Bengla', 'tesf', 'test', 'csadas&nbsp;Bengla', NULL, NULL, '', 'default', 0, 1, NULL, 0, 0, 'tesf', 'tesf', 'tesf', '2023-07-11 02:33:49', '2023-07-10 18:30:00'),
(19, 'custom_page', 0, 1, NULL, 'Test Benglad', 'Test', 'test-1', '<p>Test Benglad<br></p>', NULL, '103', '', 'default', 0, 1, NULL, 0, 0, 'Test tests', 'Test', 'Test', '2023-07-11 04:13:12', '2023-07-10 18:30:00'),
(20, 'blog_post', 0, 1, NULL, 'Test', 'Test', 'test-2', NULL, NULL, NULL, NULL, 'default', 0, 1, NULL, 0, 0, 'Test', 'Test', 'Test', '2023-08-02 07:18:58', '2023-08-02 07:18:58'),
(21, 'blog_post', 0, 0, '0', 'DDDD4234', 'Test', 'dddd', '<p>DDDD<br></p>', '', '101', '', 'single_blog', 0, 1, NULL, 30, 0, 'Test333', 'Test3444', 'Test,555', '2023-08-02 23:20:41', '2023-08-02 18:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `posts_metas`
--

CREATE TABLE `posts_metas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_value` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `section_id` int(11) NOT NULL DEFAULT 0,
  `lang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'en',
  `pageable_id` bigint(20) NOT NULL,
  `pageable_type` varchar(355) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts_metas`
--

INSERT INTO `posts_metas` (`id`, `meta_key`, `meta_value`, `section_id`, `lang`, `pageable_id`, `pageable_type`, `created_at`, `updated_at`) VALUES
(22, 'test_test_text_0', 'tet24332434 3243242', 4, 'bd', 19, 'App\\Models\\Post', '2023-07-11 05:03:22', '2023-07-11 05:05:44'),
(23, 'test_test_text_1', 'tet243', 4, 'bd', 19, 'App\\Models\\Post', '2023-07-11 05:03:22', '2023-07-11 05:05:44'),
(24, 'test_test_text_2', 'r23432432', 4, 'bd', 19, 'App\\Models\\Post', '2023-07-11 05:05:44', '2023-07-11 05:05:44'),
(25, 'setting_page_name_hide', 'no', 0, 'en', 19, 'App\\Models\\Post', '2023-07-11 05:39:55', '2023-07-11 05:39:55'),
(26, 'setting_page_banner_slider', 'no', 0, 'en', 19, 'App\\Models\\Post', '2023-07-11 05:39:55', '2023-07-11 05:39:55'),
(27, 'setting_page_slider_heading', 'null', 0, 'en', 19, 'App\\Models\\Post', '2023-07-11 05:39:55', '2023-07-11 05:39:55'),
(28, 'setting_page_slider_content', 'null', 0, 'en', 19, 'App\\Models\\Post', '2023-07-11 05:39:55', '2023-07-11 05:39:55'),
(29, 'setting_page_slider_btn_link', 'null', 0, 'en', 19, 'App\\Models\\Post', '2023-07-11 05:39:55', '2023-07-11 05:39:55'),
(30, 'setting_page_slider_btn_link2', 'null', 0, 'en', 19, 'App\\Models\\Post', '2023-07-11 05:39:55', '2023-07-11 05:39:55'),
(31, 'setting_page_slider_image', 'null', 0, 'en', 19, 'App\\Models\\Post', '2023-07-11 05:39:55', '2023-07-11 05:39:55'),
(32, 'setting_page_name_hide', 'yes', 0, 'en', 9, 'App\\Models\\Post', '2023-07-11 05:45:20', '2023-07-11 05:45:20'),
(33, 'setting_page_banner_slider', 'banner', 0, 'en', 9, 'App\\Models\\Post', '2023-07-11 05:45:20', '2023-07-11 05:45:20'),
(34, 'setting_page_slider_heading', 'null', 0, 'en', 9, 'App\\Models\\Post', '2023-07-11 05:45:20', '2023-07-11 05:45:20'),
(35, 'setting_page_slider_content', 'null', 0, 'en', 9, 'App\\Models\\Post', '2023-07-11 05:45:21', '2023-07-11 05:45:21'),
(36, 'setting_page_slider_btn_link', 'null', 0, 'en', 9, 'App\\Models\\Post', '2023-07-11 05:45:21', '2023-07-11 05:45:21'),
(37, 'setting_page_slider_btn_link2', 'null', 0, 'en', 9, 'App\\Models\\Post', '2023-07-11 05:45:21', '2023-07-11 05:45:21'),
(38, 'setting_page_slider_image', 'null', 0, 'en', 9, 'App\\Models\\Post', '2023-07-11 05:45:21', '2023-07-11 05:45:21'),
(39, 'tesf_bengla_text_0', 'Bengla33', 5, 'bd', 9, 'App\\Models\\Post', '2023-07-11 05:46:13', '2023-07-11 05:46:21'),
(40, 'tesf_bengla_text_1', 'Bengla3433333', 5, 'bd', 9, 'App\\Models\\Post', '2023-07-11 05:46:13', '2023-07-11 05:46:21');

-- --------------------------------------------------------

--
-- Table structure for table `posts_sections`
--

CREATE TABLE `posts_sections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `key_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order` int(11) NOT NULL DEFAULT 0,
  `meta_fields` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `pageable_id` bigint(20) NOT NULL DEFAULT 0,
  `pageable_type` varchar(366) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts_sections`
--

INSERT INTO `posts_sections` (`id`, `title`, `key_title`, `order`, `meta_fields`, `status`, `pageable_id`, `pageable_type`, `created_at`, `updated_at`) VALUES
(4, 'Test', 'Test', 0, '[{\"type\":\"text\",\"label\":\"Test\"},{\"type\":\"text\",\"label\":\"Test3\"},{\"type\":\"text\",\"label\":\"fsdfsd\"}]', 1, 19, 'App\\Models\\Post', '2023-07-11 04:37:27', '2023-07-11 05:05:39'),
(5, 'Bengla', 'Bengla', 0, '[{\"type\":\"text\",\"label\":\"Test\"},{\"type\":\"text\",\"label\":\"Test22\"}]', 1, 9, 'App\\Models\\Post', '2023-07-11 05:45:47', '2023-07-11 05:45:58');

-- --------------------------------------------------------

--
-- Table structure for table `post_tag`
--

CREATE TABLE `post_tag` (
  `post_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `post_tag`
--

INSERT INTO `post_tag` (`post_id`, `tag_id`) VALUES
(21, 5),
(21, 6);

-- --------------------------------------------------------

--
-- Table structure for table `post_translations`
--

CREATE TABLE `post_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_content` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'en',
  `visitor` bigint(20) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 0,
  `pageable_id` bigint(20) NOT NULL DEFAULT 0,
  `pageable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `post_translations`
--

INSERT INTO `post_translations` (`id`, `title`, `short_content`, `content`, `lang`, `visitor`, `status`, `pageable_id`, `pageable_type`, `created_at`, `updated_at`) VALUES
(11, 'English', NULL, 'csadas&nbsp;English', 'en', 0, 0, 9, 'App\\Models\\Post', '2023-07-11 04:06:56', '2023-07-11 04:06:56'),
(12, 'Hindi2', NULL, 'csadas&nbsp;Hindi', 'in', 0, 0, 9, 'App\\Models\\Post', '2023-07-11 04:07:08', '2023-07-11 04:08:41'),
(13, 'Bengla', NULL, 'csadas&nbsp;Bengla', 'bd', 0, 0, 9, 'App\\Models\\Post', '2023-07-11 04:12:52', '2023-07-11 04:12:52'),
(14, 'Test Benglad', NULL, '<p>Test Benglad<br></p>', 'bd', 0, 0, 19, 'App\\Models\\Post', '2023-07-11 04:13:12', '2023-07-11 04:13:48'),
(15, 'Test Hindin', NULL, '<p>Test Hindin<br></p>', 'in', 0, 0, 19, 'App\\Models\\Post', '2023-07-11 04:13:33', '2023-07-11 04:13:33'),
(16, 'Test Englisht', NULL, '<p>Test Englisht<br></p>', 'en', 0, 0, 19, 'App\\Models\\Post', '2023-07-11 04:34:19', '2023-07-11 05:39:56'),
(17, 'Test', NULL, NULL, 'en', 0, 0, 20, 'App\\Models\\Post', '2023-08-02 07:18:58', '2023-08-02 07:18:58'),
(18, 'DDDD4234', NULL, '<p>DDDD<br></p>', 'en', 0, 0, 21, 'App\\Models\\Post', '2023-08-02 23:20:41', '2023-08-07 03:26:48'),
(19, 'Test', NULL, NULL, 'bd', 0, 0, 21, 'App\\Models\\Post', '2023-08-04 05:57:25', '2023-08-04 05:57:25');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `question_type` int(11) NOT NULL,
  `question` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `options` varchar(455) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `answer` varchar(222) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `published_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `question_type`, `question`, `options`, `answer`, `published_date`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Question3', '{\"0\":\"Lorem ipsum dolor sit amet, consetetur sadipscing3333\",\"1\":\"Lorem ipsum dolor sit amet, consetetur sadipscing1\",\"2\":\"Lorem ipsum dolor sit amet, consetetur sadipscing2\",\"3\":\"Lorem ipsum dolor sit amet, consetetur sadipscing4\"}', '1', '2023-09-30', 1, '2023-07-10 07:08:26', '2023-07-10 03:42:16'),
(2, 1, 'Q22222', '{\"0\":\"Lorem ipsum dolor sit amet, consetetur sadipscing\",\"1\":\"Lorem ipsum dolor sit amet, consetetur sadipscing1\",\"2\":\"Lorem ipsum dolor sit amet, consetetur sadipscing2\",\"3\":\"Lorem ipsum dolor sit amet, consetetur sadipscing4\"}', '0', '2023-07-10', 1, '2023-07-10 02:25:31', '2023-07-10 02:25:31'),
(7, 3, 'Question 2', '{\"0\":\"Question A\",\"1\":\"Question 4\"}', '1', '2023-07-12', 1, '2023-07-10 03:14:34', '2023-07-10 03:39:17');

-- --------------------------------------------------------

--
-- Table structure for table `questions_attempts`
--

CREATE TABLE `questions_attempts` (
  `id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `right_ans` varchar(90) COLLATE utf8mb4_unicode_ci NOT NULL,
  `choose_ans` varchar(90) COLLATE utf8mb4_unicode_ci NOT NULL,
  `result` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `submit_date` varchar(299) COLLATE utf8mb4_unicode_ci NOT NULL,
  `attemptable_id` int(11) NOT NULL,
  `attemptable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `questions_tasks`
--

CREATE TABLE `questions_tasks` (
  `id` int(11) NOT NULL,
  `question_id` int(11) DEFAULT 0,
  `image` varchar(466) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_view` int(11) NOT NULL DEFAULT 0,
  `status` int(11) DEFAULT 0,
  `taskable_id` int(11) NOT NULL,
  `taskable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `questions_tasks`
--

INSERT INTO `questions_tasks` (`id`, `question_id`, `image`, `is_view`, `status`, `taskable_id`, `taskable_type`, `created_at`, `updated_at`) VALUES
(1, 1, '4', 1, 1, 1, 'App\\Models\\User', '2023-07-10 10:24:20', '2023-07-10 04:58:48');

-- --------------------------------------------------------

--
-- Table structure for table `questions_types`
--

CREATE TABLE `questions_types` (
  `id` int(11) NOT NULL,
  `name` varchar(266) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reward` tinyint(4) NOT NULL DEFAULT 5,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `questions_types`
--

INSERT INTO `questions_types` (`id`, `name`, `reward`, `created_at`, `updated_at`) VALUES
(1, 'Question 1', 5, '2023-07-10 06:29:59', '2023-07-10 06:29:59'),
(2, 'Question 2', 5, '2023-07-10 06:30:07', '2023-07-10 06:30:07'),
(3, 'Social Task 1', 5, '2023-07-10 06:30:19', '2023-07-10 06:30:19'),
(4, 'Social Task 2', 5, '2023-07-10 06:30:29', '2023-07-10 06:30:29'),
(5, 'Quiz Time', 5, '2023-07-10 06:30:37', '2023-07-10 06:30:37');

-- --------------------------------------------------------

--
-- Table structure for table `referral_users`
--

CREATE TABLE `referral_users` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `referral_code` varchar(299) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `referral_users`
--

INSERT INTO `referral_users` (`id`, `user_id`, `referral_code`, `parent_user_id`, `created_at`, `updated_at`) VALUES
(3, 22, 'HK1kllw8vi', 9, '2023-06-16 08:27:07', '2023-06-16 08:27:07'),
(4, 23, 'HK1kllw8vi', 9, '2023-06-16 08:50:13', '2023-06-16 08:50:13'),
(5, 25, 'HK1kllw8vi', 9, '2023-06-16 09:38:37', '2023-06-16 09:38:37'),
(6, 26, 'HK1kllw8vi', 9, '2023-06-16 09:39:45', '2023-06-16 09:39:45'),
(7, 27, 'HK1kllw8vi', 9, '2023-06-16 09:41:13', '2023-06-16 09:41:13'),
(8, 28, 'HK1kllw8vi', 9, '2023-06-16 09:44:02', '2023-06-16 09:44:02'),
(9, 30, 'HK1kllw8vi', 9, '2023-06-16 10:02:41', '2023-06-16 10:02:41'),
(10, 31, 'HK1kllw8vi', 9, '2023-06-16 10:04:43', '2023-06-16 10:04:43');

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id` int(11) NOT NULL,
  `friendships_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reportable_id` bigint(20) NOT NULL,
  `reportable_type` varchar(355) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rewards`
--

CREATE TABLE `rewards` (
  `id` int(11) NOT NULL,
  `type` varchar(90) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'business settings',
  `user_id` int(11) NOT NULL,
  `points` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `source_id` int(11) NOT NULL COMMENT 'blog id/question id/task id/business setting id',
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rewards`
--

INSERT INTO `rewards` (`id`, `type`, `user_id`, `points`, `source_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'referral_system', 27, '10', 1, 1, '2023-06-16 09:41:13', '2023-06-16 09:41:13'),
(2, 'referral_system', 28, '10', 2, 1, '2023-06-16 09:44:02', '2023-06-16 09:44:02'),
(3, 'referral_system', 29, '10', 2, 1, '2023-06-16 10:01:38', '2023-06-16 10:01:38'),
(4, 'referral_system', 30, '10', 2, 1, '2023-06-16 10:02:41', '2023-06-16 10:02:41'),
(5, 'referral_system_ru', 30, '10', 9, 1, '2023-06-16 10:02:41', '2023-06-16 10:02:41'),
(6, 'referral_system', 31, '10', 2, 1, '2023-06-16 10:04:43', '2023-06-16 10:04:43'),
(7, 'referral_system_ru', 9, '10', 9, 1, '2023-06-16 10:04:43', '2023-06-16 10:04:43');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Super-Admin', 'web', '2023-07-06 00:00:00', '2023-07-06 10:12:43'),
(2, 'Admin', 'web', '2023-07-06 00:00:00', '2023-07-06 10:12:58'),
(3, 'SEO', 'web', '2023-07-06 10:13:09', '2023-07-06 10:13:09'),
(4, 'Manager', 'web', '2023-07-06 10:13:24', '2023-07-06 10:13:24'),
(7, 'Editor', 'web', '2023-07-07 10:45:07', '2023-07-07 10:45:07');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(62, 1),
(62, 3),
(64, 3),
(64, 4),
(65, 1),
(66, 1),
(66, 4),
(68, 1),
(68, 3),
(74, 1),
(74, 4),
(78, 4),
(78, 7),
(80, 4),
(82, 1),
(82, 2),
(82, 4),
(82, 7),
(84, 7);

-- --------------------------------------------------------

--
-- Table structure for table `status_items`
--

CREATE TABLE `status_items` (
  `id` int(11) NOT NULL,
  `user_id` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(455) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expires_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `status_items`
--

INSERT INTO `status_items` (`id`, `user_id`, `slug`, `type`, `value`, `expires_at`, `created_at`, `updated_at`) VALUES
(17, '9', '', 'video', '41', '2023-06-13 05:56:34', '2023-06-12 11:37:34', '2023-06-13 11:37:34'),
(18, '5', '', 'video', '42', '2023-06-14 11:38:45', '2023-06-13 11:38:45', '2023-06-13 11:38:45'),
(19, '4', '', 'video', '43', '2023-06-14 11:39:29', '2023-06-13 11:39:29', '2023-06-13 11:39:29'),
(20, '9', '', 'video', '44', '2023-06-14 11:46:13', '2023-06-13 11:46:13', '2023-06-13 11:46:13'),
(21, '3', '', 'video', '45', '2023-06-05 11:58:47', '2023-06-06 11:58:47', '2023-06-13 11:58:47'),
(22, '9', '', 'video', '46', '2023-06-14 12:00:20', '2023-06-13 12:00:20', '2023-06-13 12:00:20'),
(23, '3', '', 'video', '47', '2023-06-14 12:00:40', '2023-06-13 12:00:40', '2023-06-13 12:00:40'),
(24, '8', '', 'video', '48', '2023-06-15 05:26:31', '2023-06-14 05:26:31', '2023-06-14 05:26:31'),
(25, '9', '', 'video', '49', '2023-06-15 03:55:10', '2023-06-14 03:55:10', '2023-06-14 05:55:10'),
(26, '1', 'xfwhy960eh', 'image', '96', '2023-06-27 07:24:00', '2023-06-26 07:24:00', '2023-06-26 07:24:01'),
(27, '9', 'qpmcwozk2f27', 'image', '97', '2023-06-27 07:29:42', '2023-06-26 07:29:42', '2023-06-26 07:29:43'),
(28, '1', 'xfwhy960eh', 'image', '96', '2023-06-27 07:24:00', '2023-06-26 07:24:00', '2023-06-26 07:24:01'),
(29, '9', 'fkcckajcrn29', 'image', '98', '2023-06-27 07:39:24', '2023-06-26 07:39:24', '2023-06-26 07:39:25');

-- --------------------------------------------------------

--
-- Table structure for table `status_items_tracks`
--

CREATE TABLE `status_items_tracks` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status_items_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `status_items_tracks`
--

INSERT INTO `status_items_tracks` (`id`, `user_id`, `status_items_id`, `created_at`, `updated_at`) VALUES
(1, 6, 20, '2023-06-13 12:12:08', '2023-06-13 12:12:08'),
(2, 7, 22, '2023-06-14 06:47:24', '2023-06-14 06:47:24'),
(3, 7, 25, '2023-06-14 06:47:42', '2023-06-14 06:47:42'),
(4, 9, 24, '2023-06-14 06:47:55', '2023-06-14 06:47:55'),
(5, 6, 22, '2023-06-14 06:48:06', '2023-06-14 06:48:06');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` int(11) NOT NULL,
  `name` varchar(455) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(5, 'Tag 1', 'tag-1', '2023-08-04 03:50:51', '2023-08-04 03:50:51'),
(6, 'Tag 2', 'tag-2', '2023-08-04 03:50:54', '2023-08-04 03:50:54');

-- --------------------------------------------------------

--
-- Table structure for table `translations`
--

CREATE TABLE `translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `lang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lang_key` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `lang_value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `translations`
--

INSERT INTO `translations` (`id`, `lang`, `lang_key`, `lang_value`, `created_at`, `updated_at`) VALUES
(29, 'en', 'Log in', 'Log in', '2023-06-26 09:48:47', '2023-06-26 09:48:47'),
(30, 'en', 'email', 'email', '2023-06-26 09:48:47', '2023-06-26 09:48:47'),
(31, 'en', 'Password', 'Password', '2023-06-26 09:48:47', '2023-06-26 09:48:47'),
(32, 'en', 'Remember Me', 'Remember Me', '2023-06-26 09:48:47', '2023-06-26 09:48:47'),
(33, 'en', 'SIGN IN', 'SIGN IN', '2023-06-26 09:48:47', '2023-06-26 09:48:47'),
(34, 'en', 'Forget Password', 'Forget Password', '2023-06-26 09:48:47', '2023-06-26 09:48:47'),
(35, 'en', 'Designed by', 'Designed by', '2023-06-26 09:48:47', '2023-06-26 09:48:47'),
(36, 'en', 'Sign Up', 'Sign Up', '2023-07-06 13:02:37', '2023-07-06 13:02:37'),
(37, 'en', 'Register a new membership', 'Register a new membership', '2023-07-06 13:02:37', '2023-07-06 13:02:37'),
(38, 'en', 'Username', 'Username', '2023-07-06 13:02:37', '2023-07-06 13:02:37'),
(39, 'en', 'Enter Email', 'Enter Email', '2023-07-06 13:02:37', '2023-07-06 13:02:37'),
(40, 'en', 'Confirm Password', 'Confirm Password', '2023-07-06 13:02:37', '2023-07-06 13:02:37'),
(41, 'en', 'I read and agree to the', 'I read and agree to the', '2023-07-06 13:02:37', '2023-07-06 13:02:37'),
(42, 'en', 'You already have a membership', 'You already have a membership', '2023-07-06 13:02:37', '2023-07-06 13:02:37'),
(43, 'en', 'Enter phone', 'Enter phone', '2023-07-06 13:04:33', '2023-07-06 13:04:33'),
(44, 'in', 'Enter phone', 'Enter 32432', '2023-07-11 07:07:27', '2023-07-11 07:07:27'),
(45, 'bd', 'Enter phone', 'Enter mobile', '2023-07-11 07:07:47', '2023-07-11 07:07:47'),
(46, 'bd', 'Sign Up', 'Sign Up be', '2023-07-11 07:08:22', '2023-07-11 07:08:22');

-- --------------------------------------------------------

--
-- Table structure for table `uploads`
--

CREATE TABLE `uploads` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `collection_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(355) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mime_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `disk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `conversions_disk` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` bigint(20) UNSIGNED NOT NULL,
  `manipulations` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`manipulations`)),
  `custom_properties` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`custom_properties`)),
  `generated_conversions` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`generated_conversions`)),
  `responsive_images` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`responsive_images`)),
  `order_column` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `uploads`
--

INSERT INTO `uploads` (`id`, `model_type`, `model_id`, `uuid`, `collection_name`, `name`, `file_name`, `mime_type`, `disk`, `conversions_disk`, `size`, `manipulations`, `custom_properties`, `generated_conversions`, `responsive_images`, `order_column`, `created_at`, `updated_at`) VALUES
(2, 'App\\Models\\User', 9, '2b167fdb-54b1-4065-89ff-288a23062023', 'user', 'Academicsdropdown', 'Academicsdropdown.jpg', 'image/jpeg', 'uploads', 'uploads', 20667, '[]', '{\"purpose\":\"profile\"}', '{\"full\":true,\"thumb\":true,\"cover\":true,\"avatar\":true,\"placeholder\":true}', '[]', 2, '2023-06-13 08:30:08', '2023-06-13 08:30:08'),
(3, 'App\\Models\\User', 9, '8f4b82d1-1d68-4975-a9a6-bbd6a96752fb', 'user', 'fghyu', 'fghyu.jpg', 'image/jpeg', 'uploads', 'uploads', 24018, '[]', '{\"purpose\":\"profile\"}', '{\"full\":true,\"thumb\":true,\"cover\":true,\"avatar\":true,\"placeholder\":true}', '[]', 3, '2023-06-13 08:30:08', '2023-06-13 08:30:09'),
(4, 'App\\Models\\User', 9, '6d8d8947-3b23-4cd1-a79d-22a86690fb52', 'user', 'abt-dropdown', 'abt-dropdown.jpeg', 'image/jpeg', 'uploads', 'uploads', 20519, '[]', '{\"purpose\":\"profile\"}', '{\"full\":true,\"thumb\":true,\"cover\":true,\"avatar\":true,\"placeholder\":true}', '[]', 4, '2023-06-13 08:32:56', '2023-06-13 08:32:56'),
(5, 'App\\Models\\User', 9, 'b26d8cd7-1f7b-4514-9ef0-6b0626f6af17', 'user', 'Academicsdropdown', 'Academicsdropdown.jpg', 'image/jpeg', 'uploads', 'uploads', 20667, '[]', '{\"purpose\":\"profile\"}', '{\"full\":true,\"thumb\":true,\"cover\":true,\"avatar\":true,\"placeholder\":true}', '[]', 5, '2023-06-13 08:32:56', '2023-06-13 08:32:56'),
(6, 'App\\Models\\User', 9, '820fead1-31b2-4207-9c20-7f612fd7326b', 'user', 'fghyu', 'fghyu.jpg', 'image/jpeg', 'uploads', 'uploads', 24018, '[]', '{\"purpose\":\"profile\"}', '{\"full\":true,\"thumb\":true,\"cover\":true,\"avatar\":true,\"placeholder\":true}', '[]', 6, '2023-06-13 08:32:56', '2023-06-13 08:32:57'),
(7, 'App\\Models\\User', 9, 'f2ae580e-88b8-4c6b-b367-9a4da45ece9c', 'user', '0d1ecfcc6f1249d8fb2963f6a27dca9c', '0d1ecfcc6f1249d8fb2963f6a27dca9c.jpg', 'image/jpeg', 'uploads', 'uploads', 15304, '[]', '{\"purpose\":\"profile\"}', '{\"full\":true,\"thumb\":true,\"cover\":true,\"avatar\":true,\"placeholder\":true}', '[]', 7, '2023-06-13 09:32:42', '2023-06-13 09:32:43'),
(8, 'App\\Models\\User', 9, 'e34c9f8e-9f28-4cc9-a764-19b576e227a2', 'user', '0d1ecfcc6f1249d8fb2963f6a27dca9c', '0d1ecfcc6f1249d8fb2963f6a27dca9c.jpg', 'image/jpeg', 'uploads', 'uploads', 15304, '[]', '{\"purpose\":\"profile\"}', '{\"full\":true,\"thumb\":true,\"cover\":true,\"avatar\":true,\"placeholder\":true}', '[]', 8, '2023-06-13 09:33:33', '2023-06-13 09:33:34'),
(9, 'App\\Models\\User', 9, '549249d9-dddd-4644-9b19-bdfb88a29d08', 'user', '0d1ecfcc6f1249d8fb2963f6a27dca9c', '0d1ecfcc6f1249d8fb2963f6a27dca9c.jpg', 'image/jpeg', 'uploads', 'uploads', 15304, '[]', '{\"purpose\":\"profile\"}', '{\"full\":true,\"thumb\":true,\"cover\":true,\"avatar\":true,\"placeholder\":true}', '[]', 9, '2023-06-13 09:34:14', '2023-06-13 09:34:14'),
(10, 'App\\Models\\User', 9, 'f3a84ea3-ffa5-4e1b-92b4-a85264183e67', 'user', '0d1ecfcc6f1249d8fb2963f6a27dca9c', '0d1ecfcc6f1249d8fb2963f6a27dca9c.jpg', 'image/jpeg', 'uploads', 'uploads', 15304, '[]', '{\"purpose\":\"profile\"}', '{\"full\":true,\"thumb\":true,\"cover\":true,\"avatar\":true,\"placeholder\":true}', '[]', 10, '2023-06-13 09:35:09', '2023-06-13 09:35:10'),
(11, 'App\\Models\\User', 9, '20ce5cdd-791d-486f-b085-135812b8c94d', 'user', '0d1ecfcc6f1249d8fb2963f6a27dca9c', '0d1ecfcc6f1249d8fb2963f6a27dca9c.jpg', 'image/jpeg', 'uploads', 'uploads', 15304, '[]', '{\"purpose\":\"profile\"}', '{\"full\":true,\"thumb\":true,\"cover\":true,\"avatar\":true,\"placeholder\":true}', '[]', 11, '2023-06-13 09:35:40', '2023-06-13 09:35:41'),
(13, 'App\\Models\\User', 9, '75e138f2-f4a4-4a92-9392-3c778eb6c907', 'user', '0d1ecfcc6f1249d8fb2963f6a27dca9c', '0d1ecfcc6f1249d8fb2963f6a27dca9c.jpg', 'image/jpeg', 'uploads', 'uploads', 15304, '[]', '{\"purpose\":\"profile\"}', '{\"full\":true,\"thumb\":true,\"cover\":true,\"avatar\":true,\"placeholder\":true}', '[]', 12, '2023-06-13 09:36:21', '2023-06-13 09:36:21'),
(14, 'App\\Models\\Dog', 2, 'd004c12e-6f24-4140-9da1-aff2bddedbe6', 'dogs', '5UWJqzcEXMaoVIZ6crOKfAWMu9SEoUNjld1Zw8ne', '5UWJqzcEXMaoVIZ6crOKfAWMu9SEoUNjld1Zw8ne.png', 'image/png', 'uploads_dogs', 'uploads_dogs', 307331, '[]', '{\"purpose\":\"dogs\"}', '{\"full\":true,\"thumb\":true,\"cover\":true,\"avatar\":true,\"placeholder\":true}', '[]', 1, '2023-06-13 09:36:21', '2023-06-13 09:36:22'),
(15, 'App\\Models\\User', 9, 'e3c6973c-0e51-44a7-a198-cbe0e02061b0', 'user', '0d1ecfcc6f1249d8fb2963f6a27dca9c', '0d1ecfcc6f1249d8fb2963f6a27dca9c.jpg', 'image/jpeg', 'uploads', 'uploads', 15304, '[]', '{\"purpose\":\"profile\"}', '{\"full\":true,\"thumb\":true,\"cover\":true,\"avatar\":true,\"placeholder\":true}', '[]', 13, '2023-06-13 09:38:32', '2023-06-13 09:38:33'),
(16, 'App\\Models\\Dog', 3, '6653c44f-1832-4beb-9508-126df81f6d16', 'dogs', '5UWJqzcEXMaoVIZ6crOKfAWMu9SEoUNjld1Zw8ne', '5UWJqzcEXMaoVIZ6crOKfAWMu9SEoUNjld1Zw8ne.png', 'image/png', 'uploads_dogs', 'uploads_dogs', 307331, '[]', '{\"purpose\":\"dogs\"}', '{\"full\":true,\"thumb\":true,\"cover\":true,\"avatar\":true,\"placeholder\":true}', '[]', 1, '2023-06-13 09:38:33', '2023-06-13 09:38:33'),
(17, 'App\\Models\\User', 9, '95190f71-cbcc-4046-aaff-8e2ea4a89b3d', 'user', '0d1ecfcc6f1249d8fb2963f6a27dca9c', '0d1ecfcc6f1249d8fb2963f6a27dca9c.jpg', 'image/jpeg', 'uploads', 'uploads', 15304, '[]', '{\"purpose\":\"profile\"}', '{\"full\":true,\"thumb\":true,\"cover\":true,\"avatar\":true,\"placeholder\":true}', '[]', 14, '2023-06-13 09:38:56', '2023-06-13 09:38:56'),
(18, 'App\\Models\\Dog', 4, 'bbd923b3-0ac0-4d8e-a386-a495ac533b82', 'dogs', '4CwoKexDLHk4c4X3Ukv6OYC5gsGgEp473R36zXxs', '4CwoKexDLHk4c4X3Ukv6OYC5gsGgEp473R36zXxs.png', 'image/png', 'uploads_dogs', 'uploads_dogs', 32067, '[]', '{\"purpose\":\"dogs\"}', '{\"full\":true,\"thumb\":true,\"cover\":true,\"avatar\":true,\"placeholder\":true}', '[]', 1, '2023-06-13 09:38:56', '2023-06-13 09:38:57'),
(19, 'App\\Models\\Dog', 4, '537fbf2d-1018-4b97-8a2c-efdf46758a16', 'dogs', '6xEmESWStQBXE6JmeujrdFNdOa3ELuD5gBzXJXzC', '6xEmESWStQBXE6JmeujrdFNdOa3ELuD5gBzXJXzC.png', 'image/png', 'uploads_dogs', 'uploads_dogs', 36165, '[]', '{\"purpose\":\"dogs\"}', '{\"full\":true,\"thumb\":true,\"cover\":true,\"avatar\":true,\"placeholder\":true}', '[]', 2, '2023-06-13 09:38:57', '2023-06-13 09:38:57'),
(20, 'App\\Models\\User', 9, '8f0aad2e-74f4-42fa-aba3-9b4b38a76800', 'user', 'abt-dropdown', 'abt-dropdown.jpeg', 'image/jpeg', 'uploads', 'uploads', 20519, '[]', '{\"purpose\":\"profile\"}', '{\"full\":true,\"thumb\":true,\"cover\":true,\"avatar\":true,\"placeholder\":true}', '[]', 15, '2023-06-13 09:51:34', '2023-06-13 09:51:35'),
(24, 'App\\Models\\Dog', 5, 'eedd2287-ffda-4656-ad27-a1add4a1ec5d', 'dogs', 'VLHGMdKNYC9d2Nqo8XwxOrMnp8fGI6YWNERP7kTi', 'VLHGMdKNYC9d2Nqo8XwxOrMnp8fGI6YWNERP7kTi.jpg', 'image/jpeg', 'uploads_dogs', 'uploads_dogs', 90469, '[]', '{\"purpose\":\"dogs\"}', '{\"full\":true,\"thumb\":true,\"cover\":true,\"avatar\":true,\"placeholder\":true}', '[]', 2, '2023-06-13 09:51:38', '2023-06-13 09:51:40'),
(25, 'App\\Models\\User', 9, '3a947ab9-1f13-46e6-928b-14e600b31c57', 'user', 'abt-dropdown', 'abt-dropdown.jpeg', 'image/jpeg', 'uploads', 'uploads', 20519, '[]', '{\"purpose\":\"profile\"}', '{\"full\":true,\"thumb\":true,\"cover\":true,\"avatar\":true,\"placeholder\":true}', '[]', 18, '2023-06-13 10:22:18', '2023-06-13 10:22:19'),
(26, 'App\\Models\\User', 9, '6d72c966-e578-4c77-854a-893be596ae83', 'user', 'Academicsdropdown', 'Academicsdropdown.jpg', 'image/jpeg', 'uploads', 'uploads', 20667, '[]', '{\"purpose\":\"profile\"}', '{\"full\":true,\"thumb\":true,\"cover\":true,\"avatar\":true,\"placeholder\":true}', '[]', 19, '2023-06-13 10:22:19', '2023-06-13 10:22:19'),
(27, 'App\\Models\\User', 9, 'd4733b1f-4027-4551-9587-d473cd3543f8', 'user', 'image_menu', 'image_menu.jpeg', 'image/jpeg', 'uploads', 'uploads', 101094, '[]', '{\"purpose\":\"profile\"}', '{\"full\":true,\"thumb\":true,\"cover\":true,\"avatar\":true,\"placeholder\":true}', '[]', 20, '2023-06-13 10:22:19', '2023-06-13 10:22:20'),
(28, 'App\\Models\\Dog', 6, 'a813b14b-12f8-4b89-93cc-a3b9936a8c17', 'dogs', 'NrPBj8vCb3fZoWi59K6ldXN8VBA0AXsei7szIbcY', 'NrPBj8vCb3fZoWi59K6ldXN8VBA0AXsei7szIbcY.jpg', 'image/jpeg', 'uploads_dogs', 'uploads_dogs', 100933, '[]', '{\"purpose\":\"dogs\"}', '{\"full\":true,\"thumb\":true,\"cover\":true,\"avatar\":true,\"placeholder\":true}', '[]', 1, '2023-06-13 10:22:20', '2023-06-13 10:22:22'),
(29, 'App\\Models\\Dog', 6, '4f0e1689-33f9-44a0-a0e5-72c5c66d621d', 'dogs', 'VLHGMdKNYC9d2Nqo8XwxOrMnp8fGI6YWNERP7kTi', 'VLHGMdKNYC9d2Nqo8XwxOrMnp8fGI6YWNERP7kTi.jpg', 'image/jpeg', 'uploads_dogs', 'uploads_dogs', 90469, '[]', '{\"purpose\":\"dogs\"}', '{\"full\":true,\"thumb\":true,\"cover\":true,\"avatar\":true,\"placeholder\":true}', '[]', 2, '2023-06-13 10:22:22', '2023-06-13 10:22:24'),
(30, 'App\\Models\\User', 9, 'bb589153-a0f5-4ffa-99e4-95e4174fdb1f', 'user', 'abt-dropdown', 'abt-dropdown.jpeg', 'image/jpeg', 'uploads', 'uploads', 20519, '[]', '{\"purpose\":\"profile\"}', '{\"full\":true,\"thumb\":true,\"cover\":true,\"avatar\":true,\"placeholder\":true}', '[]', 21, '2023-06-13 10:23:03', '2023-06-13 10:23:04'),
(31, 'App\\Models\\User', 9, 'e8563f10-b636-4c3a-b9d9-fcb829ff5981', 'user', 'Academicsdropdown', 'Academicsdropdown.jpg', 'image/jpeg', 'uploads', 'uploads', 20667, '[]', '{\"purpose\":\"profile\"}', '{\"full\":true,\"thumb\":true,\"cover\":true,\"avatar\":true,\"placeholder\":true}', '[]', 22, '2023-06-13 10:23:04', '2023-06-13 10:23:04'),
(32, 'App\\Models\\User', 9, 'dde58201-666f-48d7-aec9-89294b1a0702', 'user', 'image_menu', 'image_menu.jpeg', 'image/jpeg', 'uploads', 'uploads', 101094, '[]', '{\"purpose\":\"profile\"}', '{\"full\":true,\"thumb\":true,\"cover\":true,\"avatar\":true,\"placeholder\":true}', '[]', 23, '2023-06-13 10:23:04', '2023-06-13 10:23:05'),
(33, 'App\\Models\\Dog', 7, '30bcec8c-c6ae-4c4a-86f6-81c4e83f1bfd', 'dogs', 'NrPBj8vCb3fZoWi59K6ldXN8VBA0AXsei7szIbcY', 'NrPBj8vCb3fZoWi59K6ldXN8VBA0AXsei7szIbcY.jpg', 'image/jpeg', 'uploads_dogs', 'uploads_dogs', 100933, '[]', '{\"purpose\":\"dogs\"}', '{\"full\":true,\"thumb\":true,\"cover\":true,\"avatar\":true,\"placeholder\":true}', '[]', 1, '2023-06-13 10:23:05', '2023-06-13 10:23:08'),
(34, 'App\\Models\\Dog', 7, '69a6a2c7-42a5-4b92-8408-18ce26cd5bf6', 'dogs', 'VLHGMdKNYC9d2Nqo8XwxOrMnp8fGI6YWNERP7kTi', 'VLHGMdKNYC9d2Nqo8XwxOrMnp8fGI6YWNERP7kTi.jpg', 'image/jpeg', 'uploads_dogs', 'uploads_dogs', 90469, '[]', '{\"purpose\":\"dogs\"}', '{\"full\":true,\"thumb\":true,\"cover\":true,\"avatar\":true,\"placeholder\":true}', '[]', 2, '2023-06-13 10:23:08', '2023-06-13 10:23:10'),
(36, 'App\\Models\\StatusItem', 12, '6087c624-8598-4393-9e49-6647d7946dd5', 'status_video', 'Vijay Devrakonda with other actress ❤ #shorts #vijaydevarakonda #actress #rashmika #rashmikamandanna', 'Vijay-Devrakonda-with-other-actress-❤--shorts--vijaydevarakonda--actress--rashmika--rashmikamandanna.mp4', 'video/mp4', 'uploads_status', 'uploads_status', 1547984, '[]', '{\"purpose\":\"status_video\"}', '[]', '[]', 1, '2023-06-13 11:23:09', '2023-06-13 11:23:09'),
(37, 'App\\Models\\StatusItem', 13, '247068da-84e6-4882-935f-3e897be53ec8', 'status_video', 'Vijay Devrakonda with other actress ❤ #shorts #vijaydevarakonda #actress #rashmika #rashmikamandanna', 'Vijay-Devrakonda-with-other-actress-❤--shorts--vijaydevarakonda--actress--rashmika--rashmikamandanna.mp4', 'video/mp4', 'uploads_status', 'uploads_status', 1547984, '[]', '{\"purpose\":\"status_video\"}', '[]', '[]', 1, '2023-06-13 11:24:31', '2023-06-13 11:24:31'),
(38, 'App\\Models\\StatusItem', 14, 'bf202d70-b56f-4882-8aea-8a20a745d795', 'status_video', 'Vijay Devrakonda with other actress ❤ #shorts #vijaydevarakonda #actress #rashmika #rashmikamandanna', 'Vijay-Devrakonda-with-other-actress-❤--shorts--vijaydevarakonda--actress--rashmika--rashmikamandanna.mp4', 'video/mp4', 'uploads_status', 'uploads_status', 1547984, '[]', '{\"purpose\":\"status_video\"}', '[]', '[]', 1, '2023-06-13 11:25:53', '2023-06-13 11:25:53'),
(39, 'App\\Models\\StatusItem', 15, '290ce801-ac53-40ac-95ba-0fb548ae2b44', 'status_video', 'Krithi Shetty status..Women Attitude...', 'Krithi-Shetty-status..Women-Attitude....mp4', 'video/mp4', 'uploads_status', 'uploads_status', 2831448, '[]', '{\"purpose\":\"status_video\"}', '[]', '[]', 1, '2023-06-13 11:35:07', '2023-06-13 11:35:07'),
(40, 'App\\Models\\StatusItem', 16, '3da17b83-672e-4025-a351-d2b0c478732e', 'status_video', 'Krithi Shetty status..Women Attitude...', 'Krithi-Shetty-status..Women-Attitude....mp4', 'video/mp4', 'uploads_status', 'uploads_status', 2831448, '[]', '{\"purpose\":\"status_video\"}', '[]', '[]', 1, '2023-06-13 11:36:16', '2023-06-13 11:36:16'),
(41, 'App\\Models\\StatusItem', 17, 'c087f080-0b6a-4ea4-99c9-b0044201921a', 'status_video', 'Krithi Shetty status..Women Attitude...', 'Krithi-Shetty-status..Women-Attitude....mp4', 'video/mp4', 'uploads_status', 'uploads_status', 2831448, '[]', '{\"purpose\":\"status_video\"}', '[]', '[]', 1, '2023-06-13 11:37:34', '2023-06-13 11:37:34'),
(42, 'App\\Models\\StatusItem', 18, 'eef082e5-0ffa-49fe-9044-04630b5ad928', 'status_video', 'Krithi Shetty status..Women Attitude...', 'Krithi-Shetty-status..Women-Attitude....mp4', 'video/mp4', 'uploads_status', 'uploads_status', 2831448, '[]', '{\"purpose\":\"status_video\"}', '[]', '[]', 1, '2023-06-13 11:38:45', '2023-06-13 11:38:45'),
(43, 'App\\Models\\StatusItem', 19, 'a68535b6-d243-4285-988d-56ee8191c0be', 'status_video', 'Krithi Shetty status..Women Attitude...', 'Krithi-Shetty-status..Women-Attitude....mp4', 'video/mp4', 'uploads_status', 'uploads_status', 2831448, '[]', '{\"purpose\":\"status_video\"}', '[]', '[]', 1, '2023-06-13 11:39:29', '2023-06-13 11:39:29'),
(44, 'App\\Models\\StatusItem', 20, '4b732b6e-9814-4fe2-93ed-6891999d1bc4', 'status_video', 'Krithi Shetty status..Women Attitude...', 'Krithi-Shetty-status..Women-Attitude....mp4', 'video/mp4', 'uploads_status', 'uploads_status', 2831448, '[]', '{\"purpose\":\"status_video\"}', '[]', '[]', 1, '2023-06-13 11:46:13', '2023-06-13 11:46:13'),
(45, 'App\\Models\\StatusItem', 21, '9200cac5-66a4-40e1-a615-ab796ed8446f', 'status_video', 'Pooja Hegde ❤️ Cute Expression 🥰', 'Pooja-Hegde-❤️-Cute-Expression-🥰.mp4', 'video/mp4', 'uploads_status', 'uploads_status', 522541, '[]', '{\"purpose\":\"status_video\"}', '[]', '[]', 1, '2023-06-13 11:58:47', '2023-06-13 11:58:47'),
(46, 'App\\Models\\StatusItem', 22, 'b8f883d1-9317-4638-aa5f-9ab30138afa8', 'status_video', 'Pooja Hegde ❤️ Cute Expression 🥰', 'Pooja-Hegde-❤️-Cute-Expression-🥰.mp4', 'video/mp4', 'uploads_status', 'uploads_status', 522541, '[]', '{\"purpose\":\"status_video\"}', '[]', '[]', 1, '2023-06-13 12:00:20', '2023-06-13 12:00:20'),
(47, 'App\\Models\\StatusItem', 23, '33c5814c-198d-4fc1-8500-89f075ca7d1c', 'status_video', 'Pooja Hegde ❤️ Cute Expression 🥰', 'Pooja-Hegde-❤️-Cute-Expression-🥰.mp4', 'video/mp4', 'uploads_status', 'uploads_status', 522541, '[]', '{\"purpose\":\"status_video\"}', '[]', '[]', 1, '2023-06-13 12:00:40', '2023-06-13 12:00:40'),
(48, 'App\\Models\\StatusItem', 24, '4b517965-dbb3-4f7c-830b-f67eaa0612d1', 'status_video', 'KGF chapter 2 🔥 hot style 🔥 Srinidhi shetty #shorts', 'KGF-chapter-2-🔥-hot-style-🔥-Srinidhi-shetty--shorts.mp4', 'video/mp4', 'uploads_status', 'uploads_status', 497562, '[]', '{\"purpose\":\"status_video\"}', '[]', '[]', 1, '2023-06-14 05:26:31', '2023-06-14 05:26:31'),
(49, 'App\\Models\\StatusItem', 25, '40ae3e95-3c97-4d0b-b5e9-74e64d2c09a4', 'status_video', 'KGF chapter 2 🔥 hot style 🔥 Srinidhi shetty #shorts', 'KGF-chapter-2-🔥-hot-style-🔥-Srinidhi-shetty--shorts.mp4', 'video/mp4', 'uploads_status', 'uploads_status', 497562, '[]', '{\"purpose\":\"status_video\"}', '[]', '[]', 1, '2023-06-14 05:55:10', '2023-06-14 05:55:10'),
(90, 'App\\Models\\Feed', 10, '935a694c-b43f-4cfd-b64d-6bb8067afef9', 'feeds', '6xEmESWStQBXE6JmeujrdFNdOa3ELuD5gBzXJXzC', '6xEmESWStQBXE6JmeujrdFNdOa3ELuD5gBzXJXzC.png', 'image/png', 'feeds', 'feeds', 36165, '[]', '{\"purpose\":\"Dog Feeds\"}', '{\"full\":true,\"thumb\":true,\"cover\":true,\"avatar\":true,\"placeholder\":true}', '[]', 1, '2023-06-23 13:16:08', '2023-06-23 13:16:08'),
(91, 'App\\Models\\Feed', 11, 'db83fde4-e46a-4961-a0ef-75d99887ff8e', 'feeds', '6xEmESWStQBXE6JmeujrdFNdOa3ELuD5gBzXJXzC', '6xEmESWStQBXE6JmeujrdFNdOa3ELuD5gBzXJXzC.png', 'image/png', 'feeds', 'feeds', 36165, '[]', '{\"purpose\":\"Dog Feeds\"}', '{\"full\":true,\"thumb\":true,\"cover\":true,\"avatar\":true,\"placeholder\":true}', '[]', 1, '2023-06-23 13:17:09', '2023-06-23 13:17:09'),
(92, 'App\\Models\\Feed', 12, '90781f68-4373-479b-bef3-5d03efb09fd5', 'feeds', '6xEmESWStQBXE6JmeujrdFNdOa3ELuD5gBzXJXzC', '6xEmESWStQBXE6JmeujrdFNdOa3ELuD5gBzXJXzC.png', 'image/png', 'feeds', 'feeds', 36165, '[]', '{\"purpose\":\"Dog Feeds\"}', '{\"full\":true,\"thumb\":true,\"cover\":true,\"avatar\":true,\"placeholder\":true}', '[]', 1, '2023-06-23 13:17:13', '2023-06-23 13:17:14'),
(93, 'App\\Models\\Feed', 13, '2847aadc-5fb0-4a4c-aad8-d4819fde97a9', 'feeds', '6xEmESWStQBXE6JmeujrdFNdOa3ELuD5gBzXJXzC', '6xEmESWStQBXE6JmeujrdFNdOa3ELuD5gBzXJXzC.png', 'image/png', 'feeds', 'feeds', 36165, '[]', '{\"purpose\":\"Dog Feeds\"}', '{\"full\":true,\"thumb\":true,\"cover\":true,\"avatar\":true,\"placeholder\":true}', '[]', 1, '2023-06-23 13:17:37', '2023-06-23 13:17:39'),
(96, 'App\\Models\\StatusItem', 26, '5b8f2e8a-3e65-4840-8f08-c565d9085ec2', 'status_image', '0d1ecfcc6f1249d8fb2963f6a27dca9c', '0d1ecfcc6f1249d8fb2963f6a27dca9c.jpg', 'image/jpeg', 'uploads_status', 'uploads_status', 15304, '[]', '{\"purpose\":\"status_image\"}', '{\"video\":true,\"full\":true,\"thumb\":true,\"cover\":true,\"placeholder\":true}', '[]', 1, '2023-06-26 07:24:00', '2023-06-26 07:24:01'),
(97, 'App\\Models\\StatusItem', 27, '8ae49310-187d-400e-a044-50951ce3bf1f', 'status_image', '0d1ecfcc6f1249d8fb2963f6a27dca9c', '0d1ecfcc6f1249d8fb2963f6a27dca9c.jpg', 'image/jpeg', 'uploads_status', 'uploads_status', 15304, '[]', '{\"purpose\":\"status_image\"}', '{\"video\":true,\"full\":true,\"thumb\":true,\"cover\":true,\"placeholder\":true}', '[]', 1, '2023-06-26 07:29:42', '2023-06-26 07:29:43'),
(98, 'App\\Models\\StatusItem', 29, '260739fc-1834-4078-a8ee-e7beb98250f9', 'status_image', '0d1ecfcc6f1249d8fb2963f6a27dca9c', '0d1ecfcc6f1249d8fb2963f6a27dca9c.jpg', 'image/jpeg', 'uploads_status', 'uploads_status', 15304, '[]', '{\"purpose\":\"status_image\"}', '{\"video\":true,\"full\":true,\"thumb\":true,\"cover\":true,\"placeholder\":true}', '[]', 1, '2023-06-26 07:39:24', '2023-06-26 07:39:25'),
(100, 'App\\Models\\User', 1, '78e1d2a3-181d-4fa4-883b-21b52fedb109', 'user', 'New image', 'Screenshot-(1).png', 'image/png', 'uploads', 'uploads', 872701, '[]', '{\"purpose\":\"global\"}', '{\"full\":true,\"thumb\":true,\"cover\":true,\"avatar\":true,\"placeholder\":true}', '[]', 2, '2023-07-04 10:05:37', '2023-07-04 10:12:58'),
(101, 'App\\Models\\User', 1, 'e3b0b1cd-be32-480a-94d4-16d785f6154a', 'user', 'Screenshot (2) rwe 33 3', 'Screenshot-(2).png', 'image/png', 'uploads', 'uploads', 843972, '[]', '{\"purpose\":\"global\"}', '{\"full\":true,\"thumb\":true,\"cover\":true,\"avatar\":true,\"placeholder\":true}', '[]', 3, '2023-07-04 10:05:38', '2023-07-04 10:12:26'),
(102, 'App\\Models\\User', 1, 'f89a3cfd-a64a-4cc5-91bc-50476b6955bb', 'user', 'logo', 'logo.svg', 'image/svg+xml', 'uploads', 'uploads', 12295, '[]', '{\"purpose\":\"global\"}', '[]', '[]', 4, '2023-07-04 11:03:46', '2023-07-04 11:03:46'),
(103, 'App\\Models\\User', 1, '2c14cba2-4bd5-4e84-bb91-001679b8a1a2', 'user', 'login_image', 'login_image.jpg', 'image/jpeg', 'uploads', 'uploads', 90990, '[]', '{\"purpose\":\"global\"}', '{\"full\":true,\"thumb\":true,\"cover\":true,\"avatar\":true,\"placeholder\":true}', '[]', 5, '2023-07-04 11:04:46', '2023-07-04 11:04:47'),
(104, 'App\\Models\\User', 1, '43cde451-d88f-4b7e-ba7d-a50a7cf92685', 'user', 'fresh__3_-removebg-preview', 'fresh__3_-removebg-preview.png', 'image/png', 'uploads', 'uploads', 43308, '[]', '{\"purpose\":\"global\"}', '{\"full\":true,\"thumb\":true,\"cover\":true,\"avatar\":true,\"placeholder\":true}', '[]', 6, '2023-08-02 23:25:19', '2023-08-02 23:25:35');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_type` varchar(199) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'customer',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(256) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `avatar_original` varchar(256) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `reward_balance` bigint(20) NOT NULL DEFAULT 0,
  `balance` double(8,2) NOT NULL DEFAULT 0.00,
  `referral_code` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `banned` tinyint(4) NOT NULL DEFAULT 0,
  `age` int(11) NOT NULL DEFAULT 15,
  `gender` enum('0','1','2','3') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `social_links` varchar(599) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_type`, `name`, `email`, `phone`, `email_verified_at`, `password`, `avatar`, `avatar_original`, `reward_balance`, `balance`, `referral_code`, `banned`, `age`, `gender`, `social_links`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin', 'superadmin@gmail.com', '+9172067376273', NULL, '$2y$10$Wer5DM5Hpd4We1hifrgbTuyGrR5qG5Udy/SdVOaOcYAWF4PoUtAma', NULL, NULL, 0, 0.00, 'HM1kllw8v3', 0, 15, '0', NULL, NULL, '2023-06-12 08:36:30', '2023-08-02 05:45:20'),
(22, 'customer', 'dipannebyrefer@gmail.com', 'dipannebyrefer@gmail.com', 'dipannebyrefer@gmail.com', NULL, '$2y$10$kAsn56Y0.EZbyTt1ldymQuPX364VpXfjTm81HFSJPNeKqd3FaVW3S', NULL, NULL, 0, 0.00, 'uTwiBkowpN', 0, 15, '0', NULL, NULL, '2023-06-16 08:27:07', '2023-06-16 08:27:07'),
(33, 'customer', 'dipan.cityinnovates@gmail.com', 'dipan.cityinnovates@gmail.com', '7206775826', NULL, '$2y$10$tx/oLgWzy2osiEZ5GZK90e0lttHP4lrc9JEwlVPyd19W42ZAlssX2', NULL, NULL, 0, 0.00, 'I5ym6WIgKY', 0, 15, '0', NULL, NULL, '2023-06-27 00:00:00', '2023-07-06 13:07:59'),
(35, 'admin', 'Editor', 'editor@gmail.com', '720000000', NULL, '$2y$10$Ls/LZJf/417VNYh5hH26DOzVlrni.tr0zaNHXj2NzioJb6GhcNlA6', NULL, NULL, 0, 0.00, NULL, 0, 15, '0', NULL, NULL, '2023-07-06 00:00:00', '2023-07-07 10:59:06'),
(36, 'customer', 'dipan1', 'dipan133@gmail.com', '37534534534', NULL, '$2y$10$KYW53mxZtHc8P3EwvLJ.2uhhCdicgfwLcBl.Jbn6qD9LRKRe2plkq', NULL, NULL, 0, 0.00, NULL, 0, 15, '0', NULL, NULL, '2023-07-13 00:11:09', '2023-07-13 00:11:09');

-- --------------------------------------------------------

--
-- Table structure for table `user_referral_tokens`
--

CREATE TABLE `user_referral_tokens` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `referrals_code` varchar(299) COLLATE utf8mb4_unicode_ci NOT NULL,
  `referrals_token` varchar(299) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expire_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_referral_tokens`
--

INSERT INTO `user_referral_tokens` (`id`, `user_id`, `referrals_code`, `referrals_token`, `expire_at`, `created_at`, `updated_at`) VALUES
(24, 9, 'HK1kllw8vi', 'netfYvJHZToFNmQg5q2J', '2023-07-16 08:54:44', '2023-06-16 08:54:44', '2023-06-16 08:54:44'),
(29, 9, 'HK1kllw8vi', '8feCwQbKNWCBfkEt4kYB', '2023-07-16 10:10:19', '2023-06-16 10:10:19', '2023-06-16 10:10:19'),
(30, 9, 'HK1kllw8vi', '02GETw0OXdxflUIWEB3d', '2023-07-16 10:46:28', '2023-06-16 10:46:28', '2023-06-16 10:46:28');

-- --------------------------------------------------------

--
-- Table structure for table `user_verifieds`
--

CREATE TABLE `user_verifieds` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `otp` varchar(299) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expire_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_verifieds`
--

INSERT INTO `user_verifieds` (`id`, `user_id`, `otp`, `expire_at`, `created_at`, `updated_at`) VALUES
(1, 6, '196808', '2023-06-12 10:05:09', '2023-06-12 09:55:09', '2023-06-12 09:55:09'),
(2, 7, '785287', '2023-06-12 10:05:39', '2023-06-12 09:55:39', '2023-06-12 09:55:39'),
(3, 8, '761370', '2023-06-12 10:12:30', '2023-06-12 10:02:30', '2023-06-12 10:02:30'),
(4, 6, '525069', '2023-06-12 10:11:16', '2023-06-12 10:07:46', '2023-06-12 10:11:16'),
(5, 6, '582470', '2023-06-12 10:13:39', '2023-06-12 10:13:34', '2023-06-12 10:13:39'),
(6, 6, '313390', '2023-06-12 10:23:41', '2023-06-12 10:23:35', '2023-06-12 10:23:41'),
(7, 6, '587948', '2023-06-12 10:25:27', '2023-06-12 10:25:22', '2023-06-12 10:25:27'),
(8, 6, '753836', '2023-06-12 10:26:19', '2023-06-12 10:26:14', '2023-06-12 10:26:19'),
(9, 9, '566217', '2023-06-12 10:39:00', '2023-06-12 10:29:00', '2023-06-12 10:29:00'),
(10, 9, '735418', '2023-06-12 10:54:46', '2023-06-12 10:54:38', '2023-06-12 10:54:46'),
(11, 9, '799602', '2023-06-12 11:32:19', '2023-06-12 11:22:49', '2023-06-12 11:32:19'),
(12, 6, '981275', '2023-06-12 11:32:53', '2023-06-12 11:22:53', '2023-06-12 11:22:53'),
(13, 10, '912524', '2023-06-16 05:25:48', '2023-06-16 05:15:48', '2023-06-16 05:15:48'),
(14, 11, '765152', '2023-06-16 06:12:21', '2023-06-16 06:02:21', '2023-06-16 06:02:21'),
(15, 12, '762784', '2023-06-16 06:17:20', '2023-06-16 06:07:20', '2023-06-16 06:07:20'),
(16, 13, '464685', '2023-06-16 06:24:04', '2023-06-16 06:14:04', '2023-06-16 06:14:04'),
(17, 14, '997920', '2023-06-16 06:24:22', '2023-06-16 06:14:22', '2023-06-16 06:14:22'),
(18, 15, '900479', '2023-06-16 06:25:04', '2023-06-16 06:15:04', '2023-06-16 06:15:04'),
(19, 16, '728478', '2023-06-16 06:28:30', '2023-06-16 06:18:30', '2023-06-16 06:18:30'),
(20, 17, '810940', '2023-06-16 06:29:34', '2023-06-16 06:19:34', '2023-06-16 06:19:34'),
(21, 18, '917734', '2023-06-16 06:31:21', '2023-06-16 06:21:21', '2023-06-16 06:21:21'),
(22, 19, '741728', '2023-06-16 06:31:26', '2023-06-16 06:21:26', '2023-06-16 06:21:26'),
(23, 20, '297746', '2023-06-16 06:31:31', '2023-06-16 06:21:31', '2023-06-16 06:21:31'),
(24, 20, '248548', '2023-06-16 07:07:03', '2023-06-16 06:57:03', '2023-06-16 06:57:03'),
(25, 20, '533553', '2023-06-16 08:34:08', '2023-06-16 08:24:08', '2023-06-16 08:24:08'),
(26, 21, '550195', '2023-06-16 08:36:10', '2023-06-16 08:26:10', '2023-06-16 08:26:10'),
(27, 22, '303284', '2023-06-16 08:37:07', '2023-06-16 08:27:07', '2023-06-16 08:27:07'),
(28, 9, '175322', '2023-06-16 10:46:15', '2023-06-16 10:45:50', '2023-06-16 10:46:15'),
(29, 9, '883374', '2023-06-16 11:02:19', '2023-06-16 11:02:09', '2023-06-16 11:02:19'),
(30, 1, '834873', '2023-06-26 10:27:30', '2023-06-26 10:17:30', '2023-06-26 10:17:30'),
(31, 32, '879676', '2023-06-26 10:27:57', '2023-06-26 10:17:57', '2023-06-26 10:17:57'),
(32, 33, '598758', '2023-06-27 05:43:53', '2023-06-27 05:33:53', '2023-06-27 05:33:53'),
(33, 33, '518787', '2023-06-27 05:56:32', '2023-06-27 05:46:32', '2023-06-27 05:46:32');

-- --------------------------------------------------------

--
-- Table structure for table `wallets`
--

CREATE TABLE `wallets` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `amount` double(8,2) NOT NULL,
  `payment_method` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `payment_details` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blocks`
--
ALTER TABLE `blocks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `breeds`
--
ALTER TABLE `breeds`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `business_settings`
--
ALTER TABLE `business_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dogs`
--
ALTER TABLE `dogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `feeds`
--
ALTER TABLE `feeds`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `friendships`
--
ALTER TABLE `friendships`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `good_genes`
--
ALTER TABLE `good_genes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `media_uuid_unique` (`uuid`),
  ADD KEY `media_model_type_model_id_index` (`model_type`,`model_id`),
  ADD KEY `media_order_column_index` (`order_column`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `not_pet_questions`
--
ALTER TABLE `not_pet_questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts_metas`
--
ALTER TABLE `posts_metas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts_sections`
--
ALTER TABLE `posts_sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post_translations`
--
ALTER TABLE `post_translations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions_attempts`
--
ALTER TABLE `questions_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions_tasks`
--
ALTER TABLE `questions_tasks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions_types`
--
ALTER TABLE `questions_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `referral_users`
--
ALTER TABLE `referral_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rewards`
--
ALTER TABLE `rewards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `status_items`
--
ALTER TABLE `status_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status_items_tracks`
--
ALTER TABLE `status_items_tracks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `translations`
--
ALTER TABLE `translations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uploads`
--
ALTER TABLE `uploads`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `media_uuid_unique` (`uuid`),
  ADD KEY `media_model_type_model_id_index` (`model_type`,`model_id`),
  ADD KEY `media_order_column_index` (`order_column`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `phone` (`phone`),
  ADD UNIQUE KEY `referral_code` (`referral_code`);

--
-- Indexes for table `user_referral_tokens`
--
ALTER TABLE `user_referral_tokens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_verifieds`
--
ALTER TABLE `user_verifieds`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `blocks`
--
ALTER TABLE `blocks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `breeds`
--
ALTER TABLE `breeds`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=324;

--
-- AUTO_INCREMENT for table `business_settings`
--
ALTER TABLE `business_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=247;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `dogs`
--
ALTER TABLE `dogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `feeds`
--
ALTER TABLE `feeds`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `friendships`
--
ALTER TABLE `friendships`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `good_genes`
--
ALTER TABLE `good_genes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `not_pet_questions`
--
ALTER TABLE `not_pet_questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `posts_metas`
--
ALTER TABLE `posts_metas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `posts_sections`
--
ALTER TABLE `posts_sections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `post_translations`
--
ALTER TABLE `post_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `questions_attempts`
--
ALTER TABLE `questions_attempts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `questions_tasks`
--
ALTER TABLE `questions_tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `questions_types`
--
ALTER TABLE `questions_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `referral_users`
--
ALTER TABLE `referral_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `rewards`
--
ALTER TABLE `rewards`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `status_items`
--
ALTER TABLE `status_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `status_items_tracks`
--
ALTER TABLE `status_items_tracks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `translations`
--
ALTER TABLE `translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `uploads`
--
ALTER TABLE `uploads`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `user_referral_tokens`
--
ALTER TABLE `user_referral_tokens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `user_verifieds`
--
ALTER TABLE `user_verifieds`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `post_tag`
--
ALTER TABLE `post_tag`
  ADD CONSTRAINT `Tag ID` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
