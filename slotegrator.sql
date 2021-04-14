-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 14 2021 г., 20:43
-- Версия сервера: 10.3.13-MariaDB-log
-- Версия PHP: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `slotegrator`
--

-- --------------------------------------------------------

--
-- Структура таблицы `account`
--

CREATE TABLE `account` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `dollars` int(11) DEFAULT NULL,
  `points` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `account`
--

INSERT INTO `account` (`id`, `user_id`, `dollars`, `points`) VALUES
(1, 1, 135, 381),
(2, 3, 272, 4505);

-- --------------------------------------------------------

--
-- Структура таблицы `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1618296853),
('m210211_182735_create_user_table', 1618300781),
('m210413_113323_create_number_of_points_table', 1618337312),
('m210413_114743_create_things_table', 1618337312),
('m210414_065444_create_account_table', 1618383293);

-- --------------------------------------------------------

--
-- Структура таблицы `number_of_points`
--

CREATE TABLE `number_of_points` (
  `id` int(11) NOT NULL,
  `min` int(11) NOT NULL,
  `max` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `coeff` float DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `limit` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `number_of_points`
--

INSERT INTO `number_of_points` (`id`, `min`, `max`, `type`, `coeff`, `status`, `limit`) VALUES
(1, 20, 150, 'money', NULL, 1, 1970),
(2, 150, 1300, 'points', 1.5, 1, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `things`
--

CREATE TABLE `things` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `available` int(11) DEFAULT NULL,
  `count` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `things`
--

INSERT INTO `things` (`id`, `title`, `price`, `available`, `count`) VALUES
(1, 'Кофеварка Cimbali', 200, 1, 5),
(2, 'Миксер Philips', 50, 1, 1),
(3, 'Блендер Beko', 158, 1, 2),
(4, 'Мультиварка Nokia', 1000, 1, 14),
(5, 'фен Scarlet', 30, 1, 3);

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `lastName` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `passwordHash` varchar(255) NOT NULL,
  `authKey` varchar(255) NOT NULL,
  `accessToken` varchar(255) DEFAULT NULL,
  `is_admin` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `time_create` int(11) NOT NULL,
  `time_update` int(11) DEFAULT NULL,
  `user_type` int(11) DEFAULT NULL,
  `count_chance` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `username`, `surname`, `lastName`, `email`, `passwordHash`, `authKey`, `accessToken`, `is_admin`, `status`, `time_create`, `time_update`, `user_type`, `count_chance`) VALUES
(1, 'Иван', 'Иванов', 'Иванович', 'kot@kot.com', '$2y$13$dYVUKw0r/Azk1nDp1cauE.oF/EHNB6KWeoz1SXdND7awub7BNAutC', 'wm-GEGp8v6', NULL, 1, 10, 1618309415, NULL, 10, 0),
(2, 'Степан', 'Степанов', 'Степанович', 'test@kot.com', '$2y$13$nDBQ/yHqI1L4wPr7nIEzl.DNSQuLWEw5BbEdBnetWtOhGr9/9x9QC', 'jtVIJeX5DY', NULL, NULL, 10, 1618310900, NULL, 9, 0),
(3, 'Test', 'Testing', '', 'test2@kot.com', '$2y$13$siu31WIXrhwHC/iKuUIw2.ZuHXg9QHyZ1K7LAptfnAO2SL40YGelO', 'aswc5rZ1nd', NULL, NULL, 10, 1618386528, NULL, 9, 5);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx-account-user_id` (`user_id`);

--
-- Индексы таблицы `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Индексы таблицы `number_of_points`
--
ALTER TABLE `number_of_points`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `things`
--
ALTER TABLE `things`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `account`
--
ALTER TABLE `account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `number_of_points`
--
ALTER TABLE `number_of_points`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `things`
--
ALTER TABLE `things`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `account`
--
ALTER TABLE `account`
  ADD CONSTRAINT `fk-account-user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
