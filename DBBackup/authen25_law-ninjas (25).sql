-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 22, 2022 at 03:26 PM
-- Server version: 10.3.32-MariaDB
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `authen25_law-ninjas`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_us`
--

CREATE TABLE `about_us` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `about_us`
--

INSERT INTO `about_us` (`id`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Law is a set of rules decided by a particular place or authority meant for the purpose of keeping the peace and security of society. Courts or police may enforce this system of rules and punish people who break the laws, such as by paying a fine, or other penalty including jail', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_super` tinyint(1) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `first_name`, `last_name`, `email`, `password`, `image`, `is_super`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Law', 'Ninjas', 'lawninjas@gmail.com', '$2y$10$FWTeYSvvlbtgu2Zk36lNiOky0wHt1S/XgFs8UqHbQa9s252FamSeK', '1642835106.jpeg', 0, NULL, NULL, '2022-01-22 06:05:06');

-- --------------------------------------------------------

--
-- Table structure for table `arenas`
--

CREATE TABLE `arenas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0' COMMENT '0 => off, 1 => on',
  `password_type` enum('none','password') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'none' COMMENT 'none => none, password => password',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `arenas`
--

INSERT INTO `arenas` (`id`, `image`, `name`, `description`, `password`, `status`, `password_type`, `created_at`, `updated_at`) VALUES
(2, '1642671564.jpg', 'Laws', 'gfhnjhgfghjhgf', '13131313', '1', 'password', '2022-01-20 08:39:24', '2022-01-20 11:02:30'),
(11, '1642681220.jpg', 'qqqqq', 'sdfghjkl', NULL, '1', 'none', '2022-01-20 11:20:20', '2022-01-20 12:49:46'),
(3, '1642671715.jpeg', 'Ninjas', 'fgdfgfgffgr', '12345678', '0', 'password', '2022-01-20 08:41:55', '2022-01-20 11:00:49'),
(6, '1642676985.jpeg', 'lawninjas@gmail.com', 'gtrgtrg', NULL, '0', 'none', '2022-01-20 10:09:45', '2022-01-20 11:12:17'),
(7, '1642677095.jpeg', 'lawninjas@gmail.com', 'thrrrhteheth', NULL, '1', 'none', '2022-01-20 10:11:35', '2022-01-20 11:16:35'),
(10, '1642681144.jpeg', 'lawninjas@gmail.com', 'ukytkytk', '1234567890', '1', 'password', '2022-01-20 11:19:04', '2022-01-22 05:19:36'),
(16, '1642832301.jpg', 'jhn', 'asdfghgfd', NULL, '0', 'none', '2022-01-22 05:18:21', '2022-01-22 05:18:21'),
(15, '1642832192.jpg', 'qaqaqa', 'asdfgashjklkjhgf', NULL, '0', 'none', '2022-01-20 12:37:28', '2022-01-22 05:16:32');

-- --------------------------------------------------------

--
-- Table structure for table `arena_posts`
--

CREATE TABLE `arena_posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `arenagroup_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `post_description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `post_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `arena_posts`
--

INSERT INTO `arena_posts` (`id`, `arenagroup_id`, `user_id`, `post_description`, `post_image`, `created_at`, `updated_at`) VALUES
(1, '2', '1', 'hkewhjrkewhkwjh', NULL, NULL, NULL),
(2, '3', '2', 'hrtethbrthre', NULL, NULL, NULL),
(3, '6', '4', 'rewg jbfbjhwebf jfguwbefurb fbuweburfb', NULL, NULL, NULL),
(4, '7', '5', 'gjewjgfw kfrweghw wnwerwe', NULL, NULL, NULL),
(5, '8', '6', 'gjrtoi gnreitgniet ignteintgin', NULL, NULL, NULL),
(6, '10', '7', 'dfjgld ngkdfndfg gndgmd gnndf', NULL, NULL, NULL),
(7, '10', '7', 'rjhgrkejthejr kgjerojtgejr', NULL, NULL, NULL),
(8, '10', '7', 'jhdfjghdf khdfkghjfkjh ', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `like_unlikes`
--

CREATE TABLE `like_unlikes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `post_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(58, '2014_10_12_000000_create_users_table', 11),
(31, '2014_10_12_100000_create_password_resets_table', 1),
(32, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(33, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(34, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(35, '2016_06_01_000004_create_oauth_clients_table', 1),
(36, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(37, '2019_08_19_000000_create_failed_jobs_table', 1),
(38, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(39, '2021_12_01_130145_create_user_devices_table', 1),
(40, '2021_12_06_062824_create_notifications_table', 2),
(41, '2021_12_06_062934_create_privacy_policies_table', 2),
(42, '2021_12_06_063105_create_terms_conditions_table', 2),
(43, '2021_12_06_083717_create_about_us_table', 3),
(46, '2021_12_06_103228_create_admins_table', 4),
(68, '2021_12_10_110244_create_resources_table', 17),
(66, '2021_12_17_064640_create_arenas_table', 16),
(71, '2021_12_10_110335_create_videos_table', 19),
(59, '2021_12_28_075047_create_arena_posts_table', 12),
(60, '2021_12_28_134633_create_like_unlikes_table', 12),
(61, '2021_12_28_134731_create_post_comments_table', 12),
(69, '2022_01_05_123138_create_resources_images_table', 18);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('8fff565d299799d1694a9b530cfb37d7d737ecdd8d98bc1eb5b038e159bb9ad1ab7ac98285ff83a1', 2, 1, 'MyApp', '[]', 0, '2021-12-03 10:49:50', '2021-12-03 10:49:50', '2022-12-03 11:49:50'),
('f9208fbfa7a8ae8387ae06354efcf3a44b92d01a52823df36c237087cb85405a885f086e7aa68db5', 2, 1, 'MyApp', '[]', 1, '2021-12-03 10:51:04', '2021-12-03 10:51:04', '2022-12-03 11:51:04'),
('ceeafea7a66b021c727a26a7dc6ad7534fb7ba99e8d9748dfabca6f4ed28c9502e9982ea976e954b', 3, 1, 'MyApp', '[]', 0, '2021-12-03 10:53:01', '2021-12-03 10:53:01', '2022-12-03 11:53:01'),
('fcebd5830546ca6fbbf5b771422013e48b795d0867841b919699c1fe56771fd21b5561c5340e3fe8', 3, 1, 'MyApp', '[]', 0, '2021-12-03 10:53:04', '2021-12-03 10:53:04', '2022-12-03 11:53:04'),
('b9b787c9eeb01823890db1832e019e028ac574f5229e133827db99c8b10635e9ba1b42b854aa8abc', 4, 1, 'MyApp', '[]', 0, '2021-12-03 11:18:11', '2021-12-03 11:18:11', '2022-12-03 12:18:11'),
('c58e4c4db99a9d153f9b6e6c6abb60907d80b0d6f8af2f552728ddbd64d927ec454a67ee429593ad', 4, 1, 'MyApp', '[]', 0, '2021-12-03 11:18:36', '2021-12-03 11:18:36', '2022-12-03 12:18:36'),
('fa6b77c188e16fc7962e61db27e91b53e33f5865a4b5eb148a1903906828d4e381cb7d4247079392', 4, 1, 'MyApp', '[]', 0, '2021-12-03 12:24:44', '2021-12-03 12:24:44', '2022-12-03 13:24:44'),
('c36cdb049b4a9cf72a947a59fdb783db062a2890eaf70d234d7d80e9359ebd07b4128348006cf023', 3, 1, 'MyApp', '[]', 0, '2021-12-03 12:24:55', '2021-12-03 12:24:55', '2022-12-03 13:24:55'),
('768e74182499d5efdb0fc20cfaf3a067df520a0fce647a6d1490d169da67b498e64130553ec723a2', 3, 1, 'MyApp', '[]', 1, '2021-12-03 12:39:17', '2021-12-03 12:39:17', '2022-12-03 13:39:17'),
('2c6c266e4b7c742d1f3e307cbc301de38ccfdd0aa7e2a26dad5611ea40da03dad2b0d09aebd4b9ab', 4, 1, 'MyApp', '[]', 0, '2021-12-06 04:53:26', '2021-12-06 04:53:26', '2022-12-06 05:53:26'),
('7ebc70476bf38ff03bf0b17e80d375fbe459ab352f32981155c41291b2f6af05fee1522b1ea121ca', 4, 1, 'MyApp', '[]', 0, '2021-12-06 04:58:08', '2021-12-06 04:58:08', '2022-12-06 05:58:08'),
('07cd0cf092dc91d7077113bf2734447dc696e7b28953fa59d5d8afca838e10081dbc113a2c9a29bf', 4, 1, 'MyApp', '[]', 0, '2021-12-06 04:59:29', '2021-12-06 04:59:29', '2022-12-06 05:59:29'),
('cfdc5f361e7c7a8d6446277c6bf8e043c58c6c1293904cae7027c53ee2923ad64ccccbb853743740', 4, 1, 'MyApp', '[]', 0, '2021-12-06 05:14:45', '2021-12-06 05:14:45', '2022-12-06 06:14:45'),
('9acc21341f8cd9fe2ea114f4c654f4e3a932187aac6a93d69394e500630319e7ea501cabc7b5cbb1', 4, 1, 'MyApp', '[]', 0, '2021-12-06 05:22:37', '2021-12-06 05:22:37', '2022-12-06 06:22:37'),
('a9cc0da4c37873fb491d8344ab14b8e8c061245339d01d961c3b010e1902f45303566b520c06a87a', 5, 1, 'MyApp', '[]', 0, '2021-12-07 10:38:55', '2021-12-07 10:38:55', '2022-12-07 11:38:55'),
('75c1700764ecae8982d34e8296c102424cfbb54e27dbd161b7d476a8412bfb7479211c60b2b28637', 6, 1, 'MyApp', '[]', 0, '2021-12-08 04:57:22', '2021-12-08 04:57:22', '2022-12-08 05:57:22'),
('17d3e4dab7b06977f1ce43da71f247584da405b2f032d70afa70fdd2f66989b6e1742b2ae329440b', 7, 1, 'MyApp', '[]', 0, '2021-12-08 05:07:12', '2021-12-08 05:07:12', '2022-12-08 06:07:12'),
('bd1e5893d12ef12a7d47e7b9ad9c4f34f3afb77144360fde75fce8b4cfc9d4429b383df3fdb269c8', 8, 1, 'MyApp', '[]', 0, '2021-12-08 05:07:50', '2021-12-08 05:07:50', '2022-12-08 06:07:50'),
('e6e928eb0560c4908f1b46d92a2877f5298cfd070d3bce350098a310634a774179d44ab77c32a2c0', 9, 1, 'MyApp', '[]', 0, '2021-12-08 05:09:31', '2021-12-08 05:09:31', '2022-12-08 06:09:31'),
('94a60a05a85f9b730b78f172751b04cca5000beb3618eb5355c5bcff63176b8b442629bb8914aff9', 10, 1, 'MyApp', '[]', 0, '2021-12-08 05:16:14', '2021-12-08 05:16:14', '2022-12-08 06:16:14'),
('27d3e19b0a32e286da0477d18a151fc8f9c3ad6c8858ae31f9036fb2d9c167dd1ec6c48881bb79b9', 11, 1, 'MyApp', '[]', 0, '2021-12-08 05:28:28', '2021-12-08 05:28:28', '2022-12-08 06:28:28'),
('883f0b66b9516ae774b542c9363e70ff5b3705d4bb09e58622d0befaf428f60c4c294a27f3d91a33', 12, 1, 'MyApp', '[]', 0, '2021-12-08 06:15:16', '2021-12-08 06:15:16', '2022-12-08 07:15:16'),
('e2079256c6a591bdf010d7d223b7ae5cdb2a84597caf01feec87c544e03303e5086a52a0b2d39263', 13, 1, 'MyApp', '[]', 0, '2021-12-08 06:17:22', '2021-12-08 06:17:22', '2022-12-08 07:17:22'),
('24938fd6a8d5973d0f96fcd152624874adc5a612f1102c35a97776091b0cbd295eead7ab292332b3', 14, 1, 'MyApp', '[]', 0, '2021-12-08 06:17:57', '2021-12-08 06:17:57', '2022-12-08 07:17:57'),
('813dac1a0514e0bba425d0d4f48a11b29a03cb958c2d65e859623d8fc20decad53e4bf75ceeb34d9', 15, 1, 'MyApp', '[]', 0, '2021-12-08 07:11:17', '2021-12-08 07:11:17', '2022-12-08 08:11:17'),
('45bdd928948c1c27b2449046de2f4a37257593fb5e77d0ba543dd7f76b4e9b73dfafec8bda005321', 16, 1, 'MyApp', '[]', 0, '2021-12-08 07:11:47', '2021-12-08 07:11:47', '2022-12-08 08:11:47'),
('2def689eb680dcc60489cc20ebe119c62ece0e0c6f9113ae7e3ed4ad11a2fd9a770d372c7a28667a', 17, 1, 'MyApp', '[]', 0, '2021-12-08 07:20:10', '2021-12-08 07:20:10', '2022-12-08 08:20:10'),
('382764260eaad2c55952adcc41f5d7c966315bf7f61ee067f6ad3a6f439472120ab537239b523fb2', 18, 1, 'MyApp', '[]', 0, '2021-12-08 08:52:41', '2021-12-08 08:52:41', '2022-12-08 09:52:41'),
('3509ce4eb13fc3f69278e3230d1fa2e0dfa146eb57e2d48a0939e9f662e4b403dd2f4dec221bde9f', 19, 1, 'MyApp', '[]', 0, '2021-12-08 08:55:39', '2021-12-08 08:55:39', '2022-12-08 09:55:39'),
('8d53b472d004fc90f9a4c4a3e5c67bcc20760241d3422972120987f9c486064c2478cc53751036bb', 20, 1, 'MyApp', '[]', 0, '2021-12-08 08:58:23', '2021-12-08 08:58:23', '2022-12-08 09:58:23'),
('0a4972bf5fd967085e0f1cddb283421cad8f4913629e2161b8b2c3000a1198467789c4ea37b81e87', 21, 1, 'MyApp', '[]', 0, '2021-12-08 09:03:17', '2021-12-08 09:03:17', '2022-12-08 10:03:17'),
('3d05c952056b7eba7b6e014d5f82737c9d3122428b4b93a496fd59a3b1106c904df27648d4309b25', 22, 1, 'MyApp', '[]', 0, '2021-12-08 09:25:03', '2021-12-08 09:25:03', '2022-12-08 10:25:03'),
('5a5d29ee1d93eeaa02c3924ce74187021cf3432b345df6498be0f363528ef3ea6b718a2fc7fb5411', 23, 1, 'MyApp', '[]', 0, '2021-12-08 09:25:29', '2021-12-08 09:25:29', '2022-12-08 10:25:29'),
('9fe54deaf41987a8c21109ef5ddff684683bf69a99d8233fbc54d47612435128afa1d4d2b5620097', 24, 1, 'MyApp', '[]', 0, '2021-12-08 09:54:18', '2021-12-08 09:54:18', '2022-12-08 10:54:18'),
('3e2b76c5a8fead2a7cb94840dfa7ac4197429eb14fc7a9039d3db0158226e85de4f04b6cb7366e8b', 25, 1, 'MyApp', '[]', 0, '2021-12-08 09:56:26', '2021-12-08 09:56:26', '2022-12-08 10:56:26'),
('86c1c0526eb939f1e40a80ab519fdad6b5b36ef3c575833fa4d9a904dbd8f08411ad6a6be6c5d23d', 26, 1, 'MyApp', '[]', 0, '2021-12-08 09:59:04', '2021-12-08 09:59:04', '2022-12-08 10:59:04'),
('eeda01d21550e6a1fd96a239458d6c06674e4093e7bf62f63f178dfe5d724fa52bbf96afe934bfb3', 27, 1, 'MyApp', '[]', 0, '2021-12-08 10:00:14', '2021-12-08 10:00:14', '2022-12-08 11:00:14'),
('8892d0a4bb7e1fca34af1affdb5da924115baec80fa3053a423a7352923309f848e2f7d499b1cf8d', 28, 1, 'MyApp', '[]', 0, '2021-12-08 10:09:01', '2021-12-08 10:09:01', '2022-12-08 11:09:01'),
('73456ba9e6d3bdff09c429c7df2562ec4ca1845586e103f4ac3cc83ca6bc53253363b7551dcf82ef', 29, 1, 'MyApp', '[]', 0, '2021-12-08 10:13:10', '2021-12-08 10:13:10', '2022-12-08 11:13:10'),
('97f891a424e649c5a724b7bb4147bcb5f5b0090edfd6cf17f75255a6c2a87d6c3988eef63be7e574', 30, 1, 'MyApp', '[]', 0, '2021-12-08 10:35:42', '2021-12-08 10:35:42', '2022-12-08 11:35:42'),
('17138b9ba91866b47677012fe6e892686f0f203991c3dde6d0b4a491af4f13423ba6919023401173', 31, 1, 'MyApp', '[]', 0, '2021-12-08 10:37:32', '2021-12-08 10:37:32', '2022-12-08 11:37:32'),
('6500d224c80b0f3cce690c341f0463663ae54dc3a5fd2eaec10969fa434271e164826f9b53dd465f', 32, 1, 'MyApp', '[]', 0, '2021-12-08 10:41:46', '2021-12-08 10:41:46', '2022-12-08 11:41:46'),
('9d5a7e883ebbe2585bf9dc49b9e2ab136d81ad4ea7d83505d7a796b2daa727c771778aa52ba830eb', 33, 1, 'MyApp', '[]', 0, '2021-12-08 10:43:25', '2021-12-08 10:43:25', '2022-12-08 11:43:25'),
('85f8d8e6e29536bb4bcb6264a4549ea4e0bbec2a2641e803af4a5689dd93b472a0f904e7f8535df7', 34, 1, 'MyApp', '[]', 0, '2021-12-08 11:10:02', '2021-12-08 11:10:02', '2022-12-08 12:10:02'),
('bc108cac85a5231c096cc1dbcffcb40bcaba6ee42fe24f8920c2681b3f234c582e63f988a81fdd8f', 35, 1, 'MyApp', '[]', 0, '2021-12-08 11:11:02', '2021-12-08 11:11:02', '2022-12-08 12:11:02'),
('88530835dcb0608a2da8ee9206053730c9605617f620ea1d0176e2dc83b92cdfdf780ee690ba09ef', 36, 1, 'MyApp', '[]', 0, '2021-12-08 11:17:10', '2021-12-08 11:17:10', '2022-12-08 12:17:10'),
('21d48db87008625915d445cd40abf9bf1751d9eaf62eb7c5c5024c1cd3f35fc2391fa9e31fe7d424', 37, 1, 'MyApp', '[]', 0, '2021-12-08 11:17:37', '2021-12-08 11:17:37', '2022-12-08 12:17:37'),
('fa59f01196998e66d20d368d9d6452f35def92359eed875fdac7c881f6d6501c4114103db3c859c1', 38, 1, 'MyApp', '[]', 0, '2021-12-08 11:21:15', '2021-12-08 11:21:15', '2022-12-08 12:21:15'),
('60668f10c5d37c36d597b29bdd060ce063101d3dbe79ac0355ae4374142dc782c51421405a0b83a9', 39, 1, 'MyApp', '[]', 0, '2021-12-08 11:22:01', '2021-12-08 11:22:01', '2022-12-08 12:22:01'),
('84ee377bae6e9187183a094b1c0f6d3942cc10ef30a518aa0153e2a52843b1b15c297e057fe7b939', 40, 1, 'MyApp', '[]', 0, '2021-12-08 11:24:11', '2021-12-08 11:24:11', '2022-12-08 12:24:11'),
('0a5d25a0a448c5575bfb84ed9c04f1d02ecb215f98f0c9806ac75ad783abc18ebfa20cfce7be4313', 41, 1, 'MyApp', '[]', 0, '2021-12-08 11:25:38', '2021-12-08 11:25:38', '2022-12-08 12:25:38'),
('0d4fce0c44bac334abecedb30e291c52c15a9fd1afffdd8d5765311f8f8be0d2b95cf2afab90797e', 42, 1, 'MyApp', '[]', 0, '2021-12-08 11:28:58', '2021-12-08 11:28:58', '2022-12-08 12:28:58'),
('b338e9bbe0c4b4d136415e3648d931369caf3cf3359f44b144224deb8c0e89380a4de23fc0b8549b', 43, 1, 'MyApp', '[]', 0, '2021-12-08 11:38:11', '2021-12-08 11:38:11', '2022-12-08 12:38:11'),
('eff182621bf23d4c3114e0b0b29e266b58a1efa80ee35e5cc81a7837985089945b252904d556ce17', 44, 1, 'MyApp', '[]', 0, '2021-12-08 11:40:19', '2021-12-08 11:40:19', '2022-12-08 12:40:19'),
('9f3b654deb3680707b90f141f6f01d85d16b403d225da0e2a5dcbdc4163da4db19ecfdf48708c40c', 45, 1, 'MyApp', '[]', 0, '2021-12-08 11:44:46', '2021-12-08 11:44:46', '2022-12-08 12:44:46'),
('4e6d99f9ff63eb4bdd47e7d2a2d229e60ca0dde789a7335ccb419314754616d657a86997557fb37d', 46, 1, 'MyApp', '[]', 0, '2021-12-08 11:50:30', '2021-12-08 11:50:30', '2022-12-08 12:50:30'),
('0cbd1b825c02ff7be2510ce4882f55a19ca46712233b178c7898045c2a1e1ef11e6672747213269e', 47, 1, 'MyApp', '[]', 0, '2021-12-08 11:57:22', '2021-12-08 11:57:22', '2022-12-08 12:57:22'),
('2e169178d163ec6531bd421c9701c4dc0aed1a4f7e092179db1682cb3d0d276ab91d6cca49d447f5', 48, 1, 'MyApp', '[]', 0, '2021-12-08 12:00:10', '2021-12-08 12:00:10', '2022-12-08 13:00:10'),
('ac1f08c6e7b78f13aa970a0d6b5c832cad0ff506f77dfab049602e08daf1d21b491a96fa6f08e908', 49, 1, 'MyApp', '[]', 0, '2021-12-08 12:01:08', '2021-12-08 12:01:08', '2022-12-08 13:01:08'),
('223078dd62d19bd5c29d717001958f7db2681008eabb3ebf38a07d0279b3cd267a5143925a88ee8c', 50, 1, 'MyApp', '[]', 0, '2021-12-08 12:06:23', '2021-12-08 12:06:23', '2022-12-08 13:06:23'),
('42f542de485fcf0a58e98260de751fe8fb852d6bcd2d311d24c88ae6d30086dc8e58de3a9d695850', 51, 1, 'MyApp', '[]', 0, '2021-12-08 12:07:27', '2021-12-08 12:07:27', '2022-12-08 13:07:27'),
('d47511849e56d998f8fafb0107e035a5bd6f4d2f083ab4fb7a0e39a0ad9c5f9a762fd25e98becc9c', 52, 1, 'MyApp', '[]', 0, '2021-12-08 12:10:23', '2021-12-08 12:10:23', '2022-12-08 13:10:23'),
('bcd5d51ee63669f21d741ec3886700ba8e3e949b8c189d72341a59439877798fd478833674e7ecea', 53, 1, 'MyApp', '[]', 0, '2021-12-08 12:12:25', '2021-12-08 12:12:25', '2022-12-08 13:12:25'),
('2e0972a691bbec75c792edb4719b74258d516e4c5ee0c5954434cc8cc6b1ebfcdeb51bfdbaca50f7', 54, 1, 'MyApp', '[]', 0, '2021-12-08 12:30:36', '2021-12-08 12:30:36', '2022-12-08 13:30:36'),
('8a7d7f865ccc6172d78d847e0dddbef24cec9e30fc99a1b23c2a392936a92a0bc547b9515c08151a', 55, 1, 'MyApp', '[]', 0, '2021-12-08 12:44:52', '2021-12-08 12:44:52', '2022-12-08 13:44:52'),
('13ce5c12d5ed9ad8a411def1eabebfdccf41b01c252db8001f4a9439f3c1f453da3bd01965f4e6e7', 56, 1, 'MyApp', '[]', 0, '2021-12-10 04:25:55', '2021-12-10 04:25:55', '2022-12-10 05:25:55'),
('7313c8146147a29033e8952af3d69c2da66ac9579b5422b191c4aa9d03331057a3447528520fb48d', 57, 1, 'MyApp', '[]', 0, '2021-12-10 04:30:00', '2021-12-10 04:30:00', '2022-12-10 05:30:00'),
('77bb08c29d9122fb20f00ed986eccbb5fac5b14a4efe40586c8d237e49fa6eb972fe952290d05471', 58, 1, 'MyApp', '[]', 0, '2021-12-10 04:59:19', '2021-12-10 04:59:19', '2022-12-10 05:59:19'),
('712dd5f20484a7c42eaef55a3b24c89c25005bd3b60bcc1569ac4f5dfe9c893f9777ef38825d5499', 58, 1, 'MyApp', '[]', 0, '2021-12-21 11:45:24', '2021-12-21 11:45:24', '2022-12-21 12:45:24'),
('81c12e227a65a466b56e6874512ae317b1aa9261f4a312769e6f967ae479e16f72933326ac90c3f6', 59, 1, 'MyApp', '[]', 0, '2021-12-28 04:23:01', '2021-12-28 04:23:01', '2022-12-28 05:23:01'),
('515c5aaa10a77073c96662fa0fff9c14c2cd0f24793e2e7a420779754f8cc81ab6a4fa65d91495a0', 59, 1, 'MyApp', '[]', 0, '2021-12-28 04:23:10', '2021-12-28 04:23:10', '2022-12-28 05:23:10'),
('d14ae9d219bf845af2eeb1b73b705cd713d98f2bb2e76c38ec58312e9b44f817db98fbd804fbc137', 60, 1, 'MyApp', '[]', 0, '2021-12-28 05:36:22', '2021-12-28 05:36:22', '2022-12-28 06:36:22'),
('d60cf6662b104f000fcbd65c5db850efccbcc531acc8ae189ca9bf698d10472a08ca2413eaccc197', 59, 1, 'MyApp', '[]', 0, '2021-12-28 10:43:08', '2021-12-28 10:43:08', '2022-12-28 11:43:08'),
('5b93f70e217ab424a78ba328f31aa11e80bc3ea8b7e6c8d7820e33a301a173c02ef6ed9b944a9f85', 59, 1, 'MyApp', '[]', 0, '2021-12-28 10:43:19', '2021-12-28 10:43:19', '2022-12-28 11:43:19'),
('b1433a8d0761bb371601f7b422dff0f0c405dc916a5945ea55b708125e1e8a3c94d44eeb8142a346', 59, 1, 'MyApp', '[]', 0, '2021-12-29 03:57:28', '2021-12-29 03:57:28', '2022-12-29 04:57:28'),
('65c5e2772628fcb5a8ea24e9c175474237e66d427e441bf4cff950e1f5279c01e83649b7cefccc6b', 61, 1, 'MyApp', '[]', 0, '2021-12-29 04:23:29', '2021-12-29 04:23:29', '2022-12-29 05:23:29'),
('782d0f315f4673f5d9aef121a087968624b53f7957ee74d59acb9d9835925f7efff7d81fafe39570', 62, 1, 'MyApp', '[]', 0, '2021-12-29 04:26:46', '2021-12-29 04:26:46', '2022-12-29 05:26:46'),
('8550c6709fe28492439978ecc0f3b178ea8a0a90fc034bd78a431989e81ac4c8468f8f0e61d1961f', 63, 1, 'MyApp', '[]', 0, '2021-12-29 04:34:22', '2021-12-29 04:34:22', '2022-12-29 05:34:22'),
('545a6dadaee2101a7542d3699438c65cc8f963c29f8d74136fc3c0b2ae7e018247f9d953438ecaf9', 59, 1, 'MyApp', '[]', 0, '2021-12-29 04:49:08', '2021-12-29 04:49:08', '2022-12-29 05:49:08'),
('d2fb394f220ace5ced202c22147af5f6bf2ff08677344f95b7b7e5b85a1ef5c2e74877ba0e09ca85', 59, 1, 'MyApp', '[]', 0, '2021-12-29 04:49:41', '2021-12-29 04:49:41', '2022-12-29 05:49:41'),
('47f2c9d7010391bef2cf36073a3c02b40fca1fec67072cefec7172f3f8439496449a3e1f9d736b6b', 60, 1, 'MyApp', '[]', 0, '2021-12-29 04:56:28', '2021-12-29 04:56:28', '2022-12-29 05:56:28'),
('a4cc17c7e43b8ea6d2927af9f4509c430e50a9644984893837483d8d7cab7abb22ee48dacbc0ec18', 60, 1, 'MyApp', '[]', 0, '2021-12-29 04:57:58', '2021-12-29 04:57:58', '2022-12-29 05:57:58'),
('cb99da87ba7a89366e47b1854a1ee3941a01ed7cca064acd77a37eabf29ab79e2635ab5db00ede67', 60, 1, 'MyApp', '[]', 0, '2021-12-29 04:58:56', '2021-12-29 04:58:56', '2022-12-29 05:58:56'),
('8ba13d48938c3baec990fed6af5e83977b73df0ecd0905e550d45ca8b8e7d3955a8246a6b7960b48', 60, 1, 'MyApp', '[]', 0, '2021-12-29 04:59:22', '2021-12-29 04:59:22', '2022-12-29 05:59:22'),
('6277d87490f423a45e9d036ae87904f2a461a0b3c0e29dda8258cee8a4bf8c179598079889027380', 1, 1, 'MyApp', '[]', 0, '2021-12-29 07:04:04', '2021-12-29 07:04:04', '2022-12-29 08:04:04'),
('bb0797cdcbf0d967d4cac202a4e526c5e0af7636e80bf75a2c61c50576a1aa4b4e1912684ea0113c', 2, 1, 'MyApp', '[]', 0, '2021-12-29 09:16:37', '2021-12-29 09:16:37', '2022-12-29 10:16:37'),
('0e784477c986a49e56e668837a22ea8131197f844be9d8f77ff127b38d5a7151d44ac5093aa8648e', 2, 1, 'MyApp', '[]', 0, '2021-12-29 11:16:57', '2021-12-29 11:16:57', '2022-12-29 12:16:57'),
('53b1e147d9b2b74569fde379faa5387b4e582245346e03d13ff23f0d74a73fe19b99d7749f2c0ccb', 3, 1, 'MyApp', '[]', 0, '2021-12-29 11:37:30', '2021-12-29 11:37:30', '2022-12-29 12:37:30'),
('2d8c1d6a801b84dd3e4ddb12c125232a575c8dfac3aca3b944356515726b397aab2810bd76d7ef4d', 4, 1, 'MyApp', '[]', 0, '2021-12-30 10:08:54', '2021-12-30 10:08:54', '2022-12-30 11:08:54'),
('44b60e0d6fb9dcae2d2dee175d7e08f4c8d6ed74e6e1710a5dae0cb4f96aacb8b3e48ab00c2bc8c3', 5, 1, 'MyApp', '[]', 0, '2021-12-30 10:12:58', '2021-12-30 10:12:58', '2022-12-30 11:12:58'),
('bcbfd16fe697bc19d8187baec5597719c6911ef320f34df6ba34b22f0ce3404a89788bf2e606c4d3', 5, 1, 'MyApp', '[]', 0, '2021-12-30 10:16:42', '2021-12-30 10:16:42', '2022-12-30 11:16:42'),
('a01822f8de0d40d73a6f0328a5a4ef54048b326fc9b1d796b309697e2f224a2e2c246b16818c2a1c', 5, 1, 'MyApp', '[]', 0, '2021-12-30 10:17:27', '2021-12-30 10:17:27', '2022-12-30 11:17:27'),
('a023e8f62d5edaaf2d536d562d66abd08d6f84b0ec9c84dc0aa577d11e064ca5e9114ebeca38333e', 5, 1, 'MyApp', '[]', 0, '2021-12-30 10:17:36', '2021-12-30 10:17:36', '2022-12-30 11:17:36'),
('f07b8186c673d28be6c0798b9db1b3626ad04ed4e463339769d28f909f054248c79e8d30fd24a0f6', 5, 1, 'MyApp', '[]', 0, '2021-12-30 10:17:43', '2021-12-30 10:17:43', '2022-12-30 11:17:43'),
('75f2ad7353dd9f03fe3f0027f7c3d70e284ab8d328136f864f2240b381a2569b47769bda3dc9b68d', 5, 1, 'MyApp', '[]', 0, '2021-12-30 10:18:13', '2021-12-30 10:18:13', '2022-12-30 11:18:13'),
('e660caf8aa1a399de600953a5234c742ea131dfe5db392647584cc8b8259b72ae719107ddb23929c', 5, 1, 'MyApp', '[]', 0, '2021-12-30 10:18:30', '2021-12-30 10:18:30', '2022-12-30 11:18:30'),
('18d48c19bd300e66c8d4ef8a37197a3b40274379115f4858cf40f311581f42b607696a36e60cbb10', 5, 1, 'MyApp', '[]', 0, '2021-12-30 10:20:17', '2021-12-30 10:20:17', '2022-12-30 11:20:17'),
('f89490dfa621df4a351ccfd3c8160b61a18ec05af23366807b64ac506313fd133f83e8c14f42cce7', 10, 1, 'MyApp', '[]', 0, '2022-01-14 04:57:45', '2022-01-14 04:57:45', '2023-01-14 05:57:45'),
('2bbfa33f1819e722becd2d21cdfa859ab5b6796c69200bbfefc70aa938d2975a421ded86c68fa0b5', 11, 1, 'MyApp', '[]', 0, '2022-01-14 05:01:42', '2022-01-14 05:01:42', '2023-01-14 06:01:42'),
('91be273a6bb0541b214798cd004d9922e6e6ae74a20b217a57b99eeeedad9aa27bbe18cf1115fb57', 11, 1, 'MyApp', '[]', 0, '2022-01-14 05:10:15', '2022-01-14 05:10:15', '2023-01-14 06:10:15'),
('92207dc1ffa7978d1013a7e80a64e2b433ae495b2ffdfd78b4370f91426374d018b72ee4c18070f2', 12, 1, 'MyApp', '[]', 0, '2022-01-14 05:13:55', '2022-01-14 05:13:55', '2023-01-14 06:13:55'),
('2242550353134699a097749b18d112c551b90a750737c12b89b3b9a6d25eb3b28800b73a2eed402b', 11, 1, 'MyApp', '[]', 0, '2022-01-14 05:52:40', '2022-01-14 05:52:40', '2023-01-14 06:52:40'),
('7076f82eb49691eb78b24e5c005d431fed46219338b04ff96e5dd57d0d05ee8a604c60ddb0e7e5fb', 11, 1, 'MyApp', '[]', 0, '2022-01-14 06:06:55', '2022-01-14 06:06:55', '2023-01-14 07:06:55'),
('b3293856cd71dea161035c1d75c9e6ffe2c5727daba06180ac70089db135745ce18da7f530bf87ad', 11, 1, 'MyApp', '[]', 0, '2022-01-14 06:09:42', '2022-01-14 06:09:42', '2023-01-14 07:09:42'),
('69f6fa344c7c5f75e85906b37f5c6b2f2ba47dba2d19b881b1e5bb24f1af1a609cc34cff37d4309c', 13, 1, 'MyApp', '[]', 0, '2022-01-14 06:55:08', '2022-01-14 06:55:08', '2023-01-14 07:55:08'),
('bba0ccf2825eb47ba3d96882d37ebd53a90f4d5a0dee481ac4d616b5337b6489389f743decadce66', 14, 1, 'MyApp', '[]', 0, '2022-01-14 07:06:37', '2022-01-14 07:06:37', '2023-01-14 08:06:37'),
('b69ecfae9776b4b5bfc64b28223875d27a79d34be30caa0ae80ae6dc2591095efbf6f631d91b9f0b', 15, 1, 'MyApp', '[]', 0, '2022-01-14 07:08:13', '2022-01-14 07:08:13', '2023-01-14 08:08:13'),
('0b65fc051353020df7580403d3bd3bfcde190f6227d1ad107ba1dd5ebd1da71da81de1fe72fe0df4', 11, 1, 'MyApp', '[]', 0, '2022-01-14 07:11:12', '2022-01-14 07:11:12', '2023-01-14 08:11:12'),
('7243c067bc467865847a3988919869c5ec3487f95f0b53512940630bc19145ecf98b32ffc12e957f', 11, 1, 'MyApp', '[]', 0, '2022-01-14 07:15:45', '2022-01-14 07:15:45', '2023-01-14 08:15:45'),
('cd84ac4b4d51c9ac558e8dffa284b4276b47a35c00d5470cfde7757ba304fc44b6b6d741be22744b', 1, 1, 'MyApp', '[]', 0, '2022-01-14 07:16:33', '2022-01-14 07:16:33', '2023-01-14 08:16:33'),
('4798bc8bf0c6692d101554589cb3db27eb709ca5abd84f8161e840fb54ce34c32687ebbeb7b130fd', 1, 1, 'MyApp', '[]', 0, '2022-01-14 07:19:22', '2022-01-14 07:19:22', '2023-01-14 08:19:22'),
('4e31a0a8635b72c09ee327b393d19283e92ecebb99090a44f00cfc47468e2350240a243f95ba8f84', 16, 1, 'MyApp', '[]', 0, '2022-01-14 07:22:41', '2022-01-14 07:22:41', '2023-01-14 08:22:41'),
('5136faebdff72b968b1d53bb3eb6a9e2b94e628aeba36cc1d3b429c5a512674018bee1d3d9386efa', 12, 1, 'MyApp', '[]', 0, '2022-01-14 07:28:36', '2022-01-14 07:28:36', '2023-01-14 08:28:36'),
('7a79b12f1f1a750cff48ebead165f6d75aa9432a0623eafe2badebfe329a05b2fa4e6e4e0aa68801', 12, 1, 'MyApp', '[]', 0, '2022-01-14 08:35:26', '2022-01-14 08:35:26', '2023-01-14 09:35:26'),
('6daed31f1518122676967eee3ddebd7a98c46f04d2c29fb4f0fda46e833e1dfc7f2704d79a3a7a0f', 17, 1, 'MyApp', '[]', 0, '2022-01-14 08:54:19', '2022-01-14 08:54:19', '2023-01-14 09:54:19'),
('7e053503f46ab3cc2c71eee152e0148a53f02ba64ac2dfc796e8bf8038581a5bf54cec84fee3c75d', 18, 1, 'MyApp', '[]', 0, '2022-01-14 09:44:37', '2022-01-14 09:44:37', '2023-01-14 10:44:37'),
('c465c94b450d9dac2a386723be4b4c4a1c564da7164545c474d6944133a0c0fc5fecf6e397f0f3ae', 22, 1, 'MyApp', '[]', 0, '2022-01-14 09:44:37', '2022-01-14 09:44:37', '2023-01-14 10:44:37'),
('31c174388a418851f7b1c957868b8c4b01004b870f49115012b98749286117be90558968e590d73f', 19, 1, 'MyApp', '[]', 0, '2022-01-14 09:44:37', '2022-01-14 09:44:37', '2023-01-14 10:44:37'),
('1c3a45e15a7a6ddb8ed774da252458b249dfd951476bcf4da32c6cd7acc98809065dd3cdca624deb', 20, 1, 'MyApp', '[]', 0, '2022-01-14 09:44:37', '2022-01-14 09:44:37', '2023-01-14 10:44:37'),
('6bd3575e3ad6c4d4239fea61e775401cc69c2fd9be052b003dc18253ad79343f92a682e178d5015c', 21, 1, 'MyApp', '[]', 0, '2022-01-14 09:44:37', '2022-01-14 09:44:37', '2023-01-14 10:44:37'),
('00cf147de0175a5bca7e4b03bdde17fe1a43debba6b40523989c1cef8b42dfba5e61268cb6e96e6d', 23, 1, 'MyApp', '[]', 0, '2022-01-14 09:44:37', '2022-01-14 09:44:37', '2023-01-14 10:44:37'),
('137b50d4f0f3916a7a881efd0dcf9862581b0b09c29e6426e53dad33e84903105cd43c6f4ebd1cac', 24, 1, 'MyApp', '[]', 0, '2022-01-14 10:06:24', '2022-01-14 10:06:24', '2023-01-14 11:06:24'),
('7ae99fcde43153d93c2ea3fa0b7a7094722d97269037882f5119114befb34aafacfe4540a388e677', 25, 1, 'MyApp', '[]', 0, '2022-01-14 10:15:32', '2022-01-14 10:15:32', '2023-01-14 11:15:32'),
('0bc6c6f6d27d8f760f5c2fdf968f9c77a2b0e09db170aa6594fe874fa7e3f9ad9e3275b5d3cc9ab4', 26, 1, 'MyApp', '[]', 0, '2022-01-14 10:18:43', '2022-01-14 10:18:43', '2023-01-14 11:18:43'),
('7a803d2c3a31986557877650365b08af80e961c679680692e4e7401eb282a9b7e134b9426113bff2', 27, 1, 'MyApp', '[]', 0, '2022-01-14 10:26:37', '2022-01-14 10:26:37', '2023-01-14 11:26:37'),
('e4275185ab6e39c61068726ac3df27474f1295d510330ce29e6ba59c9833ec785406fe32808c28b3', 28, 1, 'MyApp', '[]', 0, '2022-01-14 10:59:38', '2022-01-14 10:59:38', '2023-01-14 11:59:38'),
('7e649106e444eded54cf3673ff371e955c35783b7312b94239597e360b3050e9223cb4bf85d90d24', 29, 1, 'MyApp', '[]', 0, '2022-01-14 10:59:38', '2022-01-14 10:59:38', '2023-01-14 11:59:38'),
('27e00b792af93daf7fb101fe8e60c02b87c82d342d9adea4c95b0ff0bf3c256ae08e6835a7cc7f97', 30, 1, 'MyApp', '[]', 0, '2022-01-14 12:44:45', '2022-01-14 12:44:45', '2023-01-14 13:44:45'),
('f9803819fe53037937882ede339e0ab0ccfceb147fc00791526bf092cd6993dd29eb410d88259c39', 30, 1, 'MyApp', '[]', 0, '2022-01-14 12:46:18', '2022-01-14 12:46:18', '2023-01-14 13:46:18'),
('1cf62ef3cf6c7fe3e896580b2467a970ac8d8bcc4d74a4144e420272f14772c36ed60e9e15a08ba5', 30, 1, 'MyApp', '[]', 0, '2022-01-14 12:49:53', '2022-01-14 12:49:53', '2023-01-14 13:49:53'),
('1696f36e89a6267934727a2143d8567d7778ac6e554656d53ab53c6f1ee39eca02739373880aa854', 1, 1, 'MyApp', '[]', 0, '2022-01-18 05:48:04', '2022-01-18 05:48:04', '2023-01-18 06:48:04'),
('37190a62752e9d3fd48c4cfda2a9accee6fcc57523ead6892444483f9f95a2a10de59b442e3ff6b2', 33, 1, 'MyApp', '[]', 0, '2022-01-18 06:29:11', '2022-01-18 06:29:11', '2023-01-18 07:29:11'),
('d0c0b81bd1433a5a0866369a211528b4c59fbfa7f72e6d6b48a9f7513144a6d003bc20a1b67062b8', 34, 1, 'MyApp', '[]', 0, '2022-01-18 07:06:10', '2022-01-18 07:06:10', '2023-01-18 08:06:10'),
('064dfccc9db1f1a2b098af2b17ad9c5d453efc7b2e4ded889cdbc58b09c633ab85eba2e153769462', 36, 1, 'MyApp', '[]', 1, '2022-01-18 10:42:39', '2022-01-18 10:42:39', '2023-01-18 11:42:39'),
('1ec31965a7d94088ef3360eb4a9883be167a4102cb052500a1daaaf7e0a67686fb845c8aca7483f8', 38, 1, 'MyApp', '[]', 0, '2022-01-18 13:06:22', '2022-01-18 13:06:22', '2023-01-18 14:06:22'),
('7ec3faa8cc335475f1636d6512d0fe937f1b4b557254e056b1ed963519984984ea37a32a428907bf', 38, 1, 'MyApp', '[]', 0, '2022-01-18 13:07:48', '2022-01-18 13:07:48', '2023-01-18 14:07:48'),
('20302cc1718947368ea65c077704a3258c351e12892e248f337df3c4de11075e1d98b409431b1de0', 39, 1, 'MyApp', '[]', 0, '2022-01-19 03:52:35', '2022-01-19 03:52:35', '2023-01-19 04:52:35'),
('0c09defed6514294fe7f5673d5fd2c3b0bc620cdb9e3a6134fac7288452d4f16530c25f93551ae77', 39, 1, 'MyApp', '[]', 0, '2022-01-19 03:53:20', '2022-01-19 03:53:20', '2023-01-19 04:53:20'),
('b0fe5a67c18fc7d00ca2215ae9dce2c638faee6398b1bf9e09777dc541b6ab481724b94d658164d0', 40, 1, 'MyApp', '[]', 0, '2022-01-19 04:15:26', '2022-01-19 04:15:26', '2023-01-19 05:15:26'),
('774a2200a3b1eadbcbcd10ef5886af235538271b6d11a155970d5b67729e47e4ebc65ec734a45752', 41, 1, 'MyApp', '[]', 0, '2022-01-19 06:04:27', '2022-01-19 06:04:27', '2023-01-19 07:04:27'),
('20ff982c5e01c4d9b767b7c3e0746d94c10a777f3770e34911668c59705f0a8724cbcd1b501ebb77', 41, 1, 'MyApp', '[]', 0, '2022-01-19 07:04:56', '2022-01-19 07:04:56', '2023-01-19 08:04:56'),
('d4f875de83ec3ba4cb17dce1a5d65d5c1b9f2ab906d5585f873db26c1809ee2a7cbd3ae1f0a1296d', 41, 1, 'MyApp', '[]', 0, '2022-01-19 09:58:28', '2022-01-19 09:58:28', '2023-01-19 10:58:28'),
('5c5899d409f6cd30c4874a491c0f454b12c5d798c0f9b8bfba76384a621035e0da70886d052f7b68', 41, 1, 'MyApp', '[]', 0, '2022-01-19 09:58:28', '2022-01-19 09:58:28', '2023-01-19 10:58:28'),
('35ea7bf4c20a0929748f82a0a8015b6c31bd528dae92343565ffc19a0a973ae9a4fb7bccb8ccff0b', 41, 1, 'MyApp', '[]', 0, '2022-01-19 10:00:57', '2022-01-19 10:00:57', '2023-01-19 11:00:57'),
('4fc78cec37d77cab18b56bfb48368c2dbbf3ff06332ae2f0c027c32b858bc8d636fa24d098b148df', 41, 1, 'MyApp', '[]', 0, '2022-01-19 10:02:02', '2022-01-19 10:02:02', '2023-01-19 11:02:02'),
('e457d4e0243344644042e71b537f08698b42f18f32893a445346101491e868c48cca772829688c27', 41, 1, 'MyApp', '[]', 0, '2022-01-19 10:03:49', '2022-01-19 10:03:49', '2023-01-19 11:03:49'),
('e9e77b480e22264fffd7783b4dd175cd547dfdf8325b347d0f51ca6f2f4d8e78df7b982111777b1d', 42, 1, 'MyApp', '[]', 1, '2022-01-20 06:57:03', '2022-01-20 06:57:03', '2023-01-20 07:57:03'),
('76a2c58c12b3fbb9d74d5a7aaeefec5994ec2b1a6dd9f650804bba9c0e44a1c093240e7a81f4d0b7', 42, 1, 'MyApp', '[]', 0, '2022-01-20 07:02:26', '2022-01-20 07:02:26', '2023-01-20 08:02:26'),
('49aaee965018f0850d380b7046a6fb74421a54ea889803d23112ac4f46e963d3e13c3b2f485c3263', 43, 1, 'MyApp', '[]', 1, '2022-01-20 07:06:23', '2022-01-20 07:06:23', '2023-01-20 08:06:23'),
('117ea9c649334c9f80852cf22f29dcd1f2cc500a3827008e5f879b26045d02d842704065fbfca630', 43, 1, 'MyApp', '[]', 0, '2022-01-20 07:09:10', '2022-01-20 07:09:10', '2023-01-20 08:09:10'),
('1bcabf514eeb895f5bc5b018895d7ab0761ed41c613fe4928f45f958317157b77a0abec513f8a818', 44, 1, 'MyApp', '[]', 0, '2022-01-20 07:19:52', '2022-01-20 07:19:52', '2023-01-20 08:19:52'),
('e546bb0aa9838f13e7696cc6e09c2006133c5cabce07792aa5aef206e272f114a490a9811db07637', 45, 1, 'MyApp', '[]', 1, '2022-01-20 07:25:38', '2022-01-20 07:25:38', '2023-01-20 08:25:38'),
('a934944caf7ca458a000f8b0233b04d199bc55f26d1867655af5ac1eb4d39043791c944b1e006c33', 46, 1, 'MyApp', '[]', 1, '2022-01-20 07:32:22', '2022-01-20 07:32:22', '2023-01-20 08:32:22'),
('4e4c3fe3753c053064bcd5b787fbf515d4ec851412ef88e05db9137996c795c23909f4a1f21977cd', 47, 1, 'MyApp', '[]', 1, '2022-01-20 08:40:08', '2022-01-20 08:40:08', '2023-01-20 09:40:08'),
('f7f6b3a65e206618e8e5844a7258b6f5cda5bf3eb0e1cce7b19c1e96f3b84b50196f6e5c41268a8d', 49, 1, 'MyApp', '[]', 1, '2022-01-20 08:51:12', '2022-01-20 08:51:12', '2023-01-20 09:51:12'),
('527050e01acf957a9d2ce51807b5eced6091d7bea71e2adcea32c160e378cff2b7b5b0a6f68bd7f6', 1, 1, 'MyApp', '[]', 1, '2022-01-20 08:58:40', '2022-01-20 08:58:40', '2023-01-20 09:58:40'),
('ea33e01edcacad77a3c01f28ee1873a1c7937b10aa4862aa525ee1e5cc8796359e457269a53b8261', 49, 1, 'MyApp', '[]', 0, '2022-01-20 08:59:14', '2022-01-20 08:59:14', '2023-01-20 09:59:14'),
('b258e61b928e2f614e958790b628d0212cd4bb071531cf85183db6ff80f2a6c69a13782ce6178152', 50, 1, 'MyApp', '[]', 1, '2022-01-20 09:05:25', '2022-01-20 09:05:25', '2023-01-20 10:05:25'),
('6ceaecea098ca91807843827337f7ba3af2d42118d465cef2e974db0674d59d0f869ab452b505372', 50, 1, 'MyApp', '[]', 0, '2022-01-20 09:07:37', '2022-01-20 09:07:37', '2023-01-20 10:07:37'),
('a07e192f61e4cb1dd04344f46e26a8cabb544df30a9eba52173fc7e1902d3c335a55807a203b0a20', 50, 1, 'MyApp', '[]', 0, '2022-01-20 09:10:45', '2022-01-20 09:10:45', '2023-01-20 10:10:45'),
('1d829cb2b4180b71b0e9a45d22de02b8c2557bd5090c32c1d8b2c03a9c922007d93521d1d6c1093a', 53, 1, 'MyApp', '[]', 1, '2022-01-20 09:22:29', '2022-01-20 09:22:29', '2023-01-20 10:22:29'),
('89404c8528ca73bcdb66ab08fcd76997f06dc310ce58bd0686905a52aa5296a28597eb79f905bf1e', 54, 1, 'MyApp', '[]', 1, '2022-01-20 09:42:27', '2022-01-20 09:42:27', '2023-01-20 10:42:27'),
('f1ced83a271bb108b9253ee2f324ee1cdf9eec5c0435a0b7cd4abac90901a2e2294dd5e217d93caf', 54, 1, 'MyApp', '[]', 0, '2022-01-20 09:44:46', '2022-01-20 09:44:46', '2023-01-20 10:44:46'),
('0b42774b230bf1d0a655ac10a9b7926fa02bf3c4d46c2417b232faa5511e7e72d2067038f4b3c6b2', 54, 1, 'MyApp', '[]', 0, '2022-01-20 09:52:10', '2022-01-20 09:52:10', '2023-01-20 10:52:10'),
('a6b2925c08b14f376066a340f2b9533d21adf3bba8f82a02e20f5e9745df93ea30d423608a1d05fd', 54, 1, 'MyApp', '[]', 0, '2022-01-20 09:56:41', '2022-01-20 09:56:41', '2023-01-20 10:56:41'),
('182e8120622d239cb292577d46ea86067ec74bd26f41cf8c4b0a0d660be574d76d9d7923eef8a52b', 54, 1, 'MyApp', '[]', 0, '2022-01-20 10:01:33', '2022-01-20 10:01:33', '2023-01-20 11:01:33'),
('15af062257a65e8e5703971bc334c2f7cb22df76d90101b25855002849352d608122b69ba1549906', 54, 1, 'MyApp', '[]', 0, '2022-01-20 10:04:51', '2022-01-20 10:04:51', '2023-01-20 11:04:51'),
('2c45c0caaea1eb25c338b118efa4b181dbd1c8cdb6412c512dcd87ad6628947ef36e8c8883983e71', 54, 1, 'MyApp', '[]', 0, '2022-01-20 10:06:47', '2022-01-20 10:06:47', '2023-01-20 11:06:47'),
('8f105d08c5b71089fbbbd5f1adb559fb748ed37790754d20b514bae8f354bed254d55cf2cf511c36', 54, 1, 'MyApp', '[]', 0, '2022-01-20 10:14:09', '2022-01-20 10:14:09', '2023-01-20 11:14:09'),
('abe213daca8016455c51fdc8360add3e8b51df4b37b74ee4fcd639aaeebf4dffb974c70f5462af73', 54, 1, 'MyApp', '[]', 0, '2022-01-20 10:17:39', '2022-01-20 10:17:39', '2023-01-20 11:17:39'),
('1062f44c2316025012743d257bc517a8aa015a4d55e95267feeccbcead9015763059164aaba321c8', 54, 1, 'MyApp', '[]', 0, '2022-01-20 10:21:06', '2022-01-20 10:21:06', '2023-01-20 11:21:06'),
('e7d6e23e5f0e2ba166a32fb55a80e1002bb4865307da15072855eb321e1d8661fd308b981e2ec620', 1, 1, 'MyApp', '[]', 1, '2022-01-20 10:21:38', '2022-01-20 10:21:38', '2023-01-20 11:21:38'),
('d3ed6eeb44689a0a9a183b60fde90c8c3cccbdcc516b4347f503a74f875ec0d12e41e56214ffdd31', 1, 1, 'MyApp', '[]', 0, '2022-01-20 10:22:53', '2022-01-20 10:22:53', '2023-01-20 11:22:53'),
('e5ecf2e97ae930bda003d1918e8efcbcc6790eb3842c087732f022b99a13a7395a22dc3f7857d31f', 1, 1, 'MyApp', '[]', 1, '2022-01-20 10:23:23', '2022-01-20 10:23:23', '2023-01-20 11:23:23'),
('685c1522a43d172094ea51a5df81b052d12e40f3b3eb8b2da057012480c4d8e87c1677e4d87f7b21', 1, 1, 'MyApp', '[]', 1, '2022-01-20 10:23:54', '2022-01-20 10:23:54', '2023-01-20 11:23:54'),
('99be466cea2884a085cafbe9d32c7dbb82645ee6332b01ef8b3974f827b425c7cc179635f8af868f', 55, 1, 'MyApp', '[]', 1, '2022-01-20 10:29:02', '2022-01-20 10:29:02', '2023-01-20 11:29:02'),
('5c0d2bb4755146c9c19f7be125219a5bf8e7df6652baf98b75d1f316b9a9f93aa36eef18b2b70b2c', 55, 1, 'MyApp', '[]', 0, '2022-01-20 10:30:43', '2022-01-20 10:30:43', '2023-01-20 11:30:43'),
('7abc7e0cd8a5709e5a5a20a05f2c02aa769705485570142450e4c09ed1ef02d6d04da094f5f56a72', 57, 1, 'MyApp', '[]', 1, '2022-01-20 10:38:59', '2022-01-20 10:38:59', '2023-01-20 11:38:59'),
('bfb65f34ce2b9a2c13f08cac2e392b939d4a5a1c3ea9d6c936eeab09a69e2c2e9ace5aec1cc6ee0d', 56, 1, 'MyApp', '[]', 0, '2022-01-20 10:38:59', '2022-01-20 10:38:59', '2023-01-20 11:38:59'),
('8a6b7cbc701cf40eb682c90cd6b4c2b87a9a781dd9bcc94b3914c7a450bfab2df111f38cccfa72d0', 58, 1, 'MyApp', '[]', 1, '2022-01-20 10:43:52', '2022-01-20 10:43:52', '2023-01-20 11:43:52'),
('87019edab0d41e0f3c9138e34b760b951f072a89228aa213c3bb3ffcea403f34b3ae17188e10e746', 59, 1, 'MyApp', '[]', 1, '2022-01-20 10:52:52', '2022-01-20 10:52:52', '2023-01-20 11:52:52'),
('13b5f0447e1def861f24a1da2a098e0c13024eb4767cb3932ec277c2971b7b7281ecd0966e77f40b', 60, 1, 'MyApp', '[]', 1, '2022-01-20 11:03:51', '2022-01-20 11:03:51', '2023-01-20 12:03:51'),
('d6ead6d3865aa7206764fd8e5640ef92cd37502e08f4eb692201c5359ebf9dcf5ce38340e6699464', 60, 1, 'MyApp', '[]', 0, '2022-01-20 11:11:25', '2022-01-20 11:11:25', '2023-01-20 12:11:25'),
('410f11bd58b7e66106f40503061e66267142480c5737a57ebde8ce162be90c9c5be9cf1cc3f399d8', 60, 1, 'MyApp', '[]', 0, '2022-01-20 11:14:20', '2022-01-20 11:14:20', '2023-01-20 12:14:20'),
('e353fb544fcf3aaa18a0ae8a1c898e4025893d14d27fcad68c3863bb67eb0c4813b911405910c062', 63, 1, 'MyApp', '[]', 1, '2022-01-20 11:27:48', '2022-01-20 11:27:48', '2023-01-20 12:27:48'),
('32d4eca987b2d99a835544a48a99f25a9b4270a866a9a96bac2b78bb865cd836171086d75166cd27', 63, 1, 'MyApp', '[]', 0, '2022-01-20 11:28:56', '2022-01-20 11:28:56', '2023-01-20 12:28:56'),
('dc52a45bf8171e5606aa6d8dca46231f7c67dab2c6ce2a76e897ffb08da645f84842cd95e4072495', 67, 1, 'MyApp', '[]', 1, '2022-01-20 11:32:59', '2022-01-20 11:32:59', '2023-01-20 12:32:59'),
('36c1fb4becd690df5c0def6afccddfa3d20a80781835410ce02a705c72956c76e0be11bc1eec9858', 67, 1, 'MyApp', '[]', 0, '2022-01-20 11:35:14', '2022-01-20 11:35:14', '2023-01-20 12:35:14'),
('2dbe196f40dcb5494961d5d16b87293d9f3368a72cbcc8ea78055dd1c0624e6c1ac6f3090f40fe70', 69, 1, 'MyApp', '[]', 0, '2022-01-20 12:01:08', '2022-01-20 12:01:08', '2023-01-20 13:01:08'),
('f7d74936bafaa6e4a44bbda5105138aff33e69124cf89257b3b7aedfad1c77981a10c50b54e9c4af', 70, 1, 'MyApp', '[]', 1, '2022-01-20 12:28:24', '2022-01-20 12:28:24', '2023-01-20 13:28:24'),
('2ec9854a44a4abbef72caccac8254840f28fac7f9b41715b6c1c28b2de0705f687d59a719a454982', 70, 1, 'MyApp', '[]', 0, '2022-01-20 12:34:55', '2022-01-20 12:34:55', '2023-01-20 13:34:55'),
('35482f6a92fe992baa1170bb26fade34dd185c4f5e11999f6bc6bfcdc4863aee7f415e1809ea463d', 70, 1, 'MyApp', '[]', 0, '2022-01-20 12:42:27', '2022-01-20 12:42:27', '2023-01-20 13:42:27'),
('e9e854acb623a260dcf463f295cb5a0d771c0db9f25bf977412f083a66398028b09be90200e59687', 71, 1, 'MyApp', '[]', 0, '2022-01-20 12:46:09', '2022-01-20 12:46:09', '2023-01-20 13:46:09'),
('1e52b02bd8d3002b31d7f4ae9ae5600edd4abe86daa8f8bc7d564e9687b40c44568d243623cbb35f', 72, 1, 'MyApp', '[]', 1, '2022-01-20 12:49:25', '2022-01-20 12:49:25', '2023-01-20 13:49:25'),
('a187474b155098dc3aeefbcb104883d34a7f0b06686a149cc96c9812f7c5c50313afbeb47179bcbf', 72, 1, 'MyApp', '[]', 0, '2022-01-20 12:53:33', '2022-01-20 12:53:33', '2023-01-20 13:53:33'),
('38a283c8113f65279dadb5915494c01526b205479773df1231fc3789e31dea132f29c3499d64ec74', 72, 1, 'MyApp', '[]', 0, '2022-01-20 13:01:54', '2022-01-20 13:01:54', '2023-01-20 14:01:54'),
('5ed44748c87914a07c6fa537585dbca317f1962520cc43cf92ef986843a4d8dc58be2578f08c7331', 72, 1, 'MyApp', '[]', 0, '2022-01-21 03:35:11', '2022-01-21 03:35:11', '2023-01-21 04:35:11'),
('1c67a073ba7e20fbc6d2f85062d72e00a98f8a84f6a5c5d3b964d5e99951323021a4cffba5e4eb11', 73, 1, 'MyApp', '[]', 0, '2022-01-21 05:09:29', '2022-01-21 05:09:29', '2023-01-21 06:09:29'),
('16ffcc35797542246b20998544bc8c2941df59b57087b58823979453892244c85b7fea4230270b33', 74, 1, 'MyApp', '[]', 1, '2022-01-21 11:03:44', '2022-01-21 11:03:44', '2023-01-21 12:03:44'),
('a7251cc06d41399795f127bb4e614451d6683e062edac39a0bcb86df534bc9e616a1f85d25fcfcbb', 74, 1, 'MyApp', '[]', 0, '2022-01-21 11:10:58', '2022-01-21 11:10:58', '2023-01-21 12:10:58'),
('578acf6fdb432758e57fc01afb9cf8aabc035d8c2b651ceea39cc9e60dd541d3fdf08f30180b0743', 74, 1, 'MyApp', '[]', 0, '2022-01-21 11:10:58', '2022-01-21 11:10:58', '2023-01-21 12:10:58'),
('8f2b51c47efcfd5f52dfbf44e2a2847bae4e77cc36d880f0dc53296e29e98f82f89b425fe097b52a', 74, 1, 'MyApp', '[]', 0, '2022-01-21 11:10:58', '2022-01-21 11:10:58', '2023-01-21 12:10:58'),
('afc420b42f7a132225a948fb4736ba1e7ccb924db9e79758b53e43bb3396d6e3adc841cfcc87c9a7', 74, 1, 'MyApp', '[]', 0, '2022-01-21 11:10:58', '2022-01-21 11:10:58', '2023-01-21 12:10:58'),
('51ac304fcf79a4ed1a141904ecfe59650db5a1f1ccb53e5eea7b2a43119c8b047db29c1411ce5168', 75, 1, 'MyApp', '[]', 1, '2022-01-21 11:44:15', '2022-01-21 11:44:15', '2023-01-21 12:44:15'),
('13d1e30a2e936541678404144c90d34503be3d16d80ec00ed9db65864e515af57cb83b9c04213ffa', 76, 1, 'MyApp', '[]', 0, '2022-01-21 12:49:43', '2022-01-21 12:49:43', '2023-01-21 13:49:43'),
('295d81d1a64da97367bf0a346ab59917471ac38077407e078656c7c5f24cc31064f7dc1250c3ab57', 77, 1, 'MyApp', '[]', 1, '2022-01-21 13:11:23', '2022-01-21 13:11:23', '2023-01-21 14:11:23'),
('1d32b9fabd84670f82e0c88fd4e2080f4d6af61e9e79942f3ac94ba29b7fd447326cdc75673f71fd', 78, 1, 'MyApp', '[]', 0, '2022-01-21 13:11:43', '2022-01-21 13:11:43', '2023-01-21 14:11:43'),
('6d0a14c636aa30c3fc15bdd9ef70d10c0c017dc9b5aa045d673576c5d6a38edddb3e0042fe3d2f28', 76, 1, 'MyApp', '[]', 0, '2022-01-22 04:05:05', '2022-01-22 04:05:05', '2023-01-22 05:05:05'),
('23dd3b73af8ef2699fa482e5981fc73545ce7dcc9e94c223d24ca811fe3857d1ca1154d6ce8a3ffe', 78, 1, 'MyApp', '[]', 0, '2022-01-22 06:39:01', '2022-01-22 06:39:01', '2023-01-22 07:39:01'),
('85cdccf913855cd6fa2c6872db0efe95ea01e4bfff9d2e806f3248bbe85e9f93f950dc29a05a9b22', 81, 1, 'MyApp', '[]', 0, '2022-01-22 06:49:13', '2022-01-22 06:49:13', '2023-01-22 07:49:13');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `provider`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Laravel Personal Access Client', '30brE90whB1kHzNuVQLdJJ3T0atf39RlZEpGCFY2', NULL, 'http://localhost', 1, 0, 0, '2021-12-03 10:48:10', '2021-12-03 10:48:10'),
(2, NULL, 'Laravel Password Grant Client', 'qlVM1otjQZC20UHo5CEipMLLU8BujILh2Hh1Ot2J', 'users', 'http://localhost', 0, 1, 0, '2021-12-03 10:48:10', '2021-12-03 10:48:10');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2021-12-03 10:48:10', '2021-12-03 10:48:10');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `post_comments`
--

CREATE TABLE `post_comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `post_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `arenagroup_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comment` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `post_comments`
--

INSERT INTO `post_comments` (`id`, `post_id`, `arenagroup_id`, `user_id`, `comment`, `created_at`, `updated_at`) VALUES
(1, '6', '50', '2', 'getget', '2022-01-19 05:44:28', '2022-01-19 05:44:28'),
(2, '6', '5', '2', 'getget', '2022-01-19 05:45:10', '2022-01-19 05:45:10'),
(3, '6', '555', '2', 'getget', '2022-01-19 05:45:20', '2022-01-19 05:45:20'),
(4, '6', '02', '2', 'getget', '2022-01-19 05:46:04', '2022-01-19 05:46:04'),
(5, '6', '50', '2', 'getget', '2022-01-19 05:58:21', '2022-01-19 05:58:21'),
(6, '6', '50', '2', 'getget', '2022-01-19 06:46:46', '2022-01-19 06:46:46'),
(7, '6', '18', '2', 'getget', '2022-01-19 06:50:51', '2022-01-19 06:50:51'),
(8, '6', '181', '2', 'getget', '2022-01-19 06:57:58', '2022-01-19 06:57:58'),
(9, '6', '50', '2', 'getget', '2022-01-19 07:09:41', '2022-01-19 07:09:41'),
(10, '6', '501', '2', 'getget', '2022-01-19 07:09:45', '2022-01-19 07:09:45'),
(11, '6', '0', '2', 'getget', '2022-01-19 07:09:58', '2022-01-19 07:09:58');

-- --------------------------------------------------------

--
-- Table structure for table `privacy_policies`
--

CREATE TABLE `privacy_policies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `privacy_policies`
--

INSERT INTO `privacy_policies` (`id`, `description`, `created_at`, `updated_at`) VALUES
(1, 'A privacy policy is a statement or legal document (in privacy law) that discloses some or all of the ways a party gathers, uses, discloses, and manages a customer or client\'s data. ... Their privacy laws apply not only to government operations but also to private enterprises and commercial transactions.', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `resources`
--

CREATE TABLE `resources` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0' COMMENT '0 => off, 1 => on',
  `price_type` enum('free','paid') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'free' COMMENT 'free => Free, paid => Price',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `resources`
--

INSERT INTO `resources` (`id`, `title`, `description`, `price`, `status`, `price_type`, `created_at`, `updated_at`) VALUES
(21, 'qaaqqqaqaqq', 'asdfghjklkjhgfd', '12112122', '1', 'paid', '2022-01-22 05:11:45', '2022-01-22 05:13:18'),
(15, 'gergewgrw', 'gwergweg', NULL, '0', 'free', '2022-01-21 06:32:34', '2022-01-21 10:14:02'),
(16, 'hdhfgd', 'fhgfhfd', NULL, '0', 'free', '2022-01-21 06:39:32', '2022-01-22 05:10:00'),
(17, 'qqq', 'tkutukty', '2334567', '0', 'paid', '2022-01-21 06:40:28', '2022-01-22 05:09:15'),
(18, 'test', 'this is test', '1111111', '0', 'paid', '2022-01-22 04:20:38', '2022-01-22 04:51:59'),
(20, 'sssss', 'tyutyu', '111111', '0', 'paid', '2022-01-22 04:53:46', '2022-01-22 05:10:23');

-- --------------------------------------------------------

--
-- Table structure for table `resources_images`
--

CREATE TABLE `resources_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `resources_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `resources_images`
--

INSERT INTO `resources_images` (`id`, `resources_id`, `image`, `created_at`, `updated_at`) VALUES
(50, '15', '1642763642855.jpeg', '2022-01-21 10:12:46', '2022-01-21 10:14:02'),
(39, '17', '1642763653472.jpeg', '2022-01-21 06:40:28', '2022-01-21 10:14:13'),
(51, '16', '1642763698748.jpg', '2022-01-21 10:14:58', '2022-01-21 10:14:58'),
(64, '21', '1642831998423.jpg', '2022-01-22 05:13:18', '2022-01-22 05:13:18'),
(55, '18', '1642828838258.png', '2022-01-22 04:20:38', '2022-01-22 04:20:38'),
(58, '20', '1642830826925.jpeg', '2022-01-22 04:53:46', '2022-01-22 04:53:46'),
(61, '16', '1642831687960.jpeg', '2022-01-22 05:08:07', '2022-01-22 05:08:07'),
(62, '17', '1642831755595.jpg', '2022-01-22 05:09:15', '2022-01-22 05:09:15'),
(63, '21', '1642831905455.jpeg', '2022-01-22 05:11:45', '2022-01-22 05:11:45');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_secret_key_iv`
--

CREATE TABLE `tbl_secret_key_iv` (
  `id` int(10) UNSIGNED NOT NULL,
  `secret_key` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret_iv` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_secret_key_iv`
--

INSERT INTO `tbl_secret_key_iv` (`id`, `secret_key`, `secret_iv`, `created_at`, `updated_at`) VALUES
(1, 'd#u/a6GcF6UjMACUnU6%vD/C=6N[Jbew', '3788996297669987', '2021-09-10 00:00:00', '2021-09-10 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `terms_conditions`
--

CREATE TABLE `terms_conditions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `terms_conditions`
--

INSERT INTO `terms_conditions` (`id`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Terms and Conditions” is the document governing the contractual relationship between the provider of a service and its user. ... The Terms and Conditions are nothing other than a contract in which the owner clarifies the conditions of use of its service', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `occupation` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `organization` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `otp` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `social_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `signup_type` enum('A','G','F','N') COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'A => Apple, G => Google, F => Facebook, N =>Normal',
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '0 =>off, 1 =>on',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `country`, `occupation`, `organization`, `otp`, `image`, `social_id`, `signup_type`, `status`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(74, 'shiva', 'Aggarwal', 'shiva@authenticode.in', '$2y$10$Wj0rpcg3MyOLBXjMQV8wNeH2U9Y0iQPaoERiXlTbAnMCGBg0z3tl6', 'India', 'Qa', 'authenticode', NULL, '20220121141028.jpeg', NULL, 'N', '0', NULL, NULL, '2022-01-21 11:03:44', '2022-01-21 13:10:28'),
(75, 'Hemendra', 'kumar', 'hemendra@authenticode.in', '$2y$10$eNkemuGXqTD7r2nVC1y03uGfWm5/gI6bml0FFame83nnc1mSNfP8a', 'India', 'no', 'authenticode', NULL, NULL, NULL, 'N', '0', NULL, NULL, '2022-01-21 11:44:15', '2022-01-21 11:44:15'),
(80, 'lww', 'Doe', 'lww@gmail.com', '12345678', NULL, NULL, NULL, NULL, '1642837381.jpeg', NULL, NULL, '0', NULL, NULL, '2022-01-22 06:43:01', '2022-01-22 06:43:26'),
(81, 'Hemendra', 'kumar', 'hemendra19@gmail.com', '$2y$10$5jadd/.YH6XO8/i.mrg02.1J.WOY3zK5gCXWG9J4wPoALNDlV3U72', 'gshshshs', 'gshshshs', 'bshhshhhshsh', NULL, NULL, NULL, 'N', '0', NULL, NULL, '2022-01-22 06:49:13', '2022-01-22 06:49:13'),
(77, 'Rahul', 'hshsh', 'sahil@authenticode.in', '$2y$10$hJBra/ZrEysOPGow95TLkOCmXCFUtDj6a6q0NJyQ.vKPrkiwlFSG.', 'haha', 'hahaha', 'hahahaha', NULL, '1642836340.jpeg', NULL, 'N', '1', NULL, NULL, '2022-01-21 13:11:23', '2022-01-22 06:36:18'),
(78, 'pavan', 'kumar', 'll@gmail.com', '$2y$10$ka/2dyPfOrXjspHwx/Uk/uqdXNg/w4LF6YAzNcYeZQ0qTvFCHfaSm', 'India', 'formers', 'kisan union', NULL, '1642836330.jpeg', NULL, 'N', '0', NULL, NULL, '2022-01-21 13:11:43', '2022-01-22 06:34:56'),
(79, 'khgjk', 'hjkhgk', 'lawninjas@gmail.com', '12345678', NULL, NULL, NULL, NULL, '1642836917.jpeg', NULL, NULL, '0', NULL, NULL, '2022-01-22 06:26:05', '2022-01-22 06:41:51');

-- --------------------------------------------------------

--
-- Table structure for table `user_devices`
--

CREATE TABLE `user_devices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `device_token` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `device_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `device_type` enum('Android','IOS','other') COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Android => Android, IOS => IOS, other => other',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_devices`
--

INSERT INTO `user_devices` (`id`, `user_id`, `device_token`, `device_id`, `device_type`, `created_at`, `updated_at`) VALUES
(3, '59', 'other', 'n4', 'other', '2021-12-03 11:18:11', '2021-12-29 04:49:41'),
(2, '60', 'Oppoexmal521', 'oppo920', 'other', '2021-12-03 10:53:01', '2021-12-29 04:59:22'),
(4, '3', 'oppo123', 'a11', 'Android', '2021-12-29 07:04:04', '2021-12-29 11:37:30'),
(5, '5', 'hxxxxxxvvzfdgggfffhdhjdkjcskr849onjfre8', 'hdhdhjdkjcskr849onjfre8', 'Android', '2021-12-30 10:08:54', '2021-12-30 10:20:17'),
(6, '78', '121', '456', 'other', '2022-01-14 04:57:45', '2022-01-21 13:11:43'),
(7, '78', '212233', '1234', 'other', '2022-01-14 05:10:14', '2022-01-22 06:39:01'),
(8, '12', '2132', '12', 'other', '2022-01-14 05:13:54', '2022-01-14 08:35:26'),
(10, '73', '1234', '4A5FA883-3152-4EA7-B72F-C121991FC7A8', 'IOS', '2022-01-18 13:06:22', '2022-01-21 05:09:29'),
(33, '81', '1234', '67C7BFB2-9A31-4B64-B369-87A062FC953E', 'IOS', '2022-01-22 06:49:13', '2022-01-22 06:49:13'),
(29, '72', '1234', '11567985-CC01-46CB-8BFE-85CFA4850F99', 'IOS', '2022-01-20 12:53:33', '2022-01-20 13:01:54');

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `videos` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumbnail` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0' COMMENT '0 => off, 1 => on',
  `price_type` enum('free','paid') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'free' COMMENT 'free => Free, paid => Price',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`id`, `videos`, `thumbnail`, `title`, `description`, `price`, `status`, `price_type`, `created_at`, `updated_at`) VALUES
(24, '1642830856.mp4', '1642828423.jpg', 'cdcce', 'sfghjkl;lkjhgfdfghjkjhgf', '22222', '1', 'paid', '2022-01-22 04:13:43', '2022-01-22 04:58:48'),
(21, '1642770933.mp4', '1642770935.jpeg', 'ioptiptoriyp', 'fg;jfhjdhjldfg', NULL, '0', 'free', '2022-01-21 12:15:35', '2022-01-21 12:32:34'),
(22, '1642770994.mp4', '1642770996.jpeg', 'hdfghdfhg', 'hfdhgf', '465465', '1', 'paid', '2022-01-21 12:16:36', '2022-01-22 04:14:25'),
(23, '1642828340.mp4', '1642828340.jpeg', 'qa', 'sdfghjklkjhgfdfghjkjhgf', '22222', '0', 'paid', '2022-01-22 04:12:20', '2022-01-22 04:12:20'),
(26, '1642856527.mp4', '1642856529.jpg', 'fsgfg', 'gfdsgdsfg', NULL, '0', 'free', '2022-01-22 12:02:09', '2022-01-22 12:02:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_us`
--
ALTER TABLE `about_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `arenas`
--
ALTER TABLE `arenas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `arena_posts`
--
ALTER TABLE `arena_posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `like_unlikes`
--
ALTER TABLE `like_unlikes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_auth_codes_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

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
-- Indexes for table `post_comments`
--
ALTER TABLE `post_comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `privacy_policies`
--
ALTER TABLE `privacy_policies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `resources`
--
ALTER TABLE `resources`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `resources_images`
--
ALTER TABLE `resources_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_secret_key_iv`
--
ALTER TABLE `tbl_secret_key_iv`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `terms_conditions`
--
ALTER TABLE `terms_conditions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_devices`
--
ALTER TABLE `user_devices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_us`
--
ALTER TABLE `about_us`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `arenas`
--
ALTER TABLE `arenas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `arena_posts`
--
ALTER TABLE `arena_posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `like_unlikes`
--
ALTER TABLE `like_unlikes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `post_comments`
--
ALTER TABLE `post_comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `privacy_policies`
--
ALTER TABLE `privacy_policies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `resources`
--
ALTER TABLE `resources`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `resources_images`
--
ALTER TABLE `resources_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `tbl_secret_key_iv`
--
ALTER TABLE `tbl_secret_key_iv`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `terms_conditions`
--
ALTER TABLE `terms_conditions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `user_devices`
--
ALTER TABLE `user_devices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
