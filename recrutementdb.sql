

1- user 
2- contact 
3- message
4- rh 
5 - langue-initial
6 -poste-rechercher-initial
7 -	skill_initial
8 - client 
9 - competances
10 - langue
11 -parcours-professionelle
12- parcours-scolaire
13 -


-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3308
-- Généré le : lun. 20 mars 2023 à 00:48
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `recrutementdb`
--

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `nom` varchar(200) NOT NULL,
  `prenom` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `tel` int(11) NOT NULL,
  `addres` varchar(200) NOT NULL,
  `id_candidat` int(11) NOT NULL,
  `photo` longblob DEFAULT NULL,
  `score` int(11) NOT NULL,
  `id-user` int(11) NOT NULL,
  `CV` longblob DEFAULT NULL,
  `poste_actuel` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `competances`
--

CREATE TABLE `competances` (
  `id-compétance` int(11) NOT NULL,
  `competance` varchar(200) NOT NULL,
  `id_candidat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

CREATE TABLE `contact` (
  `ID-CONTACT` int(11) NOT NULL,
  `ID-USER1` int(11) NOT NULL,
  `ID-USER2` int(11) NOT NULL,
  `Date-contact` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `langue`
--

CREATE TABLE `langue` (
  `id-langue` int(11) NOT NULL,
  `langue` varchar(200) NOT NULL,
  `degre` varchar(100) NOT NULL,
  `id_candidat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `langue-initial`
--

CREATE TABLE `langue-initial` (
  `id_langue_initial` int(11) NOT NULL,
  `langue` varchar(100) NOT NULL,
  `id_RH` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `langue-initial`
--

INSERT INTO `langue-initial` (`id_langue_initial`, `langue`, `id_RH`) VALUES
(1, 'AR', 29),
(2, 'FR', 29),
(3, 'EN', 29),
(4, 'ARABE', 29),
(5, 'FR', 29),
(6, 'EN', 29),
(7, '', 31),
(8, '', 31),
(9, '', 31),
(10, 'AR', 32),
(11, 'FR', 32),
(12, 'EN', 32);

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

CREATE TABLE `message` (
  `ID-MESSAGE` int(11) NOT NULL,
  `BODY` longtext NOT NULL,
  `SENDER` int(11) NOT NULL,
  `RECIVER` int(11) NOT NULL,
  `send_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `parcours-professionelle`
--

CREATE TABLE `parcours-professionelle` (
  `id-parc-pr` int(11) NOT NULL,
  `societe` varchar(200) NOT NULL,
  `position` varchar(200) NOT NULL,
  `date-debut` date NOT NULL,
  `date-fin` date NOT NULL,
  `id_candidat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `parcours-scolaire`
--

CREATE TABLE `parcours-scolaire` (
  `id-parc-sc` int(11) NOT NULL,
  `diplome` varchar(200) NOT NULL,
  `etablissement` varchar(200) NOT NULL,
  `date-debut` date NOT NULL,
  `date-fin` date NOT NULL,
  `id_candidat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `poste-rechercher-initial`
--

CREATE TABLE `poste-rechercher-initial` (
  `id_poste_initial` int(11) NOT NULL,
  `poste` varchar(200) NOT NULL,
  `id_RH` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `rh`
--

CREATE TABLE `rh` (
  `id_RH` int(11) NOT NULL,
  `societe` varchar(200) NOT NULL,
  `secteur` varchar(100) NOT NULL,
  `photo` longblob NOT NULL,
  `id-user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `skill_initial`
--

CREATE TABLE `skill_initial` (
  `id_skill_initial` int(11) NOT NULL,
  `skill_initial` varchar(100) NOT NULL,
  `id_RH` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `ID-USER` int(11) NOT NULL,
  `Nom` varchar(500) NOT NULL,
  `Prenom` varchar(500) NOT NULL,
  `Email` varchar(1000) NOT NULL,
  `Password` varchar(1400) NOT NULL,
  `Type` varchar(500) NOT NULL,
  `verified-inscription` tinyint(1) DEFAULT NULL,
  `verified-email` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id_candidat`),
  ADD KEY `id-user_client` (`id-user`);

--
-- Index pour la table `competances`
--
ALTER TABLE `competances`
  ADD PRIMARY KEY (`id-compétance`),
  ADD KEY `ma_table_fk` (`id_candidat`);

--
-- Index pour la table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`ID-CONTACT`),
  ADD KEY `ID-USER1` (`ID-USER1`),
  ADD KEY `ID-USER2` (`ID-USER2`);

--
-- Index pour la table `langue`
--
ALTER TABLE `langue`
  ADD PRIMARY KEY (`id-langue`),
  ADD KEY `ma` (`id_candidat`);

--
-- Index pour la table `langue-initial`
--
ALTER TABLE `langue-initial`
  ADD PRIMARY KEY (`id_langue_initial`),
  ADD KEY `fk_idH` (`id_RH`);

--
-- Index pour la table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`ID-MESSAGE`),
  ADD KEY `sender` (`SENDER`),
  ADD KEY `reciver` (`RECIVER`);

--
-- Index pour la table `parcours-professionelle`
--
ALTER TABLE `parcours-professionelle`
  ADD PRIMARY KEY (`id-parc-pr`),
  ADD KEY `mn` (`id_candidat`);

--
-- Index pour la table `parcours-scolaire`
--
ALTER TABLE `parcours-scolaire`
  ADD PRIMARY KEY (`id-parc-sc`),
  ADD KEY `mban` (`id_candidat`);

--
-- Index pour la table `poste-rechercher-initial`
--
ALTER TABLE `poste-rechercher-initial`
  ADD PRIMARY KEY (`id_poste_initial`),
  ADD KEY `fk_id_RH` (`id_RH`);

--
-- Index pour la table `rh`
--
ALTER TABLE `rh`
  ADD PRIMARY KEY (`id_RH`),
  ADD KEY `id-user` (`id-user`);

--
-- Index pour la table `skill_initial`
--
ALTER TABLE `skill_initial`
  ADD PRIMARY KEY (`id_skill_initial`),
  ADD KEY `fk_idRH` (`id_RH`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID-USER`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `competances`
--
ALTER TABLE `competances`
  MODIFY `id-compétance` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT pour la table `contact`
--
ALTER TABLE `contact`
  MODIFY `ID-CONTACT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT pour la table `langue`
--
ALTER TABLE `langue`
  MODIFY `id-langue` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT pour la table `langue-initial`
--
ALTER TABLE `langue-initial`
  MODIFY `id_langue_initial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `message`
--
ALTER TABLE `message`
  MODIFY `ID-MESSAGE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT pour la table `parcours-professionelle`
--
ALTER TABLE `parcours-professionelle`
  MODIFY `id-parc-pr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT pour la table `parcours-scolaire`
--
ALTER TABLE `parcours-scolaire`
  MODIFY `id-parc-sc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT pour la table `poste-rechercher-initial`
--
ALTER TABLE `poste-rechercher-initial`
  MODIFY `id_poste_initial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `rh`
--
ALTER TABLE `rh`
  MODIFY `id_RH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT pour la table `skill_initial`
--
ALTER TABLE `skill_initial`
  MODIFY `id_skill_initial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `ID-USER` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `client`
--
ALTER TABLE `client`
  ADD CONSTRAINT `id-user_client` FOREIGN KEY (`id-user`) REFERENCES `user` (`ID-USER`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `competances`
--
ALTER TABLE `competances`
  ADD CONSTRAINT `ma_table_fk` FOREIGN KEY (`id_candidat`) REFERENCES `client` (`id_candidat`) ON DELETE CASCADE;

--
-- Contraintes pour la table `contact`
--
ALTER TABLE `contact`
  ADD CONSTRAINT `ID-USER1` FOREIGN KEY (`ID-USER1`) REFERENCES `user` (`ID-USER`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ID-USER2` FOREIGN KEY (`ID-USER2`) REFERENCES `user` (`ID-USER`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `langue`
--
ALTER TABLE `langue`
  ADD CONSTRAINT `ma` FOREIGN KEY (`id_candidat`) REFERENCES `client` (`id_candidat`) ON DELETE CASCADE;

--
-- Contraintes pour la table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `reciver` FOREIGN KEY (`RECIVER`) REFERENCES `user` (`ID-USER`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sender` FOREIGN KEY (`SENDER`) REFERENCES `user` (`ID-USER`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `parcours-professionelle`
--
ALTER TABLE `parcours-professionelle`
  ADD CONSTRAINT `man` FOREIGN KEY (`id_candidat`) REFERENCES `client` (`id_candidat`) ON DELETE CASCADE,
  ADD CONSTRAINT `mn` FOREIGN KEY (`id_candidat`) REFERENCES `client` (`id_candidat`) ON DELETE CASCADE;

--
-- Contraintes pour la table `parcours-scolaire`
--
ALTER TABLE `parcours-scolaire`
  ADD CONSTRAINT `mban` FOREIGN KEY (`id_candidat`) REFERENCES `client` (`id_candidat`) ON DELETE CASCADE;

--
-- Contraintes pour la table `poste-rechercher-initial`
--
ALTER TABLE `poste-rechercher-initial`
  ADD CONSTRAINT `fk_id_RH` FOREIGN KEY (`id_RH`) REFERENCES `rh` (`id_RH`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `rh`
--
ALTER TABLE `rh`
  ADD CONSTRAINT `id-user` FOREIGN KEY (`id-user`) REFERENCES `user` (`ID-USER`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `skill_initial`
--
ALTER TABLE `skill_initial`
  ADD CONSTRAINT `fk_idRH` FOREIGN KEY (`id_RH`) REFERENCES `rh` (`id_RH`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
