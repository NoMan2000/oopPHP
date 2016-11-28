<?php
require_once __DIR__ . '/../../bootstrap.php';

$noInclude = boolval(array_get($GLOBALS, 'noInclude'));

$result = test_generator(__FILE__, __DIR__, $noInclude);

$noInclude = $result['noInclude'];
$title = $result['title'];
