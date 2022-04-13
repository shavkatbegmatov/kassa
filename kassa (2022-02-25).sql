-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Фев 25 2022 г., 21:23
-- Версия сервера: 8.0.24
-- Версия PHP: 8.0.8

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
  `id` int NOT NULL,
  `lang` varchar(256) NOT NULL,
  `title` varchar(256) NOT NULL,
  `content` text NOT NULL,
  `cat` varchar(256) NOT NULL,
  `views` varchar(256) NOT NULL DEFAULT '0',
  `likes` varchar(256) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Структура таблицы `catalog`
--

CREATE TABLE `catalog` (
  `id` int NOT NULL,
  `name` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `catalog`
--

INSERT INTO `catalog` (`id`, `name`) VALUES
(1, 'dfg');

-- --------------------------------------------------------

--
-- Структура таблицы `income`
--

CREATE TABLE `income` (
  `id` int NOT NULL,
  `date` varchar(255) NOT NULL,
  `product_id` int NOT NULL,
  `count` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Структура таблицы `kassa`
--

CREATE TABLE `kassa` (
  `id` int NOT NULL,
  `date` varchar(255) NOT NULL,
  `sum` varchar(255) NOT NULL,
  `income_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Структура таблицы `lang`
--

CREATE TABLE `lang` (
  `id` int NOT NULL,
  `code` varchar(256) NOT NULL,
  `name` varchar(256) NOT NULL,
  `base` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `lang`
--

INSERT INTO `lang` (`id`, `code`, `name`, `base`) VALUES
(1, 'ru', 'Русский', '0'),
(2, 'en', 'English', '0'),
(3, 'uz', 'Узбекча', '1');

-- --------------------------------------------------------

--
-- Структура таблицы `manufacturers`
--

CREATE TABLE `manufacturers` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `manufacturers`
--

INSERT INTO `manufacturers` (`id`, `name`, `country`) VALUES
(1, 'SALUTAS PHARMA, GmbH', 'Германия'),
(2, 'dddd', 'ddd'),
(3, 'вапывы', 'Узбекистан'),
(4, 'GlaxoSmith Kline Healthcare', 'Швейцария'),
(5, 'GlaxoSmith Kline Healthcare2', 'Швейцария'),
(6, 'КВАДРАТ-С', 'Россия'),
(7, 'Санофи Илач Санайи ве Тиджарет А.Ш.', 'Турция'),
(8, 'Акрихин ОАО', 'Россия'),
(9, 'Синтез ОАО', 'Россия');

-- --------------------------------------------------------

--
-- Структура таблицы `patients`
--

CREATE TABLE `patients` (
  `id` int NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `middle_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `infl` varchar(14) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `passport` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `birth_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reg_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `patients`
--

INSERT INTO `patients` (`id`, `first_name`, `last_name`, `middle_name`, `address`, `infl`, `passport`, `birth_date`, `reg_date`) VALUES
(1, 'John', 'Doe', 'Jane', 'New York', '123456789', 'ABCD12345', '12/04/2021', '12/16/2021'),
(2, 'Javohir', 'Abduhalilov', 'Shavkatovich', 'Shaykhontohur district, Karata', '12684398', 'AB123972', '12/01/2021', '12/18/2021'),
(3, 'Sherzod', 'Xolmatov', 'Ravshanovich', 'Buxoro viloyati, qora ko\'l tumani, Satoriy ko\'chasi, 17-uy', '123654987', 'AA456132', '07/09/1989', '12/22/2021'),
(4, 'SHAVKAT', 'BEGMATOV', 'ABDUHALILOVICH', 'Shaykhontohur district, Karatash block, house 11, apartment 63.', '156794', 'AB123972', '15/04/1983', '01/22/2022'),
(5, 'Sardor', 'Sariboyev', 'G\'anisher o\'g\'li', 'Shaykhontohur district, KARATASH 11-63', '321657468454', 'AA98465452', '07/09/1989', '01/29/2022'),
(6, 'Sarvar', 'Avazov', 'Xamdamovich', 'Buxoro viloyati, qora ko\'l tumani, Satoriy ko\'chasi, 17-uy', '30101800050014', 'AB1234567', '15.03.1980', '01/30/2022');

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `manufacturer_id` int NOT NULL,
  `datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `name`, `manufacturer_id`, `datetime`) VALUES
(1, 'Цитрамон П', 1, '2022-01-16 23:16:39'),
(2, 'Экседрин', 0, '2022-01-16 23:16:52'),
(3, 'Вольтарен гель 2% 50 г', 5, '2022-01-29 02:13:39'),
(4, 'Отривин Увлажняющая формула спрей 0,1% 10 мл', 4, '2022-01-29 04:56:45'),
(5, 'Россия', 6, '2022-01-29 04:58:22'),
(6, 'Суперум витамин С таблетки 400 мг 30 шт', 6, '2022-01-29 04:58:49'),
(7, 'Цитрамон П3', 5, '2022-01-29 05:33:22'),
(8, 'Цитрамон П4', 5, '2022-01-29 05:34:48'),
(9, 'Shaxruz', 1, '2022-02-06 05:58:23'),
(10, 'Телзап таблетки 40 мг, 90 шт.', 7, '2022-02-07 17:19:23'),
(11, 'Рамиприл-АКОС, таблетки 5 мг 30 шт', 9, '2022-02-24 23:41:45');

-- --------------------------------------------------------

--
-- Структура таблицы `roles`
--

CREATE TABLE `roles` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `roles`
--

INSERT INTO `roles` (`id`, `name`, `type`) VALUES
(1, 'Регистратор', 'registrar'),
(2, 'Шифохона кассири', 'cashier'),
(3, 'Менежер', 'manager'),
(4, 'Фармацевт сотувчи', 'pharmacist');

-- --------------------------------------------------------

--
-- Структура таблицы `storage_actions`
--

CREATE TABLE `storage_actions` (
  `id` int NOT NULL,
  `datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `product_id` int NOT NULL,
  `count` int NOT NULL,
  `price` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `storage_actions`
--

INSERT INTO `storage_actions` (`id`, `datetime`, `product_id`, `count`, `price`) VALUES
(1, '2022-01-29 05:44:04', 1, 50, 7000),
(2, '2022-01-29 05:48:37', 7, 80, 18000),
(3, '2022-02-06 05:40:00', 1, -5, 1000),
(4, '2022-02-06 05:42:16', 1, -5, 1000),
(5, '2022-02-06 05:47:18', 1, -5, 1000),
(6, '2022-02-06 05:47:20', 1, -5, 1000),
(7, '2022-02-06 05:48:51', 1, -5, 1000),
(8, '2022-02-06 05:53:07', 1, -5, 1000),
(9, '2022-02-06 05:54:59', 8, 50, 2000),
(10, '2022-02-06 05:55:27', 7, -7, 3500),
(11, '2022-02-06 05:57:57', 7, -7, 3500),
(12, '2022-02-06 06:40:13', 9, 500, 17),
(13, '2022-02-06 18:02:10', 9, -25, 2000),
(14, '2022-02-06 18:06:18', 9, -25, 2000),
(15, '2022-02-06 18:07:03', 9, -25, 2000),
(16, '2022-02-06 18:14:55', 9, -25, 2000),
(17, '2022-02-06 18:15:13', 9, -100, 750),
(18, '2022-02-06 18:18:18', 9, -100, 750),
(19, '2022-02-06 18:19:12', 9, -100, 750),
(20, '2022-02-06 18:19:41', 9, -100, 750),
(21, '2022-02-06 18:20:28', 9, -100, 750),
(22, '2022-02-24 23:43:31', 11, 5000, 1500),
(23, '2022-02-24 23:46:11', 11, -5, 2000);

-- --------------------------------------------------------

--
-- Структура таблицы `treatment`
--

CREATE TABLE `treatment` (
  `id` int NOT NULL,
  `patient_id` int NOT NULL,
  `sum` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'unpaid',
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `login` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `name` varchar(256) NOT NULL,
  `role` varchar(256) NOT NULL DEFAULT 'user',
  `image` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `status` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `login`, `password`, `email`, `name`, `role`, `image`, `status`) VALUES
(1, 'Java', '$2y$10$P8d1G30xv99FNK06rbdjkelWpEWWl0yVFp9Se0i9IsRr6peiGLPAK', 'javastudio2020@gmail.com', 'Жавохир', 'admin', '', 1),
(2, 'Kassa', '$2y$10$P8d1G30xv99FNK06rbdjkelWpEWWl0yVFp9Se0i9IsRr6peiGLPAK', 'kassa@gmail.com', 'Кассир', 'kassa', '', 0),
(3, 'Manager', '$2y$10$P8d1G30xv99FNK06rbdjkelWpEWWl0yVFp9Se0i9IsRr6peiGLPAK', 'manager@gmail.com', 'Менеджер', 'manager', '', 0),
(11, 'nigina', '$2y$10$WKaDWLA54qzYTQLrWdDvKuU0mU.Y/aD5gcM/tL97WAq25U4BeGTO.', 'fstudioadm123123123@gmail.com', 'Nigina', 'recorder', NULL, 1),
(12, 'Apteka', '$2y$10$WKaDWLA54qzYTQLrWdDvKuU0mU.Y/aD5gcM/tL97WAq25U4BeGTO.', 'apteka@gmail.com', 'Madina', 'pharmacist', NULL, 1),
(13, 'Recorder', '$2y$10$P8d1G30xv99FNK06rbdjkelWpEWWl0yVFp9Se0i9IsRr6peiGLPAK', 'recorder@gmail.com', 'Регистратор', 'recorder', NULL, 0);

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
-- Индексы таблицы `income`
--
ALTER TABLE `income`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `kassa`
--
ALTER TABLE `kassa`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `lang`
--
ALTER TABLE `lang`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `manufacturers`
--
ALTER TABLE `manufacturers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Индексы таблицы `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Индексы таблицы `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `storage_actions`
--
ALTER TABLE `storage_actions`
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
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `catalog`
--
ALTER TABLE `catalog`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `income`
--
ALTER TABLE `income`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `kassa`
--
ALTER TABLE `kassa`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `lang`
--
ALTER TABLE `lang`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `manufacturers`
--
ALTER TABLE `manufacturers`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `patients`
--
ALTER TABLE `patients`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `storage_actions`
--
ALTER TABLE `storage_actions`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT для таблицы `treatment`
--
ALTER TABLE `treatment`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
