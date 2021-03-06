-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  sam. 06 jan. 2018 à 15:00
-- Version du serveur :  10.1.26-MariaDB
-- Version de PHP :  7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `td3`
--

-- --------------------------------------------------------

--
-- Structure de la table `amis`
--

CREATE TABLE `amis` (
  `id` int(11) NOT NULL,
  `login1` varchar(64) NOT NULL,
  `login2` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `amis`
--

INSERT INTO `amis` (`id`, `login1`, `login2`) VALUES
(1, 'dominique.rocheteau', 'lucius.malefoy'),
(2, 'lucius.malefoy', 'dominique.rocheteau'),
(3, 'peter.pettigrow', 'oliver.queen'),
(4, 'oliver.queen', 'peter.pettigrow'),
(5, 'molly.weasley', 'nymphadora.tonks'),
(6, 'nymphadora.tonks', 'molly.weasley'),
(7, 'dominique.potter', 'harry.potter'),
(8, 'harry.potter', 'dominique.potter'),
(9, 'stanley.ipkiss', 'clark.kent'),
(10, 'clark.kent', 'stanley.ipkiss'),
(11, 'bill.weasley', 'harry.potter'),
(12, 'harry.potter', 'bill.weasley'),
(13, 'ginny.weasley', 'dobby.dobby'),
(14, 'dobby.dobby', 'ginny.weasley'),
(15, 'dolores.ombrage', 'remus.lupin'),
(16, 'remus.lupin', 'dolores.ombrage'),
(17, 'george.weasley', 'scott.summers'),
(18, 'scott.summers', 'george.weasley'),
(21, 'albus.dumbledore', 'clark.kent'),
(22, 'clark.kent', 'albus.dumbledore'),
(23, 'albus.dumbledore', 'kurt.wagner'),
(24, 'kurt.wagner', 'albus.dumbledore'),
(25, 'abelforth.dumbledore', 'dominique.farrugia'),
(26, 'dominique.farrugia', 'abelforth.dumbledore'),
(27, 'dominique.rocheteau', 'robert.drake'),
(28, 'robert.drake', 'dominique.rocheteau'),
(29, 'narcissa.malefoy', 'henry.mac-coy'),
(30, 'henry.mac-coy', 'narcissa.malefoy'),
(31, 'tim.drake', 'john.jones'),
(32, 'john.jones', 'tim.drake'),
(33, 'dominique.rocheteau', 'ginny.weasley'),
(34, 'ginny.weasley', 'dominique.rocheteau'),
(35, 'ron.weasley', 'steve.rogers'),
(36, 'steve.rogers', 'ron.weasley'),
(37, 'dominique.potter', 'oliver.queen'),
(38, 'oliver.queen', 'dominique.potter'),
(39, 'fred.weasley', 'hermione.granger'),
(40, 'hermione.granger', 'fred.weasley'),
(41, 'rubeus.hagrid', 'clark.kent'),
(42, 'clark.kent', 'rubeus.hagrid'),
(43, 'stanley.ipkiss', 'mar.mar-vell'),
(44, 'mar.mar-vell', 'stanley.ipkiss'),
(47, 'fred.weasley', 'lucius.malefoy'),
(48, 'lucius.malefoy', 'fred.weasley'),
(49, 'robert.reynolds', 'john.jones'),
(50, 'john.jones', 'robert.reynolds'),
(51, 'minerva.mcgonagall', 'abelforth.dumbledore'),
(52, 'abelforth.dumbledore', 'minerva.mcgonagall'),
(53, 'ginny.weasley', 'bill.weasley'),
(54, 'bill.weasley', 'ginny.weasley'),
(55, 'drago.malefoy', 'ron.weasley'),
(56, 'ron.weasley', 'drago.malefoy'),
(57, 'percy.weasley', 'robert.reynolds'),
(58, 'robert.reynolds', 'percy.weasley'),
(59, 'clark.kent', 'peter.parker'),
(60, 'peter.parker', 'clark.kent'),
(61, 'remus.lupin', 'abelforth.dumbledore'),
(62, 'abelforth.dumbledore', 'remus.lupin'),
(63, 'albus.dumbledore', 'ron.weasley'),
(64, 'ron.weasley', 'albus.dumbledore'),
(65, 'abelforth.dumbledore', 'robert.reynolds'),
(66, 'robert.reynolds', 'abelforth.dumbledore'),
(67, 'robert.drake', 'barry.allen'),
(68, 'barry.allen', 'robert.drake'),
(69, 'dick.grayson', 'scott.summers'),
(70, 'scott.summers', 'dick.grayson'),
(71, 'dominique.rocheteau', 'matt.murdock'),
(72, 'matt.murdock', 'dominique.rocheteau'),
(73, 'charlie.weasley', 'drago.malefoy'),
(74, 'drago.malefoy', 'charlie.weasley'),
(75, 'bill.weasley', 'stanley.ipkiss'),
(76, 'stanley.ipkiss', 'bill.weasley'),
(77, 'molly.weasley', 'lucius.malefoy'),
(78, 'lucius.malefoy', 'molly.weasley'),
(81, 'minerva.mcgonagall', 'ron.weasley'),
(82, 'ron.weasley', 'minerva.mcgonagall'),
(83, 'george.weasley', 'oliver.queen'),
(84, 'oliver.queen', 'george.weasley'),
(85, 'narcissa.malefoy', 'bartemius.croupton'),
(86, 'bartemius.croupton', 'narcissa.malefoy'),
(87, 'dominique.dropsy', 'mar.mar-vell'),
(88, 'mar.mar-vell', 'dominique.dropsy'),
(89, 'lucius.malefoy', 'harry.potter'),
(90, 'harry.potter', 'lucius.malefoy'),
(91, 'robert.reynolds', 'steve.rogers'),
(92, 'steve.rogers', 'robert.reynolds'),
(93, 'dolores.ombrage', 'anthony.stark'),
(94, 'anthony.stark', 'dolores.ombrage'),
(95, 'fred.weasley', 'harry.potter'),
(96, 'harry.potter', 'fred.weasley'),
(97, 'abelforth.dumbledore', 'dobby.dobby'),
(98, 'dobby.dobby', 'abelforth.dumbledore'),
(99, 'ron.weasley', 'oliver.queen'),
(100, 'oliver.queen', 'ron.weasley'),
(101, 'remus.lupin', 'luna.lovegood'),
(102, 'luna.lovegood', 'remus.lupin'),
(103, 'bellatrix.lestrange', 'clark.kent'),
(104, 'clark.kent', 'bellatrix.lestrange'),
(105, 'peter.parker', 'anthony.stark'),
(106, 'anthony.stark', 'peter.parker'),
(107, 'tim.drake', 'matt.murdock'),
(108, 'matt.murdock', 'tim.drake'),
(109, 'dominique.rocheteau', 'dolores.ombrage'),
(110, 'dolores.ombrage', 'dominique.rocheteau'),
(111, 'rubeus.hagrid', 'scott.summers'),
(112, 'scott.summers', 'rubeus.hagrid'),
(113, 'clark.kent', 'kurt.wagner'),
(114, 'kurt.wagner', 'clark.kent'),
(115, 'molly.weasley', 'hermione.granger'),
(116, 'hermione.granger', 'molly.weasley'),
(117, 'albus.dumbledore', 'dominique.potter'),
(118, 'dominique.potter', 'albus.dumbledore'),
(119, 'harry.potter', 'barry.allen'),
(120, 'barry.allen', 'harry.potter'),
(121, 'molly.weasley', 'kurt.wagner'),
(122, 'kurt.wagner', 'molly.weasley'),
(123, 'peter.parker', 'kurt.wagner'),
(124, 'kurt.wagner', 'peter.parker'),
(125, 'fred.weasley', 'alastor.maugrey'),
(126, 'alastor.maugrey', 'fred.weasley'),
(127, 'hermione.granger', 'steve.rogers'),
(128, 'steve.rogers', 'hermione.granger'),
(129, 'ron.weasley', 'robert.drake'),
(130, 'robert.drake', 'ron.weasley'),
(131, 'hal.jordan', 'henry.mac-coy'),
(132, 'henry.mac-coy', 'hal.jordan'),
(133, 'nymphadora.tonks', 'bartemius.croupton'),
(134, 'bartemius.croupton', 'nymphadora.tonks'),
(135, 'narcissa.malefoy', 'dick.grayson'),
(136, 'dick.grayson', 'narcissa.malefoy'),
(137, 'ginny.weasley', 'tim.drake'),
(138, 'tim.drake', 'ginny.weasley'),
(139, 'drago.malefoy', 'tim.drake'),
(140, 'tim.drake', 'drago.malefoy'),
(141, 'dominique.potter', 'kurt.wagner'),
(142, 'kurt.wagner', 'dominique.potter'),
(143, 'bill.weasley', 'kurt.wagner'),
(144, 'kurt.wagner', 'bill.weasley'),
(145, 'remus.lupin', 'robert.drake'),
(146, 'robert.drake', 'remus.lupin'),
(147, 'percy.weasley', 'barry.allen'),
(148, 'barry.allen', 'percy.weasley'),
(149, 'charlie.weasley', 'dobby.dobby'),
(150, 'dobby.dobby', 'charlie.weasley'),
(151, 'nymphadora.tonks', 'bellatrix.lestrange'),
(152, 'bellatrix.lestrange', 'nymphadora.tonks'),
(153, 'dominique.rocheteau', 'ron.weasley'),
(154, 'ron.weasley', 'dominique.rocheteau'),
(155, 'dominique.dropsy', 'harry.potter'),
(156, 'harry.potter', 'dominique.dropsy'),
(157, 'arthur.weasley', 'narcissa.malefoy'),
(158, 'narcissa.malefoy', 'arthur.weasley'),
(159, 'fred.weasley', 'albus.dumbledore'),
(160, 'albus.dumbledore', 'fred.weasley'),
(161, 'charlie.weasley', 'severus.rogue'),
(162, 'severus.rogue', 'charlie.weasley'),
(163, 'bellatrix.lestrange', 'ron.weasley'),
(164, 'ron.weasley', 'bellatrix.lestrange'),
(165, 'molly.weasley', 'ron.weasley'),
(166, 'ron.weasley', 'molly.weasley'),
(167, 'dolores.ombrage', 'oliver.queen'),
(168, 'oliver.queen', 'dolores.ombrage'),
(169, 'neville.londubat', 'clark.kent'),
(170, 'clark.kent', 'neville.londubat'),
(171, 'bill.weasley', 'narcissa.malefoy'),
(172, 'narcissa.malefoy', 'bill.weasley'),
(173, 'dolores.ombrage', 'tim.drake'),
(174, 'tim.drake', 'dolores.ombrage'),
(175, 'anthony.stark', 'kurt.wagner'),
(176, 'kurt.wagner', 'anthony.stark'),
(177, 'rubeus.hagrid', 'matt.murdock'),
(178, 'matt.murdock', 'rubeus.hagrid'),
(179, 'severus.rogue', 'dominique.potter'),
(180, 'dominique.potter', 'severus.rogue'),
(181, 'charlie.weasley', 'steve.rogers'),
(182, 'steve.rogers', 'charlie.weasley'),
(183, 'clark.kent', 'mar.mar-vell'),
(184, 'mar.mar-vell', 'clark.kent'),
(187, 'bartemius.croupton', 'matt.murdock'),
(188, 'matt.murdock', 'bartemius.croupton'),
(189, 'minerva.mcgonagall', 'bellatrix.lestrange'),
(190, 'bellatrix.lestrange', 'minerva.mcgonagall'),
(191, 'neville.londubat', 'albus.dumbledore'),
(192, 'albus.dumbledore', 'neville.londubat'),
(193, 'narcissa.malefoy', 'bellatrix.lestrange'),
(194, 'bellatrix.lestrange', 'narcissa.malefoy'),
(195, 'dominique.dropsy', 'lucius.malefoy'),
(196, 'lucius.malefoy', 'dominique.dropsy'),
(197, 'lucius.malefoy', 'john.jones'),
(198, 'john.jones', 'lucius.malefoy'),
(199, 'henry.mac-coy', 'kurt.wagner'),
(200, 'kurt.wagner', 'henry.mac-coy'),
(201, 'percy.weasley', 'luna.lovegood'),
(202, 'luna.lovegood', 'percy.weasley'),
(203, 'dominique.rocheteau', 'severus.rogue'),
(204, 'severus.rogue', 'dominique.rocheteau'),
(205, 'bartemius.croupton', 'tim.drake'),
(206, 'tim.drake', 'bartemius.croupton'),
(207, 'harry.potter', 'steve.rogers'),
(208, 'steve.rogers', 'harry.potter'),
(209, 'neville.londubat', 'mar.mar-vell'),
(210, 'mar.mar-vell', 'neville.londubat'),
(211, 'percy.weasley', 'oliver.queen'),
(212, 'oliver.queen', 'percy.weasley'),
(215, 'bill.weasley', 'mar.mar-vell'),
(216, 'mar.mar-vell', 'bill.weasley'),
(217, 'drago.malefoy', 'jean.grey'),
(218, 'jean.grey', 'drago.malefoy'),
(219, 'peter.parker', 'robert.drake'),
(220, 'robert.drake', 'peter.parker'),
(221, 'severus.rogue', 'ron.weasley'),
(222, 'ron.weasley', 'severus.rogue'),
(223, 'neville.londubat', 'matt.murdock'),
(224, 'matt.murdock', 'neville.londubat'),
(225, 'minerva.mcgonagall', 'tim.drake'),
(226, 'tim.drake', 'minerva.mcgonagall'),
(227, 'matt.murdock', 'mar.mar-vell'),
(228, 'mar.mar-vell', 'matt.murdock'),
(229, 'bill.weasley', 'luna.lovegood'),
(230, 'luna.lovegood', 'bill.weasley'),
(231, 'alastor.maugrey', 'dick.grayson'),
(232, 'dick.grayson', 'alastor.maugrey'),
(233, 'dominique.dropsy', 'kurt.wagner'),
(234, 'kurt.wagner', 'dominique.dropsy'),
(235, 'bill.weasley', 'hal.jordan'),
(236, 'hal.jordan', 'bill.weasley'),
(237, 'lucius.malefoy', 'luna.lovegood'),
(238, 'luna.lovegood', 'lucius.malefoy'),
(239, 'peter.parker', 'tim.drake'),
(240, 'tim.drake', 'peter.parker');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `login` varchar(64) CHARACTER SET utf8 NOT NULL,
  `mdp` varchar(40) CHARACTER SET utf8 NOT NULL,
  `nom` varchar(64) CHARACTER SET utf8 NOT NULL,
  `prenom` varchar(64) CHARACTER SET utf8 NOT NULL,
  `promotion` int(11) DEFAULT NULL,
  `naissance` date NOT NULL,
  `email` varchar(128) CHARACTER SET utf8 NOT NULL,
  `feuille` varchar(64) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`login`, `mdp`, `nom`, `prenom`, `promotion`, `naissance`, `email`, `feuille`) VALUES
('2', 'da4b9237bacccdf19c0760cab7aec4a8359010b0', '2', '2', 2222, '0000-00-00', '2', '2'),
('abelforth.dumbledore', 'e5e9fa1ba31ecd1ae84f75caaa474f3a663f05f4', 'Dumbledore', 'Abelforth', 1998, '1986-12-10', 'abelforth.dumbledore@yahoo.fr', 'classe.css'),
('alastor.maugrey', 'e5e9fa1ba31ecd1ae84f75caaa474f3a663f05f4', 'Maugrey', 'Alastor', 2000, '1980-04-10', 'alastor.maugrey@yahoo.fr', 'classe.css'),
('albus.dumbledore', 'e5e9fa1ba31ecd1ae84f75caaa474f3a663f05f4', 'Dumbledore', 'Albus', NULL, '1980-06-10', 'albus.dumbledore@hotmail.fr', 'hype.css'),
('anthony.stark', 'e5e9fa1ba31ecd1ae84f75caaa474f3a663f05f4', 'Stark', 'Anthony', 2000, '1973-04-02', 'anthony.stark@hotmail.fr', 'hype.css'),
('arthur.weasley', 'e5e9fa1ba31ecd1ae84f75caaa474f3a663f05f4', 'Weasley', 'Arthur', 2000, '1979-06-02', 'arthur.weasley@gmail.com', 'classe.css'),
('barry.allen', 'e5e9fa1ba31ecd1ae84f75caaa474f3a663f05f4', 'Allen', 'Barry', NULL, '1986-12-10', 'barry.allen@gmail.com', 'hype.css'),
('bartemius.croupton', 'e5e9fa1ba31ecd1ae84f75caaa474f3a663f05f4', 'Croupton', 'Bartemius', 1990, '1979-12-13', 'bartemius.croupton@gmail.com', 'hype.css'),
('bellatrix.lestrange', 'e5e9fa1ba31ecd1ae84f75caaa474f3a663f05f4', 'Lestrange', 'Bellatrix', NULL, '1962-12-10', 'bellatrix.lestrange@hotmail.fr', 'hype.css'),
('bill.weasley', 'e5e9fa1ba31ecd1ae84f75caaa474f3a663f05f4', 'Weasley', 'Bill', NULL, '1979-05-13', 'bill.weasley@gmail.com', 'hype.css'),
('charlie.weasley', 'e5e9fa1ba31ecd1ae84f75caaa474f3a663f05f4', 'Weasley', 'Charlie', 1998, '1979-02-13', 'charlie.weasley@gmail.com', 'hype.css'),
('clark.kent', 'e5e9fa1ba31ecd1ae84f75caaa474f3a663f05f4', 'Kent', 'Clark', NULL, '1962-05-02', 'clark.kent@hotmail.fr', 'classe.css'),
('dick.grayson', 'e5e9fa1ba31ecd1ae84f75caaa474f3a663f05f4', 'Grayson', 'Dick', 2000, '1979-03-02', 'dick.grayson@hotmail.fr', 'classe.css'),
('dobby.dobby', 'e5e9fa1ba31ecd1ae84f75caaa474f3a663f05f4', 'Dobby', 'Dobby', 1998, '1986-12-02', 'dobby.dobby@hotmail.fr', 'classe.css'),
('dolores.ombrage', 'e5e9fa1ba31ecd1ae84f75caaa474f3a663f05f4', 'Ombrage', 'Dolores', 2000, '1973-04-10', 'dolores.ombrage@yahoo.fr', 'classe.css'),
('dominique.dropsy', 'e5e9fa1ba31ecd1ae84f75caaa474f3a663f05f4', 'Dropsy', 'Dominique', 1998, '1986-12-02', 'dominique.dropsy@hotmail.fr', 'hype.css'),
('dominique.farrugia', 'e5e9fa1ba31ecd1ae84f75caaa474f3a663f05f4', 'Farrugia', 'Dominique', 1998, '1980-03-10', 'dominique.farrugia@yahoo.fr', 'hype.css'),
('dominique.potter', 'e5e9fa1ba31ecd1ae84f75caaa474f3a663f05f4', 'Potter', 'Dominique', 1990, '1962-04-13', 'dominique.potter@hotmail.fr', 'hype.css'),
('dominique.rocheteau', 'e5e9fa1ba31ecd1ae84f75caaa474f3a663f05f4', 'Rocheteau', 'Dominique', 1998, '1986-05-02', 'dominique.rocheteau@yahoo.fr', 'hype.css'),
('drago.malefoy', 'e5e9fa1ba31ecd1ae84f75caaa474f3a663f05f4', 'Malefoy', 'Drago', 1998, '1980-05-13', 'drago.malefoy@gmail.com', 'classe.css'),
('DRossin', '663194f2b9123a38cd9e2e2811f8d2fd387b765e', 'Rossin', 'Dominique', 1997, '1973-04-01', 'Dominique.rossin@liafa.jussieu.fr', 'studieux.css'),
('DukeDoug', '1ac891c844084bf19408ba08b8549b038de20821', 'Camille', 'Raspoutine', 1917, '1916-02-17', 'bebesolitaire@pfiou.com', 'datfeuille.css'),
('fred.weasley', 'e5e9fa1ba31ecd1ae84f75caaa474f3a663f05f4', 'Weasley', 'Fred', 1990, '1962-06-13', 'fred.weasley@yahoo.fr', 'classe.css'),
('george.weasley', 'e5e9fa1ba31ecd1ae84f75caaa474f3a663f05f4', 'Weasley', 'George', 1998, '1973-06-02', 'george.weasley@gmail.com', 'classe.css'),
('ginny.weasley', 'e5e9fa1ba31ecd1ae84f75caaa474f3a663f05f4', 'Weasley', 'Ginny', NULL, '1973-06-13', 'ginny.weasley@gmail.com', 'classe.css'),
('GMonge', 'a8e112d98fc1edf3f69075b13b75659f8debe25c', 'Monge', 'Gaspard', NULL, '1746-05-10', 'GM@m4x.org', 'fiesta.css'),
('hal.jordan', 'e5e9fa1ba31ecd1ae84f75caaa474f3a663f05f4', 'Jordan', 'Hal', 1990, '1962-02-02', 'hal.jordan@hotmail.fr', 'classe.css'),
('harry.potter', 'e5e9fa1ba31ecd1ae84f75caaa474f3a663f05f4', 'Potter', 'Harry', 1995, '1973-05-02', 'harry.potter@gmail.com', 'classe.css'),
('henry.mac-coy', 'e5e9fa1ba31ecd1ae84f75caaa474f3a663f05f4', 'Mac-Coy', 'Henry', 2000, '1979-05-13', 'henry.mac-coy@hotmail.fr', 'classe.css'),
('hermione.granger', 'e5e9fa1ba31ecd1ae84f75caaa474f3a663f05f4', 'Granger', 'Hermione', 1995, '1986-04-13', 'hermione.granger@hotmail.fr', 'classe.css'),
('jean.grey', 'e5e9fa1ba31ecd1ae84f75caaa474f3a663f05f4', 'Grey', 'Jean', NULL, '1986-12-13', 'jean.grey@hotmail.fr', 'classe.css'),
('john.jones', 'e5e9fa1ba31ecd1ae84f75caaa474f3a663f05f4', 'Jones', 'John', 2000, '1986-12-10', 'john.jones@hotmail.fr', 'hype.css'),
('kurt.wagner', 'e5e9fa1ba31ecd1ae84f75caaa474f3a663f05f4', 'Wagner', 'Kurt', NULL, '1973-04-02', 'kurt.wagner@gmail.com', 'classe.css'),
('lucius.malefoy', 'e5e9fa1ba31ecd1ae84f75caaa474f3a663f05f4', 'Malefoy', 'Lucius', NULL, '1973-12-13', 'lucius.malefoy@yahoo.fr', 'hype.css'),
('luna.lovegood', 'e5e9fa1ba31ecd1ae84f75caaa474f3a663f05f4', 'Lovegood', 'Luna', 2000, '1962-05-10', 'luna.lovegood@gmail.com', 'hype.css'),
('mar.mar-vell', 'e5e9fa1ba31ecd1ae84f75caaa474f3a663f05f4', 'Mar-Vell', 'Mar', 2000, '1980-02-02', 'mar.mar-vell@yahoo.fr', 'classe.css'),
('matt.murdock', 'e5e9fa1ba31ecd1ae84f75caaa474f3a663f05f4', 'Murdock', 'Matt', 1995, '1962-02-02', 'matt.murdock@hotmail.fr', 'classe.css'),
('minerva.mcgonagall', 'e5e9fa1ba31ecd1ae84f75caaa474f3a663f05f4', 'McGonagall', 'Minerva', 1998, '1980-03-13', 'minerva.mcgonagall@hotmail.fr', 'hype.css'),
('molly.weasley', 'e5e9fa1ba31ecd1ae84f75caaa474f3a663f05f4', 'Weasley', 'Molly', 1990, '1980-02-02', 'molly.weasley@yahoo.fr', 'classe.css'),
('narcissa.malefoy', 'e5e9fa1ba31ecd1ae84f75caaa474f3a663f05f4', 'Malefoy', 'Narcissa', NULL, '1986-12-13', 'narcissa.malefoy@gmail.com', 'classe.css'),
('neville.londubat', 'e5e9fa1ba31ecd1ae84f75caaa474f3a663f05f4', 'Londubat', 'Neville', 1995, '1973-06-10', 'neville.londubat@hotmail.fr', 'classe.css'),
('nymphadora.tonks', 'e5e9fa1ba31ecd1ae84f75caaa474f3a663f05f4', 'Tonks', 'Nymphadora', 1995, '1986-06-13', 'nymphadora.tonks@gmail.com', 'hype.css'),
('olive.tom', 'olive.tom', 'Olive', 'Tom', 0, '1980-03-12', 'olive.tom@gmail.com', 'css4/serieux.css'),
('oliver.queen', 'e5e9fa1ba31ecd1ae84f75caaa474f3a663f05f4', 'Queen', 'Oliver', NULL, '1973-05-10', 'oliver.queen@yahoo.fr', 'classe.css'),
('olivier.po', 'olivier.po', 'Olivier', 'po', 0, '4230-03-12', 'ikhdfd@gmal.com', 'css4/serieux.css'),
('percy.weasley', 'e5e9fa1ba31ecd1ae84f75caaa474f3a663f05f4', 'Weasley', 'Percy', NULL, '1962-02-10', 'percy.weasley@yahoo.fr', 'hype.css'),
('peter.parker', 'e5e9fa1ba31ecd1ae84f75caaa474f3a663f05f4', 'Parker', 'Peter', 1998, '1980-03-13', 'peter.parker@yahoo.fr', 'hype.css'),
('peter.pettigrow', 'e5e9fa1ba31ecd1ae84f75caaa474f3a663f05f4', 'Pettigrow', 'Peter', 2000, '1973-04-02', 'peter.pettigrow@yahoo.fr', 'classe.css'),
('remus.lupin', 'e5e9fa1ba31ecd1ae84f75caaa474f3a663f05f4', 'Lupin', 'Remus', 1990, '1986-05-02', 'remus.lupin@gmail.com', 'hype.css'),
('robert.drake', 'e5e9fa1ba31ecd1ae84f75caaa474f3a663f05f4', 'Drake', 'Robert', NULL, '1979-04-13', 'robert.drake@yahoo.fr', 'classe.css'),
('robert.reynolds', 'e5e9fa1ba31ecd1ae84f75caaa474f3a663f05f4', 'Reynolds', 'Robert', 1990, '1979-03-13', 'robert.reynolds@gmail.com', 'hype.css'),
('ron.weasley', 'e5e9fa1ba31ecd1ae84f75caaa474f3a663f05f4', 'Weasley', 'Ron', 1995, '1973-04-02', 'ron.weasley@hotmail.fr', 'hype.css'),
('rubeus.hagrid', 'e5e9fa1ba31ecd1ae84f75caaa474f3a663f05f4', 'Hagrid', 'Rubeus', 1990, '1979-12-02', 'rubeus.hagrid@yahoo.fr', 'hype.css'),
('scott.summers', 'e5e9fa1ba31ecd1ae84f75caaa474f3a663f05f4', 'Summers', 'Scott', 1990, '1979-02-10', 'scott.summers@yahoo.fr', 'classe.css'),
('severus.rogue', 'e5e9fa1ba31ecd1ae84f75caaa474f3a663f05f4', 'Rogue', 'Severus', NULL, '1962-06-02', 'severus.rogue@gmail.com', 'hype.css'),
('sirius.black', 'e5e9fa1ba31ecd1ae84f75caaa474f3a663f05f4', 'Black', 'Sirius', 1998, '1973-05-13', 'sirius.black@yahoo.fr', 'hype.css'),
('stanley.ipkiss', 'e5e9fa1ba31ecd1ae84f75caaa474f3a663f05f4', 'Ipkiss', 'Stanley', 1990, '1979-06-10', 'stanley.ipkiss@hotmail.fr', 'hype.css'),
('steve.rogers', 'e5e9fa1ba31ecd1ae84f75caaa474f3a663f05f4', 'Rogers', 'Steve', 1998, '1973-03-02', 'steve.rogers@gmail.com', 'hype.css'),
('tim.drake', 'e5e9fa1ba31ecd1ae84f75caaa474f3a663f05f4', 'Drake', 'Tim', 1995, '1979-06-13', 'tim.drake@hotmail.fr', 'hype.css'),
('Titi', 'b28b7af69320201d1cf206ebf28373980add1451', 'Henry', 'Thierry', NULL, '1977-08-17', 'Titi@arsenal.uk', 'fiesta.css');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `amis`
--
ALTER TABLE `amis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `login1` (`login1`),
  ADD KEY `login2` (`login2`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`login`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `amis`
--
ALTER TABLE `amis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=241;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
