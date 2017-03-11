<?php
require_once 'vendor/autoload.php';

if (class_exists(PHPUnit_TextUI_Command::class)) {
    PHPUnit_TextUI_Command::main();
} else {
    PHPUnit\TextUI\Command::main();
}
