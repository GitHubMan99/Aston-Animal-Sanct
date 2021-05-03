-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 02, 2021 at 08:20 PM
-- Server version: 5.7.33-0ubuntu0.18.04.1
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u_190199605_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `adoptions`
--

CREATE TABLE `adoptions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `animalID` bigint(20) UNSIGNED NOT NULL,
  `userID` bigint(20) UNSIGNED NOT NULL,
  `status` enum('Pending','Approved','Denied') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `adoptions`
--

INSERT INTO `adoptions` (`id`, `animalID`, `userID`, `status`, `created_at`, `updated_at`) VALUES
(1, 14, 3, 'Approved', '2021-05-01 20:16:42', '2021-05-01 20:20:32'),
(2, 2, 3, 'Denied', '2021-05-01 20:16:51', '2021-05-01 20:20:38'),
(3, 15, 3, 'Denied', '2021-05-01 20:17:06', '2021-05-01 20:21:09'),
(4, 11, 3, 'Denied', '2021-05-01 20:17:18', '2021-05-01 20:21:03'),
(5, 15, 2, 'Approved', '2021-05-01 20:17:56', '2021-05-01 20:21:09'),
(6, 13, 2, 'Approved', '2021-05-01 20:18:03', '2021-05-01 20:21:21'),
(7, 8, 2, 'Denied', '2021-05-01 20:18:10', '2021-05-01 20:21:16'),
(8, 4, 4, 'Denied', '2021-05-01 20:19:50', '2021-05-01 20:21:24'),
(9, 5, 4, 'Pending', '2021-05-01 20:19:54', '2021-05-01 20:19:54');

-- --------------------------------------------------------

--
-- Table structure for table `animals`
--

CREATE TABLE `animals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `animal_type` enum('Dog','Cat','Rabbit','Hamster','Bird','Fish','Reptile','Other') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Dog',
  `date_of_birth` date NOT NULL,
  `description` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_2` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_3` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `availability` enum('Available','Unavailable') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Available',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `animals`
--

INSERT INTO `animals` (`id`, `name`, `animal_type`, `date_of_birth`, `description`, `image`, `image_2`, `image_3`, `availability`, `created_at`, `updated_at`) VALUES
(1, 'Jeff', 'Dog', '2021-04-03', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis nisi dolor, aliquam non posuere eget, cursus id est. Mauris ligula leo, gravida tempus quam vel, commodo cursus eros.', 'pug_1619896076.jpg', 'pug2_1619896076.jpg', 'pug3_1619896076.jpg', 'Available', '2021-05-01 17:37:13', '2021-05-01 18:07:56'),
(2, 'Garfield', 'Cat', '2021-02-17', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis nisi dolor, aliquam non posuere eget, cursus id est. Mauris ligula leo, gravida tempus quam vel, commodo cursus eros.', 'garf1_1619895586.jpg', 'garf2_1619895586.jpg', 'garf3_1619895586.jpg', 'Available', '2021-05-01 17:59:46', '2021-05-01 17:59:46'),
(3, 'Rory', 'Dog', '2021-02-16', 'Donec luctus sem vitae mi pulvinar, ut fermentum dui finibus. Duis nisi erat, mollis a purus gravida, interdum iaculis felis. Sed ut suscipit turpis. Donec sagittis massa eros, non congue mi aliquet tristique.', 'rory1_1619901254.jpg', 'rory2_1619901254.jpg', 'rory3_1619901254.jpg', 'Available', '2021-05-01 19:34:14', '2021-05-01 19:34:14'),
(4, 'Tilly', 'Rabbit', '2021-02-07', 'Nullam sodales, nibh vel posuere ultrices, mauris risus ornare tortor, id auctor enim neque in elit. Curabitur mollis lobortis imperdiet. Praesent posuere libero ligula, at tincidunt massa fermentum et.', 'tilly1_1619901451.jpg', 'tilly4_1619901451.jpg', 'tilly3_1619901451.jpg', 'Available', '2021-05-01 19:35:42', '2021-05-01 19:37:58'),
(5, 'Robbie', 'Bird', '2021-01-31', 'Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Cras fringilla ante at diam hendrerit, vel accumsan justo malesuada.', 'robbie1_1619901545.jpg', 'robbie2_1619901545.jpg', 'robbie3_1619901545.jpg', 'Available', '2021-05-01 19:39:05', '2021-05-01 19:39:05'),
(6, 'Lucy', 'Cat', '2021-04-13', 'Etiam nulla nunc, gravida ullamcorper orci in, tincidunt mollis neque. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.', 'lucy1_1619901648.jpg', 'lucy2_1619901648.jpg', 'lucy3_1619901648.jpg', 'Available', '2021-05-01 19:40:48', '2021-05-01 19:40:48'),
(7, 'Nemo', 'Fish', '2020-12-18', 'Vestibulum dictum blandit viverra. Aliquam erat volutpat. Donec sit amet ultrices nisi. Fusce quis consequat leo, et sagittis enim.', 'nemo1_1619901701.jpg', 'nemo2_1619901701.jpg', 'nemo3_1619901701.jpg', 'Available', '2021-05-01 19:41:41', '2021-05-01 20:09:20'),
(8, 'Lilly', 'Dog', '2021-01-19', 'Sed bibendum lobortis ex, vitae varius lectus auctor sed. Ut ut sem at metus sollicitudin faucibus at in nisl. Nunc dictum a turpis vitae laoreet. Vestibulum id viverra eros.', 'lilly1_1619901962.jpg', 'lilly2_1619901962.jpg', 'lilly3_1619901962.jpg', 'Available', '2021-05-01 19:46:02', '2021-05-01 19:46:02'),
(9, 'Munchy', 'Rabbit', '2021-02-27', 'Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Vestibulum dictum blandit viverra. Aliquam erat volutpat.', 'munchy1_1619902012.jpg', 'munchy2_1619902013.jpg', 'munchy3_1619902013.jpg', 'Available', '2021-05-01 19:46:53', '2021-05-01 19:46:53'),
(10, 'Gecko', 'Reptile', '2020-12-28', 'Sed bibendum lobortis ex, vitae varius lectus auctor sed. Ut ut sem at metus sollicitudin faucibus at in nisl. Nunc dictum a turpis vitae laoreet.', 'gecko1_1619902126.jpg', 'gecko2_1619902126.jpg', 'gecko3_1619902126.jpg', 'Available', '2021-05-01 19:48:46', '2021-05-01 19:48:46'),
(11, 'Furbo', 'Hamster', '2021-03-14', 'Donec porta mauris purus, ac accumsan magna fermentum quis. Donec leo orci, mattis a quam a, consequat placerat ipsum. Nam pretium aliquet imperdiet.', 'furbo1_1619902177.jpg', 'furbo3_1619902177.jpg', 'furbo2_1619902177.jpg', 'Available', '2021-05-01 19:49:37', '2021-05-01 19:49:37'),
(12, 'Bubbles', 'Fish', '2021-02-09', 'Sed mattis pretium nisl eget elementum. Aenean bibendum vel nisl et congue. Vestibulum lobortis ligula ornare mi faucibus, eget faucibus justo tincidunt. Integer id aliquet felis. Nunc sit amet odio euismod, auctor sapien a, bibendum sem. In a aliquam mi.', 'bubbles1_1619902237.jpg', 'bubbles2_1619902237.jpg', 'bubbles3_1619902237.jpg', 'Available', '2021-05-01 19:50:37', '2021-05-01 19:50:37'),
(13, 'Craig', 'Bird', '2020-10-13', 'Donec sagittis massa eros, non congue mi aliquet tristique. Nulla lacinia lacinia purus interdum dignissim. Praesent bibendum commodo urna, sed bibendum risus congue a. Phasellus sapien sapien, molestie sit amet metus at, posuere consectetur ex.', 'craig1_1619902949.jpg', 'craig2_1619902949.jpg', 'craig3_1619902949.jpg', 'Unavailable', '2021-05-01 20:02:29', '2021-05-01 20:21:21'),
(14, 'Alfie', 'Dog', '2021-04-25', 'Cras faucibus blandit quam. Quisque in lectus placerat justo tincidunt luctus eu elementum turpis. Donec porta mauris purus, ac accumsan magna fermentum quis.', 'alfie1_1619902993.jpg', 'alfie2_1619902993.jpg', 'alfie3_1619902993.jpg', 'Unavailable', '2021-05-01 20:03:13', '2021-05-01 20:20:32'),
(15, 'Camo', 'Reptile', '2021-01-24', 'Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae. Sed mattis pretium nisl eget elementum. Aenean bibendum vel nisl et congue.', 'camo1_1619903046.jpg', 'camo2_1619903046.jpg', 'camo3_1619903046.jpg', 'Unavailable', '2021-05-01 20:04:06', '2021-05-01 20:21:09');

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
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
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
(4, '2021_04_07_134909_create_animals_table', 1),
(5, '2021_04_20_135724_create_adoptions_table', 1);

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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role` tinyint(1) NOT NULL DEFAULT '0',
  `name` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, 'admin', 'admin@aston.com', NULL, '$2y$10$jPG5D1FupkCSBjeBbSYNPOySKzb3lNZTDCi/hDu1gbquDEsBX3Bpe', NULL, '2021-05-01 17:31:29', '2021-05-01 17:31:29'),
(2, 0, 'Bilbo Baggins', 'bilbo@aston.com', NULL, '$2y$10$9QI/qg9BopAu0pnzyoO6KesBa3w/UkWuBaUQ059Pu4zKVOk50YMb.', NULL, '2021-05-01 17:34:28', '2021-05-01 17:34:28'),
(3, 0, 'Steve Jobs', 'steve@aston.com', NULL, '$2y$10$BlprhKdidSBjz13TH8/BYODlapvRcX1ui8Yb2lcoQMZSj9Z88yew2', NULL, '2021-05-01 20:14:55', '2021-05-01 20:14:55'),
(4, 0, 'Amanda Green', 'amanda@aston.com', NULL, '$2y$10$HHpJSZaV3Aa.vKfnvqUYv.I2CT5tO6qlLqz4AFnDK7ti8CnIcp5Tq', NULL, '2021-05-01 20:19:44', '2021-05-01 20:19:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adoptions`
--
ALTER TABLE `adoptions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `adoptions_userid_foreign` (`userID`),
  ADD KEY `adoptions_animalid_foreign` (`animalID`);

--
-- Indexes for table `animals`
--
ALTER TABLE `animals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adoptions`
--
ALTER TABLE `adoptions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `animals`
--
ALTER TABLE `animals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `adoptions`
--
ALTER TABLE `adoptions`
  ADD CONSTRAINT `adoptions_animalid_foreign` FOREIGN KEY (`animalID`) REFERENCES `animals` (`id`),
  ADD CONSTRAINT `adoptions_userid_foreign` FOREIGN KEY (`userID`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
