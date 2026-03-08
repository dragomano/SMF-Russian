<?php

$base = __DIR__;
$vendor = "$base/vendor/simplemachines";

$targets = [
	["$vendor/smf-install", "$base/dist_install"],
	["$vendor/smf-russian", "$base/dist_install"],
	["$vendor/smf-upgrade", "$base/dist_upgrade"],
	["$vendor/smf-russian", "$base/dist_upgrade"],
	["$base/tweaks", "$base/dist_install"],
	["$base/tweaks/readme.html", "$base/dist_upgrade/readme.html"],
];

function copyFiles(array $targets): void {
	foreach ($targets as [$src, $dest]) {
		if (is_dir($src)) {
			is_dir($dest) || mkdir($dest, 0777, true);
			foreach (array_diff(scandir($src), ['.', '..']) as $file) {
				copyFiles([["$src/$file", "$dest/$file"]]);
			}
		} else {
			copy($src, $dest);
		}
	}
}

copyFiles($targets);
