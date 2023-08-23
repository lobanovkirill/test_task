-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Авг 23 2023 г., 09:10
-- Версия сервера: 10.4.28-MariaDB
-- Версия PHP: 8.2.4
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";
/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */
;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */
;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */
;
/*!40101 SET NAMES utf8mb4 */
;
--
-- База данных: `courier_schedule`
--

-- --------------------------------------------------------
--
-- Структура таблицы `courier`
--

CREATE TABLE `courier` (
  `id` int(10) UNSIGNED NOT NULL,
  `courier_name` varchar(255) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8 COLLATE = utf8_general_ci;
--
-- Дамп данных таблицы `courier`
--

INSERT INTO `courier` (`id`, `courier_name`)
VALUES (1, 'Иван Петров'),
  (2, 'Василий Везучев'),
  (3, 'Салават Анваров'),
  (4, 'Олег Ахметов'),
  (5, 'Константин Викторов'),
  (6, 'Салават Анваров'),
  (7, 'Артем Васильев'),
  (8, 'Григорий Патрушев'),
  (9, 'Норбек Давлетгареев'),
  (10, 'Станислав Хафизов');
-- --------------------------------------------------------
--
-- Структура таблицы `region`
--

CREATE TABLE `region` (
  `id` int(10) UNSIGNED NOT NULL,
  `city` varchar(150) NOT NULL,
  `travel_time` int(10) UNSIGNED DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8 COLLATE = utf8_general_ci;
--
-- Дамп данных таблицы `region`
--

INSERT INTO `region` (`id`, `city`, `travel_time`)
VALUES (1, 'Санкт-Петербург', 1),
  (2, 'Уфа', 2),
  (3, 'Нижний Новгород', 3),
  (4, 'Владимир', 4),
  (5, 'Кострома', 5),
  (6, 'Екатеринбург', 6),
  (7, 'Ковров', 7),
  (8, 'Воронеж', 8),
  (9, 'Самара', 9),
  (10, 'Астрахань', 10);
-- --------------------------------------------------------
--
-- Структура таблицы `travel_data`
--

CREATE TABLE `travel_data` (
  `id` int(10) UNSIGNED NOT NULL,
  `courier_id` int(10) UNSIGNED NOT NULL,
  `region_id` int(10) UNSIGNED NOT NULL,
  `date_start` datetime NOT NULL,
  `date_finish` datetime NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8 COLLATE = utf8_general_ci;
--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `courier`
--
ALTER TABLE `courier`
ADD PRIMARY KEY (`id`, `courier_name`);
--
-- Индексы таблицы `region`
--
ALTER TABLE `region`
ADD PRIMARY KEY (`id`, `city`);
--
-- Индексы таблицы `travel_data`
--
ALTER TABLE `travel_data`
ADD PRIMARY KEY (
    `id`,
    `courier_id`,
    `region_id`,
    `date_start`,
    `date_finish`
  );
--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `courier`
--
ALTER TABLE `courier`
MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 11;
--
-- AUTO_INCREMENT для таблицы `region`
--
ALTER TABLE `region`
MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 11;
--
-- AUTO_INCREMENT для таблицы `travel_data`
--
ALTER TABLE `travel_data`
MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */
;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */
;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */
;
-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Авг 23 2023 г., 09:10
-- Версия сервера: 10.4.28-MariaDB
-- Версия PHP: 8.2.4
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";
/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */
;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */
;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */
;
/*!40101 SET NAMES utf8mb4 */
;
--
-- База данных: `courier_schedule`
--

-- --------------------------------------------------------
--
-- Структура таблицы `courier`
--

CREATE TABLE `courier` (
  `id` int(10) UNSIGNED NOT NULL,
  `courier_name` varchar(255) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8 COLLATE = utf8_general_ci;
--
-- Дамп данных таблицы `courier`
--

INSERT INTO `courier` (`id`, `courier_name`)
VALUES (1, 'Иван Петров'),
  (2, 'Василий Везучев'),
  (3, 'Салават Анваров'),
  (4, 'Олег Ахметов'),
  (5, 'Константин Викторов'),
  (6, 'Салават Анваров'),
  (7, 'Артем Васильев'),
  (8, 'Григорий Патрушев'),
  (9, 'Норбек Давлетгареев'),
  (10, 'Станислав Хафизов');
-- --------------------------------------------------------
--
-- Структура таблицы `region`
--

CREATE TABLE `region` (
  `id` int(10) UNSIGNED NOT NULL,
  `city` varchar(150) NOT NULL,
  `travel_time` int(10) UNSIGNED DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8 COLLATE = utf8_general_ci;
--
-- Дамп данных таблицы `region`
--

INSERT INTO `region` (`id`, `city`, `travel_time`)
VALUES (1, 'Санкт-Петербург', 1),
  (2, 'Уфа', 2),
  (3, 'Нижний Новгород', 3),
  (4, 'Владимир', 4),
  (5, 'Кострома', 5),
  (6, 'Екатеринбург', 6),
  (7, 'Ковров', 7),
  (8, 'Воронеж', 8),
  (9, 'Самара', 9),
  (10, 'Астрахань', 10);
-- --------------------------------------------------------
--
-- Структура таблицы `travel_data`
--

CREATE TABLE `travel_data` (
  `id` int(10) UNSIGNED NOT NULL,
  `courier_id` int(10) UNSIGNED NOT NULL,
  `region_id` int(10) UNSIGNED NOT NULL,
  `date_start` datetime NOT NULL,
  `date_finish` datetime NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8 COLLATE = utf8_general_ci;
--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `courier`
--
ALTER TABLE `courier`
ADD PRIMARY KEY (`id`, `courier_name`);
--
-- Индексы таблицы `region`
--
ALTER TABLE `region`
ADD PRIMARY KEY (`id`, `city`);
--
-- Индексы таблицы `travel_data`
--
ALTER TABLE `travel_data`
ADD PRIMARY KEY (
    `id`,
    `courier_id`,
    `region_id`,
    `date_start`,
    `date_finish`
  );
--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `courier`
--
ALTER TABLE `courier`
MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 11;
--
-- AUTO_INCREMENT для таблицы `region`
--
ALTER TABLE `region`
MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 11;
--
-- AUTO_INCREMENT для таблицы `travel_data`
--
ALTER TABLE `travel_data`
MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */
;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */
;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */
;