-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 07 mars 2024 à 19:02
-- Version du serveur : 8.0.31
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `administrateur`
--

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(1, 'matabsaifeddine@gmail.com', 'acccountff@gmail.com', '$2y$10$irL9zDzc0JZTPosyU.MYo.dZM7vHEcrh0ZKHVDmrXGtW/fKGucn.G'),
(2, 'samir fezani', 'acccountff@gmail.com', '$2y$10$KJ5YtnfiYaUo3mOkVsKkfOpc3uiZciTr9hFi6PZxisH.HGelPyqdy'),
(3, 'kernel', 'saif@gmail.com', '$2y$10$jBEcy10fHwBQWX/Tm53/R.Mzx3Uqw5Jnvg5hzN5x5tIdGgwVSWH/m'),
(4, 'ilyass', 'ilyas@gmaul.com', '$2y$10$.FKx6AgUw6FMEIAjztJYYO9xkiol4uIRrgJzuUQzIJsschf175OA.'),
(5, 'hhh', 'hh@gmaul.com', '$2y$10$176K/GuEqqIUADumZB/fk.vQmilKAXSgEskAJXkD3pjo/3xKE0gDi'),
(6, 'dranoel', 'dranel@gmaul.com', '$2y$10$TrcH98jHHDc2/WzhmFULeuVrIBJ3dovIp2ovnGwL9HglNZ7kYylbK');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
