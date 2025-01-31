-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 31 jan. 2025 à 15:41
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

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

CREATE TABLE `tp_accounts` (
  `id_account` int(11) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `name` varchar(45) NOT NULL,
  `address` varchar(100) NOT NULL,
  `tel` varchar(15) NOT NULL,
  `num_carte` varchar(1000) NOT NULL,
  `crypto` varchar(100) NOT NULL,
  `conditions` tinyint(1) NOT NULL,
  `id_role` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `tp_accounts`
--

INSERT INTO `tp_accounts` (`id_account`, `username`, `password`, `email`, `name`, `address`, `tel`, `num_carte`, `crypto`, `conditions`, `id_role`) VALUES
(2, 'Darius', '$2y$10$7x6o6R1CVl3h8xJBMdcGdu/WYpQtBuQbS4HX5VWt6ygF5tUDWadJK', 'cyrigamingpro@gmail.com', 'Abc', 'Kersegas', '0633711882', '4871990150643997', '123', 0, 2),
(4, 'Dariuss', '$2y$10$x.03mptlt6M4S0merOxxKO1pewPHiBFo4UCtyth2YUca8ve8jVDHy', 'cyrigamingp2@gmail.com', '', '', '', '', '', 0, 1),
(5, 'dariuspessin', '$2y$10$bE.NQGmQTEJnIrKy/hYuPufdN76YBt/59F2SXgfVRWInKGK3QoN.O', 'cyrigamingproo@gmail.com', '', '', '', '', '', 0, 1),
(6, 'EZZ', '$2y$10$32BhGkX.k9Dh8sQ5x1aBCOVBcNmvZ2DgG.a0An4YKXo/oRx1Da0CW', 'darius.pessin@gmail.com', '', '', '', '', '', 0, 1);

-- --------------------------------------------------------

--
-- Structure de la table `tp_category`
--

CREATE TABLE `tp_category` (
  `id_category` int(11) NOT NULL,
  `name_category` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `tp_category`
--

INSERT INTO `tp_category` (`id_category`, `name_category`) VALUES
(1, 'Plage'),
(2, 'Urbaine'),
(3, 'Croisière'),
(4, 'Montagne');

-- --------------------------------------------------------

--
-- Structure de la table `tp_orders`
--

CREATE TABLE `tp_orders` (
  `id_order` int(11) NOT NULL,
  `reference` varchar(100) NOT NULL,
  `id_account` int(11) NOT NULL,
  `id_travel` int(11) NOT NULL,
  `nb_personne` int(11) NOT NULL,
  `nb_week` int(11) NOT NULL,
  `total` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `tp_orders`
--

INSERT INTO `tp_orders` (`id_order`, `reference`, `id_account`, `id_travel`, `nb_personne`, `nb_week`, `total`) VALUES
(1, '679a4190', 2, 7, 11, 11, 157299),
(2, '679a4251', 2, 7, 11, 11, 157299),
(3, '679a42ba', 2, 7, 11, 11, 157299),
(4, '679a42d63e89a', 2, 7, 11, 11, 157299),
(5, '679a43324f4f9', 2, 7, 11, 11, 157299),
(6, '679a433371991', 2, 7, 11, 11, 157299),
(7, '679a433417441', 2, 7, 11, 11, 157299),
(8, '679a43347e0bc', 2, 7, 11, 11, 157299),
(9, '679a4334eab33', 2, 7, 11, 11, 157299),
(10, '679a433561d3e', 2, 7, 11, 11, 157299),
(11, '679a4336399a3', 2, 7, 11, 11, 157299),
(12, '679a434788fcf', 2, 7, 11, 11, 157299),
(13, '679a4348bd7d4', 2, 7, 11, 11, 157299),
(14, '679a43498b567', 2, 7, 11, 11, 157299),
(15, '679a434f49677', 2, 7, 11, 11, 157299),
(16, '679a43ca75f9f', 2, 7, 11, 11, 157299),
(17, '679a44038f5e8', 2, 7, 11, 11, 157299),
(18, '679a44050ac7e', 2, 7, 11, 11, 157299),
(19, '679a445dd4639', 2, 7, 11, 11, 157299),
(20, '679a44aebe8c3', 2, 7, 11, 11, 157299),
(21, '679a44e8ec968', 2, 7, 11, 11, 157299),
(22, '679a452a6cd05', 2, 7, 11, 11, 157299),
(23, '679a45393fe6e', 2, 7, 11, 11, 157299),
(24, '679a4563a2497', 2, 7, 11, 11, 157299),
(25, '679a45b41cd38', 2, 7, 11, 11, 157299),
(26, '679a46216798f', 2, 7, 11, 11, 157299),
(27, '679a464f3d0d6', 2, 7, 11, 11, 157299),
(28, '679a465ee547a', 2, 7, 11, 11, 157299),
(29, '679a467628186', 2, 7, 11, 11, 157299),
(30, '679a46a834dfc', 2, 8, 4, 2, 7199.92),
(31, '679a46cac87e9', 2, 10, 2, 9, 28799.8),
(32, '679a476c8221d', 2, 10, 2, 9, 28799.8),
(33, '679a4818b74b8', 2, 10, 2, 9, 28799.8),
(34, '679a483f0c6ce', 2, 10, 2, 9, 28799.8),
(35, '679a485671633', 2, 10, 2, 9, 28799.8),
(36, '679a485e8a9bf', 2, 10, 2, 9, 28799.8),
(37, '679a487b24a66', 2, 10, 2, 9, 28799.8),
(38, '679a488d67706', 2, 10, 2, 9, 28799.8),
(39, '679a48e855478', 2, 10, 2, 9, 28799.8),
(40, '679a48ed2ddf9', 2, 10, 2, 9, 28799.8),
(41, '679cc1eb2a359', 2, 7, 19, 2, 49399.6),
(42, '679cc2651fd93', 2, 7, 19, 2, 49399.6),
(43, '679cc269ee610', 2, 7, 19, 2, 49399.6),
(44, '679cc27c25ab6', 2, 7, 19, 2, 49399.6),
(45, '679cc284a73ee', 2, 7, 19, 2, 49399.6),
(46, '679cc2923b275', 2, 7, 19, 2, 49399.6),
(47, '679cc2abd5a79', 2, 7, 19, 2, 49399.6),
(48, '679cc2bc7dad9', 2, 7, 19, 2, 49399.6),
(49, '679cc2c461383', 2, 7, 19, 2, 49399.6),
(50, '679cc2ce3e986', 2, 7, 19, 2, 49399.6),
(51, '679cc2d983730', 2, 7, 19, 2, 49399.6),
(52, '679cc2e8c3abd', 2, 7, 19, 2, 49399.6),
(53, '679cc2f238b4d', 2, 7, 19, 2, 49399.6),
(54, '679cc2f83ded7', 2, 7, 19, 2, 49399.6),
(55, '679cc30415424', 2, 7, 19, 2, 49399.6),
(56, '679cc33e9989b', 2, 7, 19, 2, 49399.6),
(57, '679cc34d7b7a8', 2, 7, 19, 2, 49399.6),
(58, '679cc34f4cea1', 2, 7, 19, 2, 49399.6),
(59, '679cc35030482', 2, 7, 19, 2, 49399.6),
(60, '679cc350caa44', 2, 7, 19, 2, 49399.6),
(61, '679cc351604b9', 2, 7, 19, 2, 49399.6),
(62, '679cc351c40c3', 2, 7, 19, 2, 49399.6),
(63, '679cc37993d3f', 2, 7, 19, 2, 49399.6),
(64, '679cc3851165f', 2, 7, 19, 2, 49399.6),
(65, '679cc38ecea86', 2, 7, 19, 2, 49399.6),
(66, '679cc3948cacd', 2, 7, 19, 2, 49399.6),
(67, '679cc3b2206bb', 2, 7, 19, 2, 49399.6),
(68, '679cc3d51cc43', 2, 7, 19, 2, 49399.6),
(69, '679cc3dd7e9dc', 2, 7, 19, 2, 49399.6),
(70, '679cc3eac9cc6', 2, 7, 19, 2, 49399.6),
(71, '679cc3ffc9663', 2, 7, 19, 2, 49399.6),
(72, '679cc4090790b', 2, 7, 19, 2, 49399.6),
(73, '679cd022e95ab', 2, 7, 11, 11, 157299),
(74, '679cd057441ae', 2, 7, 11, 11, 157299),
(75, '679cd06214916', 2, 7, 11, 11, 157299),
(76, '679cd0869384d', 2, 7, 11, 11, 157299),
(77, '679cd0ab0981e', 2, 7, 11, 11, 157299),
(78, '679cd0b5c8743', 2, 7, 11, 11, 157299),
(79, '679cd0be1ac4a', 2, 7, 11, 11, 157299),
(80, '679cd11c29565', 2, 7, 11, 11, 157299),
(81, '679cd121de2a1', 2, 7, 11, 11, 157299),
(82, '679cd13e69af3', 2, 10, 11, 11, 193599),
(83, '679cd1e0a75de', 2, 9, 11, 123, 3382490),
(84, '679cd30051965', 2, 8, 123, 123, 13615900);

-- --------------------------------------------------------

--
-- Structure de la table `tp_roles`
--

CREATE TABLE `tp_roles` (
  `id_role` int(11) NOT NULL,
  `name_role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `tp_roles`
--

INSERT INTO `tp_roles` (`id_role`, `name_role`) VALUES
(1, 'user'),
(2, 'admin');

-- --------------------------------------------------------

--
-- Structure de la table `tp_travels`
--

CREATE TABLE `tp_travels` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `id_category` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `tp_travels`
--

INSERT INTO `tp_travels` (`id`, `name`, `description`, `image`, `price`, `id_category`) VALUES
(7, 'Les Boucaniers', 'Après les eaux calmes, partez à la découverte des spectaculaires cascades des gorges de la Falaise, à Trinité.', 'caraibes_martinique_boucaniers.jpg', 1299.99, 1),
(8, 'Kamarina', 'Bienvenue au pays de l\'Etna où ruelles escarpées et places en fleurs s\'ouvrent sur la Méditerranée !', 'sicile_kamarina.jpg', 899.99, 1),
(9, 'Finohlu', 'Instants inoubliables sur une île privative où luxe et charme naturel des Maldives s\'équilibrent à merveille.', 'maldives_fino.jpg', 2499.99, 1),
(10, 'Albion sauvage', 'Au cœur de l\'île, un swing au golf, l\'adrénaline du trapèze volant ou la beauté des fonds marins ... que choisir ?', 'maurice_albion.jpg', 1599.99, 1),
(11, 'Kani', 'Ile-jardin posée sur des eaux turquoises, découvrez le paradis au cœur de l\'archipel des Maldives.', 'maldives_kani.jpg', 2299.99, 1),
(12, 'Gregolimano', 'L\'île d\'Eubée est un oasis entre mer et oliviers ... plongez dans les eaux azures de la mer Égée ... en ski nautique', 'grece_gregolimano.jpg', 1199.99, 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `tp_accounts`
--
ALTER TABLE `tp_accounts`
  ADD PRIMARY KEY (`id_account`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `id_role` (`id_role`);

--
-- Index pour la table `tp_category`
--
ALTER TABLE `tp_category`
  ADD PRIMARY KEY (`id_category`);

--
-- Index pour la table `tp_orders`
--
ALTER TABLE `tp_orders`
  ADD PRIMARY KEY (`id_order`),
  ADD UNIQUE KEY `reference` (`reference`),
  ADD KEY `id_account` (`id_account`),
  ADD KEY `id_travel` (`id_travel`);

--
-- Index pour la table `tp_roles`
--
ALTER TABLE `tp_roles`
  ADD PRIMARY KEY (`id_role`);

--
-- Index pour la table `tp_travels`
--
ALTER TABLE `tp_travels`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_category` (`id_category`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `tp_accounts`
--
ALTER TABLE `tp_accounts`
  MODIFY `id_account` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `tp_category`
--
ALTER TABLE `tp_category`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `tp_orders`
--
ALTER TABLE `tp_orders`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT pour la table `tp_roles`
--
ALTER TABLE `tp_roles`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `tp_travels`
--
ALTER TABLE `tp_travels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `tp_orders`
--
ALTER TABLE `tp_orders`
  ADD CONSTRAINT `tp_orders_ibfk_1` FOREIGN KEY (`id_travel`) REFERENCES `tp_travels` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tp_orders_ibfk_2` FOREIGN KEY (`id_account`) REFERENCES `tp_accounts` (`id_account`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `tp_travels`
--
ALTER TABLE `tp_travels`
  ADD CONSTRAINT `tp_travels_ibfk_1` FOREIGN KEY (`id_category`) REFERENCES `tp_category` (`id_category`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
