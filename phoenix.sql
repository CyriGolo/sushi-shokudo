-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 20 mars 2023 à 09:21
-- Version du serveur : 8.0.27
-- Version de PHP : 8.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `phoenix`
--

-- --------------------------------------------------------

--
-- Structure de la table `tp_accounts`
--

DROP TABLE IF EXISTS `tp_accounts`;
CREATE TABLE IF NOT EXISTS `tp_accounts` (
  `id_account` int NOT NULL AUTO_INCREMENT,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `email` varchar(255) NOT NULL,
  `name` varchar(45) NOT NULL,
  `adress` varchar(100) NOT NULL,
  `tel` varchar(15) NOT NULL,
  `num_carte` varchar(16) NOT NULL,
  `crypto` varchar(3) NOT NULL,
  `conditions` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_account`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `tp_category`
--

DROP TABLE IF EXISTS `tp_category`;
CREATE TABLE IF NOT EXISTS `tp_category` (
  `id_category` int NOT NULL AUTO_INCREMENT,
  `name_category` varchar(20) NOT NULL,
  PRIMARY KEY (`id_category`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `tp_orders`
--

DROP TABLE IF EXISTS `tp_orders`;
CREATE TABLE IF NOT EXISTS `tp_orders` (
  `id_order` int NOT NULL AUTO_INCREMENT,
  `reference` varchar(8) NOT NULL,
  `id_account` int NOT NULL,
  `id_travel` int NOT NULL,
  `nb_personne` int NOT NULL,
  `nb_week` int NOT NULL,
  `total` float NOT NULL,
  PRIMARY KEY (`id_order`),
  UNIQUE KEY `reference` (`reference`),
  KEY `id_account` (`id_account`),
  KEY `id_travel` (`id_travel`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `tp_travels`
--

DROP TABLE IF EXISTS `tp_travels`;
CREATE TABLE IF NOT EXISTS `tp_travels` (
  `id_travel` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `id_category` int NOT NULL,
  PRIMARY KEY (`id_travel`),
  KEY `id_category` (`id_category`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `tp_orders`
--
ALTER TABLE `tp_orders`
  ADD CONSTRAINT `tp_orders_ibfk_1` FOREIGN KEY (`id_travel`) REFERENCES `tp_travels` (`id_travel`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tp_orders_ibfk_2` FOREIGN KEY (`id_account`) REFERENCES `tp_accounts` (`id_account`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `tp_travels`
--
ALTER TABLE `tp_travels`
  ADD CONSTRAINT `tp_travels_ibfk_1` FOREIGN KEY (`id_category`) REFERENCES `tp_category` (`id_category`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
