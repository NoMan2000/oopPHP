<?php
namespace ChapterEight;

use Oopphp\ChapterEight\Singleton;
use Codeception\Specify;

require_once __DIR__ . '/../../bootstrap.php';
$title = "Tests for " . __FILE__;
require_once __DIR__ . '/../partials/header.php';

specify($statement = "A singleton class is always equal to itself", function () use ($statement) {
    $singletonOne = Singleton::getInstance();
    $singletonTwo = Singleton::getInstance();
    verifyExt($singletonOne)->equals($singletonTwo)->e();
});

if (!isset($noInclude)) {
    require_once __DIR__ . '/../partials/footer.php';
}
