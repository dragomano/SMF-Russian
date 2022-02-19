
# SMF Russian ~ сборка SMF для русскоязычных пользователей

## Изменения по сравнению с оригинальной версией SMF 2.1.1

* Локализация включена в&nbsp;дистрибутив.
* Переведен `readme.html` (полезно почитать перед установкой или обновлением).
* При нажатии на пункт «Личные сообщения» в меню в дополнение к пункту «Входящие» [добавлен пункт «Отправленные»](https://www.simplemachines.org/community/index.php?topic=580740.0).
* Скрипт редактора SCEditor обновлён до v3.1.1 (в SMF 2.1.1 используется v3.0.0).

При установке с нуля добавлены следующие твики:
* Включено по&nbsp;умолчанию
    * Отображать в&nbsp;первую очередь часовые пояса этих стран: «RU».
* Отключено по&nbsp;умолчанию
    * Сбор статистики.
* Поле профиля «ICQ» заменено на «Telegram», с соответствующей иконкой.
* Первый день недели в Календаре: Понедельник

Если какие-то твики не нужны, внесите изменения в директории `tweaks` и в файле `webpack.mix.js`.

## Твики

| Твик  | Расположение в папке `tweaks` |
| ------------- | ------------- |
| Пункт «Отправленные» в ЛС | `Themes/default/PersonalMessage.template.php` |
| Отображение часовых поясов | `install_2-1_mysql.sql`, `install_2-1_postgresql.sql` |
| Отключение сбора статистики | `install.php` |
| Замена иконки «ICQ» на «Telegram» | `Themes/default/images/telegram-icon.png`, `Themes/default/languages/Modification.english.php`, `Themes/default/languages/Modification.russian.php`, `install_2-1_mysql.sql`, `install_2-1_postgresql.sql` |
| Первый день недели - Понедельник | `install_2-1_mysql.sql`, `install_2-1_postgresql.sql` |
| Обновлённый скрипт SCEditor | `Themes/default/scripts/jquery.sceditor.bbcode.min.js` |

## Запуск

У вас в системе должны быть установлены [Composer](https://getcomposer.org/download/) и [Node.js](https://nodejs.org/en/).

Скачайте этот репозиторий (кнопка Code -> Download), распакуйте, откройте командную строку, перейдите в распакованную директорию и выполните команду `composer install`.

Файлы для чистой установки будут в `dist_install`, файлы для обновления — в `dist_upgrade`. Кроме того, в корневой директории будут созданы архивы обоих дистрибутивов.