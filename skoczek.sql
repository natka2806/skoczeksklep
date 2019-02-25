-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 19 Lut 2019, 11:11
-- Wersja serwera: 10.1.37-MariaDB
-- Wersja PHP: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `skoczek`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `koszyk`
--

CREATE TABLE `koszyk` (
  `id_uzytkownik` int(10) UNSIGNED NOT NULL,
  `id_produkt` int(10) UNSIGNED NOT NULL,
  `id_zamowienia` int(10) UNSIGNED DEFAULT NULL,
  `id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `koszyk`
--

INSERT INTO `koszyk` (`id_uzytkownik`, `id_produkt`, `id_zamowienia`, `id`) VALUES
(1, 6, 2, 1),
(1, 5, 2, 2),
(1, 4, 2, 3),
(1, 3, 2, 4),
(2, 5, 3, 5),
(2, 3, 3, 6),
(2, 4, NULL, 7),
(1, 4, 4, 9);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `produkty`
--

CREATE TABLE `produkty` (
  `id` int(10) UNSIGNED NOT NULL,
  `nazwa` varchar(240) COLLATE utf8_polish_ci NOT NULL,
  `opis` text COLLATE utf8_polish_ci,
  `cena` decimal(8,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `produkty`
--

INSERT INTO `produkty` (`id`, `nazwa`, `opis`, `cena`) VALUES
(1, 'Piłka Adidas', 'Okrągła piłka nożna Adidas', '59.88'),
(3, 'Piłka puma', 'Puma piłka super strzela gole', '77.33'),
(4, 'Piłka umbro', 'Zwykła piłka jak każda', '33.33'),
(5, 'Piłka Nike', 'Super piłka i tyle', '99.99'),
(6, 'Taka Puma', 'Taka identyczna puma tylko droższa ', '34234.34');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uzytkownicy`
--

CREATE TABLE `uzytkownicy` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(40) COLLATE utf8_polish_ci NOT NULL,
  `haslo` varchar(80) COLLATE utf8_polish_ci NOT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT '0',
  `imie` varchar(40) COLLATE utf8_polish_ci NOT NULL,
  `nazwisko` varchar(40) COLLATE utf8_polish_ci NOT NULL,
  `ulica` varchar(40) COLLATE utf8_polish_ci NOT NULL,
  `miasto` varchar(40) COLLATE utf8_polish_ci NOT NULL,
  `kod_pocztowy` varchar(6) COLLATE utf8_polish_ci NOT NULL,
  `numer_domu` varchar(10) COLLATE utf8_polish_ci NOT NULL,
  `telefon` int(9) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `uzytkownicy`
--

INSERT INTO `uzytkownicy` (`id`, `email`, `haslo`, `admin`, `imie`, `nazwisko`, `ulica`, `miasto`, `kod_pocztowy`, `numer_domu`, `telefon`) VALUES
(1, 'admin@skoczek.pl', '$2y$10$NiTFsyTYvr6LzxNAEUcsIugNoCFS4mf2Z54pJ/6epot68dheaw.aO', 1, 'admin_skoczek', 'admin_skoczek', 'Skoczka', 'Skoczkowo', '43-300', '0/0', 123456789),
(2, 'test@test.pl', '$2y$10$1spRcMC8kJKa1Y1u2fO.mOqk9wtE8YYMdm2hFoU3geutPHgsPyPYq', 0, 'test', 'test', 'Testowa', 'Testowo', '12-126', '12/12', 123412344);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `zamowienia`
--

CREATE TABLE `zamowienia` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_uzytkownik` int(10) UNSIGNED NOT NULL,
  `stan` enum('Oczekuje','Realizacja','Zrealizowano') COLLATE utf8_polish_ci NOT NULL DEFAULT 'Oczekuje'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `zamowienia`
--

INSERT INTO `zamowienia` (`id`, `id_uzytkownik`, `stan`) VALUES
(2, 1, 'Realizacja'),
(3, 2, 'Zrealizowano'),
(4, 1, 'Oczekuje');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `koszyk`
--
ALTER TABLE `koszyk`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `produkty`
--
ALTER TABLE `produkty`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indeksy dla tabeli `zamowienia`
--
ALTER TABLE `zamowienia`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `koszyk`
--
ALTER TABLE `koszyk`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT dla tabeli `produkty`
--
ALTER TABLE `produkty`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT dla tabeli `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT dla tabeli `zamowienia`
--
ALTER TABLE `zamowienia`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
