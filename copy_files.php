<?php

$targets = [
	[
		'src' => __DIR__ . '/vendor/simplemachines/smf-install',
		'dest' =>  __DIR__ . '/dist_install',
	],
	[
		'src' => __DIR__ . '/vendor/simplemachines/smf-russian',
		'dest' =>  __DIR__ . '/dist_install',
	],
	[
		'src' => __DIR__ . '/vendor/simplemachines/smf-upgrade',
		'dest' =>  __DIR__ . '/dist_upgrade',
	],
	[
		'src' => __DIR__ . '/vendor/simplemachines/smf-russian',
		'dest' =>  __DIR__ . '/dist_upgrade',
	],
	[
		'src' => __DIR__ . '/tweaks',
		'dest' =>  __DIR__ . '/dist_install',
	],
	[
		'src' => __DIR__ . '/tweaks/readme.html',
		'dest' => __DIR__ . '/dist_upgrade/readme.html',
	],
];

function copyFiles($targets) {
	foreach ($targets as $target) {
		$src = $target['src'];
		$dest = $target['dest'];

		if (is_dir($src)) {
			if (!is_dir($dest)) {
				mkdir($dest, 0777, true);
			}

			$files = scandir($src);

			foreach ($files as $file) {
				if ($file !== '.' && $file !== '..') {
					if (is_dir($src . '/' . $file)) {
						copyFiles([['src' => $src . '/' . $file, 'dest' => $dest . '/' . $file]]);
					} else {
						copy($src . '/' . $file, $dest . '/' . $file);
					}
				}
			}
		} else {
			copy($src, $dest);
		}
	}
}

copyFiles($targets);
