		
CREATE DATABASE `quizsystem`;

-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 12 Cze 2019, 13:46
-- Wersja serwera: 10.1.38-MariaDB
-- Wersja PHP: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `quizsystem`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `lol`
--

CREATE TABLE `lol` (
  `id` int(11) NOT NULL,
  `pytanie` text COLLATE utf8_unicode_ci NOT NULL,
  `prawidlowa` text COLLATE utf8_unicode_ci NOT NULL,
  `nieprawidlowa1` text COLLATE utf8_unicode_ci NOT NULL,
  `nieprawidlowa2` text COLLATE utf8_unicode_ci NOT NULL,
  `nieprawidlowa3` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Zrzut danych tabeli `lol`
--

INSERT INTO `lol` (`id`, `pytanie`, `prawidlowa`, `nieprawidlowa1`, `nieprawidlowa2`, `nieprawidlowa3`) VALUES
(1, 'lol', 'a', 'b', 'c', 'd');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `questioncount`
--

CREATE TABLE `questioncount` (
  `idCount` int(11) NOT NULL,
  `realCount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Zrzut danych tabeli `questioncount`
--

INSERT INTO `questioncount` (`idCount`, `realCount`) VALUES
(1, 5);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `idUser` int(11) NOT NULL,
  `username` tinytext COLLATE utf8_polish_ci NOT NULL,
  `class` tinytext COLLATE utf8_polish_ci NOT NULL,
  `pwd` longtext COLLATE utf8_polish_ci NOT NULL,
  `admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`idUser`, `username`, `class`, `pwd`, `admin`) VALUES
(1, 'root', 'root', '$2y$10$7BqVuXmUDsBFBNTKMsM1LeFvHjbVIjjLEp60eNSHPTXWrbNYho6be', 1),
(2, 'p', '3te', '$2y$10$pZKmZujONkM/ina6dAPAo.lDX5RAJeAt9N2evtwPJx05F6X11O/hK', 0);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `lol`
--
ALTER TABLE `lol`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `questioncount`
--
ALTER TABLE `questioncount`
  ADD PRIMARY KEY (`idCount`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idUser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `lol`
--
ALTER TABLE `lol`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT dla tabeli `questioncount`
--
ALTER TABLE `questioncount`
  MODIFY `idCount` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
