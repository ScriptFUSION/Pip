<?php

(function () {
    do {
        $previousDir = $dir ?? __DIR__;
        $dir = dirname($previousDir);
    } while (!file_exists("$dir/vendor") && $previousDir !== $dir);

    chdir($dir);
})();

require_once 'vendor/autoload.php';

(new PHPUnit\TextUI\Application)->run($argv);
