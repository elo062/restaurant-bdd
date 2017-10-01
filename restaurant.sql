-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 25, 2017 at 09:42 AM
-- Server version: 5.5.55-0+deb8u1
-- PHP Version: 5.6.30-0+deb8u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `restaurant`
--

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE IF NOT EXISTS `menus` (
`ID` int(11) NOT NULL,
  `nom` varchar(125) CHARACTER SET utf8 NOT NULL,
  `prix` float NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`ID`, `nom`, `prix`, `image`) VALUES
(41, 'Oh Captain', 15.99, 'captain.png'),
(42, 'iArriba!', 22.99, 'mexico.jpg'),
(43, 'Soleil Levant', 12.99, 'mushu.png'),
(44, 'Diététique', 14.99, 'dietetique.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `plats`
--

CREATE TABLE IF NOT EXISTS `plats` (
`ID` int(11) NOT NULL,
  `nom` varchar(125) CHARACTER SET utf8 NOT NULL,
  `prix` float NOT NULL,
  `image` text CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `plats`
--

INSERT INTO `plats` (`ID`, `nom`, `prix`, `image`) VALUES
(27, 'Kebab', 5.99, 'kebab.jpg'),
(28, 'Nems au crabe', 8.99, 'nems-au-crabe.jpg'),
(29, 'Poulet thaï', 9.99, 'poulet-thai.jpg'),
(30, 'Salade César été', 10, 'salade-cesar.jpg'),
(31, 'Aubergines au Tofu', 12.99, 'aubergines-au-tofu.jpg'),
(32, 'Tacos en Salsa', 7.99, 'tacos.jpg'),
(33, 'Viva Mexico', 16.99, 'Mexican-food.jpg'),
(34, 'Queen ElizabethII', 11.99, 'queen.jpg'),
(35, 'Fish Pie', 6.99, 'fish-pie.jpg'),
(40, 'Papillotes de Saumon', 12.99, 'papillotte-de-saumon.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `relation_menus_plats`
--

CREATE TABLE IF NOT EXISTS `relation_menus_plats` (
`id` int(11) NOT NULL,
  `id_menus` int(11) NOT NULL,
  `id_plats` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `relation_menus_plats`
--

INSERT INTO `relation_menus_plats` (`id`, `id_menus`, `id_plats`) VALUES
(32, 41, 35),
(33, 41, 40),
(34, 42, 32),
(35, 42, 33),
(36, 43, 28),
(37, 43, 29),
(38, 44, 30),
(39, 44, 31);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
 ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `plats`
--
ALTER TABLE `plats`
 ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `relation_menus_plats`
--
ALTER TABLE `relation_menus_plats`
 ADD PRIMARY KEY (`id`), ADD KEY `id_menus` (`id_menus`), ADD KEY `id_plats` (`id_plats`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT for table `plats`
--
ALTER TABLE `plats`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `relation_menus_plats`
--
ALTER TABLE `relation_menus_plats`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=40;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `relation_menus_plats`
--
ALTER TABLE `relation_menus_plats`
ADD CONSTRAINT `relation_menus_plats_ibfk_1` FOREIGN KEY (`id_plats`) REFERENCES `plats` (`ID`),
ADD CONSTRAINT `relation_menus_plats_ibfk_2` FOREIGN KEY (`id_menus`) REFERENCES `menus` (`ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
