-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Фев 01 2015 г., 18:45
-- Версия сервера: 5.6.21-log
-- Версия PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `myfarm`
--

-- --------------------------------------------------------

--
-- Структура таблицы `db_menu`
--

CREATE TABLE IF NOT EXISTS `db_menu` (
  `header` varchar(50) NOT NULL,
  `link` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `db_menu`
--

INSERT INTO `db_menu` (`header`, `link`) VALUES
('Новости', 'news'),
('Выплаты', 'payments'),
('Правила', 'rules');

-- --------------------------------------------------------

--
-- Структура таблицы `db_stats`
--

CREATE TABLE IF NOT EXISTS `db_stats` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `all_users` int(11) DEFAULT NULL,
  `all_payments` double DEFAULT NULL,
  `all_insert` double DEFAULT NULL,
  `donations` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `db_stats`
--

INSERT INTO `db_stats` (`id`, `all_users`, `all_payments`, `all_insert`, `donations`) VALUES
(1, 1, 0, 0, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `db_users_a`
--

CREATE TABLE IF NOT EXISTS `db_users_a` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pass` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user` (`user`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Дамп данных таблицы `db_users_a`
--

INSERT INTO `db_users_a` (`id`, `user`, `email`, `pass`) VALUES
(1, 'admin', 'admin@admin.ru', 'admin'),
(2, 'hose', 'hose@alivance.com', 'alivance'),
(8, 'love', 'love@alivance.com', 'alivance');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
