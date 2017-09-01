-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 01-Set-2017 às 04:23
-- Versão do servidor: 10.1.22-MariaDB
-- PHP Version: 7.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pcd_db`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `advertencias`
--

CREATE TABLE `advertencias` (
  `id` int(32) NOT NULL,
  `date` date NOT NULL,
  `reason` varchar(255) NOT NULL,
  `score` int(15) NOT NULL,
  `responsible` varchar(255) NOT NULL,
  `dismissed` tinyint(1) NOT NULL,
  `idmember` int(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `advertencias`
--

INSERT INTO `advertencias` (`id`, `date`, `reason`, `score`, `responsible`, `dismissed`, `idmember`) VALUES
(28, '2017-08-23', 'gdgdfgdf', 3, 'gdfgfddfgdf', 0, 14),
(29, '2017-08-21', 'gfsfdsfsdfs', 4, 'gfdgfdgdfgd', 0, 14),
(30, '2017-08-14', 'fdsfdsfds', 4, 'fsdfdsfds', 0, 14),
(31, '2017-08-17', 'fdsfds', 5, 'fdiojoi', 1, 14),
(32, '2017-08-07', 'fsdfdsfds', 4, 'gbvcbvcbvc', 0, 14),
(33, '2017-08-16', 'idfgjgidfgd', 2, 'ggsfjsdnkmvcx', 0, 14),
(34, '2017-08-21', 'piodskdsjfd', 3, 'oisdjkfsd', 0, 14),
(35, '2017-08-16', 'dgjodf', 10, 'gofjgfd', 0, 14),
(36, '2017-08-22', 'siojdfiosd', 6, 'gdfgfd', 0, 14),
(37, '2017-08-21', 'fiojfgiogd', 15, 'gifdjgpombvkcnj', 0, 14),
(38, '2017-08-21', 'fiojfgiogd', 15, 'gifdjgpombvkcnj', 0, 14),
(39, '2017-08-14', 'ijfgdgfdjgfd', 4, 'ogidjfgfd', 0, 14);

-- --------------------------------------------------------

--
-- Estrutura da tabela `membros`
--

CREATE TABLE `membros` (
  `id` int(16) NOT NULL,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `score` int(32) NOT NULL,
  `role` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `privilege` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `advertencias`
--
ALTER TABLE `advertencias`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `membros`
--
ALTER TABLE `membros`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login` (`login`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `advertencias`
--
ALTER TABLE `advertencias`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `membros`
--
ALTER TABLE `membros`
  MODIFY `id` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
