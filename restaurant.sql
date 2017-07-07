-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u2
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Ven 07 Juillet 2017 à 11:34
-- Version du serveur :  5.5.55-0+deb8u1
-- Version de PHP :  5.6.30-0+deb8u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `restaurant`
--

-- --------------------------------------------------------

--
-- Structure de la table `menus`
--

CREATE TABLE IF NOT EXISTS `menus` (
`ID` int(11) NOT NULL,
  `id_plat` int(11) NOT NULL,
  `nom` varchar(125) NOT NULL,
  `prix` float NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `menus`
--

INSERT INTO `menus` (`ID`, `id_plat`, `nom`, `prix`) VALUES
(7, 17, 'Menu Hyper Cher', 99.99),
(8, 15, 'Menu Mc Do pour les pauvres', 10.99),
(9, 16, 'Menu enfant avec jouet', 8.99),
(10, 15, 'Menu ado fat', 11.99);

-- --------------------------------------------------------

--
-- Structure de la table `plats`
--

CREATE TABLE IF NOT EXISTS `plats` (
`ID` int(11) NOT NULL,
  `nom` varchar(125) NOT NULL,
  `prix` float NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `plats`
--

INSERT INTO `plats` (`ID`, `nom`, `prix`, `image`) VALUES
(15, 'Kebab', 4.5, 'http://www.bipbippizza37.com/upload/modules/media_manager/carte/kebab.jpg'),
(17, 'Poulet thaï', 12.99, 'http://static.cuisineaz.com/400x320/i89984-poulet-thai-facon-teriyaki.jpg'),
(18, 'Nems au crabe', 7.99, 'images/nems-au-crabe.jpeg'),
(20, 'Salade César', 9.99, 'images/salade-cesar.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `relation_menus_plats`
--

CREATE TABLE IF NOT EXISTS `relation_menus_plats` (
`id` int(11) NOT NULL,
  `id_menus` int(11) NOT NULL,
  `id_plats` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `menus`
--
ALTER TABLE `menus`
 ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `plats`
--
ALTER TABLE `plats`
 ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `relation_menus_plats`
--
ALTER TABLE `relation_menus_plats`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `menus`
--
ALTER TABLE `menus`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT pour la table `plats`
--
ALTER TABLE `plats`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT pour la table `relation_menus_plats`
--
ALTER TABLE `relation_menus_plats`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
