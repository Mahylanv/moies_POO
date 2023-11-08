-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : lun. 06 nov. 2023 à 21:57
-- Version du serveur : 10.6.12-MariaDB-0ubuntu0.22.04.1
-- Version de PHP : 8.1.2-1ubuntu2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `movies`
--

-- --------------------------------------------------------

--
-- Structure de la table `characters`
--

CREATE TABLE `characters` (
  `id` int(11) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `modified` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `name` varchar(50) NOT NULL,
  `movie_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `characters`
--

INSERT INTO `characters` (`id`, `created`, `modified`, `name`, `movie_id`) VALUES
(6, '2023-11-06 21:43:30', '2023-11-06 21:43:30', 'Romeo', 4),
(7, '2023-11-06 21:43:36', '2023-11-06 21:43:36', 'Juliette', 4),
(9, '2023-11-06 21:44:28', '2023-11-06 21:44:28', 'Harry', 6),
(10, '2023-11-06 21:44:34', '2023-11-06 21:44:34', 'Hermione', 6),
(11, '2023-11-06 21:44:37', '2023-11-06 21:44:37', 'Ron', 6),
(12, '2023-11-06 21:44:59', '2023-11-06 21:44:59', 'Dumbledore', 6),
(13, '2023-11-06 21:45:27', '2023-11-06 21:45:27', 'Malfoy', 6),
(14, '2023-11-06 21:45:35', '2023-11-06 21:45:35', 'Voldemor', 6),
(15, '2023-11-06 21:46:10', '2023-11-06 21:46:10', 'Hagrid', 6),
(16, '2023-11-06 21:47:09', '2023-11-06 21:47:09', 'Newt scamander', 7),
(17, '2023-11-06 21:47:15', '2023-11-06 21:47:15', 'Dumbledore', 7),
(18, '2023-11-06 21:47:38', '2023-11-06 21:47:38', 'Tina goldstein', 7),
(19, '2023-11-06 21:49:13', '2023-11-06 21:49:13', 'Padme', 8),
(20, '2023-11-06 21:49:18', '2023-11-06 21:49:18', 'Anakin', 8),
(21, '2023-11-06 21:49:33', '2023-11-06 21:49:33', 'Obi-wan', 8),
(22, '2023-11-06 21:49:37', '2023-11-06 21:49:37', 'Yoda', 8),
(23, '2023-11-06 21:49:44', '2023-11-06 21:49:44', 'R2-d2', 8),
(24, '2023-11-06 21:49:48', '2023-11-06 21:49:48', 'C3po', 8),
(25, '2023-11-06 21:50:11', '2023-11-06 21:50:11', 'Palpatine', 8),
(26, '2023-11-06 21:53:16', '2023-11-06 21:53:57', 'The rock', 5),
(27, '2023-11-06 21:57:32', '2023-11-06 21:57:32', 'Darth vador', 8);

-- --------------------------------------------------------

--
-- Structure de la table `genres`
--

CREATE TABLE `genres` (
  `id` int(11) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `modified` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `genres`
--

INSERT INTO `genres` (`id`, `created`, `modified`, `name`) VALUES
(1, '2023-11-03 16:38:52', '2023-11-05 20:55:05', 'Action'),
(2, '2023-11-03 16:40:10', '2023-11-03 16:40:10', 'Romantique'),
(3, '2023-11-05 20:56:00', '2023-11-05 20:59:01', 'Aventure'),
(6, '2023-11-06 21:34:52', '2023-11-06 21:34:52', 'Animaux'),
(7, '2023-11-06 21:36:49', '2023-11-06 21:36:49', 'Magie');

-- --------------------------------------------------------

--
-- Structure de la table `movies`
--

CREATE TABLE `movies` (
  `id` int(11) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `modified` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `title` varchar(50) NOT NULL,
  `imdb` varchar(20) NOT NULL,
  `gender_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `movies`
--

INSERT INTO `movies` (`id`, `created`, `modified`, `title`, `imdb`, `gender_id`) VALUES
(4, '2023-11-06 15:53:58', '2023-11-06 15:53:58', 'Roméo et juliette', 'tt0117509', 2),
(5, '2023-11-06 21:37:37', '2023-11-06 21:41:57', 'Jumanji', 'tt2283362', 3),
(6, '2023-11-06 21:44:18', '2023-11-06 21:44:18', 'Harry potter', 'tt0241527', 7),
(7, '2023-11-06 21:46:50', '2023-11-06 21:46:50', 'Les animaux fantastiques', 'tt4123432', 6),
(8, '2023-11-06 21:49:07', '2023-11-06 21:49:07', 'Star wars', 'tt0121766', 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `characters`
--
ALTER TABLE `characters`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `characters`
--
ALTER TABLE `characters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT pour la table `genres`
--
ALTER TABLE `genres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `movies`
--
ALTER TABLE `movies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
