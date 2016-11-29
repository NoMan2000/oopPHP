<?php


use Oopphp\ChapterThree\ClassConstantOne;
use Oopphp\ChapterThree\ClassConstantTwo;

require_once __DIR__ . '/../../bootstrap.php';
$title = "Class Constants Test";
require_once __DIR__ . '/../partials/header.php';

echo "<h2 class='page-header'>Testing ClassConstantOne and ClassConstantTwo</h2>";

specify($statement = "A class constant can be overriden by a child class", function () use ($statement) {
    verifyExt(
        $statement . ' <code>ClassConstantOne::CONSTANT_ONE</code>',
        ClassConstantOne::CONSTANT_ONE
    )->equals(1)->e();
    verifyExt(
        $statement . ' <code>ClassConstantTwo::CONSTANT_ONE</code>',
        ClassConstantTwo::CONSTANT_ONE
    )->equals('one')->e();
});

if (!isset($noInclude)) {
    require_once __DIR__ . '/../partials/footer.php';
}
