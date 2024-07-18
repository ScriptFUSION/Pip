<?php
chdir(__DIR__ . '/../..');

require_once 'vendor/autoload.php';

(new PHPUnit\TextUI\Application)->run($argv);
