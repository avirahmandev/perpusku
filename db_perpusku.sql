-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 09, 2024 at 11:14 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_perpusku`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cover` varchar(255) NOT NULL DEFAULT 'books-cover/cover_default.png',
  `judul` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `penulis` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `halaman` int(11) NOT NULL DEFAULT 0,
  `tipe` tinyint(1) NOT NULL DEFAULT 0,
  `penerbit` varchar(255) NOT NULL,
  `file_pdf` varchar(255) DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `populer` tinyint(1) NOT NULL DEFAULT 0,
  `rekomendasi` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `cover`, `judul`, `slug`, `penulis`, `deskripsi`, `halaman`, `tipe`, `penerbit`, `file_pdf`, `category_id`, `populer`, `rekomendasi`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'books-cover/cover_default.png', 'How to Win Friends and Influence people', 'how-to-win-friends-and-influence-people', 'Dale Carnegie', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.', 0, 0, 'GoalKicker', NULL, 2, 1, 0, '2024-03-09 03:12:09', '2024-03-09 03:12:09', NULL),
(2, 'books-cover/cover_default.png', 'Berani Tidak Disukai', 'berani-tidak-disukai', 'Fumitake Koga', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.', 0, 0, 'GoalKicker', NULL, 2, 1, 1, '2024-03-09 03:12:09', '2024-03-09 03:12:09', NULL),
(3, 'books-cover/cover_default.png', 'Filosofi teras', 'filosofi-teras', 'Henry Manampiring', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.', 0, 0, 'GoalKicker', NULL, 2, 1, 0, '2024-03-09 03:12:09', '2024-03-09 03:12:09', NULL),
(4, 'books-cover/cover_default.png', 'Basic Python', 'basic-python', 'SpamEgg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.', 0, 0, 'GoalKicker', NULL, 1, 0, 1, '2024-03-09 03:12:09', '2024-03-09 03:12:09', NULL),
(5, 'books-cover/cover_default.png', 'C++ Fundamentals', 'cpp-fundamentals', 'HelloWorld', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.', 0, 0, 'GoalKicker', NULL, 1, 0, 1, '2024-03-09 03:12:09', '2024-03-09 03:12:09', NULL),
(6, 'books-cover/cover_default.png', 'Atomic Habits', 'atomic-habits', 'James Clear', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.', 0, 0, 'GoalKicker', NULL, 2, 1, 1, '2024-03-09 03:12:09', '2024-03-09 03:12:09', NULL),
(7, 'books-cover/cover_default.png', 'Dunia Sophie', 'dunia-sophie', 'Jostein Gaarder', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.', 0, 0, 'GoalKicker', NULL, 3, 0, 1, '2024-03-09 03:12:09', '2024-03-09 03:12:09', NULL),
(8, 'books-cover/cover_default.png', 'Sebuah Seni untuk Bersikap Bodo Amat', 'sebuah-seni-untuk-bersikap-bodo-amat', 'Mark Manson', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.', 0, 0, 'GoalKicker', NULL, 2, 1, 0, '2024-03-09 03:12:09', '2024-03-09 03:12:09', NULL),
(9, 'books-cover/cover_default.png', 'Madilog Materialisme, Dialektika, Dan Logika', 'madilog-materialisme-dialektika-dan-logika', 'Tan Malaka', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.', 0, 0, 'GoalKicker', NULL, 3, 0, 1, '2024-03-09 03:12:09', '2024-03-09 03:12:09', NULL),
(10, 'books-cover/cover_default.png', 'I Want To Die But I Want To Eat Tteokpokki', 'i-want-to-die-but-i-want-to-eat-tteokpokki', 'Baek Se Hee', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.', 0, 0, 'GoalKicker', NULL, 2, 0, 0, '2024-03-09 03:12:09', '2024-03-09 03:12:09', NULL),
(11, 'books-cover/cover_default.png', 'The Psychology of Money', 'the-psychology-of-money', 'Morgan Housel', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.', 0, 0, 'GoalKicker', NULL, 2, 0, 1, '2024-03-09 03:12:09', '2024-03-09 03:12:09', NULL),
(12, 'books-cover/cover_default.png', 'Linux Command Guide', 'linux-command-guide', 'Linus Torvalds', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.', 0, 0, 'GoalKicker', NULL, 1, 1, 1, '2024-03-09 03:12:09', '2024-03-09 03:12:09', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Programming', 'programming', '2024-03-09 03:12:09', '2024-03-09 03:12:09'),
(2, 'Self Improvement', 'self-improvement', '2024-03-09 03:12:09', '2024-03-09 03:12:09'),
(3, 'Filosofi', 'filosofi', '2024-03-09 03:12:09', '2024-03-09 03:12:09');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_11_14_073556_create_books_table', 1),
(6, '2023_11_14_083027_create_categories_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `wishlist` varchar(255) DEFAULT NULL,
  `borrowed_list` varchar(255) DEFAULT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama_lengkap`, `slug`, `email`, `password`, `wishlist`, `borrowed_list`, `is_admin`, `remember_token`, `email_verified_at`, `created_at`, `updated_at`) VALUES
(1, 'alexa like', 'alexa-like', 'alexa@gmail.com', '$2y$12$qPk1tmc8mQ9j6JG4NE1hnuPs/z6Sw09z5UsOjwgHZ3QbQaPcsuFX2', 'none', 'status pinjaman', 0, 'jAvKV55Q9v', '2024-03-09 03:12:08', '2024-03-09 03:12:08', '2024-03-09 03:12:08'),
(2, 'john doe', 'john-doe', 'john@gmail.com', '$2y$12$FiGfe45aeJlM8sqeJF8tT.QvGI.IsRGGvlZGw9kx4yxRT44RVWAlm', 'none', 'status pinjaman', 0, '50XlwM8xw9', '2024-03-09 03:12:09', '2024-03-09 03:12:09', '2024-03-09 03:12:09'),
(3, 'admin', 'admin', 'admin@gmail.com', '$2y$12$ekvjv//qhfuhO4MAaeAPG.q48vgrg0Z4/WEdmktMFXCHKO/WwQVU2', 'none', 'status pinjaman', 1, 'x1PEsAhIOB', '2024-03-09 03:12:09', '2024-03-09 03:12:09', '2024-03-09 03:12:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_slug_unique` (`slug`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
