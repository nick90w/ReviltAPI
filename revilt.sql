-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 25 jun 2021 om 12:01
-- Serverversie: 10.4.19-MariaDB
-- PHP-versie: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `revilt`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `bedrijf`
--

CREATE TABLE `bedrijf` (
  `Bedrijf_Id` int(11) NOT NULL,
  `Naam_bedrijf` varchar(255) NOT NULL,
  `Gebruikersnaam` varchar(255) NOT NULL,
  `Wachtwoord` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tafel`
--

CREATE TABLE `tafel` (
  `Tafel_Id` int(11) NOT NULL,
  `Vilt_Id` int(11) NOT NULL,
  `Bedrijf_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `vilt`
--

CREATE TABLE `vilt` (
  `Vilt_id` int(11) NOT NULL,
  `Gewicht_glas` int(11) NOT NULL,
  `Melding_boolean` tinyint(1) NOT NULL,
  `Word_afgehandeld` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `vilt`
--

INSERT INTO `vilt` (`Vilt_id`, `Gewicht_glas`, `Melding_boolean`, `Word_afgehandeld`) VALUES
(1, 213642, 1, 1);

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `bedrijf`
--
ALTER TABLE `bedrijf`
  ADD PRIMARY KEY (`Bedrijf_Id`);

--
-- Indexen voor tabel `tafel`
--
ALTER TABLE `tafel`
  ADD PRIMARY KEY (`Tafel_Id`),
  ADD KEY `FK_Vilt_Id` (`Vilt_Id`),
  ADD KEY `FK_Bedrijf_ID` (`Bedrijf_Id`);

--
-- Indexen voor tabel `vilt`
--
ALTER TABLE `vilt`
  ADD PRIMARY KEY (`Vilt_id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `bedrijf`
--
ALTER TABLE `bedrijf`
  MODIFY `Bedrijf_Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `vilt`
--
ALTER TABLE `vilt`
  MODIFY `Vilt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `tafel`
--
ALTER TABLE `tafel`
  ADD CONSTRAINT `tafel_ibfk_1` FOREIGN KEY (`Bedrijf_Id`) REFERENCES `bedrijf` (`Bedrijf_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tafel_ibfk_2` FOREIGN KEY (`Vilt_Id`) REFERENCES `vilt` (`Vilt_Id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
