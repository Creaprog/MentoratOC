-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Dim 01 Mai 2016 à 10:39
-- Version du serveur :  5.7.9
-- Version de PHP :  5.6.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `mycityonline`
--
CREATE DATABASE IF NOT EXISTS `mycityonline` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `mycityonline`;

-- --------------------------------------------------------

--
-- Structure de la table `activities`
--

DROP TABLE IF EXISTS `activities`;
CREATE TABLE IF NOT EXISTS `activities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `instant` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `publish` int(11) NOT NULL DEFAULT '1',
  `Type` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `informations`
--

DROP TABLE IF EXISTS `informations`;
CREATE TABLE IF NOT EXISTS `informations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `publish` int(11) NOT NULL DEFAULT '1',
  `Type` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `news`
--

DROP TABLE IF EXISTS `news`;
CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `publish` int(11) NOT NULL DEFAULT '1',
  `Type` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `grade` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/* Account config */
DELIMITER ;;
CREATE PROCEDURE accounts_creator()
BEGIN
DECLARE admin VARCHAR(255);
DECLARE admin_pass VARCHAR(255);
DECLARE publisher_1 VARCHAR(255);
DECLARE publisher_1_pass VARCHAR(255);
DECLARE publisher_2 VARCHAR(255);
DECLARE publisher_2_pass VARCHAR(255);
DECLARE unpublisher_1 VARCHAR(255);
DECLARE unpublisher_1_pass VARCHAR(255);
DECLARE unpublisher_2 VARCHAR(255);
DECLARE unpublisher_2_pass VARCHAR(255);
DECLARE unpublisher_3 VARCHAR(255);
DECLARE unpublisher_3_pass VARCHAR(255);

  SET admin = "",
      admin_pass = "",
      publisher_1 = "",
      publisher_1_pass = "",
      publisher_2 = "",
      publisher_2_pass = "",
      unpublisher_1 = "",
      unpublisher_1_pass = "",
      unpublisher_2 = "",
      unpublisher_2_pass = "",
      unpublisher_3 = "",
      unpublisher_3_pass = "";

  INSERT INTO `users` (`id`, `pseudo`, `password`, `grade`) VALUES
  (1, admin, admin_pass, 'Admin');
  INSERT INTO `users` (`id`, `pseudo`, `password`, `grade`) VALUES
  (2, publisher_1, publisher_1_pass, 'Publish');
  INSERT INTO `users` (`id`, `pseudo`, `password`, `grade`) VALUES
  (3, publisher_2, publisher_2_pass, 'Publish');
  INSERT INTO `users` (`id`, `pseudo`, `password`, `grade`) VALUES
  (4, unpublisher_1, unpublisher_1_pass, 'Unpublish');
  INSERT INTO `users` (`id`, `pseudo`, `password`, `grade`) VALUES
  (5, unpublisher_2, unpublisher_2_pass, 'Unpublish');
  INSERT INTO `users` (`id`, `pseudo`, `password`, `grade`) VALUES
  (6, unpublisher_3, unpublisher_3_pass, 'Unpublish');
END ;;
