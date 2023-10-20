-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 19 oct. 2023 à 18:58
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `trainingdb`
--

-- --------------------------------------------------------

--
-- Structure de la table `car`
--

CREATE TABLE `car` (
  `id` int(11) NOT NULL,
  `hourly_price` int(10) NOT NULL,
  `marque` varchar(255) NOT NULL,
  `model` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `car`
--

INSERT INTO `car` (`id`, `hourly_price`, `marque`, `model`, `created_at`) VALUES
(12, 5555, 'Est dignissimos volu', 'aaaaaaaaaa', '2023-10-18 11:43:21'),
(14, 0, 'Dolores et in vel au', 'Nostrud consequatur ', '2023-10-18 11:44:05'),
(15, 0, 'Et eveniet quis ess', 'Ut ullamco odio dolo', '2023-10-18 11:45:23'),
(16, 0, 'Cillum sunt magnam a', 'Qui occaecat elit i', '2023-10-18 11:47:14'),
(17, 0, 'Et alias tenetur nat', 'Omnis deserunt fugia', '2023-10-18 11:47:52'),
(18, 564, 'Voluptatum duis et e', 'Veniam laborum Est', '2023-10-18 11:49:11'),
(19, 968, 'Adipisci officiis et', 'Temporibus delectus', '2023-10-18 13:59:05'),
(20, 204, 'Ullamco et temporibu', 'Fugiat quae sapiente', '2023-10-18 13:59:17'),
(21, 555, 'zzzzzzzzzzzzz', 'Officia sed expedita', '2023-10-18 15:09:03'),
(22, 555, 'BMW', 'x5', '2023-10-18 15:48:15'),
(23, 509, 'At voluptatibus ut e', 'Sunt non laudantium', '2023-10-18 15:49:40'),
(24, 622, 'nm', 'Nisi enim veniam re', '2023-10-19 08:55:48'),
(25, 1000, 'BMW', 'X5', '2023-10-19 08:56:31');

-- --------------------------------------------------------

--
-- Structure de la table `car_photos`
--

CREATE TABLE `car_photos` (
  `id` int(11) NOT NULL,
  `car_id` int(11) DEFAULT NULL,
  `path` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `car_photos`
--

INSERT INTO `car_photos` (`id`, `car_id`, `path`, `created_at`) VALUES
(1, 14, '652fc50579e02images.png', '2023-10-18 11:44:05'),
(2, 14, '652fc505813c1pp.jfif', '2023-10-18 11:44:05'),
(3, 15, '652fc553ef462draft.png', '2023-10-18 11:45:23'),
(4, 15, '652fc553f30b5Facebook-transformez-votre-photo-de-profil-en-emoticone.jpg', '2023-10-18 11:45:24'),
(5, 15, '652fc55402cefimages.png', '2023-10-18 11:45:24'),
(6, 15, '652fc55406707pp.jfif', '2023-10-18 11:45:24'),
(7, 16, '652fc5c22e2addraft.png', '2023-10-18 11:47:14'),
(8, 16, '652fc5c22f458Facebook-transformez-votre-photo-de-profil-en-emoticone.jpg', '2023-10-18 11:47:14'),
(9, 16, '652fc5c230653images.png', '2023-10-18 11:47:14'),
(10, 16, '652fc5c2317aapp.jfif', '2023-10-18 11:47:14'),
(11, 17, '652fc5e825b6f', '2023-10-18 11:47:52'),
(12, 18, '652fc63795bed', '2023-10-18 11:49:11'),
(13, 19, '652fe4a9b9dcedraft.png', '2023-10-18 13:59:05'),
(14, 20, '652fe4b50b0db', '2023-10-18 13:59:17'),
(15, 21, '652ff50f4f8fedraft.png', '2023-10-18 15:09:03'),
(16, 21, '652ff50f530a8Facebook-transformez-votre-photo-de-profil-en-emoticone.jpg', '2023-10-18 15:09:03'),
(17, 21, '652ff50f5430fimages.png', '2023-10-18 15:09:03'),
(18, 21, '652ff50f5aa70pp.jfif', '2023-10-18 15:09:03'),
(19, 22, '652ffe3f51109téléchargement (4).jfif', '2023-10-18 15:48:15'),
(20, 22, '652ffe3f5230etéléchargement (3).jfif', '2023-10-18 15:48:15'),
(21, 22, '652ffe3f5345ftéléchargement (2).jfif', '2023-10-18 15:48:15'),
(22, 22, '652ffe3f547c9téléchargement (1).jfif', '2023-10-18 15:48:15'),
(23, 22, '652ffe3f55a6dtéléchargement.jfif', '2023-10-18 15:48:15'),
(24, 22, '652ffe3f56aafrr.jpg', '2023-10-18 15:48:15'),
(27, 23, '652ffe946ef03téléchargement (2).jfif', '2023-10-18 15:49:40'),
(28, 23, '652ffe946ffdatéléchargement (1).jfif', '2023-10-18 15:49:40'),
(29, 23, '652ffe9471414téléchargement.jfif', '2023-10-18 15:49:40'),
(33, 23, '6530ec5543b13rr.jpg', '2023-10-19 08:44:05'),
(36, 23, '6530ee498db47rr.jpg', '2023-10-19 08:52:25'),
(37, 23, '6530ee498f0fcdraft.png', '2023-10-19 08:52:25'),
(38, 23, '6530ee4990306Facebook-transformez-votre-photo-de-profil-en-emoticone.jpg', '2023-10-19 08:52:25'),
(39, 24, '6530ef14494aftéléchargement (3).jfif', '2023-10-19 08:55:48'),
(40, 24, '6530ef144a7fdtéléchargement (2).jfif', '2023-10-19 08:55:48'),
(41, 24, '6530ef144b7e5téléchargement (1).jfif', '2023-10-19 08:55:48'),
(42, 25, '6530ef3fb5226téléchargement (2).jfif', '2023-10-19 08:56:31'),
(43, 25, '6530ef3fb659dtéléchargement (1).jfif', '2023-10-19 08:56:31'),
(44, 25, '6530ef3fb77d8téléchargement.jfif', '2023-10-19 08:56:31'),
(46, 25, '6530f2998502ftéléchargement (2).jfif', '2023-10-19 09:10:49'),
(47, 25, '6530f2998602ftéléchargement (1).jfif', '2023-10-19 09:10:49'),
(49, 25, '653129122f2d1rr.jpg', '2023-10-19 13:03:14'),
(52, 25, '65312a8d10f3f', '2023-10-19 13:09:33');

-- --------------------------------------------------------

--
-- Structure de la table `rent`
--

CREATE TABLE `rent` (
  `id` int(11) NOT NULL,
  `rent_start` datetime NOT NULL,
  `rent_end` datetime NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `car_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `rent`
--

INSERT INTO `rent` (`id`, `rent_start`, `rent_end`, `total_price`, `created_at`, `car_id`, `user_id`) VALUES
(9, '2023-10-19 12:10:00', '2023-10-19 13:10:00', 5555.00, '2023-10-19 11:10:08', 12, 81),
(10, '2023-10-19 12:25:00', '2023-10-28 12:25:00', 1199880.00, '2023-10-19 11:25:34', 12, 81),
(11, '2023-10-19 12:38:00', '2023-10-19 17:38:00', 0.00, '2023-10-19 11:38:06', 14, 81),
(12, '2023-10-19 17:19:00', '2023-10-28 14:19:00', 1183215.00, '2023-10-19 13:20:00', 12, 79),
(13, '2023-10-19 17:19:00', '2023-10-28 14:19:00', 1183215.00, '2023-10-19 13:20:07', 12, 79),
(14, '2023-10-19 17:19:00', '2023-10-28 14:19:00', 1183215.00, '2023-10-19 13:20:39', 12, 79),
(15, '2023-10-22 14:20:00', '2023-11-04 14:20:00', 1733160.00, '2023-10-19 13:20:47', 12, 79),
(16, '1970-01-01 01:00:00', '1970-01-01 01:00:00', 0.00, '2023-10-19 16:10:30', 15, 79),
(17, '1970-01-01 01:00:00', '1970-01-01 01:00:00', 0.00, '2023-10-19 16:12:22', 16, 79),
(18, '1970-01-01 01:00:00', '1970-01-01 01:00:00', 0.00, '2023-10-19 16:12:40', 17, 79);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `role`, `created_at`, `photo`) VALUES
(73, 'pepynero@mailinator.com', '09e951436e4e8bc4122e1f47acde9ed4448b346f0828a77a5721436e9c60f502', 'user', '2023-10-18 09:57:38', 'default.png'),
(74, 'jyxeholo@mailinator.com', '09e951436e4e8bc4122e1f47acde9ed4448b346f0828a77a5721436e9c60f502', 'user', '2023-10-18 09:57:43', 'default.png'),
(75, 'qihyhedi@mailinator.com', '09e951436e4e8bc4122e1f47acde9ed4448b346f0828a77a5721436e9c60f502', 'user', '2023-10-18 09:57:55', '652fac22eed18draft.png'),
(76, 'tivojohy@mailinator.com', '09e951436e4e8bc4122e1f47acde9ed4448b346f0828a77a5721436e9c60f502', 'user', '2023-10-18 09:58:01', '652fac29c5220pp.jfif'),
(77, 'gyre@mailinator.com', '09e951436e4e8bc4122e1f47acde9ed4448b346f0828a77a5721436e9c60f502', 'user', '2023-10-18 09:58:09', '652fac31aa00cimages.png'),
(78, 'dejibyxax@mailinator.com', '09e951436e4e8bc4122e1f47acde9ed4448b346f0828a77a5721436e9c60f502', 'user', '2023-10-18 11:51:29', '652fc6c195f47draft.png'),
(79, 'fygyc@mailinator.com', '09e951436e4e8bc4122e1f47acde9ed4448b346f0828a77a5721436e9c60f502', 'user', '2023-10-18 11:51:58', '652fc6de282f7pp.jfif'),
(80, 'zz@mailinator.com', '6873a14337cf6ef5864889426458a8bb321a93d8e6ed4e6d3fade7a2a5506b36', 'admin', '2023-10-18 13:49:14', '65300254eaf13téléchargement (1).jfif'),
(81, 'a@mailinator.com', '9deb571cef40597c7d280b894a9a50549428f2b89f4a2100a9612f9393a3f117', 'admin', '2023-10-19 08:16:07', 'default.png');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `car`
--
ALTER TABLE `car`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `car_photos`
--
ALTER TABLE `car_photos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `car_id` (`car_id`);

--
-- Index pour la table `rent`
--
ALTER TABLE `rent`
  ADD PRIMARY KEY (`id`),
  ADD KEY `car_id` (`car_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `car`
--
ALTER TABLE `car`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT pour la table `car_photos`
--
ALTER TABLE `car_photos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT pour la table `rent`
--
ALTER TABLE `rent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `car_photos`
--
ALTER TABLE `car_photos`
  ADD CONSTRAINT `car_photos_ibfk_1` FOREIGN KEY (`car_id`) REFERENCES `car` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `rent`
--
ALTER TABLE `rent`
  ADD CONSTRAINT `rent_ibfk_1` FOREIGN KEY (`car_id`) REFERENCES `car` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `rent_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
