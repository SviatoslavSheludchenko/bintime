-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июл 21 2019 г., 18:47
-- Версия сервера: 5.7.23
-- Версия PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `bintime`
--

-- --------------------------------------------------------

--
-- Структура таблицы `address`
--

DROP TABLE IF EXISTS `address`;
CREATE TABLE IF NOT EXISTS `address` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `postcode` varchar(20) NOT NULL,
  `country` varchar(2) NOT NULL,
  `city` varchar(30) NOT NULL,
  `street` varchar(30) NOT NULL,
  `house` int(8) NOT NULL,
  `apartment` int(8) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `address`
--

INSERT INTO `address` (`id`, `postcode`, `country`, `city`, `street`, `house`, `apartment`, `user_id`) VALUES
(1, '00111222', 'ЕС', 'zhitomir', 'фывафыва', 55, 2222, 1),
(2, '23133', 'UA', 'zhitomir', 'pkrvska', 333, 444, 2),
(3, '010010', 'РО', 'qwerty', 'qweqweq', 2412, 11, 3),
(4, '01001', 'YY', 'qwerty', 'qweqwe', 43, 11, 1),
(5, '01001', 'YY', 'qwerty', 'qweqwe', 43, 11, 1),
(6, '010010', 'РО', 'qwerty', 'qweqweq', 444, 555, 1),
(7, '01001023', 'KZ', 'qwerty', 'qweqweq', 455, 12312, 1),
(8, '555111', 'UA', 'kiev', 'dsfsdfsdf', 123123, NULL, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `gender` varchar(15) NOT NULL,
  `date` datetime NOT NULL,
  `email` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `login`, `password`, `first_name`, `last_name`, `gender`, `date`, `email`) VALUES
(1, 'First', 'qwerty', 'Test', 'Lasttest', 'unknown', '2019-07-21 21:32:37', 'qweqwe@gmail.com'),
(2, 'Admin', 'qqq1111', 'Sviatoslav', 'Sheludchenko', 'male', '2019-07-21 21:33:22', 'sv.sheludchenko@gmail.com'),
(3, 'test', '4445555', 'Yyyasdf', 'Фывфыв', 'female', '2019-07-21 21:34:15', 'test123@test.com');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
