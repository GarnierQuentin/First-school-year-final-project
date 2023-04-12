-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : mer. 12 avr. 2023 à 23:24
-- Version du serveur : 8.0.30
-- Version de PHP : 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `cdi-axe-project`
--

-- --------------------------------------------------------

--
-- Structure de la table `post`
--

CREATE TABLE `post` (
  `id` int NOT NULL,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tag` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `thumb_up` int NOT NULL,
  `date` datetime NOT NULL,
  `user_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `post`
--

INSERT INTO `post` (`id`, `content`, `tag`, `thumb_up`, `date`, `user_id`) VALUES
(5, 'gbg', 'Anime', 0, '2023-04-11 10:52:22', 3),
(7, 'test 2', 'Tech', 0, '2023-04-12 17:46:57', 2),
(8, 'test', 'Litterature', 0, '2023-04-12 19:10:50', 2),
(9, 'J\'adore les robots', 'Tech', 0, '2023-04-12 23:01:08', 2),
(11, 'jh', 'Jeux vidéo', 0, '2023-04-12 23:01:47', 2),
(12, 'kjkjkkj', 'Culture', 0, '2023-04-12 23:02:09', 2),
(13, 'fjfj tfjtfjtfjtf', 'Histoire', 0, '2023-04-12 23:02:20', 2),
(14, 'vskvgsvksur g', 'Cinema', 0, '2023-04-12 23:02:39', 2),
(15, 'yfyiyf iy', 'Litterature', 0, '2023-04-12 23:02:50', 2),
(16, ',hgkh gkg', 'Musique', 0, '2023-04-12 23:03:36', 2),
(17, 'ngcngfcgnfc', 'Sondage', 0, '2023-04-12 23:03:44', 2);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `prenom` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nom` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `pseudo` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `mail` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `mdp` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `profile_picture` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `prenom`, `nom`, `pseudo`, `mail`, `mdp`, `profile_picture`) VALUES
(2, 'Quentin', 'Garnier', 'Finex', 'garnierquentin92320@gmail.com', '$2y$10$6792UhAJrYpLWJEf1hC5yOAM.Qn25342saiV2GhEEbzsib3BGmlVm', 'https://fastly.picsum.photos/id/670/200/200.jpg?hmac=r8TCUI8W_ykYaZnXA3SXAoh2eXVWEefFjjZ2VsLJBXg'),
(3, 'Jean', 'Guuaannew0.7', 'CannaJ', 'bblblblblblbl@bl.sk', '$2y$10$SYIdLRNOkYEt98mr0/StPuczpUZvQoayqr74V9489hOo/7Ek03O9u', 'https://fastly.picsum.photos/id/455/200/200.jpg?hmac=YZhCbBjCYF0ha5dR9ElToDVwWcw05w0e4pAv5S9nZYg');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `post`
--
ALTER TABLE `post`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
