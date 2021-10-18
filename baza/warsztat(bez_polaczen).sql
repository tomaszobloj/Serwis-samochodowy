-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 18 Paź 2021, 15:54
-- Wersja serwera: 10.3.16-MariaDB
-- Wersja PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
  `id` int(11) NOT NULL,
  `nazwa` varchar(100) COLLATE utf8_polish_ci NOT NULL,
  `cena` float NOT NULL,
  `stan_magazynowy` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `czesc`
--

INSERT INTO `czesc` (`id`, `nazwa`, `cena`, `stan_magazynowy`) VALUES
(1, 'Silnik', 332, 5);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `klient`
--

CREATE TABLE `klient` (
  `id` int(11) NOT NULL,
  `imie` varchar(100) COLLATE utf8_polish_ci NOT NULL,
  `nazwisko` varchar(100) COLLATE utf8_polish_ci NOT NULL,
  `telefon` int(9) NOT NULL,
  `adres` varchar(100) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `klient`
--

INSERT INTO `klient` (`id`, `imie`, `nazwisko`, `telefon`, `adres`) VALUES
(1, 'Tomasz', 'Obłój', 123123123, 'kraków');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `mechanik`
--

CREATE TABLE `mechanik` (
  `id` int(11) NOT NULL,
  `imie` varchar(100) COLLATE utf8_polish_ci NOT NULL,
  `nazwisko` varchar(100) COLLATE utf8_polish_ci NOT NULL,
  `telefon` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `mechanik`
--

INSERT INTO `mechanik` (`id`, `imie`, `nazwisko`, `telefon`) VALUES
(1, 'Arkadiusz', 'Sala', 456123123);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `naprawa`
--

CREATE TABLE `naprawa` (
  `id` int(11) NOT NULL,
  `data_naprawy` date NOT NULL,
  `kwota` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `naprawa`
--

INSERT INTO `naprawa` (`id`, `data_naprawy`, `kwota`) VALUES
(1, '2021-10-01', 123);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `naprawa_czesc`
--

CREATE TABLE `naprawa_czesc` (
  `id` int(11) NOT NULL,
  `id_naprawy` int(11) NOT NULL,
  `id_czesci` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `samochod`
--

CREATE TABLE `samochod` (
  `id` int(11) NOT NULL,
  `marka` varchar(100) COLLATE utf8_polish_ci NOT NULL,
  `model` varchar(100) COLLATE utf8_polish_ci NOT NULL,
  `rocznik` int(11) NOT NULL,
  `przebieg` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `samochod`
--

INSERT INTO `samochod` (`id`, `marka`, `model`, `rocznik`, `przebieg`) VALUES
(1, 'Tesla', 'Model 3', 2018, 200000);

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_naprawy` (`id_naprawy`,`id_czesci`),
  ADD KEY `id_czesci` (`id_czesci`);

--
-- Indeksy dla tabeli `samochod`
--
ALTER TABLE `samochod`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `czesc`
--
ALTER TABLE `czesc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT dla tabeli `klient`
--
ALTER TABLE `klient`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT dla tabeli `mechanik`
--
ALTER TABLE `mechanik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT dla tabeli `naprawa`
--
ALTER TABLE `naprawa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT dla tabeli `naprawa_czesc`
--
ALTER TABLE `naprawa_czesc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `samochod`
--
ALTER TABLE `samochod`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
