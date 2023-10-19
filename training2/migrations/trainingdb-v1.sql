-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 18 oct. 2023 à 12:02
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
(72, 'zzz@mailinator.com', '9deb571cef40597c7d280b894a9a50549428f2b89f4a2100a9612f9393a3f117', 'admin', '2023-10-18 09:54:55', 'default.png'),
(73, 'pepynero@mailinator.com', '09e951436e4e8bc4122e1f47acde9ed4448b346f0828a77a5721436e9c60f502', 'user', '2023-10-18 09:57:38', 'default.png'),
(74, 'jyxeholo@mailinator.com', '09e951436e4e8bc4122e1f47acde9ed4448b346f0828a77a5721436e9c60f502', 'user', '2023-10-18 09:57:43', 'default.png'),
(75, 'qihyhedi@mailinator.com', '09e951436e4e8bc4122e1f47acde9ed4448b346f0828a77a5721436e9c60f502', 'user', '2023-10-18 09:57:55', '652fac22eed18draft.png'),
(76, 'tivojohy@mailinator.com', '09e951436e4e8bc4122e1f47acde9ed4448b346f0828a77a5721436e9c60f502', 'user', '2023-10-18 09:58:01', '652fac29c5220pp.jfif'),
(77, 'gyre@mailinator.com', '09e951436e4e8bc4122e1f47acde9ed4448b346f0828a77a5721436e9c60f502', 'user', '2023-10-18 09:58:09', '652fac31aa00cimages.png');

--
-- Index pour les tables déchargées
--

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
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
