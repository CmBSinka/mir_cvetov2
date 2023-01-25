-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:3306
-- Время создания: Янв 25 2023 г., 10:25
-- Версия сервера: 10.6.11-MariaDB-1:10.6.11+maria~ubu2004
-- Версия PHP: 8.1.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `Yanis_Mir_Chvetov`
--

-- --------------------------------------------------------

--
-- Структура таблицы `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `count` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Дамп данных таблицы `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `product_id`, `count`) VALUES
(3, 9, 6, 1),
(4, 9, 9, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `categoria` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `categoria`) VALUES
(1, 'Розы'),
(2, 'Астры');

-- --------------------------------------------------------

--
-- Структура таблицы `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `count` int(11) NOT NULL,
  `status` enum('Новый','Подтвержден','Отменен') NOT NULL DEFAULT 'Новый',
  `reason` varchar(255) DEFAULT NULL,
  `date` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Дамп данных таблицы `order`
--

INSERT INTO `order` (`id`, `user_id`, `product_id`, `count`, `status`, `reason`, `date`) VALUES
(1, 2, 7, 4, 'Новый', NULL, '2023-01-23 21:00:00'),
(2, 2, 6, 1, 'Новый', NULL, '2023-01-23 21:00:00'),
(4, 2, 9, 2, 'Новый', NULL, '2023-01-23 21:00:00'),
(5, 2, 8, 1, 'Новый', NULL, '2023-01-23 21:00:00'),
(7, 2, 10, 1, 'Новый', NULL, '2023-01-23 21:00:00'),
(8, 2, 10, 1, 'Новый', NULL, '2023-01-23 21:00:00'),
(9, 2, 8, 1, 'Новый', NULL, '2023-01-23 21:00:00'),
(10, 2, 7, 2, 'Новый', NULL, '2023-01-23 21:00:00'),
(11, 2, 7, 1, 'Новый', NULL, '2023-01-23 21:00:00'),
(12, 2, 10, 2, 'Новый', NULL, '2023-01-23 21:00:00'),
(13, 2, 6, 1, 'Новый', NULL, '2023-01-24 13:10:19'),
(16, 2, 6, 1, 'Новый', NULL, '2023-01-25 06:24:10'),
(17, 2, 6, 1, 'Новый', NULL, '2023-01-25 07:09:01'),
(18, 2, 7, 1, 'Новый', NULL, '2023-01-25 07:09:36');

-- --------------------------------------------------------

--
-- Структура таблицы `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `country` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `color` varchar(255) NOT NULL,
  `count` int(11) DEFAULT 0,
  `data` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Дамп данных таблицы `product`
--

INSERT INTO `product` (`id`, `name`, `price`, `country`, `image`, `category_id`, `color`, `count`, `data`) VALUES
(6, 'Красная Роза', 258, 'Испания', '/web/productImage/HmxI7V6h7K_Q14GcpBMjzTaXKNSob0eURq3LBKJOjCG275hU5O.jpg', 1, 'Красный', 93, '2023-01-18 07:46:52'),
(7, 'Роза Белая', 666, 'Россия', '/web/productImage/JwDvUoJC1OpfAdY9pXpz73xQznP7GE9vtnfAGNYKLn_8a0FaXF.jpg', 1, 'Белый', 659, '2023-01-18 07:47:18'),
(8, 'Синяя Астра', 250, 'Россия', '/web/productImage/7m7F9Sk6qcO8gmFFTAmhDdiAcArBsa-Ur1q0BsarNfYTck2_qd.jpg', 2, 'Синий', 8, '2023-01-18 07:46:28'),
(9, 'Голубая Роза', 258, 'Испания', '/web/productImage/HmxI7V6h7K_Q14GcpBMjzTaXKNSob0eURq3LBKJOjCG275hU5O.jpg', 1, 'Голубая', 96, '2023-01-18 07:46:52'),
(10, 'Роза Чайная', 666, 'Испания', '/web/productImage/0XhU_H47tjKgDTTLZyViDMZ6GtteeYoNCfKiPUlTvHpfJJlGmj.jpg', 1, 'Чайный', NULL, '2023-01-18 07:47:18');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `surname` varchar(255) DEFAULT NULL,
  `patronymic` varchar(255) DEFAULT NULL,
  `login` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `is_admin` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `name`, `surname`, `patronymic`, `login`, `email`, `password`, `is_admin`) VALUES
(1, 'Admin', 'Admin', 'Admin', 'admin', 'Admin@Admin.ru', 'admin44', 1),
(2, 'Вася', 'Пупкин', 'Романович', 'Vasya999', 'Vasya999@mail.ru', 'ChtoEtoTakoe', 0),
(9, 'dsadsa', 'dsaasd', 'sadads', 'sadads', 'asdsad@mail.ru', '3CSK5xA8YcR8rr7', 0);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cart_ibfk_1` (`user_id`),
  ADD KEY `cart_ibfk_2` (`product_id`);

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_ibfk_1` (`user_id`),
  ADD KEY `order_ibfk_2` (`product_id`);

--
-- Индексы таблицы `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_ibfk_1` (`category_id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT для таблицы `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
