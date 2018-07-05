-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июл 05 2018 г., 10:35
-- Версия сервера: 5.6.38
-- Версия PHP: 7.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `store`
--

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `name`, `price`) VALUES
(1, 'Ноутбук ACER Aspire ES1-572-P61J', 70000),
(2, 'Ноутбук ACER Aspire A715-71G-56BD', 70000),
(3, 'Ноутбук DELL Inspiron 7567', 68990),
(4, 'Ноутбук DIGMA EVE 1402', 11940),
(5, 'Ноутбук DELL Inspiron 7577', 73490),
(6, 'Ноутбук MSI GE62 6QD(Apache Pro Heroes)-244RU', 68400),
(7, 'Ноутбук ACER Extensa EX2519-P79W', 17790),
(8, 'Ноутбук ACER Aspire ES1-572-P5N2', 70000),
(9, 'Ноутбук ACER Aspire A715-71G-59UZ', 70000),
(10, 'Ноутбук PRESTIGIO SmartBook 133S', 14910),
(11, 'Ноутбук ACER Extensa EX2519-P0BD', 21120),
(12, 'Ноутбук DELL Inspiron 3552', 17780),
(13, 'Ноутбук LENOVO IdeaPad 320-15ISK', 28670),
(14, 'Ноутбук ACER TravelMate TMP259-MG-58SF', 31590),
(15, 'Ноутбук DIGMA EVE 605', 14410),
(16, 'Ноутбук DIGMA EVE 300', 10800),
(17, 'Ноутбук ACER Aspire ES1-533-C972', 70000),
(18, 'Ноутбук DIGMA CITI E402', 9990);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
