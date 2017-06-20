-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Počítač: localhost
-- Vytvořeno: Úte 20. čen 2017, 11:01
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
(24, 'Dragon'),
(25, 'Cerberos'),
(26, 'O2 internet'),
(27, 'Tmobile');

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
(32, 26, 24);

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
(26, 'Smrk'),
(28, 'Mladá Bolesalv');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT pro tabulku `internet_mesto`
--
ALTER TABLE `internet_mesto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT pro tabulku `mesta`
--
ALTER TABLE `mesta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
