-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mar. 25 déc. 2018 à 14:43
-- Version du serveur :  10.1.31-MariaDB
-- Version de PHP :  7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `capsadomotique`
--

-- --------------------------------------------------------

--
-- Structure de la table `container`
--

DROP TABLE IF EXISTS `container`;
CREATE TABLE `container` (
  `id_container` int(11) NOT NULL,
  `id_container_type` int(11) NOT NULL,
  `date_acquisition` datetime NOT NULL,
  `date_fin` datetime DEFAULT NULL,
  `libelle` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `container`
--

INSERT INTO `container` (`id_container`, `id_container_type`, `date_acquisition`, `date_fin`, `libelle`) VALUES
(1, 1, '2018-12-22 00:00:00', NULL, 'Genelec-01'),
(2, 1, '2018-12-22 00:00:00', NULL, 'Edf-00'),
(9, 1, '2018-12-24 00:00:00', NULL, 'test'),
(14, 1, '2018-12-25 00:00:00', NULL, 'AT-AT');

-- --------------------------------------------------------

--
-- Structure de la table `container_type`
--

DROP TABLE IF EXISTS `container_type`;
CREATE TABLE `container_type` (
  `id_container_type` int(11) NOT NULL,
  `container_type_libelle` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `container_type`
--

INSERT INTO `container_type` (`id_container_type`, `container_type_libelle`) VALUES
(1, 'Gen_electric');

-- --------------------------------------------------------

--
-- Structure de la table `many_vue_container`
--

DROP TABLE IF EXISTS `many_vue_container`;
CREATE TABLE `many_vue_container` (
  `id_container` int(11) NOT NULL,
  `id_vue` int(11) NOT NULL,
  `date_ajout` datetime NOT NULL,
  `date_sortie` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `many_vue_container`
--

INSERT INTO `many_vue_container` (`id_container`, `id_vue`, `date_ajout`, `date_sortie`) VALUES
(1, 1, '2018-12-22 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `module_electricite`
--

DROP TABLE IF EXISTS `module_electricite`;
CREATE TABLE `module_electricite` (
  `id_module-elctricite` int(11) NOT NULL,
  `consommation` float NOT NULL,
  `date_changement` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `module_electricite`
--

INSERT INTO `module_electricite` (`id_module-elctricite`, `consommation`, `date_changement`) VALUES
(1, 13.35, '2018-12-22 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `vue`
--

DROP TABLE IF EXISTS `vue`;
CREATE TABLE `vue` (
  `id_vue` int(11) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `vue`
--

INSERT INTO `vue` (`id_vue`, `password`) VALUES
(1, 'azerty');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `container`
--
ALTER TABLE `container`
  ADD PRIMARY KEY (`id_container`);

--
-- Index pour la table `container_type`
--
ALTER TABLE `container_type`
  ADD PRIMARY KEY (`id_container_type`);

--
-- Index pour la table `many_vue_container`
--
ALTER TABLE `many_vue_container`
  ADD PRIMARY KEY (`id_container`,`id_vue`);

--
-- Index pour la table `module_electricite`
--
ALTER TABLE `module_electricite`
  ADD PRIMARY KEY (`id_module-elctricite`);

--
-- Index pour la table `vue`
--
ALTER TABLE `vue`
  ADD PRIMARY KEY (`id_vue`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `container`
--
ALTER TABLE `container`
  MODIFY `id_container` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `container_type`
--
ALTER TABLE `container_type`
  MODIFY `id_container_type` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `module_electricite`
--
ALTER TABLE `module_electricite`
  MODIFY `id_module-elctricite` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `vue`
--
ALTER TABLE `vue`
  MODIFY `id_vue` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
