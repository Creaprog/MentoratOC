-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Lun 08 Février 2016 à 17:14
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `myonlinetown`
--
CREATE DATABASE IF NOT EXISTS `myonlinetown` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `myonlinetown`;

-- --------------------------------------------------------

--
-- Structure de la table `activities`
--

CREATE TABLE IF NOT EXISTS `activities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` varchar(255) NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 NOT NULL,
  `description` varchar(255) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Contenu de la table `activities`
--

INSERT INTO `activities` (`id`, `date`, `title`, `description`) VALUES
(1, '2016-02-04', 'Cras ornare nisi id tincidunt', 'Ut congue enim non lectus mattis, id semper nul'),
(2, '2016-02-05', 'Pellentesque a arcu maximus', 'Quisque molestie lorem quis elit gravida, et vulputate leo porttitor.'),
(3, '2016-02-07', ' Fusce viverra laoreet leo', 'Etiam sagittis vitae erat vitae ullamcorper. Interdum et malesuada fames ac'),
(4, '2016-02-08', 'Fusce faucibus massa', 'Duis eget fermentum erat, ut mattis tortor. Nulla feugiat in metus in sollicitudin.'),
(5, '2016-02-11', 'Duis luctus faucibus velit', 'Aliquam vulputate maximus bibendum. Nullam ipsum justo'),
(6, '2016-02-12', 'Cras ornare nisi', 'Fusce viverra laoreet leo, in venenatis nisi. Etiam sagittis '),
(7, '2016-02-14', 'Ut tristique finibus fringilla', 'Vestibulum vitae nisi elementum metus rutrum maximus in eu nibh. Sed'),
(8, '2016-02-15', 'Cras ornare nisi id tincidunt', 'Curabitur pellentesque aliquam enim sed gravida. Nunc auctor'),
(9, '2016-02-17', 'Vestibulum vitae nis', 'Vestibulum vitae nis'),
(10, '2016-02-19', 'Etiam sagittis ', 'faucibus. Aliquam et euismod dolor, vel blandit libero.');

-- --------------------------------------------------------

--
-- Structure de la table `grades`
--

CREATE TABLE IF NOT EXISTS `grades` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `level` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `moreinfos`
--

CREATE TABLE IF NOT EXISTS `moreinfos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 NOT NULL,
  `content` text CHARACTER SET utf8 NOT NULL,
  `image` varchar(255) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Contenu de la table `moreinfos`
--

INSERT INTO `moreinfos` (`id`, `title`, `content`, `image`) VALUES
(1, 'lor sit amet, consectetur adipiscing', 'Nam in semper quam, vel pretium mauris. Praesent non massa est. Suspendisse at enim nunc. Nulla nec ullamcorper ante, vitae placerat lacus. Nulla aliquet cursus arcu, eget maximus velit varius quis. Phasellus sit amet turpis tempor metus sodales sollicitudin ac eu velit. Suspendisse feugiat nisl vitae urna accumsan vehicula. Aliquam blandit pharetra ipsum sed rutrum. In dapibus eu magna sit amet dapibus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Morbi non nisl euismod, mollis ligula', 'http://lorempixel.com/image_output/technics-q-c-950-219-2.jpg'),
(2, 'et, ultrices quam. Praesent vulputate', 'Fusce at viverra metus, non lobortis lacus. Mauris tincidunt facilisis vestibulum. Morbi vestibulum nulla sit amet augue rhoncus, eu sagittis nisl venenatis. Proin quis ultrices neque. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in fermentum enim, non convallis erat. Proin molestie sollicitudin leo, et iaculis sapien auctor non. Vivamus vel ligula orci. Nullam dolor magna, vestibulum ac ex non, aliquam lobortis', 'http://lorempixel.com/image_output/nightlife-q-c-950-219-5.jpg'),
(3, 'aliquam tellus diam, nec venenatis', 'Suspendisse condimentum vitae nunc quis faucibus. Aliquam erat volutpat. Sed egestas ex tellus, id tempor nunc consectetur in. In ut fringilla est. Donec aliquet, eros eu rutrum porta, ipsum nisi mollis metus, in fermentum eros mauris et nibh. Etiam consectetur tempus sollicitudin. Integer id neque cursus, accumsan lacus quis, venenatis leo. Integer in placerat leo. Morbi maximus turpis vel ligula posuere dictum. Donec tincidunt ipsum placerat lacus gravida, vitae lacinia augue pretium. Vestibulum id nisl mi. Suspendisse ac auctor elit.', 'http://lorempixel.com/image_output/sports-q-c-950-219-8.jpg'),
(4, 'scelerisque vestibulum odio mattis vel', 'neque nec orci dapibus rhoncus eu nec metus. Nullam eu sapien sed nulla fermentum imperdiet. Ut a nisl nisi. Integer facilisis quam nisi, ac vehicula sem blandit sagittis. Curabitur nec felis eget purus dignissim consequat ac sed metus. Mauris tristique turpis ut metus elementum, ac varius elit lobortis. Quisque vel diam vehicula ligula tempus lacinia in et dolor. Aenean id mollis augue. Mauris libero quam, bibendum sed orci et, tempor molestie urna. In fermentum massa volutpat fermentum eleifend', 'http://lorempixel.com/image_output/city-q-c-950-219-5.jpg'),
(5, 'Suspendisse ultricies suscipit tincidunt', 'Nunc vestibulum purus rhoncus eros commodo, quis pharetra elit pharetra. Ut tristique finibus fringilla. Vestibulum vitae nisi elementum metus rutrum maximus in eu nibh. Sed varius lacus in sapien dictum, at tincidunt mauris porttitor. Suspendisse at rhoncus mauris. In nec magna non sem dignissim luctus quis in nunc. Donec facilisis aliquet facilisis. Integer sit amet libero urna. Fusce viverra laoreet leo, in venenatis nisi. Etiam sagittis vitae erat vitae ullamcorper. Interdum et malesuada fames ac ante ipsum primis in faucibus. Aliquam et euismod dolor, vel blandit libero.', 'http://lorempixel.com/image_output/animals-q-c-950-219-5.jpg'),
(6, 'Quisque tincidunt lorem dui', 'Pellentesque a arcu maximus tortor efficitur malesuada a et nisi. Quisque molestie lorem quis elit gravida, et vulputate leo porttitor. Fusce vitae luctus ante, at tristique magna. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Proin venenatis orci eu massa tristique cursus. Cras dolor lorem, vulputate sit amet lectus in, vestibulum iaculis sapien. Proin eros purus, mattis non ornare a, dapibus at elit. Morbi eu risus fermentum, vehicula neque eget, elementum quam. Pellentesque id ipsum et odio ullamcorper sollicitudin non suscipit tellus. Nam et condimentum purus, sed vulputate augue', 'http://lorempixel.com/image_output/animals-q-c-950-219-3.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 NOT NULL,
  `content` text CHARACTER SET utf8 NOT NULL,
  `image` varchar(255) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Contenu de la table `news`
--

INSERT INTO `news` (`id`, `title`, `content`, `image`) VALUES
(1, 'Lorem ipsum dolor sit amet, consectetur adipiscing', 'Sed mattis odio accumsan congue condimentum. Vivamus vitae venenatis mi, sit amet porttitor ante. Cras tempor hendrerit interdum. Aliquam blandit aliquet ipsum, eget porttitor mi vehicula id. Maecenas nec vulputate nibh. Aliquam lacus magna, pretium non rhoncus sed, pharetra non metus. Donec vel nunc posuere, mattis nibh eget, tristique nibh. Maecenas mollis turpis et ultricies interdum. Curabitur sodales lectus sem, eu fermentum massa vehicula sed. Nam suscipit massa sit amet aliquet ultrices. Nam suscipit orci non posuere consectetur. Praesent dignissim ante finibus, euismod enim at, rutrum nibh.', 'http://lorempixel.com/image_output/nightlife-q-c-950-219-1.jpg'),
(2, 'Nulla ullamcorper tortor congue', 'Vestibulum dictum non dolor id ultrices. Pellentesque non mollis turpis. Aliquam nulla mi, commodo et fermentum imperdiet, interdum et diam. Proin aliquet ipsum ut vestibulum facilisis. Vivamus quis commodo mi. Sed scelerisque bibendum orci, sed ultrices diam dapibus cursus. Ut est lectus, rutrum id odio sed, auctor consectetur odio. Aenean gravida lectus non lectus bibendum convallis. Sed at facilisis purus. Nulla ullamcorper tortor congue risus molestie, pharetra venenatis tellus mollis. Maecenas aliquet quam dui, quis euismod felis malesuada at.', 'http://lorempixel.com/image_output/nature-q-c-950-219-3.jpg'),
(3, 'posuere consectetur', 'Nam pretium ipsum neque, eu condimentum nisi fringilla vitae. Ut nec erat dapibus, cursus neque eget, molestie ligula. Sed facilisis tristique quam. Nulla lacinia turpis quis dapibus viverra. Integer tristique sollicitudin dui sed suscipit. Donec porta, metus quis scelerisque eleifend, orci risus fermentum libero, ut ullamcorper mauris nisl at lorem. Nulla euismod massa at nisl malesuada, nec accumsan nibh ultricies. Cras fermentum felis sit amet elit venenatis, ut blandit sem egestas.', 'http://lorempixel.com/image_output/city-q-c-950-219-9.jpg'),
(4, 'In gravida ligula metus, ac', 'Vivamus sodales consequat massa eu iaculis. Sed urna nunc, ornare in eleifend vel, molestie vel elit. Etiam vulputate quam dolor, eget ultricies nisi molestie sit amet. Phasellus id nulla velit. Vestibulum convallis lectus id nulla lacinia aliquam in sit amet ipsum. Maecenas accumsan, tellus eget finibus finibus', 'http://lorempixel.com/image_output/city-q-c-950-219-8.jpg'),
(5, 'vitae ultricies sem egestas', 'Vivamus sodales consequat massa eu iaculis. Sed urna nunc, ornare in eleifend vel, molestie vel elit. Etiam vulputate quam dolor, eget ultricies nisi molestie sit amet. Phasellus id nulla velit. Vestibulum convallis lectus id nulla lacinia aliquam in sit amet ipsum. Maecenas accumsan, tellus eget finibus finibus, ante elit commodo mauris, sed eleifend dolor tellus consectetur felis. Donec eget consectetur erat. Pellentesque bibendum, nulla non porttitor pharetra, dolor elit vehicula sapien, sit amet tempus urna arcu ac erat. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin ac', 'http://lorempixel.com/image_output/city-q-c-950-219-3.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `grade` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
