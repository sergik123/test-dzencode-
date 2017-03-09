-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Мар 09 2017 г., 14:09
-- Версия сервера: 5.5.25
-- Версия PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `guest`
CREATE DATABASE `guest` CHARACTER SET utf8 COLLATE utf8_general_ci;
--

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE IF NOT EXISTS `guest`.`comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `homepage` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `ip_users` varchar(100) NOT NULL,
  `browser` varchar(100) NOT NULL,
  `date_comment` datetime NOT NULL,
  `files` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `guest`.`comments` (`id`, `username`, `email`, `homepage`, `comment`, `ip_users`, `browser`, `date_comment`, `files`) VALUES
(1, 'Sergey', 'test@mail.ru', 'http://test.com', 'Первый комментарий на этом сайте', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 ', '2017-03-09 13:55:02', ''),
(2, 'Igor', 'igor@mail.ru', '', 'комментарий с прикрепленной картинкой jpg', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 ', '2017-03-09 13:58:51', 'third.jpg'),
(3, 'Max', 'max@mail.ru', '', 'еще один комментарий с картинкой png', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 ', '2017-03-09 14:01:07', 'first.png'),
(4, 'Lena', 'lena@mail.ru', '', 'комментарий с картинкой gif', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 ', '2017-03-09 14:02:03', 'second.gif'),
(5, 'Nastya', 'nastya@mail.ru', 'http://nastya.com', 'Это последний добавленный мной комментарий', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 ', '2017-03-09 14:06:02', '');

-- --------------------------------------------------------

--
-- Структура таблицы `request`
--

CREATE TABLE IF NOT EXISTS `guest`.`request` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `main_id` int(11) NOT NULL,
  `username_request` varchar(100) NOT NULL,
  `email_request` varchar(255) NOT NULL,
  `home_request` varchar(255) NOT NULL,
  `comment_request` text NOT NULL,
  `ip_request` varchar(100) NOT NULL,
  `browser_request` varchar(255) NOT NULL,
  `date_request` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Дамп данных таблицы `request`
--

INSERT INTO `guest`.`request` (`id`, `main_id`, `username_request`, `email_request`, `home_request`, `comment_request`, `ip_request`, `browser_request`, `date_request`) VALUES
(1, 1, 'Kate', 'site@mail.ru', '', 'ответ на этот комментарий ', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', '2017-03-09 13:56:06'),
(2, 1, 'Nadya', 'rest@mail.ru', 'http://rest.com', 'еще один ответ', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', '2017-03-09 13:57:16'),
(3, 2, 'Sveta', 'sveta@mail.ru', 'http://sveta.com', 'ответ на комментарий с картинкой', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', '2017-03-09 13:59:59'),
(4, 1, 'Kristina', 'kristina@mail.ru', '', 'и еще один тестовый комментарий', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', '2017-03-09 14:03:55'),
(5, 5, 'ivan', 'ivan@mail.ru', '', 'последний добавленный ответ', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', '2017-03-09 14:07:04');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
