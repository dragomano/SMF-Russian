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