INSERT INTO `user_roles` (`id`, `role`) VALUES
(1, 'Пользователь'),
(2, 'Администратор');

ALTER TABLE `user_roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

INSERT INTO `anime_statuses` (`id`, `title`) VALUES
(1, 'Анонс'),
(2, 'Онгоинг'),
(3, 'Вышел');

ALTER TABLE `anime_statuses`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

INSERT INTO `anime_types` (`id`, `title`) VALUES
(1, 'Сериал'),
(2, 'Фильм'),
(3, 'OVA'),
(4, 'Спэшл');

ALTER TABLE `anime_types`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
  
INSERT INTO `anime_genres` (`id`, `genre`) VALUES
(1, 'Боевые искусства'),
(2, 'Вампиры'),
(3, 'Военное'),
(4, 'Гарем'),
(5, 'Демоны'),
(6, 'Детектив'),
(7, 'Детсое'),
(8, 'Драма'),
(9, 'Игры'),
(10, 'Исторический'),
(11, 'Комедия'),
(12, 'Космос'),
(13, 'Магия'),
(14, 'Машины'),
(15, 'Меха'),
(16, 'Музыка'),
(17, 'Пародия'),
(18, 'Повседневность'),
(19, 'Приключения'),
(20, 'Психологическое'),
(21, 'Романтика'),
(22, 'Самураи'),
(23, 'Сверхъестественное'),
(24, 'Спорт'),
(25, 'Супер сила'),
(26, 'Триллер'),
(27, 'Ужасы'),
(28, 'Фантастика'),
(29, 'Фэнтэзи'),
(30, 'Школа'),
(31, 'Экшен'),
(32, 'Этти');

ALTER TABLE `anime_genres`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

