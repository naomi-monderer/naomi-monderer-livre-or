-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : mer. 02 fév. 2022 à 15:27
-- Version du serveur :  5.7.34
-- Version de PHP : 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `livreor`
--

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

CREATE TABLE `commentaires` (
  `id` int(11) NOT NULL,
  `commentaire` text NOT NULL,
  `id_utilisateurs` int(11) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `commentaires`
--

INSERT INTO `commentaires` (`id`, `commentaire`, `id_utilisateurs`, `date`) VALUES
(1, 'lalala', 10, '2022-01-02 14:12:15'),
(2, 'G TOUJOURs FAIM', 10, '2022-01-02 14:12:57'),
(3, 'djdjd', 10, '2022-01-02 15:48:07'),
(4, 'djdjd', 10, '2022-01-02 15:50:09'),
(5, 'jdjdjd', 15, '2022-01-09 15:32:08'),
(6, 'commentaire de marie', 14, '2022-01-09 15:37:31'),
(7, 'rockhard rockhard rockhard rockhard rockhard rockhard rockhard ', 19, '2022-01-09 15:43:37'),
(8, 'rockhard rockhard rockhard rockhard rockhard rockhard rockhard ', 19, '2022-01-09 15:44:16'),
(9, 'dj smokey exclusiv', 19, '2022-01-09 15:44:37'),
(10, 'muddymya in da place', 23, '2022-01-09 16:51:15'),
(11, 'dmv ', 20, '2022-01-09 16:52:43'),
(12, 'JPPPPP', 35, '2022-01-13 16:59:56'),
(13, 'pq ca echo que les com de ma session en cours ????', 35, '2022-01-13 17:10:30'),
(14, 'je poste un com', 42, '2022-01-30 15:18:24'),
(15, 'la trotinette electrique c eclaté ', 43, '2022-01-30 15:30:26'),
(16, 'je vais defoncer sa plaque ', 43, '2022-01-30 15:38:41'),
(17, 'je kiffe trop mettre mon grain de poivre dans la salade', 44, '2022-01-30 15:39:38'),
(18, 'je cuisine la salade ac les bons dosages', 45, '2022-01-30 15:43:51'),
(19, 'jimmy cliff <3', 45, '2022-01-30 15:44:00'),
(20, 'que Adam il met son grain dans la cuisine', 46, '2022-01-30 15:44:35');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id` int(11) NOT NULL,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `login`, `password`) VALUES
(1, 'admin', '$2y$10$6mDSdqJTd/wUFIVsCBqVPeyav05mIcbr5UIeQb6V3eiFNrMqDUwH6'),
(27, 'naomiette', '$2y$10$I.4l9ELlBfVb4wdTkW8g2eCsmB66Pqlz0YQCz8MDhwsmu.OH0EkKO'),
(28, 'yomi', '$2y$10$xHfLYjBE34s0KUHnLvP6iuN7Xv864YifYcSOvXSbbFPt06dNZQmbq'),
(29, 'verdana', '$2y$10$8QHju2l1FKzd2F4Eba4S6OOIzgMQVQ6IGqZF2NBYphPtA5gT0yXLO'),
(31, 'salade', '$2y$10$VZeBvuN2ElWYc2eM670aquLpwzAUsUgx/9b8AvLASRuN/Djk0rhki'),
(35, 'tel', '$2y$10$f.jPQ8L0tJRwweJEfqvSvuGs4bSUzlt5Ob9bJZh8cJnHTxRUNliX.'),
(36, 'barbie', '$2y$10$ecwjXDf3qW3ilO5RShWWcuvW3jihghMeT.rd3SbKh7tCbBiOVr2SW'),
(37, 'ace', '$2y$10$2p6RjkWUbtrJ5gttR6yJneX7ga.WsjNtH2TYMQnAYl7Ij78ombleO'),
(38, 'pi', '$2y$10$/T24DL5uB8hjYYET8oG3cu3Apxz4vNBVUjtrxECyE3RSoBhgSFDPS'),
(40, 'lala', '$2y$10$qY0zEStXbCKE5xEWSsV7LOPsU7ifWmKjStS.ob3nJljFjxBNdATge'),
(41, 'yes', '$2y$10$3YF.d/j49.Lar8i6wC1Rv.clyv.O4lYdMZhB/EJJQZ/r3s25zYsjK'),
(42, 'cala', '$2y$10$qvE9L1BPZ/r7GwNSofLM0.SR/ojVOFYNWRHrv8j7m.A0iWekmwsBu'),
(43, 'diane', '$2y$10$WixZyvql8Xx1yeg/mHHSL..ruec3Wf7qu.jtHJk3MZy4trBtav5VW'),
(44, 'adam', '$2y$10$8oIkcCRTb.NTkbpHWBtNXOmns8qpv3ysuskJEeK7DvggrGJS7cIMC'),
(45, 'daouda', '$2y$10$vGR4FzfVt.Y9oXupVRxTVe65iP.TbFXihVgJfBgXHOUh7vtG5fGMG'),
(46, 'nao', '$2y$10$UfGbMx.kyPQ2aHCdUeePKuLY9pPmm7PP5TkqxaQ4ichF1lZS8mEG.'),
(47, 'cimade', '$2y$10$kJiqE8zHX/MZM2c.S/1wvO.gu7cLJFeO/Fryz3VtgPkaRFeMYMeXW'),
(48, 'plouf', '$2y$10$DUbN/jMhxgOm.GDqXPJh.u9cwHZzKC.c4FNZ3qrB9N/EZIYG2wAfS');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `commentaires`
--
ALTER TABLE `commentaires`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login` (`login`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `commentaires`
--
ALTER TABLE `commentaires`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
