-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Počítač: localhost
-- Vytvořeno: Úte 20. čen 2017, 13:22
-- Verze serveru: 5.7.11
-- Verze PHP: 5.6.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáze: `projekt`
--

-- --------------------------------------------------------

--
-- Struktura tabulky `internet`
--

CREATE TABLE `internet` (
  `id` int(11) NOT NULL,
  `firma` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Vypisuji data pro tabulku `internet`
--

INSERT INTO `internet` (`id`, `firma`) VALUES
(32, 'Dragon'),
(33, 'O2-Internet'),
(34, 'T-Mobile'),
(35, 'Cerberos'),
(36, 'Ufon');

-- --------------------------------------------------------

--
-- Struktura tabulky `internet_mesto`
--

CREATE TABLE `internet_mesto` (
  `id` int(11) NOT NULL,
  `id_mesto` int(11) NOT NULL,
  `id_firma` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Vypisuji data pro tabulku `internet_mesto`
--

INSERT INTO `internet_mesto` (`id`, `id_mesto`, `id_firma`) VALUES
(41, 39, 32),
(42, 41, 32),
(43, 42, 32),
(44, 43, 32),
(45, 44, 32),
(46, 42, 33),
(47, 43, 33),
(48, 44, 35),
(49, 43, 35),
(50, 43, 36),
(51, 41, 36),
(52, 44, 34),
(53, 39, 34),
(54, 42, 34);

-- --------------------------------------------------------

--
-- Struktura tabulky `mesta`
--

CREATE TABLE `mesta` (
  `id` int(11) NOT NULL,
  `nazev` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Vypisuji data pro tabulku `mesta`
--

INSERT INTO `mesta` (`id`, `nazev`) VALUES
(39, 'Stará Boleslav'),
(41, 'Brno'),
(42, 'Praha'),
(43, 'Benátky nad Jizerou'),
(44, 'Mladá Boleslav');

--
-- Klíče pro exportované tabulky
--

--
-- Klíče pro tabulku `internet`
--
ALTER TABLE `internet`
  ADD PRIMARY KEY (`id`);

--
-- Klíče pro tabulku `internet_mesto`
--
ALTER TABLE `internet_mesto`
  ADD PRIMARY KEY (`id`);

--
-- Klíče pro tabulku `mesta`
--
ALTER TABLE `mesta`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pro tabulky
--

--
-- AUTO_INCREMENT pro tabulku `internet`
--
ALTER TABLE `internet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT pro tabulku `internet_mesto`
--
ALTER TABLE `internet_mesto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;
--
-- AUTO_INCREMENT pro tabulku `mesta`
--
ALTER TABLE `mesta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
