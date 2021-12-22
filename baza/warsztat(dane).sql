-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 22 Gru 2021, 13:12
-- Wersja serwera: 10.4.22-MariaDB
-- Wersja PHP: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `warsztat`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `czesc`
--

CREATE TABLE `czesc` (
  `id` int(10) UNSIGNED NOT NULL,
  `nazwa` varchar(50) COLLATE utf8_polish_ci NOT NULL,
  `cena` float NOT NULL,
  `stan_magazynowy` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `czesc`
--

INSERT INTO `czesc` (`id`, `nazwa`, `cena`, `stan_magazynowy`) VALUES
(1, 'Tłok', 230.99, 12),
(2, 'Uszczelka', 2.5, 10),
(3, 'Opona', 200, 20),
(4, 'Płyn chłodniczy', 49.99, 2),
(5, 'Dadio', 499.49, 5);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `klient`
--

CREATE TABLE `klient` (
  `id` int(10) UNSIGNED NOT NULL,
  `imie` varchar(100) COLLATE utf8_polish_ci NOT NULL,
  `nazwisko` varchar(100) COLLATE utf8_polish_ci NOT NULL,
  `telefon` int(9) NOT NULL,
  `adres` varchar(100) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `klient`
--

INSERT INTO `klient` (`id`, `imie`, `nazwisko`, `telefon`, `adres`) VALUES
(1, 'Tomasz', 'Obłój', 570299200, 'Kraków'),
(2, 'Jan', 'Kowalski', 500400100, 'Sosnowiec '),
(3, 'Marek', 'Nowak', 300123123, 'Stokowa'),
(4, 'Krystian', 'Konik', 694201234, 'Zadupie 42'),
(5, 'Krzysztof', 'Szarek', 333213213, 'Piwna 11'),
(6, 'Damian', 'Suczkowski', 444123111, 'Warszawska'),
(7, 'Jakub', 'Kupkowski', 2147483647, 'Budowlana'),
(8, 'Artur', 'Arturowski', 777555444, 'św. Artura'),
(9, 'Bernardyna', 'Kłyś', 555233211, 'Leśna 18'),
(10, 'Julka', 'HEHKrycha', 213412312, 'Katowice');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `mechanik`
--

CREATE TABLE `mechanik` (
  `id` int(10) UNSIGNED NOT NULL,
  `imie` varchar(100) COLLATE utf8_polish_ci NOT NULL,
  `nazwisko` varchar(100) COLLATE utf8_polish_ci NOT NULL,
  `telefon` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `mechanik`
--

INSERT INTO `mechanik` (`id`, `imie`, `nazwisko`, `telefon`) VALUES
(1, 'Arek', 'Sala', 500288123),
(2, 'Krystian', 'Kłyś', 560231223),
(3, 'Artur', 'Musiał', 554123123),
(4, 'Paweł', 'Niepecl', 692313123),
(5, 'Krzysztof', 'Kustosz', 123123412);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `naprawa`
--

CREATE TABLE `naprawa` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_samochod` int(10) UNSIGNED NOT NULL,
  `id_mechanik` int(10) UNSIGNED NOT NULL,
  `data_naprawy` date NOT NULL,
  `kwota` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `naprawa`
--

INSERT INTO `naprawa` (`id`, `id_samochod`, `id_mechanik`, `data_naprawy`, `kwota`) VALUES
(1, 1, 1, '2021-12-08', 3000),
(2, 5, 2, '2021-12-21', 69420),
(3, 3, 1, '2021-12-01', 111111),
(4, 2, 2, '2021-12-30', 12312300),
(5, 4, 2, '2021-12-21', 2132110);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `naprawa_czesc`
--

CREATE TABLE `naprawa_czesc` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_naprawy` int(10) UNSIGNED NOT NULL,
  `id_czesci` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `naprawa_czesc`
--

INSERT INTO `naprawa_czesc` (`id`, `id_naprawy`, `id_czesci`) VALUES
(1, 1, 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `samochod`
--

CREATE TABLE `samochod` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_kient` int(10) UNSIGNED NOT NULL,
  `marka` varchar(100) COLLATE utf8_polish_ci NOT NULL,
  `model` varchar(100) COLLATE utf8_polish_ci NOT NULL,
  `rocznik` int(11) NOT NULL,
  `przebieg` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `samochod`
--

INSERT INTO `samochod` (`id`, `id_kient`, `marka`, `model`, `rocznik`, `przebieg`) VALUES
(1, 1, 'Tesla', 'Model 3', 2018, 100600),
(2, 2, 'Ford', 'Focus', 2010, 130650),
(3, 6, 'Opel', 'Corsa', 2012, 2121345),
(4, 5, 'Fiat', 'Panda', 2015, 110011),
(5, 7, 'Mercedes', 'GLC', 2010, 500123);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `czesc`
--
ALTER TABLE `czesc`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `klient`
--
ALTER TABLE `klient`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `mechanik`
--
ALTER TABLE `mechanik`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `naprawa`
--
ALTER TABLE `naprawa`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `naprawa_czesc`
--
ALTER TABLE `naprawa_czesc`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `samochod`
--
ALTER TABLE `samochod`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `czesc`
--
ALTER TABLE `czesc`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT dla tabeli `klient`
--
ALTER TABLE `klient`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT dla tabeli `mechanik`
--
ALTER TABLE `mechanik`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT dla tabeli `naprawa`
--
ALTER TABLE `naprawa`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT dla tabeli `naprawa_czesc`
--
ALTER TABLE `naprawa_czesc`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT dla tabeli `samochod`
--
ALTER TABLE `samochod`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
