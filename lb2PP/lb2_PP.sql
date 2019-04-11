-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 08 2019 г., 12:32
-- Версия сервера: 5.6.37
-- Версия PHP: 7.0.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `lb2_PP`
--

-- --------------------------------------------------------

--
-- Структура таблицы `Klient`
--

CREATE TABLE `Klient` (
  `id` int(11) NOT NULL,
  `Name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `Klient`
--

INSERT INTO `Klient` (`id`, `Name`) VALUES
(1, '2'),
(2, 'Сидоров'),
(4, 'Иванов4');

-- --------------------------------------------------------

--
-- Структура таблицы `Usluga`
--

CREATE TABLE `Usluga` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `tsena` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `Usluga`
--

INSERT INTO `Usluga` (`id`, `name`, `tsena`) VALUES
(1, 'такси', 200),
(2, 'уборка', 250),
(3, 'плавание', 300);

-- --------------------------------------------------------

--
-- Структура таблицы `Usluga_Zayavka`
--

CREATE TABLE `Usluga_Zayavka` (
  `usluga_id` int(11) NOT NULL,
  `zayavka_id` int(11) NOT NULL,
  `count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `Usluga_Zayavka`
--

INSERT INTO `Usluga_Zayavka` (`usluga_id`, `zayavka_id`, `count`) VALUES
(2, 3, 2),
(3, 7, 600);

-- --------------------------------------------------------

--
-- Структура таблицы `Zayavka`
--

CREATE TABLE `Zayavka` (
  `id` int(11) NOT NULL,
  `klient_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `Zayavka`
--

INSERT INTO `Zayavka` (`id`, `klient_id`) VALUES
(7, 1),
(1, 2),
(6, 2),
(3, 4),
(9, 4);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `Klient`
--
ALTER TABLE `Klient`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `Usluga`
--
ALTER TABLE `Usluga`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `Usluga_Zayavka`
--
ALTER TABLE `Usluga_Zayavka`
  ADD PRIMARY KEY (`usluga_id`,`zayavka_id`),
  ADD KEY `zayavka_id` (`zayavka_id`);

--
-- Индексы таблицы `Zayavka`
--
ALTER TABLE `Zayavka`
  ADD PRIMARY KEY (`id`),
  ADD KEY `klient_id` (`klient_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `Klient`
--
ALTER TABLE `Klient`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT для таблицы `Usluga`
--
ALTER TABLE `Usluga`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `Zayavka`
--
ALTER TABLE `Zayavka`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `Usluga_Zayavka`
--
ALTER TABLE `Usluga_Zayavka`
  ADD CONSTRAINT `usluga_zayavka_ibfk_1` FOREIGN KEY (`usluga_id`) REFERENCES `Usluga` (`id`),
  ADD CONSTRAINT `usluga_zayavka_ibfk_2` FOREIGN KEY (`zayavka_id`) REFERENCES `Zayavka` (`id`);

--
-- Ограничения внешнего ключа таблицы `Zayavka`
--
ALTER TABLE `Zayavka`
  ADD CONSTRAINT `zayavka_ibfk_1` FOREIGN KEY (`klient_id`) REFERENCES `Klient` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
