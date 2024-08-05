-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Ven 19 Juillet 2024 à 12:02
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `memoire_ipm`
--

-- --------------------------------------------------------

--
-- Structure de la table `donnee_inscription`
--

CREATE TABLE IF NOT EXISTS `donnee_inscription` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `nomutilisateur` varchar(255) NOT NULL,
  `email` text NOT NULL,
  `mot_pass` varchar(255) NOT NULL,
  `statut_compte` text NOT NULL,
  `datecreation` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `donnee_inscription`
--

INSERT INTO `donnee_inscription` (`id`, `nomutilisateur`, `email`, `mot_pass`, `statut_compte`, `datecreation`) VALUES
(4, 'nougbodeonice15', 'candideadogbo@gmail.com', '$2y$10$diOAmK3xYJCq6ZB705PYoO177YwrQZPpm6a1OH0a4QhUiV3RLlzmy', 'Prestataire', '2024-07-06'),
(5, 'nougbodeonice10', 'contact003m@gmail.com', '$2y$10$jCVo580KAfmRrsynN7gcxOTR3AJaBnW56H41fntPolMdMDVX25gPG', 'Clients', '2024-07-06');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
