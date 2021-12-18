-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Дек 15 2021 г., 03:10
-- Версия сервера: 10.3.22-MariaDB
-- Версия PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `kassa`
--

-- --------------------------------------------------------

--
-- Структура таблицы `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `lang` varchar(256) NOT NULL,
  `title` varchar(256) NOT NULL,
  `content` text NOT NULL,
  `cat` varchar(256) NOT NULL,
  `views` varchar(256) NOT NULL DEFAULT '0',
  `likes` varchar(256) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `blog`
--

INSERT INTO `blog` (`id`, `lang`, `title`, `content`, `cat`, `views`, `likes`) VALUES
(1, 'ru', 'Функция number_format() в PHP', 'number_format() возвращает отформатированное число number . Функция принимает один, два или четыре аргумента. Если переданы два аргумента, number будет отформатирован с decimals знаками после точки (\".\") и с запятой (\",\") между группами цифр по 3.', '1', '1', '0');

-- --------------------------------------------------------

--
-- Структура таблицы `catalog`
--

CREATE TABLE `catalog` (
  `id` int(16) NOT NULL,
  `name` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `catalog`
--

INSERT INTO `catalog` (`id`, `name`) VALUES
(1, 'PHP');

-- --------------------------------------------------------

--
-- Структура таблицы `lang`
--

CREATE TABLE `lang` (
  `id` int(16) NOT NULL,
  `code` varchar(256) NOT NULL,
  `name` varchar(256) NOT NULL,
  `base` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `lang`
--

INSERT INTO `lang` (`id`, `code`, `name`, `base`) VALUES
(1, 'ru', 'Русский', '1'),
(2, 'en', 'English', '0');

-- --------------------------------------------------------

--
-- Структура таблицы `patients`
--

CREATE TABLE `patients` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `middle_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birth_date` date NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `infl` int(11) NOT NULL,
  `passport` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reg_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `patients`
--

INSERT INTO `patients` (`id`, `first_name`, `last_name`, `middle_name`, `birth_date`, `address`, `infl`, `passport`, `reg_date`) VALUES
(1, 'Javohir', 'Abduhalilov', 'Shavkatovich', '2021-06-05', 'Uzbekistan, Tashkent', 123456789, 'ABC123456789', '2021-12-14'),
(2, 'Shaxruz', 'Abduhalilov', 'Shavkatovich', '2021-07-13', 'Uzbekistan, Tashkent', 123456789, 'CBD123456789', '2021-12-15'),
(3, 'Shaxruz', 'Abduhalilov', 'Shavkatovich', '2021-07-13', 'Uzbekistan, Tashkent', 123456789, 'CBD123456789', '2021-12-15');

-- --------------------------------------------------------

--
-- Структура таблицы `treatment`
--

CREATE TABLE `treatment` (
  `id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `sum` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'unpaid'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `treatment`
--

INSERT INTO `treatment` (`id`, `patient_id`, `sum`, `date`, `status`) VALUES
(1, 1, '5000.00', '2021-12-15', 'paid');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `login` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `name` varchar(256) NOT NULL,
  `role` varchar(256) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `login`, `password`, `email`, `name`, `role`) VALUES
(1, 'Java', '$2y$10$P8d1G30xv99FNK06rbdjkelWpEWWl0yVFp9Se0i9IsRr6peiGLPAK', 'javastudio2020@gmail.com', 'Жавохир', 'admin'),
(2, 'Kassa', '$2y$10$P8d1G30xv99FNK06rbdjkelWpEWWl0yVFp9Se0i9IsRr6peiGLPAK', 'kassa@gmail.com', 'Кассир', 'kassa'),
(3, 'Manager', '$2y$10$P8d1G30xv99FNK06rbdjkelWpEWWl0yVFp9Se0i9IsRr6peiGLPAK', 'manager@gmail.com', 'Менеджер', 'manager'),
(4, 'Recorder', '$2y$10$P8d1G30xv99FNK06rbdjkelWpEWWl0yVFp9Se0i9IsRr6peiGLPAK', 'recorder@gmail.com', 'Регистратор', 'recorder'),
(5, 'Good', '$2y$10$t4U/HlV3rZNyb9p0oqBwHOzhCnqb5EsTVO/tQrVGYCFcX4etPHQp.', 'good@gmail.com', 'Хорошо', 'user');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `catalog`
--
ALTER TABLE `catalog`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Индексы таблицы `lang`
--
ALTER TABLE `lang`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `treatment`
--
ALTER TABLE `treatment`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login` (`login`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `catalog`
--
ALTER TABLE `catalog`
  MODIFY `id` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `lang`
--
ALTER TABLE `lang`
  MODIFY `id` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `patients`
--
ALTER TABLE `patients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `treatment`
--
ALTER TABLE `treatment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
