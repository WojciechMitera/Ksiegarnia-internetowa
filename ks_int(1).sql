-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Maj 31, 2024 at 12:05 PM
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
  `data_urodzenia` date DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `telefon` char(9) DEFAULT NULL,
  `log_in` varchar(50) DEFAULT NULL,
  `haslo` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `klient`
--

INSERT INTO `klient` (`id_klienta`, `imie`, `nazwisko`, `data_urodzenia`, `email`, `telefon`, `log_in`, `haslo`) VALUES
(8, 'Jakub', 'Englart', '2008-04-03', 'kuba.englart@wp.pl', '132465798', 'lunchy', 'sum'),
(11, 'Gabriel', 'Odbierzychleb', '2008-01-30', 'garbus@interia.pl', '987364572', 'garbiel', 'szczupak'),
(14, 'Wojciech', 'Mitera', '2008-11-22', 'miterawojciech@gmail.com', '789139468', 'wojtusz', 'okon'),
(130, 'Rafał', 'Ptasznik', '2008-02-08', 'samba@onet.pl', '091283094', 'samba', 'pstrag'),
(131, 'Wojciech', 'Mazur', '2007-11-11', 'mazurek@interia.pl', '172037149', 'mazur', 'rekin'),
(132, 'Kamil', 'Ślimak', '1985-06-13', 'slimak@gmail.com', '839599202', 'kamils', 'jesiotr');

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
(4, 'Nie-boska komedia', 'Zygmunt Krasinski', 'nowa era', 1835, 100, 42),
(5, 'Potop', 'Henryk Sienkiewicz', 'Swiat ksiazki', 1886, 100, 58),
(6, 'Przedwiosnie', 'Stefan Zeromski', 'Muza', 1924, 100, 51),
(12, 'Hobbit', 'Tolkien', 'Swiat ksiazki', 1954, 100, 57),
(13, 'Harry Potter', 'J K Rowling', 'greg', 1996, 100, 49),
(19, 'Diuna', 'Frank Herbert', 'Muza', 1965, 100, 60);

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
-- Dumping data for table `zamowienie`
--

INSERT INTO `zamowienie` (`id_zamowienia`, `id_klienta`, `id_ksiazki`, `liczba_egzemplarzy`) VALUES
(4, 14, 5, 6),
(5, 14, 5, 13),
(6, 14, 6, 6),
(8, 14, 12, 5),
(11, 14, 4, 5),
(12, 14, 6, 2),
(13, 131, 12, 4);

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
  ADD KEY `zam_kl` (`id_klienta`),
  ADD KEY `zam_ks` (`id_ksiazki`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `klient`
--
ALTER TABLE `klient`
  MODIFY `id_klienta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;

--
-- AUTO_INCREMENT for table `ksiazka`
--
ALTER TABLE `ksiazka`
  MODIFY `id_ksiazki` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `zamowienie`
--
ALTER TABLE `zamowienie`
  MODIFY `id_zamowienia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `zamowienie`
--
ALTER TABLE `zamowienie`
  ADD CONSTRAINT `zam_kl` FOREIGN KEY (`id_klienta`) REFERENCES `klient` (`id_klienta`) ON DELETE SET NULL ON UPDATE NO ACTION,
  ADD CONSTRAINT `zam_ks` FOREIGN KEY (`id_ksiazki`) REFERENCES `ksiazka` (`id_ksiazki`) ON DELETE SET NULL ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
