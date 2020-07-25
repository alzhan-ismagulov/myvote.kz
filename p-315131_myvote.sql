-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июл 25 2020 г., 15:12
-- Версия сервера: 5.7.29
-- Версия PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `p-315131_myvote`
--

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `petition_id` int(11) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `text` varchar(1800) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `petitions`
--

CREATE TABLE `petitions` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `destination` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user` int(11) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` enum('На рассмотрении','Одобрена','Отклонена','Удалена') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'На рассмотрении',
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `petitions`
--

INSERT INTO `petitions` (`id`, `title`, `description`, `text`, `destination`, `user`, `created`, `modified`, `status`, `image`) VALUES
(1, 'Присвоить русскому языку статус второго государственного в Республике Казахстан', '', 'Уважаемый Касым-Жомарт Кемелевич!\r\n \r\nНесмотря на то, что к 2020 году население Казахстана более чем на две трети состоит из этнических казахов и несмотря на большой рост  востребованности казахского языка во всех сферах жизни страны, русский язык по-прежнему остается средством общения многонационального народа Казахстана, средством получения информации, научных и технических знаний. Более 90% (т.е. подавляющее большинство) граждан нашей страны говорит на русском языке или понимает русский язык. Документооборот, техническая документация, законодательные акты во всех сферах жизнедеятельности так же ведутся либо на русском, либо на двух языках параллельно и подавляющее большинство текстов  переводится с русского на казахский, а не наоборот. То есть де-факто русский язык является ГОСУДАРСТВЕННЫМ языком в Республике Казахстан. Однако, мы видим, что на государственную службу нельзя пройти человеку, который не знает казахского языка. Даже, если этот человек может быть очень полезен для нашей страны. Мы видим, что незнание казахского языка является поводом для некоторых упрекнуть русскоязычных граждан, а иногда и дискриминировать граждан по принципу знания или незнания того или иного языка. Мы предполагаем, что снижение официального статуса русского языка в будущем даст повод для дискриминации граждан в своих правах, не знающих казахский язык.\r\nЗаконы любого государства есть отражение реальности. Несоответствие закона и реальности создает напряженность (в данном случае межэтническую напряженность) среди народа. И мы уже давно теряем своих русскоязычных граждан, которые покинули нашу страну из-за того, что их упрекают в незнании ГОСУДАРСТВЕННОГО языка. Они не чувствуют больше уверенности в своём благополучном будущем.\r\nВ связи с вышеизложенным, а также ориентируясь на опыт многих развитых стран Мира (Бельгия, Великобритания, Канада, Финляндия, Швейцария, Швеция, Индия, Китай и мн. др.), в которых приняты несколько государственных языков, вносим предложение: официально присвоить\r\nрусскому языку статус второго государственного, для чего внести изменения в соответствующую статью (ст. 7 п. 2) Конституции РК.\r\n\r\nС уважением\r\nи надеждой на взаимопонимание,\r\nнижеподписавшиеся граждане Республики Казахстан. ', 'Президенту Республики Казахстан Токаеву К.К.', 1, '2020-07-25 14:08:44', '2020-07-25 15:09:14', 'Одобрена', '9a5f26a3bedaff421a3d5dcf224b8494.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `status`
--

CREATE TABLE `status` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `status`
--

INSERT INTO `status` (`id`, `name`) VALUES
(1, 'Активный'),
(0, 'Неактивный');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `surname` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `middle_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `iin` int(12) NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` int(11) NOT NULL,
  `profession` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('user','admin') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `token` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `recovery_time` int(11) DEFAULT NULL,
  `user_photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ip` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0.0.0.0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `surname`, `name`, `middle_name`, `iin`, `email`, `phone`, `gender`, `age`, `profession`, `city`, `role`, `token`, `status`, `created`, `modified`, `recovery_time`, `user_photo`, `ip`) VALUES
(1, 'Alzhan', '$2y$10$QlZdBNSpDgEvVdHwzuBiQuiXm1Zx4omnld0ehp1nX6voUtpC0zxpG', 'Исмагулов', 'Альжан', 'Тулеуович', 123, 'adm1nistratorportala@yandex.ru', '123', 'Мужской', 46, 'Full Stack Developer', 'Astana', 'admin', '', '1', '2020-07-25 13:59:46', '2020-07-25 13:59:46', NULL, 'public/images/user_photo.png', '127.0.0.1');

-- --------------------------------------------------------

--
-- Структура таблицы `vote`
--

CREATE TABLE `vote` (
  `id` int(11) NOT NULL,
  `petition_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parent` (`id`);

--
-- Индексы таблицы `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `petitions`
--
ALTER TABLE `petitions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `title` (`title`);

--
-- Индексы таблицы `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`),
  ADD KEY `name` (`name`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login` (`login`),
  ADD UNIQUE KEY `iin` (`id`);

--
-- Индексы таблицы `vote`
--
ALTER TABLE `vote`
  ADD PRIMARY KEY (`id`),
  ADD KEY `petition_id` (`petition_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `petitions`
--
ALTER TABLE `petitions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `status`
--
ALTER TABLE `status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `vote`
--
ALTER TABLE `vote`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
