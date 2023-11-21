-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : jeu. 12 oct. 2023 à 16:23
-- Version du serveur : 8.0.33-0ubuntu0.22.04.2
-- Version de PHP : 8.1.2-1ubuntu2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `agriculture`
--

-- --------------------------------------------------------

--
-- Structure de la table `arrondissement`
--

CREATE TABLE `arrondissement` (
  `id` int NOT NULL,
  `nom_a` varchar(100) NOT NULL,
  `id_c` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `arrondissement`
--

INSERT INTO `arrondissement` (`id`, `nom_a`, `id_c`) VALUES
(1, 'Donwari', 1),
(2, 'Sonsoro', 1),
(3, 'Kassakou', 1),
(4, 'Angaradébou', 1),
(5, 'Sam', 1),
(6, 'Kandi1', 1),
(7, 'Kandi2', 1),
(8, 'Kandi3', 1),
(9, 'Béssékou', 1);

-- --------------------------------------------------------

--
-- Structure de la table `commune`
--

CREATE TABLE `commune` (
  `id` int NOT NULL,
  `nom_c` varchar(100) NOT NULL,
  `id_d` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `commune`
--

INSERT INTO `commune` (`id`, `nom_c`, `id_d`) VALUES
(1, 'Kandi', 1),
(2, 'Segbana', 1),
(3, 'Banikoara', 1),
(4, 'Malanville', 1),
(5, 'Natitingou', 2),
(6, 'Parakou', 3),
(7, 'Bébérékè', 3),
(8, 'Djougou', 3),
(9, 'Nikki', 3),
(10, 'Cotonou', 4),
(11, 'Sèmèkpodji', 4),
(12, 'Savè', 5),
(13, 'Dassa-Zoumè', 5);

-- --------------------------------------------------------

--
-- Structure de la table `departement`
--

CREATE TABLE `departement` (
  `id` int NOT NULL,
  `nom_d` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `departement`
--

INSERT INTO `departement` (`id`, `nom_d`) VALUES
(1, 'Alibori'),
(2, 'Atacora'),
(3, 'Borgou'),
(4, 'Littoral'),
(5, 'Colline'),
(6, 'Mono');

-- --------------------------------------------------------

--
-- Structure de la table `filiere`
--

CREATE TABLE `filiere` (
  `codfil` varchar(10) NOT NULL,
  `nom_f` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `filiere`
--

INSERT INTO `filiere` (`codfil`, `nom_f`) VALUES
('BFA', 'Banque Finance et Assurance'),
('CBG', 'Comptabilité Banque et Gestion'),
('CE', 'Communication d\'Entreprise'),
('SIL', 'Systèmes Informatiques et Logiciels');

-- --------------------------------------------------------

--
-- Structure de la table `cluster`
--

CREATE TABLE `cluster` (
  `id` int NOT NULL,
  `nom` varchar(20) NOT NULL,
  `id_f` varchar(10) NOT NULL,
  `id_v` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `cluster`
--

INSERT INTO `cluster` (`id`, `nom`, `id_f`, `id_v`) VALUES
(1, 'Bana', 'SIL', 7);

-- --------------------------------------------------------

--
-- Structure de la table `village`
--

CREATE TABLE `village` (
  `id` int NOT NULL,
  `nom_v` varchar(100) NOT NULL,
  `id_a` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `village`
--

INSERT INTO `village` (`id`, `nom_v`, `id_a`) VALUES
(1, 'Dinin', 1),
(2, 'Mongo', 1),
(3, 'Tissarou', 1),
(4, 'Gambanin', 1),
(5, 'Yowogou', 2),
(6, 'Sinawongourou', 2),
(7, 'Padé', 3),
(8, 'Gourounagourô', 3),
(9, 'Tia', 4),
(10, 'Ganssosso', 6),
(11, 'Damandi', 6),
(12, 'Kéféri', 6),
(13, 'Bakara', 7);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `arrondissement`
--
ALTER TABLE `arrondissement`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comne_arrond` (`id_c`);

--
-- Index pour la table `commune`
--
ALTER TABLE `commune`
  ADD PRIMARY KEY (`id`),
  ADD KEY `deprt_comne` (`id_d`);

--
-- Index pour la table `departement`
--
ALTER TABLE `departement`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `filiere`
--
ALTER TABLE `filiere`
  ADD PRIMARY KEY (`codfil`);

--
-- Index pour la table `cluster`
--
ALTER TABLE `cluster`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `village`
--
ALTER TABLE `village`
  ADD PRIMARY KEY (`id`),
  ADD KEY `arrond_vilge` (`id_a`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `arrondissement`
--
ALTER TABLE `arrondissement`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `commune`
--
ALTER TABLE `commune`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `departement`
--
ALTER TABLE `departement`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `cluster`
--
ALTER TABLE `cluster`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `village`
--
ALTER TABLE `village`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `arrondissement`
--
ALTER TABLE `arrondissement`
  ADD CONSTRAINT `comne_arrond` FOREIGN KEY (`id_c`) REFERENCES `commune` (`id`);

--
-- Contraintes pour la table `commune`
--
ALTER TABLE `commune`
  ADD CONSTRAINT `deprt_comne` FOREIGN KEY (`id_d`) REFERENCES `departement` (`id`);

--
-- Contraintes pour la table `village`
--
ALTER TABLE `village`
  ADD CONSTRAINT `arrond_vilge` FOREIGN KEY (`id_a`) REFERENCES `arrondissement` (`id`);

  --
-- Contraintes pour la table `cluster`
--
ALTER TABLE `cluster`
  ADD CONSTRAINT `fil_clust` FOREIGN KEY (`id_f`) REFERENCES `filiere` (`codfil`),
  ADD CONSTRAINT `vilge_clust` FOREIGN KEY (`id_v`) REFERENCES `village` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
