-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 12, 2022 at 03:30 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `saas`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(125) NOT NULL,
  `email` varchar(125) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(125) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `is_admin`) VALUES
(1, 'admin', 'admin@example.com', NULL, '$2y$10$tn7pKdKAPure0YKU2ib6Aee3k4uAqIUwHTfTXZvNGx7TD.4HIbZcK', NULL, '2022-08-15 16:58:31', '2022-08-15 16:58:31', 1);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(125) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `question` text NOT NULL,
  `answer` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`id`, `service_id`, `question`, `answer`) VALUES
(1, 6, '{\"en\":\"What happens if I go over my limit\",\"ar\":\"\\u0627\\u0644\\u0633\\u0624\\u0627\\u0644 \\u0627\\u0644\\u0623\\u0648\\u0644\"}', '{\"en\":\"Credibly facilitate leveraged process improvements for equity invested infrastructures. Continually mesh top-line human capital with backward-compatible outsourcing. Rapidiously coordinate intuitive deliverables rather than parallel metrics. Interactively monetize customer directed convergence and parallel sources. Enthusiastically architect client-centric e-services whereas granular e-commerce\",\"ar\":\"\\u0627\\u0644\\u0625\\u062c\\u0627\\u0628\\u0629 \\u0631\\u0642\\u0645 1\"}'),
(2, 6, '{\"en\":\"How do I calculate how much processing I need\"}', '{\"en\":\"Distinctively enable premier potentialities through market positioning models. Distinctively extend unique infomediaries without enterprise-wide ideas. Objectively deploy multifunctional catalysts for change for installed base content. Seamlessly create go forward convergence through quality schemas. Objectively deploy cross-media leadership skills through customer directed sources\"}'),
(3, 6, '{\"en\":\"How do I processing I need\"}', '{\"en\":\"Phosfluorescently deliver cooperative testing procedures after integrated communities. Dramatically simplify resource-leveling models with unique outsourcing. Professionally simplify covalent partnerships whereas market positioning best practices. Collaboratively utilize magnetic technology for robust technology\"}');

-- --------------------------------------------------------

--
-- Table structure for table `features`
--

CREATE TABLE `features` (
  `id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `features`
--

INSERT INTO `features` (`id`, `service_id`, `description`) VALUES
(1, 6, '{\"en\":\"Item One\",\"ar\":\"\\u0645\\u064a\\u0632\\u0629 \\u0631\\u0642\\u0645 1\"}'),
(2, 6, '{\"en\":\"Item Two\"}');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(125) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(4, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(5, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(6, '2016_06_01_000004_create_oauth_clients_table', 1),
(7, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(8, '2019_08_19_000000_create_failed_jobs_table', 1),
(9, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(10, '2022_06_16_234615_add_is_admin_to_users_table', 1),
(11, '2022_06_17_001336_create_permission_tables', 1),
(12, '2022_06_24_185523_create_modules_table', 1),
(13, '2022_07_24_211310_create_pages_table', 1),
(14, '2022_07_24_211350_create_pages_table', 1),
(15, '2022_07_24_211351_create_page_translations_table', 1),
(16, '2022_07_26_030305_create_page_builder_settings_table', 1),
(17, '2022_07_26_030851_create_page_blocks_table', 1),
(18, '2022_07_27_062214_create_menus_table', 1),
(19, '2022_07_27_062225_create_menu_items_table', 1),
(20, '2022_08_01_151738_create_themes_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(125) DEFAULT NULL,
  `scopes` text DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('10cc9e6488b3efaf6c13199c86d82b0a96dfd7c1311e22ea8884976776bac18d29631fb812c57e97', 1, 1, 'BZNSMonster', '[]', 0, '2022-09-11 05:19:21', '2022-09-11 05:19:21', '2023-09-11 07:19:21'),
('21a0821e3f2f89e8c47a7ccf4703425e3a897f76601483eea837e523270a6ff670c8ff813121cc0a', 1, 1, 'BZNSMonster', '[]', 0, '2022-08-29 16:21:20', '2022-08-29 16:21:20', '2023-08-29 18:21:20'),
('326b5c6bcdfc750689e03092c9013ada4aa4c9fc09696a01ebadb04ba8737c992d97cf3c45f1a4cd', 1, 1, 'BZNSMonster', '[]', 0, '2022-08-29 16:21:54', '2022-08-29 16:21:54', '2023-08-29 18:21:54'),
('aa43d35ebb3791a0de317ec9bd20989ca9385a333ccf66c872ce27421e1535fe26e743d3dcaf99cd', 1, 1, 'BZNSMonster', '[]', 0, '2022-08-15 16:58:35', '2022-08-15 16:58:35', '2023-08-15 18:58:35'),
('f342813436ac618ca892deaf2f9aa176fef6dcab8aaf99e16573e2f0cde856a30fe81e865245b60a', 1, 1, 'BZNSMonster', '[]', 0, '2022-08-29 16:21:15', '2022-08-29 16:21:15', '2023-08-29 18:21:15');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `scopes` text DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(125) NOT NULL,
  `secret` varchar(100) DEFAULT NULL,
  `provider` varchar(125) DEFAULT NULL,
  `redirect` text NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `provider`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Laravel Personal Access Client', '2Ogb9hD2aSpyWNwp1sMqhtbCloC6mqyndC1abum8', NULL, 'http://localhost', 1, 0, 0, '2022-08-15 16:58:31', '2022-08-15 16:58:31'),
(2, NULL, 'Laravel Password Grant Client', 'avAVGaSNDLsQ6X9JXBDXYseyBd1H1DlHXSSYUX8z', 'users', 'http://localhost', 0, 1, 0, '2022-08-15 16:58:31', '2022-08-15 16:58:31');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2022-08-15 16:58:31', '2022-08-15 16:58:31');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) NOT NULL,
  `access_token_id` varchar(100) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `promo_id` bigint(20) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `promo_id`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 2, NULL, 1, '2022-08-30 20:08:53', '2022-09-02 04:06:20'),
(2, 2, 1, 1, '2022-09-02 04:06:34', '2022-09-07 11:42:08'),
(3, 2, 1, 1, '2022-09-07 11:42:49', '2022-09-07 11:43:24'),
(4, 2, NULL, 1, '2022-09-07 11:51:46', '2022-09-08 06:03:57'),
(5, 2, NULL, 0, '2022-09-08 06:04:24', '2022-09-08 06:04:24');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` bigint(20) NOT NULL,
  `order_id` bigint(20) NOT NULL,
  `package_id` bigint(20) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `discount` decimal(5,2) NOT NULL DEFAULT 0.00,
  `months` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `package_id`, `price`, `discount`, `months`) VALUES
(2, 1, 1, '2512.00', '0.00', 12),
(3, 1, 3, '1200.00', '0.00', 18),
(5, 2, 3, '1200.00', '0.00', 6),
(6, 3, 3, '1200.00', '20.00', 12),
(8, 4, 1, '2512.00', '0.00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 0,
  `price` decimal(8,2) NOT NULL,
  `repo_path` varchar(150) DEFAULT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `service_id`, `is_active`, `price`, `repo_path`, `name`) VALUES
(1, 6, 1, '2512.00', NULL, '{\"en\":\"Silver\",\"ar\":\"\\u0641\\u0636\\u064a\"}'),
(2, 6, 0, '2050.00', NULL, '{\"en\":\"Gold\",\"ar\":\"\\u0630\\u0647\\u0628\\u064a\"}'),
(3, 6, 1, '1200.00', NULL, '{\"en\":\"bronze\"}'),
(7, 6, 1, '0.00', 'Free-Package-path', '{\"en\":\"Free Package\"}'),
(8, 6, 0, '50.00', 'dddd', '{\"en\":\"xxx\"}');

-- --------------------------------------------------------

--
-- Table structure for table `package_features`
--

CREATE TABLE `package_features` (
  `package_id` int(11) NOT NULL,
  `feature_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `package_features`
--

INSERT INTO `package_features` (`package_id`, `feature_id`) VALUES
(1, 1),
(2, 1),
(2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(125) NOT NULL,
  `title` text NOT NULL,
  `keywords` text DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `name`, `title`, `keywords`, `description`) VALUES
(1, 'public', '', NULL, NULL),
(2, 'Home Page', '{\"en\":\"Title in English\",\"ar\":\"Title in Arabic\"}', '{\"en\":\"keywords in English\",\"ar\":\"KEYWORDS (AR)\"}', '{\"en\":\"description in English\",\"ar\":\"\\u0634\\u0631\\u062d \\u0628\\u0627\\u0644\\u0639\\u0631\\u0628\\u064a\"}'),
(3, 'Service Page', '{\"en\":\"Title in English\",\"ar\":\"Title in Arabic\"}', '{\"en\":\"keywords in English\",\"ar\":\"KEYWORDS (AR)\"}', '{\"en\":\"description in English\",\"ar\":\"الوصف بالعربية\"}'),
(4, 'About Us', '{\"en\":\"About Us\"}', '{\"en\":\"keywords in English\",\"ar\":\"KEYWORDS (AR)\"}', '{\"en\":\"description in English\",\"ar\":\"\\u0634\\u0631\\u062d \\u0628\\u0627\\u0644\\u0639\\u0631\\u0628\\u064a\"}'),
(5, 'Checkout', '{\"en\":\"Checkout\"}', NULL, NULL),
(6, 'Login', '{\"en\":\"Login\"}', '{\"en\":\"keywords in English\",\"ar\":\"KEYWORDS (AR)\"}', '{\"en\":\"description in English\",\"ar\":\"\\u0634\\u0631\\u062d \\u0628\\u0627\\u0644\\u0639\\u0631\\u0628\\u064a\"}');

-- --------------------------------------------------------

--
-- Table structure for table `page_translations`
--

CREATE TABLE `page_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `page_id` bigint(20) UNSIGNED NOT NULL,
  `content` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `page_translations`
--

INSERT INTO `page_translations` (`id`, `page_id`, `content`) VALUES
(1, 3, '{\"en\":\"We are Development Experts\",\"ar\":\"\\u0627\\u062d\\u0635\\u0644 \\u0639\\u0644\\u0649 \\u0627\\u0644\\u062a\\u062d\\u0643\\u0645 \\u0627\\u0644\\u0643\\u0627\\u0645\\u0644 \\u0648\\u0627\\u0644\\u0631\\u0624\\u064a\\u0629 \\u0644\\u0634\\u0631\\u0643\\u062a\\u0643\"}'),
(2, 3, '{\"en\":\"Seamlessly actualize client-based users after out-of-the-box value. Globally embrace strategic data through frictionless expertise.\",\"ar\":\"\\u0644\\u0648\\u0631\\u064a\\u0645 \\u0625\\u064a\\u0628\\u0633\\u0648\\u0645 \\u0647\\u0648 \\u0628\\u0628\\u0633\\u0627\\u0637\\u0629 \\u0646\\u0635 \\u0634\\u0643\\u0644\\u064a \\u0628\\u0645\\u0639\\u0646\\u0649 \\u0623\\u0646 \\u0627\\u0644\\u063a\\u0627\\u064a\\u0629 \\u0647\\u064a \\u0627\\u0644\\u0634\\u0643\\u0644 \\u0648\\u0644\\u064a\\u0633 \\u0627\\u0644\\u0645\\u062d\\u062a\\u0648\\u0649 \\u0648\\u064a\\u064f\\u0633\\u062a\\u062e\\u062f\\u0645 \\u0641\\u064a \\u0635\\u0646\\u0627\\u0639\\u0627\\u062a \\u0627\\u0644\\u0645\\u0637\\u0627\\u0628\\u0639 \\u0648\\u062f\\u0648\\u0631 \\u0627\\u0644\\u0646\\u0634\\u0631.\"}'),
(3, 2, '{\"en\":\"Get Fully Control and Visibility your Company\",\"ar\":\"\\u0627\\u062d\\u0635\\u0644 \\u0639\\u0644\\u0649 \\u0627\\u0644\\u062a\\u062d\\u0643\\u0645 \\u0627\\u0644\\u0643\\u0627\\u0645\\u0644 \\u0648\\u0627\\u0644\\u0631\\u0624\\u064a\\u0629 \\u0644\\u0634\\u0631\\u0643\\u062a\\u0643\"}'),
(4, 2, '{\"en\":\"Proactively coordinate quality quality vectors vis-a-vis supply chains. Quickly engage client-centric web services.\",\"ar\":\"\\u0644\\u0648\\u0631\\u064a\\u0645 \\u0625\\u064a\\u0628\\u0633\\u0648\\u0645 \\u0647\\u0648 \\u0628\\u0628\\u0633\\u0627\\u0637\\u0629 \\u0646\\u0635 \\u0634\\u0643\\u0644\\u064a \\u0628\\u0645\\u0639\\u0646\\u0649 \\u0623\\u0646 \\u0627\\u0644\\u063a\\u0627\\u064a\\u0629 \\u0647\\u064a \\u0627\\u0644\\u0634\\u0643\\u0644 \\u0648\\u0644\\u064a\\u0633 \\u0627\\u0644\\u0645\\u062d\\u062a\\u0648\\u0649 \\u0648\\u064a\\u064f\\u0633\\u062a\\u062e\\u062f\\u0645 \\u0641\\u064a \\u0635\\u0646\\u0627\\u0639\\u0627\\u062a \\u0627\\u0644\\u0645\\u0637\\u0627\\u0628\\u0639 \\u0648\\u062f\\u0648\\u0631 \\u0627\\u0644\\u0646\\u0634\\u0631.\"}'),
(5, 1, '{\"en\":\"Home\",\"ar\":\"\\u0627\\u0644\\u0635\\u0641\\u062d\\u0629 \\u0627\\u0644\\u0631\\u0626\\u064a\\u0633\\u064a\\u0629\"}'),
(6, 1, '{\"en\":\"Services\",\"ar\":\"\\u0627\\u0644\\u062e\\u062f\\u0645\\u0627\\u062a\"}'),
(7, 1, '{\"en\":\"About Us\"}'),
(8, 1, '{\"en\":\"Languages\",\"ar\":\"\\u0627\\u0644\\u0644\\u063a\\u0629\"}'),
(9, 3, '{\"en\":\"View Details\"}'),
(10, 1, '{\"en\":\"Let\'s Try! Get Free Support\"}'),
(11, 1, '{\"en\":\"Start Your 14-Day Free Trial\"}'),
(12, 1, '{\"en\":\"We can help you to create your dream website for better business revenue.\"}'),
(13, 3, '{\"en\":\"Month\"}'),
(14, 1, '{\"en\":\"FAQ\"}'),
(15, 3, '{\"en\":\"Frequently Asked Questions\"}'),
(16, 3, '{\"en\":\"Completely whiteboard top-line channels and fully tested value. Competently generate testing procedures before visionary maintainable growth strategies for maintainable.\"}'),
(17, 1, '{\"en\":\"Buy Now\"}'),
(20, 1, '{\"en\":\"Watch Demo\"}'),
(21, 1, '{\"en\":\"Free 14-day trial\"}'),
(22, 1, '{\"en\":\"No credit card required\"}'),
(23, 1, '{\"en\":\"Support 24/7\"}'),
(24, 1, '{\"en\":\"Cancel anytime\"}'),
(25, 1, '{\"en\":\"Free\"}'),
(26, 1, '{\"en\":\"About Us\"}'),
(27, 6, '{\"en\":\"Nice to Seeing You Again\"}'),
(28, 6, '{\"en\":\"Please log in to access your account web-enabled methods of innovative niches.\"}'),
(29, 6, '{\"en\":\"Connect with Google\"}'),
(30, 6, '{\"en\":\"OR\"}'),
(31, 6, '{\"en\":\"Email\"}'),
(32, 6, '{\"en\":\"Password\"}'),
(33, 6, '{\"en\":\"Login\"}'),
(34, 6, '{\"en\":\"Don’t have an account?\"}'),
(35, 6, '{\"en\":\"Sign up Today\"}'),
(36, 6, '{\"en\":\"Forgot your Password?\"}'),
(37, 1, '{\"en\":\"Logout\"}'),
(38, 1, '{\"en\":\"Your Profile\"}'),
(39, 5, '{\"en\":\"Shopping Cart\"}'),
(40, 5, '{\"en\":\"Cart Details\"}');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(125) NOT NULL,
  `token` varchar(125) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(125) NOT NULL,
  `guard_name` varchar(125) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'index users', 'api', '2022-08-15 16:58:31', '2022-08-15 16:58:31'),
(2, 'show users', 'api', '2022-08-15 16:58:31', '2022-08-15 16:58:31'),
(3, 'store users', 'api', '2022-08-15 16:58:31', '2022-08-15 16:58:31'),
(4, 'update users', 'api', '2022-08-15 16:58:31', '2022-08-15 16:58:31'),
(5, 'destroy users', 'api', '2022-08-15 16:58:31', '2022-08-15 16:58:31'),
(6, 'index roles', 'api', '2022-08-15 16:58:31', '2022-08-15 16:58:31'),
(7, 'show roles', 'api', '2022-08-15 16:58:31', '2022-08-15 16:58:31'),
(8, 'store roles', 'api', '2022-08-15 16:58:31', '2022-08-15 16:58:31'),
(9, 'update roles', 'api', '2022-08-15 16:58:31', '2022-08-15 16:58:31'),
(10, 'destroy roles', 'api', '2022-08-15 16:58:31', '2022-08-15 16:58:31');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(125) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(125) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `package_id` int(11) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `path` varchar(150) DEFAULT NULL,
  `expired_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `user_id`, `package_id`, `is_active`, `path`, `expired_at`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 0, 'mysubdomain', '2022-10-15 18:09:14', '2022-09-08 05:48:07', '2022-09-08 07:19:13');

-- --------------------------------------------------------

--
-- Table structure for table `promos`
--

CREATE TABLE `promos` (
  `id` bigint(20) NOT NULL,
  `code` varchar(50) NOT NULL,
  `type` enum('money','rate') NOT NULL DEFAULT 'rate',
  `value` decimal(10,2) NOT NULL,
  `expired_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `promos`
--

INSERT INTO `promos` (`id`, `code`, `type`, `value`, `expired_at`, `created_at`, `updated_at`, `user_id`) VALUES
(1, 'ABC123', 'rate', '10.00', '2022-09-22 07:51:00', '2022-09-01 04:58:09', '2022-09-12 07:58:51', 1),
(2, 'ABC1234', 'money', '1000.00', NULL, '2022-09-01 04:58:09', '2022-09-12 07:58:56', 1),
(3, 'ASDF56', 'money', '20.00', '2022-09-26 07:41:00', '2022-09-12 07:41:28', '2022-09-12 07:59:02', 1);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(125) NOT NULL,
  `guard_name` varchar(125) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'super admin', 'api', '2022-08-15 16:58:31', '2022-08-15 16:58:31');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `slug` varchar(150) DEFAULT NULL,
  `name` text DEFAULT NULL,
  `keywords` text DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `slug`, `name`, `keywords`, `description`) VALUES
(6, 'service-one', '{\"en\":\"Service One\"}', NULL, '{\"en\":\"Synergistically pursue accurate initiatives without economically sound imperatives.\\n\\nProfessionally architect unique process improvements via optimal.\"}');

-- --------------------------------------------------------

--
-- Table structure for table `terms`
--

CREATE TABLE `terms` (
  `id` int(11) NOT NULL,
  `months` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `terms`
--

INSERT INTO `terms` (`id`, `months`) VALUES
(1, 1),
(2, 6),
(3, 3),
(4, 12),
(5, 18),
(6, 25);

-- --------------------------------------------------------

--
-- Table structure for table `term_packages`
--

CREATE TABLE `term_packages` (
  `term_id` bigint(20) NOT NULL,
  `package_id` bigint(20) NOT NULL,
  `discount` decimal(5,2) NOT NULL DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `term_packages`
--

INSERT INTO `term_packages` (`term_id`, `package_id`, `discount`) VALUES
(1, 1, '0.00'),
(1, 3, '0.00'),
(1, 7, '0.00'),
(2, 1, '0.00'),
(2, 3, '0.00'),
(3, 1, '0.00'),
(3, 3, '0.00'),
(3, 7, '0.00'),
(4, 1, '10.00'),
(4, 3, '20.00'),
(4, 7, '10.00'),
(5, 1, '12.00'),
(5, 3, '25.00'),
(6, 1, '14.00'),
(6, 3, '30.00'),
(6, 7, '0.00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(125) NOT NULL,
  `company` varchar(150) NOT NULL,
  `email` varchar(125) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(125) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `company`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `is_admin`) VALUES
(2, 'User One', '', 'user@test.com', NULL, '$2y$10$2izXOlckvp/zc0ZWxdufC.rFgoy6st/N8XWkfVxV7ijrI6a3c0SDG', '0KlX0sMwHfDRg3WlgLbZCtUa2ErrBHqGumYBUL0NHOyTw3TuKnRtpEMMHpaE', '2022-08-28 18:46:14', '2022-08-28 18:46:14', 0),
(3, 'karim', 'kiko', 'kiko@k.c', NULL, '$2y$10$uvAbOhHKA3.uJMLoNDyMjOHf0I6/OlAItPDYHSTEtw.T.hilwkN56', 'y4m1ZLxLbDa3au2H3D3GJk7x8mUfLRdi7KaFEqboBw0qqeZIw5TziWwAdwWH', '2022-09-07 10:13:25', '2022-09-07 10:13:25', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `features`
--
ALTER TABLE `features`
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
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `package_features`
--
ALTER TABLE `package_features`
  ADD PRIMARY KEY (`package_id`,`feature_id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page_translations`
--
ALTER TABLE `page_translations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `page_translations_page_id_foreign` (`page_id`);

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
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

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
-- Indexes for table `promos`
--
ALTER TABLE `promos`
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
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `terms`
--
ALTER TABLE `terms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `term_packages`
--
ALTER TABLE `term_packages`
  ADD PRIMARY KEY (`term_id`,`package_id`);

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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `features`
--
ALTER TABLE `features`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

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
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `page_translations`
--
ALTER TABLE `page_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `promos`
--
ALTER TABLE `promos`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `terms`
--
ALTER TABLE `terms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `page_translations`
--
ALTER TABLE `page_translations`
  ADD CONSTRAINT `page_translations_page_id_foreign` FOREIGN KEY (`page_id`) REFERENCES `pages` (`id`) ON DELETE CASCADE;

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
