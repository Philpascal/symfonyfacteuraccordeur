-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 16, 2022 at 07:45 AM
-- Server version: 5.7.36
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `facteuraccordeur`
--

-- --------------------------------------------------------

--
-- Table structure for table `couleur`
--

DROP TABLE IF EXISTS `couleur`;
CREATE TABLE IF NOT EXISTS `couleur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codecouleur` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `couleur`
--

INSERT INTO `couleur` (`id`, `codecouleur`) VALUES
(2, 'Blanc'),
(3, 'Marron'),
(5, 'Noir'),
(6, 'Bleu brillant');

-- --------------------------------------------------------

--
-- Table structure for table `devis`
--

DROP TABLE IF EXISTS `devis`;
CREATE TABLE IF NOT EXISTS `devis` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `userrepondre_id` int(11) DEFAULT NULL,
  `date` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `numero` int(11) NOT NULL,
  `codepostal` int(11) NOT NULL,
  `ville` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rue` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reponse` longtext COLLATE utf8mb4_unicode_ci,
  `datereponse` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)',
  PRIMARY KEY (`id`),
  KEY `IDX_8B27C52BA76ED395` (`user_id`),
  KEY `IDX_8B27C52B994500F4` (`userrepondre_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `devis`
--

INSERT INTO `devis` (`id`, `user_id`, `userrepondre_id`, `date`, `numero`, `codepostal`, `ville`, `photo`, `rue`, `message`, `reponse`, `datereponse`) VALUES
(1, 2, 1, '2022-06-07 14:58:04', 5, 78990, 'Orange', 'orange', 'Orange', 'Orange', 'yno', '2022-06-14 13:19:40'),
(2, 1, 1, '2022-06-14 13:21:43', 8, 8, 'h', 'h', 'h', 'Changement de la page d\'accueil du back office', 'test2 mis dans admin', '2022-06-14 13:33:21');

-- --------------------------------------------------------

--
-- Table structure for table `doctrine_migration_versions`
--

DROP TABLE IF EXISTS `doctrine_migration_versions`;
CREATE TABLE IF NOT EXISTS `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20220607135545', '2022-06-07 13:55:56', 253),
('DoctrineMigrations\\Version20220607135719', '2022-06-07 13:57:31', 48),
('DoctrineMigrations\\Version20220607135900', '2022-06-07 13:59:07', 50),
('DoctrineMigrations\\Version20220607140143', '2022-06-07 14:01:50', 43),
('DoctrineMigrations\\Version20220607140424', '2022-06-07 14:04:32', 38),
('DoctrineMigrations\\Version20220607141143', '2022-06-07 14:11:51', 172),
('DoctrineMigrations\\Version20220607141841', '2022-06-07 14:18:51', 231),
('DoctrineMigrations\\Version20220609192856', '2022-06-09 19:29:07', 35),
('DoctrineMigrations\\Version20220610190418', '2022-06-10 19:04:31', 108),
('DoctrineMigrations\\Version20220611162949', '2022-06-11 16:30:02', 140),
('DoctrineMigrations\\Version20220611170953', '2022-06-11 17:10:03', 103);

-- --------------------------------------------------------

--
-- Table structure for table `magasin`
--

DROP TABLE IF EXISTS `magasin`;
CREATE TABLE IF NOT EXISTS `magasin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `numero` int(11) NOT NULL,
  `voie` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `codepostal` int(11) NOT NULL,
  `ville` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `magasin`
--

INSERT INTO `magasin` (`id`, `nom`, `numero`, `voie`, `codepostal`, `ville`) VALUES
(5, 'Pianos Hanlet', 515, 'Rue Hélène Boucher', 78530, 'Buc'),
(6, 'Centre Chopin', 175, 'Rue des Pyrénées', 75020, 'Paris'),
(10, 'Nebout & Hamm', 69, 'Rue de Rome', 75008, 'Paris');

-- --------------------------------------------------------

--
-- Table structure for table `marque`
--

DROP TABLE IF EXISTS `marque`;
CREATE TABLE IF NOT EXISTS `marque` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `marque`
--

INSERT INTO `marque` (`id`, `nom`) VALUES
(2, 'Steinway & Sons'),
(3, 'Kawai'),
(4, 'Bechstein'),
(5, 'Stuart and Sons'),
(6, 'Yamaha'),
(7, 'Pearl River'),
(8, 'Fazioli'),
(9, 'Sauter'),
(10, 'Wilhelm Schimmel'),
(11, 'Bösendorfer'),
(12, 'Schimmel');

-- --------------------------------------------------------

--
-- Table structure for table `messenger_messages`
--

DROP TABLE IF EXISTS `messenger_messages`;
CREATE TABLE IF NOT EXISTS `messenger_messages` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `body` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `headers` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue_name` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `available_at` datetime NOT NULL,
  `delivered_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_75EA56E0FB7336F0` (`queue_name`),
  KEY `IDX_75EA56E0E3BD61CE` (`available_at`),
  KEY `IDX_75EA56E016BA31DB` (`delivered_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `photoaccueil`
--

DROP TABLE IF EXISTS `photoaccueil`;
CREATE TABLE IF NOT EXISTS `photoaccueil` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `carrouselp` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `carrouseld` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `carrouselt` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `carrouselq` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `carrouselc` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prestation` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pianod` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pianoaq` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `diapason` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `accessoir` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `clef` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `video` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_AE15DC15A76ED395` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `photoaccueil`
--

INSERT INTO `photoaccueil` (`id`, `user_id`, `carrouselp`, `carrouseld`, `carrouselt`, `carrouselq`, `carrouselc`, `prestation`, `pianod`, `pianoaq`, `diapason`, `accessoir`, `clef`, `note`, `video`) VALUES
(1, 1, 'scene.jpeg', 'accordeur2.jpg', 'accordeur3.jpg', 'accordeur4.jpg', 'accordeur5.jpg', 'accordeur3.jpg', 'piano1.jpg', 'piano2.jpg', 'diapason.PNG', 'boite_outils.PNG', 'clef.PNG', 'page_accueil.png', 'https://www.youtube.com/embed/bXf4NfOJ1Is');

-- --------------------------------------------------------

--
-- Table structure for table `produit`
--

DROP TABLE IF EXISTS `produit`;
CREATE TABLE IF NOT EXISTS `produit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `photo` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ref` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prix` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `marque_id` int(11) NOT NULL,
  `couleur_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_29A5EC274827B9B2` (`marque_id`),
  KEY `IDX_29A5EC27C31BA576` (`couleur_id`),
  KEY `IDX_29A5EC27C54C8C93` (`type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `produit`
--

INSERT INTO `produit` (`id`, `photo`, `ref`, `prix`, `marque_id`, `couleur_id`, `type_id`) VALUES
(11, 'yamaha-c3x-silent-sh2.jpg', 'yamaha-c3x-silent-sh2', '41400', 6, 5, 1),
(12, 'piano-yamaha-cfx-500x500.jpg', 'piano-yamaha-cfx-500x500', '137300', 6, 5, 1),
(13, 'yamaha-c1x-silent-sh2.jpg', 'yamaha-c1x-silent-sh2', '33350', 6, 5, 1),
(14, 'piano-droit-yamaha-YUS5-transacoustic-TA2-noir-P.jpg', 'piano-droit-yamaha-YUS5-transacoustic-TA2-noir-P', '20800', 6, 5, 2),
(15, 'yamaha-se132sh-noirbrillant-0.jpg', 'yamaha-se132sh-noirbrillant-0', '24900', 6, 5, 2),
(16, 'piano-droit-yamaha-P116-silent-SH2-noir.jpg', 'piano-droit-yamaha-P116-silent-SH2-noir', '10550', 6, 5, 2),
(17, 'piano-steinwaysons-acajou-1904-P-500x502.jpg', 'piano-steinwaysons-acajou-1904-P-500x502', '29800', 2, 3, 1),
(18, 'eu122s-whitepolish.jpg', 'eu122s-whitepolish', '3958', 7, 2, 2),
(19, 'up115m5ebony-polishsmall.jpg', 'up115m5ebony-polishsmall', '3308', 7, 5, 2),
(20, 'eu118s-bluepolish.jpg', 'eu118s-bluepolish', '4354', 7, 6, 2),
(21, 'a-188_300ans_dakotajackson.png', 'a-188_300ans_dakotajackson', '42300', 2, 5, 1),
(22, 'a0026876.jpg', 'a0026876', '142100', 8, 5, 1),
(23, 'piano-a-queue-yamaha-gb1k-blanc-brillant.jpg', 'piano-a-queue-yamaha-gb1k-blanc-brillant', '13250', 6, 2, 1),
(24, 'chippendale-160-et-185.jpg', 'chippendale-160-et-185', '53600', 9, 3, 1),
(25, 'delta-185.jpg', 'delta-185', '56200', 9, 5, 1),
(27, 'Piano-Bösendorfer-130-SH-P-500x500.jpg', 'Piano-Bösendorfer-130-SH-P-500x500', '51469', 11, 5, 2),
(28, 'schimmel-c126-noir-tradition-twintone.jpg', 'schimmel-c126-noir-tradition-twintone', '18870', 10, 5, 2);

-- --------------------------------------------------------

--
-- Table structure for table `produit_magasin`
--

DROP TABLE IF EXISTS `produit_magasin`;
CREATE TABLE IF NOT EXISTS `produit_magasin` (
  `produit_id` int(11) NOT NULL,
  `magasin_id` int(11) NOT NULL,
  PRIMARY KEY (`produit_id`,`magasin_id`),
  KEY `IDX_9254D45EF347EFB` (`produit_id`),
  KEY `IDX_9254D45E20096AE3` (`magasin_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `produit_magasin`
--

INSERT INTO `produit_magasin` (`produit_id`, `magasin_id`) VALUES
(11, 10),
(12, 10),
(13, 10),
(14, 10),
(15, 10),
(16, 10),
(17, 10),
(18, 5),
(19, 5),
(20, 5),
(21, 5),
(22, 5),
(23, 5),
(24, 6),
(25, 6),
(27, 10),
(28, 10);

-- --------------------------------------------------------

--
-- Table structure for table `reset_password_request`
--

DROP TABLE IF EXISTS `reset_password_request`;
CREATE TABLE IF NOT EXISTS `reset_password_request` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `selector` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hashed_token` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `requested_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `expires_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  PRIMARY KEY (`id`),
  KEY `IDX_7CE748AA76ED395` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

DROP TABLE IF EXISTS `type`;
CREATE TABLE IF NOT EXISTS `type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `forme` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`id`, `forme`) VALUES
(1, 'Piano à queue'),
(2, 'Piano droit');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` json NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_verified` tinyint(1) NOT NULL,
  `prenom` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tel` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `roles`, `password`, `is_verified`, `prenom`, `tel`, `nom`) VALUES
(1, 'ph.sedlacek@free.fr', '[\"ROLE_ADMIN\"]', '$2y$13$20fTK6zwUontt83Y4Yy6gOSaDu7JTzDVouKHkl.vVokU9fSph/K/2', 1, 'Philippe', '0782365908', 'SEDLACEK'),
(2, 'd.k@free.fr', '[]', '$2y$13$XHunaZOdVa0Z12sz7RxS8.a0TbMzTLQhoHBV7EzSspgsw/McgGcym', 1, 'Karine', '0102030405', 'delatte');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `devis`
--
ALTER TABLE `devis`
  ADD CONSTRAINT `FK_8B27C52B994500F4` FOREIGN KEY (`userrepondre_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `FK_8B27C52BA76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `photoaccueil`
--
ALTER TABLE `photoaccueil`
  ADD CONSTRAINT `FK_AE15DC15A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `produit`
--
ALTER TABLE `produit`
  ADD CONSTRAINT `FK_29A5EC274827B9B2` FOREIGN KEY (`marque_id`) REFERENCES `marque` (`id`),
  ADD CONSTRAINT `FK_29A5EC27C31BA576` FOREIGN KEY (`couleur_id`) REFERENCES `couleur` (`id`),
  ADD CONSTRAINT `FK_29A5EC27C54C8C93` FOREIGN KEY (`type_id`) REFERENCES `type` (`id`);

--
-- Constraints for table `produit_magasin`
--
ALTER TABLE `produit_magasin`
  ADD CONSTRAINT `FK_9254D45E20096AE3` FOREIGN KEY (`magasin_id`) REFERENCES `magasin` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_9254D45EF347EFB` FOREIGN KEY (`produit_id`) REFERENCES `produit` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `reset_password_request`
--
ALTER TABLE `reset_password_request`
  ADD CONSTRAINT `FK_7CE748AA76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
