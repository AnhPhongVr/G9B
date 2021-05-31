-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 31, 2021 at 12:35 PM
-- Server version: 5.7.24
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `espace_membre`
--

-- --------------------------------------------------------

--
-- Table structure for table `données`
--

CREATE TABLE `données` (
  `idtest` int(11) NOT NULL,
  `test` varchar(255) NOT NULL,
  `resultats` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `iduser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `données`
--

INSERT INTO `données` (`idtest`, `test`, `resultats`, `date`, `iduser`) VALUES
(22, 'cardiaque', 93, '2021-04-27 15:05:00', 3),
(23, 'cardiaque', 83, '2021-04-27 20:00:00', 3),
(24, 'cardiaque', 70, '2021-04-28 10:30:00', 3),
(25, 'cardiaque', 79, '2021-04-28 15:00:00', 3),
(26, 'trouble auditifs', 7, '2021-04-27 15:10:00', 3),
(27, 'trouble auditifs', 9, '2021-04-27 20:10:00', 3),
(28, 'trouble auditifs', 7, '2021-04-28 10:40:00', 3),
(29, 'trouble auditifs', 8, '2021-04-28 15:10:00', 3),
(30, 'reflexe son', 130, '2021-04-27 15:15:00', 3),
(31, 'reflexe son', 200, '2021-04-27 20:15:00', 3),
(32, 'reflexe son', 170, '2021-04-28 10:45:00', 3),
(33, 'reflexe son', 140, '2021-04-28 15:15:00', 3),
(34, 'reflexe visuel', 170, '2021-04-27 15:20:00', 3),
(35, 'reflexe visuel', 180, '2021-04-27 20:20:00', 3),
(36, 'reflexe visuel', 200, '2021-04-28 10:50:00', 3),
(37, 'reflexe visuel', 168, '2021-04-28 15:20:00', 3);

-- --------------------------------------------------------

--
-- Table structure for table `membres`
--

CREATE TABLE `membres` (
  `id` int(11) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `usertype` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `datedenaissance` date DEFAULT NULL,
  `motdepasse` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `membres`
--

INSERT INTO `membres` (`id`, `prenom`, `nom`, `usertype`, `mail`, `datedenaissance`, `motdepasse`) VALUES
(1, 'Anh', '', '', 'phong@gmail.com', NULL, 'de271790913ea81742b7d31a70d85f50a3d3e5ae'),
(2, 'Anh Phong', 'VIRASSAMY', 'admin', 'williamphong77@gmail.com', '2000-03-07', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220'),
(3, 'Jean', 'Lourd', 'user', 'jean@gmail.com', '2021-04-24', '782dd27ea8e3b4f4095ffa38eeb4d20b59069077'),
(4, 'Panda', 'bambou', '', 'panda@gmail.com', NULL, 'f91a8ee646a277a2f1359709604b99c1b32d9f24'),
(6, 'Anh Phong', 'VIRASSAMY', 'admin', 'anh-phong.virassamy@eleve.isep.fr', NULL, '7110eda4d09e062aa5e4a390b0a572ac0d2c0220'),
(7, 'Joseph', 'Joestar', 'user', 'jojo@gmail.com', NULL, '782dd27ea8e3b4f4095ffa38eeb4d20b59069077'),
(8, 'Garry', 'Bot', 'user', 'garry@bot.fr', NULL, '782dd27ea8e3b4f4095ffa38eeb4d20b59069077'),
(9, 'Christopher', 'Zig', 'admin', 'Chriszg@gmail.com', NULL, '1ff4fa636016eb53ce671edfa086e587817bd795'),
(10, 'Chris', 'Ale', 'user', 'chris@gmail.com', NULL, '782dd27ea8e3b4f4095ffa38eeb4d20b59069077'),
(11, 'admin', 'admin', 'admin', 'admin@admin.fr', NULL, 'd033e22ae348aeb5660fc2140aec35850c4da997');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `données`
--
ALTER TABLE `données`
  ADD PRIMARY KEY (`idtest`),
  ADD KEY `iduser` (`iduser`);

--
-- Indexes for table `membres`
--
ALTER TABLE `membres`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `données`
--
ALTER TABLE `données`
  MODIFY `idtest` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `membres`
--
ALTER TABLE `membres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `données`
--
ALTER TABLE `données`
  ADD CONSTRAINT `iduser` FOREIGN KEY (`iduser`) REFERENCES `membres` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
