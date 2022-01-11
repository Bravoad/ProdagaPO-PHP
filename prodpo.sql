-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Ноя 09 2018 г., 11:16
-- Версия сервера: 5.7.20
-- Версия PHP: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `prodpo`
--

-- --------------------------------------------------------

--
-- Структура таблицы `Dogovor`
--

CREATE TABLE `Dogovor` (
  `Ndog` int(4) NOT NULL,
  `NamePos` varchar(100) NOT NULL,
  `Vendor` varchar(50) NOT NULL,
  `Bankrekv` varchar(100) NOT NULL,
  `Dpodpis` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `Dogovor`
--

INSERT INTO `Dogovor` (`Ndog`, `NamePos`, `Vendor`, `Bankrekv`, `Dpodpis`) VALUES
(1, 'Post', 'Berta', '5578990674', '1994-04-04'),
(2, 'OmegaPost', 'ABBYY', '557890478889', '1994-04-04'),
(3, 'BravoPost', 'Microsoft', '7889574.210232', '2004-05-05'),
(4, 'Nigapost', 'Microsoft', '1478950369', '2018-11-09'),
(5, 'Amigopost', 'Embacadero', '1478950369', '2018-11-09'),
(6, 'AlphaPost', '1С битрикс', '577902369', '2014-12-25'),
(7, 'OmegaPost', 'Microsoft', '577902369', '2014-12-25'),
(8, 'JagaPost', 'Лаболатория Касперского', '5478998850', '2014-04-11');

-- --------------------------------------------------------

--
-- Структура таблицы `KATE`
--

CREATE TABLE `KATE` (
  `Nkat` int(11) NOT NULL,
  `Kat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `KATE`
--

INSERT INTO `KATE` (`Nkat`, `Kat`) VALUES
(1, '­Антивирусы'),
(2, 'Безопасность'),
(3, 'Графика и дизайн'),
(4, 'Офисные программы'),
(5, 'Игры'),
(6, '­Обработка видео, звука'),
(7, '­Программы для смартфонов'),
(8, '­Операционные системы'),
(9, '­Утилиты'),
(10, '­Восстановление данных'),
(11, '­Управление компанией'),
(12, '­Навигация и карты');

-- --------------------------------------------------------

--
-- Структура таблицы `TIPLISE`
--

CREATE TABLE `TIPLISE` (
  `Ntiplis` int(11) NOT NULL,
  `Tiplis` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `TIPLISE`
--

INSERT INTO `TIPLISE` (`Ntiplis`, `Tiplis`) VALUES
(1, 'Проприетарные'),
(2, 'Открытые'),
(3, 'Свободные');

-- --------------------------------------------------------

--
-- Структура таблицы `TIPPO`
--

CREATE TABLE `TIPPO` (
  `NtipPO` int(11) NOT NULL,
  `TipPO` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `TIPPO`
--

INSERT INTO `TIPPO` (`NtipPO`, `TipPO`) VALUES
(1, 'Системные'),
(2, 'Прикладные'),
(3, 'Системы программирования');

-- --------------------------------------------------------

--
-- Структура таблицы `Tovar`
--

CREATE TABLE `Tovar` (
  `Ntov` int(4) NOT NULL,
  `Ndog` int(4) NOT NULL,
  `NamePO` varchar(100) NOT NULL,
  `NtipPO` int(4) NOT NULL,
  `Nkat` int(4) NOT NULL,
  `Plat` varchar(50) NOT NULL,
  `Ntiplis` int(4) NOT NULL,
  `Yaz` varchar(100) NOT NULL,
  `Razrab` varchar(100) NOT NULL,
  `Kolvokop` int(10) NOT NULL,
  `Stomost` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `Tovar`
--

INSERT INTO `Tovar` (`Ntov`, `Ndog`, `NamePO`, `NtipPO`, `Nkat`, `Plat`, `Ntiplis`, `Yaz`, `Razrab`, `Kolvokop`, `Stomost`) VALUES
(1, 1, 'DR.WEB', 1, 1, 'PC', 1, 'Русский', 'DR.WEB', 1120, 2000),
(2, 1, 'Warcraft', 2, 5, 'PC', 2, 'Русский', 'Blizzard', 500, 2000),
(3, 4, 'Elex', 2, 5, 'PC', 2, 'Русский', 'Ubisoft', 1120, 2000),
(4, 2, 'ESET', 1, 1, 'PC', 1, 'Русский', 'Ubisoft', 500, 2000),
(5, 1, 'Касперский 5.0', 1, 1, 'PC', 2, 'Русский', 'DR.WEB', 1120, 2000),
(6, 6, 'assasin creed', 2, 5, 'PC', 1, 'Русский', 'Ubisoft', 500, 2000),
(7, 3, 'Photoshop CS6', 2, 3, 'PC', 3, 'Русский', 'Ubisoft', 1120, 2000);

-- --------------------------------------------------------

--
-- Структура таблицы `ZAKAZ`
--

CREATE TABLE `ZAKAZ` (
  `Nzak` int(4) NOT NULL,
  `Ntov` int(4) NOT NULL,
  `Namepok` varchar(100) NOT NULL,
  `Dzak` date NOT NULL,
  `Prof` varchar(100) NOT NULL,
  `Tel` varchar(20) NOT NULL,
  `Kookop` int(10) NOT NULL,
  `AdresDost` varchar(100) NOT NULL,
  `Dopl` date DEFAULT NULL,
  `Ddost` date DEFAULT NULL,
  `Stat` int(2) NOT NULL,
  `Sposopl` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `Dogovor`
--
ALTER TABLE `Dogovor`
  ADD PRIMARY KEY (`Ndog`);

--
-- Индексы таблицы `KATE`
--
ALTER TABLE `KATE`
  ADD PRIMARY KEY (`Nkat`);

--
-- Индексы таблицы `TIPLISE`
--
ALTER TABLE `TIPLISE`
  ADD PRIMARY KEY (`Ntiplis`);

--
-- Индексы таблицы `TIPPO`
--
ALTER TABLE `TIPPO`
  ADD PRIMARY KEY (`NtipPO`);

--
-- Индексы таблицы `Tovar`
--
ALTER TABLE `Tovar`
  ADD PRIMARY KEY (`Ntov`),
  ADD KEY `NtipPO` (`NtipPO`,`Nkat`,`Ntiplis`),
  ADD KEY `tovar_ibfk_2` (`Nkat`),
  ADD KEY `tovar_ibfk_3` (`Ntiplis`),
  ADD KEY `tovar_ibfk_1` (`Ndog`) USING BTREE;

--
-- Индексы таблицы `ZAKAZ`
--
ALTER TABLE `ZAKAZ`
  ADD PRIMARY KEY (`Nzak`),
  ADD KEY `Ntov` (`Ntov`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `Dogovor`
--
ALTER TABLE `Dogovor`
  MODIFY `Ndog` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `KATE`
--
ALTER TABLE `KATE`
  MODIFY `Nkat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `TIPLISE`
--
ALTER TABLE `TIPLISE`
  MODIFY `Ntiplis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `TIPPO`
--
ALTER TABLE `TIPPO`
  MODIFY `NtipPO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `Tovar`
--
ALTER TABLE `Tovar`
  MODIFY `Ntov` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `ZAKAZ`
--
ALTER TABLE `ZAKAZ`
  MODIFY `Nzak` int(4) NOT NULL AUTO_INCREMENT;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `Tovar`
--
ALTER TABLE `Tovar`
  ADD CONSTRAINT `tovar_ibfk_1` FOREIGN KEY (`Ndog`) REFERENCES `Dogovor` (`Ndog`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tovar_ibfk_2` FOREIGN KEY (`Nkat`) REFERENCES `KATE` (`Nkat`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tovar_ibfk_3` FOREIGN KEY (`Ntiplis`) REFERENCES `TIPLISE` (`Ntiplis`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tovar_ibfk_4` FOREIGN KEY (`NtipPO`) REFERENCES `TIPPO` (`NtipPO`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `ZAKAZ`
--
ALTER TABLE `ZAKAZ`
  ADD CONSTRAINT `zakaz_ibfk_1` FOREIGN KEY (`Ntov`) REFERENCES `Tovar` (`Ntov`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
