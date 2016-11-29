<?php
namespace ChapterNine;

use Codeception\Specify;
use Oopphp\ChapterNine\Closures;

require_once __DIR__ . '/../../bootstrap.php';
$title = "Tests for " . __FILE__;
require_once __DIR__ . '/../partials/header.php';


/**
 * @return Closures
 */
$before = function() {
    return new Closures();
};

specify($statement = "Can load from closure scope or from global scope", function () use($before, $statement) {
    $loadLocal = $before()->loadLocal; // Closures are like static properties, they have to be stored first.
    $loadGlobal = $before()->loadGlobal;
    $GLOBALS['localVariable'] = 1000;
    verifyExt(
        $statement . '<code>$loadGlobal()</code>',
        $loadGlobal()
    )->equals(1000)->e();
    verifyExt(
        $statement . '<code>$loadLocal()</code>',
        $loadLocal()
    )->equals(1)->e();
});

if (!isset($noInclude)) {
    require_once __DIR__ . '/../partials/footer.php';
}
