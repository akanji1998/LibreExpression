-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mar. 03 juin 2025 à 22:03
-- Version du serveur :  5.7.19
-- Version de PHP :  7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `forum_db`
--

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

DROP TABLE IF EXISTS `commentaire`;
CREATE TABLE IF NOT EXISTS `commentaire` (
  `id_comment` int(11) NOT NULL AUTO_INCREMENT,
  `id_post` varchar(255) COLLATE utf8_bin NOT NULL,
  `author_comment` varchar(255) COLLATE utf8_bin NOT NULL,
  `msg_comment` text COLLATE utf8_bin NOT NULL,
  `date_comment` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_comment`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `commentaire`
--

INSERT INTO `commentaire` (`id_comment`, `id_post`, `author_comment`, `msg_comment`, `date_comment`) VALUES
(22, '30', 'thebesty', 'super', '2022-10-20 06:26:59'),
(21, '29', 'kader', 'ok c&amp;#039;est bien', '2022-07-05 17:39:38');

-- --------------------------------------------------------

--
-- Structure de la table `postes`
--

DROP TABLE IF EXISTS `postes`;
CREATE TABLE IF NOT EXISTS `postes` (
  `id_post` int(11) NOT NULL AUTO_INCREMENT,
  `titre_post` varchar(255) COLLATE utf8_bin NOT NULL,
  `cat_post` varchar(255) COLLATE utf8_bin NOT NULL,
  `msg_post` text COLLATE utf8_bin NOT NULL,
  `auteur` varchar(255) COLLATE utf8_bin NOT NULL,
  `date_post` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `img_post` varchar(255) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id_post`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `postes`
--

INSERT INTO `postes` (`id_post`, `titre_post`, `cat_post`, `msg_post`, `auteur`, `date_post`, `img_post`) VALUES
(29, 'LOGIN PHP', 'informtique', 'je montre a Ruth comment cr&amp;eacute;er une page de connexion avec HTML,PHP,CSS', 'kader', '2022-07-05 17:34:23', ''),
(30, 'APPRENTICE', 'EDUCATION', 'je fais le test pour int&amp;eacute;grer la formation de linkedIn en Back-end developer', 'thebesty', '2022-10-20 06:25:56', 'abiola2.mp4');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(255) COLLATE utf8_bin NOT NULL,
  `nom` varchar(255) COLLATE utf8_bin NOT NULL,
  `prenom` varchar(255) COLLATE utf8_bin NOT NULL,
  `mdp` varchar(255) COLLATE utf8_bin NOT NULL,
  `avatar` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`pseudo`,`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`user_id`, `pseudo`, `nom`, `prenom`, `mdp`, `avatar`) VALUES
(1, 'kader', 'kader', 'abiola', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'ombre.png'),
(1, 'thebesty', 'akanji', 'abiola', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'icon.png');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
