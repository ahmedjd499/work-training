-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 25 oct. 2023 à 16:45
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
(27, 30, 'Toyota', 'Camry', '2023-10-24 08:48:02'),
(28, 35, 'Honda', 'Civic', '2023-10-24 08:48:02'),
(29, 40, 'Ford', 'Fusion', '2023-10-24 08:48:02'),
(30, 38, 'Chevrolet', 'Malibu', '2023-10-24 08:48:02'),
(31, 45, 'Nissan', 'Altima', '2023-10-24 08:48:02'),
(32, 50, 'Hyundai', 'Elantra', '2023-10-24 08:48:02'),
(33, 33, 'Volkswagen', 'Jetta', '2023-10-24 08:48:02'),
(34, 48, 'BMW', '3 Series', '2023-10-24 08:48:02'),
(35, 55, 'Mercedes-Benz', 'C-Class', '2023-10-24 08:48:02'),
(36, 52, 'Audi', 'A4', '2023-10-24 08:48:02'),
(37, 58, 'Lexus', 'ES', '2023-10-24 08:48:02'),
(38, 60, 'Subaru', 'Impreza', '2023-10-24 08:48:02'),
(39, 42, 'Mazda', 'Mazda3', '2023-10-24 08:48:02'),
(40, 44, 'Kia', 'Optima', '2023-10-24 08:48:02'),
(41, 47, 'Jeep', 'Cherokee', '2023-10-24 08:48:02'),
(42, 65, 'Tesla', 'Model 3', '2023-10-24 08:48:02'),
(43, 70, 'Volvo', 'S60', '2023-10-24 08:48:02'),
(44, 72, 'Acura', 'TLX', '2023-10-24 08:48:02'),
(45, 75, 'Infiniti', 'Q50', '2023-10-24 08:48:02'),
(46, 80, 'Cadillac', 'ATS', '2023-10-24 08:48:02'),
(47, 100, 'peugeot', '404', '2023-10-25 14:25:52');

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
(72, 27, '65378546656c7téléchargement (1).jfif', '2023-10-24 08:50:14'),
(73, 27, '6537854669cd9téléchargement (2).jfif', '2023-10-24 08:50:14'),
(74, 27, '653785466ad96téléchargement (8).jfif', '2023-10-24 08:50:14'),
(75, 27, '6537854670e03téléchargement.jfif', '2023-10-24 08:50:14'),
(76, 28, '65378703d325eimages (1).jfif', '2023-10-24 08:57:39'),
(77, 28, '65378703d781fimages (2).jfif', '2023-10-24 08:57:39'),
(78, 28, '65378703db586images (3).jfif', '2023-10-24 08:57:39'),
(79, 28, '65378703dc70dimages (4).jfif', '2023-10-24 08:57:39'),
(80, 28, '65378703e2bc4images (5).jfif', '2023-10-24 08:57:39'),
(81, 28, '65378703e66c0images.jfif', '2023-10-24 08:57:39'),
(82, 28, '65378703ea363ss.jpg', '2023-10-24 08:57:39'),
(83, 29, '65378ae67ea34ford-fusion.jpg', '2023-10-24 09:14:14'),
(84, 29, '65378ae682b09images (6).jfif', '2023-10-24 09:14:14'),
(85, 29, '65378ae6866ceimages (7).jfif', '2023-10-24 09:14:14'),
(86, 29, '65378ae68a3caimages (8).jfif', '2023-10-24 09:14:14'),
(87, 29, '65378ae68e09dimages (9).jfif', '2023-10-24 09:14:14'),
(88, 30, '65378c7e7b63cimages (1).jfif', '2023-10-24 09:21:02'),
(89, 30, '65378c7e7fcbeimages.jfif', '2023-10-24 09:21:02'),
(90, 30, '65378c7e836d1m.avif', '2023-10-24 09:21:02'),
(91, 30, '65378c7e87563téléchargement (1).jfif', '2023-10-24 09:21:02'),
(92, 30, '65378c7e8af9btéléchargement (2).jfif', '2023-10-24 09:21:02'),
(93, 30, '65378c7e8c369téléchargement.jfif', '2023-10-24 09:21:02'),
(94, 31, '65378e4e5d57dimages (1).jfif', '2023-10-24 09:28:46'),
(95, 31, '65378e4e61a15images.jfif', '2023-10-24 09:28:46'),
(96, 31, '65378e4e657a4nissan-altima-sv-2014_i1.jpg', '2023-10-24 09:28:46'),
(98, 32, '65378e9d4eb59Hyundai-Elantra-2017-1-1200x640-1.jpg', '2023-10-24 09:30:05'),
(99, 32, '65378e9d55272images (1).jfif', '2023-10-24 09:30:05'),
(100, 32, '65378e9d563c1images (2).jfif', '2023-10-24 09:30:05'),
(101, 32, '65378e9d577eeimages.jfif', '2023-10-24 09:30:05'),
(102, 33, '65378edf87305images (3).jfif', '2023-10-24 09:31:11'),
(103, 33, '65378edf8855aimages (4).jfif', '2023-10-24 09:31:11'),
(104, 33, '65378edf89d1bJetta.jpg', '2023-10-24 09:31:11'),
(105, 34, '65378f1b658ectéléchargement (1).jfif', '2023-10-24 09:32:11'),
(106, 34, '65378f1b6a174téléchargement (2).jfif', '2023-10-24 09:32:11'),
(107, 34, '65378f1b6b38ftéléchargement (3).jfif', '2023-10-24 09:32:11'),
(108, 34, '65378f1b71943téléchargement (4).jfif', '2023-10-24 09:32:11'),
(109, 34, '65378f1b75ac9téléchargement.jfif', '2023-10-24 09:32:11'),
(110, 35, '65378fba1ba6eimages (1).jfif', '2023-10-24 09:34:50'),
(111, 35, '65378fba20873images (2).jfif', '2023-10-24 09:34:50'),
(112, 35, '65378fba21aa6images.jfif', '2023-10-24 09:34:50'),
(113, 36, '65378ff9c73a146692.jpg', '2023-10-24 09:35:53'),
(114, 36, '65378ff9cb06eimages (3).jfif', '2023-10-24 09:35:53'),
(115, 36, '65378ff9ceae9images (4).jfif', '2023-10-24 09:35:53'),
(116, 36, '65378ff9cfd04images (5).jfif', '2023-10-24 09:35:53'),
(117, 36, '65378ff9d634cimages (6).jfif', '2023-10-24 09:35:53'),
(118, 37, '65379040654fdes.jpg', '2023-10-24 09:37:04'),
(119, 37, '6537904066f03images (1).jfif', '2023-10-24 09:37:04'),
(120, 37, '6537904067fc7images.jfif', '2023-10-24 09:37:04'),
(121, 37, '6537904068fb7téléchargement.jfif', '2023-10-24 09:37:04'),
(122, 38, '6537907ba0854images.jfif', '2023-10-24 09:38:03'),
(123, 38, '6537907ba4c79Impreza.jpg', '2023-10-24 09:38:03'),
(124, 39, '653790ab43926images (1).jfif', '2023-10-24 09:38:51'),
(125, 39, '653790ab44c20images (2).jfif', '2023-10-24 09:38:51'),
(126, 39, '653790ab45bcfMazda3.jpg', '2023-10-24 09:38:51'),
(127, 40, '653790f47c372images (1).jfif', '2023-10-24 09:40:04'),
(128, 40, '653790f48038fimages (2).jfif', '2023-10-24 09:40:04'),
(129, 40, '653790f4841e5images.jfif', '2023-10-24 09:40:04'),
(130, 40, '653790f487bd1jf_com1_lx_1920x1080.jpg', '2023-10-24 09:40:04'),
(131, 41, '6537912ad3f10Cherokee.jpeg', '2023-10-24 09:40:58'),
(132, 41, '6537912ad85edimages (3).jfif', '2023-10-24 09:40:58'),
(133, 41, '6537912adc253images (4).jfif', '2023-10-24 09:40:58'),
(134, 41, '6537912ae021fimages (5).jfif', '2023-10-24 09:40:58'),
(135, 42, '6537917814b1fimages (1).jfif', '2023-10-24 09:42:16'),
(136, 42, '6537917818ad5images (2).jfif', '2023-10-24 09:42:16'),
(137, 42, '653791781c7e0images.jfif', '2023-10-24 09:42:16'),
(138, 43, '653791c3cc8b5images (1).jfif', '2023-10-24 09:43:31'),
(139, 43, '653791c3d10a7images (2).jfif', '2023-10-24 09:43:31'),
(140, 43, '653791c3d21f1images (3).jfif', '2023-10-24 09:43:31'),
(141, 43, '653791c3d80a5images.jfif', '2023-10-24 09:43:31'),
(142, 44, '65379202d498aimages (1).jfif', '2023-10-24 09:44:34'),
(143, 44, '65379202d5ccaimages (2).jfif', '2023-10-24 09:44:34'),
(144, 44, '65379202d97b8images (3).jfif', '2023-10-24 09:44:34'),
(145, 44, '65379202dd0a9images.jfif', '2023-10-24 09:44:34'),
(146, 44, '65379202de2cbtéléchargement.jfif', '2023-10-24 09:44:34'),
(147, 45, '65379246b373dimages (4).jfif', '2023-10-24 09:45:42'),
(148, 45, '65379246b7557images (5).jfif', '2023-10-24 09:45:42'),
(149, 45, '65379246bb356images (6).jfif', '2023-10-24 09:45:42'),
(150, 45, '65379246bf1d6images (7).jfif', '2023-10-24 09:45:42'),
(151, 45, '65379246c2be2S0-modele--infiniti-q50.jpg', '2023-10-24 09:45:42'),
(152, 46, '6537928d12820257778_2017_Cadillac_ATS.jpg', '2023-10-24 09:46:53'),
(153, 46, '6537928d16670images (1).jfif', '2023-10-24 09:46:53'),
(154, 46, '6537928d1a578images (2).jfif', '2023-10-24 09:46:53'),
(155, 46, '6537928d1df46images (3).jfif', '2023-10-24 09:46:53'),
(156, 46, '6537928d21da7images.jfif', '2023-10-24 09:46:53'),
(157, 47, '65392570d785caa.jpg', '2023-10-25 14:25:52'),
(158, 47, '65392570db518images (4).jfif', '2023-10-25 14:25:52'),
(159, 47, '65392570df187images.jfif', '2023-10-25 14:25:52'),
(160, 43, '653925e605863', '2023-10-25 14:27:50');

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
(43, '2023-10-25 13:05:00', '2023-10-25 14:05:00', 30.00, '2023-10-25 11:05:18', 27, 105),
(44, '2023-10-25 13:10:00', '2023-10-25 14:10:00', 38.00, '2023-10-25 11:12:47', 30, 105),
(45, '2023-10-25 13:12:00', '2023-10-27 14:12:00', 2205.00, '2023-10-25 11:12:56', 31, 105),
(46, '2023-10-20 13:42:00', '2023-10-20 18:42:00', 250.00, '2023-10-25 11:43:13', 32, 105),
(47, '2023-10-25 18:43:00', '2023-10-25 23:43:00', 275.00, '2023-10-25 11:43:42', 35, 105),
(48, '2023-10-22 13:43:00', '2023-10-22 19:43:00', 348.00, '2023-10-25 11:43:59', 37, 105),
(49, '2023-10-23 13:44:00', '2023-10-23 13:44:00', 0.00, '2023-10-25 11:45:00', 29, 105),
(50, '2023-10-24 13:45:00', '2023-10-24 16:45:00', 150.00, '2023-10-25 11:45:12', 32, 105),
(51, '2023-10-25 16:10:00', '2023-10-25 17:10:00', 52.00, '2023-10-25 14:10:51', 36, 111),
(52, '2023-10-25 16:10:00', '2023-10-25 19:10:00', 150.00, '2023-10-25 14:11:02', 32, 111),
(53, '2023-10-25 18:11:00', '2023-10-25 22:11:00', 232.00, '2023-10-25 14:11:26', 37, 111),
(54, '2023-10-18 16:11:00', '2023-10-21 16:11:00', 4680.00, '2023-10-25 14:11:44', 42, 111),
(55, '2023-10-25 16:12:00', '2023-10-29 17:12:00', 4559.00, '2023-10-25 14:12:50', 41, 111);

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
(104, 'admin@admin.admin', '47fff5f8e30e564541d8e1769337590a7050c2d8192f2f385e5cdf83e79246a3', 'admin', '2023-10-25 10:57:28', '6538f4abf179d'),
(105, 'g@g.g', '652f4e78466d7558dc779c92967dd48b70268ed0fed44c803194c0c6d6a60f48', 'user', '2023-10-25 10:58:31', 'default.png'),
(106, 'waqivyk@gmail.com', '4bb01c9949efaf5eca62fcc9bae293b47f99e7154e72946123e6e29f86f568b4', 'user', '2023-10-25 11:00:14', 'default.png'),
(107, 'rebewega@gmail.com', '4bb01c9949efaf5eca62fcc9bae293b47f99e7154e72946123e6e29f86f568b4', 'user', '2023-10-25 11:00:19', 'default.png'),
(108, 'lukucaso@gmail.com', '4bb01c9949efaf5eca62fcc9bae293b47f99e7154e72946123e6e29f86f568b4', 'user', '2023-10-25 11:00:22', 'default.png'),
(110, 'wawi@gmail.com', '4bb01c9949efaf5eca62fcc9bae293b47f99e7154e72946123e6e29f86f568b4', 'user', '2023-10-25 11:00:29', 'default.png'),
(111, 'user@gmail.com', 'e0aad664905f51e971e272eca4b7d4c5d9f95f2d624b9f3a1b1eaa9177f77caf', 'user', '2023-10-25 14:10:37', '6539249e7c289');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT pour la table `car_photos`
--
ALTER TABLE `car_photos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=161;

--
-- AUTO_INCREMENT pour la table `rent`
--
ALTER TABLE `rent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

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
