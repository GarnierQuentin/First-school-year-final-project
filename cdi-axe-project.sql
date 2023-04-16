-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : dim. 16 avr. 2023 à 21:39
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
  `image` text COLLATE utf8mb4_general_ci,
  `tag` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `thumb_up` int NOT NULL,
  `date` datetime NOT NULL,
  `user_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `post`
--

INSERT INTO `post` (`id`, `content`, `image`, `tag`, `thumb_up`, `date`, `user_id`) VALUES
(133, 'Quand tu dois rendre ton projet de semaine de renfo dans moins d\'1h et qu\'il te manque les posts :', 'panique_y_a_t_il_un_pilote_dans_l_avion.gif', 'Tech', 0, '2023-04-16 21:20:52', 2),
(134, 'Je crois faut faire des posts pour qu\'Alexis puisse tester les tags après...', NULL, 'Art', 0, '2023-04-16 21:22:31', 3),
(136, 'Téma les stats', 'record de tout sur Paladins.png', 'JeuxVidéo', 0, '2023-04-16 21:27:25', 3),
(138, 'Quand je vois Thomas dans le même groupe que moi :', 'spider_thomas.png', 'Culture', 0, '2023-04-16 21:30:54', 2),
(139, 'En vrai il est trop beau mon Papyrus !', 'Sans titre.png', 'Art', 0, '2023-04-16 21:32:31', 4),
(141, 'Quand tu te rend compte que y a la date complète sous les posts avec H-2 (il est actuellement 23h36)', 'chaleur-sweating.gif', 'Sport', 0, '2023-04-16 21:36:47', 2);

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
(3, 'Jean', 'Guuaannew0.7', 'CannaJ', 'bblblblblblbl@bl.sk', '$2y$10$SYIdLRNOkYEt98mr0/StPuczpUZvQoayqr74V9489hOo/7Ek03O9u', 'https://fastly.picsum.photos/id/455/200/200.jpg?hmac=YZhCbBjCYF0ha5dR9ElToDVwWcw05w0e4pAv5S9nZYg'),
(4, 'Jean', 'Paul', 'JP', 'jp@gmail.com', '$2y$10$5vj4Sl88Pscppmf4sPQeT.Wgl1VwayI828zi9MwaygVUfVqwI7Etm', 'https://img.freepik.com/photos-gratuite/jetee-au-bord-lac-hallstatt-autriche_181624-44201.jpg');

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
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=142;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
