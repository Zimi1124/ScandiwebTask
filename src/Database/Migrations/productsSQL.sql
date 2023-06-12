-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Czas generowania: 03 Lut 2023, 19:32
-- Wersja serwera: 10.4.17-MariaDB
-- Wersja PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `jakubdur_scandiweb`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `product`
--

CREATE TABLE `product` (
                           `id` int(11) NOT NULL,
                           `sku` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
                           `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
                           `price` float NOT NULL,
                           `type` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
                           `attribute` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Zrzut danych tabeli `product`
--

INSERT INTO `product` (`id`, `sku`, `name`, `price`, `type`, `attribute`) VALUES
(1, 'YAB8345946', 'Harry Potter', 19.99, 'Book', '0.8'),
(2, 'WAW0273816', 'Harry Potter Movie', 15, 'DVD', '2137'),
(3, 'VEL7646080', 'LACK table', 10, 'Furniture', '40 x 55 x 55'),
(4, 'FBG6866246', 'Wall shelf LACK', 8.99, 'Furniture', '5 x 100 x 20'),
(5, 'FUI0773753', 'The Hobbit by Tolkien', 12, 'Book', '2'),
(6, 'EVF8590325', 'Nineteen Eighty Four', 16, 'Book', '1.984'),
(8, 'LUY6969272', 'Stranger Things', 777, 'DVD', '3322'),
(9, 'QZW3185368', 'Pulp Fiction', 8.99, 'DVD', '4200'),
(10, 'ABC1234567', 'The Lord of the Rings', 14.99, 'Book', '1.5'),
(11, 'XYZ9876543', 'Game of Thrones Season 1', 29.99, 'DVD', '1200'),
(12, 'RST2468135', 'Leather Sofa', 699, 'Furniture', '90 x 200 x 100'),
(13, 'MNO7890123', 'The Catcher in the Rye', 9.99, 'Book', '1.2'),
(14, 'KLM5432167', 'Friends TV Series', 49.99, 'DVD', '2500'),
(15, 'PQR1357924', 'Computer Desk', 79.99, 'Furniture', '75 x 120 x 60'),
(16, 'JKL2468135', 'To Kill a Mockingbird', 7.99, 'Book', '1.1');


--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `product`
--
ALTER TABLE `product`
    ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `product`
--
ALTER TABLE `product`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECT