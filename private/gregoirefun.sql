-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 14 juin 2021 à 12:58
-- Version du serveur : 10.4.19-MariaDB
-- Version de PHP : 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gregoirefun`
--

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE `produit` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `description` varchar(155) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`id`, `nom`, `image`, `description`) VALUES
(1, 'HEINEKEN', 'heineken.png', 'Nommée dès sa création du nom de son fondateur, elle représente aujourd’hui la référence au sein des bières blondes, de fermentation basse, de type Lager.'),
(2, 'DESPERADOS', 'DESPERADOS.png', 'Née en 1995 dans notre brasserie de Schiltigheim en Alsace, Desperados® est la première bière aromatisée tequila commercialisée en France.'),
(3, 'FISCHER', 'fischer.png', 'De fermentation basse, type pils, elle est brassée avec du malt d’orge et des houblons alsaciens, elle titre 6 % vol alc. A consommer fraiche entre 7° et 9');

-- --------------------------------------------------------

--
-- Structure de la table `produit_menu`
--

CREATE TABLE `produit_menu` (
  `id` int(11) NOT NULL,
  `fk_produit` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `proprietaire` varchar(255) DEFAULT NULL,
  `favorite` int(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `produit_menu`
--

INSERT INTO `produit_menu` (`id`, `fk_produit`, `stock`, `proprietaire`, `favorite`) VALUES
(8, 1, 10, 'Gregoire', 0),
(9, 2, 12, 'Maxime', 1),
(10, 3, 1, 'Gregoire', 0);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nom` varchar(200) DEFAULT NULL,
  `mdp` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `nom`, `mdp`) VALUES
(1, 'maxime', 'e99da17eeab04d10efc086ad71d672c4cab6c29f7768047cf2a3470886ec2a25381eb0fa892be0adc473750000dc921865a283b83222014a5bc3b46bbaf970d8');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `produit_menu`
--
ALTER TABLE `produit_menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_produit` (`fk_produit`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `produit_menu`
--
ALTER TABLE `produit_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `produit_menu`
--
ALTER TABLE `produit_menu`
  ADD CONSTRAINT `produit_menu_ibfk_1` FOREIGN KEY (`fk_produit`) REFERENCES `produit` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
