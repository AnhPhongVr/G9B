-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jun 01, 2021 at 05:14 PM
-- Server version: 5.7.32
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `FAQ`
--

-- --------------------------------------------------------

--
-- Table structure for table `Questions`
--

CREATE TABLE `Questions` (
  `id_Question` int(11) NOT NULL,
  `Question` varchar(535) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Questions`
--

INSERT INTO `Questions` (`id_Question`, `Question`) VALUES
(1, 'Question 1 : Que faire si vous avez oublié votre mot de passe et votre adresse e-mail?'),
(2, 'Question 2 : Sommes-nous obligés de faire toutes les séries de tests?'),
(3, 'Question 3 : Que faire si votre résultat n\'est pas concluant?'),
(4, 'Question 4 : Question supplémentaire'),
(5, 'Question 5 : Question supplémentaire'),
(6, 'Question 6 : Question supplémentaire'),
(7, 'Question 7 : Question supplémentaire'),
(8, 'Question 8 : Question supplémentaire'),
(9, 'Question 9 : Question supplémentaire'),
(10, 'Question 10 : Question supplémentaire'),
(11, 'Question 11 : Question supplémentaire'),
(12, 'Question 12 : Question supplémentaire'),
(13, 'Question 13 : Question supplémentaire'),
(14, 'Question 14 : Question supplémentaire'),
(15, 'Question 15 : Question supplémentaire');

-- --------------------------------------------------------

--
-- Table structure for table `Réponses`
--

CREATE TABLE `Réponses` (
  `id_Reponse` int(11) NOT NULL,
  `Reponse` varchar(535) NOT NULL,
  `id_Question` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Réponses`
--

INSERT INTO `Réponses` (`id_Reponse`, `Reponse`, `id_Question`) VALUES
(1, 'Réponse 1 : Non vous n\'êtes pas obligé(e) de faire tous les tests proposés. Il est possible de choisir uniquement le ou les tests que vous voulez faire.', 1),
(2, 'Réponse 2 : Dans ce cas, n\'hésitez pas à nous contacter. Il y a en bas de la page une rubrique \"nous contacter\".', 2),
(3, 'Réponse 3 : Prenez une pause, respirez et recommencez. Si le test demeure non conluant alors vous êtes trop stressé(e), reposez vous.', 3),
(4, 'Réponse 4 : Réponse supplémentaire', 4),
(5, 'Réponse 5 : Réponse supplémentaire', 5),
(6, 'Réponse 6 : Réponse supplémentaire', 6),
(7, 'Réponse 7 : Réponse supplémentaire', 7),
(8, 'Réponse 8 : Réponse supplémentaire', 8),
(9, 'Réponse 9 : Réponse supplémentaire', 9),
(10, 'Réponse 10 : Réponse supplémentaire', 10),
(11, 'Réponse 11 : Réponse supplémentaire', 11),
(12, 'Réponse 12 : Réponse supplémentaire', 12),
(13, 'Réponse 13 : Réponse supplémentaire', 13),
(14, 'Réponse 14 : Réponse supplémentaire', 14),
(15, 'Réponse 15 : Réponse supplémentaire', 15);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Questions`
--
ALTER TABLE `Questions`
  ADD PRIMARY KEY (`id_Question`);

--
-- Indexes for table `Réponses`
--
ALTER TABLE `Réponses`
  ADD PRIMARY KEY (`id_Reponse`),
  ADD KEY `id_Question` (`id_Question`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Questions`
--
ALTER TABLE `Questions`
  MODIFY `id_Question` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `Réponses`
--
ALTER TABLE `Réponses`
  MODIFY `id_Reponse` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Réponses`
--
ALTER TABLE `Réponses`
  ADD CONSTRAINT `Question_Reponse` FOREIGN KEY (`id_Question`) REFERENCES `Questions` (`id_Question`);
