-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Jan 2025 pada 17.19
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Struktur dari tabel `auth_activation_attempts`
--

CREATE TABLE `auth_activation_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_groups`
--

CREATE TABLE `auth_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `auth_groups`
--

INSERT INTO `auth_groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Site Administrator'),
(2, 'user', 'Regular User');

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_groups_permissions`
--

CREATE TABLE `auth_groups_permissions` (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `auth_groups_permissions`
--

INSERT INTO `auth_groups_permissions` (`group_id`, `permission_id`) VALUES
(1, 1),
(2, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_groups_users`
--

CREATE TABLE `auth_groups_users` (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `auth_groups_users`
--

INSERT INTO `auth_groups_users` (`group_id`, `user_id`) VALUES
(1, 11),
(1, 11),
(2, 11);

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_logins`
--

CREATE TABLE `auth_logins` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `user_id` int(11) UNSIGNED DEFAULT NULL,
  `date` datetime NOT NULL,
  `success` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `auth_logins`
--

INSERT INTO `auth_logins` (`id`, `ip_address`, `email`, `user_id`, `date`, `success`) VALUES
(1, '::1', 'taufikurrahmadi19@smk.belajar.id', 2, '2024-12-23 02:27:36', 1),
(2, '::1', 'admin@admin.com', NULL, '2024-12-23 04:53:54', 0),
(3, '::1', 'taufikurrahmadi19@smk.belajar.id', 2, '2024-12-23 04:54:43', 1),
(4, '::1', 'taufikurrahmadi19@smk.belajar.id', 2, '2024-12-23 06:22:21', 1),
(5, '::1', 'taufikurrahmadi19@smk.belajar.id', 2, '2024-12-23 06:23:46', 1),
(6, '::1', 'kasir@gmail.com', 3, '2024-12-23 06:38:48', 1),
(7, '::1', 'admin@admin.com', NULL, '2024-12-23 07:02:43', 0),
(8, '::1', 'taufikurrahmadi19@smk.belajar.id', NULL, '2024-12-23 07:03:41', 0),
(9, '::1', 'admin@admin.com', NULL, '2024-12-23 07:03:55', 0),
(10, '::1', 'admin@admin.com', NULL, '2024-12-23 07:04:04', 0),
(11, '::1', 'admin@admin.com', NULL, '2024-12-23 07:04:17', 0),
(12, '::1', 'admin@admin.com', NULL, '2024-12-23 07:04:44', 0),
(13, '::1', 'admin@admin.com', NULL, '2024-12-23 07:05:08', 0),
(14, '::1', 'admin@admin.com', 1, '2024-12-23 07:05:41', 0),
(15, '::1', 'taufikurrahmadi19@smk.belajar.id', NULL, '2024-12-23 07:05:51', 0),
(16, '::1', 'admin@admin.com', 1, '2024-12-23 07:06:32', 0),
(17, '::1', 'taufikurrahmadi19@smk.belajar.id', NULL, '2024-12-23 07:08:18', 0),
(18, '::1', 'taufikurrahmadi19@smk.belajar.id', NULL, '2024-12-23 07:08:28', 0),
(19, '::1', 'taufikurrahmadi19@smk.belajar.id', NULL, '2024-12-23 07:08:36', 0),
(20, '::1', 'taufikurrahmadi19@smk.belajar.id', 2, '2024-12-23 07:08:44', 1),
(21, '::1', 'taufikurrahmadi19@smk.belajar.id', 2, '2024-12-23 11:05:00', 1),
(22, '::1', 'kasir@gmail.com', 3, '2024-12-23 11:06:01', 1),
(23, '::1', 'kasir@gmail.com', 3, '2024-12-23 11:54:43', 1),
(24, '::1', 'kasir@gmail.com', 3, '2024-12-23 11:59:47', 1),
(25, '::1', 'taufikurrahmadi19@smk.belajar.id', 2, '2024-12-23 12:01:48', 1),
(26, '::1', 'kasir@gmail.com', 3, '2024-12-23 15:42:17', 1),
(27, '::1', 'kasir@gmail.com', 3, '2024-12-23 15:44:28', 1),
(28, '::1', 'kasir@gmail.com', 3, '2024-12-23 15:46:26', 1),
(29, '::1', 'kasir@gmail.com', 3, '2024-12-23 16:01:19', 1),
(30, '::1', 'kasir@gmail.com', 3, '2024-12-23 16:02:40', 1),
(31, '::1', 'kasir@gmail.com', 3, '2024-12-23 22:24:05', 1),
(32, '::1', 'kasir@gmail.com', 3, '2024-12-23 22:32:39', 1),
(33, '::1', 'kasir@gmail.com', 3, '2024-12-23 22:33:54', 1),
(34, '::1', 'kasir@gmail.com', 3, '2024-12-23 22:37:15', 1),
(35, '::1', 'kasir@gmail.com', 3, '2024-12-23 22:37:15', 1),
(36, '::1', 'kasir@gmail.com', NULL, '2024-12-23 22:38:24', 0),
(37, '::1', 'kasir@gmail.com', 3, '2024-12-23 22:38:39', 1),
(38, '::1', 'kasir@gmail.com', 3, '2024-12-24 13:24:17', 1),
(39, '::1', 'kasir@gmail.com', 3, '2024-12-24 13:26:32', 1),
(40, '::1', 'kasir@gmail.com', 3, '2024-12-24 13:36:48', 1),
(41, '::1', 'taufikurrahmadi19@smk.belajar.id', 2, '2024-12-24 14:32:45', 1),
(42, '::1', 'taufikurrahmadi19@smk.belajar.id', NULL, '2024-12-25 04:39:38', 0),
(43, '::1', 'taufikurrahmadi19@smk.belajar.id', 2, '2024-12-25 04:39:48', 1),
(44, '::1', 'kasir2@gmail.com', 4, '2024-12-25 06:42:16', 1),
(45, '::1', 'kasir2@gmail.com', NULL, '2024-12-25 12:14:06', 0),
(46, '::1', 'kasir2@gmail.com', 4, '2024-12-25 12:14:20', 1),
(47, '::1', 'taufikurrahmadi19@smk.belajar.id', NULL, '2024-12-25 12:34:54', 0),
(48, '::1', 'taufikurrahmadi19@smk.belajar.id', 2, '2024-12-25 12:35:00', 1),
(49, '::1', 'kasir@gmail.com', NULL, '2024-12-25 13:48:39', 0),
(50, '::1', 'kasir@gmail.com', NULL, '2024-12-25 13:49:01', 0),
(51, '::1', 'kasir@gmail.com', NULL, '2024-12-25 13:49:13', 0),
(52, '::1', 'kasir2@gmail.com', NULL, '2024-12-25 13:49:22', 0),
(53, '::1', 'kasir@gmail.com', 3, '2024-12-25 13:49:34', 1),
(54, '::1', 'taufikurrahmadi19@smk.belajar.id', 2, '2024-12-26 02:25:00', 1),
(55, '::1', 'kasir@gmail.com', 3, '2024-12-26 02:28:23', 1),
(56, '::1', 'taufikurrahmadi19@smk.belajar.id', NULL, '2024-12-26 05:43:59', 0),
(57, '::1', 'taufikurrahmadi19@smk.belajar.id', 2, '2024-12-26 05:44:09', 1),
(58, '::1', 'kasir@gmail.com', 3, '2024-12-26 05:46:12', 1),
(59, '::1', 'kasir@gmail.com', 3, '2024-12-26 11:21:23', 1),
(60, '::1', 'taufikurrahmadi19@smk.belajar.id', 2, '2024-12-26 11:24:31', 1),
(61, '::1', 'kasir@gmail.com', 3, '2024-12-26 15:38:18', 1),
(62, '::1', 'taufikurrahmadi19@smk.belajar.id', 2, '2024-12-26 15:38:52', 1),
(63, '::1', 'kasir@gmail.com', 3, '2025-01-04 08:17:02', 1),
(64, '::1', 'kasir@gmail.com', NULL, '2025-01-07 02:31:46', 0),
(65, '::1', 'kasir@gmail.com', NULL, '2025-01-07 02:31:55', 0),
(66, '::1', 'kasir@gmail.com', 3, '2025-01-07 02:32:05', 1),
(67, '::1', 'taufikurrahmadi19@smk.belajar.id', NULL, '2025-01-07 02:32:59', 0),
(68, '::1', 'taufikurrahmadi19@smk.belajar.id', NULL, '2025-01-07 02:33:13', 0),
(69, '::1', 'taufikurrahmadi19@smk.belajar.id', 2, '2025-01-07 02:33:24', 1),
(70, '::1', 'kasir@gmail.com', 3, '2025-01-07 08:34:12', 1),
(71, '::1', 'kasir2@gmail.com', NULL, '2025-01-07 08:34:44', 0),
(72, '::1', 'rahmadikhoiron85@gmail.com', 5, '2025-01-07 08:35:38', 1),
(73, '::1', 'taufikurrahmadi19@smk.belajar.id', NULL, '2025-01-07 08:44:45', 0),
(74, '::1', 'taufikurrahmadi19@smk.belajar.id', 2, '2025-01-07 08:44:54', 1),
(75, '::1', 'taufikurrahmadi19@smk.belajar.id', 2, '2025-01-07 12:12:22', 1),
(76, '::1', 'kasir@gmail.com', 3, '2025-01-07 12:14:39', 1),
(77, '::1', 'kasir@gmail.com', 3, '2025-01-07 14:27:28', 1),
(78, '::1', 'kasir@gmail.com', NULL, '2025-01-08 01:33:17', 0),
(79, '::1', 'kasir@gmail.com', NULL, '2025-01-08 01:33:26', 0),
(80, '::1', 'kasir@gmail.com', 3, '2025-01-08 01:33:33', 1),
(81, '::1', 'kasir2@gmail.com', NULL, '2025-01-08 01:34:07', 0),
(82, '::1', 'rahmadikhoiron85@gmail.com', 5, '2025-01-08 01:34:16', 1),
(83, '::1', 'kasir@gmail.com', 3, '2025-01-08 01:43:50', 1),
(84, '::1', 'rahmadikhoiron85@gmail.com', 5, '2025-01-08 01:44:18', 1),
(85, '::1', 'kasir@gmail.com', 3, '2025-01-08 01:44:48', 1),
(86, '::1', 'rahmadikhoiron85@gmail.com', 5, '2025-01-08 01:50:21', 1),
(87, '::1', 'taufikurrahmadi19@smk.belajar.id', 2, '2025-01-08 02:01:41', 1),
(88, '::1', 'kasir@gmail.com', 3, '2025-01-08 06:57:23', 1),
(89, '::1', 'taufikurrahmadi19@smk.belajar.id', 2, '2025-01-08 07:06:53', 1),
(90, '::1', 'kasir@gmail.com', 3, '2025-01-08 14:07:44', 1),
(91, '::1', 'taufikurrahmadi19@smk.belajar.id', 2, '2025-01-08 14:08:08', 1),
(92, '::1', 'kasir@gmail.com', 3, '2025-01-09 10:30:35', 1),
(93, '::1', 'taufikurrahmadi19@smk.belajar.id', 2, '2025-01-09 10:31:05', 1),
(94, '::1', 'kasir@gmail.com', NULL, '2025-01-09 12:44:12', 0),
(95, '::1', 'kasir@gmail.com', 3, '2025-01-09 12:44:30', 1),
(96, '::1', 'kasir@gmail.com', 3, '2025-01-10 01:09:31', 1),
(97, '::1', 'taufikurrahmadi19@smk.belajar.id', 2, '2025-01-10 03:17:51', 1),
(98, '::1', 'taufikurrahmadi19@smk.belajar.id', 2, '2025-01-10 06:27:26', 1),
(99, '::1', 'kasir@gmail.com', 3, '2025-01-10 11:28:43', 1),
(100, '::1', 'taufikurrahmadi19@smk.belajar.id', 2, '2025-01-10 15:13:12', 1),
(101, '::1', 'kasir@gmail.com', 3, '2025-01-10 15:59:05', 1),
(102, '::1', 'kasir@gmail.com', NULL, '2025-01-11 01:30:53', 0),
(103, '::1', 'kasir@gmail.com', 3, '2025-01-11 01:31:01', 1),
(104, '::1', 'taufikurrahmadi19@smk.belajar.id', 2, '2025-01-11 01:41:59', 1),
(105, '::1', 'taufikurrahmadi19@smk.belajar.id', 2, '2025-01-11 14:49:18', 1),
(106, '::1', 'kasir@gmail.com', NULL, '2025-01-11 16:11:30', 0),
(107, '::1', 'kasir@gmail.com', NULL, '2025-01-11 16:11:39', 0),
(108, '::1', 'kasir@gmail.com', 3, '2025-01-11 16:11:49', 1),
(109, '::1', 'kasir@gmail.com', 3, '2025-01-11 17:20:38', 1),
(110, '::1', 'kasir@gmail.com', 3, '2025-01-11 17:27:01', 1),
(111, '::1', 'taufik@gmail.com', 6, '2025-01-11 17:30:26', 1),
(112, '::1', 'taufikuniba@gmail.com', 7, '2025-01-11 17:44:33', 1),
(113, '::1', 'taufikuniba@gmail.com', 8, '2025-01-11 18:03:34', 1),
(114, '::1', 'taufikurrahmadi19@smk.belajar.id', 2, '2025-01-12 12:35:33', 1),
(115, '::1', 'kasir@gmail.com', NULL, '2025-01-12 12:39:31', 0),
(116, '::1', 'taufikuniba@gmail.com', 8, '2025-01-12 12:39:51', 1),
(117, '::1', 'unibataufik@gmail.com', NULL, '2025-01-12 12:45:59', 0),
(118, '::1', 'unibataufik@gmail.com', NULL, '2025-01-12 12:46:20', 0),
(119, '::1', 'taufik@uniba.com', 10, '2025-01-12 12:54:05', 1),
(120, '::1', 'admin@admin.com', NULL, '2025-01-12 15:28:58', 0),
(121, '::1', 'admin@admin.com', NULL, '2025-01-12 15:32:37', 0),
(122, '::1', 'admin@admin.com', NULL, '2025-01-12 15:32:53', 0),
(123, '::1', 'admin@admin.com', NULL, '2025-01-12 15:33:09', 0),
(124, '::1', 'admin@admin.com', NULL, '2025-01-12 15:33:18', 0),
(125, '::1', 'unibataufik@gmail.com', NULL, '2025-01-12 15:45:48', 0),
(126, '::1', 'unibataufik@gmail.com', NULL, '2025-01-12 15:45:58', 0),
(127, '::1', 'taufikurrahmadi19@smk.belajar.id', NULL, '2025-01-12 15:46:10', 0),
(128, '::1', 'kasir@gmail.com', NULL, '2025-01-12 15:50:50', 0),
(129, '::1', 'admin@gmail.com', 2, '2025-01-12 15:57:50', 1),
(130, '::1', 'admin@admin.com', 11, '2025-01-12 16:10:18', 1),
(131, '::1', '1@g.com', NULL, '2025-01-12 16:17:58', 0),
(132, '::1', '1@g.com', 12, '2025-01-12 16:18:07', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_permissions`
--

CREATE TABLE `auth_permissions` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `auth_permissions`
--

INSERT INTO `auth_permissions` (`id`, `name`, `description`) VALUES
(1, 'manage-barang', 'manage semua item di sistem'),
(2, 'belanja', 'bisa mengelola perbelanjaan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_reset_attempts`
--

CREATE TABLE `auth_reset_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_tokens`
--

CREATE TABLE `auth_tokens` (
  `id` int(11) UNSIGNED NOT NULL,
  `selector` varchar(255) NOT NULL,
  `hashedValidator` varchar(255) NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `expires` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_users_permissions`
--

CREATE TABLE `auth_users_permissions` (
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `barang_id` int(11) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `harga` varchar(100) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `tentang` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`barang_id`, `nama_barang`, `harga`, `foto`, `created_at`, `updated_at`, `tentang`) VALUES
(8, 'terasi udang', '30000', '1732357716_ae54ba0cda1f9045e274.jpeg', '2024-11-23 10:28:36', '2025-01-09 12:10:04', 'Terasi is a shrimp paste that is used as ingredient in numerous dishes in Indonesia. It is primarily made from finely crushed shrimp or krill mixed with salt, and then fermented for several weeks. . Although it does not have the most pleasant smell, it is used after dry roasting or frying in numerous ingredients especially in sambal terasi, because of the umami flavoring. Interestingly, terasi has several different names in other countries. Terasi is called Balacan in Malaysia, Bagoong Alamang in the Phillipines and Kapi in Vietnam and so on.'),
(15, 'naksbkab', '2372', '1734883137_6433ab6d6e899058d1e6.jpeg', '2024-12-22 15:58:57', '2024-12-22 15:58:57', 'sknkjsask'),
(17, 'petis', '15000', '1736426294_3ccfb9d27d4fb823d96f.jpg', '2025-01-09 12:37:52', '2025-01-09 12:38:14', '    petis adaknbakjcbkjcbjbaclbabcjkbacbblabclbalcbalbcbclabclbclbclbclbclac'),
(18, 'baju', '10000', '1736617874_b445f74c102f09d69f8b.jpg', '2025-01-11 17:51:14', '2025-01-11 17:51:14', 'baju adaldaihicidinduigige');

-- --------------------------------------------------------

--
-- Struktur dari tabel `keranjang`
--

CREATE TABLE `keranjang` (
  `order_id` int(11) NOT NULL,
  `barang_id` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `harga` int(11) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `messages`
--

INSERT INTO `messages` (`id`, `name`, `email`, `message`, `created_at`, `updated_at`) VALUES
(5, 'Taufikur Rahmadi', 'trartambunten@gmail.com', 'dkabdkabkdbsa', '2025-01-11 11:08:01', '2025-01-11 11:08:01'),
(6, 'Taufikur Rahmadi', 'admin@admin.com', 'web ini kurang banyak barang', '2025-01-12 05:56:21', '2025-01-12 05:56:21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2017-11-20-223112', 'Myth\\Auth\\Database\\Migrations\\CreateAuthTables', 'default', 'Myth\\Auth', 1734889258, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `id_user` int(11) UNSIGNED NOT NULL,
  `barang_id` int(11) NOT NULL,
  `total_harga` decimal(10,2) NOT NULL,
  `tanggal_order` datetime NOT NULL DEFAULT current_timestamp(),
  `status` enum('pending','delivered','completed','canceled') DEFAULT 'pending',
  `quantity` int(11) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `nama_user` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `barang_id` int(11) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password_hash` varchar(255) NOT NULL,
  `reset_hash` varchar(255) DEFAULT NULL,
  `reset_at` datetime DEFAULT NULL,
  `reset_expires` datetime DEFAULT NULL,
  `activate_hash` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `status_message` varchar(255) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `force_pass_reset` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `password_hash`, `reset_hash`, `reset_at`, `reset_expires`, `activate_hash`, `status`, `status_message`, `active`, `force_pass_reset`, `created_at`, `updated_at`, `deleted_at`) VALUES
(11, 'admin@admin.com', 'admin', '$2y$10$xzY9e7swa19XgbnWHw48gurDYkeCas/jujVhzTqRh2tDQRUxoyNfa', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2025-01-12 16:08:02', '2025-01-12 16:08:02', NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `auth_groups`
--
ALTER TABLE `auth_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD KEY `auth_groups_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `group_id_permission_id` (`group_id`,`permission_id`);

--
-- Indeks untuk tabel `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD KEY `auth_groups_users_user_id_foreign` (`user_id`),
  ADD KEY `group_id_user_id` (`group_id`,`user_id`);

--
-- Indeks untuk tabel `auth_logins`
--
ALTER TABLE `auth_logins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `auth_permissions`
--
ALTER TABLE `auth_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `auth_tokens_user_id_foreign` (`user_id`),
  ADD KEY `selector` (`selector`);

--
-- Indeks untuk tabel `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD KEY `auth_users_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `user_id_permission_id` (`user_id`,`permission_id`);

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`barang_id`),
  ADD KEY `barang_id` (`barang_id`);

--
-- Indeks untuk tabel `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indeks untuk tabel `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `barang_id` (`barang_id`);

--
-- Indeks untuk tabel `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `barang_id` (`barang_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `auth_groups`
--
ALTER TABLE `auth_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `auth_logins`
--
ALTER TABLE `auth_logins`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;

--
-- AUTO_INCREMENT untuk tabel `auth_permissions`
--
ALTER TABLE `auth_permissions`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `auth_tokens`
--
ALTER TABLE `auth_tokens`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `barang_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- AUTO_INCREMENT untuk tabel `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT untuk tabel `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD CONSTRAINT `auth_groups_permissions_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD CONSTRAINT `auth_groups_users_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD CONSTRAINT `auth_tokens_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD CONSTRAINT `auth_users_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_users_permissions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`barang_id`) REFERENCES `barang` (`barang_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
