-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 24, 2022 at 11:09 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pos`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, '2014_09_03_092910_create_roles_table', 1),
(2, '2014_10_12_000000_create_users_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2022_03_02_101211_create_modules_table', 1),
(7, '2022_03_03_093949_create_permissions_table', 1),
(8, '2022_03_03_094126_create_role_permissions_table', 1),
(9, '2022_03_05_140757_create_categories_table', 1),
(10, '2022_03_05_143519_create_products_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

CREATE TABLE `modules` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `modules`
--

INSERT INTO `modules` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Users', 'active', '2022-03-24 09:17:42', '2022-03-24 09:17:42'),
(2, 'Category', 'active', '2022-03-24 09:17:42', '2022-03-24 09:17:42'),
(3, 'Role', 'active', '2022-03-24 09:17:43', '2022-03-24 09:17:43');

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
  `module_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `module_id`, `name`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'users.index', 'usersindex', 'active', '2022-03-24 09:17:42', '2022-03-24 09:17:42'),
(2, 1, 'users.index2', 'usersindex2', 'active', '2022-03-24 09:17:42', '2022-03-24 09:17:42'),
(3, 1, 'users.create', 'userscreate', 'active', '2022-03-24 09:17:42', '2022-03-24 09:17:42'),
(4, 1, 'users.store', 'usersstore', 'active', '2022-03-24 09:17:42', '2022-03-24 09:17:42'),
(5, 1, 'users.show', 'usersshow', 'active', '2022-03-24 09:17:42', '2022-03-24 09:17:42'),
(6, 1, 'users.edit', 'usersedit', 'active', '2022-03-24 09:17:42', '2022-03-24 09:17:42'),
(7, 1, 'users.update', 'usersupdate', 'active', '2022-03-24 09:17:42', '2022-03-24 09:17:42'),
(8, 1, 'users.destroy', 'usersdestroy', 'active', '2022-03-24 09:17:42', '2022-03-24 09:17:42'),
(9, 2, 'category.list', 'categorylist', 'active', '2022-03-24 09:17:43', '2022-03-24 09:17:43'),
(10, 2, 'category.add', 'categoryadd', 'active', '2022-03-24 09:17:43', '2022-03-24 09:17:43'),
(11, 2, 'category.store', 'categorystore', 'active', '2022-03-24 09:17:43', '2022-03-24 09:17:43'),
(12, 2, 'category.view', 'categoryview', 'active', '2022-03-24 09:17:43', '2022-03-24 09:17:43'),
(13, 2, 'category.edit', 'categoryedit', 'active', '2022-03-24 09:17:43', '2022-03-24 09:17:43'),
(14, 2, 'category.update', 'categoryupdate', 'active', '2022-03-24 09:17:43', '2022-03-24 09:17:43'),
(15, 2, 'delete.category', 'deletecategory', 'active', '2022-03-24 09:17:43', '2022-03-24 09:17:43'),
(16, 3, 'role.list', 'rolelist', 'active', '2022-03-24 09:17:43', '2022-03-24 09:17:43'),
(17, 3, 'role.add', 'roleadd', 'active', '2022-03-24 09:17:43', '2022-03-24 09:17:43'),
(18, 3, 'role.store', 'rolestore', 'active', '2022-03-24 09:17:43', '2022-03-24 09:17:43'),
(19, 3, 'role.view', 'roleview', 'active', '2022-03-24 09:17:43', '2022-03-24 09:17:43'),
(20, 3, 'role.edit', 'roleedit', 'active', '2022-03-24 09:17:43', '2022-03-24 09:17:43'),
(21, 3, 'role.update', 'roleupdate', 'active', '2022-03-24 09:17:43', '2022-03-24 09:17:43'),
(22, 3, 'role.category', 'rolecategory', 'active', '2022-03-24 09:17:43', '2022-03-24 09:17:43');

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sellers_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Admin', NULL, 'active', '2022-03-24 09:17:42', '2022-03-24 09:17:42');

-- --------------------------------------------------------

--
-- Table structure for table `role_permissions`
--

CREATE TABLE `role_permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `facebook_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reset_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reset_token_expire_at` datetime DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `name`, `facebook_id`, `email`, `email_verified_at`, `password`, `reset_token`, `reset_token_expire_at`, `image`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, 'Walton Hettinger', NULL, 'ihaley@kuphal.com', NULL, '$2y$10$FacOGdk5oL0kTDP3.spnHOpa1q5Z6TewmpGhLMiE0J4bMI/RBOXJm', 'LKx4TMxzYADI8jCFFMJg6SjwBEq1i0XySNIQwhld', '2022-03-24 15:30:10', NULL, NULL, '2022-03-24 09:17:50', '2022-03-24 09:28:10'),
(2, 1, 'Mr. Brian Adams', NULL, 'sorn@hartmann.com', NULL, '$2y$10$m6dyhMEwU183iuspS41E4.CmEn7fmhb9KIpWWpho4.ANXxB.4laZu', NULL, NULL, NULL, NULL, '2022-03-24 09:17:50', '2022-03-24 09:17:50'),
(3, 1, 'Mr. Orin Kris', NULL, 'beier.arvid@batz.net', NULL, '$2y$10$wzZMWhNiTibC/4BQUkPshukcf.6IKQeRNNI0ZfFkI4icHintebc3C', NULL, NULL, NULL, NULL, '2022-03-24 09:17:50', '2022-03-24 09:17:50'),
(4, 1, 'Miss Casandra Christiansen', NULL, 'ddickens@gmail.com', NULL, '$2y$10$RoLWiedI5QL5WN5cW.pxTurhY.y1AgtGKCld.AqLKSF87HUqpy/Rq', NULL, NULL, NULL, NULL, '2022-03-24 09:17:50', '2022-03-24 09:17:50'),
(5, 1, 'Lavonne Dickinson', NULL, 'xdickinson@rath.org', NULL, '$2y$10$N6QAbwVpi2PhsPiij9vin.rcSsmymCzv3mm/S.RDNTcZA5UJv33EO', NULL, NULL, NULL, NULL, '2022-03-24 09:17:50', '2022-03-24 09:17:50'),
(6, 1, 'Ruben Yost', NULL, 'alexandrea.olson@hotmail.com', NULL, '$2y$10$gRdUMoo1o5rQhXmC9mG3O.zaITsdX0uEWZAKxIQlThOLUvYKMxfXe', NULL, NULL, NULL, NULL, '2022-03-24 09:17:50', '2022-03-24 09:17:50'),
(7, 1, 'Lesly Lindgren DDS', NULL, 'ulises12@yahoo.com', NULL, '$2y$10$Ak4c6SqipjUJugnfyFyHDO/Tx6GFKHwWLnZKeEYzS.WmpPmRUP1nK', NULL, NULL, NULL, NULL, '2022-03-24 09:17:50', '2022-03-24 09:17:50'),
(8, 1, 'Bridget Moore', NULL, 'ibrahim57@yahoo.com', NULL, '$2y$10$EBW9ECs2WGFc11qGeq/IL.L.QCqDybhCRz8IuEZE5n/sK2.ZMynwi', NULL, NULL, NULL, NULL, '2022-03-24 09:17:50', '2022-03-24 09:17:50'),
(9, 1, 'Holly Boehm IV', NULL, 'xbernier@hoeger.biz', NULL, '$2y$10$TvG21GRRRTlFr7wHy10w3uHGaBt4r5cfobvHmTTypgEMju8MQD0eC', NULL, NULL, NULL, NULL, '2022-03-24 09:17:50', '2022-03-24 09:17:50'),
(10, 1, 'Bryon Pfeffer III', NULL, 'deven16@hotmail.com', NULL, '$2y$10$UoR6j1Nlg9lCp2pTvsslNeZJKgYHxrBYh5SqpDOtXBaSrUyTwyHd6', NULL, NULL, NULL, NULL, '2022-03-24 09:17:50', '2022-03-24 09:17:50'),
(11, 1, 'Dr. Miracle Wehner MD', NULL, 'kris.gwendolyn@greenfelder.com', NULL, '$2y$10$qCS41Q5YJvx1pfunaSQUKO4YlWqw7uBcVZ8ixCWXfIgBRoeImW8.q', NULL, NULL, NULL, NULL, '2022-03-24 09:17:50', '2022-03-24 09:17:50'),
(12, 1, 'Manuela Goldner', NULL, 'qhayes@yahoo.com', NULL, '$2y$10$7H3xsn8puuX1BNlGSV6MRe1iWX0F1oxKsSVVY9/zKsgw7wxVCiqb2', NULL, NULL, NULL, NULL, '2022-03-24 09:17:50', '2022-03-24 09:17:50'),
(13, 1, 'Wilford Lang', NULL, 'thand@yahoo.com', NULL, '$2y$10$Xi5aNKu/K4CPADIH2l91b.WcC5ZDminByK6uhhkslF.Krl98n8pJ2', NULL, NULL, NULL, NULL, '2022-03-24 09:17:50', '2022-03-24 09:17:50'),
(14, 1, 'Adelbert Beahan PhD', NULL, 'gregg.williamson@gmail.com', NULL, '$2y$10$xTe37C97ajJxzSVcMDImjOKqFUhvYFDIUgmtFfS5ecYTQi1/WOJxO', NULL, NULL, NULL, NULL, '2022-03-24 09:17:51', '2022-03-24 09:17:51'),
(15, 1, 'Danielle Okuneva DVM', NULL, 'isai75@hotmail.com', NULL, '$2y$10$5ohcxnp07F.4osqC1.YlLuGKXXCxHGLL8nR1PMw4zaJn.QHDC3fLW', NULL, NULL, NULL, NULL, '2022-03-24 09:17:51', '2022-03-24 09:17:51'),
(16, 1, 'Mikayla Adams', NULL, 'gregg36@gmail.com', NULL, '$2y$10$8qQ7uw53qvIk4TwiZqgGRu31xf0T4DEWd6ahK8uLAM00XSXTPZFLq', NULL, NULL, NULL, NULL, '2022-03-24 09:17:51', '2022-03-24 09:17:51'),
(17, 1, 'Prof. Bobbie Mueller', NULL, 'hlebsack@kiehn.com', NULL, '$2y$10$n4BuiECmtIKcPcX6/C5v9ePnlRbztkiOxttJNR4V0bLrHNnlCgaMq', NULL, NULL, NULL, NULL, '2022-03-24 09:17:51', '2022-03-24 09:17:51'),
(18, 1, 'Mrs. Carlee Daugherty DDS', NULL, 'vicenta31@bashirian.com', NULL, '$2y$10$L9qgnih/aBP5dJi2Oy/YfeQlIefrs2bmBgqn/tiF0Y..svuXfre/e', NULL, NULL, NULL, NULL, '2022-03-24 09:17:51', '2022-03-24 09:17:51'),
(19, 1, 'Coy Rippin', NULL, 'dortha.wiza@hotmail.com', NULL, '$2y$10$1rpgNDviEIpQF8Igc53MmemOoDYJbaKO.uE9zi4LEj3ESdjC8DUFC', NULL, NULL, NULL, NULL, '2022-03-24 09:17:51', '2022-03-24 09:17:51'),
(20, 1, 'Maye Ritchie', NULL, 'aaron.fritsch@hotmail.com', NULL, '$2y$10$rdcmRkxnDtY2VVvkvFi4yescDKAVhOLm2NLhkKUpNIuJjmmhhQKhy', NULL, NULL, NULL, NULL, '2022-03-24 09:17:51', '2022-03-24 09:17:51'),
(21, 1, 'Jaylon Pouros I', NULL, 'mckenzie45@jacobi.biz', NULL, '$2y$10$ZudgJAwwtvr5qzLWRTmwz.xW84VrK/knH0Q0OvAzepoHYFcQ4Lazi', NULL, NULL, NULL, NULL, '2022-03-24 09:17:51', '2022-03-24 09:17:51'),
(22, 1, 'Dr. Mitchel Wilkinson', NULL, 'beier.dorothy@muller.com', NULL, '$2y$10$ElFYoqMofwExarS7LTQCXO1VolFukHqOX9cz73aiW9zUUSB1Q5Y8W', NULL, NULL, NULL, NULL, '2022-03-24 09:17:51', '2022-03-24 09:17:51'),
(23, 1, 'Katherine Maggio', NULL, 'garrett.fritsch@kuphal.com', NULL, '$2y$10$vWuwyfPYBrkNePChLrEeTuLb0WO0gkPU.gk1Nmu.u14B.pmwNY7su', NULL, NULL, NULL, NULL, '2022-03-24 09:17:51', '2022-03-24 09:17:51'),
(24, 1, 'Baron Rosenbaum', NULL, 'cleuschke@hotmail.com', NULL, '$2y$10$K4aw/e5eCvQf42kIeJxsy.KKOYLI4ts/GpQk8TZPx8XqzRa.ZEodK', NULL, NULL, NULL, NULL, '2022-03-24 09:17:51', '2022-03-24 09:17:51'),
(25, 1, 'Robb Nitzsche', NULL, 'swift.emmet@gmail.com', NULL, '$2y$10$q9g/MK3BXNHlAzG743XvQupQMmGPQgqHFpqpufTlr7WQznkhgD0bW', NULL, NULL, NULL, NULL, '2022-03-24 09:17:51', '2022-03-24 09:17:51'),
(26, 1, 'Aileen Leannon IV', NULL, 'wjacobson@walsh.org', NULL, '$2y$10$UnwkVwMi/ngCIbd3KSxUoeMdhL9zgtz3FMErrCyBg.VLIbqS5ML4W', NULL, NULL, NULL, NULL, '2022-03-24 09:17:51', '2022-03-24 09:17:51'),
(27, 1, 'Hal McCullough', NULL, 'zella22@lindgren.com', NULL, '$2y$10$lltC5.gg0tsnerWLYW1kBePt9jKRJfBS.d73GUUBh4XaGxlcWFLXO', NULL, NULL, NULL, NULL, '2022-03-24 09:17:52', '2022-03-24 09:17:52'),
(28, 1, 'Ms. Mayra Mraz PhD', NULL, 'lily28@wolff.com', NULL, '$2y$10$zM97w.2ASFT.HRQFToY.5uG5BXxa4qp.LMT9p7LODI7.FSY54wH.e', NULL, NULL, NULL, NULL, '2022-03-24 09:17:52', '2022-03-24 09:17:52'),
(29, 1, 'Prof. Davonte Stiedemann DVM', NULL, 'ubrekke@yahoo.com', NULL, '$2y$10$tUK0l1PCCw9m.C9iu4hrDeRFSk4X6C0plXyHreuaS9hWIboJ8mTfW', NULL, NULL, NULL, NULL, '2022-03-24 09:17:52', '2022-03-24 09:17:52'),
(30, 1, 'Dorian Connelly', NULL, 'kvandervort@yahoo.com', NULL, '$2y$10$1/6JS.jgfQ93woqKHQElyOy/tgLu2Y9KxnUYNrKjveM.A/3Qo6cKq', NULL, NULL, NULL, NULL, '2022-03-24 09:17:52', '2022-03-24 09:17:52'),
(31, 1, 'Carleton Mohr', NULL, 'zena.heathcote@hand.info', NULL, '$2y$10$3qH6hpNuz2y7bL0Gl05Cue/flKiNU0.Yu/o0XLJ4kVCe0nbXSALja', NULL, NULL, NULL, NULL, '2022-03-24 09:17:52', '2022-03-24 09:17:52'),
(32, 1, 'Brennan Douglas', NULL, 'margarita29@yahoo.com', NULL, '$2y$10$6kZln6DUYVsiAM/OuRPVx.WIFutpB2.lYTjP0I3FiM3JRBGafMu6e', NULL, NULL, NULL, NULL, '2022-03-24 09:17:52', '2022-03-24 09:17:52'),
(33, 1, 'Dr. Dustin Pollich PhD', NULL, 'kdickens@gmail.com', NULL, '$2y$10$5nvLBivNR/VbN1RmwXnYy..29FDvTuHRUcZKiaiEfzAn9vDVCHgo2', NULL, NULL, NULL, NULL, '2022-03-24 09:17:53', '2022-03-24 09:17:53'),
(34, 1, 'Earnest Kuvalis', NULL, 'jewell81@gmail.com', NULL, '$2y$10$JSgh9s5S0pe7aJCeiSqxzuT2KUsfCRdQoq1GAqn8iNCpcwsP1Sbgm', NULL, NULL, NULL, NULL, '2022-03-24 09:17:53', '2022-03-24 09:17:53'),
(35, 1, 'Cornelius Schmeler', NULL, 'tstreich@hotmail.com', NULL, '$2y$10$Ze0GlzhpKq5BuEHScQCS3.p15ywI26y03HosxAC2Uk2uXcTTgW6DC', NULL, NULL, NULL, NULL, '2022-03-24 09:17:53', '2022-03-24 09:17:53'),
(36, 1, 'Prof. Orrin Mills', NULL, 'keyon.larkin@yahoo.com', NULL, '$2y$10$2f5h3bmci0asQjArpZtaYuDLHCnWt3zx9z.1cTG/o2pa4PsbnRqO6', NULL, NULL, NULL, NULL, '2022-03-24 09:17:53', '2022-03-24 09:17:53'),
(37, 1, 'Sanford Bernier III', NULL, 'bbeahan@yahoo.com', NULL, '$2y$10$S9sk8UAFQrMOT4KMYB8xVOQ7s7pXGzOfDVHGe8W6dsTzneJO4w6gS', NULL, NULL, NULL, NULL, '2022-03-24 09:17:53', '2022-03-24 09:17:53'),
(38, 1, 'Mr. Cade Johnston', NULL, 'dboyer@gmail.com', NULL, '$2y$10$.IxfJu1ttXkRr9N9kjh02uBqVo8Cyh5E9Y0f8v9yr9ui6eY55l7eG', NULL, NULL, NULL, NULL, '2022-03-24 09:17:53', '2022-03-24 09:17:53'),
(39, 1, 'Sydney Bosco', NULL, 'hpollich@hauck.org', NULL, '$2y$10$OM4CzBkLrMHjqosuu0Mu4uHR9B78/hZ.2ZDQilgUeZD20CgX0Y3vq', NULL, NULL, NULL, NULL, '2022-03-24 09:17:53', '2022-03-24 09:17:53'),
(40, 1, 'Mr. Bret Brakus', NULL, 'bud79@gmail.com', NULL, '$2y$10$n24oF3uguDKFwGXUjVuJQ.dKHEKw9BWKPtSZRsES4LbrJewAHAKYu', NULL, NULL, NULL, NULL, '2022-03-24 09:17:53', '2022-03-24 09:17:53'),
(41, 1, 'Cristobal Morissette', NULL, 'mzboncak@hotmail.com', NULL, '$2y$10$9FxdVLle5GCU/QZBxndjJOok5a9FRs9q4s1LfzwsWdbqLKUHhn2Xm', NULL, NULL, NULL, NULL, '2022-03-24 09:17:54', '2022-03-24 09:17:54'),
(42, 1, 'Mafalda Hermann', NULL, 'maddison.reichert@yahoo.com', NULL, '$2y$10$OoDoavAGfF3Gize1bt7ZBumGZ5rVe7Bugv9knnO/2nGqOUApC1hQW', NULL, NULL, NULL, NULL, '2022-03-24 09:17:54', '2022-03-24 09:17:54'),
(43, 1, 'Krystina Leannon', NULL, 'waters.gilberto@borer.com', NULL, '$2y$10$i75QnanYhCq6dw2nVJEA5uZ1fgMqN4S3sTyzLsvNx9PAqk2ZIjmgS', NULL, NULL, NULL, NULL, '2022-03-24 09:17:54', '2022-03-24 09:17:54'),
(44, 1, 'Mrs. Arlie Marvin DVM', NULL, 'felton.gislason@harber.com', NULL, '$2y$10$p4k93hzlVOVwd/j4.Y8jXu/yK6yMSTJXD78O9FsiBg86igFEoTy.i', NULL, NULL, NULL, NULL, '2022-03-24 09:17:54', '2022-03-24 09:17:54'),
(45, 1, 'Pasquale Abernathy', NULL, 'kuvalis.arvel@hackett.com', NULL, '$2y$10$ZCEyOtzhfSTs7R6vmWGKm.ZB7PIVFsdwubzLLAR.qcyXDyCMTUe.G', NULL, NULL, NULL, NULL, '2022-03-24 09:17:54', '2022-03-24 09:17:54'),
(46, 1, 'Beatrice Koepp', NULL, 'chaya17@oconnell.org', NULL, '$2y$10$RfKHdQZAgx4zaOQ9OkWhcOymmAwuuIKyATs1.21m4gdXogTL1bpsa', NULL, NULL, NULL, NULL, '2022-03-24 09:17:54', '2022-03-24 09:17:54'),
(47, 1, 'Chaya Brakus', NULL, 'elinore74@hotmail.com', NULL, '$2y$10$TudX4S.82GNEiKkHIv.f.OVxRgdt36iJgDvayUk3nD7wj7sIutaly', NULL, NULL, NULL, NULL, '2022-03-24 09:17:54', '2022-03-24 09:17:54'),
(48, 1, 'Bobby Eichmann', NULL, 'adibbert@lueilwitz.com', NULL, '$2y$10$wgPFu/ZhyZ3ftliGOJvdPO66fbmmcadduyO/A1frZqAsxN0LugMcW', NULL, NULL, NULL, NULL, '2022-03-24 09:17:54', '2022-03-24 09:17:54'),
(49, 1, 'Cathy Farrell', NULL, 'fmccullough@hotmail.com', NULL, '$2y$10$w8mXORcER50keNpRp1VwwuHZTP3fSA/MG7fw9.ZHA0g2JvVXhcAeC', NULL, NULL, NULL, NULL, '2022-03-24 09:17:54', '2022-03-24 09:17:54'),
(50, 1, 'Grace Paucek', NULL, 'toney23@gmail.com', NULL, '$2y$10$/YXa3HDi8ncVyW0QN8IaeOvk0g5UKO9q5bWq2/GEy9yGGH/0qs96i', NULL, NULL, NULL, NULL, '2022-03-24 09:17:54', '2022-03-24 09:17:54'),
(52, 1, 'Nazmul', NULL, '18103192nazmul@gmail.com', NULL, '$2y$10$.4fZTtQ4MK5YCFap4JZ9lO21pkd7zZdtkB3Ph/5aK6RjyA9Z991Ue', NULL, '2022-03-24 16:09:42', NULL, NULL, NULL, '2022-03-24 10:08:02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
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
-- Indexes for table `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permissions_module_id_foreign` (`module_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_permissions`
--
ALTER TABLE `role_permissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_permissions_role_id_foreign` (`role_id`),
  ADD KEY `role_permissions_permission_id_foreign` (`permission_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `modules`
--
ALTER TABLE `modules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `role_permissions`
--
ALTER TABLE `role_permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `permissions`
--
ALTER TABLE `permissions`
  ADD CONSTRAINT `permissions_module_id_foreign` FOREIGN KEY (`module_id`) REFERENCES `modules` (`id`);

--
-- Constraints for table `role_permissions`
--
ALTER TABLE `role_permissions`
  ADD CONSTRAINT `role_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`),
  ADD CONSTRAINT `role_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
