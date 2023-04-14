<?php

// Отключаем сбор статистики по умолчанию
$install = file_get_contents(__DIR__ . '/dist_install/install.php');
$install = str_replace('name="stats" id="stats_check" checked="checked"', 'name="stats" id="stats_check"', $install);

file_put_contents(__DIR__ . '/dist_install/install.php', $install);

// Твики в SQL файлах
$tweaks = array(
	// Отключаем проверку пароля при входе в админку
	// Сортируем часовые пояса
	// Отключаем отображение заголовков сообщений
	// Подгружаем локальный jQuery вместо CDN
	"('securityDisable_moderate', '1')" => "('securityDisable_moderate', '1'),
	('securityDisable', '1'),
	('timezone_priority_countries', 'RU'),
	('subject_toggle', '0'),
	('jquery_source', 'local')",

	// Меняем ICQ на Telegram
	"'cust_icq', '{icq}', '{icq_desc}', 'text', 12, '', 1, 'regex~[1-9][0-9]{4,9}~i'" => "'cust_tg', '{telegram}', '{telegram_desc}', 'text', 32, '', 1, 'nohtml'",
	'<a class="icq" href="//www.icq.com/people/{INPUT}" target="_blank" rel="noopener" title="ICQ - {INPUT}"><img src="{DEFAULT_IMAGES_URL}/icq.png" alt="ICQ - {INPUT}"></a>' => '<a href="//t.me/{INPUT}" target="_blank" rel="noopener" title="Telegram - {INPUT}"><img src="{DEFAULT_IMAGES_URL}/telegram-icon.png" alt="Telegram - {INPUT}"></a>',

	// Делаем Понедельник первым днём недели
	"(-1, 1, 'return_to_post', '1')" => "(-1, 1, 'return_to_post', '1'),
	(-1, 1, 'calendar_start_day', '1')",

	// Отключаем получение файлов с офсайта - когда захотите обновиться, включите обратно, в Диспетчере задач
	"0, 'fetchSMfiles" => "1, 'fetchSMfiles",
);

// MySQL
$mysql = file_get_contents(__DIR__ . '/dist_install/install_2-1_mysql.sql');
$mysql = strtr($mysql, $tweaks);

file_put_contents(__DIR__ . '/dist_install/install_2-1_mysql.sql', $mysql);

// PostreSQL
$pgsql = file_get_contents(__DIR__ . '/dist_install/install_2-1_postgresql.sql');
$pgsql = strtr($pgsql, $tweaks);

file_put_contents(__DIR__ . '/dist_install/install_2-1_postgresql.sql', $pgsql);
