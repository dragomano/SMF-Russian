<?php

$basePath = __DIR__ . '/dist_install';

// Отключаем сбор статистики по умолчанию
$install = file_get_contents($basePath . '/install.php');
$install = str_replace('name="stats" id="stats_check" checked="checked"', 'name="stats" id="stats_check"', $install);

file_put_contents($basePath . '/install.php', $install);

// Твики в SQL файлах
$tweaks = array(
	// Отключаем проверку пароля при входе в админку
	// Сортируем часовые пояса
	// Отключаем отображение заголовков сообщений
	// Используем локальную версию jQuery
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

	// Увеличиваем максимальные размеры вложений, заданные по умолчанию
	"('attachmentSizeLimit', '128'),
	('attachmentPostLimit', '192')," => "('attachmentSizeLimit', '1280'),
	('attachmentPostLimit', '1920'),"
);

// MySQL
$mysql = file_get_contents($basePath . '/install_2-1_mysql.sql');
$mysql = strtr($mysql, $tweaks);

file_put_contents($basePath . '/install_2-1_mysql.sql', $mysql);

// PostreSQL
$pgsql = file_get_contents($basePath . '/install_2-1_postgresql.sql');
$pgsql = strtr($pgsql, $tweaks);

file_put_contents($basePath . '/install_2-1_postgresql.sql', $pgsql);

// Твики в Sources
$calendar = file_get_contents($basePath . '/Sources/Subs-Calendar.php');
$calendar = strtr($calendar, array(
	"// Find all possible variants of AM and PM for this language." => "// Find all possible variants of AM and PM for this language.
	if (\$txt['time_am'] == ' ' && \$txt['time_pm'] == ' ')
	{
		return strtr(strtolower(\$date), \$replacements);
	}"
));

file_put_contents($basePath . '/Sources/Subs-Calendar.php', $calendar);

// Твики в Themes
$calendar_template = file_get_contents($basePath . '/Themes/default/Calendar.template.php');
$calendar_template = strtr($calendar_template, array(
	"\$context['event']['start_date_orig']" => "\$context['event']['start_date']",
	"\$context['event']['end_date_orig']" => "\$context['event']['end_date']"
));

file_put_contents($basePath . '/Themes/default/Calendar.template.php', $calendar_template);

$post_template = file_get_contents($basePath . '/Themes/default/Post.template.php');
$post_template = strtr($post_template, array(
	"\$context['event']['start_date_orig']" => "\$context['event']['start_date']",
	"\$context['event']['end_date_orig']" => "\$context['event']['end_date']"
));

file_put_contents($basePath . '/Themes/default/Post.template.php', $post_template);
