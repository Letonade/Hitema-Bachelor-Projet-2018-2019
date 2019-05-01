-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 01 mai 2019 à 15:15
-- Version du serveur :  5.7.21
-- Version de PHP :  7.2.4

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
CREATE DATABASE IF NOT EXISTS `capsadomotique` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `capsadomotique`;

-- --------------------------------------------------------

--
-- Structure de la table `container`
--

DROP TABLE IF EXISTS `container`;
CREATE TABLE IF NOT EXISTS `container` (
  `id_container` int(11) NOT NULL AUTO_INCREMENT,
  `id_container_type` int(11) NOT NULL,
  `date_acquisition` datetime NOT NULL,
  `date_fin` datetime DEFAULT NULL,
  `libelle` varchar(255) NOT NULL,
  PRIMARY KEY (`id_container`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `container`
--

INSERT INTO `container` (`id_container`, `id_container_type`, `date_acquisition`, `date_fin`, `libelle`) VALUES
(1, 1, '2018-12-22 00:00:00', NULL, 'Genelec-01'),
(2, 1, '2018-12-22 00:00:00', NULL, 'Edf-00'),
(3, 1, '2018-12-24 00:00:00', NULL, 'test'),
(4, 1, '2018-12-25 00:00:00', NULL, 'AT-AT');

-- --------------------------------------------------------

--
-- Structure de la table `container_type`
--

DROP TABLE IF EXISTS `container_type`;
CREATE TABLE IF NOT EXISTS `container_type` (
  `id_container_type` int(11) NOT NULL AUTO_INCREMENT,
  `container_type_libelle` varchar(255) NOT NULL,
  PRIMARY KEY (`id_container_type`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

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
CREATE TABLE IF NOT EXISTS `many_vue_container` (
  `id_container` int(11) NOT NULL,
  `id_vue` int(11) NOT NULL,
  `date_ajout` datetime NOT NULL,
  `date_sortie` datetime DEFAULT NULL,
  PRIMARY KEY (`id_container`,`id_vue`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `many_vue_container`
--

INSERT INTO `many_vue_container` (`id_container`, `id_vue`, `date_ajout`, `date_sortie`) VALUES
(1, 1, '2018-12-22 00:00:00', NULL),
(2, 1, '2019-01-25 00:00:00', NULL),
(3, 1, '2019-01-25 00:00:00', NULL),
(4, 1, '2019-01-25 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `module_electricite`
--

DROP TABLE IF EXISTS `module_electricite`;
CREATE TABLE IF NOT EXISTS `module_electricite` (
  `id_module_electricite` int(11) NOT NULL AUTO_INCREMENT,
  `consommation` float NOT NULL,
  `date_changement` datetime DEFAULT NULL,
  `id_container` int(11) NOT NULL,
  PRIMARY KEY (`id_module_electricite`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `module_electricite`
--

INSERT INTO `module_electricite` (`id_module_electricite`, `consommation`, `date_changement`, `id_container`) VALUES
(11, 127.256, '2019-01-01 00:00:00', 1),
(12, 1554.11, '2019-01-08 00:00:00', 1),
(17, 1700.53, '2019-01-24 00:00:00', 2),
(18, 1700.53, '2019-01-24 00:00:00', 2);

-- --------------------------------------------------------

--
-- Structure de la table `module_gaz`
--

DROP TABLE IF EXISTS `module_gaz`;
CREATE TABLE IF NOT EXISTS `module_gaz` (
  `id_module_gaz` int(11) NOT NULL,
  `consomation` int(11) NOT NULL,
  `date_changement` date DEFAULT NULL,
  `id_container` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_module_gaz`),
  KEY `id_container` (`id_container`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `module_gaz`
--

INSERT INTO `module_gaz` (`id_module_gaz`, `consomation`, `date_changement`, `id_container`) VALUES
(1, 12, '2019-03-07', 2),
(2, 24, '2019-03-05', 1),
(4, 56, '2019-03-05', 1);

-- --------------------------------------------------------

--
-- Structure de la table `vue`
--

DROP TABLE IF EXISTS `vue`;
CREATE TABLE IF NOT EXISTS `vue` (
  `id_vue` int(11) NOT NULL AUTO_INCREMENT,
  `password` varchar(255) NOT NULL,
  `vue_name` varchar(15) NOT NULL,
  `last_actif_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id_vue`),
  UNIQUE KEY `nomUnique` (`vue_name`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `vue`
--

INSERT INTO `vue` (`id_vue`, `password`, `vue_name`, `last_actif_date`) VALUES
(1, '$2y$10$2/SnV6e1uUvkoyfT7p.ZrukerQigZSa9IfluYOVaS8jDjAgml8lgS', 'Pass-azerty', '0000-00-00 00:00:00'),
(2, '$2y$10$pexLnKIcwbe5uRWg2E/kpO0kRLiDj6d6kzckj5bq.j15qAVkBlkMe', 'Pass-Pass', NULL),
(3, '$2y$10$d0.l7VoFiBLfSChX8OapX.t.NSoqS15ujB3r2Vq0/ZiQ5wVEGVTGm', 'Pass-Test', '2019-01-22 12:25:05');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
