-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 23 Lis 2022, 19:53
-- Wersja serwera: 10.4.25-MariaDB
-- Wersja PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `pibrus`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `angielski`
--

CREATE TABLE `angielski` (
  `id` int(11) NOT NULL,
  `ocena` text CHARACTER SET utf8mb4 COLLATE utf8mb4_polish_ci NOT NULL,
  `id_ucznia` int(11) NOT NULL,
  `komentarz` text CHARACTER SET utf8mb4 COLLATE utf8mb4_polish_ci NOT NULL DEFAULT 'aktywność'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Zrzut danych tabeli `angielski`
--

INSERT INTO `angielski` (`id`, `ocena`, `id_ucznia`, `komentarz`) VALUES
(1, '5', 1, 'aktywność'),
(2, '3', 1, 'sprawdzian'),
(3, '6', 1, 'aktywność'),
(4, '5', 1, 'aktywność'),
(5, '3', 2, 'kartkówka'),
(6, '3', 3, 'aktywność'),
(7, '4', 2, 'aktywność'),
(11, '1', 2, 'Wymowa');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `informatyka`
--

CREATE TABLE `informatyka` (
  `id` int(11) NOT NULL,
  `ocena` text COLLATE utf8mb4_polish_ci NOT NULL,
  `id_ucznia` int(11) NOT NULL,
  `komentarz` text COLLATE utf8mb4_polish_ci NOT NULL DEFAULT 'sprawdzian'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `informatyka`
--

INSERT INTO `informatyka` (`id`, `ocena`, `id_ucznia`, `komentarz`) VALUES
(1, '5', 1, 'sprawdzian'),
(9, '6', 1, 'projekt'),
(10, '4', 1, 'sprawdzian'),
(11, '5', 2, 'sprawdzian'),
(12, '3', 3, 'sprawdzian'),
(24, '6', 1, 'Praca domowa'),
(25, '6', 1, 'Praca domowa'),
(26, '6', 1, 'Praca domowa');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `matematyka`
--

CREATE TABLE `matematyka` (
  `id` int(11) NOT NULL,
  `ocena` text COLLATE utf8mb4_polish_ci NOT NULL,
  `id_ucznia` int(11) NOT NULL,
  `komentarz` text COLLATE utf8mb4_polish_ci NOT NULL DEFAULT 'kartkówka'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `matematyka`
--

INSERT INTO `matematyka` (`id`, `ocena`, `id_ucznia`, `komentarz`) VALUES
(1, '6', 1, 'kartkówka'),
(2, '5', 1, 'zadanie przy tablicy'),
(3, '3', 2, 'kartkówka'),
(4, '4', 3, 'kartkówka');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `nauczyciele`
--

CREATE TABLE `nauczyciele` (
  `id` int(11) NOT NULL,
  `imie` text COLLATE utf8mb4_polish_ci NOT NULL,
  `nazwisko` text COLLATE utf8mb4_polish_ci NOT NULL,
  `email` text COLLATE utf8mb4_polish_ci NOT NULL,
  `haslo` text COLLATE utf8mb4_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `nauczyciele`
--

INSERT INTO `nauczyciele` (`id`, `imie`, `nazwisko`, `email`, `haslo`) VALUES
(1, 'Jan', 'Kowalski', 'JanSuperNauczyciel@gmail.com', 'haslo123'),
(2, 'Darek', 'SÅ‚aswki', 'd@s.com', 'haslo'),
(3, 'dfsdf', 'sdfsd', 'ds@gmail.com', 'haslo');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `polski`
--

CREATE TABLE `polski` (
  `id` int(11) NOT NULL,
  `ocena` text COLLATE utf8mb4_polish_ci NOT NULL,
  `id_ucznia` int(11) NOT NULL,
  `komentarz` text COLLATE utf8mb4_polish_ci NOT NULL DEFAULT 'rozprawka'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `polski`
--

INSERT INTO `polski` (`id`, `ocena`, `id_ucznia`, `komentarz`) VALUES
(1, '6', 1, 'rozprawka'),
(2, '2', 1, 'rozprawkasadas'),
(3, '2', 1, 'trudne'),
(4, '6', 3, 'rozprawka'),
(5, '2', 3, 'aktywność'),
(6, '6', 3, 'rozprawka'),
(7, '2', 3, 'rozprawka'),
(8, '2', 2, 'rozprawka'),
(16, '1', 2, 'a');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uczniowie`
--

CREATE TABLE `uczniowie` (
  `id` int(11) NOT NULL,
  `imie` text COLLATE utf8mb4_polish_ci NOT NULL,
  `nazwisko` text COLLATE utf8mb4_polish_ci NOT NULL,
  `email` text COLLATE utf8mb4_polish_ci NOT NULL,
  `haslo` text COLLATE utf8mb4_polish_ci NOT NULL,
  `klasa` text COLLATE utf8mb4_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `uczniowie`
--

INSERT INTO `uczniowie` (`id`, `imie`, `nazwisko`, `email`, `haslo`, `klasa`) VALUES
(1, 'Filip', 'Antoniak', 'filip.antoniak99@gmail.com', 'haslo', '4a'),
(2, 'Jacek', 'Wardega', 'jacek', 'kochamrowery', '1e'),
(3, 'Grzegorz', 'Pentner', 'golfvolcano', 'aaaa', '4a'),
(9, 'Test', 'sa', 'as@22sd.com', 'asdasd', '4a'),
(10, 'asdas', 'dasdasd', 'asdasd@gmail.com', 'haslo', '4a'),
(11, 'asdasdsfsdf', 'dasdasd', 'asdasd@gmail.com', 'haslo', '4a'),
(12, 'asdasdsfsdf', 'dasdasd', 'asdasd@gmail.com', 'haslo', '4a'),
(13, 'Jenk', 'Asda', 'Jenm@gmail.com', '213k12j3k', '4a'),
(14, 'asdas', 'asdasd', 'sdas@dasd.ciom', 'adasd', '4a'),
(15, 'asdasd', 'asdasdas', 'adas@gmail.com', 'asdasd', '4a');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `wf`
--

CREATE TABLE `wf` (
  `id` int(11) NOT NULL,
  `ocena` text COLLATE utf8mb4_polish_ci NOT NULL,
  `id_ucznia` int(11) NOT NULL,
  `komentarz` text COLLATE utf8mb4_polish_ci NOT NULL DEFAULT 'sprawdzian lekkoatletyka'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `wf`
--

INSERT INTO `wf` (`id`, `ocena`, `id_ucznia`, `komentarz`) VALUES
(1, '5', 1, 'lekkoatletyka'),
(2, '6', 3, 'rozgrzewka'),
(4, '1', 2, 'aktywnosc'),
(5, '3', 3, 'skok'),
(6, '3', 3, 'lekkoatletyka');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `angielski`
--
ALTER TABLE `angielski`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `informatyka`
--
ALTER TABLE `informatyka`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `matematyka`
--
ALTER TABLE `matematyka`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `nauczyciele`
--
ALTER TABLE `nauczyciele`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `polski`
--
ALTER TABLE `polski`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `uczniowie`
--
ALTER TABLE `uczniowie`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `wf`
--
ALTER TABLE `wf`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `angielski`
--
ALTER TABLE `angielski`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT dla tabeli `informatyka`
--
ALTER TABLE `informatyka`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT dla tabeli `matematyka`
--
ALTER TABLE `matematyka`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT dla tabeli `nauczyciele`
--
ALTER TABLE `nauczyciele`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT dla tabeli `polski`
--
ALTER TABLE `polski`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT dla tabeli `uczniowie`
--
ALTER TABLE `uczniowie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT dla tabeli `wf`
--
ALTER TABLE `wf`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
