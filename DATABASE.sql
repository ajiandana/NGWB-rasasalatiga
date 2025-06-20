-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 20, 2025 at 11:36 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rasalatiga`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `logo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`id`, `title`, `description`, `contact`, `logo`) VALUES
(1, 'Tentang Kami', 'Deskripsi tentang website Anda', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `liked_menu`
--

CREATE TABLE `liked_menu` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `menu_id` bigint(20) UNSIGNED NOT NULL,
  `session` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category` enum('Main Course','Beverage','Others') NOT NULL,
  `resto_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `category`, `resto_id`, `name`, `description`, `image`, `created_at`, `updated_at`) VALUES
(2, 'Main Course', 1, 'Ikan Bakar', 'test', 'Cae2R48S80gfAATgbLL0ZUeIfXy6T2pkkS0xt6Q5.jpg', '2025-06-20 01:34:09', '2025-06-20 01:34:16'),
(4, 'Others', 1, 'test', 'test', 'GI4DmkWwptNR2hl1DZZhlwFmiKDAvY5MhHS0ta1d.jpg', '2025-06-20 01:36:58', '2025-06-20 01:52:10'),
(5, 'Beverage', 1, 'Minum', 'Keras bvangey', 'h9YxnPtF1ayXZuKBOaLm6wwFXKwkdLSsdNgsTQj8.jpg', '2025-06-20 01:52:33', '2025-06-20 01:52:41'),
(6, 'Others', 2, 'Minuman Keras', 'Murah', 'F9Un9IQ26s1RmkZW8fQBx7LhBB8KofXfHuPvKOQ1.jpg', '2025-06-20 01:57:47', '2025-06-20 01:57:54');

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
(1, '2025_06_20_031508_restaurant_table', 1),
(2, '2025_06_20_031554_users_table', 1),
(3, '2025_06_20_031829_sliders_table', 1),
(4, '2025_06_20_031844_about_table', 1),
(5, '2025_06_20_031900_menu_table', 1),
(6, '2025_06_20_031919_r_sliders_table', 1),
(7, '2025_06_20_031928_r_operational_table', 1),
(8, '2025_06_20_031942_likes_menu_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `restaurants`
--

CREATE TABLE `restaurants` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `bio` varchar(400) NOT NULL,
  `link_location` varchar(255) NOT NULL,
  `category` enum('Restoran','Kafe & Kedai Kopi','Jajanan & Warung Kaki Lima','Toko Roti & Kue','Minuman & Es','Makanan Beku & Siap Saji','Oleh-oleh & Produk Khas Daerah') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `restaurants`
--

INSERT INTO `restaurants` (`id`, `name`, `logo`, `image`, `address`, `contact`, `bio`, `link_location`, `category`, `created_at`, `updated_at`) VALUES
(1, 'Kedai Kairos', 'GmUzDpIUlLGHEcQv8l8AwHr7ChS1iHomMso4kaPr.jpg', '7YVnCdouG6lHniP5aBKy4IVg7wAST7g7TGlA9uGb.jpg', 'Dliko Indah, Blotongan, Salatiga', '08123456789', 'Welcome to kedai kairos menyediakan babi panggang helo', 'https://maps.app.goo.gl/1edyYkZU6hQzgxy39', 'Restoran', '2025-06-20 08:10:25', '2025-06-20 02:27:30'),
(2, 'Kedai Kopi', '7FALkJii6s7tPg7akfl5MvAmNPH2WXyspcJ9TfwY.jpg', '7sebDKmYxEks5q0edep0S2aW44PCK7XxWZFHtuUm.jpg', 'Sana pokoknya', '08123456789', 'Kesini ajaa', 'https://maps.app.goo.gl/1edyYkZU6hQzgxy39', 'Kafe & Kedai Kopi', '2025-06-20 01:55:26', '2025-06-20 02:25:52');

-- --------------------------------------------------------

--
-- Table structure for table `r_operational`
--

CREATE TABLE `r_operational` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `resto_id` bigint(20) UNSIGNED NOT NULL,
  `days` enum('Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu') NOT NULL,
  `open_time` time NOT NULL,
  `close_time` time NOT NULL,
  `is_closed` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `r_operational`
--

INSERT INTO `r_operational` (`id`, `resto_id`, `days`, `open_time`, `close_time`, `is_closed`) VALUES
(1, 1, 'Senin', '08:00:00', '22:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `r_sliders`
--

CREATE TABLE `r_sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `resto_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `r_sliders`
--

INSERT INTO `r_sliders` (`id`, `resto_id`, `image`, `title`, `created_at`, `updated_at`) VALUES
(1, 1, 'tQqQYtLt0ovZyevFnPWdYGYav10CWPKWSc4UkxKg.jpg', 'Mari Minum', '2025-06-20 01:52:56', '2025-06-20 01:52:56'),
(2, 1, 'wOOu91SRFMMsJYuRbcBrekUXsH8hdXKe1BZBsTE9.jpg', 'Tidak ngelak', '2025-06-20 01:53:12', '2025-06-20 01:53:12'),
(3, 1, 'Q4qpa9BJPIPnHg7hu8Ol2imk9t2883pdfTnjiVOE.jpg', 'Sama teman', '2025-06-20 01:53:24', '2025-06-20 01:53:24'),
(4, 2, 'SGZHwy2lM3DmJqlWbwbefDWqsKswUtw8TvliwEEr.jpg', 'Menu terbaik', '2025-06-20 01:56:41', '2025-06-20 01:56:41'),
(5, 2, 'WF94hIWz9ciN6snPSTSxyL5HgWIAL25bMIupQeTd.jpg', 'Cheerss!', '2025-06-20 01:56:54', '2025-06-20 01:56:54'),
(6, 2, 'mT99PcNbDkj7FfJEvDWaDvInZlH2lkRHO2Zmk8Bn.jpg', 'Mantap cing!', '2025-06-20 01:57:08', '2025-06-20 01:57:08');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `resto_id` bigint(20) UNSIGNED DEFAULT NULL,
  `role` enum('superadmin','adminresto') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `resto_id`, `role`, `created_at`, `updated_at`) VALUES
(1, 'aji andana', 'admin@kairos.com', '$2y$10$/K00tJJIaRE5KzH3Hr2sZ.pFUVOt4JXJifKQXgaAfdEr/uQDpU2ly', 1, 'adminresto', '2025-06-20 08:12:40', NULL),
(2, 'aji juga', 'ajiandana@gmail.com', '$2y$10$LK.cfLyB7PooOh2.hiLEhumdY2oS0.D6LIiVXzPGuvLTF3cGT6Xx2', NULL, 'superadmin', '2025-06-20 08:43:11', NULL),
(3, 'kk', 'kk@gmail.com', '$2y$12$SI9h1sx1S0HdOooYH/ozsOh8fZMNXeLotuilScUeSzOzMOhnj0YLe', 2, 'adminresto', '2025-06-20 01:56:09', '2025-06-20 01:56:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `liked_menu`
--
ALTER TABLE `liked_menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `liked_menu_menu_id_foreign` (`menu_id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menus_resto_id_foreign` (`resto_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `restaurants`
--
ALTER TABLE `restaurants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `r_operational`
--
ALTER TABLE `r_operational`
  ADD PRIMARY KEY (`id`),
  ADD KEY `r_operational_resto_id_foreign` (`resto_id`);

--
-- Indexes for table `r_sliders`
--
ALTER TABLE `r_sliders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `r_sliders_resto_id_foreign` (`resto_id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_resto_id_foreign` (`resto_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `liked_menu`
--
ALTER TABLE `liked_menu`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `restaurants`
--
ALTER TABLE `restaurants`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `r_operational`
--
ALTER TABLE `r_operational`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `r_sliders`
--
ALTER TABLE `r_sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `liked_menu`
--
ALTER TABLE `liked_menu`
  ADD CONSTRAINT `liked_menu_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `menus`
--
ALTER TABLE `menus`
  ADD CONSTRAINT `menus_resto_id_foreign` FOREIGN KEY (`resto_id`) REFERENCES `restaurants` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `r_operational`
--
ALTER TABLE `r_operational`
  ADD CONSTRAINT `r_operational_resto_id_foreign` FOREIGN KEY (`resto_id`) REFERENCES `restaurants` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `r_sliders`
--
ALTER TABLE `r_sliders`
  ADD CONSTRAINT `r_sliders_resto_id_foreign` FOREIGN KEY (`resto_id`) REFERENCES `restaurants` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_resto_id_foreign` FOREIGN KEY (`resto_id`) REFERENCES `restaurants` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
