-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 10 Sty 2024, 09:44
-- Wersja serwera: 10.1.36-MariaDB
-- Wersja PHP: 7.2.11

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
  `id` int(10) UNSIGNED NOT NULL,
  `nazwa` varchar(50) COLLATE utf8_polish_ci NOT NULL,
  `cena` float NOT NULL,
  `stan_magazynowy` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `czesc`
--

INSERT INTO `czesc` (`id`, `nazwa`, `cena`, `stan_magazynowy`) VALUES
(1, 'Tłok', 229.99, 12),
(2, 'Zestaw uszczelek silnikowych', 99.99, 7),
(3, 'Opona', 299.99, 8),
(4, 'Płyn chłodniczy', 149.99, 30),
(5, 'Radio', 499.49, 5),
(6, 'Klocki hamulcowe', 169.99, 4),
(7, 'Żarówka', 14.99, 66),
(8, 'Zestaw 4 felg', 1299.99, 5),
(9, 'Zestaw śrub i nakrętek', 39.29, 560),
(10, 'Obudowa filtru', 349.99, 3),
(11, 'Chłodnica', 799.99, 2),
(12, 'Sprężyna zawieszenia', 119.99, 44);

-- --------------------------------------------------------

--
-- Zastąpiona struktura widoku `klienci_pro`
-- (Zobacz poniżej rzeczywisty widok)
--
CREATE TABLE `klienci_pro` (
`imie` varchar(100)
,`nazwisko` varchar(100)
);

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
(1, 'Tomasz', 'Obłój', 573299710, 'Kraków'),
(2, 'Jan', 'Kowalski', 500400100, 'Sosnowiec '),
(3, 'Marek', 'Nowak', 300123123, 'Stokowa'),
(4, 'Krystian', 'Konik', 784645527, 'Zadupie 42'),
(5, 'Krzysztof', 'Szarek', 333213213, 'Piwna 11'),
(6, 'Damian', 'Suczkowski', 444123111, 'Warszawska'),
(7, 'Jakub', 'Kupkowski', 2147483647, 'Budowlana'),
(8, 'Artur', 'Arturowski', 777555444, 'św. Artura'),
(9, 'Bernardyna', 'Kłyś', 555233211, 'Leśna 18'),
(10, 'Julka', 'Krzywoń', 213412312, 'Katowice'),
(11, 'Weronika', 'Słupska', 573299710, 'Kraków'),
(12, 'Gabriela', 'Twaróg', 694202123, 'Nowa Huta'),
(13, 'Oskar', 'Skoczyk', 506353210, 'Młodziejowice'),
(14, 'Iwona', 'Żurek', 514053003, 'Kraków'),
(15, 'Kamil', 'Mamcarczyk', 567432123, 'Bronowice'),
(16, 'Karol', 'Buch', 876231754, 'Miasteczko Studenckie AGH'),
(17, 'Nikola', 'Karpińska', 543987098, 'Podlasie'),
(18, 'Patryk', 'Rut', 567565987, 'Kraków'),
(19, 'Mateusz', 'Oskołow', 658321865, 'Kraków'),
(20, 'Mikołaj', 'Czaicki', 438765098, 'Browarowa');

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
(1, 'Arek', 'Sala', 533366575),
(2, 'Krystian', 'Kłyś', 500878010),
(3, 'Artur', 'Musiał', 554123123),
(4, 'Paweł', 'Niepecl', 692313123),
(5, 'Kamil', 'Musiał', 123123412);

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
(1, 1, 1, '2021-12-08', 309.99),
(2, 5, 2, '2021-12-21', 690.99),
(3, 3, 1, '2021-12-01', 5999.99),
(4, 2, 4, '2021-12-30', 99.99),
(5, 4, 2, '2021-12-21', 1199.99),
(6, 10, 4, '2024-01-24', 1999.99),
(7, 8, 3, '2024-01-31', 299.99),
(8, 9, 2, '2024-01-29', 599.99),
(9, 6, 5, '2024-02-21', 3499.99),
(10, 7, 5, '2024-02-13', 459.99);

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
(1, 1, 1),
(2, 9, 8),
(3, 9, 3),
(4, 9, 5),
(5, 6, 9),
(6, 2, 8),
(7, 3, 6),
(8, 10, 10),
(9, 8, 5),
(10, 7, 6),
(11, 5, 8),
(12, 2, 3),
(13, 3, 11),
(14, 4, 12);

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
(5, 7, 'Mercedes', 'GLC', 2010, 500123),
(6, 3, 'Fiat', 'Uno', 1999, 301476),
(7, 4, 'Toyota', 'Tacoma', 1998, 469420),
(8, 8, 'Ford', 'Mustang', 1969, 679123),
(9, 10, 'Subaru', 'Impreza', 1997, 490430),
(10, 9, 'Volkswagen', 'Polo', 1999, 789125);

-- --------------------------------------------------------

--
-- Struktura widoku `klienci_pro`
--
DROP TABLE IF EXISTS `klienci_pro`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `klienci_pro`  AS  select `klient`.`imie` AS `imie`,`klient`.`nazwisko` AS `nazwisko` from `klient` where (`klient`.`adres` = 'Kraków') ;

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `czesc`
--
ALTER TABLE `czesc`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT dla tabeli `naprawa_czesc`
--
ALTER TABLE `naprawa_czesc`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT dla tabeli `samochod`
--
ALTER TABLE `samochod`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
