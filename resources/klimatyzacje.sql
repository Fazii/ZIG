-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Czas generowania: 08 Cze 2016, 23:58
-- Wersja serwera: 10.1.13-MariaDB
-- Wersja PHP: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `terminy`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `klimatyzacje`
--

CREATE TABLE `klimatyzacje` (
  `id` int(11) NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL,
  `title` varchar(1024) CHARACTER SET utf8mb4 COLLATE utf8mb4_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `klimatyzacje`
--

INSERT INTO `klimatyzacje` (`id`, `start`, `end`, `title`) VALUES
(1, '2016-06-09 07:00:00', '2016-06-09 08:00:00', 'Klimatyzacja'),
(2, '2016-06-09 12:00:00', '2016-06-09 13:00:00', 'Klimatyzacja'),
(3, '2016-06-09 15:00:00', '2016-06-09 16:00:00', ''),
(4, '2016-06-10 15:00:00', '2016-06-10 16:00:00', '');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `klimatyzacje`
--
ALTER TABLE `klimatyzacje`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `klimatyzacje`
--
ALTER TABLE `klimatyzacje`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
