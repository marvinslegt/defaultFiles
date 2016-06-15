-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Gegenereerd op: 15 jun 2016 om 23:51
-- Serverversie: 10.1.10-MariaDB
-- PHP-versie: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `authaaa`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `authentication`
--

CREATE TABLE `authentication` (
  `user_id` int(11) NOT NULL,
  `user_username` varchar(255) NOT NULL,
  `user_password` char(60) NOT NULL,
  `token` text NOT NULL,
  `user_role` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_adres` varchar(255) NOT NULL,
  `user_country` varchar(255) NOT NULL,
  `user_phone` varchar(20) NOT NULL,
  `user_mobile` varchar(20) NOT NULL,
  `user_profile_pic_url` varchar(255) NOT NULL,
  `user_postal` varchar(255) NOT NULL,
  `user_state` varchar(255) NOT NULL,
  `user_firstname` varchar(255) NOT NULL,
  `user_lastname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `authentication`
--

INSERT INTO `authentication` (`user_id`, `user_username`, `user_password`, `token`, `user_role`, `user_email`, `user_adres`, `user_country`, `user_phone`, `user_mobile`, `user_profile_pic_url`, `user_postal`, `user_state`, `user_firstname`, `user_lastname`) VALUES
(1, 'admin', '$2a$15$Swqlmp7/gtgdu/U/H5n/BOJ57mnMUsglVURD.NPV5PmpnoKf98Tum', 'lX3Dypwx5Oe81iSrgRO6KooQnbcsnHBL', 'ADMINISTRATOR', 'marvinslegt@gmail.com', 'Schokker 16', 'Nederland', '648466180', '648466180', '', '3891DN', 'Zeewolde', 'Marvin', 'Slegt');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `failed_logins`
--

CREATE TABLE `failed_logins` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_username` varchar(16) NOT NULL,
  `ip_address` varchar(25) NOT NULL,
  `attempted` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `authentication`
--
ALTER TABLE `authentication`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexen voor tabel `failed_logins`
--
ALTER TABLE `failed_logins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `attempted_idx` (`attempted`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `authentication`
--
ALTER TABLE `authentication`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT voor een tabel `failed_logins`
--
ALTER TABLE `failed_logins`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
