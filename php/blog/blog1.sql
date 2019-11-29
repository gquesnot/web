-- phpMyAdmin SQL Dump
-- version 5.0.0-alpha1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le :  ven. 29 nov. 2019 à 16:32
-- Version du serveur :  5.7.28-0ubuntu0.16.04.2
-- Version de PHP :  7.3.9-1+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `blog1`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `aut_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`admin_id`, `aut_id`) VALUES
(1, 2);

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE `article` (
  `art_id` int(11) NOT NULL,
  `aut_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `art_titre` varchar(255) NOT NULL,
  `art_contenu` text NOT NULL,
  `art_datetime` datetime NOT NULL,
  `art_img` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`art_id`, `aut_id`, `cat_id`, `art_titre`, `art_contenu`, `art_datetime`, `art_img`) VALUES
(23, 2, 2, 'le chat ', 'green', '2019-11-28 13:42:48', 'img/5ddfc0c8e7c19.png'),
(24, 3, 2, 'Un article sur les souris', 'C\'est l histoire d\'une souris qui souris', '2019-11-28 14:08:36', 'img/5ddfc6d40f298.jpg'),
(38, 3, 3, 'Les rats des devils alert(\'helo\')', '<p>je sais pas trop quoi mettre mais j\'ai des script &lt;script&gt;alert(\'halo\')&lt;/script&gt;</p>', '2019-11-29 14:18:19', ''),
(39, 3, 3, 'Les rats des deevils alert(\'helo\')', '<p>je sais pas trop quoi mettre mais j\'ai des script &lt;script&gt;alert(\'halo\')&lt;/script&gt;</p>', '2019-11-29 14:20:58', ''),
(40, 2, 1, 'l historerieirazdja echo(\'112121\')', '<p>l historerieirazdja &lt;script&gt;echo(\'112121\')&lt;/script&gt;<br></p>', '2019-11-29 14:24:07', ''),
(41, 2, 2, 'echo(\'aadazdaz\')', '<p>&lt;script&gt;echo(\'aadazdaz\')&lt;/script&gt;</p>', '2019-11-29 14:25:50', ''),
(42, 2, 2, 'dazdazdazdaz', '<p>&lt;script&gt;alert(\'aadazdaz\')&lt;/script&gt;<br></p>', '2019-11-29 14:33:02', ''),
(43, 2, 2, 'dazdazdazdazaaaaa<script>echo(\'aadazdaz\')</script>', '<p>&lt;script&gt;echo(\'aadazdaz\')&lt;/script&gt;<span style=\"font-size: 1rem;\">&lt;script&gt;echo(\'aadazdaz\')&lt;/script&gt;</span><span style=\"font-size: 1rem;\">&lt;script&gt;echo(\'aadazdaz\')&lt;/script&gt;</span><span style=\"font-size: 1rem;\">&lt;script&gt;echo(\'aadazdaz\')&lt;/script&gt;</span><span style=\"font-size: 1rem;\">&lt;script&gt;echo(\'aadazdaz\')&lt;/script&gt;</span></p>', '2019-11-29 14:35:12', ''),
(44, 2, 1, 'dazdazdazdazaaaaaecho(\'aadazdaz\')echo(\'aadazdaz\')', '<p>dazdazdazdazaaaaa&lt;script&gt;echo(\'aadazdaz\')&lt;/script&gt;&lt;script&gt;echo(\'aadazdaz\')&lt;/script&gt;&lt;script&gt;echo(\'aadazdaz\')&lt;/script&gt;&lt;script&gt;echo(\'aadazdaz\')&lt;/script&gt;&lt;script&gt;echo(\'aadazdaz\')&lt;/script&gt;&lt;script&gt;echo(\'aadazdaz\')&lt;/script&gt;&lt;script&gt;echo(\'aadazdaz\')&lt;/script&gt;&lt;script&gt;echo(\'aadazdaz\')&lt;/script&gt;&lt;script&gt;echo(\'aadazdaz\')&lt;/script&gt;</p>echo(\'aadazdaz\')', '2019-11-29 14:36:34', ''),
(45, 2, 2, 'eaeecho(\'aadazaaazdaz\')dzadazdazdazdazecho(\'aadazdaz\')echo(\'aadazdaz\')echo(\'aadazdaz\')', '<p>&lt;script&gt;echo(\'aadazdaz\')&lt;/script&gt;&lt;script&gt;echo(\'aadazdaz\')&lt;/script&gt;&lt;script&gt;echo(\'aadazdaz\')&lt;/script&gt;&lt;script&gt;echo(\'aadazdaz\')&lt;/script&gt;&lt;script&gt;echo(\'aadazdaz\')&lt;/script&gt;&lt;script&gt;echo(\'aadazdaz\')&lt;/script&gt;&lt;script&gt;echo(\'aadazdaz\')&lt;/script&gt;&lt;script&gt;echo(\'aadazdaz\')&lt;/script&gt;<br></p>', '2019-11-29 14:37:00', ''),
(46, 3, 3, 'laaaaaaaaaaaaaaaaaaaaaaaaecho(\'aadazdaz\')', '<p>aaaaaaaaaaaaa&lt;script&gt;alert(\'aadazdaz\')&lt;/script&gt;&lt;script&gt;alert(\'aadazdaz\')&lt;/script&gt;</p>', '2019-11-29 14:38:04', ''),
(47, 3, 3, 'laaaaaaaaaaaaaaaaaaaaaaaaaaecho(\'aadazdaz\')', '<p>aaaaaaaaaaaaa&lt;script&gt;alert(\'aadazdaz\')&lt;/script&gt;&lt;script&gt;alert(\'aadazdaz\')&lt;/script&gt;</p>', '2019-11-29 14:38:22', ''),
(48, 3, 2, 'laaaaaaaaaaaaaaaaaaaaaaaaaaalert(\'aadazdaz\')', '<p>laaaaaaaaaaaaaaaaaaaaaaaaaa&lt;script&gt;alert(\'aadazdaz\')&lt;/script&gt;</p>echo(\'aadazdaz\')', '2019-11-29 14:38:59', ''),
(49, 2, 1, 'laaaaaaaaaaaaaaaaaaaaaaaaaaalert(\'aadazdaz\')', 'laaaaaaaaaaaaaaaaaaaaaaaaaaalert(\'aadazdaz\')', '2019-11-29 14:39:07', ''),
(50, 2, 2, '1111111111111112222222222223333333333alert(\'aadazdaz\')', '<p>laaaaaaaaaaaaaaaaaaaaaaaaaa</p>alert(\'aadazdaz\')', '2019-11-29 14:39:56', ''),
(51, 2, 1, '11111111111111122242222222223333333333alert(\'aadazdaz\')', '1111111111111112222222222223333333333alert(\'aadazdaz\')', '2019-11-29 14:41:25', ''),
(52, 2, 2, 'Le Cariboudazdazecho(\'aadazdaz\')', '<p>la marmote&nbsp;&lt;script&gt;echo(\'aadazdaz\')&lt;/script&gt;</p>', '2019-11-29 14:42:38', ''),
(53, 3, 2, 'alert(\'caribou\')abbccc', '<p>&lt;script&gt;alert(\'caribou\')&lt;/script&gt;abbccc<br></p>', '2019-11-29 14:44:34', ''),
(54, 2, 2, 'alert(\'caribou\')abbcccc', '<p>&lt;script&gt;alert(\'caribou\')&lt;/script&gt;abbcccc<br></p>', '2019-11-29 14:46:01', ''),
(55, 2, 3, 'alert(\'caribou\')abbcccdddd', '<p>&lt;script&gt;alert(\'caribou\')&lt;/script&gt;abbcccdddd<br></p>', '2019-11-29 14:49:20', '');

-- --------------------------------------------------------

--
-- Structure de la table `auteur`
--

CREATE TABLE `auteur` (
  `aut_id` int(11) NOT NULL,
  `aut_nom` varchar(255) NOT NULL,
  `aut_prenom` varchar(100) NOT NULL,
  `aut_pseudo` varchar(20) NOT NULL,
  `aut_email` varchar(100) NOT NULL,
  `aut_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `auteur`
--

INSERT INTO `auteur` (`aut_id`, `aut_nom`, `aut_prenom`, `aut_pseudo`, `aut_email`, `aut_password`) VALUES
(2, 'gabriel', 'quesnot', 'gaqu1994', 'gaqu1994@gmail.com', '$2y$11$VlxakROCZe0Za1BpPpJJKu51Mm7AwC2pk/z0bwDu/ok6o/YrdFn66'),
(3, 'l\'elephant', 'dumbo', 'babar', 'bb@bb.fr', '$2y$11$5P7xuG4gCuCgUyS3oj8JP.xv5ReEgEW8Segu3vYO89y3yAB4LMGAO'),
(4, '<script>alert(\'caribou\')</script>', '<script>alert(\'bb\')</script>', 'gaqu1995', 'gaqu1995@gmail.com', '$2y$11$lDNNnx9g3VRmcR5YqsweU.O16spHu6d6POzsml7bLPsHLesFlHtRe');

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `cat_id` int(11) NOT NULL,
  `cat_nom` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`cat_id`, `cat_nom`) VALUES
(1, 'sport'),
(2, 'nature'),
(3, 'voyage'),
(4, 'news'),
(5, 'autres');

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

CREATE TABLE `commentaire` (
  `com_id` int(11) NOT NULL,
  `art_id` int(11) NOT NULL,
  `com_pseudo` varchar(20) NOT NULL,
  `com_texte` text NOT NULL,
  `com_datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `commentaire`
--

INSERT INTO `commentaire` (`com_id`, `art_id`, `com_pseudo`, `com_texte`, `com_datetime`) VALUES
(6, 23, 'salut', 'dazdazdazdazdazdaz', '2019-11-28 14:53:21'),
(7, 23, 'un random caribou', 'BOUH', '2019-11-28 14:53:39'),
(8, 24, 'pyj', 'FIRST FIRST FIRST !!!!', '2019-11-28 15:07:32'),
(9, 23, 'zdazdazdaz', 'dazdazda', '2019-11-28 15:57:51'),
(10, 23, 'dzadazd', 'dzadaz', '2019-11-28 16:00:28'),
(11, 23, '121', '122121', '2019-11-28 16:00:33'),
(12, 23, '123', 'azeazeaz', '2019-11-28 16:01:38'),
(13, 23, '1234', 'dazdazdaz', '2019-11-28 16:02:59'),
(14, 23, '11', '12', '2019-11-28 16:04:24'),
(15, 23, '12332131', 'dzada', '2019-11-28 16:05:30'),
(20, 24, 'scriptkiddies', '<script>document.location.href = \"index.php?cookie=\" + document.cookie(</script>', '2019-11-29 10:05:26'),
(21, 24, 'bbrot', '<script>document.location.href = \"index.php?cookie=\" + document.cookie</script>', '2019-11-29 10:05:56'),
(28, 55, 'alert(\'a\')', '<p>&lt;script&gt;alert(\'a\')&lt;/script&gt;<br></p>', '2019-11-29 14:52:39'),
(29, 55, 'alert(\'a\')', 'alert(\'a\')', '2019-11-29 14:53:08');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`),
  ADD KEY `aut_id` (`aut_id`);

--
-- Index pour la table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`art_id`),
  ADD KEY `cat_id` (`cat_id`),
  ADD KEY `aut_id` (`aut_id`),
  ADD KEY `art_titre` (`art_titre`),
  ADD KEY `art_datetime` (`art_datetime`);

--
-- Index pour la table `auteur`
--
ALTER TABLE `auteur`
  ADD PRIMARY KEY (`aut_id`),
  ADD UNIQUE KEY `aut_pseudo` (`aut_pseudo`),
  ADD UNIQUE KEY `aut_email_2` (`aut_email`),
  ADD KEY `aut_email` (`aut_email`,`aut_password`);

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`cat_id`);

--
-- Index pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD PRIMARY KEY (`com_id`),
  ADD KEY `art_id` (`art_id`),
  ADD KEY `com_datetime` (`com_datetime`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `article`
--
ALTER TABLE `article`
  MODIFY `art_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT pour la table `auteur`
--
ALTER TABLE `auteur`
  MODIFY `aut_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `commentaire`
--
ALTER TABLE `commentaire`
  MODIFY `com_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`aut_id`) REFERENCES `auteur` (`aut_id`);

--
-- Contraintes pour la table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `article_ibfk_1` FOREIGN KEY (`aut_id`) REFERENCES `auteur` (`aut_id`),
  ADD CONSTRAINT `article_ibfk_2` FOREIGN KEY (`cat_id`) REFERENCES `categorie` (`cat_id`);

--
-- Contraintes pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD CONSTRAINT `commentaire_ibfk_1` FOREIGN KEY (`art_id`) REFERENCES `article` (`art_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

