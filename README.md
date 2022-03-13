
# SMF Russian ~ сборка SMF для русскоязычных пользователей

## Изменения по сравнению с оригинальной версией SMF 2.1.1

* Локализация включена в дистрибутив.
* Переведен `readme.html` (полезно почитать перед установкой или обновлением).
* При нажатии на пункт «Личные сообщения» в меню в дополнение к пункту «Входящие» [добавлен пункт «Отправленные»](https://www.simplemachines.org/community/index.php?topic=580740.0).

При установке с нуля добавлены следующие твики:
* Включено по умолчанию
    * Отображать в первую очередь часовые пояса этих стран: «RU».
* Отключено по умолчанию
    * Сбор статистики.
    * Отображение заголовков отдельных сообщений в темах.
* Поле профиля «ICQ» заменено на «Telegram», с соответствующей иконкой.
* Первый день недели в Календаре: Понедельник

Прочее:
* Скрипт SCEditor обновляется до текущей последней версии.
* Скрипт jQuery обновляется до текущей последней версии.
* Исправлен [баг с отображением номеров страниц разделов](https://github.com/SimpleMachines/SMF2.1/issues/7373).

Если какие-то твики не нужны, внесите изменения в директории `tweaks` и/или в файле `webpack.mix.js`.

## Твики

| Твик  | Расположение в папке `tweaks` |
| ------------- | ------------- |
| Пункт «Отправленные» в ЛС | `Themes/default/PersonalMessage.template.php`, `webpack.mix.js` |
| Отображение часовых поясов | `install_2-1_mysql.sql`, `install_2-1_postgresql.sql` |
| Отключение сбора статистики | `install.php` |
| Отображение заголовков сообщений | `install_2-1_mysql.sql`, `install_2-1_postgresql.sql` |
| Замена иконки «ICQ» на «Telegram» | `Themes/default/images/telegram-icon.png`, `Themes/default/languages/Modification.english.php`, `Themes/default/languages/Modification.russian.php`, `install_2-1_mysql.sql`, `install_2-1_postgresql.sql` |
| Первый день недели - Понедельник | `install_2-1_mysql.sql`, `install_2-1_postgresql.sql` |
| Обновление SCEditor | `webpack.mix.js` |
| Обновление jQuery | `webpack.mix.js` |
| Исправление бага с отображением номеров страниц разделов | `Sources/Subs.php`, `webpack.mix.js` |

## Запуск

У вас в системе должны быть установлены [Composer](https://getcomposer.org/download/) и [Node.js](https://nodejs.org/en/).

Скачайте этот репозиторий (кнопка Code -> Download), распакуйте, откройте командную строку, перейдите в распакованную директорию и выполните команду `composer install`.

Файлы для чистой установки будут в `dist_install`, файлы для обновления — в `dist_upgrade`. Кроме того, в корневой директории будут созданы архивы обоих дистрибутивов.