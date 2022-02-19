let mix = require('laravel-mix');

// Base package
mix.copy('vendor/simplemachines/smf-install', 'dist_install');
mix.copy('vendor/simplemachines/smf-upgrade', 'dist_upgrade');

// Localization
mix.copy('vendor/simplemachines/smf-russian', 'dist_install');
mix.copy('vendor/simplemachines/smf-russian', 'dist_upgrade');

// Tweaks
mix.copy('tweaks', 'dist_install');
mix.copy('tweaks/readme.html', 'dist_upgrade/readme.html');
mix.copy('tweaks/Themes/default/PersonalMessage.template.php', 'dist_upgrade/Themes/default/PersonalMessage.template.php');
mix.copy('tweaks/Themes/default/scripts/jquery.sceditor.bbcode.min.js', 'dist_upgrade/Themes/default/scripts/jquery.sceditor.bbcode.min.js');
