-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Maj 13, 2024 at 07:44 PM
-- Wersja serwera: 10.4.32-MariaDB
-- Wersja PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ks_int`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `klient`
--

CREATE TABLE `klient` (
  `id_klienta` int(11) NOT NULL,
  `imie` varchar(20) DEFAULT NULL,
  `nazwisko` varchar(40) DEFAULT NULL,
  `data_urodzenia` varchar(10) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `telefon` char(9) DEFAULT NULL,
  `log_in` varchar(50) DEFAULT NULL,
  `haslo` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `klient`
--

INSERT INTO `klient` (`id_klienta`, `imie`, `nazwisko`, `data_urodzenia`, `email`, `telefon`, `log_in`, `haslo`) VALUES
(8, 'Jakub', 'Englart', '22.10.2008', 'kuba.englart@wp.pl', '132465798', 'lunchy', 'sum'),
(9, 'Jakub ', 'Nowak', '12.09.2007', 'fluffy@gmail.com', '827490328', 'fluf', 'fn'),
(10, 'Rafal', 'Ptasznik', '08.02.2008', 'samba@onet.pl', '093482658', 'samba', 'pstrag'),
(11, 'Gabriel', 'Odbierzychleb', '30.01.2008', 'garbus@interia.pl', '987364572', 'garbiel', 'szczupak'),
(14, 'Wojciech', 'Mitera', '22.11.2008', 'miterawojciech@gmail.com', '789139468', 'wojtusz', 'okon'),
(16, 'Sebastian', 'Niedojadło', '23.11.2007', 'snied@wp.pl', '492740285', 'waf', 'bass');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `ksiazka`
--

CREATE TABLE `ksiazka` (
  `id_ksiazki` int(11) NOT NULL,
  `tytul` varchar(40) DEFAULT NULL,
  `autor` varchar(100) DEFAULT NULL,
  `wydawnictwo` varchar(30) DEFAULT NULL,
  `rok_wydania` int(11) DEFAULT NULL,
  `ilosc` int(11) DEFAULT NULL,
  `cena` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ksiazka`
--

INSERT INTO `ksiazka` (`id_ksiazki`, `tytul`, `autor`, `wydawnictwo`, `rok_wydania`, `ilosc`, `cena`) VALUES
(2, 'Pan Tadeusz', 'Adam Mickiewicz', 'Grek', 1831, 100, 55),
(3, 'Balladyna', 'Juliusz Slowacki', 'Muza', 1839, 100, 35),
(4, 'Nie-boska komedia', 'Zygmunt Krasinski', 'nowa era', 1835, 100, 42),
(5, 'Potop', 'Henryk Sienkiewicz', 'Swiat ksiazki', 1886, 100, 70),
(6, 'Przedwiosnie', 'Stefan Zeromski', 'Muza', 1924, 100, 51),
(7, 'Dziady cz III', 'Adam Mickiewicz', 'Swiat ksiazki', 1832, 100, 38);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `zamowienie`
--

CREATE TABLE `zamowienie` (
  `id_zamowienia` int(11) NOT NULL,
  `id_klienta` int(11) DEFAULT NULL,
  `id_ksiazki` int(11) DEFAULT NULL,
  `liczba_egzemplarzy` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Wyzwalacze `zamowienie`
--
DELIMITER $$
CREATE TRIGGER `ilosc` AFTER INSERT ON `zamowienie` FOR EACH ROW UPDATE ksiazka set ksiazka.ilosc = ksiazka.ilosc - new.liczba_egzemplarzy where ksiazka.id_ksiazki = new.id_ksiazki
$$
DELIMITER ;

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `klient`
--
ALTER TABLE `klient`
  ADD PRIMARY KEY (`id_klienta`);

--
-- Indeksy dla tabeli `ksiazka`
--
ALTER TABLE `ksiazka`
  ADD PRIMARY KEY (`id_ksiazki`);

--
-- Indeksy dla tabeli `zamowienie`
--
ALTER TABLE `zamowienie`
  ADD PRIMARY KEY (`id_zamowienia`),
  ADD KEY `zam_ks` (`id_ksiazki`),
  ADD KEY `zam_kl` (`id_klienta`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `klient`
--
ALTER TABLE `klient`
  MODIFY `id_klienta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `ksiazka`
--
ALTER TABLE `ksiazka`
  MODIFY `id_ksiazki` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `zamowienie`
--
ALTER TABLE `zamowienie`
  MODIFY `id_zamowienia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `zamowienie`
--
ALTER TABLE `zamowienie`
  ADD CONSTRAINT `zam_kl` FOREIGN KEY (`id_klienta`) REFERENCES `klient` (`id_klienta`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `zam_ks` FOREIGN KEY (`id_ksiazki`) REFERENCES `ksiazka` (`id_ksiazki`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
