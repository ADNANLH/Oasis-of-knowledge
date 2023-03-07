-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 07 mars 2023 à 16:39
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
-- Base de données : `oasis`
--

-- --------------------------------------------------------

--
-- Structure de la table `adherent`
--

CREATE TABLE `adherent` (
  `id_adh` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `userN` varchar(50) DEFAULT NULL,
  `addresse` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `passWrd` varchar(50) DEFAULT NULL,
  `phone` int(11) DEFAULT NULL,
  `CIN` varchar(10) DEFAULT NULL,
  `date_naiss` date DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `date_creat` date DEFAULT NULL,
  `pinalite` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `adherent`
--

INSERT INTO `adherent` (`id_adh`, `name`, `userN`, `addresse`, `email`, `passWrd`, `phone`, `CIN`, `date_naiss`, `type`, `date_creat`, `pinalite`) VALUES
(1, 'John Doe', 'john123', '123 Main St, Anytown USA', 'johndoe@example.com', 'password123', 5551234, '1234567890', '1990-01-01', 'Regular', '2022-02-28', 0),
(2, 'Jane Doe', NULL, '456 Park Ave, Anytown USA', 'janedoe@example.com', 'password123', 5555678, '0987654321', '1992-03-15', 'Premium', '2022-02-28', 0),
(3, 'Bob Smith', NULL, '789 Broadway, Anytown USA', 'bobsmith@example.com', 'password123', 5559012, '2468013579', '1985-07-04', 'Regular', '2022-02-28', 0),
(4, 'Alice Johnson', NULL, '1010 Elm St, Anytown USA', 'alicejohnson@example.com', 'password123', 5553456, '0246813579', '1988-12-25', 'Premium', '2022-02-28', 0),
(5, 'David Lee', NULL, '1111 Oak St, Anytown USA', 'davidlee@example.com', 'password123', 5557890, '1234567890', '1995-06-30', 'Regular', '2022-02-28', 0),
(6, 'Karen Williams', NULL, '2222 Pine St, Anytown USA', 'karenwilliams@example.com', 'password123', 5552345, '0987654321', '1991-09-20', 'Regular', '2022-02-28', 0),
(7, 'Mike Miller', NULL, '3333 Maple St, Anytown USA', 'mikemiller@example.com', 'password123', 5556789, '2468013579', '1987-02-14', 'Premium', '2022-02-28', 0),
(8, 'Sarah Wilson', NULL, '4444 Cherry St, Anytown USA', 'sarahwilson@example.com', 'password123', 5551234, '0246813579', '1993-11-05', 'Premium', '2022-02-28', 0),
(9, 'Tom Davis', NULL, '5555 Cedar St, Anytown USA', 'tomdavis@example.com', 'password123', 5555678, '1234567890', '1984-04-10', 'Regular', '2022-02-28', 0),
(10, 'Emily Martin', NULL, '6666 Birch St, Anytown USA', 'emilymartin@example.com', 'password123', 5559012, '0987654321', '1989-08-17', 'Regular', '2022-02-28', 0),
(11, 'Cullen Cook', NULL, 'Ea quo eius est har', 'gemeryfer@mailinator.com', 'Pa$$w0rd!', 57, 'Consectetu', '1980-06-20', 'Employé', '2023-03-07', NULL),
(12, 'Haviva Blackwell', 'xeryho', 'Totam earum cupidit', 'cegyxefiva@mailinator.com', 'Pa$$w0rd!', 83, 'Quia dicta', '2010-05-25', 'Etudiant', '2023-03-07', 0),
(13, 'Walter Callahan', 'febugazagy', 'Corporis nemo bland', 'hyqun@mailinator.com', 'Pa$$w0rd!', 95, 'Enim nisi ', '2009-01-11', 'Fonctionnaire', '2023-03-07', 0),
(14, 'adnan', 'adnanlh', 'tanger', 'adnan@gmail.com', '08f90c1a417155361a5c4b8d297e0d78', 33443344, 'kbd33', '2021-10-13', 'Etudiant', '2023-03-07', 0);

-- --------------------------------------------------------

--
-- Structure de la table `admine`
--

CREATE TABLE `admine` (
  `id_admin` int(11) NOT NULL,
  `nom_admin` varchar(20) DEFAULT NULL,
  `emailAdm` varchar(20) DEFAULT NULL,
  `passAdm` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `admine`
--

INSERT INTO `admine` (`id_admin`, `nom_admin`, `emailAdm`, `passAdm`) VALUES
(1, 'John', 'john@example.com', 'pass123'),
(2, 'Mary', 'mary@example.com', 'pass456'),
(3, 'Bob', 'bob@example.com', 'pass789');

-- --------------------------------------------------------

--
-- Structure de la table `emprunt`
--

CREATE TABLE `emprunt` (
  `id_emp` int(11) NOT NULL,
  `date_emp` date DEFAULT NULL,
  `date_eff` date DEFAULT NULL,
  `date_final` date NOT NULL,
  `id_res` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `emprunt`
--

INSERT INTO `emprunt` (`id_emp`, `date_emp`, `date_eff`, `date_final`, `id_res`, `id_admin`) VALUES
(7, '2023-02-15', '2023-03-15', '0000-00-00', 4, 1),
(8, '2023-02-18', '2023-03-18', '0000-00-00', 5, 2),
(9, '2023-02-20', '2023-03-20', '0000-00-00', 6, 2);

-- --------------------------------------------------------

--
-- Structure de la table `ouvre`
--

CREATE TABLE `ouvre` (
  `id_ouvre` int(11) NOT NULL,
  `titre` varchar(50) DEFAULT NULL,
  `auteur` varchar(50) DEFAULT NULL,
  `image` varchar(50) DEFAULT NULL,
  `etat` varchar(50) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `date_edition` date DEFAULT NULL,
  `date_achat` date DEFAULT NULL,
  `pages` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `ouvre`
--

INSERT INTO `ouvre` (`id_ouvre`, `titre`, `auteur`, `image`, `etat`, `type`, `date_edition`, `date_achat`, `pages`) VALUES
(1, 'L\'Étranger', 'Albert Camus', 'cover.jpg', 'neuf', 'roman', '1942-06-30', '2022-02-01', 123),
(2, 'Les Misérables', 'Victor Hugo', 'cover.jpg', 'bon', 'roman', '1862-04-14', '2021-05-22', 1463),
(3, 'Le Petit Prince', 'Antoine de Saint-Exupéry', 'cover.jpg', 'très bon', 'conte', '1943-04-06', '2021-07-18', 96),
(4, '1984', 'George Orwell', 'cover.jpg', 'neuf', 'roman', '1949-06-08', '2022-01-10', 328),
(5, 'Le Rouge et le Noir', 'Stendhal', 'cover.jpg', 'bon', 'roman', '1830-11-13', '2021-06-10', 514),
(6, 'Le Parfum', 'Patrick Süskind', 'cover.jpg', 'très bon', 'roman', '1985-09-17', '2021-08-05', 255),
(7, 'La Peste', 'Albert Camus', 'cover.jpg', 'neuf', 'roman', '1947-06-16', '2022-03-01', 308),
(8, 'Les Fleurs du Mal', 'Charles Baudelaire', 'cover.jpg', 'bon', 'poésie', '1857-06-25', '2021-04-15', 290),
(9, 'Le Cycle de Dune, Tome 1: Dune', 'Frank Herbert', 'cover.jpg', 'très bon', 'roman de science-fiction', '1965-06-01', '2021-09-20', 624),
(10, 'Les Fourmis', 'Bernard Werber', 'cover.jpg', 'bon', 'roman', '1991-02-22', '2022-01-15', 348);

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

CREATE TABLE `reservation` (
  `id_res` int(11) NOT NULL,
  `date_res` date DEFAULT NULL,
  `date_fin_res` date NOT NULL,
  `id_adh` int(11) NOT NULL,
  `id_ouvre` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `reservation`
--

INSERT INTO `reservation` (`id_res`, `date_res`, `date_fin_res`, `id_adh`, `id_ouvre`) VALUES
(4, '2023-03-05', '0000-00-00', 1, 2),
(5, '2023-03-09', '0000-00-00', 3, 4),
(6, '2023-03-10', '0000-00-00', 2, 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `adherent`
--
ALTER TABLE `adherent`
  ADD PRIMARY KEY (`id_adh`);

--
-- Index pour la table `admine`
--
ALTER TABLE `admine`
  ADD PRIMARY KEY (`id_admin`);

--
-- Index pour la table `emprunt`
--
ALTER TABLE `emprunt`
  ADD PRIMARY KEY (`id_emp`),
  ADD KEY `id_res` (`id_res`),
  ADD KEY `id_admin` (`id_admin`);

--
-- Index pour la table `ouvre`
--
ALTER TABLE `ouvre`
  ADD PRIMARY KEY (`id_ouvre`);

--
-- Index pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id_res`),
  ADD KEY `id_adh` (`id_adh`),
  ADD KEY `id_ouvre` (`id_ouvre`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `adherent`
--
ALTER TABLE `adherent`
  MODIFY `id_adh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `admine`
--
ALTER TABLE `admine`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `emprunt`
--
ALTER TABLE `emprunt`
  MODIFY `id_emp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `ouvre`
--
ALTER TABLE `ouvre`
  MODIFY `id_ouvre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id_res` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `emprunt`
--
ALTER TABLE `emprunt`
  ADD CONSTRAINT `emprunt_ibfk_1` FOREIGN KEY (`id_res`) REFERENCES `reservation` (`id_res`),
  ADD CONSTRAINT `emprunt_ibfk_2` FOREIGN KEY (`id_admin`) REFERENCES `admine` (`id_admin`);

--
-- Contraintes pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`id_adh`) REFERENCES `adherent` (`id_adh`),
  ADD CONSTRAINT `reservation_ibfk_2` FOREIGN KEY (`id_ouvre`) REFERENCES `ouvre` (`id_ouvre`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
