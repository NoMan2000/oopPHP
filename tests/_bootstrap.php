<?php
// This is global bootstrap for autoloading
require_once __DIR__ . '/../public/bootstrap.php';

$kernel = \AspectMock\Kernel::getInstance();
$kernel->init([
    'debug' => true,
    'includePaths' => [__DIR__ . '/../Oopphp/src'],
    'cacheDir'  => __DIR__ . '/../cache',
    'excludePaths' => [__DIR__] // tests dir should be excluded
]);
