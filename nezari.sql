-- phpMyAdmin SQL Dump
-- version 5.3.0-dev+20220522.7701cd71da
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 26, 2022 at 12:31 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nezari`
--

-- --------------------------------------------------------

--
-- Table structure for table `abouts`
--

CREATE TABLE `abouts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ar_intro` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `en_intro` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ar_vision` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `en_vision` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ar_target` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `en_target` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ar_mision` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `en_mision` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `abouts`
--

INSERT INTO `abouts` (`id`, `ar_intro`, `en_intro`, `ar_vision`, `en_vision`, `ar_target`, `en_target`, `ar_mision`, `en_mision`, `created_at`, `updated_at`) VALUES
(1, 'nezari', 'النزاري', 'نطمح ان نكون الشركة الرائدة في توفير الاجهزه الطبيه ومستلزمات التجميل وكل مايخص العنايه الصحيه والجمال', 'We aspire to be the leading company in providing medical devices, cosmetic supplies and everything related to health and beauty care\n', 'هدفنا هو تقديم منتجات صحية عالية الجودة إلى الأبد', 'our aim is to deliver hight quilaty and health products and forever', 'ملتزمون بتحقيق اعلى معايير الجودة والسلامه والفعاليه والحفاظ عليها من خلال توفير منتجات الرعايه الصحية لافراد المجتمع', 'We are committed to achieving and maintaining the highest standards of quality, safety and effectiveness by providing health care products to all members of society', '2022-09-22 21:24:40', '2022-09-22 21:25:17');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ar_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `en_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ar_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `en_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `ar_title`, `en_title`, `ar_description`, `en_description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'مستحضرات التجميل', 'Cosmetic', 'مستحضرات التجميل وكل ما يخص العنايه بالجسم والوجه والشعر', 'Cosmetics and everything related to body, face and hair care', 1, '2022-09-17 15:48:32', '2022-09-21 19:56:08'),
(2, 'معدات طبية', 'medical equipment', 'معدات طبية واجهزه طبيه', 'Medical equipment and medical devices', 1, '2022-09-21 19:53:51', '2022-09-21 19:53:51');

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ar_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `en_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ar_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `en_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ar_country` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `en_country` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `ar_title`, `en_title`, `ar_description`, `en_description`, `ar_country`, `en_country`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'IDS company Korea ', 'IDS company Korea ', 'IDS company Korea \n', 'IDS company Korea \n', 'كوريا', 'Korea', 'Es7o0ixS7w7gTGPV8ITOCc1pTl8DTw-metaTEwucG5n-.png', 1, '2022-09-17 15:49:45', '2022-09-23 20:43:03'),
(2, 'Globalipl Chine', 'Globalipl Chine', 'Globalipl Chine', 'Gobalipl Chine', 'الصين', 'China', 'yjpAOlUEWdAxhBEMsr3Q3moBpEDXWe-metabG9nb21vYmlsZS5wbmc=-.png', 1, '2022-09-21 12:01:05', '2022-09-23 20:42:22');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `phone`, `title`, `message`, `created_at`, `updated_at`) VALUES
(1, 'lkdsj;lfcs', 's@s.s', '777777777777', '', '', NULL, NULL),
(2, 'lkdsj;lfcs', 's@s.s', '777777777777', '', '', NULL, NULL),
(3, 'sal,mam', 'salman@s.s', '773287037', 'الشرو ع خارب', 'يترنتمسنيسمينبمسنيبنسيتكسئسي', '2022-09-21 11:55:46', '2022-09-21 11:55:46');

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
(21, '2014_10_12_000000_create_users_table', 1),
(22, '2014_10_12_100000_create_password_resets_table', 1),
(23, '2019_08_19_000000_create_failed_jobs_table', 1),
(24, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(25, '2022_08_17_173723_create_contacts_table', 1),
(26, '2022_08_17_173751_create_services_table', 1),
(27, '2022_08_17_173813_create_abouts_table', 1),
(28, '2022_08_17_174100_create_companies_table', 1),
(29, '2022_08_17_203050_create_categories_table', 1),
(30, '2022_08_17_221941_create_products_table', 1),
(41, '2014_10_12_000000_create_users_table', 1),
(42, '2014_10_12_100000_create_password_resets_table', 1),
(43, '2019_08_19_000000_create_failed_jobs_table', 1),
(44, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(45, '2022_08_17_173723_create_contacts_table', 1),
(46, '2022_08_17_173751_create_services_table', 1),
(47, '2022_08_17_173813_create_abouts_table', 1),
(48, '2022_08_17_174100_create_companies_table', 1),
(49, '2022_08_17_203050_create_categories_table', 1),
(50, '2022_08_17_221941_create_products_table', 1);

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

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ar_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `en_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ar_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `en_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `images` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ar_usage` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `en_usage` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `company_id` bigint(20) UNSIGNED NOT NULL DEFAULT 1,
  `cate_id` bigint(20) UNSIGNED NOT NULL DEFAULT 1,
  `created_By` bigint(20) UNSIGNED NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ar_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `en_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ar_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `en_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `ar_title`, `en_title`, `ar_description`, `en_description`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'الاستيراد', 'Import', 'استيراد الاجهزة الطبية والتجميليه ومستلزماتها من جميع انحاء العالم حسب المواصفات والمقاييس العالميه والمطلوبه مع ضمانتها.', 'Importing medical and cosmetic devices and their accessories from all over the world according to the international specifications and standards required with their guarantee.', 'fas fa-truck', 1, '2022-09-23 20:35:04', '2022-09-23 20:39:18'),
(2, 'الصيانه', 'Maintenance', 'خدماتنا الحصرية والمتميزة تقديم خدمات الصيانه لجميع الاجهزة على أيدي أمهر وأكفأ المهندسين المتخصصين.', 'Our exclusive and distinguished services. Providing maintenance services for all devices at the hands of the most skilled and most efficient specialized engineers.', 'fas fa-tools', 1, '2022-09-23 20:36:12', '2022-09-23 20:38:59'),
(3, 'مبيعاتنا', 'Our Sales', 'الاجهزة الطبية والتجميليه و مستلزماتها وكل مايخص من مواد تجميليه وقطع الغيار الأجهزة بكافة انواعها.', 'Medical and cosmetic devices and their accessories and all cosmetic materials, spare parts and devices of all kinds.', 'fas fa-shopping-cart', 1, '2022-09-23 20:37:50', '2022-09-23 20:37:50'),
(4, 'الاستشارات', 'Consulting', 'تقديم الخدمات الاستشارات في مجال الخدمات الطبيةه والتجميليه بما يتناسب مع احتياجات العملاء.', 'Providing consulting services in the field of medical and cosmetic services in proportion to the needs of clients.', 'fas fa-house-user', 1, '2022-09-23 20:38:37', '2022-09-23 20:38:37');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'salman', 'salman@s.s', NULL, '$2y$10$Wravj.hn7onK991Sq1WU9e5Z3Z3m7f1O9dNKEM.2mqR9/yzYXlvXe', NULL, '2022-09-17 15:40:15', '2022-09-17 15:40:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abouts`
--
ALTER TABLE `abouts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
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
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_company_id_foreign` (`company_id`),
  ADD KEY `products_cate_id_foreign` (`cate_id`),
  ADD KEY `products_created_by_foreign` (`created_By`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `abouts`
--
ALTER TABLE `abouts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_cate_id_foreign` FOREIGN KEY (`cate_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `products_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`),
  ADD CONSTRAINT `products_created_by_foreign` FOREIGN KEY (`created_By`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;



