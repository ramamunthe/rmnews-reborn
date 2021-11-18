-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 18 Nov 2021 pada 03.16
-- Versi server: 10.4.20-MariaDB
-- Versi PHP: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rmnews`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `categories`
--

INSERT INTO `categories` (`id`, `title`, `slug`) VALUES
(1, 'Music Arranger and Orchestrator', 'curator'),
(2, 'Marine Architect', 'forest-fire-inspector'),
(3, 'Aircraft Structure Assemblers', 'corporate-trainer'),
(4, 'Police Detective', 'marcom-manager'),
(5, 'Epidemiologist', 'creative-writer');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
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
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2021_07_30_130535_create_categories_table', 1),
(6, '2021_07_30_131231_create_posts_table', 1),
(7, '2021_07_30_230126_create_tags_table', 1),
(8, '2021_07_30_230527_create_post_tag_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `posts`
--

INSERT INTO `posts` (`id`, `category_id`, `title`, `slug`, `body`, `image`, `created_at`, `updated_at`) VALUES
(1, 2, 'Inventore omnis ducimus quia harum.', 'suscipit-minima-blanditiis-quidem-sint-voluptas-velit-perferendis', 'Cum quibusdam et sunt omnis voluptatibus. Cupiditate voluptatem ipsum eius sed mollitia voluptate iusto. At in autem in vel eius soluta. Molestiae repudiandae labore aliquid. Quae explicabo voluptatem quibusdam deserunt. Voluptatum tempore architecto est quas rerum sapiente sed.', 'images/news.png', '2021-08-02 13:11:37', '2021-08-02 13:11:37'),
(2, 1, 'Adipisci deserunt exercitationem voluptates sed ut nostrum.', 'eum-nulla-eos-omnis-blanditiis-vel-est', 'Et incidunt occaecati eos reprehenderit. Praesentium aliquam esse quibusdam ducimus optio est. Ratione expedita rerum suscipit. Et repellat ipsum sit repellat dolorem asperiores blanditiis. Quod illum provident aspernatur et quia. Voluptate quasi quibusdam impedit.', 'images/news.png', '2021-08-02 13:11:37', '2021-08-02 13:11:37'),
(3, 1, 'Nobis rerum accusamus dolores explicabo cumque.', 'at-cum-nostrum-pariatur-ratione-necessitatibus-voluptatem-inventore-repudiandae', 'Ad voluptatem ad itaque reiciendis. Reiciendis harum esse maiores porro sint. Velit et est saepe. Quis quas ut sit aut. Nostrum placeat quisquam voluptas at id velit totam enim. Doloribus voluptates dicta rerum ab sapiente. Ut et maiores vero.', 'images/news.png', '2021-08-02 13:11:37', '2021-08-02 13:11:37'),
(4, 5, 'Harum quo occaecati impedit iusto.', 'distinctio-illum-animi-temporibus-veniam-quo-quam', 'Quibusdam est enim sit facere quia quisquam. Sequi doloremque quae omnis maxime sit repellat nostrum enim. Eos omnis aut vel ut. Est similique earum quos nobis voluptatem quae. Ut maiores sint nihil eum repellendus ut.', 'images/news.png', '2021-08-02 13:11:37', '2021-08-02 13:11:37'),
(5, 1, 'Facilis pariatur cumque et accusamus rerum consequuntur.', 'fuga-quas-quas-ducimus-voluptatem', 'Hic minus at quod iusto quibusdam. Maxime asperiores aut deserunt ut vitae doloribus dolor quibusdam. Et suscipit eos qui voluptatum. Eum repellat non est. Aut doloribus laborum saepe est. Maiores reiciendis sequi aut magni cupiditate sequi et. Autem vitae adipisci ut aliquam velit.', 'images/news.png', '2021-08-02 13:11:37', '2021-08-02 13:11:37'),
(6, 1, 'asdsd', 'asdsd', '<p>sadsadsadsd<img title=\"bg2.jfif\" src=\"/storage/images/CffKjQ3ZjtscSAHUX7uU9RQcbz6NBP4Bl79gZIIr.jpg\" alt=\"\" width=\"1077\" height=\"805\" /></p>', 'images/au78KUjcGQweSo4XQMKBjdluD5EVAmQFWwkSqRMe.jpg', '2021-11-17 19:15:19', '2021-11-17 19:15:19');

-- --------------------------------------------------------

--
-- Struktur dari tabel `post_tag`
--

CREATE TABLE `post_tag` (
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `tag_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `post_tag`
--

INSERT INTO `post_tag` (`post_id`, `tag_id`) VALUES
(6, 2),
(6, 3),
(6, 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tags`
--

CREATE TABLE `tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tags`
--

INSERT INTO `tags` (`id`, `title`, `slug`) VALUES
(1, 'Foster Blanda V', 'hilbert-morar'),
(2, 'Dulce Frami', 'keira-mcclure'),
(3, 'Mr. Isai Kohler', 'mr-jerad-terry'),
(4, 'Juliana Mosciski III', 'maida-hudson'),
(5, 'Emilia Keeling', 'glen-becker-iv');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_admin` tinyint(1) DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `is_admin`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'ramadansyah', 'ramadansyahym7@gmail.com', NULL, '$2y$10$FYGFNz/X7lI8YDl.efTTBOMUizstiJxZdJ10zARan7jecuWMLMeTW', NULL, NULL, NULL, NULL, '2021-08-02 13:12:21', '2021-08-02 13:12:21'),
(2, 'admin', 'admin@gmail.com', NULL, '$2y$10$cMzuVGQ4x2ef5qL5t6oBR.a.FVJwe.QjHAK0KKU9czuw7IH8MZO.a', NULL, NULL, 1, NULL, '2021-08-02 13:18:27', '2021-08-02 13:18:27');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posts_category_id_foreign` (`category_id`);

--
-- Indeks untuk tabel `post_tag`
--
ALTER TABLE `post_tag`
  ADD PRIMARY KEY (`post_id`,`tag_id`),
  ADD KEY `post_tag_tag_id_foreign` (`tag_id`);

--
-- Indeks untuk tabel `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tags`
--
ALTER TABLE `tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Ketidakleluasaan untuk tabel `post_tag`
--
ALTER TABLE `post_tag`
  ADD CONSTRAINT `post_tag_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`),
  ADD CONSTRAINT `post_tag_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
