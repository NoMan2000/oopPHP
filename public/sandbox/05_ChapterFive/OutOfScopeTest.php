<?php
namespace ChapterFive;

use Codeception\Specify;
use Oopphp\ChapterFive\OutOfScope;

require_once __DIR__ . '/../../bootstrap.php';
$title = "Out of Scope Test";
require_once __DIR__ . '/../partials/header.php';

/**
 * @return OutOfScope
 */
$before = function() {
    return new OutOfScope();
};

specify($statement = "Can get and set a value dynamically", function () use ($statement, $before) {
    $outOfScopeClass = $before();
    verifyExt($outOfScopeClass->foo)->equals(null)->e();
    $outOfScopeClass->foo = "bar";
    verifyExt($outOfScopeClass->foo)->equals("bar")->e();
});


if (!isset($noInclude)) {
    require_once __DIR__ . '/../partials/footer.php';
}
