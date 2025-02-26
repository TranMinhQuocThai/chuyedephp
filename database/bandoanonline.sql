-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 25, 2025 at 05:24 PM
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
-- Database: `bandoanonline`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `food_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `user_id`, `food_id`, `quantity`, `created_at`, `updated_at`) VALUES
(4, 2, 2, 1, '2025-02-15 23:27:05', '2025-02-15 23:27:05'),
(5, 2, 4, 1, '2025-02-15 23:27:09', '2025-02-15 23:27:09');

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
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `categories` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`id`, `name`, `description`, `price`, `image`, `created_at`, `updated_at`, `categories`) VALUES
(1, 'Cơm tấm sườn bì chả', 'Cơm tấm truyền thống với sườn nướng, bì và chả trứng', 45000.00, 'images/com-tam.jpg', '2025-02-15 13:30:46', '2025-02-25 15:52:44', 'food'),
(2, 'Bún bò Huế', 'Bún bò Huế đậm đà với thịt bò và chả cua', 60000.00, 'images/bun-bo-hue.jpg', '2025-02-15 13:30:46', '2025-02-25 15:52:44', 'food'),
(3, 'Phở bò', 'Phở bò thơm ngon với nước dùng đậm vị', 55000.00, 'images/pho-bo.jpg', '2025-02-15 13:30:46', '2025-02-25 15:52:44', 'food'),
(4, 'Hủ tiếu Nam Vang', 'Hủ tiếu Nam Vang với thịt bằm và tôm tươi', 50000.00, 'images/hu-tieu.jpg', '2025-02-15 13:30:46', '2025-02-25 15:52:44', 'food'),
(5, 'Mì Quảng', 'Mì Quảng truyền thống với nước dùng đặc biệt', 55000.00, 'images/mi-quang.jpg', '2025-02-15 13:30:46', '2025-02-25 15:52:44', 'food'),
(6, 'Bánh mì thịt nướng', 'Bánh mì giòn rụm với thịt nướng đậm vị', 30000.00, 'images/banh-mi-thit-nuong.jpg', '2025-02-15 13:30:46', '2025-02-25 15:52:44', 'food'),
(7, 'Cháo lòng', 'Cháo lòng nóng hổi với lòng heo tươi ngon', 40000.00, 'images/chao-long.jpg', '2025-02-15 13:30:46', '2025-02-25 15:52:44', 'food'),
(8, 'Bánh xèo', 'Bánh xèo vàng giòn với tôm, thịt và giá đỗ', 50000.00, 'images/banh-xeo.jpg', '2025-02-15 13:30:46', '2025-02-25 15:52:44', 'food'),
(9, 'Bánh cuốn', 'Bánh cuốn nhân thịt và hành phi thơm lừng', 40000.00, 'images/banh-cuon.jpg', '2025-02-15 13:30:46', '2025-02-25 15:52:44', 'food'),
(10, 'Gỏi cuốn', 'Gỏi cuốn tươi mát với tôm, thịt và rau sống', 35000.00, 'images/goi-cuon.jpg', '2025-02-15 13:30:46', '2025-02-25 15:52:44', 'food'),
(11, 'Bánh canh cua', 'Bánh canh cua với nước dùng sánh mịn', 65000.00, 'images/banh-canh-cua.jpg', '2025-02-15 13:30:46', '2025-02-25 15:52:44', 'food'),
(12, 'Cá kho tộ', 'Cá kho tộ đậm đà với nước kho đặc biệt', 70000.00, 'images/ca-kho-to.jpg', '2025-02-15 13:30:46', '2025-02-25 15:52:44', 'food'),
(13, 'Bún chả Hà Nội', 'Bún chả nướng thơm ngon đậm vị Hà Nội', 50000.00, 'images/bun-cha-ha-noi.jpg', '2025-02-15 13:30:46', '2025-02-25 15:52:44', 'food'),
(14, 'Bún riêu cua', 'Bún riêu cua chua cay hấp dẫn', 45000.00, 'images/bun-rieu-cua.jpg', '2025-02-15 13:30:46', '2025-02-25 15:52:44', 'food'),
(15, 'Nem lụi', 'Nem lụi nướng trên lửa than, ăn kèm nước chấm đặc biệt', 55000.00, 'images/nem-lui.jpg', '2025-02-15 13:30:46', '2025-02-25 15:52:44', 'food'),
(16, 'Cơm chiên hải sản', 'Cơm chiên giòn thơm với hải sản tươi sống', 60000.00, 'images/com-chien-hai-san.jpg', '2025-02-15 13:30:46', '2025-02-25 15:52:44', 'food'),
(17, 'Gà nướng mật ong', 'Gà nướng mật ong thơm lừng', 75000.00, 'images/ga-nuong-mat-ong.jpg', '2025-02-15 13:30:46', '2025-02-25 15:52:44', 'food'),
(18, 'Lẩu thái hải sản', 'Lẩu thái chua cay với tôm, mực, nghêu', 250000.00, 'images/lau-thai-hai-san.jpg', '2025-02-15 13:30:46', '2025-02-25 15:52:44', 'food'),
(19, 'Lẩu bò nhúng dấm', 'Lẩu bò nhúng dấm chua ngọt hấp dẫn', 220000.00, 'images/lau-bo-nhung-dam.jpg', '2025-02-15 13:30:46', '2025-02-25 15:52:44', 'food'),
(20, 'Ốc xào me', 'Ốc xào me chua cay hấp dẫn', 80000.00, 'images/oc-xao-me.jpg', '2025-02-15 13:30:46', '2025-02-25 15:52:44', 'food'),
(21, 'Bạch tuộc nướng', 'Bạch tuộc nướng giòn sần sật với muối ớt xanh', 120000.00, 'images/bach-tuoc-nuong.jpg', '2025-02-15 13:30:46', '2025-02-25 15:52:44', 'food'),
(22, 'Chim cút quay', 'Chim cút quay giòn rụm với nước sốt đặc biệt', 90000.00, 'images/chim-cut-quay.jpg', '2025-02-15 13:30:46', '2025-02-25 15:52:44', 'food'),
(23, 'Chả cá Lã Vọng', 'Chả cá Lã Vọng ngon chuẩn vị Hà Nội', 150000.00, 'images/cha-ca-la-vong.jpg', '2025-02-15 13:30:46', '2025-02-25 15:52:44', 'food'),
(24, 'Gỏi gà bắp cải', 'Gỏi gà bắp cải giòn ngon', 70000.00, 'images/goi-ga-bap-cai.jpg', '2025-02-15 13:30:46', '2025-02-25 15:52:44', 'food'),
(25, 'Gà hấp lá chanh', 'Gà hấp lá chanh thơm nức mũi', 85000.00, 'images/ga-hap-la-chanh.jpg', '2025-02-15 13:30:46', '2025-02-25 15:52:44', 'food'),
(26, 'Bún mắm', 'Bún mắm đặc trưng miền Tây', 60000.00, 'images/bun-mam.jpg', '2025-02-15 13:30:46', '2025-02-25 15:52:44', 'food'),
(27, 'Bún đậu mắm tôm', 'Bún đậu mắm tôm với đầy đủ topping', 55000.00, 'images/bun-dau-mam-tom.jpg', '2025-02-15 13:30:46', '2025-02-25 15:52:44', 'food'),
(28, 'Canh chua cá lóc', 'Canh chua cá lóc với vị me chua thanh', 75000.00, 'images/canh-chua-ca-loc.jpg', '2025-02-15 13:30:46', '2025-02-25 15:52:44', 'food'),
(29, 'Lẩu cá kèo', 'Lẩu cá kèo đặc sản miền Nam', 200000.00, 'images/lau-ca-keo.jpg', '2025-02-15 13:30:46', '2025-02-25 15:52:44', 'food'),
(30, 'Bò né', 'Bò né trứng ốp la và pate nóng hổi', 80000.00, 'images/bo-ne.jpg', '2025-02-15 13:30:46', '2025-02-25 15:52:44', 'food'),
(31, 'Trà Sữa Trân Châu', 'Trà sữa với trân châu đen truyền thống', 35000.00, 'images/tra-sua-tran-chau.jpg', '2025-02-17 05:34:18', '2025-02-25 15:52:44', 'drink'),
(32, 'Cà Phê Sữa Đá', 'Cà phê pha phin kết hợp sữa đặc', 30000.00, 'images/ca-phe-sua-da.jpg', '2025-02-17 05:34:18', '2025-02-25 15:52:44', 'drink'),
(33, 'Nước Cam Ép', 'Nước cam tươi nguyên chất', 25000.00, 'images/nuoc-cam-ep.jpg', '2025-02-17 05:34:18', '2025-02-25 15:52:44', 'drink'),
(34, 'Matcha Latte', 'Sữa tươi kết hợp bột matcha Nhật Bản', 40000.00, 'images/matcha-latte.jpg', '2025-02-17 05:34:18', '2025-02-25 15:52:44', 'drink'),
(35, 'Sinh Tố Bơ', 'Sinh tố bơ béo ngậy với sữa đặc', 45000.00, 'images/sinh-to-bo.jpg', '2025-02-17 05:34:18', '2025-02-25 15:52:44', 'drink'),
(36, 'Sinh Tố Dâu', 'Sinh tố dâu tây tươi mát', 40000.00, 'images/sinh-to-dau.jpg', '2025-02-17 05:34:18', '2025-02-25 15:52:44', 'drink'),
(37, 'Trà Đào Cam Sả', 'Trà đào kết hợp cam tươi và sả', 38000.00, 'images/tra-dao-cam-sa.jpg', '2025-02-17 05:34:18', '2025-02-25 15:52:44', 'drink'),
(38, 'Nước Dừa', 'Nước dừa nguyên chất từ trái dừa tươi', 30000.00, 'images/nuoc-dua.jpg', '2025-02-17 05:34:18', '2025-02-25 15:52:44', 'drink'),
(39, 'Coca Cola', 'Nước ngọt có ga Coca Cola', 15000.00, 'images/coca-cola.jpg', '2025-02-17 05:34:18', '2025-02-25 15:52:44', 'drink'),
(40, 'Pepsi', 'Nước ngọt có ga Pepsi', 15000.00, 'images/pepsi.jpg', '2025-02-17 05:34:18', '2025-02-25 15:52:44', 'drink'),
(41, 'Trà Xanh Chanh Mật Ong', 'Trà xanh kết hợp chanh tươi và mật ong', 35000.00, 'images/tra-xanh-chanh-mat-ong.jpg', '2025-02-17 05:34:18', '2025-02-25 15:52:44', 'drink'),
(42, 'Cà Phê Đen', 'Cà phê nguyên chất không đường', 28000.00, 'images/ca-phe-den.jpg', '2025-02-17 05:34:18', '2025-02-25 15:52:44', 'drink'),
(43, 'Soda Chanh', 'Nước soda kết hợp chanh tươi', 32000.00, 'images/soda-chanh.jpg', '2025-02-17 05:34:18', '2025-02-25 15:52:44', 'drink'),
(44, 'Latte', 'Cà phê espresso kết hợp sữa tươi', 40000.00, 'images/latte.jpg', '2025-02-17 05:34:18', '2025-02-25 15:52:44', 'drink'),
(45, 'Mocha', 'Cà phê espresso pha cùng chocolate', 42000.00, 'images/mocha.jpg', '2025-02-17 05:34:18', '2025-02-25 15:52:44', 'drink'),
(46, 'Trà Ô Long Sữa', 'Trà ô long kết hợp với sữa tươi', 39000.00, 'images/tra-o-long-sua.jpg', '2025-02-17 05:34:18', '2025-02-25 15:52:44', 'drink'),
(47, 'Sữa Tươi Trân Châu Đường Đen', 'Sữa tươi kết hợp trân châu đường đen', 45000.00, 'images/sua-tuoi-tran-chau-duong-den.jpg', '2025-02-17 05:34:18', '2025-02-25 15:52:44', 'drink'),
(48, 'Nước Ép Cà Rốt', 'Nước ép cà rốt nguyên chất', 28000.00, 'images/nuoc-ep-ca-rot.jpg', '2025-02-17 05:34:18', '2025-02-25 15:52:44', 'drink'),
(49, 'Trà Táo Bạc Hà', 'Trà xanh kết hợp táo và bạc hà', 35000.00, 'images/tra-tao-bac-ha.jpg', '2025-02-17 05:34:18', '2025-02-25 15:52:44', 'drink'),
(50, 'Chocolate Đá Xay', 'Sô cô la kết hợp với sữa tươi và đá xay', 45000.00, 'images/chocolate-da-xay.jpg', '2025-02-17 05:34:18', '2025-02-25 15:52:44', 'drink');

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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `payment_method` enum('Tiền mặt','Chuyển khoản') NOT NULL,
  `address` text NOT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  `order_status` enum('Chưa gửi','Đã gửi') DEFAULT 'Chưa gửi',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `phone`, `payment_method`, `address`, `total_amount`, `order_status`, `created_at`, `updated_at`) VALUES
(3, 1, '0373846283', 'Chuyển khoản', '12 trịnh đình thảo', 30000.00, 'Đã gửi', '2025-02-25 09:05:46', '2025-02-25 09:16:20');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `food_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `food_id`, `quantity`, `price`, `created_at`, `updated_at`) VALUES
(3, 3, 6, 1, 30000.00, '2025-02-25 09:05:46', '2025-02-25 09:05:46');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('thaiquoc1709@gmail.com', '$2y$10$R.I0I/NEseAuhJfmMIuXq.er/1YtmMG9OdaB31ZHFiGxbDyBLACYO', '2025-02-16 00:15:38');

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
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'TranMinhQuocThai', 'thaiquoc1709@gmail.com', NULL, '$2y$10$nKz9k8agZyYF06pZZt2GGO64eF2MWhIfl06T4CHc567jxI/dGpkpW', '7qzbXDdhmf8Q2H32A6NKUY1EaPZNCNx4yJwutGzUpqwSRDAK23uBxvPXguGX', '2025-02-10 19:35:26', '2025-02-10 20:04:59'),
(2, 'thaonhi', 'nhi85027@gmail.com', NULL, '$2y$10$TglhimSOcEjR/AnvSLDDPeonvTKSGo7bwc7fGXFEDtvY2cauSyTQS', NULL, '2025-02-10 20:30:06', '2025-02-10 20:30:06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_user_id_foreign` (`user_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `food_id` (`food_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

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
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `food`
--
ALTER TABLE `food`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`food_id`) REFERENCES `food` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
